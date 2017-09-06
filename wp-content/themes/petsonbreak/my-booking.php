<?php session_start();
/**
 Template Name: My Booking
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
$all_meta_for_user = get_user_meta($_SESSION['userID']);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div class="member-profile-hero-container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="top-hero-content">
               <span>Dashboard</span><a class="change-password-hero-button" href="<?php echo site_url();?>/booking?type=changepass"><i class="fa fa-key" aria-hidden="true" style="padding-right: 5px;"></i>Change Password</a> 
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        
    </div>
</div>
<div class="container tab-content147" id="vendorprof">

<div class="tabbable tabs-left row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <ul class="memberprofile nav nav-tabs">
		  <li class="tabs active" id="tab_services" title="Add Services" ALT="Add Services"><a href="<?php echo site_url();?>/booking?type=services">Manage Services</a></li>
		  <li class="tabs" id="tab_profile"><a href="<?php echo site_url();?>/booking?type=profile">Manage Profile</a></li>
		  <!--
          <li class="tabs" id="tab_booking"><a href="<?php echo site_url();?>/booking?type=booking"><i class="fa fa-calendar-check-o"></i>My Bookings</a></li>
		  -->
          <li class="tabs" id="tab_changepass"><a href="<?php echo site_url();?>/booking?type=changepass"></i>Change Password</a></li>
		  <li class="tabs" id="tab_offered"><a href="<?php echo site_url();?>/booking?type=offered"></i>Offer and Discount</a></li>
		  <li class="tabs" id="tab_enquiry"><a href="<?php echo site_url();?>/booking?type=enquiry">Manage Enquiry</a></li>
         
		 
                </ul>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
         </div>
      <!-- tabs left -->
      
          <div row="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="background: white;padding: 2em;">
                <div class="tab-content">
		 <?php if($_REQUEST['type']=='profile'){
			      include('includes/manage_profile.php');
		        }
			  if($_REQUEST['type']=='services'){
			      include('includes/manage_services.php');
		        }
			  if($_REQUEST['type']=='booking'){
			      include('includes/manage_booking.php');
		        }
				if($_REQUEST['type']=='changepass'){
			      include('includes/manage_password.php');
		        }
				if($_REQUEST['type']=='offered'){
			      include('includes/manage_offered.php');
		        }
				if($_REQUEST['type']=='enquiry'){
			      include('includes/manage_enquiry.php');
		        }
		   ?>
		 </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
          </div>
</div>     
<style>
    /*Whomsoever may concern please change this row margin when you find the bug*/ 
    .row {
        margin-right: 0px !important;
    }
</style>
      <!-- /tabs -->
<!--<div class="container tab-content147" id="myBook">
  <div class="row">
    <div class="col-md-12">

       tabs left 
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
		  <li class="tabs active" id="tab_services" title="Add Services" ALT="Add Services"><a href="<?php echo site_url();?>/booking?type=services"><i class="fa fa-wrench" aria-hidden="true"></i>Manage Services</a></li>
		  <li class="tabs" id="tab_profile"><a href="<?php echo site_url();?>/booking?type=profile"><i class="fa fa-user" aria-hidden="true"></i>Manage Profile</a></li>
		  
          <li class="tabs" id="tab_booking"><a href="<?php echo site_url();?>/booking?type=booking"><i class="fa fa-calendar-check-o"></i>My Bookings</a></li>
		  
          <li class="tabs" id="tab_changepass"><a href="<?php echo site_url();?>/booking?type=changepass"><i class="fa fa-key" aria-hidden="true"></i></i>Change Password</a></li>
		  <li class="tabs" id="tab_offered"><a href="<?php echo site_url();?>/booking?type=offered"><i class="fa fa-tags" aria-hidden="true"></i></i>Offer and Discount</a></li>
		  <li class="tabs" id="tab_enquiry"><a href="<?php echo site_url();?>/booking?type=enquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>Manage Enquiry</a></li>
        </ul>
        <div class="tab-content">
		 //<?php // if($_REQUEST['type']=='profile'){
//			      include('includes/manage_profile.php');
//		        }
//			  if($_REQUEST['type']=='services'){
//			      include('includes/manage_services.php');
//		        }
//			  if($_REQUEST['type']=='booking'){
//			      include('includes/manage_booking.php');
//		        }
//				if($_REQUEST['type']=='changepass'){
//			      include('includes/manage_password.php');
//		        }
//				if($_REQUEST['type']=='offered'){
//			      include('includes/manage_offered.php');
//		        }
//				if($_REQUEST['type']=='enquiry'){
//			      include('includes/manage_enquiry.php');
//		        }
//		   ?>
		 </div>

        </div>


       

      </div>
       /tabs 
      
    </div>    /row 
  </div>-->


<style>
/* custom inclusion of right, left and below tabs */

.memberprofile.nav-tabs>li.active>a, .memberprofile.nav-tabs>li.active>a:hover, .memberprofile.nav-tabs>li.active>a:focus {
    color: red;
    text-transform: uppercase;
    background: white;
    font-weight: bold;
    padding-top: 2em;
    border: none;
    border-bottom: 3px solid #f00;
    border-radius: 0;
    margin-right: 1.5em;

}
.memberprofile.nav-tabs>li>a {
    text-transform: uppercase;
    padding-top: 2em;
    border: none;
    border-radius: 0;
    color: black;
    margin-right: 1.5em;
}
.memberprofile.nav-tabs>li>a:focus, .memberprofile.nav-tabs>li>a:hover {
    background: white;
    color: red;
}

</style>



<style>
.con_left{float: left;width:70%;    padding: 28px 21px 40px 0px;

}
.con_right{float: right;width:30%;background-color: #663366;padding: 30px;}
.con_right h2{    font-size: 22px;
    color: #fff;
    font-style: italic;
    font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
    font-style: italic;
    font-weight: 100;}



.modalLogin-loginFields li input{    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;}

.modalLogin-loginFields li:nth-child(2n-2){    width: 49.5%;float: right;}
	
.register-btn{clear: both;float: left;width: 100%;padding: 0px 0px;}
.register-btn input{background: #663366;color: #fff;padding: 10px 25px;font-size: 14px;    border-radius: 4px;}
.register-page1{    font-size: 33px;
    font-weight: 300;
    border-bottom: 1px solid #ddd;
    color: #777;
    padding: 0px 0px 17px 0px;
    margin-bottom: 28px;}
	
a:hover, a:focus, a:active{color:#777;}
#person_terms_of_service{float: left;width: 3%;height: 15px;}
.btn_1 green{border: 0px;}
.btn_1 green{}
.con_left .nav-tabs>li>a{color: #777;font-size: 18px;}

.state-indicator {
background-color: #fff;
border-radius: 2px;
border-color: #d32f2f;
color: #A41200;
padding: 5px 5px 5px 14px;
display: inline-block;
position: relative;
margin: 0 0 5px;
box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.3);
text-align: left;
}

#myBook .pet-search-right{width: 100%;float: left;}
	
</style>





<?php get_footer(); ?>	


<script src="<?php echo get_template_directory_uri(); ?>/uploadify/jquery.form.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
			target:'#images_preview',
			beforeSubmit:function(e){
				$('.uploading').show();
			},
			success:function(e){
				$('.uploading').hide();
			},
			error:function(e){
			}
		}).submit();
	});
});
</script>	
<script>
<?php 
if($_REQUEST['type']!=''){?>
   openTabs("<?php echo $_REQUEST['type'];?>")
<?php }
else{?>
	openTabs("profile");
<?php } ?>

function openTabs(type){
	$('.tabs').removeClass('active');
	$('#tab_'+type).addClass('active');
}

 $('#changepasswordid').click(function(){
	 
	 var flag=0;
	 
	 var currentPw = $("#currentPw").val();
     var password = $("#newPw").val();
     var confirmPassword = $("#confirmPw").val();
    
	 
    if($('#currentPw').val()=="")
      {
		  
	 $('#err_currentPw').html('<span class="state-indicator">Please enter your Current Password.</span>');
	  $('#currentPw').focus();
	  var flag=1;  
      }
	  
	 if($('#newPw').val()=="")
      {
	  $('#err_newPw').html('<span class="state-indicator">Please enter new password.</span>');
	  $('#newPw').focus();
	  var flag=1;  
     }
	  
	 if($('#confirmPw').val()=="")
      {
		  
	 $('#err_confirmPw').html('<span class="state-indicator">Retype your password.</span>');
	  $('#confirmPw').focus();
	  var flag=1;  
      }
	  
	 if(password != confirmPassword) {
		 
	 $('#err_confirmPw').html('<span class="state-indicator">Passwords mismatched.</span>');
	  $('#confirmPw').focus();
	  var flag=1;  
        }
	if(flag==1){
	return false;	 
	}
	   else{ 
	
		  $.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=ChangePassword&currentPw="+$('#currentPw').val()+
			                         "&newPw="+$('#newPw').val()+
			                         "&confirmPw="+$('#confirmPw').val(),
			 success: function(Data){
			if(Data==1)
			{
			alert("Your Password is Reset.");
			window.location.reload();
			 //window.location.href="<?php echo get_template_directory_uri();?>/thank_you/";
			}else{
				alert("Email id exits!");
				//window.location.reload();
				
			}
			  },
		 })
	  }
   }); 	
   
   function blankField(filedID, val){ 
  if($('#'+filedID).val()!=''){
	 $('#err_'+filedID).html('');
  }
  
}


 $('#accountUpdate').click(function(){
	var flag=0;
 var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	 var IndNum =/^(\+91-|\+91|0)?\d{10}$/;	
 
	 if($('#firstname').val()=="")
      {
      $('#err_firstname').html('<span class="state-indicator">Please enter your First Name.</span>');
	  $('#firstname').focus();
	  var flag=1;
      }
	 if($('#last_name').val()=="")
      {
     $('#err_last_name').html('<span class="state-indicator">Please enter your Last Name.</span>');
	  $('#lastname').focus();
      var flag=1;
      }
	 if($('#address').val()=="")
      {
      $('#err_address').html('<span class="state-indicator">Please enter your Address.</span>');
	  $('#address').focus();
      var flag=1;
      }
	 if($('#city').val()=="")
      {
      $('#err_city').html('<span class="state-indicator">Please enter your City.</span>');
	  $('#city').focus();
      var flag=1;
      }
	if($('#country').val()=="")
      {
      $('#err_country').html('<span class="state-indicator">Please enter your Country.</span>');
	  $('#country').focus();
      var flag=1;
      }
	 if($('#phone').val()=="")
      {
      $('#err_phone').html('<span class="state-indicator">Please enter your Contact Number.</span>');
	  $('#phone').focus();
       var flag=1;  
      }
	 if($('#email').val()=="")
      {
     $('#err_email').html('<span class="state-indicator">Please enter your Email.</span>');
	  $('#email').focus();
      var flag=1;     
      }
	if (!re.test($("#email").val()))
     {
     $('#err_email').html('<span class="state-indicator">Invalid Email ID.</span>');
      $('#email').focus();
      var flag=1;     
     }
	if ($("#password").val()=="")
     {
     $('#err_password').html('<span class="state-indicator">Please enter your Password.</span>');
      $('#password').focus();
      var flag=1;   
     }
	 if ($("#password1").val()=="")
     {
     $('#err_password1').html('<span class="state-indicator">Re Enter your Password.</span>');
      $('#password').focus();
      var flag=1;   
     }
	 if ($("#password").val() != $("#password1").val())
     {
     $('#err_password1').html('<span class="state-indicator">Password Mismached</span>');
      $('#password').focus();
      var flag=1;   
     }

   if(flag==1){
	return false;	 
	}
	else{
	  var frmdata =$('#contactform').serialize();
		 $.ajax({
					 type: "POST",
					 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
					 data: "action=accountUpdate&"+frmdata,
					 success: function(Data){
					if(Data==1)
					{
					window.location.href="<?php echo site_url(); ?>/booking/?type=profile";
					}
					  },
	  })
   }			 
});	
   </script>
   
   
   

