<?php /* Template Name: Художники */?>
<?php get_header(); ?>

<!-- Authors -->
<section class="authors bg--white block-padding">
    <div class="authors__body container">
        <h2 class="authors__heading title title--big title--black-low title--w-black title--indent gs-reveal gs-reveal--from-left">
            Художники
        </h2>
        <div class="authors__list">
        <?php

            $args = array(
                'post_type' => 'artists',
                'posts_per_page' => 8,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'suppress_filters' => true
            );

            $wp_query = new WP_Query( $args );


            if( have_posts() ) : 
                while( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="authors__item gs-reveal">
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
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="authors__actions">
            <a href="javascript:;" class="button button--black">
                Показать еще
            </a>
        </div>
    </div>
</section>
<!-- /. Authors -->

<?php get_footer(); ?>