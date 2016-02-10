<?php
/**
 * Adds custom CSS to the wp_head() hook.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */


if ( !function_exists( 'bi_custom_css' ) ) {
	
	add_action('wp_head', 'bi_custom_css');
	function bi_custom_css() {
			
			$custom_css ='';
			
			/**custom css field**/
			if(bi_option('custom_css_box')) {
				$custom_css .= bi_option('custom_css_box');
			}	
			
			//trim white space for faster page loading
			$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
			//echo css
			$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
			
			if(!empty($custom_css)) {
				echo $css_output;
			}
	}
	
}