<?php 
ini_set('max_execution_time', 600);
/*
ini_set('display_errors', false);
error_reporting(0);
session_start();
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/xml; charset=utf-8");
*/

include('../../../../wp-load.php');
global $wpdb;
global $mk_options;

/*=== Global Variables ===*/
$adivaha_key =$mk_options['adivaha_key'];
//$default_currency = $mk_options['default_currency'];
//$default_language = $mk_options['default_language'];
$ModeType = $mk_options['booking_mode'];

$cid = trim($mk_options['ean_cid']);
$apiKey = trim($mk_options['ean_api']);
$secret = trim($mk_options['secret_key']);
$minorRev = trim($mk_options['minorRev']);

$actionUrl = $mk_options['ean_url'];



$timestamp = gmdate('U');
$sig = md5($apiKey . $secret . $timestamp);

$limit =18;
$offset=0;

$customerIP =$_SERVER['REMOTE_ADDR'];

//Request Values
$lat = $_REQUEST['lat'];
$lon = $_REQUEST['lon'];
$desti_lat_lon =$_REQUEST['lat'].'-'.$_REQUEST['lon'];
$search_Session_Id = $_REQUEST['search_Session_Id'];
$checkIn = $_REQUEST['checkIn'];
$checkOut = $_REQUEST['checkOut'];
$Cri_Adults = $_REQUEST['Cri_Adults'];

if($_REQUEST['Cri_currency']!=''){
  $_SESSION['Cri_currency']=$_REQUEST['Cri_currency'];
}else{
  $_SESSION['Cri_currency']=$default_currency;	
}   

if($_REQUEST['Cri_language']!=''){
 $_SESSION['Cri_language'] = $_REQUEST['Cri_language'];
}


$orderby_val = $_REQUEST['orderby_val'];

if($orderby_val == "true"){
	$orderby_val = "asc";
}else{
	$orderby_val = "desc";
}
$adults = 2;


//=== Session ===//

if($_REQUEST["action"]=="findSearchKey"){
	$_SESSION['checkIn']=$_REQUEST['checkIn'];
	$_SESSION['checkOut']=$_REQUEST['checkOut'];
	$_SESSION['no_of_rooms']=$_REQUEST['rooms'];
	
	$adults =explode(",",$_REQUEST['adults']);
	$childs =explode(",",$_REQUEST['childs']);
	$childAge =explode(",",$_REQUEST['childAge']);
	//$childAge =explode(",",$_REQUEST['childAge']);
	$childAge_data =$childAge;
	$childAge =array();
	for($i=0;$i<$_REQUEST['rooms'];$i++){
		$childCont =$childs[$i];
		if($childCont>0){
			for($c=0;$c<$childCont;$c++){
			 $childAge[$i][] =$childAge_data[$i];	
			}
		}
	}
	$_SESSION['Cri_Pacs'] = array('adults'=>$adults,
								 'childs'=>$childs,
								 'childAge'=>$childAge
								 );
}
//=== End Session ===//							 

$Param = "adivaha_key=".$adivaha_key."&cid=".$cid."&apiKey=".$apiKey."&secret=".$secret."&minorRev=".$minorRev."&Cri_language=".$_SESSION['Cri_language']."&Cri_currency=".$_SESSION['Cri_currency'].'&ModeType='.$ModeType; 


if($_REQUEST["action"]=="findSearchKey"){
	$num = 0;
	
	$checkIn_db =date('Y-m-d',strtotime($_REQUEST['checkIn']));
	$checkOut_db =date('Y-m-d',strtotime($_REQUEST['checkOut']));
	
	$moreQuery =" and currency='".$_SESSION['Cri_currency']."' and language='".$_SESSION['Cri_language']."' and LowRate>0";
	
	if(($_REQUEST['hotelType']!='') && ($_REQUEST['hotelType']!=1) ){
		$moreQuery.=' and propertyCategory='.$_REQUEST['hotelType'];
	}
	
	$results = $wpdb->get_results("select search_session, count(*) as total_hotel from search_results_ean where desti_lat_lon='".$desti_lat_lon."' ".$moreQuery." limit 0, 1");
	
	$checkObj =$results[0];
	$search_Session_Id = $checkObj->search_session;
	
	if($checkObj->total_hotel > 0){
	 
	$sql ="SELECT count(EANHotelID) as totalrecords, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(4.5,5) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars5, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(3.5,4) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars4, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(2.5,3) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars3, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(1.5,2) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars2, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(1) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars1, 
	(select count(EANHotelID) from search_results_ean where hotelRating IN(0) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars0,
	(select count(EANHotelID) from search_results_ean where proximityDistance<=2 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance2,
  (select count(EANHotelID) from search_results_ean where  proximityDistance<=5 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance5,
  (select count(EANHotelID) from search_results_ean where proximityDistance<=10 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance10,
  (select count(EANHotelID) from search_results_ean where proximityDistance<=20 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance20,
  (select count(EANHotelID) from search_results_ean where proximityDistance<=50 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance50,
	
	(select min(lowrate) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.") as minrate , 
	(select max(lowrate) as maxrate from search_results_ean where search_session='".$search_Session_Id."'  ".$moreQuery.") as maxrate,
	(select MIN(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.") as minguest,
	(select MAX(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.") as maxguest FROM search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery." ";
  
	$results = $wpdb->get_results($sql); 
	$obj =$results[0];
	
	$Sqls = "select EANHotelID,Name,hotelRating,confidenceRating,address1,lowRate,highRate,discount_price,latitude,longitude, thumbNailUrl, tripAdvisorRatingUrl from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery." limit 0,15"; 
	 
    $rresults = $wpdb->get_results($Sqls);
	foreach( $rresults as $Objs ){
		$data[] =array('hotelId'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes($Objs->thumbNailUrl),'hotelRating'=>stripslashes($Objs->hotelRating),'popularity'=>stripslashes($Objs->confidenceRating),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl),'address1'=>stripslashes($Objs->address1), 'lowRate'=>'-1','highRate'=>'','discount_price'=>'...');
	}
	
	$arr =array('search_session'=>$search_Session_Id,'exist'=>'Yes', 'totalrecords'=>$obj->totalrecords,'stars5'=>$obj->stars5,'stars4'=>$obj->stars4,'stars3'=>$obj->stars3,'stars2'=>$obj->stars2,'stars1'=>$obj->stars1,'stars0'=>$obj->stars0,'distance2'=>$obj->distance2,'distance5'=>$obj->distance5,'distance10'=>$obj->distance10,'distance20'=>$obj->distance20,'distance50'=>$obj->distance50,'minrate'=>floor($obj->minrate),'maxrate'=>ceil($obj->maxrate),'minguest'=>$obj->minguest,'maxguest'=>$obj->maxguest,'results'=>$data);
	
	echo json_encode($arr);
	die();
	}else{ 
		$arr =array('search_session'=> uniqid(),'exist'=>'No');
		echo json_encode($arr);
	}
}


if($_REQUEST["action"]=="Upldate_Rates"){
	
	$ext_param ='&latitude='.$lat.'&longitude='.$lon.'&checkIn='.$_SESSION['checkIn'].'&checkOut='.$_SESSION['checkOut'].'&no_of_rooms='.$_SESSION['no_of_rooms'].'&Cri_Pacs='.json_encode($_SESSION['Cri_Pacs']);
	
	$URL = $actionUrl.'?action=Upldate_Rates&numberOfResults=15&'.$Param.$ext_param; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	//$dd =json_decode($contents);
	//echo "<pre>";
	//print_r($dd);
	echo $contents ;
}

if($_REQUEST["action"]=="Upldate_Rates_All"){
	
		$ext_param ='&latitude='.$lat.'&longitude='.$lon.'&checkIn='.$_SESSION['checkIn'].'&checkOut='.$_SESSION['checkOut'].'&no_of_rooms='.$_SESSION['no_of_rooms'].'&Cri_Pacs='.json_encode($_SESSION['Cri_Pacs']);
		
		$URL = $actionUrl.'?action=Upldate_Rates&numberOfResults=200&'.$Param.$ext_param;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$results = curl_exec($ch);
		curl_close ($ch);
	
		$Response_Arr =json_decode($results, true);
		
		$HotelListResponse =$Response_Arr['HotelListResponse'];
		$customerSessionId =$HotelListResponse['customerSessionId'];
		$cacheLocation =$HotelListResponse['cacheLocation'];
		$cacheKey =$HotelListResponse['cacheKey'];
		$moreResultsAvailable =$HotelListResponse['moreResultsAvailable'];
		
		$HotelList =$HotelListResponse['HotelList'];
		$size = $HotelList['@size'];
		$activePropertyCount =$HotelList['@activePropertyCount'];
		$Countsize = 0;
		$activePropertyCount_justtocount = $activePropertyCount;
		$pageCount=0;
		if($activePropertyCount > $size){
		  $pageCount =ceil($activePropertyCount/$size);
		}
		
		if($size >1){
			$HotelList_arr =$HotelList['HotelSummary'];
		}else{
			$HotelList_arr[0] =$HotelList['HotelSummary'];
		}
		
		
		$checkIn_db =date('Y-m-d',strtotime($checkIn));
		$checkOut_db =date('Y-m-d',strtotime($checkOut));
		
		for($icounter=0;$icounter<$size;$icounter++){

			$discount_price =($HotelList_arr[$icounter]['highRate']-$HotelList_arr[$icounter]['lowRate']);
			
			
			$ValueAddsData =$HotelList_arr[$icounter]['RoomRateDetailsList']['RoomRateDetails']['ValueAdds']['ValueAdd'];
			if(!isset($ValueAddsData[0])){
			  $ValueAdds_arr[0]=$ValueAddsData;	
			}else{
				$ValueAdds_arr=$ValueAddsData;
			}
			
			$vaid_arr ='';
			foreach($ValueAdds_arr as $valuadd){
			  $vaid_arr[]=$valuadd['description'];
			}
			$vaid_str =@implode(",",$vaid_arr);	  
			 
			$promoDescription =$HotelList_arr[$icounter]['RoomRateDetailsList']['RoomRateDetails']['RateInfos']['RateInfo']['promoDescription'];
			 
			 
			 $SQL = "insert into search_results_ean set EANHotelID='".$HotelList_arr[$icounter]['hotelId']."', Name='".addslashes($HotelList_arr[$icounter]['name'])."', address1='".$HotelList_arr[$icounter]['address1']."', city='".$HotelList_arr[$icounter]['city']."', postalCode='".$HotelList_arr[$icounter]['postalCode']."', countryCode='".$HotelList_arr[$icounter]['countryCode']."', propertyCategory='".$HotelList_arr[$icounter]['propertyCategory']."', hotelRating='".$HotelList_arr[$icounter]['hotelRating']."', hotelRatingDisplay='".$HotelList_arr[$icounter]['hotelRatingDisplay']."', confidenceRating='".$HotelList_arr[$icounter]['confidenceRating']."', amenityMask='".$HotelList_arr[$icounter]['amenityMask']."', tripAdvisorRating='".$HotelList_arr[$icounter]['tripAdvisorRating']."', tripAdvisorReviewCount='".$HotelList_arr[$icounter]['tripAdvisorReviewCount']."', tripAdvisorRatingUrl='".$HotelList_arr[$icounter]['tripAdvisorRatingUrl']."', promoDescription='".$promoDescription."', locationDescription='".$HotelList_arr[$icounter]['locationDescription']."', shortDescription='".$HotelList_arr[$icounter]['shortDescription']."', highRate='".$HotelList_arr[$icounter]['highRate']."', lowRate='".$HotelList_arr[$icounter]['lowRate']."', discount_price='".$discount_price."', rateCurrencyCode='".$HotelList_arr[$icounter]['rateCurrencyCode']."', latitude='".$HotelList_arr[$icounter]['latitude']."', longitude='".$HotelList_arr[$icounter]['longitude']."', proximityDistance='".$HotelList_arr[$icounter]['proximityDistance']."', proximityUnit='".$HotelList_arr[$icounter]['proximityUnit']."', hotelInDestination='".$HotelList_arr[$icounter]['hotelInDestination']."', thumbNailUrl='".$HotelList_arr[$icounter]['thumbNailUrl']."',desti_lat_lon='".$desti_lat_lon."',valueAdds='".$vaid_str."', date_time='".date("Y-m-d")."', checkin='".$checkIn_db."', checkout='".$checkOut_db."', currency='".$_SESSION['Cri_currency']."',language='".$_SESSION['Cri_language']."', search_session='".$search_Session_Id."', Cri_Adults='', sort_order='".$sort_order."'"; 
		  
			
			
			$wpdb->query($SQL);
		     $sort_order++;
	 }
	
	// controller query
	
    	
	if($pageCount >0){
      getPagingResults($actionUrl,$cacheKey,$cacheLocation,$moreResultsAvailable,$pageCount,$search_Session_Id,$desti_lat_lon,$checkIn,$checkOut,$_SESSION['Cri_currency'],$_SESSION['Cri_language'],$Cri_Adults,$activePropertyCount);
    }
	
	// controller
	$moreQuery =" and currency='".$_SESSION['Cri_currency']."' and language='".$_SESSION['Cri_language']."' and LowRate>0";
	if(($_REQUEST['hotelType']!='') && ($_REQUEST['hotelType']!=1) ){
		$moreQuery=' and propertyCategory='.$_REQUEST['hotelType'];
	}
	echo getControlsData($search_Session_Id,$moreQuery,$activePropertyCount);
 
}



function getPagingResults($actionUrl,$cacheKey,$cacheLocation,$moreResultsAvailable,$pageCount,$search_Session_Id,$desti_lat_lon,$checkIn,$checkOut,$Cri_currency,$Cri_language,$Cri_Adults,$activePropertyCount){
	
	global $wpdb;
	global $Param;
	
   $cacheKey_new =$cacheKey;
   $cacheLocation_new =$cacheLocation;
   $moreData =$moreResultsAvailable;
   
   $checkIn_db =date('Y-m-d',strtotime($checkIn));
   $checkOut_db =date('Y-m-d',strtotime($checkOut));
   
   if($moreData==1)
   {
	   for($i=0;$i<$pageCount;$i++){
		$ext_param ='&cacheKey='.$cacheKey_new.'&cacheLocation='.$cacheLocation_new;
		
		$URL = $actionUrl.'?action=getPagingResults&'.$Param.$ext_param; 
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$results = curl_exec($ch);
		curl_close ($ch);
		
		$Response_Arr =json_decode($results, true);
		
		$HotelListResponse =$Response_Arr['HotelListResponse'];
		$customerSessionId =$HotelListResponse['customerSessionId'];
		$cacheLocation_new =$HotelListResponse['cacheLocation'];
		$cacheKey_new =$HotelListResponse['cacheKey'];
		$moreData =$HotelListResponse['moreResultsAvailable'];
		$HotelList =$HotelListResponse['HotelList'];
		$size = $HotelList['@size'];
		if($size >1){
			$HotelList_arr =$HotelList['HotelSummary'];
		}else{
			$HotelList_arr[0] =$HotelList['HotelSummary'];
		}
		
		for($icounter=0;$icounter<$size;$icounter++){
			$discount_price =($HotelList_arr[$icounter]['highRate']-$HotelList_arr[$icounter]['lowRate']);
			$ValueAddsData =$HotelList_arr[$icounter]['RoomRateDetailsList']['RoomRateDetails']['ValueAdds']['ValueAdd'];
			if(!isset($ValueAddsData[0])){
			  $ValueAdds_arr[0]=$ValueAddsData;	
			}else{
				$ValueAdds_arr=$ValueAddsData;
			}
			
			$vaid_arr ='';
			foreach($ValueAdds_arr as $valuadd){
			  $vaid_arr[]=$valuadd['description'];
			}
			$vaid_str =@implode(",",$vaid_arr);	  
			
			$promoDescription =$HotelList_arr[$icounter]['RoomRateDetailsList']['RoomRateDetails']['RateInfos']['RateInfo']['promoDescription'];
			 
			$SQL = "insert into search_results_ean set EANHotelID='".$HotelList_arr[$icounter]['hotelId']."', Name='".addslashes($HotelList_arr[$icounter]['name'])."', address1='".$HotelList_arr[$icounter]['address1']."', city='".$HotelList_arr[$icounter]['city']."', postalCode='".$HotelList_arr[$icounter]['postalCode']."', countryCode='".$HotelList_arr[$icounter]['countryCode']."', propertyCategory='".$HotelList_arr[$icounter]['propertyCategory']."', hotelRating='".$HotelList_arr[$icounter]['hotelRating']."', hotelRatingDisplay='".$HotelList_arr[$icounter]['hotelRatingDisplay']."', confidenceRating='".$HotelList_arr[$icounter]['confidenceRating']."', amenityMask='".$HotelList_arr[$icounter]['amenityMask']."', tripAdvisorRating='".$HotelList_arr[$icounter]['tripAdvisorRating']."', tripAdvisorReviewCount='".$HotelList_arr[$icounter]['tripAdvisorReviewCount']."', tripAdvisorRatingUrl='".$HotelList_arr[$icounter]['tripAdvisorRatingUrl']."', promoDescription='".$promoDescription."',  locationDescription='".$HotelList_arr[$icounter]['locationDescription']."', shortDescription='".$HotelList_arr[$icounter]['shortDescription']."', highRate='".$HotelList_arr[$icounter]['highRate']."', lowRate='".$HotelList_arr[$icounter]['lowRate']."', discount_price='".$discount_price."', rateCurrencyCode='".$HotelList_arr[$icounter]['rateCurrencyCode']."', latitude='".$HotelList_arr[$icounter]['latitude']."', longitude='".$HotelList_arr[$icounter]['longitude']."', proximityDistance='".$HotelList_arr[$icounter]['proximityDistance']."', proximityUnit='".$HotelList_arr[$icounter]['proximityUnit']."', hotelInDestination='".$HotelList_arr[$icounter]['hotelInDestination']."', thumbNailUrl='".$HotelList_arr[$icounter]['thumbNailUrl']."',desti_lat_lon='".$desti_lat_lon."',valueAdds='".$vaid_str."', date_time='".date("Y-m-d")."', checkin='".$checkIn_db."', checkout='".$checkOut_db."', currency='".$Cri_currency."', language='".$Cri_language."', search_session='".$search_Session_Id."', Cri_Adults='".$Cri_Adults."', sort_order='".$sort_order."'"; 
			 
			 $wpdb->query($SQL);
			 $sort_order++;
			} 
			
			
	  }
    }// is more avilable
	
	
	/*
	$moreQuery =" and currency='".$_SESSION['Cri_currency']."' and LowRate>0";
	if($_REQUEST['hotelType']!=''){
		$moreQuery=' and propertyCategory='.$_REQUEST['hotelType'];
	}
	echo getControlsData($search_Session_Id,$moreQuery,$activePropertyCount);
	*/
}


function getControlsData($search_Session_Id,$moreQuery,$activePropertyCount){
	global $wpdb;
	
	$sql ="SELECT count(Eanhotelid) as totalrecords, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(4.5,5) and search_session='".$search_Session_Id."' ".$moreQuery.")  as stars5, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(3.5,4) and search_session='".$search_Session_Id."' ".$moreQuery.") as stars4, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(2.5,3) and search_session='".$search_Session_Id."' ".$moreQuery.")  as stars3, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1.5,2)  and search_session='".$search_Session_Id."' ".$moreQuery.") as stars2, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1) and search_session='".$search_Session_Id."' ".$moreQuery.")  as stars1, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(0) and search_session='".$search_Session_Id."' ".$moreQuery.")  as stars0,
	(select count(Eanhotelid) from search_results_ean where proximityDistance<=2 and search_session='".$search_Session_Id."' ".$moreQuery.")  as distance2,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=5 and search_session='".$search_Session_Id."' ".$moreQuery.")  as distance5,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=10 and search_session='".$search_Session_Id."' ".$moreQuery.")  as distance10,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=20 and search_session='".$search_Session_Id."' ".$moreQuery.") as distance20,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=50 and search_session='".$search_Session_Id."' ".$moreQuery.")  as distance50,
	
	(select min(lowrate) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.")  as minrate , 
	(select max(lowrate) as maxrate from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.")  as maxrate,
	(select MIN(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.")  as minguest,
	(select MAX(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery.") as maxguest FROM search_results_ean where search_session='".$search_Session_Id."'";
  
  $resutls = $wpdb->get_results($sql); 
  $obj = $resutls[0];
  
  
  $data =array('totalrecords'=>$obj->totalrecords,'stars5'=>$obj->stars5,'stars4'=>$obj->stars4,'stars3'=>$obj->stars3,'stars2'=>$obj->stars2,'stars1'=>$obj->stars1,'stars0'=>$obj->stars0,'distance2'=>$obj->distance2,'distance5'=>$obj->distance5,'distance10'=>$obj->distance10,'distance20'=>$obj->distance20,'distance50'=>$obj->distance50,'minrate'=>floor($obj->minrate),'maxrate'=>ceil($obj->maxrate),'minguest'=>$obj->minguest,'maxguest'=>$obj->maxguest, 'activePropertyCount'=>$activePropertyCount);
  return json_encode($data);
	
}


if($_REQUEST["action"]=="getControls"){
	$moreQuery =" and currency ='".$_SESSION['Cri_currency']."' and language='".$_SESSION['Cri_language']."' and LowRate>0";
	if(($_REQUEST['hotelType']!='') && ($_REQUEST['hotelType']!=1) ){
		$moreQuery.=' and propertyCategory='.$_REQUEST['hotelType'];
	}
	
	//3675659
	$sql =mysql_query("select MIN(LowRate) as min_price,Max(LowRate) as max_price,MIN(guestRating) as min_guest,MAX(guestRating) as max_guest, count(*) as total_hotel from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery." ");
	$obj =mysql_fetch_object($sql);
	$data =array('min_price'=>$obj->min_price,'max_price'=>$obj->max_price,'min_guest'=>$obj->min_guest,'max_guest'=>$obj->max_guest,'total_hotel'=>$obj->total_hotel);
	
	echo json_encode($data);
}



if($_REQUEST["action"]=="getAmenities"){
	
	$moreQuery =" and currency ='".$_SESSION['Cri_currency']."' and language='".$_SESSION['Cri_language']."' and  LowRate>0";
	if(($_REQUEST['hotelType']!='') && ($_REQUEST['hotelType']!=1) ){
		$moreQuery.=' and propertyCategory='.$_REQUEST['hotelType'];
	}
	
	$results =$wpdb->get_results("select valueAdds from search_results_ean where search_session='".$search_Session_Id."' ".$moreQuery." ");
	$amenityStr='';
	foreach( $results as $obj){
		$amenityStr.=$obj->valueAdds.',';
	}
	$amenities =explode(',',$amenityStr);
	$amenityArr =array_filter(array_unique($amenities));
	
	echo json_encode($amenityArr);
}


if($_REQUEST["action"]=="Searched_Hotels"){

	$data = array();
   	
    $limit =15;
	if(($_REQUEST["page"]<=1) || ($_REQUEST["page"]=='')){
		$page = 0;
	}else{
		//$page = ( ($_REQUEST["page"]-1) * $limit) + 1;
		$page = ( ($_REQUEST["page"]-1) * $limit);
	}
	
	
	$moreCod =" and currency ='".$_SESSION['Cri_currency']."' and language='".$_SESSION['Cri_language']."' and  LowRate>0";
	
	if(($_REQUEST['hotelType']!='') && ($_REQUEST['hotelType']!=1) ){
		$moreCod =' and propertyCategory='.$_REQUEST['hotelType'];
	}
	
	
	//// Rating filter
	if(is_array($_REQUEST['Cri_Rating'])){ 
	   $Cri_Rating =$_REQUEST['Cri_Rating'];
     }else{
	   if($_REQUEST['Cri_Rating']!=''){
	    $Cri_Rating[0]=$_REQUEST['Cri_Rating'];
	   }
    }
	
	if(count($Cri_Rating)>0)
	{
		$moreCod.= ' and ';
		$star_fix_arr =array("5"=>array('5','4.5'),
						 "4"=>array('4','3.5'),
						 "3"=>array('3','2.5'),
						 "2"=>array('2','1.5'),
						 "1"=>array('1'),
						 "0"=>array('0')
						);
		$star_str ='';
		foreach($Cri_Rating as $val){
			$val_arr =$star_fix_arr[$val];
			foreach($val_arr as $v){
				$star_str.=$v.',';
			}
		}
		$star_str =substr($star_str,0,-1);
		$moreCod.='hotelRating IN('.$star_str.')';
	}
	//// Price filter
	
	
	if($_REQUEST['Cri_Price']!=''){
	   $Cri_PriceArr=explode("-",$_REQUEST['Cri_Price']);
	   $moreCod.= " and ( LowRate BETWEEN '".$Cri_PriceArr[0]."' and '".$Cri_PriceArr[1]."' ) ";
     }
	
	
	//// Distance filter
	if(($_REQUEST['Cri_Distance']!='') && ($_REQUEST['Cri_Distance']>0)){
		$dExp =explode('-',$_REQUEST['Cri_Distance']);
		//$moreCod.= ' and (ROUND(proximityDistance)>='.$dExp[0].' and ROUND(proximityDistance)<='.$dExp[1].') ';
		$moreCod.= ' and proximityDistance <='.$_REQUEST['Cri_Distance'].'';
		
	}
	if( ($_REQUEST['Cri_guestrating']!='') && ($_REQUEST['Cri_guestrating']!='NaN-NaN')){
		 $dExp =explode('-',$_REQUEST['Cri_guestrating']);
		 $moreCod.= ' and (tripAdvisorRating >='.($dExp[0]).' and tripAdvisorRating <='.($dExp[1]).') ';
	}
	
	//// Filter by type
	if(is_array($_REQUEST['Cri_Type'])){ 
	   $Cri_Type =$_REQUEST['Cri_Type'];
     }else{
	   if($_REQUEST['Cri_Type']!=''){
	    $Cri_Type[0]=$_REQUEST['Cri_Type'];
	   }
    }
	if(count($Cri_Type)>0){
		$CriType =@implode(',',$Cri_Type);
		$moreCod.= ' and propertyCategory IN('.$CriType.')';
	}
    
    //// Filter by Amenityies
	
	if( ($_REQUEST['Cri_amenity']!='undefined') || ($_REQUEST['Cri_amenity']!='')){ 
	   $Cri_amenity =explode(",",$_REQUEST['Cri_amenity']);
     }
	
	//print_r($Cri_amenity);
	
	if(count($Cri_amenity)>0){
		$a=0;
		$moreCod.= " and (";
		foreach($Cri_amenity as $val){
			 $moreCod.= " valueAdds like '%".$val."%'";
		     if($a<count($Cri_amenity)-1){ $moreCod.= " OR ";}	 
	     $a++;		 
		}	
		 $moreCod.= " ) ";
	}		
	
	
	
	
	/// Orderby
	$orderBy='';
	
	if($_REQUEST['orderby_fild']=='recommended'){
		$orderBy =' order by sort_order '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='price'){
		$orderBy =' order by LowRate '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='hotelRating'){
		$orderBy =' order by hotelRating '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='tripAdvisorRating'){
		$orderBy =' order by tripAdvisorRating '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='discounts'){
		$orderBy =' order by discount_price '.$orderby_val;
	}
	
	else{
		$orderBy =' order by sort_order ASC';
	}
   
    if($_REQUEST['hotel_name']!=''){
	   $Sqls = "select * from search_results_ean where destination_id='".$location_Id."' and Name='".trim($_REQUEST['hotel_name'])."' and currency='".$_SESSION["Cri_currency"]."' and language='".$_SESSION['Cri_language']."' and search_session='".trim($search_Session_Id)."' and LowRate>0  LIMIT 0,1"; 
	 }else{
	  
	    if($_REQUEST['list_Or_Map_Control']=='map'){
			$Sqls = "select EANHotelID,Name,lowRate,latitude,longitude from search_results_ean where search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy." "; 
		}else{
           $Sqls = "select EANHotelID,Name,hotelRating,confidenceRating,address1,lowRate,highRate,discount_price,latitude,longitude, thumbNailUrl, tripAdvisorRatingUrl,promoDescription from search_results_ean where search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy." LIMIT ".$page.", $limit"; 
		}
	 
	    $Sqqls = "select count(EANHotelID) as totalCount from search_results_ean where search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy.""; 
		
	 }
	 
	//echo $Sqls; die; 
	$totalResutls =$wpdb->get_results($Sqqls);
	$totalObjs =$totalResutls[0];
	
	$results = $wpdb->get_results($Sqls);

	if($_REQUEST['list_Or_Map_Control']=='map'){
		foreach ($results as $Objs ){
		 $data['result'][] =array('total'=>$totalObjs->totalCount,'hotelId'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'lowRate'=>number_format($Objs->lowRate, 2),'latitude'=>$Objs->latitude,'longitude'=>$Objs->longitude);
		}
	}
	else{
		foreach ($results as $Objs ){
			if($Objs->promoDescription!=''){
				$promoDescription=$Objs->promoDescription;
			}else{
				$promoDescription='';
			}
			$isFavourate='';
			if( ($_SESSION['userID']!='') && ($_SESSION['userID']>0) ){
			  $favResults =$wpdb->get_results("select * from favourite where EANHotelID='".$Objs->EANHotelID."' and user_id='".$_SESSION['userID']."'");
			  if(count($favResults) >0){
				  $isFavourate='Yes';
			  }
			}
			$data['result'][] =array('total'=>$totalObjs->totalCount,'hotelId'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes($Objs->thumbNailUrl),'hotelRating'=>stripslashes(round($Objs->hotelRating)),'popularity'=>stripslashes($Objs->confidenceRating),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl),'address1'=>stripslashes($Objs->address1), 'lowRate'=>number_format($Objs->lowRate, 2),'highRate'=>number_format($Objs->highRate, 2),'discount_price'=>$Objs->discount_price,'latitude'=>$Objs->latitude,'longitude'=>$Objs->longitude,'promoDescription'=>$promoDescription,'isFavourate'=>$isFavourate);
		}
	}
	
	
	$datastr = json_encode($data);

	echo $datastr;
	die;
}



if($_REQUEST["action"]=="Hotel_Description"){ 

    $ext_param ='&hotel_id='.$_REQUEST["hotel_id"];
	$URL = $actionUrl.'?action=Hotel_Description&'.$Param.$ext_param; 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$contents =str_replace("@","",$contents);
	print_r($contents);
}

if($_REQUEST["action"]=="RoomAvailability"){
  
    $_SESSION['checkIn']=$_REQUEST['checkIn'];
    $_SESSION['checkOut']=$_REQUEST['checkOut'];
    $_SESSION['no_of_rooms']=$_REQUEST['rooms'];
  
    $adults =explode(",",$_REQUEST['adults']);
	$childs =explode(",",$_REQUEST['childs']);
	$ageStr =$_REQUEST['childAge'];
	
	$childAge ='';
	if($ageStr!=''){
		$ageArr =explode("-",$_REQUEST['childAge']);
		for($c=0;$c<count($ageArr);$c++){
			$ageArr2 =explode("_",$ageArr[$c]);
			$key=$ageArr2[0];
			$val=explode(",",$ageArr2[1]);
			$childAge[$key]=$val;
		}
	}
	
   $_SESSION['Cri_Pacs'] = array('adults'=>$adults,
							    'childs'=>$childs,
							    'childAge'=>$childAge
							 );

    
	$ext_param ='&hotel_id='.$_REQUEST["hotel_id"].'&checkIn='.$_SESSION['checkIn'].'&checkOut='.$_SESSION['checkOut'].'&no_of_rooms='.$_SESSION['no_of_rooms'].'&Cri_Pacs='.json_encode($_SESSION['Cri_Pacs']);
	
	$URL = $actionUrl.'?action=RoomAvailability&'.$Param.$ext_param; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$contents =str_replace("@","",$contents);
	print_r($contents);
	
}



if($_REQUEST["action"]=="Show_Room_Info"){ 

	$ext_param ='&hotel_id='.$_REQUEST["hotel_id"].'&checkIn='.$_SESSION['checkIn'].'&checkOut='.$_SESSION['checkOut'].'&no_of_rooms='.$_SESSION['no_of_rooms'].'&Cri_Pacs='.json_encode($_SESSION['Cri_Pacs']);
	
	$URL = $actionUrl.'?action=RoomAvailability&'.$Param.$ext_param; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$contents =str_replace("@","",$contents);
	print_r($contents);
	
}


if($_REQUEST["action"]=="Show_Hotel_Suggestions"){
	
	$Sqls = "select EANHotelID,Name,lowRate,tripAdvisorRatingUrl,thumbNailUrl from search_results_ean where EANHotelID !='".trim($_REQUEST["hotel_id"])."'  and desti_lat_lon=(select desti_lat_lon from search_results_ean where EANHotelID='".trim($_REQUEST["hotel_id"])."' LIMIT 0, 1) and hotelRating=(select hotelRating from search_results_ean where EANHotelID='".trim($_REQUEST["hotel_id"])."' LIMIT 0, 1) and search_session=(select search_session from search_results_ean where EANHotelID='".trim($_REQUEST["hotel_id"])."' LIMIT 0, 1) LIMIT 0, 3";
	
	$results = $wpdb->get_results($Sqls);
	foreach($results as $Objs){
		$data['result'][] =array('EANHotelID'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes(str_replace("_t.jpg", "_b.jpg", $Objs->thumbNailUrl)),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl), 'lowRate'=>number_format($Objs->lowRate, 2));
	}
	$datastr = json_encode($data);
	echo $datastr;
	die;
}



if($_REQUEST["action"]=="HotelPaymentRequest"){
	
	$ext_param ='&hotel_id='.$_REQUEST["hotel_id"].'&supplierType='.$_SESSION['supplierType'];
	
	$URL = $actionUrl.'?action=HotelPaymentRequest&'.$Param.$ext_param; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	print_r($contents);
}

if($_REQUEST["action"]=="Confirmation"){
	
	$itineraryId =trim($_REQUEST['itineraryId']);
	
	$sql ="select * from twc_booking where itineraryId='".$itineraryId."'";
	$results =$wpdb->get_results($sql);
	$Obj=$results[0];
	
	$response= json_decode(str_replace("@","",$Obj->response_xml));
	
	$HotelRoomReservationResponse =$response->HotelRoomReservationResponse;
  //print_r($HotelRoomReservationResponse);
	$data =array('itineraryId'=>$Obj->itineraryId,'booking_status'=>$Obj->booking_status,'hotelName'=>$Obj->hotelName,'hotelRating'=>$Obj->hotelRating,'hotel_img'=>$Obj->hotel_img,'hotelAddress'=>$Obj->hotelAddress,'hotelCity'=>$Obj->hotelCity,'hotelCountryCode'=>$Obj->hotelCountryCode,'user_name'=>$Obj->user_name,'user_email'=>$Obj->user_email,'user_contactno'=>$Obj->user_contactno,'check_in'=>$Obj->check_in,'check_out'=>$Obj->check_out,'chargable_rate'=>$Obj->chargable_rate,'currency_code'=>$Obj->currency_code,'bookingResponse'=>$HotelRoomReservationResponse);
	echo json_encode($data);
}


?> 	