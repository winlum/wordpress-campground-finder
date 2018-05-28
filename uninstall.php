<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// check if this is the plugin being uninstalled
if ( WP_UNINSTALL_PLUGIN !== 'campground-search' ) {
    return;
}

if ( ! current_user_can( 'activate_plugins' ) ) {
    return;
}

// TODO: properly handle multisite
if ( is_multisite() ) {
    return;
}

/**
 * Unregisters the taxonomy and post type, and removes the short code with WP
 *
 * @author WinLum Inc.
 * @since 1.0.0
 */
function uninstall() {
	if ( is_multisite() ) {
		exit;
	}

	try {
		unregister_taxonomy( CAMPGROUND_SEARCH__TAXONOMY );
		unregister_post_type( CAMPGROUND_SEARCH__POST_TYPE );
		remove_shortcode( CAMPGROUND_SEARCH__FORM_SHORT_CODE );
	} catch (WP_Error $error) {

	}
}

uninstall();
