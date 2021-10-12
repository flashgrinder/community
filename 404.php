<?php get_header(); ?>

<section class="page-404 bg--white block-padding">
    <div class="page-404__body container">
        <div class="page-404__wrapp">
            <div class="page-404__picture">
                <img class="page-404__img gs-reveal" src="<?php echo STANDART_DIR; ?>img/404.svg" alt="Страница 404">
                <a class="page-404__button button button--yellow gs-reveal" href="<?php echo home_url(); ?>">
                    На главную
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>