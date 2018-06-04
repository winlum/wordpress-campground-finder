<?php

/**
 * Provide a public-facing view for the plugin's search form.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/public/partials
 */

$field_key = Campground_Search_Const::PREFIX;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<form id="campground-search-form" action="<?php echo esc_url( home_url() ); ?>" method="GET" role="search">
    <input
        name="post_type"
        type="hidden"
        value="<?php echo Campground_Search_Const::POST_TYPE; ?>"
    >

    <div class="field">
        <label for="s">
            <?php _e( 'Search', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
        <input
            maxlength="255"
            name="s"
            placeholder="Search..."
            value="<?php get_search_query(); ?>"
        >
    </div>

    <fieldset class="general">
        <legend><?php _e( 'General', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <label for="<?php echo $field_key; ?>_near_to">
                <?php _e( 'Nearest To', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <select name="<?php echo $field_key; ?>_near_to">
                <option selected value="">
                    <?php _e( 'All', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </option>
                <?php foreach ( $near_to_choices as $choice ) : ?>
                <option value="<?php esc_attr_e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>" >
                    <?php _e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>
                </option>
                <?php endforeach; ?>
            </select>
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

        <div class="field">
            <label for="<?php echo $field_key; ?>_elevation">
                <?php _e( 'Minimum Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_elevation"
                min="0"
                step="1"
                placeholder="0"
                type="number"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_max_length">
                <?php _e( 'Average Maximum Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_max_length"
                min="0"
                step="1"
                placeholder="0"
                type="number"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_fees">
                <?php _e( 'Maximum Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_fees"
                min="0"
                step="1"
                placeholder="0"
                type="number"
            >
        </div>
    </fieldset>

    <fieldset class="features">
        <legend><?php _e( 'Features', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <label for="<?php echo $field_key; ?>_restrooms">
                <?php _e( 'Restrooms', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <select
                multiple
                name="<?php echo $field_key; ?>_restrooms"
                size="2"
            >
                <option value="flush">Flush</option>
                <option value="vault">Vault</option>
            </select>
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_bear_boxes">
                <?php _e( 'Bear Boxes', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_bear_boxes"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_boat_ramps">
                <?php _e( 'Boat Ramps', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_boat_ramps"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_camp_host">
                <?php _e( 'Camp Host', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_camp_host"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_dump_station">
                <?php _e( 'Sanitary Dump Station', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_dump_station"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_groups">
                <?php _e( 'Available for Groups', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_groups"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_hookups">
                <?php _e( 'Hookups', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_hookups"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_reservable">
                <?php _e( 'Reservable', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_reservable"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_shoreline">
                <?php _e( 'Shoreline', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_shoreline"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_showers">
                <?php _e( 'Showers', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_showers"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_wheelchair_access">
                <?php _e( 'Wheelchair Access', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_wheelchair_access"
                type="checkbox"
            >
        </div>
    </fieldset>

    <fieldset class="activities">
        <legend><?php _e( 'Activities', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <label for="<?php echo $field_key; ?>_fishing">
                <?php _e( 'Fishing', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_fishing"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_hiking">
                <?php _e( 'Hiking', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_hiking"
                type="checkbox"
            >
        </div>

        <div class="field">
            <label for="<?php echo $field_key; ?>_swimming">
                <?php _e( 'Swimming', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
            <input
                name="<?php echo $field_key; ?>_swimming"
                type="checkbox"
            >
        </div>
    </fieldset>

    <button type="submit">
        <?php _e( 'Search', Campground_Search_Const::TEXT_DOMAIN ); ?>
        <i class="dashicons dashicons-search"></i>
    </button>
</form>