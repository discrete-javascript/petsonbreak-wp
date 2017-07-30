<?php

//Reales WP Theme
$reales_enabled      	= get_option('mo_customer_validation_reales_enable')? "checked" : "";
$reales_hidden 	  		= $reales_enabled == "checked" ? "" : "hidden";
$reales_enable_type  	= get_option('mo_customer_validation_reales_enable_type');

include MOV_DIR . 'views/forms/reales-theme.php';