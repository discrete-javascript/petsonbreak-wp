<?php session_start();?>
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
#bookfixedSide{width:375px;}
</style>
<div class="container">
	<div class="row fixing-row">	
 
	<div class="hotel-booking">
	<div class="col-md-8">
	  <div class="hotel-booking-right-col">
	    <form action="<?php echo $_SESSION['template_directory_uri'];?>/templates/final-booking.php" method="POST">
		  <input type="hidden" name="SiteUrl" value="{{SiteUrl}}" />
		  <input type="hidden" name="currency" value="{{Cri_currency}}" />
		  <input type="hidden" name="UserId" value="{{UserID}}" />
		  <input type="hidden" name="customerSessionId" value="{{ Hotel_info_booking.customerSessionId }}" />
		  <input type="hidden" name="hotelName" value="{{ Hotel_info_booking.hotelName }}" />
		  <input type="hidden" name="roomName" value="{{ matchedRoom.description }}" />
          <input type="hidden" name="hotelId" value="{{ Hotel_info_booking.hotelId }}" />
          <input type="hidden" name="arrivaldate" value="{{ Hotel_info_booking.arrivalDate }}" />
          <input type="hidden" name="departureDate" value="{{ Hotel_info_booking.departureDate }}" />
          <input type="hidden" name="supplierType" value="{{ matchedRoom.supplierType }}" />
          <input type="hidden" name="chargeableRate" value="{{matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }}" />
          <!--<input type="hidden" name="roomTypeCode" value="{{ matchedRoom.roomTypeCode }}" />-->
		  <input type="hidden" name="roomTypeCode" value="{{ matchedRoom.RoomType.roomCode }}" />
		  
          <input ng-if="matchedRoom.RateInfos.RateInfo.RoomGroup.Room[0]" type="hidden" name="rateKey" value=" {{ matchedRoom.RateInfos.RateInfo.RoomGroup.Room[0].rateKey }}" />
		  
		  <input ng-if="matchedRoom.RateInfos.RateInfo.RoomGroup.Room" type="hidden" name="rateKey" value=" {{ matchedRoom.RateInfos.RateInfo.RoomGroup.Room.rateKey }}" />
		  
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
					<!-- Pack List -->
					 <div class="packlist" ng-repeat="n in [] | range:rooms">
						  <input type="hidden" name="adults_{{n}}" value="{{ adultsArr[n] }}" />
						  <div class="form-group-div">
							<label><?php echo $_SESSION['TXTDATA']['title'];?></label>
							<select class="form-element" name="titles_{{ n }}" id="titles_{{ n }}">
							  <option value="Mr"  selected="selected">Mr</option>
							  <option value="Ms">Ms</option>
							  <option value="Mrs">Mrs</option>
							</select>
						  </div>
						  <div class="form-group-div book-margn-LR book-margn-L">
							<label><?php echo $_SESSION['TXTDATA']['first_name'];?></label>
							<input type="text" class="form-element" name="firstName_{{ n }}" id="firstName_{{ n }}" value="Test">
						  </div>
						  <div class="form-group-div">
							<label><?php echo $_SESSION['TXTDATA']['last_name'];?></label>
							<input type="text" class="form-element" name="lastName_{{ n }}" id="lastName_{{ n }}" value="Booking">
						  </div>
			        </div>
					<!-- End Pack List -->  
					  
					  <div class="form-group-div book-margn-L">
						<label><?php echo $_SESSION['TXTDATA']['email_address'];?></label>
						<input type="text" class="form-element" name="email_id" id="email_id" value="support@thewebconz.com">
					  </div>
					
					  <div class="form-group-div book-margn-LR">
						<label><?php echo $_SESSION['TXTDATA']['confirm_email_address'];?></label>
						<input type="text" class="form-element" name="email_id_2" id="email_id_2" value="support@thewebconz.com">
					  </div>
					  
					  <div class="form-group-div book-margn-L">
						  <label><?php echo $_SESSION['TXTDATA']['telephone_number'];?></label>
						<input type="text" class="form-element" name="homePhone" id="homePhone" value="9540121212">
					  </div>
					  
	  
					 <div class="form-group-div">
					    <label><?php echo $_SESSION['TXTDATA']['country'];?></label>
						<!--<select class="form-element">
						  <option>United States.</option>
						  <option>Turkey</option>
						  <option>Afganistan</option>
						</select>-->
						
						<select name="countryCode" id="countryCode" class="form-element" onchange="changeCountry(this.value)">
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
					  
					  
						<div class="form-group-div book-margn-LR book-margn-L">
							 <label><?php echo $_SESSION['TXTDATA']['address'];?></label>
							<input type="text" class="form-element" name="address1" id="address1" value="travelnow">
					   </div>
					  
						<div class="form-group-div">
							 <label><?php echo $_SESSION['TXTDATA']['city'];?></label>
							 <input type="text" class="form-element" name="city" id="city" value="Seattle">
					   </div>
					  
					 <div class="form-group-div book-margn-L" id="stateProvince">
					   <label><?php echo $_SESSION['TXTDATA']['state'];?></label>
			           <select name="stateProvinceCode" id="stateProvinceCode" class="form-element"></select>
					  </div>
					  
					   <div class="form-group-div book-margn-LR">
						   <label><?php echo $_SESSION['TXTDATA']['postal_zip_code'];?></label>
						<input type="text" class="form-element" name="postalCode" id="postalCode" value="98004">
					  </div>
					  
					  <!-- <option ng-if="matchedRoom.BedTypes.size != '1' " ng-repeat="bedtypess in matchedRoom.BedTypes" value="{{ bedtypess.id }}">{{ bedtypess.description }}</option> -->
					  
					  	<div class="form-group-div book-margn-L">
						<label><?php echo $_SESSION['TXTDATA']['bedtypes'];?></label>
						
						<select class="form-element" name="bedTypeId" id="bedTypeId">
						
						  <option ng-if="matchedRoom.BedTypes.size == '1' " value="{{ matchedRoom.BedTypes.BedType.id }}">{{ matchedRoom.BedTypes.BedType.description }}</option>
						  
						  <option ng-if="matchedRoom.BedTypes.size != '1' " ng-repeat="bedtypess in matchedRoom.BedTypes.BedType" value="{{ bedtypess.id }}">{{ bedtypess.description }}</option>
						  
						</select>
					    </div>
					  
					 	<!-- <div class="form-group-div">
						  <label>Bedtype</label>
						  {{ matchedRoom.BedTypes }}
					  </div> -->
					
					  
					
			    <div class="form-group-div"><label class="margin_l"><?php echo $_SESSION['TXTDATA']['smoking_preferences'];?></label></div>  	  
                  <div ng-if="matchedRoom.smokingPreferences == 'S' "><input name="smokingPreference" type="radio" id="radio" value="S" checked="checked" />Smoking &nbsp; <input name="smokingPreference" type="radio" id="radio" value="NS" checked="checked" />Non-Smoking  
				  </div>
					
					<div ng-if="matchedRoom.smokingPreferences == 'NS' "><input name="smokingPreference" type="radio" id="radio" value="NS" checked="checked" />Non-Smoking  
				    </div>
					 
	
				    
					  </div>
					</div>
			</div>
		   <!-- payment informtion div -->
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['payment_information_safe_shopping_guaranted'];?></h3>
					<p><?php echo $_SESSION['TXTDATA']['cardholder_firstName'];?></p>
			</div>
		<div class="step">
				<div class="book_form_container">
					<div class="payment_form">
					   <div class="form-group-div ">
						 <label><?php echo $_SESSION['TXTDATA']['cardholder_lastName'];?></label>
						 <input type="text" class="form-element" name="creditCardFirstName" id="creditCardFirstName" value="Test" >
				      </div>
					  
					  <div class="form-group-div book-margn-LR">
						 <label><?php echo $_SESSION['TXTDATA']['cardholder_firstName'];?></label>
						 <input type="text" class="form-element" name="creditCardLastName" id="creditCardLastName" value="Booking">
				      </div>
					  
					   <div class="form-group-div">
						 <label><?php echo $_SESSION['TXTDATA']['card_type'];?></label>
						<select class="form-element" name="creditCardType" id="creditCardType">
						 <option ng-repeat="PaymentType in PaymentTypes" value="{{PaymentType.code}}" ng-selected="{{ PaymentType.code }} = CA" >{{PaymentType.name}}</option>
						  
						</select>
					  </div>
					  
					  <div class="form-group-div">
						  <label><?php echo $_SESSION['TXTDATA']['card_number'];?></label>
						 <input type="text" class="form-element" name="creditCardNumber" id="creditCardNumber" value="5401999999999999">
				      </div>
					  
					  
					   <div class="form-group-div book-margn-LR">
						   <label><?php echo $_SESSION['TXTDATA']['expiration_month'];?></label>
						
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
						   <label><?php echo $_SESSION['TXTDATA']['expiration_year'];?></label>
						
						<select class="form-element" name="creditCardExpirationYear" id="creditCardExpirationYear">
                       <option value="">Select Year</option>
					   <?php for($i=2016;$i<2032;$i++){
						        if($i=='2017'){$yselected='selected="selected"';}
								else{$yselected='';}
						      echo '<option value="'.$i.'" '.$yselected.'>'.$i.'</option>';
					        }?>
                      </select></div>
					 
					  
					   <div class="form-group-div">
						  <label><?php echo $_SESSION['TXTDATA']['security_code'];?></label>
						  <input type="text" class="form-element" name="creditCardIdentifier" id="creditCardIdentifier" value="123">
				      </div>
					   
					  
					   </div>
				</div>
			</div>
			
		
				
				<!-- end payment informtion div -->		
				<div>
				<div>
				<div>We make sure to protect your information! You can feel safe reserving online with us.</div>
				<div>Safe Online Transactions</div>
				<ul>
				<li>Valid SSL Certificate</li>
				<li>We protect your information and do not share anything on this page with third parties</li>
				</ul>
				<img src="http://www.adivaha.com/demo/ean-theme-ml/wp-content/themes/adivaha/images/logo-verisign-large.png" /><br />
                <img src="http://www.adivaha.com/demo/ean-theme-ml/wp-content/themes/adivaha/images/paypal.png" />
				</div>
				</div>

				<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['cancellation_policy'];?></h3>
					<p><?php echo $_SESSION['TXTDATA']['cancellation_policy'];?> </p>
			</div>
			<div class="step">
				<p>{{ matchedRoom.RateInfos.RateInfo.cancellationPolicy }}</p>
			</div>
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['checkininstructions'];?></h3>
					<p><?php echo $_SESSION['TXTDATA']['checkininstructions'];?>  </p>
			</div>
			<div class="step checkininstruc">
				<p>{{ Hotel_info_booking.checkInInstructions }}</p>
			</div>
			
				<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['specialcheckin_instructions'];?></h3>
					<p><?php echo $_SESSION['TXTDATA']['specialcheckin_instructions'];?></p>
			</div>
			<div class="step">
				<p>{{ Hotel_info_booking.specialCheckInInstructions }}</p>
			</div>
			
			<div class="form_title">
				<h3><strong><i class="fa fa-check" aria-hidden="true"></i></strong><?php echo $_SESSION['TXTDATA']['review_and_book_your_trip'];?> </h3>
			  <p><?php echo $_SESSION['TXTDATA']['important_information_about_your_booking'];?></p>
			</div>
			
			<div class="step">
			  
			   <p ng-if="true == matchedRoom.RateInfos.RateInfo.nonRefundable">This reservation is non-refundable and cannot be changed or cancelled.</p>
			   <p ng-if="false == matchedRoom.RateInfos.RateInfo.nonRefundable">This reservation is refundable and can be changed or cancelled.</p>
			   <p class="bookdiv_h2">You will be charged a total of <span ng-bind-html="symbol"></span>&nbsp;{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }} (including taxes and fees)</p>
			   <p>Credit card WILL BE CHARGED IMMEDIATELY FOR THE FULL AMOUNT of the reservation</p>
			</div>
			<div class="step">
			 <p style="margin-top:20px; margin-bottom:20px !important">
			  <input name="send_emails" id="send_emailsss" checked="checked" type="checkbox">
			 <?php echo $_SESSION['TXTDATA']['i_agree_with_the'];?> <a href="http://travel.ian.com/index.jsp?pageName=userAgreement&amp;locale=en_US&amp;cid=500101" target="_blank"><?php echo $_SESSION['TXTDATA']['terms_conditions'];?></a> <?php echo $_SESSION['TXTDATA']['and_i_understand_and_accept_the_cancellation_policy'];?> 
              </p>
			</div>
            </div>

				
				<div class="onl-bkn-down-cnt">
				  
				 <div class="paymentConf">
				 <!--  <a ng-href="#/confirmation/{{ Room_Details.rateCode }}/{{ Hotel_Information.hotelId }}" class="payConfBtn">Confirm Booking</a>-->
				   
				   <input class="button_bookingsubmit allrounded6 completeBook payConfBtn" type="submit" name="Make_Booking" id="button2" value="<?php echo $_SESSION['TXTDATA']['confirm_booking'];?> "/>
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
				  <p class="you_titlebook"><?php echo $_SESSION['TXTDATA']['your_selected_room_rate'];?>
				  </p><p>
				  </p><p class="you_titlelock"><?php echo $_SESSION['TXTDATA']['lock_this_price_now'];?></p>
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
				   <li><span class="bookHot_chk_left"><?php echo $_SESSION['TXTDATA']['checkin'];?>:</span><span class="bookHot_chk_right">
				   {{ Hotel_info_booking.arrivalDate }}</span></li>
				   <li><span class="bookHot_chk_left"><?php echo $_SESSION['TXTDATA']['checkout'];?>:</span><span class="bookHot_chk_right">{{ Hotel_info_booking.departureDate }}</span></li>
				 </ul>
			   </div>
			   
			   <div class="bookHot_rooms">
			      <ul class="bookHot_rooms_List">
					<li><?php echo $_SESSION['TXTDATA']['rooms'];?>: {{ Hotel_info_booking.numberOfRoomsRequested }}</li>
					<li><?php echo $_SESSION['TXTDATA']['adults'];?>: {{adults}}</li>
					<li><?php echo $_SESSION['TXTDATA']['childs'];?>: {{childs}}</li>
					<li>child Age: 
					(<?php 
					$childStr='';
					for($i=0;$i<$_SESSION['no_of_rooms'];$i++){
					$childAge =$_SESSION['Cri_Pacs']['childAge'][$i];
                      $childStr.=implode(',',$childAge);
                   		  
					 }
					echo $childStr; ?>)
					</li>
				  </ul>
			   </div>
			 
	           <div class="pricing_container">
			     <p><?php echo $_SESSION['TXTDATA']['pricing'];?></p>
			     <ul class="pri">
		            <li ng-repeat="n in [] | range:Hotel_info_booking.numberOfRoomsRequested "><span class="total_left"><?php echo $_SESSION['TXTDATA']['room'];?>: {{ $index + 1 }}:</span> <span class="total_right"><span ng-bind-html="symbol"></span>{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.averageRate * nights }}</span></li>
					
					<li> <span class="total_left"><?php echo $_SESSION['TXTDATA']['total_nightly_rate'];?>:</span> <span class="total_right"><span ng-bind-html="symbol"></span>{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.nightlyRateTotal }}</span></li>
					<!--<li><span class="total_left"><?php echo $_SESSION['TXTDATA']['Tax_Recovery_Charges_and_Service_Fees'];?>:</span> <span class="total_right"><span ng-bind-html="symbol"></span>{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.surchargeTotal }}</span></li>-->
						
					<div >
					    <div ng-if="matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.size > 1">
						  <li ng-repeat="SurchargesData in matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge"><span class="total_left">{{SurchargesData.type}}</span><span class="total_right">{{SurchargesData.amount}}</span>
						  </li>
					   </div>
					   <div ng-if="matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.size == 1">
						  <li><span class="total_left">{{matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge.type}}</span><span class="total_right">{{matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.Surcharges.Surcharge.amount}}</span>
						  </li>
					   </div>
				  
					</div>	
				  </ul>
			   </div>
			   
			   
			   <div class="final_total">
					<span class="total_left2"><?php echo $_SESSION['TXTDATA']['You_will_be_charged_a_total_of'];?><br><span class="inclCls">(<?php echo $_SESSION['TXTDATA']['including_taxes_and_fees'];?>)</span>
					</span>
					<span class="total_right2"><span ng-bind-html="symbol"></span>&nbsp;{{ matchedRoom.RateInfos.RateInfo.ChargeableRateInfo.total }}</span>
					
				  <div  class="payment_desc"><?php echo $_SESSION['TXTDATA']['payment_description'];?></div>	
				 
					 
				  
				 </div>
			   </div>
			<div ng-repeat="Room_Details in Room_Details">
			   <div class="bookHot_Img">
				 <img ng-src="http://images.trvl-media.com/hotels/16000000/15880000/15878100/15878003/8382ff98_l.jpg">
			   </div>
				<div ng-if="rateCode == Room_Details.rateCode">
				{{ Room_Details.roomTypeDescription }}, {{ rateCode }}, {{ hotelId }} &nbsp;&nbsp;&nbsp;
				<button ng-click="Book_Now()"><?php echo $_SESSION['TXTDATA']['book_now'];?></button>
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
    
	
		$('#bookfixedSide').affix({
			offset: {     
				top: $('#bookfixedSide').offset().top,
			   bottom: ($('footer').outerHeight(true)) + 50
			   }
			
			});
			}
	$('.payConfBtn').click(function(){
		$(this).addClass('payConfBtn-clicked');
		})
		

 function changeCountry(country){
	$.ajax({
			type: "POST",
			url: document.getElementById("template_url").value+"/custom-ajax.php",
			data: 'action=changeCountry&countryCode='+country,
			success: function(Data){
				if(Data!=''){
					$('#stateProvinceCode').html(Data);
				}
				else{
					$('#stateProvinceCode').html('<option value="">No State</option>');
				}
			}
	});
	
 }	
changeCountry('US'); 
</script>