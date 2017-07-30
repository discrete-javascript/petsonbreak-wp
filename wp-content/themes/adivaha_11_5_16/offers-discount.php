<?php 
/**
 Template Name: Offers and Discounts
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



<div id="offers-discount"   style="background: #fff;padding-top:60px;">
	<div class="container search-vendor-container">
		<div class="con_left">
		<div id="petBrd-page-wrap">
		  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">Offers and Discounts</a></li>
				</ul>
			</div>
		
		  <div class="no-offers" style="text-align:center;">
		    <img src="<?php echo get_template_directory_uri();?>/images/no-offer_available.png?var=sdf"/>
		  </div>
	 </div>
	 <div class="con_right">
	     <div class="pet-search-right">
			<?php  echo getPopularCategories();?>
	   </div>
		
	   <div id="quick_links">
		 <?php  echo getQuickLinks();?>
	   </div>
				
		</div>
	</div>

</div>

<?php get_footer(); ?>




