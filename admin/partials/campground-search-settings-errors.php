<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="<?php echo Campground_Search_Util::prefix_css_string( 'errors' ); ?> error below-h2">
    <ul>
    <?php foreach ( $errors as $error ) : ?>
        <li><?php esc_html_e( $error['message'], Campground_Search_Const::TEXT_DOMAIN ); ?></li>
    <?php endforeach; ?>
    </ul>
</div><!-- .<?php echo Campground_Search_Util::prefix_css_string( 'errors' ); ?> -->