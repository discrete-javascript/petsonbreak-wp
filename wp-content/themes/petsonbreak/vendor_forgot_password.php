<?php
/**
 Template Name: Vendor Forgot Password
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
global $wpdb;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="login-background"></div>
<?php wp_enqueue_style( 'petsonbreak-w3', get_theme_file_uri( '/css/w3.css' ), array(), null ); ?>
<div class="forgot-password-container container  w3-container w3-content" id="forg_pass">
<div class="login-container con_left w3-panel w3-white w3-card-2 w3-display-container">
    <div class="login-header"><div class="login-flex"><div class="login-margin" style="width: 100%;"><h2 class="register-page1" style="font-size: 20px;">Forgot your password?</h2></div></div></div>
<div class="login-form-container" id="new_from">	
<form class="ui form new_from1">

 
  <div class="field">
    
   
  </div>

  <div class="field">
    <label>Enter your email address</label>
    <input name="email" placeholder="Email Address" id="email" type="text">
	<div id="txt" class="Err" style="color:red;">   </div>
  </div>

  <input type="button" value="Send" id="fotpass" class="btn btn-default btn-lg btn-block" style="background: red;">

</form>

</div>
</div>


</div>
<?php include(TEMPLATEPATH."/includes/footer.php");?>
<script>
 $('#fotpass').click(function(){
	// alert("dfasgdfgdf");
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	if($('#email').val()=="")
      {
      $("#txt").html('Please type your email-id.');
	  $('#email').focus();
	  return false;
      }
	  else if (!re.test($("#email").val()))
     {
      $("#txt").html('Please enter a valid email address.');
      $('#email').focus();
      return false;
     }
	 else{
          $.ajax({
			     type: "POST",
			     url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			     data: "action=forgotPassword&email="+$('#email').val(),
			     success: function(Data){
                 
				 window.location.reload();
				// window.location.href="<?php echo site_url();?>/vacationer-login/";
 
			  },
    	  })
	    }  
	});

</script>
<?php get_footer(); ?>

