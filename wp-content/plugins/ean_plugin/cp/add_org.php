<?php 

$Request_id = $_REQUEST["id"];

//echo $Request_id;

//$Request_id = 'WH1369376363W519f066bc7499';

add_action('admin_print_scripts', 'do_jslibs' );

add_action('admin_print_styles', 'do_css' );

global $wpdb;

function do_css()

{

wp_enqueue_style('thickbox');

}

function do_jslibs()

{

wp_enqueue_script('editor');

wp_enqueue_script('thickbox');

add_action( 'admin_head', 'wp_tiny_mce' );

}

/*if($_REQUEST['page']==15 && $_REQUEST['id']=='TWCU1378796061TWC522ec21d0b26c'){

}*/

?>

<?php

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

//$nodename = $item->getElementsByTagName("downlaod_opt");

//$downlaod_opt = $nodename->item(0)->nodeValue;

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

<?php

if($_REQUEST['page']==8){

$ip_addres =$_SERVER['REMOTE_ADDR'];

//$ip_addres ='122.176.234.245';

$xmlString =file_get_contents('http://api.ipinfodb.com/v2/ip_query.php?key=f11a3501f53a92a904a9fba18724e52ee3114f7a4b46cc6cf3f3b364d19638a9&ip='.$ip_addres.'&timezone=false');

$xml_obj = simplexml_load_string($xmlString);

//echo "<pre>";

//print_r($xml_obj);

$address_by_ip =$xml_obj->City.', '.$xml_obj->CountryName;

$Latitude =$xml_obj->Latitude;

$Longitude =$xml_obj->Longitude;

}

?>

<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />-->

<link href="<?php echo $Plugin_URL; ?>/cp/css/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">

#right-div table tbody tr td {

padding:0px;

}

#right-div table tbody tr {

background:none;

}

</style>



<div style="display:none;">

<input type="text" value="<?php if($sort_order_displayed==''){ echo "date_time"; }else{ echo $sort_order_displayed; }?>" name="sort_order_type_search" id="sort_order_type_search" />

<input type="text" value="desc" name="sort_order_type_asc_desc" id="sort_order_type_asc_desc" />

<input type="text" value="Yes" name="pub" id="pub" />

</div>

<script src="<?php echo $Plugin_URL; ?>/cp/js/jquery-ui.js"></script>

<script src="<?php echo $Plugin_URL; ?>/cp/jscolor/jscolor.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slider.css"/>

<link rel='stylesheet' id='explorable-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/style.css' type='text/css' media='all' />

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDh_3ZVg8P_wytSc5bqDJMa-5w3HkFpBDs   &libraries=places"></script>


<?php if($_REQUEST['page']==10){?>
<script type="text/javascript" src="<?php echo $Plugin_URL; ?>/uploadify/jquery.form.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('#images').on('change',function(){
		jQuery('#multiple_upload_form').ajaxForm({
			target:'#images_preview',
			beforeSubmit:function(e){
				$('.uploading').show();
			},
			success:function(e){ 
				$('.uploading').hide();
			},
			error:function(e){
			}
		}).submit();
	});
});

function deleteFile(id){
 jQuery.ajax({
		 type: 'POST',  
		 data: 'action=deleteHotelFile&id='+id,
		 url: '<?php echo site_url();?>/wp-content/plugins/ean_plugin/cp/custom-ajax.php',
		 success: function(msg){
			jQuery('#fileId_'+id).remove();
		 }
	})	
}
</script>
<script type="text/javascript">
	google.maps.event.addDomListener(window, "load", function () {
	var places = new google.maps.places.Autocomplete((document.getElementById("hotel_address")));
	google.maps.event.addListener(places, "place_changed", function () {
		var place = places.getPlace();
		var address = place.formatted_address;
	
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	});		 
   });
	
  jQuery("input#hotel_address").focusin(function () {
	jQuery(document).keypress(function (e) {
		if (e.which == 13) { 
		  e.preventDefault();
			var firstResult = jQuery(".pac-container .pac-item:first").text();
			//var firstResultName = $(".pac-container .pac-item:first").text();
		  var firstResultName='';
		  if(jQuery(".pac-container .pac-item:first span:eq(3)").text() == "")
			  firstResultName = jQuery(".pac-container .pac-item:first .pac-item-query").text();
		  else
			 firstResultName = jQuery(".pac-container .pac-item:first .pac-item-query").text() + ", " + jQuery(".pac-container .pac-item:first span:eq(3)").text();                
			
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({"hotel_address":firstResult }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var lat = results[0].geometry.location.lat(),
						lng = results[0].geometry.location.lng(),
						placeName = results[0].address_components[0].long_name,
						latlng = new google.maps.LatLng(lat, lng);
						jQuery(".pac-container .pac-item:first").addClass("pac-selected");
						jQuery(".pac-container").css("display","none");
						jQuery("#hotel_address").val(firstResultName);
						//$(".pac-container").css("visibility","hidden");
						document.getElementById("latitude").value = lat;
						document.getElementById("longitude").value = lng;
				}
			});
		
		}
	});
});	

</script>
<?php }?>

<?php if($_REQUEST['page']==13){?>
<script type="text/javascript">
google.maps.event.addDomListener(window, "load", function () {
	var places = new google.maps.places.Autocomplete((document.getElementById("destination")));
	google.maps.event.addListener(places, "place_changed", function () {
		var place = places.getPlace();
		var address = place.formatted_address;
	
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	});		 
   });
	
</script>
<?php }?>

<?php if($_REQUEST['page']==14){?>
<script type="text/javascript">
	google.maps.event.addDomListener(window, "load", function () {
	var places = new google.maps.places.Autocomplete((document.getElementById("address")));
	google.maps.event.addListener(places, "place_changed", function () {
		var place = places.getPlace();
		var address = place.formatted_address;
	
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	});		 
   });
  </script>
<?php }?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/infobox.js"></script>

<script>
var map;
var geocoder;
var markers = [];
var Info_Boxes = [];
var asc_desc = 1;	
var Update_Results_Now = null;

function codeLatLng(marker_lat, marker_lng) {
  geocoder = new google.maps.Geocoder();
  var lat = parseFloat(marker_lat);
  var lng = parseFloat(marker_lng);
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {

        //map.setZoom(11);
		if(document.getElementById("user_address").value!=""){

			var conf = confirm("We can see that you updated your marker to the location : '"+results[1].formatted_address+"'\n\nYour location with us is : '"+document.getElementById("user_address").value+"'\n\n Do you want to update the location selected in map into the database ?\n\n You will have to submit the form to save the newly updated location. If its a mistake, You may discard the changes by pressing 'Cancel' and then refreshing the page.");

			if(conf==true){
				document.getElementById("user_address").value = results[1].formatted_address;
			}
		}else{
			document.getElementById("user_address").value = results[1].formatted_address;
		}

      } else {

        alert('No results found');

      }

    } else {

      alert('Geocoder failed due to: ' + status);

    }

  });

}



function Find_Address(address){

	if(document.getElementById("user_address").value!=""){

	geocoder = new google.maps.Geocoder();

	geocoder.geocode( { 'address': address}, function(results, status) {

	if (status == google.maps.GeocoderStatus.OK) {

		map.setCenter(results[0].geometry.location);

		marker.setPosition(results[0].geometry.location);

		var marker_pos = marker.getPosition();

		var marker_lat = marker_pos.lat();

		var marker_lng = marker_pos.lng();

		//$('#lat').val(marker_lat);

		//$('#longi').val(marker_lng);

		

	} else {

		alert('Geocode was not successful for the following reason: ' + status);

	}

	});

	}

}



<?php 

 $SQLss = $wpdb->get_results("SELECT * FROM twc_users  WHERE id='".$Request_id."'");

	foreach ( $SQLss as $User_Detailss ){

		$user_locations = $User_Detailss->user_location;

		$titles = $User_Detailss->title;

		$file_names = $User_Detailss->file_name;

		$user_websites = $User_Detailss->user_website;

		$user_addresss = $User_Detailss->user_address;

		$user_emails = $User_Detailss->user_email;

		$level_of_aura_ids = $User_Detailss->level_of_aura_id;		

		$spectrum_affinity_ids = $User_Detailss->spectrum_affinity_id;

		$experties_ids = $User_Detailss->experties_id;

		$img_paths = $User_Detailss->img_path;

	}

	if(($Request_id!="") && ($User_Detailss->lat!=''))

	 {

		$lats = $User_Detailss->lat;

		$longis  = $User_Detailss->longi;

	}else{

		//$lats = "52.38021";

		//$longis  = "4.896362";

		 $lats = $Latitude; 

		 $longis  = $Longitude;

		}

	?>





function loading_Google_Map(){

			var haightAshbury = new google.maps.LatLng(<?php echo $lats; ?>,<?php echo $longis; ?>);

			var mapOptions = {

			zoom: 6,

			center: haightAshbury,

			mapTypeId: google.maps.MapTypeId.ROADMAP

			};

			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			

<?php 

  $SQLs = $wpdb->get_results("SELECT * FROM twc_users  WHERE id='".$Request_id."'");

	foreach ( $SQLs as $User_Details ){ 

		$user_location = $User_Details->user_location;

		$title = $User_Details->title;

		$file_name = $User_Details->file_name;

		$user_website = $User_Details->user_website;

		if($User_Details->user_address==''){

			$user_address =$address_by_ip;

		}else{

		 $user_address = $User_Details->user_address;

		}

		$user_email = $User_Details->user_email;

		$level_of_aura_id = $User_Details->level_of_aura_id;		

		$spectrum_affinity_id = $User_Details->spectrum_affinity_id;

		$experties_id = $User_Details->experties_id;

		$img_path = $User_Details->img_path;

		if($User_Details->lat==''){ 

		 $lat = $Latitude;

		 $longi  = $Longitude;

		}else{ 

		$lat = $User_Details->lat;

		$longi  = $User_Details->longi;

		}

	}

	

	?>

	<?php if($Request_id==""){ ?>

	marker = new google.maps.Marker({

			position: new google.maps.LatLng(<?php echo $lats;?>, <?php echo $longis; ?>),

			map: map,

			draggable : true,

			icon : '<?php echo get_template_directory_uri(); ?>/images/point-red.png'

		});

	  $('#lat').val(<?php echo $lats;?>);

	  $('#longi').val( <?php echo $longis; ?>);

	  $('#user_address').val('<?php echo $address_by_ip; ?>');

	<?php }else{ ?>

	addMarker('<?php echo $lat;?>','<?php echo $longi;?>', '<?php echo $Plugin_URL; ?>/images/UserImages/<?php echo $img_path;?>', '<?php echo preg_replace('/\\r?\\n|\\r/','<br/>',$user_address);?>', '<?php echo $title;?>', '<?php echo $file_name;?>');

	

	  $('#lat').val(<?php echo $lat;?>);

	  $('#longi').val( <?php echo $longi; ?>);

	  $('#user_address').val('<?php echo $user_address; ?>');

	<?php } ?>

	//Activate_Open_Info_Window();

	google.maps.event.addListener(marker, 'dragend', function() { 

		var marker_pos = marker.getPosition();

		var marker_lat = marker_pos.lat();

    	//alert(marker_pos);

		var marker_lng = marker_pos.lng();

    	//alert(marker_lng);

		$('#lat').val(marker_lat);

		$('#longi').val(marker_lng);

		codeLatLng(marker_lat, marker_lng)

		

  	});

}



function addMarker(lat, long, ThumbnailURL, Address1, hotel_name, EANHotelID) {

		boxTextVal="";

		marker = new google.maps.Marker({

			position: new google.maps.LatLng(lat, long),

			map: map,

			draggable : true,

			

			icon : '<?php echo get_template_directory_uri(); ?>/images/point-red.png'

		});

		

		var boxText = document.createElement("div");

		boxTextVal = '<div class="placediv">';

		boxTextVal += '<img src="'+ThumbnailURL+'" alt="" width="90" height="90">';

        boxTextVal += '<div class="addR">'+Address1+'</div>';

        boxTextVal += '<div class="place_title" style="font-size:16px;">'+hotel_name+'</div>';

        boxTextVal += '</div>';

		

boxText.innerHTML=boxTextVal;

		

		var myOptions = {

		content: boxText

		,disableAutoPan: true

		,maxWidth: 0

		,pixelOffset: new google.maps.Size(-140, 0)

		,zIndex: 10000

		,infoBoxClearance: new google.maps.Size(1, 1)

		,isHidden: false

		,enableEventPropagation: false

		};

		

		var ib = new InfoBox(myOptions);

		google.maps.event.addListener(marker, "mouseover", function (e) {

		if(Info_Boxes){

			for (i in Info_Boxes){

				Info_Boxes[i].setMap(null);

			}

		}

			ib.open(map, this);

			this.setIcon("<?php echo get_template_directory_uri(); ?>/images/point-blue.png");

		});

		google.maps.event.addListener(marker, "mouseout", function (e) {

		this.setIcon("<?php echo get_template_directory_uri(); ?>/images/point-red.png");														

		});

		/*google.maps.event.addListener(marker, "click", function (e) {

			window.location="hotel-info.php?id="+EANHotelID;

		});*/

		

		

		

		google.maps.event.addListener(marker, "mouseout", function (e) {

		if(Info_Boxes){

			for (i in Info_Boxes){

				Info_Boxes[i].setMap(null);

			}

		}

		});

		

		Info_Boxes.push(ib);

		markers.push(marker);

		for (i in Info_Boxes){

				Info_Boxes[i].setMap(null);

		}

		

		/*map.event.addListener(marker, 'dragend', function(evt){

  			 alert('Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3));

		});*/

}			

			

function Activate_Open_Info_Window(){

	$(".hotel-ls").click(function(){

		window.location="hotel-info.php?id="+$(this).attr("url");

	});

	$(".hotel-ls").hover(function(){

		$(this).addClass("selected_hotel-ls");

		vars = $(this).attr("id");

		lat = $(this).attr("id");

		long = $(this).attr("id");

		

		if(Info_Boxes){

			for (i in Info_Boxes){

				Info_Boxes[i].setMap(null);

			}

		}

		Info_Boxes[vars].open(map, markers[vars]);

		map.setCenter(new google.maps.LatLng(lat,long));

	});

	$(".hotel-ls").mouseout(function(){

		$(this).removeClass("selected_hotel-ls", "medium");

	});

}			

			

google.maps.event.addDomListener(window, 'load', loading_Google_Map);

</script>



<script type="text/javascript">

function setSeoUrl(url)

{

var new_url=url.replace(/[^a-zA-Z 0-9]+/g,'');

new_url=new_url.replace(/[\s]+/g,'-');

new_url=new_url.toLowerCase();

document.getElementById('file_name').value=new_url;

}

function checkSeoUrl(seoUrl,section,sectionId,fieldName,tableName,responseId)

{ 

$.ajax({

url: "manage-modules/ajax_function_general.php?actions=checkUrl",

type: "POST",

data: "seourl="+seoUrl+"&section="+section+"&id="+sectionId+"&filename="+fieldName+"&tablename="+tableName,

success: function(data){

$("#"+responseId).html(data);

$("#"+responseId).show("slow");

}

});

}

</script>







<?php if($_REQUEST["page"]==23) {?>

<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/images/main.css">

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/prototype-1.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/prototype-base-extensions.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/prototype-date-extensions.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/behaviour.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/datepicker.js"></script>

<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/datepicker.css">

<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/Date-Time-Picker/images/behaviors.js"></script>

<style>

.datepickerControl table{width:200px !important; }

.left_legend{ min-height:600px;}

</style>

<?php }?>





<?php if($_REQUEST['page']=='8'){ ?>

<fieldset style="width:95%; float:left" class="left_legend"><legend>Google Map</legend>

<div class='googlemap' id='map-canvas' style='width:1099px;height:356px;'></div>

<?php } ?>

</fieldset>

<div id="right-div">

<form class="form_validation_ttip" name="form_twc" id="form_twc" action="<?php echo $Plugin_URL; ?>/cp/save.php

<?php if($Request_id!=""){ 

echo "?id=".$Request_id."&page=".$_REQUEST["page"]; 

}else{ 

?>?page=<?php echo $_REQUEST["page"]; ?><?php }	?>" method="post" enctype="multipart/form-data">

<input type="hidden" name="actionss" value="<?php echo $_REQUEST["action"]; ?>" />

<input type="hidden" name="XML_File_Name" value="<?php echo $XML_File_Name; ?>" />

<input id="1" type="checkbox" name="row_sel[]" class="row_sel" value="<?php echo $Request_id; ?>" checked="checked" style="display:none;">

<?php

//Initials Required

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

}

//Create SQL Statement

$form_Elements = $doc->getElementsByTagName("fields"); 

$Flds = explode(",", $manage_page_field_list);

$SQL = "select ";

foreach( $form_Elements as $form_Element ){ 

$name = $form_Element->getAttribute('name');

$datatype = $form_Element->getAttribute('datatype');

$display_this_on_database = $form_Element->getAttribute('display_this_on_database');

$type = $form_Element->getAttribute('type');

//$display_from_post = $form_Element->getAttribute('display_from_post');

// If Fieldset Is On

if(($name!="fieldset") && ($display_this_on_database!="N") && ($type!="iframe")){

$SQL .= $name.", ";

//Check_Field_Exists_If_Not_Create($name, $table_name, $datatype);

}

// End If Fieldset Is On

}

if($_REQUEST['page']==2){

$SQL .= " date_time from ".$table_name." where status_deleted=0 and RegionID ='".$Request_id."'";

}else{

$SQL .= " date_time from ".$table_name." where status_deleted=0 and ".$Flds[0]."='".$Request_id."'";	

}

//echo $SQL;

//die();

//$result = $oEasyDBPoolcl->GetRecordSet($SQL);

//$row = mysql_fetch_array($result);

$Results = $wpdb->get_row($SQL, ARRAY_A);

//echo	$Results["title"];

//End of Create SQL Statement

foreach( $form_Elements as $form_Element ){

$name = $form_Element->nodeValue;

//$name = $nodename->form_Element(0)->nodeValue;

$display_this_on_form = $form_Element->getAttribute('display_this_on_form');

$name = $form_Element->getAttribute('name');

$type = $form_Element->getAttribute('type');

$ext = $form_Element->getAttribute('ext');

$datatype = $form_Element->getAttribute('datatype');

$label = $form_Element->getAttribute('label');

$validation = $form_Element->getAttribute('validation');

$class = $form_Element->getAttribute('class');

$dropdownheight = $form_Element->getAttribute('dropdownheight');

if($Request_id!=""){

$readonly = $form_Element->getAttribute('readonly');

}

//$validation_description = $form_Element->getAttribute('validation_description');

$validation_description = "Field '".$label."' cannot be left blank";

$multiple_selection = $form_Element->getAttribute('multiple_selection');

$rich_text_enable = $form_Element->getAttribute('rich_text_enable');

$cols = $form_Element->getAttribute('cols');

$rows = $form_Element->getAttribute('rows');

$fieldset = $form_Element->getAttribute('fieldset');

$caption = $form_Element->getAttribute('caption');

$sizes = $form_Element->getAttribute('sizes');

$styles = $form_Element->getAttribute('styles');

$checked = $form_Element->getAttribute('checked');

$default_value = $form_Element->getAttribute('default_value');

$parent_field = $form_Element->getAttribute('parent_field');

if(($Request_id=="")){

$event = $form_Element->getAttribute('event');

$function_name = $form_Element->getAttribute('function_name');

$event_on_form = $form_Element->getAttribute('event_on_form');

$file_name_on_form = $form_Element->getAttribute('file_name_on_form');

$file_name_id = $form_Element->getAttribute('file_name_id');

}

$display_this_on_database = $form_Element->getAttribute('display_this_on_database');

$aligns = $form_Element->getAttribute('aligns');

//echo $parent_field;

//IFrame

$heights = $form_Element->getAttribute('heights');

$widths = $form_Element->getAttribute('widths');

$frameborder = $form_Element->getAttribute('frameborder');

$src = $form_Element->getAttribute('src');

$iframe_id = $form_Element->getAttribute('iframe_id');

//End IFrame

//Populate the list box(drop down) from other table

//$import_from_table = $form_Element->getAttribute('import_from_table');

$import_from_table_name = $form_Element->getAttribute('import_from_table_name');

$field1 = $form_Element->getAttribute('field1');

$field2 = $form_Element->getAttribute('field2');

$field3 = $form_Element->getAttribute('field3');

$display_from_post = $form_Element->getAttribute('display_from_post');

$color_picker = $form_Element->getAttribute('color_picker');

$find_address = $form_Element->getAttribute('find_address');

//End of Populate the list box(drop down) from other table

//$value = stripslashes($row[$name]);

$value = stripslashes($Results[$name]);

//Field Set Check

if($fieldset=="Start"){

if($aligns=="left"){

$add_to_form .= "<fieldset style='width:72%; float:left' class='left_legend'><legend>".$caption."</legend>"; 

}else{

$add_to_form .= "<fieldset style='position:absolute; width:20%; right:0px; margin:right:10px;'><legend>".$caption."</legend>"; 

}

}

if($fieldset=="End"){

$add_to_form .= "</fieldset>"; 

}

//End of Field Set Check

//Check if This form element is allowed to displayed in form

if($display_this_on_form=="Y"){

//Label

if($type=="hidden"){

$add_to_form .= "<h4 style='display:none'>".$label." "; 	

}else{

$add_to_form .= "<h4>".$label." "; 				

}

//End of Label

//if Validation 

if($validation=='Y'){

$add_to_form .= get_validation($validation)." <span><img src='".$Plugin_URL."/cp/images/mark-a.png' width='16' height='16'  title='Field - ".$label.", cannot be left blank.'></span>";

}//End if Validation

$add_to_form .= "</h4> ";

//If Element type is file

if($type=="file"){ 

$add_to_form .= "<div class='uni-uploader' id='uniform-uni_file'>";

$add_to_form .= "<span class='dfimg'>";

if($Request_id!=""){

$nodename = $form_Element->getElementsByTagName("options");

$path = $nodename->item(0)->getAttribute('paths');

$add_to_form .= "<img src='".$Plugin_URL."/images/".$path.$value."' width='50' height='44' />";

}

$add_to_form .= "</span>";

$add_to_form .= Populate_Image($type, $name, $class, $sizes, $styles);

$add_to_form .= "</div>";

//$add_to_form .= "<br>";

//End If Element type is file

//If Element type is DATE

}

elseif($datatype=="date"){

$add_to_form .="<div class='span3'>"; 

$add_to_form .="<div class='input-append date dp2' data-date-format='yyyy-mm-dd'>"; 

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' class='".$class."' readonly='".$readonly."'><span class='add-on'><i class='splashy-calendar_day'></i></span>";

$add_to_form .="</div>"; 

$add_to_form .="</div>"; 

//$add_to_form .= "<br>";

//End If Element type is DATE

//If Element type is Checkbox

}elseif($type=="checkbox"){

$add_to_form .= Populate_checkboxes($form_Element, $value, $import_from_table_name, $field1, $field2, $type, $name);

// End If Element type is Checkbox

//If Element type is Radio

}elseif($type=="radio"){

$add_to_form .= Populate_radio($form_Element, $value, $import_from_table_name, $field1, $field2, $type, $name, $checked);

//End If Element type is Radio

//If Multiple Selectuion is On

}elseif($multiple_selection=="Y"){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."[]' id='".$name."' class='".$class."' style='height: ".$dropdownheight."' multiple='multiple'>"; 

//End If Multiple Selectuion is On

//If event is On

}elseif($event_on_form=="Y"){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$name."'  class='".$class."' ".$event."=".$function_name."(this.value);>";

//End If event is On 



}elseif($color_picker=="Yes"){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$name."'  class='color'>";

}elseif($find_address=="Yes"){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$name."'  class='".$class."' onblur='Find_Address(this.value)'>";





}elseif($readonly=="readonly"){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$name."'  class='".$class."' readonly>";

//File Name

}elseif(($file_name_on_form=="Y")){

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$file_name_id."'  class='".$class."' ".$event."=".$function_name."(this.value,'".$_REQUEST["action"]."','".$Request_id."','".$name."','".$table_name."','seoDiv');><div id='seoDiv' style='display:none; clear:both'></div>";

//End File Name 

}else{

//Form field

if($rich_text_enable=="Y"){

$field_id=$name;

//$add_to_form .= the_editor('<h2>Some content</h2>','content');

echo $add_to_form;

echo "<div class='single_editor'>";

the_editor($value,$field_id);

echo "</div>";

$add_to_form="";

//echo "Enabled";



}else{

$field_id=$name;

$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly)." name='".$name."' id='".$field_id."'  class='".$class."'>";

}

//$add_to_form .= get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder, $default_value, $rich_text_enable)." name='".$name."' id='".$field_id."'  class='".$class."'>";

//the_editor('<h2>Some content</h2>','content');

}

//If Element type is Select

if($type=="select"){

if(($_REQUEST['page']=='8') && ($_REQUEST['id']=='') && ($display_from_post=='Yes'))

{

global $wpdb;

$myrows = $wpdb->get_results( "select * from ".$import_from_table_name." where post_status='publish' and is_level_of_aura='Yes' order by post_title asc");

foreach ( $myrows as $Result ){

$is_level_of_aura = $Result->is_level_of_aura;

$id = $Result->ID;

$post_title = $Result->post_title;

$add_to_form .= "<option value='".$id."' selected='selected'>".$post_title."</option>";

}

}

else

{

$add_to_form .= Populate_list($form_Element, $value, $import_from_table_name, $field1, $field2, $field3, $parent_field,$display_from_post);

}

//echo $options_of_select;

}//End of If Element Type is select

$add_to_form .= get_inputEnd($type, $value, $rich_text_enable);

//$add_to_form .="</br></br>";

//End of Form Field

}

//End of Check if This form element is allowed to displayed in form

if(($validation=="Y")&&($display_this_on_form=="Y")){ $validation_text .= "if(document.form_twc.".$name.".value==''){alerts('Field \'".$label."\' cannot be left blank.');document.getElementById('".$name."').focus();return false;}"; }

}

/* if($_REQUEST['page']=='8'){

$add_to_form .="<div class='googlemap' id='map-canvas' style='width:445px;height:312px;'></div>";

}*/

function get_validation($validation){

if($validation=="Y"){

return "*";

}

if($validation=="N"){

return "";

}

}

function get_inputType($type, $value, $cols, $rows, $src, $iframe_id, $heights, $widths, $frameborder,$default_value, $dropdownheight,$event, $function_name, $event_on_form,$file_name_on_form,$file_name_id, $rich_text_enable,$readonly){

//echo $rich_text_enable;

if(($type=="text")||($type=="hidden")){

if(($value=="")&& ($default_value=="Y")){

$value=0;

}

//				echo$value

return "<input type='".$type."' value='".htmlspecialchars($value, ENT_QUOTES)."'";

}

if($type=="password"){

return "<input type='".$type."' value='".$value."'";

}

if(($type=="textarea")&&($rich_text_enable!='Y')){

return "<div class='editor_div'><textarea cols='".$cols."' rows='".$rows."' ";

} 





if($type=="select") {

return "<select";

} 

if($type=="iframe"){

if($iframe_id=="Y"){ $url_id = "?id=".$_REQUEST['id']."";} else{$url_id="";}

//echo $iframe_id;

return "<iframe src='".$src.$url_id."' height='".$heights."' width='".$widths."' frameborder='".$frameborder."'";

}

}

function get_inputEnd($type, $value, $rich_text_enable){

if(($type=="textarea")&&($rich_text_enable!='Y')){

return $value."</textarea></div>";

}



if($type=="select"){

return "</select>";

}

if($type=="iframe"){

return "</iframe>";

}

}

function Populate_list($nodename_options_of_select, $selected_value, $import_from_table_name, $field1, $field2, $field3, $parent_field,$display_from_post){

global $wpdb;

//echo $display_from_post;

if($parent_field=="Y"){

//$cat_PlaceHolder = ".........";

}

//$Sub_cat_PlaceHolder = "..................";

//$Sub_Sub_cat_PlaceHolder = "......................................";

$valu = explode(",", $selected_value);

//print_r($valu);

$counter_Database_query = 0;

//Populate the list box(drop down) from other table

if($import_from_table_name!=""){

$Total_List_Box_Value = $nodename_options_of_select->getElementsByTagName("options")->length;

for($i=0; $i<=$Total_List_Box_Value-1; $i++){

$nodename = $nodename_options_of_select->getElementsByTagName("options");

$Option_Text = $nodename->item($i)->nodeValue;

$Option_Value = $nodename->item($i)->getAttribute('value');

$selected = $nodename->item($i)->getAttribute('selected');

$type = $nodename->item($i)->getAttribute('type');

if(in_array('Root',$valu,'true') || in_array('None',$valu,'true')) {

$add_to_form .= "<option value='".$Option_Value."' selected='selected'>".$Option_Text."</option>";

}elseif(in_array('',$valu,'false')){

$add_to_form .= "<option value='".$Option_Value."' selected='selected'>".$Option_Text."</option>";

}else{

$add_to_form .= "<option value='".$Option_Value."' >".$Option_Text."</option>"; 

}

}

//$oEasyDBPoolcl = new EasyDBPoolcl(); 

if($parent_field=="Y"){

$SQL = "select ".$field1." as id, ".$field2." as title_info, ".$field3." as parent_id from ".$import_from_table_name." where status_deleted=0 order by title asc";

}

if($parent_field=="N"){

if(($_REQUEST['page']=='8') && ($_REQUEST['id']!='') && ($display_from_post=='Yes')){

$SQL = "select ".$field1." as id, ".$field2." as title_info from ".$import_from_table_name." where post_status='publish' and is_level_of_aura='Yes'";

}

elseif($_REQUEST['page']=='31'){

	$SQL = "select ".$field1." as id, ".$field2." as title_info from ".$import_from_table_name."";

}

else{

$SQL = "select ".$field1." as id, ".$field2." as title_info from ".$import_from_table_name." where status_deleted=0";

}

}





//echo $SQL;

//$result = $wpdb->get_row($SQL, ARRAY_A);

$row = $wpdb->get_results($SQL, ARRAY_A);

for($ct1=0; $ct1<count($row); $ct1++){

$id=$row[$ct1]['id'];

$parent_id=$row[$ct1]['parent_id'];

$title_info=$row[$ct1]['title_info'];

$bydefault1=$row[$ct1]['bydefault'];

$counter_Database_query .= 1; 

if(in_array($id,$valu,'true')){

$add_to_form .= "<option value='".$id."' selected='selected'>".$cat_PlaceHolder."".$title_info."</option>"; 

} 				

else{

if($bydefault1=="Yes")

{

$add_to_form .= "<option value='".$id."' selected='selected'>".$cat_PlaceHolder."".$title_info."</option>"; 

}

else

{

$add_to_form .= "<option value='".$id."'>".$cat_PlaceHolder."".$title_info."</option>"; 

}

}

}

}else{

$Total_List_Box_Value = $nodename_options_of_select->getElementsByTagName("options")->length;

for($i=0; $i<=$Total_List_Box_Value-1; $i++){

$nodename = $nodename_options_of_select->getElementsByTagName("options");

$Option_Text = $nodename->item($i)->nodeValue;

$Option_Value = $nodename->item($i)->getAttribute('value');

$selected = $nodename->item($i)->getAttribute('selected');

$type = $nodename->item($i)->getAttribute('type');

if(in_array($Option_Value,$valu)){

$add_to_form .= "<option value='".$Option_Value."' selected='selected'>".$Option_Text."</option>"; 

}elseif($selected=="true"){

$add_to_form .= "<option value='".$Option_Value."' selected='".$selected."'>".$Option_Text."</option>"; 

}else{

$add_to_form .= "<option value='".$Option_Value."'>".$Option_Text."</option>"; 

}

}

}

return $add_to_form;

}

function Populate_checkboxes($nodename_options_of_checkboxes, $selected_value, $import_from_table_name, $field1, $field2, $type, $name){

$val = explode(",", $selected_value);

//Populate the list checkboxes from other table

if($import_from_table_name!=""){	

global $wpdb;    

$myrows = $wpdb->get_results( "select ".$field1." as id, ".$field2." as title_info from ".$import_from_table_name." where status_deleted=0");

foreach ( $myrows as $Result ){

$id = $Result->id;
$title_info = $Result->title_info;
if(in_array($id,$val)){

$add_to_form .= "<p><input type='".$type."' value='".$id."' name='".$name."[]' checked='checked'/>&nbsp;".$title_info."<br /><br /></p>"; 

}else{

$add_to_form .= "<p><input type='".$type."' name='".$name."[]' value='".$id."'/>&nbsp;".$title_info."<br /><br /></p>"; 

}

}

//End of Populate the list checkboxes from other table	

}else{

$Total_List_CheckBox_Value = $nodename_options_of_checkboxes->getElementsByTagName("options")->length;

for($i=0; $i<=$Total_List_CheckBox_Value-1; $i++){

$nodename = $nodename_options_of_checkboxes->getElementsByTagName("options");

$Option_Text = $nodename->item($i)->nodeValue;

$Option_Value = $nodename->item($i)->getAttribute('value');

$selected = $nodename->item($i)->getAttribute('selected');

$value = $nodename->item($i)->getAttribute('value');

if(in_array($value,$val)){

$add_to_form .= "<input type='".$type."' name='".$name."[]' value='".$value."' checked='checked'/>&nbsp;".$Option_Text."&nbsp;"; 

}else{

$add_to_form .= "<input type='".$type."' name='".$name."[]' value='".$value."'/>&nbsp;".$Option_Text."&nbsp;"; 

}

}

}

return $add_to_form;

}

function Populate_radio($nodename_options_of_radio, $selected_value, $import_from_table_name, $field1, $field2, $type, $name,$checked){

//Populate the options(radio button) from other table

if($import_from_table_name!=""){	
    
global $wpdb;

$myrows = $wpdb->get_results( "select ".$field1." as id, ".$field2." as title_info from ".$import_from_table_name." where status_deleted=0");
foreach ( $myrows as $Result ){
$id = $Result->id;
$title_info = $Result->title_info;
if($id==$selected_value){
$add_to_form .= "<p><input type='".$type."' value='".$id."' name='".$name."' CHECKED/>&nbsp;".$title_info."<br/><br/></p>";  
}else{

$add_to_form .= "<p><input type='".$type."' name='".$name."' value='".$id."'/>&nbsp;".$title_info."<br/><br/></p>"; 

}

}

//End of Populate the options(radio button) from other table	

}else{

$Total_List_radio_Value = $nodename_options_of_radio->getElementsByTagName("options")->length;

for($i=0; $i<=$Total_List_radio_Value-1; $i++){

$nodename = $nodename_options_of_radio->getElementsByTagName("options");

$Option_Text = $nodename->item($i)->nodeValue;

$Option_Value = $nodename->item($i)->getAttribute('value');

$value = $nodename->item($i)->getAttribute('value');

$checked = $nodename->item($i)->getAttribute('checked');

if($Option_Value==$selected_value){

$add_to_form .= "<p class='fl'><input type='".$type."' name='".$name."' value='".$value."' CHECKED />&nbsp;".$Option_Text."&nbsp;</p>";  

}elseif($checked=="true"){

$add_to_form .= "<p class='fl'><input type='".$type."' name='".$name."' checked='".$checked."' value='".$value."'>&nbsp;".$Option_Text."&nbsp;</p>";  

}else{

$add_to_form .= "<p><input type='".$type."' name='".$name."'  value='".$value."'>&nbsp;".$Option_Text."&nbsp;</p>";  	

}

}

}

return $add_to_form;

}

function Populate_Image($type, $name, $class, $sizes, $styles){

$add_to_form .= "<input type='".$type."'  name='".$name."' class='".$class."' size='".$sizes."' style='".$styles."' />"; 

return $add_to_form;

}

echo $add_to_form;

echo '<br><br><br><input type="hidden" value="" name="save_and_close" id="save_and_close"><div class="add-pagebtn"><input name="" type="button" value="Save" class="button-submit" onClick="return Validate_This(2);"> <input name="" type="button" value="Save and Add New" class="button-submit" onClick="return Validate_This(0);"><input name="" type="button" value="Save and Close" class="button-submit" onClick="return Validate_This(1);"><input name="" value="Reset" type="reset" class="button-reset"></div>';

?>



<?php if($_REQUEST['page']=='15'){ ?>

<script language="Javascript">

		var cont_type = $('#content_type').val();

		abc1();

		

		$('#content_type').change(function() {

		abc1();

		});

		

		function abc1(){

		URL = "run1=Get_Content&ctype="+$('#content_type').val()+"&recordid=<?php echo $_REQUEST['id'];?>";

		//alert(URL);

		loadData(URL , "#content_type_div");

		}

		

		

	

	

	

		function loadData(param, destination_div){

			$(destination_div).html("Loading...");

			$.ajax({

			type: "POST",

			url: "<?php echo $Plugin_URL; ?>/cp/functions.php",

			data: param,

			success: function(msg){

			$(destination_div).html(msg);

			},

			error: function(){

			alert("Unable to Fetch Record");

			}

			});

			return false;

		}



		

</script>

<fieldset style="position:absolute; width:20%; right:0px; margin:right:10px; margin-top:180px;"><legend>Content</legend>

<div id="content_type_div"></div><?php } ?>

</fieldset>

<script language="Javascript">

			$(document).ready(

				function()

				{

					

					$.ColorPicker.init();

				}

			);



		</script>



<script language="javascript">

function alerts(subject){

$("#background").fadeIn();

$(".msgbox").fadeIn();

$(".msgbox h4 span").html("TWC Car - Message");

$(".msgbox .delrw p").html(subject);

$("#background").unbind().bind("click", function(){

Evaluate_Confirm();									

})

$(".msgbox .delrw .okcbtn .onc").bind("click", function(){

Evaluate_Confirm();									

})

function Evaluate_Confirm (){

$("#background").fadeOut();

$(".msgbox").fadeOut();

}

$(".msgbox h4 a").bind("click", function(){

Evaluate_Confirm();									

})

}

function Validate_This(myVars){

if(myVars==1){

document.getElementById("save_and_close").value="Close";	

}

if(myVars==2){

document.getElementById("save_and_close").value="Save_and_update";	

}



<?php echo $validation_text; ?>

<?php if(($_REQUEST["page"]=="8")&&($_REQUEST["id"]==""))

{  

$tree_arr = $wpdb->get_results("select max(position) as max_parent_id from tree where parent_id=1");

$tree_obj =$tree_arr[0];

$position =$tree_obj->max_parent_id+1; 



//$ajax_path ='http://prashant-pc/marcus/wordpress/';

//$ajax_path ='http://webconz.com/demo/marcus/';



?>

var file_name =document.getElementById("file_name").value;

 $.ajax({

		 type: 'POST',  

		 data: 'id=2&operation=create_node&position=<?php echo $postion;?>&title='+file_name+'&type=folder',

		 url: '<?php echo site_url();?>/wp-content/themes/thewebconz/server.php',

		 dataType: 'json',

		 success: function(msg){

			var node_id =msg.id;

			if(node_id!=''){

				 $.ajax({

					 type: 'POST',  

					 data: 'id='+node_id+'&operation=create_node&position=0&title=docs&type=folder',

					 url: '<?php echo site_url();?>/wp-content/themes/thewebconz/server.php',

					 success:function(msg){

						 document.form_twc.submit();

					 }

				})

			}

		 }

	})



<?php } else{ ?>

document.form_twc.submit();

<?php }?>

}

function formReset()

{

document.form_twc.reset();

}

</script>

<?php //echo do_shortcode('[color-picker id="color_1" type="textfield" color="FFFFFF"]'); ?>

</form>
<?php if($_REQUEST['page']==10){?>
 <fieldset style="position:relative; width:72%;">
   <h4>Manage Gallery</h4>
   <div style="margin-top:50px;">
	<div class="upload_div">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo site_url();?>/wp-content/plugins/ean_plugin/uploadify/upload.php">
    	<input type="hidden" name="image_form_submit" value="1"/>
		<input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['id'];?>"/>
            <label>Choose Image</label>
            <input type="file" name="uploadFile[]" id="images" multiple >
        <div class="uploading none">
            <label>&nbsp;</label>
            <img src="uploading.gif"/>
        </div>
    </form>
    </div>
	
    <div class="gallery" id="images_preview">
	 <?php 
	 if($_REQUEST['id']!=''){
	   $imResutls =$wpdb->get_results("select * from twc_hotel_gallery where hotel_id='".$_REQUEST['id']."'");
	  }
	  else{
		$imResutls='';
	  }
	  foreach( $imResutls as  $imResutl){?>
	  <div class="file-row" id="fileId_<?php echo $imResutl->id;?>">
		 <div class="file-row-left"><img src="<?php echo site_url();?>/wp-content/plugins/ean_plugin/images/Hotels/Gallery/<?php echo $imResutl->file_name;?>" style="width:200px; height:100px;"><span onclick="deleteFile('<?php echo $imResutl->id;?>');" style="color:#FF0000; padding-left:10px;">[Delete]</span></div>
	 </div>
	  <?php } ?>
	</div>
</div>
 </fieldset>
<?php } ?>
</div>


<?php if(($_REQUEST['page']==8) && ($_REQUEST['id']!='')){ ?>

<script language="javascript">

$("#lat").attr("readonly","readonly");

$("#longi").attr("readonly","readonly");

</script>

<?php }?>

<script>
 $( ".datepicker" ).datepicker({'dateFormat':'yy-mm-dd'});
</script>

<script language="javascript">

//http://www.htmldrive.net/items/show/511/Date-Time-Picker.html

function createPickers() {

    new Control.DatePicker('event_date', { 'icon': '<?php echo site_url();?>/wp-content/plugins/ean_plugin/Date-Time-Picker/images/calendar.png','dateFormat':'yyyy-MM-dd' });

  Event.observe(window, 'load', createPickers);

}


</script>