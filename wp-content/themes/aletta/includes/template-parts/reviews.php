<?php
$pageID = 56;
$feedback = get_field('feedback', $pageID);
$reviews = get_field('reviews', $pageID);

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'product'
);

$products = new WP_Query($args);

?>
<!-- Reviews -->
<section id="reviews" data-class-header="dark" data-class-nav="primary">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <?php
                if ($reviews) :?>
                    <div class="reviews">
                        <div class="reviews-slider">
                            <?php
                            foreach ($reviews as $item) :
                                if ($item['reviews_item']['reviews_item_video'] !== '') :
                                    ?>
                                    <div class="reviews-slider-item">
                                        <div class="reviews-item">
                                            <div class="reviews-item-body">
                                                <div class="video-overview"
                                                     style="background-image: url('<?= getVideoImageLinkAttribute($item['reviews_item']['reviews_item_video']) ?>');"
                                                     data-youtube="<?= getVideoLinkAttribute($item['reviews_item']['reviews_item_video']); ?>">
                                                    <svg width="40" height="40">
                                                        <use xlink:href="#play-icon"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="reviews-item-footer">
                                                <div class="name">
                                                    <div class="image">
                                                        <?php if (!is_null($item['reviews_item']['reviews_item_image']['url'])) : ?>
                                                            <figure style="background-image: url('<?= $item['reviews_item']['reviews_item_image']['url']; ?>');"></figure>
                                                        <?php else: ?>
                                                            <figure style="background-image: url('<?= get_theme_file_uri('images/icon/simple-user.png') ?>');"></figure>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?= $item['reviews_item']['reviews_item_name']; ?>
                                                </div>
                                                <div class="stars">
                                                    <?php
                                                    if ($item['reviews_item']['reviews_item_stars'] > 5) {
                                                        $item['reviews_item']['reviews_item_stars'] = 5;
                                                    }
                                                    if ($item['reviews_item']['reviews_item_stars'] < 1) {
                                                        $item['reviews_item']['reviews_item_stars'] = 1;
                                                    }
                                                    $counter = 1;
                                                    while ($counter <= $item['reviews_item']['reviews_item_stars']) :
                                                        $counter++;
                                                        ?>
                                                        <div class="icon">
                                                            <svg width="15" height="15">
                                                                <use xlink:href="#star-icon"></use>
                                                            </svg>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; endforeach; ?>
                        </div>
                        <div class="slider-arrow slider-arrow--reviews">
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
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <h2 class="decor-title">
        <?= get_the_title($pageID); ?>
    </h2>
</section>

<section id="reviews-feedback" data-class-header="dark" data-class-nav="white last"
         class="section-footer d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start align-items-center">
            <div class="col-sm-10 col-lg-8 col-xl-6">
                <div class="section-description">
                    <h2 class="title">
                        <?= $feedback['feedback_title']; ?>
                    </h2>
                    <div class="description">
                        <p>
                            <?= $feedback['feedback_description']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <form method="post" class="form-feedback" action="<?= get_theme_file_uri('mail-send.php'); ?>">
                    <div class="form-column row justify-content-center">
                        <div class="col-sm-10 col-lg-6">
                            <div class="custom-dropdown">
                                <div class="custom-dropdown-input">
                                    <div class="custom-dropdown-input__title">
                                        <?php
                                        $first_product = $products->query($args);
                                        echo $first_product[0]->post_title;
                                        ?>
                                    </div>
                                    <div class="custom-dropdown-input__icon"></div>
                                </div>
                                <div class="custom-dropdown-body custom-dropdown-body--product">
                                    <ul class="custom-dropdown-body-list">
                                        <?php
                                        if ($products->have_posts()) :
                                            while ($products->have_posts()) :
                                                $products->the_post();
                                                ?>
                                                <li data-cream="<?= get_the_title(); ?>">
                                                    <?= get_the_title(); ?>
                                                </li>
                                            <?php endwhile; endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                    <input type="hidden" name="product" value="<?= $first_product[0]->post_title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user-name--<?= $user_name_feedback = generateRandomString(); ?>">
                                    <?= __('[:ru]Имя[:uk]Ім\'я[:]'); ?>
                                </label>
                                <input type="text" name="name" id="user-name--<?= $user_name_feedback; ?>"
                                       class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="user-phone--<?= $user_phone_feedback = generateRandomString(); ?>">
                                    <?= __('[:ru]Номер телефона[:uk]Номер телефону[:]'); ?>
                                </label>
                                <input type="tel" name="phone" id="user-phone--<?= $user_phone_feedback; ?>"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-6">
                            <div class="form-group">
                                <label for="user-email--<?= $user_email_feedback = generateRandomString(); ?>">
                                    Email
                                </label>
                                <input type="email" name="email" id="user-email--<?= $user_email_feedback; ?>"
                                       class="form-control" required>
                            </div>
                            <div class="searchable searchable--city custom-dropdown">
                                <div class="custom-dropdown-input">
                                    <input type="text" name="city" required
                                           placeholder="<?= __('[:ru]Выберите город[:uk]Виберіть місто[:]'); ?>"
                                           class="custom-dropdown-input__title searchable__input">
                                    <div class="custom-dropdown-input__icon"></div>
                                </div>
                                <div class="custom-dropdown-body">
                                    <ul class="custom-dropdown-body-list">

                                    </ul>
                                </div>
                            </div>
                            <div class="searchable searchable--branch custom-dropdown">
                                <div class="custom-dropdown-input">
                                    <input type="text" name="branch" readonly
                                           placeholder="<?= __('[:ru]Выберите отделение[:uk]Виберіть відділення[:]'); ?>"
                                           class="custom-dropdown-input__title searchable__input" required>
                                    <div class="custom-dropdown-input__icon"></div>
                                </div>
                                <div class="custom-dropdown-body ">
                                    <ul class="custom-dropdown-body-list">

                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                            <textarea name="message"
                                      placeholder="<?= __('[:ru]Коментарий к заказу[:uk]Коментар до замовлення[:]'); ?>"
                                      class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-12">
                            <button class="btn btn-secondary">
                                <?= __('[:ru]Отправить[:uk]Надіслати[:]'); ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <figure class="decor-image"
            style="background-image: url(<?= get_theme_file_uri('images/icon/decor-image-primary.png'); ?>);"></figure>

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