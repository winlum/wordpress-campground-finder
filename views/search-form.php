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
    <section class="campground-search-results">
        <?php if ( empty( $model->results ) ) : ?>
            No Campgrounds found matching the criteria
        <?php else : ?>
        <h3>Campgrounds Found</h3>
            <?php foreach ( $model->results as $result ) : ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>