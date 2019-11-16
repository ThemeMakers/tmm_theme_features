<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('title') ) ?>"><?php esc_html_e('Title', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('title') ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('category') ) ?>"><?php esc_html_e('Posts Category', 'accio') ?>:</label>
	<?php
	$args = array(
		'hide_empty' => 0,
		'show_option_all' => esc_html__('All Categories', 'accio'),
		'echo' => 0,
		'selected' => $instance['category'],
		'hierarchical' => 0,
		'id' => $widget->get_field_id('category'),
		'name' => $widget->get_field_name('category'),
		'class' => 'widefat',
		'depth' => 0,
		'tab_index' => 0,
		'taxonomy' => 'category',
		'hide_if_empty' => false
	);
	echo wp_dropdown_categories($args);
	?>
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('post_count') ) ?>"><?php esc_html_e('Count', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('post_count') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('post_count') ) ?>" value="<?php echo esc_attr( $instance['post_count'] ) ?>" />
</p>

<p>
	<?php
	$checked = "";
	if ($instance['show_thumbnail'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_thumbnail') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_thumbnail') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_thumbnail') ) ?>"><?php esc_html_e('Display Thumbnail', 'accio') ?>:</label>
</p>

<p>
	<?php
	$checked = "";
	if ($instance['show_exerpt'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_exerpt') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_exerpt') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_exerpt') ) ?>"><?php esc_html_e('Display Excerpt', 'accio') ?></label>
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('exerpt_symbols_count') ) ?>"><?php esc_html_e('Excerpt symbols count', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('exerpt_symbols_count') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('exerpt_symbols_count') ) ?>" value="<?php echo esc_attr( $instance['exerpt_symbols_count'] ) ?>" />
</p>

<p>
	<?php
	$checked = "";
	if ($instance['show_see_all_button'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_see_all_button') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_see_all_button') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_see_all_button') ) ?>"><?php esc_html_e('Display "See all Posts" button', 'accio') ?></label>
</p>