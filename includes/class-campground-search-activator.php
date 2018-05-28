<?php

/**
 * Fired during plugin activation
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 * @author     WinLum Inc.
 */
class Campground_Search_Activator {
	/**
	 * Registers the post type and taxonomy necessary to facilitate the plugin.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        if ( ! current_user_can( CAMPGROUND_SEARCH__CAPABILITY_ACTIVATE ) ) {
            return;
        }

        // TODO: should notify of the requirement and exit, not just die
        if ( version_compare( $GLOBALS['wp_version'], CAMPGROUND_SEARCH__MIN_WP_VERSION, '<' ) ) {
            $message = sprintf(
                esc_html__(
                    'This plugin requires at least version %s of WordPress.',
                    CAMPGROUND_SEARCH__I18N_NAME_SPACE
                ),
                CAMPGROUND_SEARCH__MIN_WP_VERSION
            );

            die( $message );
        }

        // TODO: properly handle multisite, not just die
        if ( is_multisite() ) {
            die( 'Multisite support is not provided at this time.' );
        }

        flush_rewrite_rules();
	}

}
