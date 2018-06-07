<?php

/**
 * Provide a public-facing view for the plugin's search form results.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/public/partials
 */

get_header();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <div class="<?php echo Campground_Search_Util::prefix_css_string('search'); ?>">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
            global $post;

            $custom_fields = get_post_custom( $post->ID );
            $field_key = '_' . Campground_Search_Util::prefix_string( 'general' );

            $taxonomies = get_object_taxonomies( $post );

            $near_to = is_array( $custom_fields[$field_key . '_near_to'] )
                ? $custom_fields[$field_key . '_near_to'][0]
                : null;

            $open_from = is_array( $custom_fields[$field_key . '_open_from'] )
                ? $custom_fields[$field_key . '_open_from'][0]
                : null;

            $open_to = is_array( $custom_fields[$field_key . '_open_to'] )
                ? $custom_fields[$field_key . '_open_to'][0]
                : null;
            
            $open = ( ! empty( $open_from ) && ! empty ( $open_to ) )
                ? $open_from . ' - ' . $open_to
                : __( 'All Year', Campground_Search_Const::TEXT_DOMAIN );

            $water_available = is_array( $custom_fields[$field_key . '_water_available'] )
                ? ( $custom_fields[$field_key . '_water_available'][0] )
                : false;

            $water_from = is_array( $custom_fields[$field_key . '_water_from'] )
                ? $custom_fields[$field_key . '_water_from'][0]
                : null;

            $water_to = is_array( $custom_fields[$field_key . '_water_to'] )
                ? $custom_fields[$field_key . '_water_to'][0]
                : null;
            
            $water = ( ! empty( $water_from ) && ! empty ( $water_to ) )
                ? $water_from . ' - ' . $water_to
                : $water_available
                    ? __( 'All Year', Campground_Search_Const::TEXT_DOMAIN )
                    : __( 'No Water', Campground_Search_Const::TEXT_DOMAIN );

            $elevation = is_array( $custom_fields[$field_key . '_elevation'] )
                ? $custom_fields[$field_key . '_elevation'][0]
                : null;

            $max_length = is_array( $custom_fields[$field_key . '_max_length'] )
                ? $custom_fields[$field_key . '_max_length'][0]
                : null;

            setlocale( LC_MONETARY, 'en_US.UTF-8' );
            $fees = is_array( $custom_fields[$field_key . '_fees'] )
                ? function_exists( 'money_format' )
                    ? money_format( '%.2n', $custom_fields[$field_key . '_fees'][0] )
                    : $custom_fields[$field_key . '_fees'][0]
                : __( 'None', Campground_Search_Const::TEXT_DOMAIN );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h2>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                        <?php echo get_the_title(); ?>
                    </a>
                <?php if ( ! empty( $near_to ) ) : ?>
                   <span class="label">
                       <?php _e( 'near', Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                   <span class="near-to">
                        <?php esc_html_e( $near_to, Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                <?php endif; ?>
                </h2>
            </header>
            <?php if ( ! empty( get_the_excerpt( $post ) ) ) : ?>
            <section class="excerpt">
                <?php the_excerpt(); ?>
            </section>
            <?php endif; ?>
            <section class="custom">
                <div class="field">
                    <span class="label">
                        <?php _e( 'Open', Campground_Search_Const::TEXT_DOMAIN ); ?>
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

                <?php if ( ! empty( $elevation ) ) : ?>
                <div class="field">
                    <span class="label">
                        <?php _e( 'Elevation', Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                    <span class="value">
                        <?php esc_html_e( $elevation, Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                </div>
                <?php endif; ?>

                <?php if ( ! empty( $max_length ) ) : ?>
                <div class="field">
                    <span class="label">
                        <?php _e( 'Average Max Length', Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                    <span class="value">
                        <?php esc_html_e( $max_length, Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                </div>
                <?php endif; ?>

                <?php if ( ! empty( $fees ) ) : ?>
                <div class="field">
                    <span class="label">
                        <?php _e( 'Fees', Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                    <span class="value">
                        <?php esc_html_e( $fees, Campground_Search_Const::TEXT_DOMAIN ); ?>
                    </span>
                </div>
                <?php endif; ?>
            </section>
            <footer>
            <?php foreach ( $taxonomies as $taxonomy ) : ?>
                <div class="taxonomy">
                    <span class="label">
                        <?php echo Campground_Search_Const::$taxonomies[$taxonomy]['plural']; ?>
                    </span>
                    <ul class="value">
                    <?php $terms = get_the_terms( $post, $taxonomy ); if ( empty( $terms ) ) : ?>
                        <li class="dashicons-before dashicons-thumbs-down">
                            <?php _e( 'None', Campground_Search_Const::TEXT_DOMAIN ); ?>
                        </li>
                    <?php else : ?>
                        <?php foreach ( $terms as $term ) : ?>
                        <li class="dashicons-before dashicons-thumbs-up"><?php esc_html_e( $term->name ); ?></li>
                        <? endforeach; ?>
                    <?php endif; ?>
                    </ul>
                </div>
            <? endforeach; ?>
            </footer>
        </article>
        <?php endwhile; ?>
        <?php
			the_posts_pagination(
				array(
                    'mid_size' => 2,
                    'prev_text' => '<span class="dashicons-before dashicons-arrow-left">' .
                        __( 'Previous', Campground_Search_Const::TEXT_DOMAIN ) . '</span>',
                    'next_text' => '<span>' .
                        __( 'Next', Campground_Search_Const::TEXT_DOMAIN ) . '</span>' .
                        '<span class="dashicons dashicons-arrow-right"></span>',
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