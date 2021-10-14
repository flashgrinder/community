<?php /* Template Name: Галерея */?>
<?php get_header(); ?>

<!-- Gallery -->
<section class="gallery bg--white block-padding">
    <div class="gallery__body container">
        <div class="gallery__cards">
        <?php

            $args = array(
                'post_type' => 'paintings',
                'posts_per_page' => 16,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'suppress_filters' => true
            );

            $wp_query = new WP_Query( $args );


            if( have_posts() ) : 
                while( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="product-card gs-reveal">
                        <div class="product-card__picture">
                            <?php
                                $default_attr = [
                                    'class'	=> "product-card__photo",
                                    'alt'   => get_the_title()
                                ];
                                            
                                echo get_the_post_thumbnail( $post->ID, 'medium', $default_attr ) ?>
                        </div>
                        <div class="product-card__name title title--medium title--black-low title--w-black">
                            <?php the_title(); ?>
                        </div>
                        <div class="product-card__author title title--small title--black-low title--w-normal">
                            Алла Рой <?php echo get_field('product-card_artist'); ?>
                        </div>
                        <div class="product-card__price title title--medium title--black-low title--w-black">
                            25 000 ₽ <?php echo get_field('product-card_price'); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<!-- Gallery -->

<?php get_footer(); ?>