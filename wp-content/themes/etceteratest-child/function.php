<?php
// Styles

function etcetera_test_child_enqueue_styles()
{

    wp_enqueue_style('child-theme-style', get_stylesheet_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'etcetera_test_child_enqueue_styles');
