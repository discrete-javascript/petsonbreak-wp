<?php 

include("functions-desc.php");

$action = $_REQUEST["action"];

if($action=="login_this_id"){

	login_this_id($_REQUEST["username"], $_REQUEST["passw"], $_REQUEST['remember']);

}

if($action=="up"){
	if($_REQUEST['catID']!=''){
		Sort_Order_Up_Cat( $_REQUEST['articleid'] ,$_REQUEST['tablename'], $_REQUEST['current_order'],$_REQUEST['catID']);
	}else{
		Sort_Order_Up( $_REQUEST['articleid'] ,$_REQUEST['tablename'], $_REQUEST['current_order']);
	}
	
}



if($action=="down"){
   if($_REQUEST['catID']!=''){	
	 Sort_Order_Down_Cat($_REQUEST['articleid'], $_REQUEST['tablename'], $_REQUEST['current_order'],$_REQUEST['catID']);
   }else{
	 Sort_Order_Down($_REQUEST['articleid'], $_REQUEST['tablename'], $_REQUEST['current_order']);
   }
}



if($action=="publish_this_id"){

	publish_this_id($_REQUEST["articleid"], $_REQUEST["tablename"]);

}

if($action=="unpublish_this_id"){

	unpublish_this_id($_REQUEST["articleid"], $_REQUEST["tablename"]);

}

if($action=="Delete_All"){

	Delete_All();

}


if($action=="Add_To_Image_Library"){

	Add_To_Image_Library();

}

if($_REQUEST["run1"]=="Get_Content"){
	Get_Content_Type($_REQUEST["ctype"],$_REQUEST["recordid"]);
}

?>