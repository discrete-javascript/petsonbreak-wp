<?php

//Simplr Registration Form
$simplr_enabled			  = get_option('mo_customer_validation_simplr_default_enable') ? "checked" : "";
$simplr_hidden			  = $simplr_enabled=="checked" ? "" : "hidden";
$simplr_enabled_type  	  = get_option('mo_customer_validation_simplr_enable_type');
$simplr_fields_page       = admin_url().'options-general.php?page=simplr_reg_set&regview=fields&orderby=name&order=desc';
$page_list 				  = admin_url().'edit.php?post_type=page';
$simplr_field_key  		  = get_option('mo_customer_validation_simplr_field_key');

include MOV_DIR . 'views/forms/simplr-registration.php';