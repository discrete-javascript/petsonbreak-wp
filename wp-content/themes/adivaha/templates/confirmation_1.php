<?php
mysql_connect('localhost','twcfivco_twc','Noton_Da_123') or die('Connection Error');
mysql_select_db('twcfivco_tp') or ('DB Error');

 $itinerary_id = $_REQUEST['itineraryId']; 
 $SQL ="select * from twc_booking where itineraryId='".$itinerary_id."' and hotelName!=''";
$query = mysql_query($SQL);
$result =mysql_fetch_object($query);


$booking_results =json_decode($result->response_xml,true);

$HotelRoomReservationResponse =$booking_results['HotelRoomReservationResponse'];
$reservationStatusCode =$HotelRoomReservationResponse['reservationStatusCode'];
$user_email =$result->user_email;
$numberOfRoomsBooked =$HotelRoomReservationResponse['numberOfRoomsBooked'];

$booking_status =$result->booking_status;

$arrivalDate =$result->check_in;
$departureDate =$result->check_out;
$hotelName =$result->hotelName;
$hotelAddress =$result->hotelAddress;
$hotelCity =$result->hotelCity;
$hotelCountryCode =$result->hotelCountryCode;
//print_r($HotelRoomReservationResponse); die;
/*
$arrivalDate =$HotelRoomReservationResponse['arrivalDate'];
$departureDate =$HotelRoomReservationResponse['departureDate'];
$hotelName =$HotelRoomReservationResponse['hotelName'];
$hotelAddress =$HotelRoomReservationResponse['hotelAddress'];
$hotelCity =$HotelRoomReservationResponse['hotelCity'];
$hotelCountryCode =$HotelRoomReservationResponse['hotelCountryCode'];
*/
$specialCheckInInstructions =$HotelRoomReservationResponse['specialCheckInInstructions'];
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
foreach($Room_arr as $Room){
$total_adults =$total_adults+$Room['numberOfAdults'];
$total_childs =$total_childs+$Room['numberOfChildren'];
}

$childAges_str='';
for($i=0;$i<$numberOfRoomsBooked;$i++){
   $childAges =$Room_arr[$i]['childAges'];
   if(count($childAges)>0){
   $childAges_str.= implode(",",$childAges);
   }
}




if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){

$ChargeableRateInfo =$HotelRoomReservationResponse['RateInfos']['RateInfo']['ChargeableRateInfo'];
$nonRefundable =$HotelRoomReservationResponse['RateInfos']['RateInfo']['nonRefundable'];
}else{
$ChargeableRateInfo =$HotelRoomReservationResponse['RateInfo']['ChargeableRateInfo'];
$nonRefundable =$HotelRoomReservationResponse['nonRefundable'];
}$HotelFees =$HotelRoomReservationResponse["RateInfos"]["RateInfo"]["HotelFees"];
$HotelFees_size =$HotelFees['@size'];
if($HotelFees_size >1){ $HotelFees_arr =$HotelFees['HotelFee'];}
else{  $HotelFees_arr[] =$HotelFees['HotelFee'];	}//print_r($HotelFees_arr);		
$Surcharges_arr =$ChargeableRateInfo['Surcharges'];
$surcharge_size =$Surcharges_arr['@size'];
if($surcharge_size >1){
  $Surcharg_arr =$Surcharges_arr['Surcharge'];
}else{
   $Surcharg_arr[0] =$Surcharges_arr['Surcharge'];
}

$bcurrency =$ChargeableRateInfo['@currencyCode'];
$currency =$currency_symble[$bcurrency];
if($reservationStatusCode=='ER'){$averageBaseRate = $ChargeableRateInfo["@maxNightlyRate"];$averageRate = $ChargeableRateInfo["@maxNightlyRate"];$total = $ChargeableRateInfo["@maxNightlyRate"];$nightlyRateTotal = $ChargeableRateInfo["@maxNightlyRate"];$surchargeTotal=0;}else{
$averageBaseRate = $ChargeableRateInfo["@averageBaseRate"];
$averageRate = $ChargeableRateInfo["@averageRate"];
$total = $ChargeableRateInfo["@total"];
$nightlyRateTotal = $ChargeableRateInfo["@nightlyRateTotal"];
$surchargeTotal = $ChargeableRateInfo["@surchargeTotal"];}

$no_of_nights = floor(strtotime($departureDate)-strtotime($arrivalDate))/(60*60*24);

	
?>



<!-- <link rel="stylesheet" href="<?php// echo get_template_directory_uri(); ?>/hotel-api-css/style.css" />
<script src="<?php //echo get_template_directory_uri(); ?>/js/hotels/jquery.js"></script>
<script src="<?php// echo get_template_directory_uri(); ?>/js/hotels/jquery-ui.js"></script>
<script src="<?php //echo get_template_directory_uri(); ?>/js/hotels/core.js"></script>

<link rel="stylesheet" href="http://www.adivaha.com/demo/travel-theme/wp-content/themes/adivaha/hotel-api-css/main.css" />
<link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/css/cal-pop.css" />
<script src="<?php //echo get_template_directory_uri(); ?>/sliderengine/amazingslider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php// echo get_template_directory_uri(); ?>/sliderengine/amazingslider-1.css">
<script src="<?php// echo get_template_directory_uri(); ?>/sliderengine/initslider-1.js"></script>

<link href="<?php// echo get_template_directory_uri(); ?>/css/mk.css" rel="stylesheet">
-->

  <div class="fw shaded">
  <div class="max-1000">
    <div class="inf"><?php echo $mk_options['Online_Booking_officialID'];?></div>
  </div>
  <div class="clear padding_10_0_top"></div>
</div>
<div class="fw shaded">

<div class="max-1000">
  <div id="sticky_navigation_wrapper">
    <div id="sticky_navigation">
      <div class="demo_container">
      <div class="booking_left sb1">
          <h3 style="margin-top: -8px;" class="opensans dark"><?php echo $mk_options['Online_Booking_Summary'];?></h3>
           <p class="booking_img_left"></p>
		   <div style="background:url(<?php echo $hotel_img;?>) center no-repeat;" class="thumb_booking_div"></div>
		    <strong style="margin-top:10px; display: block;"><?php echo $hotelName;?></strong>&nbsp;<span class="rating-static rating-<?php echo ($hotelRating*10);?>"></span><br>
		    <span class="similar_address"><?php echo $hotelAddress;?>, <?php echo $hotelCity;?>, <?php echo $hotelCountryCode;?></span><p></p>

        	
              <div class="clear"></div>
		  <ul class="ulcls">
		    <li><?php echo $mk_options['Online_Booking_Checkin'];?> <?php echo date('M d Y',strtotime($arrivalDate));?></li>
            <li><?php echo $mk_options['Online_Booking_Checkout'];?> <?php echo date('M d Y',strtotime($departureDate));?> </li>
		  </ul>
          <hr>
		  <ul class="ulclspax">
		    <li><?php echo $mk_options['Online_Booking_Rooms'];?> <?php echo $numberOfRoomsBooked;?></li>
            <li><?php echo $mk_options['Online_Booking_Adults'];?> <?php echo $total_adults;?></li>
			<li><?php echo $mk_options['Online_Booking_Childs'];?> <?php echo $total_childs;?>
			    <?php if($childAges_str!=''){ echo '<span>('.$childAges_str.')</span>';}	?>  
			</li>
		  </ul>
		  <div class="clear"></div>
		  <?php if($booking_status!='Failed'){?>
		  <hr>
		  <strong style="margin-top:10px; display: block; margin-bottom: 10px;"><?php echo $mk_options['Online_Booking_pricing'];?></strong>
          <ul class="pri" style="font-weight:normal; font-size:12px;">
		   <?php if($nonRefundable==1){?>
				     <li><b><?php echo $mk_options['Online_Booking_NonRefundable'];?></b></li>
				<?php }?>
		   <?php for($i=0;$i<$numberOfRoomsBooked;$i++){ ?>
			  <li><span class="total_left"><?php echo $mk_options['Online_Booking_Room'];?><?php echo ($i+1); ?>:</span> <span class="total_right"><?php echo number_format($averageRate, 2)*$no_of_nights; ?></span></li>
			<?php }?>
			 <li> <span class="total_left"><?php echo $mk_options['Online_Booking_Total'];?> </span> <span class="total_right"><?php echo number_format($nightlyRateTotal, 2); ?></span></li>
			
          </ul>   
		   <div class="clear"></div>
		 
          <div style="padding-top:10px!important; margin-top:10px!important; color:#666666; font-weight:normal; border-top:1px dotted;">
		  <ul class="ulcls">
		  <?php 
			 foreach($Surcharg_arr as $Surcharg){
			  $checkEurope =country_to_continent( $hotelCountryCode );	
			
              if($Surcharg['@type']=='TaxAndServiceFee'){			  
				  if($checkEurope=='Europe'){
				   echo '<li><span class="total_left">'.$mk_options['Online_Booking_TaxRecovery'].'</span><span class="total_right">'.$Surcharg['@amount'].'</span></li>';
				  }
				  else{
				   echo '<li><span class="total_left">'.$mk_options['Online_Booking_ServiceFees'].'</span><span class="total_right">'.$Surcharg['@amount'].'</span></li>';
				  }
			   }
			   else{
			    echo '<li><span class="total_left">'.$Surcharg['@type'].'</span><span class="total_right">'.$Surcharg['@amount'].'</span></li>';
				}
              } 
			 ?>
		  </ul>
		  </div>
		   <?php }?>
         	
		 <div class="clear"></div>		 
		 <?php 
		 if($HotelFees_arr[0]['@amount']>0){?> 		 
		 <div style="padding-top:10px!important; margin-top:10px!important; color:#666666; font-weight:normal; border-top:1px dotted;">
		    <!--<div><b><?php echo $mk_options['Online_Booking_Mandatory_Free'];?></b></div>-->
			  <ul class="ulcls">
			  <?php for($r=0;$r<count($HotelFees_arr);$r++){
				  echo '<li><span style="font-weight:bold">'.$HotelFees_arr[$r]['@description'].': </span>'.$HotelFees_arr[$r]['@amount'].'&nbsp; &nbsp;'.$HotelFees_arr[$r]['HotelFeeBreakdown']['@unit'].' / '.$HotelFees_arr[$r]['HotelFeeBreakdown']['@frequency'].'</li>';
			    }
				?>  
			 </ul>
		 </div> 
         <?php } ?>	  
		 
		<?php if($booking_status!='Failed'){?>
		 
         <div class="clear"></div>		 
          <div style="margin-top:20px;" class="final_total">
		   <?php if($currency=='Rp'){?>
		    <span class="total_left2" style="width:190px"><?php echo $mk_options['Hotel_Information_Total_Charges'];?><br><span class="inclCls"><?php echo $mk_options['Online_Booking_including'];?></span></span>
			<span class="total_right2" style="width:110px; font-size:14px"><?php echo $currency;?>&nbsp;<?php echo number_format($total, 2); ?></span>
			<?php } else{?>
			<span class="total_left2"><?php echo $mk_options['Hotel_Information_Total_Charges'];?> <br><span class="inclCls"><?php echo $mk_options['Online_Booking_including'];?></span></span>
			<span class="total_right2"><?php echo $currency;?>&nbsp;<?php echo number_format($total, 2); ?></span>
			<?php }?>
			<div class="clear"></div>
			
		  <div style="padding-top:10px;color:#666666; font-weight:normal"><?php echo $mk_options['Online_Booking_We_have_charged'];?></div>	
		 </div>
          <div class="clear"></div>
          <div class="bestadvice"><strong><?php echo $mk_options['pbanner_contact_no'];?></strong> <?php echo $mk_options['expert_advice'];?></div>
		<?php }?>
		  
      </div>
    </div>
    <!-- LIST CONTENT-->
    <div class="rightcontent sb1" style="min-height: 525px;">
      <div class="itemscontainer offset-1">
        <!-- hotel details -->
        <div class="itemscontainer offset-1">
        <!-- hotel details -->
	 <?php if(count($results) >0) {?>	
        <form name="booking_frm" id="booking_frm">
        <div class="hotel_booking">
          <div class="step1">
            <h1 class="toprounded6 incheight"><?php echo $mk_options['confirmation_thanks_booking'];?></h1>
            <div class="bookcls">
              <?php if(isset($HotelRoomReservationResponse['EanWsError'])){
			       $EanWsError =$HotelRoomReservationResponse['EanWsError'];
			   ?>
              <p><?php echo $mk_options['confirmation_Itinerary_No'];?><?php echo $itinerary_id;?></p>
              <p><?php echo $mk_options['confirmation_CustomerSessionId'];?> <?php echo $HotelRoomReservationResponse['customerSessionId'];?></p>
              <p><?php echo $mk_options['Online_Booking_CheckInInstructions'];?><?php echo $checkInInstructions;?></p>
              <p><?php echo $mk_options['confirmation_Message'];?> <?php echo $EanWsError['presentationMessage'];?></p>
              <?php }
			  else{ //success?>
              <div class="ca1n"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/tick.png" align="left" style="margin-right:10px;" /><?php echo $mk_options['confirmation_Assoonas_your_booking'];?> <strong><?php echo $glob_setting['contact_number']; ?></strong><?php echo $mk_options['confirmation_for_assistance'];?></div>
              <h1 class="toprounded6 incheight"><?php echo $mk_options['confirmation_Booking_Details'];?></h1>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background:#CCC">
    
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="my_t">
                <tr>
                <td valign="top" style="width:200px;"><?php echo $mk_options['confirmation_Itinerary_No'];?></td>
                <td valign="top"><?php echo $itinerary_id;?></td>
                </tr>
                <tr>
                <td valign="top"><?php echo $mk_options['confirmation_Reference_Number'];?></td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['confirmationNumbers'];?></td>
                </tr>
                
                <tr>
                <td valign="top"><?php echo $mk_options['confirmation_Reservation_Status_Code'];?></td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['reservationStatusCode'];?></td>
                </tr>
                <tr>
                <td valign="top"><?php echo $mk_options['confirmation_Number_Of_Rooms_Booked'];?></td>
                <td valign="top"><?php echo $HotelRoomReservationResponse['numberOfRoomsBooked'];?></td>
                </tr>
                <tr>
                <td valign="top"><?php echo $mk_options['confirmation_Customer_Details'];?></td>
                <td valign="top"><?php 
			  // print_r($Room_arr);
			  echo '<div>';	
			     $i=1;
				foreach($Room_arr as $Room){
					$Room_arr = $RoomGroup['Room'];
					echo '<p style="font-weight:bold;">Room-'.$i.'</p>';
					echo '<p>Name: '.$Room['firstName'].'&nbsp;'.$Room['lastName'].'</p>';
					echo '<p>'.$mk_options['Online_Booking_Adults'].' '.$Room['numberOfAdults'].', '.$mk_options['Online_Booking_Childs'].' '.$Room['numberOfChildren'].'</p>';
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

              <a href="https://www.travelnow.com/selfService/<?php echo $mk_options['ean_cid'];?>/searchByIdAndEmail?itineraryId=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn travel_now_confirmation" target="_blank" style="float:left;"><?php echo $mk_options['confirmation_Verify_Confirmation'];?></a>
			   <iframe src="https://www.travelnow.com/selfService/<?php echo $mk_options['ean_cid'];?>/searchByIdAndEmail?itineraryId=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" style="display:none"></iframe> 
			  
             
              <a href="https://www.travelnow.com/selfService/<?php echo $mk_options['ean_cid'];?>/showCancelItinerary?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn travel_now_cancel" target="_blank"  style="float:left; margin-left:5px;"><?php echo $mk_options['confirmation_Cancel_Booking'];?></a>
              
              <a href="https://www.travelnow.com/selfService/<?php echo $mk_options['ean_cid'];?>/emailItineraryToOthers?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn" target="_blank"  style="float:left; margin-left:5px;"><?php echo $mk_options['confirmation_Email_Reservation'];?></a>
             
              <a href="https://www.travelnow.com/selfService/<?php echo $mk_options['ean_cid'];?>/showItineraryPrintView?itinerary=<?php echo $itinerary_id;?>&email=<?php echo $user_email; ?>" class="greenbtn" target="_blank"  style="float:left; margin-left:5px;"><?php echo $mk_options['confirmation_Print_Receipt'];?></a>

<div class="clear">&nbsp;</div>

<?php if($checkInInstructions!=""){ ?>
<div class="can">
                <p style="font-weight:bold;"><?php echo $mk_options['Hotel_Information_CheckIn_Instructions'];?> </p>
                <p><?php echo $checkInInstructions;?></p>
              </div>
<?php } if($specialCheckInInstructions!=''){?>
<div class="can">
	<p style="font-weight:bold;">SpecialCheckInInstructions</p>
	<p><?php echo $specialCheckInInstructions;?></p>
  </div>
<?php }?>
              <div class="can">
                <p style="font-weight:bold;"><?php echo $mk_options['Hotel_Information_cancellationPolicy'];?></p>
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
			  <div class="bookdiv_h1"><?php echo $mk_options['confirmation_PAYMENT_IN_FULL'];?></div>
              <?php }?>
            </div>
          </div>
        </div>
      </form>
	 <?php }
	   else{ ?>
	   <div class="hotel_booking"><?php echo $mk_options['confirmation_itinerary_not_matched'];?></div>
	   <?php }?>
        <!-- End hotel details -->
      </div>
        <!-- End hotel details -->
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear padding_5_0"></div>
  <div class="clear"></div>
</div></div></div>
<?php //include(TEMPLATEPATH."/includes/footer-shaded.php"); ?>
<?php get_footer();?>
<style>
.h1-other h1 {margin-top: 23px;margin-bottom: 30px;}
 .travel_now_confirmation { background:#09F; border-bottom:5px solid #06C; color:#FFF; display: none;}
.travel_now_confirmation:hover { color:#FFF; background:#09C; }
.travel_now_cancel { background:#d21313; border-bottom:5px solid #a80909; color:#FFF; }
.travel_now_cancel:hover { color:#FFF; background:#ca0b0b; }
.inclCls{ font-size:12px; color:#000}
.ulcls li{background:none!important; list-style:none; padding:5px !important}
.ulclspax li{background:none!important; list-style:none; padding:5px !important; float:left; width:30%}
.horizontal-menu li a {border: medium none !important;color: #656565 !important;
    padding: 30px 9px !important;text-shadow: none !important;text-transform: uppercase !important;}
hr{margin-top:0px !important;margin-bottom:0px !important;}
</style>


