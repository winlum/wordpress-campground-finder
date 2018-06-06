<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/public
 * @author     WinLum Inc.
 */
class Campground_Search_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version        The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name    The name of the plugin.
	 * @param    string    $version        The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @param    string    $hook           A screen id to filter the current admin page.
	 */
	public function enqueue_styles( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Campground_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Campground_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 * 
		 * You can use the $hook parameter to filter for a particular admin page,
		 * for more information see the codex,
		 * https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/campground-search-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @param    string    $hook           A screen id to filter the current admin page.
	 */
	public function enqueue_scripts( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Campground_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Campground_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 * 
		 * You can use the $hook parameter to filter for a particular admin page,
		 * for more information see the codex,
		 * https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/campground-search-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Renders the search form shortcode.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    array     $atts           An array of attributes provided to the shortcode.
	 * @param    string    $content        Any text provided in the shortcode "body".
	 * @return   string
	 */
	public function display_search_form( $atts, $content = null ) {
		$options = get_option( Campground_Search_Const::SETTINGS );
		$near_to_choices = array_map(
			'trim',
			explode( "\n", $options[Campground_Search_Const::PREFIX . '_near_to'] )
		);

		$categories = implode( ',', array_keys( Campground_Search_Const::$taxonomies ) );

		foreach ( Campground_Search_Const::$taxonomies as $taxonomy => $taxonomy_val ) {
			$$taxonomy = get_terms(
					array(
					'hide_empty' => false,
					'taxonomy' => $taxonomy,
				)
			);
		}

		ob_start();
		include_once( 'partials/' . $this->plugin_name . '-searchform.php' );
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	/**
	 * Updates the query object with the query vars.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    object    $query          The WP_Query instance reference.
	 */
	public function pre_get_posts( $query ) {
		// return if request is for an admin page or not part of the main query
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		// do not modify the query if it's not the post type
		if ( ! is_post_type_archive( Campground_Search_Const::POST_TYPE ) ) {
			return;
		}

		// get the relevant query vars, which default to an empty string
		$meta_query = array();

		foreach ( Campground_Search_Const::$query_vars as $query_var ) {
			$key = $query_var['key'];
			$query_key = Campground_Search_Const::PREFIX . '_' . $key;
			$query_val = get_query_var( $query_key );
			
			if ( ! empty( $query_val ) ) {
				// TODO: remove the hard-coded key 'general'
				$meta_query[] = array_merge( $query_var, array(
					'key' => '_' . Campground_Search_Const::PREFIX . '_general_' . $key,
					'value' => $query_val,
				) );
			}
		}

		if ( count( $meta_query ) > 1 ) {
			$meta_query['relation'] = 'AND';
		}

		if ( ! empty( $meta_query ) ) {
			$query->set( 'meta_query', $meta_query );
		}
	}
	
	/**
	 * Register the query variables for the search form.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    array     $vars           An array of registered query vars.
	 * @return   array
	 */
	public function register_query_vars( $vars ) {
		$query_vars = array_map( function ( $item ) {
			return Campground_Search_Const::PREFIX . '_' . $item['key'];
		}, Campground_Search_Const::$query_vars );

		return array_merge( $vars, $query_vars );
	}

	/**
	 * Intercepts template include process to use the plugin search template,
	 * for the custom post type, if the theme does not have one.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $template       The path to the template file being included.
	 * @return   string
	 */
	public function template_include( $template ) {
		if ( is_search() && is_post_type_archive( Campground_Search_Const::POST_TYPE ) ) {
			$theme_file = get_stylesheet_directory() . 'search-';
			$theme_file .= Campground_Search_Const::POST_TYPE . '.php';
			if ( file_exists( $theme_file ) ) {
				return $theme_file;
			}

			$plugin_file = plugin_dir_path( __FILE__ ) . 'partials/';
			$plugin_file .= $this->plugin_name . '-search.php';
			return $plugin_file;
		}

		return $template;
	}

}
