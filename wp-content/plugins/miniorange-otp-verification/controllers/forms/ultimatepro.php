<?php

//ultimatePRO registration form
$ultipro_enabled 		 = get_option('mo_customer_validation_ultipro_enable') ? "checked" : "";
$ultipro_hidden 		 = $ultipro_enabled== "checked" ? "" : "hidden";
$ultipro_enabled_type 	 = get_option('mo_customer_validation_ultipro_type');
$umpro_custom_field_list = admin_url().'admin.php?page=ihc_manage&tab=register&subtab=custom_fields';

include MOV_DIR . 'views/forms/ultimatepro.php';
