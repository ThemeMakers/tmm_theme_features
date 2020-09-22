<?php if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

function tmm_tf_admin_scripts() {
    wp_enqueue_style( 'tmm_admin_styles_css', TMM_THEME_FEATURES_URI . 'admin/css/styles.css' );
    wp_enqueue_style( 'tmm_theme_options', TMM_THEME_FEATURES_URI . 'admin/theme_options/css/styles.css' );
    wp_enqueue_script( 'tmm_theme_options', TMM_THEME_FEATURES_URI . 'admin/theme_options/js/options.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'tmm_theme_cache', TMM_THEME_FEATURES_URI . 'admin/js/js.cookie.js', array( 'jquery' ), false, true );
    wp_enqueue_style( 'tmm_theme_popup', TMM_THEME_FEATURES_URI . 'admin/js/tmm_popup/styles.css' );
    wp_enqueue_script( 'tmm_theme_popup', TMM_THEME_FEATURES_URI . 'admin/js/tmm_popup/tmm_advanced_wp_popup.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'tmm_theme_custom_sidebars', TMM_THEME_FEATURES_URI . 'admin/theme_options/js/custom_sidebars.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'tmm_theme_form_constructor', TMM_THEME_FEATURES_URI . 'admin/theme_options/js/form_constructor.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'tmm_theme_selectivizr', TMM_THEME_FEATURES_URI . 'admin/theme_options/js/selectivizr-and-extra-selectors.min.js', array( 'jquery' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'tmm_tf_admin_scripts' );