<!-- Page Laboratory -->
<section id="page-contacts" data-class-header="dark" data-class-nav="primary last" class="section-footer">
    <div class="map-contacts">
        <div class="map-mask">
            Нажмите для использования карты
        </div>
        <div id="contacts-map" data-lon="<?= $mapLon; ?>" data-lat="<?= $mapLat; ?>"
             data-icon="<?= $mapIcon; ?>">
        </div>
    </div>
    <div class="container h-100">
        <div class="row justify-content-center justify-content-lg-start align-items-center h-100">
            <div class="col-sm-9 col-md-7 col-lg-5 mb-5 mb-lg-0">
                <div class="section-description">
                    <h2 class="title">
                        <?= $page_contacts['title']; ?>
                    </h2>
                    <div class="description">
                        <p>
                            <?= $page_contacts['description']; ?>
                        </p>
                    </div>
                </div>
                <div class="contacts-wrapper">
                    <ul class="contacts-list d-flex flex-column flex-sm-row justify-content-between mb-4">
                        <li class="mb-2 mb-sm-0">
                            <svg width="18" height="18">
                                <use xlink:href="#phone-icon"></use>
                            </svg>
                            <a href="tel:+<?= phone_link($phone1); ?>">
                                <?= $phone1; ?>
                            </a>
                        </li>
                        <li>
                            <svg width="18" height="18">
                                <use xlink:href="#phone-icon"></use>
                            </svg>
                            <a href="tel:+<?= phone_link($phone2); ?>">
                                <?= $phone2; ?>
                            </a>
                        </li>
                    </ul>
                    <ul class="contacts-list mb-4">
                        <li>
                            <svg width="18" height="12">
                                <use xlink:href="#email-icon"></use>
                            </svg>
                            <a href="mailto:+<?= $email; ?>">
                                <?= $email; ?>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4">
                        <div>
                            Или заполните форму
                        </div>
                        <a href="#" class="btn btn-outline-secondary open-advice mt-3 mt-sm-0">
                            консультация менеджера
                        </a>
                    </div>
                    <ul class="social-list">
                        <li>
                            Найдите нас в соцсетях
                        </li>
                        <li>
                            <a href="<?= $facebook; ?>">
                                <svg width="18" height="18">
                                    <use xlink:href="#facebook-icon"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $instagram; ?>">
                                <svg width="18" height="18">
                                    <use xlink:href="#instagram-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <figure class="decor-image d-none d-md-block" style="background-image: url('../../images/icon/decor-image-light.png');"></figure>
    <footer id="app-footer">
        <div class="footer-item text-center text-lg-left">
            <?= date('Y'); ?>
            Все права защищены
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
            Вебразработка сайта студией Impression Bureau 2019
        </div>
    </footer>
</section>