<?php 
     session_start();
  
	$Plugin_Path = dirname(__FILE__);
	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);
	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);
	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin/cp", "", $Include_Path_1);
	
	require_once($Include_Path_1.'wp-load.php');
	//require_once('D:\xampp\htdocs\dating\wp-load.php');
	global $wpdb;
	$Plugin_Path = dirname(__FILE__);
	require_once("resize_image.php");
	//Initials Required
	function GetUniqId( $prefix = '')
	{
		$my_random_id = $prefix;
		$my_random_id .= chr ( rand ( 65, 90 ) );
		$my_random_id .= time ();
		$my_random_id .= uniqid ( );
		return $my_random_id;
	}
	$Unique_ID = GetUniqId();
	$current_user = wp_get_current_user();
	
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
						$original_image_path = "../images/";
						//echo $original_image_path;die;
						//mkdir("$original_image_path");
						move_uploaded_file($_FILES[$fieldname]["tmp_name"], $original_image_path . $img_path);	
						//sleep(1);
						foreach( $form_Elements_image as $form_Elements_images ){ 
							$paths = $form_Elements_images->getAttribute('paths');
							$crop = $form_Elements_images->getAttribute('crop');
						    $height_new = $form_Elements_images->getAttribute('height'); 
							$width_new = $form_Elements_images->getAttribute('width');
							$scale = $form_Elements_images->getAttribute('scale');
							$paths = "../images/".$paths;
							$priority_defined_while_cropping = $form_Elements_images->getAttribute('priority_defined_while_cropping');
							$thumb_path= $paths."/thumb/"; 
							mkdir("$paths");
							
							if($paths!=""){
						
								Save_File($Unique_ID, $fieldname, $paths, $crop, $height_new, $width_new, $priority_defined_while_cropping,$original_image_path, $scale);
								
							}
							
							if($_REQUEST['page']=="7"){
								
								Save_File($Unique_ID, $fieldname, $thumb_path, $crop, '160', '180', $priority_defined_while_cropping,$original_image_path, $scale);
								
							}
							
							if($_REQUEST['page']=="15"){
								
								
								Save_File($Unique_ID, $fieldname, $thumb_path, $crop, '150', '686', $priority_defined_while_cropping,$original_image_path, $scale);
								
							}

						}
					
										
					$xy = $_FILES[$fieldname]["name"];
					$img_path = $Unique_ID .'-'.str_replace(" ","-",$xy);
					$SQL .= $fieldname ."='".$img_path."', ";
					//die();
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
			
			if($_REQUEST['page']=="15")
			{
				if($_REQUEST["blog_id"]!='')
				{
					$blogid = implode(',' ,$_POST['blog_id']);
					$SQL .= " blog_ids='".$blogid."', ";
				}
				
				if($_REQUEST["cate_id"]!='')
				{
					$cateid = implode(',' ,$_POST['cate_id']);
					$SQL .= " cate_ids='".$cateid."', ";
				}
				if($_REQUEST["event_ids"]!='')
				{
					$eventid = implode(',' ,$_POST['event_ids']);
					$SQL .= " event_ids='".$eventid."', ";
				}
				
				if($_REQUEST["module_text"]!='')
				{
					$SQL .= " module_text='".$_REQUEST["module_text"]."', ";
				}

			}
		
			if($_REQUEST["id"]==""){
				
				if(($_REQUEST['page']=="16")&&($current_user->twc_user_id!="")){
				$SQL .= "date_time=NOW(), status_deleted=0, user_id='".$current_user->twc_user_id."'";
				}else{
				$SQL .= "date_time=NOW(), status_deleted=0";
				}
				
				
			}else{
				$SQL .= " date_time=NOW(),  status_deleted=0 where ".$Flds[0]."='".$_REQUEST["id"]."'";
			}
			
			//echo $_REQUEST['title']; die;
          //echo $SQL;die;
			if($_REQUEST['page']=="8")
			{  
			    if($_REQUEST["id"]!=''){
				  $chkQuery ="select * from twc_users WHERE (LCASE(file_name)='".strtolower($_REQUEST["file_name"])."' OR user_email='".$_REQUEST["user_email"]."') and id!='".$_REQUEST["id"]."' ";	
				}
				else{
					$chkQuery ="select * from twc_users WHERE (LCASE(file_name)='".strtolower($_REQUEST["file_name"])."' OR user_email='".$_REQUEST["user_email"]."') ";	
				}
			   $chuser_arr =$wpdb->get_results($chkQuery);
			   if(count($chuser_arr) ==0){
				$wpdb->query($SQL);   
				require_once("healer-as-user.php");
			   }
			   else{
				echo $err_msg ="This userID Or Email Allready Exist!"; die;
			   }
			}
			else{
				$wpdb->query($SQL);
				
				if(($_REQUEST["id"]=="") && ($_REQUEST['page']==10)){
					$wpdb->query("update twc_hotel_gallery set hotel_id='".$Unique_ID."' where session_id='".session_id()."' and hotel_id=''");
				}	
			}
			
		if($_REQUEST["id"]==""){
			$Unique_ID = $Unique_ID;
		}else{
			$Unique_ID = $_REQUEST["id"];
		}
		
		if($_REQUEST["page"]=="10"){
			echo "<script language='javascript'>window.location='../../../../wp-admin/admin.php?page=10&action=add&id=TWCZ1373834004TWC51e30b14872a7';</script>"; 
		}
		else
		{
			/*if(($_REQUEST["page"]=="8") && ($_REQUEST["id"]=='')){
				$sql_arr =$wpdb->get_results("select MAX(ID) maxid from wp_users");
				$sql_obj =$sql_arr[0];
				$last_id =$sql_obj->maxid;
				
				$res_arr =$wpdb->get_results("select user_login from wp_users where ID=$last_id");
				$res_obj =$res_arr[0];
				$file_name =$res_obj->user_login;
				$check_arr =$wpdb->get_results("select * from tree where title='".$file_name."' and parent_id=2");
				if(count($check_arr) >0){
					 $floder_path = $Include_Path_1."/wp-content/themes/thewebconz/server/php/files/".$file_name;
					if (!@mkdir($floder_path, 0755, true))  {
					   $result = @mkdir($floder_path, 0755);
					}
				}
			}*/
			
			if($_REQUEST["save_and_close"]!="Close" && $_REQUEST["save_and_close"]!="Save_and_update"){
				 echo "<script language='javascript'>window.location='../../../../wp-admin/admin.php?page=".$_REQUEST["page"]."&action=add';</script>";			}
				elseif($_REQUEST["save_and_close"]=="Save_and_update"){
				echo "<script language='javascript'>window.location='".site_url()."/wp-admin/admin.php?page=".$_REQUEST["page"]."&action=add&id=".$Unique_ID."';</script>"; 
				}
				else{
					echo "<script language='javascript'>window.location='../../../../wp-admin/admin.php?page=".$_REQUEST["page"]."';</script>"; 
				}
			
		}
function Save_File($Unique_ID, $fieldname, $paths, $crop, $height_new, $width_new, $priority_defined_while_cropping, $original_image_path, $scale){
			
			$Log_file_update =  "Unique_ID : ".$Unique_ID."<br />";
			$Log_file_update .= "fieldname : ".$fieldname."<br />";
			$Log_file_update .= "paths : ".$paths."<br />";
			$Log_file_update .= "crop : ".$crop."<br />";
			$Log_file_update .= "height : ".$height."<br />";
			$Log_file_update .= "width : ".$width."<br />";
			$Log_file_update .= "priority_defined_while_cropping : ".$priority_defined_while_cropping."<br />";
			$Log_file_update .= "original_image_path : ".$original_image_path."<br />";
			
			
			
			$xyz = $_FILES[$fieldname]["name"];
			$img_path = $Unique_ID .'-'.str_replace(" ","-",$xyz);
			copy($original_image_path.$img_path, $paths.$img_path);	
			
		
			//sleep(1);
			if($crop=="Yes"){
				$image = new SimpleImage();
				$image->load($paths.$img_path);
				list($width, $height, $type, $attr)= getimagesize($paths.$img_path);
				
				if($priority_defined_while_cropping=="width"){
					$image->resizeToWidth($width_new);	
				}
				if($priority_defined_while_cropping=="height"){
					 $width_img = $image->getWidth();
					 $height_img = $image->getheight();
					 $heightnew =trim(str_replace('px','', $height_new));
					if($height_img >$heightnew){
					  $image->resizeToHeight($heightnew);	
					}
					else{
						$image->resizeToHeight($height_new);	
						}
				}
				if($priority_defined_while_cropping=="scale"){
					$image->scale($scale);	
				}
				
				if($priority_defined_while_cropping=="resize_width_then_height"){
					 $width_img = $image->getWidth();
					 $height_img = $image->getheight();
					if($width_img>$height_img){
						$image->resizeToWidth($width_new);	
					}else{
						$image->resizeToHeight($height_new);	
					}
				}
				$image->save($paths.$img_path);
			}
			
}




?>