<?php 
/**
 Template Name: Search Vendor
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



$extQuery ='';
if($_REQUEST['sid']!=''){
 $extQuery.=" and service_category='".$_REQUEST['sid']."'";	
}
if($_REQUEST['destName']!=''){
 //$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
  $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'"; 
}
 
$results=$wpdb->get_results("select count(*) as total, MIN(price) as minPrice, MAX(price) as maxPrice from twc_vendor_services where 1 ".$extQuery." ");

$objs =$results[0];
$num_of_products =$objs->total;
$num_of_pages=ceil($num_of_products/$limit);
$LR=$objs->minPrice;
$MR=$objs->maxPrice;

$strResults1 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='1'");
$coun_star1 =$strResults1[0];

$strResults2 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='2'");
$coun_star2 =$strResults2[0];

$strResults3 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='3'");
$coun_star3 =$strResults3[0];

$strResults4 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='4'");
$coun_star4 =$strResults4[0];

$strResults5 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='5'");
$coun_star5 =$strResults5[0];

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


.con_left{float: left;width:67%;    padding: 28px 21px 40px 0px;}


.con_right{float: right;width:30%;background-color: #f2db5c;padding:20px;margin-top:30px;margin-right:15px;}
.con_right h2{    font-size: 22px;
    color: #fff;
font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}


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


.breadcrumbActive{ background: hsla(34,85%,25%,1) !important;}	

.errSpan{
    height: 20px;
    color: #d77f3f;
    display:block;
    margin-bottom: 2px;
    line-height: 20px;
	width:100%;
	float:left;
}



.pet-child-right{float: right;border-left: #f2f2f2 1px solid;width: 72%;padding: 0px 0px 0px 10px;position:relative;}

.pagination-div .pagination>li>a:hover,.pagination-div .pagination>li>span:hover,.pagination-div .pagination>li>a:focus,.pagination-div .pagination>li>span:focus{
	background-color: #636;
    color: #fff;
}

.pagination-div .pagination>.active>a,.pagination-div .pagination>.active>span,.pagination-div .pagination>.active>a:hover,.pagination-div .pagination>.active>span:hover,.pagination-div .pagination>.active>a:focus,.pagination-div .pagination>.active>span:focus{
    background-color: #663366;
    border-color: #663366;
    color:#fff;
}

.pagination-div .pagination li a {
    background-color: #fff;
    color: #636;
    border: #fff;
}

.pagination-div>.pagination>li {
    display: inline;
    width: auto !important;
}

.pagination>li>a, .pagination>li>span {font-size: 15px;color: #777;}
.pagination>li>a, .pagination>li>span {padding: 9px 15px;}




#menu ul li a{
text-decoration: none;
display:block;
   padding: 10.5px 11px;
}

#menu ul{
	
margin: 0;
padding: 0;
list-style-type: none;
	
}


#menu ul li .some-class {
  float: left;
  clear: none;

}

#menu ul li label {
  float: left;
  clear: none;
  display: block;
  padding: 5px;
}

#menu ul li input[type=radio]
 {
  float: left;
  clear: none;
  margin: 2px 0 0 2px;
}

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
.pet-child-right ul li .float_right14 h2{font-size: 25px;font-weight: 600;color: #636;margin: 10px 0px;}

.text-pack17>span:first-child{width: 100%;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;}
.text-pack17>span{float: left;width: 100%;line-height: 26px;font-size: 13px;color: #777;width: 100%;white-space: nowrap;	text-overflow: ellipsis;overflow: hidden;padding-bottom:5px;}
.text-pack17>span i{font-size: 16px;color: #777;padding: 0px 10px 0px 0px;}


 ul li {
	
	list-style-type:none;
	
}

</style>

<input type="hidden" name="page" id="page" value="0">
<div class="search-vendor-container">
	<div class="con_left" style="margin-left:20px;">
	<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#"><?php echo getFieldByID('title','twc_service_category',$_REQUEST['sid']);?></a></li>
				</ul>
			</div>
	<div class="pet-search-leftxx">
		<div class="pet-groomsv">
			<div class="pet-groomsv-text">
				<p><?php echo $serviceTitle; ?></p>
			</div>
			
			<div class="filter-btn-div">
			     <a href="javascript:void();" class="filter-btn">Filter</a>
			    <!-- <a href="javascript:void();" class="modify-btn">Modify Search</a>-->
			  </div>
			
			
		</div>
		
		<div class="pet-child-left">
			<div class="border-right-g" id="navbar-main">
		<span class="close-filter"><i class="fa fa-times" aria-hidden="true"></i></span>
          <div class="filter_sidebar wleft">
           <div>
            <form id="filter_frm"  class="ng-pristine ng-valid">
              <div class="filter_controls_div">
			 
				<h6 class="reset-all-title">Filter your Search<a href="javascript:void(0);" ng-click="resetAll();">Reset All</a> </h6>
				
                <div class="sep1"></div>
                <div class="sep2"></div>
              
                <div class="filter_criteria wleft">
                  <h5>Search By Name</h5>
				  <!--
                  <input type="text" name="hotel_name" id="findbyhotelname" class="hn" value="" ng-model="q" placeholder="Eg, Lalit">-->
				  <input type="text" name="hotel_name" id="findbynamefilter" ng-keyup="HotelFilter()" value="" placeholder="Search by name">
				<!--  <div class="popup hidethisinitially locationpopup_flightsto">-->
				<div class="popup showhidepopup_flightsto hidethisinitially locationpopup_flightsto">
					  <div class="show-autocomplete-popup flights_topop"> <!-- ngRepeat: Hotel_Filters in Hotel_Filter track by $index --> </div>
				</div>
					
                </div>
                <!--<div class="filter_criteria wleft">
                  <h5>Price</h5>
                  <span class="min_price">$<?php echo round($LR);?></span> <span class="max_price">$<?php echo round($MR);?></span>
				 <div class="clear padding_5_0" style="margin-top: 40px;"></div>
				 <input type="hidden" name="Cri_Price" id="Cri_Price" class="ChangePrice_Cls" value="">
				 <div id="slider-range"></div>
                </div>-->
                <div class="sep1"></div>
                <div class="sep2"></div>
                <div class="filter_criteria wleft" id="menu">
                  <h5>Star Rating <a href="javascript:void(0);" ng-click="clearStar();">Clear</a></h5>
                  <ul class="criteria_listing criteria_listing_Star">
                    <li class="some-class">
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="1">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star1->avg_rating;?>)</span></label>
			
			<span style="clear:both;"></span>
                    </li>
                    <li class="some-class">
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="2">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star2->avg_rating;?>)</span></label>
                    </li>
                    <li class="some-class">
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="3">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star3->avg_rating;?>)</span></label>
                    </li>
                    <li class="some-class">
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="4">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star4->avg_rating;?>)</span></label>
                    </li>
                    <li class="some-class">
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="5">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star5->avg_rating;?>)</span></label>
                    </li>
                   
                  </ul>
                </div>
              </div>
              </form></div>
            
          </div>
        </div>
		</div>
		
		<div class="pet-child-right">
		<ul id="serviceList"></ul>
	   <div class="pagination-div" id="pagination">&nbsp;</div>
	  </div>
 </div>
 </div>
	
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
				<a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripcslashes($obj->title);?></a></h3>
					 <p><?php echo stripcslashes(substr($obj->description,0,148));?>...</p>
				   </div>
				   <?php } ?>

				 </div>
			  </div>
			</div>
		</div>
	</div>
</div>


<style>
.pagination li a{background-color: #636;color: #fff;}

</style>
<?php get_footer(); ?>
<script src="http://www.adivaha.com/demo/travel-theme/wp-content/themes/adivaha/js/jquery-ui.js"></script> 


<div class="filter-opac"></div>
<script>

$('.close-filter,.filter-opac').click(function(){
	$('.pet-child-left').removeClass('width-set_results-left-slider');
	$('.filter-opac').fadeOut();
	})
$('.filter-btn').click(function(){
	$('.pet-child-left').addClass('width-set_results-left-slider');
	$('.filter-opac').fadeIn();
	})


$('.modify-btn').click(function(){
$('.horizontal-box').slideToggle();
})
	
	
</script>


<style>

.filter-opac{position:fixed;background:rgba(0,0,0,0.8);top:0;left:0;right:0;bottom:0;display:none;z-index: 21;}

.width-set_results-left-slider{display: block !important;}


.pet_breadcrumb li:last-child a{
	background:none !important;
}

.pet_breadcrumb li:last-child a:before{
	border-left:none;
}

</style>

<script>
	$('.pagination li').click(function(){
	$(this).addClass('active').siblings().removeClass('active');
})

</script>

<script>
$(document).ready(function(){
 var scrollbar =  $( "#slider-range" ).slider({
      range: true,
      min: <?php echo round($LR);?>,
      max: <?php echo round($MR);?>,
      values: [ <?php echo round($LR);?>, <?php echo round($MR);?> ],
      step: 1,
      slide: function( event, ui ) {
      $("#Cri_Price").val(ui.values[ 0 ]+"-"+ui.values[ 1 ]);
      $(".min_price").html("$" + ui.values[ 0 ]);
      $(".max_price").html("$" + ui.values[ 1 ]);
      }
    });
  
   var handleHelper = scrollbar.find(".ui-slider-handle").mouseup(function() { 
     $('#page').val(0);
     searchVendorServices();
	 pagingList();
   })
	
});

$('.Filter_Cls').click(function(){
	$('#page').val(0);
	searchVendorServices();
	pagingList();
})




searchVendorServices();
pagingList();

function changePage(){
 $('.nextPage').click(function(){
	var p =$(this).attr('rel');
	$('#page').val(p);
	searchVendorServices();
 });	

}

function searchVendorServices(){
	 var page=$('#page').val();
	 var filter_Data =$('#filter_frm').serialize();
	  $.ajax({
		 type: "GET",
		 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
		 data: "action=searchVendorServices&sid=<?php echo $_REQUEST['sid'];?>&destName=<?php echo $_REQUEST['destName'];?>&p="+page+'&'+filter_Data,
		 success: function(Data){
	     var myData="";
		 myData = JSON.parse(Data); 
		 var str='';
		 for(a=0; a<myData.length; a++){
			str+='<li>';
				str+='<div class="float_left14" style="background-image:url(<?php echo get_template_directory_uri(); ?>/uploads/vendor_thumbs/'+myData[a].image_path+');">';
				
				str+='</div>';
				str+='<div class="float_right14">';
					str+='<h2>'+myData[a].title+'</h2>';
					str+='<div class="text-pack17">';
					if((myData[a].event_name)!=''){
					str+='<span class="add_Srvc"><i class="fa fa-calendar"></i>Event:'+myData[a].event_name+'</span>';
					}
					str+='<span class="add_Srvc"><i class="fa fa-map-marker"></i>'+myData[a].address+','+myData[a].city+'</span>';
					if((myData[a].service_offered)!=''){
					str+='<span class="off_Srvc"><i class="fa fa-wrench" aria-hidden="true"></i>'+myData[a].service_offered+'</span>';
					}
					
				//str+='<span><i class="fa      fa-map-marker"></i>'+getFieldByID('title','twc_manage_offered',myData[a].service_offered)+'</span>';

					/* str+='<span><i class=""></i>';
					if(myData[a].on_call=='Yes'){fa fa-phone
					str+=myData[a].contact;
					}
				    str+='<span class="price165">$'+myData[a].price+'</span></span>'; */
					if((myData[a].on_call)!=''){
					str+='<span class="pay_Srvc"><i class="fa fa-phone" aria-hidden="true"></i>Available on call:('+myData[a].on_call+')</span>';
					}
					if((myData[a].card_accepted)!=''){
					str+='<span class="pay_Srvc"><i class="fa fa-credit-card" aria-hidden="true"></i>Card Accepted:('+myData[a].card_accepted+')</span>';
					}
					str+='<span class="star-ioncs'+myData[a].avg_rating+'"></span>';
				   <?php if($userID==''){?>
				   str+='<span><a href="<?php echo site_url();?>/login/?redirectPage=details-page&id='+myData[a].id+'&destName=<?php echo $_REQUEST['destName'];?>"><button type="button" class="btn btn-default btn-use_1">More Info</button></a></span>';
				  <?php }else{?>
			      str+='<span><a href="<?php echo site_url();?>/details-page/?id='+myData[a].id+'&destName=<?php echo $_REQUEST['destName'];?>"><button type="button" class="btn btn-default btn-use_1">More Info</button></a></span>';
				   <?php } ?>
			
					str+='</div>';
				str+='</div>';
				str+='</li>';
		  }
		  $('#serviceList').html(str);
		}
	}) 
}

function pagingList(){
	var page=$('#page').val();
	var filter_Data =$('#filter_frm').serialize();
	 $.ajax({
		 type: "GET",
		 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
		 data: "action=pagingList&sid=<?php echo $_REQUEST['sid'];?>&destName=<?php echo $_REQUEST['destName'];?>&p="+page+'&'+filter_Data,
		 success: function(Data){
		  $('#pagination').html(Data);
		  changePage();
		}
	}) 
	
}


</script>
