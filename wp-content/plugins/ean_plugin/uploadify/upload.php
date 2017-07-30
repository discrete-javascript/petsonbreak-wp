<?php session_start();
include ('../../../../wp-load.php');
global $wpdb;

$allowed =  array('jpeg','jpg','png','gif');

if($_POST['image_form_submit'] == 1)
{  
	$sessionID =session_id();
	$hotel_id =$_REQUEST['hotel_id'];
	$images_arr = array();
	foreach($_FILES['uploadFile']['name'] as $key=>$val){
		$image_name = $_FILES['uploadFile']['name'][$key];
		$tmp_name 	= $_FILES['uploadFile']['tmp_name'][$key];
		$size 		= $_FILES['uploadFile']['size'][$key];
		$type 		= $_FILES['uploadFile']['type'][$key];
		$error 		= $_FILES['uploadFile']['error'][$key];
		
		
		$target_dir = "../images/Hotels/Gallery/";
		$filename =$_FILES['uploadFile']['name'][$key];
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		//$new_filename = uniqid().'.'.$extension;
		$new_filename =$filename;
		if(in_array($extension,$allowed))
		{
		  $target_file = $target_dir.$new_filename; 
		  move_uploaded_file($_FILES['uploadFile']['tmp_name'][$key],$target_file);
		  
		  $wpdb->query("insert into twc_hotel_gallery set hotel_id='".$hotel_id."',file_name='".$new_filename."',session_id='".session_id()."'");
		  $insert_id = $wpdb->insert_id;
		  
		  echo '<div class="file-row" id="fileId_'.$insert_id.'">
				  <div class="file-row-left"><img src="'.site_url().'/wp-content/plugins/ean_plugin/images/Hotels/Gallery/'.$new_filename.'" style="width:200px; height:100px;"><span onclick="deleteFile('.$insert_id.');" style="color:#FF0000; padding-left:10px;">[Delete]</span></div>
				</div>';
		  
         /*
		  if($wordcount>0){
		    $wpdb->query("insert into customer_filedata SET order_number='', session_id='".$sessionID."',user_id='',files_name='".$new_filename."',content='',wordcount='".$wordcount."',ip_address='".$_SERVER['REMOTE_ADDR']."',date_time='".date('Y-m-d H:i:s')."', published='Yes',status_deleted=0");
			$insert_id =$wpdb->insert_id;
		   
		 echo '<div class="file-row" id="fileId_'.$insert_id.'">
				  <div class="file-row-left"> <span><img src="'.get_template_directory_uri().'/images/'.$extension.'-fileicon.png"></span> <span>'.$new_filename.'</span> </div>
				  <div class="file-row-right"> <span>'.$wordcount.' words</span> <span onclick="deleteFile('.$insert_id.');"><i class="fa fa-trash-o" aria-hidden="true"></i></span> </div>
				</div>';
			$flag=1;	
		  }	
		  else {
			$flag='2~'.$new_filename;  //file error word 0	  
		  }*/
	   }
	   else{
		   $flag=0; //file not match
	   }
	}
  echo 	$flag;
}


?>