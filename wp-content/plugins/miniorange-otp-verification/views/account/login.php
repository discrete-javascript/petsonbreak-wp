<?php		

echo'	<form name="f" method="post" action="">
			<input type="hidden" name="option" value="mo_registration_connect_verify_customer" />
			<div class="mo_registration_divided_layout">
				<div class="mo_registration_table_layout">
					<h3>'.__("Login with miniOrange",MoConstants::TEXT_DOMAIN).'</h3>
					<p><b>'.__("It seems you already have an account with miniOrange. Please enter your miniOrange email and password.",MoConstants::TEXT_DOMAIN).'</td><a href="#forgot_password"> '.__("Click here if you forgot your password?",MoConstants::TEXT_DOMAIN).'</a></b></p>
					<table class="mo_registration_settings_table">
						<tr>
							<td><b><font color="#FF0000">*</font>'.__("Email:",MoConstants::TEXT_DOMAIN).'</b></td>
							<td><input class="mo_registration_table_textbox" type="email" name="email"
								required placeholder="person@example.com"
								value="'.$admin_email.'" /></td>
						</tr>
						<tr>
							<td><b><font color="#FF0000">*</font>'.__("Password:",MoConstants::TEXT_DOMAIN).'</b></td>
							<td><input class="mo_registration_table_textbox" required type="password"
								name="password" placeholder="'.__("Enter your miniOrange password",MoConstants::TEXT_DOMAIN).'" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" class="button button-primary button-large" />
								<a href="#goBackButton" class="button button-primary button-large">Cancel</a>
						</tr>
					</table>
				</div>
			</div>
		</form>
		<form id="forgotpasswordform" method="post" action="">
			<input type="hidden" name="option" value="mo_registration_forgot_password" />
		</form>
		<form id="goBacktoRegistrationPage" method="post" action="">
			<input type="hidden" name="option" value="mo_registration_go_back" />
		</form>
		<script>
			jQuery(document).ready(function(){
				$mo(\'a[href="#forgot_password"]\').click(function(){
					$mo("#forgotpasswordform").submit();
				});

				$mo(\'a[href="#goBackButton"]\').click(function(){
					$mo("#goBacktoRegistrationPage").submit();
				});
			});
		</script>';
