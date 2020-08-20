<?php if (!defined('ABSPATH')) die('No direct access allowed');

$logo_type = (TMM::get_option('logo_type') === null || TMM::get_option('logo_type') === '0') ? 'image' : 'text';
?>

<div class="option option-radio">
	
	<div class="controls">
		<input id="logotext" type="radio" class="showhide" data-show-hide="logo_text" name="logo_type" value="1" <?php echo esc_attr( ($logo_type === 'text' ? "checked" : "") ) ?> />
		<label for="logotext"><span></span><?php esc_html_e('Text', 'accio'); ?></label>
		<input id="logoimage" type="radio" class="showhide" data-show-hide="logo_img" name="logo_type" value="0" <?php echo esc_attr( ($logo_type === 'image' ? "checked" : "") ) ?> />
		<label for="logoimage"><span></span><?php esc_html_e('Image', 'accio'); ?></label>&nbsp; &nbsp;
	</div><!--/ .controls-->
	
	<div class="explain"></div>
	
</div><!--/ .option-->	

<ul class="show-hide-items">

	<li class="logo_img" <?php echo wp_kses_post( ($logo_type === 'image' ? "" : 'style="display:none;"') ) ?>>
		<div class="logo_wrapper">
			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'logo_img',
				'type' => 'upload',
				'default_value' => '',
				'title'=> esc_html__('Light Logo Variant (Front Page & Filled Navigation Bar)', 'accio'),
				'description' => esc_html__('The default theme logo gets displayed in case you keep the logo input field blank. Recommended Logo Dimensions: Max width  300px. In order to get your logo displayed properly and sharp on Retina ready displayed you would need to upload logo with the double dimensions of your main logo. For instance if your logo is 300x100 you need to upload 600x200.', 'accio'),
				'id' => '',
				'show_title' => true,
			));
			?>

			<?php $logo_img = TMM::get_option('logo_img') ?>
			<div class="optional">
				<img id="logo_preview_image" style="display: <?php if ($logo_img): ?>inline<?php else: ?>none<?php endif; ?>; max-width:300px;" src="<?php echo esc_url($logo_img) ?>" alt="logo" />
			</div>
		</div>

		<div class="logo_wrapper">
			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => 'logo_img_secondary',
				'type' => 'upload',
				'default_value' => '',
				'title'=> esc_html__('Dark Logo Variant (All other pages)', 'accio'),
				'description' => esc_html__('Recommended Logo Dimensions: Max width  300px.', 'accio'),
				'id' => '',
				'show_title' => true,
			));
			?>

			<?php $logo_img_secondary = TMM::get_option('logo_img_secondary') ?>
			<div class="optional">
				<img id="logo_preview_image_secondary" style="display: <?php if ($logo_img_secondary): ?>inline<?php else: ?>none<?php endif; ?>; max-width:300px;" src="<?php echo esc_url($logo_img_secondary) ?>" alt="logo" />
			</div>
		</div>

	</li>
	<li class="logo_text" <?php echo wp_kses_post( ($logo_type === 'text' ? "" : 'style="display:none;"') ) ?>>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_text',
			'title'=> esc_html__('Logo Name', 'accio'),
			'type' => 'text',
			'description' => esc_html__('Type your website name here, it will appear instead of your Logo in text format.', 'accio'),
			'default_value' => esc_html__('Accio', 'accio'),
			'css_class' => '',
			'show_title' => true,
		));
		?>

		<?php
		$logo_font_size = array();
		for ($i = 40; $i < 61; $i++) {
			$logo_font_size[$i] = $i;
		}

		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_font_size',
			'type' => 'select',
			'title'=> esc_html__('Logo Font Size', 'accio'),
			'description' => '',
			'values' => $logo_font_size,
			'default_value' => 44,
			'css_class' => '',
			'show_title' => true,
			'is_reset' => true
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_font',
			'title' => esc_html__('Logo Font Family', 'accio'),
			'type' => 'google_font_select',
			'description' => '',
			'default_value' => 'Julius Sans One:regular',
			'is_reset' => true,
			'show_title' => true,
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => 'logo_text_color',
			'title' => esc_html__('Logo Text Color', 'accio'),
			'type' => 'color',
			'default_value' => '#232323',
			'description' => esc_html__('Can be applied for text logo only. Can not be used on One-Page page types', 'accio'),
			'css_class' => '',
			'is_reset' => true,
			'show_title' => true,
		));
		?>

	</li>
</ul>
