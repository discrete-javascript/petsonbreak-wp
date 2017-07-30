<?php session_start();?>
<style>
.horizontal-box {display: none;}
.affix-bottom {position: absolute;}
.affix-top {position: relative;}
.affix#conffixedSide {top: 0px;}
.booking_confirmation1{    padding: 11px 30px 30px 78px;
    background: #fff;
    border: 1px solid #ccc;
    margin: 15px 0px;}
.booking_confirmation1 h3{    text-align: center;font-size: 31px;font-weight: 300;margin-bottom: 15px;}
.booking_confirmation1 p{    text-align: center;font-size: 15px !important;    margin-left: 2px !important;}
.booking_confirmation1 span{}
.hotel-booking-right-col .form_title{padding-left: 0px;margin-bottom: 0px;}
.hotel-booking-right-col {    padding-bottom: 0px !important;}

.form_title h3 strong {top: 35px !important; left: 24px !important;}

</style>

<div class="container">
	<div class="row fixing-row">
	<div class="hotel-booking" ng-if="BookingDetails.booking_status=='Failed' || BookingDetails.booking_status == null">
	   <div class="dddcol-md-8" style="height:200px">
	     <div class="hotel-booking-right-col">
		  <div class="form_title">
		  
			<div class="booking_confirmation1">
		
			
			<h3><strong><i class="fa fa-times" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['booking_failed'];?></h3>
			<p><?php echo $_SESSION['TXTDATA']['booking_failed_desc'];?></p>
			</div>
			
			</div>
		  </div>
	   </div>
	</div>
	<div class="hotel-booking" ng-if="BookingDetails.booking_status=='Confirmed'">
	 <div class="col-md-8">
	 <div class="hotel-booking-right-col">
	     <div class="hotel-booking-right">
	       <div class="hotel-information_title">
            <h2 class="the-title">{{ BookingDetails.hotelName }}</h2>
            <div class="hotel-information_address">
              <div>
                <p>{{ BookingDetails.hotelAddress }},{{ BookingDetails.hotelCity }},{{ BookingDetails.hotelCountryCode }} </p>
                <p class="searchHot_rating rating-{{ BookingDetails.hotelRating }}"></p>
              </div>
        
            </div>
          </div>
		  <div class="step_container">
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['Thanks_for_booking_with_us'];?></h3>
				<p><?php echo $_SESSION['TXTDATA']['Thanks_for_booking_with_us'];?></p>
			</div>
			<div class="step">
				<p><?php echo $_SESSION['TXTDATA']['confirmation_description'];?></p>
			</div>
			
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['booking_details'];?></h3>
				<p><?php echo $_SESSION['TXTDATA']['booking_details'];?></p>
			</div>
			<div class="step"> 
				<div class="booking-details-itinerary">
				<ul class="booking-details-itinerary-ref">
						<li><?php echo $_SESSION['TXTDATA']['itinerary_no'];?>:</li>
						<li>{{ BookingDetails.bookingResponse.itineraryId }}</li>
						<li><?php echo $_SESSION['TXTDATA']['Reference_Number'];?>:</li>
						<li>{{ BookingDetails.bookingResponse.confirmationNumbers }}</li>
						<li><?php echo $_SESSION['TXTDATA']['Reservation_Status_Code'];?>:</li>
						<li>{{ BookingDetails.bookingResponse.reservationStatusCode }}</li>
						<li><?php echo $_SESSION['TXTDATA']['Number_Of_Rooms_Booked'];?>:</li>
						<li>{{ BookingDetails.bookingResponse.numberOfRoomsBooked }}</li>
						<li><?php echo $_SESSION['TXTDATA']['Customer_Details'];?>:	</li>
						<li>
						  <!-- For 1 room -->
						  <p ng-if="BookingDetails.bookingResponse.numberOfRoomsBooked ==1 ">
						    <?php echo $_SESSION['TXTDATA']['room'];?>-1
							<?php echo $_SESSION['TXTDATA']['name'];?>: {{ BookingDetails.bookingResponse.RoomGroup.Room.firstName}}
							<?php echo $_SESSION['TXTDATA']['adults'];?>: {{ BookingDetails.bookingResponse.RoomGroup.Room.numberOfAdults}},
							<?php echo $_SESSION['TXTDATA']['childs'];?>: {{ BookingDetails.bookingResponse.RoomGroup.Room.numberOfChildren}}
						  </p>
						  <!-- More than 1 rooms -->
						   <p  ng-if="BookingDetails.bookingResponse.numberOfRoomsBooked >1 " ng-repeat="RoomsData in  BookingDetails.bookingResponse.RoomGroup.Room">
						    <?php echo $_SESSION['TXTDATA']['room'];?>-{{$index +1}}
							<?php echo $_SESSION['TXTDATA']['name'];?>: {{ RoomsData.firstName}}
							<?php echo $_SESSION['TXTDATA']['adults'];?>: {{ RoomsData.numberOfAdults}}, Childs: {{ RoomsData.numberOfChildren}}
						  </p>
						  
						</li>
					</ul>
					
					</div>
			</div>

		  <style>
			.booking-details-itinerary-ref{}
			.booking-details-itinerary-ref li{}
		  </style>
		  
		  <div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></h3>
				<p><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></p>
			</div>
			<div class="step">
				<p ng-bind-html=BookingDetails.bookingResponse.checkInInstructions>{{ BookingDetails.bookingResponse.checkInInstructions }}</p>
			</div>
			
			
			  <div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['cancellation_policy'];?></h3>
				<p><?php echo $_SESSION['TXTDATA']['cancellation_policy'];?></p>
			</div>
			<div class="step">
				<p>{{ BookingDetails.bookingResponse.cancellationPolicy }}</p>
			</div>
		  
		  </div>
			 </div>
	</div>
	 </div>
	 <div class="col-md-4 nopad-left">
       <div class="hotel-booking-left-col nav" id="conffixedSide">
	   <div class="hotel-booking-left">
	          
				<div class="book-aapmoible conf-book-aapmoible">
				  <p class="you_titlebook"><?php echo $_SESSION['TXTDATA']['your_selected_room_rate'];?>
				  
				</div>
				<div class="conf-left-contnr">
				<div class="bookHot_Img">
				 <img alt="" ng-src="{{ BookingDetails.hotel_img }}">
			   </div>
			   <div class="bookHot_NameAdd">
			   
			    <p>{{ BookingDetails.hotelName }}</p>
				<span class="similar_address">{{ BookingDetails.hotelAddress }},{{ BookingDetails.hotelCity }},{{ BookingDetails.hotelCountryCode }}</span>
		       </div>
			   
			   <div class="bookHot_chk">
			     <ul>
				   <li><span class="bookHot_chk_left"><?php echo $_SESSION['TXTDATA']['checkin'];?>:</span><span class="bookHot_chk_right">
				   {{ BookingDetails.check_in }}</span></li>
				   <li><span class="bookHot_chk_left"><?php echo $_SESSION['TXTDATA']['checkout'];?>:</span><span class="bookHot_chk_right">{{ BookingDetails.check_out }}</span></li>
				 </ul>
			   </div>
			   
			   <div class="bookHot_rooms">
			      <ul class="conf-bookHot_rooms_List">
				    <!-- for single room -->
					<li ng-if="BookingDetails.bookingResponse.numberOfRoomsBooked ==1">
					  <span><?php echo $_SESSION['TXTDATA']['rooms'];?>: 1</span>
					  
					  <span><?php echo $_SESSION['TXTDATA']['adults'];?>: {{ BookingDetails.bookingResponse.RateInfos.RateInfo.RoomGroup.Room.numberOfAdults}}</span>
					  
					  <span><?php echo $_SESSION['TXTDATA']['children'];?>: {{ BookingDetails.bookingResponse.RateInfos.RateInfo.RoomGroup.Room.numberOfChildren}}</span>
					</li>
					<!-- for Multi room -->
					<li ng-if="BookingDetails.bookingResponse.numberOfRoomsBooked >1 " ng-repeat="RoomsData in  BookingDetails.bookingResponse.RoomGroup.Room">
					  <span><span><?php echo $_SESSION['TXTDATA']['rooms'];?>: {{$index +1}}</span>
					  <span><span><?php echo $_SESSION['TXTDATA']['adults'];?>: {{ RoomsData.numberOfAdults}}</span>
					  <span><span><?php echo $_SESSION['TXTDATA']['children'];?>: {{ RoomsData.numberOfChildren}}</span>
					</li>
				  </ul>
			   </div>
			   
	           <div class="pricing_container">
			     <p><?php echo $_SESSION['TXTDATA']['pricing'];?></p>
				
			     <ul class="pri">
		            <li><span class="total_left"><?php echo $_SESSION['TXTDATA']['room'];?> 1:</span> 
					 <span class="total_right">
					 {{ BookingDetails.bookingResponse.RateInfos.RateInfo.ChargeableRateInfo.averageRate }}</span>
					</li>
					
                    <li> <span class="total_left"><?php echo $_SESSION['TXTDATA']['total_nightly_rate'];?>:</span> <span class="total_right">{{ BookingDetails.bookingResponse.RateInfos.RateInfo.ChargeableRateInfo.nightlyRateTotal }}</span></li>
					<li><span class="total_left"><?php echo $_SESSION['TXTDATA']['Tax_Recovery_Charges_and_Service_Fees'];?>:</span> <span class="total_right">
					{{ BookingDetails.bookingResponse.RateInfos.RateInfo.ChargeableRateInfo.surchargeTotal }}</span></li>
				  </ul>
			   </div>
			   <div class="final_total">
					<span class="total_left2"><?php echo $_SESSION['TXTDATA']['You_will_be_charged_a_total_of'];?><br><span class="inclCls">(<?php echo $_SESSION['TXTDATA']['including_taxes_and_fees'];?>)</span>
					</span>
					<span class="total_right2">{{ BookingDetails.bookingResponse.RateInfos.RateInfo.ChargeableRateInfo.currencyCode }}&nbsp;{{ BookingDetails.bookingResponse.RateInfos.RateInfo.ChargeableRateInfo.total }}</span>
					
				  <div  class="payment_desc"><?php echo $_SESSION['TXTDATA']['payment_description'];?></div>	
			 </div>
			   </div>
	   </div>
	  </div>
	  </div>
	
		  </div>
	  </div>
	</div>
	

<script>
	if ($(window).width() > 1024) {
	 $('#conffixedSide').affix({
	 offset: {     
		top: $('#conffixedSide').offset().top,
		bottom: ($('footer').outerHeight(true)) + 50
		   }
		});
	
			}

</script>