<?php 
/**
 Template Name: Why PetsonBreak?
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
global $mk_options;
?>



<div class="terms_conditions"  style="background: #fff;">
	<div class="container search-vendor-container">
	<div class="con_left">
		<div class="pet-search-left">
			<div class="all_text">
				  <?php
					while ( have_posts() ) : the_post();
					?>
		
					<?php the_content(); ?>
			
				  <?php
					// End the loop.
					endwhile;
					
					?>
			<p style="clear: both;"></p>
			</div>
	 </div>
	 </div>
	 <div class="con_right">
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
		<div id="quick_links">
			<?php  echo getQuickLinks();?>
		</div>
				
						
		<div id="news_n_updates">
			<div class="pet_house1 news-section">
    <h2><?php echo $mk_options['latest_news'];?></h2>
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
          foreach($results as $obj){?>
       <div class="news">
         <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo $obj->title;?></a></h3>
         <p><?php echo substr($obj->description,0,150);?>...</p>
       </div>
       <?php } ?>

     </div>
  </div>
</div>
		</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

