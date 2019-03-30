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
                'ampitheatre' => 'Ampithreatre',
                'beach' => 'Beach Area',
                'bear_boxes' => 'Bear Boxes',
                'boat_ramps' => 'Boat Ramps',
                'cabins' => 'Cabins',
                'camp_host' => 'Camp Host',
                'drinking_water' => 'Drinking Water',
                'dump_station' => 'Sanitary Dump Station',
                'equestrian_trail' => 'Equestrian Trail',
                'groups' => 'Available for Groups',
                'hookups' => 'Hookups',
                'lake' => 'By Lake',
                'marina' => 'Marina',
                'mountains' => 'By Mountains',
                'picnic' => 'Picnic Area',
                'playground' => 'Playground',
                'reservable' => 'Reservable',
                'shoreline' => 'Shoreline',
                'showers' => 'Showers',
                'store' => 'Store',
                'tents' => 'Tents',
                'trailhead' => 'Trailhead',
                'trailhead_atv' => 'ATV Trailhead',
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
