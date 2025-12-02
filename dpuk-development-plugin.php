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


// Plugin constants
if ( ! defined( __NAMESPACE__ . '\PLUGIN_VERSION' ) ) {
	define( __NAMESPACE__ . '\PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( __NAMESPACE__ . '\PLUGIN_DIR' ) ) {
	define( __NAMESPACE__ . '\PLUGIN_DIR', __DIR__ );
}

if ( ! defined( __NAMESPACE__ . '\PLUGIN_URL' ) ) {
	define( __NAMESPACE__ . '\PLUGIN_URL', plugins_url( '', __FILE__ ) );
}

/**
 * Check if we're in a development environment.
 *
 * @since 1.0.0
 * @return bool True if development environment, false otherwise.
 */
function is_development_environment() {
	// Check wp-config constant first
	if ( defined( '\WP_ENVIRONMENT_TYPE' ) ) {
		return in_array( \WP_ENVIRONMENT_TYPE, [ 'local', 'development' ], true );
	}
	
	// Fallback to WP_DEBUG
	return defined( '\WP_DEBUG' ) && \WP_DEBUG;
}

/**
 * Plugin Control via wp-config.php
 * 
 * This plugin runs by default. To disable it, add this to wp-config.php:
 * 
 *     define( 'DPUK_DEV_PLUGIN_ENABLED', false );
 * 
 * Behavior:
 * - If constant is NOT defined → Plugin runs (default behavior)
 * - If constant is defined as true → Plugin runs
 * - If constant is defined as false → Plugin does NOT run
 * 
 * Note: The leading backslash (\DPUK_DEV_PLUGIN_ENABLED) is required because
 * we're inside a namespace and need to reference the global constant.
 */

if ( ( ! defined( '\DPUK_DEV_PLUGIN_ENABLED' ) || \DPUK_DEV_PLUGIN_ENABLED ) && is_development_environment() ) {
	$autoloader = __DIR__ . '/vendor/autoload.php';
	if ( file_exists( $autoloader ) ) {
		require_once( $autoloader );
		add_action( 'init', __NAMESPACE__ . '\launch' );
	}
}

/**
 * Launch function - placeholder for plugin functionality
 *
 * @since 1.0.0
 * @return void
 */
function launch() {
	// Add your plugin functionality here
}

/**
 * Plugin activation hook.
 *
 * @since 1.0.0
 * @return void
 */
function activate() {
	// Add activation logic here if needed
}

/**
 * Plugin deactivation hook.
 *
 * @since 1.0.0
 * @return void
 */
function deactivate() {
	// Add deactivation logic here if needed
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\activate' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate' );

