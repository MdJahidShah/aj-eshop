<?php
    /* Hero Section Widget Area */
    function register_hero_section_widget_area_fw() {
        register_sidebar(array(
            'name'          => __('Hero Section with Full Width', 'aj-eshop'),
            'id'            => 'hero-section-full-width',
            'before_widget' => '<div class="hero-section-full-width">',
            'after_widget'  => '</div>',
        ));
    }
    add_action('widgets_init', 'register_hero_section_widget_area_fw');

?>