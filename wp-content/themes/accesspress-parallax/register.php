<?php 
	/**
		Template Name:Register Page
		
	*/
	get_header();
	global $mk_options;
?>


<style>
.form-control:focus{
	 border-color:#F47555 !important;
	}
	.err_req {color: #473636;}
.petDetailsSmall{display:none;}	

ul li {
	
	list-style-type:none;
}

#regist .upload_div {
    width: 40%;
    float: left;
}

#regist .payment-options {
    width: 100%;
    float: left;
    margin-bottom: 0px;
}

#regist #member_register .payment-options > label {
    display: inline;
    width: auto !important;
    margin-right: 10px;
    padding-left: 0px;
	float:left;
}

#regist #member_register .payment-options > label>span {
    display: inline-block;
    float: left;
}

#regist #member_register .payment-options > label>input {
    display: inline-block;
    width: auto;
    height: auto;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 10px;
}
#regist #member_register  .doYou{
	width: 100%;
    float: left;
}


#regist .deletePets{
    width: 19%;
    float: left!important;
    margin-right: 1%;
    height: 40px;
    line-height: 40px;
    margin-bottom: 25px;
    color:red;
    font-size: 16px;
}

#regist .agreeTerms{
	width: 100%;
	float: left;
	padding: 10px 0px;
}


#regist .con_left{float: left;width:68%;    padding: 28px 21px 40px 0px;
	
}
#regist .con_right{float: right;width:30%;background-color: #F47555;padding:20px;}
#regist .con_right h1{font-size: 23px;
	padding:0px 6px 20px;
color: #fff;.con_right p}
#regist .con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}
#regist .modalLogin-loginFields{padding: 20px 0px;}
#regist .modalLogin-loginFields li{float: left;width: 49%;}
#regist .modalLogin-loginFields li label{display: block;font-size: 15px;color: #333;font-weight: 600;margin-bottom: 7px;}
#regist .modalLogin-loginFields > li input{ 
	height: 40px;
    margin-bottom:5px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
border: 1px solid #777;}

#regist .modalLogin-loginFields > li select{
	height: 40px;
    margin-bottom:5px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
border: 1px solid #777;}

#regist .modalLogin-loginFields > li:nth-child(2n-2){width: 49%;float: right;}

#regist 	.register-btn{clear: both;float: left;width: 100%;padding: 0px 0px;}
#regist .register-btn input{background: #F47555;color: #fff;padding: 10px 25px;font-size: 14px;    border-radius: 4px;}
#regist .register-page1{    font-size: 33px;
    font-weight: 300;
    border-bottom: 1px solid #ddd;
    color: #777;
    padding: 0px 0px 17px 0px;
margin-bottom: 28px;}

#regist #person_terms_of_service{float: left;width: 3%;height: 15px;margin-bottom: 0px;}
.btn_1 green{border: 0px;}
.btn_1 green{}
.con_left .nav-tabs>li>a{font-size: 18px;}
.petsInfo{
	width:100%;
	float:left;
}

#regist .petsInfo ul{
	width:100%;
float:left;}

#regist .petsInfo li label {
    display: block;
    font-size: 16px;
    color: #fff;
    font-weight: 300;
    margin-bottom: 7px;
}

#regist .petsInfo li input {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
}

#regist .petsInfo li select {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;
}

#regist .petsInfo > ul{
	width: 49%;
	float: left;
	background: #F47555;
	padding: 10px;
	margin-bottom:10px;
}

#regist .petsInfo > ul:nth-child(2n-1){
	margin-right:1%;
}

#regist .petsInfo > ul:nth-child(2n){
	margin-left:1%;
}
#regist #member_register .petsInfo  .payment-options > label{
	width:90px !important;
}




#regist .shown_petLista_head li {width:100%;}
#regist .shown_pets_div li .shown_pets_div{width: 100%;}

#regist .shown_petList{ width: 10%;float: left;margin-right: 1%;padding-top:50px;}	
#regist .shown_petList .shown_petLista_head{width:100%;float:left;}
#regist .shown_petList .shown_petLista_head li{width:100%;float:left;padding-bottom:10px;}
#regist .shown_petList .shown_petLista_head li div{width:100%;font-size: 16px;color: #555;float:left;}
#regist .shown_petList .shown_petLista_list{width:100%;float:left;}
#regist .shown_petList .shown_petLista_list li {width:100%;float:left;}
#regist .shown_petList .shown_petLista_list div{width:100%;float:left;}
#regist .hidden_petList{ width: 100%;float: left;}
#regist .petLista_head li {width:100% !important;padding-bottom: 10px;}
#regist .petLista_head li div{width:13%; float:left !important;margin-right: 1%;font-size: 16px;color:#555;}
#regist .petLista_list li {width:100% !important;float: left;}	
#regist .petLista_list li:first-child{margin-bottom:25px;}
#regist .petLista_list li div{width:13%; float:left!important;margin-right: 1%;}

#regist .petListadetail{width:100%;float:left;}

#regist #register_con_left.con_left .nav-tabs>li>a {
    color: #333;
    background: #fff;
}

#regist #register_con_left .nav-tabs>li.active>a,#register_con_left .nav-tabs>li.active>a:hover,#register_con_left .nav-tabs>li.active>a:focus{
	background-color: #F47555;color:#fff;
}

#regist #member_register .pets_option{
	width: 100%
}

#regist #member_register .spayed_div_left{
	width: 49%;
	float: left;
}

#regist #member_register .spayed_div_right{
	width: 49%;
	float: right;
}

#regist #member_register #addMorePets{
	width: 100%;
	float:left;
	margin-bottom: 25px;
}

#regist #member_register #addMorePets span{
	background: #F47555;
    color: #fff;
    padding: 10px 25px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
	display:inline-block;
}

#regist #member_register .member_prof{
	float:left;
}

#regist #member_register .additional_info{
	float:right;
}

#regist #member_register #additional_info{
	height: 160px;
}

#regist #member_register #intrested_area{
	height: 160px;
}

#regist #member_register .member_profile_btn{
	position: relative;
}

#regist #member_register .member_profile_btn label{
	max-width: 85%;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    color: #fff;
    background-color: #F47555;
}

#regist #member_register #member_profile_pic{
	    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
    top: 0px;
}

#regist .agreeTerms{
    width: 100% !important;
    float:left !important;
    margin-bottom: 18px;
}

#regist .pet-search-right{
	width: 100%;
	float:left;
	border-left:0px;
}

#regist .petLista{
	width:100%:
	float:left;
}
#regist .wowPet{
	font-weight: 600;
    font-size: 14px;
    color: #333;
    margin-bottom: 20px;
}


#news_n_updates .pet_house1{
	width:100%;
	background: #fff;
	
}

#news_n_updates .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#news_n_updates .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#news_n_updates .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#news_n_updates .news-title img{
	width:10px;
	height:10px;
}

#news_n_updates .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#news_n_updates .news:last-child{
	border-bottom:0px;
}

#news_n_updates .news-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
}

#news_n_updates .news-section-div{
	padding:0px;
}
#news_n_updates .news-section-body{
	padding:10px 0px;
	height:250px;
	overflow:scroll;
}

#news_n_updates .news-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#news_n_update .news-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}

#quick_links .pet_house1{
	width:100%;
	background: #fff;
}

#quick_links .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#quick_links .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#quick_links .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#quick_links .news-title img{
	width:10px;
	height:10px;
}

#quick_links .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#quick_links .news:last-child{
	border-bottom:0px;
}

#quick_links .quick-links-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
	padding:10px;
}



#quick_links .quick-links-section-div{
	padding:0px;
}
#quick_links .quick-links-section-body{
	padding:0px;
}

#quick_links .quick-links-section-body ul li{

	border-bottom: 1px solid #F6F6F6;
    font-size: 15px;
    color: #777;
	cursor:pointer;
}

#quick_links .quick-links-section-body ul li a.quick_petsrv{
	color: #777;
}

#quick_links .quick-links-section-body ul li>span{
		padding:15px 10px 10px 15px;
		display: inline-block;
		width: 100%;
		border:1px solid transparent;
}

#quick_links .quick-links-section-body ul li.isActive>span{
	border-bottom:1px solid #e8e8e8;
}

#quick_links .quick-links-section-body ul li>span{
	
}


#quick_links .quick-links-section-body ul li>span .fa-left{
	padding-right:12px;
}

#quick_links .quick-links-section-body ul li>span .fa-plane{
	color:#A3CCFF;
}

#quick_links .quick-links-section-body ul li>span .fa-cutlery{
	color:#FCC66E;
}

#quick_links .quick-links-section-body ul li>span .fa-taxi{
	color:#E072BE;
}
#quick_links .quick-links-section-body ul li>span .fa-calendar{
	color:#EBB4DA;
}
#quick_links .quick-links-section-body ul li>span .fa-paw{
	color:#00BEA6;
}

#quick_links .quick-links-section-body ul li>span .fa-tags{
	color:#A3CCFF;
}







#quick_links .quick-links-section-body ul li>span .fa-right{
	float: right;
    font-size: 21px;
    color: #ccc;
	transition:0.2s ease-in-out;

}

#quick_links .quick-links-section-body ul li.isActive>span .fa-right{
	transform: rotate(90deg);
    transition: 0.2s ease-in-out;
}

#quick_links .quick-links-section-body ul li>span:hover{
	background:#F6F6F6;

}


#quick_links .quick-links-section-body ul li .quick-sub-menu{
 display:none;	
 padding-left:20px;
}

#quick_links .quick-links-section-body ul li .quick-sub-menu li{
	 padding:15px 0 10px 35px;
}

#quick_links .quick-links-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#quick_links .quick-links-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}


.pet-search-left{}
.pet-search-right{}	
#filter_frm .criteria_listing_Star input{float:left;}
.pet-search-left{float: left;width: 69%;}
.pet-search-right{float: right;width: 100%;background-color: #F47555;margin-bottom:15px;}
.pet-child-left{float: left;width: 28%;border-right: #d8d8d8 1px solid;padding: 0px 10px 0px 0px;}
.pet-child-right{float: right;border-left: #f2f2f2 1px solid;width: 72%;padding: 0px 0px 0px 10px;position:relative;}
.pet-child-right ul{}
.pet-child-right > ul > li{background: #fff;float: left;width: 100%;margin-bottom: 7px;height: 290px;}
.pet-child-right > ul > li:last-child{margin-bottom:0px;}
.pet-child-right ul li .float_left14{float: left;width: 40%;height: 100%;background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;}
.pet-child-right ul li .float_left14 img{height: 100%;width: 100%;}
.pet-child-right ul li .float_right14{float: right;width: 59%;height: 100%;padding: 10px}
.pet-child-right ul li .float_right14 .text-pack17{width: 100%;float: left;}
.pet-child-right ul li .float_right14 h2{font-size: 25px;font-weight: 600;color: #F47555;margin: 10px 0px;}

.boxs-41{width: 100%;float: left;}
.boxs-41 ul{float: left;width: 100%;}
.boxs-41 ul li{float: left;width: 50%;position: relative;    padding: 0px 8px 0px 0px;}
.boxs-41 ul li:nth-child(1){padding: 0px -5px 5px 0px;}
.boxs-41 ul li:nth-child(2){padding: 0px 0px 5px 5px;}
.boxs-41 ul li:nth-child(3){padding: 5px -5px 0px 0px;}
.boxs-41 ul li:nth-child(4){padding: 5px 0px 0px 5px;}


.boxImg1 img{width: 100%; height: 114px;
overflow: hidden;margin-left:-18px;}
.boxImg1-text{position: absolute;bottom:8px;left: 7px;right: 8px;}
.boxImg1-text h1{font-size: 15px;color: #fff;font-weight: 100;}
.boxImg1-text p{color: #fff;font-size: 13px;font-weight: 100;width: 100%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.boxImg1-text p a{color:#fff;font-size:15px;}



</style>


<div id="regist" style="margin-top:40px;margin-left:5px;">
	<div class="col-sm-8" id="register_con_left">
	<div class="row"> 
		<div id="msgDiv"></div>
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#menu1">Member Register</a></li>
			<li><a data-toggle="tab" href="#home">Vendor Register</a></li>
			
		</ul>
		
		
		<div class="tab-content">

			<div id="menu1" class="tab-pane fade in active">
			<form id="member_register" name="member_register" method="post">
				 <input type="hidden" name="no_of_pets" id="no_of_pets"  value="0" /><br><br>
				 <div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name<span class="err_req">* </span></span></label>
							<input type="text" name="member_firstname" id="member_firstname" class="form-control" placeholder="Enter Your First Name" onkeyup="blankField('member_firstname','Enter Your First Name')">
							<span class="errSpan" id="err_member_firstname"></span>
						</div>
						
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name<span class="err_req">* </span></span></label>
							<input name="member_last_name" id="member_last_name" class="form-control"  placeholder="Enter Your Last Name"  type="text" onkeyup="blankField('member_last_name','Enter Your Last Name')">
							<span class="errSpan" id="err_member_last_name"></span>
						</div>
						
						
						
						<div class="form-group col-sm-6">
						<label class="nrd-loginModal-label u-vr2x" for="username"><span>Gender<span class="err_req">* </span></span></label>
							<select  id="gender" name="gender" class="form-control" placeholder="Gender" onchange="blankField('gender','')">
								<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="NotSpecified">Third Gender</option>
							</select>
						
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>DOB(for verification members must be 18+)<span class="err_req">* </span></span></label>
							<input name="member_dob" id="member_dob" class="form-control datepicker"  placeholder="Enter Your DOB"  type="text" onkeyup="blankField('member_dob','Enter Your DOB')">
							<span class="errSpan" id="err_member_dob"></span>
						</div>
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address<span class="err_req">* </span></span></label>
							<input type="text" name="member_address" id="member_address" class="form-control"  placeholder="Enter Your Address" onkeyup="blankField('member_address','Enter Your Address')" >
							<span class="errSpan" id="err_member_address"></span>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City<span class="err_req">* </span></span></label>
							<input type="text" name="member_city" id="member_city" class="form-control"  placeholder="Enter Your City" onkeyup="blankField('member_city','Enter Your City')">
							<span class="errSpan" id="err_member_city"></span>
						</div>
						
					
						
						
						<div class="form-group col-sm-6">
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
						</div>
						
						
							<div class="form-group col-sm-6">
								<label class="nrd-loginModal-label u-vr2x" for="username"><span>State/County</span></label>
							<input type="text" name="member_state" class="form-control" id="member_state" placeholder="Enter Your State" onkeyup="blankField('member_state','Enter Your State')" >
							<span class="errSpan"></span>
						</div>
						
						<div class="form-group col-sm-6">
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
						</div>
						
				 <div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone<span class="err_req">* </span></span></label>
							<input name="member_phone" id="member_phone" class="form-control" placeholder="Enter Your Mobile/Phone" type="text" onkeyup="blankField('member_phone','Enter Your Mobile/Phone')">
							<span id="err_member_phone" class="errSpan"></span>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email<span class="err_req">* </span></span></label>
							<input name="member_email" id="member_email" class="form-control" placeholder="Enter Your Email Address" type="email" onkeyup="blankField('member_email','Enter YOur Email Address')">
							<span id="err_member_email" class="errSpan"></span>
						</div>
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Password<span class="err_req">* </span></span></label>
							<input type="password" name="member_password" id="member_password" class="form-control" placeholder="Your Password" id="firstname" onkeyup="blankField('member_password','Your Password')">
							<span id="err_member_password" class="errSpan"></span>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Re-type Password<span class="err_req">* </span></span></label>
							<input type="password" name="member_password1" id="member_password1" class="form-control"  placeholder="Please Re-type Password" id="firstname" onkeyup="blankField('member_password1','Please Re-type Password')">
							<span id="err_member_password1" class="errSpan"></span>
						</div>
						
				 <div class="form-group col-sm-6">
						<label class="nrd-loginModal-label u-vr2x" for="Accepted"><span>Do you Own Pets</span></label>
						
							<div class="payment-options" style="margin-top:8px;">
								<label class="radio-inline" class="form-control" >
									<span>Yes</span> <input type="radio" name="own_pets" id="own_pets1" value="Yes">
								</label>
								<label class="radio-inline" style="padding-left:10px;">
									<span>No</span> <input type="radio" name="own_pets" id="own_pets2" value="No" checked>
								</label>
							</div>
							<span class="errSpan"></span>
						</div>	
						
						
	 <div class="form-group col-sm-6">
										<select name="pets" id="pets" class="form-control">
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

			</form> 	 
			
			</div>
			
			
					<div id="home" class="tab-pane fade"><br><br>
				<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>First Name<span class="err_req">* </span></span></label>
							<input name="firstname" placeholder="First Name" id="firstname" class="form-control" title="" type="text" onkeyup="blankField('firstname','First Name')">
							<span class="errSpan" id="err_firstname"></span>
						</div>
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Last Name<span class="err_req">* </span></span></label>
							<input name="last_name" id="last_name" class="form-control" placeholder="Last Name" title="" type="text" onkeyup="blankField('last_name','Last Name')">
							<span class="errSpan" id="err_last_name"></span>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Address<span class="err_req">* </span></span></label>
							<input name="address" id="address" class="form-control" placeholder="Address" title="" type="text" onkeyup="blankField('address','Address')" >
							<span class="errSpan" id="err_address"></span>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>City<span class="err_req">* </span></span></label>
							<input name="city" id="city" class="form-control"  placeholder="City" title="" type="text" onkeyup="blankField('city','City')">
							<span class="errSpan" id="err_city"></span>
						</div>
					
						
						<div class="form-group col-sm-6">
								<label class="nrd-loginModal-label u-vr2x" for="username"><span>Country</span></label>
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
						</div>
							<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>State/County</span></label>
							<input name="state" id="state" class="form-control" placeholder="State" title="" type="text">
							<span class="errSpan" id="err_state"></span>
						</div>
							
				
						
						 <div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Service Category (Primary)<span class="err_req">* </span> </span></label>
							<?php  $Results = $wpdb->get_results("select * from twc_service_category"); ?>
							<select id="service" name="service" class="form-control error" onchange="blankField('service','')">
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
						</div>
						<div class="form-group col-sm-6" style="float:left;">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Mobile/Phone<span class="err_req">* </span></span></label>
							<input name="phone" id="phone" class="form-control" placeholder="Mobile/Phone" title="" type="text" onkeyup="blankField('phone','Mobile/Phone')">
							<span class="errSpan" id="err_phone"></span>
						</div>
						<div class="form-group col-sm-6">
							<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name of Establishment/Store<span class="err_req">* </span></span></label>
							<input name="establishment" id="establishment" class="form-control" placeholder="Name of Establishment" type="text" onkeyup="blankField('establishment','Name of Establishment')">
							<span class="errSpan" id="err_establishment"></span>
						</div>
                          
					</div>
					
		</div>		
		
	</div>	
	
	
	
	</div>
	
	
	
	
	<div class="col-sm-4" >



<div class="row col-sm-12" style="padding:10px;background:#F47555;">
	    	
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
			<div id="quick_links">
			<?php  echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates" style="margin-top:50px;">
		<h2>NEWS AND UPDATES</h2>
			<div class="pet_house1 news-section">
    
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
      
          foreach($results as $obj){?>
       <div class="news">
         <h3 style="font-weight:bold;"><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
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

