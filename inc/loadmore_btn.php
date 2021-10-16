<?php

function loadmore_script() {
  wp_enqueue_script('jquery');
   wp_enqueue_script('loadmore', get_stylesheet_directory_uri() . '/inc/loadmore.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'loadmore_script');

function loadmore_get_posts(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    query_posts($args);
    if(have_posts()) :
        while(have_posts()): the_post(); ?>
        <!-- Post-card -->
        <article class="post-card load-post-news">
            <aside class="post-card__aside">
                <a href="<?php the_permalink(); ?>" class="post-card__link">
                    <figure class="post-card__figure">
                        <?php
                            $default_attr = [
                                'class'	=> "post-card__img",
                                'alt'   => get_the_title()
                            ];

                            echo get_the_post_thumbnail( $post->ID, 'thumbnail', $default_attr ) ?>
                    </figure>
                </a>
            </aside>
            <header class="post-card__header">
                <a href="<?php the_permalink(); ?>" class="post-card__link">
                    <h3 class="post-card__title title title--medium title--black-low title--w-black">
                        <?php the_title(); ?>
                    </h3>
                </a>
            </header>
            <div class="post-card__body">
                <p class="post-card__excerpt text text--black-low text--normal text--w-regular">
                    <?php the_excerpt(); ?>
                </p>
            </div>
            <footer class="post-card__footer">
                <a href="<?php the_permalink(); ?>" class="post-card__more text text--normal text--yellow text--w-bold bg--black link">
                    Читать подробнее
                </a>
                <div class="post-card__date text text--small text--dark text--w-regular">
                    <!-- <?php echo get_the_date('j F Y', $before); ?> -->
                </div>
            </footer>
        </article>
        <!-- /. Post-card -->
        <?php
        endwhile;
    endif;
    die();
}

add_action('wp_ajax_loadmore_news', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore_news', 'loadmore_get_posts');








function loadmore_get_gallery(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts($args);
    if(have_posts()) :
        while(have_posts()): the_post(); ?>

        <!-- gallery-card start -->

        <div class="product-card load-post-gallery">
            <a href="<?php the_permalink(); ?>" class="product-card__picture product-card__link">
                <?php
                    $default_attr = [
                        'class'	=> "product-card__photo",
                        'alt'   => get_the_title()
                    ];

                    echo get_the_post_thumbnail( $post->ID, 'medium', $default_attr ) ?>
            </a>
            <h3 class="product-card__name">
                <a href="<?php the_permalink(); ?>" class="product-card__link title title--medium title--black-low title--w-black">
                    <?php the_title(); ?>
                </a>
            </h3>
            <?php
                $idPost = get_the_ID();
                $artist_post = get_field( 'product-card_artist', $idPost );
                $artist_link = get_permalink($artist_post);
            ?>
            <a href="<?php echo $artist_link; ?>" class="product-card__author title title--small title--black-low title--w-normal product-card__link">
                <?php echo $artist_post->post_title; ?>
            </a>
            <div class="product-card__price title title--medium title--black-low title--w-black">
                <?php
                    $product_card_price = get_field('product-card_price', $idPost);
                    echo $product_card_price; ?> ₽
            </div>
        </div>

        <!-- gallery-card end -->
        <?php
        endwhile;
    endif;
    die();
}

add_action('wp_ajax_loadmore_gallery', 'loadmore_get_gallery');
add_action('wp_ajax_nopriv_loadmore_gallery', 'loadmore_get_gallery');







function loadmore_get_artist(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts($args);
    if(have_posts()) :
        while(have_posts()): the_post(); ?>

        <!-- artist start -->
        <a href="<?php the_permalink(); ?>" class="authors__item load-post-artist">
            <div class="authors__picture">
                <?php
                    $default_attr = [
                        'class'	=> "authors__photo",
                        'alt'   => get_the_title()
                    ];

                    echo get_the_post_thumbnail( $post->ID, 'large', $default_attr ) ?>
            </div>
            <div class="authors__name title title--medium title--black-low title--w-black">
                <?php the_title(); ?>
            </div>
        </a>

        <!-- artist end -->
        <?php
        endwhile;
    endif;
    die();
}

add_action('wp_ajax_loadmore_artist', 'loadmore_get_artist');
add_action('wp_ajax_nopriv_loadmore_artist', 'loadmore_get_artist');

 ?>
