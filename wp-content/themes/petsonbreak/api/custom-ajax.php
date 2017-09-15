<?php
if($_REQUEST['action']=='agencyLink'){
    $search_id =$_REQUEST['search_id'];
    $termurl =$_REQUEST['termurl']; 
	 $URL="http://api.travelpayouts.com/v1/flight_searches/$search_id/clicks/$termurl.json";
    $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $URL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt( $ch, CURLOPT_ENCODING, 'gzip,deflate,sdch' );
			$content = curl_exec($ch);
			curl_close ($ch);
				  
			$agencylink =json_decode($content,true);
		    echo $termurl=$agencylink['url'];
}

if($_REQUEST['action']=='autoSuggetionLookup'){
  $term =$_REQUEST['term'];
  if($_REQUEST['locale']==''){
  $locale =$_REQUEST['locale'];
  }else{
	$locale ='en_US';
  } 
  $URLs_Fetch ="https://lookup.hotels.com/2/suggest/v1.3/json?locale=".$locale."&boostConfig=config-boost-8&excludeLpa=false&callback=srs&query=".$term;
  $ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$URLs_Fetch);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');  // Needed by API
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$contents = curl_exec($ch);
curl_close ($ch);

$findArr =array('srs({','});');
$replaceArr =array('{','}');
$contents =str_replace($findArr,$replaceArr,$contents );
$contents ='['.$contents.']';
//$jsondata =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $contents ), true );
$jsondata =json_decode($contents, true );
$items =$jsondata[0]['suggestions'];
//$items =$jsondata['srs'];
//print_r($items);
$data =array();
foreach($items as $item)
{
  $group =$item['group'];
  if($group=='CITY_GROUP'){$category='cities';}
  if($group=='LANDMARK_GROUP'){$category='landmarks';}
  if($group=='TRANSPORT_GROUP'){$category='airports';}
  if($group=='HOTEL_GROUP'){$category='hotels';}
  
  $entities =$item['entities'];
  foreach($entities as $entity){
   //$data[] =array('label'=>strip_tags($entity['caption']),'category'=>$category,'class_Name'=>strtolower($category), 'search_type'=>'regionid', 'regionid'=>$entity['destinationId'], 'lat'=>$entity['latitude'], 'longi'=>$entity['longitude'],'id'=>$entity['destinationId']);
   $data[$category][] =array('latinFullName'=>strip_tags($entity['caption']),'category'=>$category,'class_Name'=>strtolower($category), 'search_type'=>'regionid', 'regionid'=>$entity['destinationId'], 'lat'=>$entity['latitude'], 'lon'=>$entity['longitude'],'id'=>$entity['destinationId']);
  }
}

$datastr =json_encode($data);
echo $datastr;
	
}
?>
