<?php session_start();

	$Plugin_Path = dirname(__FILE__);
	$Include_Path_1 = str_replace("wp-content\\", "", $Plugin_Path);
	$Include_Path_1 = str_replace("plugins\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("ean_plugin\\", "", $Include_Path_1);
	$Include_Path_1 = str_replace("\\cp", "\\", $Include_Path_1);
	$Include_Path_1 = str_replace("wp-content/plugins/ean_plugin/cp", "", $Include_Path_1);
	//echo $Include_Path_1;
	require_once($Include_Path_1.'wp-load.php');
	//require_once('D:\xampp\htdocs\marcus\wordpress\wp-load.php');


	global $wpdb;
	$Plugin_Path = dirname(__FILE__);
	
	$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";
	

	$pos = strpos($Plugin_URL, "localhost");
	if($pos === false){
		$modules = str_replace("/cp", "", $Plugin_Path)."/xml/";
	}else{
		$modules = str_replace("\\cp", "", $Plugin_Path)."\\xml\\";
	}
	
	
	//echo $modules;
	$PRO_URL = $Plugin_URL."/cp/";
	$current_user = wp_get_current_user();
	//echo $PRO_URL;
	//echo $_REQUEST["fn"];die;
	$handle=opendir($modules);
	while ($file = readdir($handle)){
		if ($file != "." && $file != ".."){
			if($pos === false){
				$fn = $modules."/".$file;
			}else{
				$fn = $modules.$file;
			}
			
			$doc = new DOMDocument();
			$doc->load($fn);
			$items = $doc->getElementsByTagName("Response");
			foreach( $items as $item ){ 
				$nodename = $item->getElementsByTagName("id");
				$id = $nodename->item(0)->nodeValue;
				if($id==$_REQUEST["fn"]){
					$XML_File_Name = $fn;
					//echo $XML_File_Name;
				}
			}
		}
	}
	//echo $XML_File_Name;
	closedir($handle);
	
		$doc = new DOMDocument();
		$doc->load($XML_File_Name);
		$items = $doc->getElementsByTagName("Response");
		
			foreach( $items as $item ){ 
				$nodename = $item->getElementsByTagName("title_of_page");
				$title_of_page = $nodename->item(0)->nodeValue;
				
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
				
				//$nodename = $item->getElementsByTagName("search_field");
				//$search_field = $nodename->item(0)->nodeValue;
				
				$Flds = explode(",", $manage_page_field_list);



				$Ttles = explode(",", $title_of_table);



				
			}
			 
			
			if ($_REQUEST["asc_desc"] == "desc"){ 
				$sfn="<img src='".$PRO_URL."/images/d-sort.png' />";
			}
			else {
				$sfn="<img src='".$PRO_URL."/images/u-sort.png' />";
			}
			
			
			if($_REQUEST["pub"]!="All"){
				$Publisheds = " and Published='".$_REQUEST["pub"]."' ";
			}
			
			$query_pag_num1 = "SELECT COUNT(".$Flds[0].") AS count1 FROM ".$table_name." where status_deleted=0 ".$Publisheds;	
			
			if(($_REQUEST["fn"]=="16")&&($current_user->twc_user_id!="")){
			$query_pag_num1 .= " and user_id='".$current_user->twc_user_id."'";	
			}
			if(($_REQUEST["fn"]=="16")&&($current_user->twc_user_id=="")){
			$query_pag_num1 .= " and is_image_library=''";	
			}
			if(($_REQUEST["fn"]=="20")&&($_REQUEST['album_id']!="")){
			$query_pag_num1 .= " and album_id='".$_REQUEST['album_id']."'";	
			}
			
			
			$Results = $wpdb->get_results($query_pag_num1);
			foreach ( $Results as $Result ){
				$count = $Result->count1;
			}
			
			
			if($Flds[$a+4]!='')
			{
				$order_val = "SELECT MIN(sort_order) AS min_sort_order, MAX(sort_order) AS max_sort_order FROM ".$table_name." where status_deleted=0 ".$Publisheds;
				$Results = $wpdb->get_results($order_val);
				foreach ( $Results as $Result ){
					$min_sort_order = $Result->min_sort_order;
					$max_sort_order = $Result->max_sort_order;
				}
			}
			
			//if ($count!=0){
			?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr>
    <td colspan="7">
    	<div>
        <!--onfocus="Show_This(this);"-->
        	<div class="fl">Search <input name="search_id" id="search_id" type="text" autocomplete="off" value="Enter / Select Title of " onfocus="Show_This(this);"  /> </div>
            <div class="fl select">Show<select size="1" name="dt_gal_length" aria-controls="dt_gal" id="dt_gal_length">
            <option value="5" <?php if($_REQUEST["dt_gal_length"]==5){ ?> selected="selected" <?php } ?>>5</option>
        	    <option value="10" <?php if($_REQUEST["dt_gal_length"]==10){ ?> selected="selected" <?php } ?>>10</option>
        	    <option value="25" <?php if($_REQUEST["dt_gal_length"]==25){ ?> selected="selected" <?php } ?>>25</option>
        	    <option value="50" <?php if($_REQUEST["dt_gal_length"]==50){ ?> selected="selected" <?php } ?>>50</option>
        	    <option value="100" <?php if($_REQUEST["dt_gal_length"]==100){ ?> selected="selected" <?php } ?>>100</option>
                <option value="500" <?php if($_REQUEST["dt_gal_length"]==500){ ?> selected="selected" <?php } ?>>500</option>
                <option value="1000" <?php if($_REQUEST["dt_gal_length"]==1000){ ?> selected="selected" <?php } ?>>1000</option>
      	    </select>Records</div>    
            <?php if($_REQUEST["fn"]==20){ ?>
            <div class="fl select"><strong>User</strong>
			  <?php
			   $results_user_arr =$wpdb->get_results("select * from twc_users WHERE published='Yes' and status_deleted=0 order by title ASC");
			  ?>
                <select name="user_id" id="user_id">
                <option value="" selected="selected">All</option>
                <?php foreach($results_user_arr as $results_user){
					if($_REQUEST['user_id']==$results_user->id){$selected ='selected="selected"';}
					else{$selected='';}
					echo '<option value="'.$results_user->id.'" '.$selected.'>'.ucfirst($results_user->title).'</option>';
                }?>
               </select>
              </div>
             <div class="fl select"><strong>Album</strong>
			  <?php
			  if($_REQUEST['user_id']!=''){
			   $results_alb_arr =$wpdb->get_results("select * from twc_albums WHERE user_id='".$_REQUEST['user_id']."' and published='Yes' and status_deleted=0 order by title ASC");
			  }
			  else{
				 $results_alb_arr =$wpdb->get_results("select * from twc_albums WHERE published='Yes' and status_deleted=0 order by title ASC"); 
			  }
			  ?>
                <select name="album_id" id="album_id">
                <option value="all" selected="selected">All</option>
                <?php foreach($results_alb_arr as $results_alb){
					if($_REQUEST['album_id']==$results_alb->id){$selected ='selected="selected"';}
					else{$selected='';}
					echo '<option value="'.$results_alb->id.'" '.$selected.'>'.ucfirst($results_alb->title).'</option>';
                }?>
               </select>
              </div>
             
             
             <?php } ?>      	
            <!-- <?php if($_REQUEST["fn"]==9){ ?>
             <div class="export_button"><a href="<?php echo $Plugin_URL; ?>/cp/download_newsletter_signup.php?fn=<?php echo $XML_File_Name;?>">Export</a></div>	
             <?php } ?>  --> 
            <?php if(($_REQUEST["fn"]=="16")&&($current_user->twc_user_id=="")){    ?>
             <div class="export_button"><a class="AddToImageLibrary" href="javascript:void(0);">Add To Image Library</a></div>
            <?php } ?>
        </div>
    </td>
    </tr>

    </thead>
    <tbody>
    
    <tr>
        <th><input name="input" type="checkbox" value="All" onclick="Update_All(this)"/></th>
        <?php if($img_displayed!=""){ ?> <th width="60">Thumbnail</th> <?php } ?>
        <?php for($a=0; $a<count($Ttles); $a++){ ?>
        <th align="left"><a href="javascript:void(0);" class="title_sort" fn="<?php echo trim($Flds[$a+1]); ?>">
			<?php if ($_REQUEST["captions"] != ""){ ?>
				<?php echo $_REQUEST["captions"]; ?>
            <?php }else{ ?><?php echo $Ttles[$a]; } ?>
        </a>
        </th>
        <?php } ?>
        <?php if($exclude_sort_order!="") { ?>
        <th width="80"><a href="javascript:void(0);" class="title_sort" fn="<?php echo trim($Flds[$a+4]); ?>"><?php if ($_REQUEST["method"] == trim($Flds[$a+4])){echo $sfn; }  ?>Order</a></th>
        <?php } ?>
        <?php if($exclude_publish!=""){?>
        <th width="50"><a href="javascript:void(0);" class="title_sort" fn="<?php echo trim($Flds[$a+1]); ?>"><?php if ($_REQUEST["method"] == trim($Flds[$a+1])){echo $sfn; }  ?>Status</a></th>
        <?php } ?>
        <th width="90" align="left"><a href="javascript:void(0);" class="title_sort" fn="<?php echo trim($Flds[$a+2]); ?>"><?php if ($_REQUEST["method"] == trim($Flds[$a+2])){echo $sfn; }  ?>Date</a></th>
        <th width="22">&nbsp;</th>
    </tr>
  <?php
			//}

$page = $_POST["page"];
$cur_page = $page;
$page -= 1;
$per_page = $_REQUEST["dt_gal_length"];
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//if($start<=1){ $start = 0; }
//echo $start;

//Initials Required

//Initials Required End

			//Manage Page values
			if($manage_page_field_list!="") { 
			$a = ",";
			}
			else {
			$a = "";
			}
			if($sort_order_displayed!=""){
			$sql_min_max = "select min($sort_order_displayed) as Minsort, max($sort_order_displayed) as Maxsort from  ".$table_name." where status_deleted=0 LIMIT $start, $per_page";
			$Results = $wpdb->get_results($sql_min_max);
			foreach ( $Results as $Result ){
				$sort_order_min_val = $Result->Minsort;
				$sort_order_max_val = $Result->Maxsort;
			}
			}
			$sql = "select  ".$manage_page_field_list;
			if($img_displayed!=""){ $sql .= ", ".$img_displayed; }

			if($sort_order_displayed!=""){ 
			//$sql .= ", ".$sort_order_displayed; 
			}
			
			$sql .= " from ".$table_name." where status_deleted=0 ".$Publisheds;		
			
			if(($_REQUEST["fn"]=="16")&&($current_user->twc_user_id!="")){
			$sql .= " and user_id='".$current_user->twc_user_id."'";
			}
			if(($_REQUEST["fn"]=="16")&&($current_user->twc_user_id=="")){
			$sql .= " and is_image_library=''";	
			}
			if(($_REQUEST["fn"]=="20") &&($_REQUEST['album_id']!="") && ($_REQUEST['album_id']!='all')){ 
			 $sql .= " and album_id='".$_REQUEST['album_id']."'"; 
			}
			if(($_REQUEST["fn"]=="20") &&($_REQUEST['user_id']!="") && ($_REQUEST['user_id']!='all')){ 
			 $sql .= " and user_id='".$_REQUEST['user_id']."'"; 
			}
			
			/*if($_REQUEST["is_image_library"]=='Yes' && $_REQUEST["is_image_library"]!='all' && $_REQUEST["fn"]==16){
					$sql .= " and is_image_library='Yes'";
			}
			if($_REQUEST["is_image_library"]=='' && $_REQUEST["is_image_library"]!='all' && $_REQUEST["fn"]==16 && $current_user->twc_user_id==""){
					$sql .= " and is_image_library=''";
			}*/
		
			//if($padi_un!=""){ $sql .= " and padi_unpaid=".$img_displayed; }
			if($sort_order_displayed!=""){ $sql .= " ORDER BY ".$_REQUEST["method"]." ".$_REQUEST["asc_desc"]." LIMIT $start, $per_page"; }
			//echo $sql;
			//die();
			$getTotal_Number_Of_Fields_in_Table = explode(",", $manage_page_field_list);
			$getTotal_Number_Of_Fields_in_Table = count($getTotal_Number_Of_Fields_in_Table);

			$Results = $wpdb->get_results($sql, ARRAY_N);


			for($ct=0; $ct<count($Results); $ct++){
			//foreach ( $Results as $Result ){
			//$sort_order_min_val = $Result->Minsort;
			$cOUnteR++;
			$Strings .= "<tr>";
			
			$Strings .= "<td><input id='".$cOUnteR."' type='checkbox' name='row_sel[]' class='row_sel' value='".$Results[$ct][0]."' /></td>";
			 if($img_displayed!=""){
				 if($Results[$ct][$getTotal_Number_Of_Fields_in_Table]==""){
					 $Strings .= '<td width="60"><a href="admin.php?page='.$_REQUEST['fn'].'&action=add&id='.$Results[$ct][0].'"><img src="'.$Plugin_URL.'/cp/images/default-image.jpg" width="50" title="'.$Results[$ct][1].'" style="border:1px solid #ededed; padding:2px;" /></a></td>';
				 }else{
					 if($_REQUEST["fn"]=='9'){ $wd = '';}else {$wd = 'width="50"';}
			$Strings .= '<td width="60"><a href="admin.php?page='.$_REQUEST['fn'].'&action=add&id='.$Results[$ct][0].'"><img src="'.$Plugin_URL."/images/".$small_img_folder_path.$Results[$ct][$getTotal_Number_Of_Fields_in_Table].'" '.$wd.' title="'.$Results[$ct][1].'" style="border:1px solid #ededed; padding:2px;" /></a></td>';}
			 }
			
			//echo "<pre>";
			//print_r($Results[$ct]);
			
			for($a=1; $a<=count($Ttles); $a++){ 
			//echo $Results[$ct][2];
			if(($_REQUEST["fn"]=='19') && ($a=='2')){
				    $Strings .= "<td><span class='fl'><a href='admin.php?page=".$_REQUEST["fn"]."&action=add&id=".$Results[$ct][0]."'>".getUser_id($Results[$ct][$a])."</a></span></td>";
				 }
			elseif(($_REQUEST["fn"]=='20') && ($a=='2')){
				    $Strings .= "<td><span class='fl'><a href='admin.php?page=".$_REQUEST["fn"]."&action=add&id=".$Results[$ct][0]."'>".getAlbum_Byid($Results[$ct][$a])."</a></span></td>";
				 }	 
			elseif(($_REQUEST["fn"]=='20') && ($a=='3')){
				    $Strings .= "<td><span class='fl'><a href='admin.php?page=".$_REQUEST["fn"]."&action=add&id=".$Results[$ct][0]."'>".getUser_id($Results[$ct][$a])."</a></span></td>";
				 }	 	 
			 else{
			 $Strings .= "<td><span class='fl'><a href='admin.php?page=".$_REQUEST["fn"]."&action=add&id=".$Results[$ct][0]."'>".stripslashes($Results[$ct][$a])."</a></span></td>";
			 }
			
			 }
			 
			 if($exclude_sort_order!="") { 
				$Strings .= "<td width='20'>";
				if($min_sort_order<$Results[$ct][5]){
					$Strings .= "<img class='twc_as' src='".$Plugin_URL."/cp/images/down.png' pid='".$Results[$ct][0]."' orderid='".$Results[$ct][5]."' ordertable='".$table_name."' ordactn='down'  />";
				}
				if($max_sort_order>$Results[$ct][5]){
					$Strings .= "<img class='twc_as' src='".$Plugin_URL."/cp/images/up.png' pid='".$Results[$ct][0]."' orderid='".$Results[$ct][5]."' ordertable='".$table_name."' ordactn='up'  />";
				}
				$Strings .= "</td>";
			 }
			 
			if($exclude_publish!=""){
				if($Results[$ct][$a]=='No'){
				$Strings .= "<td width='20'><div class='publishshow_play'><img src='".$Plugin_URL."/cp/images/wrong.png' fun='publish_this_id' width='16' height='16' title='Publish this article.' publish_id='".$Results[$ct][0]."' publishtable='".$table_name."' /></div</td>";
				}else{
				$Strings .= "<td width='20'><div class='publishshow_play'><img src='".$Plugin_URL."/cp/images/tick.png' fun='unpublish_this_id' width='16' height='16'  title='Unpublish this article.' publish_id='".$Results[$ct][0]."' publishtable='".$table_name."' /></div></td>";   
				}
			}
			$Strings .= "<td width='120'>". date("d-m-Y h:i:s",strtotime($Results[$ct][3]))."</td>";
			$Strings .= "<td width='22'><img src='".$Plugin_URL."/cp/images/delete-icon.png' width='11' height='15' alt='' class='delete_This' id='".$Results[$ct][0]."' val='".$Results[$ct][1]."' /></td>";
			$Strings .= "</tr>";
			}
			
		$msg_imp = "<div class='data'>" . $Strings . "</div>"; // Content for Data
		$msg="";

			
			
			
			
			/* --------------------------------------------- */
if(($_REQUEST["fn"]=="20") &&($_REQUEST['album_id']!="") && ($_REQUEST['album_id']!="all")){ 
 $Album .= " and album_id='".$_REQUEST['album_id']."'"; 
}
if(($_REQUEST["fn"]=="20") &&($_REQUEST['user_id']!="") && ($_REQUEST['user_id']!="all")){ 
 $Album .= " and user_id='".$_REQUEST['user_id']."'"; 
}

$query_pag_num = "SELECT COUNT(".$Flds[0].") AS counts FROM ".$table_name." where status_deleted=0 ".$Publisheds.$Album ;

$Results = $wpdb->get_results($query_pag_num);
foreach ( $Results as $Result ){
	$count = $Result->counts;
}
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i){
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
	}
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
//$goto = "<input type='text' class='goto' size='1' /><input type='button' id='go_btn' class='go_button' value='Go'/>";
$msg .= "<li><span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span></li>";
$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
if($count!=0){
echo $msg;
echo $msg_imp;
}
//echo $msg;
//End of Manage Pages
//echo $Strings;
//if($img_displayed!=""){ $getTotal_Number_Of_Fields_in_Table++ ; }
//return $getTotal_Number_Of_Fields_in_Table;


if($count!=0){
?>
</tbody>
<tfoot>
<td colspan="7"><p class="fl" <?php echo $total_none;?>>Total Result Found (<b><?php echo $count; ?></b>)</p><?php echo str_replace("pagination" , "paginationbottom" , $msg); ?>
</td>
</tfoot>
</table>
<?php 
}else{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col" style="background:#FFF; border:none;"><img src="<?php echo $PRO_URL; ?>/images/oops.jpg" /> <br />No Published item(s) Found. Please check All or Unpublished Section.<br /><br /></th>
  </tr>
</table>

<?php 
}

function getUser_id($id){
	global $wpdb;
	$result_arr =$wpdb->get_results("select title from twc_users where id='".$id."'");
	$result_obj =$result_arr[0];
	return $result_obj->title;
}
function getAlbum_Byid($id){
	global $wpdb;
	$result_arr =$wpdb->get_results("select title from twc_albums where id='".$id."'");
	$result_obj =$result_arr[0];
	return $result_obj->title;
}
?>
