<?php

	$registerd 		= MoUtility::micr();
	$plan       	= MoUtility::micv();
	$disabled  	 	= !$registerd ? "disabled" : "";
	$current_user 	= wp_get_current_user();
	$email 			= get_option("mo_customer_validation_admin_email");
	$phone 			= get_option("mo_customer_validation_admin_phone");
	$controller 	= MOV_DIR . 'controllers/';

	include $controller . 'navbar.php';

	if(isset( $_GET[ 'page' ]))
	{
		switch($_GET['page'])
		{
			case 'mosettings':
				include $controller . 'settings.php';			break;
			case 'messages':
				include $controller . 'messages.php';			break;
			case 'otpaccount':
				include $controller . 'account.php';			break;
			case 'help':
				include $controller . 'help.php';			    break;
			case 'pricing':
				include $controller . 'pricing.php';			break;
			case 'config':
				include $controller . 'configuration.php';		break;
			case 'custom':
				include $controller . 'customSMS.php';			break;
			case 'otpsettings':
				include $controller . 'otpsettings.php';		break;
		}

		if($_GET['page']!="pricing")
			include $controller . 'support.php';
	}
