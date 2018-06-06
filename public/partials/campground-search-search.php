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
        <div class="results">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
            global $post;

            $custom_fields = get_post_custom( $post->ID );
            // TODO: remove the hard-coded "general"
            $field_key = '_' . Campground_Search_Const::PREFIX . '_general';

            $taxonomies = get_object_taxonomies( $post );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <?php the_title(
                    sprintf(
                        '<h2><a href="%s" rel="bookmark">',
                        esc_url( get_permalink() )
                    ),
                    '</a></h2>'
                ); ?>
            </header>
            <?php if ( ! empty( get_the_excerpt( $post ) ) ) : ?>
            <section class="result-excerpt">
                <?php the_excerpt(); ?>
            </section>
            <?php endif; ?>
            <section class="result-custom">
                <?php if ( ! empty( $custom_fields[$field_key . '_near_to'][0] ) ) : ?>
                <div class="field">
                    <span>Location</span>
                    <?php esc_html_e(
                        $custom_fields[$field_key . '_near_to'][0],
                        Campground_Search_Const::TEXT_DOMAIN
                    ); ?>
                </div>
                <?php endif; ?>
            </section>
            <section class="result-taxonomies">
            <?php foreach ( $taxonomies as $taxonomy ) : ?>
                <div class="result-taxonomy">
                    <span><?php echo Campground_Search_Const::$taxonomies[$taxonomy]['plural']; ?></span>
                    <ul>
                    <?php $terms = get_the_terms( $post, $taxonomy ); foreach ( $terms as $term ) : ?>
                        <li><?php echo esc_html( $term->name ); ?></li>
                    <? endforeach; ?>
                    </ul>
                </div>
            <? endforeach; ?>
            </section>
            <footer>
            </footer>
        </article>
        <?php endwhile; ?>
        <?php
			the_posts_pagination(
				array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="dashicons dashicons-arrow-left">' .
                        '<span>' . __( 'Previous', Campground_Search_Const::TEXT_DOMAIN ) . '</span>',
                    'next_text' => '<span>' . __( 'Next', Campground_Search_Const::TEXT_DOMAIN ) . '</span>' .
                        '<i class="dashicons dashicons-arrow-right">',
				)
			);
        ?>
        </div>
    <?php else : ?>
        <!-- no results -->
        <div class="no-results">
            <p>
                <?php _e(
                    'Sorry, but nothing matched your search terms. Please try again with different criteria.',
                    Campground_Search_Const::TEXT_DOMAIN
                ); ?>
            </p>

            <?php echo do_shortcode( '[' . Campground_Search_Const::SHORT_CODE . ']' ) ?>
        </div>
    <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
</div>  
<?php
get_footer();