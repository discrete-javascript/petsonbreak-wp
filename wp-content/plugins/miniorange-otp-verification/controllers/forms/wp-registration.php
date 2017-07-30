<?php

//WP default Registration form
$default_registration 	  = get_option('mo_customer_validation_wp_default_enable')  ? "checked" : "";
$wp_default_hidden		  = $default_registration== "checked" ? "" : "hidden";
$wp_default_type		  = get_option('mo_customer_validation_wp_default_enable_type');
include MOV_DIR . 'views/forms/wp-registration.php';