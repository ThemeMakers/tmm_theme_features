<?php if (!defined('ABSPATH')) die('No direct access allowed');

// Global Styles
$logo_font_size = TMM::get_option('logo_font_size');
$logo_font = TMM::get_option('logo_font');

if ($logo_font) {
	$logo_font = preg_split( '/:/', $logo_font );
	$logo_font = '"' . str_replace('+', ' ', $logo_font[0]) . '"';
}

$logo_text_color = TMM::get_option('logo_text_color');
$general_elements = TMM::get_option('general_elements');
$loader_color = TMM::get_option('loader_color');
$general_font_family = TMM::get_option('general_font_family');

if ($general_font_family) {
	$general_font_family = preg_split( '/:/', $general_font_family );
	$general_font_family = '"' . str_replace('+', ' ', $general_font_family[0]) . '"';
}

$general_font_size = TMM::get_option('general_font_size');
$general_text_color = TMM::get_option('general_text_color');
$general_normal_links_color = TMM::get_option('general_normal_links_color');
$general_mouseover_links_color = TMM::get_option('general_mouseover_links_color');
$general_footer_bg_color = TMM::get_option('general_footer_bg_color');

// Headings
$h1_font_family = TMM::get_option('h1_font_family');

if ($h1_font_family) {
	$h1_font_family = preg_split( '/:/', $h1_font_family );
	$h1_font_family = '"' . str_replace('+', ' ', $h1_font_family[0]) . '"';
}

$h1_font_size = TMM::get_option('h1_font_size');
$h1_font_color = TMM::get_option('h1_font_color');

$h2_font_family = TMM::get_option('h2_font_family');

if ($h2_font_family) {
	$h2_font_family = preg_split( '/:/', $h2_font_family );
	$h2_font_family = '"' . str_replace('+', ' ', $h2_font_family[0]) . '"';
}

$h2_font_size = TMM::get_option('h2_font_size');
$h2_font_color = TMM::get_option('h2_font_color');

$h3_font_family = TMM::get_option('h3_font_family');

if ($h3_font_family) {
	$h3_font_family = preg_split( '/:/', $h3_font_family );
	$h3_font_family = '"' . str_replace('+', ' ', $h3_font_family[0]) . '"';
}

$h3_font_size = TMM::get_option('h3_font_size');
$h3_font_color = TMM::get_option('h3_font_color');

$h4_font_family = TMM::get_option('h4_font_family');

if ($h4_font_family) {
	$h4_font_family = preg_split( '/:/', $h4_font_family );
	$h4_font_family = '"' . str_replace('+', ' ', $h4_font_family[0]) . '"';
}

$h4_font_size = TMM::get_option('h4_font_size');
$h4_font_color = TMM::get_option('h4_font_color');

$h5_font_family = TMM::get_option('h5_font_family');

if ($h5_font_family) {
	$h5_font_family = preg_split( '/:/', $h5_font_family );
	$h5_font_family = '"' . str_replace('+', ' ', $h5_font_family[0]) . '"';
}

$h5_font_size = TMM::get_option('h5_font_size');
$h5_font_color = TMM::get_option('h5_font_color');

$h6_font_family = TMM::get_option('h6_font_family');

if ($h6_font_family) {
	$h6_font_family = preg_split( '/:/', $h6_font_family );
	$h6_font_family = '"' . str_replace('+', ' ', $h6_font_family[0]) . '"';
}

$h6_font_size = TMM::get_option('h6_font_size');
$h6_font_color = TMM::get_option('h6_font_color');

// Main Navigation
$main_nav_font = TMM::get_option('main_nav_font');

if ($main_nav_font) {
	$main_nav_font = preg_split( '/:/', $main_nav_font );
	$main_nav_font = '"' . str_replace('+', ' ', $main_nav_font[0]) . '"';
}

$main_nav_first_level_font_size = TMM::get_option('main_nav_first_level_font_size');
$main_nav_second_level_font_size = TMM::get_option('main_nav_second_level_font_size');

$main_nav_def_text_color = TMM::get_option('main_nav_def_text_color');
$main_nav_def_trans_text_color = TMM::get_option('main_nav_def_trans_text_color');
$main_nav_curr_text_color = TMM::get_option('main_nav_curr_text_color');
$main_nav_curr_text_color_sticky = TMM::get_option('main_nav_curr_text_color_sticky');
$main_nav_hover_text_color = TMM::get_option('main_nav_hover_text_color');
$main_nav_hover_bg_color = TMM::get_option('main_nav_hover_bg_color');
$main_nav_current_bg_color = TMM::get_option('main_nav_current_bg_color');
$main_nav_current_bg_color_sticky = TMM::get_option('main_nav_current_bg_color_sticky');

$main_nav_dd_def_text_color = TMM::get_option('main_nav_dd_def_text_color');
$main_nav_dd_curr_text_color = TMM::get_option('main_nav_dd_curr_text_color');
$sticky_header_bg_color = TMM::get_option('sticky_header_bg_color');

$main_nav_dd_def_item_bg = TMM::get_option('main_nav_dd_def_item_bg');
$main_nav_bg_touch_color = TMM::get_option('main_nav_bg_touch_color');
$main_nav_touch_color_hover = TMM::get_option('main_nav_touch_color_hover');

// buttons
$buttons_text_color = TMM::get_option('buttons_text_color');
$buttons_border_color = TMM::get_option('buttons_border_color');
$buttons_hover_text_color = TMM::get_option('buttons_hover_text_color');
$buttons_hover_bg_color = TMM::get_option('buttons_hover_bg_color');

// widgets
$widget_title_color = TMM::get_option('widget_title_color');

?>


/***************************** Global Styles ************************************/


body { <?php echo esc_attr( TMM_Helper::draw_body_bg() ) ?>; }

<?php if (!empty($general_font_family) || !empty($general_text_color) || !empty($general_font_size)): ?>

	body {
	font-family: <?php echo wp_specialchars_decode( esc_html( $general_font_family ), 'ENT_COMPAT') ?>;
	font-size: <?php echo esc_attr( $general_font_size ) ?>px;
	color: <?php echo esc_attr( $general_text_color ) ?>;
	}

<?php endif; ?>

<?php if ($general_normal_links_color): ?>

	a, a > * { color: <?php echo esc_attr( $general_normal_links_color ) ?>; }

<?php endif; ?>

<?php if (!empty($general_mouseover_links_color)): ?>

	a:hover { color: <?php echo esc_attr( $general_mouseover_links_color ) ?>; }

<?php endif; ?>

<?php if (!empty($general_footer_bg_color)): ?>

	.single .bottom-footer,
	.page-template .bottom-footer { background-color: <?php echo esc_attr( $general_footer_bg_color ) ?>; }

<?php endif; ?>

<?php if (!empty($logo_font) || !empty($logo_text_color) || !empty($logo_font_size)): ?>

	#logo,
	.transparent #logo {
	font-family: <?php echo wp_specialchars_decode( esc_attr( $logo_font ), 'ENT_COMPAT') ?>;
	font-size: <?php echo esc_attr( $logo_font_size ) ?>px;
	}

	#logo a {
	color: <?php echo esc_attr( $logo_text_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($general_elements)): ?>

	/* Color */

	#searchform input[type="text"]:focus + .submit-search:before,
	.ls-accio.ls-container .ls-nav-next:hover:after,
	.ls-accio.ls-container .ls-nav-prev:hover:after,
	.simple-pricing-table .column:hover .button,
	.simple-pricing-table .featured .button,
	.slides-navigation a:hover:after,
	.link-icon .curtain:hover:after,
	.plus-icon .curtain:hover:after,
	.widget_calendar tfoot a:after,
	.single-post-nav a:hover:after,
	.simple-pricing-table .button,
	.flex-direction-nav a:before,
	.recent-projects-nav a:after,
	.comment .comment-author h6,
	.image-slider-nav a:after,
	.single-post-nav a:hover,
	hgroup.section-title h1,
	ul.circle-list li:after,
	.website-general-color,
	.counter .count,
	.quote-author,
	.copyright a,
	.developed a,
	.tweets a
	{
	color: <?php echo esc_attr( $general_elements ) ?>;
	}

	/* Background Color */

	.no-touch .team-member article:hover .team-group,
	.simple-pricing-table .column:hover,
	.simple-pricing-table .featured,
	.flex-control-thumbs .flex-active,
	.portfolio-filter li.active,
	.flex-direction-nav a:hover,
	.image-slider-nav a:hover,
	ul.circle-list li:after,
	.open .team-group,
	#back-top:hover,
	.acc-trigger.active,
	.tabs-nav .active a,
	.bar,
	.responsive-nav-button
	{
	background-color: <?php echo esc_attr( $general_elements ) ?>;
	}

	/* Background Color for Work Item */

	.work-item.touched .image-extra,
	.work-item:hover .image-extra,
	.widget_custom_recent_entries .curtain {
	background-color: <?php echo esc_attr( $general_elements ) ?>;
	background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.8);
	}

	/* Background Color for Pricing Table */

	.simple-pricing-table .column:hover .price,
	.simple-pricing-table .featured .price,
	.simple-pricing-table .column:hover .footer,
	.simple-pricing-table .featured .footer
	{
	background-color: <?php echo esc_attr( $general_elements ) ?>;
	background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.5);
	}

	/* background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.8); */

	/* Team Plus Icon  */

	.accHorizontal .accHorizontal__item .backdrop > .fa,
	.accHorizontal .accHorizontal__item .backdrop:hover ~ .acc_cBox > .acc_cImg > header,
	.accHorizontal .accHorizontal__item .state:checked ~ .acc_cBox > .acc_cImg > header {
	background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.8);
	}


	/* Box Shadow */

	.parallax input[type="text"]:focus,
	.parallax input[type="password"]:focus,
	.parallax input[type="datetime"]:focus,
	.parallax input[type="datetime-local"]:focus,
	.parallax input[type="date"]:focus,
	.parallax input[type="month"]:focus,
	.parallax input[type="time"]:focus,
	.parallax input[type="week"]:focus,
	.parallax input[type="number"]:focus,
	.parallax input[type="email"]:focus,
	.parallax input[type="url"]:focus,
	.parallax input[type="search"]:focus,
	.parallax input[type="tel"]:focus,
	.parallax input[type="color"]:focus,
	.parallax textarea:focus,
	.parallax select:focus {
	-webkit-box-shadow: 0 0 10px 1px rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.7);
	box-shadow: 0 0 10px 1px rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($general_elements) ) ?>, 0.7);
	}

	/* Border Color */

	input[type="text"]:focus,
	input[type="password"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="time"]:focus,
	input[type="week"]:focus,
	input[type="number"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="search"]:focus,
	input[type="tel"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	select:focus { border-color: <?php echo esc_attr( $general_elements ) ?>; }

	/* Border Color For Portfolio Filter */

	.portfolio-filter li.active { border-color: <?php echo esc_attr( $general_elements ) ?>; }
	.portfolio-filter li.active + li { border-left-color: <?php echo esc_attr( $general_elements ) ?>; }

	#searchform input[type="text"]:focus + .submit-search {
	border-left-color: <?php echo esc_attr( $general_elements ) ?>;
	}

	/* Selection */

	::-moz-selection  { background-color: <?php echo esc_attr( $general_elements ) ?>; }
	::selection	      { background-color: <?php echo esc_attr( $general_elements ) ?>; }
	.highlight		  { background-color: <?php echo esc_attr( $general_elements ) ?>; }

<?php endif; ?>

<?php if (!empty($loader_color)){ ?>

        /* QueryLoader */

	#qLpercentage { color: <?php echo esc_attr( $loader_color ) ?> !important;  }
	#qLbar		  { background-color: <?php echo esc_attr( $loader_color ) ?> !important;  }

<?php } ?>

/************************ Headings *****************************/

<?php if (!empty($h1_font_family) || !empty($h1_font_size) || !empty($h1_font_color)): ?>

	h1 {
	font-family:<?php echo wp_specialchars_decode( esc_attr( $h1_font_family ), 'ENT_COMPAT') ?>;
	font-size:<?php echo esc_attr( $h1_font_size ) ?>px;
	color: <?php echo esc_attr( $h1_font_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($h2_font_family) || !empty($h2_font_size) || !empty($h2_font_color)): ?>

	h2 {
	font-family:<?php echo wp_specialchars_decode( esc_attr( $h2_font_family ), 'ENT_COMPAT') ?>;
	font-size:<?php echo esc_attr( $h2_font_size ) ?>px;
	color:<?php echo esc_attr( $h2_font_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($h3_font_family) || !empty($h3_font_size) || !empty($h3_font_color)): ?>

	h3 {
	font-family: <?php echo wp_specialchars_decode( esc_attr( $h3_font_family ), 'ENT_COMPAT') ?>;
	font-size: <?php echo esc_attr( $h3_font_size ) ?>px;
	color: <?php echo esc_attr( $h3_font_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($h4_font_family) || !empty($h4_font_size) || !empty($h4_font_color)): ?>

	h4 {
	font-family: <?php echo wp_specialchars_decode( esc_attr( $h4_font_family ), 'ENT_COMPAT') ?>;
	font-size: <?php echo esc_attr( $h4_font_size ) ?>px;
	color: <?php echo esc_attr( $h4_font_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($h5_font_family) || !empty($h5_font_size) || !empty($h5_font_color)): ?>

	h5 {
	font-family:<?php echo wp_specialchars_decode( esc_attr( $h5_font_family ), 'ENT_COMPAT') ?>;
	font-size:<?php echo esc_attr( $h5_font_size ) ?>px;
	color:<?php echo esc_attr( $h5_font_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($h6_font_family) || !empty($h6_font_size) || !empty($h6_font_color)): ?>

	h6 {
	font-family:<?php echo wp_specialchars_decode( esc_attr( $h6_font_family ), 'ENT_COMPAT') ?>;
	font-size:<?php echo esc_attr( $h6_font_size ) ?>px;
	color:<?php echo esc_attr( $h6_font_color ) ?>;
	}

<?php endif; ?>

/************************* Main Navigation *******************************/

<?php if (!empty($main_nav_font)): ?>

	.navigation a { font-family: <?php echo wp_specialchars_decode( esc_attr( $main_nav_font ), 'ENT_COMPAT') ?>; }

	.header-shrink .navigation a { font-family: <?php echo wp_specialchars_decode( esc_attr( $main_nav_font ), 'ENT_COMPAT') ?>; }

<?php endif; ?>

<?php if (!empty($main_nav_first_level_font_size) || !empty($main_nav_second_level_font_size)): ?>

	.navigation > ul > li > a { font-size: <?php echo esc_attr( $main_nav_first_level_font_size ) ?>px; }
	.navigation ul ul li a	  { font-size: <?php echo esc_attr( $main_nav_second_level_font_size ) ?>px; }

	.header-shrink .navigation > ul > li > a { font-size: <?php echo esc_attr( $main_nav_first_level_font_size ) ?>px; }
	.header-shrink .navigation ul ul li a { font-size: <?php echo esc_attr( $main_nav_second_level_font_size ) ?>px; }

<?php endif; ?>

/* First level menu items */

<?php if (!empty($main_nav_def_text_color)): ?>

	.navigation > ul > li > a { color:<?php echo esc_attr( $main_nav_def_text_color ) ?>; }

    @media only screen and (max-width: 1024px) {
        .navigation > ul > li > a { color: <?php echo esc_attr( $main_nav_def_trans_text_color ) ?>; }
    }

<?php endif; ?>

<?php if (!empty($main_nav_def_trans_text_color)): ?>

	@media only screen and (min-width: 1025px) {
		.transparent .navigation > ul > li > a,
		.transparent .navigation > ul > li > a:after { color: <?php echo esc_attr( $main_nav_def_trans_text_color ) ?>; }
	}

<?php endif; ?>

<?php if (!empty($main_nav_curr_text_color)): ?>

	.navigation > ul > .current-menu-item > a,
	.navigation > ul > .current_page_item > a,
	.navigation > ul > .current_page_parent > a,
	.navigation > ul > .current_page_ancestor > a {
		color: <?php echo esc_attr( $main_nav_curr_text_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($main_nav_curr_text_color_sticky)): ?>

	.header-shrink .navigation > ul > li:hover > a,
	.header-shrink .navigation > ul > .current-menu-item > a,
	.header-shrink .navigation > ul > .current_page_item > a,
	.header-shrink .navigation > ul > .current_page_parent > a,
	.header-shrink .navigation > ul > .current_page_ancestor > a {
		color: <?php echo esc_attr( $main_nav_curr_text_color_sticky ) ?>;
	}

	.header-shrink .navigation > ul > li:hover > a:after,
	.header-shrink .navigation > ul > .current-menu-item > a:after,
	.header-shrink .navigation > ul > .current_page_item > a:after,
	.header-shrink .navigation > ul > .current_page_parent > a:after,
	.header-shrink .navigation > ul > .current_page_ancestor > a:after {
		color: <?php echo esc_attr( $main_nav_curr_text_color_sticky ) ?>;
	}

<?php endif; ?>

<?php if (!empty($main_nav_hover_text_color)): ?>

	.navigation > ul > li:hover > a { color: <?php echo esc_attr( $main_nav_hover_text_color ) ?>; }

<?php endif; ?>

<?php if (!empty($main_nav_hover_bg_color)): ?>

	.transparent .navigation > ul > li:hover > a {
	background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($main_nav_hover_bg_color) ) ?>, 0.7);
	}

	.navigation > ul > li:hover > a  {
	background-color: <?php echo esc_attr( $main_nav_hover_bg_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($main_nav_current_bg_color)): ?>

	.transparent .navigation > ul > .current-menu-item > a,
	.transparent .navigation > ul > .current_page_item > a,
	.transparent .navigation > ul > .current_page_parent > a,
	.transparent .navigation > ul > .current_page_ancestor > a {
	background-color: rgba(<?php echo esc_attr( TMM_Helper::hex2rgb($main_nav_current_bg_color) ) ?>, 0.7);
	}

	.navigation > ul > .current-menu-item > a,
	.navigation > ul > .current_page_item > a,
	.navigation > ul > .current_page_parent > a,
	.navigation > ul > .current_page_ancestor > a {
	background-color: <?php echo esc_attr( $main_nav_current_bg_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($main_nav_current_bg_color_sticky)): ?>

	.header-shrink .navigation > ul > li:hover > a,
	.header-shrink .navigation > ul > .current-menu-item > a,
	.header-shrink .navigation > ul > .current_page_item > a,
	.header-shrink .navigation > ul > .current_page_parent > a,
	.header-shrink .navigation > ul > .current_page_ancestor > a {
	background-color: <?php echo esc_attr( $main_nav_current_bg_color_sticky ) ?>;
	}

<?php endif; ?>

/* Second level menu items */

<?php if (!empty($main_nav_dd_def_text_color)): ?>

	.navigation ul ul li a { color: <?php echo esc_attr( $main_nav_dd_def_text_color ) ?>; }

	.header-shrink .navigation ul ul li a { color: <?php echo esc_attr( $main_nav_dd_def_text_color ) ?>; }

<?php endif; ?>

<?php if (!empty($main_nav_dd_curr_text_color)): ?>

	.navigation ul ul a:hover,
	.navigation ul ul .current-menu-item > a,
	.navigation ul ul .current-menu-parent > a,
	.navigation ul ul .current-menu-ancestor > a,
	.navigation ul ul .current_page_item > a,
	.navigation ul ul .current_page_parent > a,
	.navigation ul ul .current_page_ancestor > a {
		color: <?php echo esc_attr( $main_nav_dd_curr_text_color ) ?>;
	}

	.header-shrink .navigation ul ul a:hover,
	.header-shrink .navigation ul ul .current-menu-item > a,
	.header-shrink .navigation ul ul .current-menu-parent > a,
	.header-shrink .navigation ul ul .current-menu-ancestor > a,
	.header-shrink .navigation ul ul .current_page_item > a,
	.header-shrink .navigation ul ul .current_page_parent > a,
	.header-shrink .navigation ul ul .current_page_ancestor > a {
		color: <?php echo esc_attr( $main_nav_dd_curr_text_color ) ?>;
	}

<?php endif; ?>

<?php if (!empty($sticky_header_bg_color)): ?>

	#header.header-shrink {
		background-color: <?php echo esc_attr( $sticky_header_bg_color ) ?>;
	}

<?php endif; ?>


/************** For Touch Devices ********************/

@media only screen and (max-width: 992px) {

<?php if (!empty($main_nav_bg_touch_color)): ?>

	.navigation ul li > a {
	background-color: <?php echo esc_attr( $main_nav_bg_touch_color ) ?>;
	}

	.header-shrink .navigation ul li > a {
	background-color: <?php echo esc_attr( $main_nav_bg_touch_color ) ?>;
	}

<?php endif; ?>


<?php if (!empty($main_nav_touch_color_hover)): ?>

	.navigation ul ul a:hover,
	.navigation ul ul .current-menu-item > a,
	.navigation ul ul .current-menu-parent > a,
	.navigation ul ul .current-menu-ancestor > a,
	.navigation ul ul .current_page_item > a,
	.navigation ul ul .current_page_parent > a,
	.navigation ul ul .current_page_ancestor > a { color: <?php echo esc_attr( $main_nav_touch_color_hover ) ?>; }

	.header-shrink .navigation ul ul a:hover,
	.header-shrink .navigation ul ul .current-menu-item > a,
	.header-shrink .navigation ul ul .current-menu-parent > a,
	.header-shrink .navigation ul ul .current-menu-ancestor > a,
	.header-shrink .navigation ul ul .current_page_item > a,
	.header-shrink .navigation ul ul .current_page_parent > a,
	.header-shrink .navigation ul ul .current_page_ancestor > a { color: <?php echo esc_attr( $main_nav_touch_color_hover ) ?>; }

<?php endif; ?>

}

/*************************** Buttons *****************************/


<?php if (!empty($buttons_text_color) || !empty($buttons_border_color) || !empty($buttons_hover_text_color) || !empty($buttons_hover_bg_color)): ?>

	.button.default,
	.widget_tag_cloud .tagcloud a,
	.mixitup-page-list .control,
	.pagenavi .page-numbers,
	.button.turquoise:hover,
	.form-submit #submit {
	color: <?php echo esc_attr( $buttons_text_color ) ?>;
	border-color: <?php echo esc_attr( $buttons_border_color ) ?>;
	}

	.button.default:hover,
	.widget_tag_cloud .tagcloud a:hover,
	.mixitup-page-list .controlactive,
	.mixitup-page-list .control:hover,
	.pagenavi .current,
	.pagenavi .page-numbers:hover,
	.button.turquoise,
	.form-submit #submit:hover {
	color: <?php echo esc_attr( $buttons_hover_text_color ) ?>;
	background-color: <?php echo esc_attr( $buttons_hover_bg_color ) ?>;
	}

<?php endif; ?>


/************************** Widgets *****************************/


<?php if (!empty($widget_title_color) || !empty($widget_text_color)) : ?>

	#sidebar .widget .widget-title {
	color: <?php echo esc_attr( $widget_title_color ) ?>;
	}

<?php endif; ?>
