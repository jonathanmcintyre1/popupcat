<?php
/*
 * @copyright Copyright (c) 2021 AltumCode (https://altumcode.com/)
 *
 * This software is exclusively sold through https://altumcode.com/ by the AltumCode author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://altumcode.com/.
 */

namespace Altum\Controllers;

use Altum\Alerts;
use Altum\Database\Database;
use Altum\Middlewares\Authentication;
use Altum\Middlewares\Csrf;

class Data extends Controller {

    public function index() {

        Authentication::guard();

        /* Prepare the filtering system */
        $filters = (new \Altum\Filters(['biolink_block_id', 'link_id', 'project_id', 'user_id', 'type', 'is_enabled'], [], ['datetime']));
        $filters->set_default_order_by('datum_id', 'DESC');

        /* Prepare the paginator */
        $total_rows = database()->query("SELECT COUNT(*) AS `total` FROM `data` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()}")->fetch_object()->total ?? 0;
        $paginator = (new \Altum\Paginator($total_rows, $filters->get_results_per_page(), $_GET['page'] ?? 1, url('data?' . $filters->get_get() . '&page=%d')));

        /* Get the data list for the user */
        $data = [];
        $data_result = database()->query("SELECT * FROM `data` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()} {$filters->get_sql_order_by()} {$paginator->get_sql_limit()}");
        while($row = $data_result->fetch_object()) {
            $row->data = json_decode($row->data);
            $data[] = $row;
        }

        /* Export handler */
        process_export_csv($data, 'include', ['datum_id', 'link_id', 'user_id', 'project_id', 'type', 'datetime'], sprintf(language()->data->title));
        process_export_json($data, 'include', ['datum_id', 'link_id', 'user_id', 'project_id', 'type', 'data', 'datetime'], sprintf(language()->data->title));

        /* Prepare the pagination view */
        $pagination = (new \Altum\Views\View('partials/pagination', (array) $this))->run(['paginator' => $paginator]);

        /* Existing projects */
        $projects = (new \Altum\Models\Project())->get_projects($this->user->user_id);

        /* Prepare the View */
        $data = [
            'data'              => $data,
            'total_data'        => $total_rows,
            'projects'          => $projects,
            'pagination'        => $pagination,
            'filters'           => $filters,
        ];

        $view = new \Altum\Views\View('data/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

    public function delete() {

        Authentication::guard();

        if(empty($_POST)) {
            die();
        }

        $datum_id = (int) Database::clean_string($_POST['datum_id']);

        //ALTUMCODE:DEMO if(DEMO) if($this->user->user_id == 1) Alerts::add_error('Please create an account on the demo to test out this function.');

        if(!Csrf::check()) {
            Alerts::add_error(language()->global->error_message->invalid_csrf_token);
        }

        if(!$datum = db()->where('datum_id', $datum_id)->where('user_id', $this->user->user_id)->getOne('data', ['datum_id'])) {
            redirect('data');
        }

        if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

            /* Delete the project */
            db()->where('datum_id', $datum_id)->delete('data');

            /* Set a nice success message */
            Alerts::add_success(language()->global->success_message->delete2);

            redirect('data');
        }

        redirect('data');
    }
}
