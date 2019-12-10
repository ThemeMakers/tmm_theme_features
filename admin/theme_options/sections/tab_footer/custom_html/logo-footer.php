<?php if (!defined('ABSPATH')) die('No direct access allowed');

$footer_logo_type = (TMM::get_option('footer_logo_type') === null || TMM::get_option('footer_logo_type') === '0') ? 'image' : 'text';
?>

<div class="option option-radio">
	
	<div class="controls">
		<input id="footer_logotext" type="radio" class="showhide" data-show-hide="footer_logo_text" name="footer_logo_type" value="1" <?php echo esc_attr( ($footer_logo_type === 'text' ? "checked" : "") ) ?> />
		<label for="footer_logotext"><span></span><?php esc_html_e('Text', 'accio'); ?></label>
		<input id="footer_logoimage" type="radio" class="showhide" data-show-hide="footer_logo_img" name="footer_logo_type" value="0" <?php echo esc_attr( ($footer_logo_type === 'image' ? "checked" : "") ) ?> />
		<label for="footer_logoimage"><span></span><?php esc_html_e('Image', 'accio'); ?></label>
	</div><!--/ .controls-->
	
	<div class="explain"></div>
	
</div><!--/ .option-->	

<ul class="show-hide-items">

	<li class="footer_logo_img" <?php echo wp_kses_post( ($footer_logo_type === 'image' ? "" : 'style="display:none;"') ) ?>>
		
		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'footer_logo_img',
			'type' => 'upload',
			'default_value' => '',
			'description' => esc_html__('The website title gets displayed in case you keep the logo input field blank. Recommended Dimensions: 300x100px', 'accio'),
			'id' => '',
		));
		?>

		<?php $footer_logo_img = TMM::get_option('footer_logo_img') ?>
		<div class="optional">
			<img id="footer_logo_preview_image" style="display: <?php if ($footer_logo_img): ?>inline<?php else: ?>none<?php endif; ?>; max-width:300px;" src="<?php echo esc_url($footer_logo_img) ?>" alt="logo" />
		</div>
		
	</li>
	<li class="footer_logo_text" <?php echo wp_kses_post( ($footer_logo_type === 'text' ? "" : 'style="display:none;"') ) ?>>
		
		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'footer_logo_text',
			'title'=> esc_html__('Logo Name', 'accio'),
			'type' => 'text',
			'description' => esc_html__('Type your website name here, it will appear instead of your Logo in text format.', 'accio'),
			'default_value' => esc_html__('Accio', 'accio'),
			'css_class' => '',
		));
		?>
		
	</li>
</ul>
