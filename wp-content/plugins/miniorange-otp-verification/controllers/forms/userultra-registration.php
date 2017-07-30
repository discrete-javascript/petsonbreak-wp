<?php

//uultra registration
$uultra_enabled           = get_option('mo_customer_validation_uultra_default_enable')? "checked" : "";
$uultra_hidden 			  = $uultra_enabled == "checked" ? "" : "hidden";
$uultra_enable_type		  = get_option('mo_customer_validation_uultra_enable_type');
$uultra_form_list 		  = admin_url().'admin.php?page=userultra&tab=fields';
$uultra_field_key    	  = get_option('mo_customer_validation_uultra_phone_key');

include MOV_DIR . 'views/forms/userultra-registration.php';