<?php

//cf7 form
$cf7_enabled 			  = get_option('mo_customer_validation_cf7_contact_enable') ? "checked" : "";
$cf7_hidden 			  = $cf7_enabled== "checked" ? "" : "hidden";
$cf7_enabled_type 		  = get_option('mo_customer_validation_cf7_contact_type');
$cf7_field_list 		  = admin_url().'admin.php?page=wpcf7';
$cf7_field_key 			  = get_option('mo_customer_validation_cf7_email_key');

include MOV_DIR . 'views/forms/cf7.php';