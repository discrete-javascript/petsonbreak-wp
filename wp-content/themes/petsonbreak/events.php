<?php 
	/**
		Template Name: Event Page
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
	
?>

<div id="events_page" style="background:#fff;">
	 <div class="container search-vendor-container">
	     
	    
		<div class="con_left" >
			<div class="no-offers" style="text-align:center;padding-top:60px;">
		    <img src="<?php echo get_template_directory_uri();?>/images/no-event.png?var=sdf"/>
		  </div>
			
		</div>
	
	<div class="con_right">

		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
	    <div id="quick_links">
			<?php echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates">
		<h2><?php echo $mk_options['latest_news'];?></h2>
			<div class="pet_house1 news-section">
    
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
          foreach($results as $obj){?>
       <div class="news">
         <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripslashes($obj->title);?></a></h3>
         <p><?php echo stripcslashes(substr($obj->description,0,148)); ?>...</p>
       </div>
       <?php } ?>

     </div>
  </div>
</div>
		</div>
		
	</div>
	</div>
</div>

<div class="height_class1457" style="">
	
	
</div>


<?php get_footer(); ?>

