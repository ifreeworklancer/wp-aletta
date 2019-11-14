<?php
$pageID = 56;
$feedback = get_field('feedback', $pageID);
$args = array(
    'posts_per_page' => -1,
    'order' => 'asc',
    'post_type' => 'product'
);

$products = new WP_Query($args);
?>
<div class="custom-modal-wrapper custom-modal-wrapper--feedback">
    <div class="custom-modal">
        <div class="close-modal">
            <div class="line line--left"></div>
            <div class="line line--right"></div>
        </div>
        <div class="custom-modal-view">
            <div class="product-selected">
                <?php
                if ($products->have_posts()) :
                    $count = 0;
                    while ($products->have_posts()) :
                        $count++;
                        $products->the_post();
                        $product_description = get_field('product_description', get_the_ID());
                        ?>
                        <div class="product-selected-item <?php if ($count === 1) echo 'active'; ?>"
                             data-product-selected-id="<?= get_the_ID(); ?>">
                            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="product image" class="image">
                            <div class="name">
                                <?= get_the_title(); ?>
                                цена <?= $product_description['product_description_price']; ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
            </div>
        </div>
        <div class="custom-modal-body">
            <h3 class="title">
                <?= $feedback['feedback_title'] ?>
            </h3>
            <form>
                <div class="form-column">
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
                        <div class="custom-dropdown-body">
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
                            <input type="hidden" name="cream" value="<?= $first_product[0]->post_title; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-name--<?= $user_name_product = generateRandomString(); ?>">
                            <?= __('[:ru]Имя[:uk]Ім\'я[:]'); ?>
                        </label>
                        <input type="text" name="name" id="user-name--<?= $user_name_product; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user-phone--<?= $user_phone_product = generateRandomString(); ?>">
                            <?= __('[:ru]Номер телефона[:uk]Номер телефону[:]'); ?>
                        </label>
                        <input type="tel" name="phone" id="user-phone--<?= $user_phone_product; ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user-email--<?= $user_email_product = generateRandomString(); ?>">
                            Email
                        </label>
                        <input type="email" name="email" id="user-email--<?= $user_email_product; ?>"
                               class="form-control">
                    </div>
                    <button class="btn btn-secondary w-100">
                        <?= __('[:ru]Отправить[:uk]Надіслати[:]'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-mask"></div>
</div>
<div class="custom-modal-wrapper custom-modal-wrapper--advice">
    <div class="custom-modal">
        <div class="close-modal">
            <div class="line line--left"></div>
            <div class="line line--right"></div>
        </div>
        <div class="custom-modal-body">
            <h3 class="title">
                <?= __('[:ru]Свяжитесь с нами[:uk]Зв\'яжіться з нами[:]'); ?>
            </h3>
            <form>
                <div class="form-column">
                    <div class="form-group">
                        <label for="user-name--<?= $user_name = generateRandomString(); ?>">
                            <?= __('[:ru]Имя[:uk]Ім\'я[:]'); ?>
                        </label>
                        <input type="text" name="name" id="user-name--<?= $user_name; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user-phone--<?= $user_phone = generateRandomString(); ?>">
                            <?= __('[:ru]Номер телефона[:uk]Номер телефону[:]'); ?>
                        </label>
                        <input type="tel" name="phone" id="user-phone--<?= $user_phone; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user-email--<?= $user_email = generateRandomString(); ?>">
                            Email
                        </label>
                        <input type="email" name="email" id="user-email--<?= $user_email; ?>" class="form-control">
                    </div>
                    <button class="btn btn-secondary w-100">
                        <?= __('[:ru]Отправить[:uk]Надіслати[:]'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-mask"></div>
</div>
