<?php



	$Plugin_Path = dirname(__FILE__);



	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);



	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);



	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);



	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);



	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin/cp", "", $Include_Path_1);



	//echo $Include_Path_1;



	require_once($Include_Path_1.'wp-load.php');



	//require_once('D:\xampp\htdocs\dating\wp-load.php');



	///require_once('D:\xampp\htdocs\dating\wp-load.php');







	global $wpdb;



	$Plugin_Path = dirname(__FILE__);



	



	$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";



	



	



	$pos = strpos($Plugin_URL, "localhost");



	if($pos === false){



		$modules = str_replace("/cp", "", $Plugin_Path)."/xml/";



	}else{



		$modules = str_replace("\\cp", "", $Plugin_Path)."\\xml\\";



	}



	



	$PRO_URL = $Plugin_URL."/cp/";



	$handle=opendir($modules);



	while ($file = readdir($handle)){



		if ($file != "." && $file != ".."){



			$fn = $modules."/".$file;



			$doc = new DOMDocument();



			$doc->load($fn);



			$items = $doc->getElementsByTagName("Response");



			foreach( $items as $item ){ 



				$nodename = $item->getElementsByTagName("id");



				$id = $nodename->item(0)->nodeValue;



				if($id==$_REQUEST["page"]){



					$XML_File_Name = $fn;



				}



			}



		}



	}



	closedir($handle);



	



if($_REQUEST["action"]=="Populate_search_id"){



	Populate_search_id($_REQUEST["cri"], $_REQUEST["fn"])	;



}



function Populate_search_id($cri, $fn){



	$oEasyDBPoolcl = new EasyDBPoolcl();



	



	$fn = "xml/xml_config.xml";



	$doc = new DOMDocument();



	$doc->load($XML_File_Name);



	$items = $doc->getElementsByTagName("Response");



		foreach( $items as $item ){ 



			$nodename = $item->getElementsByTagName("table_name");



			$table_name = $nodename->item(0)->nodeValue;







			$nodename = $item->getElementsByTagName("manage_page_field_list");



			$manage_page_field_list = $nodename->item(0)->nodeValue;



			



		}



	$Flds = explode(",", $manage_page_field_list);



	



	$SQL =  "select distinct ".$Flds[1]." as title_to_search, ".$Flds[0]." as id_to_search from ".$table_name." where status_deleted='0' and ".$Flds[1]." like '%".$cri."%' LIMIT 0, 10";



	//echo $SQL;



	$Results = $wpdb->get_results($SQL);



	



	if($Results==0){



		$Msg = '"No Results Found"';



	}else{



		foreach ( $Results as $Result ){



			$Msg .= '{"value":"'.$Result->title_to_search.'", "label":"'.$Result->title_to_search.'", "myId":"'.$Result->id_to_search.'"},';



		}



		$Msg = substr($Msg, 0, (strlen($Msg)-1));



	}



	echo "[".$Msg."]";



}



?>