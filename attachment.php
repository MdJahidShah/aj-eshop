<?php 
/*
The Template for displaying attachment pages
*/

get_header(); ?>
<main class="">
    <section class="container single-page py-3 ">
        <div class="row" id="aj-eshop-content">
            <div class="col-sm-12 px-1">
                <?php get_template_part('template-parts/post_setup')?>
                <?php var_export($post)?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
