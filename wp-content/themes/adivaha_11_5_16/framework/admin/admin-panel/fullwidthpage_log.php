<?php
/**
 Template Name: Full Width login page  Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *

 */

 get_header();
 
?>


<div class="log_backGrond">


<div class="container marging-and-bottom border-text-your-d">


  <div name="contactFrm " class="New_contactFrom" id="contactFrm">
 
	<div class="row">
	
		<div class="facebookBack">
			<a href="javascript:void(0);" alt="fblogin" class="fblogin"><i class="fa fa-facebook"></i>  &nbsp;&nbsp;Log in With Facebook </a>
		</div>
	
		<div class="col-md-12">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="form_title">
			
				<p class="user_demoP">User: demo Password : demo</p>
				
				<p class="logWith">Forgot Password</p>
				
				<p class="CeratOr">  <small>Or</small> <a href="<?php echo site_url(); ?>/register/">Create an Account</a></p>
			
			
				<!--<h3><?php the_title(); ?></h3>-->
				<p><?php the_content(); ?></p>
			</div>
			
         <?php endwhile; ?>   
			
		</div>
        
		
	</div>
   </div> 
</div>


</div>

<?php get_footer(); ?>
