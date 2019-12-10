<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$child_sections = array();
$tab_key = basename(__FILE__, '.php');

//$pagepath = TMM_THEME_FEATURES_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$folio_archive_per_page = array();

for ($i = 3; $i <= 21; $i++) {
	$folio_archive_per_page[$i] = $i;
}


$content = array(
	'block1' => array(
		'title' => esc_html__('Archive Page Layout', 'accio'),
		'type' => 'items_block',
		'show_title'    => true,
		'items' => array(
			'folio_page_onepage' => array(
				'title'         => esc_html__( 'Portfolio Page', 'accio' ),
				'type'          => 'select',
				'default_value' => '',
				'values'        => $list_pages_array,
				'description'   => esc_html__( 'Select which page to display as your Portfolio Page in One Page Template.', 'accio' ),
				'custom_html'   => '',
				'show_title'    => true,
				'is_reset'      => true
			),
			'folio_archive_per_page' => array(
				'title' => esc_html__('Items per page', 'accio'),
				'type' => 'select',
				'default_value' => 10,
				'values' => $folio_archive_per_page,
				'description' => esc_html__('Please type here an amount of items to be displayed per portfolio page.', 'accio'),
				'show_title' => true,
				'custom_html' => ''
			),
			'folio_archive_sidebar' => array(
				'title' => esc_html__('Archive Page Sidebar', 'accio'),
				'type' => 'select',
				'default_value' => 'no_sidebar',
				'values' => array(
					'no_sidebar' => esc_html__('No sidebar', 'accio'),
					'sbl' => esc_html__('Left', 'accio'),
					'sbr' => esc_html__('Rigth', 'accio'),
				),
				'description' => esc_html__('Archive Page sidebar position for Portfolio', 'accio'),
				'show_title' => true,
				'custom_html' => ''
			),
		)
	),
	'block2' => array(
		'title' => esc_html__('Single Page Layout', 'accio'),
		'type' => 'items_block',
		'items' => array(
			'folio_show_related_works' => array(
				'title' => esc_html__('Show Related Projects on single page', 'accio'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('Show Related Works on single page', 'accio'),
				'custom_html' => ''
			),
			'single_folio_hide_date' => array(
				'title' => esc_html__('Hide Single Folio Date', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			),
			'single_folio_hide_clients' => array(
				'title' => esc_html__('Hide Single Folio Clients', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			),
			'single_folio_hide_skills' => array(
				'title' => esc_html__('Hide Single Folio Skills', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			),
			'single_folio_hide_tags' => array(
				'title' => esc_html__('Hide Single Folio Tags', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			),
			'single_folio_hide_tools' => array(
				'title' => esc_html__('Hide Single Folio Tools', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			)
		)
	),
);

$sections = array(
	'name' => esc_html__('Portfolio', 'accio'),
	'css_class' => 'shortcut-portfolio',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-portfolio'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

