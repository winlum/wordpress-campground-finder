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

$field_key = Campground_Search_Const::PREFIX . '[features]';

$bear_boxes = isset( $model->bear_boxes ) ? ( $model->bear_boxes == true ) : false;
$boat_ramps = isset( $model->boat_ramps ) ? ( $model->boat_ramps == true ) : false;
$camp_host = isset( $model->camp_host ) ? ( $model->camp_host == true ) : false;
$dump_station = isset( $model->dump_station ) ? ( $model->dump_station == true ) : false;
$groups = isset( $model->groups ) ? ( $model->groups == true ) : false;
$hookups = isset( $model->hookups ) ? ( $model->hookups == true ) : false;
$reservable = isset( $model->reservable ) ? ( $model->reservable == true ) : false;
$restrooms = isset( $model->restrooms ) && is_array( $model->restrooms )
    ? $model->restrooms
    : array( $model->restrooms );
$shoreline = isset( $model->shoreline ) ? ( $model->shoreline == true ) : false;
$showers = isset( $model->showers ) ? ( $model->showers == true ) : false;
$tents = isset( $model->tents ) ? ( $model->tents == true ) : false;
$wheelchair_access = isset( $model->wheelchair_access ) ? ( $model->wheelchair_access == true ) : false;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="features <?php echo Campground_Search_Const::PREFIX_CSS; ?>-meta-box">
    <div class="field">
        <label for="<?php echo $field_key; ?>[bear_boxes]">
			<?php _e( 'Bear Boxes', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $bear_boxes ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[bear_boxes]"
            type="checkbox"
        >
    </div>
    
    <div class="field">
        <label for="<?php echo $field_key; ?>[boat_ramps]">
			<?php _e( 'Boat Ramps', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $boat_ramps ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[boat_ramps]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[camp_host]">
			<?php _e( 'Camp Host', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $camp_host ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[camp_host]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[dump_station]">
			<?php _e( 'Sanitary Dump Station', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $dump_station ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[dump_station]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[groups]">
			<?php _e( 'Groups', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $groups ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[groups]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[hookups]">
			<?php _e( 'Hookups', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $hookups ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[hookups]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[reservable]">
			<?php _e( 'Reservable', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $reservable ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[reservable]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[restrooms][]">
			<?php _e( 'Restrooms', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <select
            multiple
            name="<?php echo $field_key; ?>[restrooms][]"
            size="2"
        >
            <option
                <?php if ( in_array( 'flush', $restrooms ) ) echo 'selected'; ?>
                value="flush"
            >Flush</option>
            <option
                <?php if ( in_array( 'vault', $restrooms ) ) echo 'selected'; ?>
                value="vault"
            >Vault</option>
        </select>
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[shoreline]">
			<?php _e( 'Shoreline', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $shoreline ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[shoreline]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[showers]">
			<?php _e( 'Showers', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $showers ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[showers]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[tents]">
			<?php _e( 'Tents', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $tents ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[tents]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[wheelchair_access]">
			<?php _e( 'Wheelchair Access', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $wheelchair_access ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[wheelchair_access]"
            type="checkbox"
        >
    </div>
</div>
