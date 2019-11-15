<?php
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'product'
);
$products = new WP_Query($args);
?>
    <!-- Products -->
    <section id="products" data-class-header="white" data-class-nav="dark">
        <div class="products">
            <?php
            if ($products->have_posts()) :
                $count = 0;
                while ($products->have_posts()) :
                    $products->the_post();
                    $product = get_field('product_description', get_the_ID());
                    $count++;
                    ?>
                    <div class="products-item <?php if ($count === 1) echo 'active'; ?>"
                         style="z-index: <?= $count; ?>">
                        <div class="products-item-nav">
                            <div class="title">
                        <span>
                            <?= get_the_title(); ?>
                        </span>
                            </div>
                            <div class="counter">
                                0<?= $count; ?>
                            </div>
                        </div>
                        <div class="products-item-body">
                            <div class="products-gallery">
                                <div class="custom-tabs">
                                    <div class="custom-tabs-nav">
                                        <?php $countTabNav = 0;
                                        foreach ($product['product_description_gallery'] as $image) : $countTabNav++; ?>
                                            <div class="custom-tabs-nav-item <?php if ($countTabNav === 1) echo 'active'; ?>">
                                                <figure style="background-image: url('<?= $image['url']; ?>');"></figure>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="custom-tabs-body">
                                        <?php $countTabBody = 0;
                                        foreach ($product['product_description_gallery'] as $image) : $countTabBody++; ?>
                                            <div class="custom-tabs-body-item <?php if ($countTabBody === 1) echo 'active'; ?>">
                                                <figure style="background-image: url('<?= $image['url']; ?>');"></figure>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="products-description">
                                <h2 class="title">
                                    <?= get_the_title(); ?>
                                </h2>
                                <div class="description">
                                    <p>
                                        <?= $product['product_description_text']; ?>
                                    </p>
                                </div>
                                <div class="feature">
                                    <div class="feature-title">
                                        <?= __('[:ru]характеристики[:uk]характеристики[:]'); ?>
                                    </div>
                                    <ul class="feature-list">
                                        <?php foreach ($product['product_description_feature'] as $value) : ?>
                                            <li>
                                                <?= $value['product_description_feature_item']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="price">
                            <span class="price-text">
                                <?= __('[:ru]цена[:uk]ціна[:]'); ?>
                            </span>
                                    <span class="price-value">
                                <?= $product['product_description_price'] ?>
                            </span>
                                    <span class="price-currency">
                                грн
                            </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-outline-primary buy-selected open-feedback mr-4"
                                       data-cream-id="<?= get_the_ID(); ?>" data-cream="<?= get_the_title(); ?>">
                                        <?= __('[:ru]заказать[:uk]замовити[:]'); ?>
                                    </a>
                                    <a href="<?= get_the_permalink(); ?>" class="link-more">
                                        <?= __('[:ru]узнать больше[:uk]дізнатися більше[:]'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
        <figure class="decor-image d-none d-xl-block"
                style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-secondary.png'); ?>);"></figure>
    </section>

<?php wp_reset_postdata(); ?>