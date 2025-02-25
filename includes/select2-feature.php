<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

function enqueue_select2_for_taxonomy()
{
  $screen = get_current_screen();

  // Apply only to your custom taxonomy edit and add pages
  if ($screen && in_array($screen->id, ['edit-carproducer', 'carproducer'])) {
    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', ['jquery'], '4.0.13', true);
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css', [], '4.0.13');

    wp_enqueue_script('custom-select2-init', plugins_url('includes/select2-init.js', dirname(__FILE__)), ['jquery', 'select2-js'], '1.0', true);
  }
}
add_action('admin_enqueue_scripts', 'enqueue_select2_for_taxonomy');

function fetch_taxonomy_terms()
{
  $taxonomy = $_GET['taxonomy'];
  $search = $_GET['term'];

  $terms = get_terms([
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
    'name__like' => $search,
    'number' => 10, // Limit results to 10 for performance
  ]);

  $results = [];
  foreach ($terms as $term) {
    $results[] = ['id' => $term->term_id, 'text' => $term->name];
  }

  wp_send_json($results);
}
add_action('wp_ajax_fetch_taxonomy_terms', 'fetch_taxonomy_terms');
