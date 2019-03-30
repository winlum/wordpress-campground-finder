<?php

/**
 * Class of constants
 *
 * @link       https://winlum.com
 * @since      1.2.0
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
    const DATETIME_FORMAT = 'Y-m-d';
    const MIN_WP_VERSION = '4.6';
    const MIN_PHP_VERSION = '5.4';
    const OPTION_GROUP = 'pluginPage';
    const POST_TYPE = 'campground';
    const PREFIX = 'wl_camps';
    const PREFIX_CSS = 'wl-camps';
    const SHORT_CODE = 'campground_search_form';
    const TEXT_DOMAIN = 'campground-search';

    const SETTINGS = Campground_Search_Const::PREFIX . '_settings';

    // TODO: require PHP 5.6 so these can be const
    public static $query_vars = array(
        'general_district' => array(
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => 'IN',
                    'formatter' => array( 'Campground_Search_Util', 'format_query_field', 'district' ),
                    'key' => 'general_district',
                    'type' => 'CHAR',
                ),
                array(
                    'compare' => '=',
                    'key' => 'general_district',
                    'type' => 'CHAR',
                ),
            ),
        ),
        'general_fees' => array(
            array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'fees',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '<=',
                    'key' => 'fees',
                    'type' => 'NUMERIC',
                ),
            ),
        ),
        'general_max_length' => array(
            array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'max_length',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '>=',
                    'key' => 'max_length',
                    'type' => 'NUMERIC',
                ),
            ),
        ),
        'general_near_to' => array(
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => 'IN',
                    'formatter' => array( 'Campground_Search_Util', 'format_query_field', 'near_to' ),
                    'key' => 'general_near_to',
                    'type' => 'CHAR',
                ),
                array(
                    'compare' => '=',
                    'key' => 'general_near_to',
                    'type' => 'CHAR',
                ),
            ),
        ),
        'general_open_from' => array(
            'formatter' => array( 'Campground_Search_Util', 'set_min_year' ),
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'general_open_from',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '<=',
                    'key' => 'general_open_from',
                    'type' => 'DATE',
                ),
            ),
        ),
        'general_open_to' => array(
            'formatter' => array( 'Campground_Search_Util', 'set_max_year' ),
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'general_open_to',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '>=',
                    'key' => 'general_open_to',
                    'type' => 'DATE',
                ),
            ),
        ),
        'general_water_from' => array(
            'formatter' => array( 'Campground_Search_Util', 'set_min_year' ),
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'general_water_from',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '<=',
                    'key' => 'general_water_from',
                    'type' => 'DATE',
                ),
            ),
        ),
        'general_water_to' => array(
            'formatter' => array( 'Campground_Search_Util', 'set_max_year' ),
            'query' => array(
                'relation' => 'OR',
                array(
                    'compare' => '=',
                    'key' => 'general_water_to',
                    'type' => 'CHAR',
                    'value' => '',
                ),
                array(
                    'compare' => '>=',
                    'key' => 'general_water_to',
                    'type' => 'DATE',
                ),
            ),
        ),
        'geo_elevation' => array(
            'compare' => '>=',
            'key' => 'elevation',
            'type' => 'NUMERIC',
        ),
    );

    public static $taxonomies = array(
        'activity' => array(
            'plural' => 'Activities',
            'singular' => 'Activity',
            'terms' => array(
                'boating' => array(
                    'icon' => 'fa-ship',
                    'name' => 'Boating',
                ),
                'fishing' => array(
                    'icon' => 'fa-fish',
                    'name' => 'Fishing',
                ),
                'hiking' => array(
                    'icon' => 'fa-hiking',
                    'name' => 'Hiking',
                ),
                'swimming' => array(
                    'icon' => 'fa-swimmer',
                    'name' => 'Swimming',
                ),
            ),
        ),
        'feature' => array(
            'plural' => 'Features',
            'singular' => 'Feature',
            'terms' => array(
                'ampitheatre' => 'Ampithreatre',
                'beach' => array(
                    'icon' => 'fa-beach',
                    'name' => 'Beach Area',
                ),
                'bear_boxes' => 'Bear Boxes',
                'boat_ramps' => 'Boat Ramps',
                'cabins' => array(
                    'icon' => 'fa-bed',
                    'name' => 'Cabins',
                ),
                'camp_host' => array(
                    'icon' => 'fa-grin',
                    'name' => 'Camp Host',
                ),
                'drinking_water' => array(
                    'icon' => 'fa-water',
                    'name' => 'Drinking Water',
                ),
                'drinking_water' => 'Drinking Water',
                'dump_station' => array(
                    'icon' => 'fa-dumpster',
                    'name' => 'Sanitary Dump Station',
                ),
                'equestrian_trail' => array(
                    'icon' => 'fa-horse',
                    'name' => 'Equestrian Trail',
                ),
                'groups' => 'Available for Groups',
                'hookups' => 'Hookups',
                'lake' => 'By Lake',
                'marina' => 'Marina',
                'mountains' => array(
                    'icon' => 'fa-mountain',
                    'name' => 'By Mountains',
                ),
                'picnic' => 'Picnic Area',
                'playground' => 'Playground',
                'reservable' => array(
                    'icon' => 'fa-calendar',
                    'name' => 'Reservable',
                ),
                'shoreline' => 'Shoreline',
                'showers' => 'Showers',
                'store' => array(
                    'icon' => 'fa-store-alt',
                    'name' => 'Store',
                ),
                'tents' => 'Tents',
                'trailhead' => 'Trailhead',
                'trailhead_atv' => 'ATV Trailhead',
                'wheelchair_access' => array(
                    'icon' => 'fa-wheelchair',
                    'name' => 'Wheelchair Access',
                ),
            ),
        ),
        'toilet' => array(
            'plural' => 'Toilets',
            'singular' => 'Toilet',
            'terms' => array(
                'flush' => array(
                    'icon' => 'fa-toilet',
                    'name' => 'Flush',
                ),
                'vault' => 'Vault',
            ),
        ),
    );

    const TAXONOMY = 'campground_typology';

}
