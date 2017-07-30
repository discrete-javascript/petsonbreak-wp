<?php session_start();
require_once('../../../../wp-load.php');

global $wpdb;

$tbl =$_REQUEST['tbl'];

if($_REQUEST['action']=='export')
{
	if($tbl=='twc_tours')
	{
		$results =$wpdb->get_results("select id,title,file_name,nights,StarRating,LowRate,Address,shortDescription,destinations,inclusions,exclusions,themes,img_path1,
		img_path2,img_path3,img_path4,published,sort_order,date_time,status_deleted from ".$tbl." order by date_time DESC limit 2");
	}else{
		$results =$wpdb->get_results("select * from ".$tbl." order by date_time DESC");
	}
	
	$json_data='';
	if(count($results)>0){
	  $json_data =json_encode($results);
      $find_Arr= array("&amp;","&","\\","'");
	  $replace_Arr= array("~","~","","");
	  $json_data =str_replace($find_Arr,$replace_Arr,$json_data);
	  
	  
	}
  echo $json_data;
  die;
}

if($_REQUEST['action']=='import')
{
	  $find_Arr= array('~');
	  $replace_Arr= array('&');
	  $fielddata =str_replace($find_Arr,$replace_Arr,$_REQUEST['fielddata']);
	
	  $tempData = stripslashes($fielddata);
	  $cleanData =json_decode($tempData,true);
	  $flag=0;
	
	 foreach($cleanData as $getkey=>$getData){
         if(is_array($getData)){
			 $makeQuery ='';
			 foreach($getData as $key=>$val){
				$makeQuery.="$key='".$val."',";
			 }
			 $query =substr($makeQuery,0,-1);
			 $makeQuery='';
			 $sql ="insert into ".$tbl." set ".$query;
			 $wpdb->query($sql);
		 }
	 }
	 $flag=1;
	 echo  $flag;
}

?>

