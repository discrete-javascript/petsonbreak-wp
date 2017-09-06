<h5 class="recent_bookings">Manage Profile</h5>
	<div>
		 <form id="contactform" method="post">
		<ul class="modalLogin-loginFields">
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name</span></label>
				<input name="firstname" placeholder="First Name" id="firstname" value="<?php echo $all_meta_for_user['first_name'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('firstname','First Name')">
				<span id="err_firstname"></span>
			</li>

			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name</span></label>
				<input name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $all_meta_for_user['lastname'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('last_name','Last Name')">
				<span id="err_last_name"></span>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
				<input name="address" id="address"  placeholder="Address" value="<?php echo $all_meta_for_user['address'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('address','Address')" >
				<span id="err_address"></span>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
				<input name="city" id="city"  placeholder="City" value="<?php echo $all_meta_for_user['city'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('city','City')">
				<span id="err_city"></span>
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>State</span></label>
				<input name="state" id="state"  placeholder="State" value="<?php echo $all_meta_for_user['city'][0]; ?>" type="text" onkeyup="blankField('state','State')">
				<span id="err_state"></span>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country</span></label>
				<input name="country" id="country"  placeholder="Country" value="<?php echo $all_meta_for_user['country'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('country','Country')">
				<span id="err_country"></span>
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone</span></label>
				<input name="phone" id="phone"  placeholder="Mobile/Phone" value="<?php echo $all_meta_for_user['phone'][0]; ?>" title="Email address is required." type="text" onkeyup="blankField('phone','Mobile/Phone')">
				<span id="err_phone"></span>
			</li>

			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
	<input name="email" id="email" placeholder="Email" value="<?php echo $all_meta_for_user['email'][0]; ?>" title="Email address is required." type="email" readonly="readonly">
				<span id="err_email"></span>
			</li>
			

			
			 <li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category (Primary) </span></label>
			<?php  $Results = $wpdb->get_results("select * from twc_service_category"); ?>
			<?php foreach($Results as $Result){
				
				     if($all_meta_for_user['service_category'][0]==$Result->id){ ?>
                					
                         		<input name="skype_id" id="service_category"  placeholder="Service Category" value="<?php echo $Result->title; ?>"  readonly="readonly">		

	     <?php	}
			        }  ?>
				
				<span id="err_skype_id"></span>
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x"><span>Name of Establishment/Store</span></label>
	<input name="establishment" id="establishment" placeholder="Name of Establishment" value="<?php echo $all_meta_for_user['establishment'][0]; ?>" type="text">
				<span id="err_establishment"></span>
				
			</li>
			<li>
				<label class="nrd-loginModal-label u-vr2x"><span>Established Since </span></label>
				<select name="establishment_since" id="establishment_since" onchange="blankField('establishment_since','')">
				  <option value="">Select Year</option>
				  <?php for($i=1900;$i<=date('Y');$i++){
					     if($i==$all_meta_for_user['establishment_since'][0]){$selected='selected="selected"';}
						 else{$selected='';}
					  echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
				  }?>
				</select>
				<span class="errSpan" id="err_establishment_since"></span>
				
			</li>

           </ul>
			
<!--			<div class="facebook-div_all">
				<p>Your Links <span>Below are some suggestions. You can change the titles as you see fit.</span></p>
				
				
				<ul>
				
				<li>
					 <input name="skype_id" id="skype_id"  placeholder="Skype" value="Skype"  title="SkypeID is required." type="text">
				</li>
				
				<li>
					 <input name="skype_url" id="skype_url"  placeholder="URL:https://" value="<?php echo $all_meta_for_user['skype_url'][0]; ?>"  title="SkypeID is required." type="text">	
					</li>
			
				<li>
					 <input name="facebook" id="facebook"  placeholder="Facebook" value="Facebook"  title="Email address is required." type="email">
				</li> 
					<li>
					 <input name="facebook_url" id="facebook_url"  placeholder="URL:https://" value="<?php echo $all_meta_for_user['facebook_url'][0]; ?>"  title="Email address is required." type="email">	
					</li>
					
					<li>
					 <input name="twitter" id="twitter"  placeholder="Twitter" value="Twitter"  title="Email address is required." type="email">
					 </li>
					 
					<li>
					 <input name="twitter_url" id="twitter_url"  placeholder="URL:https://" value="<?php echo $all_meta_for_user['twitter_url'][0]; ?>"  title="Email address is required." type="email">	
					</li>
					<li>
					 <input name="youtube" id="youtube"  placeholder="Youtube" value="Youtube"  title="Email address is required." type="email">
					 </li>
					 
					<li>
					 <input name="youtube_url" id="youtube_url"  placeholder="URL:https://" value="<?php echo $all_meta_for_user['youtube_url'][0]; ?>"  title="Email address is required." type="email">	
					</li>
					
					</ul>
			</div>-->
			
			
			
		   <div class="register-btn">
				<input type="button" id="accountUpdate" value="Save Changes" class="btn_1 green medium">
			</div>
		 </form> 
		 
		 </div>