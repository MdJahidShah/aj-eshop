<?php get_header(); ?>
<main class="container-fluid px-5 py-3 ">
    <div class="row">
        <div class="col-sm-8">
            <?php get_template_part('template-parts/post_setup_page');?>
        </div>
        <div class="col-sm-4 sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
