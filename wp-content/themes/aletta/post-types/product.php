<?php
function product_post_type()
{
    $labels = array(
        'name' => _x('Товары', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Товары', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Товары', 'text_domain'),
        'name_admin_bar' => __('Товары', 'text_domain'),
        'archives' => __('Архив товаров', 'text_domain'),
        'attributes' => __('Атрибут товара', 'text_domain'),
        'parent_item_colon' => __('Родитель товара:', 'text_domain'),
        'all_items' => __('Все товары', 'text_domain'),
        'add_new_item' => __('Добавить новый товар', 'text_domain'),
        'add_new' => __('Добавить новый', 'text_domain'),
        'new_item' => __('Новый товар', 'text_domain'),
        'edit_item' => __('Изменить товар', 'text_domain'),
        'update_item' => __('Обновить товар', 'text_domain'),
        'view_item' => __('Посмотреть товар', 'text_domain'),
        'view_items' => __('Посмотреть товары', 'text_domain'),
        'search_items' => __('Найти товары', 'text_domain'),
        'not_found' => __('Не найдено', 'text_domain'),
        'not_found_in_trash' => __('Не найдено в корзине', 'text_domain'),
        'featured_image' => __('Изображение товара', 'text_domain'),
        'set_featured_image' => __('Установить изображение товара', 'text_domain'),
        'remove_featured_image' => __('Удалить изображение товара', 'text_domain'),
        'use_featured_image' => __('Использовать изображение товара', 'text_domain'),
        'insert_into_item' => __('Вставить в товар', 'text_domain'),
        'uploaded_to_this_item' => __('Загружено в этот товар', 'text_domain'),
        'items_list' => __('Список товаров', 'text_domain'),
        'items_list_navigation' => __('Навигация списка товаров', 'text_domain'),
        'filter_items_list' => __('Фильтрация спсика товаров', 'text_domain'),
    );
    $args = array(
        'label' => __('Товары', 'text_domain'),
        'description' => __('Описание', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'template', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-cart',
    );
    register_post_type('product', $args);
}

add_action('init', 'product_post_type', 0);