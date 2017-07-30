<?php

	//wc default registration
	$woocommerce_registration = get_option('mo_customer_validation_wc_default_enable')  ? "checked" : "";
	$wc_hidden 				  = $woocommerce_registration=="checked" ? "" : "hidden";
	$wc_enable_type			  = get_option('mo_customer_validation_wc_enable_type');

	include MOV_DIR . 'views/forms/woocommerce-registration.php';