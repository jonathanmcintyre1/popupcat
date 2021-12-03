<?php defined('ALTUMCODE') || die() ?>
<!DOCTYPE html>
<html lang="<?= \Altum\Language::$language_code ?>" class="link-html" dir="<?= language()->direction ?>">
    <head>
        <title><?= !empty($this->link->settings->seo->title) ? $this->link->settings->seo->title : \Altum\Title::get() ?></title>
        <base href="<?= SITE_URL; ?>">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <?php if(\Altum\Meta::$description): ?>
            <meta name="description" content="<?= \Altum\Meta::$description ?>" />
        <?php endif ?>

        <?php if(\Altum\Meta::$open_graph['url']): ?>
            <!-- Open Graph / Facebook / Twitter -->
            <?php foreach(\Altum\Meta::$open_graph as $key => $value): ?>
                <?php if($value): ?>
                    <meta property="og:<?= $key ?>" content="<?= $value ?>" />
                    <meta property="twitter:<?= $key ?>" content="<?= $value ?>" />
                <?php endif ?>
            <?php endforeach ?>
        <?php endif ?>

        <?php
        /* Block search engine indexing if the user wants, and if the system viewing links (for preview) are used */
        if($this->link->settings->seo->block || \Altum\Routing\Router::$original_request == 'l/link'):
        ?>
            <meta name="robots" content="noindex">
        <?php endif ?>

        <?php if(!empty($this->link->settings->favicon)): ?>
            <link href="<?= UPLOADS_FULL_URL . 'favicons/' . $this->link->settings->favicon ?>" rel="shortcut icon" />
        <?php elseif(!empty(settings()->favicon)): ?>
            <link href="<?= UPLOADS_FULL_URL . 'favicon/' . settings()->favicon ?>" rel="shortcut icon" />
        <?php endif ?>

        <?php foreach(['bootstrap.min.css', 'custom.css', 'link-custom.css', 'animate.min.css'] as $file): ?>
            <link href="<?= ASSETS_FULL_URL . 'css/' . $file . '?v=' . PRODUCT_CODE ?>" rel="stylesheet" media="screen">
        <?php endforeach ?>

        <?php if($this->link->settings->font): ?>
            <?php $biolink_fonts = require APP_PATH . 'includes/biolink_fonts.php' ?>
            <?php if($biolink_fonts[$this->link->settings->font]['font_css_url']): ?>
                <link href="<?= $biolink_fonts[$this->link->settings->font]['font_css_url'] ?>" rel="stylesheet">
            <?php endif ?>

            <style>html, body {font-family: '<?= $biolink_fonts[$this->link->settings->font]['name'] ?>', "Helvetica Neue", Arial, sans-serif !important;}</style>
        <?php endif ?>
        <style>html {font-size: <?= (int) ($this->link->settings->font_size ?? 16) . 'px' ?> !important;}</style>

        <?= \Altum\Event::get_content('head') ?>

        <?php if(!empty(settings()->custom->head_js_biolink)): ?>
            <?= settings()->custom->head_js_biolink ?>
        <?php endif ?>

        <?php if(!empty(settings()->custom->head_css_biolink)): ?>
            <style><?= settings()->custom->head_css_biolink ?></style>
        <?php endif ?>

        <link rel="canonical" href="<?= $this->link->full_url ?>" />
    </head>

    <?= $this->views['content'] ?>

    <?php require THEME_PATH . 'views/partials/js_global_variables.php' ?>

    <?php foreach(['libraries/jquery.min.js', 'libraries/popper.min.js', 'libraries/bootstrap.min.js', 'main.js', 'functions.js', 'libraries/fontawesome-all.min.js'] as $file): ?>
        <script src="<?= ASSETS_FULL_URL ?>js/<?= $file ?>?v=<?= PRODUCT_CODE ?>"></script>
    <?php endforeach ?>

    <?= \Altum\Event::get_content('javascript') ?>
</html>
