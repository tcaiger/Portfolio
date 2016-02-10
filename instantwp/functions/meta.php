<?php
/**
 * Outputs the post meta for blog posts & entries
 *
 * @package WordPress
*/


if ( ! function_exists( 'gents_post_meta' ) ) {
	
	function gents_post_meta() {
		
		// Get post data
		global $post;
		$post_id = $post->ID;
		$post_type = get_post_type($post);

		// Get category for posts only
		if ( $post_type == 'post' ) {
			$category = get_the_category();
			$fist_category = $category[0];
			if ( isset($fist_category) ) {
				$category_name = $fist_category->cat_name;
				$category_url = get_category_link( $fist_category->term_id );
			}
		}

		// Get EDD Category
		if ( $post_type == 'download' && taxonomy_exists('download_category') ) {
			$category = get_the_terms( get_the_ID(), 'download_category', array('number' => '1') );
			if ( isset($category)) {
				$fist_category = reset($category);
				$category_name = $fist_category->name;
				$category_id = $fist_category->term_id;
				$category_url = get_term_link( $category_id, 'download_category' );
			}
		} ?>

		 <div class="post-meta">
              <p>
              Published on: <span class="publish-on"><?php echo get_the_date(); ?></span>
              <?php if(isset($fist_category)){ ?> 
              <span class="sep">/</span> Category: <a href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a> 
              <?php } ?>
              <?php if( comments_open() ) { ?>
              <span class="sep">/</span> Comments: <?php comments_popup_link( __( '0 Comments', 'gents' ), __( '1 Comment',  'gents' ), __( '% Comments', 'gents' ), 'comments' ); ?>
              <?php } ?>
              </p>
            </div>
		
		<?php
		
	} // End function
	
} // End if