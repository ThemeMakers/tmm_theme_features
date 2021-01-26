<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="js_contact_forms_panel">

	<div class="option option-add-form">

		<h4 class="option-title"><?php esc_html_e('Add New Form', 'accio'); ?></h4>

		<div class="controls">
			<input type="text" value="" placeholder="<?php esc_html_e("type title here", 'accio') ?>" id="new_contact_form_name" />
			<div class="add-button js_add_form"></div>
		</div><!--/ .controls-->
		<div class="explain"></div>

	</div><!--/ .option-->

	<hr />

	<ul class="groups contact_forms_groups_list">
		<?php unset($contact_forms['__INIQUE_ID__']); ?>
		<?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
			<?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>				
				<li>
					<a data-id="contact_form_<?php echo esc_attr($contact_form_id) ?>" class="js_edit_contact_form" href="#"><?php echo esc_html($contact_form['title']); ?></a>
					<a href="#" title="<?php esc_html_e("Delete", 'accio') ?>" class="remove delete_contact_form" data-id="contact_form_<?php echo esc_attr($contact_form_id) ?>"></a>
					<a data-id="contact_form_<?php echo esc_attr($contact_form_id) ?>" href="#" title="<?php esc_html_e("Edit", 'accio') ?>" class="edit js_edit_contact_form"></a>
				</li>
			<?php endforeach; ?>
		<?php else: ?>
			<li class="js_no_one_item_else"><span><?php esc_html_e('You have not created any group yet. Please create one using the form above.', 'accio'); ?></span></li>
		<?php endif; ?>
	</ul>
<br />
</div>

<input type="hidden" name="contact_form[]" value="" />
<ul id="contact_forms_list">
	<?php if (!empty($contact_forms) AND is_array($contact_forms)): ?>
		<?php foreach ($contact_forms as $contact_form_id => $contact_form) : ?>
			<?php
			if ($contact_form_id == '__INIQUE_ID__') {
				continue;
			}
			?>
			<li style="display: none;" id="contact_form_<?php echo esc_attr($contact_form_id) ?>">
				<?php echo TMM::draw_free_page($custom_html_pagepath . 'form.php', array('contact_form' => $contact_form)); ?>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>



<div style="display: none;" id="contact_form_template">

	<a href="#" class="admin-button button-gray js_back_to_forms_list"><?php esc_html_e('Back to forms list', 'accio'); ?></a>

	<br />
	<br />
	<br />

	<div class="section">

		<div class="form-holder">	

			<input type="hidden" name="contact_form[__INIQUE_ID__][inique_id]" value="__INIQUE_ID__" />

			<div class="form-group-title">
				<input type="text" class="form_name" value="__FORM_NAME__" name="contact_form[__INIQUE_ID__][title]">
			</div>
			
			<div class="option">
				
				<div class="switch">
					<input type="hidden" name="contact_form[__INIQUE_ID__][has_capture]" value="0" />
					<input type="checkbox" id="form-captcha-02" class="form_captcha option_checkbox" />
					<label for="form-captcha-02"><span></span><?php esc_html_e('Enable Captcha', 'accio'); ?></label>
					<input type="hidden" name="contact_form_index" value="__INIQUE_ID__" />
				</div><!--/ .switch-->		
			
			</div>

			<a href="#" class="add-drag-holder add-button add_contact_field_button" form-id="__INIQUE_ID__"></a>
			<a href="#" class="remove-drag-holder delete_contact_form" data-id="__INIQUE_ID__"></a><br />

			<div class="admin-drag-holder clearfix">

				<div class="contact_form_submit_button">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][submit_button]",
						'title' => esc_html__('Select submit button', 'accio'),
						'type' => 'select',
						'values' => TMM_OptionsHelper::get_theme_buttons(),
						'value' => '',
						'css_class' => '',
						'description' => esc_html__('Select Submit Button\'s color', 'accio'),
					));
					?>				
				</div>

				<div class="option option-text">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][recepient_email]",
						'title' => esc_html__('Recipient\'s e-mail field:', 'accio'),
						'type' => 'text',
						'value' => "",
						'css_class' => '',
						'description' => ''
					));
					?>
				</div>


				<div class="option option-text">
					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][submit_button_text]",
						'title' => esc_html__('Submit button text', 'accio'),
						'type' => 'text',
						'value' => esc_html__('Send', 'accio'),
						'css_class' => '',
						'description' => ''
					));
					?>
				</div>

			</div>

			<ul class="drag_contact_form_list">

				<li class="admin-drag-holder clearfix">

					<a href="#" class="delete_contact_field_button close"></a>

					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][inputs][0][type]",
						'title' => esc_html__('Choose Field Type', 'accio'),
						'type' => 'select',
						'values' => TMM_Contact_Form::$types,
						'value' => '',
						'css_class' => 'options_type_select',
						'description' => ''
					));
					?>

					<?php
					TMM_OptionsHelper::draw_theme_option(array(
						'name' => "contact_form[__INIQUE_ID__][inputs][0][label]",
						'title' => esc_html__('Field Label', 'accio'),
						'type' => 'text',
						'value' => "",
						'css_class' => 'label',
						'description' => ""
					));
					?>

					<div class="select_options" style="display: none;">

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[__INIQUE_ID__][inputs][0][options]",
							'title' => esc_html__('Options (comma separated)', 'accio'),
							'type' => 'text',
							'value' => '',
							'css_class' => 'options',
							'description' => ""
						));
						?>
					</div>

					<label class="with-check">
						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[__INIQUE_ID__][inputs][0][is_required]",
							'title' => esc_html__('Additional Options', 'accio'),
							'type' => 'checkbox',
							'default_value' => 0,
							'title' => esc_html__('Required Field', 'accio'),
							'description' => '',
							'css_class' => 'form_required',
							'value' => 0,
							'id' => ''
						));
						?>
					</label>

				</li><!--/ .admin-drag-holder-->

			</ul>

		</div><!--/ .form-holder-->	

	</div><!--/ .section-->

</div>

<div style="display: none;" id="contact_form_field_template">

	<li class="admin-drag-holder clearfix">

		<a href="#" class="delete_contact_field_button close"></a>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][type]",
			'title' => esc_html__('Choose Field Type', 'accio'),
			'type' => 'select',
			'values' => TMM_Contact_Form::$types,
			'value' => '',
			'css_class' => 'options_type_select',
			'description' => ''
		));
		?>

		<?php
		TMM_OptionsHelper::draw_theme_option(array(
			'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][label]",
			'title' => esc_html__('Field Label', 'accio'),
			'type' => 'text',
			'value' => "",
			'css_class' => 'label',
			'description' => ""
		));
		?>

		<div class="select_options" style="display: none;">

			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][options]",
				'title' => esc_html__('Options (comma separated)', 'accio'),
				'type' => 'text',
				'value' => '',
				'css_class' => 'options',
				'description' => ""
			));
			?>

		</div>

		<label class="with-check">
			<?php
			TMM_OptionsHelper::draw_theme_option(array(
				'name' => "contact_form[__INDEX__][inputs][__INPUTINDEX__][is_required]",
				'title' => esc_html__('Additional Options', 'accio'),
				'type' => 'checkbox',
				'default_value' => 0,
				'title' => esc_html__('Required Field', 'accio'),
				'description' => '',
				'css_class' => 'form_required',
				'value' => 0,
				'id' => ''
			));
			?>
		</label>

	</li><!--/ .admin-drag-holder-->

</div>


