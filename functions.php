<?php
    /**
    * Theme functions and definitions
    */ 
function ajsquare_theme_textdomain() {
    load_theme_textdomain('aj-eshop', get_template_directory() . '/languages');
}
add_action('init', 'ajsquare_theme_textdomain', 15);

        // All Default Theme Function 
        include_once ('inc/default.php');
        // Theme Function
        include_once ('inc/theme_function.php');
        // Enqueue Function
        include_once ('inc/enqueue.php');
        // Login Enqueue Function
        include_once ('inc/login_enqueue.php');
        // Menu registration
        include_once ('inc/menu_function.php');
        // Excerpt Function
        include_once ('inc/excerpt_function.php');
        // Documentation Function
        include_once ('inc/documentation_function.php');
        //restrict_search_function
        include_once ('inc/restrict_search_function.php');
        // Pagination Function
        include_once ('inc/pagination_function.php');
        // Widgets Register
        include_once ('inc/widgets_register.php');
        // Hero Section Function
        include_once ('inc/herosection_widget.php');
        // Homepage Hero Section
        include_once ('inc/homepage_hero.php');
        // FAQ Widget
        include_once ('inc/faq_widget.php');
        // Customizer Theme Option 
        include_once ('inc/theme_option/admin_theme_option.php');

        // Elementor compatibility
        function ajsquare_elementor_support() {
            add_theme_support('elementor');
        }
        add_action('after_setup_theme', 'ajsquare_elementor_support');

        // Start session properly
        // function mars_quiz_session_start() {
        //     if (!session_id()) {
        //         session_start();
        //     }
        // }
        // add_action('init', 'mars_quiz_session_start', 1);

        function custom_editor_styles() {
            add_theme_support( 'editor-styles' );
            add_editor_style( 'assets/css/editor-style.css' );
        }
        add_action( 'after_setup_theme', 'custom_editor_styles' );


        function enqueue_react_app() {
            // Only load on the React Video Editor template
            if (is_page_template('template-react-editor.php')) {

                // Load React and ReactDOM from CDN
                wp_enqueue_script('react', 'https://unpkg.com/react @18/umd/react.development.js', [], null, true);
                wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom @18/umd/react-dom.development.js', [], null, true);

                // Babel for JSX support
                wp_enqueue_script('babel', 'https://unpkg.com/ @babel/standalone/babel.min.js', [], null, true);

                // Tailwind CSS CDN (for styling)
                wp_enqueue_style('tailwind-css', 'https://cdn.jsdelivr.net/npm/tailwindcss @3.4.1/dist/tailwind.min.css');

                // Enqueue your React component
                wp_enqueue_script('react-editor', get_theme_file_uri('/assets/js/react-video-editor.js'), [], null, true);
            }
        }
        add_action('wp_enqueue_scripts', 'enqueue_react_app');



remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

function custom_product_short_description() {
    global $post;

    if ( has_excerpt( $post->ID ) ) {
        echo '<div class="product-short-description">';
        echo wpautop( get_the_excerpt( $post->ID ) );
        echo '</div>';
    }
}
add_action( 'woocommerce_single_product_summary', 'custom_product_short_description', 21 ); // Just after default (20)

add_filter( 'woocommerce_product_tabs', 'custom_replace_description_tab_content' );

function custom_replace_description_tab_content( $tabs ) {
    $tabs['description']['callback'] = 'custom_full_description_tab_callback';
    return $tabs;
}

function custom_full_description_tab_callback() {
    global $post;
    echo '<h2>Description</h2>';
    echo wpautop( $post->post_content );
}

add_action( 'template_redirect', function() {
    if ( is_shop() || is_product_category() ) {
        wc_get_template( 'archive-product.php' ); // Force your custom template
        exit;
    }
});
