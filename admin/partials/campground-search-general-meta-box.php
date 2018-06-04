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

$field_key = Campground_Search_Const::PREFIX . '[general]';

$near_to = isset( $model->near_to ) ? $model->near_to : '';
$elevation = isset( $model->elevation ) ? $model->elevation : '';

$start_month = isset( $model->date_range->start->month ) ? $model->date_range->start->month : '';
$start_day = isset( $model->date_range->start->day ) ? $model->date_range->start->day : '';
$end_month = isset( $model->date_range->end->month ) ? $model->date_range->end->month : '';
$end_day = isset( $model->date_range->end->day ) ? $model->date_range->end->day : '';

// $model->water is an array, so box to an object
$model->water = (object) $model->water;

// (de)serialized as "on", so use loose type checking
$water_available = isset( $model->water->available )
    ? ( $model->water->available == true )
    : false;
$water_start_month = isset( $model->water->date_range->start->month )
    ? $model->water->date_range->start->month
    : '';
$water_start_day = isset( $model->water->date_range->start->day )
    ? $model->water->date_range->start->day
    : '';
$water_end_month = isset( $model->water->date_range->end->month )
    ? $model->water->date_range->end->month
    : '';
$water_end_day = isset( $model->water->date_range->end->day )
    ? $model->water->date_range->end->day
    : '';

$max_length = isset( $model->max_length ) ? $model->max_length : '';
$fees = isset( $model->fees ) ? $model->fees : '';
$num_sites = isset( $model->num_sites ) ? $model->num_sites : '';

$options = get_option( Campground_Search_Const::SETTINGS );
$near_to_choices = array_map(
    'trim',
    explode( "\n", $options[Campground_Search_Const::PREFIX . '_near_to'] )
);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="general <?php echo Campground_Search_Const::PREFIX_CSS; ?>-meta-box">
    <div class="field">
        <label for="<?php echo $field_key; ?>[near_to]">
            <?php _e( 'Nearest To', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
        <select name="<?php echo $field_key; ?>[near_to]">
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
        <label for="<?php echo $field_key; ?>[elevation]">
			<?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[elevation]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $elevation ); ?>"
        >
    </div>

    <fieldset class="date-range">
        <legend><?php _e( 'Camp Open', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div>
            <div class="field">
                <label for="<?php echo $field_key; ?>[date_range][start][month]">
                    <?php _e( 'Start Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[date_range][start][month]"
                    value="<?php echo esc_attr( $start_month ); ?>"
                    min="1"
                    max="12"
                    placeholder="1-12"
                    step="1"
                    type="number"
                >
            </div>

            <div class="field">
                <label for="<?php echo $field_key; ?>[date_range][start][day]">
                    <?php _e( 'Start Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[date_range][start][day]"
                    value="<?php echo esc_attr( $start_day ); ?>"
                    min="1"
                    max="31"
                    placeholder="1-31"
                    step="1"
                    type="number"
                >
            </div>
        </div>

        <div>
            <div class="field">
                <label for="<?php echo $field_key; ?>[date_range][end][month]">
                    <?php _e( 'End Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[date_range][end][month]"
                    value="<?php echo esc_attr( $end_month ); ?>"
                    min="1"
                    max="12"
                    placeholder="1-12"
                    step="1"
                    type="number"
                >
            </div>

            <div class="field">
                <label for="<?php echo $field_key; ?>[date_range][end][day]">
                    <?php _e( 'End Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[date_range][end][day]"
                    value="<?php echo esc_attr( $end_day ); ?>"
                    min="1"
                    max="31"
                    placeholder="1-31"
                    step="1"
                    type="number"
                >
            </div>
        </div>
    </fieldset>

    <fieldset class="date-range">
        <legend><?php _e( 'Water Available', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <label for="<?php echo $field_key; ?>[water][available]">
                <?php _e( 'Available?', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                <?php if ( $water_available ) echo 'checked'; ?>
                name="<?php echo $field_key; ?>[water][available]"
                type="checkbox"
            >
        </div>

        <div>
            <div class="field">
                <label for="<?php echo $field_key; ?>[water][date_range][start][month]">
                    <?php _e( 'Start Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[water][date_range][start][month]"
                    value="<?php echo esc_attr( $water_start_month ); ?>"
                    min="1"
                    max="12"
                    placeholder="1-12"
                    step="1"
                    type="number"
                >
            </div>

            <div class="field">
                <label for="<?php echo $field_key; ?>[water][date_range][start][day]">
                    <?php _e( 'Start Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[water][date_range][start][day]"
                    value="<?php echo esc_attr( $water_start_day ); ?>"
                    min="1"
                    max="31"
                    placeholder="1-31"
                    step="1"
                    type="number"
                >
            </div>
        </div>

        <div>
            <div class="field">
                <label for="<?php echo $field_key; ?>[water][date_range][end][month]">
                    <?php _e( 'End Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[water][date_range][end][month]"
                    value="<?php echo esc_attr( $water_end_month ); ?>"
                    min="1"
                    max="12"
                    placeholder="1-12"
                    step="1"
                    type="number"
                >
            </div>

            <div class="field">
                <label for="<?php echo $field_key; ?>[water][date_range][end][day]">
                    <?php _e( 'End Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
                <input
                    name="<?php echo $field_key; ?>[water][date_range][end][day]"
                    value="<?php echo esc_attr( $water_end_day ); ?>"
                    min="1"
                    max="31"
                    placeholder="1-31"
                    step="1"
                    type="number"
                >
            </div>
        </div>
    </fieldset>

    <div class="field">
        <label for="<?php echo $field_key; ?>[max_length]">
			<?php _e( 'Average Max Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[max_length]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $max_length ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[fees]">
			<?php _e( 'Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[fees]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $fees ); ?>"
        >
    </div>

    <div class="field">
        <label for="<?php echo $field_key; ?>[num_sites]">
			<?php _e( 'Number of Sites', Campground_Search_Const::TEXT_DOMAIN ); ?>
		</label>
        <input
            name="<?php echo $field_key; ?>[num_sites]"
            placeholder=""
            type="number"
            value="<?php echo esc_attr( $num_sites ); ?>"
        >
    </div>
</div>
