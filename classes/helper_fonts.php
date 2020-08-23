<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_HelperFonts {

	public static function get_google_fonts() {

		$google_fonts = TMM_OptionsHelper::$google_fonts;

		$saved_google_fonts = self::get_saved_fonts();

		$default_fonts = self::get_default_fonts_list();

		$arr_default_fonts = array_column($default_fonts, 'family');

		// remove default fonts out of array if anyone persists
		$saved_google_fonts = array_diff( $saved_google_fonts, $arr_default_fonts );

		if (!empty($saved_google_fonts) AND is_array($saved_google_fonts)) {
			$google_fonts = implode("|", $saved_google_fonts);
		}

		return $google_fonts;
	}

	private static function get_saved_fonts() {
		$logo_font = TMM::get_option('logo_font');
		$main_nav_font = TMM::get_option('main_nav_font');
		$general_font_family = TMM::get_option('general_font_family');
		$h1_font_family = TMM::get_option('h1_font_family');
		$h2_font_family = TMM::get_option('h2_font_family');
		$h3_font_family = TMM::get_option('h3_font_family');
		$h4_font_family = TMM::get_option('h4_font_family');
		$h5_font_family = TMM::get_option('h5_font_family');
		$h6_font_family = TMM::get_option('h6_font_family');

		$saved_fonts = array(
			$logo_font,
			$main_nav_font,
			$general_font_family,
			$h1_font_family,
			$h2_font_family,
			$h3_font_family,
			$h4_font_family,
			$h5_font_family,
			$h6_font_family
		);

		return array_unique($saved_fonts);
	}

	public static function get_google_fonts_link() {
		$google_fonts = self::get_google_fonts();
		return '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=' . $google_fonts . '"/>';
	}
	
	// get google fonts list
	public static function get_google_fonts_list() {
		global $wp_filesystem;

		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();

		$local_file =   TMM_THEME_PATH . '/helper/google-web-fonts.json';
		$content    =   '';

		if ( $wp_filesystem->exists( $local_file ) ) {
			$content = json_decode( $wp_filesystem->get_contents( $local_file ) );
		} // End If Statement

		return $content;
	}

	// get default fonts list
	public static function get_default_fonts_list() {
		global $wp_filesystem;

		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();

		$local_file =   TMM_THEME_PATH . '/helper/default-font-list.json';
		$content    =   '';

		if ( $wp_filesystem->exists( $local_file ) ) {
			$content = json_decode( $wp_filesystem->get_contents( $local_file ) );
		} // End If Statement

		return $content;
	}

}