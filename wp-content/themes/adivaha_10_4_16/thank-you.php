<?php
/**
 Template Name: thank you
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

	if (isset($_GET["id"])) {	
	    $ID = $_GET["id"];
	$Results = $wpdb->get_results("select * from wp_users where ID='".$ID."'");
	if(count($Results)>0){
		$Result = $Results[0];
		$user_status = $Result->user_status;
		if($user_status==1)
		{
			$SQL_user = "UPDATE wp_users set user_status='0' WHERE ID='".$ID."'";
			$wpdb->query($SQL_user);
			echo "Your account  activated";?>
			
			<div id="new_from" class="thanks-div">	
			<div class="thanks-div-content">
			<h2 class="new_h2">Thank you your account has been activated. </h2>
			<a href="<?php echo site_url();?>/login">Click here for Login....</a>
			<div class="ui cards">
			  <div class="card">
				<div class="content">
			  </div>
			 </div>
			  </div>
			  </div>
			</div>
		<?php }

		else{


			?>
 					

			<div id="new_from"  class="thanks-div">	
   <div class="thanks-div-content">
       <p><img src="<?php echo get_template_directory_uri();?>/images/confirmation-message-icon.png"></p>
		<h2 class="new_h2">Your account has already been activated. </h2>
		
		<div class="ui cards">
		  <div class="card">
		    <div class="content">
		  </div>
		 </div>
		  </div>
   </div>
</div>

			<?php 

	

		}

	}
	}

	if (!isset($_GET["id"])) {	
?>


<div id="new_from"  class="thanks-div">	
   <div class="thanks-div-content">
        <p><img src="<?php echo get_template_directory_uri();?>/images/confirmation-message-icon.png"></p>
		<h2 class="new_h2">Thank you for creating an account. </h2>
		<p>Please check your email to continue.</p>
		<div class="ui cards">
		  <div class="card">
		    <div class="content">
		  </div>
		 </div>
		  </div>
   </div>
</div>
<?php } ?>
<?php get_footer(); ?>

<style>
.thanks-div{
	height: 500px;
	position: relative;
}

.thanks-div-content{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    -o-transform: translate(-50%,-50%);
    width: 600px;
    text-align: center;
}

.thanks-div-content img{
	width: 150px;
    height: 150px;
}

.thanks-div-content h2{
    margin: 10px 0px;
    color: #636;
    font-size: 33px;
}

.thanks-div-content p{
    font-size: 20px;
}

</style>