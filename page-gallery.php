<?php /* Template Name: Галерея */?>
<?php get_header(); ?>

<!-- Gallery -->
<section class="gallery bg--white block-padding">
    <div class="gallery__body container">
        <div class="gallery__cards" id="gallery-posts">
        <?php

            $args = array(
                'post_type' => 'paintings',
                'posts_per_page' => 12,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'suppress_filters' => true
            );

            $wp_query = new WP_Query( $args );


            if( have_posts() ) : 
                while( have_posts() ) : the_post(); ?>
                    <div class="product-card gs-reveal">
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
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <script>
            var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
            var posts_vars = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
        <div class="gallery__actions">
            <a href="javascript:;" class="button button--black" id="loadmore-gallery">
                Показать еще
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- Gallery -->

<?php get_footer(); ?>