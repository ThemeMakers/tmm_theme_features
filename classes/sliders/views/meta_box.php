<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="slider">
	<p><?php esc_html_e("Slider type", 'accio') ?>:</p>
	<select name="page_slider_type">
		<?php foreach ($slider_types as $key => $type) : ?>
			<option <?php echo esc_attr( ($page_slider_type == $key ? "selected" : "") ) ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($type) ?></option>
		<?php endforeach; ?>
	</select>
	<?php
	$page_slider_widths = array(
		'wide'  => esc_html__( "wide", 'accio' ),
		'fixed' => esc_html__( "fixed", 'accio' ),
	);
	if (!isset($page_slider_width)) {
		$page_slider_width = 'wide';
	}
	?>
	<select name="page_slider_width">
		<?php foreach ($page_slider_widths as $key => $type) : ?>
			<option <?php echo esc_attr( ($page_slider_width == $key ? "selected" : "") ) ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($type) ?></option>
		<?php endforeach; ?>
	</select>

	<hr />

	<div class="native_sliders_groups" <?php if ($page_slider_type == 'layerslider' OR $page_slider_type == 'cuteslider'): ?>style="display: none;"<?php endif; ?>>
		<p><?php esc_html_e("Slider group", 'accio') ?>:</p>
		<?php if (!empty($slides)): ?>
			<select name="page_slider">
				<option value=""><?php esc_html_e("Choose slider group", 'accio') ?></option>
				<?php foreach ($slides as $key => $name) : ?>

					<option <?php echo esc_attr( ($page_slider == $key ? "selected" : "") ) ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_html($name) ?></option>

				<?php endforeach; ?>
			</select>
		<?php else: ?>
			<p><?php esc_html_e("You still haven't created any slider group.", 'accio') ?><br><a href="<?php echo admin_url('post-new.php?post_type=' . TMM_Ext_Sliders::$slug) ?>"><?php esc_html_e("Click here", 'accio') ?></a> <?php esc_html_e("to create one.", 'accio') ?></p>
		<?php endif; ?>
	</div>

	<?php if (function_exists('layerslider_init')): ?>
		<div id="layerslider_slidegroups" <?php if ($page_slider_type != 'layerslider'): ?>style="display: none;"<?php endif; ?>>

			<?php
			global $wpdb;
			$table_name = $wpdb->prefix . "layerslider";
			// Get sliders
			$sliders = $wpdb->get_results("SELECT * FROM $table_name
											WHERE flag_hidden = '0' AND flag_deleted = '0'
											ORDER BY id ASC LIMIT 200");
			?>
			<p><?php esc_html_e("Layerslider's groups", 'accio') ?>:</p>
			<select name="layerslider_slide_group">
				<option value=""><?php esc_html_e("Choose slider group", 'accio') ?></option>
				<?php if (!empty($sliders)) : ?>
					<?php foreach ($sliders as $item) : ?>
						<?php $name = empty($item->name) ? 'Unnamed' : $item->name; ?>
						<option <?php echo esc_attr( ($layerslider_slide_group == $item->id ? "selected" : "") ) ?> value="<?php echo esc_attr($item->id) ?>"><?php echo esc_html($name) ?></option>
					<?php endforeach; ?>
				<?php else: ?>
					<?php esc_html_e("You still haven't created any slider group for your Layerslider.", 'accio') ?>
				<?php endif; ?>
			</select>
		</div>
	<?php endif; ?>


	<?php if (function_exists('cuteslider_init')): ?>
		<div id="cutelider_slidegroups" <?php if ($page_slider_type != 'cuteslider'): ?>style="display: none;"<?php endif; ?>>

			<?php
			global $wpdb;
			$table_name = $wpdb->prefix . "cuteslider";
			// Get sliders
			$sliders = $wpdb->get_results("SELECT * FROM $table_name
											WHERE flag_hidden = '0' AND flag_deleted = '0'
											ORDER BY id ASC LIMIT 200");
			?>
			<p><?php esc_html_e("Cuteslider's groups", 'accio') ?>:</p>
			<div class="sel">
				<select name="cuteslider_slide_group">
					<option value=""><?php esc_html_e("Choose slider group", 'accio') ?></option>
					<?php if (!empty($sliders)) : ?>
						<?php foreach ($sliders as $item) : ?>
							<?php $name = empty($item->name) ? 'Unnamed' : $item->name; ?>
							<option <?php echo esc_attr( ($cuteslider_slide_group == $item->id ? "selected" : "") ) ?> value="<?php echo esc_attr($item->id) ?>"><?php echo esc_html($name) ?></option>
						<?php endforeach; ?>
					<?php else: ?>
						<?php esc_html_e("You still haven't created any slider group for your Cuteslider.", 'accio') ?>
					<?php endif; ?>
				</select>
			</div>
		</div>
	<?php endif; ?>
	<div class="clear"></div>
</div>

<script type="text/javascript">
	jQuery(function() {
		jQuery("[name='page_slider_type']").change(function() {

			var value = jQuery(this).val();
			if (value == 'layerslider') {
				jQuery(".native_sliders_groups").hide();
				jQuery("#cutelider_slidegroups").hide();
				jQuery("#layerslider_slidegroups").show();
				return;
			}

			if (value == 'cuteslider') {
				jQuery(".native_sliders_groups").hide();
				jQuery("#layerslider_slidegroups").hide();
				jQuery("#cutelider_slidegroups").show();
				return;
			}

			jQuery(".native_sliders_groups").show();
			jQuery("#layerslider_slidegroups").hide();
			jQuery("#cutelider_slidegroups").hide();

		});
	});
</script>