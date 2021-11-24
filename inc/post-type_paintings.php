<?php

    add_action('init', function(){ 
        register_post_type('paintings', [
            'labels' => [
                'name'               => 'Картины',
                'singular_name'      => 'Картины',
                'add_new'            => 'Добавить новую картину',
                'add_new_item'       => 'Добавить новую картину',
                'edit_item'          => 'Редактировать картину',
                'new_item'           => 'Новая картина',
                'view_item'          => 'Посмотреть картину',
                'search_items'       => 'Найти картину',
                'not_found'          => 'Картин не найдено',
                'not_found_in_trash' => 'В корзине не найдено картин',
                'parent_item_colon'  => '',
                'menu_name'          => 'Картины'
            ],
            'public'             => true,
            'show_ui'            => true,
            'show_in_rest'       => true,
            'menu_position'      => 4,
            'menu_icon'          => 'dashicons-format-gallery',
            'supports'           => ['title','editor','thumbnail','author','custom-fields','revisions'],
            'has_archive'        => false,
            // 'taxonomies'          => ['stories'],
            'hierarchical'        => false,
            'rewrite'             => array('slug' => 'galereya', 'with_front' => false),
            'query_var'           => true
        ]);
    
    });