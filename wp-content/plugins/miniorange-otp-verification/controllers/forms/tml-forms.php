<?php

//Theme my login form
$tml_enabled      = get_option('mo_customer_validation_tml_enable')? "checked" : "";
$tml_hidden 	  = $tml_enabled == "checked" ? "" : "hidden";
$tml_enable_type  = get_option('mo_customer_validation_tml_enable_type');

include MOV_DIR . 'views/forms/tml-forms.php';