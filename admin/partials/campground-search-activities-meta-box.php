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

$field_key = Campground_Search_Const::PREFIX . '[activities]';

// (de)serialized as "on", so use loose type checking
$fishing = isset( $model->fishing ) ? ( $model->fishing == true ) : false;
$hiking = isset( $model->hiking ) ? ( $model->hiking == true ) : false;
$swimming = isset( $model->swimming ) ? ( $model->swimming == true ) : false;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="activities <?php echo Campground_Search_Const::PREFIX_CSS; ?>-meta-box">
    <div class="field">
        <label for="<?php echo $field_key; ?>[fishing]">
			<?php _e( 'Fishing', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $fishing ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[fishing]"
            type="checkbox"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[hiking]">
			<?php _e( 'Hiking', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $hiking ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[hiking]"
            type="checkbox"
        >
    </div>
    
    <div class="field">
        <label for="<?php echo $field_key; ?>[swimming]">
			<?php _e( 'Swimming', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            <?php if ( $swimming ) echo 'checked'; ?>
            name="<?php echo $field_key; ?>[swimming]"
            type="checkbox"
        >
    </div>
</div>
