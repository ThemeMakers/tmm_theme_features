<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
		
<div class="option option-add-form">

	<h4 classs="option-title"><?php esc_html_e('Create a new skin', 'accio'); ?></h4>
	
	<div class="controls">
		
		<input type="text" id="new_color_scheme_name" class="middle" placeholder="Type here new skin name" />
		<a href="#" class="add-button" id="save_current_color_scheme" title="<?php esc_html_e('Create new skin', 'accio'); ?>"></a>
		
	</div>
	
	
	<div class="explain"></div>
	
</div><!--/ .option-->

<div class="option option-select">
			
	<h4 class="option-title"><?php esc_html_e('Load Skin From', 'accio'); ?></h4>
	
	<div class="controls">
		
		<?php $theme_schemes = TMM_Ext_Demo::get_theme_schemes(); ?>
		
		<select id="color_schemes_select">
			<option value=""></option>
			<?php if (!empty($theme_schemes)): ?>
				<?php foreach ($theme_schemes as $value) : ?>
					<option style="color: <?php echo esc_attr( $value['color'] ) ?>;" value="<?php echo esc_attr( $value['key'] ) ?>" data-color="<?php echo esc_attr( $value['color'] ) ?>"><?php echo esc_html( $value['name'] ) ?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>

	</div>
	
	<div class="explain"></div>
	
</div><!--/ .option-->	

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name'           => '',
	'title'          => esc_html__( 'Color Mark', 'accio' ),
	'type'           => 'color',
	'default_value'  => '',
	'description'    => esc_html__( 'New skin name', 'accio' ),
	'css_class'      => 'new_color_scheme_color',
	'hide_item_html' => 1,
	'show_title'     => true,
	'placeholder'    => '#ffffff'
));
?>

<a href="#" class="admin-button button-gray button-medium" id="upload_color_scheme"><?php esc_html_e('Load', 'accio'); ?></a>
&nbsp;
<a href="#" class="admin-button button-gray button-medium" id="edit_color_scheme"><?php esc_html_e('Modify', 'accio'); ?></a>
&nbsp;
<a href="#" class="admin-button button-gray button-medium" id="delete_color_scheme"><?php esc_html_e('Delete', 'accio'); ?></a>
