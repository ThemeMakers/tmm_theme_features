<?php if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

/*
 * Plugin Name: ThemeMakers Accio Features
 * Plugin URI: http://webtemplatemasters.com
 * Description: Advanced Features for Accio Theme
 * Author: ThemeMakers
 * Version: 1.1.0
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
*/

/* Set constant path to the plugin directory. */
define( 'TMM_THEME_FEATURES_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'TMM_THEME_FEATURES_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

include_once ABSPATH . 'wp-includes/widgets/class-wp-widget-text.php';

/* Include Plugin Helper */
include_once TMM_THEME_FEATURES_PATH . '/helper.php';

/* Include Classes */
require_once TMM_THEME_FEATURES_PATH . 'classes/theme-features.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/portfolio.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/staff.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/testimonials.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/page.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/onepage.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/contact_form.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/custom_sidebars.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/walker.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/demo/index.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/sliders/index.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/thememakers.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/theme_widgets.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/helper_fonts.php';

/* Include plugin helper */
//require_once TMM_THEME_FEATURES_PATH . '/theme_options/sections/tab_styling/tab_styling.php';