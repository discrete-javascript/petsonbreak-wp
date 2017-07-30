<?php 
session_start();
include('../../../../wp-load.php');
global $wpdb;
global $mk_options;

$cid = trim($mk_options['ean_cid']);
$apiKey = trim($mk_options['ean_api']);
$secret = trim($mk_options['secret_key']);
$minorRev = trim($mk_options['minorRev']);
$ModeType = $mk_options['booking_mode'];
$bookin_email =$mk_options['bookin_email'];
$booking_mail_type =$mk_options['booking_mail_type'];

$user_id =$_REQUEST['UserId'];
$SiteUrl =$_REQUEST['SiteUrl'];

if($_POST["Make_Booking"]){ 
   $currency =$_REQUEST['currency'];

    $hotelName =$_REQUEST['hotelName'];
	$roomName =$_REQUEST['roomName'];	
	
	$hotelId =$_REQUEST['hotelId'];
	$type_UI =$_REQUEST["type_UI"];
	$arrivalDate = $_REQUEST['arrivaldate'];
	$departureDate = $_REQUEST['departureDate'];
	$supplierType =$_REQUEST['supplierType'];
	$roomTypeCode =$_REQUEST['roomTypeCode'];
	$rateCode =$_REQUEST['rateCode'];
	$chargeableRate =$_REQUEST['chargeableRate'];
	$hotelRating =$_REQUEST['hotelRating'];
	$bedTypeId =$_REQUEST['bedTypeId'];
	$smokingPreference =$_REQUEST['smokingPreference'];
	//$adults =$_REQUEST["adults"];
	$firstName =$_REQUEST['firstName_0'];
	$lastName = $_REQUEST['lastName_0'];
	$email_id = $_REQUEST['email_id'];
	$homePhone =$_REQUEST['homePhone'];
	$workPhone =$_REQUEST['workPhone'];
	$creditCardFirstName =$_REQUEST['creditCardFirstName'];
	$creditCardLastName =$_REQUEST['creditCardLastName'];
	$creditCardType =$_REQUEST['creditCardType'];
	$creditCardNumber =$_REQUEST['creditCardNumber'];
	$creditCardIdentifier =$_REQUEST['creditCardIdentifier'];
	$creditCardExpirationMonth =$_REQUEST['creditCardExpirationMonth'];
	$creditCardExpirationYear =$_REQUEST['creditCardExpirationYear'];
	$address1 =$_REQUEST['address1'];
	$city =$_REQUEST['city'];
	$stateProvinceCode =$_REQUEST['stateProvinceCode'];
    $countryCode =$_REQUEST['countryCode'];
	$postalCode =$_REQUEST['postalCode'];
	$rateKey =$_REQUEST['rateKey'];
	$roomTypeCode =$_REQUEST['roomTypeCode'];
	$hotel_img =$_REQUEST['hotel_img'];
	
	 $customerSessionId =$_REQUEST['customerSessionId'];
	
	
	if($_REQUEST['itineraryId']!=''){
	 $itineraryUrl = '&itineraryId='.$_REQUEST['itineraryId'];
	}else{
	 $itineraryUrl='';
	}
	if($_SESSION['affiliateConfirmationId']==''){
		$_SESSION['affiliateConfirmationId'] = uniqid().'-'.$_REQUEST['itineraryId'];
	}
  
    //$secret = '36f2v6k7v737i';
	$timestamp = gmdate('U');
	$sig = md5($apiKey . $secret . $timestamp);	
	
  if($ModeType=='Live'){
	 $URL ='https://book.api.ean.com/ean-services/rs/hotel/v3/res?sig='.$sig.'&cid='.$cid.'&minorRev='.$minorRev.'&apiKey='.$apiKey.'&locale='.$_SESSION['Cri_language'].'&currencyCode='.$_SESSION['Cri_currency'].'&customerIpAddress='.$_SERVER["REMOTE_ADDR"].'&customerSessionId='.$customerSessionId.'&customerUserAgent=Mozilla/5.0&affiliateConfirmationId='.$_SESSION["affiliateConfirmationId"];
	}else{
     $URL ='https://book.api.ean.com/ean-services/rs/hotel/v3/res?sig='.$sig.'&cid='.$cid.'&minorRev='.$minorRev.'&apiKey='.$apiKey.'&locale='.$_SESSION['Cri_language'].'&currencyCode='.$_SESSION['Cri_currency'].'&customerIpAddress='.$_SERVER["REMOTE_ADDR"].'&customerSessionId='.$customerSessionId.'&customerUserAgent=Mozilla/5.0&affiliateConfirmationId='.$_SESSION["affiliateConfirmationId"];
	} 

     if($booking_mail_type=='custom_mail'){	
	    $sendReservationEmail ='<sendReservationEmail>false</sendReservationEmail>';
	 }else{
		 $sendReservationEmail ='';
	 }
	
	
	$db_xmldata='';
	$xmldata ='<HotelRoomReservationRequest><currencyCode>'.$currency.'</currencyCode><hotelId>'.$hotelId.'</hotelId><arrivalDate>'.$arrivalDate.'</arrivalDate><departureDate>'.$departureDate.'</departureDate><supplierType>'.$supplierType.'</supplierType><rateKey>'.$rateKey.'</rateKey><roomTypeCode>'.$roomTypeCode.'</roomTypeCode><rateCode>'.$rateCode.'</rateCode><chargeableRate>'.$chargeableRate.'</chargeableRate>'.$sendReservationEmail.'<RoomGroup>';

  if($_REQUEST['noofRooms']>0){
	for($i=0;$i<$_REQUEST['noofRooms'];$i++){
		$adults =$_SESSION['Cri_Pacs']['adults'][$i];
		$childs =$_SESSION['Cri_Pacs']['childs'][$i];
		$childAge_arr =$$_SESSION['Cri_Pacs']['childs'][$i];
	    $xmldata.='<Room><numberOfAdults>'.$adults.'</numberOfAdults>';
		if($childs>0){
			$childAge =implode(",",$childAge_arr);
			$xmldata.='<numberOfChildren>'.$childs.'</numberOfChildren>';
			$xmldata.='<childAges>'.$childAge.'</childAges>';
		}
	  $xmldata.='<firstName>'.$_REQUEST['firstName_'.$i.''].'</firstName><lastName>'.$_REQUEST['lastName_'.$i.''].'</lastName><bedTypeId>'.$bedTypeId.'</bedTypeId><smokingPreference>NS</smokingPreference></Room>';
	   }
	}
	$db_xmldata =$xmldata;
$xmldata.='</RoomGroup><ReservationInfo><email>'.$email_id.'</email><firstName>'.$creditCardFirstName.'</firstName><lastName>'.$creditCardLastName.'</lastName><homePhone>'.$homePhone.'</homePhone><workPhone>'.$workPhone.'</workPhone><creditCardType>'.$creditCardType.'</creditCardType><creditCardNumber>'.$creditCardNumber.'</creditCardNumber><creditCardIdentifier>'.$creditCardIdentifier.'</creditCardIdentifier><creditCardExpirationMonth>'.$creditCardExpirationMonth.'</creditCardExpirationMonth><creditCardExpirationYear>'.$creditCardExpirationYear.'</creditCardExpirationYear></ReservationInfo><AddressInfo><address1>'.$address1.'</address1><city>'.$city.'</city><stateProvinceCode>'.$stateProvinceCode.'</stateProvinceCode><countryCode>'.$countryCode.'</countryCode><postalCode>'.$postalCode.'</postalCode></AddressInfo></HotelRoomReservationRequest>';

$db_xmldata.='</RoomGroup><ReservationInfo><email>'.$email_id.'</email><firstName>'.$creditCardFirstName.'</firstName><lastName>'.$creditCardLastName.'</lastName><homePhone>'.$homePhone.'</homePhone><workPhone>'.$workPhone.'</workPhone><creditCardType>XXXX</creditCardType><creditCardNumber>XXXX</creditCardNumber><creditCardIdentifier>XXXX</creditCardIdentifier><creditCardExpirationMonth>XXXX</creditCardExpirationMonth><creditCardExpirationYear>XXXX</creditCardExpirationYear></ReservationInfo><AddressInfo><address1>'.$address1.'</address1><city>'.$city.'</city><stateProvinceCode>'.$stateProvinceCode.'</stateProvinceCode><countryCode>'.$countryCode.'</countryCode><postalCode>'.$postalCode.'</postalCode></AddressInfo></HotelRoomReservationRequest>';

//echo $xmldata; die;

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $URL);
	   curl_setopt ( $ch, CURLOPT_HEADER, 0 );
       curl_setopt ( $ch, CURLOPT_POST, 1 );
       curl_setopt($ch, CURLOPT_POSTFIELDS,"xml=" . $xmldata);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
       $result = curl_exec($ch);
		//echo $URL.'&xml='.$xmldata;
       // echo $result; die;
		curl_close($ch);
		$result_json = json_decode($result,true);
	     // echo "<pre>";
	       //  print_r($result_json); die;
		$HotelRoomReservationResponse =$result_json['HotelRoomReservationResponse'];
	
		if(isset($HotelRoomReservationResponse['EanWsError'])){
		    $EanWsError =$HotelRoomReservationResponse['EanWsError'];
			$itineraryId =$EanWsError['itineraryId'];
			$confirmationNumbers ='N/A';
			$hotelName =$hotelName;
			$booking_status ='Failed';
		}
		else{
			$itineraryId =$HotelRoomReservationResponse['itineraryId'];
			$confirmationNumbers =$HotelRoomReservationResponse['confirmationNumbers'];
			$hotelName =$HotelRoomReservationResponse['hotelName'];
			$hotelAddress =$HotelRoomReservationResponse['hotelAddress'];
			$hotelCity =$HotelRoomReservationResponse['hotelCity'];
			$hotelCountryCode =$HotelRoomReservationResponse['hotelCountryCode'];
			$checkInInstructions =$HotelRoomReservationResponse['checkInInstructions'];
			if($checkInInstructions==''){
			 $checkInInstructions =$_REQUEST['H_checkInInstructions'];
			}
			$_SESSION["affiliateConfirmationId"] = "";
			$booking_status ='Confirmed';
		}
		
		$user_name =$firstName.' '.$lastName;
	
		
		
		$SQL ="insert into twc_booking SET itineraryId='".$itineraryId."',confirmationNumbers='".$confirmationNumbers."',booking_status='".$booking_status."',hotel_img='".$hotel_img."',hotel_id='".$hotelId."',hotelName='".addslashes($hotelName)."',hotelRating='".$hotelRating."',hotelAddress='".addslashes($hotelAddress)."',hotelCity='".$hotelCity."',hotelCountryCode='".$hotelCountryCode."',user_name='".$user_name."',user_email='".$email_id."',user_contactno='".$homePhone."',login_id='".$user_id."',fb_email='".$_SESSION['fb_email']."',left_html='".addslashes($_POST['LeftHtml'])."',request_xml='".addslashes($db_xmldata)."',response_xml='".addslashes($result)."',date_time='".date('Y-m-d H:i:s')."', checkInInstructions='".addslashes($checkInInstructions)."', check_in='".date('Y-m-d',strtotime($arrivalDate))."',check_out='".date('Y-m-d',strtotime($departureDate))."',chargable_rate='".$chargeableRate."',currency_code='".$currency."'";
		
		$wpdb->query($SQL);

	
		echo '<script language="javascript">window.location.href="'.$SiteUrl.'/#/confirmation/'.$itineraryId.'"</script>';
		
		
	}

?>

