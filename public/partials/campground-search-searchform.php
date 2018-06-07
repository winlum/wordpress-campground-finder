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

$near_to = get_query_var( Campground_Search_Util::prefix_string( 'general_near_to' ) );

$open_from = get_query_var( Campground_Search_Util::prefix_string( 'general_open_from' ) );
$open_to = get_query_var( Campground_Search_Util::prefix_string( 'general_open_to' ) );

$elevation = get_query_var( Campground_Search_Util::prefix_string( 'general_elevation' ) );
$max_length = get_query_var( Campground_Search_Util::prefix_string( 'general_max_length' ) );
$fees = get_query_var( Campground_Search_Util::prefix_string( 'general_fees' ) );

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
            id="<?php echo Campground_Search_Util::prefix_string( 'general_near_to' ); ?>"
            name="<?php echo Campground_Search_Util::prefix_string( 'general_near_to' ); ?>"
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
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_near_to' ); ?>">
            <?php _e( 'Nearest To', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <fieldset class="date-range">
        <legend><?php _e( 'Open', Campground_Search_Const::TEXT_DOMAIN ); ?></legend>

        <div class="field">
            <input
                id="<?php echo Campground_Search_Util::prefix_string( 'general_open_from' ); ?>"
                name="<?php echo Campground_Search_Util::prefix_string( 'general_open_from' ); ?>"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo $open_from; ?>"
            >
            <label for="<?php echo Campground_Search_Util::prefix_string( 'general_open_from' ); ?>">
                <?php _e( 'From', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
        </div>

        <div class="field">
            <input
                id="<?php echo Campground_Search_Util::prefix_string( 'general_open_to' ); ?>"
                name="<?php echo Campground_Search_Util::prefix_string( 'general_open_to' ); ?>"
                placeholder="YYYY-MM-DD"
                type="date"
                value="<?php echo $open_to; ?>"
            >
            <label for="<?php echo Campground_Search_Util::prefix_string( 'general_open_to' ); ?>">
                <?php _e( 'To', Campground_Search_Const::TEXT_DOMAIN ); ?>
            </label>
        </div>
    </fieldset>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'general_elevation' ); ?>"
            name="<?php echo Campground_Search_Util::prefix_string( 'general_elevation' ); ?>"
            step="1"
            placeholder="0"
            type="number"
            value="<?php echo $elevation; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_elevation' ); ?>">
            <?php _e( 'Minimum Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'general_max_length' ); ?>"
            min="0"
            step="1"
            name="<?php echo Campground_Search_Util::prefix_string( 'general_max_length' ); ?>"
            placeholder="0"
            type="number"
            value="<?php echo $max_length; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_max_length' ); ?>">
            <?php _e( 'Average Maximum Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <div class="field">
        <input
            id="<?php echo Campground_Search_Util::prefix_string( 'general_fees' ); ?>"
            min="0"
            name="<?php echo Campground_Search_Util::prefix_string( 'general_fees' ); ?>"
            step="1"
            placeholder="0"
            type="number"
            value="<?php echo $fees; ?>"
        >
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_fees' ); ?>">
            <?php _e( 'Maximum Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>

    <?php if ( is_array( $toilet ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'general_toilet' ); ?>"
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
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_toilet' ); ?>">
            <?php _e( 'Toilets', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <?php if ( is_array( $feature ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'general_feature' ); ?>"
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
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_feature' ); ?>">
            <?php _e( 'Features', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <?php if ( is_array( $activity ) ) : ?>
    <div class="field">
        <select
            id="<?php echo Campground_Search_Util::prefix_string( 'general_activity' ); ?>"
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
        <label for="<?php echo Campground_Search_Util::prefix_string( 'general_activity' ); ?>">
            <?php _e( 'Activities', Campground_Search_Const::TEXT_DOMAIN ); ?>
        </label>
    </div>
    <?php endif; ?>

    <button type="submit">
        <?php _e( 'Search', Campground_Search_Const::TEXT_DOMAIN ); ?>
        <i class="dashicons dashicons-search"></i>
    </button>
</form>