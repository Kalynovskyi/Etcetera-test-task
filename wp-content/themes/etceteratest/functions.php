<?php
// Menu registration
function etcetera_test_theme_setup()
{
    register_nav_menus(array(
        'main-menu' => 'Main menu'
    ));
}
add_action('after_setup_theme', 'etcetera_test_theme_setup');

// Styles
function etcetera_test_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'etcetera_test_enqueue_styles');
