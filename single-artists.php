<?php get_header(); ?>

<!-- About-author -->
<section class="about-author bg-white">
    <div class="about-author__body container">
        <?php the_post(); ?>
        <div class="about-author__content">
            <div class="about-author__photo gs-reveal gs-reveal--from-left">
                <?php
                    $default_attr = [
                        'class'	=> "about-author__img",
                        'alt'   => get_the_title()
                    ];
                    
                    echo get_the_post_thumbnail( $post->ID, 'full', $default_attr ) ?>
            </div>
            <div class="about-author__description">
                <h2 class="about-author__name title title--medium title--black-low title--w-black gs-reveal gs-reveal--from-right">
                    <?php the_title(); ?>
                </h2>
                <h3 class="about-author__headline title title--small title--black-low title--w-normal gs-reveal gs-reveal--from-right">
                    Об авторе
                </h3>
                <div class="about-author__text wysiwyg gs-reveal gs-reveal--from-right">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /. About-author -->

<!-- Product-slider -->
<section class="product-slider product-slider--works bg-white">
    <div class="product-slider__body container">
        <h2 class="product-slider__heading title title--medium title--black-low title--w-black gs-reveal gs-reveal--from-left">
            Работы автора
        </h2>
        <div class="product-slider__navigation slider-nav gs-reveal">
            <div class="product-slider__arrow product-slider__arrow--prev slider-nav__arrow slider-nav__arrow--prev slider-nav__arrow--prev-black"></div>
            <div class="product-slider__arrow product-slider__arrow--next slider-nav__arrow slider-nav__arrow--prev slider-nav__arrow--next-black"></div>
        </div>
        <div class="product-slider__swiper swiper-container">
            <div class="product-slider__swiper-wrapper swiper-wrapper gs-reveal gs-reveal--from-right">
            <?php

                $args = array(
                    'post_type' => 'paintings',
                    'post_parent'=>$post->ID,
                    'posts_per_page' => 8,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'suppress_filters' => true
                );

                $wp_query = new WP_Query( $args );

                $artist_name = get_posts(['post_type' => 'artists']);
                if( have_posts() ) : 
                    while( have_posts() ) : the_post(); ?>
                    <div class="product-slider__swiper-slide swiper-slide">
                        <div class="product-card product-card--slider">
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
                                    if( !empty($product_card_price) ) { echo "{$product_card_price} ₽"; } else { echo ""; } ?> 
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<!-- /. Product-slider -->

<?php get_footer(); ?>