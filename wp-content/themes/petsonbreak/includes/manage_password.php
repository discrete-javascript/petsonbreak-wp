  <h5 class="recent_bookings">Change Password</h5>
<p class="this_section_pro">You can change Password here </p>
		 

		 <form id="contactform" method="post">
                     
		<div class="modalLogin-loginFields">
			<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="nrd-loginModal-label u-vr2x  col-form-label" for="currentPw"><span>Current Password</span></label>
				<input name="currentPw" placeholder="Current Password" id="currentPw" value="" title="Email address is required." type="password" onkeyup="blankField('currentPw','Current Password')" class="form-control" style="padding-left: 1em;">
				<span id="err_currentPw"></span>
                            </div>
			</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label class="nrd-loginModal-label u-vr2x col-form-label" for="newPw"><span>New Password</span></label>
				<input name="newPw" id="newPw" placeholder="New Password" value="" title="Email address is required." type="password" onkeyup="blankField('newPw','New Password')"class="form-control" style="padding-left: 1em;">
				<span id="err_newPw"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="nrd-loginModal-label u-vr2x col-form-label" for="confirmPw"><span>Confirm Password</span></label>
                                    <input name="confirmPw" id="confirmPw"  placeholder="Confirm Password" value="" title="Email address is required." type="password" onkeyup="blankField('confirmPw','Confirm Password')" class="form-control" style="padding-left: 1em;">
                                    <span id="err_confirmPw"></span>
                            </div>
                        </div>
			
                </div>
		   <div class="register-btn">
				<input type="button" id="changepasswordid" value="Save Changes" class="btn_1 green medium" style="padding: 10px 25px;background: red;">
			</div>
		 </form> 
		 
         <style>
             .modalLogin-loginFields div label {
                display: block;
                font-size: 15px;
                color: #333;
                font-weight: 600;
                margin-bottom: 16px;
                color: #333;
             }
             .modalLogin-loginFields div input {
                height: 40px;
                margin-bottom: 25px;
                width: 100%;
                padding: 0px 0px 0px 9px;
                border-radius: 4px;
                border: 1px solid #777;
            }
         </style>	
         
         <script>
            var url_string = window.location.href;
            var url = new URL(url_string);
            var type = url.searchParams.get("type");
            if(type === 'changepass') {
                document.querySelector('.change-password-hero-button').setAttribute('style', 'display: none;');
            }
            
         </script>