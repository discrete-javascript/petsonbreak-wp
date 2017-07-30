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



	



function Delete_All(){
	global $wpdb;
	$Objval = str_replace("undefined", "", $_REQUEST["Objs"]);
	$Obj = explode(",", $Objval);
	if(count($Obj)==1){
		$sql = "update ".$_REQUEST["fn"]." set status_deleted='1' where id='".$Obj[0]."'";
		$wpdb->query($sql);
	}else{

		for($a=0; $a<(count($Obj)-1); $a++){
			$sql = "update ".$_REQUEST["fn"]." set status_deleted='1' where id='".$Obj[$a]."'";
			$wpdb->query($sql);
		}
	}

}



function Add_To_Image_Library(){
	global $wpdb;
	$Objval = str_replace("undefined", "", $_REQUEST["Objs"]);
	$Obj = explode(",", $Objval);
	if(count($Obj)==1){
		$sql = "update ".$_REQUEST["fn"]." set is_image_library='Yes' where id='".$Obj[0]."'";
		$wpdb->query($sql);
	}else{

		for($a=0; $a<(count($Obj)-1); $a++){
			$sql = "update ".$_REQUEST["fn"]." set is_image_library='Yes' where id='".$Obj[$a]."'";
			$wpdb->query($sql);
		}
	}

}








	function publish_this_id($articleid, $table){



	global $wpdb;



	$sql = "update ".$table." set published='Yes' where id='".$articleid."'";



	$wpdb->query($sql);



	}



	



	function unpublish_this_id($articleid, $table){



		global $wpdb;



		$sql = "update ".$table." set published='No' where id='".$articleid."'";



		$wpdb->query($sql);



	}



	

	function Sort_Order_Up($id, $table,$current_sortorder)

	{

	

		global $wpdb;

		

		$s = "SELECT MIN(sort_order) as pres FROM ".$table." WHERE status_deleted = 0 and sort_order > '".$current_sortorder."' ";

		$myrows = $wpdb->get_results($s);

		foreach ( $myrows as $Result ){

		$order = $Result->pres;

		}

		

		if($order>1&&$order!=''){

		$sql = "UPDATE ".$table." SET sort_order = '".$current_sortorder."' where status_deleted = 0 and  sort_order = '".$order."' ";

		$wpdb->query($sql);

		

		$sql2 = "UPDATE ".$table." SET sort_order = '".$order."' where status_deleted = 0 and  sort_order = '".$current_sortorder."' and id = '".$id."' ";

		$wpdb->query($sql2);

		}

		

	}
	
	function Sort_Order_Up_Cat($id, $table,$current_sortorder,$catid)
	{
		global $wpdb;

	 $s = "SELECT MIN(sort_order) as pres FROM ".$table." WHERE status_deleted = 0 and genre_category='".$catid."' and sort_order > '".$current_sortorder."' "; 

		$myrows = $wpdb->get_results($s);
		

		foreach ( $myrows as $Result ){

		$order = $Result->pres;

		}

		

		if($order>1&&$order!=''){

	 $sql = "UPDATE ".$table." SET sort_order = '".$current_sortorder."' where status_deleted = 0 and genre_category='".$catid."' and  sort_order = '".$order."' "; 

		$wpdb->query($sql);

		

		$sql2 = "UPDATE ".$table." SET sort_order = '".$order."' where status_deleted = 0 and genre_category='".$catid."' and   sort_order = '".$current_sortorder."' and id = '".$id."' ";

		$wpdb->query($sql2);

		}

		

	}







	function Sort_Order_Down($id, $table, $current_sortorder)
	{
     global $wpdb;

		

		$s = "SELECT MAX(sort_order) as nexts FROM ".$table." WHERE status_deleted = 0 and sort_order < ".$current_sortorder;

		$myrows = $wpdb->get_results($s);

		foreach ( $myrows as $Result ){

		$order1 = $Result->nexts;

		}

		

		

		if($order1!=''){

		$sql = "UPDATE ".$table." SET sort_order = '".$current_sortorder."' where status_deleted = 0 and  sort_order = '".$order1."' ";

		$wpdb->query($sql);

		

		$sql2 = "UPDATE ".$table." SET sort_order = '".$order1."' where status_deleted = 0 and  sort_order = '".$current_sortorder."' and id = '".$id."' ";

		$wpdb->query($sql2);

		}

		

	}
	
 function Sort_Order_Down_Cat($id, $table, $current_sortorder,$catid)
	{
     global $wpdb;

		

		$s = "SELECT MAX(sort_order) as nexts FROM ".$table." WHERE status_deleted = 0 and genre_category='".$catid."' and sort_order < ".$current_sortorder;

		$myrows = $wpdb->get_results($s);

		foreach ( $myrows as $Result ){

		$order1 = $Result->nexts;

		}

		

		

		if($order1!=''){

		$sql = "UPDATE ".$table." SET sort_order = '".$current_sortorder."' where status_deleted = 0 and genre_category='".$catid."' and  sort_order = '".$order1."' ";

		$wpdb->query($sql);

		

		$sql2 = "UPDATE ".$table." SET sort_order = '".$order1."' where status_deleted = 0 and genre_category='".$catid."' and  sort_order = '".$current_sortorder."' and id = '".$id."' ";

		$wpdb->query($sql2);

		}

		

	}
	
	
	
	function Get_Content_Type($ctype,$recordid){
		
		global $wpdb;
		
		if($ctype=='post')
		{
		  $results_arr = $wpdb->get_results("select * from wp_posts where post_author='1' and post_type='post' and post_status='publish' order by post_date desc"); 
		  $a = 0;
		  foreach($results_arr as $post_result)
		  {
			  $results = $wpdb->get_results("select * from twc_modules where published='Yes' and status_deleted='0' and id='".$recordid."'"); 
			  foreach($results as $post_result1)
		 	 {
				$arr = explode(",",$post_result1->blog_ids);
				if(in_array($post_result->ID,$arr)) {$selected = 'checked="checked"';}else{$selected='';}
			
			echo  "<p><input type='checkbox' name='blog_id[]' id='blog".$a."' value='".$post_result->ID."' ".$selected." />&nbsp;&nbsp;".$post_result->post_title."</p>";
		  	 }
			 $a++;
		   }	
		}
		
		
		if($ctype=='category')
		{
			 $results_arr =$wpdb->get_results("select * from wp_terms order by term_id desc"); 
			 $b = 0;
			 foreach($results_arr as $post_result)
			 {
			  $results = $wpdb->get_results("select * from twc_modules where published='Yes' and status_deleted='0' and id='".$recordid."'"); 
			  foreach($results as $post_result1)
			  {
				$arr = explode(",",$post_result1->cate_ids);
				if(in_array($post_result->term_id,$arr)) {$selected = 'checked="checked"';}else{$selected='';}
					echo "<p><input type='checkbox' name='cate_id[]' id='cate".$b."' value='".$post_result->term_id."' ".$selected." />&nbsp;&nbsp;".$post_result->name."</p>";
			  }
			  $b++;
			 }
			 
	    }
		
		
		if($ctype=='module')
		{
			$results = $wpdb->get_results("select * from twc_modules where published='Yes' and status_deleted='0' and id='".$recordid."'"); 
			  foreach($results as $post_result1)
			  {
				  $val = $post_result1->module_text;
			  }
			echo '<textarea name="module_text" cols="15" rows="5" type="textarea" class="">'.$val.'</textarea>';
		}
		
		if($ctype=='event')
		{
			$results =$wpdb->get_results("select * from twc_modules where published='Yes' and status_deleted='0' and id='".$recordid."'"); 
			$post_result =$results[0];
			$arr = explode(",",$post_result->event_ids);
			//print_r($arr);
			
			 $evn_results_arr =$wpdb->get_results("select * from twc_event where published='Yes' and status_deleted=0 order by date_time desc"); 
			 $b = 0;
			 foreach($evn_results_arr as $evn_result){
				if(in_array($evn_result->id,$arr)) {$selected = 'checked="checked"';}
				else{$selected='';}
				
			echo "<p><input type='checkbox' name='event_ids[]' id='event_".$b."' value='".$evn_result->id."' ".$selected." />&nbsp;&nbsp;".$evn_result->title."</p>";
			  }
			  $b++;
		}
		
		
		
		
	}



?>