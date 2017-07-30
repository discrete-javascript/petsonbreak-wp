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

<style>

ul li{
	
	list-style-type:none;
}

#myBook .nav > li > a:focus i,#myBook .nav > li > a:hover i{
	 color: #fff !important;
}
#myBook .nav > li > a:focus,#myBook .nav > li > a:hover {
	border-color: #ddd transparent #ddd #ddd;
    background-color: #636;
    color: #fff !important;
}



#myBook .my-book-mngSrv .modalFields li{
	width:49%;
}

#myBook .my-book-mngSrv .modalFields li:nth-child(2n-1){
	float:left;
}

#myBook .my-book-mngSrv .modalFields li:nth-child(2n){
	float:right;
}

#myBook .my-book-mngSrv  .modalFields li.Description-inputoo{
	margin:0px;
}

#myBook .my-book-mngSrv  .modalFields li .services-offered-container{
  background: #fff none repeat scroll 0 0;
    border: 1px solid #333;
    border-radius: 4px;
    float: left;
    margin-bottom: 20px;
    padding: 20px;
    width: 100%;
	border:1px solid #777;
}

#myBook .my-book-mngSrv  .modalFields li.petShop_services-offered .services-offered-container{
	padding:0px;
	border:0px;
	background:none;
	border-radius:0px;
}

#myBook .gallery{width: 100%;float: left;margin-top: 20px;}
#myBook .gallery ul{width: 25%;float: left;margin-bottom:20px;height: 215px;}

#myBook .gallery ul li{
	width:100%;
	float:left;
	height:100%;
	
}

#myBook .gallery ul li .deleteVendorImage{
	color: red;
    display: block;
    text-align: center;
    font-size: 16px;
    padding: 5px 0px;
}

#myBook .gallery ul li img{
	width:100%;
	height: 100%;
}

#myBook .my-book-mngSrv  .modalFields li  .services-offered-div{
	margin-bottom:0px;
	width:100%;
}

#myBook .my-book-mngSrv  .modalFields li.petShop_services-offered  .services-offered-div{
	height: auto;
    overflow: inherit;
    max-height: inherit;
}

#myBook .my-book-mngSrv  .modalFields li  .services-offered-div .srv-off-chk{
	width:50%;
}



#myBook .my-book-mngSrv  .modalFields li  .services-offered-div .srv-off-chk>label{
	font-weight:normal;
	font-size:14px;
	margin-bottom:0px;
}

#myBook .my-book-mngSrv  .modalFields li.services-offered{
	width:100%;
	float:left;
	margin:0px;
}


#myBook .tabs-right > .nav-tabs,
.tabs-left > .nav-tabs {
  border-bottom: 0;
}

#myBook .tab-content > .tab-pane,
.pill-content > .pill-pane {
  display: none;
}

#myBook .tab-content > .active,
#myBook .pill-content > .active {
  display: block;
}


#myBook .tabs-left > .nav-tabs > li,
#myBook .tabs-right > .nav-tabs > li {
  float: none;
}

#myBook .tabs-left > .nav-tabs > li > a,
#myBook .tabs-right > .nav-tabs > li > a {
  min-width: 74px;
  margin-right: 0;
  margin-bottom: 3px;
  font-size: 15px;
  color: #777;text-align: center;
  
}

#myBook .tabs-left > .nav-tabs {
  float: left;
  margin-right: 19px;
  border-right: 1px solid #ddd;
}

#myBook .tabs-left > .nav-tabs > li > a {
  margin-right: -1px;
  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
}

#myBook .tabs-left > .nav-tabs > li > a:hover,
#myBook .tabs-left > .nav-tabs > li > a:focus {
  border-color: #eeeeee #dddddd #eeeeee #eeeeee;
}

#myBook .tabs-left > .nav-tabs .active > a,
#myBook .tabs-left > .nav-tabs .active > a:hover,
#myBook .tabs-left > .nav-tabs .active > a:focus {
  border-color: #ddd transparent #ddd #ddd;    background-color: #636;    color: #fff;

}
#myBook .tabs-left > .nav-tabs .active > a i,
#myBook .tabs-left > .nav-tabs .active > a:hover i,
#myBook .tabs-left > .nav-tabs .active > a i:focus {
color: #fff;

}

#myBook .tabs-left > .nav-tabs > li > a i{    display: block;text-align: center;color: #636;font-size:20px;    margin-bottom: 8px;}
#myBook.tab-content147{}
#myBook.tab-content147 .booking-table-container{
	    float: left;
    width: 100%;
    overflow: auto;
    max-height: 400px;}
	




#myBook.tab-content147 .booking-table-container::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}
#myBook.tab-content147 .booking-table-container::-webkit-scrollbar
{
	width: 6px;
	height:8px;
	background-color: #F5F5F5;
}

#myBook.tab-content147 .booking-table-container::-webkit-scrollbar-thumb
{
	background-color: #000000;
}


	
	
#myBook .booking-title-container h5 {
    color: #663366;
    font-size: 25px;
    font-weight: 500;
}


#myBook .booking-title-container p {
    padding: 30px 0px;
}

#myBook .recent_bookings{font-size: 35px;color: #777;font-weight: 100;}
#myBook .this_section_pro{ font-size: 14px;margin-bottom: 30px;color: #777;}
#myBook.tab-content147 .nav.nav-tabs{width: 18%;margin-right: 3%;}
#myBook.tab-content147 .tab-content{padding: 40px 0px;    float: left;width: 79%;}

#myBook .facebook-div_all{clear: both;overflow: hidden;    width: 50%;}
#myBook .facebook-div_all ul {}
#myBook .facebook-div_all ul li{float: left;width: 25%;margin-bottom: 8px; }
#myBook .facebook-div_all ul li input{    width: 100%;border: 1px solid #ccc;height: 36px;}
#myBook .facebook-div_all ul li:nth-child(2n-2){width: 74%; float: right;}
#myBook .facebook-div_all p{font-size: 16px;font-weight: 600;margin-bottom: 14px;}
#myBook .facebook-div_all p span{font-size: 12px;color: #777;}

.booking-container{padding:50px 0px;}
.book-table-headings{background:#663366;color:#fff;}
.book-table-headings tr{}
.book-table-headings tr td{}
.booking_table{}
.booking_table td{padding: 10px 10px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;}
.booking_table td a{font-size:12px; color:#777;}
.booking-table-container{background:#fff;    border: 1px solid #ccc;border-right: 0px;border-bottom: 0px;border-top: 0px;}
.booking-title-container{}
.booking-title-container h5{color: #59c45a;font-size: 25px;font-weight: 500;}
.booking-title-container p{padding:30px 0px;}
.booking_se{}
.bookings_icon{display: flex;flex-direction: column;align-items: Center;font-size: 15px;    border-right: 1px dotted #ccc;
border-bottom: 1px dotted #ccc;padding-bottom:15px;}
.bookings_icon .fa{    font-size: 35px;
    color: #59c45a;
padding-bottom: 10px;}

.tab-content{
	
	margin-left:280px;
	margin-top:-400px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="container tab-content147" id="myBook">
  <div class="row">
    <div class="col-md-12">

      <!-- tabs left -->
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs" style="margin-top:50px;">
		  <li class="tabs active" id="tab_services" title="Add Services" ALT="Add Services"><a href="<?php echo site_url();?>/booking?type=services"><i class="fa fa-wrench" aria-hidden="true"></i>Manage Services</a></li>
		  <li class="tabs" id="tab_profile"><a href="<?php echo site_url();?>/booking?type=profile"><i class="fa fa-user" aria-hidden="true"></i>Manage Profile</a></li>
		  <!--
          <li class="tabs" id="tab_booking"><a href="<?php echo site_url();?>/booking?type=booking"><i class="fa fa-calendar-check-o"></i>My Bookings</a></li>
		  -->
          <li class="tabs" id="tab_changepass"><a href="<?php echo site_url();?>/booking?type=changepass"><i class="fa fa-key" aria-hidden="true"></i></i>Change Password</a></li>
		  <li class="tabs" id="tab_offered"><a href="<?php echo site_url();?>/booking?type=offered"><i class="fa fa-tags" aria-hidden="true"></i></i>Offer and Discount</a></li>
		  <li class="tabs" id="tab_enquiry"><a href="<?php echo site_url();?>/booking?type=enquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>Manage Enquiry</a></li>
        </ul>
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


       

      </div>
      <!-- /tabs -->
      
    </div>   <!-- /row -->
  </div>


<style>
/* custom inclusion of right, left and below tabs */


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
   
   
   

