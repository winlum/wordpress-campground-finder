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

$field_key = Campground_Search_Const::PREFIX . '[geo]';

$longitude = isset( $model->longitude ) ? $model->longitude : '';
$latitude = isset( $model->latitude ) ? $model->latitude : '';
$elevation = isset( $model->elevation ) ? $model->elevation : '';
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="geo <?php echo Campground_Search_Const::PREFIX_CSS; ?>-meta-box">
    <div class="field">
        <label for="<?php echo $field_key; ?>[longitude]">
			<?php _e( 'Longitude', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[longitude]"
            placeholder="0.00000000000001"
            step="0.00000000000001"
            type="number"
            value="<?php echo esc_attr( $longitude ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[latitude]">
<?php _e( 'Latitude', Campground_Search_Const::TEXT_DOMAIN ); ?>
</label>
        <input
            name="<?php echo $field_key; ?>[latitude]"
            placeholder="0.00000000000001"
            step="0.00000000000001"
            type="number"
            value="<?php echo esc_attr( $latitude ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[elevation]">
			<?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            step="0.001"
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
    </div>
</div>
