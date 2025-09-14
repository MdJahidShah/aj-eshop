<?php 
/**
 * The template for displaying search pages.
 *
 * @package AJ_Square
 */


get_header(); ?>

<div class="container-fluid px-5 py-3 aj-eshop-content-search ">
    <div class="row commoncon" id="aj-eshop-content_wrapper">
        <div class="col-sm-12" id="aj-eshop-content">
            <div class="row bg-dark text-white p-3 mb-3 rounded mt-3" id="aj-eshop-search-content">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3 rounded text-center" id="aj-eshop-search-header">
                    <h1 class="text-center text-white">Search Results For: "<?php echo get_search_query(); ?>"</h1>
                    <p class="text-center">Please visit the <a href="<?php echo esc_url(home_url('/')); ?>">Home Page</a>.</p>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?php get_template_part('/template-parts/blog_setup')?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
