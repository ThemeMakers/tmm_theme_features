<?php if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

if (! class_exists('TMM_Theme_Features')) {
	class TMM_Theme_Features {


		protected static $instance = null;

		private function __construct() {

			/* Register custom post types and taxonomies */
			$this->register_post_types();

			/* Add elements to <head> section (tracking code) */
			$this->add_wp_head_elements();
		}

		private function add_wp_head_elements() {

			if (class_exists('TMM')) {
				add_action('wp_head', array(__CLASS__, 'add_tracking_code'), PHP_INT_MAX);
				add_filter('tmm_add_general_theme_option', array(__CLASS__, 'add_tracking_code_option'));
			}

		}

		public static function add_tracking_code_option($options) {

			if (is_array($options)) {
				$options['tracking_code'] = array(
					'title' => __('Tracking Code', 'tmm_theme_features'),
					'type' => 'textarea',
					'default_value' => '',
					'description' => __('Place here your Google Analytics (or other) tracking code. It will be inserted before closing head tag in your theme.', 'tmm_theme_features'),
					'custom_html' => ''
				);
			}

			return $options;
		}

		public static function add_tracking_code() {
			echo TMM::get_option("tracking_code");
		}

		private function register_post_types() {

//		/*
//		 * Register Slidergroup Post Type
//		 */
//
//		if (class_exists('TMM_Slider')) {
//
//			$cpt_name = isset(TMM_Slider::$slug) ? TMM_Slider::$slug : 'slidergroup';
//
//			register_post_type($cpt_name, array(
//				'labels' => array(
//					'name' => esc_html__('Theme Slider', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Group', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Slider Group', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Slider Group', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Slider Group', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Slider Group', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search Slider Groups', 'tmm_theme_features'),
//					'not_found' => esc_html__('No Slide Groups found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('No Slide Groups found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				'public' => false,
//				'archive' => false,
//				'exclude_from_search' => false,
//				'publicly_queryable' => false,
//				'show_ui' => true,
//				'query_var' => true,
//				'capability_type' => 'post',
//				'has_archive' => false,
//				'hierarchical' => true,
//				'menu_position' => null,
//				'supports' => array('title', 'thumbnail'),
//				'rewrite' => array('slug' => $cpt_name),
//				'show_in_admin_bar' => false,
//				'menu_icon' => 'dashicons-images-alt2',
//				'taxonomies' => array()
//			));
//
//		}
//
//		/*
//		 * Register Position Taxonomy and Team (staff) Post Type
//		 */
//
//		if (class_exists('TMM_Staff')) {
//
//			$cpt_name = isset(TMM_Staff::$slug) ? TMM_Staff::$slug : 'team-page';
//
//			register_taxonomy("position", array($cpt_name), array(
//				"hierarchical" => true,
//				"labels" => array(
//					'name' => esc_html__('Position', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Position', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Position', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Position', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Position', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Position', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search GPosition', 'tmm_theme_features'),
//					'not_found' => esc_html__('No Position found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('No Position found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				"singular_label" => esc_html__("Position", 'tmm_theme_features'),
//				"rewrite" => true,
//				'show_in_nav_menus' => false,
//			));
//
//			register_post_type($cpt_name, array(
//				'labels' => array(
//					'name' => esc_html__('Team', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Team', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Team Member', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Team Member', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Team Member', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Team Member', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search In Team', 'tmm_theme_features'),
//					'not_found' => esc_html__('Nothing found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				'public' => false,
//				'archive' => true,
//				'exclude_from_search' => false,
//				'publicly_queryable' => true,
//				'show_ui' => true,
//				'query_var' => true,
//				'capability_type' => 'post',
//				'has_archive' => true,
//				'hierarchical' => true,
//				'menu_position' => null,
//				'supports' => array('title', 'thumbnail', 'excerpt'),
//				'rewrite' => array('slug' => $cpt_name),
//				'show_in_admin_bar' => true,
//				'taxonomies' => array('position'), // this is IMPORTANT
//				'menu_icon' => 'dashicons-businessman'
//			));
//
//		}
//
//		/*
//		 * Register Testimonials Taxonomy and Testimonial Post Type
//		 */
//
//		if (class_exists('TMM_Testimonial')) {
//
//			$cpt_name = isset(TMM_Testimonial::$slug) ? TMM_Testimonial::$slug : 'tmonials';
//
//			register_post_type($cpt_name, array(
//				'labels' => array(
//					'name' => esc_html__('Testimonials', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Testimonial', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Testimonial', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Testimonial', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Testimonial', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Testimonial', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search Testimonials', 'tmm_theme_features'),
//					'not_found' => esc_html__('No Testimonials found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('No Testimonials found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				'public' => false,
//				'exclude_from_search' => true,
//				'publicly_queryable' => true,
//				'show_ui' => true,
//				'query_var' => true,
//				'capability_type' => 'post',
//				'has_archive' => true,
//				'hierarchical' => true,
//				'menu_position' => null,
//				'supports' => array('title', 'editor', 'thumbnail'),
//				'rewrite' => array('slug' => $cpt_name),
//				'show_in_admin_bar' => true,
//				'menu_icon' => 'dashicons-edit'
//			));
//
//		}
//
//		/*
//		 * Register Gallery Taxonomy and Gallery Post Type
//		 */
//
//		if (class_exists('TMM_Gallery')) {
//
//			$cpt_name = isset(TMM_Gallery::$slug) ? TMM_Gallery::$slug : 'gall';
//
//			register_taxonomy("gallery-category", array($cpt_name), array(
//				"hierarchical" => true,
//				"labels" => array(
//					'name' => esc_html__('Gallery Categories', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Gallery Category', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Gallery Category', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Gallery Category', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Gallery Category', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Gallery Category', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search Gallery Categories', 'tmm_theme_features'),
//					'not_found' => esc_html__('No Gallery Categories found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('No Gallery Categories found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				'show_ui' => true,
//				'query_var' => true,
//				'capability_type' => 'page',
//				'has_archive' => true,
//				'hierarchical' => true,
//				'show_in_admin_bar' => true,
//				"rewrite" => true,
//				'show_in_nav_menus' => false,
//			));
//
//			register_post_type($cpt_name, array(
//				'labels' => array(
//					'name' => esc_html__('Galleries', 'tmm_theme_features'),
//					'singular_name' => esc_html__('Gallery', 'tmm_theme_features'),
//					'add_new' => esc_html__('Add New', 'tmm_theme_features'),
//					'add_new_item' => esc_html__('Add New Gallery', 'tmm_theme_features'),
//					'edit_item' => esc_html__('Edit Gallery', 'tmm_theme_features'),
//					'new_item' => esc_html__('New Gallery', 'tmm_theme_features'),
//					'view_item' => esc_html__('View Gallery', 'tmm_theme_features'),
//					'search_items' => esc_html__('Search Gallery', 'tmm_theme_features'),
//					'not_found' => esc_html__('No Galleries found', 'tmm_theme_features'),
//					'not_found_in_trash' => esc_html__('No Galleries found in Trash', 'tmm_theme_features'),
//					'parent_item_colon' => ''
//				),
//				'public' => true,
//				'exclude_from_search' => false,
//				'publicly_queryable' => true,
//				'show_ui' => true,
//				'query_var' => true,
//				'capability_type' => 'post',
//				'has_archive' => true,
//				'hierarchical' => true,
//				'menu_position' => null,
//				'supports' => array('title', 'thumbnail'),
//				'rewrite' => array('slug' => $cpt_name),
//				'show_in_admin_bar' => true,
//				'menu_icon' => 'dashicons-format-gallery'
//			));
//
//		}

		}

		public static function flush_rewrite_rules() {

			self::get_instance();
			flush_rewrite_rules();
		}

		private function __clone() {

		}

		public static function get_instance() {

			if ( self::$instance === null) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public static function load_plugin_textdomain() {

			load_plugin_textdomain( 'tmm_theme_features', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}
	}

	add_action( 'plugins_loaded', array('TMM_Theme_Features', 'load_plugin_textdomain') );

	add_action( 'init', array('TMM_Theme_Features', 'get_instance') );

	register_activation_hook( __FILE__, array('TMM_Theme_Features', 'flush_rewrite_rules') );
}