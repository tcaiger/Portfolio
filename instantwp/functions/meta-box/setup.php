<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'wtf_';

global $meta_boxes;

$meta_boxes = array();

// Post Type name
	$portfolio_post_type_name = ( bi_option('portfolio_post_type_name') ) ? bi_option('portfolio_post_type_name') : __('Portfolio','responsive');

	//Individual Portfolio
	$meta_boxes[] = array(
		'id'         => 'portfolio_metabox',
		'title'      => 'Options',
		'pages'      => array( 'portfolio', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name'             => __( 'Homepage Image', 'responsive' ),
				'id'               => $prefix . 'homeimg',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			array(
					'name' => __('Banner Text','responsive'),
					'desc' => __('Enter the text to be displayed on top of the full width banner. ','responsive'),
					'id' => $prefix . 'portfolio_title',
					'type' => 'textarea',
					'cols' => 20,
					'rows' => 5,
					'std'  => '<h4>NEW WEBSITE FOR</h4>
					          <h1>INSTANT</h1>
					          <h4>ROLE: LEAD DESIGNER</h4>',
				),
		
			array(
				'name'             => __( 'Images under Content', 'responsive' ),
				'id'               => $prefix . 'imgadv',
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			),
		),
	);


	// Blog Page
	$meta_boxes[] = array(
		'title'  => __( 'Options', 'responsive' ),
		'pages' => array('page'),
		'fields' => array(
				array(
					'name' => __('Banner Text','responsive'),
					'desc' => __('Enter the text to be displayed on top of the full width banner. ','responsive'),
					'id' => $prefix . 'blog_title',
					'type' => 'textarea',
					'cols' => 20,
					'rows' => 5,
					'std'  => '<h4>A CURATED SELECTION OF</h4>
								<h1>BLOG POSTS</h1>
								<h4>BY: MARCEL NEWMAN</h4>',
				),
		),
		'only_on'    => array(
			'template' => array( 'template-blog.php' )
		),
	);

	// Blog Post
	$meta_boxes[] = array(
		'title'  => __( 'Options', 'responsive' ),
		'pages' => array('post'),
		'fields' => array(
				array(
				'name'             => __( 'Banner Image', 'responsive' ),
				'id'               => $prefix . 'blogimg',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
		),
	);





/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function wtf_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wtf_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}
?>