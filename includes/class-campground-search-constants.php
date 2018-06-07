<?php

/**
 * Class of constants
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 */

/**
 * Class of constants.
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 * @author     WinLum Inc.
 */
final class Campground_Search_Const {

    const CAPABILITY_ACTIVATE = 'activate_plugins';
    const CAPABILTY_OPTIONS = 'manage_options';
    const TEXT_DOMAIN = 'campground-search';
    const MIN_WP_VERSION = '4.6';
    const MIN_PHP_VERSION = '5.4';
    const OPTION_GROUP = 'pluginPage';
    const POST_TYPE = 'campground';
    const PREFIX = 'wl_camps';
    const PREFIX_CSS = 'wl-camps';

    const SETTINGS = Campground_Search_Const::PREFIX . '_settings';
    const SHORT_CODE = 'campground_search_form';

    public static $query_vars = array(
        'general' => array(
            array(
                'compare' => '>=',
                'key' => 'elevation',
                'type' => 'NUMERIC',
            ),
            array(
                'compare' => '<=',
                'key' => 'fees',
                'type' => 'NUMERIC',
            ),
            array(
                'compare' => '>=',
                'key' => 'max_length',
                'type' => 'NUMERIC',
            ),
            array(
                'compare' => '=',
                'key' => 'near_to',
                'type' => 'CHAR',
            ),
            array(
                'compare' => '>=',
                'key' => 'open_from',
                'type' => 'DATE',
            ),
            array(
                'compare' => '<=',
                'key' => 'open_to',
                'type' => 'DATE',
            ),
            array(
                'compare' => '>=',
                'key' => 'water_from',
                'type' => 'DATE',
            ),
            array(
                'compare' => '<=',
                'key' => 'water_to',
                'type' => 'DATE',
            ),
        ),
    );

    public static $taxonomies = array(
        'activity' => array(
            'singular' => 'Activity',
            'plural' => 'Activities',
            'terms' => array(
                'boating' => 'Boating',
                'fishing' => 'Fishing',
                'hiking' => 'Hiking',
                'swimming' => 'Swimming',
            ),
        ),
        'feature' => array(
            'singular' => 'Feature',
            'plural' => 'Features',
            'terms' => array(
                'bear_boxes' => 'Bear Boxes',
                'boat_ramps' => 'Boat Ramps',
                'camp_host' => 'Camp Host',
                'dump_station' => 'Sanitary Dump Station',
                'groups' => 'Available for Groups',
                'hookups' => 'Hookups',
                'reservable' => 'Reservable',
                'shoreline' => 'Shoreline',
                'showers' => 'Showers',
                'tents' => 'Tents',
                'wheelchair_access' => 'Wheelchair Access',
            ),
        ),
        'toilet' => array(
            'singular' => 'Toilet',
            'plural' => 'Toilets',
            'terms' => array(
                'flush' => 'Flush',
                'vault' => 'Vault',
            ),
        ),
    );
    
    const TAXONOMY = 'campground_typology';

}