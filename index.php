<?php

/**
 * Plugin Name: ThemeMakers Cardealer Features
 * Plugin URI: https://webtemplatemasters.com
 * Description: Advanced Features for Cardealer Theme
 * Author: ThemeMakers
 * Version: 1.1.5
 * Author URI: https://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('tmm_theme_features_load_textdomain')) {
    function tmm_theme_features_load_textdomain()
    {
        load_plugin_textdomain('tmm_theme_features', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
}

add_action('plugins_loaded', 'tmm_theme_features_load_textdomain');

// Include the class file
require_once plugin_dir_path(__FILE__) . 'includes/class-tmm-theme-features.php';

// Initialize the class
new TMM_Theme_Features();

// Include migration script
require_once plugin_dir_path(__FILE__) . 'includes/carproducer-migration.php';

// Hook into plugin activation
function run_carproducer_migration_on_activation()
{
    migrate_carproducer_structure_once();
}
register_activation_hook(__FILE__, 'run_carproducer_migration_on_activation');

// Include select2
require_once plugin_dir_path(__FILE__) . 'includes/select2-feature.php';
