<?php 

echo'

	 <div class="mo_registration_divided_layout">
		<div class="mo_registration_table_layout">';

			is_customer_registered();

echo '<form name="f" method="post" action="" id="mo_otp_verification_messages">
		<input type="hidden" name="option" value="mo_customer_validation_messages" />
			<table style="width:100%">
				<tr>
					<td>
						<h2>'.__("CONFIGURE MESSAGES",MoConstants::TEXT_DOMAIN).'
							<span style="float:right;margin-top:-10px;">
								<input type="submit" '.$disabled.' name="save" id="save" class="button button-primary button-large" 
									value="'.__("Save Settings",MoConstants::TEXT_DOMAIN).'"/>
							</span>
						</h2><hr/>
					</td>
				</tr>
				<tr>
					<td> <strong>'.__("Configure messages your users will see on successful and failure of Email or SMS delivery.",
										MoConstants::TEXT_DOMAIN).'</strong> </td>
				</tr>
				<tr>
					<td>
						<h3>'.__("Email Messages",MoConstants::TEXT_DOMAIN).'</h3><hr/>
						<div style="margin-left:1%;">
							<div style="margin-bottom:1%;"><strong>'.__("SUCCESS OTP MESSAGE",MoConstants::TEXT_DOMAIN).': </strong>
							<span style="color:red">'.__("( NOTE: ##email## in the message body will be replaced by the user's email address )",
															MoConstants::TEXT_DOMAIN).'</span></div>
							<textarea name="otp_success_email" rows="4" style="width:100%;padding:2%;">'.__($otp_success_email,MoConstants::TEXT_DOMAIN).'</textarea><br/><br/>
							<div style="margin-bottom:1%;"><strong>'.__("ERROR OTP MESSAGE",MoConstants::TEXT_DOMAIN).': </strong></div>
							<textarea name="otp_error_email" rows="4" style="width:100%;padding:2%;">'.__($otp_error_email,MoConstants::TEXT_DOMAIN).'</textarea><br/><br/>
							<div style="margin-bottom:1%;"><strong>'.__("BLOCKED EMAIL MESSAGE",MoConstants::TEXT_DOMAIN).': </strong>
							<span style="color:red">'.__("( NOTE: ##email## in the message body will be replaced by the user's email address )",
															MoConstants::TEXT_DOMAIN).'</span></div>
							<textarea name="otp_blocked_email" rows="4" style="width:100%;padding:2%;">'.__($otp_blocked_email,MoConstants::TEXT_DOMAIN).'</textarea><br/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h3>'.__("SMS/Mobile Messages",MoConstants::TEXT_DOMAIN).'</h3><hr/>
						<div style="margin-left:1%;">
							<div style="margin-bottom:1%;"><strong>'.__("SUCCESS OTP MESSAGE",MoConstants::TEXT_DOMAIN).': </strong>
							<span style="color:red">'.__("( NOTE: ##phone## in the message body will be replaced by the user's mobile number )",
															MoConstants::TEXT_DOMAIN).'</span></div>
							<textarea name="otp_success_phone" rows="4" style="width:100%;padding:2%;">'.__($otp_success_phone,MoConstants::TEXT_DOMAIN).'</textarea><br/><br/>
							<div style="margin-bottom:1%;"><strong>'.__("ERROR OTP MESSAGE",MoConstants::TEXT_DOMAIN).': </strong></div>
							<textarea name="otp_error_phone" rows="4" style="width:100%;padding:2%;">'.__($otp_error_phone,MoConstants::TEXT_DOMAIN).'</textarea><br/><br/>
							<div style="margin-bottom:1%;"><strong>'.__("INVALID FORMAT MESSAGE",MoConstants::TEXT_DOMAIN).': </strong>
							<span style="color:red">'.__("( NOTE: ##phone## in the message body will be replaced by the user's mobile number )",
															MoConstants::TEXT_DOMAIN).'</span></div>
							<textarea name="otp_invalid_phone" rows="4" style="width:100%;padding:2%;">'.__($otp_invalid_format,MoConstants::TEXT_DOMAIN).'</textarea><br/><br/>
							<div style="margin-bottom:1%;"><strong>'.__("BLOCKED PHONE MESSAGE",MoConstants::TEXT_DOMAIN).': </strong>
							<span style="color:red">'.__("( NOTE: ##phone## in the message body will be replaced by the user's mobile number )",
															MoConstants::TEXT_DOMAIN).'</span></div>
							<textarea name="otp_blocked_phone" rows="4" style="width:100%;padding:2%;">'.__($otp_blocked_phone,MoConstants::TEXT_DOMAIN).'</textarea><br/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h3>'.__("Common Messages",MoConstants::TEXT_DOMAIN).'</h3><hr/>
						<div style="margin-left:1%">
							<div style="margin-bottom:1%;"><strong>'.__("INVALID OTP MESSAGE",MoConstants::TEXT_DOMAIN).': </strong></div>
							<textarea name="invalid_otp" rows="4" style="width:100%;padding:2%;">'.__($invalid_otp,MoConstants::TEXT_DOMAIN).'</textarea><br/>
						</div>
					</td>
				</tr>

			</table>
	  </form>'; 

echo '
		</div>
	 </div>	';

