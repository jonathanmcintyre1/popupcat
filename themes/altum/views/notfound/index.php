<?php defined('ALTUMCODE') || die() ?>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<div class="container">
    <div class="d-flex align-items-center flex-column flex-lg-row">
        <img src="<?= ASSETS_FULL_URL . 'images/404.svg' ?>" class="col-10 col-md-7 col-lg-5 mb-5 mb-lg-0 mr-lg-3" loading="lazy" />

        <div>
            <h1><?= language()->notfound->header ?></h1>
            <p class="text-muted"><?= language()->notfound->subheader ?></p>

            <a href="<?= url() ?>" class="btn btn-outline-secondary mt-2">
                <i class="fa fa-fw fa-sm fa-home mr-1"></i> <?= language()->notfound->button ?>
            </a>
        </div>
    </div>
</div>
