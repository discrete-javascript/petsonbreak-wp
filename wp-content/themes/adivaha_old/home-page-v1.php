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
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/shortcode.css?var=<?php echo rand();?>">

<div class="main_Container" ng-controller="Hotel_Controller">
  <div class="Hotel_Div">
  
<div class="pet-div14">   
<div class="pet-banner1"> 
    <div ui-view="banner"></div>
    <!-- new code add hotellook-->
    <!--  ues this class popup  .popuptrue  -->
	
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
            <li class="tabbss tab_1 active" ng-click="selectType(1);"><a  href="#home/?tab=hotel" data-toggle="tab"><i class="fa fa-bed" ></i>
              <?php echo $mk_options['tab_hotel'];?>
              </a></li>
            <li class="tabbss tab_0"><a ng-click="selectType(0);" href="#home/?tab=flight" data-toggle="tab"><i class="fa fa-plane"></i>
              <?php echo $mk_options['tab_flight'];?>
              </a></li>
            <li class="tabbss tab_4" ng-click="selectType(4);"><a href="#home/?tab=holiday" data-toggle="tab"><i class="fa fa-umbrella"></i>
             <?php echo $mk_options['tab_holiday'];?>
              </a></li>
            <li class="tabbss tab_3" ng-click="selectType(3)"><a href="#home/?tab=resort" data-toggle="tab"><i class="fa fa-home"></i>
              <?php echo $mk_options['tab_resort'];?>
              </a></li>
            <li class="tabbss tab_5" ng-click="selectType(5)"><a href="#home/?tab=bedbreakfast" data-toggle="tab"><i class="fa fa-coffee"></i>
              <?php echo $mk_options['tab_bedbreakfast'];?>
              </a></li>
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
                      <input class="btn-hack button" id="findbestrate" type="button" value="Search" ng-click="Search_Destinations();" >
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
  
  
  

<div class="all_yourpetservices">
	<div class="dog_img">
		<img style="width: 100%;" src="http://petsonbreak.com/wp-content/themes/adivaha/images/dog2.png" alt="">
	
	</div>
	
	<div class="dog_text">
	<h3><span>All Your</span> Pet Services</h3>
		<p>The affection and care showered by you on your loved pet is irreplaceable, for every other need of your pet we have one or the other services to offer. We also assist you to ensure general well-being of your beguiling companion.</p>
		<button type="button" class="btn btn-default btn-use1">View all</button>
		
	</div>

</div>

  
  
  
  
</div>


<div class="pet-bodypart">
	<div class="main_title">
		   <h2 class="block-title">Popular Destinations</h2>
			<div class="fa-beforandafter"><i class="fa fa-star-o" aria-hidden="true"></i></div>

		   
			<div class="block-text">Top destinations in the world. Best places to travel in 2016. 20 selected destinations have just competed for the prestigious title of Best Destinations 2016</div>
		 </div>
		 
		 
<div class="pet-pop-desti">
	<div class="desti-topimg1">
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet_banner1.jpg" alt="">
			<div class="paris-14">
				<h2>Paris</h2>
				<p>Find Best Deals</p>
			</div>
			</a>
	</div>


<div class="small-img1">
	<ul>
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet_top1.jpg" alt="">
			<div class="paris-14">
				<h2>What is Lorem Ipsum?</h2>
				<p>Lorem Ipsum is not simply random text.</p>
			</div>
			</a>
		</li>
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet_top1.jpg" alt="">
			<div class="paris-14">
				<h2>What is Lorem Ipsum?</h2>
				<p>Lorem Ipsum is not simply random text.</p>
			</div>
			</a>
		</li>
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet_top1.jpg" alt="">
			<div class="paris-14">
				<h2>What is Lorem Ipsum?</h2>
				<p>Lorem Ipsum is not simply random text.</p>
			</div>
			</a>
		</li>
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet_top1.jpg" alt="">
			<div class="paris-14">
				<h2>What is Lorem Ipsum?</h2>
				<p>Lorem Ipsum is not simply random text.</p>
			</div>
			</a>
		</li>
	</ul>
</div>
</div>
</div>
</div>

<div class="pet-bodypart2 container">
	<div class="main_title">
		   <h2 class="block-title1">Where does it come from?</h2>
			<div class="block-text1">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </div>
		 </div>
		 
		 
<div class="where_does_it">
	<div class="pet_wh1">
		<div class="pet_paragraph1">
			<div class="full_grooming">
					<h3 class="sc_services_item_title"><a href="">Full Grooming</a></h3>
					<span class="fa fa-coffee"></span>
			</div>
			<p>Your pet is in good hands with us! Let your favorite get the best care in our center.</p>
			
		</div>
		
		<div class="pet_paragraph2">
			<div class="full_grooming">
					<h3 class="sc_services_item_title"><a href="">Full Grooming</a></h3>
					<span class="fa fa-coffee"></span>
			</div>
			<p>Your pet is in good hands with us! Let your favorite get the best care in our center.</p>
		</div>
		
	</div>
	<div class="pet_wh2">
			<img src="http://petsonbreak.com/wp-content/themes/adivaha/images/image-31.jpg" alt="">
	</div>
	<div class="pet_wh3">
		<div class="pet_paragraph1">
			<div class="full_grooming">
				<h3 class="sc_services_item_title"><a href="">Full Grooming</a></h3>
				<span class="fa fa-coffee"></span>
			</div>
			<p>Your pet is in good hands with us! Let your favorite get the best care in our center.</p>
		</div>
		<div class="pet_paragraph2">
			<div class="full_grooming">
					<h3 class="sc_services_item_title"><a href="">Full Grooming</a></h3>
					<span class="fa fa-coffee"></span>
			</div>
			<p>Your pet is in good hands with us! Let your favorite get the best care in our center.</p>
		</div>
	</div>

</div>
		 

<div class="other_services">
	<div class="main_title">
		   <h2 class="block-title1">Other services</h2>
			<div class="block-text1">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </div>
		 </div>
		 
		 
<div class="pet_other_services">
	<ul>
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/otherimg1.jpg" alt="">
			<div class="paris-14">
				<h2>Paris</h2>
				<p>Find Best Deals</p>
			</div>
			</a>
		
		</li>
		
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/otherimg1.jpg" alt="">
			<div class="paris-14">
				<h2>Paris</h2>
				<p>Find Best Deals</p>
			</div>
			</a>
		
		</li>
		
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/otherimg1.jpg" alt="">
			<div class="paris-14">
				<h2>Paris</h2>
				<p>Find Best Deals</p>
			</div>
			</a>
		
		</li>
		
		<li>
			<a href=""><img src="http://petsonbreak.com/wp-content/themes/adivaha/images/otherimg1.jpg" alt="">
			<div class="paris-14">
				<h2>Paris</h2>
				<p>Find Best Deals</p>
			</div>
			</a>
		
		</li>
		
	</ul>

</div>	

</div>		



<div class="pet_houseku">

<div class="pet_house1">
<img src="http://petsonbreak.com/wp-content/themes/adivaha/images/pet11487.jpg" alt="">
</div>

<div class="pet_house2">
	<div class="blockquote1">
		<span> <a href="">Pet House Is Caring Us,</a> That's Way 
We Are so <a href=""> Naughty </a> </span>
</div>


<p class="text-pragup">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>


<button type="button" class="btn btn-default btn-use">Learn More</button>

</div>

</div> 
		 
		 
</div>




  <!-- end new code add hotellook-->
  <div ui-view="search_results"></div>
  <div ui-view="flight_search_View"></div>
  <!--<div ui-view="body-part"></div>-->
  <div ui-view></div>
  <!-- home page content -->
 <!-- <div ng-if="'default' | isState">
    <div class="container-fluid bg_white border-top-solid">
	<div class="container">
		<div class="col-md-12">
		  <div class="dibba1" style="padding-left:0px !important; background-image:none !important;">
			 <?php echo $mk_options['banner_bhead_1'];?> <span><?php echo $mk_options['banner_bdesc_1'];?></span> 
		</div>
		<div class="dibba2" style="background: url(<?php echo $mk_options['banner_bicon_2'];?>) 17px 15px no-repeat;"><?php echo $mk_options['banner_bhead_2'];?><span><?php echo $mk_options['banner_bdesc_2'];?>	  </span></div>
		<div class="dibba3" style="background: url(<?php echo $mk_options['banner_bicon_3'];?>) 17px px no-repeat;">
		  <?php echo $mk_options['banner_bhead_3'];?><span><?php echo $mk_options['banner_bdesc_3'];?></span>
		</div>
		<div class="dibba4" style="background: url(<?php echo $mk_options['banner_bicon_4'];?>) 17px px no-repeat;">
		  <?php echo $mk_options['banner_bhead_4'];?><span><?php echo $mk_options['banner_bdesc_4'];?></span>
		</div>
		  <div class="clear"></div>
		</div>
	</div>
   </div>
   <?php  if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
   <?php endwhile; endif; ?>
  </div>-->
  
  <!--<div ng-if="'home' | isState">
    <div class="container-fluid bg_white border-top-solid">
	<div class="container">
		<div class="col-md-12">
		  <div class="dibba1">
			 <?php echo $mk_options['banner_bhead_1'];?> <span><?php echo $mk_options['banner_bdesc_1'];?></span> 
		</div>
		<div class="dibba2"><?php echo $mk_options['banner_bhead_2'];?><span><?php echo $mk_options['banner_bdesc_2'];?>	  </span></div>
		<div class="dibba3">
		  <?php echo $mk_options['banner_bhead_3'];?><span><?php echo $mk_options['banner_bdesc_3'];?></span>
		</div>
		<div class="dibba4">
		  <?php echo $mk_options['banner_bhead_4'];?><span><?php echo $mk_options['banner_bdesc_4'];?></span>
		</div>
		  <div class="clear"></div>
		</div>
	</div>
   </div>
   <?php  if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
   <?php endwhile; endif; ?>
  </div>-->
  
  
</div>


</div>




<?php get_footer(); ?>
