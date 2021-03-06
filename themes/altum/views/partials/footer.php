<?php defined('ALTUMCODE') || die() ?>

<footer class="d-print-none footer <?= \Altum\Routing\Router::$controller_key == 'index' ? 'm-0' : null ?>">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-4 mb-4 mb-sm-0">
                <div class="mb-2">
                    <a class="h5 p-0" href="<?= url() ?>">
                        <?= settings()->title ?>
                    </a>
                </div>

                <div><?= sprintf(language()->global->footer->copyright, date('Y'), settings()->title) ?></div>
            </div>

            <div class="col-12 col-sm-4 mb-4 mb-sm-0">

                    <div class="mb-2">
                        <?php foreach(require APP_PATH . 'includes/admin_socials.php' as $key => $value): ?>

                            <?php if(isset(settings()->socials->{$key}) && !empty(settings()->socials->{$key})): ?>
                            <span class="mr-2">
                                <a target="_blank" href="<?= sprintf($value['format'], settings()->socials->{$key}) ?>" title="<?= $value['name'] ?>" class="no-underline">
                                    <i class="<?= $value['icon'] ?> fa-fw fa-lg"></i>
                                </a>
                            </span>
                            <?php endif ?>

                        <?php endforeach ?>
                    </div>

                    <?php if(count(\Altum\Language::$languages) > 1): ?>
                        <div class="dropdown mb-2">
                            <a class="dropdown-toggle clickable" id="language_switch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-language text-muted"></i> <?= language()->global->language ?></a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="language_switch">
                                <h6 class="dropdown-header"><?= language()->global->choose_language ?></h6>
                                <?php foreach(\Altum\Language::$languages as $language_code => $language_name): ?>
                                    <a class="dropdown-item" href="<?= SITE_URL . $language_code . '/' . \Altum\Routing\Router::$original_request . '?set_language=' . $language_name ?>">
                                        <?php if($language_name == \Altum\Language::$language): ?>
                                            <i class="fa fa-fw fa-sm fa-check mr-1 text-success"></i>
                                        <?php else: ?>
                                            <i class="fa fa-fw fa-sm fa-circle-notch mr-1 text-muted"></i>
                                        <?php endif ?>

                                        <?= $language_name ?>
                                    </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if(count(\Altum\ThemeStyle::$themes) > 1): ?>
                        <div class="mb-2">
                            <a href="#" data-choose-theme-style="dark" class="<?= \Altum\ThemeStyle::get() == 'dark' ? 'd-none' : null ?>">
                                <i class="fa fa-fw fa-sm fa-moon text-muted mr-1"></i> <?= sprintf(language()->global->theme_style, language()->global->theme_style_dark) ?>
                            </a>
                            <a href="#" data-choose-theme-style="light" class="<?= \Altum\ThemeStyle::get() == 'light' ? 'd-none' : null ?>">
                                <i class="fa fa-fw fa-sm fa-sun text-muted mr-1"></i> <?= sprintf(language()->global->theme_style, language()->global->theme_style_light) ?>
                            </a>
                        </div>

                    <?php ob_start() ?>
                        <script>
                            document.querySelectorAll('[data-choose-theme-style]').forEach(theme => {

                                theme.addEventListener('click', event => {

                                    let chosen_theme_style = event.currentTarget.getAttribute('data-choose-theme-style');

                                    /* Set a cookie with the new theme style */
                                    set_cookie('theme_style', chosen_theme_style, 30, <?= json_encode(COOKIE_PATH) ?>);

                                    /* Change the css and button on the page */
                                    let css = document.querySelector(`#css_theme_style`);

                                    document.querySelector(`[data-theme-style]`).setAttribute('data-theme-style', chosen_theme_style);

                                    switch(chosen_theme_style) {
                                        case 'dark':
                                            css.setAttribute('href', <?= json_encode(ASSETS_FULL_URL . 'css/' . \Altum\ThemeStyle::$themes['dark'][language()->direction] . '?v=' . PRODUCT_CODE) ?>);
                                            document.querySelector(`[data-choose-theme-style="dark"]`).classList.add('d-none');
                                            document.querySelector(`[data-choose-theme-style="light"]`).classList.remove('d-none');
                                            break;

                                        case 'light':
                                            css.setAttribute('href', <?= json_encode(ASSETS_FULL_URL . 'css/' . \Altum\ThemeStyle::$themes['light'][language()->direction] . '?v=' . PRODUCT_CODE) ?>);
                                            document.querySelector(`[data-choose-theme-style="dark"]`).classList.remove('d-none');
                                            document.querySelector(`[data-choose-theme-style="light"]`).classList.add('d-none');
                                            break;
                                    }

                                    event.preventDefault();
                                });

                            })
                        </script>
                        <?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

                    <?php endif ?>

                </div>

            <div class="col-12 col-sm-4 mb-4 mb-sm-0">
                <?php foreach($data->pages as $data): ?>
                   <a href="<?= $data->url ?>" target="<?= $data->target ?>"><?= $data->title ?></a><br />
                <?php endforeach ?>
            </div>

        </div>
    </div>
</footer>
