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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="geo <?php echo Campground_Search_Util::prefix_css_string('meta-box'); ?>">
    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'longitude' ); ?>"
            name="<?php echo $field_key; ?>[longitude]"
            placeholder="0.00000000000001"
            step="0.00000000000001"
            type="number"
            value="<?php echo esc_attr( $longitude ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'longitude' ); ?>">
			<?php _e( 'Longitude', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'latitude' ); ?>"
            name="<?php echo $field_key; ?>[latitude]"
            placeholder="0.00000000000001"
            step="0.00000000000001"
            type="number"
            value="<?php echo esc_attr( $latitude ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'latitude' ); ?>">
            <?php _e( 'Latitude', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>"
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            step="0.001"
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>">
			<?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>
</div>
