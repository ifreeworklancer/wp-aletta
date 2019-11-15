<?php
/*
Template Name: Лаборатория
Template Post Type: page
*/
get_header();
$page_laboratory = get_field('page_laboratory');
?>
    <!-- Page Laboratory -->
    <section id="page-laboratory" data-class-header="dark" data-class-nav="primary">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-sm-6 col-lg-5">
                    <div class="page-description">
                        <h1 class="title">
                            <?= get_the_title(); ?>
                        </h1>
                        <div class="description">
                            <?php
                            while (have_posts()) : the_post();
                                echo get_the_content();
                            endwhile;
                            ?>
                            <div>
                                <a href="<?= get_permalink(88); ?>" class="btn btn-outline-secondary">
                                    <?= __('[:ru]посмотреть продукты[:uk]подивитися продукти[:]'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-laboratory-view">
            <div class="page-laboratory-slider">
                <?php foreach ($page_laboratory['page_laboratory_gallery'] as $item) : ?>
                    <figure class="page-laboratory-slider-item"
                            style="background-image: url('<?= $item['url']; ?>');"></figure>
                <?php endforeach; ?>
            </div>
            <div class="slider-navigation">
                <div class="slider-arrow slider-arrow--laboratory">
                    <div class="slider-arrow-item slider-arrow-item--prev">
                        <svg width="20" height="20">
                            <use xlink:href="#arrow-prev"></use>
                        </svg>
                    </div>
                    <div class="slider-arrow-item slider-arrow-item--next">
                        <svg width="20" height="20">
                            <use xlink:href="#arrow-next"></use>
                        </svg>
                    </div>
                </div>
                <div class="slider-nav slider-nav--laboratory">
                    <div class="slider-nav-item slider-nav-item--index">01</div>
                    <div class="slider-nav-item slider-nav-item--last">01</div>
                </div>
            </div>
        </div>
        <h2 class="decor-title">
            <?= $page_laboratory['page_laboratory_subtitle']; ?>
        </h2>
        <figure class="decor-image d-none d-md-block"
                style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-light.png'); ?>);"></figure>
    </section>

<?php
include(__DIR__ . '../../includes/template-parts/reviews.php');
get_footer(); ?>