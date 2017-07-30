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

<style>

.hotelInfo_modifie{width: 100%;float: left;margin-bottom:20px;}
.hot_infoBigImg{width: 100%;height: 500px;}
.hot_infoBigImg img{max-width: 100%;height: 100%;}
.hotInfo_thumbs{width: 100%;height: 60px;}
.hotInfo_thumbs_listing{width:100%;height:100%;padding-top:4px;}
.hotInfo_thumbs_listing li{width: 87px;height: 100%;float:left;margin-right:3px;}
.hotInfo_thumbs_listing li img{width:100%;height:100%;}
.room_details{width: 100%;float: left;}
.modify_searchContainer{width: 100%;height: 100%;border: 1px solid #fff;padding:40px 20px;}
.thumbs-ioncs{color: #4fa550;font-size: 13px;}
.thumbs-ioncs i{font-size: 25px;}
.modifyPriceContainer{color: #777;}
.modifyStrThru{font-size: 16px;color: #777;text-decoration: line-through;display:none;}
.column-left{width: 100%;float: left;}
.column-right{width: 100%;float: left;}
.formElement{display: block;width: 100%;height: 40px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;
background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 2px;}
.formElemtbox{margin-bottom: 15px;}
.modifyPrice{font-size: 40px;color: #333;font-weight: 600;line-height:45px;margin-bottom:10px;}
.modigyPpN{margin-bottom:10px;}
.modifyPrice sup{font-size:14px;top:-1.5em;}
.modifyFormContainer{padding: 0px 0px 22px 0px;}
.formElemtbox label{color: #fff;font-size: 15px;margin: 10px 0px;display: block;}
.modifyBookContainer{text-align:Center;}
.modBookBtn{width: 100%;display: block;padding: 12px;font-size: 15px;}
.hotel_detail_Navigator{width: 100%;float: left;}
.hotdetNav_body{width: 100%; float: left;border: 1px solid #f0f0f0;}
.hotdetNav_listing{width: 100%;float: left;}
.hotdetNav_listing li{line-height: 50px;font-size: 14px;padding-left: 20px;border-bottom: 1px solid #f5f5f5;	cursor:pointer;}
.services_left{width: 34%;float: left;}
.services_right{width: 66%;float: left;}
.services_div{width: 100%;float: left;padding: 40px 0;border-bottom: 1px solid #d7d7d7;}
.services_right ul{width:100%;float:left;}
.services_right ul li{width:50%;float:left;}
.room-inf{margin: 20px 0px;border-bottom: 1px solid #d7d7d7;padding-bottom: 20px;font-size:28px;font-weight:500;}
.hotel_Description{width: 100%;float: left;}
.services_left h4{font-size: 19px;padding: 0px;color: #333;}
.hotel_Location{width: 100%;float: left;margin-bottom:20px;}
.hote_map-container{width: 100%;float: left;height: 475px;position:relative;padding:15px 0px;background:#fff;}
.demo_map_placeholder{position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);
-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);font-size: 26px;color: #777;}
.suggested_hotel_div{width:100%;float:left;margin-bottom:40px;}
.suggested_hotel{width:100%;float:left;margin-bottom:20px;padding:20px 0px;}
.suggested_hotel_title{text-align: center;margin: 15px 0px 20px 0px;font-size: 33px;font-weight: 300;padding:30px 0;}
.suggested_hotel_title span{display:block; font-size:14px; margin-top:10px;}
.sug_hotel_wrapper{width: 100%;float:left;}	
.sug_hotel_col{width: 32%;float:left;border: 1px solid #f7f7f7;}
.sug_hotel_col:nth-child(3n-1){margin-left: 1.5%;margin-right: 1.5%;}
.sug_hotel_top{width: 100%;float: left;height: 230px;position:relative;}
.sug_hotel_top img{width: 100%;height: 100%;}
.sug_hotel_bot{width: 100%;float: left;padding:20px;}
.sug_book{display: inline-block;padding: 7px 10px;border-radius: 0px;color: #fff;}
.sugHotPrice{float: right;font-weight: bold;font-size: 21px;width: 30%;text-align: right;}
.roomMoreInfo{margin-top: 10px;float: left;margin-bottom: 0px;font-size: 15px;font-weight: 500;}
.roomMoreInfo a{font-weight:bold;}
.hotInfo_ppn{display: block;line-height: 16px;color: #777;}
.roomMoreInfoDiv{width:100%;float:left;padding:20px 0px;}
.roomMore_Listing li{width: 50%;float: left;border:none;padding: 0px;margin-bottom: 5px;color: #888;}
.roomMoreInfoDiv h4{color: #333; padding: 20px 0px 11px 0px;}
/*.slider_modifie .left{display:none;}
.slider_modifie .right{display:none;}*/
.hotelInfo_slideshow img{width: 100%;height: 100% !important;}   
/*
	.hotelInfo_slideshow .carousel-indicators {margin-left: 0px;width: 100%;bottom: -11px;padding: 17px 0px;left: 0px;
text-align: left;background: #fff;}*/
.hotel-title-dp{position: absolute;bottom: 53px;padding: 0px 10px;}
.hotel-title-dp h2{background: rgba(0, 0, 0, 0.82);font-family: 'Open Sans', sans-serif;color: #fff;font-size: 40px;padding: 9px 17px;margin: 2px 0px !important;}
.hotel-title-dp p{background: rgba(0, 0, 0, 0.82);font-family: 'Open Sans', sans-serif;color: #fff;font-size: 13px;padding: 10px 20px;}


.hotel-inf-serbox{}
.hotel-inf-serbox ul{width: 100%;float: left}
.hotel-inf-serbox-form> ul li {float: left;width: 100%;border: 1px solid #ccc;margin-bottom: 10px;background:#fff;}
.hotel-inf-serbox ul li input{width: 100%;border: 0px solid #dfdfdf;color:#333;}
.date-rom_hotinfo{padding: 10px;}
.hotel-inf-serbox .md-icon-button+.md-datepicker-input-container{margin-left: 4px;border: 0px solid;top:2px;border: 0px solid;}

.hotel-inf-serbox .md-datepicker-triangle-button.md-button.md-icon-button {margin-right: -70px;}
.hotel-inf-serbox .md-datepicker-input {color: #333;}
.Sub-Tota1-hot{clear: both;border-bottom: 1px solid #ccc;border-top: 1px solid #ccc; overflow: hidden;padding: 10px 0px 10px 0px;margin: 0px 0px 10px 0px;}
.Sub-Tota1-hot ul{margin-bottom:0px;}
.Sub-Tota1-hot ul li{float: left;width: 40%;border: 0px;margin-bottom:0px;}
.Sub-Tota1-hot ul li h2{font-size: 25px;font-weight: 600;}
.Sub-Tota1-hot ul li h2 sup{font-size:14px;top:-1em;}
.Sub-Tota1-hot  ul li p{font-size:10px;margin-bottom:0px;}
.sub-tota{margin-bottom:2px;}
.Sub-total-list li{background:none;}
.hote_map-container img{width:100%;height:100%;}
.not-pad-it{padding: 20px 0px;}	
.room-detailso-serbox{padding: 16px;position: relative;}	
.room-detailso-serbox ul{width:100%;float:left;}
.room-detailso-serbox ul li:first-child{float: left;width: 10%;}
.room-detailso-serbox ul li{float: left;width: 22.5% !important;position:relative;}
.room-detailso-serbox ul li label{color:#fff;}
.room-detailso-serbox md-datepicker{background-color: #fff;padding: 10px 0px;}
.room-detailso-serbox .md-datepicker-triangle-button.md-button.md-icon-button {margin-right: 13px;margin-top:-4px;}
.room-detailso-serbox .md-button.md-icon-button {margin-right: -14px;}
.room-detailso-serbox .md-icon-button+.md-datepicker-input-container{margin-left: 17px;border: 0px solid;top:2px;border: 0px solid;}
.room-detailso-serbox .date-room-detailso{overflow: hidden;}
.room-detailso-serbox  input {padding: 12px 10px 12px 36px;width:100%;border:0px;border-left:1px solid #e5e5e5;}
.room-detailso-serbox  .input-calIcon{position: absolute;top: 39px;font-size: 15px;padding-left: 6px;color:#59c45a;}
.room-detailso-serbox .btn-hack{margin-top: -1px;height: 45px;border:0px;outline:none;}
.room_mod_icon{display:block;}
.room_mod_icon .fa{font-size: 40px;color: #fff;margin:25px 0px 0px 9px;}
.room-detailso-serbox  md-icon{ height: 17px;width: 24px;min-height:17px;min-width:24px;}
.room_amen_icon{padding: 3px 9px 0px 0px;    display: inline-block;font-family: FontAwesome;
font-style: normal;font-weight: normal;text-decoration: inherit;color: #59c45a;font-size: 15px;}
.iconcls_2192:before {content: "\f1eb";}
.iconcls_2205:before {content: "\f0f4";}
.iconcls_1073742859:before {content: "\f1ba";}
.iconcls_2103:before {content: "\f0f5";}
.room_amen_icon .fa-th-large{font-size:18px;vertical-align:middle;}
.sName{color: #333;float:left;/*width:70%;*/}
.sName address{margin-bottom:0px;}
.lh1-2{color: #434343 !important;font-weight: bold;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
.lh1-2 a{color: #333 !important;    float: left;margin-bottom: 10px;}
.sug_hotel_col:hover{box-shadow:0px 5px 9px #d2d2d2;border:1px solid #ccc}

.hotelInfo_slideshow .icon-next , .hotelInfo_slideshow .icon-prev{display:none;}
#roomAvailability .children-age{top: 94px;right: 24%;}
#roomAvailability .roomgroupdata2{width:60%;}
/* new add css code 14/10/2016 */
.TripAdvisor-col{clear: both;padding: 20px;background:#fff;overflow: hidden;}
.copy-right-trip{font-size: 15px;text-align: center;margin: 10px 0px;color: #2d2d2d;}
.reviews-2090{text-align: center;font-weight: 500;font-size: 25px;border-left: 0px;border-right: 0px;}
.rating-outer-circle{background: #fff;position: relative;}
.rating-outer-circle:after{content: "";width: 115px !important;height: 115px;background: #fff;border-radius: 50%;position: absolute;top: 30px;left: 32%;border: 7px solid #59c45a;border-left: 7px solid #ccc;transform: rotate(40deg);-webkit-transform: rotate(40deg);-moz-transform: rotate(40deg);-ms-transform: rotate(40deg);-o-transform: rotate(40deg);}
.rating-outer-circle span{position: absolute;
    top: 75px;
    text-align: center;
    bottom: 0px;
    font-size: 25px;
    color: #777;
    z-index: 999;
left: 39%;}


</style>

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
						<li class="manage-dest158">
						  <div class="adults-12">
						   
							<input type="text" name="Cri_Rooms" id="Cri_Rooms" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room">
							<i class="fa fa-male" aria-hidden="true"></i> </div>
						</li>
						<li class="manage-dest158">
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
                      <li class="manage-dest158">
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
									  
									 <li class="manage-dest158">
									 <div ng-repeat="datum in data" class="width-set-room">
										<input class="passenger_buiness-1" type="text" id="showPassenger" ng-click="showPassenger();" rel="0" value="{{count+count1+count2}} passenger,{{result}}" readonly="readonly" style="cursor:pointer">
										<input type="hidden" ng-model="Flights_Adults" id="Flights_Adults" value="{{count}}" />
										<input type="hidden" ng-model="Flights_Children" value="{{count1}}" />
										<input type="hidden" ng-model="Flights_Infants" value="{{count2}}" />
										<input type="hidden" ng-model="Flights_Category_Economy" value="{{result}}" />
										<i class="fa fa-male" aria-hidden="true"></i>
										
									  </li>
									  <li class="manage-dest158">
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
<?php include('wp-content/themes/accesspress-parallax/templates/search-results.php');?>
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
#exTab1 .nav-pills > li > a {
    font-size: 19px;
}

.horizontal-box .tab-content #tab-hotel ul li:first-child {
    width: 38% !important;
}



.horizontal-box ul li{    width: 177px;}

.input-daterange {
    width: 29% !important;
}

.manage-dest158{width: 177px !important;}

.horizontal-box ul li:last-child {
    padding: 0px 0px 0px 0px;
}

.search_Form {
    position: relative;
    top: inherit;
}

#exTab1 .tab-content {
    padding: 15px 100px 6px 100px;
    margin: inherit;
}
.horizontal-box .nav-pills{    padding: 0px 100px 0px 100px;}
#exTab1 .tab-content {
    background-color: #777;
}

.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus{
	  background-color: #777;
	
}
.flight-search-box ul li:first-child {
    width: 23%;

}
#myCarousel .carousel-caption{    top: 64px;}
</style>
