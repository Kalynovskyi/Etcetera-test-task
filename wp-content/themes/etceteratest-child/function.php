<?php
// Styles
function etcetera_test_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'etcetera_test_child_enqueue_styles');
