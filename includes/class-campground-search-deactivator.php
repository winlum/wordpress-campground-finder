<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 * @author     WinLum Inc.
 */
class Campground_Search_Deactivator {

	/**
	 * Unregisters the post type, taxonomy, etc. used in the plugin.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        if ( ! current_user_can( CAMPGROUND_SEARCH__CAPABILITY_ACTIVATE ) ) {
            return;
        }

        // TODO: properly handle multisite
        if ( is_multisite() ) {
            // return;
        }

        // not really necessary to unregister, but just in case
        // TODO: notify the CPT, taxonomies, etc are unavailable, not deleted
        if ( post_type_exists( CAMPGROUND_SEARCH__POST_TYPE ) ) {
            unregister_post_type( CAMPGROUND_SEARCH__POST_TYPE );
		}

        if ( taxonomy_exists( CAMPGROUND_SEARCH__TAXONOMY )) {
            unregister_taxonomy( CAMPGROUND_SEARCH__TAXONOMY );
        }
		
		if ( shortcode_exists( CAMPGROUND_SEARCH__FORM_SHORT_CODE )) {
            remove_shortcode( CAMPGROUND_SEARCH__FORM_SHORT_CODE );
		}

        flush_rewrite_rules();
	}

}
