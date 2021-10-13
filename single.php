<?php get_header(); ?>

<!-- Post -->
<section class="post bg--white">
    <div class="post__body container">
        <?php the_post(); ?>
        <article class="post__article">
            <header class="post__header">
                <figure class="post__figure gs-reveal">
                    <?php
                        $default_attr = [
                            'class'	=> "post__img",
                            'alt'   => get_the_title()
                        ];
                        
                        echo get_the_post_thumbnail( $post->ID, 'full', $default_attr ) ?>
                </figure>
                <div class="post__info">
                    <h1 class="post__title title title--large title--white title--w-black gs-reveal gs-reveal--from-left">
                        <?php the_title(); ?>
                    </h1>
                    <div class="post__meta gs-reveal gs-reveal--from-left">
                        <span class="post__date text text--normal text--w-regular">
                            <?php the_date('j F Y', $before); ?>
                        </span>
                    </div>
                </div>
            </header>
            <div class="post__content wysiwyg gs-reveal">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</section>
<!-- /. Post -->

<!-- Post-slider -->
<section class="post-slider post-slider--main bg--white">
    <div class="post-slider__body container">
        <div class="post-slider__navigation slider-nav gs-reveal">
            <div class="post-slider__arrow post-slider__arrow--prev slider-nav__arrow slider-nav__arrow--prev slider-nav__arrow--prev-black"></div>
            <div class="post-slider__arrow post-slider__arrow--next slider-nav__arrow slider-nav__arrow--next slider-nav__arrow--next-black"></div>
        </div>
        <div class="post-slider__swiper swiper-container gs-reveal gs-reveal--from-right">
            <div class="post-slider__swiper-wrapper swiper-wrapper">
            <?php

                $post_id = $wp_query->get_queried_object_id();

                $args = array(
                    'post__not_in' => [$post_id],
                    'posts_per_page' => 9,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'suppress_filters' => true
                );

                $wp_query = new WP_Query( $args );


                if( have_posts() ) : 
                    while( have_posts() ) : 
                        the_post();
                ?>
                    <div class="post-slider__swiper-slide swiper-slide">
                        <!-- Post-card -->
                        <article class="post-card">
                            <aside class="post-card__aside">
                                <a href="<?php the_permalink(); ?>" class="post-card__link">
                                    <figure class="post-card__figure">
                                        <?php
                                            $default_attr = [
                                                'class'	=> "post-card__img",
                                                'alt'   => get_the_title()
                                            ];
                                            
                                            echo get_the_post_thumbnail( $post->ID, 'full', $default_attr ) ?>
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
                                    <?php echo get_the_date('j F Y', $before); ?>
                                </div>
                            </footer>
                        </article>
                        <!-- /. Post-card -->
                    </div>
                    <?php endwhile; ?>
                <?php endif;?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<!-- /. Post-slider -->

<?php get_footer(); ?>