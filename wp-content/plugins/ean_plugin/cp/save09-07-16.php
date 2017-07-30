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

	//require_once('D:\xampp\htdocs\dating\wp-load.php');

	global $wpdb;

	$Plugin_Path = dirname(__FILE__);

	

	//Initials Required

	function GetUniqId( $prefix = 'TWC')

	{

		$my_random_id = $prefix;

		$my_random_id .= chr ( rand ( 65, 90 ) );

		$my_random_id .= time ();

		$my_random_id .= uniqid ( $prefix );

		return $my_random_id;

	}

	$Unique_ID = GetUniqId();

	

	//Initials Required End

	

		$doc = new DOMDocument();

		$doc->load($_REQUEST["XML_File_Name"]);

		$items = $doc->getElementsByTagName("Response");

			foreach( $items as $item ){ 

				$nodename = $item->getElementsByTagName("table_name");

				$table_name = $nodename->item(0)->nodeValue;

				

				$nodename = $item->getElementsByTagName("manage_page_field_list");

				$manage_page_field_list = $nodename->item(0)->nodeValue;

				

				$nodename = $item->getElementsByTagName("auto_increment");

				$auto_increment = $nodename->item(0)->nodeValue;

			}

			$Flds = explode(",", $manage_page_field_list);

				

		  

			if($_REQUEST["id"]==""){

				if($auto_increment!=""){

					$SQL = "insert into ".$table_name." set ";

				}else{

					$SQL = "insert into ".$table_name." set ".$Flds[0]."='$Unique_ID',";

				}

			}else{

				$SQL = "update ".$table_name." set ";

			}

			

			$total_number_of_fields = $doc->getElementsByTagName("fields")->length; 

				

			for($i=0; $i<=$total_number_of_fields-1; $i++){

				$nodename = $doc->getElementsByTagName("fields");

				$fieldname = $nodename->item($i)->getAttribute('name');

				$type = $nodename->item($i)->getAttribute('type');

				//$original_image_path = $nodename->item($i)->getAttribute('original_image_path');

				

				$datatype = $nodename->item($i)->getAttribute('datatype');

		        $label = $nodename->item($i)->getAttribute('label');

				

				

				

			

				

			   //Check if any form field is an array in form

			if(gettype($_REQUEST[$fieldname])=="array"){

					

					for($a=0; $a<=count($_REQUEST[$fieldname]); $a++){

						$excluded= implode(",", $_REQUEST[$fieldname]);

					}

					$SQL .= $fieldname ."='".$excluded."', ";

                //End of Check if any form field is an array in form

				

				//Check if any form field Type is File in form

				}else if($type=='file'){

					if($_FILES[$fieldname]['name']!=""){

						$form_Elements_image = $doc->getElementsByTagName("options");

						$abc = $_FILES[$fieldname]["name"];

						$img_path = $Unique_ID .'-'.str_replace(" ","-",$abc);

						$original_image_path = "../images/originals/";

						$extracted_img_path = "../images/product_Image/";

						//mkdir("$original_image_path");



						$SQL .= $fieldname ."='".$img_path."', ";

						

						move_uploaded_file($_FILES[$fieldname]["tmp_name"], $original_image_path . $img_path);	

						//sleep(5);

						//exec("convert -colorspace sRGB ".$original_image_path.$img_path."[0] -thumbnail 300x210 -flatten ".$extracted_img_path.$img_path.".jpg");



					}

				

				//End Check if any form field Type is File in form

				

				

					// Automatic Increament of Sort Order

			}else if($type=="hidden"){

				

					$SQL1 = "select ".$fieldname." from ".$table_name." where status_deleted=0 order by ".$fieldname." desc limit 0, 1";

					

					$Results = $wpdb->get_row($SQL1, ARRAY_A);

					$sort_order = $Results[$fieldname];

					$sort_order++;

					if($_REQUEST["id"]==""){

				    $SQL .= $fieldname ."='".$sort_order."', ";

					}

				// End of Automatic Increament of Sort Order

				

				// Automatic updates of Hits

				}else if($datatype=='int'){

					

					if($_REQUEST["id"]==""){

				    $hit= $_REQUEST[$fieldname];

				    $SQL .= $fieldname ."='".$hit."', ";

					}else{

					$hitt= $_REQUEST[$fieldname]+1;	

					$SQL .= $fieldname ."='".$hitt."', ";

					}

					

				

				// End of Automatic updates of Hits

				

			

				

				}

				else if($type=='iframe'){ $SQL .="";}

				else{

				

				//Check if This form element is allowed to displayed in form

				$display_this_on_form = $nodename->item($i)->getAttribute('display_this_on_form');

				if($display_this_on_form=="Y"){

					

					$SQL .= $fieldname ."='".trim(addslashes($_REQUEST[$fieldname]))."', ";

					

				}

				

				

				

			}

			

			

			}

		

			if($_REQUEST["id"]==""){

				$SQL .= " date_time=NOW(), status_deleted=0";

			}else{

				$SQL .= " date_time=NOW(),  status_deleted=0 where ".$Flds[0]."='".$_REQUEST["id"]."'";

			}

           

            

			$wpdb->query($SQL);

			

			

		if($_REQUEST["id"]==""){

			$Unique_ID = $Unique_ID;

		}else{

			$Unique_ID = $_REQUEST["id"];

		}

		

		if($_REQUEST["save_and_close"]!="Close"){

			echo "<script language='javascript'>window.location='../../../../wp-admin/admin.php?page=".$_REQUEST["page"]."&action=add';</script>"; 

		}else{

			echo "<script language='javascript'>window.location='../../../../wp-admin/admin.php?page=".$_REQUEST["page"]."';</script>"; 

		}





?>