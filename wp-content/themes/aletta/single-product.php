<?php
get_header('secondary');
$product_description = get_field('product_description');
$product_feature = get_field('product_feature');
$product_overview = get_field('product_overview');
?>

    <!-- Single product -->
    <section id="product-description" data-class-header="white" data-class-nav="dark">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-sm-10 col-lg-6">
                    <div class="products-gallery">
                        <div class="custom-tabs">
                            <div class="custom-tabs-nav">
                                <?php $countTabNav = 0;
                                foreach ($product_description['product_description_gallery'] as $image) : $countTabNav++; ?>
                                    <div class="custom-tabs-nav-item <?php if ($countTabNav === 1) echo 'active'; ?>">
                                        <figure style="background-image: url('<?= $image['url']; ?>');"></figure>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="custom-tabs-body">
                                <?php $countTabBody = 0;
                                foreach ($product_description['product_description_gallery'] as $image) : $countTabBody++; ?>
                                    <div class="custom-tabs-body-item <?php if ($countTabBody === 1) echo 'active'; ?>">
                                        <figure style="background-image: url('<?= $image['url']; ?>');"></figure>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-6">
                    <div class="products-description">
                        <h1 class="title">
                            <?= get_the_title(); ?>
                        </h1>
                        <div class="description">
                            <p>
                                <?= $product_description['product_description_text']; ?>
                            </p>
                        </div>
                        <div class="feature">
                            <div class="feature-title">
                                <?= __('[:ru]характеристики[:uk]характеристики[:]'); ?>
                            </div>
                            <ul class="feature-list">
                                <?php foreach ($product_description['product_description_feature'] as $value) : ?>
                                    <li>
                                        <?= $value['product_description_feature_item']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="price mb-0">
                                <span class="price-text">
                                    <?= __('[:ru]цена[:uk]ціна[:]'); ?>
                                </span>
                                <span class="price-value">
                                    <?= $product_description['product_description_price']; ?>
                                </span>
                                <span class="price-currency">
                                    грн
                                </span>
                            </div>
                            <a href="#" class="btn btn-outline-primary buy-selected open-feedback ml-4"
                               data-cream-id="<?= get_the_ID(); ?>"
                               data-cream="<?= get_the_title(); ?>">
                                <?= __('[:ru]заказать[:uk]замовити[:]'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="decor-title">
            <span>
                <?= get_the_title(); ?>
            </span>
        </div>
        <figure class="decor-image d-none d-xl-block"
                style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-secondary.png') ?>);"></figure>
    </section>

    <section id="product-feature" data-class-header="dark" data-class-nav="primary">
        <div class="container h-100">
            <div class="row justify-content-center justify-content-lg-start align-items-center h-100">
                <div class="col-sm-10 col-lg-7">
                    <div class="product-feature-item">
                        <div class="product-feature-item-body">
                            <h2 class="title">
                                <?= $product_feature['product_feature_title']; ?>
                            </h2>
                            <div class="description">
                                <?= $product_feature['product_feature_description']; ?>
                            </div>
                            <div class="advantages">
                                <?php foreach ($product_feature['product_feature_advantages'] as $item) : ?>
                                    <div class="advantages-item">
                                        <figure class="advantages-item-icon"
                                                style="background-image: url('<?= $item['product_feature_advantages_icon']['url']; ?>');"></figure>
                                        <div class="advantages-item-description">
                                            <p>
                                                <?= $item['product_feature_advantages_description']; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="product-feature-item-footer">
                            <div class="name mb-4 mb-sm-0 mr-4">
                                <?= __('[:ru]Заказать[:uk]Замовити[:]'); ?> <?= get_the_title(); ?>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="price mb-0 mr-4">
                                <span class="price-text">
                                    <?= __('[:ru]цена[:uk]ціна[:]'); ?>
                                </span>
                                    <span class="price-value">
                                    <?= $product_description['product_description_price']; ?>
                                </span>
                                    <span class="price-currency">
                                    грн
                                </span>
                                </div>
                                <a href="#" class="btn btn-secondary buy-selected open-feedback"
                                   data-cream-id="<?= get_the_ID(); ?>"
                                   data-cream="<?= get_the_title(); ?>">
                                    <?= __('[:ru]заказать[:uk]замовити[:]'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-feature-image d-none d-lg-block">
            <figure style="background-image: url('<?= $product_feature['product_feature_image']['url']; ?>');"></figure>
        </div>
    </section>

    <section id="product-overview" class="page-overview" data-class-header="dark" data-class-nav="primary">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-sm-7 col-lg-5 order-2 order-lg-1">
                    <div class="product-overview-item">
                        <h2 class="title">
                            <?= $product_overview['product_overview_title']; ?>
                        </h2>
                        <div class="description">
                            <p>
                                <?= $product_overview['product_overview_description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-7 mb-5 mb-lg-0 order-1 order-lg-2">
                    <div class="video-overview"
                         style="background-image: url('<?= getVideoImageLinkAttribute($product_overview['product_overview_video']); ?>');"
                         data-youtube="<?= getVideoLinkAttribute($product_overview['product_overview_video']); ?>">
                        <figure class="product-overview-decor-image"
                                style="background-image: url(<?= get_theme_file_uri('images/icon/product-overview-decor.png'); ?>);"></figure>
                        <svg width="40" height="40">
                            <use xlink:href="#play-icon"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <figure class="decor-image d-none d-md-block"
                style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-light.png'); ?>);"></figure>
    </section>

<?php
include(__DIR__ . '/includes/template-parts/reviews.php');
get_footer(); ?>