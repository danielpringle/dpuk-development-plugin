<?php
/**
 * DPUK Development Plugin
 *
 * @package     DPUKDevloper
 * @author      Dan Pringle
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: DPUK Development Plugin
 * Plugin URI:  http://danielpringle.co.uk
 * Description: Development Sandbox plugin. This plugin displays errors in a more user friendly way.
 * Version:     1.0.0
 * Author:      Daniel Pringle
 * Author URI:  http://danielpringle.co.uk
 * Text Domain: DPUKDevloper
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
namespace DPUKDevloper;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

require_once( __DIR__ . '/vendor/autoload.php' );

add_action( 'init', __NAMESPACE__ . '\launch' );
function launch() {

}
