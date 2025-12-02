<?php
/**
 * Kint Usage Examples
 *
 * Example functions demonstrating how to use Kint for debugging.
 * These functions are disabled by default (commented out action hooks).
 * Uncomment the action hooks to enable specific examples.
 *
 * @package     DPUKDevloper
 * @since       1.0.0
 * @author      Dan Pringle
 * @link        http://www.danielpringle.co.uk
 * @license     GNU General Public License 2.0+
 */
namespace DPUKDevloper;

/**
 * Simple variable debugging example.
 *
 * Demonstrates basic usage of Kint's d() function to debug a variable.
 * Uncomment the action hook below to enable this example.
 *
 * @since 1.0.0
 * @return void
 */
// add_action( 'wp_loaded', __NAMESPACE__ . '\demo' );
function demo() {
	$user_id = 10;
	d( $user_id );
}

/**
 * Advanced Kint usage examples.
 *
 * Demonstrates various Kint debugging techniques including:
 * - Debugging WordPress functions
 * - Using Kint in loops
 * - Stack traces
 *
 * Uncomment the action hook below to enable this example.
 *
 * @since 1.0.0
 * @return void
 */
// add_action( 'wp_loaded', __NAMESPACE__ . '\example_uses_with_kint' );
function example_uses_with_kint() {
	// Debug WordPress post types
	// d( get_post_types() );

	// Debug post type supports
	// d( get_all_post_type_supports( 'post' ) );

	// Example: Debugging in a loop with stack trace
	// Note: The die() is for demonstration only - remove in production code
	for ( $number_of_loops = 0; $number_of_loops < 10; $number_of_loops++ ) {
		\Kint::trace(); // Use '\' when in a namespace to access global Kint
		// die( $number_of_loops ); // Uncomment to stop execution at each iteration
	}
}
