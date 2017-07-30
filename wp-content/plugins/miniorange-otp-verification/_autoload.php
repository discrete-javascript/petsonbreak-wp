<?php

	//Include all required files for plugin to work.
	require_once 'includes/lib/encryption.php';
	require_once 'handler/miniorange_admin_actions.php';
	require_once 'handler/miniorange_logic_interface.php';
	require_once 'handler/miniorange_phone_logic.php';
	require_once 'handler/miniorange_email_logic.php';
	require_once 'handler/registration.php';

	includeFile('/helper');

	require_once 'handler/forms/FormInterface.php';

	includeFile('/handler/forms');

	require_once 'handler/miniorange_form_handler.php';

	require_once 'views/common-elements.php';

	function includeFile($folder){
		foreach (scandir(dirname(__FILE__).$folder) as $filename) {
		    $path = dirname(__FILE__) . $folder . '/' . $filename;
		    if (is_file($path)) {
		        require_once $path;
		    }elseif(is_dir($path) && $filename!="" && $filename!="." && $filename!=".."){
		    	includeFile($folder . '/' . $filename);
		    }
		}
	}
