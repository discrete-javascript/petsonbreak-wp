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
<li class="services-offered"><label class="nrd-loginModal-label u-vr2x " for="username"><span>Service Offered</span></label>
  
  <div class="services-offered-container">
  
  <div class="services-offered-div">
<?php 
$service_offered =explode(',',$results->service_offered);
$Ress_offered = $wpdb->get_results("select * from twc_manage_offered where service_cagegory='".$_REQUEST['sid']."'");  
 foreach($Ress_offered as $off_Obj){
	  if(in_array($off_Obj->id,$service_offered)){$sChecked='checked="checked"';}
	  else{$sChecked='';}
	 ?>
	<div class="srv-off-chk">
	<input type='checkbox' name='service_offered[]' id="service_offered[]" value="<?php echo $off_Obj->id; ?>" <?php echo $sChecked;?>><span class="srv-off-title"><?php echo $off_Obj->title; ?></span>
	</div>
	<?php }  ?>		
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
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
	<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
</li>


<li class="">
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Our Expertise</span></label>
<?php
$our_expertise =explode(",",$results->our_expertise);
?>
<div class="payment-options avlbl-call">
 <label class="radio-inline">
  <input type="checkbox" name="our_expertise[]" value="Dog Grooming" <?php if(in_array('Dog Grooming',$our_expertise)){ echo 'checked="checked"';} ?>><span>Dog Grooming</span>
</label>
<label class="radio-inline">
  <input type="checkbox" name="our_expertise[]" value="Cat Grooming" <?php if(in_array('Cat Grooming',$our_expertise)){ echo 'checked="checked"';} ?>><span>Cat Grooming</span>
</label>
<label class="radio-inline">
  <input type="checkbox" name="our_expertise[]" value="Puppy Grooming" <?php if(in_array('Puppy Grooming',$our_expertise)){ echo 'checked="checked"';} ?>><span>Puppy Grooming</span> 
</label>
</li>
<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>We Offer</span></label>
 <div class="payment-options avlbl-call">
 <?php
$we_offer =explode(",",$results->we_offer);
?>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Dog Grooming" <?php if(in_array('Dog Grooming',$we_offer)){ echo 'checked="checked"';} ?>><span>Dog Grooming</span></label>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Cat Grooming" <?php if(in_array('Cat Grooming',$we_offer)){ echo 'checked="checked"';} ?>><span>Cat Grooming</span></label>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Puppy Grooming" <?php if(in_array('Puppy Grooming',$we_offer)){ echo 'checked="checked"';} ?>><span>Puppy Grooming</span></label>
 </div>
</li>
 <li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Time Slots Availability</span></label>
	<div class="payment-options ">
		<label class="radio-inline">
			<span>By Appointment Only</span>  <input type="radio" name="time_slot" id="time_slot_0" value="By Appointment Only" <?php if ($results->time_slot== 'By Appointment Only'){ echo $checked ='checked="checked"';} ?>> 
		</label>
		
		<label class="radio-inline">
			<span>We prefer Walk-in</span>  <input type="radio" name="time_slot" id="time_slot_1" value="We prefer Walk-in" <?php if ($results->time_slot == 'We prefer Walk-in'){ echo $checked ='checked="checked"'; }  ?>> 
		</label>
		
		<label class="radio-inline">
			<span>Both</span> <input type="radio" name="time_slot" id="time_slot_2" value="Both" <?php if ($results->time_slot == 'Both'){ echo $checked ='checked="checked"';}  ?>> 
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
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Available on call</span></label>
<div class="payment-options ">
	<label class="radio-inline">
	  <span>Yes</span> <input name="on_call" type="radio" value="Yes" <?php if($results->on_call=='Yes') { echo 'checked="checked"';}?> >
	</label>
	<label class="radio-inline">
	  <span>No</span> <input name="on_call"  value="No" <?php if ($results->on_call == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='No';}  ?> type="radio">
	</label>
 </div>
</li>
<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Remarks/additional Details</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>
<div style="clear:both"></div>
