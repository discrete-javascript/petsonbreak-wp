<?php session_start();?>
<style>
.horizontal-box {display:none;}
.fixing-row {padding-bottom:40px;}
</style>
<div class="container">
  <div class="row fixing-row">
    <div class="col-md-8">
    <div class="content">
      <div class="column-left">
	  <div class="col-left-menu">
	   <ul>
	     <li class="col-left-photos"  ng-click="gotoAnchor('photosArea')"><?php echo $_SESSION['TXTDATA']['photos'];?></li>
	     <li class="col-left-rooms" ng-click="gotoAnchor('RoomsArea')"><?php echo $_SESSION['TXTDATA']['rooms'];?></li>
	     <li class="col-left-map" ng-click="gotoAnchor('MapArea')"><?php echo $_SESSION['TXTDATA']['map'];?></li>
	     <li class="col-left-reviews" ng-click="gotoAnchor('ReviewsArea')"><?php echo $_SESSION['TXTDATA']['reviews'];?></li>
	     <li class="col-left-amenities"  ng-click="gotoAnchor('AmenitiesArea')"><?php echo $_SESSION['TXTDATA']['amenities'];?></li>
	   </ul>
	  </div>
	  <div class="slider_modifie">
          <div class="hotel-information_title">
		   
            <h2 class="the-title">{{ HotelSummary.name }}</h2>
            
            <div class="hotel-information_address">
              <div>
                <p>{{ HotelSummary.address1 }} {{ HotelSummary.address2 }}, {{ HotelSummary.city }} , {{ HotelSummary.countryCode }} , {{ HotelSummary.postalCode }}  </p>
                <p class="searchHot_rating rating-{{ HotelSummary.hotelRating }}"></p>
              </div>
			  <!--
              <div>
                <ul>
                  <li class="col-left-photos"><a href="" ng-click="gotoAnchor('photosArea')"> Photos</a></li>
                  <li class="col-left-rooms"><a href="" ng-click="gotoAnchor('RoomsArea')"> Rooms </a></li>
                  <li class="col-left-map"><a href="" ng-click="gotoAnchor('MapArea')"> Map </a></li>
                  <li class="col-left-reviews"><a href="" ng-click="gotoAnchor('ReviewsArea')"> Reviews </a></li>
                  <li class="col-left-amenities"><a href="" ng-click="gotoAnchor('AmenitiesArea')"> Ameneties </a></li>
                </ul>
              </div>
			  -->
            </div>
          </div>
          <div class="hotelInfo_slideshow" id="photosArea">
            <div  id="slides_control">
			
    <!-- Carousel
          ================================================== -->
    <!--<div id="myCarousel_2ade" class="carousel slide" data-ride="carousel">
     
	 <ol class="carousel-indicators">
        <li data-target="#myCarousel_2ade" ng-repeat="img in images" ng-class="{active: (img === 0)}" data-slide-to="{{img}}">
			<img ng-src="{{uri}}/{{w}}/{{h}}/{{currentFolder}}/{{img}}" alt="Slide number {{img}}">
			<img ng-src="{{slide.image}}" style="margin:auto;">
			
		</li>
      </ol>
      <div class="carousel-inner">
        <div ng-class="{item: true, active: (img === 0)}" ng-repeat="img in images">
          <img ng-src="{{uri}}/{{w}}/{{h}}/{{currentFolder}}/{{img}}" alt="Slide number {{img}}">
          <div class="container">
            <div class="carousel-caption">
				<h3>{{ bannerheading}} </h3>
				<p>{{ bannercontent}} </p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel_2ade" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel_2ade" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right fa fa-chevron-right"></span></a>
    </div> -->

  

			 <div class="carouser-container" >
                <div uib-carousel active="active" data-interval="false">
                  <div class="imageDiv" uib-slide ng-repeat="slide in slides track by slide.id" index="slide.id"> <img alt="" ng-src="{{slide.image}}" style="margin:auto;"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="room_details">
          <p class="not-pad-it">"<?php echo $_SESSION['TXTDATA']['note'];?>"</p>
          <div class="descriptionWrapper">
            <div class="form_title">
              <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['room_detail_description'];?></h3>
              <p><?php echo $_SESSION['TXTDATA']['room_detail_description'];?></p>
            </div>
            <div class="step">
              <p>{{HotelDetails.roomDetailDescription}}</p>
            </div>
			<div class="form_title">
              <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>Property Information</h3>
              <p>Property Information</p>
            </div>
			<div class="step">
              <p>{{HotelDetails.propertyInformation}}</p>
            </div>
			
          </div>
          <!--<h2 class="room-inf">Room Informations</h2>-->
          <div class="room-detailso-serbox" id="RoomsArea">
            <form name="roomAvailability" id="roomAvailability">
              <ul>
                <li class="room_1347" style="width: 10% !important;"> <span class="room_mod_icon"><i class="fa fa-calendar" aria-hidden="true"></i></span> </li>
                
				 <!--
				 <li >
                  <label>Check in </label>
                  <input type="text" name="start" id="checkIn2"  placeholder="Check In" value="{{checkIn}}"  />
                  <i class="fa fa-calendar input-calIcon" aria-hidden="true"></i> </li>
                <li>
                  <label>Check Out</label>
                  <input type="text"  name="end" id="checkOut2" placeholder="Check Out" value="{{checkOut}}" />
                  <i class="fa fa-calendar input-calIcon" aria-hidden="true"></i> </li>
				  -->
				  <li class="input-daterange roomAv_chinOut" style="width: 45% !important;" data-date-format="M d, D">
				   <ul>
				     <li>
					  <label><?php echo $_SESSION['TXTDATA']['checkin'];?></label>
					  <input type="text" name="start2" id="checkIn2"  placeholder="Check In" value="{{checkIn}}" readonly="true" />
					  <i class="fa fa-calendar input-calIcon" aria-hidden="true"></i> </li>
					<li>
					  <label><?php echo $_SESSION['TXTDATA']['checkout'];?></label>
					  <input type="text"  name="end2" id="checkOut2" placeholder="Check Out" value="{{checkOut}}" readonly="true" />
					  <i class="fa fa-calendar input-calIcon" aria-hidden="true"></i> </li>
				   </ul>
				 </li> 
				  
                <li class="date-room-detailso">
                  <label><?php echo $_SESSION['TXTDATA']['rooms'];?></label>
				  <input type="text" name="Cri_Rooms2" id="Cri_Rooms2" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room">
				  <i class="fa fa-male input-calIcon" aria-hidden="true"></i>
                </li>				
                <li>
                  <label>&nbsp;&nbsp;</label>
                  <input class="btn-hack button" type="button" value="Find Best Rates" ng-click="roomAvailabilityTwc();" >
                </li>
              </ul>
			  <div class="roomgroupdata2 hidnumberofrooms2 children-age" >
			     <div class="room_text1" style="color:#000">
				   <div class="nomar"> <?php echo $_SESSION['TXTDATA']['rooms'];?></div>
				   <div class="nomar"><?php echo $_SESSION['TXTDATA']['adults'];?></div>
				   <div class=" nomar"><?php echo $_SESSION['TXTDATA']['children'];?></div>
				 </div>
				  <div class="how_noofRooms" >
					<div class="nomar">
					  <a ng-click="changeRooms2('minus');"><i class="fa fa-minus" aria-hidden="true"></i> </a> 
					  <a>{{count2}}</a> <a ng-click="changeRooms2('plus');"><i class="fa fa-plus" aria-hidden="true"></i> </a>
					  <input type="hidden" class="form-control" name="Cri_noofRooms" id="Cri_noofRooms2" value="{{count2}}">
					 <!--
					  <select id="Cri_noofRooms2" class="form-control" name="Cri_noofRooms" >
						<option value="1" ng-selected="rooms == '1'">1</option>
						<option value="2" ng-selected="rooms == '2'">2</option>
						<option value="3" ng-selected="rooms == '3'">3</option>
						<option value="4" ng-selected="rooms == '4'">4</option>
					  </select> -->
					</div>
					<div id="packListdiv2"></div>
				</div>
				<div class="be-ddn-footer">
					<a href="javascript:void(0)" class="done" ng-click="hideRoomGroup2();"><?php echo $_SESSION['TXTDATA']['done_btn'];?></a> 
				 </div>
			 </div> 
			  
			 <div style="clear:both"></div> 
			  
            </form>
          </div>
		  <div class="roomloader">
		    <div><p><?php echo $_SESSION['TXTDATA']['searching_for_availibility'];?></p><span><img alt="" ng-src="wp-content/themes/adivaha/images/loading.gif"/></span></div>
		  </div>
		  <div class="no-room-container" ng-if="!Room_Details.length" >
		      <div class="no-records-found">
			      <div class="no-records-img">
				    <img alt="" ng-src="wp-content/themes/adivaha/images/no-rooms.png"/>
				  </div>
				  
				  <div class="no-records-msg">
				    <h4><?php echo $_SESSION['TXTDATA']['sorry_no_Rooms_found'];?> </h4>
					<p><?php echo $_SESSION['TXTDATA']['Please_select_some_other_dates'];?></p>
				  </div>
			  </div>
		  </div> 
          <ul class="room_details_listing" >
            <li  ng-repeat="Room_Details in Room_Details">
              <div class="room-det-img">
               
                <div uib-carousel active="active" data-interval="false" class="room-det-imgCarousel">
                  <div class="imageDiv" uib-slide ng-repeat="slide in Room_Details.RoomImages.RoomImage track by $index" index="$index"> <img ng-src="{{slide.url}}" alt="" style="margin:auto;"> </div>
                </div>
              </div>
			  
              <div class="room-det-desc">
                <div class="roomNameWrapr">
                  <h4 class="roomType">{{ Room_Details.rateDescription }} - {{ Room_Details.BedTypes.BedType.description }} </h4>
                  <p class="amen">{{ Room_Details.RateInfos.RateInfo.promoDescription }}</p>
                  <div class="roomAmenWrapr">
                    <div class="room_ament">
					
                      <p ng-repeat="ValueAdd in Room_Details.ValueAdds.ValueAdd">
					   <span class="room_amen_icon iconcls_{{ValueAdd.id}}" ng-if="ValueAdd.description"><i class="spriteResult ht-ac"></i></span>{{ValueAdd.description}} 
					  </p>
                    </div>
                  </div>
                </div>
				
				
                <div class="roomBookWrapr"> 
                  <p class="roomPrice"> <span class="strThru" ng-if="{{ Room_Details.RateInfos.RateInfo.ChargeableRateInfo.averageBaseRate}} > {{ Room_Details.RateInfos.RateInfo.ChargeableRateInfo.averageRate}}"><span ng-bind-html="symbol"></span>{{ Room_Details.RateInfos.RateInfo.ChargeableRateInfo.averageBaseRate}}</span> <span class="actPrice"><span ng-bind-html="symbol"></span>{{ Room_Details.RateInfos.RateInfo.ChargeableRateInfo.averageRate}}</span> <span class="hotInfo_ppn"><?php echo $_SESSION['TXTDATA']['per_room_per_night'];?></span> </p>
                 <!-- <p class="roomBook">
				  
				  <a class="btn-book" ng-href="#/online-booking/{{ Room_Details.rateCode }}/{{ HotelSummary.hotelId }}/?fn=onlinebooking&checkIn={{checkInUrl}}&checkOut={{checkOutUrl}}&language={{Cri_language}}&currency={{Cri_currency}}&rooms={{rooms}}&adults={{adults}}&childs={{childs}}"><?php echo $_SESSION['TXTDATA']['book_now'];?></a>
				  </p>
				   <div class="text-popu14">

												hhoeloldfl
				   </div> 
				   -->
				  
				   <div class="content_1 roomBook">
				   
				   
				   <a class="btn-book carte_button" ng-href="#/online-booking/{{ Room_Details.rateCode }}/{{ HotelSummary.hotelId }}/?fn=onlinebooking&checkIn={{checkInUrl}}&checkOut={{checkOutUrl}}&language={{Cri_language}}&currency={{Cri_currency}}&rooms={{rooms}}&adults={{adults}}&childs={{childs}}"><?php echo $_SESSION['TXTDATA']['book_now'];?></a>
				   
				      <div class="text-popu14 carte">
							<span ng-if="Room_Details.RateInfos.RateInfo.ChargeableRateInfo.NightlyRatesPerRoom.size == 1">
				<span class="total_left">{{checkInUrl}}</span>
				<span class="total_right">
				<span ng-bind-html="symbol"></span>{{Room_Details.RateInfos.RateInfo.ChargeableRateInfo.NightlyRatesPerRoom.NightlyRate.rate}}</span>
				</span>
				
				 <span ng-if="Room_Details.RateInfos.RateInfo.ChargeableRateInfo.NightlyRatesPerRoom.size > 1">
				 <span ng-repeat="NightlyRates in Room_Details.RateInfos.RateInfo.ChargeableRateInfo.NightlyRatesPerRoom.NightlyRate">
				<span class="total_left">{{checkInUrl}}</span><span class="total_right"><span ng-bind-html="symbol"></span>{{NightlyRates.rate}}</span>
			
				</span>
				</span>
				<span class="total_left">No of Rooms</span><span class="total_right"><?php echo $_SESSION['no_of_rooms']; ?></span>
				
				 <span ng-if="Room_Details.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.size > 1">
				 <span ng-repeat="SurchargesData in Room_Details.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge">
				<span class="total_left">{{SurchargesData.type}}</span>
				<span class="total_right"><span ng-bind-html="symbol"></span>{{SurchargesData.amount}}</span>
				</span>
                </span>
				
				  <span ng-if="Room_Details.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.size == 1">
						  <span class="total_left">{{Room_Details.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge.type}}</span><span class="total_right">{{Room_Details.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge.amount}}</span>
						 
					   </span>
				
				
					 

					 </div> 
				   
  
</div>


				

		
                </div>
              </div>
			  
              <p class="roomMoreInfo"><a href="javascript:void(0);" ng-click="ShowHide(Room_Details.rateCode)"><?php echo $_SESSION['TXTDATA']['room_info_conditions'];?></a></p>
              <div class="roomMoreInfoDiv" id="roomMoreInfoDiv_{{Room_Details.rateCode}}">
                <div class="roomMore_Content">
                  <h4><?php echo $_SESSION['TXTDATA']['more_information'];?></h4>
				  <p ng-bind-html=Room_Details.RoomType.descriptionLong>{{ Room_Details.RoomType.descriptionLong }}</p>
                </div>
				<div class="roomMore_Content">
                  <h4><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></h4>
                  <p ng-bind-html=checkInInstructions>{{ checkInInstructions }} </p>
                </div>
				<div class="roomMore_Content">
                  <h4><?php echo $_SESSION['TXTDATA']['specialcheckin_instructions'];?></h4>
                  <p>{{ specialCheckInInstructions }} </p>
                </div>
				<div class="roomMore_Content">
                  <h4><?php echo $_SESSION['TXTDATA']['cancellation_policy'];?></h4>
                  <p>{{ Room_Details.RateInfos.RateInfo.cancellationPolicy }} </p>
                </div>
				 <div class="roomMore_Content" >
                  <h4><?php echo $_SESSION['TXTDATA']['amenities'];?></h4>
                  <ul class="roomMore_Listing" >
                   <li ng-repeat="RoomAmenity in Room_Details.RoomType.roomAmenities.RoomAmenity"> 
				   <span class="chkClass"><i class="fa fa-check" aria-hidden="true"></i></span>
{{ RoomAmenity.amenity}}</li>
                    
                  </ul>
                </div>
				
				
              </div>
            </li>
          </ul>
		  
		  
		  
		  
        </div>
        <div class="hotel_Description">
          <div class="descriptionWrapper" id="AmenitiesArea">
            <div class="form_title">
              <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['amenities'];?></h3>
              <p><?php echo $_SESSION['TXTDATA']['amenities'];?></p>
            </div>
            <div class="step">
              <ul class="float-left-property-Amenity">
                <li ng-repeat="PropertyAmenity in PropertyAmenities"><span class="chkClass"><i class="fa fa-check" aria-hidden="true"></i></span>{{ PropertyAmenity.amenity }}</li>
              </ul>
            </div>
          </div>
          <div class="moreDescription-Div">
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></p>
              </div>
              <div class="step">
                <p ng-bind-html=HotelDetails.checkInInstructions>{{HotelDetails.checkInInstructions}}</p>
              </div>
            </div>
			<div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['specialcheckin_instructions'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['specialcheckin_instructions'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.specialCheckInInstructions}}</p>
              </div>
            </div>
			
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['room_fees_description'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['room_fees_description'];?></p>
              </div>
              <div class="step">
                <p>
                <div class="roomFeedesc" ng-bind-html=HotelDetails.roomFeesDescription>
				  {{HotelDetails.roomFeesDescription}}
				</div>
                </p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['dining'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['dining'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.diningDescription}}</p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['hotel_policy'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['hotel_policy'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.hotelPolicy}}</p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['location_description'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['location_description'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.locationDescription}}</p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['business_other_amenities'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['business_other_amenities'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.businessAmenitiesDescription}}</p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['amenities_description'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['amenities_description'];?></p>
              </div>
              <div class="step">
                <p>{{HotelDetails.amenitiesDescription}}</p>
              </div>
            </div>
            <div class="descriptionWrapper">
              <div class="form_title">
                <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['point_of_interest'];?></h3>
                <p><?php echo $_SESSION['TXTDATA']['point_of_interest'];?></p>
              </div>
              <div class="step">
			  
                <div id="pointInterest" ng-bind-html="areaInfo"></div>
              </div>
            </div>
          </div>
          <div class="descriptionWrapper" id="ReviewsArea">
            <div class="form_title">
              <h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['tripadvisor_reviews'];?></h3>
              <p><?php echo $_SESSION['TXTDATA']['tripadvisor_reviews'];?></p>
            </div>
            <div class="step">
              <div id="tripdiv">{{TripAdvisor}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
	<div class="col-md-4 nopad-left">
    <div class="nav" id="fixedSide">
      <div>
        <div class="column-right">
          <div class="hotelInfo_modifie">
            <div class="book-aapmoible">
              <p class="you_titlebook"><?php echo $_SESSION['TXTDATA']['your_selected_room_rate'];?>
              <p>
              <p class="you_titlelock"><?php echo $_SESSION['TXTDATA']['lock_this_price_now'];?></p>
            </div>
			  
            <div class="modify_searchContainer">
              <!-- <div class="modifyPriceContainer">
                <p class="modifyStrThru"> 10,500</p>
                <p class="modifyPrice"><sup>&#8360;</sup> 7,875</p>
                <p class="modigyPpN">Per Room Per Night</p>
              </div>-->
              <div class="modifyFormContainer">
                <div class="hotel-inf-serbox">
                  <div class="thumbs-ioncs"> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $_SESSION['TXTDATA']['Best_price_for_your_travel_dates'];?> </div>
                  <div class="info_hotl_room_info">
                    <h3 class="inf_room_typ">{{ Room_Details[0].rateDescription }}</h3>
                    <ul class="info_hotl_listing">
                      <li ng-repeat="ValueAdd in Room_Details[0].ValueAdds.ValueAdd">
					   <span class="chkIc" ng-if="ValueAdd.description"><i class="fa fa-check" aria-hidden="true"></i></span>{{ ValueAdd.description}}</li>
                    
                    </ul>
                    <h3 class="info_hotl_Pri"><span ng-bind-html="symbol"></span> {{ Room_Details[0].RateInfos.RateInfo.ChargeableRateInfo.averageRate}}</h3>
                    <span class="info_hotl_PriSpn">
					 <?php echo $_SESSION['TXTDATA']['per_room_per_night'];?>
					</span><a class="hotInfo_bookN" ng-href="#/online-booking/{{ Room_Details[0].rateCode }}/{{ HotelSummary.hotelId }}/?fn=onlinebooking&checkIn={{checkInUrl}}&checkOut={{checkOutUrl}}&language={{Cri_language}}&currency={{Cri_currency}}&rooms={{rooms}}&adults={{adults}}&childs={{childs}}"><?php echo $_SESSION['TXTDATA']['book_now'];?></a> </div>
                  <div class="hot_info_tripAdd">
                    <p class="revBased"><?php echo $_SESSION['TXTDATA']['Best_on_the_tripadvisor_popularity'];?></p>
                    <p class="hot_infoTripRat">{{HotelSummary.tripAdvisorRating}}<span class="tripAdd_Ic"><img alt="" ng-src="{{HotelSummary.tripAdvisorRatingUrl}}"></span></p>
                    <p class="tripRatFrom"><span class="tripRatFromL">Rating From {{HotelSummary.tripAdvisorReviewCount}} Review(s)</span><span class="tripRatFromR"><a href="javascript:void(0)" ng-click="gotoAnchor('ReviewsArea')"><?php echo $_SESSION['TXTDATA']['read_all_reviews'];?></a></span></p>
                  </div>
                  <!-- <form class="hotel-inf-serbox-form">
                    <ul>
                      <li>
                        <md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>
                      </li>
                      <li>
                        <md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>
                      </li>
                      <li class="date-rom_hotinfo">
                        <input type="text" ng-model="rooms" id="rooms" placeholder="Guests" />
                      </li>
                      <li class="date-rom_hotinfo">
                        <input type="text" ng-model="rooms" id="rooms" placeholder="Grand Premium Room" />
                      </li>
                    </ul>
                    <div class="Sub-Tota1-hot">
                      <p class="sub-tota"> Sub Total</p>
                      <ul class="Sub-total-list">
                        <li>
                          <h2> <sup>&#8360;</sup> 10,500</h2>
                        </li>
                        <li>
                          <p>for 1 Room 1 Night</p>
                          <p>Excludes Taxes</p>
                        </li>
                      </ul>
                    </div>
                    <input class="btn-hack button" type="button" value="Book Now" ng-click="Search_Destinations();" >
                  </form>-->
                </div>
                <!--<form>
									<div class="formElemtbox">
									<label>Check-In</label>
									<input type="text" class="modifyChkIn formElement"/>
									</div>
									<div class="formElemtbox">
									<label>Check-Out</label>
									<input type="text" class="modifyChkOut formElement"/>
									</div>
									<div class="formElemtbox">
									<label>Rooms</label>
									<select class="modifyChkIn formElement"/>
									<option>2 adults 1 child</option>
									<option>2 adults 1 child</option>
									<option>2 adults 1 child</option>
									</select>
									</div>
									</form>
									
								-->
              </div>
            </div>
          </div>
          <div > </div>
        </div>
      </div>
    </div>
	  </div>
  </div>
</div>
<div class="hote_map-container" id="hote_map_container"></div>


<div class="container relatHotels" id="MapArea">
  <div class="col-md-12">
    <div class="hotel-detail-container">
      <div class="hotel-information-1">
        <div class="suggested_hotel_div">
          <h2 class="suggested_hotel_title"><?php echo $_SESSION['TXTDATA']['Hotels_you_might_also_like'];?> <span><?php echo $_SESSION['TXTDATA']['Travellers_who_viewed_this_hotel_also_viewed_these_hotels'];?></span></h2>
          <div class="sug_hotel_wrapper">
            <div class="sug_hotel_col" ng-repeat="Hotel_Suggestions in Hotel_Suggestions">
              <div class="sug_hotel_top"> <a ng-href="#/hotel-information/{{Hotel_Suggestions.EANHotelID}}/?fn=hotelInfo&checkIn={{checkInUrl}}&checkOut={{checkOutUrl}}&language={{Cri_language}}&currency={{currency}}&hotelType=1&rooms={{rooms}}&adults={{adults}}&childs={{childs}}&childAge={{childAge}}"> <img alt="" ng-src="http://images.trvl-media.com/{{ Hotel_Suggestions.thumbNailUrl }}"></a> </div>
              <div class="sug_hotel_bot">
                <div class="sName">
                  <p class="white ico16 lh1-2"> <a href="#/hotel-information/{{Hotel_Suggestions.EANHotelID}}/?fn=hotelInfo&checkIn={{checkInUrl}}&checkOut={{checkOutUrl}}&language={{Cri_language}}&currency={{currency}}&hotelType=1&rooms={{rooms}}&adults={{adults}}&childs={{childs}}&childAge={{childAge}}">{{ Hotel_Suggestions.name }}</a></p>
                  <address class="ico13 white">
                  <img alt="" ng-src="{{ Hotel_Suggestions.tripAdvisorRatingUrl }}">
                  </address>
                </div>
                <div class="sugHotPrice"><span ng-bind-html="symbol" class="ng-binding"></span>{{ Hotel_Suggestions.lowRate }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
			
$('#fixedSide').affix({
offset: {     
	top: $('#fixedSide').offset().top,
   bottom: ($('footer').outerHeight(true) + $('.hote_map-container').outerHeight(true) + $('.relatHotels').outerHeight(true)) - 400
   }

});
var widt = $('.affix-top').width();
$('.affix-top').width(widt);	

$(window).scroll(function(){
	if ($(this).scrollTop() > 100) { // this refers to window
     $('.col-left-menu').addClass('col-left-fixed-menu');
    }
	else{
	$('.col-left-menu').removeClass('col-left-fixed-menu');	}
	
	var new_width = $('.content').width();
	$('.col-left-fixed-menu').width(new_width); 
	
	})
    
</script>

<style>


.room_details_listing > li {

    position: relative;
}

.carte {
        background: #000;
    padding: 10px 10px;
    width: 30%;
    color: #fff;
    position: absolute;
    top: 40px;
    right: 152px;display:none;

}

.carte:before {
    content: '';
    content: '';
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    position: absolute;
    bottom: -8px;
    left: 10px;
}

.carte_button:hover + .carte {
   


	display:block;
}

.total_left {
    clear: both;
}


</style>