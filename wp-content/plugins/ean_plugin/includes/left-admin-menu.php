<?php 
add_menu_page(
	"Manage Stuff",
	"Manage Stuff",
	8,
	__FILE__,
	"ean_plugin_home_page",
	$Plugin_URL."/images/icon.png"
); 
function ean_plugin_home_page()
{
	global $Plugin_Path;
	include($Plugin_Path."/includes/manage.php");
	//include($Plugin_Path."/includes/manage.php");
}

//add_submenu_page(__FILE__,'Manage Modules','Manage Modules','8','twc_manage_modules','twc_manage_modules_new');

//Display data in Admin
	$modules = $Plugin_Path."/xml/";
	
	$handle=opendir($modules);
	while ($file = readdir($handle)){
		if ($file != "." && $file != ".."){
			$fn = $modules."/".$file;
			$doc = new DOMDocument();
			$doc->load($fn);
			$items = $doc->getElementsByTagName("Response");
			foreach( $items as $item ){ 
			
				$nodename = $item->getElementsByTagName("name");
				$name = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("id");
				$id = $nodename->item(0)->nodeValue;
				$nodename = $item->getElementsByTagName("display_in_left_menu");
				$display_in_left_menu = $nodename->item(0)->nodeValue;
				//echo $display_in_left_menu;
				//if($display_in_left_menu==""){
					add_submenu_page(__FILE__,$name,$name,'8', $id, 'manage_page');
				//}
				
			}
		}
	}
	closedir($handle);
	
	
	function manage_page(){
		global $Plugin_Path;
		include $Plugin_Path.'/cp/twc_cp.php';
	}
?>