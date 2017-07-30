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
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Our Expertise</span></label>
<?php
$our_expertise =explode(",",$results->our_expertise);
?>
<div class="payment-options avlbl-call our-expert">
 <label class="radio-inline">
  <input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Dog Supplies" rel="dog_supplier" <?php if(in_array('Dog Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Dog Supplies</span>
</label>
<label class="radio-inline">
  <input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Cat Supplies" rel="cat_supplier" <?php if(in_array('Cat Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Cat Supplies</span>
</label>
<label class="radio-inline">
  <input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Aquatic Supplies" rel="fish_supplier" <?php if(in_array('Aquatic Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Aquatic Supplies</span> 
</label>

<label class="radio-inline">
	<input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Bird Supplies" rel="bird_supplier" <?php if(in_array('Bird Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Bird Supplies</span> 
</label>


<label class="radio-inline">
  <input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Small Pet Supplies" rel="small_supplier" <?php if(in_array('Small Pet Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Small Pet Supplies</span> 
</label>
<label class="radio-inline">
  <input type="checkbox" class="our_expertise_input" name="our_expertise[]" value="Equine Supplies"  rel="horse_supplier" <?php if(in_array('Equine Supplies',$our_expertise)){ echo 'checked="checked"';} ?>><span>Equine Supplies</span> 
</label>
</div>
</li>

<div style="clear:both"></div>

<li class="services-offered petShop_services-offered" >

  <div class="services-offered-container">
  <div class="services-offered-div">
<?php 
$dog_supplies_arr =array('Food','Biscuits and Treats','Grooming range','Health & Wellness','Bowls & Feeders','Collars & Leashes
','Toys','Flea & Ticks','Cleaning and Potty','Crate, Cages, Kennel & Beds','Clothing & Accessories','Training Products','Dog Magazines','Dog Merchandise/Gifts','Electronic Gadgets','Ethnic Collars & Leashes','Pup Sale/Purchase');

$cat_supplies_arr =array('Food and Treats','Litter','Grooming range','Bowls & Feeders','Collars & Harness','Toys','Flea & Ticks
','Crate & Beds','Clothing & Accessories','Cat Magazines','Cat Merchandise/Gifts','Electronic Gadgets','Designer Collars & Leashes','Kitten Sale/Purchase');

$fish_supplies_arr =array('Food Supplements','Filters & Cleaning','Corals and Decoration','CO2 System','Accessories','Air Pumps
','Water Treatment & Conditioning','Holiday Foods','Maintenance Products','Annual Maintenance Contracts (AMC) for Aquariums','Live Worms/feed','Tank Setup - Marine/Fresh water','Live Aquatic Plants - Marine/Fresh water','Sale/Purchase of Aquatic animals and fishes');

$bird_supplies_arr =array('Food Supplements','Cages','Toys','Feeding and Accessories','Sale/Purchase of Birds');

$small_pets_supplies_arr =array('Hideaways','Food & Supplements','Small animal cages/homes','Feeders and bowls','Toys','Litter and Bedding','Cleaning and healthcare','Sale/Purchase of Small pets');

$horses_supplies_arr =array('Horse Feed, Bedding & Fertilizers','Feed Supplements','Healthcare and wellness','Accessories and Equipments','Stable Equipments','Toys','Horse Treats & Licks','Grooming Equipments and accessories','Riders Equipments and accessories','Sale/Purchase of Horses');

$other_supplies_arr =array('Reptiles and Amphibians Food Supplements','Toys','Litter and Bedding','Hideaways/cages/homes','Sale/Purchase of Reptiles and Amphibians');



$extra_data =json_decode($results->extra_data);
//echo "<pre>";
//print_R($extra_data);

?>

<div class="Expertise_Data" id="dog_supplier" >
  <div class="Expertise_Data_Scroll">
   <div class="supplies_title">Dog Supplies</div>
   <?php foreach($dog_supplies_arr as $val){
	      if(in_array($val,$extra_data->dog)){$dselected ='checked="checked"';}
		  else{$dselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[dog][]" value="'.$val.'" '.$dselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
   </div>
</div>


<div class="Expertise_Data" id="cat_supplier">
	<div class="Expertise_Data_Scroll">
   <div class="supplies_title">Cat Supplies</div>
   <?php foreach($cat_supplies_arr as $val){
	     if(in_array($val,$extra_data->cat)){$cselected ='checked="checked"';}
		  else{$cselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[cat][]" value="'.$val.'" '.$cselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
	</div>
</div>


<div class="Expertise_Data" id="fish_supplier">
	<div class="Expertise_Data_Scroll">
	<div class="supplies_title">Fish Supplies</div>
   <?php foreach($fish_supplies_arr as $val){
	    if(in_array($val,$extra_data->fish)){$fselected ='checked="checked"';}
		  else{$fselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[fish][]" value="'.$val.'" '.$fselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
	</div>
</div>


<div class="Expertise_Data" id="bird_supplier">
	<div class="Expertise_Data_Scroll">
	<div class="supplies_title">Bird Supplies</div>
   <?php foreach($bird_supplies_arr as $val){
	     if(in_array($val,$extra_data->bird)){$bselected ='checked="checked"';}
		  else{$bselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[bird][]" value="'.$val.'" '.$bselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
	</div>
</div>



<div class="Expertise_Data" id="small_supplier">
	<div class="Expertise_Data_Scroll">
	<div class="supplies_title">Small Pet Supplies</div>
    <?php foreach($small_supplies_arr as $val){
		  if(in_array($val,$extra_data->small)){$sselected ='checked="checked"';}
		  else{$sselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[small][]" value="'.$val.'" '.$sselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
	</div>
</div>


<div class="Expertise_Data" id="horse_supplier">
	<div class="Expertise_Data_Scroll">
	<div class="supplies_title">Horse Supplies</div>
    <?php foreach($horses_supplies_arr as $val){
		if(in_array($val,$extra_data->horse)){$hselected ='checked="checked"';}
		  else{$hselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[horse][]" value="'.$val.'" '.$hselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
	</div>
</div>


<div class="Expertise_Data" id="other_supplier">
	<div class="Expertise_Data_Scroll">
	<div class="supplies_title">Other Pet Supplies</div>
    <?php foreach($other_supplies_arr as $val){
		if($extra_data->other==$val){$oselected ='selected="selected"';}
		  else{$oselected='';}
	    echo '<div class="srv-off-chk"><label><input type="checkbox" name="extraData[other][]" value="'.$val.'" '.$oselected.'><span class="srv-off-title">'.$val.'</span></label></div>'; 
      }?>
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
	<label class="nrd-loginModal-label u-vr2x" for="username"><span>Off the shelves Items </span></label>
	<input name="shelves_items" id="shelves_items"  placeholder="Off the shelves Items " value="<?php echo $results->shelves_items; ?>" type="email">
</li>

<li>
<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Payments (Card Accepted)</span></label>
 <div class="payment-options">
	<label class="radio-inline">
	  <span>Yes</span> <input type="radio" name="payments" id="payments1" value="Yes" <?php if($results->payments=='Yes') { echo 'checked="checked"';}?>>
	</label>
	<label class="radio-inline">
	  <span>No</span> <input type="radio" name="payments" id="payments2" value="No" <?php if($results->payments=='No') { echo 'checked="checked"';}?>>
	</label>
 </div>
</li>

<li>
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Home Delivery</span></label>
<div class="payment-options">
	<label class="radio-inline">
		<span>Free</span>  <input type="radio" name="delivery" id="delivery_0" value="Free" <?php if ($results->delivery== 'Free'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	<label class="radio-inline">
		<span>Paid</span>  <input type="radio" name="delivery" id="delivery_1" value="Paid" <?php if ($results->delivery== 'Paid'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
	<label class="radio-inline">
		<span>No</span>  <input type="radio" name="delivery" id="delivery_2" value="No" <?php if ($results->delivery== 'No'){$checked ='checked="checked"'; echo $checked; } else{$checked='';}  ?>> 
	</label>
</div>
</li>

<li>
<label class="nrd-loginModal-label u-vr2x" for="username"><span>Available on call</span></label>
<div class="payment-options">
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
<textarea rows="7" cols="60" id="description" name="description" placeholder="Remarks/additional Details"><?php echo $results->description; ?></textarea>
<span id="err_description"></span>
</li>

<script>
	

	
     $('.our_expertise_input').click(function() { 
     if ($(this).is(':checked')) {
        var exrSup = $(this).attr('rel');
		$('#'+exrSup).show();	
     } 
	
	 else{
		var exrSup = $(this).attr('rel');
		$('#'+exrSup).hide();
		}
	
	  
	   
	
	
});


<?php if(in_array('Dog Supplies',$our_expertise)){?>
	   $('#dog_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Cat Supplies',$our_expertise)){?>
	   $('#cat_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Aquatic Supplies',$our_expertise)){?>
	   $('#fish_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Bird Supplies',$our_expertise)){?>
	   $('#bird_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Bird Supplies',$our_expertise)){?>
	   $('#bird_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Small Pet Supplies',$our_expertise)){?>
	   $('#small_supplier').css('display','block');
<?php } ?>
<?php if(in_array('Equine Supplies',$our_expertise)){?>
	   $('#horse_supplier').css('display','block');
<?php } ?>
	
</script>