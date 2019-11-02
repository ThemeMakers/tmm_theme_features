<?php if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

/*
 * Plugin Name: ThemeMakers Accio Features
 * Plugin URI: http://webtemplatemasters.com
 * Description: Advanced Features for Accio Theme
 * Author: ThemeMakers
 * Version: 1.0.1
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
*/

/* Set constant path to the plugin directory. */
define( 'TMM_THEME_FEATURES_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/* Include Classes */
require_once TMM_THEME_FEATURES_PATH . 'classes/theme-features.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/portfolio.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/staff.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/testimonials.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/page.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/onepage.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/contact_form.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/custom_sidebars.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/seo_group.php';
require_once TMM_THEME_FEATURES_PATH . 'classes/walker.php';