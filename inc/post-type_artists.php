<?php

    add_action('init', function(){ 
        register_post_type('artists', [
            'labels' => [
                'name'               => 'Художники',
                'singular_name'      => 'Художники',
                'add_new'            => 'Добавить художника',
                'add_new_item'       => 'Добавить художника',
                'edit_item'          => 'Редактировать художника',
                'new_item'           => 'Новый художник',
                'view_item'          => 'Посмотреть художника',
                'search_items'       => 'Найти художника',
                'not_found'          => 'Художников не найдено',
                'not_found_in_trash' => 'В корзине не найдено художника',
                'parent_item_colon'  => '',
                'menu_name'          => 'Художники'
            ],
            'public'             => true,
            'show_ui'            => true,
            'show_in_rest'       => true,
            'menu_position'      => 4,
            'menu_icon'          => 'dashicons-admin-appearance',
            'supports'           => ['title','editor','thumbnail','author','custom-fields','revisions'],
            'has_archive'        => false,
            // 'taxonomies'          => ['stories'],
            'hierarchical'        => false,
            'rewrite'             => array('slug' => 'hudozhniki', 'with_front' => false),
            'query_var'           => true
        ]);
    
    });