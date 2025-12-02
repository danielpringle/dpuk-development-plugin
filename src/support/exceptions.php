<?php
/**
 * Exception handling
 *
 * @package     DPUKDevloper
 * @since       1.0.0
 * @author      Dan Pringle
 * @link        http://www.danielpringle.co.uk
 * @license     GNU General Public License 2.0+
 */
namespace DPUKDevloper;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Load Whoops error handler.
 * 
 * Registers Whoops to replace PHP's default error display with pretty,
 * interactive error pages that include stack traces and variable inspection.
 * 
 * Loads immediately (not on init hook) to catch errors that occur before
 * WordPress hooks fire. This ensures we get pretty error pages even for
 * early errors during plugin/theme loading.
 * 
 * The error handler is configured to use VS Code as the editor for
 * opening files directly from the error page (default, can be changed via DPUK_DEV_EDITOR constant).
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_whoops() {
	// Check if Whoops classes are available
	if ( ! class_exists( '\Whoops\Run' ) || ! class_exists( '\Whoops\Handler\PrettyPageHandler' ) ) {
		return;
	}
	
	$whoops     = new Run();
	$error_page = new PrettyPageHandler();
	
	// Make editor configurable via constant
	$editor = defined( '\DPUK_DEV_EDITOR' ) ? constant( '\DPUK_DEV_EDITOR' ) : 'vscode';
	$error_page->setEditor( $editor );
	
	$whoops->pushHandler( $error_page );
	$whoops->register();
}

// Load immediately for early error handling
load_whoops();
