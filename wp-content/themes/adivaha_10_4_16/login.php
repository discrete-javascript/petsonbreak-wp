<?php 
/**
 Template Name: login Page
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
//echo base64_encode('details-page/?id=66&destName=');
if($_REQUEST['redirectPage']!=''){
  if($_REQUEST['redirectPage']=='details-page'){
    $loginRedirect =$_REQUEST['redirectPage'].'/?id='.$_REQUEST['id'].'&destName=';
  }
}else{
  $loginRedirect ='';	
}



?>
<div class="container"  id="login">
	<div class="con_left"> 
		<form method="post" id="loginform">
		 <input type="hidden" name="redirect" id="redirect" value="<?php echo $loginRedirect;?>">
		<h2 class="register-page1">Log in</h2>
		<ul class="modalLogin-loginFields">
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="user_login" id="user_login" placeholder="Name" title="Email address is required." type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password</span></label>
				<input type="password" name="user_password" id="user_password"  placeholder="Name" title="Email address is required." type="email">
				<a href="<?php echo $siteUrl;?>/forgot-password/" class="forgot_po">Forgot your password?</a>
				
			</li>
		              
           </ul>
		   <div class="register-btn">
				<!--<a href="http://petsonbreak.com/login/" class="btn_1 green medium">Log In</a>-->
				  <input type="button" id="vendor_login" value="Log In" class="btn_1 green medium">
			</div>
			
			<h2 class="register-page1" style="clear: both;padding: 21px 0px;"> Don't Have An Account? </h2>
		   <div class="register-btn">
				<a href="<?php echo site_url();?>/register/" class="btn_1 green medium">Register Now</a>
			</div>
		   
		 </form>  

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

<div class="height_class1457" style="">


</div>

<style>

</style>

<?php get_footer(); ?>

<script>
 $('#vendor_login').click(function(){
	  var frmdata =$('#loginform').serialize();
	  var redirect =$('#redirect').val();
		 $.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=VendorLogin&"+frmdata,
			 success: function(Data){
			    if(Data=='0'){ 
				   alert('Information wrong');
				 }
				 else if(Data=='Inactive'){ 
					alert('Account not active');
				 }
				 else if( redirect!=''){
					 window.location.href="<?php echo site_url();?>/"+redirect;
				 }
				else if(Data=='Administrator'){ 
				 window.location.href="<?php echo site_url();?>/wp-admin/index.php";		
				 }
				else if(Data=='Vendor'){ 
				   window.location.href="<?php echo site_url();?>/booking/?type=services";
				 }
				  
			  }
		 })
 });	

 
</script>
