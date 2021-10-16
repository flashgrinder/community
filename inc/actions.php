<?php

    /* Подключение стилей и скриптов */
    add_action( 'wp_enqueue_scripts', function() {

        wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/style.min.css', [], time() );


        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', [], time(), true );

    } );

    add_action( 'after_setup_theme', function(){

        // Регистрируем главное меню
		register_nav_menu('header-menu', 'Меню в шапке');

		// Регистрируем меню в подвале
		register_nav_menu('footer-menu', 'Меню в подвале');

        // Смена логотипа
		add_theme_support('custom-logo');

        /* Добавляем возможность ставить постам миниатюры */
        add_theme_support('post-thumbnails');

        /* Тайтлы старницы ставятся автоматом */
        add_theme_support('title-tag');

        /* Включаем поддержку html5 */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /* Отключаем админбар */
        // add_theme_support( 'admin-bar', ['callback' => '__return_false'] );

    });

     // Добавим метабокс выбора автора картины
     add_action('add_meta_boxes', function () {
        add_meta_box( 'paintings', 'Художник', 'paintings_artist_metabox', 'paintings', 'side', 'low'  );
    }, 1);

    // метабокс с селектом авторов
    function paintings_artist_metabox( $post ){
        $artists = get_posts(array( 'post_type'=>'artists', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

        if( $artists ){
            // чтобы портянка пряталась под скролл...
            echo '
            <div style="max-height:200px; overflow-y:auto;">
                <ul>
            ';

            foreach( $artists as $artist ){
                echo '
                <li><label>
                    <input type="radio" name="post_parent" value="'. $artist->ID .'" '. checked($artist->ID, $post->post_parent, 0) .'> '. esc_html($artist->post_title) .'
                </label></li>
                ';
            }

            echo '
                </ul>
            </div>';
        }
        else
            echo 'Художников нет...';
    }

    add_action('add_meta_boxes', function(){
        add_meta_box( 'paintings', 'Картины художника', 'artists_paintings_metabox', 'artists', 'side', 'low'  );
    }, 1);
    
    function artists_paintings_metabox( $post ){
        $paintings = get_posts(array( 'post_type'=>'paintings', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));
    
        if( $paintings ){
            foreach( $paintings as $painting ){
                echo $painting->post_title .'<br>';
            }
        }
        else
            echo 'Картин нет...';
    }

    add_action( 'wp_head', function() {

		?>


		<?php

	}, 20);