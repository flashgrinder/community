<?php get_header(); ?>

<!-- about-product -->
<section class="about-product bg-white">
    <div class="about-product__body container">
        <?php the_post(); ?>
        <div class="about-product__content">
            <div class="about-product__gallery">
                <div class="about-product__swiper-full swiper-container gs-reveal gs-reveal--from-left">
                    <div class="about-product__swiper-wrapper swiper-wrapper">
                    <?php 
                        $about_product_slides = get_field('about-product_slides');
                        if( $about_product_slides ): ?>
                        <?php foreach( $about_product_slides as $about_product_slide ): ?>
                            <div class="about-product__swiper-slide about-product__swiper-slide--full swiper-slide">
                                <div class="about-product__swiper-zoom-container swiper-zoom-container">
                                    <img src="<?php echo $about_product_slide['url']; ?>" alt="<?php echo esc_attr($about_product_slide['alt']); ?>" class="about-product__slide-photo">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                    <div class="about-product__zoom">
                        <svg class="about-product__zoom-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2941 14.5699 18.0029 12.8204 18 11C18 7.132 14.867 4 11 4C7.132 4 4 7.132 4 11C4 14.867 7.132 18 11 18C12.8204 18.0029 14.5699 17.2941 15.875 16.025L16.025 15.875ZM10 10V7H12V10H15V12H12V15H10V12H7V10H10Z" fill="#283550" fill-opacity="0.6"/>
                        </svg>
                    </div>
                </div>
                <div class="about-product__swiper-thumb swiper-container gs-reveal gs-reveal--from-left" thumbsSlider="">
                    <div class="about-product__swiper-wrapper-thumb swiper-wrapper">
                    <?php 
                        $about_product_slides = get_field('about-product_slides');
                        if( $about_product_slides ): ?>
                        <?php foreach( $about_product_slides as $about_product_slide ): ?>
                            <div class="about-product__swiper-slide-thumb swiper-slide">
                                <img src="<?php echo $about_product_slide['sizes']['thumbnail']; ?>" alt="<?php echo esc_attr($about_product_slide['alt']); ?>" class="about-product__slide-photo-thumb">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="about-product__description">
                <h2 class="about-product__name title title--medium title--black-low title--w-black gs-reveal gs-reveal--from-right">
                    “<?php the_title(); ?>”
                </h2>
                <h3 class="about-product__headline title title--small title--black-low title--w-normal gs-reveal gs-reveal--from-right">
                    <?php 
                        $idPost = get_the_ID();  
                        $artist_post = get_field( 'product-card_artist', $idPost );
                        echo $artist_post->post_title;
                    ?>
                </h3>
                <div class="about-product__text wysiwyg gs-reveal gs-reveal--from-right">
                    <?php the_content(); ?>
                </div>
                <div class="about-product__footer gs-reveal gs-reveal--from-right">
                    <div class="about-product__price title title--medium title--black-low title--w-black">
                        <?php
                            $product_card_price = get_field('product-card_price', $idPost);
                            echo $product_card_price; ?> ₽
                    </div>
                    <div class="about-product__action gs-reveal gs-reveal--from-right">
                        <a href="javascript:;" class="about-product__button button button--black" data-modal-trigger="modal-form">
                            Сделать заказ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /. about-product -->

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
                    'posts_per_page' => 8,
                    'post_parent' => $post->post_parent,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'suppress_filters' => true
                );

                $wp_query = new WP_Query( $args );


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
                                    echo $product_card_price; ?> ₽
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