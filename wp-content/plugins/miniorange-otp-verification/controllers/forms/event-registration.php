<?php

//event registration
$event_enabled 			  = get_option('mo_customer_validation_event_default_enable') ? "checked" : "";
$event_hidden			  = $event_enabled=="checked" ? "" : "hidden";
$event_enabled_type 	  = get_option('mo_customer_validation_event_enable_type');

include MOV_DIR . 'views/forms/event-registration.php';