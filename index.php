<?php

/*
 * Plugin Name: ThemeMakers Diplomat Features
 * Plugin URI: http://webtemplatemasters.com
 * Description: Advanced Features for Diplomat Theme
 * Author: ThemeMakers
 * Version: 1.0.0
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
*/

class TMM_Theme_Features {

	
	protected static $instance = null;
	
	protected $slug = 'tmm_theme_features';

	private function __construct() {
		
		$this->load_plugin_textdomain();

		/*
		 * Register Slidergroup Post Type
		 */
		
		if (class_exists('TMM_Slider')) {
			
			$cpt_name = isset(TMM_Slider::$slug) ? TMM_Slider::$slug : 'slidergroup';

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Theme Slider', $this->slug),
					'singular_name' => __('Group', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Slider Group', $this->slug),
					'edit_item' => __('Edit Slider Group', $this->slug),
					'new_item' => __('New Slider Group', $this->slug),
					'view_item' => __('View Slider Group', $this->slug),
					'search_items' => __('Search Slider Groups', $this->slug),
					'not_found' => __('No Slide Groups found', $this->slug),
					'not_found_in_trash' => __('No Slide Groups found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'public' => false,
				'archive' => false,
				'exclude_from_search' => false,
				'publicly_queryable' => false,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => false,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title', 'thumbnail'),
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => false,
				'menu_icon' => 'dashicons-images-alt2',
				'taxonomies' => array()
			));
		
		}

		/*
		 * Register Position Taxonomy and Staff Post Type
		 */
		
		if (class_exists('TMM_Staff')) {
		
			$cpt_name = isset(TMM_Staff::$slug) ? TMM_Staff::$slug : 'staff-page';

			register_taxonomy("position", array($cpt_name), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => __('Position', $this->slug),
					'singular_name' => __('Position', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Position', $this->slug),
					'edit_item' => __('Edit Position', $this->slug),
					'new_item' => __('New Position', $this->slug),
					'view_item' => __('View Position', $this->slug),
					'search_items' => __('Search GPosition', $this->slug),
					'not_found' => __('No Position found', $this->slug),
					'not_found_in_trash' => __('No Position found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				"singular_label" => __("Position", $this->slug),
				"rewrite" => true,
				'show_in_nav_menus' => false,
			));

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Staff', $this->slug),
					'singular_name' => __('Staff', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Staff', $this->slug),
					'edit_item' => __('Edit Staff', $this->slug),
					'new_item' => __('New Staff', $this->slug),
					'view_item' => __('View Staff', $this->slug),
					'search_items' => __('Search In Staff', $this->slug),
					'not_found' => __('Nothing found', $this->slug),
					'not_found_in_trash' => __('Nothing found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'public' => false,
				'archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title', 'thumbnail', 'excerpt'),
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => true,
				'taxonomies' => array('position'), // this is IMPORTANT
				'menu_icon' => 'dashicons-businessman'
			));
		
		}
		
		/*
		 * Register Testimonials Taxonomy and Testimonial Post Type
		 */
		
		if (class_exists('TMM_Testimonial')) {
			
			$cpt_name = isset(TMM_Testimonial::$slug) ? TMM_Testimonial::$slug : 'tmonials';

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Testimonials', $this->slug),
					'singular_name' => __('Testimonial', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Testimonial', $this->slug),
					'edit_item' => __('Edit Testimonial', $this->slug),
					'new_item' => __('New Testimonial', $this->slug),
					'view_item' => __('View Testimonial', $this->slug),
					'search_items' => __('Search Testimonials', $this->slug),
					'not_found' => __('No Testimonials found', $this->slug),
					'not_found_in_trash' => __('No Testimonials found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'public' => false,
				'exclude_from_search' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'thumbnail'),
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => true,
				'menu_icon' => 'dashicons-edit'
			));
		
		}
        
        /*
		 * Register Subscriber Post Type
		 */
        
		if (class_exists('TMM_Mail_Subscription')) {
			
			$cpt_name = isset(TMM_Mail_Subscription::$slug) ? TMM_Mail_Subscription::$slug : 'email_subscriber';

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Subscribers', $this->slug),
					'singular_name' => __('Subscriber', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Subscriber', $this->slug),
					'edit_item' => __('Edit Subscriber', $this->slug),
					'new_item' => __('New Subscriber', $this->slug),
					'view_item' => __('View Subscriber', $this->slug),
					'search_items' => __('Search Subscriber', $this->slug),
					'not_found' => __('No Subscribers found', $this->slug),
					'not_found_in_trash' => __('No Subscribers found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'public' => false,
				'exclude_from_search' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title'),
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => true,
				'menu_icon' => 'dashicons-email'
			));
		
		}
		
		/*
		 * Register Gallery Taxonomy and Gallery Post Type
		 */
		
		if (class_exists('TMM_Gallery')) {
			
			$cpt_name = isset(TMM_Gallery::$slug) ? TMM_Gallery::$slug : 'gall';

			register_taxonomy("gallery-category", array($cpt_name), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => __('Gallery Categories', $this->slug),
					'singular_name' => __('Gallery Category', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Gallery Category', $this->slug),
					'edit_item' => __('Edit Gallery Category', $this->slug),
					'new_item' => __('New Gallery Category', $this->slug),
					'view_item' => __('View Gallery Category', $this->slug),
					'search_items' => __('Search Gallery Categories', $this->slug),
					'not_found' => __('No Gallery Categories found', $this->slug),
					'not_found_in_trash' => __('No Gallery Categories found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'page',
				'has_archive' => true,
				'hierarchical' => true,
				'show_in_admin_bar' => true,
				"rewrite" => true,
				'show_in_nav_menus' => false,
			));

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Galleries', $this->slug),
					'singular_name' => __('Gallery', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Gallery', $this->slug),
					'edit_item' => __('Edit Gallery', $this->slug),
					'new_item' => __('New Gallery', $this->slug),
					'view_item' => __('View Gallery', $this->slug),
					'search_items' => __('Search Gallery', $this->slug),
					'not_found' => __('No Galleries found', $this->slug),
					'not_found_in_trash' => __('No Galleries found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				'public' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => null,
				'supports' => array('title', 'thumbnail'),
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => true,
				'menu_icon' => 'dashicons-format-gallery'
			));
		
		}
		
		/*
		 * Register Folio, Clients and Skills Taxonomies and Folio Post Type
		 */
		
		if (class_exists('TMM_Portfolio')) {
		
			$cpt_name = isset(TMM_Portfolio::$slug) ? TMM_Portfolio::$slug : 'folio';

			register_taxonomy("clients", array($cpt_name), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => __('Clients', $this->slug),
					'singular_name' => __('Client', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Client', $this->slug),
					'edit_item' => __('Edit Client', $this->slug),
					'new_item' => __('New Client', $this->slug),
					'view_item' => __('View Client', $this->slug),
					'search_items' => __('Search Clients', $this->slug),
					'not_found' => __('No Clients found', $this->slug),
					'not_found_in_trash' => __('No Clients found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				"rewrite" => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));

			register_taxonomy("skills", array($cpt_name), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => __('Skills', $this->slug),
					'singular_name' => __('Skill', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Skill', $this->slug),
					'edit_item' => __('Edit Skill', $this->slug),
					'new_item' => __('New Skill', $this->slug),
					'view_item' => __('View Skill', $this->slug),
					'search_items' => __('Search Skills', $this->slug),
					'not_found' => __('No Skills found', $this->slug),
					'not_found_in_trash' => __('No Skills found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				"show_tagcloud" => true,
				'query_var' => true,
				'rewrite' => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));

			register_taxonomy("folio-category", array($cpt_name), array(
				"hierarchical" => true,
				"labels" => array(
					'name' => __('Categories', $this->slug),
					'singular_name' => __('Category', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Category', $this->slug),
					'edit_item' => __('Edit Category', $this->slug),
					'new_item' => __('New Category', $this->slug),
					'view_item' => __('View Category', $this->slug),
					'search_items' => __('Search Categories', $this->slug),
					'not_found' => __('No Categories found', $this->slug),
					'not_found_in_trash' => __('No Categories found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
				"show_tagcloud" => true,
				'query_var' => true,
				'rewrite' => true,
				'show_in_nav_menus' => false,
				'capabilities' => array('manage_terms'),
				'show_ui' => true
			));

			register_post_type($cpt_name, array(
				'labels' => array(
					'name' => __('Portfolios', $this->slug),
					'singular_name' => __('Portfolio', $this->slug),
					'add_new' => __('Add New', $this->slug),
					'add_new_item' => __('Add New Portfolio', $this->slug),
					'edit_item' => __('Edit Portfolio', $this->slug),
					'new_item' => __('New Portfolio', $this->slug),
					'view_item' => __('View Portfolio', $this->slug),
					'search_items' => __('Search Portfolios', $this->slug),
					'not_found' => __('No Portfolios found', $this->slug),
					'not_found_in_trash' => __('No Portfolios found in Trash', $this->slug),
					'parent_item_colon' => ''
				),
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
				'rewrite' => array('slug' => $cpt_name),
				'show_in_admin_bar' => true,                        
				'show_in_menu' => true,
				'taxonomies' => array('clients', 'skills', 'post_tag'), // this is IMPORTANT
				'menu_icon' => 'dashicons-portfolio'
			));
		
		}

	}

	public function flush_rewrite_rules() {

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
	
	public function load_plugin_textdomain() {

		load_plugin_textdomain( $this->slug, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}

add_action( 'init', array('TMM_Theme_Features', 'get_instance') );

register_activation_hook( __FILE__, array('TMM_Theme_Features', 'flush_rewrite_rules') );

?>