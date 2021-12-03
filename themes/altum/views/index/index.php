<?php defined('ALTUMCODE') || die() ?>

<div class="index-container">
    <?= $this->views['index_menu'] ?>

    <div class="container my-9">
        <?= \Altum\Alerts::output_alerts() ?>

        <div class="row">
            <div class="col">
                <div class="text-left">
                    <h1 class="index-header mb-4"><?= language()->index->header ?></h1>
                    <p class="index-subheader mb-5"><?= language()->index->subheader ?></p>

                    <div class="d-flex flex-column flex-lg-row">
                        <a href="<?= url('register') ?>" class="btn btn-primary index-button mb-3 mb-lg-0 mr-lg-3"><?= language()->index->sign_up ?></a>
                        <a href="<?= url('example') ?>" target="_blank" class="btn btn-outline-dark index-button mb-3 mb-lg-0"><?= language()->index->example ?> <i class="fa fa-fw fa-xs fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block col">
                <img src="<?= ASSETS_FULL_URL . 'images/hero.png' ?>" class="index-image" loading="lazy" />
            </div>
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="row">
        <div class="col-lg-7 mb-5">
            <img src="<?= ASSETS_FULL_URL . 'images/index/bio-link.png' ?>" class="img-fluid shadow" loading="lazy" />
        </div>

        <div class="col-lg-5 mb-5 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fa fa-users fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= language()->index->presentation1->header ?></h2>
                <p class="mt-3"><?= language()->index->presentation1->subheader ?></p>

                <ul class="list-style-none mt-4">
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation1->feature1 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation1->feature2 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation1->feature3 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation1->feature4 ?></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="row">
        <div class="col-lg-5 mb-5 d-flex align-items-center order-1 order-lg-0">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fa fa-link fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= language()->index->presentation2->header ?></h2>
                <p class="mt-3"><?= language()->index->presentation2->subheader ?></p>

                <ul class="list-style-none mt-4">
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation2->feature1 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation2->feature2 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation2->feature3 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation2->feature4 ?></div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-7 mb-5 order-0 order-lg-1">
            <img src="<?= ASSETS_FULL_URL . 'images/index/short-link.png' ?>" class="img-fluid shadow" loading="lazy" />
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="row">
        <div class="col-lg-7 mb-5">
            <img src="<?= ASSETS_FULL_URL . 'images/index/qr-code.png' ?>" class="img-fluid shadow" loading="lazy" />
        </div>

        <div class="col-lg-5 mb-5 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fa fa-qrcode fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= language()->index->presentation3->header ?></h2>
                <p class="mt-3"><?= language()->index->presentation3->subheader ?></p>

                <ul class="list-style-none mt-4">
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation3->feature1 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation3->feature2 ?></div>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fa fa-fw fa-sm fa-check-circle text-primary mr-3"></i>
                        <div><?= language()->index->presentation3->feature3 ?></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="row">
        <div class="col-lg-5 mb-5 d-flex align-items-center order-1 order-lg-0">
            <div>
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x text-primary-100"></i>
                    <i class="fa fa-chart-line fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= language()->index->presentation4->header ?></h2>

                <p class="mt-3"><?= language()->index->presentation4->subheader ?></p>
            </div>
        </div>

        <div class="col-lg-7 mb-5 order-0 order-lg-1">
            <img src="<?= ASSETS_FULL_URL . 'images/index/analytics.png' ?>" class="img-fluid shadow" loading="lazy" />
        </div>
    </div>
</div>

<div class="index-background-one py-7 mt-8">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                <div class="card border-0">
                    <div class="card-body text-center d-flex flex-column">
                        <span class="font-weight-bold text-muted mb-3"><?= language()->index->stats->links ?></span>
                        <span class="h2"><?= nr($data->total_links) . '+' ?></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                <div class="card border-0">
                    <div class="card-body text-center d-flex flex-column">
                        <span class="font-weight-bold text-muted mb-3"><?= language()->index->stats->qr_codes ?></span>
                        <span class="h2"><?= nr($data->total_qr_codes) . '+' ?></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                <div class="card border-0">
                    <div class="card-body text-center d-flex flex-column">
                        <span class="font-weight-bold text-muted mb-3"><?= language()->index->stats->track_links ?></span>
                        <span class="h2"><?= nr($data->total_track_links) . '+' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="row">
        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
            <div class="card d-flex flex-column justify-content-between h-100">
                <div class="card-body">
                    <div class="mb-2 bg-gray-100 p-3 rounded">
                        <i class="fa fa-fw fa-lg fa-project-diagram text-gray mr-3"></i>
                        <span class="h5"><?= language()->index->projects->header ?></span>
                    </div>

                    <span class="text-muted"><?= language()->index->projects->subheader ?></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
            <div class="card d-flex flex-column justify-content-between h-100">
                <div class="card-body">
                    <div class="mb-2 bg-gray-100 p-3 rounded">
                        <i class="fa fa-fw fa-lg fa-adjust text-gray mr-3"></i>
                        <span class="h5"><?= language()->index->pixels->header ?></span>
                    </div>

                    <span class="text-muted"><?= sprintf(language()->index->pixels->subheader, implode(', ',  array_map(function($item) {return $item['name'];}, require APP_PATH . 'includes/pixels.php'))) ?></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
            <div class="card d-flex flex-column justify-content-between h-100">
                <div class="card-body">
                    <div class="mb-2 bg-gray-100 p-3 rounded">
                        <i class="fa fa-fw fa-lg fa-globe text-gray mr-3"></i>
                        <span class="h5"><?= language()->index->domains->header ?></span>
                    </div>

                    <span class="text-muted"><?= language()->index->domains->subheader ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-8">
    <div class="text-center mb-5">
        <h2><?= language()->index->pricing->header ?></h2>
        <p class="text-muted"><?= language()->index->pricing->subheader ?></p>
    </div>

    <?= $this->views['plans'] ?>
</div>
