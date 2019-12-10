<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'No direct access allowed' );
}

$child_sections = array();
$tab_key        = basename( __FILE__, '.php' );
$pagepath       = TMM_THEME_FEATURES_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$content = array(
    'skin_composer' => array(
        'title'         => esc_html__( 'Skin Composer', 'accio' ),
        'type'          => 'custom',
        'default_value' => '',
        'description'   => '',
        'custom_html'   => TMM::draw_free_page( $pagepath . 'skin_composer.php' )
    ),
    'block0'        => array(
        'title' => esc_html__( 'Elements', 'accio' ),
        'type'  => 'items_block',
        'items' => array(
            'general_elements' => array(
                'title'         => esc_html__( 'Website Elements Color', 'accio' ),
                'type'          => 'color',
                'default_value' => '#00c2a9',
                'description'   => esc_html__( 'General website elements color(Such elements like icons, some backgrounds etc.). Do not edit this field to use default theme styling.
									Notice: All the styles below may override this color if necessary. ', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true,
            ),

        )
    ),
    'block1'        => array(
        'title' => esc_html__( 'Loader', 'accio' ),
        'type'  => 'items_block',
        'items' => array(
            'loader_color' => array(
                'title'         => esc_html__( 'Loader Color', 'accio' ),
                'type'          => 'color',
                'default_value' => '#00c2a9',
                'description'   => esc_html__( 'Percentage loader color in page loading. Do not edit this field to use default theme styling.
									Notice: All the styles below may override this color if necessary. ', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),

        )
    ),
    'block2'        => array(
        'title' => esc_html__( 'Text', 'accio' ),
        'type'  => 'items_block',
        'items' => array(
            'general_font_family'           => array(
                'title'         => esc_html__( 'Website Font Family', 'accio' ),
                'type'          => 'google_font_select',
                'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                'description'   => '',
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
            'general_font_size'             => array(
                'title'         => esc_html__( 'Website Font Size', 'accio' ),
                'type'          => 'slider',
                'default_value' => 15,
                'min'           => 14,
                'max'           => 18,
                'description'   => esc_html__( 'General website font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
            'general_text_color'            => array(
                'title'         => esc_html__( 'Website Text Color', 'accio' ),
                'type'          => 'color',
                'default_value' => '#777',
                'description'   => esc_html__( 'General website text color. Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
            'general_normal_links_color'    => array(
                'title'         => esc_html__( 'Website Links Color', 'accio' ),
                'type'          => 'color',
                'default_value' => '#00c2a8',
                'description'   => esc_html__( 'General website links color. Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
            'general_mouseover_links_color' => array(
                'title'         => esc_html__( 'Website Mouseover Links Color', 'accio' ),
                'type'          => 'color',
                'default_value' => '#00c2a9',
                'description'   => esc_html__( 'General website mouseover links color. Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
        )
    ),
    'block3'        => array(
        'title' => esc_html__( 'Backgrounds', 'accio' ),
        'type'  => 'items_block',
        'items' => array(
            'general_footer_bg_color' => array(
                'title'         => esc_html__( 'Website Footer Background', 'accio' ),
                'type'          => 'color',
                'default_value' => '',
                'description'   => esc_html__( 'General website footer background color (The bottom area where is copyright info located). Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => '',
                'show_title'    => true,
                'is_reset'      => true
            ),
            'body_pattern_selected'   => array(
                'title'         => esc_html__( 'Website Background', 'accio' ),
                'type'          => 'select',
                'css_class'     => 'showhide',
                'default_value' => 0,
                'values'        => array(
                    0 => esc_html__( 'Background Color', 'accio' ),
                    1 => esc_html__( 'Custom Background Image', 'accio' ),
                    2 => esc_html__( 'Patterns', 'accio' ),
                ),
                'description'   => esc_html__( 'General website background. Do not edit this field to use default theme styling.', 'accio' ),
                'custom_html'   => TMM::draw_free_page( $pagepath . 'body_pattern_selected.php' ),
                'show_title'    => true,
                'is_reset'      => true
            ),
        )
    ),
    'custom_css'    => array(
        'title'         => esc_html__( 'Custom CSS Styles', 'accio' ),
        'type'          => 'textarea',
        'default_value' => '',
        'description'   => '',
        'custom_html'   => ''
    ),
);

$child_sections['styling_headings'] = array(
    'name'     => esc_html__( 'Headings', 'accio' ),
    'sections' => array(
        'block1' => array(
            'title' => esc_html__( 'H1 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h1_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h1_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 36,
                    'min'           => 34,
                    'max'           => 40,
                    'description'   => esc_html__( 'H1 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h1_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H1 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block2' => array(
            'title' => esc_html__( 'H2 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h2_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h2_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 24,
                    'min'           => 22,
                    'max'           => 26,
                    'description'   => esc_html__( 'H2 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h2_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H2 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block3' => array(
            'title' => esc_html__( 'H3 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h3_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h3_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 20,
                    'min'           => 18,
                    'max'           => 22,
                    'description'   => esc_html__( 'H3 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h3_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H3 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block4' => array(
            'title' => esc_html__( 'H4 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h4_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h4_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 18,
                    'min'           => 16,
                    'max'           => 20,
                    'description'   => esc_html__( 'H4 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h4_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H4 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block5' => array(
            'title' => esc_html__( 'H5 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h5_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h5_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 16,
                    'min'           => 14,
                    'max'           => 18,
                    'description'   => esc_html__( 'H5 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h5_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H5 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block6' => array(
            'title' => esc_html__( 'H6 Heading', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'h6_font_family' => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h6_font_size'   => array(
                    'title'         => esc_html__( 'Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 14,
                    'min'           => 12,
                    'max'           => 16,
                    'description'   => esc_html__( 'H6 heading font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'h6_font_color'  => array(
                    'title'         => esc_html__( 'Font Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'H6 heading cont color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
    )
);

$child_sections['styling_main_navigation'] = array(
    'name'     => esc_html__( 'Main Navigation', 'accio' ),
    'sections' => array(
        'block1' => array(
            'title' => esc_html__( 'General', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'main_nav_font'                   => array(
                    'title'         => esc_html__( 'Font Family', 'accio' ),
                    'type'          => 'google_font_select',
                    'default_value' => 'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic',
                    'description'   => '',
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_first_level_font_size'  => array(
                    'title'         => esc_html__( 'Main Level Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 14,
                    'min'           => 12,
                    'max'           => 16,
                    'description'   => esc_html__( 'Main level font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_second_level_font_size' => array(
                    'title'         => esc_html__( 'Sublevel Font Size', 'accio' ),
                    'type'          => 'slider',
                    'default_value' => 11,
                    'min'           => 10,
                    'max'           => 12,
                    'description'   => esc_html__( 'Sublevel font size in pixels. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block2' => array(
            'title' => esc_html__( 'Top Navigation Bar', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'sticky_header_bg_color' => array(
                    'title'         => esc_html__( 'Sticky Header Background Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Sticky header background color', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block3' => array(
            'title' => esc_html__( 'Links Color (Main level)', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'main_nav_def_text_color'         => array(
                    'title'         => esc_html__( 'Normal', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#5b5e60',
                    'description'   => esc_html__( 'A normal, visited and unvisited link color for main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_def_trans_text_color'   => array(
                    'title'         => esc_html__( 'Normal for Transparent Navigation', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'A normal link color for main navigation ( transparent navigation ). Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_curr_text_color'        => array(
                    'title'         => esc_html__( 'Current', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'Current menu item\'s link color for main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_curr_text_color_sticky' => array(
                    'title'         => esc_html__( 'Current Sticky', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Current menu item\'s link color for sticky main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_hover_text_color'       => array(
                    'title'         => esc_html__( 'Mouseover', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'A link when the user mouses over it. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block4' => array(
            'title' => esc_html__( 'Background Color (Main level)', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'main_nav_hover_bg_color'          => array(
                    'title'         => esc_html__( 'Mouseover', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Main level background color, mouseover state', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_current_bg_color'        => array(
                    'title'         => esc_html__( 'Current', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Main level background color, current state', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_current_bg_color_sticky' => array(
                    'title'         => esc_html__( 'Current Sticky', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'Main level background color, current sticky state', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block5' => array(
            'title' => esc_html__( 'Links Color (Sublevel)', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'main_nav_dd_def_text_color'  => array(
                    'title'         => esc_html__( 'Normal', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'A normal, visited and unvisited link color for main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_dd_curr_text_color' => array(
                    'title'         => esc_html__( 'Current / Mouseover', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Current menu item\'s link color for main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        ),
        'block6' => array(
            'title' => esc_html__( 'Links Styles (for Touch Devices)', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'main_nav_bg_touch_color'    => array(
                    'title'         => esc_html__( 'Normal', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'A normal, visited and unvisited link color for main navigation. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'main_nav_touch_color_hover' => array(
                    'title'         => esc_html__( 'Current / Mouseover', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Current menu item\'s link color for main navigation sub menu. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        )
    )
);

$child_sections['styling_buttons'] = array(
    'name'     => esc_html__( 'Buttons', 'accio' ),
    'sections' => array(
        'block1' => array(
            'title' => esc_html__( 'Normal Styles', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'buttons_text_color'   => array(
                    'title'         => esc_html__( 'Text', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'A normal, visited and unvisited default button\'s text color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'buttons_border_color' => array(
                    'title'         => esc_html__( 'Border Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#cfcfcf',
                    'description'   => esc_html__( 'A normal, visited and unvisited default button\'s background color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
            )
        ),
        'block2' => array(
            'title' => esc_html__( 'Mouseover Styles', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'buttons_hover_text_color' => array(
                    'title'         => esc_html__( 'Text', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#fff',
                    'description'   => esc_html__( 'Default button\'s text color when the user mouses over it. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
                'buttons_hover_bg_color'   => array(
                    'title'         => esc_html__( 'Background', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#00c2a9',
                    'description'   => esc_html__( 'Default button\'s background color when the user mouses over it. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                ),
            )
        ),
    )
);


$child_sections['styling_widgets'] = array(
    'name'     => esc_html__( 'Widgets', 'accio' ),
    'sections' => array(
        'block1' => array(
            'title' => esc_html__( 'Normal Color Styles', 'accio' ),
            'type'  => 'items_block',
            'items' => array(
                'widget_title_color' => array(
                    'title'         => esc_html__( 'Title Color', 'accio' ),
                    'type'          => 'color',
                    'default_value' => '#4b4c4d',
                    'description'   => esc_html__( 'Widget\'s title text color. Do not edit this field to use default theme styling.', 'accio' ),
                    'custom_html'   => '',
                    'show_title'    => true,
                    'is_reset'      => true
                )
            )
        )
    )
);

$sections = array(
    'name'              => esc_html__( 'Styling', 'accio' ),
    'css_class'         => 'shortcut-styling',
    'show_general_page' => true,
    'content'           => $content,
    'child_sections'    => $child_sections,
    'menu_icon'         => 'dashicons-welcome-write-blog'
);

TMM_OptionsHelper::$sections[ $tab_key ] = $sections;