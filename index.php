<?php

/**
 * Plugin Name: ThemeMakers Cardealer Features
 * Plugin URI: http://webtemplatemasters.com
 * Description: Advanced Features for Cardealer Theme
 * Author: ThemeMakers
 * Version: 1.1.3
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Text Domain: tmm_theme_features
 */

class TMM_Theme_Features {

    private $text_domain;

    public function __construct() {
        // Set the text domain
        $this->text_domain = 'cardealer';

        // Hook into the activation of the plugin
        register_activation_hook(__FILE__, array($this, 'activate_plugin'));

        // Hook into the deactivation of the plugin
        register_deactivation_hook(__FILE__, array($this, 'deactivate_plugin'));

        // Hook into the initialization of WordPress
        add_action('init', array($this, 'load_text_domain'));
        add_action('init', array($this, 'register_post_types_and_taxonomy'));
    }

    public function activate_plugin() {
        // Code to run on plugin activation
    }

    public function deactivate_plugin() {
        // Code to run on plugin deactivation
    }

    public function load_text_domain() {
        // Load the text domain for translation
        load_plugin_textdomain($this->text_domain, false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function register_post_types_and_taxonomy() {
        $this->register_post_types();
        $this->register_taxonomy();
    }

    private function register_post_types() {
        $this->register_post_type('slidergroup', __('Slider Group', $this->text_domain), false, false, false, array('title', 'thumbnail'), false, array());
        $this->register_post_type('staff-page', __('Staff', $this->text_domain), false, true, true, array('title', 'thumbnail'), true, array('position'));
        $this->register_post_type('car', __('Cars', $this->text_domain), true, true, true, array('title', 'excerpt', 'tags', 'comments'), true, array('carlocation', 'carproducer'));
        // Add more post types as needed
    }

    private function register_post_type($post_type_slug, $post_type_label, $public, $publicly_queryable, $has_archive, $supports = array(), $show_in_admin_bar, $taxonomies = array()) {
        $labels = array(
            'name'               => esc_html_x($post_type_label, 'post type general name', $this->text_domain),
            'singular_name'      => esc_html_x($post_type_label, 'post type singular name', $this->text_domain),
            'add_new'            => esc_html__('Add New', $this->text_domain),
            'add_new_item'       => esc_html__('Add New ' . $post_type_label, $this->text_domain),
            'edit_item'          => esc_html__('Edit ' . $post_type_label, $this->text_domain),
            'new_item'           => esc_html__('New ' . $post_type_label, $this->text_domain),
            'all_items'          => esc_html__('All ' . $post_type_label, $this->text_domain),
            'view_item'          => esc_html__('View ' . $post_type_label, $this->text_domain),
            'search_items'       => esc_html__('Search ' . $post_type_label, $this->text_domain),
            'not_found'          => esc_html__('No ' . $post_type_slug . ' found', $this->text_domain),
            'not_found_in_trash' => esc_html__('No ' . $post_type_slug . ' found in Trash', $this->text_domain),
            'menu_name'          => esc_html__($post_type_label, $this->text_domain),
        );

        $args = array(
            'labels'              => $labels,
            'public'              => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'query_var'           => true,
            'capability_type'     => 'post',
            'has_archive'         => true,
            'hierarchical'        => true,
            'menu_position'       => null,
            'supports'            => $supports,
            'rewrite'             => array('slug' => sanitize_title($post_type_slug)),
            'show_in_admin_bar'   => true,
            'menu_icon'           => '',
            'taxonomies'          => $taxonomies,
        );

        // Register the post type
        register_post_type(sanitize_title($post_type_slug), $args);
    }

    private function register_taxonomy() {
        $this->register_taxonomy_for_post_type('carproducer', __('Producers', $this->text_domain), __('Producer', $this->text_domain), 'car', array('manage_terms'));
        // Add more taxonomies as needed
    }

    private function register_taxonomy_for_post_type($taxonomy_slug, $taxonomy_label, $singular_label, $post_type, $capabilities = array()) {
        $labels = array(
            'name'              => esc_html_x($taxonomy_label, 'taxonomy general name', $this->text_domain),
            'singular_name'     => esc_html_x($singular_label, 'taxonomy singular name', $this->text_domain),
            'search_items'      => esc_html__('Search ' . $taxonomy_label, $this->text_domain),
            'all_items'         => esc_html__('All ' . $taxonomy_label, $this->text_domain),
            'parent_item'       => esc_html__('Parent ' . $singular_label, $this->text_domain),
            'parent_item_colon' => esc_html__('Parent ' . $singular_label . ':', $this->text_domain),
            'edit_item'         => esc_html__('Edit ' . $singular_label, $this->text_domain),
            'update_item'       => esc_html__('Update ' . $singular_label, $this->text_domain),
            'add_new_item'      => esc_html__('Add New ' . $singular_label, $this->text_domain),
            'new_item_name'     => esc_html__('New ' . $singular_label . ' Name', $this->text_domain),
            'menu_name'         => esc_html__($taxonomy_label, $this->text_domain),
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array(
                'slug' => sanitize_title($taxonomy_slug),
                'hierarchical' => true
            ),
            'capabilities'      => array(),
            'orderby' => 'name',
        );

        // Register the taxonomy
        register_taxonomy(sanitize_title($taxonomy_slug), $post_type, $args);
    }
}

// Instantiate the class
$tmm_theme_features = new TMM_Theme_Features();
