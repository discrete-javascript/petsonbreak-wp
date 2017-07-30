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
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>We are </span></label>
 <div class="payment-options">
 <label class="radio-inline">
	<span>Bulk Buyer</span>  <input type="radio" name="types" id="type_0" value="Bulk Buyer" <?php if ($results->types== 'Bulk Buyer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
</label>


 <label class="radio-inline">
	<span>Bulk Seller</span>  <input type="radio" name="types" id="type_0" value="Bulk Seller" <?php if ($results->types== 'Bulk Seller'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
</label>

<label class="radio-inline">
	<span>Manufacturer</span>  <input type="radio" name="types" id="type_0" value="Manufacturer" <?php if ($results->types== 'Manufacturer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
</label>
<label class="radio-inline">
	<span>Importer</span>  <input type="radio" name="types" id="type_0" value="Importer" <?php if ($results->types== 'Importer'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
</label>
 </div>
</li>


<li>
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Awards & Achievements</span></label>
	<input name="awards" id="awards"  placeholder="Awards & Achievements" value="<?php echo $results->awards; ?>" type="text">
</li>
<li class="services-offered">
 <label class="nrd-loginModal-label u-vr2x" for="username"><span>Manufacturer/supplier </span></label>
 <div class="payment-options avlbl-call">
 <?php
$we_offer =explode(",",$results->we_offer);
?>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Dog accessories" <?php if(in_array('Dog accessories',$we_offer)){ echo 'checked="checked"';} ?>><span>Dog accessories</span></label>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Cat accessories" <?php if(in_array('Cat accessories',$we_offer)){ echo 'checked="checked"';} ?>><span>Cat accessories</span></label>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Aquatic Supplies" <?php if(in_array('Aquatic Supplies',$we_offer)){ echo 'checked="checked"';} ?>><span>Aquatic Supplies</span></label>
   <label class="radio-inline"><input type="checkbox" name="we_offer[]" value="Equine  Accessories" <?php if(in_array('Equine  Accessories',$we_offer)){ echo 'checked="checked"';} ?>><span>Equine  Accessories</span></label>
 </div>
</li>

<div style="clear:both"></div>



<li style="width: 100%;float: left;" class="Description-inputoo">
<label class="nrd-loginModal-label u-vr2x " for="username"><span>Remarks/additional Details</span></label>
<textarea rows="7" cols="60" id="description" name="description" placeholder="Description"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>

<div style="clear:both"></div>
