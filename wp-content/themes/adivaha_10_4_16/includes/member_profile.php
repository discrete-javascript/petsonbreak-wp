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
	    global $wpdb;
	        $user_login        =$_REQUEST["member_email"];
			$user_passowrd     =$_REQUEST["member_password"];
			$email             =$_REQUEST["member_email"];
			$first_name        =$_REQUEST["member_firstname"];
			$last_name         =$_REQUEST["member_last_name"];
			$address           =$_REQUEST["member_address"];
			$phone             =$_REQUEST["member_phone"];		
            $city              =$_REQUEST["member_city"];			
            $age               =$_REQUEST["member_age"];	
            $own_pets          =$_REQUEST["own_pets"];	
            $Pets              =$_REQUEST["pets"];	
          //  $spayed            =$_REQUEST["spayed"];			
          //  $pedigreed         =$_REQUEST["pedigreed"];	
            $gender            =$_REQUEST["gender"];	
	
			 $pet_name_arr =$_REQUEST["pet_name"];
			 $pet_age_arr =$_REQUEST["pet_age"];
			 $pet_bread_arr =$_REQUEST["pet_bread"];
			 $pet_gender_arr =$_REQUEST["pet_gender"];
			 $pet_pedigreed_arr =$_REQUEST["pedigreed"];
	         $pet_spayed_arr =$_REQUEST["spayed"];
		
         if(($Pets=='Dogs') || ($Pets=='Cats') || ($Pets=='Horse') ){
			$countPet =count($pet_name_arr);
			for($i=0; $i< $countPet; $i++ ){
				$petDetail[] =array('name'=>$pet_name_arr[$i],'age'=>$pet_age_arr[$i],'bread'=>$pet_bread_arr[$i],'gender'=>$pet_gender_arr[$i],'pedigreed'=>$pet_pedigreed_arr[$i],'spayed'=>$pet_spayed_arr[$i]);
		 }
	    $petDetail_json=json_encode($petDetail);	
		}
		else{
			$petDetail_json =$_REQUEST["info"];	
		}
		


		$display_name =$first_name.' '.$last_name;
		$user_nicename =$first_name.' '.$last_name;
		
		$SQL_pet_detailss = "Select * from twc_pet_detail where user_id='".$_SESSION['userID']."'"; 
         $SQL_pet_detailsres=$wpdb->query($SQL_pet_detailss);
        
		if(count($SQL_pet_detailsres) >0){
			$SQL_pet_detail = "Update twc_pet_detail set title='".$Pets."',pet_detail='".$petDetail_json."' where user_id='".$_SESSION['userID']."'";   
		    
		}
		else{
			 $SQL_pet_detail = "Insert into twc_pet_detail set title='".$Pets."',pet_detail='".$petDetail_json."',user_id='".$_SESSION['userID']."'"; 
	         
		}
		
		 $wpdb->query($SQL_pet_detail);
	
		$SQL_user = "Update ".$wpdb->prefix."users set user_nicename='".$user_nicename."',display_name='".$display_name."' where ID='".$user_ID."'"; 
		$wpdb->query($SQL_user);
		$user_meta_array =array('first_name'=>$first_name,
								'lastname'=>$last_name,
								'nickname'=>$user_nicename,
								'phone'=>$phone,
								'address'=>$address,
								'city'=>$city,
							    'country'=>$country,
							    'age'=>$age,
							    'Pets'=>$Pets,
							    'gender'=>$gender,
							    'own_pets'=>$own_pets,
							   // 'spayed'=>$spayed,
							   // 'pedigreed'=>$pedigreed,
							    'img_path'=>$db_image_path
							   );
				   
				foreach($user_meta_array as $key=>$value){
				update_user_meta( $user_ID, $key, $value); 
				} 

	echo '<script>window.location.href="'.site_url().'/member-profile/?type=profile"</script>';
   
}
?>



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
							<input type="text" name="member_firstname" id="member_firstname" value="<?php echo $all_meta_for_user['first_name'][0]; ?>" onkeyup="blankField('member_firstname','Enetr Your First Name')">
							<span id="err_member_firstname"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name</span></label>
							<input name="member_last_name" id="member_last_name" placeholder="Enetr Your Last Name"  type="text" value="<?php echo $all_meta_for_user['lastname'][0]; ?>">
							<span id="err_member_last_name"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Age(for verification members must be 18+)</span></label>
							<input name="member_age" id="member_age" placeholder="Enetr Your Age"  type="text" value="<?php echo $all_meta_for_user['age'][0]; ?>">
							<span id="err_member_age"></span>
						</li>
						
							<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender</span></label>
							<select class="form-control" id="gender" name="gender" placeholder="Gender">
								<option value="">Select Gender</option>
								
							<?php	 if($all_meta_for_user['gender'][0]=='Male'){
									$cselected ='selected="selected"';
								  } ?>
								  <?php	 if($all_meta_for_user['gender'][0]=='Female'){
									$cselected ='selected="selected"';
								  } ?>
									<option value="Male" <?php echo $cselected; ?>>Male</option>
									<option value="Female" <?php echo $cselected; ?>>Female</option>
							</select>
						</li>
						
						
						
						<li class="address_li">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
							<input type="text" name="member_address" id="member_address"  placeholder="Enetr Your Address" value="<?php echo $all_meta_for_user['address'][0]; ?>" >
							<span id="err_member_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
							<input type="text" name="member_city" id="member_city"  placeholder="Enter Your City" value="<?php echo $all_meta_for_user['city'][0]; ?>">
							<span id="err_member_city"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Citizenship</span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship">
								<option value="">Select Country</option>
								<?php foreach($sresults as $sresult){
                                   if($sresult->id==$all_meta_for_user['country'][0]){
									$cselected ='selected="selected"';
								  }
								 else{
									$cselected='';
								 }
								
								?>
									<option value="<?php echo $sresult->title; $cselected ?>" ><?php echo $sresult->title; ?></option>
							<?php	} ?>
								
								
							</select>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone</span></label>
							<input name="member_phone" id="member_phone"  placeholder="Enter Your Mobile/Phone" type="text" value="<?php echo $all_meta_for_user['phone'][0]; ?>">
							<span id="err_member_phone"></span>
						</li>

					<li>
					  <div class="upload_div">
						<label class="nrd-loginModal-label u-vr2x" for="username"><span>Upload Image </span></label>
						<div class="member_profile_btn">
						<label for="member_profile_pic">Upload</label>
						<input type="file" name="image_path" id="image_path">
						</div>
						 
						 
					 </div>
				
	            <?php if($all_meta_for_user['img_path'][0]!='') { ?>
				<div class="upld_img_div">
			       <img src="<?php echo get_template_directory_uri(); ?>/uploads_img/<?php echo $all_meta_for_user['img_path'][0]; ?>">
				</div>
				<?php } ?>
					</li>
					
			<input type="hidden" id="pettypede" name="pettypede" value="<?php echo $PetTitle; ?>">
			
					<li class="doYou">
							<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Do you Own Pets</span></label>
							
							<div class="payment-options">
								<label class="radio-inline">
							
									<span>Yes</span> <input type="radio" name="own_pets" id="own_pets1" value="Yes" <?php if ($all_meta_for_user['own_pets'][0] == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}   ?> >
								</label>
								<label class="radio-inline">
									<span>No</span> <input type="radio" name="own_pets" id="own_pets2" value="No" <?php if ($all_meta_for_user['own_pets'][0] == 'No'){$checked ='checked="checked"'; echo $checked; }else{$checked='';} ?> >
								</label>
							</div>
							</li>
							
				
							<li class="pets_option">
							  <div class="shown_petList">
							   <ul class="shown_petLista_head">
								  <li>
								    <div>Pet Type</div>
								
								  </li>
							   </ul>
							   <ul class="shown_petLista_list">
							      <li>
								    <div class="shown_pets_div">  
										<select name="pets" id="pets">
											<?php 

											if($all_meta_for_user['Pets'][0]=='Dogs'){		
											$cselected ='selected="selected"'; ?>
											<option value="Dogs" <?php echo $cselected; ?>>Dogs</option>

										<?php	}
											else{
											$cselected='';  ?>
                                             <option value="Dogs" <?php echo $cselected; ?>>Dogs</option>
											<?php }  


											if($all_meta_for_user['Pets'][0]=='Cats'){		
											$cselected ='selected="selected"'; ?>
											<option value="Cats" <?php echo $cselected; ?>>Cats</option>

										<?php	}
											else{
											$cselected=''; ?>
                                             <option value="Cats" <?php echo $cselected; ?>>Cats</option>

										<?php	}  

											if($all_meta_for_user['Pets'][0]=='Horse'){		
											$cselected ='selected="selected"'; ?>
                                                   <option value="Horse" <?php echo $cselected; ?>>Horse</option>

										<?php	}
											else{
											$cselected=''; ?>
                                                 <option value="Horse" <?php echo $cselected; ?>>Horse</option>
 
											<?php } 

											if($all_meta_for_user['Pets'][0]=='Birds'){		
											$cselected ='selected="selected"'; ?>
											  <option value="Birds" <?php echo $cselected; ?>>Birds</option>

											<?php }
											else{  
											$cselected=''; ?>
                                            <option value="Birds" <?php echo $cselected; ?>>Birds</option>											


										<?php 	}  

											if($all_meta_for_user['Pets'][0]=='Mammals'){		
											$cselected ='selected="selected"'; ?>
                                                <option value="Mammals" <?php echo $cselected; ?>>Mammals</option>
										<?php	}
											else{
											$cselected=''; ?>
                                             <option value="Mammals" <?php echo $cselected; ?>>Mammals</option>
										<?php	}  

											if($all_meta_for_user['Pets'][0]=='Fish'){		
											$cselected ='selected="selected"'; ?>
											 <option value="Fish" <?php echo $cselected; ?>>Fish</option>

											<?php }
											else{
											$cselected=''; ?>
											 <option value="Fish" <?php echo $cselected; ?>>Fish</option>


										<?php	}  

											if($all_meta_for_user['Pets'][0]=='Others'){		
											$cselected ='selected="selected"'; ?>
											 <option value="Others" <?php echo $cselected; ?>>Others</option>

										<?php	}
											else{
											$cselected='';  ?>
											 <option value="Others" <?php echo $cselected; ?>>Others</option>

										<?php	}  ?>
								
                                      
										</select>
									  </div>
								  </li>
							   </ul>
							   </div>
							
			
							<div id="petLista" class="hidden_petList">
							<h4 class="wowPet">WOW!! Great! Please Tell us more about your Pet..</h4>
							<div class="">
							   <ul class="petLista_head">
								  <li>
								   <div>Name</div>
									<div>Age</div>
									<div>Gender</div>
									<div>Bread</div>
									<div>Pedigreed</div>
									<div>Sprayed/Neutered</div>
								  </li>
							   </ul>
							   <ul class="petLista_list">
							   
							
				 <?php 
			
				 
				 if(($count_val > 0) && ($all_meta_for_user['Pets'][0]==$PetTitle)){ 
							   for($i=0; $i < $count_val; $i++ ){
							   ?>
								   
							<li id="v_<?php echo $i; ?>">
							  <div>
							    <input name="pet_name[]" class="pet_name" value="<?php echo $PetDetail[$i]['name']; ?>">
							  </div>
							  <div>
							    <input name="pet_age[]" class="pet_name" value="<?php echo $PetDetail[$i]['age'] ?>">
							  </div>
							  <div>
								<select name="pet_gender[]" class="pet_name">
							<?php if($PetDetail[$i]['gender']=='Male'){

							        $cselected ='selected="selected"';
							      }
								  else{$cselected ='';}
							      if($PetDetail[$i]['gender']=='Female'){
							         $cselected ='selected="selected"';
							      }		
                                   else{$cselected ='';}								  
							     ?>
								  <option value="Male"  <?php echo $cselected; ?>>Male</option>
								  <option value="Female"  <?php echo $cselected; ?>>Female</option>
							    </select>
							</div>
							<div>
							  <select name="pet_bread[]" class="pet_name">
							  <option value="Affenpinscher">Affenpinscher</option>
					<?php 		  
						 if($PetDetail[$i]['bread']=='Affenpinscher'){
						     $cselected ='selected="selected"'; ?>
							 <option value="Afghan Hound" <?php echo $cselected; ?>>Afghan Hound</option>
				<?php	}	

                  		  
						 if($PetDetail[$i]['bread']=='Afghan Hound'){
						     $cselected ='selected="selected"';
					}
					
					else{$cselected ='';}
		             	  
						 if($PetDetail[$i]['bread']=='Airedale Terrier'){
						     $cselected ='selected="selected"';
					}
					else{$cselected ='';}


			          if($PetDetail[$i]['bread']=='American Eskimo Dog'){
						  
						     $cselected ='selected="selected"';
				
					  }
					  else{$cselected ='';}
					  
					   if($PetDetail[$i]['bread']=='American Foxhound'){
						  
						     $cselected ='selected="selected"';
				
					  }
					  else{$cselected ='';}
							?>						
							
							
							<option value="Airedale Terrier" <?php echo $cselected; ?>>Airedale Terrier</option>
							<option value="American Eskimo Dog" <?php echo $cselected; ?>>American Eskimo Dog</option>
							<option value="American Foxhound" <?php echo $cselected; ?>>American Foxhound</option>
			              </select>
							</div>
							
							
							
							<div>
							  <select name="pedigreed[]" class="pet_name">
							  <?php  if($PetDetail[$i]['pedigreed']=='Yes'){
						              $cselected ='selected="selected"';
				
					            }
								
								else{
									$cselected ='';
								}

                                if($PetDetail[$i]['pedigreed']=='No'){
						              $cselected ='selected="selected"';
				
					            }   

                                else{
									$cselected ='';
								} 								
							?>
							    <option value="Yes" <?php echo $cselected; ?> >Yes</option>
								<option value="No" <?php echo $cselected; ?>>No</option>
							  </select>
							</div>
							
							<div>
							  <select name="spayed[]" class="pet_name">
							       <?php  if($PetDetail[$i]['pedigreed']=='Yes'){
						              $cselected ='selected="selected"';
				
					            }
								 else{
									$cselected ='';
								} 

                                if($PetDetail[$i]['pedigreed']=='No'){
						              $cselected ='selected="selected"';
				
					            } 
                                else{
									$cselected ='';
								}    								
							?>
							    <option value="Yes" <?php echo $cselected; ?> >Yes</option>
								<option value="No" <?php echo $cselected; ?>>No</option>
							  </select>
							</div>
							
								  <div class="deletePetss" rel="<?php echo $i; ?>">[Delete]</div><div style="clear:both"></div>
							
							</li> 
		       <?php  } }  else {?>
			   
									<li>
							
									  <div><input name="pet_name[]" value=""></div>
									  <div><input name="pet_age[]" value=""></div>
									
									  <div>
										<select name="pet_gender[]">
											<option value="male">Male</option>
											<option value="Female">Female</option>
										</select>
									  </div>
									  <div>
										<select name="pet_bread[]">
							<option value="Airedale Terrier">Airedale Terrier</option>
							<option value="American Eskimo Dog">American Eskimo Dog</option>
							<option value="American Foxhound">American Foxhound</option>
										</select>
									  </div>
									   <div>
										<select name="pedigreed[]" id="pedigreed">
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									  </div>
									 <div>
										 <select name="spayed[]" id="spayed">
											  <option value="Yes">Yes</option>
											  <option value="No">No</option>
										</select>
									  </div>
									  </li>
								  
							  <?php } ?>
							   </ul>
							   </div>
							  	<div id="addMorePets"><span>Add More</span></div>
							</div>
							
							<div class="petListadetail">
							
							  <?php if($count_vals>0) { ?>
								   <ul><li><label class="nrd-loginModal-label u-vr2x" for="username"><span>Info</span></label><input type="text" name="info" id="info" value="<?php echo $PetDetailss; ?>" placeholder="Enetr Your Pets Info"></li></ul>
								   
							<?php   } else{ ?>
								
								<ul><li><label class="nrd-loginModal-label u-vr2x" for="username"><span>Info</span></label><input type="text" name="info" id="info" placeholder="Enetr Your Pets Info"></li></ul>
						<?php	} ?>
							
							
							</div>

							
						</li>
					
					</ul>

	<div class="register-btn">
		<input type="button" id="SaveButtonMember" value="Save Changes" class="btn_1 green medium">
	</div>
	</form> 
	
	
<div class="upload_div_cont">
	<div class="upload_div">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo get_template_directory_uri(); ?>/uploadify/upload.php">
    	<input type="hidden" name="image_form_submit" value="1"/>
            <label>Choose Image</label>
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




<script> 

$("input[name='Pets']").click(function() {
		var which_pet = $(this).val();

		if((which_pet=='Dogs') || (which_pet=='Cats') || (which_pet=='Horse')  ){
		 $(".spayed_div").show();	
		 $("#petLista").show();	
		 $(".petListadetail").hide();	
		 
		}
		else{
			$(".spayed_div").hide();
			$("#petLista").hide();
		    $(".petListadetail").show();
    
			
		}
	   
});

$("#pets").change(function() {
		var which_pet = $(this).val();
		var which_petactive = $("#pettypede").val();

		if((which_pet=='Dogs') || (which_pet=='Cats') || (which_pet=='Horse') || (which_pet=='Horse')  ){
		// $(".spayed_div").show();	
		if(which_petactive!=which_pet){
		$(".pets_div").show();	
		$("#petLista").show();	
		$(".petListadetail").hide();
		$(".pet_name").val('');
		}
		
			else{
		$(".pets_div").show();	
		$("#petLista").show();	
		$(".petListadetail").hide();
		}
			
		 
		}
		else{
			//$(".spayed_div").hide();
			$(".pets_div").show();
			$("#petLista").hide();
			$(".petListadetail").show();	
     str='<ul><li><label class="nrd-loginModal-label u-vr2x" for="username"><span>Info</span></label><input type="text" name="info" id="info" placeholder="Enetr Your Pets Info"></li></ul>';
 
      $('.petListadetail').html(str);
			
		}
	   
});

 $( document ).ready(function() {
	// var active=$('input[name=Pets]:checked', '#member_Update').val();
	  var active=$('#pets :selected').text();
	
    if((active=='Dogs') || (active=='Cats') || (active=='Horse')  ){
		 $(".spayed_div").show();	
		 $("#petLista").show();	
		 $(".petListadetail").hide();	
		 
		}
		else{
			$(".spayed_div").hide();
			$("#petLista").hide();
			$(".petListadetail").show();
		}
 }); 
	


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
 $('#SaveButtonMember').click(function(){ 
	 $('#member_Update').submit();
});	
</script>	

<script>

$('#addMorePets').click(function() {
   var v=$('#count_value').val();
  v++;
$('#no_of_pets').val(v);
  var str='';
  
  
  str+='<li id="v_'+v+'"><div><input name="pet_name[]" value=""></div><div><input name="pet_age[]" value=""></div><div><select name="pet_gender[]"><option value="male">Male</option><option value="Female">Female</option></select></div><div><select name="pet_bread[]"><option value="Affenpinscher">Affenpinscher</option><option value="Afghan Hound">Afghan Hound</option><option value="Airedale Terrier">Airedale Terrier</option><option value="American Eskimo Dog.">American Eskimo Dog</option><option value="American Foxhound">American Foxhound</option></select></div><div><select name="pedigreed[]"><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="spayed[]"><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div></li>';
  
  
 //str+='<ul><li id="v_'+v+'"><div><input name="pet_name[]" value=""></div><div><input name="pet_age[]" value=""></div><div><select name="pet_gender[]"><option value="male">Male</option><option value="Female">Female</option></select></div><div><select name="pet_bread[]"><option value="male">Male</option><option value="Female">Female</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div><div style="clear:both"></div></li></ul>';
 
 $('.petLista_list').append(str);
 deletePets();
})

function deletePets(){
	$('.deletePets').click(function(){
		var rel =$(this).attr('rel');
		$('#v_'+rel).remove();
	})
}



$('.deletePetss').click(function(){
		var rel =$(this).attr('rel');
		
		$('#v_'+rel).remove();
	})
	
	

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
		
<style>



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
</style>
