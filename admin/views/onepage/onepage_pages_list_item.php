<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<li>
	<dl class="menu-item-bar">
		<dt class="menu-item-handle">
		<span class="item-title"><span class="menu-item-title"><?php echo esc_html($page->post_title) ?></span></span>
		<span class="item-controls">						
			<a href="#" class="item-delete"><?php esc_html_e("Delete", 'accio') ?></a>
		</span>
		</dt>
	</dl>
	<input type="hidden" name="onepage[]" value="<?php echo esc_attr($page_id) ?>" />
</li>