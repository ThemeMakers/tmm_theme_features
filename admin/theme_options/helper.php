<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_OptionsHelper
{

	public static $sections = array();

	/*
	 * Drawing theme option for admin panel
	 */

	public static function draw_theme_option($data, $prefix = TMM_THEME_PREFIX)
	{

		$default_value = isset($data['default_value']) ? $data['default_value'] : '';
		$value = array_key_exists('value', $data) ? $data['value'] : TMM::get_option($data['name'], $prefix);
		if ($value === null || $value === '') {
			$value = $default_value;
		}

		$title = (!empty($data['title']) && !empty($data['show_title']))
			? '<h4 class="option-title">' . esc_html($data['title']) . '</h4>'
			: '';

		$id = isset($data['id']) ? $data['id'] : '';
		$css_class = isset($data['css_class']) ? $data['css_class'] : '';
		$description = isset($data['description']) ? $data['description'] : '';
		$min = isset($data['min']) ? $data['min'] : '';
		$max = isset($data['max']) ? $data['max'] : '';

		switch ($data['type']) {
			case 'slider':
?>
				<div class="option option-slider">

					<?php echo wp_kses_post($title); ?>

					<div class="controls">
						<input
							type="text"
							class="ui_slider_item"
							data-default-value="<?php echo esc_attr($default_value); ?>"
							name="<?php echo esc_attr($data['name']); ?>"
							value="<?php echo esc_attr($value); ?>"
							min-value="<?php echo esc_attr($min); ?>"
							max-value="<?php echo esc_attr($max); ?>" />
					</div>

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>
			<?php
				break;
			case 'text':
			?>
				<div class="option option-text">

					<?php echo wp_kses_post($title); ?>
					<div class="controls">
						<input
							type="text"
							data-default-value="<?php echo esc_attr($default_value) ?>"
							class="<?php echo esc_attr($css_class); ?>"
							name="<?php echo esc_attr($data['name']) ?>"
							value="<?php echo esc_attr($value) ?>" />
					</div><!--/ .controls-->

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>
			<?php
				break;
			case 'textarea':
			?>
				<div class="option option-textarea">

					<?php echo wp_kses_post($title); ?>

					<textarea
						data-default-value="<?php echo esc_attr($default_value) ?>"
						name="<?php echo esc_attr($data['name']) ?>"
						class="<?php echo esc_attr($css_class); ?>"><?php echo esc_html($value) ?></textarea>

					<div class="explain">
						<?php echo wp_kses_post($description); ?>
					</div>

				</div>
			<?php
				break;
			case 'select':
				if (in_array($data['name'], array('frontpage', 'blogpage', 'folio_page_onepage'), true) && function_exists('icl_object_id') && defined('ICL_LANGUAGE_CODE')) {
					$value = icl_object_id($value, 'page', false, ICL_LANGUAGE_CODE);
				}

			?>
				<div class="option option-select">

					<?php echo wp_kses_post($title); ?>

					<div class="controls">
						<select
							data-default-value="<?php echo esc_attr($default_value) ?>"
							name="<?php echo esc_attr($data['name']) ?>"
							class="<?php echo esc_attr($css_class); ?>">
							<?php if (!empty($data['values'])): ?>
								<?php foreach ($data['values'] as $key => $option_text) : ?>
									<option value="<?php echo esc_attr($key); ?>" <?php echo selected($value, $key, false); ?>><?php echo esc_html($option_text); ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>
			<?php
				break;
			case 'checkbox':
			?>
				<div class="option option-checkbox">

					<div class="controls">
						<input
							type="hidden"
							data-default-value="<?php echo esc_attr($default_value); ?>"
							value="<?php echo esc_attr(((int) $value === 1) ? '1' : '0'); ?>"
							name="<?php echo esc_attr($data['name']); ?>">
						<input
							type="checkbox"
							id="<?php echo esc_attr($data['name']); ?>"
							class="option_checkbox <?php echo esc_attr($css_class); ?>"
							<?php echo checked((int) $value, 1, false); ?> />
						<label for="<?php echo esc_attr($data['name']); ?>"><span></span><?php echo esc_html(isset($data['title']) ? $data['title'] : ''); ?></label>
					</div>

					<div class="explain">
						<?php echo wp_kses_post($description); ?>
					</div>

				</div>
			<?php
				break;
			case 'color':
			?>
				<div class="option option-color">

					<?php echo wp_kses_post($title); ?>

					<div class="controls">
						<input
							type="text"
							value-index="0"
							class="bg_hex_color text small <?php echo esc_attr($css_class); ?>"
							data-default-value="<?php echo esc_attr($default_value) ?>"
							value="<?php echo esc_attr($value) ?>"
							name="<?php echo esc_attr($data['name']) ?>" />
						<div class="bgpicker" style="background-color: <?php echo esc_attr($value) ?>"></div>

						<?php if (isset($_GET['page']) && $_GET['page'] === 'tmm_theme_options'): ?>
							<a href="javascript:void(0);" class="js_picker_val_back" title="Back">back</a>&nbsp;
							<a href="javascript:void(0);" class="js_picker_val_ahead" title="Forward">forward</a>&nbsp;
							<a href="javascript:void(0);" class="js_picker_val_reset" title="Reset">reset</a>
						<?php endif; ?>
					</div>

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>
			<?php
				break;

			case 'google_font_select':

				$fonts = array_merge((array) TMM_HelperFonts::get_default_fonts_list(), (array) TMM_HelperFonts::get_google_fonts_list());

			?>
				<div class="option option-select-browse">

					<?php echo wp_kses_post($title); ?>

					<div class="controls">
						<select
							data-default-value="<?php echo esc_attr($default_value) ?>"
							name="<?php echo esc_attr($data['name']) ?>"
							class="google_font_select">

							<?php foreach ($fonts as $font_name => $font_text): ?>

								<?php
								if (isset($font_text->variants)) {
									$f_name = $font_text->family . ':' . implode(",", $font_text->variants);
								} else {
									$f_name = $font_text->family;
								}
								?>

								<option value="<?php echo esc_attr($f_name); ?>" <?php echo selected($f_name, $value, false); ?>><?php echo esc_html($font_text->family); ?></option>

							<?php endforeach; ?>

						</select>
					</div>

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>

			<?php
				break;

			case 'upload':
			?>
				<div class="option option-upload">

					<?php echo wp_kses_post($title); ?>

					<div class="controls">
						<input
							type="text"
							data-default-value=""
							id="<?php echo esc_attr($id) ?>"
							class="middle <?php echo esc_attr($css_class); ?>"
							name="<?php echo esc_attr($data['name']) ?>"
							value="<?php echo esc_attr($value) ?>" />
						<a class="admin-button button_upload" href="#"><?php esc_html_e('Browse', 'accio'); ?></a>
					</div>

					<div class="explain"><?php echo wp_kses_post($description); ?></div>

				</div>
		<?php
				break;

			default:
				esc_html_e('Option type does not exist!', 'accio');
				break;
		}
		?>
		<?php if (isset($data['is_reset'])): ?>
			<script type="text/javascript">
				tmm_options_reset_array.push("<?php echo esc_js($data['name']) ?>");
			</script>
		<?php endif; ?>
<?php

	}

	public static function get_theme_buttons()
	{
		return array(
			'default' => esc_html__('Default', 'accio'),
			'turquoise' => esc_html__('Turquoise', 'accio')
		);
	}

	public static function get_theme_buttons_sizes()
	{
		return array(
			'default' => esc_html__('Default', 'accio'),
			'middle' => esc_html__('Middle', 'accio'),
			'large' => esc_html__('Large', 'accio'),
		);
	}

	public static function get_contacts_placeholder_icons()
	{
		return array(
			'' => "",
			'message-form-name' => esc_html__('Name', 'accio'),
			'message-form-email' => esc_html__('Email', 'accio'),
			'message-form-url' => esc_html__('URL', 'accio'),
			'message-form-message' => esc_html__('Message', 'accio')
		);
	}
}
