<?php
$pageID = 8;
$intro = get_field('intro', $pageID);
?>
<!-- Intro -->
<section id="intro" data-class-header="dark" data-class-nav="primary">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-sm-7 col-lg-5">
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
                        <a href="<?= get_permalink(91); ?>" class="btn btn-outline-secondary">
                            <?= __('[:ru]Узнать больше[:uk]Дізнатися більше[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="intro-decor-title">
        Aletta
    </h1>
    <figure class="decor-intro-image d-none d-xl-block"
            style="background-image: url(<?= get_theme_file_uri('images/content/intro/intro-decor.png'); ?>);"></figure>
    <figure class="decor-image d-none d-md-block"
            style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-primary.png'); ?>);"></figure>
</section>
