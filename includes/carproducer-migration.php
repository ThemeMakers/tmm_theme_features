<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

function migrate_carproducer_structure_once()
{
  $theme_version = wp_get_theme()->get('Version');
  $required_version = '1.6.5';
  $migration_done = get_option('carproducer_migration_done', false);

  // Check if migration is already done or if the theme version is above the required one
  if (version_compare($theme_version, $required_version, '>=') || $migration_done) {
    return;
  }

  $vehicle_type = 'auto';

  // Ensure the "auto" term exists
  $auto_term = get_term_by('name', $vehicle_type, 'carproducer');
  if (!$auto_term) {
    $auto_term = wp_insert_term($vehicle_type, 'carproducer');
    if (is_wp_error($auto_term)) {
      return; // Stop if there’s an issue
    }
    $auto_term_id = $auto_term['term_id'];
  } else {
    $auto_term_id = $auto_term->term_id;
  }

  // Get all existing top-level makes
  $makes = get_terms([
    'taxonomy' => 'carproducer',
    'hide_empty' => false,
    'parent' => 0 // Only top-level terms (makes)
  ]);

  foreach ($makes as $make) {
    wp_update_term($make->term_id, 'carproducer', ['parent' => $auto_term_id]);
  }

  // Mark migration as done
  update_option('carproducer_migration_done', true);
}
