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
    $loginRedirect =$_REQUEST['redirectPage'].'/?id='.$_REQUEST['id'].'&destName='.$_REQUEST['destName'];
  }
}else{
  $loginRedirect ='';	
}



?>
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<?php wp_enqueue_style( 'petsonbreak-w3', get_theme_file_uri( '/css/w3.css' ), array(), null ); ?>
<div class="login-background"></div>
<div class="login-whole-container container w3-container w3-content"  id="login">
	<div class="login-container con_left w3-panel w3-white w3-card-2 w3-display-container"> 
            <div class="login-header"><div class="login-flex"><div class="login-margin"><h2 class="register-page1">Log in</h2></div></div></div>
            <div class="login-form-container">
                <form method="post" id="loginform">
		 <input type="hidden" name="redirect" id="redirect" value="<?php echo $loginRedirect;?>">
                 
                 <div class="login-content">
                     <ul class="user-input-container modalLogin-loginFields">
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="user_login" id="user_login" placeholder="Name" title="Email address is required." type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password</span></label>
				<input type="password" name="user_password" id="user_password"  placeholder="Password" title="Email address is required." type="email">
				<a href="<?php echo $siteUrl;?>/forgot-password/" class="login-page forgot_po">Forgot your password?</a>
				
			</li>
		              
           </ul>
		   <div class="login-page register-btn">
				<!--<a href="http://petsonbreak.com/login/" class="btn_1 green medium">Log In</a>-->
				  <input type="button" id="vendor_login" value="Log In" class="btn_1 green medium">
			</div>
			
			
		   <div class="registration-button-container register-btn">
                       <p class="login-page register-page1" style="clear: both;"> Don't Have An Account? </p>
				<a href="<?php echo site_url();?>/register/" class="btn_1 green medium">Register Now</a>
			</div>
                 </div>
		
		   
		 </form>  
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
		 	console.log(Data);
		    if(Data=='0'){
			   alert('Information wrong');
			} else if(Data=='Inactive'){
				alert('Account not active');
			} else if( redirect!=''){
				window.location.href="<?php echo site_url();?>/"+redirect;
			} else if(Data=='administrator'){
				window.location.href="<?php echo site_url();?>/wp-admin/index.php";
			} else if(Data=='Vendor'){
				window.location.href="<?php echo site_url();?>/booking/?type=services";
			} else if(Data=='subscriber'){
				window.location.href="<?php echo site_url();?>/member-profile/?type=enquiry";
			}
		}
	})
 });
</script>
