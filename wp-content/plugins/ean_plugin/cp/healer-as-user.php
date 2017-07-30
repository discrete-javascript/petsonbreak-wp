<?php
	$Plugin_Path = dirname(__FILE__);
	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);
	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);
	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin/cp", "", $Include_Path_1);
	//echo $Include_Path_1;
	require_once($Include_Path_1.'wp-load.php');
	//require_once('D:\xampp\htdocs\marcus\wordpress\wp-load.php');
	global $wpdb;
	$Plugin_Path = dirname(__FILE__);
	$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";
	$pos = strpos($Plugin_URL, "prashant-pc");
	if($pos === false){
		$modules = str_replace("/cp", "", $Plugin_Path)."/xml/";
	}else{
		$modules = str_replace("\\cp", "", $Plugin_Path)."\\xml\\";
	}
	
	$PRO_URL = $Plugin_URL."/cp/";
	//$pass = wp_set_password( 'user_password', 1 );
	
if($_REQUEST["id"]==""){
	$SQL_user = "insert into wp_users set user_login='".$_REQUEST["file_name"]."', user_pass='".$_REQUEST["user_password"]."', user_nicename='".$_REQUEST["title"]."', user_email='".$_REQUEST["user_email"]."', user_url='".$_REQUEST["user_website"]."', user_registered=NOW(), user_activation_key='', user_status='0', display_name='".$_REQUEST["title"]."', twc_user_id='".$Unique_ID."'";
	$wpdb->query($SQL_user);
	$SQL_ID = "select ID from wp_users where twc_user_id='".$Unique_ID."'";
	$Results = $wpdb->get_results($SQL_ID);
	foreach ( $Results as $Result ){
		$ID = $Result->ID;
	}
	wp_set_password( $_REQUEST["user_password"], $ID );

	$SQL_user_meta1 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='first_name', meta_value='".$_REQUEST["title"]."'");
	$SQL_user_meta2 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='last_name', meta_value='".$_REQUEST["title"]."'");
	$SQL_user_meta3 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='nickname', meta_value='".$_REQUEST["title"]."'");
	$SQL_user_meta4 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='description', meta_value=''");
	$SQL_user_meta5 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='rich_editing', meta_value='true'");
	$SQL_user_meta6 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='comment_shortcuts', meta_value='false'");
	$SQL_user_meta7 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='admin_color', meta_value='fresh'");	
	$SQL_user_meta8 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='use_ssl', meta_value='0'");
	$SQL_user_meta9 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='show_admin_bar_front', meta_value='true'");
$SQL_user_meta10 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='wp_capabilities', meta_value='a:1:{s:6:\"author\";b:1;}'");
	$SQL_user_meta11 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='wp_user_level', meta_value='2'");
	$SQL_user_meta12 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='dismissed_wp_pointers', meta_value='wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media,wp360_revisions,wp360_locks'");
	$SQL_user_meta13 =$wpdb->query("insert into wp_usermeta set user_id='$ID', meta_key='wp_dashboard_quick_press_last_post_id', meta_value=''");
	
  /// MAIL //
  $mail_res_arr =$wpdb->get_results("select messages_content from  twc_messages where id='TWCY1380787688TWC524d25e84bac7' ");
  $mail_res =$mail_res_arr[0];
  $message =$mail_res->messages_content;
  $subject =$mail_res->title;
  $find_arr =array('{FirstName}','{UserName}','{Password}');
  $replace_arr =array($_REQUEST["title"],$_REQUEST["file_name"],$_REQUEST["user_password"]);

 $mail_body =str_replace($find_arr,$replace_arr,$message);
 $headers = "From: Greg Info <info@thewebconz.com>\r\nReply-To:info@thewebconz.com\r\nContent-type: text/html; charset=us scii";
 @mail($_REQUEST["user_email"],'Thank for Registration!', $mail_body, $headers);
}

if($_REQUEST["id"]!=""){
	$SQL_ID1 = "select ID from wp_users where twc_user_id='".$_REQUEST["id"]."'";
	$Results1 = $wpdb->get_results($SQL_ID1);
			foreach ( $Results1 as $Result1 ){
				$ID1 = $Result1->ID;
			}
	
	$SQL_user = "update  wp_users set user_login='".$_REQUEST["file_name"]."', user_pass='".$_REQUEST["user_password"]."', user_nicename='".$_REQUEST["title"]."', user_email='".$_REQUEST["user_email"]."', user_url='".$_REQUEST["user_website"]."', user_registered=NOW(), user_activation_key='', display_name='".$_REQUEST["title"]."' where user_status='0' and twc_user_id='".$_REQUEST["id"]."'";
	$wpdb->query($SQL_user);
	wp_set_password( $_REQUEST["user_password"], $ID1 );
	
	$SQL_user_metaupdate1 = $wpdb->query("update  wp_usermeta set meta_value='".$_REQUEST["title"]."' where user_id='".$ID1."' and meta_key='first_name'");
	$SQL_user_metaupdate2 = $wpdb->query("update  wp_usermeta set meta_value='".$_REQUEST["title"]."' where user_id='".$ID1."' and meta_key='last_name'");
	$SQL_user_metaupdate3 = $wpdb->query("update  wp_usermeta set meta_value='".$_REQUEST["title"]."' where user_id='".$ID1."' and meta_key='nickname'");
	$SQL_user_meta4 =$wpdb->query("update wp_usermeta set meta_value='a:1:{s:6:\"author\";b:1;}' where user_id='".$ID1."' and meta_key='wp_capabilities'");
		$SQL_user_meta5 =$wpdb->query("update wp_usermeta set meta_value='2' where user_id='".$ID1."' and meta_key='wp_user_level'");
		$SQL_user_meta6 =$wpdb->query("update wp_usermeta set meta_value='wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media,wp360_revisions,wp360_locks' where user_id='".$ID1."' and meta_key='dismissed_wp_pointers'");
}
?>