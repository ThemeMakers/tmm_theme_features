<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class TMM_Onepage {

	public static $slug = 'onepage';

	public static function init() {
		
		$labels = array(
			'name' => esc_html__('OnePage', 'accio'),
			'singular_name' => esc_html__('OnePage', 'accio'),
			'add_new' => esc_html__('Add New', 'accio'),
			'add_new_item' => esc_html__('Add New OnePage', 'accio'),
			'edit_item' => esc_html__('Edit OnePage', 'accio'),
			'new_item' => esc_html__('New OnePage', 'accio'),
			'view_item' => esc_html__('View OnePage', 'accio'),
			'search_items' => esc_html__('Search OnePages', 'accio'),
			'not_found' => esc_html__('No OnePages found', 'accio'),
			'not_found_in_trash' => esc_html__('No OnePages found in Trash', 'accio'),
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
			'capability_type' => 'page',
			'has_archive' => false,
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'excerpt'),
			'rewrite' => array('slug' => self::$slug),
			'show_in_admin_bar' => true,
			'taxonomies' => array('op_types'), // this is IMPORTANT
			'menu_icon' => 'dashicons-welcome-write-blog'
		);

		register_taxonomy("op_type", array(self::$slug), array(
			"hierarchical" => true,
			"labels" => array(
				'name' => esc_html__('Types', 'accio'),
				'singular_name' => esc_html__('Type', 'accio'),
				'add_new' => esc_html__('Add New', 'accio'),
				'add_new_item' => esc_html__('Add New Type', 'accio'),
				'edit_item' => esc_html__('Edit Type', 'accio'),
				'new_item' => esc_html__('New Type', 'accio'),
				'view_item' => esc_html__('View Type', 'accio'),
				'search_items' => esc_html__('Search Types', 'accio'),
				'not_found' => esc_html__('No Typea found', 'accio'),
				'not_found_in_trash' => esc_html__('No Types found in Trash', 'accio'),
				'parent_item_colon' => ''
			),
			"singular_label" => esc_html__("op_type", 'accio'),
			"rewrite" => true,
			'show_in_nav_menus' => false,
			'capabilities' => array('manage_terms'),
			'show_ui' => true
		));

		register_post_type(self::$slug, $args);
		flush_rewrite_rules(false);

		add_filter("manage_" . self::$slug . "_posts_columns", array(__CLASS__, "show_edit_columns"));
		add_action("manage_" . self::$slug . "_posts_custom_column", array(__CLASS__, "show_edit_columns_content"));
		add_action('save_post', array(__CLASS__, 'save_post'), 1);
		
		//AJAX
		add_action('wp_ajax_add_onepage_item_to_list', array(__CLASS__, 'add_onepage_item_to_list'));
	}

	public static function admin_init() {
		self::init_meta_boxes();
	}

	public static function init_meta_boxes() {
		add_meta_box("credits_meta_onepage", esc_html__("OnePage", 'accio'), array(__CLASS__, 'draw_onepage_box'), "page", "side", "low");
		add_meta_box("credits_meta_pages", esc_html__("Pages", 'accio'), array(__CLASS__, 'draw_credits_pages'), self::$slug, "normal", "low");
		add_meta_box("credits_meta_attrs", esc_html__("OnePage Attributes", 'accio'), array(__CLASS__, 'draw_credits_meta'), self::$slug, "normal", "low");
	}

	public static function draw_credits_pages() {
		global $post;
		$data = array();
		$data['onepage'] = get_post_meta($post->ID, 'onepage', TRUE);
		echo TMM::draw_html('onepage/credits_pages', $data);
	}

	public static function draw_credits_meta() {
		global $post;
		$data = array();
		$custom = get_post_custom($post->ID);
		$data['bg_video'] = @$custom["bg_video"][0];
		$data['video_quality'] = @$custom["video_quality"][0];
		$data['video_vol'] = @$custom["video_vol"][0];
		$data['video_opacity'] = @$custom["video_opacity"][0];
		$data['video_autoplay'] = @$custom["video_autoplay"][0];
		$data['video_mute'] = @$custom["video_mute"][0];
		$data['video_loop'] = @$custom["video_loop"][0];
		$data['page_menu'] = @$custom["page_menu"][0];
		$data['bg_type'] = @$custom["bg_type"][0];
		echo TMM::draw_html('onepage/credits_meta', $data);
	}

	public static function draw_onepage_box() {
		global $post;
		$data = array();
		$onepage= (int) get_post_meta($post->ID, 'onepage', true);
		$onepages = get_posts(array('numberposts' => -1, 'post_type' => self::$slug));
		
		?>
		<?php if (!empty($onepages)): ?>
			<div class="sel">
				<select name="onepage">
					<option value="0">---</option>
					<?php foreach ($onepages as $page) : ?>
						<option value="<?php echo esc_attr($page->ID) ?>" <?php if ($page->ID == $onepage): ?>selected=""<?php endif; ?>><?php echo esc_html($page->post_title) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<?php endif; ?>
		<?php
	}

	public static function save_post() {
		if (!empty($_POST)) {
			global $post;
			if (is_object($post)) {
				if(isset($_POST['onepage'])){
					update_post_meta($post->ID, "onepage", $_POST['onepage']);
				}
				if ($post->post_type == self::$slug) {
					if(isset($_POST['bg_video'])){
						update_post_meta($post->ID, "bg_video", $_POST["bg_video"]);
					}
					if(isset($_POST['video_quality'])){
						update_post_meta($post->ID, "video_quality", $_POST["video_quality"]);
					}
					if(isset($_POST['video_vol'])){
						update_post_meta($post->ID, "video_vol", $_POST["video_vol"]);
					}
					if(isset($_POST['video_opacity'])){
						update_post_meta($post->ID, "video_opacity", $_POST["video_opacity"]);
					}
					if(isset($_POST['video_autoplay'])){
						update_post_meta($post->ID, "video_autoplay", $_POST["video_autoplay"]);
					}
					if(isset($_POST['video_mute'])){
						update_post_meta($post->ID, "video_mute", $_POST["video_mute"]);
					}
					if(isset($_POST['video_loop'])){
						update_post_meta($post->ID, "video_loop", $_POST["video_loop"]);
					}
					if(isset($_POST['page_menu'])){
						update_post_meta($post->ID, "page_menu", $_POST["page_menu"]);
					}
					if(isset($_POST['bg_type'])){
						update_post_meta($post->ID, "bg_type", $_POST["bg_type"]);
					}
				}
			}
		}
	}

	public static function show_edit_columns_content($column) {
		global $post;

		switch ($column) {
			case "description":
				the_excerpt();
				break;
			case "op_type":
				echo get_the_term_list($post->ID, 'op_type', '', ', ', '');
				break;
		}
	}

	public static function show_edit_columns($columns) {
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => esc_html__("Title", 'accio'),
			"description" => esc_html__("Description", 'accio'),
			"op_type" => esc_html__("Types", 'accio'),
		);

		return $columns;
	}

	public static function draw_onepage_item_to_list($page_id) {
		$data = array();
		$data['page_id'] = $page_id;
		$data['page'] = get_page($page_id);
		//***
		return TMM::draw_html('onepage/onepage_pages_list_item', $data);
	}

	public static function draw_onepage($page_id) {
		$data = array();
		$data['onepage'] = get_post_meta($page_id, 'onepage', TRUE);
		echo TMM::draw_html('onepage/onepage_front_output', $data);
	}

	//ajax
	public static function add_onepage_item_to_list() {
		wp_die(self::draw_onepage_item_to_list($_REQUEST['page_id']));
	}

}
