	<?php

	$Plugin_Path = dirname(__FILE__);
	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);
	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);
	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin", "", $Include_Path_1);
	require_once($Include_Path_1."/wp-load.php");
	global $wpdb;
	$Get_Path = "SELECT option_value as siteurl FROM wp_options where option_name='siteurl'";
	$Results = $wpdb->get_results($Get_Path);
	foreach ( $Results as $Result ){
		$siteurl = $Result->siteurl;
	}
	
 $SQL = "SELECT sort_order  FROM twc_comments where status_deleted=0 order by sort_order desc limit 0, 1";
	$Resultss = $wpdb->get_results($SQL);
	
	foreach ( $Resultss as $Result ){
		$sort_order = $Result->sort_order;
	}
	$sort_order++;
		
$UserCommentsUniqIds = uniqid();

$wpdb->query("insert into  twc_comments set  id='".$UserCommentsUniqIds."' , title='".$_REQUEST['full_name']."', hotel_id='".$_REQUEST['hotelid']."' , descriptions='".$_REQUEST['suggestions']."', user_rating='".$_REQUEST['user_rating']."', emailaddress='".$_REQUEST['email_address']."', published='No', sort_order='".$sort_order."', date_time=NOW(), status_deleted='0'");

$Get_Hotel_Name = "SELECT title FROM twc_hotel_info where id='".$_REQUEST['hotelid']."'";
	$Results_Hotel_Name = $wpdb->get_results($Get_Hotel_Name);
	foreach ( $Results_Hotel_Name as $Results_Hotel_Name ){
		$title = $Results_Hotel_Name->title;
	}
	
	$Get_option_name = "SELECT option_value FROM wp_options where option_name='admin_email'";
	$Results_option_name = $wpdb->get_results($Get_option_name);
	foreach ( $Results_option_name as $Results_option_name ){
		$option_value = $Results_option_name->option_value;
	}

$sql = "select * from twc_messages where published='Yes' and status_deleted='0' and id='TWCT1373378704TWC51dc18905f0e2'";
	$Results = $wpdb->get_results($sql, ARRAY_N);

for($ct=0; $ct<count($Results); $ct++){
$str = $Results[$ct][2]; 
$str = str_replace("{hotel}", $title , $str);
$str = str_replace("{name}", $_REQUEST['full_name'] , $str);
$str = str_replace("{email}", $_REQUEST['email_address'] , $str);
$str = str_replace("{suggetions}", $_REQUEST['suggestions'] , $str);
$str = "<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px;'>".$str."</div>";
$headers = "From: TheWebConz <support@thewebconz.com>\r\nReply-To:support@thewebconz.com\r\nContent-type: text/html; charset=us scii";
	@mail($option_value,$Results[$ct][1], $str, $headers);
}	
	
?>