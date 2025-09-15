<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>
<div class="container-fluid px-5 py-3">
    <?php
        if ( is_shop() ) {
            // Shop page = plugin handles both filter + products
            echo do_shortcode('[ajxfiltrfrwo]');
        } else {
            // Shop page = plugin handles both filter + products
            echo do_shortcode('[ajxfiltrfrwocat]');

        }
    ?>
</div>
<?php get_footer( 'shop' );?>