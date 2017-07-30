<?php session_start();

	$Plugin_Path = dirname(__FILE__);
	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);
	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);
	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin/cp", "", $Include_Path_1);
	//echo $Include_Path_1;
	require_once($Include_Path_1.'wp-load.php');
	//require_once('D:\xampp\htdocs\dating\wp-load.php');

	
	global $wpdb;
	$Plugin_Path = dirname(__FILE__);
	
	$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";
	//echo $Plugin_URL;

	$pos = strpos($Plugin_URL, "localhost");
	if($pos === false){
		$modules = str_replace("/cp", "", $Plugin_Path)."/xml/";
	}else{
		$modules = str_replace("\\cp", "", $Plugin_Path)."\\xml\\";
	}
	
	
	
	$PRO_URL = $Plugin_URL."/cp/";
	
	//echo $PRO_URL;
	
	
		$doc = new DOMDocument();
		$doc->load($_REQUEST["fn"]);
		$items = $doc->getElementsByTagName("Response");
		
			foreach( $items as $item ){ 
				$nodename = $item->getElementsByTagName("title_of_page");
				$title_of_page = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("id");
				$id_tab = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("caption_of_button");
				$caption_of_button = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("title_of_table");
				$title_of_table = $nodename->item(0)->nodeValue;
				$total_number_of_fields = $item->getElementsByTagName("fields");
				$nodename = $item->getElementsByTagName("table_name");
				$table_name = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("manage_page_field_list");
				$manage_page_field_list = $nodename->item(0)->nodeValue;
				
				$nodename = $item->getElementsByTagName("img_displayed");
				$img_displayed = $nodename->item(0)->nodeValue;
				
				$nodename = $item->getElementsByTagName("small_img_folder_path");
				$small_img_folder_path = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("large_img_folder_path");
				$large_img_folder_path = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("sort_order_displayed");
				$sort_order_displayed = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("exclude_publish");
				$exclude_publish = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("exclude_sort_order");
				$exclude_sort_order = $nodename->item(0)->nodeValue;
				
			}
			$total_number_of_fields = $doc->getElementsByTagName("fields")->length;  
			
			for($i=0; $i<=$total_number_of_fields-1; $i++){
				$nodename = $doc->getElementsByTagName("fields");
				$fieldname = $nodename->item($i)->getAttribute('name');
				$type = $nodename->item($i)->getAttribute('type');
				//$original_image_path = $nodename->item($i)->getAttribute('original_image_path');
				$datatype = $nodename->item($i)->getAttribute('datatype');
		        $label = $nodename->item($i)->getAttribute('label');
				//echo $fieldname;
			}
			
			
			if($manage_page_field_list!="") { 
			$a = ",";
			}
			else {
			$a = "";
			}
			
			$sql = "select  *";
			if($img_displayed!=""){ $sql .= ", ".$img_displayed; }
			
			$sql .= " from ".$table_name." where status_deleted=0 and published='Yes'";
			
			$sql .= " order by date_time desc";	
			//echo $sql; 
			$Results = $wpdb->get_results($sql, ARRAY_N);
   $contents="Sr No., Title, E-Mail Address, Phone No., Requirements, Date Time\n";
			for($ct=0; $ct<count($Results); $ct++){
			$cOUnteR++;
	        $contents .= $cOUnteR.",";
			$contents .= str_replace(',', '\,', stripslashes($Results[$ct][1])).",";
			$contents .= str_replace(',', '\,', stripslashes($Results[$ct][2])).",";
			$contents .= str_replace(',', '\,', stripslashes($Results[$ct][3])).",";
			$contents .= str_replace(',', '\,', stripslashes($Results[$ct][4])).",";
			$contents .= str_replace(',', '\,', date("Y-m-d H:i:s",strtotime($Results[$ct][6]))).",";
	        $contents .= "\n";
			
			}

	Header("Content-Disposition: attachment; filename=".date("Y-m-d").".csv");	
	print $contents;
			?>