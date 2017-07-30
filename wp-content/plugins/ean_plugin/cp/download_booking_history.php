<?php ob_clean();
$csv ="ItineraryId,Hotel Name,Roomtype,Booking Status,Checkin,Checkout,Customer Name,Email,Contact No"."\n";

$results =$wpdb->get_results("select * from twc_booking order by date_time DESC");
$i=0;
$file_Counter = 1;
foreach($results as $result)
{
$itinerary_id = $result->itineraryId;
$booking_results =json_decode($result->response_xml,true);
$HotelRoomReservationResponse =$booking_results['HotelRoomReservationResponse'];
$numberOfRoomsBooked =$HotelRoomReservationResponse['numberOfRoomsBooked'];
$arrivalDate =$HotelRoomReservationResponse['arrivalDate'];
$departureDate =$HotelRoomReservationResponse['departureDate'];

if (@array_key_exists("RateInfos",$HotelRoomReservationResponse)){
 $Rooms =$HotelRoomReservationResponse['RateInfos']['RateInfo']['RoomGroup']['Room'];
}else{
 $Rooms =$HotelRoomReservationResponse['RoomGroup']['Room'];
}

$Room_arr ='';
if (@array_key_exists("0",$Rooms)){
 $Room_arr =$Rooms;
}else{
 $Room_arr[] =$Rooms;
}

$bedTypeDescription =$Room_arr[0]['bedTypeDescription'];
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

$csv.=$itinerary_id.','.$result->hotelName.','.$bedTypeDescription.','.$result->booking_status.','.$arrivalDate.','.$departureDate.','.$result->user_name.','.$result->user_email.','.$result->user_contactno."\n";
 
$i++;
}

$filename =date('Ymdhi');
//OUPUT HEADERS
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$filename.csv\";" );
header("Content-Transfer-Encoding: binary"); 

//OUTPUT CSV CONTENT
echo($csv);
exit();
?>

