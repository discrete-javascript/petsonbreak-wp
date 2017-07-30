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



<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Timings (Check in / Checkout time)</span></label>
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
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>24x7 helpline no</span></label>
	<input name="helpline_no" value="<?php echo $results->helpline_no; ?>" type="text">
</li>
<?php $extraData =json_decode($results->extra_data,true);
   // echo "<pre>";
	//print_R($extraData);
?>
<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Landmark</span></label>
	<input name="extraData[landmark]" placeholder="Location Name" value="<?php echo $extraData['landmark']; ?>" type="text">
</li>

<li class="services-offered">
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Distance from</span></label>
	<div class="major_areas">
	<span>Major cities (KM)</span><input name="extraData[distance_from][major_cities]"  value="<?php echo $extraData['distance_from']['major_cities']; ?>" type="text">
	</div>
	<div class="major_areas">
	<span>Nearby Airport (KM)</span><input name="extraData[distance_from][nearby_airport]"  value="<?php echo $extraData['distance_from']['nearby_airport']; ?>" type="text">
	</div>
	<div class="major_areas">
	<span>Nearby Bus stand (KM)</span><input name="extraData[distance_from][nearby_bus_stand]"  value="<?php echo $extraData['distance_from']['nearby_bus_stand']; ?>" type="text">
	</div>
	<div class="major_areas">
	<span>Nearby Railway Station (KM)</span><input name="extraData[distance_from][nearby_railway_station]"  value="<?php echo $extraData['distance_from']['nearby_railway_station']; ?>" type="text">
	</div>

</li>

<div style="clear:both"></div>

<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Dedicated pets menu</span></label>
 
 <div class="payment-options avlbl-call">
   <label class="radio-inline"><input type="radio" name="extraData[dedicated_pets_menu]" value="Yes" <?php if($extraData['dedicated_pets_menu']=='Yes'){ echo 'checked="checked"';} ?>><span>Yes</span></label>
   <label class="radio-inline"><input type="radio" name="extraData[dedicated_pets_menu]" value="No" <?php if($extraData['dedicated_pets_menu']=='No'){ echo 'checked="checked"';} ?>><span>No</span></label>
 </div>
</li>
<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Dedicated pets playing area</span></label>
 
 <div class="payment-options avlbl-call">
   <label class="radio-inline"><input type="radio" name="extraData[pets_playing_area]" value="Yes" <?php if($extraData['pets_playing_area']=='Yes'){ echo 'checked="checked"';} ?>><span>Yes</span></label>
   <label class="radio-inline"><input type="radio" name="extraData[pets_playing_area]" value="No" <?php if($extraData['pets_playing_area']=='No'){ echo 'checked="checked"';} ?>><span>No</span></label>
 </div>
</li>
<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Pet day break possible </span></label>

 <div class="payment-options avlbl-call">
   <label class="radio-inline"><input type="radio" name="extraData[pet_friendly_events_possible]" value="Yes" <?php if($extraData['pet_friendly_events_possible']=='Yes'){ echo 'checked="checked"';} ?>><span>Yes</span></label>
   <label class="radio-inline"><input type="radio" name="extraData[pet_friendly_events_possible]" value="No" <?php if($extraData['pet_friendly_events_possible']=='No'){ echo 'checked="checked"';} ?>><span>No</span></label>
 </div>
</li>

<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Remarks/additional Details</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>


