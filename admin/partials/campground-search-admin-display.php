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
<form action='options.php' method='post'>

    <h2><?php _e( 'Campground Search', Campground_Search_Const::TEXT_DOMAIN ); ?></h2>

    <?php
    settings_fields( Campground_Search_Const::OPTION_GROUP );
    do_settings_sections( Campground_Search_Const::OPTION_GROUP );
    submit_button();
    ?>

</form>