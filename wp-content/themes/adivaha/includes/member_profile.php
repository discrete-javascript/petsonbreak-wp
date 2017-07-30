<?php session_start();
global $mk_options;
global $wpdb;
$type =$_REQUEST['type'];
$action =$_REQUEST['action'];


if($_REQUEST['postType']!=''){
	
	$allowed =  array('gif','png','jpg','jpeg','JPEG');
	
	$file_name =$_FILES['image_path']['name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	if(in_array($ext,$allowed)){
		if($file_name !=''){
			$target_dir = "wp-content/themes/adivaha/uploads_img/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($_FILES['image_path']['tmp_name'],$target_file);
			$db_image_path =$file_name;
		}
	}
	

		    $user_ID=$_SESSION['userID'];
	   
	        $user_login        =$_REQUEST["member_email"];
			$user_passowrd     =$_REQUEST["member_password"];
			$email             =$_REQUEST["member_email"];
			$first_name        =$_REQUEST["member_firstname"];
			$last_name         =$_REQUEST["member_last_name"];
			$address           =$_REQUEST["member_address"];
			$phone             =$_REQUEST["member_phone"];		
			$city              =$_REQUEST["member_city"];			
			$dobArr            =explode("/",$_REQUEST["member_dob"]);	
	        $dob               =$dobArr[2].'-'.$dobArr[1].'-'.$dobArr[0]; 	
			$own_pets          =$_REQUEST["own_pets"];	
			$gender            =$_REQUEST["gender"];	
			$state             =$_REQUEST["member_state"];
			$country           =$_REQUEST["member_country"];	
			$member_citizenship=$_REQUEST["member_citizenship"];	
			$intrested_area    =implode(",",$_REQUEST["intrested_area"]);
			$additional_info    =$_REQUEST["additional_info"];
			if($own_pets=='Yes'){
	         $petDetail_json =json_encode($_REQUEST['petData']);
			}else{
			 $petDetail_json='';  	
			}
	

			$display_name =$first_name.' '.$last_name;
			$user_nicename =$first_name.' '.$last_name;
			
			$SQL_user = "Update ".$wpdb->prefix."users set user_nicename='".$user_nicename."',display_name='".$display_name."' where ID='".$user_ID."'"; 
			$wpdb->query($SQL_user);
		    $user_meta_array =array('first_name'=>$first_name,
								'last_name'=>$last_name,
								'nickname'=>$user_nicename,
								'phone'=>$phone,
								'gender'=>$gender,
								'address'=>$address,
								'city'=>$city,
								'state'=>$state,
								'country'=>$country,
								'member_citizenship'=>$member_citizenship,
								'dob'=>$dob,
								'own_pets'=>$own_pets,
								//'spayed'=>$spayed,
								//'pedigreed'=>$pedigreed,
								'pet_details'=>$petDetail_json,
								
								'intrested_area' =>$intrested_area,
								'additional_info' =>$additional_info,
							    'img_path'=>$db_image_path
							   );
				   
				foreach($user_meta_array as $key=>$value){
				update_user_meta( $user_ID, $key, $value); 
				} 

	echo '<script>window.location.href="'.site_url().'/member-profile/?type=profile"</script>';
   
}

//$get_usermeta =get_usermeta(53);
$get_usermeta =get_user_meta($user_ID);
/* echo "<pre>";
print_r($get_usermeta); die;
 */
$first_name =$get_usermeta['first_name'][0];
$lastname =$get_usermeta['last_name'][0];
$phone =$get_usermeta['phone'][0];
$address =$get_usermeta['address'][0];
$city =$get_usermeta['city'][0];
$country =$get_usermeta['country'][0];
$member_citizenship =$get_usermeta['member_citizenship'][0];
$dob =$get_usermeta['dob'][0];
$own_pets =$get_usermeta['own_pets'][0];
$gender =$get_usermeta['gender'][0];
$pet_details =json_decode($get_usermeta['pet_details'][0]);

$pets=$pet_details->pets;
$pet_name=$pet_details->pet_name;
$pet_age=$pet_details->pet_age;
$pet_gender=$pet_details->pet_gender;
$pet_breed=$pet_details->pet_breed;
$pedigreed=$pet_details->pedigreed;
$spayed=$pet_details->spayed;


$intrested_area =$get_usermeta['intrested_area'][0];
$additional_info =$get_usermeta['additional_info'][0];

?>

<style>
.hidden_petList{display:none;}
</style>

<?php if($_REQUEST['taction']=='edit'){?>
<h5 class="recent_bookings">Member Profile</h5>
<form id="member_Update"  name="member_Update" action="" method="POST" enctype="multipart/form-data">
			 <input type="hidden" name="postType" id="postType"  value="<?php echo $type;?>" />
			 <?php if($count_val>0) { ?>
			 <input type="hidden" name="count_value" id="count_value"  value="<?php echo $count_val; ?>" />
			<?php  } else {?>
			 <input type="hidden" name="count_value" id="count_value"  value="0" />
			<?php } ?>
			
					<ul class="modalLogin-loginFields">
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name</span></label>
							<input type="text" name="member_firstname" id="member_firstname" value="<?php echo $first_name; ?>" onkeyup="blankField('member_firstname','Enter Your First Name')">
							<span class="errSpan" id="err_member_firstname"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name</span></label>
							<input name="member_last_name" id="member_last_name" placeholder="Enter Your Last Name"  type="text" value="<?php echo $lastname; ?>">
							<span class="errSpan" id="err_member_last_name"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>DOB(for verification members must be 18+)* </span></label>
							<input name="member_dob" id="member_dob" class="datepicker" placeholder="Enter Your DOB"  type="text" value="<?php echo date("d/m/Y",strtotime($all_meta_for_user['dob'][0])); ?>">
							<span class="errSpan" id="err_member_dob"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender</span></label>
							<select class="form-control" id="gender" name="gender" placeholder="Gender">
								<option value="">Select Gender</option>
							<?php	 
							    if($all_meta_for_user['gender'][0]=='Male'){
									$cselected ='selected="selected"';
								  } 
								  if($all_meta_for_user['gender'][0]=='Female'){
									$fcselected ='selected="selected"';
								  } 
								  if($all_meta_for_user['gender'][0]=='Third Gender'){
									$tcselected ='selected="selected"';
								  } 
								  
								  ?>
									<option value="Male" <?php echo $cselected; ?>>Male</option>
									<option value="Female" <?php echo $fcselected; ?>>Female</option>
									<option value="Third Gender" <?php echo $tcselected; ?>>Third Gender</option>
							</select>
							<span class="errSpan"></span>
						</li>
						
						
						
						<li >
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
							<input type="text" name="member_address" id="member_address"  placeholder="Enter Your Address" value="<?php echo $all_meta_for_user['address'][0]; ?>" >
							<span class="errSpan" id="err_member_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
							<input type="text" name="member_city" id="member_city"  placeholder="Enter Your City" value="<?php echo $all_meta_for_user['city'][0]; ?>">
							<span class="errSpan" id="err_member_city"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>State/County</span></label>
							<input type="text" name="member_state" id="member_state"  placeholder="Enter Your City" value="<?php echo $all_meta_for_user['city'][0]; ?>">
							<span class="errSpan" id="err_member_city"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country<span class="err_req">* </span></span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="member_country" name="member_country" class="form-control"  placeholder="Citizenship" onchange="blankField('member_country','')">
								<option value="">Select Country</option>
								<?php foreach($sresults as $sresult){
                                  if($sresult->title==$all_meta_for_user['country'][0]){
									$cselected ='selected="selected"';
								  }
								 else{
									$cselected='';
								 }
								?>
									<option value="<?php echo $sresult->title;?>" <?php echo $cselected;?> ><?php echo $sresult->title; ?></option>
								<?php } ?>
							</select>
							<span class="errSpan" id="err_member_country"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Citizenship</span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship">
								<option value="">Select Country</option>
								<?php foreach($sresults as $sresult){
                                   if($sresult->title==$all_meta_for_user['member_citizenship'][0]){
									$cselected ='selected="selected"';
								  }
								 else{
									$cselected='';
								 }
								
								?>
									<option value="<?php echo $sresult->title;?>" <?php echo $cselected;?> ><?php echo $sresult->title; ?></option>
							<?php	} ?>
								
								
							</select>
							<span class="errSpan" id="err_member_country"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone</span></label>
							<input name="member_phone" id="member_phone"  placeholder="Enter Your Mobile/Phone" type="text" value="<?php echo $phone; ?>">
							<span class="errSpan" id="err_member_phone"></span>
						</li>
						
			
					
				
					
			       <input type="hidden" id="pettypede" name="pettypede" value="<?php echo $PetTitle; ?>">
			
					<li class="doYou">
						<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Do you Own Pets</span></label>
						<div class="payment-options">
							<label class="radio-inline">
								<span>Yes</span> <input type="radio" class="own_pets" name="own_pets" id="own_pets1" value="Yes" <?php if ($all_meta_for_user['own_pets'][0] == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}   ?> >
							</label>
							<label class="radio-inline">
								<span>No</span> <input type="radio" class="own_pets" name="own_pets" id="own_pets2" value="No" <?php if ($all_meta_for_user['own_pets'][0] == 'No'){$checked ='checked="checked"'; echo $checked; }else{$checked='';} ?> >
							</label>
						</div>
						
					 </li>
					 
					
					 <li class="pets_option">
							 <div id="petLista" class="hidden_petList" >
							   <h4 class="wowPet">"We would like to know more about your Pet"</h4>
							   <div class="">
							   <ul class="petLista_list">
							   <?php 
							   if ($all_meta_for_user['own_pets'][0] == 'No'){ $count_pets =1;}
							   else{$count_pets =count($pets);}
							   
							   for($p=0;$p<$count_pets;$p++){
								   $petLists =array('Dogs','Cats','Horse','Birds','Small Mammals','Fish','Others');
								  $petType = $pets[$p];
								   ?>
							    <li id="v_<?php echo $p;?>">
								    <div class="shown_pets_div" id="petType_<?php echo $p;?>" style="width:12%">
									
										<select name="petData[pets][]" class="changePetType" rel="<?php echo $p;?>">
										   <option value="" selected disabled>Pet Type</option>
										   <?php foreach($petLists as $vl){
											      if($pets[$p]==$vl){$pselected='selected="selected"';} else{$pselected='';}
											      echo '<option value="'.$vl.'" '.$pselected.'>'.$vl.'</option>';
										        }?>
											
										</select>
									 </div>
									<?php if( ($petType=='') || ($petType=='Dogs') || ($petType=='Cats') || ($petType=='Horse')  ){?> 
							        <div id="petDetails_<?php echo $p;?>" style="width:85%">
									  <div><input name="petData[pet_name][]" value="<?php echo $pet_name[$p];?>" placeholder="Name"></div>
									  <div>
										 <select name="petData[pet_age][]" value="" placeholder="Age">
										    <option value="" selected disabled>Age</option>
											<?php for($i=1;$i<=100;$i++){ 
											          if($i==$pet_age[$p]){$agselected='selected="selected"';}
													  else{$agselected='';}
											        ?>
												<option value="<?php echo $i ;?>" <?php echo $agselected;?>><?php echo $i; ?></option>
											<?php } ?>
											
										</select>  
										  
									  </div>
									
									  <div>
										<select name="petData[pet_gender][]">
										<option value="" selected disabled>Gender</option>
										<option value="male" <?php if($pet_gender[$p]=='Male'){ echo 'selected="selected"';}?>>Male</option>
										<option value="Female" <?php if($pet_gender[$p]=='Female'){ echo 'selected="selected"';}?>>Female</option>
										</select>
									  </div>
									  <div>
									  <?php 
									  $breeLists =$wpdb->get_Results("select * from twc_pet_breedtype where pet_type='".$petType."'");
									 
															 ?>
										<select name="petData[pet_breed][]" id="breedSelect_<?php echo $p;?>">
										    <option value="" selected disabled>Breed</option>
											<?php foreach($breeLists as $breed){
												   if($breed->id==$pet_breed[$p]){$bselected='selected="selected"';}
												   else{$bselected='';}
												echo '<option value="'.$breed->id.'" '.$bselected.'>'.$breed->title.'</option>';
											    }
												?>
										</select>
									  </div>
									   <div>
										<select name="petData[pedigreed][]" >
										    <option value="" disabled>Pedigreed</option>
											<option value="Yes" <?php if($pedigreed=='Yes'){echo 'selected="selected"';}?>>Yes</option>
											<option value="No" <?php if($pedigreed=='No'){echo 'selected="selected"';}?>>No</option>
										</select>
									  </div>
									 <div>
										 <select name="petData[spayed][]">
										     <option value="" selected disabled>Sprayed/Neutered</option>
											  <option value="Yes" <?php if($spayed=='Yes'){echo 'selected="selected"';}?>>Yes</option>
											  <option value="No" <?php if($spayed=='No'){echo 'selected="selected"';}?>>No</option>
										</select>
									  </div>
									  <?php if($p>0){?><div class="deletePets" rel="<?php echo $p;?>">[Delete]</div><?php }?>
									 </div> 
							   <?php } else{?>									 
									 <div id="petDetailsSmall_<?php echo $p;?>" class="petDetailsSmall" style="width:85%; display:block;"><div style="width:83%">
									  <textarea name="petData[pet_name][]"><?php echo $pet_name[$p];?></textarea>
									  <!--<input name="petData[pet_name][]" value="<?php echo $pet_name[$p];?>"> -->
									  <input type="hidden" name="petData[pet_age][]" value="">
									  <input type="hidden" name="petData[pet_gender][]" value="">
									  <input type="hidden" name="petData[pet_breed][]" value="">
									  <input type="hidden" name="petData[pedigreed][]" value="">
									  <input type="hidden" name="petData[spayed][]" value="">
									 </div>
									 <?php if($p>0){?><div class="deletePets" rel="<?php echo $p;?>">[Delete]</div><?php } ?></div>
							   <?php }?>
								   </li>
								  <?php }?> 
								   
							   </ul>
							   </div>
							   <div id="addMorePets" style="width:120px;"><span>Add More</span></div>
							</div>
							<div class="petListadetail"></div>
				
							<span class="errSpan" ></span>
						</li>
			
						
						 <li class="additional_info">
									<div class="bot">
							   <label class="nrd-loginModal-label u-vr2x" for="username"><span>Indicate the services you are intrested in</span></label>
							   
							   <ul class="intrested_box">
							    <?php 
								$intrested_area =explode(",",$intrested_area);
								$results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
								   foreach($results as $obj){
									  if(in_array($obj->id,$intrested_area)){$checked='checked="checked"';}
                                      else {$checked='';}  									  
									 echo '<li><input class="intrested_area" type="checkbox" name="intrested_area[]" value="'.$obj->id.'" '.$checked.' style="width:20px;">'.$obj->title.'</li>';  
								   }
								?>
							   </ul>
							   
					
							<span class="errSpan" id="err_member_profile_pic"></span>
							</div>
					   </li>
						<li class="additional_info">
						  <label class="nrd-loginModal-label u-vr2x" for="username"><span>Additional information or Questions / Comments</span></label>
							<textarea cols="5" rows="5" name="additional_info" id="additional_info"><?php echo $additional_info;?></textarea>
							<span class="errSpan" id="err_additional_info"></span>
					    </li>
							
						<li class="uploadImg">
						  <div class="upload_div">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Upload Image </span></label>
							<div class="member_profile_btn">
							<label for="image_path">Upload</label>
							<input type="file" name="image_path" id="image_path">
							</div>
							 
							 
						 </div>
					
							<?php if($all_meta_for_user['img_path'][0]!='') { ?>
							<div class="upld_img_div">
							   <img src="<?php echo get_template_directory_uri(); ?>/uploads_img/<?php echo $all_meta_for_user['img_path'][0]; ?>">
							</div>
							<?php } ?>
							<span class="errSpan"></span>
						</li>
						<li class="submitBtn"><div class="register-btn">
							<input type="button" id="SaveButtonMember" value="Save Changes" class="btn_1 green medium">
						   </div>
						</li>
					
					</ul>
	      </form> 
	
	
<div class="upload_div_cont">
	<div class="upload_div">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo get_template_directory_uri(); ?>/uploadify/upload.php">
    	<input type="hidden" name="image_form_submit" value="1"/>
            <label for="images">Upload Gallery Images</label>
            <input type="file" name="images[]" id="images" multiple >
        <div class="uploading none">
          
            <img src="<?php echo get_template_directory_uri(); ?>/uploadify/uploading.gif"/>
        </div>
    </form>
    </div>
    <div class="gallery" id="images_preview">
	  
	</div>

</div>

<ul class="upload_images_ul">
<?php foreach($sresults_img as $img_src){ ?>
<li>
<img src="<?php echo get_template_directory_uri(); ?>/images/pets/thumbs/<?php echo $img_src->image; ?>"/>
<span class="del_image">[Delete]</span>
</li>
<?php } ?>
</ul>
<?php } else{?>
<h5 class="recent_bookings">Member Profile <span><a href="<?php echo site_url();?>/member-profile/?type=profile&taction=edit">Edit Profile</a></span></h5>

	<ul class="modalLogin-loginFields member-prof-details">
		<li>
		    <div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>First Name</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $first_name; ?></p>
			</div>
			</div>
		</li>
				
		<li>
		
		     <div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Last Name</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $lastname; ?></p>
			</div>
			</div>
		</li>
		
		<li>
			<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>DOB</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php
			$mb_dob=$all_meta_for_user['dob'][0];
                                     
			echo date('d M Y',strtotime($mb_dob));?></p>
			</div>
			</div>

			
		</li>
		<li>
		
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Gender</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['gender'][0]; ?></p>
			</div>
			</div>
		</li>
		
		
		
		<li class="address_li">
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Address</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['address'][0]; ?></p>
			</div>
			</div>
		</li>
		
		<li>
			<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>City</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['city'][0]; ?></p>
			</div>
			</div>
			
		</li>
		
		<li>
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>State/County</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['state'][0]; ?></p>
			</div>
			</div>
			
		</li>
		<li>
		
			<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Country</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['country'][0]; ?></p>
			</div>
			</div>
			
		</li>
		<li>
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Citizenship</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['member_citizenship'][0]; ?></p>
			</div>
			</div>
		
		</li>
		
		<li> 
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Mobile/Phone</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['phone'][0]; ?></p>
			</div>
			</div>
			
		</li>
		
		
		<li>
		   <div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Own Pets ?</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $all_meta_for_user['own_pets'][0];?></p>
			</div>
			</div>
		 </li>
		<?php if($all_meta_for_user['own_pets'][0]=='Yes') {?> 
		<li class="pets_info">
		     <div class="row">
			<div class="col-md-12">
			<label class="nrd-loginModal-label  pet-info-label" for="username"><span>Pets Informations</span></label>
			</div>
			<div class="col-md-12">
			   
			   <div class="pet_info_labels">
		
			   <ul class="petLista_list">
					
				<li>
					<div class="shown_pets_div" id="petType_<?php echo $p;?>">Pet Type</div>
			
					  <div>Name</div>
					  <div>Age</div>
					  <div>Gender</div>
					  <div>Breed</div>
					   <div>Pedigreed</div>
					 <div>Sprayed/Neutered</div> 
			 
				   </li>
			
				   
				   
			   </ul>
			   </div>
			   
			   
			      <div class="pet_info_details">
						
			   <ul class="petLista_list">
					<?php 
			  
			   for($p=0;$p<count($pets);$p++){
			        
				   $petLists =array('Dogs','Cats','Horse','Birds','Small Mammals','Fish','Others');
				  $petType = $pets[$p];
				   ?>
				<li id="v_<?php echo $p;?>">
					<div class="shown_pets_div" id="petType_<?php echo $p;?>"><?php echo $pets[$p];?></div>
					<?php if( ($petType=='Dogs') || ($petType=='Cats') || ($petType=='Horse') ){?> 
					<div id="petDetails_<?php echo $p;?>"><?php echo $pet_name[$p];?></div>
					  <div><?php echo $pet_age[$p];?></div>
					
					  <div><?php echo $pet_gender[$p];?></div>
					  <div><?php echo getBreadName($pet_breed[$p]);?></div>
					   <div><?php echo $pedigreed[$p];?></div>
					 <div><?php echo $spayed[$p];?></div> 
			   <?php } else{?>									 
					 <div id="petDetailsSmall_<?php echo $p;?>" class="petDetailsSmall"></div>
					 <div><?php echo $pet_name[$p];?></div>
					
			   <?php }?>
				   </li>
				  <?php }?> 
				   
				   
			   </ul>
			   </div>
			   
			</div>
			  
			   
			   
			  
			
			   
			</div>
			  
			  
			  
	
		
	
		 </li>
         <?php } ?>

	    <li>
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Please Indicate the services you are intrested in</span></label>
			</div>
			<div class="col-md-6">
			
			 <p class="def-detl">
			 <?php 
			   $intrested_area_arr =explode(",", $intrested_area);
			   $str ='';
			   foreach($intrested_area_arr as $v){
				  $str.=getFieldByID('title','twc_service_category',$v).','; 
			   }
			   echo substr($str,0,-1);
			?>
			 </p>
			 
			</div>
			</div>
		</li>
		<li>
		
		   <div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Additional information or Questions / Comments</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"><?php echo $additional_info;?></p>
			</div>
			</div>
		</li>
			<li>
		 <div class="profile_image">
		   	<div class="row">
			<div class="col-md-6">
			<label class="nrd-loginModal-label  def-label" for="username"><span>Profile Pic</span></label>
			</div>
			<div class="col-md-6">
			<p class="def-detl"> <img src="<?php echo get_template_directory_uri(); ?>/uploads_img/<?php echo $all_meta_for_user['img_path'][0]; ?>"></p>
			</div>
			</div>
		
		 </div>
		</li>
	</ul>
<?php }?>



<script>
<?php if($all_meta_for_user['own_pets'][0]=='Yes'){?>
   $('.hidden_petList').show();
<?php } ?>

$('.own_pets').click(function(){
	var vl =$(this).val();
	if(vl=='Yes'){
	  $('.hidden_petList').show();	
	}else{
	  $('.hidden_petList').hide();	
	}
})

var v =<?php echo $p; ?>;
$('#addMorePets').click(function() {
  v++;
  var str='';
 str+='<li id="v_'+v+'"> <div class="shown_pets_div"  id="petType_'+v+'" style="width:12%"><select name="petData[pets][]" class="changePetType" rel="'+v+'"><option value="" selected disabled>Pet Type</option><option value="Dogs">Dogs</option><option value="Cats">Cats</option><option value="Horse">Horse</option><option value="Birds">Birds</option><option value="Mammals">Small Mammals</option><option value="Fish">Fish</option><option value="Others">Others</option></select></div>';
 
 str+='<div id="petDetails_'+v+'" style="width:85%"><div><input name="petData[pet_name][]" value="" placeholder="Name"></div><div> <select name="petData[pet_age][]" value="" placeholder="Age"><option value="" selected disabled>Age</option><?php for($i=1;$i<=100;$i++){ ?><option value="<?php echo $i ;?>"><?php echo $i; ?></option><?php } ?></select>  </div><div><select name="petData[pet_gender][]"><option value="" selected disabled>Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></div><div><select name="petData[pet_breed][]" id="breedSelect_'+v+'"></select></div><div><select name="petData[pedigreed][]"><option value="" selected disabled>Pedigreed</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="petData[spayed][]"><option value="" selected disabled>Sprayed/Neutered</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div></div>';
 
 //str+='<div id="petDetailsSmall_'+v+'" class="petDetailsSmall" style="width:85%"><div><input name="petData[pet_small_detail][]" value="" placeholder="Pet Description"></div><div class="deletePets" rel="'+v+'">[Delete]</div></div>';
 
 
 str+='</li>';
 
 $('.petLista_list').append(str);
 changePetType();
 deletePets();
})

function changePetType(){
	$('.changePetType').change(function(){
		var val =$(this).val();
		var v =$(this).attr('rel');
		if(v >0){
			var deleteStr ='<div class="deletePets" rel="'+v+'">[Delete]</div>';
		}else{
			var deleteStr ='';
		}
		
		
		if( (val=='Dogs') || (val=='Cats') || (val=='Horse') ){
			
			str='<div id="petDetails_'+v+'" style="width:85%"><div><input name="petData[pet_name][]" value="" placeholder="Name"></div><div> <select name="petData[pet_age][]" value="" placeholder="Age"><option value="" selected disabled>Age</option><?php for($i=1;$i<=100;$i++){ ?><option value="<?php echo $i ;?>"><?php echo $i; ?></option><?php } ?></select>  </div><div><select name="petData[pet_gender][]"><option value="" selected disabled>Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></div><div><select name="petData[pet_breed][]" id="breedSelect_'+v+'"></select></div><div><select name="petData[pedigreed][]"><option value="" selected disabled>Pedigreed</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="petData[spayed][]"><option value="" selected disabled>Sprayed/Neutered</option><option value="Yes">Yes</option><option value="No">No</option></select></div>'+deleteStr+'</div>';
			
		}else{
			str='<div id="petDetails_'+v+'" style="width:85%; display:block;"><div style="width:83%"><textarea name="petData[pet_name][]" style="width:100%"></textarea><input  type="hidden" name="petData[pet_age][]" value=""><input type="hidden" name="petData[pet_gender][]" value=""><input type="hidden" id="breedSelect_'+v+'" name="petData[pet_breed][]" value=""> <input type="hidden" name="petData[pedigreed][]" value=""><input type="hidden" name="petData[spayed][]" value=""></div>'+deleteStr+'</div>';
		}
		$('#petDetails_'+v).html(str);
		$.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=petbreedType&pet_type="+val,
			 success: function(Data){
				if(Data){
			    var myData="";
			    var breedstr="";
		         myData = JSON.parse(Data); 
				 for(a=0; a<myData.length; a++){
					 var id=myData[a].id;
                     var title=myData[a].title;	
				      breedstr +='<option value='+id+'>'+title+'</option>';
				   }
				}
				$('#breedSelect_'+v).html(breedstr);
				deletePets();
			  }
	        })
		
	})
}
changePetType();

function deletePets(){ 
	$('.deletePets').click(function(){ 
		var rel =$(this).attr('rel');
		$('#v_'+rel).remove();
	})
}
deletePets();

</script>
		
<script>
 $('#SaveButtonMember').click(function(){ 
	 $('#member_Update').submit();
});	
</script>	
			
<script>  
    $("input[name='own_pets']").click(function() {
        var test = $(this).val();
		if(test=='No'){
		 $(".pets_option").hide();	
		}
		else{
			$(".pets_option").show();
		}
       
    }); 

</script>	

<script>
	$('.del_image').click(function(){
		var rel =$(this).attr('rel');
		var attr =$(this).attr('attr');
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    
	$('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
    });
  } );
  </script>		
<style>


.petDetailsSmall {display:none;}
.con_left{float: left;width:70%;    padding: 28px 21px 40px 0px;
	
	}
	.con_right{float: right;width:30%;background-color: #663366;padding: 30px;}


	.modalLogin-loginFields{padding: 20px 0px;}


	.modalLogin-loginFields li input{    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;}
	
	.modalLogin-loginFields li select{    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;}
	
	.modalLogin-loginFields li:nth-child(2n-2){width: 49.5%;float: right;}
	
	.register-btn{clear: both;float: left;width: 100%;padding: 0px 0px;}
	.register-btn input{background: #663366;color: #fff;padding: 10px 25px;font-size: 14px;    border-radius: 4px;}
	.register-page1{    font-size: 33px;
    font-weight: 300;
    border-bottom: 1px solid #ddd;
    color: #777;
    padding: 0px 0px 17px 0px;
    margin-bottom: 28px;}
	
	a:hover, a:focus, a:active{color:#777;}
	#person_terms_of_service{float: left;width: 3%;height: 15px;}
	.btn_1 green{border: 0px;}
	.btn_1 green{}
	.con_left .nav-tabs>li>a{color: #777;font-size: 18px;}
	.petsInfo{
	width:100%;
	float:left;
	}
	
	.petsInfo ul{
	width:100%;
	float:left;}
	
	.petsInfo li label {
    display: block;
    font-size: 16px;
    color: #fff;
    font-weight: 300;
    margin-bottom: 7px;
	}
	
	.petsInfo li input {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
	}
	
	.petsInfo li select {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
	}
	
	.petsInfo > ul{
		width: 49%;
		float: left;
		background: #636;
		padding: 10px;
		margin-bottom:10px;
	}
	
	.petsInfo > ul:nth-child(2n-1){
	margin-right:1%;
	}
	
	.petsInfo > ul:nth-child(2n){
	margin-left:1%;
	}
	#member_register .petsInfo  .payment-options > label{
		width:90px !important;
	}


	.state-indicator {
	background-color: #fff;
	border-radius: 2px;
	border-color: #d32f2f;
	color: #A41200;
	padding: 5px 5px 5px 14px;
	display: inline-block;
	position: relative;
	margin: 0 0 5px;
	box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.3);
	text-align: left;
	}
	

	.upload_div_cont .upload_div {
    width: 100% !important;
    float: left;
    margin-bottom:25px;
	}
	
	.upload_div {
    width: 100% !important;
    float: left;
	}


    #memberProf #image_path{
    	border:0px;
    	padding-left: 0px;
    }

	.payment-options {
    width: 100%;
    float: left;
    margin-bottom: 25px;
	}
	
	#member_Update .payment-options > label {
    display: inline;
    width: auto !important;
    margin-right: 10px;
    padding-left: 0px;
	float:left;
	}
	
	#member_Update .payment-options > label>span {
    display: inline-block;
    float: left;
	}
	
	#member_Update .payment-options > label>input {
    display: inline-block;
    width: auto;
    height: auto;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 10px;
	}
	
	.modalLogin-loginFields li select {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
}

.petsInfo li label {
    display: block;
    font-size: 16px;
    color: #fff;
    font-weight: 300;

    margin-bottom: 7px;
}

.petsInfo li input {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
}

.petsInfo {
    width: 100%;
    float: left;
}	
.upld_img_div{
	width: 50%;
    float: left;
    max-height: 200px;
    background: #f3f3f3;
    text-align: center;
}

.upld_img_div img{
	width: 100%;
    height: 100%;
}

.petLista_head li {width:500px !important;}
.petLista_head li div{width:19%; float:left !important;}
.petLista_list li {width:500px !important;}	
#memberProf .petLista_list li div{width:19%; float:left!important;margin-right: 1%;}
.upload_images_ul{width:100%;float:left;margin-top:10px;}
.upload_images_ul li{float:left;margin-right: 10px;margin-bottom: 10px;}
.upload_images_ul li .del_image{display: block;font-size: 17px;margin:10px 0px;color:red;} 	
.uploading.none{margin:5px 0px;display: none;}
#images_preview{width:100%;float:right;}
#images_preview .deleteImage{margin:0px 10px;font-size:20px;color:red;}
#memberProf .spayed_div_left{width: 49%;float: left;}
#memberProf .spayed_div_right{width: 49%;float: right;}
#memberProf #addMorePets {width: 100%;float:left;margin-bottom:25px;}
#memberProf #addMorePets span{ background: #663366;color: #fff;padding: 10px 25px;font-size: 14px;border-radius: 4px;cursor:pointer;}
#memberProf .petLista_list li {width: 100% !important;float:left;}
#memberProf .petLista_head li {width: 100% !important;padding-bottom: 10px;}
#memberProf .deletePetss {width: 19%;float: left!important;margin-right: 1%;height: 40px;line-height: 40px;margin-bottom: 25px;color: red;font-size: 16px;}
#memberProf .deletePets{width: 19%;float: left!important;margin-right: 1%;height: 40px;line-height: 40px;margin-bottom: 25px;color: red;font-size: 16px;}


.intrested_box{
	background-color:#FFF;
	padding: 5px 5px 5px 9px;
    border-radius: 4px;
    border: 1px solid #777;
	max-height:160px;
	overflow-y: scroll;
}
.intrested_box li {width:49% !important; display:inline-block !important;}	

</style>
