<?php
// Include the Navwalker class
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <style>
            .row.shopnavbar {width: 100%;display: flex;align-items: center;}
            a.navbar-brand.custom-logo-widget-shop i{color:var(--secondary-color);}
            a.navbar-brand.custom-logo-widget-shop i:hover{color:var(--pink-color);}
            .shopnav.nav-color {display: flex;align-items: center;justify-content: center;}
            .wooshop {display: flex !important;align-items: center;justify-content: flex-end !important;}
            @media screen and (max-width: 650px){
                .col-sm-6{text-align:center !important;}
                .wooshop {justify-content: center  !important;padding: 10px 0;}
            }
        </style>
        <?php wp_head(); ?>
        <!--Shop Header-->
    </head>
    <?php wp_body_open(); ?>
    
    <body <?php body_class(); ?>>
        <!--button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <!--button-->
        <?php
            $menu_position = get_theme_mod('ajs_menu_position', 'right-menu');

            switch ($menu_position) {
                case 'left-menu':
                    $menu_class = 'justify-content-start';
                    break;
                case 'center-menu':
                    $menu_class = 'justify-content-center';
                    break;
                case 'right-menu':
                default:
                    $menu_class = 'justify-content-end';
                    break;
            }
        ?>
        <div class="container-fluid px-5 top-header-bg border-bottom overflow-hidden">
            <div class="py-2">
                <div class="row text-center d-flex flex-wrap justify-content-between overflwhidden">
                    <!-- Column 1 -->
                    <div class="col-sm-4 pb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i> <?php print get_option('address-info');?>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-sm-4 pb-2">
                        <i class="bi bi-envelope-fill me-2"></i> <?php print get_option('email-info');?>
                    </div>

                    <!-- Column 3 -->
                    <div class="col-sm-4 pb-2">
                        <i class="bi bi-telephone-fill me-2"></i> <?php print get_option('phone-info');?>
                    </div>
                </div>
            </div>
        </div>
        <section class="container-fluid px-5 btbb">
           <?php get_template_part('/template-parts/menushop')?>
        </section>
        
        <header class="container-fluid px-3  py-4 sticky-top" id="main-header">
            <?php get_template_part('/template-parts/menu')?>
        </header>