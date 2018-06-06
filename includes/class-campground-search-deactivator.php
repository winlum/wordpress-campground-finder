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
        if ( ! current_user_can( Campground_Search_Const::CAPABILITY_ACTIVATE ) ) {
            return;
        }

        // TODO: properly handle multisite
        if ( is_multisite() ) {
            // return;
        }

        // not really necessary to unregister, but just in case
        // TODO: notify the CPT, taxonomies, etc are unavailable, not deleted
        if ( post_type_exists( Campground_Search_Const::POST_TYPE ) ) {
            unregister_post_type( Campground_Search_Const::POST_TYPE );
		}

        foreach ( Campground_Search_Const::$taxonomies as $key => $val ) {
            if ( taxonomy_exists( $key )) {
                unregister_taxonomy( $key );
            }
        }
		
		if ( shortcode_exists( Campground_Search_Const::SHORT_CODE )) {
            remove_shortcode( Campground_Search_Const::SHORT_CODE );
		}

        flush_rewrite_rules();
	}

}
