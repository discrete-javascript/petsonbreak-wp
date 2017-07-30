<?php session_start();
include ('../../../../wp-load.php');
global $wpdb;

if($_REQUEST['action']=='deleteHotelFile'){
  $wpdb->query("delete from twc_hotel_gallery where id='".$_REQUEST['id']."'");
}
?>