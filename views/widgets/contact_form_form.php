<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('title') ) ?>"><?php esc_html_e('Title', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('title') ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('form') ) ?>"><?php esc_html_e('Form', 'accio') ?>:</label>
    <select id="<?php echo esc_attr( $widget->get_field_id('form') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('form') ) ?>" class="widefat">
		<?php
		$contact_forms = TMM::get_option('contact_form');
		$current_form = $instance['form'];
		?>
		<?php if (!empty($contact_forms)) : ?>
			<?php foreach ($contact_forms as $contact_form) : ?>
				<option <?php echo esc_attr( ($current_form == $contact_form['title'] ? "selected" : "") ) ?> value="<?php echo esc_attr( $contact_form['title'] ) ?>"><?php echo esc_html( $contact_form['title'] ) ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
    </select>
</p>

<p>
	<label for="<?php echo esc_attr( $widget->get_field_id('animation') ) ?>"><?php esc_html_e('Animation', 'accio') ?>:</label>
	<select name="<?php echo esc_attr( $widget->get_field_name('animation') ) ?>" id="<?php echo esc_attr( $widget->get_field_id('animation') ) ?>" class="widefat">
		<?php foreach ($widget->css_anim() as $key => $value): ?>
			<option <?php if ($instance['animation'] == $key): ?>selected<?php endif; ?> value="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?></option>
		<?php endforeach; ?>
	</select>
</p>

<p>
	<small><?php esc_html_e("You can create a contact form from Theme Options->Contact Forms", 'accio') ?></small>
</p>