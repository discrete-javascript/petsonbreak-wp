<?php
include('../../../wp-load.php');
global $wpdb;
$action =$_REQUEST['action'];
if($action=='Location_Fetch'){
	
	$URLs_Fetch='http://yasen.hotellook.com/autocomplete?lang=en-US&limit=5&term='.$_REQUEST['term'];
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$URLs_Fetch);
	curl_setopt($ch,CURLOPT_ENCODING,'gzip');  // Needed by API
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$jsondata =json_decode($contents, true );
	$items =$jsondata['cities'];
	$data =array();
	foreach($items as $item){
	 $data[] =array('label'=>$item['fullname'],'category'=>'cities','class_Name'=>'', 'search_type'=>'regionid', 'regionid'=>$item['id'], 'lat'=>$item['location']['lat'], 'long'=>$item['location']['lon']);
	}
	echo json_encode($data);
	
}
if($_REQUEST['action']=='hotelFilter'){
    $q =trim(strtolower($_REQUEST['q'])); 
    $Sqls = "select EANHotelID,Name from search_results_ean where search_session='".trim($_REQUEST['search_id'])."' and LCASE(Name) Like '%".$q."%' and currency='".$_REQUEST['currency']."' limit 0, 10" ; 
    $resutls = $wpdb->get_results($Sqls);
	if(count($resutls)>0){
		foreach($resutls as $Objs){
		   $data[]=array('EANHotelID'=>$Objs->EANHotelID,'Name'=>$Objs->Name);
		}
    $Data=json_encode($data);
	}else{
	 $Data='';	
	}	
   echo $Data;
}

if($_REQUEST['action']=='makeFavourate'){
	$relType =$_REQUEST['relType'];
	$c_results =$wpdb->get_results("select * from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	if((count($c_results)==0) && ($relType=='favourate')){
		$results =$wpdb->get_results("select * from search_results_ean where EANHotelID='".$_REQUEST['hotelID']."' limit 1");
		$Objss=$results[0];
		$wpdb->query("insert into favourite set EANHotelID='".$Objss->EANHotelID."', Name='".addslashes($Objss->Name)."', Address1='".$Objss->address1."', Address2='', City='".$Objss->city."', Country='".$Objss->countryCode."', StarRating='".$Objss->hotelRating."', LowRate='".$Objss->lowRate."', highRate='".$Objss->highRate."',discount='".$Objss->discount_price."',latitude='".$Objss->latitude."',longitude='".$Objss->longitude."',guestRating='".$Objss->confidenceRating."', promoDescription='".$Objss->promoDescription."',thumbNailUrl='".$Objss->thumbNailUrl."',user_id='".$_REQUEST['userID']."'");
       $flag=1;		
	}
	else if((count($c_results)>0) && ($relType=='unfavourate')){
	  $wpdb->query("delete from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	   $flag=1;		
	}
	else{
		$flag=0;
	}
	echo $flag;
}

if($_REQUEST['action']=='checkFavourate'){
	$c_results =$wpdb->get_results("select * from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	if(count($c_results)>0){$flag=1;}
	else{$flag=0;}
	echo $flag;
}

if($_REQUEST['action']=='changeCountry'){
	$countryCode =trim($_REQUEST['countryCode']);
	$stateLists =array('US'=>array('AL'=>'Alabama',
	                              'AK'=>'Alaska',
								  'AS'=>'American Samoa',
								  'AZ'=>'Arizona',
								  'AR'=>'Arkansas',
								  'AA'=>'Armed Forces Americas excluding Canada',
								  'AE'=>'Armed Forces EMEA and Canada',
								  'AP'=>'Armed Forces Pacific',
								  'CA'=>'California',
								  'CO'=>'Colorado',
								  'CT'=>'Connecticut',
								  'DE'=>'Delaware',
								  'DC'=>'District of Columbia',
								  'FM'=>'Federated States of Micronesia',
								  'FL'=>'Florida',
								  'GA'=>'Georgia',
								  'GU'=>'Guam',
								  'HI'=>'Hawaii',
								  'ID'=>'Idaho',
								  'IL'=>'Illinois',
								  'IN'=>'Indiana',
								  'IA'=>'Iowa',
								  'KS'=>'Kansas',
								  'KY'=>'Kentucky',
								  'LA'=>'Louisiana',
								  'ME'=>'Maine',
								  'MH'=>'Marshall Islands',
								  'MD'=>'Maryland',
								  'MA'=>'Massachusetts',
								  'MI'=>'Michigan',
								  'MN'=>'Minnesota',
								  'MS'=>'Mississippi',
								  'MO'=>'Missouri',
								  'MT'=>'Montana',
								  'NE'=>'Nebraska',
								  'NV'=>'Nevada',
								  'NH'=>'New Hampshire',
								  'NJ'=>'New Jersey',
								  'NM'=>'New Mexico',
								  'NY'=>'New York',
								  'NC'=>'North Carolina',
								  'ND'=>'North Dakota',
								  'MP'=>'Northern Mariana Islands',
								  'OH'=>'Ohio',
								  'OK'=>'Oklahoma',
								  'OR'=>'Oregon',
								  'PA'=>'Pennsylvania',
								  'PR'=>'Puerto Rico',
								  'RI'=>'Rhode Island',
								  'SC'=>'South Carolina',
								  'SD'=>'South Dakota',
								  'TN'=>'Tennessee',
								  'TX'=>'Texas',
								  'UT'=>'Utah',
								  'VT'=>'Vermont',
								  'VI'=>'Virgin Islands',
								  'VA'=>'Virginia',
								  'WA'=>'Washington',
								  'WV'=>'West Virginia',
								  'WI'=>'Wisconsin',
								  'WY'=>'Wyoming'),
	      'AU'=>array('AC'=>'Australian Capital',
					   'NW'=>'New South Wales',
					   'NO'=>'Northern Territory',
					   'QL'=>'Queensland',
					   'SA'=>'South Australia',
					   'TS'=>'Tasmania',
					   'VC'=>'Victoria',
					   'WT'=>'Western Australia'
					   )
	 
	       
	);
	
	 $selectedState =$stateLists[$countryCode];
	 $html='';
	 if($countryCode=='US' || $countryCode=='AU'){
		 foreach($selectedState as $k=>$val){
			$html.='<option value="'.$k.'">'.$val.'</option>';
		  }	
	 }
	 echo $html;
}
?>