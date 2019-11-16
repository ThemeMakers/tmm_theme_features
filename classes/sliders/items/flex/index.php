<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class TMM_Ext_Slider_Flex extends TMM_Ext_Sliders {

	public static $slider_options = array();
	public static $slider_js_options = array();

	public static function init() {
		parent::$sliders_classes_array[] = __CLASS__;
		//***
		self::$slider_options = array(
			'key' => "flex",
			'name' => "Flexslider",
			'fields' => array(
				'description' => array(
					'name' => esc_html__('Slide Description', 'accio'),
					'type' => 'textarea',
					'field_options' => array(
						'font_family' => esc_html__('Font family', 'accio'),
						'font_size' => esc_html__('Font size', 'accio'),
						'font_color' => esc_html__('Font color', 'accio')
					),
					'field_options_defaults' => array(
						'font_family' => '',
						'font_size' => '',
						'font_color' => ''
					)
				),
				'url' => array(
					'name' => esc_html__('Slide URL', 'accio'),
					'type' => 'textinput',
					'field_options' => array()
				),
			),
		);
		parent::$slider_options[self::$slider_options['key']] = self::$slider_options;
		//***
		self::$slider_js_options = array(
//			'slide_image_alias' => array(
//				'title' => esc_html__('Slide size', 'accio'),
//				'type' => 'text',
//				'description' => esc_html__('Slide size. width*height, for example 500*300. Empty field means full size!', 'accio'),
//				'default' => '',
//			),
			'enable_caption' => array(
				'title' => esc_html__('Enable caption', 'accio'),
				'type' => 'checkbox',
				'description' => "",
				'default' => 1,
			),
			'slideshow' => array(
				'title' => esc_html__('Slideshow', 'accio'),
				'type' => 'checkbox',
				'description' => esc_html__("Animate slider automatically", 'accio'),
				'default' => 1,
			),
			'init_delay' => array(
				'title' => esc_html__('initDelay', 'accio'),
				'type' => 'slider',
				'description' => esc_html__("Integer: Set an initialization delay, in milliseconds", 'accio'),
				'default' => 0,
				'max' => 500
			),
			'animation_speed' => array(
				'title' => esc_html__('Animation Speed', 'accio'),
				'type' => 'slider',
				'description' => esc_html__("Set the speed of animations, in milliseconds", 'accio'),
				'default' => 600,
				'max' => 2000
			),
			'slideshow_speed' => array(
				'title' => esc_html__('Slideshow Speed', 'accio'),
				'type' => 'slider',
				'description' => esc_html__("Set the speed of the slideshow cycling, in milliseconds", 'accio'),
				'default' => 7000,
				'max' => 20000
			),
			'animation' => array(
				'title' => esc_html__('Animation', 'accio'),
				'type' => 'select',
				'values' => array(
					'fade' => esc_html__('Fade', 'accio'),
					'slide' => esc_html__('Slide', 'accio'),
				),
				'description' => esc_html__('Select your animation type, "fade" or "slide"', 'accio'),
				'default' => 'slide',
			),
			'directionNav' => array(
				'title' => esc_html__('Direction Nav', 'accio'),
				'type' => 'checkbox',
				'description' => esc_html__("Direction Navigation", 'accio'),
				'default' => 1,
			),
			'controlnav' => array(
				'title' => esc_html__('Control Navigation', 'accio'),
				'type' => 'checkbox',
				'description' => esc_html__("Control Navigation", 'accio'),
				'default' => 1,
			),
			'direction' => array(
				'title' => esc_html__('Direction', 'accio'),
				'type' => 'select',
				'values' => array(
					'horizontal' => esc_html__('Horizontal', 'accio'),
					'vertical' => esc_html__('Vertical', 'accio'),
				),
				'description' => "",
				'default' => 'horizontal',
			)
		);
		parent::$slider_js_options[self::$slider_options['key']] = self::$slider_js_options;
	}

}
