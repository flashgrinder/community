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