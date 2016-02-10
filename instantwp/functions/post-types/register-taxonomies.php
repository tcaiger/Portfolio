<?php
/**
 * Registers custom taxomies for use with this theme
 *
 * @package WordPress
*/

add_action( 'init', 'bi_register_taxonomies' );

if ( !function_exists('bi_register_taxonomies') ) {
	
	function bi_register_taxonomies() {

		//portfolio
		$portfolio_post_type_name = bi_option('portfolio_post_type_name') ? bi_option('portfolio_post_type_name') : __('Portfolio','responsive');
		$portfolio_tax_slug = bi_option('portfolio_tax_slug') ? bi_option('portfolio_tax_slug') : 'portfolio-category';

			// Portfolio taxonomies
		register_taxonomy('portfolio_cats','portfolio',array(
			'hierarchical' => true,
			'labels' => apply_filters('bi_portfolio_tax_labels', array(
				'name' => $portfolio_post_type_name . ' ' . __( 'Categories', 'responsive' ),
				'singular_name' => $portfolio_post_type_name . ' '. __( 'Category', 'responsive' ),
				'search_items' =>  __( 'Search Categories', 'responsive' ),
				'all_items' => __( 'All Categories', 'responsive' ),
				'parent_item' => __( 'Parent Category', 'responsive' ),
				'parent_item_colon' => __( 'Parent Category:', 'responsive' ),
				'edit_item' => __( 'Edit  Category', 'responsive' ),
				'update_item' => __( 'Update Category', 'responsive' ),
				'add_new_item' => __( 'Add New  Category', 'responsive' ),
				'new_item_name' => __( 'New Category Name', 'responsive' ),
				'choose_from_most_used'	=> __( 'Choose from the most used categories', 'responsive' )
				)
			),
			'query_var' => true,
			'rewrite' => array( 'slug' => $portfolio_tax_slug ),
		));
		
	
	}
	
} ?>