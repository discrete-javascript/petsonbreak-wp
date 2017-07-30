<?php 
/**
 Template Name: Home Page V1
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
?>

<style>
.theiaStickySidebar:after {content: ""; display: table; clear: both;}
 .theiaStickySidebar{}
  .orange{width: 100%;padding:20px;color:#fff;background: orange;margin-bottom:10px;}
  </style>
  <style>
  .desc-text{text-align: center;
font-size: 16px;
margin-bottom: 12px;}
  </style>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/shortcode.css?var=<?php echo rand();?>">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/jquery.bxslider.css?var=<?php echo rand();?>">

<!-- Header Article Code End -->

<div class="Hotel_Div">

	<div class="pet-div14">   
	 
	 <div class="pet-banner1 bg_white" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;" id="sidebar"> 
		<div style="padding-top: 0px; padding-bottom: 1px; position: static;" class="theiaStickySidebar">
	       <div class="view-banner" ui-view="banner" style="position:relative;">
			 	<div class="fakeDiv"></div>   
			   
			</div>
		   <div class="social_icons">
				<ul>
					<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href=""><i class="fa fa-skype" aria-hidden="true"></i></a></li>
					<li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			
			
			<div class="search_Form horizontal-box">
			   <div id="exTab1" >
					<div class="div_clol-notuse pet-divclol">
					     <ul  class="nav nav-pills">
							<li class="tabbss tab_1 active" ng-click="selectType(1);"><a  href="javascript:void(0)" data-toggle="tab" title="Hotel" ALT="Hotel"  return false;><i class="fa fa-bed" ></i><span><?php echo $mk_options['tab_hotel'];?></span></a></li>
							<li class="tabbss tab_0"><a ng-click="selectType(0);" href="javascript:void(0)" data-toggle="tab" title="Flight" ALT="Flight"><i class="fa fa-plane"></i><span><?php echo $mk_options['tab_flight'];?></span></a></li>
							<li class="tabbss tab_4" ng-click="selectType(4);"><a href="javascript:void(0)" data-toggle="tab" title="Vacation" ALT="Vacation"><i class="fa fa-umbrella"></i><span><?php echo $mk_options['tab_holiday'];?></span></a></li>
							<li class="tabbss tab_3" ng-click="selectType(3)"><a href="javascript:void(0)" data-toggle="tab" title="Resort" ALT="Resort"><i class="fa fa-home"></i><span><span><?php echo $mk_options['tab_resort'];?></span></a></li>
							<li class="tabbss tab_5" ng-click="selectType(5)"><a href="javascript:void(0)" data-toggle="tab" title="Bed & Breakfast" ALT="Bed & Breakfast"><i class="fa fa-coffee"></i><span><?php echo $mk_options['tab_bedbreakfast'];?></span></a></li>
						  </ul>
						  
						   <div class="tab-content clearfix">
						       <div class="tab-pane active" id="tab-hotel">
									<div class="searchbox" style="position: relative;">
									  <form method="get" name="search_form" class="hotel-search-box-form">
										  <ul>
											<li>
											  <input type="text" ng-model="desti" placeholder="City, Hotel or place name"  ng-change="getLocation_Hint($viewValue)"/>
											  <input type="hidden" ng-model="lat"/>
											  <input type="hidden" ng-model="lon"/>
											  <input type="hidden" ng-model="regionid"/>
											  <input type="hidden" ng-model="datatype"/>
											  <input type="hidden" id="hotelType" name="hotelType" value="1"/>
											  <i class="fa fa-map-marker popup" aria-hidden="true"></i>
											  <div class="popup showhidepopup{{showpopup}}">
												<div class="show-autocomplete-popup"> 
													<div class="cities_15">
													   <h6 >Cities</h6>
														<a class="autocomplete-dropdown" ng-repeat="city_destinations in city_destinations track by $index" ng-click="Update_Search_Field(city_destinations.lat, city_destinations.lon,city_destinations.id, city_destinations.latinFullName, 'location')">{{ city_destinations.latinFullName }} </a> 
													</div>
												
												<div class="hotels_15">
													<h6 class="hotels-2">Hotels</h6>
													<a class="autocomplete-dropdown" ng-repeat="hotel_destinations in hotel_destinations track by $index"  ng-click="Update_Search_Field(hotel_destinations.lat, hotel_destinations.lon,hotel_destinations.id, hotel_destinations.latinFullName, 'hotel')">{{ hotel_destinations.latinFullName }}</a>
												</div>
												<div class="landmarks_15">
												   <h6 class="hotels-2">Landmarks</h6>
													<a class="autocomplete-dropdown" ng-repeat="landmarks_destinations in landmarks_destinations track by $index" ng-click="Update_Search_Field(landmarks_destinations.lat, city_destinations.lon, landmarks_destinations.id,landmarks_destinations.latinFullName, 'location')">{{ landmarks_destinations.latinFullName }}</a> 
												</div>
												</div>
											  </div>
											</li>
											<li  class="input-daterange" data-date-format="M d, D">
											  <div class="datepicker-background-div">
												<input type="text" placeholder="Check In" name="start" id="checkIn" readonly="true" />
												<i class="fa fa-calendar" aria-hidden="true"></i> </div>
											  <div class="datepicker-background-div">
												<input type="text"placeholder="Check Out"  name="end" id="checkOut" readonly="true" />
												<i class="fa fa-calendar" aria-hidden="true"></i> </div>
											</li>
											<li>
											  <div class="adults-12">
												<input type="text" name="Cri_Rooms" id="Cri_Rooms" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room" readonly="readonly" style="cursor:pointer">
												<i class="fa fa-male" aria-hidden="true"></i> </div>
											</li>
											<li>
											  <input class="btn-hack button" id="findbestrate" type="button" value="Sniff" ng-click="Search_Destinations();" >
											</li>
										  </ul>
										  <div class="children-age roomgroupdata hidnumberofrooms">
											<div class="room_text1" style="color:#000">
											  <div class="nomar">
												<?php _e('Rooms','adivaha');?>
											  </div>
											  <div class="nomar">
												<?php _e('Adults','adivaha');?>
											  </div>
											  <div class=" nomar">
												<?php _e('Children','adivaha');?>
											  </div>
											</div>
											<div class="how_noofRooms" >
											  <div class="nomar add-rooms"> <a ng-click="changeRooms('minus');"><i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> <a ng-click="changeRooms('plus');"><i class="fa fa-plus" aria-hidden="true"></i> </a>
												<input type="hidden" class="form-control" name="Cri_noofRooms" id="Cri_noofRooms" value="{{count}}">
											  </div>
											  <div id="packListdiv" >&nbsp;</div>
											</div>
											<div class="be-ddn-footer"> <a href="javascript:void(0)" class="done" ng-click="hideRoomGroup();">Done</a> </div>
										  </div>
										</form>
									</div>
							   </div>
							   
							   <div class="tab-pane" id="tab-flight">
								   <div class="searchbox flight-search-box" ng-controller="Flight_Controller">
									<form method="get" name="search_form" action="http://twc5.com/demo/tp/#/search/">
										<ul>
										  <li>
											<input class="location_first1" type="text" ng-model="flight_desti" placeholder="{{Flights_City_From}}"  ng-change="getLocation_Hint_Flights_From($viewValue)"  />
											<input type="hidden" ng-model="flight_locationId" value="{{Flights_City_From_IATACODE}}" />
											<!--<i class="fa fa-map-marker popup" aria-hidden="true"></i>-->
											<div class="popup showhidepopup_flightsfrom{{showpopup_flightsfrom}} hidethisinitially locationpopup_flightsfrom">
											  <div class="show-autocomplete-popup"> <a class="autocomplete-dropdown" ng-repeat="Flight_from_destis in Flight_from_destinations track by $index"> <span ng-if="Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.name)">{{ Flight_from_destis.name }}<span class="city_name_pup">{{ Flight_from_destis.city_name }}</span></span> <span ng-if="!Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.city_name)">{{ Flight_from_destis.city_name }}</span> </a> </div>
											</div>
										  </li>
										  <li>
											<input class="location_first2" type="text" ng-model="flight_to_desti" placeholder="{{Flights_City_To}}" value="{{Flights_City_To}}"  ng-change="getLocation_Hint_Flights_To($viewValue)"/>
											<input type="hidden" ng-model="flight_to_locationId" value="{{Flights_City_To_IATACODE}}" />
											<!--<i class="fa fa-map-marker popup" style="left: 15em;" aria-hidden="true"></i>-->
											<div class="popup showhidepopup_flightsto{{showpopup_flightsto}} hidethisinitially locationpopup_flightsto">
											  <div class="show-autocomplete-popup flights_topop"> <a class="autocomplete-dropdown" ng-repeat="Flight_To_destis in Flight_To_destinations track by $index"> <span ng-if="Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.name )">{{ Flight_To_destis.name }} <span class="city_name_pup"> {{ Flight_To_destis.city_name }} </span></span> <span ng-if="!Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.city_name )">{{ Flight_To_destis.city_name }}</span> </a> </div>
											</div>
										  </li>
										  <li class="input-daterange" data-date-format="M d, D">
											<div class="datepicker-background-div"> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(true)" class="direct{{directcri}}"> <i class="fa fa-long-arrow-right rxchange-room-3"></i> </a> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(false)" class="return{{returncri}}"> <i class="fa fa-exchange rxchange-room-3"> </i> </a> </div>
											<div class="datepicker-background-div">
											  <input type="text" placeholder="Arival" name="flight_to_start" id="flight_to_checkIn" date-format="mm/dd/yyyy" value="{{flight_to_checkIn}}" readOnly="true"/>
											  <i class="fa fa-calendar" aria-hidden="true"></i> </div>
											<div class="datepicker-background-div">
											  <input type="text"placeholder="Departure"  name="flight_to_end" id="flight_to_checkOut" ng-disabled="showhidecheckout" value="{{flight_to_checkOut}}" readOnly="true"/>
											  <i class="fa fa-calendar" aria-hidden="true"></i> </div>
										  </li>
										  <li>
											<div ng-repeat="datum in data" class="width-set-room">
											<input class="passenger_buiness-1" type="text" id="showPassenger" ng-click="showPassenger();" rel="0" value="{{count+count1+count2}} passenger,{{result}}" readonly="readonly" style="cursor:pointer">
											<input type="hidden" ng-model="Flights_Adults" id="Flights_Adults" value="{{count}}" />
											<input type="hidden" ng-model="Flights_Children" value="{{count1}}" />
											<input type="hidden" ng-model="Flights_Infants" value="{{count2}}" />
											<input type="hidden" ng-model="Flights_Category_Economy" value="{{result}}" />
											<i class="fa fa-male" aria-hidden="true"></i> </li>
										  <li>
											<input class="btn-hack button" type="button" value="Sniff" ng-click="Search_Flights();" >
										  </li>
										</ul>
										<div class="children-age roomgroupdata hidnumberofrooms" >
										  <div class="room-add-age" class="dropdown">
										  <ul>
											<li>
											  <label class="pax-title">Adults <span>Above 12 years</span></label>
											  <div class="pules-min"> <a ng-click="count = count -1" > <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> <a ng-click="count = count +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
											</li>
											<li>
											  <label class="pax-title">Children <span>Below 12 years</span></label>
											  <div class="pules-min"> <a ng-click="count1=count1 - 1" > <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count1}}</a> <a ng-click="count1=count1 +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
											</li>
											<li>
											  <label class="pax-title">Infants <span>Below 2 years</span></label>
											  <div class="pules-min"> <a ng-click="count2=count2 - 1"> <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count2}}</a> <a ng-click="count2= count2 +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
											</li>
										  </ul>
										  <div class="ddChild ddchild_ border shadow" id="flight_class_select_child">
											<ul>
											  <li>
												<label>
												  <input type="radio" ng-model="result" name="rdoResult" value="Economy" ng-checked="true">
												  Economy</label>
											  </li>
											  <li>
												<label>
												  <input type="radio" ng-model="result" name="rdoResult" value="Business">
												  Business</label>
											  </li>
											</ul>
											<div class="be-ddn-footer" modal="showModal"> <a href="javascript:void(0)" class="done" ng-click="done();">Done</a> </div>
										  </div>
										</div>
										</div>
									  </form>
								   </div>
							  </div>
							   
						   </div>
					</div>
			   </div>
			</div>
		</div>
	</div>
	
	<div class="hideForOtherPage" ng-if="'default' | isState">
	 <?php 
		 if (have_posts()) : 
		while (have_posts()) : the_post();
	 the_content(); 
	 endwhile; endif; ?>
	</div> 

	<div class="hideForOtherPage" ng-if="'home' | isState">
	<?php 
	if (have_posts()) : 
		while (have_posts()) : the_post(); 
	 the_content(); 
	 endwhile; endif; ?>
	</div> 
	
	
	</div>
	
	
	<div ui-view="body-part-pet1"></div>
	<div ui-view="search_results"></div>
	<div ui-view="flight_search_View"></div>
	<div ui-view></div>
	
	
	
	
</div>


<script src="<?php echo get_template_directory_uri();?>/scripts-libraries/jquery.bxslider.js"></script>


<script src="<?php echo get_template_directory_uri();?>/scripts-libraries/theia-sticky-sidebar.js"></script>


<script>
	
	if ($(window).width()>991){
	    jQuery('#sidebar').theiaStickySidebar({
		});
		}
</script>



<?php get_footer(); ?>



<script type="text/javascript">
	function ajaxcall() {
    $(".ajaxItem").on('click',function(event){
	
		
    if(!$(event.target).hasClass('closeAjDiv') ){
          if ($(this).hasClass('siblingFull')){
         $(this).addClass('fullajaxItem').removeClass('siblingFull')
        .siblings().addClass('siblingFull').removeClass('fullajaxItem');
        var rel = $(this).attr('rel');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
         $('#' + rel).addClass('showAjax').removeClass('hiddenAjax');
    }


    else if(!$(this).hasClass('fullajaxItem')){
        $('.ajaxItem').removeClass('fullajaxItem');
        $('.ajaxItem').removeClass('siblingFull');
        $(this).addClass('fullajaxItem')
        .siblings().addClass('siblingFull');
        var rel = $(this).attr('rel');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
         $('#' + rel).addClass('showAjax').removeClass('hiddenAjax');
    }  
    }

   
    }); 

    $('.closeAjDiv').click(function(){
	    var rel =$(this).attr('rel');
		$('#d'+rel).removeClass('colHalf').addClass('fullajaxItemGone').siblings().removeClass('colHalf').addClass('siblingFullGone');
		setTimeout(function(){removeT(rel) }, 1400);
		
        $(this).parents('.ajaxItem').removeClass('fullajaxItem')
        .siblings().removeClass('siblingFull');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
        })
		
		

		function removeT(rel){ 
		  $('#d'+rel).removeClass('fullajaxItemGone').addClass('colHalf').siblings().removeClass('siblingFullGone').addClass('colHalf');
		}

	   $('.ajaxItem').on('click', function(e){
	   
	     if(!$(event.target).hasClass('closeAjDiv') ){
          $('html,body').animate({scrollTop: $(this).offset().top - 150}, 800);
         }
	   	
		}); 
		
		
	  $('.closeAjDiv').on('click', function(){
          $('html,body').animate({scrollTop: $(this).offset().top - 160}, 800);
		}); 
		
	

  }
  
  setTimeout(ajaxcall, 4000);
  
  
</script>

<script>
	$(window).load(function(){
		$('.fakeDiv').hide();
	})
</script>
