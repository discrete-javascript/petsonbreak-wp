<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Taxi Drivers Name </span></label>
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
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Taxi Type </span></label>
<div class="payment-options">
	<label class="radio-inline">
		<span>Car</span>  <input type="radio" name="taxi_type"  value="Car" <?php if ($results->taxi_type== 'Car'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	<label class="radio-inline">
		<span>Auto</span>  <input type="radio" name="taxi_type" value="Auto" <?php if ($results->taxi_type== 'Auto'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	<label class="radio-inline">
		<span>SUV</span>  <input type="radio" name="taxi_type" value="SUV" <?php if ($results->taxi_type== 'SUV'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
</div>
</li>

<li>
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Dedicated to Pets </span></label>
<div class="payment-options ">
	<label class="radio-inline">
	  <span>YES/You can Accompany</span> <input name="pet_dedicated" type="radio" value="Yes" <?php if($results->pet_dedicated=='Yes') { echo 'checked="checked"';}?> >
	</label>
	<label class="radio-inline">
	  <span>No</span> <input name="pet_dedicated" type="radio" value="No" <?php if($results->pet_dedicated=='No') { echo 'checked="checked"';}?> >
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


<li class="services-offered">
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Rates/Fair (For cars/Auto/Suv)</span></label>
<div class="payment-options ">
	<label class="radio-inline">
	  <span>Per kms</span> <input name="rate_fair" type="radio" value="Per kms" <?php if($results->rate_fair=='Per kms') { echo 'checked="checked"';}?> >
	</label>
	<label class="radio-inline">
	  <span>Per Day</span> <input name="rate_fair" type="radio" value="Per Day" <?php if($results->rate_fair=='Per Day') { echo 'checked="checked"';}?> >
	</label>
	<label class="radio-inline">
	  <span>Beyond City Limits</span> <input name="rate_fair" type="radio" value="Beyond City Limits" <?php if($results->rate_fair=='Beyond City Limits') { echo 'checked="checked"';}?> >
	</label>
	<label class="radio-inline">
	  <span>As set by Municipal Corporation</span> <input name="rate_fair" type="radio" value="As set by Municipal Corporation" <?php if($results->rate_fair=='As set by Municipal Corporation') { echo 'checked="checked"';}?> >
	</label>
 </div>
</li>


<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Tell us more about your establishment/company</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>

