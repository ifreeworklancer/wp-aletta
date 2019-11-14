<?php
$pageID = 8;
$laboratory = get_field('laboratory', $pageID);
?>
<!-- Laboratory -->
<section id="laboratory" data-class-header="dark" data-class-nav="primary">
    <div class="container h-100">
        <div class="row h-100 justify-content-center justify-content-lg-start align-items-center">
            <div class="col-sm-10 col-lg-6">
                <div class="laboratory-item">
                    <h2 class="title mb-3">
                        <?= $laboratory['laboratory_title']; ?>
                    </h2>
                    <div class="description mb-4">
                        <p>
                            <?= $laboratory['laboratory_description']; ?>
                        </p>
                    </div>
                    <div class="advantages">
                        <?php foreach ($laboratory['laboratory_advantages'] as $item) : ?>
                            <div class="advantages-item">
                                <figure class="advantages-item-icon"
                                        style="background-image: url('<?= $item['laboratory_advantages_icon']['url']; ?>');"></figure>
                                <div class="advantages-item-description">
                                    <p>
                                        <?= $item['laboratory_advantages_description']; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <a href="#" class="btn btn-outline-secondary">
                            <?= __('[:ru]Больше информации[:uk]Більше інформації[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="laboratory-image d-none d-lg-block">
        <figure style="background-image: url('<?= $laboratory['laboratory_image']['url']; ?>');">
            <div class="laboratory-image-decor"
                 style="background-image: url(<?= get_theme_file_uri('images/content/laboratory/laboratory-item-decor.png') ?>);"></div>
        </figure>
    </div>
    <figure class="decor-image d-none d-xl-block"
            style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-primary.png'); ?>);"></figure>
</section>