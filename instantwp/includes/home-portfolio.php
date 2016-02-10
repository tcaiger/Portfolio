<?php
/**
 * File used for homepage recent portfolio
 *
 * @package WordPress
 */


//query post types
$home_portfolio_query = new WP_Query(
	array(
		'post_type' => bi_option('home_post_type','portfolio'),
		'showposts' =>  bi_option('home_portfolio_count','-1'),
		'no_found_rows' => true,
	)
);

if ( $home_portfolio_query->posts ) :
	
 ?>       
    
<!-- *****************************************************************************************************************
PORTFOLIO SECTION
***************************************************************************************************************** -->

<section id="works"></section> 
<div class="container">
    <div class="row centered mt mb">
        <?php if(bi_option('home_portfolio_title')!== '') {?>
        <h1><?php echo bi_option('home_portfolio_title');?></h1>
        <?php } ?>

        <?php
        $count=0;
        while ( $home_portfolio_query->have_posts() ) : $home_portfolio_query->the_post();
        $count++

        ?>
       
        <div class="col-lg-4 col-md-4 col-sm-4 gallery">
         <a href="<?php the_permalink() ?>">

          <?php $images = rwmb_meta( 'wtf_homeimg', 'type=image' ); ?>                          
          <?php if ($images): ?>
                             
            <?php foreach ( $images as $image ): ?> 

            <?php echo "<img class='img-responsive' src='{$image['full_url']}' alt='{$image['alt']}' />";?>
             
          <?php endforeach; endif; ?>

         </a>
         <p><?php the_title(); ?></p>
  </div>

<?php endwhile; ?>
</div><! --/row -->
</div><! --/container -->

    
<?php endif; wp_reset_postdata(); ?>

