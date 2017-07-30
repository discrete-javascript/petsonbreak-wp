<?php session_start();
/**
 Template Name: Member Profile	
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



$count_val=count($nt);  
$sql_pets_details="select * from twc_pet_detail where user_id='".$_SESSION['userID']."'";
$Results_pet = $wpdb->get_results($sql_pets_details);
$Results_pets =$Results_pet[0];
$pet_title=$Results_pets->title;
 
if(($pet_title=='Dogs')|| ($pet_title=='Cats') || ($pet_title=='Horse')){
	$PetDetail=json_decode($Results_pets->pet_detail,true);	
	$PetTitle=$Results_pets->title;
}
else{
	$PetDetailss=$Results_pets->pet_detail;
	$PetTitle=$Results_pets->title;
}
$count_val=count($PetDetail);
$count_vals=count($PetDetailss);


$sresults_img =$wpdb->get_Results("select * from twc_member_gallery where user_id='".$_SESSION['userID']."'");


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="container tab-content147" id="memberProf" style="padding-top:50px;">
  <div class="row">
    <div class="col-md-12">
  	 <div class="con_left">
      <!-- tabs left -->
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
		  <li class="tabs active" id="tab_enquiry"><a href="<?php echo site_url();?>/member-profile?type=enquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>View Query</a></li>
		  <li class="tabs " id="tab_profile"><a href="<?php echo site_url();?>/member-profile?type=profile"><i class="fa fa-user" aria-hidden="true"></i>Member Profile</a></li>
          <li class="tabs" id="tab_changepass"><a href="<?php echo site_url();?>/member-profile?type=changepass"><i class="fa fa-key" aria-hidden="true"></i>Change Password</a></li>
		 
        </ul>
        <div class="tab-content">
		 <?php if($_REQUEST['type']=='profile'){
			      include('includes/member_profile.php');
		        }
				if($_REQUEST['type']=='changepass'){
			      include('includes/change_password.php');
		        }
				if($_REQUEST['type']=='enquiry'){
			      include('includes/manage_query.php');
		        }
		   ?>
		 </div>

        </div>
        </div>

        <div class="con_right" style="margin-bottom:50px;">

        	<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
		<div id="quick_links">
	       <?php echo getQuickLinks();?>
		</div>
		
		
		
				<div id="news_n_updates">	
				<h2><?php echo $mk_options['latest_news'];?></h2>
					<div class="pet_house1 news-section">
    
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
      <!-- /tabs -->
      
    </div>   
  </div><!-- /row -->
</div>



<style>
/* custom inclusion of right, left and below tabs */

#wpadminbar{
	
	display:none;
}

#masthead{
	margin-top:-30px;
	
}

.tabs-right > .nav-tabs,
.tabs-left > .nav-tabs {
  border-bottom: 0;
}

.tab-content > .tab-pane,
.pill-content > .pill-pane {
  display: none;
}

.tab-content > .active,
.pill-content > .active {
  display: block;
}


.tabs-left > .nav-tabs > li,
.tabs-right > .nav-tabs > li {
  float: none;
}

.tabs-left > .nav-tabs > li > a,
.tabs-right > .nav-tabs > li > a {
  min-width: 74px;
  margin-right: 0;
  margin-bottom: 3px;
  font-size: 15px;
  color: #777;text-align: center
}

.tabs-left > .nav-tabs {
  float: left;
  margin-right: 19px;
  border-right: 1px solid #ddd;
}

.tabs-left > .nav-tabs > li > a {
  margin-right: -1px;
  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
}

.tabs-left > .nav-tabs > li > a:hover,
.tabs-left > .nav-tabs > li > a:focus {
  border-color: #eeeeee #dddddd #eeeeee #eeeeee;
}

.tabs-left > .nav-tabs .active > a,
.tabs-left > .nav-tabs .active > a:hover,
.tabs-left > .nav-tabs .active > a:focus {
  border-color: #ddd transparent #ddd #ddd;    background-color: #636;    color: #fff;

}
.tabs-left > .nav-tabs .active > a i,
.tabs-left > .nav-tabs .active > a:hover i,
.tabs-left > .nav-tabs .active > a i:focus {
color: #fff;

}

.tabs-left > .nav-tabs > li > a i{    display: block;text-align: center;color: #636;font-size:20px;    margin-bottom: 8px;}
.tab-content147{}
.tab-content147 .booking-table-container{float: left;width: 84%;}
.booking-title-container h5 {
    color: #F2DB5C;
    font-size: 25px;
    font-weight: 500;
}

.booking-title-container p {
    padding: 30px 0px;
}

.recent_bookings{font-size: 35px;color: #777;font-weight: 100;}
.this_section_pro{ font-size: 14px;margin-bottom: 30px;color: #777;}
#memberProf.tab-content147 .tab-content{padding: 40px 0px;    float: left;width: 76%;}

#memberProf .pet-search-right{width: 100%;float: left;}

#memberProf .pets_option{width: 100%;float: left;}

.facebook-div_all{clear: both;overflow: hidden;    width: 50%;}
.facebook-div_all ul {}
.facebook-div_all ul li{float: left;width: 25%;margin-bottom: 8px; }
.facebook-div_all ul li input{    width: 100%;border: 1px solid #ccc;height: 36px;}
.facebook-div_all ul li:nth-child(2n-2){width: 74%; float: right;}
.facebook-div_all p{font-size: 16px;font-weight: 600;margin-bottom: 14px;}
.facebook-div_all p span{font-size: 12px;color: #777;}

#news_n_updates .pet_house1{
	width:100%;
	background: #fff;
	
}

#news_n_updates .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#news_n_updates .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#news_n_updates .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#news_n_updates .news-title img{
	width:10px;
	height:10px;
}

#news_n_updates .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#news_n_updates .news:last-child{
	border-bottom:0px;
}

#news_n_updates .news-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
}

#news_n_updates .news-section-div{
	padding:0px;
}
#news_n_updates .news-section-body{
	padding:10px 0px;
	height:250px;
	overflow:scroll;
}

#news_n_updates .news-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#news_n_update .news-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}

.pet-search-left{}
.pet-search-right{}	
#filter_frm .criteria_listing_Star input{float:left;}
.pet-search-left{float: left;width: 69%;}
.pet-search-right{float: right;width: 100%;background-color: #f2db5c;margin-bottom:15px;}
.pet-child-left{float: left;width: 28%;border-right: #d8d8d8 1px solid;padding: 0px 10px 0px 0px;}
.pet-child-right{float: right;border-left: #f2f2f2 1px solid;width: 72%;padding: 0px 0px 0px 10px;position:relative;}
.pet-child-right ul{}
.pet-child-right > ul > li{background: #fff;float: left;width: 100%;margin-bottom: 7px;height: 290px;}
.pet-child-right > ul > li:last-child{margin-bottom:0px;}
.pet-child-right ul li .float_left14{float: left;width: 40%;height: 100%;background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;}
.pet-child-right ul li .float_left14 img{height: 100%;width: 100%;}
.pet-child-right ul li .float_right14{float: right;width: 59%;height: 100%;padding: 10px}
.pet-child-right ul li .float_right14 .text-pack17{width: 100%;float: left;}
.pet-child-right ul li .float_right14 h2{font-size: 25px;font-weight: 600;color: #f2db5c;margin: 10px 0px;}

.boxs-41{width: 100%;float: left;}
.boxs-41 ul{float: left;width: 100%;}
.boxs-41 ul li{float: left;width: 50%;position: relative;    padding: 0px 8px 0px 0px;}
.boxs-41 ul li:nth-child(1){padding: 0px -5px 5px 0px;}
.boxs-41 ul li:nth-child(2){padding: 0px 0px 5px 5px;}
.boxs-41 ul li:nth-child(3){padding: 5px -5px 0px 0px;}
.boxs-41 ul li:nth-child(4){padding: 5px 0px 0px 5px;}


.boxImg1 img{width: 100%; height: 114px;
overflow: hidden;margin-left:-18px;}
.boxImg1-text{position: absolute;bottom:8px;left: 7px;right: 8px;}
.boxImg1-text h1{font-size: 15px;color: #fff;font-weight: 100;}
.boxImg1-text p{color: #fff;font-size: 13px;font-weight: 100;width: 100%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.boxImg1-text p a{color:#fff;font-size:15px;}


#quick_links .pet_house1{
	width:100%;
	background: #fff;
}

#quick_links .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#quick_links .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#quick_links .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#quick_links .news-title img{
	width:10px;
	height:10px;
}

#quick_links .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#quick_links .news:last-child{
	border-bottom:0px;
}

#quick_links .quick-links-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
	padding:10px;
}



#quick_links .quick-links-section-div{
	padding:0px;
}
#quick_links .quick-links-section-body{
	padding:0px;
}

#quick_links .quick-links-section-body ul li{

	border-bottom: 1px solid #F6F6F6;
    font-size: 15px;
    color: #777;
	cursor:pointer;
}

#quick_links .quick-links-section-body ul li a.quick_petsrv{
	color: #777;
}

#quick_links .quick-links-section-body ul li>span{
		padding:15px 10px 10px 15px;
		display: inline-block;
		width: 100%;
		border:1px solid transparent;
}

#quick_links .quick-links-section-body ul li.isActive>span{
	border-bottom:1px solid #e8e8e8;
}

#quick_links .quick-links-section-body ul li>span{
	
}


#quick_links .quick-links-section-body ul li>span .fa-left{
	padding-right:12px;
}

#quick_links .quick-links-section-body ul li>span .fa-plane{
	color:#A3CCFF;
}

#quick_links .quick-links-section-body ul li>span .fa-cutlery{
	color:#FCC66E;
}

#quick_links .quick-links-section-body ul li>span .fa-taxi{
	color:#E072BE;
}
#quick_links .quick-links-section-body ul li>span .fa-calendar{
	color:#EBB4DA;
}
#quick_links .quick-links-section-body ul li>span .fa-paw{
	color:#00BEA6;
}

#quick_links .quick-links-section-body ul li>span .fa-tags{
	color:#A3CCFF;
}







#quick_links .quick-links-section-body ul li>span .fa-right{
	float: right;
    font-size: 21px;
    color: #ccc;
	transition:0.2s ease-in-out;

}

#quick_links .quick-links-section-body ul li.isActive>span .fa-right{
	transform: rotate(90deg);
    transition: 0.2s ease-in-out;
}

#quick_links .quick-links-section-body ul li>span:hover{
	background:#F6F6F6;

}


#quick_links .quick-links-section-body ul li .quick-sub-menu{
 display:none;	
 padding-left:20px;
}

#quick_links .quick-links-section-body ul li .quick-sub-menu li{
	 padding:15px 0 10px 35px;
}

#quick_links .quick-links-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#quick_links .quick-links-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}

ul li{
	
	list-style-type:none;
}

</style>



<style>
.con_left{float: left;width:70%;    padding: 28px 21px 40px 0px;

}
.con_right{float: right;width:30%;background-color: #F2DB5C;padding: 30px;}
.con_right h2{    font-size: 22px;
    color: #fff;
    font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
    font-weight: 100;}
.modalLogin-loginFields{padding: 20px 0px;}
.modalLogin-loginFields li{float: left;width: 49.5%;}

.modalLogin-loginFields li input{    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;}

.modalLogin-loginFields li:nth-child(2n-2){    width: 49.5%;float: right;}
	
.register-btn{clear: both;float: left;width: 100%;padding: 0px 0px;}
.register-btn input{background: #F2DB5C;color: #fff;padding: 10px 25px;font-size: 14px;    border-radius: 4px;}
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
	if($('#skype_id').val()=="")
      {
      $('#err_skype_id').html('<span class="state-indicator">Please enter your Skype ID.</span>');
	  $('#skype_id').focus();
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
						alert('Profile is updated sucessfully');
					}else{
						alert('Error');
					}
					  },
	  })
   }			 
});	
   </script>
   
   
   

