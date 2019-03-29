<?php

/**
 * Provide a admin area view for the plugin meta box.
 *
 * @link       https://winlum.com
 * @since      1.1.2
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/admin/partials
 */

$options = get_option( Campground_Search_Const::SETTINGS );
$district_choices = array_map(
    'trim',
    explode( "\n", $options[Campground_Search_Const::PREFIX . '_district'] )
);
$near_to_choices = array_map(
    'trim',
    explode( "\n", $options[Campground_Search_Const::PREFIX . '_near_to'] )
);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="general <?php echo Campground_Search_Util::prefix_css_string('meta-box'); ?>">
    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'district' ); ?>">
            <?php _e( 'District', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
        <select
            id="<?php echo Campground_Search_Util::prefix_css_string( 'district' ); ?>"
            name="<?php echo $field_key; ?>[district]"
        >
            <option
                <?php if ( ! in_array( $district, $district_choices ) ) echo 'selected'; ?>
                value=""
            >
                <?php _e( 'None', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php foreach ( $district_choices as $choice ) : ?>
            <option
                <?php if ( $district === $choice ) echo 'selected'; ?>
                value="<?php esc_attr_e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>"
            >
                <?php _e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'near_to' ); ?>">
            <?php _e( 'Near To', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
        <select
            id="<?php echo Campground_Search_Util::prefix_css_string( 'near_to' ); ?>"
            name="<?php echo $field_key; ?>[near_to]"
        >
            <option
                <?php if ( ! in_array( $near_to, $near_to_choices ) ) echo 'selected'; ?>
                value=""
            >
                <?php _e( 'None', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php foreach ( $near_to_choices as $choice ) : ?>
            <option
                <?php if ( $near_to === $choice ) echo 'selected'; ?>
                value="<?php esc_attr_e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>"
            >
                <?php _e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>">
			<?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>"
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
    </div>

    <fieldset class="inline">
        <legend><?php _e( 'Open', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <label for="<?php echo Campground_Search_Util::prefix_css_string( 'open_from' ); ?>">
                <?php _e( 'From', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                id="<?php echo Campground_Search_Util::prefix_css_string( 'open_from' ); ?>"
                name="<?php echo $field_key; ?>[open_from]"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo esc_attr( $open_from ); ?>"
            >
        </div>

        <div class="field">
            <label for="<?php echo Campground_Search_Util::prefix_css_string( 'open_to' ); ?>">
                <?php _e( 'To', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                id="<?php echo Campground_Search_Util::prefix_css_string( 'open_to' ); ?>"
                name="<?php echo $field_key; ?>[open_to]"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo esc_attr( $open_to ); ?>"
            >
        </div>
    </fieldset>

    <fieldset class="inline">
        <legend><?php _e( 'Water', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <input
                <?php if ( $water_available ) echo 'checked'; ?>
                id="<?php echo Campground_Search_Util::prefix_css_string( 'water_available' ); ?>"
                name="<?php echo $field_key; ?>[water_available]"
                type="checkbox"
            >
            <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_available' ); ?>">
                <?php _e( 'Available?', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
        </div>

        <div class="field">
            <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_from' ); ?>">
                <?php _e( 'From', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                id="<?php echo Campground_Search_Util::prefix_css_string( 'water_from' ); ?>"
                name="<?php echo $field_key; ?>[water_from]"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo esc_attr( $water_from ); ?>"
            >
        </div>

        <div class="field">
            <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_to' ); ?>">
                <?php _e( 'To', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                id="<?php echo Campground_Search_Util::prefix_css_string( 'water_to' ); ?>"
                name="<?php echo $field_key; ?>[water_to]"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo esc_attr( $water_to ); ?>"
            >
        </div>
    </fieldset>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'max_length' ); ?>">
			<?php _e( 'Average Max Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'max_length' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[max_length]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $max_length ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'fees' ); ?>">
			<?php _e( 'Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'fees' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[fees]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $fees ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'num_sites' ); ?>">
			<?php _e( 'Number of Sites', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'num_sites' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[num_sites]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $num_sites ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'num_group_sites' ); ?>">
			<?php _e( 'Number of Group Sites', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'num_group_sites' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[num_group_sites]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $num_group_sites ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'reservation_url' ); ?>">
			<?php _e( 'Reservation URL', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'reservation_url' ); ?>"
            name="<?php echo $field_key; ?>[reservation_url]"
            placeholder="https://reservation.url"
            type="url"
            value="<?php echo esc_attr( $reservation_url ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'url' ); ?>">
			<?php _e( 'URL', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'url' ); ?>"
            name="<?php echo $field_key; ?>[url]"
            placeholder="https://campground.url"
            type="url"
            value="<?php echo esc_attr( $url ); ?>"
        >
    </div>
</div>
