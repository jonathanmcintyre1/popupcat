<?php

/* The pro notifications pack */
return [
    'INFORMATIONAL_BAR' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->informational_bar->title_default,
        'description' => \Altum\Language::get()->notification->informational_bar->description_default,
        'image' => \Altum\Language::get()->notification->informational_bar->image_default,
        'url'   => '',
        'url_new_tab' => true,

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'top',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'description_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',

        'border_radius' => 'straight',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => false,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut'
    ],

    'IMAGE' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->image->title_default,
        'image' => \Altum\Language::get()->notification->image->image_default,
        'button_url'   => '',
        'button_text'  => \Altum\Language::get()->notification->image->button_text_default,

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#000',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',
    ],

    'COLLECTOR_BAR' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->collector_bar->title_default,
        'input_placeholder' => \Altum\Language::get()->notification->collector_bar->input_placeholder_default,
        'button_text' => \Altum\Language::get()->notification->collector_bar->button_text_default,
        'show_agreement' => false,
        'agreement_text' => \Altum\Language::get()->notification->collector_bar->agreement_text_default,
        'agreement_url' => '',
        'thank_you_url' => '',

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'top',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'straight',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => false,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',

        'data_send_is_enabled' => 0,
        'data_send_webhook' => '',
        'data_send_email' => '',
    ],

    'COUPON_BAR' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->coupon_bar->title_default,
        'coupon_code' => \Altum\Language::get()->notification->coupon_bar->coupon_code_default,
        'url'   => '',
        'url_new_tab' => true,

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'top',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'coupon_code_color' => '#fff',
        'coupon_code_background_color' => '#000',
        'coupon_code_border_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',

        'border_radius' => 'straight',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => false,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut'
    ],

    'BUTTON_BAR' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->button_bar->title_default,
        'button_text' => \Altum\Language::get()->notification->button_bar->button_text_default,
        'url'   => '',
        'url_new_tab' => true,

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'top',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'button_color' => '#fff',
        'button_background_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',

        'border_radius' => 'straight',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => false,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut'
    ],

    'COLLECTOR_MODAL' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->collector_modal->title_default,
        'description' => \Altum\Language::get()->notification->collector_modal->description_default,
        'image' => \Altum\Language::get()->notification->collector_modal->image_default,
        'input_placeholder' => \Altum\Language::get()->notification->collector_modal->input_placeholder_default,
        'button_text' => \Altum\Language::get()->notification->collector_modal->button_text_default,
        'show_agreement' => false,
        'agreement_text' => \Altum\Language::get()->notification->collector_modal->agreement_text_default,
        'agreement_url' => '',
        'thank_you_url' => '',

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'description_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',

        'data_send_is_enabled' => 0,
        'data_send_webhook' => '',
        'data_send_email' => '',
    ],

    'COLLECTOR_TWO_MODAL' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->collector_two_modal->title_default,
        'description' => \Altum\Language::get()->notification->collector_two_modal->description_default,
        'image' => \Altum\Language::get()->notification->collector_two_modal->image_default,
        'input_placeholder' => \Altum\Language::get()->notification->collector_two_modal->input_placeholder_default,
        'button_text' => \Altum\Language::get()->notification->collector_two_modal->button_text_default,
        'show_agreement' => false,
        'agreement_text' => \Altum\Language::get()->notification->collector_two_modal->agreement_text_default,
        'agreement_url' => '',
        'thank_you_url' => '',

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'description_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',

        'data_send_is_enabled' => 0,
        'data_send_webhook' => '',
        'data_send_email' => '',
    ],

    'BUTTON_MODAL' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->button_modal->title_default,
        'description' => \Altum\Language::get()->notification->button_modal->description_default,
        'image' => \Altum\Language::get()->notification->button_modal->image_default,
        'button_text' => \Altum\Language::get()->notification->button_modal->button_text_default,
        'button_url'   => '',

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'description_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',
    ],

    'TEXT_FEEDBACK' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->text_feedback->title_default,
        'description' => \Altum\Language::get()->notification->text_feedback->description_default,
        'input_placeholder' => \Altum\Language::get()->notification->text_feedback->input_placeholder_default,
        'button_text' => \Altum\Language::get()->notification->text_feedback->button_text_default,

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'description_color' => '#000',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',

        'data_send_is_enabled' => 0,
        'data_send_webhook' => '',
        'data_send_email' => '',
    ],

    'ENGAGEMENT_LINKS' => [
        'type' => 'pro',
        'title' => \Altum\Language::get()->notification->engagement_links->title,
        'categories' => json_decode(json_encode(\Altum\Language::get()->notification->engagement_links->categories), false),

        'trigger_all_pages' => true,
        'triggers' => [],
        'display_trigger' => 'delay',
        'display_trigger_value' => 2,
        'display_frequency' => 'all_time',
        'display_mobile' => true,
        'display_desktop' => true,

        'display_duration' => 5,
        'display_position' => 'bottom_left',
        'display_close_button' => true,
        'display_branding' => true,

        'title_color' => '#000',
        'categories_title_color' => '#000',
        'categories_description_color' => '#000',
        'categories_links_title_color' => '#000',
        'categories_links_description_color' => '#000',
        'categories_links_background_color' => '#e2e2e2',
        'categories_links_border_color' => '#fff',
        'background_color' => '#fff',
        'background_pattern' => false,
        'background_pattern_svg' => '',
        'button_background_color' => '#272727',
        'button_color' => '#fff',
        'border_radius' => 'rounded',
        'border_color' => '#000',
        'border_width' => 0,
        'shadow'        => true,

        'on_animation' => 'fadeIn',
        'off_animation' => 'fadeOut',
    ],
];