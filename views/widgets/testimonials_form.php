<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('title') ) ?>"><?php esc_html_e('Title', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('title') ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('post_id') ) ?>"><?php esc_html_e('Select Testimonial', 'accio') ?>:</label>
    <select id="<?php echo esc_attr( $widget->get_field_id('post_id') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('post_id') ) ?>" class="widefat">
		<?php $testimonials = get_posts(array('numberposts' => -1, 'post_type' => TMM_Testimonials::$slug)); ?>
		<?php foreach ($testimonials as $post) : ?>
			<option <?php echo esc_attr( ($post->ID == $instance['post_id'] ? "selected" : "") ) ?> value="<?php echo esc_attr( $post->ID ) ?>"><?php echo esc_attr( $post->post_name ) ?></option>
		<?php endforeach; ?>
    </select>
</p>