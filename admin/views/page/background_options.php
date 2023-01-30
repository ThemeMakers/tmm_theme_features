<?php if (!defined('ABSPATH')) die('No direct access allowed');

$page_sidebar_position = isset($page_sidebar_position) ? $page_sidebar_position : 'sbr';
$pagebg_type = isset( $pagebg_type ) ? $pagebg_type : "color";
$pagebg_type_image_option = isset( $pagebg_type_image_option ) ? $pagebg_type_image_option : "repeat";
?>
<input type="hidden" name="tmm_meta_saving" value="1" />

<div class="custom-page-options">

	<p>
		<strong><?php esc_html_e('Another page title', 'accio'); ?></strong>
	</p>

	<p>
		<input type="text" name="another_page_title" value="<?php if (isset($another_page_title)) echo esc_attr($another_page_title) ?>" />
	</p>

	<p>
		<strong><?php esc_html_e('Another page description', 'accio'); ?></strong>
	</p>

	<p>
		<textarea name="another_page_description"><?php if (isset($another_page_description)) echo esc_attr($another_page_description) ?></textarea>
	</p>
	
	<p>
		<strong><?php esc_html_e('Show Page Title', 'accio'); ?></strong>
	</p>
	
	<p>           
		<select name="show_page_title">			                       
			<option <?php if ((!empty($show_page_title))&&($show_page_title == 'yes')){ echo 'selected'; } ?> value="yes">Yes</option>
			<option <?php if (!empty($show_page_title)&&($show_page_title == 'no')){ echo 'selected'; } ?> value="no">No</option>
		</select>
	</p>

</div>


<div class="custom-page-options">
	
	<h4><?php esc_html_e('Page Background', 'accio'); ?></h4>
	
	<div class="bg-type-option">
		<select name="pagebg_type" class="pagebg_type">
			<?php
			$types = array(
				"default" => esc_html__( "Default", 'accio' ),
				"color"   => esc_html__( "Color", 'accio' ),
				"image"   => esc_html__( "Image", 'accio' ),
			);
			?>
			<?php foreach ($types as $key => $type) : ?>
				<option <?php echo esc_attr( ($key == $pagebg_type ? "selected" : "") ) ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $type ) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<ul id="pagebg_type_options">

		<li id="pagebg_type_image" style="display: none;">
			<p>
				<input type="text" value="<?php if (isset($pagebg_image)) echo esc_attr($pagebg_image); ?>" name="pagebg_image" class="pagebg_image" />&nbsp;
				<a href="#" class="button_upload body_pattern button"><?php esc_html_e('Upload', 'accio'); ?></a>
			</p>

			<div class="clear"></div>

			<label><?php esc_html_e('Set options', 'accio'); ?>:</label>
			<div class="sel right">
				<select name="pagebg_type_image_option" class="pagebg_type_image_option">
					<?php
					$options = array(
						"no-repeat" => "No Repeat",
						"repeat" => "Repeat",
						"repeat-x" => "Repeat-X",
						"fixed" => "Fixed",
					);
					?>
					<?php foreach ($options as $key => $option) : ?>
						<option <?php echo esc_attr( ($key == $pagebg_type_image_option ? "selected" : "") ) ?> value="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $option ) ?></option>
					<?php endforeach; ?>
				</select>
			</div>

		</li>
		<li id="pagebg_type_color" style="display: none;">
			<p><input type="text" class="colorpicker_input pagebg_color" value="<?php if (isset($pagebg_color)) echo esc_attr($pagebg_color); ?>" name="pagebg_color" placeholder="#ffffff" /></p>
		</li>
	</ul>

	<div class="clear"></div>

	<p><a style="float: right" href="#" class="body_pattern button button_reset"><?php esc_html_e('Reset', 'accio'); ?></a></p>

	<div class="clear"></div>
</div>


<div id="page-sidebar-position" class="clearfix">
	
	<hr>

	<h4><?php esc_html_e('Page Sidebar Position', 'accio'); ?></h4>
	<input type="hidden" value="<?php echo esc_attr( $page_sidebar_position ) ?>" name="page_sidebar_position" />

	<ul class="admin-page-choice-sidebar clearfix">
		<li class="lside<?php echo wp_kses_post( ($page_sidebar_position == "sbl" ? " current-item" : "") ) ?>"><a href="sbl" data-val="sbl"><?php esc_html_e('Left Sidebar', 'accio'); ?></a></li>
		<li class="wside<?php echo wp_kses_post( ($page_sidebar_position == "no_sidebar" ? " current-item" : "") ) ?>"><a href="no_sidebar" data-val="no_sidebar"><?php esc_html_e('Without Sidebar', 'accio'); ?></a></li>
		<li class="rside<?php echo wp_kses_post( ($page_sidebar_position == "sbr" ? " current-item" : "") ) ?>"><a href="sbr" data-val="sbr"><?php esc_html_e('Right Sidebar', 'accio'); ?></a></li>
	</ul>	
	
</div><!--/ #page-sidebar-position-->


<script type="text/javascript">
	
	jQuery(document).ready(function() {

		jQuery("#pagebg_type_<?php echo esc_attr( $pagebg_type ) ?>").show();

		jQuery("[name=pagebg_type]").on('change', function () {
			jQuery("#pagebg_type_options li").hide(200);
			jQuery("#pagebg_type_" + jQuery(this).val()).show(400);
		});

		jQuery(document.body).on('click', '.button_reset', function () {
			jQuery("#pagebg_type_options input").val("");
			jQuery("#pagebg_type_options select").val(0);
			return false;
		});

		jQuery(document.body).on('click', '.headerbg_button_reset', function () {
			jQuery("#headerbg_type_options input").val("");
			jQuery("#headerbg_type_options select").val(0);
			return false;
		});

		(function ($) {
			
			var select = $('[name=onepage]'),
				value = $('[name=onepage] :selected').val(),
				pageSidebar = $('#page-sidebar-position');
			
			function actionChange(value) {
				
				if (value !== 0) {
					if (pageSidebar.is(':visible')) {
						pageSidebar.slideUp(200);
					}
				}

				if (value == undefined || value == 0) {
					pageSidebar.slideDown(200);
				}	
			}
			
			actionChange(value);
			
			select.on('change', function () {
				var $this = $(this), 
					changeValue = $this.val();
				actionChange(changeValue);
			});
			
		})(jQuery);

	});
</script>