<?php
$pageID = 8;
$intro = get_field('intro', $pageID);
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'product'
);

$products = new WP_Query($args);
?>
<!-- Intro -->
<section id="intro" data-class-header="dark" data-class-nav="primary">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-sm-10 col-md-7 col-lg-5">
                <div class="intro-item">
                    <div class="section-description">
                        <h2 class="title">
                            <?= $intro['intro_title']; ?>
                        </h2>
                        <div class="description">
                            <p>
                                <?= $intro['intro_description']; ?>
                            </p>
                        </div>
                    </div>
                    <div>
                        <a href="<?= get_permalink(91); ?>" class="btn btn-secondary">
                            <?= __('[:ru]Узнать больше[:uk]Дізнатися більше[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($products->have_posts()) : ?>
        <div class="intro-preview">
            <div class="intro-preview-select">
                <?php
                $count = 0;
                while ($products->have_posts()) :
                    $count++;
                    $products->the_post();
                    $product_preview = get_field('product_intro_preview', get_the_ID());
                    ?>
                    <div class="intro-preview-select-item <?php if ($count === 1) echo 'is-select'; ?>">
                        <img src="<?= $product_preview['url']; ?>" alt="cream" class="intro-preview-select__image">
                        <div class="pointer" data-prev-index="<?= $count - 1; ?>">
                            <div class="line line--left"></div>
                            <div class="line line--top"></div>
                            <div class="decor-bg decor-bg--first"></div>
                            <div class="decor-bg decor-bg--second"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="intro-preview-name">
                <?php
                $count = 0;
                while ($products->have_posts()) :
                    $count++;
                    $products->the_post();
                    ?>
                    <div class="intro-preview-name__item <?php if ($count === 1) echo 'is-select'; ?>"
                         data-prev-index="<?= $count - 1; ?>">
                        <?= get_the_title(); ?>
                        <div class="decor-elem"></div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
    <h1 class="intro-decor-title">
        Aletta
    </h1>
    <figure class="decor-intro-image d-none d-xl-block"
            style="background-image: url(<?= get_theme_file_uri('images/content/intro/intro-decor.png'); ?>);"></figure>
    <figure class="decor-image d-none d-md-block"
            style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-primary.png'); ?>);"></figure>
</section>
