<?php defined('ALTUMCODE') || die() ?>

<form name="update_biolink_" method="post" role="form">
    <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="block_type" value="vcard" />
    <input type="hidden" name="biolink_block_id" value="<?= $row->biolink_block_id ?>" />

    <div class="notification-container"></div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="<?= 'vcard_first_name_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-signature fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_first_name ?></label>
                <input type="text" id="<?= 'vcard_first_name_' . $row->biolink_block_id ?>" name="vcard_first_name" class="form-control" value="<?= $row->settings->vcard_first_name ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['first_name']['max_length'] ?>" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="<?= 'vcard_last_name_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-signature fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_last_name ?></label>
                <input type="text" id="<?= 'vcard_last_name_' . $row->biolink_block_id ?>" name="vcard_last_name" class="form-control" value="<?= $row->settings->vcard_last_name ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['last_name']['max_length'] ?>" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_phone_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-phone-square-alt fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_phone ?></label>
        <input type="text" id="<?= 'vcard_phone_' . $row->biolink_block_id ?>" name="vcard_phone" class="form-control" value="<?= $row->settings->vcard_phone ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['phone']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_email_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-envelope fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_email ?></label>
        <input type="email" id="<?= 'vcard_email_' . $row->biolink_block_id ?>" name="vcard_email" class="form-control" value="<?= $row->settings->vcard_email ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['email']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_url_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-link fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_url ?></label>
        <input type="url" id="<?= 'vcard_url_' . $row->biolink_block_id ?>" name="vcard_url" class="form-control" value="<?= $row->settings->vcard_url ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['url']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_company_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-building fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_company ?></label>
        <input type="text" id="<?= 'vcard_company_' . $row->biolink_block_id ?>" name="vcard_company" class="form-control" value="<?= $row->settings->vcard_company ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['company']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_job_title_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-user-tie fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_job_title ?></label>
        <input type="text" id="<?= 'vcard_job_title_' . $row->biolink_block_id ?>" name="vcard_job_title" class="form-control" value="<?= $row->settings->vcard_job_title ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['job_title']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_birthday_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-birthday-cake fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_birthday ?></label>
        <input type="date" id="<?= 'vcard_birthday_' . $row->biolink_block_id ?>" name="vcard_birthday" class="form-control" value="<?= $row->settings->vcard_birthday ?? null ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_street_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-road fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_street ?></label>
        <input type="text" id="<?= 'vcard_street_' . $row->biolink_block_id ?>" name="vcard_street" class="form-control" value="<?= $row->settings->vcard_street ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['street']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_city_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-city fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_city ?></label>
        <input type="text" id="<?= 'vcard_city_' . $row->biolink_block_id ?>" name="vcard_city" class="form-control" value="<?= $row->settings->vcard_city ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['city']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_zip_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-mail-bulk fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_zip ?></label>
        <input type="text" id="<?= 'vcard_zip_' . $row->biolink_block_id ?>" name="vcard_zip" class="form-control" value="<?= $row->settings->vcard_zip ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['zip']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_region_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-flag fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_region ?></label>
        <input type="text" id="<?= 'vcard_region_' . $row->biolink_block_id ?>" name="vcard_region" class="form-control" value="<?= $row->settings->vcard_region ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['region']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_country_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-globe fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_country ?></label>
        <input type="text" id="<?= 'vcard_country_' . $row->biolink_block_id ?>" name="vcard_country" class="form-control" value="<?= $row->settings->vcard_country ?? null ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['country']['max_length'] ?>" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_note_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_vcard_modal->vcard_note ?></label>
        <textarea id="<?= 'vcard_note_' . $row->biolink_block_id ?>" name="vcard_note" class="form-control" maxlength="<?= $data->biolink_blocks['vcard']['fields']['note']['max_length'] ?>"><?= $row->settings->vcard_note ?? null ?></textarea>
    </div>

    <button class="btn btn-block btn-gray-300 my-4" type="button" data-toggle="collapse" data-target="#<?= 'vcard_socials_container_' . $row->biolink_block_id ?>" aria-expanded="false" aria-controls="<?= 'vcard_socials_container_' . $row->biolink_block_id ?>">
        <?= language()->create_biolink_vcard_modal->vcard_socials ?>
    </button>

    <div class="collapse" id="<?= 'vcard_socials_container_' . $row->biolink_block_id ?>">
        <div id="<?= 'vcard_socials_' . $row->biolink_block_id ?>" data-biolink-block-id="<?= $row->biolink_block_id ?>">
            <?php foreach($row->settings->vcard_socials ?? [] as $key => $social): ?>
                <div class="mb-4">
                    <div class="form-group">
                        <label for="<?= 'vcard_social_label_' . $key . '_' . $row->biolink_block_id ?>"><?= language()->create_biolink_vcard_modal->vcard_social_label ?></label>
                        <input id="<?= 'vcard_social_label_' . $key . '_' . $row->biolink_block_id ?>" type="text" name="vcard_social_label[<?= $key ?>]" class="form-control" value="<?= $social->label ?>" maxlength="<?= $data->biolink_blocks['vcard']['fields']['social_label']['max_length'] ?>" required="required" />
                    </div>

                    <div class="form-group">
                        <label for="<?= 'vcard_social_value_' . $key . '_' . $row->biolink_block_id ?>"><?= language()->create_biolink_vcard_modal->vcard_social_value ?></label>
                        <input id="<?= 'vcard_social_value_' . $key . '_' . $row->biolink_block_id ?>" type="url" name="vcard_social_value[<?= $key ?>]" value="<?= $social->value ?>" class="form-control" maxlength="<?= $data->biolink_blocks['vcard']['fields']['social_value']['max_length'] ?>" required="required" />
                    </div>

                    <button type="button" data-remove="vcard_social" class="btn btn-sm btn-block btn-outline-danger"><i class="fa fa-fw fa-times"></i> <?= language()->global->delete ?></button>
                </div>
            <?php endforeach ?>
        </div>

        <div class="mb-3">
            <button data-add="vcard_social" data-biolink-block-id="<?= $row->biolink_block_id ?>" type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-fw fa-plus-circle"></i> <?= language()->global->create ?></button>
        </div>
    </div>

    <hr class="my-3 border-gray-200" />

    <div class="form-group">
        <label for="<?= 'vcard_name_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->name ?></label>
        <input id="<?= 'vcard_name_' . $row->biolink_block_id ?>" type="text" name="name" class="form-control" value="<?= $row->settings->name ?>" maxlength="128" required="required" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_image_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-image fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->image ?></label>
        <div data-image-container class="<?= !empty($row->settings->image) ? null : 'd-none' ?>">
            <div class="row">
                <div class="m-1 col-6 col-xl-3">
                    <img src="<?= $row->settings->image ? UPLOADS_FULL_URL . 'block_thumbnail_images/' . $row->settings->image : null ?>" class="img-fluid rounded <?= !empty($row->settings->image) ? null : 'd-none' ?>" loading="lazy" />
                </div>
            </div>
            <div class="custom-control custom-checkbox my-2">
                <input id="<?= $row->biolink_block_id . '_image_remove' ?>" name="image_remove" type="checkbox" class="custom-control-input" onchange="this.checked ? document.querySelector('#<?= 'vcard_image_' . $row->biolink_block_id ?>').classList.add('d-none') : document.querySelector('#<?= 'vcard_image_' . $row->biolink_block_id ?>').classList.remove('d-none')">
                <label class="custom-control-label" for="<?= $row->biolink_block_id . '_image_remove' ?>">
                    <span class="text-muted"><?= language()->global->delete_file ?></span>
                </label>
            </div>
        </div>
        <input id="<?= 'vcard_image_' . $row->biolink_block_id ?>" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file" />
    </div>

    <div class="form-group">
        <label for="<?= 'vcard_icon_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-globe fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->icon ?></label>
        <input id="<?= 'vcard_icon_' . $row->biolink_block_id ?>" type="text" name="icon" class="form-control" value="<?= $row->settings->icon ?>" placeholder="<?= language()->create_biolink_link_modal->input->icon_placeholder ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_link_modal->input->icon_help ?></small>
    </div>

    <div <?= $this->user->plan_settings->custom_colored_links ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>>
        <div class="<?= $this->user->plan_settings->custom_colored_links ? null : 'container-disabled' ?>">
            <div class="form-group">
                <label for="<?= 'vcard_text_color_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->text_color ?></label>
                <input id="<?= 'vcard_text_color_' . $row->biolink_block_id ?>" type="hidden" name="text_color" class="form-control" value="<?= $row->settings->text_color ?>" required="required" />
                <div class="text_color_pickr"></div>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_background_color_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-fill fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->background_color ?></label>
                <input id="<?= 'vcard_background_color_' . $row->biolink_block_id ?>" type="hidden" name="background_color" class="form-control" value="<?= $row->settings->background_color ?>" required="required" />
                <div class="background_color_pickr"></div>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_border_width_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-border-style fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->border_width ?></label>
                <input id="<?= 'vcard_border_width_' . $row->biolink_block_id ?>" type="number" min="0" max="5" class="form-control" name="border_width" value="<?= $row->settings->border_width ?>" required="required" />
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_border_color_' . $row->biolink_block_id ?>"><i class="fa fa-fw fa-fill fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->border_color ?></label>
                <input id="<?= 'vcard_border_color_' . $row->biolink_block_id ?>" type="hidden" name="border_color" class="form-control" value="<?= $row->settings->border_color ?>" required="required" />
                <div class="border_color_pickr"></div>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_border_radius_' . $row->biolink_block_id ?>"><?= language()->create_biolink_link_modal->input->border_radius ?></label>
                <select id="<?= 'vcard_border_radius_' . $row->biolink_block_id ?>" name="border_radius" class="form-control">
                    <option value="straight" <?= $row->settings->border_radius == 'straight' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_straight ?></option>
                    <option value="round" <?= $row->settings->border_radius == 'round' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_round ?></option>
                    <option value="rounded" <?= $row->settings->border_radius == 'rounded' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_rounded ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_border_style_' . $row->biolink_block_id ?>"><?= language()->create_biolink_link_modal->input->border_style ?></label>
                <select id="<?= 'vcard_border_style_' . $row->biolink_block_id ?>" name="border_style" class="form-control">
                    <option value="solid" <?= $row->settings->border_style == 'solid' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_style_solid ?></option>
                    <option value="dashed" <?= $row->settings->border_style == 'dashed' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_style_dashed ?></option>
                    <option value="double" <?= $row->settings->border_style == 'double' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_style_double ?></option>
                    <option value="outset" <?= $row->settings->border_style == 'outset' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_style_outset ?></option>
                    <option value="inset" <?= $row->settings->border_style == 'inset' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_style_inset ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_animation_' . $row->biolink_block_id ?>"><?= language()->create_biolink_link_modal->input->animation ?></label>
                <select id="<?= 'vcard_animation_' . $row->biolink_block_id ?>" name="animation" class="form-control">
                    <option value="false" <?= !$row->settings->animation ? 'selected="selected"' : null ?>>-</option>
                    <?php foreach(require APP_PATH . 'includes/biolink_animations.php' as $animation): ?>
                        <option value="<?= $animation ?>" <?= $row->settings->animation == $animation ? 'selected="selected"' : null ?>><?= $animation ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="<?= 'vcard_animation_runs_' . $row->biolink_block_id ?>"><?= language()->create_biolink_link_modal->input->animation_runs ?></label>
                <select id="<?= 'vcard_animation_runs_' . $row->biolink_block_id ?>" name="animation_runs" class="form-control">
                    <option value="repeat-1" <?= $row->settings->animation_runs == 'repeat-1' ? 'selected="selected"' : null ?>>1</option>
                    <option value="repeat-2" <?= $row->settings->animation_runs == 'repeat-2' ? 'selected="selected"' : null ?>>2</option>
                    <option value="repeat-3" <?= $row->settings->animation_runs == 'repeat-3' ? 'selected="selected"' : null ?>>3</option>
                    <option value="infinite" <?= $row->settings->animation_runs == 'repeat-infinite' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->animation_runs_infinite ?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
    </div>
</form>
