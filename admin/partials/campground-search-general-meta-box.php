<?php

/**
 * Provide a admin area view for the plugin meta box.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/admin/partials
 */

$field_key = CAMPGROUND_SEARCH__PREFIX . '_fields';
$post_fields = get_post_custom( $post->ID );

$name_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_name';
$name = isset( $post_fields[$name_key][0] )
    ? $post_fields[$name_key][0]
    : '';

$geo_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_geo';
$geo = isset( $post_fields[$geo_key][0] )
    ? $post_fields[$geo_key][0]
    : '';

$elevation_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_elevation';
$elevation = isset( $post_fields[$elevation_key][0] )
    ? $post_fields[$elevation_key][0]
    : '';

$start_date_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_start_date';
$start_date = isset( $post_fields[$start_date_key][0] )
    ? $post_fields[$start_date_key][0]
    : '';

$end_date_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_end_date';
$end_date = isset( $post_fields[$end_date_key][0] )
    ? $post_fields[$end_date_key][0]
    : '';

$water_start_date_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_water_start_date';
$water_start_date = isset( $post_fields[$water_start_date_key][0] )
    ? $post_fields[$water_start_date_key][0]
    : '';

$water_end_date_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_water_end_date';
$water_end_date = isset( $post_fields[$water_end_date_key][0] )
    ? $post_fields[$water_end_date_key][0]
    : '';

$num_sites_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_num_sites';
$num_sites = isset( $post_fields[$num_sites_key][0] )
    ? $post_fields[$num_sites_key][0]
    : '';

$max_length_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_max_length';
$max_length = isset( $post_fields[$max_length_key][0] )
    ? $post_fields[$max_length_key][0]
    : '';
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="inside general">
    <div class="field">
        <label for="<?php echo $field_key; ?>[name]">Name</label>
        <input
            name="<?php echo $field_key; ?>[name]"
            placeholder=""
            value="<?php echo esc_attr( $name ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[geo]">Geolocation</label>
        <input
            name="<?php echo $field_key; ?>[geo]"
            placeholder="-121.49642944335938, 38.579842318490066"
            value="<?php echo esc_attr( $geo ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[elevation]">Base Elevation</label>
        <input
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
    </div>

    <div class="fieldset camp-date-range">
        <h3>Camp Open</h3>

        <div class="field">
            <label for="<?php echo $field_key; ?>[start_date]">Start Date</label>
            <input
                name="<?php echo $field_key; ?>[start_date]"
                value="<?php echo esc_attr( $start_date ); ?>"
                placeholder="MM/DD/YYYY"
                type="date"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>[end_date]">End Date</label>
            <input
                name="<?php echo $field_key; ?>[end_date]"
                value="<?php echo esc_attr( $end_date ); ?>"
                placeholder="MM/DD/YYYY"
                type="date"
            >
        </div>
    </div>

    <div class="fieldset water-date-range">
        <h3>Water Available</h3>

        <div class="field">
            <label for="<?php echo $field_key; ?>[water_start_date]">Start Date</label>
            <input
                name="<?php echo $field_key; ?>[water_start_date]"
                placeholder="MM/DD/YYYY"
                type="date"
                value="<?php echo esc_attr( $water_start_date ); ?>"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>[water_end_date]">End Date</label>
            <input
                name="<?php echo $field_key; ?>[water_end_date]"
                placeholder="MM/DD/YYYY"
                type="date"
                value="<?php echo esc_attr( $water_end_date ); ?>"
            >
        </div>
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[num_sites]">Number of Sites</label>
        <input
            name="<?php echo $field_key; ?>[num_sites]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $num_sites ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[max_length]">Average Max Length</label>
        <input
            name="<?php echo $field_key; ?>[max_length]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $max_length ); ?>"
        >
    </div>
</div>
