<?php if (!defined('ABSPATH')) die('No direct access allowed');

$folioposts_array = explode('^', $folioposts);

if(!isset($folioposts_array[$foliopost_key])){
	return;
}

if (!empty($folioposts_array)) {
	$foliopost = $folioposts_array[$foliopost_key];
} else {
	return "";
}
//***
$images = get_post_meta($foliopost, 'thememakers_portfolio', true);
if (!empty($images)) {
	foreach ($images as $k => $img) {
		if (!TMM_Helper::is_file_url_exists($img)) {
			unset($images[$k]);
		}
	}
}
//***
$current_col_algoritm_arr = explode(',', $current_col_algoritm);
$current_col_algoritm_arr = array_reverse($current_col_algoritm_arr);

//***
if ($columns == 3) {
	$columns_img_sizes = array('col1' => '300*190', 'col2' => '300*250', 'col3' => '300*310');
}

if ($columns == 4) {
	$columns_img_sizes = array('col1' => '228*170', 'col2' => '228*250', 'col3' => '228*340');
}
//***

$counter = 0;
?>

<?php if (!empty($images)): ?>
	<?php foreach ($images as $image): ?>
		<?php
		$col = $current_col_algoritm_arr[$counter];
		$counter++;
		if ($counter >= count($current_col_algoritm_arr))
			$counter = 0;
		?>
		<article class="box <?php echo esc_attr( $col ) ?> masonry_piece_<?php echo esc_attr( $foliopost_key ) ?>" style="opacity: 0">
			<div class="work-item">
				<img src="<?php echo esc_url(TMM_Helper::resize_image($image, $columns_img_sizes[$col])) ?>" />

				<div class="image-extra">

					<div class="extra-content">
						
						<div class="inner-extra">
					
							<a class="single-image link-icon" href="<?php echo esc_url(get_permalink($foliopost)) ?>"><?php echo esc_html__('Permalink', 'accio') ?></a>
							<a class="single-image plus-icon" data-gall="masonry" href="<?php echo esc_url($image) ?>"><?php echo esc_html__('Image', 'accio') ?></a>

						</div>
	
					</div><!--/ .extra-content-->	

				</div><!--/ .image-extra-->
			</div>
		</article><!--/ .box-->
	<?php endforeach; ?>	
<?php endif; ?>
<?php if (!empty($folioposts_array) AND isset($folioposts_array[$foliopost_key + 1])): ?>
	<?php $current_col_algoritm = implode(',', $current_col_algoritm_arr); ?>
	<div id="masonryjaxloader" data-next-post-key="<?php echo esc_attr( ($foliopost_key + 1) ) ?>" data-posts="<?php echo esc_attr($folioposts) ?>" data-col-algoritm="<?php echo esc_attr($current_col_algoritm) ?>"></div>
<?php endif; ?>
