<?php
    // Theme Function
    function ajs_custom_logo_widget_init($wp_customize){
        //Header Area Function
        $wp_customize->add_section('ajs_header_area', array(
            'title' =>__('Header Area', 'aj-eshop'),
            'description' => 'If you interested to update your header area, you can change it here.'
        ));

        $wp_customize->add_setting('ajs_logo', array(
            'default' => get_template_directory_uri() . '/assets/images/logo.png',
            'sanitize_callback' => 'esc_url_raw', 
        ));

        $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'ajs_logo', array(
            'label' => 'Logo Upload',
            'description' => 'If you interested to change or update your logo you can change it.',
            'setting' => 'ajs_logo',
            'section' => 'ajs_header_area',
        ) ));

        // Menu Position Function
        $wp_customize->add_section('ajs_menu_position', array(
            'title' => __('Menu Position', 'aj-eshop'),
            'description' => 'If you want to change your menu position, you can change it here.',
        ));

        $wp_customize->add_setting('ajs_menu_position', [
            'default' => 'right-menu',
            'sanitize_callback' => 'sanitize_text_field', // ✅ Add this for safety
        ]);

        $wp_customize->add_control('ajs_menu_position', [
            'type' => 'radio',
            'section' => 'ajs_menu_position',
            'label' => __('Menu Position', 'aj-eshop'),
            'choices' => [
                'left-menu' => __('Left Menu', 'aj-eshop'),
                'center-menu' => __('Center Menu', 'aj-eshop'),
                'right-menu' => __('Right Menu', 'aj-eshop'),
            ],
        ]);

        //Footer Area Function
        $wp_customize->add_section('ajs_footer_area', array(
            'title' => __('Footer Area', 'aj-eshop'),
            'description' => __('If you want to update your footer area, you can change it here.', 'aj-eshop')
        ));

        $wp_customize->add_setting('ajs_copyright_footer_text', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        add_filter( 'theme_mod_ajs_copyright_footer_text', function ( $value ) {
            return empty( $value ) ? sprintf( __( '© %s AJ Square. All rights reserved.', 'aj-eshop' ), date('Y') ) : $value;
        });



        $wp_customize->add_control('ajs_copyright_footer_text', array(
            'label' => __('Footer Copyright Text', 'aj-eshop'),
            'section' => 'ajs_footer_area',
            'type' => 'text',
        ));

        // Footer Social Media Links
        $wp_customize->add_section('ajs_footer_social_media', array(
            'title' => __('Footer Social Media', 'aj-eshop'),
            'description' => __('If you want to update your footer social media links, you can change it here.', 'aj-eshop')
        ));
        $wp_customize->add_setting('facebook_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('facebook_url', array(
            'label' => __('Facebook URL', 'aj-eshop'),
            'section' => 'ajs_footer_social_media',
            'type' => 'url',
        ));
        $wp_customize->add_setting('instagram_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('instagram_url', array(
            'label' => __('Instagram URL', 'aj-eshop'),
            'section' => 'ajs_footer_social_media',
            'type' => 'url',
        ));
        $wp_customize->add_setting('twitter_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('twitter_url', array(
            'label' => __('Twitter URL', 'aj-eshop'),
            'section' => 'ajs_footer_social_media',
            'type' => 'url',
        ));
        // Theme Color Function
        $wp_customize->add_section('ajs_theme_color', array(
            'title' => __('Theme Colors', 'aj-eshop'),
            'description' => __('If you want to change your theme Background color, you can change it here.', 'aj-eshop')
        ));
        // Theme Background Color
        $wp_customize->add_setting('ajs_bg_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ajs_bg_color', array(
            'label' => __('Theme Background Color', 'aj-eshop'),
            'section' => 'ajs_theme_color',
            'settings' => 'ajs_bg_color',
        )));
        // Link Color Function
        $wp_customize->add_setting('ajs_link_color', array(
            'default' => '#007bff',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ajs_link_color', array(
            'label' => __('Link Color', 'aj-eshop'),
            'section' => 'ajs_theme_color',
            'settings' => 'ajs_link_color',
        )));
        // Hover Color Function
        $wp_customize->add_setting('ajs_hover_color', array(
            'default' => '#005177',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ajs_hover_color', array(
            'label' => __('Hover Color', 'aj-eshop'),
            'section' => 'ajs_theme_color',
            'settings' => 'ajs_hover_color',
        )));
        
    }
    add_action('customize_register', 'ajs_custom_logo_widget_init');

    // Customizer CSS for Header Logo
    function ajs_theme_color() {
        ?><style>
            body {background-color: <?php echo esc_html(get_theme_mod('ajs_bg_color')); ?>;}
            :root {--link-color: <?php echo esc_html(get_theme_mod('ajs_link_color')); ?>;}
            :root {--link-hover-color: <?php echo esc_html(get_theme_mod('ajs_hover_color')); ?>;}
        </style>
        <?php
    }
    add_action('wp_head', 'ajs_theme_color');

    // Custom Login Background and Logo 
    function ajs_custom_login_bg_logo($wp_customize){
        // Theme Custom Login
        $wp_customize->add_section('ajs_custom_login', array(
            'title' => __('Custom Login', 'aj-eshop'),
            'description' => __('If you want to change your custom login logo, you can change it here.', 'aj-eshop')
        ));
        // Custom Login Background Image
        $wp_customize->add_setting('ajs_custom_login_bg_image', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ajs_custom_login_bg_image', array(
            'label' => __('Custom Login Background Image', 'aj-eshop'),
            'description' => __('If you want to change your custom login background image, you can change it here.', 'aj-eshop'),
            'setting' => 'ajs_custom_login_bg_image',
            'section' => 'ajs_custom_login',
        )));
        // Custom Login Logo
        $wp_customize->add_setting('ajs_custom_login_logo', array(
            'default' => get_template_directory_uri() . '/assets/images/login-logo.png',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ajs_custom_login_logo', array(
            'label' => __('Custom Login Logo', 'aj-eshop'),
            'description' => __('If you want to change your custom login logo, you can change it here.', 'aj-eshop'),
            'setting' => 'ajs_custom_login_logo',
            'section' => 'ajs_custom_login',
        )));
    }
    add_action('customize_register', 'ajs_custom_login_bg_logo');

    // Custom Login Background and Logo 
    function ajs_custom_login_styles() {
        ?>
        <style>
            body.login {background: url('<?php echo esc_url(get_theme_mod('ajs_custom_login_bg_image')); ?>') !important;}
            #login h1 a {background-image: url('<?php echo esc_url(get_theme_mod('ajs_custom_login_logo')); ?>') !important;}
        </style>
        <?php
    }
    add_action('login_enqueue_scripts', 'ajs_custom_login_styles');
