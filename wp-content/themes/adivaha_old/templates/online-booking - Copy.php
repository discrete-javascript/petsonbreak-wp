<?php
session_start();
	
print_r($_SESSION);
?>
<style>
.horizontal-box {display: none;}
.hotel-information_title .the-title{
	padding-top:0px;
}
.book-left-contnr{
	padding: 20px;
    background: #fff;
    float: left;
}
.step p{
	line-height: 25px;
}

.affix-bottom {
  position: absolute;
}
.affix-top {
  position: relative;
}

.affix#bookfixedSide {
  top: 0px;
}
#bookfixedSide{
	width:375px;
}
</style>
<div class="container">
	<div class="row fixing-row">	
 
	<div class="hotel-booking">
	<div class="col-md-8">
	  <div class="hotel-booking-right-col">
	    <form action="http://twc5.com/demo/wp-hotel/wp-content/themes/adivaha/templates/final-booking.php" method="POST">
		 
		  <input type="hidden" name="customerSessionId" value="{{ Hotel_info_booking.customerSessionId }}" />
		  <input type="hidden" name="hotelName" value="{{ Hotel_info_booking.hotelName }}" />
		  <input type="hidden" name="roomName" value="{{ matchedRoom.roomTypeDescription }}" />
          <input type="hidden" name="hotelId" value="{{ Hotel_info_booking.hotelId }}" />
          <input type="hidden" name="arrivaldate" value="{{ Hotel_info_booking.arrivalDate }}" />
          <input type="hidden" name="departureDate" value="{{ Hotel_info_booking.departureDate }}" />
          <input type="hidden" name="supplierType" value="{{ matchedRoom.supplierType }}" />
          <input type="hidden" name="chargeableRate" value="{{matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }}" />
          <input type="hidden" name="roomTypeCode" value="{{ matchedRoom.roomTypeCode }}" />
          <input type="hidden" name="rateKey" value=" {{ matchedRoom.RateInfos.RateInfo.RoomGroup.Room[0].rateKey }}" />
          <input type="hidden" name="rateCode" value="{{ matchedRoom.rateCode }}" />
          <input type="hidden" name="noofRooms" id="noofRooms" value="{{ Hotel_info_booking.numberOfRoomsRequested }}" />
		  <input type="hidden" name="hotelRating" id="hotelRating" value="{{ HotelRating }}" />
		  <input type="hidden" name="hotel_img" id="hotel_img" value="{{ HotelImages }}" />
		  <input type="hidden" name="H_checkInInstructions" id="H_checkInInstructions" value="{{ Hotel_info_booking.checkInInstructions }}" />
		  
		  
		  
		  <input type="hidden" name="smokingPreference" value="{{ matchedRoom.smokingPreferences }}" />
		  
	      <div class="hotel-booking-right">
		  
		       <div class="slider_modifie">
				  <div class="hotel-information_title border-bottom_14">
					<h2 class="the-title">{{ Hotel_info_booking.hotelName }}</h2>
					
			
					<div class="hotel-information_address">
					  <div>
						<p>{{ Hotel_info_booking.hotelAddress }}, {{ Hotel_info_booking.hotelCity }}, {{ Hotel_info_booking.hotelCountry }} </p>
						<p class="searchHot_rating rating-{{ HotelRating }}"></p>
					  </div>
				
					</div>
				  </div>
		   <div class="step_container">
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>
				{{ matchedRoom.roomTypeDescription}}</h3>
					<p>{{ matchedRoom.roomTypeDescription}}</p>
			</div>
			<div class="step">
				<div class="book_form_container">
					<div class="book_form">
					rooms {{ rooms }}
					 <?php 
					
					 for($i=0;$i<$_SESSION['no_of_rooms'];$i++){?>
					  <input type="hidden" name="adults_<?php echo $i;?>" value="<?php echo $_SESSION['Cri_Pacs']['adults'][$i];?>" />
					  <div class="form-group-div">
						<label>Title</label>
						<select class="form-element" name="titles_<?php echo $i;?>" id="titles_<?php echo $i;?>">
						  <option value="Mr"  selected="selected">Mr</option>
						  <option value="Ms">Ms</option>
						  <option value="Mrs">Mrs</option>
						</select>
					  </div>
					  <div class="form-group-div book-margn-LR">
						<label>First Name</label>
						<input type="text" class="form-element" name="firstName_<?php echo $i;?>" id="firstName_<?php echo $i;?>" value="Prashant">
					  </div>
					  <div class="form-group-div">
						<label>Last Name</label>
						<input type="text" class="form-element" name="lastName_<?php echo $i;?>" id="lastName_<?php echo $i;?>" value="Thakur">
					  </div>
					 <?php } ?> 
					  
					  
					  <div class="form-group-div">
						<label>Email Address</label>
						<input type="text" class="form-element" name="email_id" id="email_id" value="support@thewebconz.com">
					  </div>
					
					  <div class="form-group-div book-margn-LR">
						<label>Confirm Email Address</label>
						<input type="text" class="form-element" name="email_id_2" id="email_id_2" value="support@thewebconz.com">
					  </div>
					  
					  <div class="form-group-div">
						  <label>Telephone Number</label>
						<input type="text" class="form-element" name="homePhone" id="homePhone" value="4178291392">
					  </div>
					  
	  
					 <div class="form-group-div">
					    <label>Country</label>
						<!--<select class="form-element">
						  <option>United States.</option>
						  <option>Turkey</option>
						  <option>Afganistan</option>
						</select>-->
						
						<select name="countryCode" id="countryCode" class="form-element">
										<option value="">Select Country</option>
										<?php 
											$countryLists =array('AF'=>'Afghanistan','AX'=>'Aland Islands','AL'=>'Albania','DZ'=>'Algeria','AS'=>'American Samoa','AD'=>'Andorra','AO'=>'Angola','AI'=>'Anguilla','AQ'=>'Antarctica','AG'=>'Antigua and Barbuda','AR'=>'Argentina','AM'=>'Armenia','AW'=>'Aruba','AU'=>'Australia','AT'=>'Austria','AZ'=>'Azerbaijan','BS'=>'Bahamas','BH'=>'Bahrain','BD'=>'Bangladesh','BY'=>'Belarus','BE'=>'Belgium','BZ'=>'Belize','BJ'=>'Benin','BM'=>'Bermuda','BT'=>'Bhutan','BO'=>'Bolivia','BA'=>'Bosnia and Herzegovina','BW'=>'Botswana','BV'=>'Bouvet Island','BR'=>'Brazil','IO'=>'British Indian Ocean Territory','BN'=>'Brunei Darussalam','BG'=>'Bulgaria','BF'=>'Burkina Faso','KH'=>'Cambodia','CM'=>'Cameroon','CA'=>'Cape Verde','CV'=>'Cape Verde','KY'=>'Cayman Islands','CF'=>'Central African Republic','TD'=>'Chad','CL'=>'Chile','CN'=>'China','CX'=>'Christmas Island','CC'=>'Cocos (Keeling) Islands','CO'=>'Colombia','KM'=>'Comoros','CG'=>'Congo','CD'=>'Congo, the Democratic Republic of the','CK'=>'Cook Islands (New Zealand)','CR'=>'Costa Rica','CI'=>'Cote d\'ivoire','HR'=>'Croatia','CY'=>'Cyprus','CZ'=>'Czech Republic','DK'=>'Denmark','DJ'=>'Djibouti','DM'=>'Dominica','DO'=>'Dominican Republic','EC'=>'Ecuador','EG'=>'Egypt','SV'=>'El Salvador','GQ'=>'Equatorial Guinea','ER'=>'Eritrea','EE'=>'Estonia','ET'=>'Ethiopia','FK'=>'Falkland Islands','FO'=>'Faroe Islands','FJ'=>'Fiji','FI'=>'Finland','FR'=>'France','GF'=>'French Guiana','PF'=>'French Polynesia','TF'=>'French Southern Territories','GA'=>'Gabon','GM'=>'Gambia','GE'=>'Georgia','DE'=>'Germany','GH'=>'Ghana','GI'=>'Gibraltar','GR'=>'Greece','GL'=>'Greenland','GD'=>'Grenada','GP'=>'Guadeloupe','GU'=>'Guam','GT'=>'Guatemala','GG'=>'Guernsey','GN'=>'Guinea','GW'=>'Guinea-Bissau','GY'=>'Guyana','HT'=>'Haiti','HM'=>'Heard Island and McDonald Islands','VA'=>'Holy See (Vatican City State)','HN'=>'Honduras','HK'=>'Hong Kong','HU'=>'Hungary','IS'=>'Iceland','IN'=>'India','ID'=>'Indonesia','IR'=>'Iran, Islamic Republic of','IQ'=>'Iraq','IE'=>'Ireland','IM'=>'Isle of Man','IL'=>'Israel','IT'=>'Italy','JM'=>'Jamaica','JP'=>'Japan','JE'=>'Jersey','JO'=>'Jordan','KZ'=>'Kazakhstan','KE'=>'Kenya','KI'=>'Kiribati','KP'=>'Korea','KR'=>'Korea, Republic of','KW'=>'Kuwait',
											'KG'=>'Kyrgyzstan','LA'=>'Lao People\'s Democratic Republic','LV'=>'Latvia','LB'=>'Lebanon','LS'=>'Lesotho','LR'=>'Liberia','LY'=>'Libyan Arab Jamahiriya','LI'=>'Liechtenstein','LT'=>'Lithuania','LU'=>'Luxembourg','MO'=>'Macao','MK'=>'Macedonia, the former Yugoslav Republic of','MG'=>'Madagascar','MW'=>'Malawi','MY'=>'Malaysia','MV'=>'Maldives','ML'=>'Mali','MT'=>'Malta','MH'=>'Marshall Islands','MQ'=>'Martinique','MR'=>'Mauritania','MU'=>'Mauritius','YT'=>'Mayotte','MX'=>'Mexico','FM'=>'Micronesia, Federated States of','MD'=>'Moldova, Republic of','MC'=>'Monaco','MN'=>'Mongolia','ME'=>'Montenegro','MS'=>'Montserrat','MA'=>'Morocco','MZ'=>'Mozambique','MM'=>'Myanmar','NA'=>'Namibia','NR'=>'Nauru','NP'=>'Nepal','NL'=>'Netherlands','AN'=>'Netherlands Antilles','NC'=>'New Caledonia','NZ'=>'New Zealand','NI'=>'Nicaragua','NE'=>'Niger','NG'=>'Nigeria','NU'=>'Niue','NF'=>'Norfolk Island','MP'=>'Northern Mariana Islands','NO'=>'Norway'
											,'OM'=>'Oman','PK'=>'Pakistan','PW'=>'Palau','PS'=>'Palestinian Territory, Occupied','PA'=>'Panama','PG'=>'Papua New Guinea','PY'=>'Paraguay','PE'=>'Peru','PH'=>'Philippines','PN'=>'Pitcairn','PL'=>'Poland','PT'=>'Portugal','PR'=>'Puerto Rico','QA'=>'Qatar','RE'=>'Reunion','RO'=>'Romania','RU'=>'Russian Federation','RW'=>'Rwanda','BL'=>'Saint Barthelemy','SH'=>'Saint Helena Ascension and Tristan da Cunha','KN'=>'Saint Kitts and Nevis','LC'=>'Saint Lucia','MF'=>'Saint Martin','PM'=>'Saint Pierre and Miquelon','VC'=>'Saint Vincent and the Grenadines','WS'=>'Samoa','SM'=>'San Marino','ST'=>'Sao Tome and Principe','SA'=>'Saudi Arabia','SN'=>'Senegal','RS'=>'Serbia','SC'=>'Seychelles','SL'=>'Sierra Leone','SG'=>'Singapore','SK'=>'Slovakia','SI'=>'Slovenia','SB'=>'Solomon Islands','ZA'=>'South Africa','GS'=>'South Georgia and the South Sandwich Islands','ES'=>'Spain','LK'=>'Sri Lanka','SR'=>'Suriname','SJ'=>'Svalbard and Jan Mayen','SZ'=>'Swaziland','SE'=>'Sweden','CH'=>'Switzerland','SY'=>'Syrian Arab Republic'
											,'TW'=>'Taiwan','TJ'=>'Tajikistan','TZ'=>'Tanzania, United Republic of','TH'=>'Thailand','TG'=>'Togo','TK'=>'Tokelau','TO'=>'Tonga','TT'=>'Trinidad and Tobago','TN'=>'Tunisia','TR'=>'Turkey'
											,'TM'=>'Turkmenistan','TC'=>'Turks and Caicos Islands','TV'=>'Tuvalu','UG'=>'Uganda','UA'=>'Ukraine','AE'=>'United Arab Emirates','GB'=>'United Kingdom','US'=>'United States','UM'=>'United States Minor Outlying Islands','UY'=>'Uruguay','UZ'=>'Uzbekistan','VU'=>'Vanuatu','VE'=>'Venezuela','VN'=>'Vietnam','VG'=>'Virgin Islands, British','VI'=>'Virgin Islands, U.S.','WF'=>'Wallis and Futuna','YE'=>'Yemen','ZM'=>'Zambia','ZW'=>'Zimbabwe');
											
											foreach($countryLists as $key=>$val){
												if($key=='US'){$selected='selected="selected"';}
												else{$selected='';}
												echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
											}		
										?>	
									</select>
					  </div>
					  
					  
						<div class="form-group-div book-margn-LR">
							 <label>Address</label>
							<input type="text" class="form-element" name="address1" id="address1" value="travelnow">
					   </div>
					  
						<div class="form-group-div">
							 <label>City</label>
							 <input type="text" class="form-element" name="city" id="city" value="Seattle">
					   </div>
					  
					 <div class="form-group-div">
							 <label>State</label>
					<!--	<select class="form-element">
						  <option>United States.</option>
						  <option>Turkey</option>
						  <option>Afganistan</option>
						</select>-->
						
			           <select name="stateProvinceCode" id="stateProvinceCode" class="form-element">
						   <option value="">Select State</option>
					      <?php
						    $stateLists =array('AL'=>'Alabama','AK'=>'Alaska','AS'=>'American Samoa','AZ'=>'Arizona','AR'=>'Arkansas','AA'=>'Armed Forces Americas excluding Canada','AE'=>'Armed Forces EMEA and Canada','AP'=>'Armed Forces Pacific','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','DC'=>'District of Columbia','FM'=>'Federated States of Micronesia','FL'=>'Florida','GA'=>'Georgia','GU'=>'Guam','HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MH'=>'Marshall Islands','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','MP'=>'Northern Mariana Islands','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','PR'=>'Puerto Rico','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VI'=>'Virgin Islands','VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming');
						  foreach($stateLists as $k=>$val){
							    if($k=='FL'){$sselected='selected="selected"';}
								else{$sselected='';}
						     echo '<option value="'.$key.'" '.$sselected.'>'.$val.'</option>';
						  }
						  ?>
				      </select>
					  </div>
					  
					   <div class="form-group-div book-margn-LR">
						   <label>Postal / Zip Code</label>
						<input type="text" class="form-element" name="postalCode" id="postalCode" value="98004">
					  </div>
					  
					  <!-- <option ng-if="matchedRoom.BedTypes.size != '1' " ng-repeat="bedtypess in matchedRoom.BedTypes" value="{{ bedtypess.id }}">{{ bedtypess.description }}</option> -->
					  
					  	<div class="form-group-div">
						<label>BedTypes</label>
						
						<select class="form-element" name="bedTypeId" id="bedTypeId">
						
						  <option ng-if="matchedRoom.BedTypes.size == '1' " value="{{ matchedRoom.BedTypes.BedType.id }}">{{ matchedRoom.BedTypes.BedType.description }}</option>
						  
						  <option ng-if="matchedRoom.BedTypes.size != '1' " ng-repeat="bedtypess in matchedRoom.BedTypes.BedType" value="{{ bedtypess.id }}">{{ bedtypess.description }}</option>
						  
						</select>
					    </div>
					  
					 	<!-- <div class="form-group-div">
						  <label>Bedtype</label>
						  {{ matchedRoom.BedTypes }}
					  </div> -->
					
					  
					  
				  
			  <div class="form-group-div"><label class="margin_l">Smoking Preferences</label>{{ matchedRoom.smokingPreferences1 }}	</div>  	  
                <div ng-if="matchedRoom.smokingPreferences == 'S' ">
				 {{ matchedRoom.smokingPreferences1 }}<input name="smokingPreference" type="radio" id="radio" value="S" checked="checked" />Smoking &nbsp; <input name="smokingPreference" type="radio" id="radio" value="S" checked="checked" />Non-Smoking  
					</div>
					
					<div ng-if="matchedRoom.smokingPreferences == 'NS' ">
				       {{ matchedRoom.smokingPreferences1 }}=<input name="smokingPreference" type="radio" id="radio" value="S" checked="checked" />Non-Smoking  
				</div>
					 
	
				    
					  </div>
					</div>
			</div>
		   <!-- payment informtion div -->
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>Payment Information Safe Shopping Guaranted</h3>
					<p>Payment Information Safe Shopping Guaranted </p>
			</div>
		<div class="step">
				<div class="book_form_container">
					<div class="payment_form">
					   <div class="form-group-div ">
						 <label>Cardholder FirstName</label>
						 <input type="text" class="form-element" name="creditCardFirstName" id="creditCardFirstName" value="Test" >
				      </div>
					  
					  <div class="form-group-div book-margn-LR">
						 <label>Cardholder LastName</label>
						 <input type="text" class="form-element" name="creditCardLastName" id="creditCardLastName" value="Booking">
				      </div>
					  
					   <div class="form-group-div">
						 <label>Card Type</label>
						<select class="form-element" name="creditCardType" id="creditCardType">
						 <option ng-repeat="PaymentType in PaymentTypes" value="{{PaymentType.code}}" >{{PaymentType.name}}</option>
						  
						</select>
					  </div>
					  
					  <div class="form-group-div">
						  <label>Card Number</label>
						 <input type="text" class="form-element" name="creditCardNumber" id="creditCardNumber" value="5401999999999999">
				      </div>
					  
					  
					   <div class="form-group-div book-margn-LR">
						   <label>Expiration Month</label>
						
						<select class="form-element" name="creditCardExpirationMonth" id="creditCardExpirationMonth">
                              <option value="">Select Month</option>
					  <?php 
					     $months =array('01'=>'01-January','02'=>'02-February','03'=>'03-March','04'=>'04-April','05'=>'05-May','06'=>'06-June','07'=>'07-July','08'=>'08-August','09'=>'09-September','10'=>'10-October','11'=>'11-November','12'=>'12-December');
						 foreach( $months as $k=>$val){
							 if($k=='07'){$mselected='selected="selected"';}
								else{$mselected='';}
							echo '<option value="'.$k.'" '.$mselected.'>'.$val.'</option>'; 
						 }
					  ?>
                      </select></div>
					 

					   <div class="form-group-div">
						   <label>Expiration Year</label>
						
						<select class="form-element" name="creditCardExpirationYear" id="creditCardExpirationYear">
                       <option value="">Select Year</option>
					   <?php for($i=2016;$i<2032;$i++){
						        if($i=='2017'){$yselected='selected="selected"';}
								else{$yselected='';}
						      echo '<option value="'.$i.'" '.$yselected.'>'.$i.'</option>';
					        }?>
                      </select></div>
					 
					  
					   <div class="form-group-div">
						  <label>Security Code (CCV)</label>
						  <input type="text" class="form-element" name="creditCardIdentifier" id="creditCardIdentifier" value="123">
				      </div>
					   
					  
					   </div>
				</div>
			</div>
				
				<!-- end payment informtion div -->
				
				
				<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>Cancellation Policy</h3>
					<p>Cancellation Policy </p>
			</div>
			<div class="step">
				<p>{{ matchedRoom.RateInfos.RateInfo.cancellationPolicy }}</p>
			</div>
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>CheckInInstructions</h3>
					<p>CheckInInstructions  </p>
			</div>
			<div class="step checkininstruc">
				<p>{{ Hotel_info_booking.checkInInstructions }}</p>
			</div>
			
				<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>SpecialCheckInInstructions </h3>
					<p>SpecialCheckInInstructions </p>
			</div>
			<div class="step">
				<p>{{ Hotel_info_booking.specialCheckInInstructions }}</p>
			</div>
			
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong>Review and book your trip </h3>
			  <p>Important information about your booking</p>
			</div>
			
			<div class="step">
			  
			   <p ng-if="true == matchedRoom.RateInfos.RateInfo.nonRefundable">This reservation is non-refundable and cannot be changed or cancelled.</p>
			   <p ng-if="false == matchedRoom.RateInfos.RateInfo.nonRefundable">This reservation is refundable and can be changed or cancelled.</p>
			   <p class="bookdiv_h2">You will be charged a total of $&nbsp;{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }} (including taxes and fees)</p>
			   <p>Credit card WILL BE CHARGED IMMEDIATELY FOR THE FULL AMOUNT of the reservation</p>
			</div>
			<div class="step">
			 <p style="margin-top:20px; margin-bottom:20px !important">
			  <input name="send_emails" id="send_emailsss" checked="checked" type="checkbox">
			 I agree with the <a href="http://travel.ian.com/index.jsp?pageName=userAgreement&amp;locale=en_US&amp;cid=500101" target="_blank">Terms &amp; Conditions </a> and I understand and accept the cancellation policy. 
              </p>
			</div>
            </div>

				
				<div class="onl-bkn-down-cnt">
				  
				 <div class="paymentConf">
				 <!--  <a ng-href="#/confirmation/{{ Room_Details.rateCode }}/{{ Hotel_Information.hotelId }}" class="payConfBtn">Confirm Booking</a>-->
				   
				   <input class="button_bookingsubmit allrounded6 completeBook payConfBtn" type="submit" name="Make_Booking" id="button2" value="Confirm Booking"/>
				 </div>
				</div>
				
				
				
			 </div>
			</form> 

		  </div>
	  </div>
	  </div>
	   <div class="col-md-4 nopad-left">
   
      <div class="hotel-booking-left-col nav" id="bookfixedSide">
	   <div class="hotel-booking-left">
				<div class="book-aapmoible">
				  <p class="you_titlebook">Your selected room rate
				  </p><p>
				  </p><p class="you_titlelock">Lock this price now</p>
				</div>
			    <div class="book-left-contnr">
				<div class="bookHot_Img">
				 <img ng-src="{{ HotelImages }}">
			   </div>
			  
			   <div class="bookHot_NameAdd">
			    <p>{{ Hotel_info_booking.hotelName }}</p>
				<span class="similar_address">{{ Hotel_info_booking.hotelAddress }}, {{ Hotel_info_booking.hotelCity }}, {{ Hotel_info_booking.hotelCountry }}</span>
		       </div>
			   
			   <div class="bookHot_chk">
			     <ul>
				   <li><span class="bookHot_chk_left">Check-in:</span><span class="bookHot_chk_right">
				   {{ Hotel_info_booking.arrivalDate }}</span></li>
				   <li><span class="bookHot_chk_left">Check-out:</span><span class="bookHot_chk_right">{{ Hotel_info_booking.departureDate }}</span></li>
				 </ul>
			   </div>
			   
			   <div class="bookHot_rooms">
			      <ul class="bookHot_rooms_List">
					<li>Rooms: {{ Hotel_info_booking.numberOfRoomsRequested }}</li>
					<li>Adults: 1</li>
					<li>Childs: 0</li>
				  </ul>
			   </div>
			   
	           <div class="pricing_container">
			     <p>Pricing</p>
			     <ul class="pri">
		                
						<li ng-repeat="n in [] | range:2"><span class="total_left">Room: {{ $index + 1 }}:</span> <span class="total_right">{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.averageRate * nights }}</span></li>								   
                        <li> <span class="total_left">Total Nightly Rate:</span> <span class="total_right">{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.nightlyRateTotal }}</span></li>
						 <li><span class="total_left">Tax Recovery Charges and Service Fees:</span> <span class="total_right">{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.surchargeTotal }}</span></li>
			 			
				  </ul>
			   </div>
			   
			   
			   <div class="final_total">
					<span class="total_left2">You will be charged a total of<br><span class="inclCls">(including taxes and fees)</span>
					</span>
					<span class="total_right2">$&nbsp;{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }}</span>
					
				  <div  class="payment_desc">Full payment will be charged to your credit card when you book this hotel. Please be aware that your bank may convert the payment to your local currency and charge you an additional conversion fee. This means that the amount you see on your credit or bank card statement may be in your local currency and therefore a different figure than the Total Price shown above. If you have any questions about this fee or the exchange rate applied to your booking, please contact your bank.</div>	
				 
					 
				  
				 </div>
			   </div>
			<div ng-repeat="Room_Details in Room_Details">
			   <div class="bookHot_Img">
				 <img ng-src="http://images.trvl-media.com/hotels/16000000/15880000/15878100/15878003/8382ff98_l.jpg">
			   </div>
				<div ng-if="rateCode == Room_Details.rateCode">
				{{ Room_Details.roomTypeDescription }}, {{ rateCode }}, {{ hotelId }} &nbsp;&nbsp;&nbsp;
				<button ng-click="Book_Now()">Book Now</button>
					</div>

			</div>
	   </div>
	  </div>
	  </div>
	 
	 </div>
	</div>
</div>
<script>
		$('#bookfixedSide').affix({
			offset: {     
				top: $('#bookfixedSide').offset().top,
			   bottom: ($('footer').outerHeight(true)) + 50
			   }
			
			});
</script>