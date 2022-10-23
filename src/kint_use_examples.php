<?php
/**
 * Kint test file
 *
 * @package     DPUKDevloper
 * @since       1.0.0
 * @author      Dan Pringle
 * @link        http://www.danielpringle.co.uk
 * @license     GNU General Public License 2.0+
 */
namespace DPUKDevloper;

 add_action( 'wp_loaded', __NAMESPACE__ . '\demo' ); 
/**
 * Demo - testing purposes.
 *
 * @since 1.0.0
 *
 * @return void
 */

function demo() {

	$user_id =10;

	d( $user_id );

}



//add_action( 'wp_loaded', __NAMESPACE__ . '\example_uses_with_kint' );
/**
 * Example uses with Kint
 *
 * @since 1.0.0
 *
 * @return void
 */
function example_uses_with_kint() {
	//d( get_post_types());

	//d( get_all_post_type_supports( 'post'));

	for( $number_of_loops = 0; $number_of_loops <10; $number_of_loops++ ){
		\Kint::trace();   // use '\' when in a namespace to get back to the global space 
		die($number_of_loops);
	}

}
