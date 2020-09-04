<?php if (!defined('ABSPATH')) die('No direct access allowed');

$uniqid = uniqid(); ?>
<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('title') ) ?>"><?php esc_html_e('Title', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('title') ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('post_number') ) ?>"><?php esc_html_e('Post Number', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('post_number') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('post_number') ) ?>" value="<?php echo esc_attr( $instance['post_number'] ) ?>" />
</p>

<p>
    <label for="id_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e('Layout Style', 'accio') ?>:</label>
    <select id="id_<?php echo esc_attr( $uniqid ) ?>" name="<?php echo esc_attr( $widget->get_field_name('layout_style') ) ?>" class="widefat">
		<?php $layout_styles = array(1 => esc_html__('Layout Style 1', 'accio'), 2 => esc_html__('Layout Style 2', 'accio')); ?>
		<?php foreach ($layout_styles as $style_key => $style_name) : ?>
			<option <?php echo esc_attr( ($style_key == $instance['layout_style'] ? "selected" : "") ) ?> value="<?php echo esc_attr( $style_key ) ?>"><?php echo esc_html( $style_name ) ?></option>
		<?php endforeach; ?>
    </select>
</p>

<p class="style1_options_<?php echo esc_attr( $uniqid ) ?>" <?php if ($instance['layout_style'] == 1): ?>style="display: none;"<?php endif; ?>>
	<?php
	$checked = "";
	if ($instance['show_thumbnail'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_thumbnail') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_thumbnail') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_thumbnail') ) ?>"><?php esc_html_e('Show thumbnail', 'accio') ?></label>
</p>

<p class="style1_options_<?php echo esc_attr( $uniqid ) ?>" <?php if ($instance['layout_style'] == 1): ?>style="display: none;"<?php endif; ?>>
	<?php
	$checked = "";
	if ($instance['show_exerpt'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_exerpt') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_exerpt') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_exerpt') ) ?>"><?php esc_html_e('Show Exerpt', 'accio') ?></label>
</p>

<p class="style1_options_<?php echo esc_attr( $uniqid ) ?>" <?php if ($instance['layout_style'] == 1): ?>style="display: none;"<?php endif; ?>>
	<?php
	$checked = "";
	if ($instance['show_title'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_title') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_title') ) ?>"><?php esc_html_e('Display Title', 'accio') ?></label>
</p>

<p class="style1_options_<?php echo esc_attr( $uniqid ) ?>" <?php if ($instance['layout_style'] == 1): ?>style="display: none;"<?php endif; ?>>
    <label for="<?php echo esc_attr( $widget->get_field_id('exerpt_symbols_count') ) ?>"><?php esc_html_e('Exerpt Symbols Count', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('exerpt_symbols_count') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('exerpt_symbols_count') ) ?>" value="<?php echo esc_attr( $instance['exerpt_symbols_count'] ) ?>" />
</p>

<p class="style1_options_<?php echo esc_attr( $uniqid ) ?>" <?php if ($instance['layout_style'] == 1): ?>style="display: none;"<?php endif; ?>>
	<?php
	$checked = "";
	if ($instance['show_button'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_button') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_button') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_button') ) ?>"><?php esc_html_e('Show button', 'accio') ?></label>
</p>
<script type="text/javascript">
    jQuery(function() {
		jQuery(document.body).on('change', '#id_<?php echo esc_attr( $uniqid ) ?>', function() {
			if(parseInt(jQuery(this).val()) == 2){
				jQuery('.style1_options_<?php echo esc_js( $uniqid ) ?>').show(150);
			} else {
				jQuery('.style1_options_<?php echo esc_js( $uniqid ) ?>').hide(150);
			}

		});
	});


</script>