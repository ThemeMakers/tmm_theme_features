<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_FEATURES_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	'block1' => array(
		'title' => esc_html__('API key google', 'accio'),
		'type' => 'items_block',
		'items' => array(
			'api_key_google' => array(
				'title' => esc_html__('API key google', 'accio'),
				'type' => 'text',
				'default_value' => "AIzaSyCPmvaxJrvCIbuLEQ9uHRpOnXPW95gMoC4",
				'description' => wp_kses_post( esc_html__('Find the instructions on the folowing page to', 'accio') . ' <a class="admin-link" target="_blank" href="https://helpdesk.webtemplatemasters.com/how-to-obtain-the-google-api-key-for-google-maps/">' . esc_html__('get your API key', 'accio') . '</a>' ),
				'show_title'    => false,
				'custom_html' => ''
			),
		)
	)
);


$sections = array(
	'name' => esc_html__('API settings', 'accio'),
	'css_class' => 'shortcut-api',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-admin-generic'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

