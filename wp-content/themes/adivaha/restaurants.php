<?php 
/**
 Template Name: Restaurants
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

<style>
.all_text{padding: 40px 0px;}
.all_text h1{font-size: 30px;font-weight: 100;margin-bottom: 22px;}
.all_text p{font-size: 14px;color: #777;margin-bottom: 30px;}

</style>


<div class="terms_conditions"  style="background: #fff;">
	<div class="container search-vendor-container">
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
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

