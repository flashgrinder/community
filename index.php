<?php get_header(); ?>

<!-- Articles -->
<section class="articles bg--white block-padding">
    <div class="articles__body container">
        <h2 class="articles__heading title title--big title--black-low title--w-black title--indent gs-reveal gs-reveal--from-left">
            Новости
        </h2>
        <div class="articles__posts" id="articles-posts">
        <?php

            $args = array(
                'posts_per_page' => 3,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'suppress_filters' => true
            );

            $wp_query = new WP_Query( $args );


            if( have_posts() ) : 
                while( have_posts() ) : 
                    the_post();
            ?>
                <!-- Post-card -->
                <article class="post-card gs-reveal">
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
                            <?php echo get_the_date('j F Y', $before); ?>
                        </div>
                    </footer>
                </article>
                <!-- /. Post-card -->
                <?php endwhile; ?>
            <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php if ($wp_query->max_num_pages > 1) : ?>
            <script>
                var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
                var posts_vars = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <div class="articles__actions">
                <a href="javascript:;" class="button button--black" id="loadmore-news">
                    Показать еще
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- /. Articles -->

<?php get_footer(); ?>