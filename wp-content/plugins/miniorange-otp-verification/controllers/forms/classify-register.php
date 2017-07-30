<?php

//Classify theme Register Forms 
$classify_enabled 		 = get_option('mo_customer_validation_classify_enable') ? "checked" : "";
$classify_hidden 		 = $classify_enabled== "checked" ? "" : "hidden";
$classify_enabled_type 	 = get_option('mo_customer_validation_classify_type');
$page_list 				 = admin_url().'edit.php?post_type=page';

include MOV_DIR . 'views/forms/classify-register.php';