<?php get_header(); ?>

<!-- Search-page -->
<section class="search-page bg--white block-padding">
    <div class="search-page__body container">
        <h2 class="search-page__heading title title--big title--black-low title--w-black title--indent gs-reveal gs-reveal--from-left">
            Результаты поиска
        </h2>
        <h3 class="search-page__headline text text--normal text--black-low text--w-regular title--indent gs-reveal gs-reveal--from-left">
            Результаты поиска по запросу: <span class="search-page__result-word text text--normal text--black-low text--w-bold">«<?php the_search_query() ?>»</span>
        </h3>
        <div class="search-page__results">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="search-page__result gs-reveal gs-reveal--from-left">
                <a href="<?php the_permalink(); ?>" class="search-page__result-title title title--medium title--black-low title--w-black">
                   <?php the_title(); ?>
                </a>
                <p class="search-page__result-excerpt text text--normal text--black-low text--w-regular">
                    <?php the_excerpt(); ?>
                </p>
                <div class="search-page__result-date text text--normal text--dark text--w-regular">
                    Дата добавления: <?php echo get_the_date('d.m.Y', $before); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php else : ?>
            <div class="search-page__no-found text text--normal text--black-low text--w-black gs-reveal gs-reveal--from-left">
                По вашему запросу ничего не найдено.
            </div>
        <?php endif; ?>
		 <?php wp_reset_postdata();?>
        </div>
    </div>
</section>
<!-- /. Search-page -->

<?php get_footer(); ?>