<?php if (!defined('ABSPATH')) die('No direct access allowed');

$unique_id = isset($index) ? $index : uniqid();
$google_fonts = TMM_HelperFonts::get_google_fonts_list();
$content_fonts = TMM_HelperFonts::get_default_fonts_list();
$fonts = array_merge($content_fonts, $google_fonts);
?>
<div class="slide-item" id="slide_item_<?php echo esc_attr( $unique_id ) ?>">

	<div class="slide-dragger"></div>

    <div class="slide-thumb">
		<img src="<?php echo esc_url(TMM_Helper::resize_image($group['imgurl'], '100*100')) ?>" alt="slide" />
		<input type="hidden" name="slides_group[<?php echo esc_attr( $unique_id ) ?>][imgurl]" value="<?php echo esc_attr($group['imgurl']) ?>" />
		<a href="#" class="button js_edit_slide" data-slide-id="<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e('Edit Image', 'accio'); ?></a>
	</div>

    <a href="#" class="js_delete_slide" slide-id="<?php echo esc_attr( $unique_id ) ?>" title="<?php esc_html_e('Delete Slide', 'accio'); ?>"><?php esc_html_e('Delete Slide', 'accio'); ?></a>

	<?php if (!empty(TMM_Ext_Sliders::$slider_options)): ?>

		<div id="slide_options_<?php echo esc_attr( $unique_id ) ?>" class="slide-options-dialog" dialog-id="<?php echo esc_attr( $unique_id ) ?>">
			<?php foreach (TMM_Ext_Sliders::$slider_options as $slider_key => $slider) : ?>

				<?php
				if ($slider_key == 'layerslider') {
					continue;
				}
				?>

				<h3 class="attr_title"><?php echo esc_html( $slider['name'] ) ?></h3>

				<div class="attr_wrapper_options hide">
					<?php if (!empty($slider['fields'])): ?>
						<?php foreach ($slider['fields'] as $field_key => $field) : ?>

							<div class="slide-attr">

								<?php if ($field['type'] == 'textinput'): ?>
									<h4><?php echo esc_html( $field['name'] ) ?>:</h4>
									<input type="text" class="left" name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][<?php echo esc_attr( $field_key ) ?>]" value="<?php echo esc_attr( $group[$slider_key][$field_key] ) ?>" />
								<?php endif; ?>

								<?php if ($field['type'] == 'textarea'): ?>
									<h4><?php echo esc_html( $field['name'] ) ?>:</h4>
									<textarea name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][<?php echo esc_attr( $field_key ) ?>]"><?php echo esc_attr( $group[$slider_key][$field_key] ) ?></textarea>
								<?php endif; ?>

								<?php if ($field['type'] == 'checkbox'): ?>
									<?php $label_id = uniqid() ?>
									<input id="<?php echo esc_attr( $label_id ) ?>" type="checkbox" <?php if ($group[$slider_key][$field_key]): ?>checked<?php endif; ?> class="option_checkbox" name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][<?php echo esc_attr( $field_key ) ?>]" value="<?php echo esc_attr( (int) $group[$slider_key][$field_key] ) ?>" />
									<label for="<?php echo esc_attr( $label_id ) ?>"><?php echo esc_attr( $field['name'] ) ?></label>
								<?php endif; ?>

								<?php if (!empty($field['field_options'])): ?>
									<div class="attr-options">
										<?php foreach ($field['field_options'] as $option_key => $option_name) : ?>
											<div class="option">
												<?php
												$option_value = $group[$slider_key]["field_values"][$field_key][$option_key];
												if (empty($option_value)) {
													$option_value = $field['field_options_defaults'][$option_key];
												}
												?>

												<?php if ($option_key == 'font_family'): ?>
													<select name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][field_values][<?php echo esc_attr( $field_key ) ?>][<?php echo esc_attr( $option_key ) ?>]">
														<?php foreach ($fonts as $font_name) : ?>
															<?php
															$font_clean_name = explode(":", $font_name);
															$font_clean_name = $font_clean_name[0];
															?>
															<option <?php echo esc_attr( ($font_clean_name == $option_value ? "selected" : "") ) ?> value="<?php echo esc_attr( $font_clean_name ) ?>"><?php echo esc_html( $font_name ) ?></option>
														<?php endforeach; ?>
													</select>
												<?php endif; ?>

												<?php if ($option_key == 'font_size'): ?>
													<?php
													$font_sizes = array();
													for ($i = 8; $i <= 32; $i++) {
														$font_sizes[] = $i;
													}
													?>
													<select name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][field_values][<?php echo esc_attr( $field_key ) ?>][<?php echo esc_attr( $option_key ) ?>]">
														<option value=""></option>
														<?php foreach ($font_sizes as $size) : ?>
															<option <?php echo esc_attr( ($size == $option_value ? "selected" : "") ) ?> value="<?php echo esc_attr( $size ) ?>"><?php echo esc_attr( $size ) ?></option>
														<?php endforeach; ?>
													</select>
												<?php endif; ?>

												<?php if ($option_key == 'font_color'): ?>
													<input type="text" name="slides_group[<?php echo esc_attr( $unique_id ) ?>][<?php echo esc_attr( $slider_key ) ?>][field_values][<?php echo esc_attr( $field_key ) ?>][<?php echo esc_attr( $option_key ) ?>]" value="<?php echo esc_attr( $option_value ) ?>" class="bg_hex_color small left">
													<div style="background-color: <?php echo esc_attr( $option_value ) ?>;" class="bgpicker"></div>
												<?php endif; ?>

											</div>
										<?php endforeach; ?>
									</div>
									<div class="clear"></div>
								<?php endif; ?>

							</div>

						<?php endforeach; ?>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="clear"></div>
	<?php endif; ?>

</div>