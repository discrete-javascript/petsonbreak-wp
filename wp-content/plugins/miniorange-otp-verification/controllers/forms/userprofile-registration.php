<?php

//upme registration
$upme_enabled 			  = get_option('mo_customer_validation_upme_default_enable') ? "checked" : "";
$upme_hidden 			  = $upme_enabled== "checked" ? "" : "hidden";
$upme_enable_type		  = get_option('mo_customer_validation_upme_enable_type');
$upme_field_list 		  = admin_url().'admin.php?page=upme-field-customizer';
$upme_field_key    	 	  = get_option('mo_customer_validation_upme_phone_key');

include MOV_DIR . 'views/forms/userprofile-registration.php';