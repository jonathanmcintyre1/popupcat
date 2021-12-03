<?php
/*
 * @copyright Copyright (c) 2021 AltumCode (https://altumcode.com/)
 *
 * This software is exclusively sold through https://altumcode.com/ by the AltumCode author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://altumcode.com/.
 */

namespace Altum\Controllers;

use Altum\Models\User;

class Cron extends Controller {

    private function update_cron_execution_datetimes($key) {
        /* Get non-cached values from the database */
        $settings_cron = json_decode(db()->where('`key`', 'cron')->getValue('settings', 'value'));

        $new_settings_cron_array = [
            'key' => $settings_cron->key,
            'cron_datetime' => $settings_cron->cron_datetime ?? \Altum\Date::$date,
        ];

        $new_settings_cron_array[$key] = \Altum\Date::$date;

        /* Update database */
        db()->where('`key`', 'cron')->update('settings', ['value' => json_encode($new_settings_cron_array)]);
    }

    public function index() {

        /* Initiation */
        set_time_limit(0);

        /* Make sure the key is correct */
        if(!isset($_GET['key']) || (isset($_GET['key']) && $_GET['key'] != settings()->cron->key)) {
            die();
        }

        $this->users_deletion_reminder();

        $this->auto_delete_inactive_users();

        $this->users_plan_expiry_reminder();

        $this->users_logs_cleanup();

        $this->statistics_cleanup();

        $this->update_cron_execution_datetimes('cron_datetime');

    }

    private function users_deletion_reminder() {
        if(!settings()->main->auto_delete_inactive_users) {
            return;
        }

        /* Determine when to send the email reminder */
        $days_until_deletion = settings()->main->user_deletion_reminder;
        $days = settings()->main->auto_delete_inactive_users - $days_until_deletion;
        $past_date = (new \DateTime())->modify('-' . $days . ' days')->format('Y-m-d H:i:s');

        /* Get the users that need to be reminded */
        $result = database()->query("
            SELECT `user_id`, `name`, `email`, `language` FROM `users` WHERE `plan_id` = 'free' AND `last_activity` < '{$past_date}' AND `user_deletion_reminder` = 0 AND `type` = 0 LIMIT 25
        ");

        /* Go through each result */
        while($user = $result->fetch_object()) {

            /* Get the language for the user */
            $language = language($user->language);

            /* Prepare the email */
            $email_template = get_email_template(
                [
                    '{{DAYS_UNTIL_DELETION}}' => $days_until_deletion,
                ],
                $language->global->emails->user_deletion_reminder->subject,
                [
                    '{{DAYS_UNTIL_DELETION}}' => $days_until_deletion,
                    '{{LOGIN_LINK}}' => url('login'),
                    '{{NAME}}' => $user->name,
                ],
                $language->global->emails->user_deletion_reminder->body
            );

            if(settings()->main->user_deletion_reminder) {
                send_mail($user->email, $email_template->subject, $email_template->body);
            }

            /* Update user */
            db()->where('user_id', $user->user_id)->update('users', ['user_deletion_reminder' => 1]);

            if(DEBUG) {
                if(settings()->main->user_deletion_reminder) echo sprintf('User deletion reminder email sent for user_id %s', $user->user_id);
            }
        }

    }

    private function auto_delete_inactive_users() {
        if(!settings()->main->auto_delete_inactive_users) {
            return;
        }

        /* Determine what users to delete */
        $days = settings()->main->auto_delete_inactive_users;
        $past_date = (new \DateTime())->modify('-' . $days . ' days')->format('Y-m-d H:i:s');

        /* Get the users that need to be reminded */
        $result = database()->query("
            SELECT `user_id`, `name`, `email`, `language` FROM `users` WHERE `plan_id` = 'free' AND `last_activity` < '{$past_date}' AND `user_deletion_reminder` = 1 AND `type` = 0 LIMIT 25
        ");

        /* Go through each result */
        while($user = $result->fetch_object()) {

            /* Get the language for the user */
            $language = language($user->language);

            /* Prepare the email */
            $email_template = get_email_template(
                [],
                $language->global->emails->auto_delete_inactive_users->subject,
                [
                    '{{INACTIVITY_DAYS}}' => settings()->main->auto_delete_inactive_users,
                    '{{REGISTER_LINK}}' => url('register'),
                    '{{NAME}}' => $user->name,
                ],
                $language->global->emails->auto_delete_inactive_users->body
            );

            send_mail($user->email, $email_template->subject, $email_template->body);

            /* Delete user */
            (new User())->delete($user->user_id);

            if(DEBUG) {
                echo sprintf('User deletion for inactivity user_id %s', $user->user_id);
            }
        }

    }

    private function users_logs_cleanup() {
        /* Delete old users logs */
        $ninety_days_ago_datetime = (new \DateTime())->modify('-90 days')->format('Y-m-d H:i:s');
        db()->where('datetime', $ninety_days_ago_datetime, '<')->delete('users_logs');
    }

    private function statistics_cleanup() {

        /* Clean the track notifications table based on the users plan */
        $result = database()->query("SELECT `user_id`, `plan_settings` FROM `users` WHERE `status` = 1");

        /* Go through each result */
        while($user = $result->fetch_object()) {
            $user->plan_settings = json_decode($user->plan_settings);

            if($user->plan_settings->track_links_retention == -1) continue;

            /* Clear out old notification statistics logs */
            $x_days_ago_datetime = (new \DateTime())->modify('-' . ($row->plan_settings->track_links_retention ?? 90) . ' days')->format('Y-m-d H:i:s');
            database()->query("DELETE FROM `statistics` WHERE `datetime` < '{$x_days_ago_datetime}'");

            if(DEBUG) {
                echo sprintf('Statistics cleanup done for user_id %s', $user->user_id);
            }
        }

    }

    private function users_plan_expiry_reminder() {

        /* Determine when to send the email reminder */
        $days = 5;
        $future_date = (new \DateTime())->modify('+' . $days . ' days')->format('Y-m-d H:i:s');

        /* Get potential monitors from users that have almost all the conditions to get an email report right now */
        $result = database()->query("
            SELECT
                `user_id`,
                `name`,
                `email`,
                `plan_id`,
                `plan_expiration_date`,
                `language`
            FROM 
                `users`
            WHERE 
                `status` = 1
                AND `plan_id` <> 'free'
                AND `plan_expiry_reminder` = '0'
                AND (`payment_subscription_id` IS NOT NULL OR `payment_subscription_id` <> '')
				AND '{$future_date}' > `plan_expiration_date`
            LIMIT 25
        ");

        /* Go through each result */
        while($user = $result->fetch_object()) {

            /* Determine the exact days until expiration */
            $days_until_expiration = (new \DateTime($user->plan_expiration_date))->diff((new \DateTime()))->days;

            /* Get the language for the user */
            $language = language($user->language);

            /* Prepare the email */
            $email_template = get_email_template(
                [
                    '{{DAYS_UNTIL_EXPIRATION}}' => $days_until_expiration,
                ],
                $language->global->emails->user_plan_expiry_reminder->subject,
                [
                    '{{DAYS_UNTIL_EXPIRATION}}' => $days_until_expiration,
                    '{{USER_PLAN_RENEW_LINK}}' => url('pay/' . $user->plan_id),
                    '{{NAME}}' => $user->name,
                    '{{PLAN_NAME}}' => (new \Altum\Models\Plan())->get_plan_by_id($user->plan_id)->name,
                ],
                $language->global->emails->user_plan_expiry_reminder->body
            );

            send_mail($user->email, $email_template->subject, $email_template->body);

            /* Update user */
            db()->where('user_id', $user->user_id)->update('users', ['plan_expiry_reminder' => 1]);

            if(DEBUG) {
                echo sprintf('Email sent for user_id %s', $user->user_id);
            }
        }

    }

}
