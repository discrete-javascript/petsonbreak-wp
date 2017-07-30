<?php

    

	global $wpdb;

	$modules = $Plugin_Path."/xml/";

	

	$handle=opendir($modules);

	while ($file = readdir($handle)){

		if ($file != "." && $file != ".."){

			$fn = $modules."/".$file;

			$doc = new DOMDocument();

			$doc->load($fn);

			$items = $doc->getElementsByTagName("Response");

			foreach( $items as $item ){ 

			

			$nodename = $item->getElementsByTagName("table_name");

			$table_name = $nodename->item(0)->nodeValue;

			

			$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (";

			$total_number_of_fields = $doc->getElementsByTagName("fields")->length; 

			$sql .= "`id` text NOT NULL,";

			for($i=0; $i<=$total_number_of_fields-1; $i++){

			$nodename = $doc->getElementsByTagName("fields");

			$fieldname = $nodename->item($i)->getAttribute('name');

			$datatype = $nodename->item($i)->getAttribute('datatype');

			

			// If Fieldset Is On

			if($fieldname!="fieldset"){

			$sql .= "`$fieldname` $datatype NOT NULL,";

			}

			// End If Fieldset Is On

			}

			$sql .=" `date_time` datetime NOT NULL, `status_deleted` INT NOT NULL";

			$sql .=")ENGINE=MyISAM DEFAULT CHARSET=latin1";

			

			global $wpdb;		

			$wpdb->query($sql);
			

			}

		}

	}

	

				
		/*$wp_Query = "INSERT INTO twc_messages (id, title, messages_content, published, excluded, sort_order, date_time, status_deleted) VALUES ('TWCT1373378704TWC51dc18905f0e2', 'Comment Message to Admin', '<p>Hi,</p>\r\n<p>A User has given comments for the {hotel} Hotel.</p>\r\n<p>User Info:</p>\r\n<p>Name: {name}</p>\r\n<p>E-Mail: {email}</p>\r\n<p>Suggetion: {suggetions}</p>', 'Yes', 'No', '1', '2013-07-09 08:05:04', 0), ('TWCT1373379522TWC51dc1bc26913d', 'Comment submitted successfully', 'Your comment has been submitted sucessfully. Waiting for approval.', 'Yes', 'No', '2', '2013-07-09 08:18:42', 0);
";

		$wpdb->query($wp_Query);*/
		
			
		

		closedir($handle);

		

		

		

		

?>