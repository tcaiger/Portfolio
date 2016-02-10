<?php
/**
 * Portfolio Template
 *
  Template Name: Portfolio
 *
 * @file           page.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<?php if ( has_post_thumbnail()) { ?>
  
  <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
  <div id="aboutwrap" style="background-image: url('<?php echo $background[0]; ?>');">

<?php } else { ?>
  <div id="aboutwrap">

<?php } ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>PORTFOLIO</h1>
          <h4 class="banner-h4">SELECTED ALBUMS</h4>
          <i style="color:white" class="fa fa-angle-double-down fa-2x"></i>
      </div>
    </div><! --/row -->
  </div> <!-- /container -->
</div><! --/aboutwrap -->
  

<div class="container">
  <div class="row centered smt smb">

       
    <?php
    // Include the required homepage module if enabled
    // See your theme's includes folder for editing these modules
    global $bi_option;
    $homepage_modules = $bi_option['homepage-layout']['enabled'];
    if ($homepage_modules):

      $value = 'portfolio';
      get_template_part('includes/home', $value); 

    endif; ?>

  </div><! --/row -->
</div><! --/container -->


<?php get_footer(); ?>