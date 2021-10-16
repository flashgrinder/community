<?php

    define('STANDART_DIR', get_stylesheet_directory_uri() . '/assets/');
    
    // Отключаем админбар
    if ( ! current_user_can( 'manage_options' ) ) {
        show_admin_bar( false );
    }

    /* Actions */
    include_once(__DIR__ . '/inc/actions.php');
    /* Filters */
    include_once(__DIR__ . '/inc/filters.php');
    /* Post Type Paintings */
    include_once(__DIR__ . '/inc/post-type_paintings.php');
    /* Post Type Artists */
    include_once(__DIR__ . '/inc/post-type_artists.php');
    /* Loadmore btn */
    include_once(__DIR__ . '/inc/loadmore_btn.php');

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