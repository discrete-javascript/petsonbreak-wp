<?php 

echo'	<div class="mo_registration_divided_layout">
			<div class="mo_registration_table_layout">';

			is_customer_registered();

echo'			<form name="f" method="post" action="" id="mo_otp_verification_settings">
					<input type="hidden" id="error_message" name="error_message" value="">
					<input type="hidden" name="option" value="mo_otp_extra_settings" />
					<table style="width:100%">
						<tr>
							<td>
								<h2>'.__("OTP SETTINGS",MoConstants::TEXT_DOMAIN).'
								<span style="float:right;margin-top:-10px;">
									<input type="submit" '.$disabled.' name="save" id="save" class="button button-primary button-large" value="'.__("Save Settings",MoConstants::TEXT_DOMAIN).'"/>
								</span>
								</h2><hr>
							</td>
						</tr
						<tr>
							<td><strong><i>'.__("COUNTRY CODE: ",MoConstants::TEXT_DOMAIN).'</i></strong><br/></td>
						</tr>
						<tr>
							<td>
								<strong><i>'.__("Select Default Country Code",MoConstants::TEXT_DOMAIN).': </i></strong>
							';

								get_country_code_dropdown(); 
								mo_draw_tooltip(MoMessages::showMessage('COUNTRY_CODE_HEAD'),MoMessages::showMessage('COUNTRY_CODE_BODY'));

								echo "<i style='margin-left:1%''>".__("Country Code",MoConstants::TEXT_DOMAIN).": <span id='country_code'></span></i> " ;

echo						'</td>
						</tr>
						<tr>
							<td><hr></td>
						</tr>
						<tr>
							<td><strong><i>'.__("BLOCKED EMAIL DOMAINS: ",MoConstants::TEXT_DOMAIN).'</i></strong></td>
						</tr>
						<tr>
							<td><textarea name="mo_otp_blocked_email_domains" rows="5" style="width:100%" 
								placeholder="'.__(" Enter semicolon separated domains that you want to block. Eg. gmail.com ", MoConstants::TEXT_DOMAIN).'">'.$otp_blocked_email_domains.'</textarea></td>
						</tr>
						<tr>
							<td colspan="2"><hr></td>
						</tr>
						<tr>
							<td><strong><i>'.__("BLOCKED PHONE NUMBERS: ",MoConstants::TEXT_DOMAIN).'</i></strong></td>
						</tr>
						<tr>
							<td><textarea name="mo_otp_blocked_phone_numbers" rows="5" style="width:100%" 
								placeholder="'.__(" Enter semicolon separated phone numbers (with country code) that you want to block. Eg. +1XXXXXXXX ", MoConstants::TEXT_DOMAIN).'">'.$otp_blocked_phones.'</textarea></td>
						</tr>
					</table>
				</form>			
			</div>
		</div>';			