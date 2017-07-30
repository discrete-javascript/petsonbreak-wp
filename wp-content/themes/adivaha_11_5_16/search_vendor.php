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

<input type="hidden" name="page" id="page" value="0">
<div class="container search-vendor-container">
	<div class="con_left">
	<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#"><?php echo getFieldByID('title','twc_service_category',$_REQUEST['sid']);?></a></li>
				</ul>
			</div>
	<div class="pet-search-left">
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
            <form id="filter_frm" class="ng-pristine ng-valid">
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
                <div class="filter_criteria wleft">
                  <h5>Star Rating <a href="javascript:void(0);" ng-click="clearStar();">Clear</a></h5>
                  <ul class="criteria_listing criteria_listing_Star">
                    <li>
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="1">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star1->avg_rating;?>)</span></label>
                    </li>
                    <li>
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="2">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star2->avg_rating;?>)</span></label>
                    </li>
                    <li>
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="3">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star3->avg_rating;?>)</span></label>
                    </li>
                    <li>
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="4">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star4->avg_rating;?>)</span></label>
                    </li>
                    <li>
                      <label class="hotel_filter_label">
                        <input type="radio" name="rating" class="Filter_Cls" value="5">
                        <span class="starRat pull-left"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span><span class="starRatHotel pull-right ng-binding">(<?php echo $coun_star5->avg_rating;?>)</span></label>
                    </li>
                    <li> </li>
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
