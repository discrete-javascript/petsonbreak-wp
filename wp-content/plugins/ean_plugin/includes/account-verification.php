<?php
require_once('/home8/webconzc/public_html/demo/dating/wp-load.php');
global $wpdb;
$wpdb->query("update twc_registered_users set  published='Yes' where id='".base64_decode($_REQUEST['Id'])."'");
header("Location:http://webconz.com/demo/dating/?msg=success");
?>