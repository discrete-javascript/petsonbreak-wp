<?php 
	/**
		Template Name:Register Page
		* The template for displaying all pages.
		*
		* This is the template that displays all pages by default.
		* Please note that this is the WordPress construct of pages
		* and that other 'pages' on your WordPress site will use a
		* different template.
		*
		* @package WordPress
		* @subpackage Twenty_Twelve
		* @since Twenty Twelve 1.0
	*/
	get_header();
	global $mk_options;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.form-control:focus{
	 border-color:#636 !important;
	}
	.err_req {color: #473636;}
.petDetailsSmall{display:none;}	
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="register-background">
    <div class="parallax-heading"><p><span class="register-wording">REGISTER HERE</span> <span>TO ENJOY OUR SERVICES</span></p></div>
</div>
<div class="registration-container container w3-container w3-content" id="regist">
	<div class="registration-content con_left w3-panel w3-white w3-card-2 w3-display-container" id="register_con_left">
		<div id="msgDiv"></div>
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#menu1">Member</a></li>
			<li><a data-toggle="tab" href="#home">Vendor</a></li>
			
		</ul>
		
		<div class="registration-tab-content tab-content">

			<div id="menu1" class="tab-pane fade in active">
				<form id="member_register" name="member_register" method="post">
                                    <p class="mandatoryText">ALL <span style="color: red">*</span> MARKED FIELDS ARE MANDATORY</p>
    
				 <input type="hidden" name="no_of_pets" id="no_of_pets"  value="0" />
					<ul class="modalLogin-loginFields">
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name<span class="err_req">* </span></span></label>
							<input type="text" name="member_firstname" id="member_firstname" class="form-control" placeholder="Enter Your First Name" onkeyup="blankField('member_firstname','Enter Your First Name')">
							<span class="errSpan" id="err_member_firstname"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name<span class="err_req">* </span></span></label>
							<input name="member_last_name" id="member_last_name" class="form-control"  placeholder="Enter Your Last Name"  type="text" onkeyup="blankField('member_last_name','Enter Your Last Name')">
							<span class="errSpan" id="err_member_last_name"></span>
						</li>
						
						
			
						<li>
						<label class="nrd-loginModal-label u-vr2x" for="gender"><span>Gender<span class="err_req">* </span></span></label>                          
                                                <div class="gender-container">
                                                    <span class="register-page">
                                                        <input type="radio" name="gender" id="Male" value="Male" checked>
                                                        <label class="radio-inline" class="form-control">Male</label>
                                                    </span>
                                                    <span class="register-page">
                                                        <input type="radio" name="gender" id="Female" value="Female">
                                                        <label class="radio-inline">Female</label>
                                                    </span>
                                                    <span class="register-page">
                                                        <input type="radio" name="gender" id="NotSpecified" value="Female" >
                                                        <label class="radio-inline">Third Gender</label>
                                                    </span>
                                                </div>
                                                    
<!--							<select  id="gender" name="gender" class="form-control" placeholder="Gender" onchange="blankField('gender','')">
								<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Male">Male</option>
									<option value="NotSpecified">Third Gender</option>
							</select>-->
							<span class="errSpan" id="err_gender"></span>
						</li>
                                                <li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Date Of Birth<span class="err_req">* </span></span></label>
                                                        <span class="dateWrapper"><input name="member_dob" id="member_dob" class="form-control datepicker"  placeholder="Enter Your DOB"  type="text" onkeyup="blankField('member_dob','Enter Your DOB')"></span>
                                                        <span>FOR VERIFICATION MEMBERS MUST BE 18+</span>
							<span class="errSpan" id="err_member_dob"></span>
						</li>
						<li class="address_li">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address<span class="err_req">* </span></span></label>
							<input type="text" name="member_address" id="member_address" class="form-control"  placeholder="Enter Your Address" onkeyup="blankField('member_address','Enter Your Address')" >
							<span class="errSpan" id="err_member_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City<span class="err_req">* </span></span></label>
							<input type="text" name="member_city" id="member_city" class="form-control"  placeholder="Enter Your City" onkeyup="blankField('member_city','Enter Your City')">
							<span class="errSpan" id="err_member_city"></span>
						</li>
						
						<li>
								<label class="nrd-loginModal-label u-vr2x" for="username"><span>State/County</span></label>
							<input type="text" name="member_state" id="member_state" placeholder="Enter Your State" onkeyup="blankField('member_state','Enter Your State')" >
							<span class="errSpan"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country<span class="err_req">* </span></span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="member_country" name="member_country" class="form-control"  placeholder="Citizenship" onchange="blankField('member_country','')">
								<option value="">Select Country</option>
								<?php foreach($sresults as $sresult){ ?>
									<option value="<?php echo $sresult->title; ?>"><?php echo $sresult->title; ?></option>
								<?php } ?>
							</select>
							<span class="errSpan" id="err_member_country"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Citizenship<span class="err_req">* </span></span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="member_citizenship" name="member_citizenship"  placeholder="Citizenship" onchange="blankField('member_citizenship','')">
								<option value="">Select Citizenship</option>
								<?php foreach($sresults as $sresult){ ?>
									<option value="<?php echo $sresult->title ?>"><?php echo $sresult->title; ?></option>
								<?php } ?>
							</select>
							<span class="errSpan" id="err_member_citizenship"></span>
						</li>
						
				
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone<span class="err_req">* </span></span></label>
							<input name="member_phone" id="member_phone" class="form-control" placeholder="Enter Your Mobile/Phone" type="text" onkeyup="blankField('member_phone','Enter Your Mobile/Phone')">
							<span id="err_member_phone" class="errSpan"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email<span class="err_req">* </span></span></label>
							<input name="member_email" id="member_email" class="form-control" placeholder="Enter Your Email Address" type="email" onkeyup="blankField('member_email','Enter YOur Email Address')">
							<span id="err_member_email" class="errSpan"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password<span class="err_req">* </span></span></label>
							<input type="password" name="member_password" id="member_password" class="form-control" placeholder="Your Password" id="firstname" onkeyup="blankField('member_password','Your Password')">
							<span id="err_member_password" class="errSpan"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Re-type Password<span class="err_req">* </span></span></label>
							<input type="password" name="member_password1" id="member_password1" class="form-control"  placeholder="Please Re-type Password" id="firstname" onkeyup="blankField('member_password1','Please Re-type Password')">
							<span id="err_member_password1" class="errSpan"></span>
						</li>
						<li class="doYou">
						<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Do you Own Pets</span></label>
							
							<div class="register-page payment-options">
                                                            <span class="register-page">
                                                                <input type="radio" name="own_pets" id="own_pets1" value="Yes">
                                                                <label class="radio-inline" class="form-control">Yes</label>
                                                            </span>
                                                            <span class="register-page">
                                                                <input type="radio" name="own_pets" id="own_pets2" value="No" checked>
                                                                <label class="radio-inline">No</label>
                                                            </span>
<!--								<label class="radio-inline" class="form-control">
									<span>Yes</span> <input type="radio" name="own_pets" id="own_pets1" value="Yes">
								</label>
								<label class="radio-inline">
									<span>No</span> <input type="radio" name="own_pets" id="own_pets2" value="No" checked>
								</label>-->
							</div>
							<span class="errSpan"></span>
						</li>	
						<li class="pets_option">
							
						<!--	<div class="payment-options">
								<label class="radio-inline">
									<span>Dogs</span> <input type="radio" name="Pets" id="Pets1" value="Dogs" checked>
								</label>
								<label class="radio-inline">
									<span>Cats</span> <input type="radio" name="Pets" id="Pets2" value="Cats" >
								</label>
								
								<label class="radio-inline">
									<span>Horse</span> <input type="radio" name="Pets" id="Pets3" value="Horse" >
								</label>
								
								<label class="radio-inline">
									<span>Birds</span> <input type="radio" name="Pets" id="Pets4" value="Birds" >
								</label>
								<label class="radio-inline">
									<span>Small Mammals</span> <input type="radio" name="Pets" id="Pets5" value="Mammals" >
								</label>
								
								<label class="radio-inline">
									<span>Fish</span> <input type="radio" name="Pets" id="Pets6" value="Fish" >
								</label>
								<label class="radio-inline">
									<span>Others</span> <input type="radio" name="Pets" id="Pets7" value="Others" >
								</label>
								
							</div>
			
							
			    <div class="spayed_div">
			    <div class="spayed_div_left">
				<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Neutered /Spayed </span></label>
					<div class="payment-options"><label class="radio-inline"><span>Yes</span>  
					<input type="radio" name="spayed" id="spayed_pets1" value="Yes" checked ></label>
					<label class="radio-inline"><span>No</span>
					<input type="radio" name="spayed" id="spayed_pets2" value="No"></label></div>
					</div>
					<div class="spayed_div_right">
					<label class="nrd-loginModal-label u-vr2x" for="Accepted">
					<span>Pedigreed</span>
					</label>
					<div class="payment-options"><label class="radio-inline"><span>Yes</span> 
					<input type="radio" name="pedigreed" id="pedigreed_pets1" value="Yes" checked></label>
					<label class="radio-inline"><span>No</span>
					 <input type="radio" name="pedigreed" id="pedigreed_pets2" value="No"></label>
				   </div>
				   </div>
				 </div>-->



				 			
							<div class="shown_petList" style="display:none">
							   <ul class="shown_petLista_head">
								  <li>
								    <div>Pet Type</div>
								
								  </li>
							   </ul>
							   <ul class="shown_petLista_list">
							      <li>
								    <div class="shown_pets_div">
										<select name="pets" id="pets">
										    <option value="" selected disabled>Pet Type</option>
											<option value="Dogs">Dogs</option>
											<option value="Cats">Cats</option>
											<option value="Horse">Horse</option>
											<option value="Birds">Birds</option>
											<option value="Mammals">Small Mammals</option>
											<option value="Fish">Fish</option>
											<option value="Others">Others</option>
										</select>
									  </div>
								  </li>
							   </ul>
							   </div>
								<div id="petLista" class="hidden_petList">
							   <h4 class="wowPet">"We would like to know more about your Pet"</h4>
						
							   <div class="">
						
							   <ul class="petLista_list">
							    <li>
								    <div class="shown_pets_div shown_pets_div2" id="petType_0" style="width:12%" >
										<select name="petData[pets][]" class="changePetType" rel="0">
										   <option value="" selected disabled>Pet Type</option>
											<option value="Dogs">Dogs</option>
											<option value="Cats">Cats</option>
											<option value="Horse">Horse</option>
											<option value="Birds">Birds</option>
											<option value="Mammals">Small Mammals</option>
											<option value="Fish">Fish</option>
											<option value="Others">Others</option>
										</select>
									 </div>
							        <div id="petDetails_0" style="width:85%" class="petDetails2">
									  <div><input name="petData[pet_name][]" value="" placeholder="Name"></div>
									  <div>
										 <select name="petData[pet_age][]" value="" placeholder="Age">
										    <option value="" selected disabled>Age</option>
											
											
											<?php for($i=1;$i<=100;$i++){ ?>
												<option value="<?php echo $i ;?>"><?php echo $i; ?></option>
											<?php } ?>
											
										</select>  
										  
									  </div>
									
									  <div>
										<select name="petData[pet_gender][]">
										    <option value="" selected disabled>Gender</option>
											<option value="male">Male</option>
											<option value="Female">Female</option>
										</select>
									  </div>
									  <div>
										<select id="breedSelect" name="petData[pet_breed][]" id="breedSelect_0">
										    <option value="" selected disabled>Breed</option>
									
										</select>
									  </div>
									   <div>
										<select name="petData[pedigreed][]" >
										    <option value="" selected disabled>Pedigreed</option>
											<option value="male">Yes</option>
											<option value="Female">No</option>
										</select>
									  </div>
									 <div>
										 <select name="petData[spayed][]">
										     <option value="" selected disabled>Sprayed/Neutered</option>
											  <option value="male">Yes</option>
											  <option value="Female">No</option>
										</select>
									  </div>
									 </div>  
									 <div id="petDetailsSmall_0" class="petDetailsSmall" style="width:85%"><div><input name="petData[pet_small_detail][]" value=""></div></div>
								   </li>
							   </ul>
							   </div>
							   <div id="addMorePets" style="width:120px;"><span>Add More</span></div>
							</div>
							<div class="petListadetail"></div>

							
						</li>
						
						<li class="member_prof">
						 <!--  <div class="top">
						     <label class="nrd-loginModal-label u-vr2x" for="username"><span>Upload Profile Picture</span></label>
							<div class="member_profile_btn">
							<label for="member_profile_pic">Upload</label>
							<input name="member_profile_pic" id="member_profile_pic" type="file">
							</div>
							<span id="err_member_profile_pic"></span>
							</div>-->
							
							<div class="bot">
							   <label class="nrd-loginModal-label u-vr2x" for="username"><span>Please indicate the services you are intrested in</span></label>
							   <textarea cols="5" name="intrested_area" id="intrested_area"></textarea>
					
							<span id="err_member_profile_pic"></span>
							</div>
					    </li>
						
						
						<li class="additional_info">
						  <label class="nrd-loginModal-label u-vr2x" for="username"><span>Additional information or Questions / Comments</span></label>
							<textarea cols="5" name="additional_info" id="additional_info"></textarea>
							<span id="err_additional_info"></span>
					    </li>
						
					</ul>
					<div class="petsInfo"></div>
			
					<div class="register-page-checkbox-container agreeTerms">
						<input id="person_terms_of_service" name="person_terms_of_service" class="form-control register-page-checkbox" type="checkbox" value="1">	
						<label class="nrd-loginModal-label u-vr2x register-page-checkbox-label">I agree to the <a href="" title="terms and conditions">terms and conditions</a></label>
						<span class="errSpan" id="err_person_terms_of_service"></span>
						
					</div>
					<div class="register-btn">
						<input type="button" id="MemberRegisBtn" value="Register now" class="btn_1 green medium">
					</div>
				</form> 
			</div>
			
			
			<div id="home" class="tab-pane fade">
				<form id="contactform" method="post" action="" method="POST" enctype="multipart/form-data">
					<ul class="modalLogin-loginFields">
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name<span class="err_req">* </span></span></label>
							<input name="firstname" placeholder="First Name" id="firstname" class="form-control" title="" type="text" onkeyup="blankField('firstname','First Name')">
							<span class="errSpan" id="err_firstname"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name<span class="err_req">* </span></span></label>
							<input name="last_name" id="last_name" class="form-control" placeholder="Last Name" title="" type="text" onkeyup="blankField('last_name','Last Name')">
							<span class="errSpan" id="err_last_name"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address<span class="err_req">* </span></span></label>
							<input name="address" id="address" class="form-control" placeholder="Address" title="" type="text" onkeyup="blankField('address','Address')" >
							<span class="errSpan" id="err_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City<span class="err_req">* </span></span></label>
							<input name="city" id="city" class="form-control"  placeholder="City" title="" type="text" onkeyup="blankField('city','City')">
							<span class="errSpan" id="err_city"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>State/County</span></label>
							<input name="state" id="state" class="form-control" placeholder="State" title="" type="text">
							<span class="errSpan" id="err_state"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country<span class="err_req">* </span></span></label>
							 <select name="country" id="country" class="form-control" onchange="blankField('country','')">
							  <option value="">Select Country</option>
							<?php 
							  $results =$wpdb->get_Results("select * from twc_country");
							  foreach($results as $obj){
								echo '<option value="'.$obj->title.'">'.$obj->title.'</option>';  
							  }
							?>
							</select>
							<span class="errSpan" id="err_country"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone<span class="err_req">* </span></span></label>
							<input name="phone" id="phone" class="form-control" placeholder="Mobile/Phone" title="" type="text" onkeyup="blankField('phone','Mobile/Phone')">
							<span class="errSpan" id="err_phone"></span>
						</li>
						
						 <li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category (Primary)<span class="err_req">* </span> </span></label>
							<?php  $Results = $wpdb->get_results("select * from twc_service_category"); ?>
							<select id="service" name="service" class="error" onchange="blankField('service','')">
							 <option value="">Select Service Category</option>
							<?php foreach($Results as $Result) {
					
							 if($results->service_category==$Result->id){
									$cselected ='selected="selected"';
								}
								else{
									$cselected='';
								}
								
								?>
								<option value="<?php echo $Result->id; ?>" <?php echo $cselected; ?>><?php echo $Result->title; ?></option>
								
							  <?php  }?>		
							</select>
							<span class="errSpan" id="err_service"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment/Store<span class="err_req">* </span></span></label>
							<input name="establishment" id="establishment" class="form-control" placeholder="Name of Establishment" type="text" onkeyup="blankField('establishment','Name of Establishment')">
							<span class="errSpan" id="err_establishment"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Established Since<span class="err_req">* </span> </span></label>
							<select name="establishment_since" id="establishment_since" class="form-control" onchange="blankField('establishment_since','')">
							  <option value="">Select Year</option>
							  <?php for($y=1900;$y<=date('Y');$y++){
								     echo '<option value="'.$y.'">'.$y.'</option>';
							        }?>
							</select>
							<span class="errSpan" id="err_establishment_since"></span>
							
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email<span class="err_req">* </span></span></label>
							<input name="email" id="email" class="form-control" placeholder="Email" title="" type="email" onkeyup="blankField('email','Email')">
							<span class="errSpan" id="err_email"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password<span class="err_req">* </span></span></label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" onkeyup="blankField('password','Password')">
							<span class="errSpan" id="err_password"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Re-type Password<span class="err_req">* </span></span></label>
							<input type="password" name="password1" id="password1" class="form-control" placeholder="Re-type Password"  onkeyup="blankField('password1','Re-type Password')">
							<span class="errSpan" id="err_password1"></span>
						</li>
						
						
						<li class="agreeTerms">
							<input style="float: left;width: 3%;height: 15px;margin-bottom: 0px;" id="v_tc" name="v_tc" type="checkbox" value="1">	
							<label class="nrd-loginModal-label u-vr2x">I agree to the <a href="" title="terms and conditions">Terms and Conditions</a></label>
							<span class="errSpan" id="err_v_tc"></span>
							
						</li>
						
					</ul>
					
					
					<div class="register-btn">
						<input type="button" id="RegisBtn" value="Register now" class="btn_1 green medium">
					</div>
				</form> 
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="height_class1457" style="">
	
	
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    
	$('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
  } );
  </script>


<script>
	
	$('#RegisBtn').click(function(){
		var flag=0;
		var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
		var IndNum =/^(\+91-|\+91|0)?\d{10}$/;	
		if($('#firstname').val()==""){
			$('#err_firstname').html('Please enter your First Name');
			$('#firstname').focus();
			return false;
		}
		else if($('#last_name').val()==""){
			$('#err_last_name').html('Please enter your Last Name');
			$('#last_name').focus();
			return false;
		}
		else if($('#address').val()==""){
			$('#err_address').html('Please enter your Address');
			$('#address').focus();
			return false;
		}
		else if($('#city').val()==""){
			$('#err_city').html('Please enter your City');
			$('#city').focus();
			return false;
		}
		else if($('#country').val()==""){
			$('#err_country').html('Please enter your Country');
			$('#country').focus();
			return false;
		}
		else if($('#phone').val()==""){
			$('#err_phone').html('Please enter your Contact Number');
			$('#phone').focus();
			return false; 
		}
		else if(!IndNum.test($("#phone").val())) {
            $('#err_phone').html('Invalid Mobile Number.');
            $('#phone').focus();
            return false;
     }
		else if($('#service').val()==""){
			$('#err_service').html('Please select service category');
			$('#service').focus();
			return false; 
		}
		else if($('#establishment').val()==""){
			$('#err_establishment').html('Please enter establishment name');
			$('#establishment').focus();
			return false; 
		}
		else if($('#establishment_since').val()==""){
			$('#err_establishment_since').html('Please select establishment year');
			$('#establishment_since').focus();
			return false; 
		}
		else if($('#email').val()==""){
			$('#err_email').html('Please enter your Email');
			$('#email').focus();
			return false;    
		}
		else if (!re.test($("#email").val())){
			$('#err_email').html('Invalid Email ID');
			$('#email').focus();
			return false;     
		}
		else if ($("#password").val()==""){
			$('#err_password').html('Please enter your Password');
			$('#password').focus();
			return false;   
		}
		else if ($("#password1").val()==""){
			$('#err_password1').html('Re Enter your Password');
			$('#password').focus();
			return false;    
		}
		else if ($("#password").val() != $("#password1").val()){
			$('#err_password1').html('Password Mismached');
			$('#password').focus();
			return false;
		}
		else if(!$("#v_tc").is(":checked")) {
			$('#err_v_tc').html('Please select Term and Condition');
			$('#v_tc').focus();
			return false;
		}
		else{
			var frmdata =$('#contactform').serialize();
			$.ajax({
				type: "POST",
				url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
				data: "action=VendorRegistration&"+frmdata,
				success: function(Data){
					if(Data==1){
						window.location.href="<?php echo site_url();?>/thank-you/";
						}else{
						$('#msgDiv').html('<span class="error">This email id already exist.</span>');
					}
				}
			})
		}			 
	});	
	
	function blankField(filedID, val){ 
		if($('#'+filedID).val()!=''){
			$('#err_'+filedID).html('');
		}
		
	}
	
</script>


<script>
var v =0;
$('#addMorePets').click(function() {
  v++;
$('#no_of_pets').val(v);
  var str='';
 str+='<li id="v_'+v+'"> <div class="shown_pets_div shown_pets_div2"  id="petType_'+v+'" style="width:12%"><select name="petData[pets][]" class="changePetType" rel="'+v+'"><option value="" selected disabled>Pet Type</option><option value="Dogs">Dogs</option><option value="Cats">Cats</option><option value="Horse">Horse</option><option value="Birds">Birds</option><option value="Mammals">Small Mammals</option><option value="Fish">Fish</option><option value="Others">Others</option></select></div>';
 
 str+='<div id="petDetails_'+v+'" style="width:85%" class="petDetails2"><div><input name="petData[pet_name][]" value="" placeholder="Name"></div><div> <select name="petData[pet_age][]" value="" placeholder="Age"><option value="" selected disabled>Age</option><?php for($i=1;$i<=100;$i++){ ?><option value="<?php echo $i ;?>"><?php echo $i; ?></option><?php } ?></select>  </div><div><select name="petData[pet_gender][]"><option value="" selected disabled>Gender</option><option value="male">Male</option><option value="Female">Female</option></select></div><div><select name="petData[pet_breed][]" id="breedSelect_'+v+'"><option value="" selected disabled>Breed</option></select></div><div><select name="petData[pedigreed][]"><option value="" selected disabled>Pedigreed</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="petData[spayed][]"><option value="" selected disabled>Sprayed/Neutered</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div></div>';
 
 str+='</li>';
 
 $('.petLista_list').append(str);
 changePetType();
 deletePets();
})


function changePetType(){
	$('.changePetType').change(function(){
		var val =$(this).val();
		var rel =$(this).attr('rel');
		if( (val=='Dogs') || (val=='Cats') || (val=='Horse') ){
			str='<div id="petDetails_'+v+'" style="width:85%" class="petDetails2"><div><input name="petData[pet_name][]" value="" placeholder="Name"></div><div> <select name="petData[pet_age][]" value="" placeholder="Age"><option value="" selected disabled>Age</option><?php for($i=1;$i<=100;$i++){ ?><option value="<?php echo $i ;?>"><?php echo $i; ?></option><?php } ?></select>  </div><div><select name="petData[pet_gender][]"><option value="" selected disabled>Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></div><div><select id="breedSelect_'+v+'" name="petData[pet_breed][]"></select></div><div><select name="petData[pedigreed][]"><option value="" selected disabled>Pedigreed</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="petData[spayed][]"><option value="" selected disabled>Sprayed/Neutered</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div></div>';
		}else{
			str='<div id="petDetails_'+v+'" style="width:85%" class="petDetails2"><div><input name="petData[pet_name][]" value="" placeholder="Detail"><input  type="hidden" name="petData[pet_age][]" value=""><input type="hidden" name="petData[pet_gender][]" value=""><input type="hidden" id="breedSelect_'+v+'" name="petData[pet_breed][]" value=""> <input type="hidden" name="petData[pedigreed][]" value=""><input type="hidden" name="petData[spayed][]" value=""></div><div class="deletePets" rel="'+v+'">[Delete]</div></div>';
		}
		$('#petDetails_'+rel).html(str);
		// fire ajax
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


</script>


<script>
 $('#MemberRegisBtn').click(function(){
	var flag=0;
 var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	 var IndNum =/^(\+91-|\+91|0)?\d{10}$/;	
 
	 if($('#member_firstname').val()==""){
       $('#err_member_firstname').html('Please enter your First Name.');
	   $('#member_firstname').focus();
	   return false;
      }
	 else if($('#member_last_name').val()==""){
      $('#err_member_last_name').html('Please enter your Last Name.');
	  $('#member_last_name').focus();
       return false;
      }
	   else if($('#member_dob').val()==""){
      $('#err_member_dob').html('Please enter your DOB.');
	  $('#member_dob').focus();
        return false;
      }
	  else if($('#gender').val()==""){
      $('#err_gender').html('Please select your gender.');
	  $('#gender').focus();
        return false;
      }
	else if($('#member_address').val()==""){
	  $('#err_member_address').html('Please enter your Address.');
	  $('#member_address').focus();
      return false;
      }
	 else if($('#member_city').val()==""){
      $('#err_member_city').html('Please enter your City.');
	  $('#member_city').focus();
      return false;
      }
	else if($('#member_country').val()==""){
      $('#err_member_country').html('Please select your Country.');
	  $('#member_country').focus();
       return false;
      }
	  
	  else if($('#member_citizenship').val()==""){
      $('#err_member_citizenship').html('Please select your citizenship.');
	  $('#member_citizenship').focus();
       return false;
      }
	 else if($('#member_phone').val()==""){
      $('#err_member_phone').html('Please enter your Contact Number.');
	  $('#member_phone').focus();
       return false;
      }
	  else if(!IndNum.test($("#member_phone").val())) {
     $('#err_member_phone').html('Invalid Mobile Number.');
      $('#member_phone').focus();
       return false;
     }
	  
	 else if($('#member_email').val()==""){
     $('#err_member_email').html('Please enter your Email.');
	  $('#member_email').focus();
       return false;
      }
	else if(!re.test($("#member_email").val())) {
     $('#err_member_email').html('Invalid Email ID.');
      $('#member_email').focus();
       return false;
     }
	else if($("#member_password").val()==""){
     $('#err_member_password').html('Please enter your Password.');
      $('#member_password').focus();
       return false;
     }
	else if($("#member_password1").val()==""){
     $('#err_member_password1').html('Re Enter your Password.');
      $('#member_password1').focus();
       return false;
     }
	else if($("#member_password").val() != $("#member_password1").val()){
     $('#err_member_password1').html('Password Mismached');
      $('#member_password').focus();
      return false; 
     } 
	 else if(!$("#person_terms_of_service").is(":checked")) {
			$('#err_person_terms_of_service').html('Please select Term and Condition');
			$('#person_terms_of_service').focus();
			return false;
		} 
	 else{
	  var frmdata =$('#member_register').serialize();
		 $.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=MemberRegistration&"+frmdata,
			 success: function(Data){
				if(Data==1){
					 window.location.href="<?php echo site_url();?>/thank-you/";
				}else{
					$('#msgDiv').html('<span class="error">This email id already exist.</span>');
				}
			  }
	  })
   }		 
});	

</script>

<script> 
/*
$("#pets").change(function() {
		var which_pet = $(this).val();
		
	
		
		if((which_pet=='Dogs') || (which_pet=='Cats') || (which_pet=='Horse') ){	
		$("#petLista").show();	
		$(".petListadetail").hide();			 
		}
		else{
			$("#petLista").hide();
			$(".petListadetail").show();	
     str='<ul><li><label class="nrd-loginModal-label u-vr2x" for="username"><span>Info</span></label><input type="text" name="info" id="info" placeholder="Enter Your Pets Info"></li></ul>';
 
      $('.petListadetail').html(str);	
		}
});
*/

  $( document ).ready(function() {
        $(".pets_option").hide();	
    });
    // Script for Ownpets Radio Button -- 
    // Because of the design I'm writing this code-- Don't blame me already code is badxx
    var radioContainer = document.querySelector('.register-page.payment-options');
    var yesRadioButton = document.querySelector('#own_pets1');
    var noRadioButton = document.querySelector('#own_pets2');
    radioContainer.addEventListener('click', function(e) {
            if(e.target.innerText === 'YES') {
                    noRadioButton.removeAttribute('checked')
                    yesRadioButton.setAttribute('checked', 'checked');
                    $(".pets_option").show();
            } else if (e.target.innerText === 'NO') {
                    yesRadioButton.removeAttribute('checked');
                    noRadioButton.setAttribute('checked', 'checked');
                    $(".pets_option").hide();
            }
    });
    // Script for Gender Radio Button
    var genderContainer = document.querySelector('.gender-container');
    var maleRadio = document.querySelector('#Male');
    var femaleRadio = document.querySelector('#Female');
    var notSpecRadio = document.querySelector('#NotSpecified');
    genderContainer.addEventListener('click', function(e) {
            if(e.target.innerText === 'MALE') {
                    femaleRadio.removeAttribute('checked');
                    notSpecRadio.removeAttribute('checked');
                    maleRadio.setAttribute('checked', 'checked');
                    console.log('male');
            } else if (e.target.innerText === 'FEMALE') {
                    maleRadio.removeAttribute('checked');
                    notSpecRadio.removeAttribute('checked');
                    femaleRadio.setAttribute('checked', 'checked');
                    console.log('female');
            } else if (e.target.innerText === 'THIRD GENDER') {
                    maleRadio.removeAttribute('checked');
                    femaleRadio.removeAttribute('checked');
                    notSpecRadio.setAttribute('checked', 'checked');
                    console.log('NS');
            } 
            
    });
    // Script for Checkbox
    var checkboxContainer = document.querySelector('.register-page-checkbox-container');
    var checkBoxBox = document.querySelector('.register-page-checkbox');
    var count = 1;
    checkboxContainer.addEventListener('click', function(e) {
        if(e.target.className === 'register-page-checkbox-label' && count === 1) {
            checkBoxBox.setAttribute('checked', 'checked');
            count = 0;
        } else if (e.target.className === 'register-page-checkbox-label' && count === 0) {
            checkBoxBox.remomveAttribute('checked');
            count = 1;
        }
    })
    
//    $("input[name='own_pets']").click(function() {
//        var test = $(this).val();
//        console.log(test);
//		if(test=='No'){
//		 $(".pets_option").hide();	
//		}
//		else{
//			$(".pets_option").show();
//		}
//       
//    }); 
		

</script>

<script type="text/javascript">
    $(".registertab").click(function(){
   $("#frm_registartion").show();
    $("#frm_login").hide();
    
  })
   
  $(".logintab").click(function(){
  $("#frm_login").show();
    $("#frm_registartion").hide();
  })
    
</script>

<?php get_footer(); ?>


<script>
 $(document).ready(function(){
	  $('#menu1').addClass('active');
	 })
 
</script>

