<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class TMM_Testimonials {

	public static $slug = 'tmonials';

	public static function init() {

		$args = array(
			'labels' => array(
				'name' => esc_html__('Testimonials', 'accio'),
				'singular_name' => esc_html__('Testimonials', 'accio'),
				'add_new' => esc_html__('Add New', 'accio'),
				'add_new_item' => esc_html__('Add New Testimonial', 'accio'),
				'edit_item' => esc_html__('Edit Testimonial', 'accio'),
				'new_item' => esc_html__('New Testimonial', 'accio'),
				'view_item' => esc_html__('View Testimonial', 'accio'),
				'search_items' => esc_html__('Search Testimonials', 'accio'),
				'not_found' => esc_html__('No Testimonials found', 'accio'),
				'not_found_in_trash' => esc_html__('No Testimonials found in Trash', 'accio'),
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
			'rewrite' => array('slug' => self::$slug),
			'show_in_admin_bar' => true,
			'menu_icon' => 'dashicons-edit'
		);
		register_post_type(self::$slug, $args);
		flush_rewrite_rules(false);
	}

	public static function save_post() {
		global $post;
		if (is_object($post)) {
			if (isset($_POST) AND !empty($_POST) AND $post->post_type == self::$slug) {
				update_post_meta($post->ID, "position", @$_POST["position"]);
			}
		}
	}

	public static function admin_init() {
		self::init_meta_boxes();
	}

	public static function init_meta_boxes() {
		add_meta_box("testimonials_credits_meta", esc_html__("Position", 'accio'), array(__CLASS__, 'testimonials_credits_meta'), self::$slug, "normal", "low");
	}

	public static function testimonials_credits_meta() {
		global $post;
		$data = array();
		$custom = get_post_custom($post->ID);
		$data['position'] = @$custom["position"][0];
		echo TMM::draw_html('testimonials/credits_meta', $data);
	}

}
