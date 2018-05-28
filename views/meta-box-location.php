<div class="campground-search-meta-box">
    <?php wp_nonce_field( basename(__FILE__), 'cs_location_meta_box_nonce' ); ?>

    <select name="customfields[location]">
    <?php foreach ( $model->locations as $location ) : ?>
        <option
            value="<?php esc_sql( $location->value ); ?>"
            <?php if ( $model->location == $location ) echo "selected"; ?>
        >
            <?php esc_sql( $location->name ); ?>
        </option>
    <?php endforeach; ?>
    </select>
</div>