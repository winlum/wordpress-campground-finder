<?php

/**
 * Class of constants
 *
 * @link       https://winlum.com
 * @since      1.1.0
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
final class Campground_Search_Transform {

	public function __construct() {

        if ( ! function_exists( 'post_exists' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/post.php' );
        }

    }

    public function import_from_disk() {
        // return if post type isn't found
        if ( ! post_type_exists( Campground_Search_Const::POST_TYPE ) ) return;

        $original_file_path = CAMPGROUND_SEARCH__PLUGIN_BASE_PATH . 'transform/original.json';

        if ( ! file_exists( $original_file_path ) ) return;

        $original_file_contents = file_get_contents( $original_file_path );

        try {
            $original_json = json_decode( $original_file_contents );
        } catch( Exception $ex ) {
            die ( 'Error parsing json: ' . $ex->getMessage() );
        }

        $post_date = date( Campground_Search_Const::DATETIME_FORMAT, strtotime( '2018-01-01' ) );
        $post_content = '';
        foreach ( $original_json->campground_finder_updated as $campground ) {
            $post_title = trim( $campground->camp_name );

            // continue if the post already exists
            if ( post_exists( $post_title, $post_content, $post_date ) > 0 ) continue;

            $taxonomies = get_object_taxonomies( Campground_Search_Const::POST_TYPE, 'names' );
            $tax_input = array();
            foreach ( $taxonomies as $taxonomy ) {
                $tax_input[$taxonomy] = array();
            }

            if ( ($campground->bear_boxes) ) {
                $tax_input['feature'][] = 'bear_boxes';
            }
            if ( ($campground->ramps) ) {
                $tax_input['feature'][] = 'boat_ramps';
            }
            if ( ($campground->camphost) ) {
                $tax_input['feature'][] = 'camp_host';
            }
            if ( ($campground->dump) ) {
                $tax_input['feature'][] = 'dump_station';
            }
            if ( ($campground->groups) ) {
                $tax_input['feature'][] = 'groups';
            }
            if ( ($campground->hookups) ) {
                $tax_input['feature'][] = 'hookups';
            }
            if ( ($campground->reservations) ) {
                $tax_input['feature'][] = 'reservable';
            }
            if ( ($campground->shoreline) ) {
                $tax_input['feature'][] = 'shoreline';
            }
            if ( ($campground->showers) ) {
                $tax_input['feature'][] = 'showers';
            }
            if ( ($campground->tents) ) {
                $tax_input['feature'][] = 'tents';
            }
            if ( ($campground->wheelchair) ) {
                $tax_input['feature'][] = 'wheelchair_access';
            }

            if ( ($campground->hiking) ) {
                $tax_input['activity'][] = 'hiking';
            }
            if ( ($campground->swimming) ) {
                $tax_input['activity'][] = 'swimming';
            }

            $toilets = trim( $campground->toilets );
            $toilets = array_map( 'strtolower', explode( '/', $toilets ) );
            $tax_input['toilet'] = array_merge( $tax_input['toilet'], $toilets );

            $meta = array();
            $meta['general_near_to'] = trim( $campground->location );
            $meta['general_elevation'] = trim( $campground->elevation );
            $open_date = self::parse_date_string( $campground->camp_open );
            $meta['general_open_from'] = is_array( $open_date ) ? $open_date[0] : '';
            $meta['general_open_to'] = is_array( $open_date ) ? $open_date[1] : '';

            $camp_water = trim( $campground->water );
            $water_date = self::parse_date_string( $camp_water );
            $meta['general_water_available'] =
                ( strtolower( $camp_water ) === 'yes' || is_array( $water_date ) )
                    ? 'on'
                    : '';
            $meta['general_water_from'] = is_array( $water_date ) ? $water_date[0] : '';
            $meta['general_water_to'] = is_array( $water_date ) ? $water_date[1] : '';

            $meta['general_max_length'] = trim( $campground->length );
            $meta['general_fees'] = trim( $campground->fees );
            $meta['general_num_sites'] = trim( $campground->num_sites );
            $meta['general_num_group_sites'] = trim( $campground->num_group_sites );

            $meta['geo_address'] = '';
            $meta['geo_longitude'] = '';
            $meta['geo_latitude'] = '';
            $meta['geo_elevation'] = '';

            $meta_input = array();
            foreach ( $meta as $key => $val ) {
                $meta_input['_' . Campground_Search_Util::prefix_string( $key )] = empty( $val ) ? '' : $val;
            }

            $post_args = array(
                'post_date' => $post_date,
                'post_content' => $post_content,
                'post_title' => $post_title,
                'post_status' => 'publish',
                'post_type' => Campground_Search_Const::POST_TYPE,
                'coment_status' => 'closed',
                'tax_input' => $tax_input,
                'meta_input' => $meta_input,
            );

            $post_id = wp_insert_post( $post_args, true );
            if ( is_wp_error( $post_id ) ) {
                echo '<pre>';
                var_dump( $post_id->get_error_messages() );
                echo '</pre>';
            }
        }

    }

    private function parse_date_string( $string ) {
        $date_string = trim( $string );

        $date_start_end = explode( '-', $date_string );
        // return an empty string if empty or not two parts (pseudo-normalize)
        if ( count( $date_start_end ) !== 2 || ! $date_start_end  ) return '';

        // parse the date(s) to normalize the data
        $date_start = date_parse( $date_start_end[0] );
        $date_end = date_parse( $date_start_end[1] );

        // use the DateTime object to complete the conversion process
        $start_date = DateTime::createFromFormat(
            Campground_Search_Const::DATETIME_FORMAT, '1901-' . $date_start['month'] . '-' . $date_start['day']
        );
        if ( $start_date === false ) {
            $start_date = DateTime::createFromFormat('Y-m', '1901-' . $date_start['month'] );
            $start_date->modify( 'first day of this month' );
        }
        $end_date = DateTime::createFromFormat(
            Campground_Search_Const::DATETIME_FORMAT, '9999-' . $date_end['month'] . '-' . $date_end['day']
        );
        if ( $end_date === false ) {
            $end_date = DateTime::createFromFormat('Y-m', '9999-' . $date_end['month'] );
            $end_date->modify( 'last day of this month' );
        }

        return array(
            $start_date->format( Campground_Search_Const::DATETIME_FORMAT ),
            $end_date->format( Campground_Search_Const::DATETIME_FORMAT ),
        );
    }

}
