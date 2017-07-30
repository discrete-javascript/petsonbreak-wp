<?php	

echo'<!--Register with miniOrange-->
	<form name="f" method="post" action="" id="register-form">
		<input type="hidden" name="option" value="mo_registration_register_customer" />
		<div class="mo_registration_divided_layout">
			<div class="mo_registration_table_layout">
				<h3>'.__("Register with miniOrange",MoConstants::TEXT_DOMAIN).'</h3>
				<p>'.__("Please enter a valid email that you have access to. You will be able to move forward after verifying an OTP that we will be sending to this email.",MoConstants::TEXT_DOMAIN).' <b>OR</b> '.__("Login using your miniOrange credentials.",MoConstants::TEXT_DOMAIN).'</p>
				<table class="mo_registration_settings_table">
					<tr>
						<td><b><font color="#FF0000">*</font>'.__("Email:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" type="email" name="email"
							required placeholder="person@example.com"
							value="'.$current_user->user_email.'" /></td>
					</tr>

					<tr>
						<td><b><font color="#FF0000">*</font>'.__("Website/Company Name:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="company"
							required placeholder="'.__("Enter your companyName",MoConstants::TEXT_DOMAIN).'"
							value="'.$_SERVER["SERVER_NAME"].'" /></td>
						<td></td>
					</tr>

					<tr>
						<td><b>&nbsp;&nbsp;'.__("FirstName:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="fname"
							placeholder="'.__("Enter your First Name",MoConstants::TEXT_DOMAIN).'"
							value="'.$current_user->user_firstname.'" /></td>
						<td></td>
					</tr>

					<tr>
						<td><b>&nbsp;&nbsp;'.__("LastName:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="lname"
							placeholder="'.__("Enter your Last Name",MoConstants::TEXT_DOMAIN).'"
							value="'.$current_user->user_lastname.'" /></td>
						<td></td>
					</tr>

					<tr>
						<td><b>&nbsp;&nbsp;'.__("Phone number:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" type="tel" id="phone"
							pattern="[\+]\d{7,14}|[\+]\d{1,4}[\s]\d{6,12}" name="phone"
							title="'.MoMessages::showMessage('MO_REG_ENTER_PHONE').'"
							placeholder="'.MoMessages::showMessage('MO_REG_ENTER_PHONE').'"
							value="'.$admin_phone.'" /><br>'.__("We will call only if you need support.",MoConstants::TEXT_DOMAIN).'</td>
						<td></td>
					</tr>

					<tr>
						<td><b><font color="#FF0000">*</font>'.__("Password:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" required type="password"
							name="password" placeholder="'.__("Choose your password (Min. length 6)",MoConstants::TEXT_DOMAIN).'" /></td>
					</tr>
					<tr>
						<td><b><font color="#FF0000">*</font>'.__("Confirm Password:",MoConstants::TEXT_DOMAIN).'</b></td>
						<td><input class="mo_registration_table_textbox" required type="password"
							name="confirmPassword" placeholder="'.__("Confirm your password",MoConstants::TEXT_DOMAIN).'" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><br /><input type="submit" name="submit" value="'.__("Next",MoConstants::TEXT_DOMAIN).'" style="width:100px;"
							class="button button-primary button-large" /></td>
					</tr>
				</table>
			</div>
		</div>
	</form>';