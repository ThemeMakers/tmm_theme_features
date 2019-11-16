<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="widget widget_contact_us">

	<?php if (!empty($instance['title'])): ?>
		<h3 class="widget-title"><?php echo esc_html( $instance['title'] ) ?></h3>
	<?php endif; ?>

	<ul class="contact-details">
		<?php if (!empty($instance['address'])): ?>
			<li class="contact-icon-address">
				<span><?php echo esc_html__('Address', 'accio') ?>:</span> <?php echo esc_html( $instance['address'] ) ?>
			</li>
		<?php endif; ?>

		<?php if (!empty($instance['phone'])): ?>
			<li class="contact-icon-phone">
				<span><?php echo esc_html__('Phone', 'accio') ?>:</span> <?php echo esc_attr( $instance['phone'] ) ?>
			</li>
		<?php endif; ?>

		<?php if (!empty($instance['email'])): ?>
			<li class="contact-icon-email">
				<span><?php echo esc_html__('E-Mail', 'accio') ?>:</span> <a href="mailto:<?php echo sanitize_email( $instance['email'] ) ?>"><?php echo sanitize_email( $instance['email'] ) ?></a>
			</li>	
		<?php endif; ?>	
	</ul><!--/ .contact-details-->

</div><!--/ .widget-container-->