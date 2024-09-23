<?php

/**
 * Plugin Name: Etcetera test plugin
 * Description: Test plugin.
 * Version: 1.0
 */

// Plugin registration

function etcetera_test_real_estate_custom_post_type()
{
    $labels = array(
        'name' => 'Estate',
        'singular_name' => 'Estate',
        'menu_name' => 'Estate',
        'name_admin_bar' => 'Estate',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new estate',
        'new_item' => 'New estate',
        'edit_item' => 'Edit estate',
        'view_item' => 'View estate',
        'all_items' => 'All estate',
        'search_items' => 'Search estate',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in bin',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'real-estate'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('real_estate', $args);
}

add_action('init', 'etcetera_test_real_estate_custom_post_type');


function etcetera_test_real_estate_register_taxonomy()
{
    $labels = array(
        'name'              => 'District',
        'singular_name'     => 'District',
        'search_items'      => 'Search district',
        'all_items'         => 'All districts',
        'parent_item'       => 'Parent district',
        'parent_item_colon' => 'Parent district:',
        'edit_item'         => 'Edit district',
        'update_item'       => 'Update district',
        'add_new_item'      => 'Add new district',
        'new_item_name'     => 'New district name',
        'menu_name'         => 'Districts',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'district'),
    );

    register_taxonomy('district', array('real_estate'), $args);
}
add_action('init', 'etcetera_test_real_estate_register_taxonomy');
