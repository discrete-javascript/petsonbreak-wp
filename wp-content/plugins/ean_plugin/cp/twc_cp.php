<?php
	$Plugin_Path = dirname(__FILE__);
	$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";
	global $wpdb;
	$pos = strpos($Plugin_URL, "localhost");
	//$pos = strpos($Plugin_URL, "TWC-PC");
	
	if($pos === false){
		$modules = str_replace("/cp", "", $Plugin_Path)."/xml/";
	}else{
		$modules = str_replace("\\cp", "", $Plugin_Path)."\\xml\\";
	}
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
				if($id==$_REQUEST["page"]){
					$XML_File_Name = $fn;
				}
			}
		}
	}
	closedir($handle);
	
	$doc_twc_module_manager = new DOMDocument();
	$doc_twc_module_manager->load($XML_File_Name);
	$items = $doc_twc_module_manager->getElementsByTagName("Response");
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
			$nodename = $item->getElementsByTagName("sort_order_displayed");
			$sort_order_displayed = $nodename->item(0)->nodeValue;
			$nodename = $item->getElementsByTagName("small_img_folder_path");
			$small_img_folder_path = $nodename->item(0)->nodeValue;
			$nodename = $item->getElementsByTagName("short_code_Twc");
			$short_code_Twc = $nodename->item(0)->nodeValue;
			
		}
?> 
<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />-->
<link href="<?php echo $Plugin_URL; ?>/cp/css/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $Plugin_URL; ?>/cp/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $Plugin_URL; ?>/cp/js/functions.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $Plugin_URL; ?>/cp/js/jquery.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

<style>
.export_import_div{
	left: 30%;
    position: absolute;
    top: 30px;
    z-index: 100;
	display: none;
	background-color:#FFF;
	padding:10px;
}
</style>  
  
<script type="text/javascript">
function Show_This(obj){
		if((obj.value=="")||(obj.value=="Enter / Select Title of ")){
			obj.value="";
		}else{
			obj.select();
		}
		obj.onblur=function(){
			if((obj.value=="")||(obj.value=="Enter / Select Title of ")){
				obj.value="Enter / Select Title of ";
			}else{
				obj.select();
			}	
		}
	}
	function Activate_Search(){
	$("#search_id").keyup(function(event) {
			var msg = $(this).val();
		//if(msg.length>=2){
			$(this).addClass("Loading_Input");
			Search_Combo($(this))
		//}
	});
	}
	function Search_Combo(Obj){
		
		$(Obj).autocomplete({
		source: function(request, response) {
		$.ajax({
			url: "<?php echo $Plugin_URL; ?>/cp/combobox.php",
			dataType: "json",
			data: {
				action: "Populate_search_id",
				cri: Obj.val(),
				fn:"manage",
				page:$_REQUEST["page"]
			},
			success: function(data) {
				//alert(data);
				response(data);
				$(Obj).removeClass("Loading_Input");
			}
		});
		},
		select: function (event, ui) {
		//alert(ui)
		$(Obj).val(ui.item.label); // save selected id to hidden input
			//$("#Compaign_Title").val(ui.item.label); // display the selected text
			//alert(ui.item.label);
			//$(search_box_id).removeClass("Loading_Input");
			window.location="admin.php?page=add_twc_banner_manager&id="+ui.item.myId;
		}
		});									
											
		}
		
function Export_Data(tblname){
	$('.export_import_div').css('display','none');
	$('.expImp_cls').css('display','none');
	$.ajax({
			url: "<?php echo $Plugin_URL; ?>/cp/export_import_tbl.php",
			dataType: "json",
			data: {
				action: 'export',
				tbl: tblname,
				page: <?php echo $_REQUEST["page"];?>
			},
			success: function(results) {
			  ndata =JSON.stringify(results);	
			  $('.export_import_div').css('display','block');
			  $('#export_div').css('display','block');
			  $('#export').val(ndata);
			}
		});
}

function Import_Data(tblname){
	var fielddata=$('#import').val();
	
	$.ajax({
			url: "<?php echo $Plugin_URL; ?>/cp/export_import_tbl.php",
			dataType: "json",
			type: "POST",
			processData: false,
			data: "action=import&tbl="+tblname+"&fielddata="+fielddata,
			success: function(results) {
			  if(results==1){
				  window.location.href="";
			  }
			}
		});
}

function show_Import_box(){
 $('.expImp_cls').css('display','none');	
 $('.export_import_div').css('display','block');
 $('#import_div').css('display','block');
}
	
	
$(document).ready(function(){
						   <?php
if($_REQUEST["action"]==""){ 
	echo 'Update_Results();';
}else{
	
}
?>
				
				function Show_Confirm(title, subject){
					$("#background").fadeIn();
					$(".confirm-yn").fadeIn();
					$(".confirm-yn h4 span").html(title);
					$(".confirm-yn .delrw p").html(subject);
					
					$("#background").bind("click", function(){
						Evaluate_Confirm();									
					})
					$(".confirm-yn .delrw .okcbtn .oncd").bind("click", function(){
						Evaluate_Confirm();									
					})
					
					
					$(".confirm-yn h4 a").bind("click", function(){
						Evaluate_Confirm();									
					})
				}
				
				function Evaluate_Confirm(){
					$(".confirm-yn").fadeOut();
					$(".msgbox").fadeOut();
					$("#background").fadeOut();
				}
				Delete_All();
				function Delete_All(){
					
					$(".deleteAll").click(function(){
						Show_Confirm("Delete <?php echo $caption_of_button; ?> ?", "Are you sure, You want to delete the selected <?php echo $caption_of_button; ?>?")
						var Ids = "";
						
						
						
						$('.row_sel').each(function () {
							if(this.checked){
								Ids += $(this).val()+",";
							}
						});
						$(".confirm-yn .delrw .okcbtn .onc").bind("click", function(){
							Confirm_Del(Ids);									
						})		   
					})
					
					$(".import_table").click(function(){
						Show_Confirm("Import <?php echo $caption_of_button; ?>", '<form name="import_module" method="post" action="manage-modules/import-module.php" enctype="multipart/form-data"><input type="hidden" name="modName" id="modName" value="<?php echo $_REQUEST["action"]; ?>" />Select SQL File : <input name="file_name" id="file_name" type="file" /></form>')
						var Ids;					   
						for(a=1; a<=document.getElementsByName("row_sel[]").length; a++){
							if(document.getElementById(a).checked==true){
								Ids += document.getElementById(a).value+",";
							}
						}
						$(".confirm-yn .delrw .okcbtn .onc").bind("click", function(){
							//Confirm_Del(Ids);		
							if(document.getElementById("file_name").value!=""){
								document.import_module.submit();
							}else{
								alert("Please Select The SQL File");
							}
						})		   
					})
					
				}
				
				function Confirm_Del(Ids){
					var param = "action=Delete_All&Objs="+Ids+"&fn=<?php echo $table_name; ?>";
					//alert(param);
					
					myData = Results_Ajax(param, "divname", "Excecute");
					Evaluate_Confirm();		
				}
				function Delete_This(){
					$(".delete_This").click(function(){
						var Ids = $(this).attr("id");	
						var vals = $(this).attr("val");
						Show_Confirm("Delete <?php echo $caption_of_button; ?> ?", "Are you sure, You want to delete \""+vals+"\" ?")
						//var param = "action=Delete_All&Objs="+Ids+"&fn=<?php echo $_REQUEST["action"]; ?>";
						////myData = Results_Ajax(param, "divname", "Excecute");			   
						$(".confirm-yn .delrw .okcbtn .onc").bind("click", function(){
							Confirm_Del(Ids);									
						})	
					})
				}
				
				function Activate_Publish_UnPublish(){
					$(".publishshow_play img").click(function(){
						var divname;
						var unpublish_id = $(this).attr("publish_id");
						var unpublishtable = $(this).attr("publishtable");
						var fun = $(this).attr("fun");
						var param = "action="+fun+"&articleid="+unpublish_id+"&tablename="+unpublishtable;
						myData = Results_Ajax(param, divname, "Excecute");
						if(fun=="unpublish_this_id"){
							$(this).attr("src", "<?php echo $Plugin_URL; ?>/cp/images/wrong.png");
							$(this).attr("fun", "publish_this_id");
						}else{
							$(this).attr("src", "<?php echo $Plugin_URL; ?>/cp/images/tick.png");
							$(this).attr("fun", "unpublish_this_id");
						}
					  })	
				}
				
				
				
				
				
				
				function Change_Sort_Order(){
					//alert("ASFAk");
					$(".twc_as").click(function(){					
						
						var divname;
						var pid = $(this).attr("pid");
						var ordertable = $(this).attr("ordertable");
						
						var currentorder = $(this).attr("orderid");
						var ordactn = $(this).attr("ordactn");
						
						if($("#category").val()==undefined){
							var catID='';
						}else{
							var catID=$("#category").val();
						}
						
						
						var param = "action="+ordactn+"&articleid="+pid+"&tablename="+ordertable+"&current_order="+currentorder+'&catID='+catID;
						//alert(param);
						myData = Results_Ajax(param, divname, "Excecute");
						
					  })	
				}
				
				
				
				
				
				
				function Results_Ajax(param, divname, parseData, Loader){
				//alert(param);
				var attempte = 5;
				if(parseData==""){
					$(divname).html(Loader);
				}
				var $ajaxRequest = $.ajax({
				type: "POST",
				url: "<?php echo $Plugin_URL; ?>/cp/functions.php",
				data: param,
				success: function(msg){
				//$(".paginationbottom").html(msg);
				//return false;
				//	document.write(msg);
				var myData="";
					if(parseData=="parseData"){
						//alert(msg);
						myData = JSON.parse(msg);
						//populateListBox(divname, myData[a].text, myData[a].id);
					}
					if(parseData=="Excecute"){
						//alert(msg);
						Update_Results();
						//$(divname).html(msg);
					}
					if(parseData==undefined){
						//alert(msg);
						$(divname).html(msg);
					}
					if(parseData=="Validate_Login_ID"){
						if(msg==-1){
							$(divname).html("Msg : Login Successfully.");
							Redirect_SuccessLogin();
						}
						if((msg>=0)&&(msg!=100)){
							$(divname).html((attempte-msg)+" Attempt Remaining");	
						}
						if(msg==100){
							$(divname).html("No. Of Attempts Exceeded. Please try later.");	
						}
					}
		},
		error: function(){
		alert("Unable to Fetch Record");
		}
		});	
	}
	
				function Update_List(){
					$("#dt_gal_length").change(function(event) {
						Update_Results();
					//}
					});	
					
					$("#category").change(function(event) {
						Update_Results();
					});	

				}
				
				function Update_Results(page){
				//alert("HellO");
				//Cancel_Previous_Ajax_REquest();
				$("#loading").fadeIn();
				if($("#dt_gal_length").val()==undefined){
					dt_gal_length = 50;
				}else{
					dt_gal_length = $("#dt_gal_length").val();
				}
				if(page==undefined){
					URL = "page=1&fn=<?php echo $_REQUEST["page"]; ?>"
				}else{
					URL = "page="+page+"&fn=<?php echo $_REQUEST["page"]; ?>&d";
				}
				
				if($("#category").val()==undefined){
					var catID='';
				}else{
					var catID=$("#category").val();
				}
				
				URL += "&dt_gal_length="+dt_gal_length+"&method="+$("#sort_order_type_search").val()+"&asc_desc="+$("#sort_order_type_asc_desc").val()+"&pub="+$("#pub").val()+"&catID="+catID;
				//alert(URL);
				//Previous_Search_Val = $("#sort_order_type_search").val();
				loadData(URL);
				}
				
				function loadData(page){
				$.ajax({  
				type: "POST",  
				url: "<?php echo $Plugin_URL; ?>/cp/load-table.php",
				data: page,
				success: function(msg){ 
					//alert(msg);
					$("#right-div").html(msg);
					Activate_Next_Previous();
					Update_List();
					Activate_Search();
					Activate_Publish_UnPublish();
					Delete_All();
					Delete_This();
					Activate_Sorting();
					
					Change_Sort_Order();
					$("#loading").fadeOut();
				},error: function(){  
					alert("Unable to Fetch Record");
				}  
				});  
				
				//make sure the form doesn't post  
				return false;  
				}
				
				
				var Previous_Search_Val = "date_time";
				function Activate_Sorting(){
					$(".title_sort").click(function(){
						if(Previous_Search_Val==$("#sort_order_type_search").val()){
							Vals = $("#sort_order_type_asc_desc").val();
							if(Vals=="desc"){
								$("#sort_order_type_asc_desc").val("asc");
							}else{
								$("#sort_order_type_asc_desc").val("desc");	
							}
						}
						$("#sort_order_type_search").val($(this).attr("fn"));
						Previous_Search_Val=$("#sort_order_type_search").val();
						Update_Results();
					})
					
				}
				
				function Activate_Next_Previous(){
					$('.pagination li.active').click(function(){
						var page = $(this).attr('p');
						Update_Results(page);
					});           
						
					$('.paginationbottom li.active').click(function(){
						var page = $(this).attr('p');
						Update_Results(page);
	                });           
				}
				$(".pub_unpub").click(function(){
					$("#pub").val($(this).attr("pub"));
					Update_Results();							   
				})
				$(".update-nag").css("display", "none");
})
var xmlhttp;
function GetResult(url){
	xmlhttp=null;
	if (window.XMLHttpRequest){// code for IE7, Firefox, Opera, etc.
	  xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (xmlhttp!=null){
	  xmlhttp.open("GET",url,false);
	  xmlhttp.send(null);
	  Search_Results=xmlhttp.responseText;
	  return Search_Results;
	}	
	else{
	  alert("Your browser does not support XMLHTTP.");
	}
}
/*function ChangeOrder(action, table, id, current_order){
	
	alert(id);
	alert(current_order);
	alert(table);
	URLss = "function.php?action="+action+"&table="+table+"&current_order="+current_order+"&id="+id;
    var Result = GetResult(URLss);
	alert(URLss);
	//window.location.reload();
	Update_Results();
}*/
</script>
<div id="cms-toolbar">
<div style="display:none;">
    <input type="text" value="<?php if($sort_order_displayed==''){ echo "date_time"; }else{ echo $sort_order_displayed; }?>" name="sort_order_type_search" id="sort_order_type_search" />
    <input type="text" value="asc" name="sort_order_type_asc_desc" id="sort_order_type_asc_desc" />
    <input type="text" value="Yes" name="pub" id="pub" />
    
    </div>
<div class="compose"><?php echo $title_of_page;?> [ <a href="admin.php?page=<?php echo $_REQUEST["page"]; ?>">Manage Page</a>]</div>


<div class="links-Mang">
<?php if($_REQUEST['page']=='-1') {?>
<a href="javascript:void(0);" onclick="Export_Data('<?php echo $table_name;?>')"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/add-m.png" width="16" height="15" /></span>Export Data</a>

<a href="javascript:void(0);" onclick="show_Import_box();"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/add-m.png" width="16" height="15" /></span>Import Data</a>

<?php } ?>

<a href="admin.php?page=<?php echo $_REQUEST["page"]; ?>&amp;action=add"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/add-m.png" width="16" height="15" /></span>Add a <?php echo $caption_of_button; ?></a>

<a class="red-bg pub_unpub" href="javascript:void(0);" pub="All"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/all-i.png" width="16" height="15"   /></span>All</a>
<a class="red-bg pub_unpub" href="javascript:void(0);" pub="Yes"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/publ-i.png" width="16" height="15"  /></span>Published</a>
<a class="red-bg pub_unpub" href="javascript:void(0);" pub="No"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/unpl-i.png" width="16" height="15"  /></span>Unpublished</a>


<?php if($_REQUEST["action"]==""){ ?>
<a class="red-bg deleteAll" href="javascript:void(0);"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/remo-i.png"  /></span>Remove Selected <?php echo $caption_of_button; ?></a>
<?php }else{ ?>
<a class="red-bg deleteAll" href="javascript:void(0);"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/remo-i.png"  /></span>Remove this <?php echo $caption_of_button; ?></a>
<?php } ?>
<!--<a class="red-bg deleteAll" href="#"><span><img src="<?php echo $Plugin_URL; ?>/cp/images/remo-i.png" /></span>Remove This <?php echo $caption_of_button; ?></a>
-->
</div>


</div>
<div id="right-div">
<?php
if($_REQUEST["action"]==""){ 
}
else if(($_REQUEST["action"]=="export") && ($_REQUEST["expfilename"]!='')){ 
 include("export_tbl.php");
}
else if($_REQUEST["action"]=="booking_details"){ 
 include("booking_details.php");
}
else if($_REQUEST["action"]=="download_booking_history"){ 
 include("download_booking_history.php");
}
else{
include("add.php");
}
?>
</div>
<div class="fixed-position loadings" id="loading">Loading...</div>
<div class="confirm-yn">
<h4><span>Delete Message</span><a href="javascript:void(0);"><img src="<?php echo $Plugin_URL; ?>/cp/images/add-del.png" width="7" height="7" /></a></h4>
<div class="delrw">
	<p>Are you sure you want to permanently delete the selected messages?</p>
    <div class="okcbtn"> <input name="" class="onc" type="button" value="OK" /> <input class="oncd" value="Cancel" name="" type="button" /></div>
</div>
</div>
<div class="msgbox">
<h4><span>Delete Message</span><a href="javascript:void(0);"><img src="<?php echo $Plugin_URL; ?>/cp/images/add-del.png" width="7" height="7" /></a></h4>
<div class="delrw">
	<p>Are you sure you want to permanently delete the selected messages?</p>
    <div class="okcbtn"> <input name="" class="onc" type="button" value="OK" /></div>
</div>
</div>
<div class="fixed-position background" id="background"></div>