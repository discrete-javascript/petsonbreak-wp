<?php 
/**
 Template Name: Manage Destination
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
global $wpdb;
$page_id =get_the_ID(); 
$content = get_post_field('post_content', $page_id);

$feature_image_arr =wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );


$lResults =$wpdb->get_results("select * from landing_pages where page_id='".$page_id."'");
$lResult =$lResults[0];

$currDate =date('Y-m-d');
$startDate =date('m/d/Y',strtotime($currDate.'+10 days' ));
$endDate =date('m/d/Y',strtotime($currDate.'+11 days' ));
?>

<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>

<input type="hidden" name="pageName" id="pageName" value="manage_destiantion">
<input type="hidden" id="dest_latitude" value="<?php echo $lResult->latitude;?>">
<input type="hidden" id="dest_longitude" value="<?php echo $lResult->longitude;?>">
<input type="hidden" name="destinationID" id="destinationID" value="<?php echo $lResult->destination_id;?>">
<input type="hidden" name="destinationName" id="destinationName" value="<?php echo $lResult->destination_name;?>">

<input type="hidden" name="flight_from_destination" id="flight_from_destination" value="<?php echo $lResult->flight_from_destination;?>">
<input type="hidden" name="flight_from_iata" id="flight_from_iata" value="<?php echo $lResult->flight_from_iata;?>">

<input type="hidden" id="dest_checkin" value="<?php echo $startDate;?>">
<input type="hidden" id="dest_checkout" value="<?php echo $endDate;?>">


<div class="main_Container" ng-controller="Hotel_Controller">
  <div class="Hotel_Div" >
    <div class="manage-dest-banner" id="myCarousel" style="background:url(<?php echo $feature_image_arr[0];?>);  height: 300px;background-repeat: no-repeat;background-size: cover;">
		<div class="carousel-caption">
				<h3 class="ng-binding"><?php echo $lResult->title;?></h3>
				<p class="ng-binding"><?php echo $lResult->description;?></p>
		</div>
	</div>
    <!-- new code add hotellook-->
    <!--  ues this class popup  .popuptrue  -->
    <div class="search_Form horizontal-box">
	<div id="exTab1" >	
	  <div class="div_clol">	
			<ul  class="nav nav-pills">
			 <li class="tabbss tab_1 active" ng-click="selectType(1);"><a  href="javascript:void(0);" data-toggle="tab"><i class="fa fa-bed" ></i><?php _e('Hotel','adivaha');?> </a></li>
			<li class="tabbss tab_0"><a ng-click="selectType(0);" href="javascript:void(0);" data-toggle="tab"><i class="fa fa-plane"></i><?php _e('Flight','adivaha');?></a></li>
			<li class="tabbss tab_4" ng-click="selectType(4);"><a href="javascript:void(0);" data-toggle="tab"><i class="fa fa-umbrella"></i><?php _e('Holiday','adivaha');?> </a></li>
			<li class="tabbss tab_3" ng-click="selectType(3)"><a href="javascript:void(0);" data-toggle="tab"><i class="fa fa-home"></i><?php _e('Resort','adivaha');?></a></li>
			<li class="tabbss tab_5" ng-click="selectType(5)"><a href="javascript:void(0);" data-toggle="tab"><i class="fa fa-coffee"></i><?php _e('Bed & breakfast','adivaha');?></a></li>		
		 </ul>
			 
		<div class="tab-content clearfix">
			<div class="tab-pane active" id="tab-hotel">
				<div class="searchbox" style="position: relative;">
					<form method="get" name="search_form" class="manage-dest-srchform">
					  <ul>
						<li>
						  <input type="text" id="desti" ng-model="desti" placeholder="City, Hotel or place name"  ng-change="getLocation_Hint($viewValue)"   />
						  <input type="hidden" ng-model="lat" id="latitude" />
						  <input type="hidden" ng-model="lon" id="longitude" />
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
							<input type="text" placeholder="Check In" name="start" id="checkIn"  />
							<i class="fa fa-calendar" aria-hidden="true"></i> </div>
						  <div class="datepicker-background-div">
							<input type="text"placeholder="Check Out"  name="end" id="checkOut" />
							<i class="fa fa-calendar" aria-hidden="true"></i> </div>
						</li>
						<li>
						  <div class="adults-12">
						   
							<input type="text" name="Cri_Rooms" id="Cri_Rooms" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room">
							<i class="fa fa-male" aria-hidden="true"></i> </div>
						</li>
						<li>
						  <input class="btn-hack button" id="findbestrate" type="button" value="Search" ng-click="Search_Destinations();" >
						</li>
					  </ul>
					  <div class="children-age roomgroupdata hidnumberofrooms">
						<div class="room_text1" style="color:#000">
						  <div class="nomar"><?php _e('Rooms','adivaha');?></div>
						  <div class="nomar"><?php _e('Adults','adivaha');?></div>
						  <div class=" nomar"><?php _e('Children','adivaha');?></div>
						  
						</div>
						<div class="how_noofRooms" >
						  <div class="nomar">
						  <a ng-click="changeRooms('minus');"><i class="fa fa-minus" aria-hidden="true"></i> </a> 
						   <a>{{count}}</a> <a ng-click="changeRooms('plus');"><i class="fa fa-plus" aria-hidden="true"></i> </a>
						   
						   <input type="hidden" class="form-control" name="Cri_noofRooms" id="Cri_noofRooms" value="{{count}}">
						  
						   </div>
						   <div id="packListdiv" >&nbsp;</div>
						</div> 
						 <div class="be-ddn-footer">
							<a href="javascript:void(0)" class="done" ng-click="hideRoomGroup();">Done</a> 
						 </div>
						 
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
                           <div class="show-autocomplete-popup"> <a class="autocomplete-dropdown" ng-repeat="Flight_from_destis in Flight_from_destinations track by $index">
						  
						   <span ng-if="Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.name)">{{ Flight_from_destis.name }}<span class="city_name_pup">{{ Flight_from_destis.city_name }}</span></span>
						  
						  <span ng-if="!Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.city_name)">{{ Flight_from_destis.city_name }}</span>				  
						  
						  </a> </div>
                        </div>
                      </li>
                      <li>
                        <input class="location_first2" type="text" ng-model="flight_to_desti" placeholder="{{Flights_City_To}}" value="{{Flights_City_To}}"  ng-change="getLocation_Hint_Flights_To($viewValue)"/>
                        <input type="hidden" ng-model="flight_to_locationId" value="{{Flights_City_To_IATACODE}}" />
						 <!--<i class="fa fa-map-marker popup" style="left: 15em;" aria-hidden="true"></i>-->
										
										<div class="popup showhidepopup_flightsto{{showpopup_flightsto}} hidethisinitially locationpopup_flightsto">
										    <div class="show-autocomplete-popup flights_topop"> <a class="autocomplete-dropdown" ng-repeat="Flight_To_destis in Flight_To_destinations track by $index">
						  
						 <span ng-if="Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.name )">{{ Flight_To_destis.name }} <span class="city_name_pup"> {{ Flight_To_destis.city_name }} </span></span>
						  
						  <span ng-if="!Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.city_name )">{{ Flight_To_destis.city_name }}</span>
						   
						   
						  </a> </div>
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
										<i class="fa fa-male" aria-hidden="true"></i>
										
									  </li>
									  <li>
										<input class="btn-hack button" type="button" value="Search" ng-click="Search_Flights();" >
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


<div class="container-fluid ad-class-1 home-section1" ng-controller="search_Results_Controller">
<?php include('wp-content/themes/adivaha/templates/search-results.php');?>
</div>




	<div class="container ">
	<div class="dese_container">
	  <div style="margin-bottom: 20px;"><?php echo $content;?></div>
	
	 </div>
	</div>



  </div>
</div>
<?php get_footer(); ?>

<script>
 function bindDestData(){
	$('#desti').val('<?php echo $lResult->destination_name;?>');
	$('#latitude').val('<?php echo $lResult->latitude;?>');
	$('#longitude').val('<?php echo $lResult->longitude;?>');
 }
 setTimeout(function(){ bindDestData() }, 1000);

</script>
 
<!-- Share This Script -->
 <!--
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "32cba1f3-4784-46f7-ad7e-544238e66485", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

-->
<!-- Destination Category Tabs -->

<script type="text/javascript">
	$(document).ready(function() {
	$('.cat_tabcls').css("display","none");
	$('.catg_active').css("display","block");
    $(".tab").click(function(){
		var rel = $(this).attr('rel');
		$('.cat_tabcls').fadeOut();
		$('#' + rel).fadeIn();
	$('.tab').removeClass('categorieActive');
        $(this).addClass('categorieActive');
    });  
  });
</script>


<style>
.Hotel_Div {overflow: visible !important;}

</style>
