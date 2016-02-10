<?php
/**
 * @package WordPress
 * @subpackage InstantWP
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

	<?php
	// Include the required homepage module if enabled
	// See your theme's includes folder for editing these modules
    global $bi_option;
    $homepage_modules = $bi_option['homepage-layout']['enabled'];
    if ($homepage_modules):

		$value = 'homecontent';
    	get_template_part('includes/home', $value); 

	endif; ?>

