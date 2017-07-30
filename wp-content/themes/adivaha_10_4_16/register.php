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


<div class="container" id="regist">
	<div class="con_left" id="register_con_left">
		<div id="msgDiv"></div>
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#menu1">Member Register</a></li>
			<li><a data-toggle="tab" href="#home">Vendor Register</a></li>
			
		</ul>
		
		<div class="tab-content">

			<div id="menu1" class="tab-pane fade in active">
				<form id="member_register" name="member_register" method="post">
				 <input type="hidden" name="no_of_pets" id="no_of_pets"  value="0" />
					<ul class="modalLogin-loginFields">
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name</span></label>
							<input type="text" name="member_firstname" id="member_firstname" placeholder="Enter Your First Name" onkeyup="blankField('member_firstname','Enter Your First Name')">
							<span class="errSpan" id="err_member_firstname"></span>
						</li>
						
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name</span></label>
							<input name="member_last_name" id="member_last_name" placeholder="Enter Your Last Name"  type="text" onkeyup="blankField('member_last_name','Enter Your Last Name')">
							<span class="errSpan" id=" err_member_last_name"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Age(for verification members must be 18+)</span></label>
							<input name="member_age" id="member_age" placeholder="Enter Your Age"  type="text" onkeyup="blankField('member_age','Enter Your Age')">
							<span class="errSpan" id="  err_member_age"></span>
						</li>
			
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender</span></label>
							<select class="form-control" id="gender" name="gender" placeholder="Gender">
								<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
							</select>
							<span class="errSpan"></span>
						</li>
						<li class="address_li">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
							<input type="text" name="member_address" id="member_address"  placeholder="Enter Your Address" onkeyup="blankField('member_address','Enter Your Address')" >
							<span class="errSpan" id=" err_member_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
							<input type="text" name="member_city" id="member_city"  placeholder="Enter Your City" onkeyup="blankField('member_city','Enter Your City')">
							<span class="errSpan" id="err_member_city"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Citizenship</span></label>
							<?php 
								$sresults =$wpdb->get_Results("select * from twc_country");
							?>
							<select class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship">
								<option value="">Select Country</option>
								<?php foreach($sresults as $sresult){ ?>
									<option value="<?php echo $sresult->id; ?>"><?php echo $sresult->title; ?></option>
								<?php } ?>
							</select>
							<span class="errSpan"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone</span></label>
							<input name="member_phone" id="member_phone"  placeholder="Enter Your Mobile/Phone" type="text" onkeyup="blankField('member_phone','Enter Your Mobile/Phone')">
							<span id="err_member_phone" class="errSpan"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
							<input name="member_email" id="member_email" placeholder="Enter Your Email Address" type="email" onkeyup="blankField('member_email','Enter YOur Email Address')">
							<span id="err_member_email" class="errSpan"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password</span></label>
							<input type="password" name="member_password" id="member_password" placeholder="Your Password" id="firstname" onkeyup="blankField('member_password','Your Password')">
							<span id="err_member_password" class="errSpan"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Re-type Password</span></label>
							<input type="password" name="member_password1" id="member_password1" placeholder="Please Re-type Password" id="firstname" onkeyup="blankField('member_password1','Please Re-type Password')">
							<span id="err_member_password1" class="errSpan"></span>
						</li>
						<li class="doYou">
						<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Do you Own Pets</span></label>
							
							<div class="payment-options">
								<label class="radio-inline">
									<span>Yes</span> <input type="radio" name="own_pets" id="own_pets1" value="Yes">
								</label>
								<label class="radio-inline">
									<span>No</span> <input type="radio" name="own_pets" id="own_pets2" value="No" checked>
								</label>
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
											<option value="Affenpinscher">Affenpinscher</option>
											<option value="Afghan Hound">Afghan Hound</option>
											<option value="Airedale Terrier">Airedale Terrier</option>
											<option value="American Eskimo Dog.">American Eskimo Dog</option>
											<option value="American Foxhound">American Foxhound</option>
										</select>
									  </div>
									   <div>
										<select name="pedigreed" id="pedigreed">
											<option value="male">Yes</option>
											<option value="Female">No</option>
										</select>
									  </div>
									 <div>
										 <select name="spayed" id="spayed">
											  <option value="male">Yes</option>
											  <option value="Female">No</option>
										</select>
									  </div>
									  </li>
							   </ul>
							   </div>
							   <div id="addMorePets"><span>Add More</span></div>
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
			
					<div class="agreeTerms">
						<input id="person_terms_of_service" name="person_terms_of_service" type="checkbox" value="1">	
						<label class="nrd-loginModal-label u-vr2x">I agree to the <a href="" title="terms and conditions">terms and conditions</a></label>
						
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
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name</span></label>
							<input name="firstname" placeholder="First Name" id="firstname" title="" type="text" onkeyup="blankField('firstname','First Name')">
							<span class="errSpan" id="err_firstname"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name</span></label>
							<input name="last_name" id="last_name" placeholder="Last Name" title="" type="text" onkeyup="blankField('last_name','Last Name')">
							<span class="errSpan" id="err_last_name"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address</span></label>
							<input name="address" id="address"  placeholder="Address" title="" type="text" onkeyup="blankField('address','Address')" >
							<span class="errSpan" id="err_address"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City</span></label>
							<input name="city" id="city"  placeholder="City" title="" type="text" onkeyup="blankField('city','City')">
							<span class="errSpan" id="err_city"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>State</span></label>
							<input name="state" id="state"  placeholder="State" title="" type="text">
							<span class="errSpan" id="err_state"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country</span></label>
							 <select name="country" id="country" onchange="blankField('country','')">
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
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone</span></label>
							<input name="phone" id="phone"  placeholder="Mobile/Phone" title="" type="text" onkeyup="blankField('phone','Mobile/Phone')">
							<span class="errSpan" id="err_phone"></span>
						</li>
						
						 <li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category (Primary) </span></label>
							<?php  $Results = $wpdb->get_results("select * from twc_service_category"); ?>
							<select id="service" name="service" onchange="blankField('service','')">
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
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment/Store</span></label>
							<input name="establishment" id="establishment"  placeholder="Name of Establishment" type="text" onkeyup="blankField('establishment','Name of Establishment')">
							<span class="errSpan" id="err_establishment"></span>
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Established Since </span></label>
							<select name="establishment_since" id="establishment_since" onchange="blankField('establishment_since','')">
							  <option value="">Select Year</option>
							  <?php for($y=1900;$y<=date('Y');$y++){
								     echo '<option value="'.$y.'">'.$y.'</option>';
							        }?>
							</select>
							<span class="errSpan" id="err_establishment_since"></span>
							
						</li>
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
							<input name="email" id="email" placeholder="Email" title="" type="email" onkeyup="blankField('email','Email')">
							<span class="errSpan" id="err_email"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password</span></label>
							<input type="password" name="password" id="password" placeholder="Password" onkeyup="blankField('password','Password')">
							<span class="errSpan" id="err_password"></span>
						</li>
						
						<li>
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Re-type Password</span></label>
							<input type="password" name="password1" id="password1" placeholder="Re-type Password"  onkeyup="blankField('password1','Re-type Password')">
							<span class="errSpan" id="err_password1"></span>
						</li>
						
						
						<li class="agreeTerms">
							<input style="float: left;width: 3%;height: 15px;margin-bottom: 0px;" id="v_tc" name="v_tc" type="checkbox" value="1">	
							<label class="nrd-loginModal-label u-vr2x">I agree to the <a href="" title="terms and conditions">Terms and Conditions</a></label>
							
						</li>
						
					</ul>
					
					
					<div class="register-btn">
						<input type="button" id="RegisBtn" value="Register now" class="btn_1 green medium">
					</div>
				</form> 
			</div>
			
		</div>
		
	</div>
	
	<div class="con_right">

		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
	    <div id="quick_links">
			<?php echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates">
			<div class="pet_house1 news-section">
    <h2><?php echo $mk_options['latest_news'];?></h2>
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
          foreach($results as $obj){?>
       <div class="news">
         <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo $obj->title;?></a></h3>
         <p><?php echo substr($obj->description,0,150);?>...</p>
       </div>
       <?php } ?>

     </div>
  </div>
</div>
		</div>
		
	</div>
	
</div>

<div class="height_class1457" style="">
	
	
</div>


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
			$('#lastname').focus();
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
 str+='<li id="v_'+v+'"><div><input name="pet_name[]" value=""></div><div><input name="pet_age[]" value=""></div><div><select name="pet_gender[]"><option value="male">Male</option><option value="Female">Female</option></select></div><div><select name="pet_bread[]"><option value="Affenpinscher">Affenpinscher</option><option value="Afghan Hound">Afghan Hound</option><option value="Airedale Terrier">Airedale Terrier</option><option value="American Eskimo Dog.">American Eskimo Dog</option><option value="American Foxhound">American Foxhound</option></select></div><div><select name="pedigreed[]"><option value="Yes">Yes</option><option value="No">No</option></select></div><div><select name="spayed[]"><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="deletePets" rel="'+v+'">[Delete]</div></li>';
 
 $('.petLista_list').append(str);
 deletePets();
})

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
	else if($('#member_address').val()==""){
      $('#err_member_address').html('<span class="state-indicator">Please enter your Address.</span>');
	  $('#member_address').focus();
      return false;
      }
	 else if($('#member_city').val()==""){
      $('#err_member_city').html('<span class="state-indicator">Please enter your City.</span>');
	  $('#member_city').focus();
      return false;
      }
	else if($('#member_country').val()==""){
      $('#err_member_country').html('<span class="state-indicator">Please enter your Country.</span>');
	  $('#member_country').focus();
       return false;
      }
	 else if($('#member_phone').val()==""){
      $('#err_member_phone').html('<span class="state-indicator">Please enter your Contact Number.</span>');
	  $('#member_phone').focus();
       return false;
      }
	  else if($('#member_age').val()==""){
      $('#err_member_age').html('<span class="state-indicator">Please enter your Age.</span>');
	  $('#member_age').focus();
        return false;
      }
	 else if($('#member_email').val()==""){
     $('#err_member_email').html('<span class="state-indicator">Please enter your Email.</span>');
	  $('#member_email').focus();
       return false;
      }
	else if(!re.test($("#member_email").val())) {
     $('#err_member_email').html('<span class="state-indicator">Invalid Email ID.</span>');
      $('#member_email').focus();
       return false;
     }
	else if($("#member_password").val()==""){
     $('#err_member_password').html('<span class="state-indicator">Please enter your Password.</span>');
      $('#member_password').focus();
       return false;
     }
	else if($("#member_password1").val()==""){
     $('#err_member_password1').html('<span class="state-indicator">Re Enter your Password.</span>');
      $('#member_password1').focus();
       return false;
     }
	else if($("#member_password").val() != $("#member_password1").val()){
     $('#err_member_password1').html('<span class="state-indicator">Password Mismached</span>');
      $('#member_password').focus();
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

$("#pets").change(function() {
		var which_pet = $(this).val();
		
		if((which_pet=='Dogs') || (which_pet=='Cats') || (which_pet=='Horse') || (which_pet=='Horse')  ){
		// $(".spayed_div").show();	
		$(".pets_div").show();	
		$("#petLista").show();	
		$(".petListadetail").hide();	
		 
		}
		else{
			//$(".spayed_div").hide();
			$(".pets_div").show();
			$("#petLista").hide();
			$(".petListadetail").show();	
     str='<ul><li><label class="nrd-loginModal-label u-vr2x" for="username"><span>Info</span></label><input type="text" name="info" id="info" placeholder="Enter Your Pets Info"></li></ul>';
 
      $('.petListadetail').html(str);
			
		}
	   
});

  $( document ).ready(function() {
        $(".pets_option").hide();	
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