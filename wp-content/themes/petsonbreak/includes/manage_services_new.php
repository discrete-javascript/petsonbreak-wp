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
			$target_dir = "wp-content/themes/petsonbreak/uploads/";
			$original_file_path = $target_dir.$file_name;
			$target_file_path = $target_dir.'vendor_thumbs/'.$file_name;
		
			$target_file = $target_dir.$file_name;
			move_uploaded_file($_FILES['image_path']['tmp_name'],$target_file);
			$db_image_path =",image_path='".$file_name."'";
			Save_File($original_file_path, $target_file_path, 'Yes', 200, 200, 'height');
		}
	}

	if($_REQUEST['postAction']=='add'){
	$offered = implode(',', $_REQUEST['offered']);
	
	$expertise = implode(',', $_REQUEST['expertise']);
	$offer = implode(',', $_REQUEST['offer']);
	
	
	
	$sql="insert into twc_vendor_services SET vendor_id='".$_SESSION['userID']."',title='".$_REQUEST['title']."',description='".$_REQUEST['description']."',contact='".$_REQUEST['contact']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',payments='".$_REQUEST['payments']."',on_call='".$_REQUEST['call']."',service_category='".$_REQUEST['service']."',service_offered='".$offered."',price='".$_REQUEST['price']."' ".$db_image_path .",zipcode='".$_REQUEST['zipcode']."',latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."',owner_name='".$_REQUEST['owner_name']."',owner_shop_name='".$_REQUEST['shop_name']."',establishments_yr='".$_REQUEST['estabishment']."',contact_person='".$_REQUEST['contact_person']."',email_ids='".$_REQUEST['email_ids']."',area_covered='".$_REQUEST['area_covered']."',yr_experience='".$_REQUEST['yr_experience']."',awards='".$_REQUEST['awards']."',payment_terms='".$_REQUEST['payment_terms']."',expertise='".$expertise."',offer='".$offer."',time_slot='".$_REQUEST['time_slot']."',remarks='".$_REQUEST['remarks']."',delivery='".$_REQUEST['delivery']."',type='".$_REQUEST['types']."',age='".$_REQUEST['age']."',gender='".$_REQUEST['gender']."',no_kennels='".$_REQUEST['no_kennels']."',certified='".$_REQUEST['certified']."',facility_type='".$_REQUEST['facility_type']."',support='".$_REQUEST['support']."',fair='".$_REQUEST['fair']."',electronic_payment='".$_REQUEST['electronic_payment']."',dedicate_pets='".$_REQUEST['dedicate_pets']."',dedicate_pets='".$_REQUEST['dedicate_pets_area']."',helpline_no='".$_REQUEST['helpline_no']."',check_in_out='".$_REQUEST['check_in_out']."',location_name='".$_REQUEST['location_name']."',places_visit='".$_REQUEST['places_visit']."',room_type='".$_REQUEST['room_type']."',amenities='".$_REQUEST['	amenities']."',extra_offered='".$_REQUEST['extra_offered']."',organized_past='".$_REQUEST['organized_past']."',related_pet='".$_REQUEST['related_pet']."',date='".date('Y-m-d',strtotime($_REQUEST['date']));."'";   
	
	 
	 $wpdb->query($sql);
	 $vsid = $wpdb->insert_id;

	 $sqll="update twc_vendor_gallery SET vendor_service_id='".$vsid."' where user_id='".$_SESSION['userID']."' and session_id='".session_id()."'"; 
	$wpdb->query($sqll); 
	
	
	}if($_REQUEST['postAction']=='edit'){
     $offered = implode(',', $_REQUEST['offered']);

	$sql="update twc_vendor_services SET title='".$_REQUEST['title']."',description='".$_REQUEST['description']."',contact='".$_REQUEST['contact']."',address='".$_REQUEST['address']."',city='".$_REQUEST['city']."',country='".$_REQUEST['country']."',time_from='".$_REQUEST['time']."',time_to='".$_REQUEST['time_to']."',payments='".$_REQUEST['payments']."',on_call='".$_REQUEST['call']."',service_category='".$_REQUEST['service']."',service_offered='".$offered."',price='".$_REQUEST['price']."' ".$db_image_path .",zipcode=".$_REQUEST['zipcode'].",latitude='".$_REQUEST['latitude']."',longitude='".$_REQUEST['longitude']."' where id='".$_REQUEST['id']."' and vendor_id='".$_SESSION['userID']."'";
	$wpdb->query($sql);
	}
	
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
		
		$resultss =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."' and id='".$_REQUEST['id']."'");
		$results=$resultss[0];
	
		
		
		
	  ?>
  <h5 class="recent_bookings">Your Services<span><a href="<?php echo site_url();?>/booking/?type=services&action=add">(<?php echo $pTitle;?>)</span></a>
  </h5>
   <div id="mng-services">
	 <form id="postform" action="" method="POST" enctype="multipart/form-data">
	     <input type="hidden" name="postType" id="postType"  value="<?php echo $type;?>" />
	     <input type="hidden" name="postAction" id="postAction"  value="<?php echo $action;?>" />
	     <div class="row add-serv-row ">
		 <div class="col-md-6 col-sm-6">
		   
		  <ul class="modalFields">
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Title:</span></label>
				<input name="title" placeholder="Title" id="title" value="<?php echo $results->title;?>" title="Email address is required." type="text" onkeyup="blankField('title','Title')">
				<span id="err_title"></span>
			</li>
          <!--  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category </span></label>
				<?php  $Results = $wpdb->get_results("select * from twc_service_category"); ?>
				<select id="service" name="service">
				 <option value="">Select Service Category</option>
				<?php foreach($Results as $Result) {
		
				 if($results->service_category==$Result->id){
						$cselected ='selected="selected"';
					}
					else{
						$cselected='';
					}
					
					?>
					<option value="<?php echo $Result->id; ?>" <?php echo $cselected; ?>><?php echo $Result->title; ?></option>
					
                  <?php  }?>		
                </select>
			</li>-->
			
	 <li>
		<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category</span></label>
		<input name="service_category" id="service_category"  placeholder="Service Category" value="<?php echo getFieldByID('title','twc_service_category',$all_meta_for_user['service_category'][0]); ?>"  readonly="readonly">	
		 <input type="hidden"  name="service" value="<?php echo $all_meta_for_user['service_category'][0];?>">						

	</li>
	


		
	
		<li class="services-offered">
		   				<label class="nrd-loginModal-label u-vr2x " for="username"><span>Service Offered</span
				></label>
				  <div class="services-offered-div">
				<?php 
					$service_offered =explode(",",$results->service_offered);
			
		             $Ress_offered = $wpdb->get_results("select * from twc_manage_offered where service_cagegory='".$all_meta_for_user['service_category'][0]."' and  published='Yes' and status_deleted=0"); 
		 
			   foreach($Ress_offered as $Res_offered) {
				if(in_array($Res_offered->id,$service_offered )){
					$cselected ='checked="checked"';
				}
				else{	$cselected='';}
				?>
					<div class="srv-off-chk">
					<input type='checkbox' name='offered[]' id="offered[]" value="<?php echo $Res_offered->id; ?>" <?php echo $cselected; ?>><span class="srv-off-title"><?php echo $Res_offered->title; ?></span>
					</div>
					<?php }  ?>		
             	</div>
			</li>
			
		

		<!--	<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Price</span></label>
				<input name="price" id="price"  placeholder="Price" value="<?php echo $results->price; ?>" title="Email address is required." type="text" onkeyup="blankField('price','Price')">
				<span id="err_price"></span>
			</li> -->
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Timings From </span></label>
				
	       <input type="time" name="time" id="time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_from; ?>">
				
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Timings To </span></label>
	       <input type="time" name="time_to" id="time_to" placeholder="Hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_to; ?>">
				
			</li>
		<!--	<li style="width: 100%;float: left;" class="Description-inputoo">
				<label class="nrd-loginModal-label u-vr2x " for="username"><span>Description</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
				<span id="err_description"></span>
			</li> -->

					<li>
				<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Payments (Card Accepted)</span></label>
				
                 <div class="payment-options">
				    <label class="radio-inline">
	
				      <span>Yes</span> <input type="radio" name="payments" id="payments1" value="Yes" <?php if ($results->	payments == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				    </label>
				    <label class="radio-inline">
				      <span>No</span> <input type="radio" name="payments" id="payments2" value="No" <?php if ($results->	payments == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>  >
				    </label>
				 </div>
			</li>
			<!--<li>
			  <label class="nrd-loginModal-label u-vr2x" for="username"><span>Available on call</span></label>


			   <div class="payment-options avlbl-call">
				    <label class="radio-inline">
				      <span>Yes</span> <input name="call" id="call_yes" type="radio" value="Yes" <?php if ($results->on_call == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='Yes';  echo $checked; }  ?> >
				    </label>
				    <label class="radio-inline">
				      <span>No</span> <input name="call" id="call_no" value="No" <?php if ($results->on_call == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='No';}  ?> type="radio">
				    </label>
				 </div>
			  
			</li>-->
			
			
			

		
			 <?php if($all_meta_for_user['service_category'][0]=='Z148827964058b558584727d'){  ?>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span> Name of Clinic/Hospital</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
				
				
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Veterinary Doctor</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>

            <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			</li>	

              <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $results->email_ids; ?>" type="email">
			</li>				
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->estabishments_yr; ?>" type="text">
			</li>
			
			
				
			

		<?php  }   
		?>
		
		
				
			 <?php if($all_meta_for_user['service_category'][0]=='R148827968558b558852254b'){  ?>
			
			

			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Trainers Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			

			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly " type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				<label class="radio-inline">
			  <span>weekly</span> 	<input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly " type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			</li>


		<?php  }   
		?>
		
		
				 <?php if($all_meta_for_user['service_category'][0]=='F148827969858b5589286419'){  ?>
			 
			 
			 <li class="services-offered">
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Our Expertise</span></label>
				
		  <?php
            $expertise =explode(",",$results->expertise);
		
	
		if($expertise[$i]=='Dog Grooming'){
				$cselected ='checked="checked"';
		
			}
			else{	$cselected='';}

		if($expertise[$i]=='Cat Grooming'){
			$cselected ='checked="checked"';
			}
		else{	$cselected='';}

		if($expertise[$i]=='Puppy Grooming'){
				$cselected ='checked="checked"';
			}
			else{	$cselected='';}
			?>
				 <input type="checkbox" name="expertise[]" value="Dog Grooming <?php echo $cselected; ?>">Dog Grooming<br>
                 <input type="checkbox" name="expertise[]" value="Cat Grooming <?php echo $cselected; ?>">Cat Grooming<br>
                 <input type="checkbox" name="expertise[]" value="Puppy Grooming <?php echo $cselected; ?>">Puppy Grooming
			</li>
			
			 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>We Offer</span></label>
			
				
				 <input type="checkbox" name="offer[]" value="Dog Grooming">Dog Grooming<br>
                 <input type="checkbox" name="offer[]" value="Cat Grooming">Cat Grooming<br>
                 <input type="checkbox" name="offer[]" value="Puppy Grooming">Puppy Grooming
				
				
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Spa/Parlor/ Shop Name </span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
				
				
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Time Slots Availability</span></label>
				<label class="radio-inline">
					<span>By Appointment Only</span>  <input type="radio" name="time_slot" id="time_slot_0" value="By Appointment Only" <?php if ($results->time_slot== 'By Appointment Only'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>We prefer Walk-in</span>  <input type="radio" name="time_slot" id="time_slot_1" value="We prefer Walk-in" <?php if ($results->time_slot == 'We prefer Walk-in'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Both</span> <input type="radio" name="time_slot" id="time_slot_2" value="Both" <?php if ($results->time_slot == 'Both'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
	
			</li>

			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 

		<?php  }   
		?>
		
		
						
			 <?php if($all_meta_for_user['service_category'][0]=='N148827970758b5589b49d0f'){  ?>
			 <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Our Expertise</span></label>
				 <input type="checkbox" name="expertise[]" value="Dog Supplies">Dog Supplies<br>
                 <input type="checkbox" name="expertise[]" value="Cat Supplies" checked>Cat Supplies<br>
                 <input type="checkbox" name="expertise[]" value="Puppy Supplies" checked>Puppy Supplies
				
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="shop_name" id="shop_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>	
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->estabishments_yr; ?>" type="text">
			</li>
			
			
				 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			<!--<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Off the shelves Items </span></label>
				<input name="offitems" id="offitems"  placeholder="Off the shelves Items" value="<?php echo $results->offitems; ?>" type="text">
			</li>-->
		<?php  }   
		?>
		
		
							
			 <?php if($all_meta_for_user['service_category'][0]=='I149033952458d4c6c468642'){  ?>
			 <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
		
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Age</span></label>
				<input name="age" id="age"  placeholder="Name" value="<?php echo $results->age; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender</span></label>
				<select id="gender" name="gender">
				<option value="">Select Your Gender</option>
				
			
				
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily " type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Hourly</span> <input name="payment_terms" id="payment_terms_3"  placeholder="Payment Terms" value="Hourly" type="radio" <?php if ($results->payment_terms == 'Hourly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
			
		<?php  }   
		?>
		
		
									
			 <?php if($all_meta_for_user['service_category'][0]=='R148827972258b558aa64ba6'){  ?>
				 <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Ambulance service</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
		
		
		   <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Name" value="<?php echo $results->email_ids; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
			<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
				<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily" type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Hourly</span> <input name="payment_terms" id="payment_terms_3"  placeholder="Payment Terms" value="Hourly" type="radio" <?php if ($results->payment_terms == 'Hourly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
			
			
		
			
		<?php  }   
		?>
		
    <?php if($all_meta_for_user['service_category'][0]=='W149034007058d4c8e6418aa'){  ?>
			<li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Number of Kennels/Dog Pans </span></label>
				<input name="no_kennels" id="no_kennels"  placeholder="Name" value="<?php echo $results->no_kennels; ?>" type="text">
			</li>
			
				<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Facility Type</span></label>
				
				
				<label class="radio-inline">
				  <span>Indore</span> <input name="facility_type" id="facility_type_0"  placeholder="Payment Terms" value="Indore" type="radio" <?php if ($results->facility_type == 'Indore'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Outdoor</span> <input name="facility_type" id="facility_type_1"  placeholder="Payment Terms" value="Outdoor" type="radio" <?php if ($results->facility_type == 'Outdoor'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>combination</span> <input name="facility_type" id="facility_type_2"  placeholder="Payment Terms" value="combination" type="radio" <?php if ($results->facility_type == 'combination'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Name" value="<?php echo $results->email_ids; ?>" type="text">
			</li>
		
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
				<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily" type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
			
			
		
			
		<?php  }   
		?>


				
		    <?php if($all_meta_for_user['service_category'][0]=='E149034018458d4c95826ab6'){  ?>
			 <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Age</span></label>
				<input name="age" id="age"  placeholder="Age" value="<?php echo $results->age; ?>" type="text">
			</li>
		
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender</span></label>
				<select id="gender" name="gender">
				<option value="">Select Your Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			 
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Certified</span></label>
				
				<label class="radio-inline">
				  <span>Yes</span> <input name="certified" id="certified_0"  placeholder="Payment Terms" value="Yes" type="radio" <?php if ($results->Certified == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				<label class="radio-inline">
				  <span>No</span> <input name="certified" id="certified_1"  placeholder="Payment Terms" value="No" type="radio" <?php if ($results->Certified == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			
			</li>
			
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily" type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
			
			
		
			
		<?php  }   
		?>
		
					
		    <?php if($all_meta_for_user['service_category'][0]=='D149034028458d4c9bc6bba3'){  ?>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
		
		    
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li>  
			
				 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>After sales support</span></label>
				
				
				 <label class="radio-inline">
				  <span>Talk to Expert</span> <input type="radio" name="support" id="support_0" value="Talk to Expert" type="radio" <?php if ($results->support == 'Talk to Expert'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Advice and guidance</span> <input type="radio" name="support" id="support_1" value="Advice and guidance" type="radio" <?php if ($results->support == 'Advice and guidance'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
		
			</li>
			
		<?php  }   
		?>
		
		    <?php if($all_meta_for_user['service_category'][0]=='G148948225958c7b21322ce8'){  ?>
			 
		<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Taxi Owners Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Taxi Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Taxi Drivers Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Taxi Drivers Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
	
		</li>
			 
				<li>
				
		<label class="nrd-loginModal-label u-vr2x" for="username"><span>Electronic Payments accepted </span></label>
			 <label class="radio-inline">
				  <span>Yes</span> <input name="electronic_payment" id="electronic_payment_0"  placeholder="Certified" value="Yes" type="radio" <?php if ($results->electronic_payment == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>	
			
			<label class="radio-inline">
				  <span>No</span> <input name="electronic_payment" id="electronic_payment_1"  placeholder="Certified" value="No " type="radio" <?php if ($results->electronic_payment == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>

			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Taxi Type</span></label>
				
				
				<label class="radio-inline">
				  <span>Car</span> <input name="facility_type" id="facility_type_0"  value="Car" type="radio" <?php if ($results->facility_type == 'Car'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Auto</span> <input name="facility_type" id="facility_type_1"  placeholder="Payment Terms" value="Auto" type="radio" <?php if ($results->facility_type == 'Auto'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>SUV</span> <input name="facility_type" id="facility_type_2"  placeholder="Payment Terms" value="SUV" type="radio" <?php if ($results->facility_type == 'SUV'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
		
		    </li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Rates/Fair (For cars/Auto/Suv)</span></label>
				<select id="fair" name="fair">
					<option value="">Seletc Rates/Fair</option>
					<option value="Per kms">Per kms</option>
					<option value="Per Day">Per Day</option>
					<option value="Beyond City Limits">Beyond City Limits</option>
					<option value="As set by Municipal Corporation">As set by Municipal Corporation</option>
				</select>
			
			 </li>
			
			
			<li>
			
			   <label class="radio-inline">
				  <span>YES</span> <input name="dedicate_pets" id="dedicate_pets_0"  placeholder="Payment Terms" value="Yes" type="radio" <?php if ($results->dedicate_pets == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			
			 <label class="radio-inline">
				  <span>You can Accompany</span> <input name="dedicate_pets" id="dedicate_pets_1"  placeholder="Payment Terms" value="You can Accompany" type="radio" <?php if ($results->dedicate_pets == 'You can Accompany'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
	
			
		<?php  }   
		?>
		
		
				    <?php if($all_meta_for_user['service_category'][0]=='B148827971458b558a2b6d33'){  ?>
	<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="shop_name" id="shop_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>	
				 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Years of Experience" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
		
		    
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li>  
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>After sales support</span></label>
				
				
				 <label class="radio-inline">
				  <span>Talk to Expert</span> <input type="radio" name="support" id="support_0" value="Talk to Expert" type="radio" <?php if ($results->support == 'Talk to Expert'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Advice and guidance</span> <input type="radio" name="support" id="support_1" value="Advice and guidance" type="radio" <?php if ($results->support == 'Advice and guidance'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
		
			</li> 
			
			<!--	<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Off the shelves Fish Supplies</span></label>
				<select id="fair" name="fair">
					<option value="">Seletc Fish Supplies</option>
					<option value="Food Supplements ">Food Supplements </option>
					<option value="Filters & Cleaning">Filters & Cleaning</option>
					<option value="Corals and Decoration">Corals and Decoration</option>
					<option value="CO2 System">CO2 System</option>
					<option value="Accessories">Accessories</option>
					<option value="Air Pumps">Air Pumps</option>
					<option value="Water Treatment & Conditioning">Water Treatment & Conditioning</option>
					<option value="Holiday Foods">Holiday Foods</option>
					<option value="Maintenance Products">Maintenance Products</option>
					<option value="Annual Maintenance Contracts (AMC) for Aquariums">Annual Maintenance Contracts (AMC) for Aquariums</option>
					<option value="Live Worms/feed">Live Worms/feed</option>
					<option value="Tank Setup - Marine/Fresh water">Tank Setup - Marine/Fresh water</option>
					<option value="Live Aquatic Plants - Marine/Fresh water">Live Aquatic Plants - Marine/Fresh water</option>
					<option value="Sale/Purchase of Aquatic animals and fishes">Sale/Purchase of Aquatic animals and fishes</option>
				</select>
			
			 </li>-->
			
		<?php  }   
		?>
		
			
				    <?php if($all_meta_for_user['service_category'][0]=='T149034072158d4cb71e8cea'){  ?>
	          <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
			
			
		    <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Years of Experience" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
		    
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li>  
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>After sales support</span></label>
				
				
				 <label class="radio-inline">
				  <span>Talk to Expert</span> <input type="radio" name="support" id="support_0" value="Talk to Expert" type="radio" <?php if ($results->support == 'Talk to Expert'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Advice and guidance</span> <input type="radio" name="support" id="support_1" value="Advice and guidance" type="radio" <?php if ($results->support == 'Advice and guidance'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
		
			</li> 
			
	
			
		<?php  }   
		?>
		
		
				    <?php if($all_meta_for_user['service_category'][0]=='D148827973958b558bb6734c'){  ?>
	          <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Years of Experience" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
		
		    
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li>  
			
		<?php  }   
		?>
		
		
			<?php if($all_meta_for_user['service_category'][0]=='H149034086158d4cbfdec4ae'){  ?>
            <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>	
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			</li>	
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li> 	 
			
			 <li>
				
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Are the course affiliated to any agency</span></label>
			 <label class="radio-inline">
				  <span>Yes</span> <input name="electronic_payment" id="electronic_payment_0"  placeholder="Certified" value="Yes" type="radio" <?php if ($results->electronic_payment == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>	
			
			<label class="radio-inline">
				  <span>No</span> <input name="electronic_payment" id="electronic_payment_1"  placeholder="Certified" value="No" type="radio" <?php if ($results->electronic_payment == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>

			</li>
			
	
			<li>
			<label class="nrd-loginModal-label u-vr2x" for="username"><span>Accommodation Provided </span></label>
			   <label class="radio-inline">
				  <span>Yes</span> <input name="dedicate_pets" id="dedicate_pets_0"  placeholder="Payment Terms" value="Yes" type="radio" <?php if ($results->dedicate_pets == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			
			 <label class="radio-inline">
				  <span>No</span> <input name="dedicate_pets" id="dedicate_pets_1"  placeholder="Payment Terms" value="No" type="radio" <?php if ($results->dedicate_pets == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
			
			
		    <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily " type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Hourly</span> <input name="payment_terms" id="payment_terms_3"  placeholder="Payment Terms" value="Hourly" type="radio" <?php if ($results->payment_terms == 'Hourly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
			
		<?php  }   
		?>
		
		
				
			<?php if($all_meta_for_user['service_category'][0]=='T148827984558b55925250ff'){  ?>
                  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store Owners Name</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Store/Shop Name </span></label>
				<input name="shop_name" id="shop_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
			</li>	
			
				 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
		
		    <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		<?php  }   
		?>
		
		
						
			<?php if($all_meta_for_user['service_category'][0]=='T149034097858d4cc7292337'){  ?>
             <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Number of Kennels/Dog Pans </span></label>
				<input name="no_kennels" id="no_kennels"  placeholder="Name" value="<?php echo $results->no_kennels; ?>" type="text">
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
		
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				
				<label class="radio-inline">
				  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0"  placeholder="Payment Terms" value="Monthly" type="radio" <?php if ($results->payment_terms == 'Monthly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>weekly</span> <input name="payment_terms" id="payment_terms_1"  placeholder="Payment Terms" value="weekly" type="radio" <?php if ($results->payment_terms == 'weekly'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  placeholder="Payment Terms" value="Daily" type="radio" <?php if ($results->payment_terms == 'Daily'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Facility Type</span></label>
				
				
				<label class="radio-inline">
				  <span>Indore</span> <input name="facility_type" id="facility_type_0"  placeholder="Payment Terms" value="Indore" type="radio" <?php if ($results->facility_type == 'Indore'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Outdoor</span> <input name="facility_type" id="facility_type_1"  placeholder="Payment Terms" value="Outdoor" type="radio" <?php if ($results->facility_type == 'Outdoor'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>combination</span> <input name="facility_type" id="facility_type_2"  placeholder="Payment Terms" value="combination" type="radio" <?php if ($results->facility_type == 'combination'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
			</li>
		
		
		  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		
		<?php  }   
		?>
		
		<?php if(($all_meta_for_user['service_category'][0]=='I149034107958d4ccd79c3f2') || ($all_meta_for_user['service_category'][0]=='P149034114058d4cd14888c3')){  ?>
        	 <li>
				 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
				 
				 <label class="radio-inline">
					<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->type== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			
				 <label class="radio-inline">
					<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->type== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->type== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
			
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
		
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered- Domestic/International/Regional</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
	
		  <li>
			<label class="nrd-loginModal-label u-vr2x" for="username"><span>Membership</span></label>
				<label class="radio-inline">
				  <span>IPATA</span> <input name="facility_type" id="facility_type_0"  placeholder="Payment Terms" value="IPATA" type="radio" <?php if ($results->facility_type == 'IPATA'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>IATA certified</span> <input name="facility_type" id="facility_type_1"  placeholder="Payment Terms" value="IATA certified" type="radio" <?php if ($results->facility_type == 'IATA certified'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
		
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
	
		 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
				
				<label class="radio-inline">
				  <span>In Advance</span> <input name="payment_terms" id="payment_terms_0"  value="In Advance" type="radio" <?php if ($results->payment_terms == 'In Advance'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				<label class="radio-inline">
			  <span>COD</span> 	<input name="payment_terms" id="payment_terms_1"  value="COD " type="radio" <?php if ($results->payment_terms == 'COD'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
			</li>

		
		  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		
		<?php  }   ?>
		
		
		
				<?php if($all_meta_for_user['service_category'][0]=='C149034123558d4cd7315003'){  ?>
 
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			
		   <li>
			<label class="nrd-loginModal-label u-vr2x" for="username"><span>We Are</span></label>
				<label class="radio-inline">
				  <span>Bulk Buyer</span> <input name="facility_type" id="facility_type_0"  placeholder="Payment Terms" value="Bulk Buyer" type="radio" <?php if ($results->facility_type == 'Bulk Buyer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Bulk Seller</span> <input name="facility_type" id="facility_type_1"  placeholder="Payment Terms" value="Bulk Seller" type="radio" <?php if ($results->facility_type == 'Bulk Seller'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Manufacturer</span> <input name="facility_type" id="facility_type_2"  placeholder="Payment Terms" value="Manufacturer" type="radio" <?php if ($results->facility_type == 'Manufacturer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
				
				 <label class="radio-inline">
				  <span>Importer</span> <input name="facility_type" id="facility_type_3"  placeholder="Payment Terms" value="Importer" type="radio" <?php if ($results->facility_type == 'Importer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
		
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
				<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $results->email_ids; ?>" type="email">
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
	
		  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		
		<?php  }   ?>
		
					
					
					
					<?php if($all_meta_for_user['service_category'][0]=='N148948330558c7b6295b388'){  ?>
            

             <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			 </li>	


	        <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Owners Name </span></label>
				<input name="owner_name" id="owner_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>24x7 helpline Number</span></label>
				<input name="helpline_no" id="helpline_no"  placeholder="24x7 helpline Number" value="<?php echo $results->helpline_no; ?>" type="text">
			</li>
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Check in and Checkout time</span></label>
				<input name="check_in_out" id="check_in_out"  placeholder="Check in and Checkout time" value="<?php echo $results->check_in_out; ?>" type="text">
			</li> 	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Location Name</span></label>
				<input name="location_name" id="location_name"  placeholder="Check in and Checkout time" value="<?php echo $results->location_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Distance from </span></label>
				<select id="fair" name="fair">
				<option value="major cities">major cities</option>
				<option value="Nearby Airport">Nearby Airport</option>
				<option value="Nearby Bus stand">Nearby Bus stand</option>
				<option value="Nearby Railway Station">Nearby Railway Station</option>
				</select>
			</li>  	
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Nearby Places to Visit</span></label>
				<textarea name="places_visit" id="places_visit"  placeholder="Nearby Places to Visit"><?php echo $results->places_visit; ?></textarea>
			</li>
			
				<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Room Types </span></label>
				<select id="room_type" name="room_type">
				<option value="Single">Single</option>
				<option value="Duplex">Duplex</option>
				<option value="Nearby Bus stand">Nearby Bus stand</option>
				<option value="Tents">Tents</option>
				</select>
			</li>  	
			
		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Amenities</span></label>
				<select id="amenities" name="amenities">
				<option value="AC">AC</option>
				<option value="Wifi">Wifi</option>
				<option value="Television">Television</option>
				<option value="Fridge/ Mini- Bar">Fridge/ Mini- Bar</option>
				<option value="Parking Swimming pool">Parking Swimming pool</option>
				<option value="Gym">Gym</option>
				</select>
			</li>

		
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Services offered at extra charge</span></label>
				<textarea name="extra_offered" id="extra_offered"  placeholder="Services offered at extra charge"><?php echo $results->extra_offered;?></textarea>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Pet related  services </span></label>
				<textarea id="related_pet" name="related_pet"><?php echo $results->related_pet; ?></textarea>
			</li>
		
		   <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Events organized in past
			</span></label>
				<textarea name="organized_past" id="organized_past"  placeholder="Events organized in past"><?php echo $results->organized_past; ?></textarea>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Pet friendly events possible 
			</span></label>
			 <label class="radio-inline">
				  <span>Yes</span> <input name="electronic_payment" id="electronic_payment_0"  placeholder="Certified" value="Yes" type="radio" <?php if ($results->electronic_payment == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>	
			
			<label class="radio-inline">
				  <span>No</span> <input name="electronic_payment" id="electronic_payment_1"  placeholder="Certified" value="No" type="radio" <?php if ($results->electronic_payment == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>
			</li>
		
	
		    <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		
		<?php  }   ?>
		
		
		<?php if($all_meta_for_user['service_category'][0]=='V148948235058c7b26e54885'){  ?>
            

             <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			 </li>	

   	         <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Restaurant</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
				
				
			</li>
	        <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Owners Name </span></label>
				<input name="owner_name" id="owner_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Establishments</span></label>
				<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->establishments_yr; ?>" type="text">
			</li>
		
				<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Distance from </span></label>
				<select id="fair" name="fair">
				<option value="major cities">major cities</option>
				<option value="Nearby Airport">Nearby Airport</option>
				<option value="Nearby Bus stand">Nearby Bus stand</option>
				<option value="Nearby Railway Station">Nearby Railway Station</option>
				</select>
			</li> 
		
			
				<li>
			<label class="nrd-loginModal-label u-vr2x" for="username"><span>Dedicated pets menu </span></label>
			   <label class="radio-inline">
				  <span>Yes</span> <input name="dedicate_pets" id="dedicate_pets_0"  placeholder="Payment Terms" value="Yes" type="radio" <?php if ($results->dedicate_pets == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			
			 <label class="radio-inline">
				  <span>No</span> <input name="dedicate_pets" id="dedicate_pets_1"  placeholder="Payment Terms" value="No" type="radio" <?php if ($results->dedicate_pets == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
		
		  <li>
			<label class="nrd-loginModal-label u-vr2x" for="username"><span>Dedicated pets playing area </span></label>
			   <label class="radio-inline">
				  <span>Yes</span> <input name="dedicate_pets_area" id="dedicate_pets_area_0"  placeholder="Payment Terms" value="Yes" type="radio" <?php if ($results->dedicate_pets == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			
			 <label class="radio-inline">
				  <span>No</span> <input name="dedicate_pets_area" id="dedicate_pets_area_1"  placeholder="Payment Terms" value="No" type="radio" <?php if ($results->dedicate_pets == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
				</label>
			</li>
	
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Pet day break possible   
			</span></label>
			 <label class="radio-inline">
				  <span>Yes</span> <input name="electronic_payment" id="electronic_payment_0"  placeholder="Certified" value="Yes" type="radio" <?php if ($results->electronic_payment == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>	
			
			<label class="radio-inline">
				  <span>No</span> <input name="electronic_payment" id="electronic_payment_1"  placeholder="Certified" value="No" type="radio" <?php if ($results->electronic_payment == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>>
			</label>
			</li>
		
		    <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li> 
			
		
		<?php  }   ?>
		
		
		
			<?php if($all_meta_for_user['service_category'][0]=='O149034143458d4ce3a2d6c7'){  ?>
            

             <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			 </li>	

   	         <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Restaurant</span></label>
				<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
				
				
			</li>
	        <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Event Organizers</span></label>
				<input name="owner_name" id="owner_name"  placeholder="Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
			</li>
			
			  <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Venue</span></label>
				<input name="location_name" id="location_name"  placeholder="Venue" value="<?php echo $results->location_name; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Date</span></label>
				<input name="date" id="date"  placeholder="Date" value="" type="date">
			</li>
			
				 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Entry</span></label>
			
			  <label class="radio-inline">
					<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				<label class="radio-inline">
					<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
				</label>
				
				
			</li>
	
		
		<?php  }   ?>
		
		
					<?php if($all_meta_for_user['service_category'][0]=='A149034151458d4ce8a56168'){  ?>
            

             <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact Person</span></label>
				<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
			 </li>	
			 
			 	<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
				<input name="area_covered" id="area_covered"  placeholder="Store Owners Name" value="<?php echo $results->area_covered; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Years of Experience</span></label>
				<input name="yr_experience" id="yr_experience"  placeholder="Years of Experience" value="<?php echo $results->yr_experience; ?>" type="text">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
				<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"><?php echo $results->remarks; ?></textarea>
			</li>
			
			

   	      
		
		<?php  }   ?>
		
		
				
		<?php if($all_meta_for_user['service_category'][0]=='N149034161958d4cef3b4be4'){  ?>

			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Remarks/additional Details</span></label>
				<textarea id="remarks" name="remarks"></textarea>
			</li>
	
		<?php  }   ?>
		
		
		
			
			<li>
			    <div class="upload_div">
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Upload Image </span></label>
				 <input type="file" name="image_path" id="image_path">
				</div>
				<?php if($action=='edit') {?>
				<div class="upld_img_div">
				  <img src="<?php echo get_template_directory_uri(); ?>/uploads/<?php echo $results->image_path; ?>">
				</div>
				<?php } ?>
		
				
			</li>

			
		  </ul>	
		  </div>	
		  <div class="col-md-6 col-sm-6">
		   
		   <ul class="modalFields">
		   <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Contact</span></label>
				<input name="contact" id="contact"  placeholder="Contact" value="<?php echo $results->contact; ?>" title="Email address is required." type="text" onkeyup="blankField('contact','Contact')" >
				<span id="err_contact"></span>
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
				<input name="address" id="address"  placeholder="Address" value="<?php echo $results->address; ?>" type="text" onkeyup="blankField('address')" >
				<span id="err_address"></span>
				
			</li>
			<li>
			
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
				<input name="city" id="city"  placeholder="City" value="<?php echo $results->city; ?>" title="Email address is required." type="text" onkeyup="blankField('city','City')">
				<span id="err_city"></span>
				<input type="hidden" name="latitude" id="latitude" value="<?php echo $results->latitude; ?>">
				<input type="hidden" name="longitude" id="longitude" value="<?php echo $results->longitude; ?>">
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>ZipCode</span></label>
				<input name="zipcode" id="zipcode"  placeholder="ZipCode" value="<?php echo $results->zipcode; ?>" title="Email address is required." type="text" onkeyup="blankField('city','City')">
				<span id="err_city"></span>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country</span></label>
				<input name="country" id="country"  placeholder="Country" value="<?php echo $results->country;  ?>" title="Email address is required." type="text" onkeyup="blankField('country','Country')">
				<span id="err_country"></span>
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
            <label>Choose Image</label>
            <input type="file" name="images[]" id="images" multiple >
            <input type="hidden" name="service_id" id="service_id" value="<?php echo $_REQUEST['id']; ?>">
            <input type="hidden" name="pet_type" id="pet_type" value="<?php echo $_REQUEST['id']; ?>">
        <div class="uploading none">
            <img src="<?php echo get_template_directory_uri(); ?>/uploadify/uploading.gif"/>
        </div>
    </form>
    </div>
    <div class="gallery" id="images_preview">
	  
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

 else { ?>
  <h5 class="recent_bookings">Your Services <span><a href="<?php echo site_url();?>/booking/?type=services&action=add">Add New</a></span></h5>
<p class="this_section_pro">
  This section provides information on your itinerary, trip details and booked tickets. ... used to make the booking and the system will show your recent bookings.	  
  </p>
<div class="table_background  booking-table-container" style="width:100%;">
<table class="booking_table" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr class="book-table-headings">
<td>&nbsp;</td>
<td>Title</td>
<td>Contact</td>			
<td>Address</td>
<td>Service Category</td>
<td>Service Offered </td>
<td>Timings (AM-PM)</td>
<td>Card Accepted</td>
<td>Available on call</td>
<td>Price</td>
<td>&nbsp;</td>
</tr>

<?php 
$resultss =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."'");
foreach($resultss as $results){ 
$full_address=$results->address.', '.$results->city.', '.$results->country.', '.$results->zipcode;

$timefromto=$results->time_from.' TO '.$results->time_to;
?>
	<tr>
	<td><img src="<?php echo get_template_directory_uri(); ?>/uploads/<?php echo $results->image_path; ?>" style="width:50px;height:50px;"></td>
	<td><?php echo $results->title; ?></td>
	<td><?php echo $results->contact; ?></td>
	<td><?php echo $full_address; ?></td>
	<td><?php echo getFieldByID('title','twc_service_category',$results->service_category); ?></td>
	<td><?php
	$service_offered=explode(',',$results->service_offered);
	$offered_count=count($service_offered);
	$offered='';
	for($i=0;$i < $offered_count; $i++){
	  $offered.= getFieldByID('title','twc_manage_offered',$service_offered[$i]).',';
		}
		echo substr($offered,0,-1);
     
	?></td>
	<td><?php echo $timefromto; ?></td>
	<td><?php echo $results->payments; ?></td>
	<td><?php echo $results->on_call; ?></td>
	<td><?php echo $results->price; ?></a></td>
	
	<td><a href="<?php echo site_url(); ?>/booking/?type=services&action=edit&id=<?php echo $results->id; ?>">Edit</a> | <a href="<?php echo site_url(); ?>/booking/?type=services&action=delete&id=<?php echo $results->id; ?>">Delete</a></td>

  </tr>
<?php } ?>
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
    height: 108px;
    overflow-y: scroll;
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
