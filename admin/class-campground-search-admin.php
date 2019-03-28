<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://winlum.com
 * @since      1.1.0
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
		'general' => array(
			'location' => 'normal',
			'priority' => 'high',
			'fields' => array(
				'district' => array(),
				'near_to' => array(),
				'elevation' => array(
					'type' => 'numeric',
				),
				'open_from' => array(
					'message' => '"Open From" has an invalid date',
					'type' => 'date',
				),
				'open_to' => array(
					'message' => '"Open To" has an invalid date',
					'type' => 'date',
				),
				'water_available' => array(),
				'water_from' => array(
					'message' => '"Water From" has an invalid date',
					'type' => 'date',
				),
				'water_to' => array(
					'message' => '"Water To" has an invalid date',
					'type' => 'date',
				),
				'max_length' => array(
					'type' => 'numeric',
				),
				'fees' => array(
					'type' => 'numeric',
				),
				'num_sites' => array(
					'type' => 'numeric',
				),
				'num_group_sites' => array(
					'type' => 'numeric',
				),
				'reservation_url' => array(),
			),
		),
		'geo' => array(
			'location' => 'normal',
			'priority' => 'high',
			'fields' => array(
				'address' => array(),
				'longitude' => array(
					'type' => 'numeric',
				),
				'latitude' => array(
					'type' => 'numeric',
				),
				'elevation' => array(
					'type' => 'numeric',
				),
			),
		),
	);
	const SETTINGS_ERRORS = 'settings_errors';

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

		// get styling for the datepicker. linknng to cloud hosted jQuery UI CSS
		$wp_scripts = wp_scripts();
		wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/' . $wp_scripts->registered['jquery-ui-core']->ver . '/themes/smoothness/jquery-ui.css' );
		wp_enqueue_style( 'jquery-ui' );

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

		// load the datepicker script (pre-registered in WordPress)
		wp_enqueue_script( 'jquery-ui-datepicker' );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/campground-search-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Adds the menu option.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 */
	public function create_menu() {
		add_options_page(
			__( 'Campground Search', Campground_Search_Const::TEXT_DOMAIN ),
			__( 'Campground Search', Campground_Search_Const::TEXT_DOMAIN ),
			Campground_Search_Const::CAPABILTY_OPTIONS,
			$this->plugin_name,
			array( $this, 'display_options' )
		);
	}

    /**
     * Creates the options view.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
	public function display_options() {
		include_once( 'partials/campground-search-admin-display.php' );
	}

    /**
     * Registers the settings with WP.
     *
	 * @author   WinLum Inc.
	 * @since    1.1.0
     */
	public function create_settings() {
		register_setting( Campground_Search_Const::OPTION_GROUP, Campground_Search_Const::SETTINGS );

		$section_name = Campground_Search_Util::prefix_string( Campground_Search_Const::OPTION_GROUP . '_section' );

		add_settings_section(
			$section_name,
			__( 'Settings', Campground_Search_Const::TEXT_DOMAIN ),
			array( $this, 'display_settings_section' ),
			Campground_Search_Const::OPTION_GROUP
		);

		add_settings_field(
			Campground_Search_Const::PREFIX . '_district',
			__( 'District the Campground is in (place each choice on its own line)', Campground_Search_Const::TEXT_DOMAIN ),
			array( $this, 'display_setting_district' ),
			Campground_Search_Const::OPTION_GROUP,
			$section_name
		);

		add_settings_field(
			Campground_Search_Const::PREFIX . '_near_to',
			__( 'Nearest To Choices (place each choice on its own line)', Campground_Search_Const::TEXT_DOMAIN ),
			array( $this, 'display_setting_near_to' ),
			Campground_Search_Const::OPTION_GROUP,
			$section_name
		);
	}

	public function display_settings_section() {
		// _e( 'Settings Description', Campground_Search_Const::TEXT_DOMAIN );
	}

	public function display_setting_district() {
		$options = get_option( Campground_Search_Const::SETTINGS );
		$field_name = Campground_Search_Const::PREFIX . '_district';
		$name = Campground_Search_Const::SETTINGS . '[' . $field_name . ']';
		echo '<textarea cols="40" name="' . $name . '" rows="4">' . $options[$field_name] . '</textarea>';
	}

	public function display_setting_near_to() {
		$options = get_option( Campground_Search_Const::SETTINGS );
		$field_name = Campground_Search_Const::PREFIX . '_near_to';
		$name = Campground_Search_Const::SETTINGS . '[' . $field_name . ']';
		echo '<textarea cols="40" name="' . $name . '" rows="4">' . $options[$field_name] . '</textarea>';
	}

    /**
     * Registers the post type with WP.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
    public function create_post_type() {
		$labels = array(
			'name' => _x( 'Campground', 'post type general name', Campground_Search_Const::TEXT_DOMAIN ),
			'singular_name' => _x( 'Campground', 'post type singular name', Campground_Search_Const::TEXT_DOMAIN ),
			'menu_name' => _x( 'Campgrounds', 'admin menu', Campground_Search_Const::TEXT_DOMAIN ),
			'name_admin_bar' => _x( 'Campground', 'add new on admin bar', Campground_Search_Const::TEXT_DOMAIN ),
			'add_new' => _x( 'Add New', 'campground', Campground_Search_Const::TEXT_DOMAIN ),
			'add_new_item' => __( 'Add New Campground', Campground_Search_Const::TEXT_DOMAIN ),
			'new_item' => __( 'New Campground', Campground_Search_Const::TEXT_DOMAIN ),
			'edit_item' => __( 'Edit Campground', Campground_Search_Const::TEXT_DOMAIN ),
			'update_item' => __( 'Update Campground', Campground_Search_Const::TEXT_DOMAIN ),
			'view_item' => __( 'View Campground', Campground_Search_Const::TEXT_DOMAIN ),
			'all_items' => __( 'All Campgrounds', Campground_Search_Const::TEXT_DOMAIN ),
			'search_items' => __( 'Search Campgrounds', Campground_Search_Const::TEXT_DOMAIN ),
			'parent_item_colon' => __( 'Parent Campgrounds', Campground_Search_Const::TEXT_DOMAIN ),
			'not_found' => __( 'No campgrounds found', Campground_Search_Const::TEXT_DOMAIN ),
			'not_found_in_trash' => __( 'No campgrounds found in Trash', Campground_Search_Const::TEXT_DOMAIN ),
		);

		$args = array(
			'labels' => $labels,
			'description' => __( 'Campgrounds available', Campground_Search_Const::TEXT_DOMAIN ),
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
			'taxonomies' => array_keys( Campground_Search_Const::$taxonomies ),
			'has_archive' => true,
			'rewrite' => array(
				'slug' => Campground_Search_Const::POST_TYPE,
				'with_front' => true,
			),
			'query_var' => true,
		);

        register_post_type( Campground_Search_Const::POST_TYPE, $args );
    }

    /**
	 * Registers the taxonomies with WP.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 */
	public function create_taxonomies() {
		foreach ( Campground_Search_Const::$taxonomies as $key => $val ) {
			$this->create_taxonomy( $key, $val );
		}
	}

    /**
     * Adds the Meta Boxes for the Post Type.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
     */
    public function create_meta_boxes() {
		foreach ( self::META_BOXES as $key => $val ) {
			$this->create_meta_box( $key, $val['fields'], $val['location'], $val['priority'] );
		}
	}

    /**
     * Creates the meta box view.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $key            The meta box name.
	 * @param    array     $fields         The fields to use.
     */
	public function display_meta_box( $key, array $fields ) {
		global $post;

		$field_key = Campground_Search_Util::prefix_string( $key );
		$nonce_name = Campground_Search_Util::prefix_string( $key . '_meta_box_nonce' );
		$file_name = $this->plugin_name . '-' . $key . '-meta-box.php';

		$post_fields = get_post_custom( $post->ID );
		foreach ( $fields as $field ) {
			$fkey = '_' . Campground_Search_Util::prefix_string( $key . '_' . $field );
			${$field} = isset( $post_fields[$fkey][0] )
				? maybe_unserialize( $post_fields[$fkey][0] )
				: '';
		}

		wp_nonce_field( basename( __FILE__ ), $nonce_name );
		include_once( 'partials/' . $file_name );
	}

	public function export_json() {
		$settings = get_option( Campground_Search_Const::SETTINGS );
		$campgrounds = get_posts(
			array(
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'post_type' => Campground_Search_Const::POST_TYPE,
			)
		);
		$taxonomy_names = get_taxonomies(
			array(
				'object_type' => array( Campground_Search_Const::POST_TYPE ),
			),
			'names'
		);

		$output = array(
			'settings' => $settings,
			'campgrounds' => array_map(
				function ( $campground ) use ( $taxonomy_names ) {
					$output = array(
						'meta' => get_post_meta( $campground->ID ),
						'terms' => array_map(
							function ( $taxonomy ) use ( $campground ) {
								$terms = get_the_terms( $campground, $taxonomy );

								return array_map(
									function ( $term ) { return (array) $term; },
									$terms
								);
							},
							$taxonomy_names
						),
					);

					return array_merge( (array) $campground, $output );
				},
				$campgrounds
			),
			'taxonomies' => array_map(
				function ( $taxonomy ) {
					$terms = get_terms(
						array(
							'hide_empty' => false,
							'taxonomy' => $name,
						)
					);

					return array_map(
						function ( $term ) { return (array) $term; },
						$terms
					);
				},
				$taxonomy_names
			),
		);

		$json_options =
			JSON_PRETTY_PRINT |
			JSON_NUMERIC_CHECK |
			JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP |
			JSON_UNESCAPED_UNICODE;

		$json = json_encode( $output, $json_options );
	}

	public function meta_box_notices() {
		$errors = get_site_transient( self::SETTINGS_ERRORS );

		// if there are no errors, just exit
		if ( empty( $errors ) ) return;

		// display the list of errors that exist in the settings errors
		include_once( 'partials/' . $this->plugin_name . '-settings-errors.php' );

		// remove the transient and unhook any other notices so we don't see duplicate messages
		delete_transient( self::SETTINGS_ERRORS );
		remove_action( 'admin_notices', array( $this, __METHOD__ ) );
	}

    /**
     * Saves the Meta Boxes for the Post Type.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    integer   $post_id        The post ID.
     */
    public function save_meta_boxes( $post_id ) {
		// check the user's permissions
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		// return if doing an autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		foreach ( self::META_BOXES as $key => $val ) {
			$lkey = Campground_Search_Util::prefix_string( strtolower( $key ) );
			$nonce_key = $lkey . '_meta_box_nonce';

			// verify each meta box nonce
			if ( ! isset( $_POST[$nonce_key] )
				|| ! wp_verify_nonce( $_POST[$nonce_key], basename( __FILE__ ) )
			) {
				return;
			}

			// get the submitted custom fields' values
			$fields = ( isset( $_POST[$lkey] ) ) ? (array) $_POST[$lkey] : array();

			// return if no data
			if ( empty( $fields ) ) return;

			// account for unchecked checkbox(es)
			// if the key wasn't provided, set the value to null
			$diff = array_diff( array_keys( $val['fields'] ), array_keys( $fields ) );
			if ( ! empty( $diff ) ) {
				foreach ( $diff as $diff_key ) {
					update_post_meta(
						$post_id,
						'_' . $lkey . '_' . $diff_key,
						''
					);
				}
			}

			// validate the data
			$valid = $this->validate_meta_boxes( $key, $fields );

			if ( $valid === true ) {
				foreach ( $fields as $field_key => $field_val ) {
					$field_val = trim( Campground_Search_Util::sanitizeField( $field_val ) );
					update_post_meta(
						$post_id,
						'_' . $lkey . '_' . $field_key,
						empty( $field_val ) ? '' : $field_val
					);
				}
			}
		}
    }

    /**
     * Adds the Meta Box for the given key.
     *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $key            The meta box name.
	 * @param    array     $fields         The fields for the meta box.
	 * @param    string    $location       Optional. The meta box location. Default is "normal".
	 * @param    string    $priority       Optional. The meta box location. Default is "normal".
     */
    private function create_meta_box( $key, array $fields, $location = 'normal', $priority = 'default' ) {
		$lkey = strtolower( $key );
		$ukey = ucwords( $key );
		$field_keys = array_keys( $fields );
		$cb = function () use ( $lkey, $field_keys ) {
			$this->display_meta_box( $lkey, $field_keys );
		};

		add_meta_box(
			Campground_Search_Util::prefix_string( $lkey . '_meta_box' ),
			__( $ukey, Campground_Search_Const::TEXT_DOMAIN ),
			$cb,
			Campground_Search_Const::POST_TYPE,
			$location,
			$priority
		);
	}

	/**
	 * Registers the provided taxonomy with WP. Will create terms if provided.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $taxonomy       The taxonomy name.
	 * @param    array     $meta           Singular/plural text and terms.
	 */
	private function create_taxonomy( $taxonomy, array $meta ) {
		$lplural = strtolower( $meta['plural'] );

        $labels = array(
			'name' => _x( $meta['plural'], 'taxonomy general name', Campground_Search_Const::TEXT_DOMAIN ),
			'singular_name' => _x( $meta['singular'], 'taxonomy singular name', Campground_Search_Const::TEXT_DOMAIN ),
			'search_items' => __( 'Search ' . $meta['plural'], Campground_Search_Const::TEXT_DOMAIN ),
			'popular_items' => __( 'Popular ' . $meta['plural'], Campground_Search_Const::TEXT_DOMAIN ),
			'all_items' => __( 'All ' . $meta['plural'], Campground_Search_Const::TEXT_DOMAIN ),
			'parent_item' => null,
			'parent_item_colon' => __( 'Parent ' . $meta['singular'] . ':', Campground_Search_Const::TEXT_DOMAIN ),
			'edit_item' => __( 'Edit ' . $meta['singular'], Campground_Search_Const::TEXT_DOMAIN ),
			'update_item' => __( 'Update ' . $meta['singular'], Campground_Search_Const::TEXT_DOMAIN ),
			'add_new_item' => __( 'Add New ' . $meta['singular'], Campground_Search_Const::TEXT_DOMAIN ),
			'new_item_name' => __( 'New ' . $meta['singular'] . ' Name', Campground_Search_Const::TEXT_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate ' . $lplural . ' with commas', 'textdomain' ),
			'add_or_remove_items' => __( 'Add or remove ' . $lplural, 'textdomain' ),
			'choose_from_most_used' => __( 'Choose from the most used ' . $lplural . '', 'textdomain' ),
			'not_found' => __( 'No ' . $lplural . ' found.', 'textdomain' ),
			'menu_name' => __( $meta['plural'], Campground_Search_Const::TEXT_DOMAIN ),
        );

        $args = array(
			'labels' => $labels,
            'public' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
			'show_in_nav_menus' => true,
			// 'show_in_quick_edit' => false,
			// 'meta_box_cb' => array( $this, 'create_taxonomy_meta_boxes' ),
            'show_admin_column' => true,
            'hierarchical' => false,
            'has_archive' => false,
			'query_var' => true,
			'rewrite' => array(
				'slug' => $taxonomy,
				'with_front' => true,
			),
        );

        register_taxonomy( $taxonomy, array( Campground_Search_Const::POST_TYPE ), $args );
		register_taxonomy_for_object_type( $taxonomy, Campground_Search_Const::POST_TYPE );

		if ( is_array( $meta['terms'] ) ) {
			foreach ( $meta['terms'] as $key => $val ) {
				if ( ! term_exists( $val, $taxonomy ) ) {
					$term_id = wp_insert_term( $val, $taxonomy, array( 'slug' => $key ) );
				}
			}
		}
	}

	/**
	 * Validates the given fields.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    array     $fields         The fields to validate.
	 * @return   boolean
	 */
	private function validate_meta_boxes( $meta_key, array $fields ) {
		$valid = true;
		$meta_fields = self::META_BOXES[$meta_key]['fields'];

		foreach ( $fields as $key => $val ) {
			$value = trim( Campground_Search_Util::sanitizeField( $val ) );
			$meta_field = $meta_fields[$key];
			$meta_type = $meta_field['type'];
			$meta_func = $meta_field['func'];

			// required and empty is invalid
			if ( $meta_field['required'] && empty( $value ) ) {
				$this->create_settings_error( $key, $meta_field );
				$valid = false;
				continue;
			}

			// if it's empty just return
			if ( empty( $value ) ) continue;

			if ( is_callable( $meta_func ) ) {
				$retval = $meta_func( $value );
				if ( $retval === false ) {
					$this->create_settings_error( $key, $meta_field );
					$valid = false;
				}
				continue;
			}

			if ( is_string( $meta_type ) ) {
				switch ( strtolower( $meta_type ) ) {
					case 'date':
						$date = date_parse( $value );
						if ( $date['month'] === false || $date['day'] === false ) {
							$this->create_settings_error( $key, $meta_field );
							$valid = false;
						}
						break;
					case 'numeric':
						if ( ! is_numeric( $value ) ) {
							$this->create_settings_error( $key, $meta_field );
							$valid = false;
						}
						break;
				}
			}
		}

		return $valid;
	}

	/**
	 * Creates an error with the Settings API.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $key           The field key.
	 * @param    array     $field         The field to report the error for.
	 */
	private function create_settings_error( $key, array $field ) {
		// $key = Campground_Search_Util::prefix_string( $field );
		$message = empty( $field['message'] )
			? __( 'Error processing the field: ' . $key, Campground_Search_Const::TEXT_DOMAIN )
			: __( $field['message'], Campground_Search_Const::TEXT_DOMAIN );
		add_settings_error( $key, $key, $message );
		set_site_transient( self::SETTINGS_ERRORS, get_settings_errors(), 30 );
	}

}
