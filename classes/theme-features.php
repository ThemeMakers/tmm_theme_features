<?php if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

if (! class_exists('TMM_Theme_Features')) {
	class TMM_Theme_Features {


		protected static $instance = null;

		private function __construct() {

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