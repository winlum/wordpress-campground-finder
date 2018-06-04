<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://winlum.com
 * @since             1.0.0
 * @package           Campground_Search
 *
 * @wordpress-plugin
 * Plugin Name:       Campground Search
 * Plugin URI:        https://winlum.com/wordpress-plugins/campground-search/
 * Description:       see readme.txt
 * Version:           1.0.0
 * Author:            WinLum Inc.
 * Author URI:        https://winlum.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       campground-search
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'CAMPGROUND_SEARCH_VERSION', '1.0.0' );

/**
 * The class responsible for providing constants.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-campground-search-constants.php';

/**
 * The static class responsible for providing utility methods.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-campground-search-utils.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-campground-search-activator.php
 */
function activate_campground_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-campground-search-activator.php';
	Campground_Search_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-campground-search-deactivator.php
 */
function deactivate_campground_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-campground-search-deactivator.php';
	Campground_Search_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_campground_search' );
register_deactivation_hook( __FILE__, 'deactivate_campground_search' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-campground-search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_campground_search() {

	$plugin = new Campground_Search();
	$plugin->run();

}
run_campground_search();
