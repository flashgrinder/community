<?php
    
    /* Убираем тег <p></p> у отрывков */
    remove_filter( 'the_excerpt','wpautop');

    // Длина отрывков постов
    add_filter( 'excerpt_length', function($number) {
        return 20;
    });

    // Окончание отрывков постов
    add_filter( 'excerpt_more', function($more_string){
        return '...';
    });

    // Подсветка слов в поиске
    add_filter( 'get_the_excerpt', 'kama_search_backlight' );

    add_filter( 'the_title', 'kama_search_backlight' );
    function kama_search_backlight( $text )
    {
        // только для страниц поиска и главного цикла...
        if ( ! is_search() || ! in_the_loop() )
            return $text;

        $query_terms = get_query_var('search_terms');

        if( empty($query_terms) )
            $query_terms = array_filter( [ get_query_var('s') ] );

        if( empty($query_terms) )
            return $text;

        foreach( $query_terms as $term )
        {
            $term = preg_quote( $term, '/' );
            $text = preg_replace_callback( "/$term/iu", function($match)
            {
                return '<span class="search-page__highlight">'. $match[0] .'</span>';
            }, $text );
        }

        return $text;
    }

    // Добавляет класс пунктам меню в шапке
    add_filter( 'nav_menu_css_class', function($classes, $item, $args, $depth) {
            
        if($args->theme_location === 'header-menu') {
            $classes[] = 'menu__item header__menu-item';
        }
        
        return $classes;

    }, 10, 4 );

    // Добавляет класс пунктам меню в подвале
    add_filter( 'nav_menu_css_class', function($classes, $item, $args, $depth) {
        
        if($args->theme_location === 'footer-menu') {
            $classes[] = 'menu__item footer__menu-item';
        }
        
        return $classes;

    }, 10, 4 );

    // Добавляет класс ссылкам меню в шапке
    add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
        
        if($args->theme_location === 'header-menu') {
            $atts['class'] = 'menu__link header__menu-link';
        }
        
        return $atts;

    }, 10, 3);

    // Добавляет класс ссылкам меню в подвале
    add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
        
        if($args->theme_location === 'footer-menu') {
            $atts['class'] = 'menu__link footer__menu-link';
        }
        
        return $atts;

    }, 10, 3);

    add_filter( 'nav_menu_submenu_css_class', function() {

        $classes[] = 'menu__sub-menu';

        return $classes;

    }, 10, 3 );