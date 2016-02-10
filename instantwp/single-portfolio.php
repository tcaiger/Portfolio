<?php
/**
 * Single Portfolio Template
 *
 *
 * @file           single-project.php
 * @package        InstantWP 
 * @author         Brad WIlliams 
 * @copyright      2003 - 2014 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<?php if ( has_post_thumbnail()) { ?>
 <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
  <div id="workwrap" style="background-image: url('<?php echo $background[0]; ?>');">
    <?php } else { ?>
     <div id="workwrap">
    <?php } ?>
      <div class="container">
      <div class="row">
        <div>
            <?php if( rwmb_meta( 'wtf_portfolio_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_title' ); ?>
            <?php } ?> 
        </div>
      </div><! --/row -->
      </div> <!-- /container -->
  </div><! --/workwrap -->





<!-- *****************************************************************************************************************
   TITLE & CONTENT
   ***************************************************************************************************************** -->

       <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <section id="works"></section>
        <div class="container">
          <div class="row centered mt mb">
            <div class="col-lg-8 col-lg-offset-2 lmt xlmb">
              <h4><?php the_title(); ?></h4>
              <p><?php the_content(); ?></p>
              
            </div>

            <div class="lmt">
                         
               <?php $images = rwmb_meta( 'wtf_imgadv', 'type=image' ); ?>
               <!-- echo print_r($images); -->
               <?php if ($images): foreach ( $images as $image ):?>
                                  
                    <?php echo "<img class='the-works' src='{$image['full_url']}' alt='{$image['alt']}' />"; ?>
                
                    <p class="caption lmb"><?= $image['caption'] ?></p>

                <?php endforeach; endif;?>
                <a href="portfolio">Back To Portfolio</a>
            </div>

            <footer class="article-footer">
              <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>   
            </footer> 
          </div><! --/row -->
        </div><! --/container -->

            
        <?php endwhile; ?> 

        <?php else : ?>

       <article id="post-not-found" class="hentry clearfix">
        <header>
           <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
       </header>
       <section>
           <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
       </section>
       <footer>
           <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
           <?php get_search_form(); ?>
       </footer>

   </article>

<?php endif; ?>  
      


<?php get_footer(); ?>