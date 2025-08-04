<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_Page
{

	public static $post_pod_types = array();

	public static function init()
	{

		self::$post_pod_types = array(
			'default' => esc_html__("Default", 'accio'),
			'video' => esc_html__("Video", 'accio'),
			'quote' => esc_html__("Quote", 'accio'),
			'gallery' => esc_html__("Gallery", 'accio'),
		);

		//ajax
		add_action('wp_ajax_add_post_podtype_gallery_image', array(__CLASS__, 'add_post_podtype_gallery_image'));

		add_filter("manage_page_posts_columns", array(__CLASS__, "show_edit_columns"));
		add_action("manage_page_posts_custom_column", array(__CLASS__, "show_edit_columns_content"));

		add_action('save_post', array(__CLASS__, 'save_post'));
	}

	public static function admin_init()
	{
		self::init_meta_boxes();
	}

	public static function save_post()
	{
		global $post;

		if (!isset($_POST['tmm_nonce']) || !wp_verify_nonce($_POST['tmm_nonce'], 'tmm_save_meta')) {
			return;
		}

		if (!current_user_can('edit_post', $post->ID)) {
			return;
		}

		if (is_object($post)) {
			if (isset($_POST) and !empty($_POST)) {
				// update_post_meta($post->ID, "meta_title", sanitize_text_field($_POST["meta_title"] ?? ''));
				// update_post_meta($post->ID, "meta_keywords", sanitize_text_field($_POST["meta_keywords"] ?? ''));
				// update_post_meta($post->ID, "meta_description", sanitize_text_field($_POST["meta_description"] ?? ''));

				if ($post->post_type == 'post') {
					update_post_meta($post->ID, "post_pod_type", sanitize_text_field($_POST["post_pod_type"] ?? ''));
					update_post_meta($post->ID, "post_type_values", sanitize_text_field($_POST["post_type_values"] ?? ''));
				}

				if ($post->post_type == 'post' or $post->post_type == 'page') {
					update_post_meta($post->ID, "another_page_title", sanitize_text_field($_POST["another_page_title"] ?? ''));
					update_post_meta($post->ID, "another_page_description", sanitize_text_field($_POST["another_page_description"] ?? ''));
					update_post_meta($post->ID, "show_page_title", sanitize_text_field($_POST["show_page_title"] ?? ''));

					update_post_meta($post->ID, "pagebg_type", sanitize_text_field($_POST["pagebg_type"] ?? ''));
					update_post_meta($post->ID, "pagebg_color", sanitize_text_field($_POST["pagebg_color"] ?? ''));
					update_post_meta($post->ID, "pagebg_image", sanitize_text_field($_POST["pagebg_image"] ?? ''));
					update_post_meta($post->ID, "pagebg_type_image_option", sanitize_text_field($_POST["pagebg_type_image_option"] ?? ''));
					// update_post_meta($post->ID, "headerbg_type", sanitize_text_field($_POST["headerbg_type"] ?? ''));

					update_post_meta($post->ID, "page_sidebar_position", sanitize_text_field($_POST["page_sidebar_position"] ?? ''));
				}
			}
		}
	}

	public static function show_edit_columns_content($column)
	{
		global $post;

		switch ($column) {
			case "is_onepage":
				$is_onepage = get_post_meta($post->ID, 'onepage', true);
				if ($is_onepage) {
					echo '<span>yes</span>';
				}
				break;
		}
	}

	public static function show_edit_columns($columns)
	{
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => esc_html__("Title", 'accio'),
			"is_onepage" => esc_html__("Onepage", 'accio'),
			"date" => esc_html__("Date", 'accio'),
			"author" => esc_html__("Author", 'accio')
		);

		return $columns;
	}


	public static function init_meta_boxes()
	{
		add_meta_box("post_types", esc_html__("Post Type", 'accio'), array(__CLASS__, 'post_type_meta_box'), "post", "side", "low");
		add_meta_box("post_types_data", esc_html__("Post Type Data", 'accio'), array(__CLASS__, 'post_type_meta_panel'), "post", "normal");

		add_meta_box("tmm_page_bg", esc_html__("Custom Page Options", 'accio'), array(__CLASS__, 'page_background_options'), "post", "side", "low");
		add_meta_box("tmm_page_bg", esc_html__("Custom Page Options", 'accio'), array(__CLASS__, 'page_background_options'), "page", "side", "low");
	}

	public static function page_background_options()
	{
		global $post;
		echo TMM::draw_html('page/background_options', self::get_page_settings($post->ID));
	}

	public static function get_page_settings($post_id)
	{

		$custom = get_post_custom($post_id);

		$data = array();

		if (!empty($custom["another_page_title"][0])) {
			$data['another_page_title'] = $custom["another_page_title"][0];
		}
		if (!empty($custom["another_page_description"][0])) {
			$data['another_page_description'] = $custom["another_page_description"][0];
		}
		if (!empty($custom["show_page_title"][0])) {
			$data['show_page_title'] = $custom["show_page_title"][0];
		}
		if (!empty($custom["pagebg_type"][0])) {
			$data['pagebg_type'] = $custom["pagebg_type"][0];
		}
		if (!empty($custom["pagebg_color"][0])) {
			$data['pagebg_color'] = $custom["pagebg_color"][0];
		}
		if (!empty($custom["pagebg_image"][0])) {
			$data['pagebg_image'] = $custom["pagebg_image"][0];
		}
		if (!empty($custom["pagebg_type_image_option"][0])) {
			$data['pagebg_type_image_option'] = $custom["pagebg_type_image_option"][0];
		}
		if (!empty($custom["headerbg_type"][0])) {
			$data['headerbg_type'] = $custom["headerbg_type"][0];
		}
		if (!empty($custom["page_sidebar_position"][0])) {
			$data['page_sidebar_position'] = $custom["page_sidebar_position"][0];
		}

		return $data;
	}

	public static function post_type_meta_box()
	{
		global $post;
		$data = array();
		$custom = get_post_custom($post->ID);
		$data['post_pod_types'] = self::$post_pod_types;
		$data['current_post_pod_type'] = !empty($custom["post_pod_type"][0]) ? $custom["post_pod_type"][0] : 'default';
		echo TMM::draw_html('page/post_pod_type_box', $data);
	}

	public static function post_type_meta_panel()
	{
		global $post;
		$data = array();
		$custom = get_post_custom($post->ID);
		$data['post_pod_types'] = self::$post_pod_types;
		$data['current_post_pod_type'] = !empty($custom["post_pod_type"][0]) ? $custom["post_pod_type"][0] : 'default';

		$data['post_type_values'] = get_post_meta($post->ID, 'post_type_values', true);

		echo TMM::draw_html('page/post_pod_type_panel', $data);
	}

	//ajax
	public static function add_post_podtype_gallery_image()
	{
		if (!current_user_can('edit_posts') || !isset($_REQUEST['tmm_nonce']) || !wp_verify_nonce($_REQUEST['tmm_nonce'], 'tmm_ajax_nonce')) {
			wp_die(__('Unauthorized request', 'accio'));
		}

		$data = array();
		$data['imgurl'] = $_REQUEST['imgurl'];
		echo TMM::draw_html('page/draw_post_podtype_gallery_image', $data);
		exit;
	}
}
