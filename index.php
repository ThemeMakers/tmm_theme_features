<?php

/*
 * Plugin Name: ThemeMakers Accio Features
 * Plugin URI: http://webtemplatemasters.com
 * Description: Advanced Features for Accio Theme
 * Author: ThemeMakers
 * Version: 1.0.0
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
*/

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

/*
 * Register Folio, Clients and Skills Taxonomies and Folio Post Type
 */

if (! class_exists('TMM_Portfolio')) {

	class TMM_Portfolio {

		public static $slug = 'folio';

		public static function init() {

			$labels = array(
				'name' => esc_html__('Portfolios', 'accio'),
				'singular_name' => esc_html__('Portfolio', 'accio'),
				'add_new' => esc_html__('Add New', 'accio'),
				'add_new_item' => esc_html__('Add New Portfolio', 'accio'),
				'edit_item' => esc_html__('Edit Portfolio', 'accio'),
				'new_item' => esc_html__('New Portfolio', 'accio'),
				'view_item' => esc_html__('View Portfolio', 'accio'),
				'search_items' => esc_html__('Search Portfolios', 'accio'),
				'not_found' => esc_html__('No Portfolios found', 'accio'),
				'not_found_in_trash' => esc_html__('No Portfolios found in Trash', 'accio'),
				'parent_item_colon' => ''
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'tags', 'comments'),
				'rewrite' => array('slug' => self::$slug),
				'show_in_admin_bar' => true,
				'taxonomies' => array('clients', 'skills', 'post_tag'), // this is IMPORTANT
				'menu_icon' => 'dashicons-portfolio'
			);

			register_taxonomy("clients", array(self::$slug), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => esc_html__('Clients', 'accio'),
					'singular_name' => esc_html__('Client', 'accio'),
					'add_new' => esc_html__('Add New', 'accio'),
					'add_new_item' => esc_html__('Add New Client', 'accio'),
					'edit_item' => esc_html__('Edit Client', 'accio'),
					'new_item' => esc_html__('New Client', 'accio'),
					'view_item' => esc_html__('View Client', 'accio'),
					'search_items' => esc_html__('Search Clients', 'accio'),
					'not_found' => esc_html__('No Clients found', 'accio'),
					'not_found_in_trash' => esc_html__('No Clients found in Trash', 'accio'),
					'parent_item_colon' => ''
				),
				"singular_label" => esc_html__("client", 'accio'),
				"rewrite" => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));

			register_taxonomy("skills", array(self::$slug), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => esc_html__('Skills', 'accio'),
					'singular_name' => esc_html__('Skill', 'accio'),
					'add_new' => esc_html__('Add New', 'accio'),
					'add_new_item' => esc_html__('Add New Skill', 'accio'),
					'edit_item' => esc_html__('Edit Skill', 'accio'),
					'new_item' => esc_html__('New Skill', 'accio'),
					'view_item' => esc_html__('View Skill', 'accio'),
					'search_items' => esc_html__('Search Skills', 'accio'),
					'not_found' => esc_html__('No Skills found', 'accio'),
					'not_found_in_trash' => esc_html__('No Skills found in Trash', 'accio'),
					'parent_item_colon' => ''
				),
				"singular_label" => esc_html__("skill", 'accio'),
				"show_tagcloud" => true,
				'query_var' => true,
				'rewrite' => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));

			register_taxonomy("folio_category", array(self::$slug), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => esc_html__('Categories', 'accio'),
					'singular_name' => esc_html__('Category', 'accio'),
					'add_new' => esc_html__('Add New', 'accio'),
					'add_new_item' => esc_html__('Add New Category', 'accio'),
					'edit_item' => esc_html__('Edit Category', 'accio'),
					'new_item' => esc_html__('New Category', 'accio'),
					'view_item' => esc_html__('View Category', 'accio'),
					'search_items' => esc_html__('Search Categories', 'accio'),
					'not_found' => esc_html__('No Categories found', 'accio'),
					'not_found_in_trash' => esc_html__('No Categories found in Trash', 'accio'),
					'parent_item_colon' => ''
				),
				"singular_label" => esc_html__("category", 'accio'),
				"show_tagcloud" => true,
				'query_var' => true,
				'rewrite' => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));


			register_post_type(self::$slug, $args);
			flush_rewrite_rules(false);

			add_filter("manage_folio_posts_columns", array(__CLASS__, "show_edit_columns"));
			add_action("manage_folio_posts_custom_column", array(__CLASS__, "show_edit_columns_content"));

			//ajax
			add_action('wp_ajax_add_gallery_folio_item', array(__CLASS__, 'add_gallery_item'));
//		add_action('wp_ajax_folio_get_masonry_piece', array(__CLASS__, 'get_masonry_piece'));
//		add_action('wp_ajax_nopriv_folio_get_masonry_piece', array(__CLASS__, 'get_masonry_piece'));
		}

		public static function admin_init() {
			self::init_meta_boxes();
		}

		public static function credits_meta() {
			global $post;
			$data = array();
			$custom = get_post_custom($post->ID);
			$data['portfolio_date'] = @$custom["portfolio_date"][0];
			$data['portfolio_url'] = @$custom["portfolio_url"][0];
			$data['portfolio_url_title'] = @$custom["portfolio_url_title"][0];
			$data['portfolio_client'] = @$custom["portfolio_client"][0];
			$data['portfolio_tools'] = @$custom["portfolio_tools"][0];
			$data['portfolio_clients'] = @$custom["portfolio_clients"][0];
			$data['single_page_layout'] = @$custom["single_page_layout"][0];
			$data['tmm_portfolio'] = unserialize(@$custom["tmm_portfolio"][0]);
			echo TMM::draw_html('portfolio/credits_meta', $data);
		}

		public static function save_post() {
			global $post;
			if (is_object($post)) {
				if (isset($_POST) AND !empty($_POST) AND $post->post_type == self::$slug) {
					update_post_meta($post->ID, "meta_title", @$_POST["meta_title"]);
					update_post_meta($post->ID, "meta_keywords", @$_POST["meta_keywords"]);
					update_post_meta($post->ID, "meta_description", @$_POST["meta_description"]);

					update_post_meta($post->ID, "portfolio_timeout", @$_POST["portfolio_timeout"]);
					update_post_meta($post->ID, "portfolio_url", @$_POST["portfolio_url"]);
					update_post_meta($post->ID, "portfolio_date", @$_POST["portfolio_date"]);
					update_post_meta($post->ID, "portfolio_url_title", @$_POST["portfolio_url_title"]);
					update_post_meta($post->ID, "portfolio_client", @$_POST["portfolio_client"]);
					update_post_meta($post->ID, "portfolio_tools", @$_POST["portfolio_tools"]);
					update_post_meta($post->ID, "thememakers_portfolio", @$_POST["tmm_portfolio"]);
					update_post_meta($post->ID, "portfolio_clients", @$_POST["portfolio_clients"]);
					update_post_meta($post->ID, "single_page_layout", @$_POST["single_page_layout"]);
					update_post_meta($post->ID, "featured_video", $_POST["featured_video"]);
				}
			}
		}

		public static function init_meta_boxes() {
			add_meta_box("credits_meta", esc_html__("Portfolio attributes", 'accio'), array(__CLASS__, 'credits_meta'), self::$slug, "normal", "low");
			add_meta_box("folio_gallery_meta", esc_html__("Folio images", 'accio'), array(__CLASS__, 'gallery_meta'), self::$slug, "normal", "low");
			add_meta_box("folio_single_tpl", esc_html__("Single page layout", 'accio'), array(__CLASS__, 'single_tpl_meta'), self::$slug, "side", "low");
			add_meta_box("folio_featured_video", esc_html__("Featured Video", 'accio'), array(__CLASS__, 'featured_video_meta_box_callback'), self::$slug, "side", "low");
			add_meta_box("seo_options", esc_html__("Seo options", 'accio'), array('TMM_Page', 'page_seo_options'), self::$slug, "normal", "low");
		}

		public static function gallery_meta() {
			global $post;
			$data = array();
			$data['tmm_portfolio'] = get_post_meta($post->ID, 'thememakers_portfolio', true);
			$data['portfolio_timeout'] = get_post_meta($post->ID, 'portfolio_timeout', true);

			if (!$data['portfolio_timeout']) {
				$data['portfolio_timeout'] = '';
			}
			echo TMM::draw_html('portfolio/gallery_meta', $data);
		}

		public static function render_gallery_item($data) {
			echo TMM::draw_html('portfolio/render_gallery_item', $data);
		}

		public static function single_tpl_meta() {
			global $post;
			$single_page_layout = get_post_meta($post->ID, 'single_page_layout', TRUE);
			if (empty($single_page_layout)) {
				$single_page_layout = 1;
			}
			?>
			<select name="single_page_layout">
				<option <?php echo($single_page_layout == 1 ? 'selected' : '') ?> value="1"><?php esc_html_e("Default", 'accio') ?></option>
				<option <?php echo($single_page_layout == 2 ? 'selected' : '') ?> value="2"><?php esc_html_e("Full Width", 'accio') ?></option>
				<option <?php echo($single_page_layout == 3 ? 'selected' : '') ?> value="3"><?php esc_html_e("Alternate", 'accio') ?></option>
			</select>
			<?php
		}

		public static function featured_video_meta_box_callback() {
			global $post;

			$featured_video_value = get_post_meta( $post->ID, 'featured_video', true );

			echo '<input type="url" style="width:100%" id="featured_video" name="featured_video" value="' . esc_attr( $featured_video_value ) . '" />';
			echo '<p>' . esc_html__("YouTube and Vimeo are supported.", 'accio') . '</p>';
			echo '<p class="howto">' . esc_html__("When url is given, video will appear in lightbox only. Button to detailed page will be hidden.", 'accio') . '</p>';

		}

		//for ajax
		public static function add_gallery_item() {
			$data = array();
			$data['imgurl'] = $_REQUEST['imgurl'];
			echo TMM::draw_html('portfolio/render_gallery_item', $data);
			exit;
		}

		public static function show_edit_columns_content($column) {
			global $post;

			switch ($column) {
				case "image":
					echo '<img alt="" src="' . TMM_Helper::get_post_featured_image($post->ID, '200*200') . '"/>';
					break;
				case "description":
					the_excerpt();
					break;
				case "tags":
					echo get_the_tag_list('', '', '', $post->ID);
					break;
				case "clients":
					echo get_the_term_list($post->ID, 'clients', '', ', ', '');
					break;
				case "skills":
					echo get_the_term_list($post->ID, 'skills', '', ', ', '');
					break;
			}
		}

		public static function show_edit_columns($columns) {
			$columns = array(
				"cb" => "<input type=\"checkbox\" />",
				"title" => esc_html__("Title", 'accio'),
				"image" => esc_html__("Cover", 'accio'),
				"description" => esc_html__("Description", 'accio'),
				"tags" => esc_html__("Tags", 'accio'),
				"clients" => esc_html__("Clients", 'accio'),
				"skills" => esc_html__("Skills", 'accio'),
			);

			return $columns;
		}

		//ajax
		public static function get_masonry_piece() {
			$post_key = (int) $_REQUEST['post_key'];
			$posts = $_REQUEST['posts'];
			if (!isset($posts[$post_key])) {
				echo "";
				exit;
			} else {
				$data = array();
				$data['folioposts'] = $posts;
				$data['foliopost_key'] = $post_key;
				$data['foliopost'] = $posts[$post_key];
				$data['current_col_algoritm'] = $_REQUEST['current_col_algoritm'];
				$data['type'] = $_REQUEST['type'];
				$data['columns'] = $_REQUEST['columns'];
				echo TMM::draw_html('portfolio/shortcodes/masonry_piece', $data);
			}

			exit;
		}

	}

}

add_action( 'plugins_loaded', array('TMM_Theme_Features', 'load_plugin_textdomain') );

add_action( 'init', array('TMM_Theme_Features', 'get_instance') );

register_activation_hook( __FILE__, array('TMM_Theme_Features', 'flush_rewrite_rules') );
