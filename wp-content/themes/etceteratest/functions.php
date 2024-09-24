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
    wp_enqueue_style('parent-theme-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'etcetera_test_enqueue_styles');

//Add sidebar
function etcetera_test_register_sidebars()
{
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'textdomain'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'etcetera_test_register_sidebars');
