<?php 
/**
 Template Name: login Page
 
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
<style>


#login input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
    background-color: #fff;
    background-image: none;
    color: rgb(0, 0, 0);
}
.con_left{float: left;width:68%;    padding: 28px 21px 40px 0px;}

ul li{
	
	list-style-type:none;
}

#news_n_updates .pet_house1{
	width:100%;
	background: #fff;
	margin-left:auto;
	margin-right:auto;
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
	padding:5px 0px;
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



.ser_services{
 background-position:center center;
 background-repeat:no-repeat;
}

.con_right{float: right;width:30%;background-color: #F47555;padding:20px;margin-top:30px;margin-right:15px;}
.con_right h2{    font-size: 22px;
    color: #fff;
font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}


.pet-search-left{}
.pet-search-right{}	
#filter_frm .criteria_listing_Star input{float:left;}
.pet-search-left{float: left;width: 69%;}
.pet-search-right{float: right;width: 100%;background-color: #F47555;margin-bottom:15px;}
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
.pet-child-right ul li .float_right14 h2{font-size: 25px;font-weight: 600;color: #F47555;margin: 10px 0px;}

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


#quick_links{
	width:100%;
	float:left;
	padding-bottom:15px;
}

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

</style>

<div id="login" style="margin-top:0px;margin-left:20px;padding-bottom:50px;">
<div class="col-sm-8">
	<div class="row"> 
		<form method="post" id="loginform" class="form-inline">
		 <input type="hidden" name="redirect" id="redirect" value="<?php echo $loginRedirect;?>">
		<h2 class="register-page1">Log in</h2>
		<div class="form-group col-sm-6">
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="user_login" class="form-control" style="width:100%;" id="user_login" placeholder="Email address" title="Email address is required." type="email">
		</div>
			
		<div class="form-group col-sm-6">
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password</span></label>
				<input type="password" class="form-control" style="width:100%;" name="user_password" id="user_password"  placeholder="password" title="Email address is required." type="email">
				
				
		</div>
	</div>
	
	
	<div class="row"> 
	
		   <div class="form-group col-sm-4">
				<a href="<?php echo $siteUrl;?>/forgot-password/" class="forgot_po">Forgot your password?</a><br>
				</div>

		   <div class="form-group col-sm-4">
			
				<!--<a href="http://petsonbreak.com/login/" class="btn_1 green medium">Log In</a>-->
				  <input type="button" id="vendor_login" value="Log In" class="btn_1 green medium">
				
			</div>
			
	</div>
	<div class="row"> 	
		   <div class="form-group col-sm-7">
		     <h2 class="register-page1" style="clear: both;padding: 21px 0px;"> Don't Have An Account? </h2>
				<button id="Register" OnClick="change_url('<?php echo site_url();?>/register/')" class="btn_1 green medium">Register Now</button>
			</div>
		   
		 </form>  
    </div>
	
</div>
<div class="col-sm-4" >



<div class="row col-sm-12" style="padding:10px;background:#F47555;">
	    	
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
			<div id="quick_links">
			<?php  echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates" style="margin-top:750px;">
		<h2><?php echo $mk_options['latest_news'];?></h2>
			<div class="pet_house1 news-section">
    
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
      
          foreach($results as $obj){?>
       <div class="news">
         <h3 style="font-weight:bold;"><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
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
</div>
<div class="height_class1457" style="margin-top:30px;height:10px;">


</div>



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
				 else if(Data=='subscriber'){ 

				   window.location.href="<?php echo site_url();?>/member-profile/?type=enquiry";
				 }
				  
			  }
		 })
 });	

 
</script>
