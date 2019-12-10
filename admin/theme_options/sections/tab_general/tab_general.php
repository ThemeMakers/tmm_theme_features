<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_FEATURES_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$list_pages = get_posts(array(
	'post_type' => 'page',
        'suppress_filters' => false,
	'numberposts'     => -1
));

$list_pages_array = array('' => 'Select Page');

if (!empty($list_pages)) {
	foreach($list_pages as $id => $page) {
		$list_pages_array[$page->ID] = $page->post_title;
	}
}

$content = array(
	'frontpage' => array(
		'title' => esc_html__('Frontpage Settings', 'accio'),
		'type' => 'select',
		'default_value' => '23',
		'values' => $list_pages_array,
		'description' => esc_html__('Select which page to display on your Frontpage.', 'accio'),
		'custom_html' => '',
		'show_title' => false,
		'is_reset' => true	
	),
	'blogpage' => array(
		'title' => esc_html__('Blog Page', 'accio'),
		'type' => 'select',
		'default_value' => '157',
		'values' => $list_pages_array,
		'description' => esc_html__('Select which page to display as your Blog Page.', 'accio'),
		'custom_html' => '',
		'show_title' => false,
		'is_reset' => true	
	),
	'favicon_img' => array(
		'title' => esc_html__('Website Favicon', 'accio'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/images/favicon.png',
		'description' => esc_html__('Upload your favicon here. It will appear in your browser\'s address bar as per example below. Recommended dimensions: 32x32. Recommended image types: png', 'accio'),
		'custom_html' => TMM::draw_free_page($pagepath . 'favicon_img.php')
	),
	'apple_touch_icon' => array(
		'title' => esc_html__('Apple Touch Icon', 'accio'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/images/apple-touch-icon.png',
		'description' => esc_html__('Upload your favicon here. It will appear in your browser\'s address bar as per example below. Recommended dimensions: 57x57. Recommended image types: png', 'accio'),
		'custom_html' => ''
	),
	'apple_touch_icon_72x72' => array(
		'title' => esc_html__('Apple Touch Icon (72x72)', 'accio'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/images/apple-touch-icon-72x72.png',
		'description' => esc_html__('Upload your favicon here. It will appear in your browser\'s address bar as per example below. Recommended dimensions: 72x72. Recommended image types: png', 'accio'),
		'custom_html' => ''
	),
	'apple_touch_icon_114x114' => array(
		'title' => esc_html__('Apple Touch Icon (114x114)', 'accio'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/images/apple-touch-icon-114x114.png',
		'description' => esc_html__('Upload your favicon here. It will appear in your browser\'s address bar as per example below. Recommended dimensions: 114x114. Recommended image types: png', 'accio'),
		'custom_html' => ''
	),
	'logo' => array(
		'title' => esc_html__('Website Logo', 'accio'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'logo.php')
	),
	'sidebar_position' => array(
		'title' => esc_html__('Default Sidebar Position', 'accio'),
		'type' => 'custom',
		'default_value' => 'no_sidebar',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'sidebar_position.php')
	),
	'blog_sidebar_position' => array(
		'title' => esc_html__('Sidebar on Blog Page', 'accio'),
		'type' => 'select',
		'default_value' => 'sbr',
		'values' => array(
			'sbl' => 'Left Sidebar',
			'sbr' => 'Right Sidebar'
		),
		'description' => esc_html__('Chose sidebar position for blog page', 'accio'),
		'custom_html' => '',
		'show_title' => false,
		'is_reset' => true	
	),
	'show_page_loader' => array(
		'title' => esc_html__('Display Page Loader', 'accio'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => '',
		'custom_html' => ''
	),
	'type_menu' => array(
		'title'=> esc_html__('Use Transparent Navigation', 'accio'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => 'Only for onepage',
		'custom_html' => ''
	),
	'mobile_fixed_menu' => array(
		'title'=> esc_html__('Use fixed menu', 'accio'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => 'For mobile layout',
		'custom_html' => ''
	),
	'tracking_code' => array(
		'title' => esc_html__('Tracking Code', 'accio'),
		'type' => 'textarea',
		'default_value' => '',
		'description' => esc_html__('Place here your Google Analytics (or other) tracking code. It will be inserted before closing body tag in your theme.', 'accio'),
		'custom_html' => ''
	)
);

$sections = array(
	'name' => esc_html__("General", 'accio'),
	'css_class' => 'shortcut-options',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-admin-settings'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

