<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php if (!empty($onepage) AND is_array($onepage)): ?>	
	<?php foreach ($onepage as $page_id) : ?>     

            <?php 
            if (function_exists('icl_object_id')){
                $page_id = icl_object_id($page_id, 'page', false, ICL_LANGUAGE_CODE); 
            }
            
            $post = get_post($page_id);
            $slug = $post->post_name;
            ?>

		<section class="page" id="<?php echo esc_attr($slug); ?>">
			<?php tmm_layout_content($page_id/*, TRUE*/); ?>
		</section>
	<?php endforeach; ?>
<?php endif;


