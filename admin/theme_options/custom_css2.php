<?php if (!defined('ABSPATH')) die('No direct access allowed');

echo wp_specialchars_decode( esc_html( TMM::get_option("custom_css") ), 'ENT_COMPAT'); ?>