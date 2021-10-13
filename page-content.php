<?php /* Template Name: Шаблон: Конентная страница */?>
<?php get_header(); ?>

<?php the_post(); ?>

<!-- Content -->
<section class="content bg--white block-padding">
    <div class="content__body container">
        <h2 class="content__heading title title--big title--black-low title--w-black center gs-reveal">
            <?php the_title(); ?>
        </h2>
        <div class="content__wysiwyg wysiwyg gs-reveal">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<!-- /. Content -->

<?php get_footer(); ?>