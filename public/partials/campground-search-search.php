<?php

/**
 * Provide a public-facing view for the plugin's search form results.
 *
 * @link       https://winlum.com
 * @since      1.2.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/public/partials
 */

global $wp_query;

get_header();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <div class="<?php echo Campground_Search_Util::prefix_css_string('search'); ?>">

    <?php if ( have_posts() ) : ?>
        <div class="query-info">
            <?php _e( sprintf( 'We found %d campgrounds matching your criteria.', $wp_query->found_posts ) ); ?>
        </div>
        <div class="<?php echo Campground_Search_Util::prefix_css_string('search-container'); ?>">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php
                global $post;

                $custom_fields = get_post_custom( $post->ID );
                $field_key = '_' . Campground_Search_Util::prefix_string( 'general' );
                $geo_field_key = '_' . Campground_Search_Util::prefix_string( 'geo' );

                $taxonomies = get_object_taxonomies( $post );

                $district = is_array( $custom_fields[$field_key . '_district'] )
                    ? $custom_fields[$field_key . '_district'][0]
                    : null;

                $near_to = is_array( $custom_fields[$field_key . '_near_to'] )
                    ? $custom_fields[$field_key . '_near_to'][0]
                    : null;

                $open_from = is_array( $custom_fields[$field_key . '_open_from'] )
                    ? Campground_Search_Util::friendly_date_range(
                        $custom_fields[$field_key . '_open_from'][0]
                    )
                    : null;

                $open_to = is_array( $custom_fields[$field_key . '_open_to'] )
                    ? Campground_Search_Util::friendly_date_range(
                        $custom_fields[$field_key . '_open_to'][0]
                    )
                    : null;

                $open = ( ! empty( $open_from ) && ! empty ( $open_to ) )
                    ? $open_from . ' - ' . $open_to
                    : __( 'All Year', Campground_Search_Const::TEXT_DOMAIN );

                $water_available = is_array( $custom_fields[$field_key . '_water_available'] )
                    ? ( $custom_fields[$field_key . '_water_available'][0] )
                    : false;

                $water_from = is_array( $custom_fields[$field_key . '_water_from'] )
                    ? Campground_Search_Util::friendly_date_range(
                        $custom_fields[$field_key . '_water_from'][0]
                    )
                    : null;

                $water_to = is_array( $custom_fields[$field_key . '_water_to'] )
                    ? Campground_Search_Util::friendly_date_range(
                        $custom_fields[$field_key . '_water_to'][0]
                    )
                    : null;

                $water = ( ! empty( $water_from ) && ! empty ( $water_to ) )
                    ? $water_from . ' - ' . $water_to
                    : null;

                if ( empty( $water ) ) {
                    $water = $water_available
                        ? __( 'All Year', Campground_Search_Const::TEXT_DOMAIN )
                        : __( 'No Water', Campground_Search_Const::TEXT_DOMAIN );
                }

                $elevation = is_array( $custom_fields[$geo_field_key . '_elevation'] )
                    ? $custom_fields[$geo_field_key . '_elevation'][0]
                    : null;

                $max_length = is_array( $custom_fields[$field_key . '_max_length'] )
                    ? $custom_fields[$field_key . '_max_length'][0]
                    : null;

                $fees = is_array( $custom_fields[$field_key . '_fees'] )
                    ? $custom_fields[$field_key . '_fees'][0]
                    : null;

                if ( function_exists( 'money_format' ) && ! empty( $fees ) ) {
                    setlocale( LC_MONETARY, 'en_US.UTF-8' );
                    $fees = money_format( '%.2n', $fees );
                }

                $reservation_url = is_array( $custom_fields[$field_key . '_reservation_url'] )
                    ? $custom_fields[$field_key . '_reservation_url'][0]
                    : null;

                $url = is_array( $custom_fields[$field_key . '_url'] )
                    ? $custom_fields[$field_key . '_url'][0]
                    : null;
            ?>
            <article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>>
                <header>
                    <h2>
                    <?php if ( empty( $url ) ) : ?>
                        <?php echo get_the_title(); ?>
                    <?php else: ?>
                        <a href="<?php echo esc_url( $url ); ?>" rel="bookmark" title="View">
                            <?php echo get_the_title(); ?>
                        </a>
                    <?php endif; ?>
                    </h2>
                    <div class="toolbar">
                    <?php if ( ! empty( $reservation_url ) ) : ?>
                        <a href="<?php echo esc_url( $url ); ?>"><i class="fas fa-campground"></i></a>
                    <?php endif; ?>
                    <?php if ( ! empty( $reservation_url ) ) : ?>
                        <a href="<?php echo esc_url( $reservation_url ); ?>"><i class="fas fa-store"></i></a>
                    <?php endif; ?>
                    </div>
                </header>
                <?php if ( ! empty( get_the_excerpt( $post ) ) ) : ?>
                <section class="excerpt">
                    <?php the_excerpt(); ?>
                </section>
                <?php endif; ?>
                <section class="custom">
                <?php if ( ! empty( $district ) ) : ?>
                    <div class="field">
                        <span class="label">
                            <?php _e( 'District', campground_search_const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                            <?php esc_html_e( $district ); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $near_to ) ) : ?>
                    <div class="field">
                        <span class="label">
                            <?php _e( 'Near', campground_search_const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                            <?php esc_html_e( $near_to ); ?>
                        </span>
                    </div>
                <?php endif; ?>

                    <div class="field">
                        <span class="label">
                            <?php _e( 'Open', campground_search_const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                            <?php esc_html_e( $open ); ?>
                        </span>
                    </div>

                    <div class="field">
                        <span class="label">
                            <?php _e( 'Water Available', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                            <?php esc_html_e( $water ); ?>
                        </span>
                    </div>

                    <div class="field">
                        <span class="label">
                            <?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                        <?php if ( empty( $elevation ) ) : ?>
                            <?php _e( 'Unknown', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        <?php else : ?>
                            <?php esc_html_e( $elevation . "'", Campground_Search_Const::TEXT_DOMAIN ); ?>
                        <?php endif; ?>
                        </span>
                    </div>

                    <div class="field">
                        <span class="label">
                            <?php _e( 'Average Max Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                        <?php if ( empty( $max_length ) ) : ?>
                            <?php _e( 'None', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        <?php else : ?>
                            <?php esc_html_e( $max_length . "'", Campground_Search_Const::TEXT_DOMAIN ); ?>
                        <?php endif; ?>
                        </span>
                    </div>

                    <div class="field">
                        <span class="label">
                            <?php _e( 'Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        </span>
                        <span class="value">
                        <?php if ( ! empty( $fees ) ) : ?>
                            <?php esc_html_e( $fees, Campground_Search_Const::TEXT_DOMAIN ); ?>
                        <?php endif; ?>
                        </span>
                    </div>
                </section>
                <footer>
                <?php foreach ( $taxonomies as $taxonomy ) : ?>
                    <?php
                        $taxonomy_obj = Campground_Search_Const::$taxonomies[$taxonomy];
                    ?>
                    <div class="taxonomy">
                        <span class="label">
                        <?php if ( array_key_exists( 'icon', $taxonomy_obj ) ) : ?>
                            <i class="fas <?php echo $taxonomy_obj['icon']; ?>"></i>
                        <?php endif; ?>
                            <?php echo $taxonomy_obj['plural']; ?>
                        </span>
                        <ul class="value">
                        <?php $terms = get_the_terms( $post, $taxonomy ); if ( empty( $terms ) ) : ?>
                            <li>
                                <i class="fas fa-minus-square"></i>
                                <?php _e( 'None', Campground_Search_Const::TEXT_DOMAIN ); ?>
                            </li>
                        <?php else : ?>
                            <?php foreach ( $terms as $term ) : ?>
                                <?php
                                    $term_obj = $taxonomy_obj['terms'][$term->slug];
                                    unset( $term_icon );
                                    if ( is_array( $term_obj ) && array_key_exists( 'icon', $term_obj ) ) {
                                        $term_icon = $term_obj['icon'];
                                    }
                                ?>
                            <li>
                            <?php if ( ! empty( $term_icon ) ) : ?>
                                <i class="fas <?php echo $term_icon; ?>"></i>
                            <?php endif; ?>
                                <?php esc_html_e( $term->name ); ?>
                            </li>
                            <? endforeach; ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                <? endforeach; ?>
                </footer>
            </article>
            <?php endwhile; ?>
        </div>
        <?php
            the_posts_pagination(
                array(
                    'mid_size' => 2,
                    'prev_text' => '<span>' .
                        __( 'Previous', Campground_Search_Const::TEXT_DOMAIN ) . '</span>',
                    'next_text' => '<span>' .
                        __( 'Next', Campground_Search_Const::TEXT_DOMAIN ) . '</span>',
                )
            );
        ?>
    <?php else : ?>
        <div class="no-results">
            <?php _e(
                'Sorry, but nothing matched your search terms. Please try again with different criteria.',
                Campground_Search_Const::TEXT_DOMAIN
            ); ?>
        </div><!-- .no-results -->

        <?php echo do_shortcode( '[' . Campground_Search_Const::SHORT_CODE . ']' ) ?>
    <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
</div>
<?php
get_footer();
