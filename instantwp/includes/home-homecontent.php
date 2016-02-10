<?php
/**
 * File used for homepage static page content module
 *
 * @package WordPress
 */
?>

<?php if ( has_post_thumbnail()) { ?>
 <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
  <div id="headerwrap" style="background-image: url('<?php echo $background[0]; ?>');">
  	<?php } else { ?>
  	<div id="headerwrap">
  	<?php } ?>
	<div class="container">
		<div class="row">
			<?php while( have_posts() ) : the_post(); ?>
			<div>
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		
	</div><!-- /row -->
</div> <!-- /container -->
</div><!-- /headerwrap -->



