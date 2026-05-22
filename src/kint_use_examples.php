<?php
/**
 * Kint Usage Examples
 *
 * Example functions demonstrating how to use Kint for debugging.
 * These functions are disabled by default (commented out action hooks).
 * Uncomment the action hooks to enable specific examples.
 *
 * @package     DPUK\WPLocalDebug
 * @since       1.0.0
 * @author      Dan Pringle
 * @link        http://www.danielpringle.co.uk
 * @license     GNU General Public License 2.0+
 */
namespace DPUK\WPLocalDebug;

// Attach runners to the hook (toggle as needed)
//add_action('wp_loaded', __NAMESPACE__ . '\run_kint_general_examples');
//add_action('wp_loaded', __NAMESPACE__ . '\run_kint_dev_tools');

function run_kint_general_examples() {
    $general_examples = [
        'user_id',
        'post_types',
        'post_type_supports',
        'example_uses_with_kint',
    ];
    foreach ($general_examples as $func) {
        if (function_exists(__NAMESPACE__ . '\\' . $func)) {
            call_user_func(__NAMESPACE__ . '\\' . $func);
        }
    }
}

function run_kint_dev_tools() {
    $dev_tools = [
		// 'block_pattern_categories',
        // 'wp_query',
        // 'constants',
        // 'current_user',
        // 'all_hooks',
        // 'request_data',
        // 'shortcodes',
        // 'enqueued_assets',
        // 'all_options',
        // 'specific_post',
        // 'stack_trace',
        // 'rest_api_request',
        // 'ajax_request',
        // 'post_types_details',
        // 'woocommerce_cart',
        // 'custom_query',
        // 'taxonomies',
        // 'theme_support',
        // 'transients',
    ];
    foreach ($dev_tools as $func) {
        if (function_exists(__NAMESPACE__ . '\\' . $func)) {
            call_user_func(__NAMESPACE__ . '\\' . $func);
        }
    }
}

/**
 * Example functions below...
 */


// --- General Kint Example Usage Functions ---
function user_id() {
    $user_id = 10;
    d($user_id, 'User ID');
}

function post_types() {
    d(get_post_types(), 'Post Types');
}

function post_type_supports() {
    d(get_all_post_type_supports('post'), 'Post Type Supports');
}

function example_uses_with_kint() {
    for ($i = 0; $i < 3; $i++) {
        \Kint::trace();
        d($i, 'Loop iteration');
    }
}

// --- Useful Development Tools Functions ---
function wp_query() {
    global $wp_query;
    d($wp_query, 'Global $wp_query');
}

function constants() {
    d(get_defined_constants(true), 'All Defined Constants');
}

function current_user() {
    $user = wp_get_current_user();
    d($user, 'Current WP_User Object');
}

function all_hooks() {
    global $wp_filter;
    d($wp_filter, 'All Registered Hooks');
}

function request_data() {
    d($_GET, '$_GET Data');
    d($_POST, '$_POST Data');
}

function shortcodes() {
    global $shortcode_tags;
    d($shortcode_tags, 'Registered Shortcodes');
}

function enqueued_assets() {
    global $wp_scripts, $wp_styles;
    d($wp_scripts, 'Enqueued Scripts');
    d($wp_styles, 'Enqueued Styles');
}

function all_options() {
    d(wp_load_alloptions(), 'All Options');
}

function specific_post() {
    $post = get_post(1); // Change 1 to any post ID
    d($post, 'Post Object for ID 1');
}

function stack_trace() {
    \Kint::trace();
}

function rest_api_request() {
    if ( defined('REST_REQUEST') && REST_REQUEST ) {
        d($_REQUEST, 'REST API $_REQUEST');
    }
}

function ajax_request() {
    if ( defined('DOING_AJAX') && DOING_AJAX ) {
        d($_REQUEST, 'AJAX $_REQUEST');
    }
}

function post_types_details() {
    $post_types = get_post_types([], 'objects');
    d($post_types, 'Post Types (Detailed Objects)');
}

function woocommerce_cart() {
    if ( class_exists('WooCommerce') && function_exists('WC') ) {
        $cart = WC()->cart;
        d($cart, 'WooCommerce Cart');
    }
}

function custom_query() {
    $args = [
        'post_type' => 'page',
        'posts_per_page' => 2,
    ];
    $query = new \WP_Query($args);
    d($query, 'Custom WP_Query for Pages');
}

function taxonomies() {
    d(get_taxonomies([], 'objects'), 'Registered Taxonomies');
}

function theme_support() {
    global $_wp_theme_features;
    d($_wp_theme_features, 'Theme Support Features');
}

function transients() {
    global $wpdb;
    $transients = $wpdb->get_results(
        "SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE '%_transient_%' LIMIT 10"
    );
    d($transients, 'Transients (first 10)');
}

function block_pattern_categories() {
		$categories = \WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
        !+d($categories, 'Registered Block Pattern Categories', true);
}