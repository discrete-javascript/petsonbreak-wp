<?php session_start();
global $mk_options;
global $wpdb;
$type =$_REQUEST['type'];
$action =$_REQUEST['action'];
require_once("resize_image.php");



if(($_REQUEST['postType']!='') && ($_REQUEST['postAction']!='')){
	$allowed =  array('gif','png','jpg','jpeg','JPEG');
	
	$file_name =$_FILES['image_path']['name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
	if(in_array($ext,$allowed)){
		if($file_name !=''){
			$target_dir = "wp-content/themes/adivaha/uploads/";
			$original_file_path = $target_dir.$file_name;
			$target_file_path = $target_dir.'vendor_thumbs/'.$file_name;
			$target_file_path_thumb = $target_dir.'vendor_thumbs/thumb/'.$file_name;
		
			$target_file = $target_dir.$file_name;
			move_uploaded_file($_FILES['image_path']['tmp_name'],$target_file);
			$db_image_path =",image_path='".$file_name."'";
			
			Save_File($original_file_path, $target_dir, 'Yes', 400, 500, 'height');
			
			Save_File($original_file_path, $target_file_path, 'Yes', 308, 308, 'height');
			
			Save_File($original_file_path, $target_file_path_thumb, 'Yes',180,280, 'height');
			
			
		}
	}


	
if($_REQUEST['postAction']=='add'){
  $service_offered = implode(',', $_REQUEST['service_offered']);
  $our_expertise =implode(',', $_REQUEST['our_expertise']);
  $we_offer =implode(',', $_REQUEST['we_offer']);
  $our_expertise_data =json_encode($_REQUEST['our_expertise_data']);
  $extra_data =json_encode($_REQUEST['extraData']);
  if($_REQUEST['certified']=='Yes'){
	$certified_data =$_REQUEST['certified_data'];
	$certified =array('Yes'=>$certified_data);
   }else{$certified='No';}
   
  
  $sql="insert into twc_vendor_services SET vendor_id='".$_SESSION['userID']."',service_category='".$_REQUEST['service']."',contact_person='".$_REQUEST['contact_person']."',email_ids='".$_REQUEST['email_ids']."',contact_number='".$_REQUEST['contact_number']."',description='".$_REQUEST['description']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',card_accepted='".$_REQUEST['card_accepted']."',on_call='".$_REQUEST['on_call']."',service_offered='".$service_offered."',price='".$_REQUEST['price']."' ".$db_image_path .",latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."',area_covered='".$_REQUEST['area_covered']."',awards='".$_REQUEST['awards']."',payment_terms='".$_REQUEST['payment_terms']."',our_expertise='".$our_expertise."',our_expertise_data='".$our_expertise_data."',we_offer='".$we_offer."',time_slot='".$_REQUEST['time_slot']."',delivery='".$_REQUEST['delivery']."',types='".$_REQUEST['types']."',age='".$_REQUEST['age']."',gender='".$_REQUEST['gender']."',shelves_items='".$_REQUEST['shelves_items']."',no_kennels='".$_REQUEST['no_kennels']."',facility_type='".$_REQUEST['facility_type']."',pet_monitoring='".$_REQUEST['pet_monitoring']."',certified='".json_encode($certified)."',sales_support='".$_REQUEST['sales_support']."',taxi_type='".$_REQUEST['taxi_type']."',pet_dedicated='".$_REQUEST['pet_dedicated']."',rate_fair='".$_REQUEST['rate_fair']."',courses_offered='".json_encode($_REQUEST['courses_offered'])."',membership='".$_REQUEST['membership']."',helpline_no='".$_REQUEST['helpline_no']."',extra_data='".$extra_data."',event_name='".$_REQUEST['event_name']."',from_date='".$_REQUEST['from_date']."',to_date='".$_REQUEST['to_date']."',date='".date('Y-m-d')."'"; 
  
  //$sql="insert into twc_vendor_services SET vendor_id='".$_SESSION['userID']."',service_category='".$_REQUEST['service']."',contact_person='".$_REQUEST['contact_person']."',email_ids='".$_REQUEST['email_ids']."',contact_number='".$_REQUEST['contact_number']."',description='".$_REQUEST['description']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',card_accepted='".$_REQUEST['card_accepted']."',on_call='".$_REQUEST['on_call']."',service_offered='".$service_offered."',price='".$_REQUEST['price']."' ".$db_image_path .",zipcode='".$_REQUEST['zipcode']."',latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."',area_covered='".$_REQUEST['area_covered']."',awards='".$_REQUEST['awards']."',payment_terms='".$_REQUEST['payment_terms']."',our_expertise='".$our_expertise."',our_expertise_data='".$our_expertise_data."',we_offer='".$we_offer."',time_slot='".$_REQUEST['time_slot']."',delivery='".$_REQUEST['delivery']."',types='".$_REQUEST['types']."',age='".$_REQUEST['age']."',gender='".$_REQUEST['gender']."',shelves_items='".$_REQUEST['shelves_items']."',no_kennels='".$_REQUEST['no_kennels']."',certified='".$_REQUEST['certified']."',facility_type='".$_REQUEST['facility_type']."',support='".$_REQUEST['support']."',fair='".$_REQUEST['fair']."',electronic_payment='".$_REQUEST['electronic_payment']."',dedicate_pets='".$_REQUEST['dedicate_pets']."',dedicate_pets_area='".$_REQUEST['dedicate_pets_area']."',helpline_no='".$_REQUEST['helpline_no']."',check_in_out='".$_REQUEST['check_in_out']."',location_name='".$_REQUEST['location_name']."',places_visit='".$_REQUEST['places_visit']."',room_type='".$_REQUEST['room_type']."',amenities='".$_REQUEST['amenities']."',extra_offered='".$_REQUEST['extra_offered']."',organized_past='".$_REQUEST['organized_past']."',related_pet='".$_REQUEST['related_pet']."',date='".date('Y-m-d')."'"; 
  
  $wpdb->query($sql);
  $insert_id =$wpdb->insert_id; 

}
if($_REQUEST['postAction']=='edit'){
  $service_offered = implode(',', $_REQUEST['service_offered']);
  $our_expertise =implode(',', $_REQUEST['our_expertise']);
  $we_offer =implode(',', $_REQUEST['we_offer']);
  $our_expertise_data =json_encode($_REQUEST['our_expertise_data']);
  $extra_data =json_encode($_REQUEST['extraData']);
  if($_REQUEST['certified']=='Yes'){
	$certified_data =$_REQUEST['certified_data'];
	$certified =array('Yes'=>$certified_data);
   }else{$certified='No';}
  
  
   $sql="Update twc_vendor_services SET vendor_id='".$_SESSION['userID']."',service_category='".$_REQUEST['service']."',contact_person='".$_REQUEST['contact_person']."',email_ids='".$_REQUEST['email_ids']."',contact_number='".$_REQUEST['contact_number']."',description='".$_REQUEST['description']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',card_accepted='".$_REQUEST['card_accepted']."',on_call='".$_REQUEST['on_call']."',service_category='".$_REQUEST['service']."',service_offered='".$service_offered."',price='".$_REQUEST['price']."' ".$db_image_path .",latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."',area_covered='".$_REQUEST['area_covered']."',awards='".$_REQUEST['awards']."',payment_terms='".$_REQUEST['payment_terms']."',our_expertise='".$our_expertise."',our_expertise_data='".$our_expertise_data."',we_offer='".$we_offer."',time_slot='".$_REQUEST['time_slot']."',delivery='".$_REQUEST['delivery']."',types='".$_REQUEST['types']."',age='".$_REQUEST['age']."',gender='".$_REQUEST['gender']."',shelves_items='".$_REQUEST['shelves_items']."',no_kennels='".$_REQUEST['no_kennels']."',facility_type='".$_REQUEST['facility_type']."',pet_monitoring='".$_REQUEST['pet_monitoring']."',certified='".json_encode($certified)."',sales_support='".$_REQUEST['sales_support']."',taxi_type='".$_REQUEST['taxi_type']."',pet_dedicated='".$_REQUEST['pet_dedicated']."',rate_fair='".$_REQUEST['rate_fair']."',courses_offered='".json_encode($_REQUEST['courses_offered'])."',membership='".$_REQUEST['membership']."',helpline_no='".$_REQUEST['helpline_no']."',extra_data='".$extra_data."',event_name='".$_REQUEST['event_name']."',from_date='".$_REQUEST['from_date']."',to_date='".$_REQUEST['to_date']."',date='".date('Y-m-d')."' where id='".$_REQUEST['id']."' and vendor_id='".$_SESSION['userID']."'"; 
 
 
 //$sql="Update twc_vendor_services SET vendor_id='".$_SESSION['userID']."',service_category='".$_REQUEST['service']."',contact_person='".$_REQUEST['contact_person']."',email_ids='".$_REQUEST['email_ids']."',contact_number='".$_REQUEST['contact_number']."',description='".$_REQUEST['description']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',card_accepted='".$_REQUEST['card_accepted']."',on_call='".$_REQUEST['on_call']."',service_category='".$_REQUEST['service']."',service_offered='".$service_offered."',price='".$_REQUEST['price']."' ".$db_image_path .",zipcode='".$_REQUEST['zipcode']."',latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."',area_covered='".$_REQUEST['area_covered']."',awards='".$_REQUEST['awards']."',payment_terms='".$_REQUEST['payment_terms']."',our_expertise='".$our_expertise."',our_expertise_data='".$our_expertise_data."',we_offer='".$we_offer."',time_slot='".$_REQUEST['time_slot']."',delivery='".$_REQUEST['delivery']."',types='".$_REQUEST['types']."',age='".$_REQUEST['age']."',gender='".$_REQUEST['gender']."',shelves_items='".$_REQUEST['shelves_items']."',no_kennels='".$_REQUEST['no_kennels']."',certified='".$_REQUEST['certified']."',facility_type='".$_REQUEST['facility_type']."',support='".$_REQUEST['support']."',fair='".$_REQUEST['fair']."',electronic_payment='".$_REQUEST['electronic_payment']."',dedicate_pets='".$_REQUEST['dedicate_pets']."',dedicate_pets_area='".$_REQUEST['dedicate_pets_area']."',helpline_no='".$_REQUEST['helpline_no']."',check_in_out='".$_REQUEST['check_in_out']."',location_name='".$_REQUEST['location_name']."',places_visit='".$_REQUEST['places_visit']."',room_type='".$_REQUEST['room_type']."',amenities='".$_REQUEST['	amenities']."',extra_offered='".$_REQUEST['extra_offered']."',organized_past='".$_REQUEST['organized_past']."',related_pet='".$_REQUEST['related_pet']."',date='".date('Y-m-d',strtotime($_REQUEST['date']))."' where id='".$_REQUEST['id']."' and vendor_id='".$_SESSION['userID']."'"; 
  
   $wpdb->query($sql);
   $insert_id  =$_REQUEST['id'];
 }
	//echo $sql; die;
	
	
	$wpdb->query("update twc_vendor_gallery SET vendor_service_id='".$insert_id."' where session_id='".session_id()."' AND vendor_service_id=''");
	
	
	echo '<script>window.location.href="'.site_url().'/booking/?type=services"</script>';
   
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

if($action =='delete'){ 
	echo $sql="Delete from twc_vendor_services where id='".$_REQUEST['id']."' and vendor_id='".$_SESSION['userID']."'";	
	$wpdb->query($sql);
	   echo '<script>window.location.href="'.site_url().'/booking/?type=services"</script>';
   
	}

if(($action=='add') || ($action=='edit')){
	    if($action=='edit'){$pTitle ='Add New';}
		else{$pTitle='Add New';}
		$userData =get_userdata($_SESSION['userID']);
		$userMetaData =get_user_meta($_SESSION['userID']);
		//print_r($userMetaData);
		$establishment_since =$userMetaData['establishment_since'][0];
		$owner_name =$userMetaData['nickname'][0];
		
		//print_r($userMetaData);
		$establishment =$userMetaData['establishment'][0];
		$service_category =$_REQUEST['sid'];
		if($_REQUEST['id']==''){ //default data
			$contact_number =$userMetaData['phone'][0];
			$address =$userMetaData['address'][0];
			$city =$userMetaData['city'][0];
			$country =$userMetaData['country'][0];
			$email =$userMetaData['email'][0];
		}
		else{
		  $results =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."' and id='".$_REQUEST['id']."'");
		  $results=$results[0];
		  $contact_number =$results->contact_number;
		  $address =$results->address;
		  $city =$results->city;
		  $country =$results->country;
		  $email =$results->email_ids;
		  // print_r($results);
		}
		// check primery service category added or not 
		$cfResults =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."' and service_category='".$service_category."'");

	  ?>
  <h5 class="recent_bookings">Your Services <span><a href="<?php echo site_url();?>/booking/?type=services">(List)</span></a>
  </h5>
   <div id="mng-services">
	 <form id="postform" action="" method="POST" enctype="multipart/form-data">
	     <input type="hidden" name="postType" id="postType"  value="<?php echo $type;?>" />
	     <input type="hidden" name="postAction" id="postAction"  value="<?php echo $action;?>" />
		 <!--
		 <input type="text" name="title" value="<?php echo $establishment;?>" >
		 <input type="text" name="owner_name" value="<?php echo $owner_name;?>" >
		 <input type="text" name="establishment_since" value="<?php echo $establishment_since;?>" >
		 -->
	     <div class="row add-serv-row my-book-mngSrv ">
		 <div class="col-md-12 col-sm-12">
		   
		  <ul class="modalFields">
		   <li>
		     <label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category</span></label>
		  <?php if(count($cfResults)==0){?>
			     <input name="service_category" id="service_category"  placeholder="Service Category" value="<?php echo getFieldByID('title','twc_service_category',$service_category); ?>"  readonly="readonly">	
		        <input type="hidden"  name="service" value="<?php echo $service_category;?>">
			 <?php }else{?>
				  <select id="service" name="service" onchange="changeServiceCategory(this.value);">
				     <?php 
					 $s_results = $wpdb->get_results("select * from twc_service_category");
					 foreach($s_results as $s_result) {
							 if($s_result->id==$_REQUEST['sid']){
								$cselected ='selected="selected"';
							 }else{ $cselected='';}
							echo '<option value="'.$s_result->id.'" '.$cselected.'>'.$s_result->title.'</option>';
					     }
						?>
				  </select>
			 <?php }?>
			 </li>
		   <?php
		     /*==== Manage all field by servoce category ===*/
			 
		   if($_REQUEST['sid']=='Z148827964058b558584727d'){  
			   include('vender_pages/veterinary_doctors.php');
			}
            if($_REQUEST['sid']=='R148827968558b558852254b'){  
			   include('vender_pages/dog_trainer.php');
			}
            if($_REQUEST['sid']=='F148827969858b5589286419'){  
			   include('vender_pages/pet_grooming.php');
			}		
            if($_REQUEST['sid']=='N148827970758b5589b49d0f'){
				include('vender_pages/pet_shops.php');
			}
            if($_REQUEST['sid']=='I149033952458d4c6c468642'){
				include('vender_pages/pet_sitters.php');
			}
            if($_REQUEST['sid']=='R148827972258b558aa64ba6'){
				include('vender_pages/pet_ambulance_services.php');
			}
            if($_REQUEST['sid']=='W149034007058d4c8e6418aa'){
				include('vender_pages/pet_boarding_services.php');
			} 
            if($_REQUEST['sid']=='E149034018458d4c95826ab6'){
				include('vender_pages/pet_behaviorists.php');
			}
            if($_REQUEST['sid']=='D149034028458d4c9bc6bba3'){
				include('vender_pages/exclusive_shop_for_birds.php');
			} 
            if($_REQUEST['sid']=='G148948225958c7b21322ce8'){
				include('vender_pages/pet_taxi_services.php');
			} 			
			if($_REQUEST['sid']=='B148827971458b558a2b6d33'){
				include('vender_pages/fish_and_aquatic_pet_suppliers.php');
			} 
            if($_REQUEST['sid']=='T149034072158d4cb71e8cea'){
				include('vender_pages/equine_stores_accessory_supplier.php');
			}
            if($_REQUEST['sid']=='D148827973958b558bb6734c'){
				include('vender_pages/veterinary_medicine_retailers.php');
			}			
			if($_REQUEST['sid']=='H149034086158d4cbfdec4ae'){
				include('vender_pages/dog_training_centers.php');
			}
			if($_REQUEST['sid']=='T148827984558b55925250ff'){
				include('vender_pages/exotic_pet_shops.php');
			}
			
			if($_REQUEST['sid']=='I149034107958d4ccd79c3f2'){
				include('vender_pages/pet_relocation_service_providers.php');
			}
			if($_REQUEST['sid']=='P149034114058d4cd14888c3'){
				include('vender_pages/dog_security_providers.php');
			}
			if($_REQUEST['sid']=='C149034123558d4cd7315003'){
				include('vender_pages/accessory_manufacturers_suppliers.php');
			}
			if($_REQUEST['sid']=='N148948330558c7b6295b388'){
				include('vender_pages/pet_weekend_destination.php');
			}
			if($_REQUEST['sid']=='V148948235058c7b26e54885'){
				include('vender_pages/pet_friendly_restaurants.php');
			}
			if($_REQUEST['sid']=='O149034143458d4ce3a2d6c7'){
				include('vender_pages/events.php');
			}
			//23
			if($_REQUEST['sid']=='A149034151458d4ce8a56168'){
				include('vender_pages/tiffin_services_for_dogs.php');
			}
			//24
			if($_REQUEST['sid']=='N149034161958d4cef3b4be4'){
				include('vender_pages/dog_park_areas.php');
			}
			if($_REQUEST['sid']=='C149284592258fb056258c2e'){
				include('vender_pages/hotels_events.php');
			}
			
			?> 		   
			
			<li>
			    <div class="upload_div">
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service image</span></label>
				 <input type="file" name="image_path" id="image_path">
				</div>
				<?php if($_REQUEST['id']!='') {?>
				<div class="upld_img_div">
				  <img src="<?php echo get_template_directory_uri(); ?>/uploads/<?php echo $results->image_path; ?>">
				</div>
				<?php } ?>
			</li>

			
		  </ul>	
		  </div>	
		  
		  </div>
		   <div class="register-btn">
				<input type="button" id="SaveButton" value="Save Changes" class="btn_1 green medium">
			</div>
		 </form> 
		 
<div style="margin-top:50px;">
	<div class="upload_div">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo get_template_directory_uri(); ?>/uploadify/upload.php">
    	<input type="hidden" name="image_vender_form_submit" value="1"/>
            <label>Gallery Images</label>
            <input type="file" name="images[]" id="images" multiple >
        <div class="uploading none">
            <img src="<?php echo get_template_directory_uri(); ?>/uploadify/uploading.gif"/>
        </div>
    </form>
    </div>
    <div class="gallery" id="images_preview">
	  
	  
	   <?php
       if($_REQUEST['id']!=''){
	   $gResults =$wpdb->get_results("select * from twc_vendor_gallery where vendor_service_id='".$_REQUEST['id']."'");
	          foreach($gResults as $obj){?>
			  <ul class="reorder_ul reorder-photos-list"><li id="image_li_<?php echo $obj->id;?>" class="ui-sortable-handle">
				<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="<?php echo get_template_directory_uri(); ?>/images/vendor_pets/vendor_thumbs/<?php echo $obj->image;?>" alt=""><span class="deleteVendorImage" rel="<?php echo $obj->id;?>" >[Delete]</span></a>
			</li></ul>
	   <?php }} ?>
		
	
	</div>
</div>


<ul>
<?php foreach($sresults_imgs as $img_src){ ?>
<li>
<img src="<?php echo get_template_directory_uri(); ?>/images/vendor_pets/vendor_thumbs/<?php echo $img_src->image; ?>">

</li>
<?php } ?>
</ul>
		 
		 
		 
		 </div>
 <?php }

 else { 
 $userMetaData =get_user_meta($_SESSION['userID']);
 $service_category =$userMetaData['service_category'][0];
 ?>
  <h5 class="recent_bookings">Your Services <span><a href="<?php echo site_url();?>/booking/?type=services&action=add&sid=<?php echo $service_category;?>">Add New</a></span></h5>
<p class="this_section_pro">This section will help you manage information regarding services, Products, Offers and Discounts
</p>
<div class="table_background  booking-table-container" style="width:100%;">
<table class="booking_table" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr class="book-table-headings">
<td>&nbsp;</td>
<td>Service Category</td>
<td>Service Offered </td>
<td>Contact Person</td>
<td>Address</td>
<td>Email</td>
<td>Contact number</td>
<td>Timings (AM-PM)</td>
<td>Card Accepted</td>
<td>Available on call</td>
<td>&nbsp;</td>
</tr>

<?php 
$resultss =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."' order by id DESC");
if(count($resultss)>0)
{
 foreach($resultss as $results){ 
 $full_address=$results->address.', '.$results->city.', '.$results->country.', '.$results->zipcode;

 $timefromto=$results->time_from.' TO '.$results->time_to;
?>
	<tr>
	<td><img src="<?php echo get_template_directory_uri(); ?>/uploads/<?php echo $results->image_path; ?>" style="width:50px;height:50px;"></td>
	<td><?php echo getFieldByID('title','twc_service_category',$results->service_category); ?></td>
	<td><?php
	$service_offered =explode(",",$results->service_offered);

	$offered_count=count($service_offered);
	for($i=0;$i < $offered_count; $i++){
	    $offerdName = getFieldByID('title','twc_manage_offered',$service_offered[$i]);
		 $offerd.=$offerdName.',';
		}
		echo $offerd =substr($offerd,0,-1);
     
	?></td>
	<td><?php echo $results->contact_person; ?></td>
	<td><?php echo $results->address.', '.$results->city; ?></td>
	<td><?php echo $results->email_ids; ?></td>
	<td><?php echo $results->contact_number; ?></td>
	<td><?php echo $timefromto; ?></td>
	<td><?php echo $results->card_accepted; ?></td>
	<td><?php echo $results->on_call; ?></td>
	
	
	<td><a href="<?php echo site_url(); ?>/booking/?type=services&action=edit&id=<?php echo $results->id; ?>&sid=<?php echo $results->service_category; ?>">Edit</a> | <a href="<?php echo site_url(); ?>/booking/?type=services&action=delete&id=<?php echo $results->id; ?>">Delete</a></td>

  </tr>
<?php }
 }else{
	echo '<tr><td colspan="11">No Results Found</td></tr>'; 
 } ?>
</tbody></table>
</div>
 <?php }?>
 

<script>
 $('#SaveButton').click(function(){ 
	 $('#postform').submit();
});	
</script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
       google.maps.event.addDomListener(window, "load", function () {
		   /*                                                                                                                 
		   var places = new google.maps.places.Autocomplete((document.getElementById('search-TB')),{
	   types: ['geocode'],
			 componentRestrictions: {country: 'DE'}//UK only   
			 });*/
		   var places = new google.maps.places.Autocomplete((document.getElementById("city")));
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


<style>
 .srv-off-chk{
 	width: 100%;
 	float: left;
    margin-bottom: 10px;
 }

 .srv-off-chk input{
    width: auto !important;
    float: left !important;
    height: auto !important;
    margin-bottom: 0px !important;
    margin-right: 10px !important;
 }

 .srv-off-chk .srv-off-title{
 	font-size: 14px;
 }

 #myBook .uploading.none {
   display: none;
 }

.services-offered-div{
    max-height: 108px;
    overflow: auto;
    float: left;
    margin-bottom: 20px;
}




.services-offered-div::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.services-offered-div::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

.services-offered-div::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #ccc;
}

#myBook .upload_div{
  width: 100%;
}

</style>
<script>
function changeServiceCategory(val){
	<?php if($_REQUEST['id']!=''){?>
	  window.location.href="<?php echo site_url();?>/booking/?type=services&action=edit&id=<?php echo $_REQUEST['id'];?>&sid="+val;
	<?php } else{?>
	window.location.href="<?php echo site_url();?>/booking/?type=services&action=add&sid="+val;
	<?php }?>
	
}
</script>
