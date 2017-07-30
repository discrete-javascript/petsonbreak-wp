<?php session_start();
/**
 Template Name: My Booking
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

<div class="content_right_section_booking booking-container">
	<div class="container">
	 <div class="row">
	 <div class="col-md-2">
	    <div class="left_section">
		<ul class="booking_se">
		<li class="bookings_icon" id="2"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php echo $mk_options['mybooking'];?></li>
        </ul>
		</div>
	 </div>
	 <div class="col-md-10">
     <?php
   
	  $Results =$wpdb->get_results("select * from twc_booking where login_id='".$userID."' and login_id!='' and hotelName!='' order by date_time DESC");
	  
	  if(count($Results) >0){ ?>
	 <div class="booking-title-container">
      <h5 class="recent_bookings"><?php echo $mk_options['Your_Recent_Bookings'];?></h5>
   
      <p>
	  <?php echo $mk_options['bookings_information'];?>
	  
      </p>
	  </div>
      <div class="table_background  booking-table-container">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_table">
		  <tr class="book-table-headings">
			<td><?php echo $mk_options['booking_id'];?></td>
			<td><?php echo $mk_options['hotel_name'];?></td>
			<td><?php echo $mk_options['checkin_date'];?></td>			
            <td><?php echo $mk_options['status'];?></td>
			<td><?php echo $mk_options['price'];?></td>
		  </tr>
		 <?php 		    
		 $total=0;
		 $booking_status='';
		 foreach($Results as $Result){    
			 $booking_status =trim($Result->booking_status);	
			 if($booking_status!='Failed'){
		          $response =json_decode($Result->response_xml,true);
				  $HotelRoomReservationResponse =$response['HotelRoomReservationResponse'];				  $reservationStatusCode =$HotelRoomReservationResponse['reservationStatusCode'];
				  $RateInfos =$HotelRoomReservationResponse['RateInfos'];				 			
				  if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){
				   $ChargeableRateInfo =$HotelRoomReservationResponse['RateInfos']['RateInfo']['ChargeableRateInfo'];
				   }else{
					$ChargeableRateInfo =$HotelRoomReservationResponse['RateInfo']['ChargeableRateInfo'];		
				 } 			
				 if($reservationStatusCode=='CF'){	
				 $total =$ChargeableRateInfo['@total'];	
				 }else{	
				 $total =$ChargeableRateInfo['@maxNightlyRate'];	
				 }			
				 $checkin =$HotelRoomReservationResponse['arrivalDate'];	
				 $checkout =$HotelRoomReservationResponse['departureDate'];		
				 $currency =$ChargeableRateInfo['@currencyCode'];		
				 }
				 else{		
				 $request_xml =simplexml_load_string($Result->request_xml);		
				 $request_json =json_encode($request_xml);		
				 $request_arr =json_decode($request_json,true);		
				 $checkin =$request_arr['arrivalDate'];		
				 $checkout =$request_arr['departureDate'];		
				 $total =$request_arr['chargeableRate'];		
				 $currency=$request_arr['currency_code'];			
				 }
		  echo '<tr>
				<td><a href="'.$siteUrl.'/#/confirmation/'.$Result->itineraryId.'">#'.$Result->itineraryId.'</a></td>
				<td><a href="'.$siteUrl.'/#/confirmation/'.$Result->itineraryId.'">'.$Result->hotelName.'</a></td>
				<td><a href="'.$siteUrl.'/#/confirmation/'.$Result->itineraryId.'">'.date('dS F Y', strtotime($checkin)).'</a></td>                
				<td><a href="'.$siteUrl.'/#/confirmation/'.$Result->itineraryId.'">'.$booking_status.'</a></td> 
				<td><a href="'.$siteUrl.'/#/confirmation/'.$Result->itineraryId.'">'.$currency.'&nbsp;'.$total.'</a></td>
			  </tr>';
		  } ?> 
		</table>
	</div>
	<?php } else { ?>
	 <div class="booking-title-container">
      <h5 class="recent_bookings"><?php echo $mk_options['No_Booking_Found'];?></h5>
   
      <p>
	  <?php echo $mk_options['bookings_information'];?>
	  
      </p>
	  </div>
  <div class="no_records">
   <div class="no-records-div">
     <img src="<?php echo get_template_directory_uri(); ?>/images/bada-briefcase.png" width="149" height="132" alt="Briefcase" />
	 <a href="<?php echo $siteUrl; ?>/#/home/?tab=hotel" class="starBook"><?php echo $mk_options['start_booking_now'];?></a>
   </div>
  

 </div>
 <?php } ?>
       <div class="clear"></div>

    </div>
	</div>
	</div>
	</div>
<?php get_footer(); ?>	