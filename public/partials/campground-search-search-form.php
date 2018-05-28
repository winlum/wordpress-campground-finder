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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="campground-search-container">
    <form id="campground-search-form" action="<?php echo esc_url( home_url() ); ?>" method="GET" role="search">
        <select name="campground-search-location">
        <?php foreach ( $model->locations as $location ) : ?>
            <option
                value="<?php esc_sql( $location->value ); ?>"
                <?php if ( $model->location == $location ) echo "selected"; ?>
            >
                <?php esc_sql( $location->name ); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <input name="campground-search-q" maxlength="255">
        <button type="submit">
            <?php _e( 'Search', $model->TEXT_DOMAIN ); ?>
            <i class="dashicons-search">
        </button>
    </form>
</div>