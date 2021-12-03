<?php defined('ALTUMCODE') || die() ?>

<div class="d-flex justify-content-between mb-4">
    <h1 class="h3"><i class="fa fa-fw fa-xs fa-bell text-primary-900 mr-2"></i> <?= language()->admin_notifications->header ?></h1>

    <div class="col-auto d-flex">
        <div class="ml-3">
            <div class="dropdown">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle-simple" data-toggle="dropdown" data-boundary="viewport" title="<?= language()->global->export ?>">
                    <i class="fa fa-fw fa-sm fa-download"></i>
                </button>

                <div class="dropdown-menu  dropdown-menu-right">
                    <a href="<?= url('admin/notifications?' . $data->filters->get_get() . '&export=csv') ?>" target="_blank" class="dropdown-item">
                        <i class="fa fa-fw fa-sm fa-file-csv mr-1"></i> <?= language()->global->export_csv ?>
                    </a>
                    <a href="<?= url('admin/notifications?' . $data->filters->get_get() . '&export=json') ?>" target="_blank" class="dropdown-item">
                        <i class="fa fa-fw fa-sm fa-file-code mr-1"></i> <?= language()->global->export_json ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="ml-3">
            <div class="dropdown">
                <button type="button" class="btn <?= count($data->filters->get) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> filters-button dropdown-toggle-simple" data-toggle="dropdown" data-boundary="viewport"><i class="fa fa-fw fa-sm fa-filter"></i></button>

                <div class="dropdown-menu dropdown-menu-right filters-dropdown">
                    <div class="dropdown-header d-flex justify-content-between">
                        <span class="h6 m-0"><?= language()->global->filters->header ?></span>

                        <?php if(count($data->filters->get)): ?>
                            <a href="<?= url('admin/notifications') ?>" class="text-muted"><?= language()->global->filters->reset ?></a>
                        <?php endif ?>
                    </div>

                    <div class="dropdown-divider"></div>

                    <form action="" method="get" role="form">
                        <div class="form-group px-4">
                            <label for="filters_search" class="small"><?= language()->global->filters->search ?></label>
                            <input type="search" name="search" id="filters_search" class="form-control form-control-sm" value="<?= $data->filters->search ?>" />
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_search_by" class="small"><?= language()->global->filters->search_by ?></label>
                            <select name="search_by" id="filters_search_by" class="form-control form-control-sm">
                                <option value="name" <?= $data->filters->search_by == 'name' ? 'selected="selected"' : null ?>><?= language()->admin_notifications->filters->search_by_name ?></option>
                            </select>
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_is_enabled" class="small"><?= language()->global->filters->status ?></label>
                            <select name="is_enabled" id="filters_is_enabled" class="form-control form-control-sm">
                                <option value=""><?= language()->global->filters->all ?></option>
                                <option value="1" <?= isset($data->filters->filters['is_enabled']) && $data->filters->filters['is_enabled'] == '1' ? 'selected="selected"' : null ?>><?= language()->global->active ?></option>
                                <option value="0" <?= isset($data->filters->filters['is_enabled']) && $data->filters->filters['is_enabled'] == '0' ? 'selected="selected"' : null ?>><?= language()->global->disabled ?></option>
                            </select>
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_type" class="small"><?= language()->admin_notifications->filters->type ?></label>
                            <select name="type" id="filters_type" class="form-control form-control-sm">
                                <option value=""><?= language()->global->filters->all ?></option>
                                <?php foreach(\Altum\Notification::get_config() as $notification_type => $notification): ?>
                                    <option value="<?= $notification_type ?>" <?= isset($data->filters->filters['type']) && $data->filters->filters['type'] == $notification_type ? 'selected="selected"' : null ?>>
                                        <?= language()->notification->{mb_strtolower($notification_type)}->name ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_order_by" class="small"><?= language()->global->filters->order_by ?></label>
                            <select name="order_by" id="filters_order_by" class="form-control form-control-sm">
                                <option value="datetime" <?= $data->filters->order_by == 'datetime' ? 'selected="selected"' : null ?>><?= language()->global->filters->order_by_datetime ?></option>
                                <option value="name" <?= $data->filters->order_by == 'name' ? 'selected="selected"' : null ?>><?= language()->admin_notifications->filters->order_by_name ?></option>
                            </select>
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_order_type" class="small"><?= language()->global->filters->order_type ?></label>
                            <select name="order_type" id="filters_order_type" class="form-control form-control-sm">
                                <option value="ASC" <?= $data->filters->order_type == 'ASC' ? 'selected="selected"' : null ?>><?= language()->global->filters->order_type_asc ?></option>
                                <option value="DESC" <?= $data->filters->order_type == 'DESC' ? 'selected="selected"' : null ?>><?= language()->global->filters->order_type_desc ?></option>
                            </select>
                        </div>

                        <div class="form-group px-4">
                            <label for="filters_results_per_page" class="small"><?= language()->global->filters->results_per_page ?></label>
                            <select name="results_per_page" id="filters_results_per_page" class="form-control form-control-sm">
                                <?php foreach($data->filters->allowed_results_per_page as $key): ?>
                                    <option value="<?= $key ?>" <?= $data->filters->results_per_page == $key ? 'selected="selected"' : null ?>><?= $key ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group px-4 mt-4">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary btn-block"><?= language()->global->submit ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="ml-3">
            <button id="bulk_enable" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="<?= language()->global->bulk_actions ?>"><i class="fa fa-fw fa-sm fa-list"></i></button>

            <div id="bulk_group" class="btn-group d-none" role="group">
                <div class="btn-group" role="group">
                    <button id="bulk_actions" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                        <?= language()->global->bulk_actions ?> <span id="bulk_counter" class="d-none"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="bulk_actions">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#bulk_delete_modal"><?= language()->global->delete ?></a>
                    </div>
                </div>

                <button id="bulk_disable" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="<?= language()->global->close ?>"><i class="fa fa-fw fa-times"></i></button>
            </div>
        </div>

    </div>
</div>

<?= \Altum\Alerts::output_alerts() ?>

<form id="table" action="<?= SITE_URL . 'admin/notifications/bulk' ?>" method="post" role="form">
    <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" />
    <input type="hidden" name="type" value="" data-bulk-type />

<div class="table-responsive table-custom-container">
    <table class="table table-custom">
        <thead>
        <tr>
            <th data-bulk-table class="d-none">
                <div class="custom-control custom-checkbox">
                    <input id="bulk_select_all" type="checkbox" class="custom-control-input" />
                    <label class="custom-control-label" for="bulk_select_all"></label>
                </div>
            </th>
            <th><?= language()->admin_notifications->table->user ?></th>
            <th><?= language()->admin_notifications->table->notification ?></th>
            <th><?= language()->admin_notifications->table->status ?></th>
            <th><?= language()->admin_notifications->table->datetime ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data->notifications as $row): ?>
            <?php //ALTUMCODE:DEMO if(DEMO) {$row->user_email = 'hidden@demo.com'; $row->user_name = $row->name = 'hidden on demo';} ?>
            <tr>
                <td data-bulk-table class="d-none">
                    <div class="custom-control custom-checkbox">
                        <input id="selected_notification_id_<?= $row->notification_id ?>" type="checkbox" class="custom-control-input" name="selected[]" value="<?= $row->notification_id ?>" />
                        <label class="custom-control-label" for="selected_notification_id_<?= $row->notification_id ?>"></label>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column">
                        <div>
                            <a href="<?= url('admin/user-view/' . $row->user_id) ?>"><?= $row->user_name ?></a>
                        </div>

                        <span class="text-muted"><?= $row->user_email ?></span>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column">
                        <span>
                            <?= $row->name ?>
                        </span>
                        <div class="text-muted">
                            <?= language()->notification->{mb_strtolower($row->type)}->name ?>
                        </div>
                    </div>
                </td>
                <td>
                    <?php if($row->is_enabled == 0): ?>
                    <span class="badge badge-pill badge-warning"><i class="fa fa-fw fa-eye-slash"></i> <?= language()->global->disabled ?>
                    <?php elseif($row->is_enabled == 1): ?>
                    <span class="badge badge-pill badge-success"><i class="fa fa-fw fa-check"></i> <?= language()->global->active ?>
                    <?php endif ?>
                </td>
                <td>
                    <span class="text-muted" data-toggle="tooltip" title="<?= \Altum\Date::get($row->datetime) ?>">
                        <?= \Altum\Date::get($row->datetime, 2) ?>
                    </span>
                </td>
                <td>
                    <?= include_view(THEME_PATH . 'views/admin/notifications/admin_notification_dropdown_button.php', ['id' => $row->notification_id]) ?>
                </td>
            </tr>
        <?php endforeach ?>

        </tbody>
    </table>
</div>
</form>

<div class="mt-3"><?= $data->pagination ?></div>

<?php require THEME_PATH . 'views/admin/partials/js_bulk.php' ?>
<?php \Altum\Event::add_content(include_view(THEME_PATH . 'views/admin/notifications/notification_delete_modal.php'), 'modals'); ?>
<?php \Altum\Event::add_content(include_view(THEME_PATH . 'views/admin/partials/bulk_delete_modal.php'), 'modals'); ?>
