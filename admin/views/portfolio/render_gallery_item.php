<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php $unique_id = uniqid() ?>
<li id="slide_item_<?php echo esc_attr( $unique_id ) ?>" class="gallery_item">
	<?php if (TMM_Helper::get_media_type($imgurl) == 'image'): ?>
		<img class="gallery_thumb" src="<?php echo esc_url(TMM_Helper::resize_image($imgurl, "100*100")) ?>" />
	<?php else: ?>
		<img class="gallery_thumb" src="<?php echo get_template_directory_uri() ?>/admin/images/folio_video_cover.jpg" />
	<?php endif; ?>

	<input type="hidden" name="tmm_portfolio[]" value="<?php echo esc_attr( $imgurl ) ?>" />
	<a href="#" class="delete_gallery_item" slide-id="<?php echo esc_attr( $unique_id ) ?>" title="<?php esc_html_e("Delete Item", 'accio') ?>"><?php esc_html_e("Delete Item", 'accio'); ?></a>
</li>