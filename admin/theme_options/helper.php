<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_OptionsHelper {

	public static $sections = array();

	public static $google_fonts = array(
		"Roboto:100,300,300italic,400,700|Julius+Sans+One|Roboto+Condensed:300,400"
	);

	/*
	 * Drawing theme option for admin panel
	 */

	public static function draw_theme_option($data, $prefix = TMM_THEME_PREFIX) {

		$value = "";
		$title = "";

		if ( isset( $data['value'] ) ) {
			$value = $data['value'];
		} else {
			$value = TMM::get_option($data['name'], $prefix);
		}

		if ( isset( $data['default_value'] ) && ! isset( $value ) ) {
			$value = $data['default_value'];
		}

		if ( isset( $data['title'] ) && isset( $data['show_title'] ) && $data['show_title'] ) {
			$title = '<h4 class="option-title">' . $data['title'] . '</h4>';
		}


		switch ($data['type']) {
			case 'slider':
				?>
				<div class="option option-slider">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<input data-default-value="<?php echo esc_attr( $data['default_value'] ) ?>" type="text" name="<?php echo esc_attr( $data['name'] ) ?>" value="<?php echo esc_attr($value) ?>" min-value="<?php echo esc_attr( $data['min'] ) ?>" max-value="<?php echo esc_attr($data['max']) ?>" class="ui_slider_item" />
					</div>

					<div class="explain"><?php echo wp_kses_post( $data['description'] ) ?></div>

				</div>
				<?php
				break;
			case 'text':
				?>
				<div class="option option-text">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<input data-default-value="<?php echo esc_attr( $data['default_value'] ) ?>" type="text" class="<?php echo esc_attr( $data['css_class'] ) ?>" name="<?php echo esc_attr( $data['name'] ) ?>" value="<?php echo esc_attr( $value ) ?>">
					</div><!--/ .controls-->

					<div class="explain"><?php echo wp_kses_post( $data['description'] ) ?></div>

				</div>
				<?php
				break;
			case 'textarea':
				?>
				<div class="option option-textarea">

					<?php echo wp_kses_post( $title ); ?>

					<textarea data-default-value="<?php echo esc_attr($data['default_value']) ?>" name="<?php echo esc_attr($data['name']) ?>" class="<?php echo esc_attr($data['css_class']) ?>"><?php echo esc_html($value) ?></textarea>

					<div class="explain">
						<?php echo wp_kses_post($data['description']) ?>
					</div>

				</div>
				<?php
				break;
			case 'select':

				if (($data['name']=='frontpage' || $data['name']=='blogpage' || $data['name']=='folio_page_onepage' )&&(function_exists('icl_object_id')))
					$value = icl_object_id($value, 'page', false, ICL_LANGUAGE_CODE);

				?>
				<div class="option option-select">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<select data-default-value="<?php echo esc_attr($data['default_value']) ?>" name="<?php echo esc_attr($data['name']) ?>" class="<?php echo esc_attr($data['css_class']) ?>">
							<?php if (!empty($data['values'])): ?>
								<?php foreach ($data['values'] as $key => $option_text) : ?>
									<option value="<?php echo esc_attr($key) ?>" <?php echo wp_kses_post( ($value == $key ? 'selected=""' : "") ) ?>><?php echo esc_html($option_text) ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>

					<div class="explain"><?php echo wp_kses_post($data['description']) ?></div>

				</div>
				<?php
				break;
			case 'checkbox':
				?>
				<div class="option option-checkbox">

					<div class="controls">
						<input data-default-value="<?php echo esc_attr($data['default_value']) ?>" type="hidden" value="<?php echo esc_attr( ($value == 1 ? "1" : "0") ) ?>" name="<?php echo esc_attr($data['name']) ?>">
						<input type="checkbox" id="<?php echo esc_attr($data['name']) ?>" class="option_checkbox <?php echo esc_attr($data['css_class']) ?>" <?php echo esc_attr( ($value == 1 ? "checked" : "") ) ?> />
						<label for="<?php echo esc_attr($data['name']) ?>"><span></span><?php echo esc_html( isset($data['title']) ? $data['title'] : '') ?></label>
					</div>

					<div class="explain">
						<?php echo wp_kses_post($data['description']) ?>
					</div>

				</div>
				<?php
				break;
			case 'color':
				?>
				<div class="option option-color">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<input data-default-value="<?php echo esc_attr( $data['default_value'] ) ?>" value-index="0" type="text" class="bg_hex_color text small <?php echo esc_attr( $data['css_class'] ) ?>" value="<?php echo esc_attr( $value ) ?>" name="<?php echo esc_attr( $data['name'] ) ?>">
						<div class="bgpicker" style="background-color: <?php echo esc_attr( $value ) ?>"></div>

						<?php if ($_GET['page'] == 'tmm_theme_options'): ?>
							<a href="javascript:void(0);" class="js_picker_val_back" title="Back">back</a>&nbsp;
							<a href="javascript:void(0);" class="js_picker_val_ahead" title="Forward">forward</a>&nbsp;
							<a href="javascript:void(0);" class="js_picker_val_reset" title="Reset">reset</a>
						<?php endif; ?>
					</div>

					<div class="explain"><?php echo wp_kses_post($data['description']) ?></div>

				</div>
				<?php
				break;

			case 'google_font_select':

					$fonts = array_merge(TMM_HelperFonts::get_default_fonts_list(),TMM_HelperFonts::get_google_fonts_list());

				?>
				<div class="option option-select-browse">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<select data-default-value="<?php echo esc_attr($data['default_value']) ?>" name="<?php echo esc_attr($data['name']) ?>" class="google_font_select">

							<?php foreach ($fonts as $font_name => $font_text): ?>

								<?php
									if( isset($font_text->variants) ) {
										$f_name = $font_text->family . ':' . implode( ",", $font_text->variants );
									} else {
										$f_name = $font_text->family;
									}
								?>

								<option <?php echo esc_attr( ($f_name == $value ? "selected" : "") ) ?> value="<?php echo esc_attr($f_name); ?>"><?php echo esc_html($font_text->family); ?></option>

							<?php endforeach; ?>

						</select>
					</div>

					<div class="explain"><?php echo wp_kses_post($data['description']) ?></div>

				</div>

				<?php
				break;

			case 'upload':
				?>
				<div class="option option-upload">

					<?php echo wp_kses_post( $title ); ?>

					<div class="controls">
						<input data-default-value="" <?php if (isset($data['id'])): ?>id="<?php echo esc_attr($data['id']) ?>"<?php endif; ?> class="middle" type="text" name="<?php echo esc_attr($data['name']) ?>" value="<?php echo esc_attr($value) ?>">
						<a class="admin-button button_upload" href="#"><?php esc_html_e('Browse', 'accio'); ?></a>
					</div>

					<div class="explain"><?php echo wp_kses_post($data['description']) ?></div>

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

	public static function get_theme_buttons() {
		return array(
			'default' => esc_html__('Default', 'accio'),
			'turquoise' => esc_html__('Turquoise', 'accio')
		);
	}

	public static function get_theme_buttons_sizes() {
		return array(
			'default' => esc_html__('Default', 'accio'),
			'middle' => esc_html__('Middle', 'accio'),
			'large' => esc_html__('Large', 'accio'),
		);
	}

	public static function get_contacts_placeholder_icons() {
		return array(
			'' => "",
			'message-form-name' => esc_html__('Name', 'accio'),
			'message-form-email' => esc_html__('Email', 'accio'),
			'message-form-url' => esc_html__('URL', 'accio'),
			'message-form-message' => esc_html__('Message', 'accio')
		);
	}

}
