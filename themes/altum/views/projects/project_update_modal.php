<?php defined('ALTUMCODE') || die() ?>

<div class="modal fade" id="project_update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><?= language()->project_update_modal->header ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= language()->global->close ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="project_update" method="post" role="form">
                    <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" required="required" />
                    <input type="hidden" name="request_type" value="update" />
                    <input type="hidden" name="project_id" value="" />

                    <div class="notification-container"></div>

                    <div class="form-group">
                        <label for="update_name"><i class="fa fa-fw fa-signature fa-sm mr-1"></i> <?= language()->projects->input->name ?></label>
                        <input type="text" id="update_name" class="form-control" name="name"  />
                    </div>

                    <div class="form-group">
                        <label for="update_color"><i class="fa fa-fw fa-palette fa-sm mr-1"></i> <?= language()->projects->input->color ?></label>
                        <input type="color" id="update_color" name="color" class="form-control" value="#000000" required="required" />
                        <small class="text-muted form-text"><?= language()->projects->input->color_help ?></small>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->submit ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php ob_start() ?>
<script>
    /* On modal show load new data */
    $('#project_update').on('show.bs.modal', event => {
        let project_id = $(event.relatedTarget).data('project-id');
        let name = $(event.relatedTarget).data('name');
        let color = $(event.relatedTarget).data('color');

        $(event.currentTarget).find('input[name="project_id"]').val(project_id);
        $(event.currentTarget).find('input[name="name"]').val(name);
        $(event.currentTarget).find('input[name="color"]').val(color);
    });

    $('form[name="project_update"]').on('submit', event => {

        $.ajax({
            type: 'POST',
            url: 'project-ajax',
            data: $(event.currentTarget).serialize(),
            success: (data) => {
                let notification_container = event.currentTarget.querySelector('.notification-container');
                notification_container.innerHTML = '';

                if (data.status == 'error') {
                    display_notifications(data.message, 'error', notification_container);
                }

                else if(data.status == 'success') {

                    /* Hide modal */
                    $('#project_update').modal('hide');

                    /* Clear input values */
                    $('form[name="project_update"] input').val('');

                    redirect(`projects`);

                }
            },
            dataType: 'json'
        });

        event.preventDefault();
    })
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>