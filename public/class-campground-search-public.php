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
	 * Register the query variables for the search form.
	 *
	 * @since    1.0.0
	 * @param    array     $vars           An array of registered query vars.
	 */
	public function register_query_vars( $vars ) {
		$query_vars = array(
			'wlcs_location',
		);

		return array_merge( $vars, $query_vars );
	}

	/**
	 * Renders the search form shortcode.
	 *
	 * @since    1.0.0
	 * @param    array     $atts           An array of attributes provided to the shortcode.
	 * @param    string    $content        Any text provided in the shortcode "body".
	 */
	public function display_search_form( $atts, $content = null ) {
		$model = array(
			'TEXT_DOMAIN' => CAMPGROUND_SEARCH__I18N_NAME_SPACE,
		);

		ob_start();
		include_once( 'partials/' . $this->plugin_name . '-search-form.php' );
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

}
