
<li>
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Veterinary Doctor</span></label>
 <input name="owner_name" id="owner_name"  placeholder="Store Owners Name" value="<?php echo $results->owner_name; ?>" type="text">
</li>

<li class="services-offered"><label class="nrd-loginModal-label u-vr2x " for="username"><span>Service Offered</span></label>
  
  <div class="services-offered-container">
  
  <div class="services-offered-div">
<?php 
$Ress_offered = $wpdb->get_results("select * from twc_manage_offered where service_cagegory='".$_REQUEST['sid']."'");  
 foreach($Ress_offered as $off_Obj){?>
	<div class="srv-off-chk">
	<input type='checkbox' name='offered[]' id="offered[]" value="<?php echo $off_Obj->id; ?>"><span class="srv-off-title"><?php echo $off_Obj->title; ?></span>
	</div>
	<?php }  ?>		
</div>
</div>
</li>

<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span> Name of Clinic/Hospital</span></label>
	<input name="shop_name" id="shop_name"  placeholder="Spa/Parlor/ Shop Name" value="<?php echo $results->owner_shop_name; ?>" type="text">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Years of Establishments</span></label>
	<input name="estabishment" id="estabishment"  placeholder="Years of Experience" value="<?php echo $results->estabishments_yr; ?>" type="text">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Timings</span></label>

	<input type="time"  name="time" id="time" style="width:49%; float:left;" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_from; ?>">

	<input type="time" name="time_to" id="time_to" style="width:49%; float:right;" placeholder="Hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" value="<?php echo $results->time_to; ?>">
	<div style="clear:both"></div>	
</li>

<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Contact Person</span></label>
	<input name="contact_person" id="contact_person"  placeholder="Contact Person" value="<?php echo $results->contact_person; ?>" type="text">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Contact Number</span></label>
	<input name="contact_number" id="contact_number"  placeholder="Contact Number" value="<?php echo $results->contact_number; ?>" type="text">
</li>	
<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email Id</span></label>
	<input name="email_ids" id="email_ids"  placeholder="Email Id" value="<?php echo $results->email_ids; ?>" type="email">
</li>
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
<li>
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Available on call</span></label>
<div class="payment-options avlbl-call">
	<label class="radio-inline">
	  <span>Yes</span> <input name="call" id="call_yes" type="radio" value="Yes" <?php if ($results->on_call == 'Yes'){$checked ='checked="checked"'; echo $checked; } else{$checked='Yes';  echo $checked; }  ?> >
	</label>
	<label class="radio-inline">
	  <span>No</span> <input name="call" id="call_no" value="No" <?php if ($results->on_call == 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='No';}  ?> type="radio">
	</label>
 </div>
</li>
<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Description</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Address</span></label>
	<input type="text" name="address" id="address"  placeholder="Address" value="<?php echo $results->address; ?>">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>City</span></label>
	<input type="text" name="city" id="city"  placeholder="City" value="<?php echo $results->city; ?>">
</li>
<li>
	<label class="nrd-loginModal-label u-vr2x"><span>Country</span></label>
	<select name="country" id="country" onchange="blankField('country','')">
	  <option value="">Select Country</option>
	<?php 
	  $results =$wpdb->get_Results("select * from twc_country");
	  foreach($results as $obj){
		echo '<option value="'.$obj->title.'">'.$obj->title.'</option>';  
	  }
	?>
	</select>
</li>
