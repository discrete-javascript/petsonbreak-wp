<?php 
ini_set('max_execution_time', 600);
ini_set('display_errors', false);
error_reporting(0);
session_start();
header("Access-Control-Allow-Origin: *");
//mysql_connect('localhost','root','') or die('Connection Error');
//mysql_select_db('tp') or ('DB Error');
mysql_connect('localhost','twcfivco_twc','Noton_Da_123') or die('Connection Error');
mysql_select_db('twcfivco_tp') or ('DB Error');


header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/xml; charset=utf-8");

/*header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/xml; charset=utf-8");*/

//Test API Credentials
$cid = '500101';
$apiKey = '44ohluga9g3ailh3qft8ag0ak4';
$secret = '36f2v6k7v737i';
$ModeType = 'Test';
$minorRev = "30";
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
$Cri_currency = $_REQUEST['Cri_currency'];
$Cri_language = "en_US";
$orderby_val = $_REQUEST['orderby_val'];

if($orderby_val == "true"){
	$orderby_val = "asc";
}else{
	$orderby_val = "desc";
}
$adults = 2;


//=== Session ===//

if($_REQUEST["action"]=="findSearchKey"){
	$_SESSION['Cri_language']=$_REQUEST['Cri_language'];
	$_SESSION['Cri_currency']=$_REQUEST['Cri_currency'];
	$_SESSION['checkIn']=$_REQUEST['checkIn'];
	$_SESSION['checkOut']=$_REQUEST['checkOut'];
	$_SESSION['no_of_rooms']=2;
	$_SESSION['Cri_Pacs'] = array('adults'=>array(1,1),
								 'childs'=>array(0,0),
								 'childAge'=>array(0=>'',1=>array('3','5'))
								 );
}
//=== End Session ===//							 
							 
if($ModeType=='Live'){	
		$URL_Ping = "http://api.ean.com/ean-services/rs/hotel/v3/ping?sig={$sig}&";
	    $URL_Hotel_List = "http://api.ean.com/ean-services/rs/hotel/v3/list?sig={$sig}&";
		$URL_Hotel_Description = "http://api.ean.com/ean-services/rs/hotel/v3/info?sig={$sig}&";
		$URL_Room_Hotel_Availibility = "http://api.ean.com/ean-services/rs/hotel/v3/avail?sig={$sig}&";
		$URL_Alternate_Property_Suggestions = "http://api.ean.com/ean-services/rs/hotel/v3/altProps?sig={$sig}&";
		$URL_Payment_Types = "http://api.ean.com/ean-services/rs/hotel/v3/paymentInfo?sig={$sig}&";
		$URL_Book_Reservation = "https://book.api.ean.com/ean-services/rs/hotel/v3/res?sig={$sig}&";
		$URL_Room_Images="https://book.api.ean.com/ean-services/rs/hotel/v3/roomImages?sig={$sig}&";
		$URL_Geo="https://book.api.ean.com/ean-services/rs/hotel/v3/list?sig={$sig}&";
		
   }else{
		
		$URL_Ping = "https://api.ean.com/ean-services/rs/hotel/v3/ping?sig={$sig}&";
		$URL_Hotel_List = "http://api.ean.com/ean-services/rs/hotel/v3/list?sig={$sig}&";
		$URL_Hotel_Description = "http://api.ean.com/ean-services/rs/hotel/v3/info?sig={$sig}&";
		$URL_Room_Hotel_Availibility = "http://api.ean.com/ean-services/rs/hotel/v3/avail?sig={$sig}&";
		$URL_Alternate_Property_Suggestions = "https://dev.api.ean.com/ean-services/rs/hotel/v3/altProps?sig={$sig}&";
		$URL_Payment_Types = "http://api.ean.com/ean-services/rs/hotel/v3/paymentInfo?sig={$sig}&";
		$URL_Book_Reservation = "http://api.ean.com/ean-services/rs/hotel/v3/res?sig={$sig}&";
		$URL_Room_Images="http://api.ean.com/ean-services/rs/hotel/v3/roomImages?sig={$sig}&";
		$URL_Geo="http://api.ean.com/ean-services/rs/hotel/v3/list?sig={$sig}&";
     }
   
$Param = "cid=".$cid."&minorRev=".$minorRev."&apiKey=".$apiKey."&secret==".$secret."&locale=".$_SESSION['Cri_language']."&currencyCode=".$_SESSION['Cri_currency']; 

//$Param_Arr =array('cid'=>$cid,'minorRev'=>$minorRev,'apiKey'=>$apiKey,'locale'=>$Cri_language,'currencyCode'=>$Cri_currency);	
   
//include("v1/function_desc.php");

						  
if($_REQUEST["action"]=="findSearchKey"){
	$num = 0;
	
	$sql = mysql_query("select search_session, count(*) as total_hotel from search_results_ean where desti_lat_lon='".$desti_lat_lon."' limit 0, 1");
	
	$results =mysql_fetch_object($sql);
	$search_Session_Id = $results->search_session;
	
	if($results->total_hotel > 0){
		
	$sql =mysql_query("SELECT count(Eanhotelid) as totalrecords, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(4.5,5) and desti_lat_lon='".$desti_lat_lon."') as stars5, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(3.5,4) and desti_lat_lon='".$desti_lat_lon."') as stars4, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(2.5,3) and desti_lat_lon='".$desti_lat_lon."') as stars3, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1.5,2) and desti_lat_lon='".$desti_lat_lon."') as stars2, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1) and desti_lat_lon='".$desti_lat_lon."') as stars1, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(0) and desti_lat_lon='".$desti_lat_lon."') as stars0,
	(select count(Eanhotelid) from search_results_ean where proximityDistance<=2 and desti_lat_lon='".$desti_lat_lon."') as distance2,
  (select count(Eanhotelid) from search_results_ean where  proximityDistance<=5 and desti_lat_lon='".$desti_lat_lon."') as distance5,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=10 and desti_lat_lon='".$desti_lat_lon."') as distance10,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=20 and desti_lat_lon='".$desti_lat_lon."') as distance20,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=50 and desti_lat_lon='".$desti_lat_lon."') as distance50,
	
	(select min(lowrate) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as minrate , 
	(select max(lowrate) as maxrate from search_results_ean where desti_lat_lon='".$desti_lat_lon."' ) as maxrate,
	(select MIN(tripAdvisorRating) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as minguest,
	(select MAX(tripAdvisorRating) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as maxguest FROM search_results_ean where desti_lat_lon='".$desti_lat_lon."'");
  
 
	
	$obj = mysql_fetch_object($sql); 
	
	
	$Sqls = "select EANHotelID,Name,hotelRating,confidenceRating,address1,lowRate,highRate,discount_price,latitude,longitude, thumbNailUrl, tripAdvisorRatingUrl from search_results_ean where desti_lat_lon='".$desti_lat_lon."' and LowRate>0 limit 0,12"; 
	 
$query = mysql_query($Sqls);
	while ( $Objs = mysql_fetch_object($query) ){
		$data[] =array('hotelId'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes($Objs->thumbNailUrl),'hotelRating'=>stripslashes($Objs->hotelRating),'popularity'=>stripslashes($Objs->confidenceRating),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl),'address1'=>stripslashes($Objs->address1), 'lowRate'=>'Loading...','highRate'=>'','discount_price'=>'...');
	
	}
		
	$arr =array('search_session'=>$results->search_session,'exist'=>'Yes', 'totalrecords'=>$obj->totalrecords,'stars5'=>$obj->stars5,'stars4'=>$obj->stars4,'stars3'=>$obj->stars3,'stars2'=>$obj->stars2,'stars1'=>$obj->stars1,'stars0'=>$obj->stars0,'distance2'=>$obj->distance2,'distance5'=>$obj->distance5,'distance10'=>$obj->distance10,'distance20'=>$obj->distance20,'distance50'=>$obj->distance50,'minrate'=>floor($obj->minrate),'maxrate'=>ceil($obj->maxrate),'minguest'=>$obj->minguest,'maxguest'=>$obj->maxguest,'results'=>$data);
	
	echo json_encode($arr);
	die();
	}else{ 
		$arr =array('search_session'=> uniqid(),'exist'=>'No');
		echo json_encode($arr);
	}
}


if($_REQUEST["action"]=="Upldate_Rates"){
	 $xmldata = "<HotelListRequest><arrivalDate>".$_SESSION['checkIn']."</arrivalDate><departureDate>".$_SESSION['checkOut']."</departureDate><RoomGroup><Room><numberOfAdults>2</numberOfAdults></Room></RoomGroup><numberOfResults>12</numberOfResults>";
	   
	   $xmldata_param = "&latitude=".$lat."&longitude=".$lon."&searchRadius=100&searchRadiusUnit=MI&sort=PROXIMITY";
		
		$xmldata.="</HotelListRequest>"; 
		
		$URL = $URL_Geo.$Param.$xmldata_param;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=" . $xmldata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$results = curl_exec($ch);
		curl_close($ch);
		
		print_r($results); die;
}




if($_REQUEST["action"]=="Upldate_Rates_All"){
	
	  $xmldata = "<HotelListRequest><arrivalDate>".$checkIn."</arrivalDate><departureDate>".$checkOut."</departureDate><RoomGroup><Room><numberOfAdults>2</numberOfAdults></Room></RoomGroup><numberOfResults>200</numberOfResults>";

	   
	   $xmldata_param = "&latitude=".$lat."&longitude=".$lon."&searchRadius=100&searchRadiusUnit=MI&sort=PROXIMITY";
		
		$xmldata.="<options>1</options></HotelListRequest>"; 
		
		$URL = $URL_Geo.$Param.$xmldata_param;
		//echo $xmldata; die;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=" . $xmldata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$results = curl_exec($ch);
		curl_close($ch);
		
		$Response_Arr =json_decode($results, true);
		
		$HotelListResponse =$Response_Arr['HotelListResponse'];
		$customerSessionId =$HotelListResponse['customerSessionId'];
		$cacheLocation =$HotelListResponse['cacheLocation'];
		$cacheKey =$HotelListResponse['cacheKey'];
		$moreResultsAvailable =$HotelListResponse['moreResultsAvailable'];
		//echo "<pre>";
  // print_r($Response_Arr); die;
		//echo 'cacheLocation='.$cacheLocation.'cacheKey='.$cacheKey; die;
		
		$HotelList =$HotelListResponse['HotelList'];
		$size = $HotelList['@size'];
		$activePropertyCount =$HotelList['@activePropertyCount'];
		$Countsize = 0;
		$activePropertyCount_justtocount = $activePropertyCount;
		$pageCount=0;
		if($activePropertyCount > $size){
		  $pageCount =ceil($activePropertyCount/$size);
		}
		/*
		for ($pgcnt = 1; $pgcnt<=$pageCount; $pgcnt++)
		{
			
			$total_num_record_size = $activePropertyCount_justtocount - $Countsize;
			$Countsize = $Countsize + 200;
			
			if($pgcnt!=$pageCount){
				//echo "200----";
			}else{
				//echo $total_num_record_size."---------";
			}
		}
		*/
		//die();
		
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
			 
			$SQL = "insert into search_results_ean set EANHotelID='".$HotelList_arr[$icounter]['hotelId']."', Name='".addslashes($HotelList_arr[$icounter]['name'])."', address1='".$HotelList_arr[$icounter]['address1']."', city='".$HotelList_arr[$icounter]['city']."', postalCode='".$HotelList_arr[$icounter]['postalCode']."', countryCode='".$HotelList_arr[$icounter]['countryCode']."', propertyCategory='".$HotelList_arr[$icounter]['propertyCategory']."', hotelRating='".$HotelList_arr[$icounter]['hotelRating']."', hotelRatingDisplay='".$HotelList_arr[$icounter]['hotelRatingDisplay']."', confidenceRating='".$HotelList_arr[$icounter]['confidenceRating']."', amenityMask='".$HotelList_arr[$icounter]['amenityMask']."', tripAdvisorRating='".$HotelList_arr[$icounter]['tripAdvisorRating']."', tripAdvisorReviewCount='".$HotelList_arr[$icounter]['tripAdvisorReviewCount']."', tripAdvisorRatingUrl='".$HotelList_arr[$icounter]['tripAdvisorRatingUrl']."', locationDescription='".$HotelList_arr[$icounter]['locationDescription']."', shortDescription='".$HotelList_arr[$icounter]['shortDescription']."', highRate='".$HotelList_arr[$icounter]['highRate']."', lowRate='".$HotelList_arr[$icounter]['lowRate']."', discount_price='".$discount_price."', rateCurrencyCode='".$HotelList_arr[$icounter]['rateCurrencyCode']."', latitude='".$HotelList_arr[$icounter]['latitude']."', longitude='".$HotelList_arr[$icounter]['longitude']."', proximityDistance='".$HotelList_arr[$icounter]['proximityDistance']."', proximityUnit='".$HotelList_arr[$icounter]['proximityUnit']."', hotelInDestination='".$HotelList_arr[$icounter]['hotelInDestination']."', thumbNailUrl='".$HotelList_arr[$icounter]['thumbNailUrl']."',desti_lat_lon='".$desti_lat_lon."',valueAdds='".$vaid_str."', date_time='".date("Y-m-d")."', checkin='".$checkIn."', checkout='".$checkOut."', currency='".$Cri_currency."', langauge='".$Cri_language."', search_session='".$search_Session_Id."', Cri_Adults=".$Cri_Adults.", sort_order=".$sort_order; 
			
			
			mysql_query($SQL);
		     $sort_order++;
		    }
		
		
		
		
 
  if($pageCount >0){
    getPagingResults($URL_Geo,$Param,$cacheKey,$cacheLocation,$moreResultsAvailable,$pageCount,$search_Session_Id,$desti_lat_lon,$checkIn,$checkOut,$Cri_currency,$Cri_language,$Cri_Adults);
  }
  
}



function getPagingResults($URLs,$Param,$cacheKey,$cacheLocation,$moreResultsAvailable,$pageCount,$search_Session_Id,$desti_lat_lon,$checkIn,$checkOut,$Cri_currency,$Cri_language,$Cri_Adults){
	
	
   $URL = $URLs.$Param;
   $cacheKey_new =$cacheKey;
   $cacheLocation_new =$cacheLocation;
   $moreData =$moreResultsAvailable;
   if($moreData==1)
   {
	   for($i=0;$i<$pageCount;$i++)
	   {	
		$xmldata ='<HotelListRequest><supplierType>E</supplierType><cacheKey>'.$cacheKey_new.'</cacheKey><cacheLocation>'.$cacheLocation_new.'</cacheLocation></HotelListRequest>';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=" . $xmldata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$results = curl_exec($ch);
		curl_close($ch);
		
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
			 
			 $SQL = "insert into search_results_ean set EANHotelID='".$HotelList_arr[$icounter]['hotelId']."', Name='".addslashes($HotelList_arr[$icounter]['name'])."', address1='".$HotelList_arr[$icounter]['address1']."', city='".$HotelList_arr[$icounter]['city']."', postalCode='".$HotelList_arr[$icounter]['postalCode']."', countryCode='".$HotelList_arr[$icounter]['countryCode']."', propertyCategory='".$HotelList_arr[$icounter]['propertyCategory']."', hotelRating='".$HotelList_arr[$icounter]['hotelRating']."', hotelRatingDisplay='".$HotelList_arr[$icounter]['hotelRatingDisplay']."', confidenceRating='".$HotelList_arr[$icounter]['confidenceRating']."', amenityMask='".$HotelList_arr[$icounter]['amenityMask']."', tripAdvisorRating='".$HotelList_arr[$icounter]['tripAdvisorRating']."', tripAdvisorReviewCount='".$HotelList_arr[$icounter]['tripAdvisorReviewCount']."', tripAdvisorRatingUrl='".$HotelList_arr[$icounter]['tripAdvisorRatingUrl']."', locationDescription='".$HotelList_arr[$icounter]['locationDescription']."', shortDescription='".$HotelList_arr[$icounter]['shortDescription']."', highRate='".$HotelList_arr[$icounter]['highRate']."', lowRate='".$HotelList_arr[$icounter]['lowRate']."', discount_price='".$discount_price."', rateCurrencyCode='".$HotelList_arr[$icounter]['rateCurrencyCode']."', latitude='".$HotelList_arr[$icounter]['latitude']."', longitude='".$HotelList_arr[$icounter]['longitude']."', proximityDistance='".$HotelList_arr[$icounter]['proximityDistance']."', proximityUnit='".$HotelList_arr[$icounter]['proximityUnit']."', hotelInDestination='".$HotelList_arr[$icounter]['hotelInDestination']."', thumbNailUrl='".$HotelList_arr[$icounter]['thumbNailUrl']."',desti_lat_lon='".$desti_lat_lon."',valueAdds='".$vaid_str."', date_time='".date("Y-m-d")."', checkin='".$checkIn."', checkout='".$checkOut."', currency='".$Cri_currency."', langauge='".$Cri_language."', search_session='".$search_Session_Id."', Cri_Adults='".$Cri_Adults."', sort_order='".$sort_order."'"; 
			 
			 mysql_query($SQL);
			 $sort_order++;
			} 
			
			
	  }
    }// is more avilable
	
	
	$sql =mysql_query("SELECT count(Eanhotelid) as totalrecords, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(4.5,5) and desti_lat_lon='".$desti_lat_lon."') as stars5, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(3.5,4) and desti_lat_lon='".$desti_lat_lon."') as stars4, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(2.5,3) and desti_lat_lon='".$desti_lat_lon."') as stars3, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1.5,2)  and desti_lat_lon='".$desti_lat_lon."') as stars2, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(1) and desti_lat_lon='".$desti_lat_lon."') as stars1, 
	(select count(Eanhotelid) from search_results_ean where hotelRating IN(0) and desti_lat_lon='".$desti_lat_lon."') as stars0,
	(select count(Eanhotelid) from search_results_ean where proximityDistance<=2 and desti_lat_lon='".$desti_lat_lon."') as distance2,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=5 and desti_lat_lon='".$desti_lat_lon."') as distance5,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=10 and desti_lat_lon='".$desti_lat_lon."') as distance10,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=20 and desti_lat_lon='".$desti_lat_lon."') as distance20,
  (select count(Eanhotelid) from search_results_ean where proximityDistance<=50 and desti_lat_lon='".$desti_lat_lon."') as distance50,
	
	(select min(lowrate) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as minrate , 
	(select max(lowrate) as maxrate from search_results_ean where desti_lat_lon='".$desti_lat_lon."' ) as maxrate,
	(select MIN(tripAdvisorRating) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as minguest,
	(select MAX(tripAdvisorRating) from search_results_ean where desti_lat_lon='".$desti_lat_lon."') as maxguest FROM search_results_ean where desti_lat_lon='".$desti_lat_lon."'");
  
  $obj = mysql_fetch_object($sql); 
  $data =array('totalrecords'=>$obj->totalrecords,'stars5'=>$obj->stars5,'stars4'=>$obj->stars4,'stars3'=>$obj->stars3,'stars2'=>$obj->stars2,'stars1'=>$obj->stars1,'stars0'=>$obj->stars0,'distance2'=>$obj->distance2,'distance5'=>$obj->distance5,'distance10'=>$obj->distance10,'distance20'=>$obj->distance20,'distance50'=>$obj->distance50,'minrate'=>floor($obj->minrate),'maxrate'=>ceil($obj->maxrate),'minguest'=>$obj->minguest,'maxguest'=>$obj->maxguest, 'activePropertyCount'=>$activePropertyCount);
  echo json_encode($data);
}


if($_REQUEST["action"]=="getControls"){
	//3675659
	$sql =mysql_query("select MIN(LowRate) as min_price,Max(LowRate) as max_price,MIN(guestRating) as min_guest,MAX(guestRating) as max_guest, count(*) as total_hotel from search_results_ean where search_session='".$search_Session_Id."'");
	$obj =mysql_fetch_object($sql);
	$data =array('min_price'=>$obj->min_price,'max_price'=>$obj->max_price,'min_guest'=>$obj->min_guest,'max_guest'=>$obj->max_guest,'total_hotel'=>$obj->total_hotel);
	
	echo json_encode($data);
}


/*if($_REQUEST["action"]=="Upldate_Rates_All"){
 
  $sql =mysql_query("SELECT count(EANHotelID) as totalrecords, 
  (select count(EANHotelID) from search_results_ean where hotelRating=5 and search_session='".$search_Session_Id."') as stars5, 
  (select count(EANHotelID) from search_results_ean where hotelRating=4 and search_session='".$search_Session_Id."') as stars4, 
  (select count(EANHotelID) from search_results_ean where hotelRating=3 and search_session='".$search_Session_Id."') as stars3, 
  (select count(EANHotelID) from search_results_ean where hotelRating=2 and search_session='".$search_Session_Id."') as stars2, 
  (select count(EANHotelID) from search_results_ean where hotelRating=1 and search_session='".$search_Session_Id."') as stars1, 
  (select count(EANHotelID) from search_results_ean where hotelRating=0 and search_session='".$search_Session_Id."') as stars0,
  (select count(EANHotelID) from search_results_ean where proximityDistance<=2 and search_session='".$search_Session_Id."') as distance2,
  (select count(EANHotelID) from search_results_ean where (proximityDistance>2 and proximityDistance<=5) and search_session='".$search_Session_Id."') as distance5,
  (select count(EANHotelID) from search_results_ean where (proximityDistance>5 and proximityDistance<=10) and search_session='".$search_Session_Id."') as distance10,
  (select count(EANHotelID) from search_results_ean where (proximityDistance>10 and proximityDistance<=20) and search_session='".$search_Session_Id."') as distance20,
  (select count(EANHotelID) from search_results_ean where (proximityDistance>20 and proximityDistance<=50) and search_session='".$search_Session_Id."') as distance50,
  
  
  (select min(lowRate) from search_results_ean where search_session='".$search_Session_Id."') as minrate , 
  (select max(lowRate) as maxrate from search_results_ean where search_session='".$search_Session_Id."' ) as maxrate,
  (select MIN(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."') as minguest,
  (select MAX(tripAdvisorRating) from search_results_ean where search_session='".$search_Session_Id."') as maxguest FROM search_results_ean where search_session='".$search_Session_Id."'");
  
  $obj = mysql_fetch_object($sql); 
  $data =array('totalrecords'=>$obj->totalrecords,'stars5'=>$obj->stars5,'stars4'=>$obj->stars4,'stars3'=>$obj->stars3,'stars2'=>$obj->stars2,'stars1'=>$obj->stars1,'stars0'=>$obj->stars0,'distance2'=>$obj->distance2,'distance5'=>$obj->distance5,'distance10'=>$obj->distance10,'distance20'=>$obj->distance20,'distance50'=>$obj->distance50,'minrate'=>$obj->minrate,'maxrate'=>$obj->maxrate,'minguest'=>$obj->minguest,'maxguest'=>$obj->maxguest);
  echo json_encode($data);
   
}*/


if($_REQUEST["action"]=="getAmenities"){
	$sql =mysql_query("select valueAdds from search_results_ean where search_session='".$search_Session_Id."' and LowRate >0");
	$amenityStr='';
	while($obj =mysql_fetch_object($sql)){
		$amenityStr.=$obj->valueAdds.',';
	}
	$amenities =explode(',',$amenityStr);
	$amenityArr =array_filter(array_unique($amenities));
	
	/*
	$amenityArr =array();
	foreach($amenities as $val){
		if($val!=''){
		$sql =mysql_query("select name from hotels_amenities where amenities_id='".$val."'");
		$reObj =mysql_fetch_object($sql);
		$amenityArr[] =array('id'=>$val,'title'=>$reObj->name);
		}
	}*/
	//echo "<pre>";
	//print_r($amenityArr);
	echo json_encode($amenityArr);
}


if($_REQUEST["action"]=="Searched_Hotels"){

	$data = array();
   	
    $limit =12;
	if(($_REQUEST["page"]==0) || ($_REQUEST["page"]=='')){
		$page = 0;
	}else{
		$page = ($_REQUEST["page"] * $limit) + 1;
	}
	$moreCod ='';
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
		$moreCod.= 'and ';
		$star_fix_arr =array("5"=>array('5','4.5'),
						 "4"=>array('4','3.5'),
						 "3"=>array('3','2.5'),
						 "2"=>array('2','1.5'),
						 "1"=>array('1')
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
	if(is_array($_REQUEST['Cri_Price'])){ 
	   $Cri_Price =$_REQUEST['Cri_Price'];
     }else{
	   if($_REQUEST['Cri_Price']!=''){
	    $Cri_Price[0]=$_REQUEST['Cri_Price'];
	   }
    }
	if(count($Cri_Price)>0){
		$moreCod.= 'and (';
		$pricStr ='';								
		foreach($Cri_Price as $price_val){
			$exp_price = explode("-",$price_val);
			$exp_price_min = $exp_price[0];
			$exp_price_max = $exp_price[1];
			
			if($owner_commission_value>0){
				$exp_price_min = ($exp_price_min+( ($exp_price_min*$owner_commission_value)/100) );
				$exp_price_max = ($exp_price_max+( ($exp_price_max*$owner_commission_value)/100) );
			}
			
			$pricStr.=' LowRate BETWEEN '.$exp_price_min.' and '.$exp_price_max;
			$pricStr.=' OR';
		}
		$pricStr =substr($pricStr,0,-2);
		$moreCod.= $pricStr.')';
	}
	
	//// Distance filter
	if(($_REQUEST['Cri_Distance']!='') && ($_REQUEST['Cri_Distance']>0)){
		$dExp =explode('-',$_REQUEST['Cri_Distance']);
		//$moreCod.= ' and (ROUND(proximityDistance)>='.$dExp[0].' and ROUND(proximityDistance)<='.$dExp[1].') ';
		$moreCod.= ' and proximityDistance <='.$_REQUEST['Cri_Distance'].'';
		
	}
	if($_REQUEST['Cri_guestrating']!=''){
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
	
	/*
	if(is_array($_REQUEST['Cri_amenity'])){ 
	   $Cri_amenity =$_REQUEST['Cri_amenity'];
     }else{
	   if($_REQUEST['Cri_amenity']!=''){
	    $Cri_amenity[0]=$_REQUEST['Cri_amenity'];
	   }
    }*/
	
	
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
	   $Sqls = "select * from search_results_ean where destination_id='".$location_Id."' and Name='".trim($_REQUEST['hotel_name'])."' and currency='".$_SESSION["Cri_currency"]."' and langauge='".$_SESSION['Cri_language']."' and search_session='".trim($search_Session_Id)."' and LowRate>0  LIMIT 0,1"; 
	 }else{
	  
	 // $Sqls = "select * from search_results_ean where destination_id='".$location_Id."' and search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy." LIMIT ".$page.", $limit"; 
	  
	  //$Sqls = "select * from search_results_ean where destination_id='".$location_Id."' and search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy; 
	  
$Sqls = "select EANHotelID,Name,hotelRating,confidenceRating,address1,lowRate,highRate,discount_price,latitude,longitude, thumbNailUrl, tripAdvisorRatingUrl from search_results_ean where search_session='".trim($search_Session_Id)."' and LowRate>0 ".$moreCod." ".$orderBy; 
	 

	 }
   //echo $Sqls; die;
	$query = mysql_query($Sqls);
	//$Objs =mysql_fetch_object($query);
	//print_R($Objs); die;
	
	
	
	while ( $Objs = mysql_fetch_object($query) ){
		
		$data['result'][] =array('hotelId'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes($Objs->thumbNailUrl),'hotelRating'=>stripslashes($Objs->hotelRating),'popularity'=>stripslashes($Objs->confidenceRating),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl),'address1'=>stripslashes($Objs->address1), 'lowRate'=>number_format($Objs->lowRate, 2),'highRate'=>number_format($Objs->highRate, 2),'discount_price'=>$Objs->discount_price,'latitude'=>$Objs->latitude,'longitude'=>$Objs->longitude);
	
	}
	$datastr = json_encode($data);

	echo $datastr;
	die;
}

if($_REQUEST["action"]=="Hotel_Description"){ 
	$xmldata = "<HotelInformationRequest><hotelId>".$_REQUEST["hotel_id"]."</hotelId><options>0</options></HotelInformationRequest>";
	//$URL = $URL_Hotel_Description.$Param; 
	//echo $URL;
	$URL = $URL_Hotel_Description.$Param."&xml=".$xmldata; 
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
	
	
	
	$query = mysql_query($Sqls);
	while ( $Objs = mysql_fetch_object($query) ){
		$data['result'][] =array('EANHotelID'=>$Objs->EANHotelID,'name'=>stripslashes($Objs->Name),'thumbNailUrl'=>stripslashes(str_replace("_t.jpg", "_b.jpg", $Objs->thumbNailUrl)),'tripAdvisorRatingUrl'=>stripslashes($Objs->tripAdvisorRatingUrl), 'lowRate'=>number_format($Objs->lowRate, 2));
	}
	$datastr = json_encode($data);
	echo $datastr;
	die;
}



if($_REQUEST["action"]=="Show_Room_Info"){ 
	 $roomgroup ='';
	 for($i=0;$i<$_SESSION['no_of_rooms'];$i++){
		 $adults =$_SESSION['Cri_Pacs']['adults'][$i];
		 $childs =$_SESSION['Cri_Pacs']['childs'][$i];
		 $childAge =$_SESSION['Cri_Pacs']['childAge'][$i];
		
		 $roomgroup.="<Room><numberOfAdults>".$adults."</numberOfAdults>";
				   if($childs>0){
					 $roomgroup.="<numberOfChildren>".$childs."</numberOfChildren>"; 
					  foreach($childAge as $childAg){
						if($childAg >0){
						   $roomgroup.="<childAges>".$childAg ."</childAges>";   
					   }
					 }
					} 
		$roomgroup.="</Room>";
	 }
	  
	
	$xmldata = "<HotelRoomAvailabilityRequest><hotelId>".$_REQUEST["hotel_id"]."</hotelId><arrivalDate>".$_SESSION['checkIn']."</arrivalDate><departureDate>".$_SESSION['checkOut']."</departureDate><includeDetails>true</includeDetails><includeRoomImages>true</includeRoomImages><includeHotelFeeBreakdown>true</includeHotelFeeBreakdown><RoomGroup>".$roomgroup."</RoomGroup></HotelRoomAvailabilityRequest>";
   //echo $xmldata; die;
	$URL = $URL_Room_Hotel_Availibility.$Param."&xml=".$xmldata; 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$contents =str_replace("@","",$contents);
	//echo "<pre>";
//print_r(json_decode($contents)); die;
    
	print_r($contents);
}



if($_REQUEST["action"]=="HotelPaymentRequest"){

	$xmldata = "<HotelPaymentRequest><hotelId>".$hotel_id."</hotelId><supplierType>".$supplierType."</supplierType><rateType>".$rateType."</rateType></HotelPaymentRequest>";

	$URL = $URL_Payment_Types.$Param."&xml=".$xmldata; 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	print_r($contents);
}

?> 	