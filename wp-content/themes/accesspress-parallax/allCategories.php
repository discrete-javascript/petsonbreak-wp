<?php 
/**
 Template Name: All Categories
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

/* $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
echo"<pre>";
print_r($results); die; */


$extQuery ='';
if($_REQUEST['sid']!=''){
 $extQuery.=" and service_category='".$_REQUEST['sid']."'";	
}
if($_REQUEST['destName']!=''){
 //$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
  $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'"; 
}

$serviceTitle ='';
if($_REQUEST['sid']!='' && $_REQUEST['destName']!=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']). ' in ' .$_REQUEST['destName'];	
}
elseif($_REQUEST['sid']!='' || $_REQUEST['destName']=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']);
}
elseif($_REQUEST['destName']!='' || $_REQUEST['sid']=''){
  $serviceTitle.=$_REQUEST['destName']; 
}
else{
	$serviceTitle.='Pet Services';
}

?>

<style>

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



.ser_services{
 background-position:center center;
 background-repeat:no-repeat;
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

.con_right{float: right;width:30%;background-color: #f2db5c;padding:20px;margin-top:30px;margin-right:15px;}
.con_right h2{    font-size: 22px;
    color: #fff;
font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}

.con_left{float: left;width:68%;    padding: 28px 21px 40px 0px;}

#petBrd-page-wrap{padding-bottom: 15px;}
.pet_breadcrumb { 
	list-style: none; 
	overflow: hidden; 
	font: 15px;
}
.pet_breadcrumb li { 
	float: left; 
}
.pet_breadcrumb li a {
	color: white;
	text-decoration: none; 
	padding: 5px 0 5px 55px;
	background: #636; 
	position: relative; 
	display: block;
	float: left;
}
.pet_breadcrumb li a:after { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid #636;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	left: 100%;
	z-index: 2; 
}	

.pet_breadcrumb li.pet_breadcrumbActive a{
background: #636; 
}

.pet_breadcrumb li.pet_breadcrumbActive a:after{
border-left: 30px solid #636;
}


.pet_breadcrumb li a:before { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid white;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	margin-left: 1px;
	left: 100%;
	z-index: 1; 
}	
.pet_breadcrumb li:first-child a {
	padding-left: 10px;
}

.pet_breadcrumb li:last-child a {
	background: white !important;
	color: black;
	pointer-events: none;
	cursor: default;
}
.pet_breadcrumb li:last-child a:after { border: 0; }


.news-header{
    padding-bottom: 20px;
}

.news-header h2{
	font-size: 30px;
    font-weight: 600;
    color: #302a3d;
    position: relative;
    margin-bottom:22px;
}

.cat_colm{    width: 100%;
    float: left;
    height: 200px;
	position: relative;
margin-bottom: 15px;}

.ser_services{
 background-position:center center;
 background-repeat:no-repeat;
}

.cat_colm>div{
	width: 100%;
    float: left;
    height: 100%;
    background: #000;
}
.cat_colm>div img{
	width: 100%;
	height: 100%;
	opacity: 0.9;
}

.cat_colm .desc{
	position: absolute;
    bottom: 0px;
    padding: 10px;
}
.cat_colm .desc h2{
	color: #fff;
}

.cat_colm .desc p{
	
	display: -webkit-box;
    color: #fff;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.cat_overlay{
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    background: rgba(0, 0, 0, 0.62);
    text-align: center;
    opacity: 0;
    transition: 0.6s ease-in-out;
}

.cat_det{
	display: inline-block;
    border-radius: 50px;
    width: 50px;
    height: 50px;
    background: #fff;
    vertical-align: middle;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
}

.cat_det .fa{
	vertical-align: middle;
    color: #000;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
}

.cat_colm:hover .cat_overlay{
	opacity: 0.9;
	transition: 0.6s ease-in-out;
	
}


</style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="allCat">
<div class="container" style="display: flex;" >

<?php if($_REQUEST['sid']!=''){ ?>

	<div class="con_left"> 
				<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#"><?php echo $serviceTitle;?></a></li>
				</ul>
			</div>
	   <div class="news-header">
        <h2><?php echo $serviceTitle ; ?></h2>
      </div>
	   <div id="all_categories">
	   	  <div class="row">
		  
		  <?php 
            $weekresults =$wpdb->get_results("select * from twc_petfriendly_destination where 1 ".$extQuery." ".$extrCond."");
			foreach($weekresults as $weekrow){
            // $link =site_url().'/search-vendor/?sid='.$weekrow->service_category;
			 $link =site_url().'/search-vendor/?sid='.$weekrow->service_category.'&destName='.$weekrow->destination;
			 ?>
			 
		  
	   	     <div class="col-md-6 col-sm-6">
	   	       <div class="cat_colm">
	   	          <div class="" rel="<?php echo $weekrow->service_category;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $weekrow->img_path;?>);background-size:cover;">
				   
                   <div class="desc">
                      <h2><?php echo $weekrow->title;?></h2>
                      <p><?php echo $weekrow->destination;?></p>
                   </div>
                   <div class="cat_overlay">
                     <a href="<?php echo $link;?>" class="cat_det"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                   </div>
	   	          </div>
	   	       </div>
	   	     </div>
                <?php } ?>
	   	  </div>
	   </div>
  
	</div>
	
	<?php }  else { ?>
	
	<div class="con_left"> 
	   				<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">Pet Related Services</a></li>
				</ul>
			</div>
	
	   <div class="news-header">
        <h2>Explore our Pet Friendly World - Pet Related services</h2>
      </div>
	   <div id="all_categories">
	   	  <div class="row">
		  
		  <? 
            $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
			foreach($results as $objrow){
             $link =site_url().'/search-vendor/?sid='.$objrow->id;?>
		  
	   	     <div class="col-md-6 col-sm-6">
	   	       <div class="cat_colm">
	   	          <div class="ser_services" rel="<?php echo $objrow->id;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objrow->category_image;?>);background-size:cover;">
				   
                   <div class="desc">
                      <h2><?php echo $objrow->title;?></h2>
                      <p><?php echo $objrow->description;?></p>
                   </div>
                   <div class="cat_overlay">
                     <a href="javascript:void();" class="cat_det"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                   </div>
	   	          </div>
	   	       </div>
	   	     </div>
                <?php } ?>
	   	  </div>
	   </div>
  
	</div>
	
	<?php } ?>
	
	<div class="con_right">
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
		<div id="quick_links">
			<?php  echo getQuickLinks();?>
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
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripslashes($obj->title);?></a></h3>
         <p><?php echo stripcslashes(substr($obj->description,0,148)); ?>...</p>
       </div>
       <?php } ?>

     </div>
  </div>
</div>
		</div>

	</div>

</div>
</div>



</div>

<style>

</style>






<?php get_footer(); ?>

<script>
 $('#vendor_login').click(function(){
	  var frmdata =$('#loginform').serialize();
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
				else if(Data=='Administrator'){ 
				 window.location.href="<?php echo site_url();?>/wp-admin/index.php";		
				 }
				else if(Data=='Vendor'){ 
				   window.location.href="<?php echo site_url();?>/booking/?type=profile";
				 }
				 else{
					 window.location.href="<?php echo site_url();?>/member-profile/?type=profile"; 
				 }
			  }
		 })
 });		 
</script>

