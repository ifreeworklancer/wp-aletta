<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.1.1/mapbox-gl.css' rel='stylesheet'/>
    <?php wp_head(); ?>
</head>

<body class="first-dark">

<?php require_once('includes/partials/svgs.php'); ?>

<!-- App-header -->
<header id="app-header" class="white">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href="/" class="logo">
                    <svg>
                        <use xlink:href="#logo-icon"></use>
                    </svg>
                </a>
            </div>
            <div class="col-auto">
                <nav class="header-nav">
                    <div class="header-nav-list d-none d-xl-flex">
                        <?php wp_nav_menu([
                            'theme_location' => 'main_menu',
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                        ]); ?>
                    </div>
                    <a href="#" class="btn btn-secondary d-none d-xl-inline-flex open-feedback">
                        <?= __('[:ru]связаться, чтобы заказать[:uk]зв\'язатися, щоб замовити[:]'); ?>
                    </a>
                    <div class="burger-menu">
                        <div class="line line--top"></div>
                        <div class="line line--bottom"></div>
                    </div>
                    <?php
                    if (function_exists('wpm_language_switcher'))
                        wpm_language_switcher('list', 'name');
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="menu">
        <?php wp_nav_menu([
            'theme_location' => 'main_menu',
            'menu' => '',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'menu-list',
            'menu_id' => '',
            'echo' => true,
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        ]); ?>
        <div class="mt-4">
            <a href="#" class="btn btn-secondary open-feedback">
                <?= __('[:ru]связаться, чтобы заказать[:uk]зв\'язатися, щоб замовити[:]'); ?>
            </a>
        </div>
    </div>
</header>

<!-- Modal -->
<?php require_once('includes/partials/modal.php'); ?>

<!-- Main -->
<main id="app">