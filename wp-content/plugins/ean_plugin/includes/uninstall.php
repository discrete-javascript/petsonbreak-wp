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
			
			$structure = "drop table if exists $table_name";
   			$wpdb->query($structure);  
			global $wpdb;		
			$wpdb->query($sql);
				
			}
		}
	}
	closedir($handle);

?>