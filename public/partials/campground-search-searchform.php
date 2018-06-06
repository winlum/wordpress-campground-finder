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

$near_to = get_query_var( Campground_Search_Util::prefix_string( 'near_to' ) );

$start_month = get_query_var( Campground_Search_Util::prefix_string( 'start_month' ) );
$start_day = get_query_var( Campground_Search_Util::prefix_string( 'start_day' ) );
$end_month = get_query_var( Campground_Search_Util::prefix_string( 'end_month' ) );
$end_day = get_query_var( Campground_Search_Util::prefix_string( 'end_day' ) );

$elevation = get_query_var( Campground_Search_Util::prefix_string( 'elevation' ) );
$max_length = get_query_var( Campground_Search_Util::prefix_string( 'max_length' ) );
$fees = get_query_var( Campground_Search_Util::prefix_string( 'fees' ) );

$toilets = get_query_var( 'toilet', array() );
$features = get_query_var( 'feature', array() );
$activities = get_query_var( 'activity', array() );
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<form
    action="<?php echo esc_url( home_url() ); ?>"
    class="<?php echo Campground_Search_Util::prefix_css_string( 'searchform' ); ?>"
    method="GET"
    role="search"
>
    <input
        name="post_type"
        type="hidden"
        value="<?php echo Campground_Search_Const::POST_TYPE; ?>"
    >
    <input
        name="<?php echo Campground_Search_Const::POST_TYPE; ?>_cat"
        type="hidden"
        value="<?php echo $categories; ?>"
    >
    <input name="sentence" type="hidden" value="1">

    <div class="field">
        <input
            id="s"
            maxlength="255"
            name="s"
            placeholder="Search for phrases..."
            value="<?php get_search_query(); ?>"
        >
        <label for="s">
            <?php _e( 'Search', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'near_to' ); ?>"
            name="<?php echo Campground_Search_Util::prefix_string( 'near_to' ); ?>"
        >
            <option <?php if ( empty( $near_to ) ) echo 'selected'; ?> value="">
                <?php _e( 'All', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php foreach ( $near_to_choices as $choice ) : ?>
            <option
                <?php if ( $near_to == $choice ) echo 'selected'; ?>
                value="<?php esc_attr_e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>"
            >
                <?php _e( $choice, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="<?php echo Campground_Search_Util::prefix_string( 'near_to' ); ?>">
            <?php _e( 'Nearest To', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <fieldset class="date-range">
        <legend><?php _e( 'Open', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div>
            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_string( 'start_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo Campground_Search_Util::prefix_string( 'start_month' ); ?>"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo $start_month; ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_string( 'start_month' ); ?>">
                    <?php _e( 'Start Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>

            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_string( 'start_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo Campground_Search_Util::prefix_string( 'start_day' ); ?>"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo $start_day; ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_string( 'start_day' ); ?>">
                    <?php _e( 'Start Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>
        </div>

        <div>
            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_string( 'end_month' ); ?>"
                    min="1"
                    max="12"
                    name="<?php echo Campground_Search_Util::prefix_string( 'end_month' ); ?>"
                    placeholder="1-12"
                    step="1"
                    type="number"
                    value="<?php echo $end_month; ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_string( 'end_month' ); ?>">
                    <?php _e( 'End Month', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>

            <div class="field">
                <input
                    id="<?php echo Campground_Search_Util::prefix_string( 'end_day' ); ?>"
                    min="1"
                    max="31"
                    name="<?php echo Campground_Search_Util::prefix_string( 'end_day' ); ?>"
                    placeholder="1-31"
                    step="1"
                    type="number"
                    value="<?php echo $end_month; ?>"
                >
                <label for="<?php echo Campground_Search_Util::prefix_string( 'end_day' ); ?>">
                    <?php _e( 'End Day', Campground_Search_Const::TEXT_DOMAIN ); ?>
                </label>
            </div>
        </div>
    </fieldset>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'elevation' ); ?>"
            name="<?php echo Campground_Search_Util::prefix_string( 'elevation' ); ?>"
            step="1"
            placeholder="0"
            type="number"
            value="<?php echo $elevation; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'elevation' ); ?>">
            <?php _e( 'Minimum Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'max_length' ); ?>"
            min="0"
            step="1"
            name="<?php echo Campground_Search_Util::prefix_string( 'max_length' ); ?>"
            placeholder="0"
            type="number"
            value="<?php echo $max_length; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'max_length' ); ?>">
            <?php _e( 'Average Maximum Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'fees' ); ?>"
            min="0"
            name="<?php echo Campground_Search_Util::prefix_string( 'fees' ); ?>"
            step="1"
            placeholder="0"
            type="number"
            value="<?php echo $fees; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'fees' ); ?>">
            <?php _e( 'Maximum Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <?php if ( is_array( $toilet ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'toilet' ); ?>"
            multiple
            name="toilet[]"
            size="2"
        >
            <?php foreach ( $toilet as $term ) : ?>
            <option
                <?php if ( in_array( $term->slug, $toilets ) ) echo 'selected'; ?>
                value="<?php echo $term->slug; ?>"
            >
                <?php _e( $term->name, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="<?php echo Campground_Search_Util::prefix_string( 'toilet' ); ?>">
            <?php _e( 'Toilets', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <?php if ( is_array( $feature ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'feature' ); ?>"
            multiple
            name="feature[]"
            size="6"
        >
            <?php foreach ( $feature as $term ) : ?>
            <option
                <?php if ( in_array( $term->slug, $features ) ) echo 'selected'; ?>
                value="<?php echo $term->slug; ?>"
            >
                <?php _e( $term->name, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="<?php echo Campground_Search_Util::prefix_string( 'feature' ); ?>">
            <?php _e( 'Features', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <?php if ( is_array( $activity ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'activity' ); ?>"
            multiple
            name="activity[]"
            size="4"
        >
            <?php foreach ( $activity as $term ) : ?>
            <option
                <?php if ( in_array( $term->slug, $activities ) ) echo 'selected'; ?>
                value="<?php echo $term->slug; ?>"
            >
                <?php _e( $term->name, Campground_Search_Const::TEXT_DOMAIN ); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="<?php echo Campground_Search_Util::prefix_string( 'activity' ); ?>">
            <?php _e( 'Activities', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <button type="submit">
        <?php _e( 'Search', Campground_Search_Const::TEXT_DOMAIN ); ?>
        <i class="dashicons dashicons-search"></i>
    </button>
</form>