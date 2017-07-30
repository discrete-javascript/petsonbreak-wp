<?php session_start();
error_reporting(0);

ini_set('max_execution_time', 600);
header("Access-Control-Allow-Origin: *");

include('../../../../wp-load.php');
global $wpdb;
global $mk_options;

$token = $mk_options['tp_token'];
$marker = $mk_options['tp_marker'];
$limit =18;
$offset=0;

$customerIP =$_SERVER['REMOTE_ADDR'];

if($_REQUEST["action"]=="findSearchKey"){
	
  $Flights_Return_direct=$_REQUEST['Flights_Return_direct']; 
  $Flights_City_to_IATACOD=$_REQUEST['Flights_City_to_IATACODE']; 
  $Flights_City_From_IATACODE=$_REQUEST['Flights_City_From_IATACODE']; 
  
  $Flights_Start_Date = explode('-',$_REQUEST['Flights_Start_Date']);
  $Flights_Start_Date = $Flights_Start_Date[2].'-'.$Flights_Start_Date[0].'-'.$Flights_Start_Date[1];

  $Flights_End_Date = explode('-',$_REQUEST['Flights_End_Date']);
 $Flights_End_Date = $Flights_End_Date[2].'-'.$Flights_End_Date[0].'-'.$Flights_End_Date[1];
  
  $Flights_Adults=$_REQUEST['Flights_Adults']; 
  $Flights_Children=$_REQUEST['Flights_Children']; 
  $Flights_Infants=$_REQUEST['Flights_Infants']; 
  $Flights_Category_Economy=$_REQUEST['Flights_Category_Economy']; 
  $enable="enable"; 
  if($_REQUEST['Flights_Category_Economy']=="Economy"){
  $Flights_Category_Economy="Y";
  }
  else{
	$Flights_Category_Economy="C";  
  }

    if($Flights_Return_direct==$enable){
		
			 $t ='twc5.com:en:'.$marker.':'.$Flights_Adults.':'.$Flights_Children.':'.$Flights_Infants.':'.$Flights_Start_Date.':'.$Flights_City_to_IATACOD.':'.$Flights_City_From_IATACODE.':'.$Flights_Category_Economy.':'.$customerIP; 
			 $signature = md5($token .':' . $t );

			$URL = "http://api.travelpayouts.com/v1/flight_search";
			$paramsms = array('signature'=>$signature,
							  'marker'=>$marker,
							  'host'=>'twc5.com',
							  'user_ip'=>$customerIP,	
							  'locale'=>'en',
							  'trip_class'=>$Flights_Category_Economy,
							  'passengers'=>array('adults'=>$Flights_Adults,'children'=>$Flights_Children,'infants'=>$Flights_Infants),
							  'segments'=>array(array('origin'=>$Flights_City_From_IATACODE,'destination'=>$Flights_City_to_IATACOD,'date'=>$Flights_Start_Date))
							 );
							 
			   
			  $post =json_encode($paramsms);  
			  
//print_r($post); die;
    }
	//Round  
	
    else{
	
		$t ='twc5.com:en:'.$marker.':'.$Flights_Adults.':'.$Flights_Children.':'.$Flights_Infants.':'.$Flights_Start_Date.':'.$Flights_City_to_IATACOD.':'.$Flights_City_From_IATACODE.':'.$Flights_End_Date.':'.$Flights_City_From_IATACODE.':'.$Flights_City_to_IATACOD.':'.$Flights_Category_Economy.':'.$customerIP;
		$signature = md5($token .':' . $t );

		$params =array('host'=>'twc5.com',
				 'locale'=>'en',
				 'marker'=>$marker,
				 'adults'=>$Flights_Adults,
				 'children'=>$Flights_Children,
				 'infants'=>$Flights_Infants,
				 'date'=>$Flights_Start_Date,
				 'destination'=>$Flights_City_to_IATACOD,
				 'origin'=>$Flights_City_From_IATACODE,
				 'date'=>$Flights_End_Date,
				 'destination'=>$Flights_City_to_IATACOD,
				 'origin'=>$Flights_City_From_IATACODE,
				 'trip_class'=>$Flights_Category_Economy,
				 'user_ip'=>$customerIP
				);
				
		$URL = "http://api.travelpayouts.com/v1/flight_search";
		$params2 = array('signature'=>$signature,
				  'marker'=>$marker,
				  'host'=>'twc5.com',
				  'user_ip'=>$customerIP,	
				  'locale'=>'en',
				  'trip_class'=>$Flights_Category_Economy,
				  'passengers'=>array('adults'=>$Flights_Adults,'children'=>$Flights_Children,'infants'=>$Flights_Infants),
				  'segments'=>array(array('origin'=>$Flights_City_From_IATACODE,'destination'=>$Flights_City_to_IATACOD,'date'=>$Flights_Start_Date),
									array('origin'=>$Flights_City_to_IATACOD,'destination'=>$Flights_City_From_IATACODE,'date'=>$Flights_End_Date)
									)
				 );                  
				 
		$post =json_encode($params2);
	


		}

		$headers= array('Accept: application/json','Content-Type: application/json'); 
		$ch = curl_init($URL);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		curl_close($ch);
		//print_r($result);
	  //  die();
		$Obj =json_decode($result);

		echo $search_id =$Obj->search_id;
    }


if($_REQUEST["action"]=="Save_Flights"){
	
        $search_id =trim($_REQUEST['search_id']); 
		
		$URL ='http://api.travelpayouts.com/v1/flight_search_results?uuid='.$search_id;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $URL);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt( $ch, CURLOPT_ENCODING, 'gzip,deflate,sdch' );
	    $contents = curl_exec($ch);
	    curl_close ($ch);
	   
	    $jsonData =json_decode($contents,true);
		
		//$_SESSION['jsonData']=$jsonData;
		//$jsonData = $_SESSION['jsonData'];
		
	    $info =$jsonData;
		$contentsz = $contents;
      
	   for($i=0;$i<count($info);$i++){
		 $signature =$info[$i]['signature']; 
		 $city_distance =$info[$i]['city_distance']; 
		 $partner  =$info[$i]['partner']; 
		 $search_id =$info[$i]['search_id']; 
		 $meta_id =$info[$i]['meta']['gates'][0]['id'];
		 $meta_count =$info[$i]['meta']['gates'][0]['count'];
		 $uuid =$info[$i]['meta']['uuid'];
		 $gates_info =$info[$i]['gates_info']; 
		 $airlinesinfo =$info[$i]['airlines']; 

		foreach($airlinesinfo as $key =>$airlinesinfos){		
			$airlineskey=$key;
			$meals =json_encode($airlinesinfos['meals']);
			$pet =json_encode($airlinesinfos['pet']);
			$baggage =json_encode($airlinesinfos['baggage']);
			
			$wpdb->query("insert into airline_description SET airline='".$airlineskey."',
			pet='".addslashes($pet)."',meals='".addslashes($meals)."',baggage='".addslashes($baggage)."',search_id='".$search_id."',datetime='".date('Y-m-d H:i:s')."'");
		
		} 
		
		 foreach($gates_info as $key =>$gates_infoes){
		  $gates_info_id=$key; 
		  $agency_name=$gates_infoes['label'];  
		  $agency_currency_code=$gates_infoes['currency_code'];  
		  $agency_airline_iatas=$gates_infoes['airline_iatas'][0];  
		  $agency_rates=$gates_infoes['rates'];
		  if(is_array($gates_infoes['payment_methods'])){
		  $payment_methods= implode(',',$gates_infoes['payment_methods']);
		  }
		  else{
			 $payment_methods=$gates_infoes['payment_methods'];
		  }
		 }


		 $proposals =$info[$i]['proposals'];
	        
		 if(($meta_count >0) && count($proposals) ){
			 foreach($proposals as $proposal){
				  $terms =$proposal['terms'];
				foreach($terms as $key =>$termsurl){
					$termurl=$termsurl['url'];
				 
				 $onewayFlights =json_encode($proposal['segment'][0]['flight']);
				 $returnFlights =json_encode($proposal['segment'][1]['flight']);

				
					$departure_time=$proposal['segments_time'][0][0]; 
                    $departure_time=gmdate('H:i:s A', $departure_time); 
					
					$arrival_time=$proposal['segments_time'][0][1];
					$arrival_time=gmdate('H:i:s A', $arrival_time);
					
					$departure_time_return=$proposal['segments_time'][1][0];
					$departure_time_return=gmdate('H:i:s A', $departure_time_return);
					
					$arrival_time_return=$proposal['segments_time'][1][1];
					$arrival_time_return=gmdate('Hi:s A', $arrival_time_return);
					
					
				    $departfilter=$proposal['segments_time'][0][0]; 
					
  
					$arrivefilter=$proposal['segments_time'][0][1];
					
					$depart_return_filter=$proposal['segments_time'][1][0]; 
					
  
					$arrive_return_filter=$proposal['segments_time'][1][1];
					
				    $oneway_departure_time=$proposal['segments_time'][0][0]; 
					$oneway_departure_time=gmdate('h:i:s A', $oneway_departure_time); 
  
					$oneway_arrival_time=$proposal['segments_time'][0][1];
					$oneway_arrival_time=gmdate('h:i:s A', $oneway_arrival_time); 

					$return_departure_time=$proposal['segments_time'][1][0];
					$return_departure_time=gmdate('h:i:s A', $return_departure_time); 
					
					$return_arrival_time=$proposal['segments_time'][1][1];
					$return_arrival_time=gmdate('h:i:s A', $return_arrival_time); 
		
				 $sign =$proposal['max_stops'];
				 $segments_airports =$proposal['segments_airports'];
				 $origon_airport=$segments_airports[0][0];
				 $destination_airport=$segments_airports[0][1];
				 $is_direct =$proposal['is_direct'];
				 $total_duration =$proposal['total_duration'];
				 $min_stop_duration =$proposal['min_stop_duration'];
				 $max_stop_duration =$proposal['max_stop_duration'];
				 $validating_carrier =$proposal['validating_carrier'];
				 $total_duration =$proposal['total_duration'];
				
				 $total_duration =gmdate("h:i", ($total_duration * 60));
				 $max_stops =$proposal['max_stops'];
				 
				 
				 $price =$proposal['terms'][$meta_id]['price'];
				 $currency =$proposal['terms'][$meta_id]['currency'];
				 
				 $wpdb->query("insert into flight_results SET onewayFlights='".$onewayFlights."',
				 returnFlights='".$returnFlights."',price='".$price."',currency='".$currency."',
				 is_direct='".$is_direct."',sign='".$sign."',min_stop_duration='".$min_stop_duration."',
				 max_stop_duration='".$max_stop_duration."',validating_carrier='".$validating_carrier."',
				 max_stops='".$max_stops."',meta_id='".$meta_id."',meta_count='".$meta_count."',
				 signature='".$signature."',city_distance='".$city_distance."',origon_airport='".$origon_airport."',destination_airport='".$destination_airport."',search_id='".$search_id."',
				 uuid='".$uuid."',departure_time='".$departure_time."',arrival_time='".$arrival_time."',departfilter='".$departfilter."',arrivefilter='".$arrivefilter."',departure_time_return='".$departure_time_return."',arrival_time_return='".$arrival_time_return."',oneway_departure_time='".$oneway_departure_time."',oneway_arrival_time='".$oneway_arrival_time."',return_departure_time='".$return_departure_time."',return_arrival_time='".$return_arrival_time."',depart_return_filter='".$depart_return_filter."',arrive_return_filter='".$arrive_return_filter."',gates_info_id='".$gates_info_id."',agency_name='".$agency_name."',agency_currency_code='".$agency_currency_code."',agency_rates='".$agency_rates."',agency_airline_iatas='".$agency_airline_iatas."',payment_methods='".$payment_methods."',total_duration='".$total_duration."',termurl='".$termurl."',datetime='".date('Y-m-d H:i:s')."'");
				 
			 }
		 }
		 }
		 
	  }
	
	$iataSql= $wpdb->get_results("select distinct validating_carrier from flight_results  where search_id='".$search_id."'");
	$airData =array();
	$agency= array();
	$paymethods= array();
	$airbaggages= array();
	$origon_airport =array();
	$destination_airport =array();
	 foreach($iataSql as $iataObj){
		 $carrier=$iataObj->validating_carrier;
		
		 $recarriercount= "select  count(validating_carrier) as carriercount from flight_results where validating_carrier='".  $carrier."' and search_id='".$search_id."'"; 
		
		 $objrecarriercount =$wpdb->get_row($recarriercount);
		 $airObj = $wpdb->get_row("select name,iata from airlines  where iata='".$carrier."'"); 
		 $airData[] =array('iata'=>$airObj->iata,'name'=>$airObj->name,'carriercount'=>$objrecarriercount->carriercount); 
		}
		
		
		$agencysql= $wpdb->get_results("select distinct gates_info_id,agency_name from flight_results  where search_id='".$search_id."'");
		$agency= array();
	        foreach($agencysql as $agencyobj){
				$agencynum=$agencyobj->gates_info_id;
				$reagencycount= $wpdb->get_row("select  count(gates_info_id) as gatescount from flight_results where gates_info_id='".$agencynum."' and search_id='".$search_id."'"); 
	         	$objreagencycount =$reagencycount->gatescount;
		         $agency[] =array('id'=>$agencynum,'name'=>$agencyobj->agency_name,'gatescount'=>$objreagencycount->gatescount); 
			}

	$sql= "select count(id) as total, (select min(departure_time) from flight_results) as minrate,(select max(departure_time) from flight_results) as maxrate,(select MIN(arrival_time) from flight_results) as minarriverate,(select MAX(arrival_time) from flight_results) as maxarriverate,(select MIN(max_stop_duration) from flight_results) as min_stop_duration,(select MAX(max_stop_duration) from flight_results) as max_stop_duration from flight_results where search_id='".$search_id."'";
	   $obj = $wpdb->get_row($sql); 
	 
	   $pricemaxsql= "SELECT max(price) as maxprice FROM `flight_results` where search_id='".$search_id."'";
	   $pricemaxobj = $wpdb->get_row($pricemaxsql); 
	   
	   $paymethodql= $wpdb->get_results("SELECT distinct payment_methods FROM `flight_results` where search_id='".$search_id."'");
	   $paymentdata=array();
	   $paymentStr='';
	   foreach($paymethodql as $paymethobj){ 
			 $paymentStr.=$paymethobj->payment_methods.',';
	   }
	   $paymentdata =explode(",",$paymentStr);
	   $paymentdata =array_filter($paymentdata);
	   $paymetarray =array_unique($paymentdata);
	   

	   foreach($paymetarray as $payVal){
		
		$paymethodre= "select  count(payment_methods) as payment_methods_count from flight_results where payment_methods like '%".$payVal."%' and search_id='".$search_id."'"; 
		   $objpaymethod =$wpdb->get_row($paymethodre);
		   $payment_methods_count=$objpaymethod->payment_methods_count;
		   $paymethods[] =array('paymethod'=>$payVal,'payment_methods_count'=>$payment_methods_count); 
	   }
	
	   $priceminsql= "SELECT min(price) as minprice FROM `flight_results` where search_id='".$search_id."'";
	   $priceminobj = $wpdb->get_row($priceminsql); 
	   
	   $validating_carriersql= $wpdb->get_results("select distinct validating_carrier from flight_results where search_id='".$search_id."'");
	   
	   
	
	  foreach($validating_carriersql as $validating_carrierobj){
		 $validating_carrier=$validating_carrierobj->validating_carrier; 
		 
		 $baggageObj =$wpdb->get_row("select distinct baggage,airline from airline_description where airline='".$validating_carrier."' AND search_id='".$search_id."'");
		 $airlinename=$baggageObj->airline;
		 $airlinebaggage=json_decode($baggageObj->baggage);
		 
		 $airbaggages[$airlinename] =$airlinebaggage;
	  }
	  
	$stopesSql= $wpdb->get_results("select distinct max_stops from flight_results  where search_id='".$search_id."' ORDER BY max_stops ASC");
	  $stopages=array();
	 
	  foreach($stopesSql as $stopesObj){
		 $max_stops=$stopesObj->max_stops;
		$objresultsstop =$wpdb->get_row("select  count(max_stops) as maxstopcount from flight_results where max_stops='".$max_stops."' and search_id='".$search_id."'");
	    $maxstopcount=$objresultsstop->maxstopcount;
		$stopages[] =array('max_stops'=>$max_stops,'maxstopcount'=>$maxstopcount);   

	  }

	  $origon_airportsqlobj = $wpdb->get_row("select distinct origon_airport from flight_results where search_id='".$search_id."'"); 
	  $destination_airportsqlobj=$wpdb->get_row("select distinct destination_airport from flight_results   where search_id='".$search_id."'"); 

	  
	  $originObj = $wpdb->get_row("select name,code from airports  where code='".$origon_airportsqlobj->origon_airport."'"); 
	  $departObj = $wpdb->get_row("select name,code from airports  where code='".$destination_airportsqlobj->destination_airport."'"); 
	  
      $origon_airports[]=array('name'=>$originObj->name,'code'=>$originObj->code); 
	  
	  $destination_airports[]=array('name'=>$departObj->name,'code'=>$departObj->code); 
	  
	  
	  
	  $data =array('total'=>$obj->total,'minrate'=>$obj->minrate,'maxrate'=>$obj->maxrate,
	  'minprice'=>$priceminobj->minprice,'maxprice'=>$pricemaxobj->maxprice,
	  'minarriverate'=>$obj->minarriverate,'maxarriverate'=>$obj->maxarriverate,
	  'origon_airports'=>$origon_airports,'destination_airports'=>$destination_airports,
	  'min_stop_duration'=>$obj->min_stop_duration,'max_stop_duration'=>$obj->max_stop_duration,'payment_methods'=>$paymethods,'airData'=>$airData,'agency'=>$agency,'stopages'=>$stopages,'contentsz'=>$jsonData,'airbaggages'=>$airbaggages);
      echo json_encode($data);
	 
}

if($_REQUEST["action"]=="Show_Flights"){
	
	$limit =12;
	if(($_REQUEST["page"]<=1) || ($_REQUEST["page"]=='')){
		$page = 0;
	}else{
		$page = ( ($_REQUEST["page"]-1) * $limit);
		//$page = ($_REQUEST["page"] * $limit) + 1;
	}
  
  $search_id =trim($_REQUEST['search_id']); 
	$departFrom=$_REQUEST['departFrom'];
	$modeQuery ='';
	
	$orderby_val = $_REQUEST['orderby_val'];
	if($orderby_val == "true"){
		$orderby_val = "asc";
	}   else{
			$orderby_val = "desc";
		}

	if(($_REQUEST['stopage']!='') && ($_REQUEST['stopage']!=-1)){
		//$stopages =explode(",",$_REQUEST['stopage']);
		//$stopage =@implode(',',$stopages);
		
		$stopage =$_REQUEST['stopage'];
		 $modeQuery.= ' and max_stops IN('.$stopage.')'; 
	}
	
	
 	if($_REQUEST['price_filter']!=''){
		 $search_id=$_REQUEST['search_Session_Id'];
		$price_filter=$_REQUEST['price_filter'];
		$dExp =explode('-',$_REQUEST['price_filter']);
		$pricemin =$dExp[0];
		$pricesmax =$dExp[1];
		$modeQuery.= " AND (price >= ".$pricemin." AND price<=".$pricesmax.")";
	}  

	
    if($_REQUEST['time_slider']!=''){

		$departFrom=$_REQUEST['time_slider'];
		$dExp =explode('-',$_REQUEST['time_slider']);
	    $departTimefrom =date("H:i", strtotime($dExp[0]));
		$departTimeto =date("H:i", strtotime($dExp[1]));
		
		//echo $modeQuery.= " AND (departure_time between ".$departTimefrom." AND ".$departTimeto.") "; die;
		
		$modeQuery.= " AND ( departure_time >= '".$departTimefrom."' AND departure_time <='".$departTimeto."') "; 
	} 
	
 	
  if($_REQUEST['arrive_time_slider']!=''){
		$departFrom=$_REQUEST['arrive_time_slider'];
		$dExp =explode('-',$_REQUEST['arrive_time_slider']);
	    $arriveTimefrom =date("H:i", strtotime($dExp[0]));
		$arriveTimeto =date("H:i", strtotime($dExp[1]));
	    $modeQuery.= " AND (arrival_time >= '".$arriveTimefrom."' AND arrival_time <='".$arriveTimeto."')";
	} 
	
	
		
	if(($_REQUEST['airline']!='') && ($_REQUEST['airline']!=-1)) {
		$search_id=$_REQUEST['search_Session_Id'];
		//$airline=$_REQUEST['airline'];
		$airline =explode(",",$_REQUEST['airline']);


		//$modeQuery.= " AND  validating_carrier LIKE '$airline'";
	}
	
	
	
	if(count($airline)>0){
		
		$a=0;
		$modeQuery.= " and (";
		foreach($airline as $val){
			 $modeQuery.= " validating_carrier='".$val."'";
		     if($a<count($airline)-1){ $modeQuery.= " OR ";}	 
	     $a++;		 
		}	
		  $modeQuery.= " ) ";
	}
	

	if($_REQUEST['agency']!=''){
		$search_id=$_REQUEST['search_Session_Id'];
		$agency=$_REQUEST['agency'];
		$agency =explode(",",$_REQUEST['agency']);
		
	}
	
		
	if(count($agency)>0){
		
		$a=0;
		$modeQuery.= " and (";
		foreach($agency as $val){
			 $modeQuery.= " gates_info_id='".$val."'";
		     if($a<count($agency)-1){ $modeQuery.= " OR ";}	 
	     $a++;		 
		}	
		  $modeQuery.= " ) ";
		 
	}
	
	
	if(($_REQUEST['payment']!='') && ($_REQUEST['payment']!=-1)) {
		$search_id=$_REQUEST['search_Session_Id'];
		//$airline=$_REQUEST['airline'];
		$payment =explode(",",$_REQUEST['payment']);


		//$modeQuery.= " AND  validating_carrier LIKE '$airline'";
	}
	
	
	
	if(count($payment)>0){
		
		$a=0;
		$modeQuery.= " and (";
		foreach($payment as $val){
			 $modeQuery.= " payment_methods like '%".$val."%'";
		     if($a<count($payment)-1){ $modeQuery.= " OR ";}	 
	     $a++;		 
		}	
		  $modeQuery.= " ) ";
	}
	
	
	$orderBy='';
	
	if($_REQUEST['orderby_fild']=='price'){
		$orderBy =' order by price '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='airline'){
		$orderBy =' order by validating_carrier '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='duration'){
		$orderBy =' order by total_duration '.$orderby_val;
	}
	elseif($_REQUEST['orderby_fild']=='depart'){
		$orderBy =' order by departure_time '.$orderby_val;
	}

	else{
		$orderBy =' order by departure_time ASC';
	}

	$Objstotalcountfilter= $wpdb->get_row("select count(id) as totalcountfilter from flight_results where search_id='".$search_id."' ".$modeQuery." ".$orderBy."");
    $totalcount=$Objstotalcountfilter->totalcountfilter;  
	
   $query ="select * from flight_results where search_id='".$search_id."' ".$modeQuery." ".$orderBy." LIMIT ".$page.", $limit";
   $results =$wpdb->get_results($query);
	
	$flightData =array();
	if(count($results) >0){
	  foreach($results as $Objs){
        $onewayFlights =json_decode($Objs->onewayFlights);	
        $returnFlights =json_decode($Objs->returnFlights);	
     
         $bagObj =$wpdb->get_row("select baggage from airline_description where airline='".$Objs->validating_carrier."'",OBJECT);	
         $bagData = json_decode($bagObj->baggage);		 
		 
		$flightData['result'][] =array('totalcountfilter'=>$totalcount,'onewayFlights'=>$onewayFlights,'returnFlights'=>$returnFlights,'price'=>$Objs->price,'currency'=>$Objs->currency,'is_direct'=>$Objs->is_direct,'validating_carrier'=>$Objs->validating_carrier,'oneway_departure_time'=>$Objs->oneway_departure_time,'oneway_arrival_time'=>$Objs->oneway_arrival_time,'return_departure_time'=>$Objs->return_departure_time,'return_arrival_time'=>$Objs->return_arrival_time,'total_duration'=>$Objs->total_duration,'origon_airport'=>$Objs->origon_airport,'destination_airport'=>$Objs->destination_airport,'agency_name'=>$Objs->agency_name,'agency_currency_code'=>$Objs->agency_currency_code,'departfilter'=>$Objs->departfilter,'arrivefilter'=>$Objs->arrivefilter,'depart_return_filter'=>$Objs->depart_return_filter,'arrive_return_filter'=>$Objs->arrive_return_filter,'max_stops'=>$Objs->max_stops,'termurl'=>$Objs->termurl,'search_id'=>$Objs->search_id,'bagData'=>$bagData);	
	  }
	}
	echo json_encode($flightData); 
}

// Store Flight data for white labling
if($_REQUEST["action"]=="storeFlightData"){
	$_SESSION['FlightRequestData']= array('origin_name'=>$_REQUEST['origin_name'],
										  'origin_iata'=>$_REQUEST['origin_iata'],
										  'destination_name'=>$_REQUEST['destination_name'],
										  'destination_iata'=>$_REQUEST['destination_iata'],
										  'depart_date'=>$_REQUEST['depart_date'],
										  'return_date'=>$_REQUEST['return_date'],
										  'Flights_Return_direct'=>$_REQUEST['Flights_Return_direct'],
										  'with_request'=>$_REQUEST['with_request'],
										  'adults'=>$_REQUEST['adults'],
										  'children'=>$_REQUEST['children'],
										  'infants'=>$_REQUEST['infants'],
										  'trip_class'=>$_REQUEST['trip_class'],
										  'currency'=>$_REQUEST['currency'],
										  'locale'=>$_REQUEST['locale'],
										  'one_way'=>$_REQUEST['one_way'],
										  'ct_guests'=>$_REQUEST['ct_guests'],
										  'ct_rooms'=>$_REQUEST['ct_rooms']
										  );
	//print_R($_SESSION['FlightRequestData']);									  
}
if($_REQUEST["action"]=="setFlightCurrency"){
	$_SESSION['FlightRequestData']['currency']=$_REQUEST['currency'];
}


?>