<?php

//pie registration
$pie_enabled 			  = get_option('mo_customer_validation_pie_default_enable') ? "checked" : "";
$pie_hidden 			  = $pie_enabled== "checked" ? "" : "hidden";
$pie_enable_type		  = get_option('mo_customer_validation_pie_enable_type');
$pie_field_key    	 	  = get_option('mo_customer_validation_pie_phone_key');

include MOV_DIR . 'views/forms/pie-registration.php';