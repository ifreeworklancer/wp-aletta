<?php
/*
Template Name: Спасибо
Template Post Type: page
*/
get_header();
?>

    <!-- Page Thanks -->
    <section id="page-thanks" data-class-header="dark" data-class-nav="primary last" class="section-footer">
        <div class="container h-100">
            <div class="row justify-content-center justify-content-lg-start align-items-center h-100">
                <div class="col-12">
                    <div class="page-secondary-item text-center">
                        <h1 class="title">
                            <?= __('[:ru]Спасибо![:uk]Дякую![:]'); ?>
                        </h1>
                        <div class="description">
                            <p>
                                <?= __('[:ru]наш менеджер с вами свяжется[:uk]наш менеджер з вами зв\'яжеться[:]'); ?>
                            </p>
                        </div>
                        <a href="<?= home_url(); ?>" class="btn btn-primary">
                            <?= __('[:ru]На главную[:uk]На головну[:]'); ?>
                        </a>
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

<?php
get_footer(); ?>