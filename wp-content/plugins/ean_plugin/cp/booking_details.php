<?php
$results =$wpdb->get_results("select * from twc_booking where id='".$_REQUEST['id']."'");
$result =$results[0];
$itinerary_id = $result->itineraryId;
$booking_results =json_decode($result->response_xml,true);
$HotelRoomReservationResponse =$booking_results['HotelRoomReservationResponse'];

//echo "<pre>";
//print_r($HotelRoomReservationResponse);

$user_email =$result->user_email;
$numberOfRoomsBooked =$HotelRoomReservationResponse['numberOfRoomsBooked'];
$arrivalDate =$HotelRoomReservationResponse['arrivalDate'];
$departureDate =$HotelRoomReservationResponse['departureDate'];
$hotelName =$HotelRoomReservationResponse['hotelName'];

$hotelAddress =$HotelRoomReservationResponse['hotelAddress'];
$hotelCity =$HotelRoomReservationResponse['hotelCity'];
$hotelCountryCode =$HotelRoomReservationResponse['hotelCountryCode'];

$hotelPostalCode =$HotelRoomReservationResponse['hotelPostalCode'];

$checkInInstructions =$result->checkInInstructions;

$hotel_img =$result->hotel_img;
$hotelRating =$result->hotelRating;

if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){
 $Rooms =$HotelRoomReservationResponse['RateInfos']['RateInfo']['RoomGroup']['Room'];
}else{
 $Rooms =$HotelRoomReservationResponse['RoomGroup']['Room'];
}

if (@array_key_exists("0",$Rooms)){
 $Room_arr =$Rooms;
}else{
 $Room_arr[] =$Rooms;
}
//print_r($Room_arr);
$total_adults =0;
$total_childs =0;
foreach($Room_arr as $Room_ar){
$total_adults =$total_adults+$Room['numberOfAdults'];
$total_childs =$total_adults+$Room['numberOfChildren'];
}

if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){
$ChargeableRateInfo =$HotelRoomReservationResponse['RateInfos']['RateInfo']['ChargeableRateInfo'];
$nonRefundable =$HotelRoomReservationResponse['RateInfos']['RateInfo']['nonRefundable'];
}else{
$ChargeableRateInfo =$HotelRoomReservationResponse['RateInfo']['ChargeableRateInfo'];
$nonRefundable =$HotelRoomReservationResponse['nonRefundable'];
}

$Surcharges_arr =$ChargeableRateInfo['Surcharges'];
$surcharge_size =$Surcharges_arr['@size'];
if($surcharge_size >1){
  $Surcharg_arr =$Surcharges_arr['Surcharge'];
}else{
   $Surcharg_arr[0] =$Surcharges_arr['Surcharge'];
}

$bcurrency =$ChargeableRateInfo['@currencyCode'];
$currency =$currency_symble[$bcurrency];

$averageBaseRate = $ChargeableRateInfo["@averageBaseRate"];
$averageRate = $ChargeableRateInfo["@averageRate"];
$total = $ChargeableRateInfo["@total"];
$nightlyRateTotal = $ChargeableRateInfo["@nightlyRateTotal"];
$surchargeTotal = $ChargeableRateInfo["@surchargeTotal"];

$no_of_nights = floor(strtotime($departureDate)-strtotime($arrivalDate))/(60*60*24);
?>
<style>
#sticky_navigation {
    width: 100%;
}
.demo_container {
    margin: 0 auto;
    width: 1130px;
}
.booking_left {
    float: left;
    width: 300px;
}
.booking_right {
    float: right;
    width: 741px;
}
.sb1 {
    background: none repeat scroll 0 0 #fff;
    border-bottom: 1px solid #d4d4d4;
    border-left: 1px solid #d4d4d4;
    border-right: 1px solid #d4d4d4;
    padding: 20px;
}
.sb1 h3 {
    clear: both;
    color: #000;
    font-family: "Open Sans",sans-serif;
    font-size: 18px;
    font-weight: 300 !important;
    line-height: normal;
    margin-bottom: 10px;
    margin-top: 10px;
}
.rightcontent {
    float: right;
    margin-left: 5px;
    width: 741px;
}
.thumb_booking_div {
    height: 200px;
    overflow: hidden;
    width: 300px;
}
.rating-static {
    background: url("../images/star-rating.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: inline-block;
    height: 16px;
    position: relative;
    top: 3px;
    width: 60px;
}
.final_total {
    border-top: 1px dotted #ccc;
    clear: both;
    color: #fe6500;
    display: block;
    font-family: "Open Sans",sans-serif;
    font-weight: bold;
    margin-top: 10px;
    padding: 5px 0 6px;
}

.my_t tr td {
    background: none repeat scroll 0 0 #fff;
    padding: 4px 10px !important;
}
.my_t tr td {
    background: none repeat scroll 0 0 #fff;
    padding: 4px 10px !important;
}
table td {
    padding: 0 !important;
}
</style>
 <div id="sticky_navigation">
      <div class="demo_container">
      <div class="booking_left sb1">
          <h3 style="margin-top: -8px;" class="opensans dark">Booking Summary</h3>
           <p class="booking_img_left"></p>
		   <div style="background:url(<?php echo $hotel_img;?>) center no-repeat;" class="thumb_booking_div"></div>
		    <strong style="margin-top:10px; display: block;"><?php echo $hotelName;?></strong>&nbsp;<span class="rating-static rating-<?php echo ($hotelRating*10);?>"></span><br>
		    <span class="similar_address"><?php echo $hotelAddress;?>, <?php echo $hotelCity;?>, <?php echo $hotelCountryCode;?></span><p></p>

        	
              <div class="clear"></div>
		  <ul class="ulcls">
		    <li>Check-in: <?php echo date('M d Y',strtotime($arrivalDate));?></li>
            <li>Check-out: <?php echo date('M d Y',strtotime($departureDate));?> </li>
		  </ul>
          <hr>
		  <ul class="ulclspax">
		    <li>Rooms: <?php echo $numberOfRoomsBooked;?></li>
            <li>Adults: <?php echo $total_adults;?></li>
			<li>Childs: <?php echo $total_childs;?></li>
		  </ul>
		  <div class="clear"></div>
		  <hr>
		  <strong style="margin-top:10px; display: block; margin-bottom: 10px;">Pricing&nbsp;:</strong>
          <ul class="pri" style="font-weight:normal; font-size:12px;">
		   <?php if($nonRefundable==1){?>
				     <li><b>Non-Refundable</b></li>
				<?php }?>
		   <?php for($i=0;$i<$numberOfRoomsBooked;$i++){ ?>
			  <li><span class="total_left">Room<?php echo ($i+1); ?>:</span> <span class="total_right"><?php echo number_format($averageRate, 2)*$no_of_nights; ?></span></li>
			<?php }?>
			 <li> <span class="total_left">Total Nightly Rate:</span> <span class="total_right"><?php echo number_format($nightlyRateTotal, 2); ?></span></li>
            <?php $checkEurope =country_to_continent( $hotelCountryCode );		
             if($checkEurope=='Europe'){?>
             <li><span class="total_left">Tax Recovery Charges:</span> <span class="total_right"><?php echo number_format($surchargeTotal, 2); ?></span></li>
			 <?php } else{?>
			 <li><span class="total_left">Tax Recovery Charges and Service Fees:</span> <span class="total_right"><?php echo number_format($surchargeTotal, 2); ?></span></li>
			 <?php }?>
			 
			 <?php 
			// print_r($Surcharg_arr);
			$salesTax_amnt=0;
		    $hotelOccupancyTax_amnt=0;
		    $cityTax_amnt=0;
			foreach($Surcharg_arr as $Surcharg)
			 {
			    $surchargeTyp =strtolower(trim($Surcharg['@type']));
			    if( ($surchargeTyp=='salestax') || ($surchargeTyp=='hoteloccupancytax'))
				{
				    if($surchargeTyp=='salestax'){
					 $salesTax_amnt =$salesTax_amnt+$Surcharg['@amount'];
					}
					if($surchargeTyp=='hoteloccupancytax'){
					 $hotelOccupancyTax_amnt =$hotelOccupancyTax_amnt+$Surcharg['@amount'];
					}
					if($surchargeTyp=='citytax'){
					 $cityTax_amnt =$cityTax_amnt+$Surcharg['@amount'];
					}
				}
			  }
			  if($salesTax_amnt>0 || $hotelOccupancyTax_amnt>0){ 
				echo '<li><span class="total_left">SalesTax:</span><span class="total_right">'.$salesTax_amnt.'</span></li>';
				echo '<li><span class="total_left">HotelOccupancyTax:</span><span class="total_right">'.$hotelOccupancyTax_amnt.'</span></li>';
				echo '<li><span class="total_left">CityTax:</span><span class="total_right">'.$cityTax_amnt.'</span></li>';
				}	
			  ?>
			 
			 
          </ul>
          <div class="clear"></div>
          <div style="margin-top:20px;" class="final_total">
		   <?php if($currency=='Rp'){?>
		    <span class="total_left2" style="width:190px">Total charges<br><span class="inclCls">(including taxes and fees)</span></span>
			<span class="total_right2" style="width:110px; font-size:14px"><?php echo $currency;?>&nbsp;<?php echo number_format($total, 2); ?></span>
			<?php } else{?>
			<span class="total_left2">Total charges<br><span class="inclCls">(including taxes and fees)</span></span>
			<span class="total_right2"><?php echo $currency;?>&nbsp;<?php echo number_format($total, 2); ?></span>
			<?php }?>
			<div class="clear"></div>
			
		  <div style="padding-top:10px;color:#666666; font-weight:normal">We have charged your credit card for the full payment for this reservation</div>	
		 </div>
          <div class="clear"></div>
          
      </div>
    </div>
    <div class="rightcontent sb1" style="min-height: 525px;">
      <div class="itemscontainer offset-1">
        <!-- hotel details -->
        <div class="itemscontainer offset-1">
        <!-- hotel details -->
	 <?php if(count($results) >0) {?>	
        <form name="booking_frm" id="booking_frm">
        <div class="hotel_booking">
          <div class="step1">
            <h1 class="toprounded6 incheight">Thanks for booking with us</h1>
            <div class="bookcls">
              <?php if(isset($HotelRoomReservationResponse['EanWsError'])){
			       $EanWsError =$HotelRoomReservationResponse['EanWsError'];
			   ?>
              <p>Itinerary No: <?php echo $itinerary_id;?></p>
              <p>CustomerSessionId: <?php echo $HotelRoomReservationResponse['customerSessionId'];?></p>
              <p>CheckInInstructions: <?php echo $checkInInstructions;?></p>
              <p>Message: <?php echo $EanWsError['presentationMessage'];?></p>
              <?php }
			  else{ //success?>
              <div class="ca1n"><img src="<?php echo get_template_directory_uri(); ?>/images/tick.png" align="left" style="margin-right:10px;" /> As soon as your booking is confirmed, a confirmation e-mail containing your booking details would be sent across to your contact details entered while booking. In case your confirmation details are lost, click on the 'Resend Confirmation' link on the website to resend the confirmation e-mail and SMS. Alternately, please call our helpdesk on <strong><?php echo $glob_setting['contact_number']; ?></strong> for assistance.</div>
              <h1 class="toprounded6 incheight">Booking Details</h1>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background:#CCC">
    
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="my_t">
                <tr>
                <td valign="top" style="width:200px;">Itinerary No:</td>
                <td valign="top"><?php echo $itinerary_id;?></td>
                </tr>
                <tr>
                <td valign="top">Reference Number:</td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['confirmationNumbers'];?></td>
                </tr>
                
                <tr>
                <td valign="top">Reservation Status Code:</td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['reservationStatusCode'];?></td>
                </tr>
                <tr>
                <td valign="top">Number Of Rooms Booked:</td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['numberOfRoomsBooked'];?></td>
                </tr>
                <tr>
                <td valign="top">Customer Details:</td>
                <td valign="top"><?php 
			  // print_r($Room_arr);
			  echo '<div>';	
			     $i=1;
				foreach($Room_arr as $Room){
					$Room_arr = $RoomGroup['Room'];
					echo '<p style="font-weight:bold;">Room-'.$i.'</p>';
					echo '<p>Name: '.$Room['firstName'].'&nbsp;'.$Room['lastName'].'</p>';
					echo '<p>Adults: '.$Room['numberOfAdults'].', Childs: '.$Room['numberOfChildren'].'</p>';
				$i++;	
				}
			  echo '</div>';	
			  ?></td>
                </tr>
				
				
                </table>
                
                
                </td>
  </tr>
</table>

                

              <br />
              <style type="text/css">
			  .travel_now_confirmation { background:#09F; border-bottom:5px solid #06C; color:#FFF; }
			  .travel_now_confirmation:hover { color:#FFF; background:#09C; }
			  .travel_now_cancel { background:#d21313; border-bottom:5px solid #a80909; color:#FFF; }
			  .travel_now_cancel:hover { color:#FFF; background:#ca0b0b; }
			  </style>
              <a href="https://www.travelnow.com/selfService/55505/searchByIdAndEmail?itineraryId=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn travel_now_confirmation" target="_blank" style="float:left;">Verify Confirmation</a>
			   <iframe src="https://www.travelnow.com/selfService/55505/searchByIdAndEmail?itineraryId=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" style="display:none"></iframe> 
			  
              &nbsp;&nbsp;
              <a href="https://www.travelnow.com/selfService/55505/showCancelItinerary?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn travel_now_cancel" target="_blank"  style="float:left; margin-left:5px;">Cancel This Booking</a>
              &nbsp;&nbsp;
              <a href="https://www.travelnow.com/selfService/55505/emailItineraryToOthers?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn" target="_blank"  style="float:left; margin-left:5px;">Email Reservation</a>
              &nbsp;&nbsp;
              <a href="https://www.travelnow.com/selfService/55505/showItineraryPrintView?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn" target="_blank"  style="float:left; margin-left:5px;">Print Receipt</a>
<br /><br /><br />
<?php if($checkInInstructions!=""){ ?>
<div class="can">
                <p style="font-weight:bold;">CheckIn Instructions</p>
                <p><?php echo $checkInInstructions;?></p>
              </div>
<?php } ?>
              <div class="can">
                <p style="font-weight:bold;">Cancellation Policy</p>
                <p>
				<?php 
				  if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){
				    echo $HotelRoomReservationResponse['RateInfos']['RateInfo']['cancellationPolicy'];
				   }else{
				   echo $HotelRoomReservationResponse['RateInfo']['cancellationPolicy'];
				   }	
				 
				 ?>
				</p>
              </div>
			  <div class="bookdiv_h1">PAYMENT IN FULL was made for the full amount of the reservation</div>
              <?php }?>
            </div>
          </div>
        </div>
      </form>
	 <?php }
	   else{ ?>
	   <div class="hotel_booking">This itinerary does not matched with our db. </div>
	   <?php }?>
        <!-- End hotel details -->
      </div>
        <!-- End hotel details -->
      </div>
      <div class="clear"></div>
    </div>
  </div>

 <?php
 	
function country_to_continent( $country ){
    $continent = '';
    if( $country == 'AF' ) $continent = 'Asia';
    if( $country == 'AX' ) $continent = 'Europe';
    if( $country == 'AL' ) $continent = 'Europe';
    if( $country == 'DZ' ) $continent = 'Africa';
    if( $country == 'AS' ) $continent = 'Oceania';
    if( $country == 'AD' ) $continent = 'Europe';
    if( $country == 'AO' ) $continent = 'Africa';
    if( $country == 'AI' ) $continent = 'North America';
    if( $country == 'AQ' ) $continent = 'Antarctica';
    if( $country == 'AG' ) $continent = 'North America';
    if( $country == 'AR' ) $continent = 'South America';
    if( $country == 'AM' ) $continent = 'Asia';
    if( $country == 'AW' ) $continent = 'North America';
    if( $country == 'AU' ) $continent = 'Oceania';
    if( $country == 'AT' ) $continent = 'Europe';
    if( $country == 'AZ' ) $continent = 'Asia';
    if( $country == 'BS' ) $continent = 'North America';
    if( $country == 'BH' ) $continent = 'Asia';
    if( $country == 'BD' ) $continent = 'Asia';
    if( $country == 'BB' ) $continent = 'North America';
    if( $country == 'BY' ) $continent = 'Europe';
    if( $country == 'BE' ) $continent = 'Europe';
    if( $country == 'BZ' ) $continent = 'North America';
    if( $country == 'BJ' ) $continent = 'Africa';
    if( $country == 'BM' ) $continent = 'North America';
    if( $country == 'BT' ) $continent = 'Asia';
    if( $country == 'BO' ) $continent = 'South America';
    if( $country == 'BA' ) $continent = 'Europe';
    if( $country == 'BW' ) $continent = 'Africa';
    if( $country == 'BV' ) $continent = 'Antarctica';
    if( $country == 'BR' ) $continent = 'South America';
    if( $country == 'IO' ) $continent = 'Asia';
    if( $country == 'VG' ) $continent = 'North America';
    if( $country == 'BN' ) $continent = 'Asia';
    if( $country == 'BG' ) $continent = 'Europe';
    if( $country == 'BF' ) $continent = 'Africa';
    if( $country == 'BI' ) $continent = 'Africa';
    if( $country == 'KH' ) $continent = 'Asia';
    if( $country == 'CM' ) $continent = 'Africa';
    if( $country == 'CA' ) $continent = 'North America';
    if( $country == 'CV' ) $continent = 'Africa';
    if( $country == 'KY' ) $continent = 'North America';
    if( $country == 'CF' ) $continent = 'Africa';
    if( $country == 'TD' ) $continent = 'Africa';
    if( $country == 'CL' ) $continent = 'South America';
    if( $country == 'CN' ) $continent = 'Asia';
    if( $country == 'CX' ) $continent = 'Asia';
    if( $country == 'CC' ) $continent = 'Asia';
    if( $country == 'CO' ) $continent = 'South America';
    if( $country == 'KM' ) $continent = 'Africa';
    if( $country == 'CD' ) $continent = 'Africa';
    if( $country == 'CG' ) $continent = 'Africa';
    if( $country == 'CK' ) $continent = 'Oceania';
    if( $country == 'CR' ) $continent = 'North America';
    if( $country == 'CI' ) $continent = 'Africa';
    if( $country == 'HR' ) $continent = 'Europe';
    if( $country == 'CU' ) $continent = 'North America';
    if( $country == 'CY' ) $continent = 'Asia';
    if( $country == 'CZ' ) $continent = 'Europe';
    if( $country == 'DK' ) $continent = 'Europe';
    if( $country == 'DJ' ) $continent = 'Africa';
    if( $country == 'DM' ) $continent = 'North America';
    if( $country == 'DO' ) $continent = 'North America';
    if( $country == 'EC' ) $continent = 'South America';
    if( $country == 'EG' ) $continent = 'Africa';
    if( $country == 'SV' ) $continent = 'North America';
    if( $country == 'GQ' ) $continent = 'Africa';
    if( $country == 'ER' ) $continent = 'Africa';
    if( $country == 'EE' ) $continent = 'Europe';
    if( $country == 'ET' ) $continent = 'Africa';
    if( $country == 'FO' ) $continent = 'Europe';
    if( $country == 'FK' ) $continent = 'South America';
    if( $country == 'FJ' ) $continent = 'Oceania';
    if( $country == 'FI' ) $continent = 'Europe';
    if( $country == 'FR' ) $continent = 'Europe';
    if( $country == 'GF' ) $continent = 'South America';
    if( $country == 'PF' ) $continent = 'Oceania';
    if( $country == 'TF' ) $continent = 'Antarctica';
    if( $country == 'GA' ) $continent = 'Africa';
    if( $country == 'GM' ) $continent = 'Africa';
    if( $country == 'GE' ) $continent = 'Asia';
    if( $country == 'DE' ) $continent = 'Europe';
    if( $country == 'GH' ) $continent = 'Africa';
    if( $country == 'GI' ) $continent = 'Europe';
    if( $country == 'GR' ) $continent = 'Europe';
    if( $country == 'GL' ) $continent = 'North America';
    if( $country == 'GD' ) $continent = 'North America';
    if( $country == 'GP' ) $continent = 'North America';
    if( $country == 'GU' ) $continent = 'Oceania';
    if( $country == 'GT' ) $continent = 'North America';
    if( $country == 'GG' ) $continent = 'Europe';
    if( $country == 'GN' ) $continent = 'Africa';
    if( $country == 'GW' ) $continent = 'Africa';
    if( $country == 'GY' ) $continent = 'South America';
    if( $country == 'HT' ) $continent = 'North America';
    if( $country == 'HM' ) $continent = 'Antarctica';
    if( $country == 'VA' ) $continent = 'Europe';
    if( $country == 'HN' ) $continent = 'North America';
    if( $country == 'HK' ) $continent = 'Asia';
    if( $country == 'HU' ) $continent = 'Europe';
    if( $country == 'IS' ) $continent = 'Europe';
    if( $country == 'IN' ) $continent = 'Asia';
    if( $country == 'ID' ) $continent = 'Asia';
    if( $country == 'IR' ) $continent = 'Asia';
    if( $country == 'IQ' ) $continent = 'Asia';
    if( $country == 'IE' ) $continent = 'Europe';
    if( $country == 'IM' ) $continent = 'Europe';
    if( $country == 'IL' ) $continent = 'Asia';
    if( $country == 'IT' ) $continent = 'Europe';
    if( $country == 'JM' ) $continent = 'North America';
    if( $country == 'JP' ) $continent = 'Asia';
    if( $country == 'JE' ) $continent = 'Europe';
    if( $country == 'JO' ) $continent = 'Asia';
    if( $country == 'KZ' ) $continent = 'Asia';
    if( $country == 'KE' ) $continent = 'Africa';
    if( $country == 'KI' ) $continent = 'Oceania';
    if( $country == 'KP' ) $continent = 'Asia';
    if( $country == 'KR' ) $continent = 'Asia';
    if( $country == 'KW' ) $continent = 'Asia';
    if( $country == 'KG' ) $continent = 'Asia';
    if( $country == 'LA' ) $continent = 'Asia';
    if( $country == 'LV' ) $continent = 'Europe';
    if( $country == 'LB' ) $continent = 'Asia';
    if( $country == 'LS' ) $continent = 'Africa';
    if( $country == 'LR' ) $continent = 'Africa';
    if( $country == 'LY' ) $continent = 'Africa';
    if( $country == 'LI' ) $continent = 'Europe';
    if( $country == 'LT' ) $continent = 'Europe';
    if( $country == 'LU' ) $continent = 'Europe';
    if( $country == 'MO' ) $continent = 'Asia';
    if( $country == 'MK' ) $continent = 'Europe';
    if( $country == 'MG' ) $continent = 'Africa';
    if( $country == 'MW' ) $continent = 'Africa';
    if( $country == 'MY' ) $continent = 'Asia';
    if( $country == 'MV' ) $continent = 'Asia';
    if( $country == 'ML' ) $continent = 'Africa';
    if( $country == 'MT' ) $continent = 'Europe';
    if( $country == 'MH' ) $continent = 'Oceania';
    if( $country == 'MQ' ) $continent = 'North America';
    if( $country == 'MR' ) $continent = 'Africa';
    if( $country == 'MU' ) $continent = 'Africa';
    if( $country == 'YT' ) $continent = 'Africa';
    if( $country == 'MX' ) $continent = 'North America';
    if( $country == 'FM' ) $continent = 'Oceania';
    if( $country == 'MD' ) $continent = 'Europe';
    if( $country == 'MC' ) $continent = 'Europe';
    if( $country == 'MN' ) $continent = 'Asia';
    if( $country == 'ME' ) $continent = 'Europe';
    if( $country == 'MS' ) $continent = 'North America';
    if( $country == 'MA' ) $continent = 'Africa';
    if( $country == 'MZ' ) $continent = 'Africa';
    if( $country == 'MM' ) $continent = 'Asia';
    if( $country == 'NA' ) $continent = 'Africa';
    if( $country == 'NR' ) $continent = 'Oceania';
    if( $country == 'NP' ) $continent = 'Asia';
    if( $country == 'AN' ) $continent = 'North America';
    if( $country == 'NL' ) $continent = 'Europe';
    if( $country == 'NC' ) $continent = 'Oceania';
    if( $country == 'NZ' ) $continent = 'Oceania';
    if( $country == 'NI' ) $continent = 'North America';
    if( $country == 'NE' ) $continent = 'Africa';
    if( $country == 'NG' ) $continent = 'Africa';
    if( $country == 'NU' ) $continent = 'Oceania';
    if( $country == 'NF' ) $continent = 'Oceania';
    if( $country == 'MP' ) $continent = 'Oceania';
    if( $country == 'NO' ) $continent = 'Europe';
    if( $country == 'OM' ) $continent = 'Asia';
    if( $country == 'PK' ) $continent = 'Asia';
    if( $country == 'PW' ) $continent = 'Oceania';
    if( $country == 'PS' ) $continent = 'Asia';
    if( $country == 'PA' ) $continent = 'North America';
    if( $country == 'PG' ) $continent = 'Oceania';
    if( $country == 'PY' ) $continent = 'South America';
    if( $country == 'PE' ) $continent = 'South America';
    if( $country == 'PH' ) $continent = 'Asia';
    if( $country == 'PN' ) $continent = 'Oceania';
    if( $country == 'PL' ) $continent = 'Europe';
    if( $country == 'PT' ) $continent = 'Europe';
    if( $country == 'PR' ) $continent = 'North America';
    if( $country == 'QA' ) $continent = 'Asia';
    if( $country == 'RE' ) $continent = 'Africa';
    if( $country == 'RO' ) $continent = 'Europe';
    if( $country == 'RU' ) $continent = 'Europe';
    if( $country == 'RW' ) $continent = 'Africa';
    if( $country == 'BL' ) $continent = 'North America';
    if( $country == 'SH' ) $continent = 'Africa';
    if( $country == 'KN' ) $continent = 'North America';
    if( $country == 'LC' ) $continent = 'North America';
    if( $country == 'MF' ) $continent = 'North America';
    if( $country == 'PM' ) $continent = 'North America';
    if( $country == 'VC' ) $continent = 'North America';
    if( $country == 'WS' ) $continent = 'Oceania';
    if( $country == 'SM' ) $continent = 'Europe';
    if( $country == 'ST' ) $continent = 'Africa';
    if( $country == 'SA' ) $continent = 'Asia';
    if( $country == 'SN' ) $continent = 'Africa';
    if( $country == 'RS' ) $continent = 'Europe';
    if( $country == 'SC' ) $continent = 'Africa';
    if( $country == 'SL' ) $continent = 'Africa';
    if( $country == 'SG' ) $continent = 'Asia';
    if( $country == 'SK' ) $continent = 'Europe';
    if( $country == 'SI' ) $continent = 'Europe';
    if( $country == 'SB' ) $continent = 'Oceania';
    if( $country == 'SO' ) $continent = 'Africa';
    if( $country == 'ZA' ) $continent = 'Africa';
    if( $country == 'GS' ) $continent = 'Antarctica';
    if( $country == 'ES' ) $continent = 'Europe';
    if( $country == 'LK' ) $continent = 'Asia';
    if( $country == 'SD' ) $continent = 'Africa';
    if( $country == 'SR' ) $continent = 'South America';
    if( $country == 'SJ' ) $continent = 'Europe';
    if( $country == 'SZ' ) $continent = 'Africa';
    if( $country == 'SE' ) $continent = 'Europe';
    if( $country == 'CH' ) $continent = 'Europe';
    if( $country == 'SY' ) $continent = 'Asia';
    if( $country == 'TW' ) $continent = 'Asia';
    if( $country == 'TJ' ) $continent = 'Asia';
    if( $country == 'TZ' ) $continent = 'Africa';
    if( $country == 'TH' ) $continent = 'Asia';
    if( $country == 'TL' ) $continent = 'Asia';
    if( $country == 'TG' ) $continent = 'Africa';
    if( $country == 'TK' ) $continent = 'Oceania';
    if( $country == 'TO' ) $continent = 'Oceania';
    if( $country == 'TT' ) $continent = 'North America';
    if( $country == 'TN' ) $continent = 'Africa';
    if( $country == 'TR' ) $continent = 'Asia';
    if( $country == 'TM' ) $continent = 'Asia';
    if( $country == 'TC' ) $continent = 'North America';
    if( $country == 'TV' ) $continent = 'Oceania';
    if( $country == 'UG' ) $continent = 'Africa';
    if( $country == 'UA' ) $continent = 'Europe';
    if( $country == 'AE' ) $continent = 'Asia';
    if( $country == 'GB' ) $continent = 'Europe';
    if( $country == 'US' ) $continent = 'North America';
    if( $country == 'UM' ) $continent = 'Oceania';
    if( $country == 'VI' ) $continent = 'North America';
    if( $country == 'UY' ) $continent = 'South America';
    if( $country == 'UZ' ) $continent = 'Asia';
    if( $country == 'VU' ) $continent = 'Oceania';
    if( $country == 'VE' ) $continent = 'South America';
    if( $country == 'VN' ) $continent = 'Asia';
    if( $country == 'WF' ) $continent = 'Oceania';
    if( $country == 'EH' ) $continent = 'Africa';
    if( $country == 'YE' ) $continent = 'Asia';
    if( $country == 'ZM' ) $continent = 'Africa';
    if( $country == 'ZW' ) $continent = 'Africa';
    return $continent;
    }		
 ?> 