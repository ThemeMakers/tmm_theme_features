<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('title') ) ?>"><?php esc_html_e('Title', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('title') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('title') ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />
</p>

<p>
	<label for="<?php echo esc_attr( $widget->get_field_id('animation') ) ?>"><?php esc_html_e('Animation', 'accio') ?>:</label>
	<select name="<?php echo esc_attr( $widget->get_field_name('animation') ) ?>" id="<?php echo esc_attr( $widget->get_field_id('animation') ) ?>" class="widefat">
		<?php foreach ($widget->css_anim() as $key => $value): ?>
			<option <?php if ($instance['animation'] == $key): ?>selected<?php endif; ?> value="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?></option>
		<?php endforeach; ?>
	</select> 
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('twitter_links') ) ?>"><?php esc_html_e('Twitter Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('twitter_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('twitter_links') ) ?>" value="<?php echo esc_attr( $instance['twitter_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('twitter_tooltip') ) ?>"><?php esc_html_e('Twitter Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('twitter_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('twitter_tooltip') ) ?>" value="<?php echo esc_attr( $instance['twitter_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('facebook_links') ) ?>"><?php esc_html_e('Facebook Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('facebook_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('facebook_links') ) ?>" value="<?php echo esc_attr( $instance['facebook_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('facebook_tooltip') ) ?>"><?php esc_html_e('Facebook Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('facebook_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('facebook_tooltip') ) ?>" value="<?php echo esc_attr( $instance['facebook_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('linkedin_links') ) ?>"><?php esc_html_e('Linkedin Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('linkedin_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('linkedin_links') ) ?>" value="<?php echo esc_attr( $instance['linkedin_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('linkedin_tooltip') ) ?>"><?php esc_html_e('Linkedin Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('linkedin_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('linkedin_tooltip') ) ?>" value="<?php echo esc_attr( $instance['linkedin_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('dribbble_links') ) ?>"><?php esc_html_e('Dribbble Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('dribbble_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('dribbble_links') ) ?>" value="<?php echo esc_attr( $instance['dribbble_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('dribbble_tooltip') ) ?>"><?php esc_html_e('Dribbble Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('dribbble_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('dribbble_tooltip') ) ?>" value="<?php echo esc_attr( $instance['dribbble_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('gplus_links') ) ?>"><?php esc_html_e('Google Plus Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('gplus_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('gplus_links') ) ?>" value="<?php echo esc_attr( $instance['gplus_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('gplus_tooltip') ) ?>"><?php esc_html_e('Google Plus Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('gplus_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('gplus_tooltip') ) ?>" value="<?php echo esc_attr( $instance['gplus_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('instagram_links') ) ?>"><?php esc_html_e('Instagram Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('instagram_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('instagram_links') ) ?>" value="<?php echo esc_attr( $instance['instagram_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('instagram_tooltip') ) ?>"><?php esc_html_e('Instagram Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('instagram_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('instagram_tooltip') ) ?>" value="<?php echo esc_attr( $instance['instagram_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('pinterest_links') ) ?>"><?php esc_html_e('Pinterest Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('pinterest_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('pinterest_links') ) ?>" value="<?php echo esc_attr( $instance['pinterest_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('pinterest_tooltip') ) ?>"><?php esc_html_e('Pinterest Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('pinterest_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('pinterest_tooltip') ) ?>" value="<?php echo esc_attr( $instance['pinterest_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('vimeo_links') ) ?>"><?php esc_html_e('Vimeo Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('vimeo_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('vimeo_links') ) ?>" value="<?php echo esc_attr( $instance['vimeo_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('vimeo_tooltip') ) ?>"><?php esc_html_e('Vimeo Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('vimeo_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('vimeo_tooltip') ) ?>" value="<?php echo esc_attr( $instance['vimeo_tooltip'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('youtube_links') ) ?>"><?php esc_html_e('Youtube Link', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('youtube_links') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('youtube_links') ) ?>" value="<?php echo esc_attr( $instance['youtube_links'] ) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('youtube_tooltip') ) ?>"><?php esc_html_e('Youtube Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('youtube_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('youtube_tooltip') ) ?>" value="<?php echo esc_attr( $instance['youtube_tooltip'] ) ?>" />
</p>

<p>
	<?php
	$checked = "";
	if ($instance['show_rss_tooltip'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo esc_attr( $widget->get_field_id('show_rss_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('show_rss_tooltip') ) ?>" value="true" <?php echo wp_kses_post( $checked ) ?> />
    <label for="<?php echo esc_attr( $widget->get_field_id('show_rss_tooltip') ) ?>"><?php esc_html_e('Show RSS Link', 'accio') ?></label>
</p>

<p>
    <label for="<?php echo esc_attr( $widget->get_field_id('rss_tooltip') ) ?>"><?php esc_html_e('RSS Tooltip', 'accio') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $widget->get_field_id('rss_tooltip') ) ?>" name="<?php echo esc_attr( $widget->get_field_name('rss_tooltip') ) ?>" value="<?php echo esc_attr( $instance['rss_tooltip'] ) ?>" />
</p>