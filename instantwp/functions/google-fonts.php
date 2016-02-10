<?php
/**
* Load Google Fonts Into Header
*/
if ( !function_exists('bi_load_google_fonts') ) {
	add_action('wp_head', 'bi_load_google_fonts');
	function bi_load_google_fonts() {
	
		$output_stylesheets = '';
		$output_css = '';

		$output_stylesheets .="<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>";
		
		// Output stylesheets
		if ( $output_stylesheets ) {
			echo '<!-- Google Fonts -->';
			echo $output_stylesheets;
		}
		
		// Output CSS
		if ( $output_css ) {
			echo '<!-- Custom Typography -->';
			echo '<style type="text/css">' . $output_css . '</style>';
		}
	}
} ?>