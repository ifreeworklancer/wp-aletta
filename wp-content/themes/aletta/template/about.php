<?php
/*
Template Name: О нас
Template Post Type: page
*/
get_header();
$page_about = get_field('page_about');
?>

    <!-- Page About -->
    <section id="page-about-description" data-class-header="dark" data-class-nav="primary"
             style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');">
        <div class="container-fluid h-100 p-0">
            <div class="row justify-content-end align-items-center h-100 no-gutters">
                <div class="col-sm-9 col-md-7 col-lg-6 col-xl-4">
                    <div class="page-about-item">
                        <h1 class="title">
                            <?= the_title(); ?>
                        </h1>
                        <div class="description">
                            <?php
                            while (have_posts()) : the_post();
                                echo get_the_content();
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="decor-title">
            <?= $page_about['page_about_subtitle']; ?>
        </h2>
    </section>

    <section id="page-about-overview" class="page-overview" data-class-header="white" data-class-nav="dark">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-sm-7 col-lg-5 order-2 order-lg-1">
                    <div class="page-about-overview-item">
                        <h2 class="title">
                            <?= $page_about['page_about_overview']['page_about_overview_title']; ?>
                        </h2>
                        <div class="description">
                            <p>
                                <?= $page_about['page_about_overview']['page_about_overview_description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-7 mb-5 mb-lg-0 order-1 order-lg-2">
                    <div class="video-overview"
                         style="background-image: url('<?= getVideoImageLinkAttribute($page_about['page_about_overview']['page_about_overview_video']) ?>');"
                         data-youtube="<?= getVideoLinkAttribute($page_about['page_about_overview']['page_about_overview_video']); ?>">
                        <figure class="product-overview-decor-image"
                                style="background-image: url(<?= get_theme_file_uri('images/icon/page-about-overview-decor.png'); ?>);"></figure>
                        <svg width="40" height="40">
                            <use xlink:href="#play-icon"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <figure class="decor-image d-none d-md-block"
                style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-dark.png'); ?>);"></figure>
    </section>

<?php
include(__DIR__ . '../../includes/template-parts/contacts.php');
get_footer(); ?>