<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Contact Person</span></label>
	<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
</li>
	
<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
	<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $email; ?>" type="email">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Contact Number</span></label>
	<input name="contact_number" id="contact_number"  placeholder="Contact Number" value="<?php echo $contact_number; ?>" type="text">
</li>

<li class="services-offered">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Course offered </span></label>
  <div class="services-offered-container">
    <div class="courses-offered-div">
  <?php $courses_offered =json_decode($results->courses_offered); ?>
	<div class="srv-off-chk">
	  <div class="row">
	  <div class="col-md-6">
	  <div class="courses_fields">
	  <div class="form-group">
	  <label>Name:</label>
	  <input class="form-control" type='text' name='courses_offered[name]' value="<?php echo $courses_offered->name; ?>">
	  </div>
	  </div>
	  </div>
	  <div class="col-md-6">
	  
	   <div class="courses_fields">
	   <div class="form-group">
	   <label>Duration:</label>
	   <input class="form-control" type='text' name='courses_offered[duration]' value="<?php echo $courses_offered->duration; ?>">
	   </div>
	  </div>
	  </div>
	  <div class="col-md-6">
	  <div class="courses_fields">
	  <div class="form-group">
	  <label>Name of Certification agency/Expert:</label>
	  <input class="form-control" type='text' name='courses_offered[agency]' value="<?php echo $courses_offered->agency; ?>">
	  </div>
	  </div>
	  </div>
	  <div class="col-md-6">
	  <div class="courses_fields">
	  <div class="form-group">
	  <label>Fees:</label>
	   <input class="form-control" type='text' name='courses_offered[fees]' value="<?php echo $courses_offered->fees; ?>">
	  </div>
	  </div>
	  </div>
	  <div class="col-md-6">
	  <div class="courses_fields">
	  <div class="form-group">
	  <label>Accommodation:</label>
	  <input class="form-control" type='text' name='courses_offered[accommodation]' value="<?php echo $courses_offered->accommodation; ?>">
	  </div>
	  </div>
	  </div>
	  <div class="col-md-6">
	  <div class="courses_fields">
	  <div class="form-group">
	  <label>Eligibility Criteria:</label>
	  <input class="form-control" type='text' name='courses_offered[criteria]' value="<?php echo $courses_offered->criteria; ?>">
	  </div>
	  </div>
	  </div>
	  </div>
	</div>
		
	</div>
</div>
</li>
<div style="clear:both"></div>

<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Timings</span></label>

	<input type="time"  name="time" id="time" style="width:49%; float:left;" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_from; ?>">

	<input type="time" name="time_to" id="time_to" style="width:49%; float:right;" placeholder="Hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_to; ?>">
	<div style="clear:both"></div>	
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Address</span></label>
	<input type="text" name="address" id="address"  placeholder="Address" value="<?php echo $address; ?>">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>City</span></label>
	<input type="text" name="city" id="city"  placeholder="City" value="<?php echo $city; ?>">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Country</span></label>
	<select name="country" id="country" onchange="blankField('country','')">
	  <option value="">Select Country</option>
	<?php 
	  $cresults =$wpdb->get_Results("select * from twc_country");
	  foreach($cresults as $obj){
		  if($country==$obj->title){$selected ='selected="selected"';}
		  else{$selected ='';}
		echo '<option value="'.$obj->title.'" '.$selected.'>'.$obj->title.'</option>';  
	  }
	?>
	</select>
</li>


<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Area Covered</span></label>
	<input name="area_covered" id="area_covered"  placeholder="Service Area Covered" value="<?php echo $results->area_covered; ?>" type="text">
</li>

<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
	<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
</li>

<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Type</span></label>
 <div class="payment-options">
	 <label class="radio-inline">
		<span>Individual</span>  <input type="radio" name="types" id="type_0" value="Individual" <?php if ($results->types== 'Individual'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	 <label class="radio-inline">
		<span>Group</span>  <input type="radio" name="types" id="type_0" value="Group" <?php if ($results->types== 'Group'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	<label class="radio-inline">
		<span>Organization</span>  <input type="radio" name="types" id="type_0" value="Organization" <?php if ($results->types== 'Organization'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
</div>
</li>

<li>
<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Accommodation Provided</span></label>
 <div class="payment-options">
	<label class="radio-inline">
	  <span>Yes</span> <input type="radio" name="pet_dedicated" value="Yes" <?php if($results->pet_dedicated=='Yes') { echo 'checked="checked"';}?>>
	</label>
	<label class="radio-inline">
	  <span>No</span> <input type="radio" name="pet_dedicated" value="No" <?php if($results->pet_dedicated=='No') { echo 'checked="checked"';}?>>
	</label>
 </div>
</li>
<li>
<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Payments (Card Accepted)</span></label>
 <div class="payment-options">
	<label class="radio-inline">
	  <span>Yes</span> <input type="radio" name="card_accepted" id="payments1" value="Yes" <?php if($results->card_accepted=='Yes') { echo 'checked="checked"';}?>>
	</label>
	<label class="radio-inline">
	  <span>No</span> <input type="radio" name="card_accepted" id="payments2" value="No" <?php if($results->card_accepted=='No') { echo 'checked="checked"';}?>>
	</label>
 </div>
</li>
<li>
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Payment Terms</span></label>
 <div class="payment-options">
     <label class="radio-inline">
  <span>Monthly</span> <input name="payment_terms" id="payment_terms_0" value="Monthly" type="radio" <?php if($results->payment_terms=='Monthly') { echo 'checked="checked"';}?>>
  </label>

     <label class="radio-inline">
  <span>weekly</span> <input name="payment_terms" id="payment_terms_1" value="weekly" type="radio" <?php if($results->payment_terms=='weekly') { echo 'checked="checked"';}?>>
  </label>
  <label class="radio-inline">
  <span>Daily</span> <input name="payment_terms" id="payment_terms_2"  value="Daily" type="radio" <?php if($results->payment_terms=='Daily') { echo 'checked="checked"';}?>>
 </label>
 <label class="radio-inline">
  <span>Hourly</span> <input name="payment_terms" id="payment_terms_2"  value="Hourly" type="radio" <?php if($results->payment_terms=='Hourly ') { echo 'checked="checked"';}?>>
 </label>
</div>
</li>
<?php 
$certifiedArr =json_decode($results->certified,true);
if(isset($certifiedArr['Yes'])){
 $certified='Yes';
 $certified_data = $certifiedArr['Yes'];
}else{
 $certified='No';	
}
//print_R($certified_data);
?>
<li>
<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Are the course affiliated to any agency?</span></label>
 <div class="payment-options">
	<label class="radio-inline">
	  <span>Yes</span> <input type="radio" class="certified" name="certified" value="Yes" <?php if($certified=='Yes') { echo 'checked="checked"';}?>>
	</label>
	<label class="radio-inline">
	  <span>No</span> <input type="radio" class="certified" name="certified" value="No" <?php if($certified=='No') { echo 'checked="checked"';}?>>
	</label>
 </div>
  <div id="certifiedData">
	<label>
	  <span>Name of certification agency </span> <input type="text" name="certified_data" value="<?php echo $certified_data;?>">
	</label>
 </div>
</li>

<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Description</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>
<style>
#certifiedData{display:none;}
</style>
<script>
$('.certified').click(function(){
	if($(this).val()=='Yes'){
	  $('#certifiedData').show();	
	}else{
		$('#certifiedData').hide();	
	}

})

<?php if($certified=='Yes'){?>
 $('#certifiedData').show();
<?php } ?>
</script>
