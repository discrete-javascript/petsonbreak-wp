<?php		

echo'	<!-- Enter otp -->
	<div class="mo_registration_divided_layout">
		<form name="f" method="post" id="otp_form" action="">
			<input type="hidden" name="option" value="mo_registration_validate_otp" />

				<div class="mo_registration_table_layout">
					<table class="mo_registration_settings_table">
						<h3>'.__("Verify OTP",MoConstants::TEXT_DOMAIN).'</h3>
						<tr>
							<td><b><font color="#FF0000">*</font>'.__("Enter OTP:",MoConstants::TEXT_DOMAIN).'</b></td>
							<td colspan="3"><input class="mo_registration_table_textbox" autofocus="true" type="text" name="otp_token" required placeholder="'.__("Enter OTP",MoConstants::TEXT_DOMAIN).'" style="width:40%;" title="Only 6 digit numbers are allowed"/>
							 &nbsp;&nbsp;<a style="cursor:pointer;" onclick="document.getElementById(\'resend_otp_form\').submit();">'.__("Resend OTP ?",MoConstants::TEXT_DOMAIN).'</a></td>
						</tr>
						<tr><td colspan="3"></td></tr>
						<tr>
							<td>&nbsp;</td>
							<td style="width:17%">
								<input type="submit" name="submit" value="'.__("Validate OTP",MoConstants::TEXT_DOMAIN).'" class="button button-primary button-large" />
							</td>
		</form>
						<form name="f" method="post">
						<td style="width:18%">
										<input type="hidden" name="option" value="mo_registration_go_back"/>
										<input type="submit" name="submit"  value="'.__("Back",MoConstants::TEXT_DOMAIN).'" class="button button-primary button-large" /></td>
						</form>
							<form name="f" id="resend_otp_form" method="post" action="">
						<td>
							<input type="hidden" name="option" value="mo_registration_resend_otp"/>
						</td>
						</tr>
							</form>
					</table>
		<br>
		<hr>

		<h3>'.__("I did not recieve any email with OTP . What should I do ?",MoConstants::TEXT_DOMAIN).'</h3>
		<form id="phone_verification" method="post" action="">
			<input type="hidden" name="option" value="mo_registration_phone_verification" />
			'.__("If you cannot see an email from miniOrange in your mails, please check your <b>SPAM Folder</b>. If you don\'t see an email even in SPAM folder, verify your identity with our alternate method.",MoConstants::TEXT_DOMAIN).'
			 <br><br>
				<b>'.__("Enter your valid phone number here and verify your identity using one time passcode sent to your phone.",MoConstants::TEXT_DOMAIN).'</b>
				<br><br>
				<table class="mo_registration_settings_table">
					<tr>
						<td colspan="3">
						<input class="mo_registration_table_textbox" required  pattern="[0-9\+]{12,18}" autofocus="true" style="width:100%;" type="tel" name="phone_number" id="phone" placeholder="'.__("Enter Phone Number",MoConstants::TEXT_DOMAIN).'" value="'.$admin_phone.'" title="'.__("Enter phone number(at least 10 digits) without any space or dashes.",MoConstants::TEXT_DOMAIN).'"/>
						</td>
						<td>&nbsp;&nbsp;
							<a style="cursor:pointer;" onclick="document.getElementById(\'phone_verification\').submit();">'.__("Resend OTP ?",MoConstants::TEXT_DOMAIN).'</a>
						</td>
					</tr>
				</table>
				<br><input type="submit" value="'.__("Send OTP",MoConstants::TEXT_DOMAIN).'" class="button button-primary button-large" />
		</form>

		<br>
		<h3>'.__("What is an OTP ?",MoConstants::TEXT_DOMAIN).'</h3>
		<p>'.__("OTP is a one time passcode ( a series of numbers) that is sent to your email or phone number to verify that you have access to your email account or phone.",MoConstants::TEXT_DOMAIN).'</p>
		</div></div>	
		<script>
			jQuery("#phone").intlTelInput();						
		</script>';