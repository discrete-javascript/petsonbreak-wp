<?php
session_start();
global $wpdb;
include("../../../../wp-load.php");
require_once("resize_image.php");
if($_POST['image_form_submit'] == 1)
{
	$images_arr = array();
	foreach($_FILES['images']['name'] as $key=>$val){
		$Unique_ID = uniqid();
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$size 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
		############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
		$file_name =$_FILES['images']['name'][$key];
		$file_name = $Unique_ID .'-'.str_replace(" ","-",$file_name); // rename file name
		
		$target_dir = "../images/pets/";
		$fileName =$target_dir.$file_name;
		
	    if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$fileName)){
			$sql="insert into twc_member_gallery SET id='".$Unique_ID."', user_id='".$_SESSION['userID']."',pet_type='',image='".$file_name."'";
	        $result=$wpdb->get_results($sql);
		    //Save_File($Unique_ID, $img_path, $paths, 'Yes', 600, 600, 'height',$target_dir, 55);
			$original_file_path =$target_dir.$file_name;
			$target_file_path =$target_dir.'thumbs/'.$file_name;
			Save_File($original_file_path, $target_file_path, 'Yes', 200, 200, 'height');
		  } 
		  
	   $images_arr[] =array('id'=>$Unique_ID,'fileName'=>$file_name);	  
	}
	 
	$html='';   
	if(!empty($images_arr)){ $count=0;
		foreach($images_arr as $image_src){ $count++;
		 $html.='<ul class="reorder_ul reorder-photos-list">
					<li id="image_li_'.$image_src['id'].'" class="ui-sortable-handle">
						<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="http://twc5.com/clients/petsonbreak/wp-content/themes/adivaha/images/pets/thumbs/'.$image_src['fileName'].'" alt=""><span class="deleteImage" rel="'.$image_src['id'].'" attr="'.$image_src['fileName'].'">[Delete]</span></a>
					</li>
				</ul>';
		}
	}
	echo $html;
	
}

if($_POST['image_vender_form_submit'] == 1)
{
		$images_arr = array();
	foreach($_FILES['images']['name'] as $key=>$val){
		$Unique_ID = uniqid();
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$size 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
		############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
		$file_name =$_FILES['images']['name'][$key];
		$file_name = $Unique_ID .'-'.str_replace(" ","-",$file_name); // rename file name
		
		$target_dir = "../images/vendor_pets/";
		$fileName =$target_dir.$file_name;
		
	    if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$fileName)){
			$sql="insert into twc_vendor_gallery SET id='".$Unique_ID."', user_id='".$_SESSION['userID']."',image='".$file_name."' ,vendor_service_id='".$_REQUEST['service_id']."',session_id='".session_id()."'"; 
	        $result=$wpdb->get_results($sql);
			$original_file_path =$target_dir.$file_name;
			$target_file_path =$target_dir.'vendor_thumbs/'.$file_name;
			Save_File($original_file_path, $target_file_path, 'Yes', 200, 200, 'height');
		  } 
		  
	   $images_arr[] =array('id'=>$Unique_ID,'fileName'=>$file_name);	  
	}
	 
	$html='';   
	if(!empty($images_arr)){ $count=0;
		foreach($images_arr as $image_src){ $count++;
		 $html.='<ul class="reorder_ul reorder-photos-list">
					<li id="image_li_'.$image_src['id'].'" class="ui-sortable-handle">
						<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="http://twc5.com/clients/petsonbreak/wp-content/themes/adivaha/images/vendor_pets/vendor_thumbs/'.$image_src['fileName'].'" alt=""><span class="deleteVendorImage" rel="'.$image_src['id'].'" attr="'.$image_src['fileName'].'">[Delete]</span></a>
					</li>
				</ul>';
		}
	}
	echo $html;
}



function Save_File($original_file_path, $target_file_path, $crop, $height_new, $width_new, $priority_defined_while_cropping){
			copy($original_file_path, $target_file_path);	
			//sleep(1);
			if($crop=="Yes"){
				$image = new SimpleImage();
				$image->load($target_file_path);
				list($width, $height, $type, $attr)= getimagesize($target_file_path);
				
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
				$image->save($target_file_path);
			}
			
}
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>  
    $(".deleteImage").click(function() {
	   var rel =$(this).attr('rel');
	   var attr =$(this).attr('attr');
	   alert(attr);
	  
			 $.ajax({
				 type: "POST",
				 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
				 data: "action=deleteImage&img_delete="+rel+
				 "&attr="+attr,
				 success: function(Data){
				if(Data==1)
				{
					alert('Gallery is updated sucessfully');
					 $('#image_li_'+rel).remove();
					
				}else{
					alert('Error');
				}
				  },
  })
  

    }); 

</script>	

<script>  
    $(".deleteVendorImage").click(function() {
	   var rel =$(this).attr('rel');
	   var attr =$(this).attr('attr');
			 $.ajax({
				 type: "POST",
				 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
				 data: "action=deleteVendorImage&img_delete="+rel+
				 "&attr="+attr,
				 success: function(Data){
				if(Data==1)
				{
					alert('Gallery is updated sucessfully');
					 $('#image_li_'+rel).remove();
					
				}else{
					alert('Error');
				}
				  },
  })
  

    }); 

</script>	