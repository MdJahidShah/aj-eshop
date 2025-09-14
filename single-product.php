<?php
defined( 'ABSPATH' ) || exit;

// Include custom header if available
if ( locate_template( 'header-shop.php' ) ) {
    include locate_template( 'header-shop.php' );
} else {
    get_header();
}
?>

<style>
    .woocommerce .quantity .qty {
        padding: 5px 0;
    }
    .row.social-share {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-content: center;
    }
    span.posted_in {
        font-weight: 700;
    }
    span.posted_in a {
        font-weight: 500;
        text-decoration: none;
    }
    span.posted_in a:hover {
        text-decoration: underline;
        color: var(--pink-color);
    }
    .product-short-description,
    .product-full-description {
        margin-top: 15px;
    }
</style>

<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12 pt-3">
            <?php
            // WooCommerce handles everything with hooks
            do_action( 'woocommerce_before_single_product' );

            global $product;
            $product = wc_get_product( get_the_ID() );

            if ( post_password_required() ) {
                echo get_the_password_form();
                return;
            }
            ?>

            <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        /**
                         * Hook: woocommerce_before_single_product_summary.
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                        ?>

                        <div class="summary entry-summary">
                            <?php
                            /**
                             * Hook: woocommerce_single_product_summary.
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked custom_product_short_description - 15
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             */
                            do_action( 'woocommerce_single_product_summary' );
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action( 'woocommerce_after_single_product_summary' );
                ?>
            </div>

            <?php do_action( 'woocommerce_after_single_product' ); ?>

        </div>
    </div>
</div>

<?php get_template_part( '/template_parts/upper_footer' ); ?>
<?php get_footer( 'shop' ); ?>
