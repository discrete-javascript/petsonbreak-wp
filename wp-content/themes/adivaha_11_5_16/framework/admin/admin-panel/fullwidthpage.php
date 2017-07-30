<?php
/**
 Template Name: Full Width Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *

 */
 get_header();

 $current_user = wp_get_current_user();
 if($current_user->ID > 0){
	 $current_user->user_login;
	echo '<script>window.location.href="'.site_url().'/members/'. $current_user->user_login.'/profile/"</script>';
	die;
 }
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script language="javascript" src="<?php echo get_template_directory_uri(); ?>/js/fb_main.js"></script>
<input type="hidden" name="fb_appId" id="fb_appId" value="638087052951972" />

<style>
.contPoplser{background:<?php echo $_SESSION['main_color']; ?> !important;}
.border-bottom{background:<?php echo $_SESSION['main_color']; ?> !important;}
.banner-bottom{background:<?php echo $_SESSION['main_color']; ?> !important;}
.bnt-ser a {background:<?php echo $_SESSION['main_color']; ?> !important;border: 0px solid #306796;}
.resources-content-searchwidget .wego-searchbox__nav {border-bottom: 3px solid <?php echo $_SESSION['main_color']; ?> !important;}
.resources-content-searchwidget .search-button123 {background:<?php echo $_SESSION['main_color']; ?> !important;}
#search-button{background:<?php echo $_SESSION['main_color']; ?> !important;}
.search-button123 {background:<?php echo $_SESSION['main_color']; ?> !important;}
.nav-links .current {background:<?php echo $_SESSION['main_color']; ?> !important;}
footer  {background: <?php echo $_SESSION['main_color']; ?> !important;}

#buddypress .standard-form div.submit input {background: <?php echo $_SESSION['main_color']; ?> !important;}

.facebookBack {background: <?php echo $_SESSION['main_color']; ?> !important;}
.tml-login .tml-submit-wrap input  {background: <?php echo $_SESSION['main_color']; ?> !important;}
.tml .tml-action-links li {background: <?php echo $_SESSION['main_color']; ?> !important;}   



.footer-1 {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,ffffff+100&0+0,1+100 */
background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important; /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%) !important; /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%) !important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=0 ) !important; /* IE6-9 */

}
.footer-boder1 li a, .footer-boder li a {color: <?php echo $_SESSION['text_color']; ?> !important;}	
.profile_page_1{border-right: 1px solid #ccc;}
.img_profile{border-bottom: 2px solid #72a411;overflow: hidden;}
.img_profile img{width:185px;height:180px;}
.profile_text_ul{}
.profile_text_ul ul{}
.profile_text_ul ul li{text-align: right;padding: 7px 17px 3px 0px;}
.profile_text_ul ul li a{font-weight: 600;}

</style>

<div class="log_backGrond">
<div class="container marging-and-bottom border-text-your-d">
  <div name="contactFrm " class="New_contactFrom" id="contactFrm">
 
	<div class="row">
	
		<div class="facebookBack">
			<a href="javascript:void(0);" alt="fblogin" class="fblogin"><i class="fa fa-facebook"></i>  &nbsp;&nbsp;Log in With Facebook</a>
		</div>
	
	
	
	
	
		<div class="col-md-12">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="form_title">
			
				<p class="user_demoP">User: demo Password : demo</p>
				
				<p class="logWith">Log in With your Credentials</p>
				
				<p class="CeratOr">  <small>Or</small> <a href="<?php echo site_url(); ?>/register/">Create an Account</a></p>
			
			
				
				<p><?php the_content(); ?></p>
			</div>
			
         <?php endwhile; ?>   
			
		</div>
        
		
	</div>
   </div> 
</div>


</div>



<?php get_footer(); ?>
