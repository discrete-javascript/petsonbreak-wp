<?php 
$Plugin_Path = dirname(__FILE__);

include($Plugin_Path."/functions.php");

$action = $_REQUEST["action"];

if($action=="sign_In_me"){
	sign_In_me($_REQUEST["emailaddress"],$_REQUEST["textspassword"]);
}

if($action=="resend_email_verification_done"){
	resend_email_verification_done($_REQUEST["userids"]);
}

if($action=="email_verification_done"){
	email_verification_done();
}

if($action=="register_me"){
	register_me($_REQUEST["gender"],$_REQUEST["fullname"],$_REQUEST["emails"],$_REQUEST["passwords"],$_REQUEST["termscondition"]);
}
?>