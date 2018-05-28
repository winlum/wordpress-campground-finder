<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/admin
 * @author     WinLum Inc.
 */
class Campground_Search_Admin {

	const META_BOXES = array(
		'general' => 'normal',
		'location' => 'normal',
		'features' => 'side',
		'activities' => 'side',
	);

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
	 * @param    string    $plugin_name    The name of this plugin.
	 * @param    string    $version        The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/campground-search-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/campground-search-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Registers the post type with WP.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
    public function create_post_type() {
        sprintf( 'Creating Post Type: %s', CAMPGROUND_SEARCH__POST_TYPE );

		$labels = array(
			'name' => _x( 'Campground', 'post type general name', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'singular_name' => _x( 'Campground', 'post type singular name', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'menu_name' => _x( 'Campgrounds', 'admin menu', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'name_admin_bar' => _x( 'Campground', 'add new on admin bar', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'add_new' => _x( 'Add New', 'campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'add_new_item' => __( 'Add New Campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'new_item' => __( 'New Campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'edit_item' => __( 'Edit Campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'update_item' => __( 'Update Campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'view_item' => __( 'View Campground', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'all_items' => __( 'All Campgrounds', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'search_items' => __( 'Search Campgrounds', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'parent_item_colon' => __( 'Parent Campgrounds', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'not_found' => __( 'No campgrounds found', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'not_found_in_trash' => __( 'No campgrounds found in Trash', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
		);

		$args = array(
			'labels' => $labels,
			'description' => __( 'Campgrounds available', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-palmtree',
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
			),
			'register_meta_box_cb' => array( $this, 'create_meta_boxes' ),
			'taxonomies' => array( CAMPGROUND_SEARCH__TAXONOMY ),
			'rewrite' => array(
				'slug' => CAMPGROUND_SEARCH__POST_TYPE,
				'with_front' => true,
			),
			'query_var' => true,
		);

        register_post_type( CAMPGROUND_SEARCH__POST_TYPE, $args );
    }

    /**
	 * Registers the taxonomy with WP.
	 *
	 * @author WinLum Inc.
	 * @since 1.0.0
	 */
	public function create_taxonomy() {
        sprintf( 'Creating Taxonomy: %s', CAMPGROUND_SEARCH__TAXONOMY );

        $labels = array(
            'name' => __( 'Campground Locations', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
            'label' => __( 'Campground Locations', CAMPGROUND_SEARCH__I18N_NAME_SPAC),
            'add_new_item' => __( 'Add New Campground Location', CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
        );

        $args = array(
            'public' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'hierarchical' => false,
            'has_archive' => false,
			'query_var' => true,
			'rewrite' => array(
				'slug' => CAMPGROUND_SEARCH__TAXONOMY,
				'with_front' => true,
			),
        );

        register_taxonomy( CAMPGROUND_SEARCH__TAXONOMY, array( CAMPGROUND_SEARCH__POST_TYPE ), $args );
        register_taxonomy_for_object_type( CAMPGROUND_SEARCH__TAXONOMY, CAMPGROUND_SEARCH__POST_TYPE );
    }

    /**
     * Adds the Meta Boxes for the Post Type.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
    public function create_meta_boxes() {
		foreach ( self::META_BOXES as $key => $val ) {
			$this->create_meta_box( $key, $val );
		}
	}

    /**
     * Adds the Meta Box for the given key.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $key            The meta box name.
	 * @param    string    $loc            Optional. The meta box location. Default is "normal".
     */
    private function create_meta_box( $key, $loc = 'normal' ) {
		$lkey = strtolower( $key );
		$ukey = ucwords( $key );
		$cb = function () use ( $lkey ) {
			$this->display_meta_box( $lkey );
		};

		add_meta_box(
			CAMPGROUND_SEARCH__PREFIX . $lkey . '_meta_box',
			__( $ukey, CAMPGROUND_SEARCH__I18N_NAME_SPACE ),
			array( $this, $cb ),
			CAMPGROUND_SEARCH__POST_TYPE,
			$loc
		);
	}
	
    /**
     * Creates the meta box view.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $key            The meta box name.
     */
	public function display_meta_box( $key ) {
		$lkey = strtolower($key);
		$file_name = $this->plugin_name . '-' . $lkey . '-meta-box.php';
		$nonce_name = CAMPGROUND_SEARCH__PREFIX . '_' . $lkey . '_meta_box_nonce';

		ob_start();
    	wp_nonce_field( basename( __FILE__ ), $nonce_name );
		include_once( 'partials/' . $file_name );
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

    /**
     * Saves the Meta Boxes for the Post Type.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
    public function save_meta_boxes_data( $post_id ) {
		foreach ( self::META_BOXES as $key => $val ) {
			$nonce_key = CAMPGROUND_SEARCH__PREFIX . strtolower( $key ) . '_meta_box_nonce';

			// verify each meta box nonce
			if ( ! isset( $_POST[$nonce_key] )
				|| ! wp_verify_nonce( $_POST[$nonce_key], basename( __FILE__ ) )
			) {
				return;
			}

			// return if doing an autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
		}

		// check the user's permissions
		if ( isset( $_POST['post_type'] )
			&& $_POST['post_type'] === CAMPGROUND_SEARCH__POST_TYPE 
			&& ! current_user_can( 'edit_post', $post_id )
		) {
			return;
		}

		$field_key = CAMPGROUND_SEARCH__PREFIX . '_fields';
		// get the custom fields' values
		$fields = ( isset( $_POST[$field_key] ) )
			? (array) $_POST[$field_key]
			: array();
		
		// return if no data
		if ( empty( $fields ) ) {
			return;
		}

		foreach ( $fields as $key => $val ) {
			// check if bidimensional array, and sanitize fields
			if ( is_array( $val ) ) {
				$val = array_map( 'sanitize_text_field', $val );
			} else {
				$val = sanitize_text_field( $val );
			}

			$field_key = '_' . CAMPGROUND_SEARCH__PREFIX . '_' . $key;

			update_post_meta( $post_id, $field_key, $val );
		}
    }

}
