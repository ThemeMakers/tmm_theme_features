<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class TMM_Ext_Slider_Super extends TMM_Ext_Sliders {

	public static $slider_options = array();
	public static $slider_js_options = array();

	public static function init() {
		parent::$sliders_classes_array[] = __CLASS__;
	
		self::$slider_options = array(
			'key' => "superslides",
			'name' => "Superslides",
			'fields' => array(
				'description' => array(
					'name' => esc_html__('Slide Description', 'accio'),
					'type' => 'textarea'
				)
			),
		);

		parent::$slider_options[self::$slider_options['key']] = self::$slider_options;

		self::$slider_js_options = array(
			'play' => array(
				'title' => esc_html__('Play', 'accio'),
				'type' => 'slider',
				'description' => esc_html__("Milliseconds before progressing to next slide automatically. Use a falsey value to disable.", 'accio'),
				'default' => 8000,
				'max' => 32000,
				'show_title' => false
			),
			'animation_speed' => array(
				'title' => esc_html__('Animation Speed', 'accio'),
				'type' => 'slider',
				'description' => esc_html__("Set the speed of animations, in milliseconds", 'accio'),
				'default' => 1000,
				'max' => 5000,
				'show_title' => false
			),
			'animation' => array(
				'title' => esc_html__('Animation', 'accio'),
				'type' => 'select',
				'values' => array(
					'fade' => esc_html__('Fade', 'accio'),
					'slide' => esc_html__('Slide', 'accio'),
				),
				'description' => esc_html__('Select your animation type, "fade" or "slide"', 'accio'),
				'show_title' => false,
				'default' => 'slide',
			)
		);
		parent::$slider_js_options[self::$slider_options['key']] = self::$slider_js_options;
	}

}
