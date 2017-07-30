<?php

//crf registration
$crf_enabled 			  = get_option('mo_customer_validation_crf_default_enable') ? "checked" : "";
$crf_hidden  			  = $crf_enabled== "checked" ? "" : "hidden";
$crf_enable_type		  = get_option('mo_customer_validation_crf_enable_type');
$crf_form_list  		  = admin_url().'admin.php?page=rm_form_manage';
$crf_phone_field_key 	  = get_option('mo_customer_validation_crf_phone_key');
$crf_email_field_key 	  = get_option('mo_customer_validation_crf_email_key');

include MOV_DIR .'views/forms/registrationmagic.php';