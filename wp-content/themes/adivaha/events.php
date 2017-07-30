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
			<div class="no-offers" style="text-align:center;padding-top:60px; font-size:26px;">
			<p>Sorry !! for the inconvenience caused.</p>
            <p>This section is under construction....Will keep you updated ...</p>
		   <!-- <img src="<?php echo get_template_directory_uri();?>/images/no-event.png?var=sdf"/> -->
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
		  <?php echo getNews();?>
		</div>
		
	</div>
	</div>
</div>

<div class="height_class1457" style="">
	
	
</div>


<?php get_footer(); ?>

