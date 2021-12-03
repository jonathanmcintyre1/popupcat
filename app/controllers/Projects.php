<?php
/*
 * @copyright Copyright (c) 2021 AltumCode (https://altumcode.com/)
 *
 * This software is exclusively sold through https://altumcode.com/ by the AltumCode author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://altumcode.com/.
 */

namespace Altum\Controllers;

use Altum\Middlewares\Authentication;

class Projects extends Controller {

    public function index() {

        Authentication::guard();

        /* Prepare the filtering system */
        $filters = (new \Altum\Filters(['is_enabled'], ['name'], ['name', 'datetime']));
        $filters->set_default_order_by('project_id', 'DESC');

        /* Prepare the paginator */
        $total_rows = database()->query("SELECT COUNT(*) AS `total` FROM `projects` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()}")->fetch_object()->total ?? 0;
        $paginator = (new \Altum\Paginator($total_rows, $filters->get_results_per_page(), $_GET['page'] ?? 1, url('projects?' . $filters->get_get() . '&page=%d')));

        /* Get the projects list for the user */
        $projects = [];
        $projects_result = database()->query("SELECT * FROM `projects` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()} {$filters->get_sql_order_by()} {$paginator->get_sql_limit()}");
        while($row = $projects_result->fetch_object()) $projects[] = $row;

        /* Export handler */
        process_export_csv($projects, 'include', ['project_id', 'user_id', 'name', 'color', 'last_datetime', 'datetime'], sprintf(language()->projects->title));
        process_export_json($projects, 'include', ['project_id', 'user_id', 'name', 'color', 'last_datetime', 'datetime'], sprintf(language()->projects->title));

        /* Prepare the pagination view */
        $pagination = (new \Altum\Views\View('partials/pagination', (array) $this))->run(['paginator' => $paginator]);

        /* Prepare the View */
        $data = [
            'projects' => $projects,
            'total_projects' => $total_rows,
            'pagination' => $pagination,
            'filters' => $filters,
        ];

        $view = new \Altum\Views\View('projects/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
