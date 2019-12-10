<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_FEATURES_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'footer_bg_image' => array(
		'title' => esc_html__('Footer Background Image', 'accio'),
		'type' => 'upload',
		'default_value' => '',
		'description' => esc_html__('Upload your background image here. Recommended image types: png, gif, jpg.', 'accio'),
		'custom_html' => '',
		'is_reset' => true
	),
	'copyright_text' => array(
		'title' => esc_html__('Copyrights', 'accio'),
		'type' => 'textarea',
		'default_value' => sprintf(esc_html__('Copyright &copy; %d. ThemeMakers. All rights reserved', 'accio'), date('Y')),
		'description' => '',
		'custom_html' => ''
	),
	'hide_footer' => array(
		'title' => esc_html__('Disable Footer Widget Area', 'accio'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => esc_html__('If checked, all the footer widgets will not be appeared in the bottom of each page.', 'accio'),
		'custom_html' => ''
	),
	'hide_logo_in_footer' => array(
		'title' => esc_html__('Disable Logo in Footer', 'accio'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => esc_html__('If checked, footer logo will not be appeared in the bottom of each page.', 'accio'),
		'custom_html' => ''	
	),
	'footer_logo' => array(
		'title' => esc_html__('Footer Logo', 'accio'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'logo-footer.php')
	)
);


$sections = array(
	'name' => esc_html__("Footer", 'accio'),
	'css_class' => 'shortcut-footer',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-editor-kitchensink'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

