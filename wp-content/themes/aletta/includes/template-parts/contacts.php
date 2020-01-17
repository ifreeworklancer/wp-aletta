<?php
$pageID = 107;
$page_contacts_description = get_field('page_contacts_description', $pageID);
$page_contacts_map = get_field('page_contacts_map', $pageID);
?>
<!-- Page Laboratory -->
<section id="page-contacts" data-class-header="dark" data-class-nav="primary last" class="section-footer">
    <div class="map-contacts">
        <div class="map-mask">
            <?= __('[:ru]Нажмите для использования карты[:uk]Натисніть для використання карти[:]'); ?>
        </div>
        <?php if ($page_contacts_map['page_contacts_map_lon'] !== '' && $page_contacts_map['page_contacts_map_lat']) : ?>
            <div id="contacts-map" data-lon="<?= $page_contacts_map['page_contacts_map_lon']; ?>"
                 data-lat="<?= $page_contacts_map['page_contacts_map_lat']; ?>"
                 data-icon="<?php if (!is_null($page_contacts_map['page_contacts_map_icon']['url'])) echo $page_contacts_map['page_contacts_map_icon']['url']; else echo get_theme_file_uri('images/icon/map-icon.png'); ?>">
            </div>
        <?php else : ?>
            <div id="contacts-map" data-lon="30.485481"
                 data-lat="50.462175"
                 data-icon="<?php if (!is_null($page_contacts_map['page_contacts_map_icon']['url'])) echo $page_contacts_map['page_contacts_map_icon']['url']; else echo get_theme_file_uri('images/icon/map-icon.png'); ?>">
            </div>
        <?php endif; ?>
    </div>
    <div class="container h-100">
        <div class="row justify-content-center justify-content-lg-start align-items-center h-100">
            <div class="col-sm-9 col-md-7 col-lg-5 mb-5 mb-lg-0">
                <div class="section-description">
                    <h2 class="title">
                        <?= get_the_title(); ?>
                    </h2>
                    <div class="description">
                        <p>
                            <?= $page_contacts_description; ?>
                        </p>
                    </div>
                </div>
                <div class="contacts-wrapper">
                    <ul class="contacts-list d-flex flex-column flex-sm-row justify-content-between mb-4">
                        <?php if (get_theme_mod('phone1') !== '') : ?>
                            <li class="mb-2 mb-sm-0">
                                <svg width="18" height="18">
                                    <use xlink:href="#phone-icon"></use>
                                </svg>
                                <a href="tel:<?= phone_link(get_theme_mod('phone1')); ?>">
                                    <?= get_theme_mod('phone1'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('phone2') !== '') : ?>
                            <li>
                                <svg width="18" height="18">
                                    <use xlink:href="#phone-icon"></use>
                                </svg>
                                <a href="tel:<?= phone_link(get_theme_mod('phone2')); ?>">
                                    <?= get_theme_mod('phone2'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="contacts-list mb-4">
                        <?php if (get_theme_mod('email') !== '') : ?>
                            <li>
                                <svg width="18" height="12">
                                    <use xlink:href="#email-icon"></use>
                                </svg>
                                <a href="mailto:<?= get_theme_mod('email'); ?>">
                                    <?= get_theme_mod('email'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4">
                        <div>
                            <?= __('[:ru]Или заполните форму[:uk]Або заповніть форму[:]'); ?>
                        </div>
                        <a href="#" class="btn btn-outline-secondary open-advice mt-3 mt-sm-0">
                            <?= __('[:ru]консультация менеджера[:uk]консультація менеджера[:]'); ?>
                        </a>
                    </div>
                    <ul class="social-list">
                        <?php if (get_theme_mod('facebook') !== '' || get_theme_mod('instagram') !== '') : ?>
                            <li>
                                <?= __('[:ru]Найдите нас в соцсетях[:uk]Знайдіть нас у соцмережах[:]'); ?>
                            </li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('facebook') !== '') : ?>
                            <li>
                                <a href="<?= get_theme_mod('facebook'); ?>">
                                    <svg width="18" height="18">
                                        <use xlink:href="#facebook-icon"></use>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('instagram') !== '') : ?>
                            <li>
                                <a href="<?= get_theme_mod('instagram'); ?>">
                                    <svg width="18" height="18">
                                        <use xlink:href="#instagram-icon"></use>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <figure class="decor-image d-none d-md-block"
            style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-light.png'); ?>);"></figure>
    <footer id="app-footer">
        <div class="footer-item text-center text-lg-left">
            <?= date('Y'); ?>
            <?= __('[:ru]Все права защищены[:uk]Всі права захищені[:]'); ?>
        </div>
        <div class="footer-item">
            <ul class="footer-list">
                <li>
                    <a href="#">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="#">
                        Coockie Policy
                    </a>
                </li>
                <li>
                    <a href="#">
                        Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-item text-center text-lg-right">
            <?= __('[:ru]Вебразработка сайта студией[:uk]Вебразработка сайту студією[:]'); ?> <a
                    href="https://impressionbureau.pro/" target="_blank">Impression Bureau</a> 2019
        </div>
    </footer>
</section>