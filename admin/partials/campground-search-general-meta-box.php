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

$options = get_option( Campground_Search_Const::SETTINGS );
$near_to_choices = array_map(
    'trim',
    explode( "\n", $options[Campground_Search_Const::PREFIX . '_near_to'] )
);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="general <?php echo Campground_Search_Util::prefix_css_string('meta-box'); ?>">
    <div class="field">
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
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'near_to' ); ?>">
            <?php _e( 'Near To', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>"
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'elevation' ); ?>">
			<?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>

    <fieldset class="date-range">
        <legend><?php _e( 'Open', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div>
            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'start_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo $field_key; ?>[start_month]"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $start_month ); ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'start_month' ); ?>">
                    <?php _e( 'Start Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>

            <div class="field">
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'start_day' ); ?>">
                    <?php _e( 'Start Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'start_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo $field_key; ?>[start_day]"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $start_day ); ?>"
                >
            </div>
        </div>

        <div>
            <div class="field">
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'end_month' ); ?>">
                    <?php _e( 'End Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'end_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo $field_key; ?>[end_month]"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $end_month ); ?>"
                >
            </div>

            <div class="field">
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'end_day' ); ?>">
                    <?php _e( 'End Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'end_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo $field_key; ?>[end_day]"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $end_day ); ?>"
                >
            </div>
        </div>
    </fieldset>

    <fieldset class="date-range">
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

        <div>
            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'water_start_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo $field_key; ?>[water_start_month]"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $water_start_month ); ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_start_month' ); ?>">
                    <?php _e( 'Start Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>

            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'water_start_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo $field_key; ?>[water_start_day]"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $water_start_day ); ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_start_day' ); ?>">
                    <?php _e( 'Start Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>
        </div>

        <div>
            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'water_end_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo $field_key; ?>[water_end_month]"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $water_end_month ); ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_end_month' ); ?>">
                    <?php _e( 'End Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>

            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_css_string( 'water_end_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo $field_key; ?>[water_end_day]"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo esc_attr( $water_end_day ); ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_css_string( 'water_end_day' ); ?>">
                    <?php _e( 'End Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>
        </div>
    </fieldset>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'max_length' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[max_length]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $max_length ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'max_length' ); ?>">
			<?php _e( 'Average Max Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'fees' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[fees]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $fees ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'fees' ); ?>">
			<?php _e( 'Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_css_string( 'num_sites' ); ?>"
            min="0"
            name="<?php echo $field_key; ?>[num_sites]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $num_sites ); ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_css_string( 'num_sites' ); ?>">
			<?php _e( 'Number of Sites', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
    </div>
</div>
