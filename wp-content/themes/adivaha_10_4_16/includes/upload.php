<?php
include("../../../wp-load.php");
global $wpdb;
if($_POST['form_submit'] == 1)
{
	$images_arr = array();
	$error="";
	foreach($_FILES['images']['name'] as $key=>$val){
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$size 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
		
		//print_r($image_name);
		//checking image type
		$allowed =  array('gif','png','jpg','jpeg','JPEG');
		$filename = $_FILES['images']['name'][$key];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
		if(in_array($ext,$allowed)){
		//move uploaded file to uploads folder
		$target_dir = "uploads/";
		$target_file = $target_dir.$_FILES['images']['name'][$key];
		if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
			$images_arr[] = $target_file;
		}
		}
		$error="Image type not valid";
		
	}
	
	// images view after upload
	
	if(!empty($images_arr)){ $count=0;
		foreach($images_arr as $image_src){ $count++?>
			<ul class="reorder_ul reorder-photos-list">
            	<li id="image_li_<?php echo $count; ?>" class="ui-sortable-handle">
                	<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="<?php echo get_template_directory_uri().'/'.$image_src; ?>" alt=""></a>
               	</li>
          	</ul>
	<?php }
	}
	
}
?>