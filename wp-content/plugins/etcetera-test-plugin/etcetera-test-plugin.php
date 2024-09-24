<?php

/**
 * Plugin Name: Etcetera test plugin
 * Description: Test plugin.
 * Version: 1.0
 */


/*
    1.Plugin registration
    2.Taxonomy registration
    3.Filter shortcode
    4.Filter widget
    5.Filter widget registration
    6.Ajax connection
*/

/* Plugin registration */

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

/* Taxonomy registration */
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

/* Filter shortcode */
function etcetera_test_real_estate_filter_shortcode()
{
    ob_start(); 
?>
    <form method="get" action="" id="real-estate-filter-form" class="estate-filter-form card">
        <div>
            <label for="estate_name">Estate name:</label>
            <input type="text" id="estate_name" name="estate_name" value="<?php echo isset($_GET['estate_name']) ? esc_attr($_GET['estate_name']) : ''; ?>" />
        </div>

        <div>
            <label for="floors">Floors:</label>
            <select id="floors" name="floors">
                <option value="">Choose</option>
                <?php for ($i = 1; $i <= 20; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php selected($i, $_GET['floors']); ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div>
            <label for="estate_type">Estate type:</label>
            <select id="estate_type" name="estate_type">
                <option value="">Choose</option>
                <option value="Panel" <?php selected('Panel', $_GET['estate_type']); ?>>Panel</option>
                <option value="Brick" <?php selected('Brick', $_GET['estate_type']); ?>>Brick</option>
                <option value="Foam block" <?php selected('Foam block', $_GET['estate_type']); ?>>Foam block</option>
            </select>
        </div>

        <div>
            <label for="environmental_friendliness">Environmental friendliness:</label>
            <select id="environmental_friendliness" name="environmental_friendliness">
                <option value="">Choose</option>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php selected($i, $_GET['environmental_friendliness']); ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div>
            <label for="area">Area:</label>
            <input type="text" id="area" name="area" value="<?php echo isset($_GET['area']) ? esc_attr($_GET['area']) : ''; ?>" />
        </div>

        <div>
            <label for="amount_of_rooms">Rooms:</label>
            <select id="amount_of_rooms" name="amount_of_rooms">
                <option value="">Choose</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php selected($i, $_GET['amount_of_rooms']); ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div>
            <label for="balconies">Balconies:</label>
            <select id="balconies" name="balconies">
                <option value="">Choose</option>
                <option value="Yes" <?php selected('Yes', $_GET['balconies']); ?>>Yes</option>
                <option value="No" <?php selected('No', $_GET['balconies']); ?>>No</option>
            </select>
        </div>

        <div>
            <label for="bathroom">Bathroom:</label>
            <select id="bathroom" name="bathroom">
                <option value="">Choose</option>
                <option value="Yes" <?php selected('Yes', $_GET['bathroom']); ?>>Yes</option>
                <option value="No" <?php selected('No', $_GET['bathroom']); ?>>No</option>
            </select>
        </div>

        <button type="submit">Search</button>
    </form>
    <div id="real-estate-results" class="real-estate-results"></div>
    <?php

    if (isset($_GET['estate_name']) || isset($_GET['floors']) || isset($_GET['estate_type']) || isset($_GET['environmental_friendliness']) || isset($_GET['area']) || isset($_GET['amount_of_rooms']) || isset($_GET['balconies']) || isset($_GET['bathroom'])) {
        $args = array(
            'post_type' => 'real_estate',
            'meta_query' => array(
                'relation' => 'AND',
            ),
        );

        if (!empty($_GET['estate_name'])) {
            $args['meta_query'][] = array(
                'key' => 'estate_name',
                'value' => sanitize_text_field($_GET['estate_name']),
                'compare' => 'LIKE',
            );
        }

        if (!empty($_GET['floors'])) {
            $args['meta_query'][] = array(
                'key' => 'floors',
                'value' => intval($_GET['floors']),
                'compare' => '=',
            );
        }

        if (!empty($_GET['estate_type'])) {
            $args['meta_query'][] = array(
                'key' => 'estate_type',
                'value' => sanitize_text_field($_GET['estate_type']),
                'compare' => '=',
            );
        }

        if (!empty($_GET['environmental_friendliness'])) {
            $args['meta_query'][] = array(
                'key' => 'environmental_friendliness',
                'value' => intval($_GET['environmental_friendliness']),
                'compare' => '=',
            );
        }

        if (!empty($_GET['area'])) {
            $args['meta_query'][] = array(
                'key' => 'area',
                'value' => sanitize_text_field($_GET['area']),
                'compare' => 'LIKE',
            );
        }

        if (!empty($_GET['amount_of_rooms'])) {
            $args['meta_query'][] = array(
                'key' => 'amount_of_rooms',
                'value' => intval($_GET['amount_of_rooms']),
                'compare' => '=',
            );
        }

        if (!empty($_GET['balconies'])) {
            $args['meta_query'][] = array(
                'key' => 'balconies',
                'value' => sanitize_text_field($_GET['balconies']),
                'compare' => '=',
            );
        }

        if (!empty($_GET['bathroom'])) {
            $args['meta_query'][] = array(
                'key' => 'bathroom',
                'value' => sanitize_text_field($_GET['bathroom']),
                'compare' => '=',
            );
        }

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            echo '<h2>Search results:</h2>';
            
            while ($query->have_posts()) : $query->the_post(); ?>
                <div>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p>Floors amount: <?php the_field('floors'); ?></p>
                    <p>Estate type: <?php the_field('estate_type'); ?></p>
                    <p>Environmental friendliness: <?php the_field('environmental_friendliness'); ?></p>
                    <?php if (get_field('estate_image')): ?>
                        <img src="<?php echo wp_get_attachment_url(get_field('estate_image', false, false)); ?>" alt="Room image">
                    <?php endif; ?>
                </div>
            <?php endwhile;
        } else {
            echo '<p>There are no results.</p>';
        }
        wp_reset_postdata();
    }

    return ob_get_clean();
}
add_shortcode('real_estate_filter', 'etcetera_test_real_estate_filter_shortcode');

/* Filter widget */
class Etcetera_Test_Real_Estate_Filter_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'etcetera_test_real_estate_filter_widget',
            __('Estate filter', 'real-estate'),
            array('description' => __('Filters for estate search'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters('widget_title', 'Estate filter') . $args['after_title'];
        echo do_shortcode('[real_estate_filter]');
        echo $args['after_widget'];
    }
}

/* Filter widget registration */
function etcetera_test_real_estate_register_widget()
{
    register_widget('Etcetera_Test_Real_Estate_Filter_Widget');
}
add_action('widgets_init', 'etcetera_test_real_estate_register_widget');

/* Ajax connection */
function etcetera_test_real_estate_enqueue_scripts()
{
    wp_enqueue_script('real-estate-ajax', plugin_dir_url(__FILE__) . 'js/real-estate-ajax.js', array('jquery'), null, true);

    wp_localize_script('real-estate-ajax', 'realEstateAjax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'etcetera_test_real_estate_enqueue_scripts');

function real_estate_filter_ajax()
{
    $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $args = array(
        'post_type' => 'real_estate',
        'posts_per_page' => 5,
        'paged' => $paged,
        'meta_query' => array(
            'relation' => 'AND',
        ),
    );

    if (!empty($_GET['estate_name'])) {
        $args['meta_query'][] = array(
            'key' => 'estate_name',
            'value' => sanitize_text_field($_GET['estate_name']),
            'compare' => 'LIKE',
        );
    }

    if (!empty($_GET['floors'])) {
        $args['meta_query'][] = array(
            'key' => 'floors',
            'value' => intval($_GET['floors']),
            'compare' => '=',
        );
    }

    if (!empty($_GET['estate_type'])) {
        $args['meta_query'][] = array(
            'key' => 'estate_type',
            'value' => sanitize_text_field($_GET['estate_type']),
            'compare' => '=',
        );
    }

    if (!empty($_GET['environmental_friendliness'])) {
        $args['meta_query'][] = array(
            'key' => 'environmental_friendliness',
            'value' => intval($_GET['environmental_friendliness']),
            'compare' => '=',
        );
    }

    if (!empty($_GET['amount_of_rooms'])) {
        $args['meta_query'][] = array(
            'key' => 'amount_of_rooms',
            'value' => intval($_GET['amount_of_rooms']),
            'compare' => '=',
        );
    }

    if (!empty($_GET['balconies'])) {
        $args['meta_query'][] = array(
            'key' => 'balconies',
            'value' => sanitize_text_field($_GET['balconies']),
            'compare' => '=',
        );
    }

    if (!empty($_GET['bathroom'])) {
        $args['meta_query'][] = array(
            'key' => 'bathroom',
            'value' => sanitize_text_field($_GET['bathroom']),
            'compare' => '=',
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<ul class="estate">';
        while ($query->have_posts()) : $query->the_post();
            ?>
            <li class="estate-item card">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="estate-item-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </a>

                <p>Floors amount: <?php the_field('floors'); ?></p>
                <p>Estate type: <?php the_field('estate_type'); ?></p>
                <p>Environmental friendliness: <?php the_field('environmental_friendliness'); ?></p>
                    <?php if (get_field('estate_image')): ?>
                        <img src="<?php echo wp_get_attachment_url(get_field('estate_image', false, false)); ?>" alt="Room image">
                    <?php endif; ?>
            </li>
<?php
        endwhile;
        echo '</ul>';

        $total_pages = $query->max_num_pages;
        if ($total_pages > 1) {
            echo '<div class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="#" data-page="' . $i . '">' . $i . '</a>';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No results.</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_real_estate_filter', 'real_estate_filter_ajax');
add_action('wp_ajax_nopriv_real_estate_filter', 'real_estate_filter_ajax');
