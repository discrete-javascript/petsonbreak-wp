<?php

echo '<div class="mo_registration_divided_layout">
				<div class="mo_registration_table_layout">';
				is_customer_registered();

		echo '<table style="width: 100%;">
			<tr>
				<td colspan="3">
					<h3>'.__("SMS & EMAIL CONFIGURATION",MoConstants::TEXT_DOMAIN).'</h3><hr>
				</td>
			</tr>
			<tr>
				<td>
					<b>'.__("Look at the sections below to customize the Email and SMS that you receive:",MoConstants::TEXT_DOMAIN).'</b>
					<ol>
						<li><b><a href="#sms">'.__("Custom SMS Template",MoConstants::TEXT_DOMAIN).'</a> :
							</b> '.__("Change the text of the message that you receive on your phones.",MoConstants::TEXT_DOMAIN).'</li>
						<li><b><a href="#sms">'.__("Custom SMS Gateway",MoConstants::TEXT_DOMAIN).'</a> :
							</b> '.__("You can configure settings to use your own SMS gateway.",MoConstants::TEXT_DOMAIN).'</li>
						<li><b><a href="#email">'.__("Custom Email Template",MoConstants::TEXT_DOMAIN).'</a> :
							</b> '.__("Change the text of the email that you receive.",MoConstants::TEXT_DOMAIN).'</li>
						<li><b><a href="#email">'.__("Custom Email Gateway",MoConstants::TEXT_DOMAIN).'</a> :
							</b> '.__("You can configure settings to use your own Email gateway.",MoConstants::TEXT_DOMAIN).'</li>
					</ol>
			</tr>
			<tr>
				<td>
					<i><b>'.__("How can I change the SenderID/Number of the SMS I receive?",MoConstants::TEXT_DOMAIN).'</b></i>';
						mo_draw_tooltip(MoMessages::showMessage('CHANGE_SENDER_ID_HEAD'),MoMessages::showMessage('CHANGE_SENDER_ID_BODY'));
echo'			</td>
			</tr>
			<tr>
				<td>
					<i><b>'.__("How can I change the Sender Email of the Email I receive?",MoConstants::TEXT_DOMAIN).'</b></i>';
						mo_draw_tooltip(MoMessages::showMessage('CHANGE_EMAIL_ID_HEAD'),MoMessages::showMessage('CHANGE_EMAIL_ID_BODY'));
echo'			</td>
			</tr>
			<tr id="sms">
				<td>
					<h2>'.__("SMS Configuration",MoConstants::TEXT_DOMAIN).'</h2><hr/>
				</td>
			</tr>
			<tr>
				<td>
					<b>'.__("Custom SMS Template:",MoConstants::TEXT_DOMAIN).'</b>
					<div style="padding:2%;background-color: rgba(111, 111, 111, 0.09);">
						<img src=" '. MOV_URL .$sms_template_guide_url. ' " />
						<div '. $hidden. ' style="text-align:center">
							<input '. $disabled. ' type="button" 
								title="'.__("Need to be registered for this option to be available",MoConstants::TEXT_DOMAIN).'"  
								value="'.__("Change SMS Template",MoConstants::TEXT_DOMAIN).'" 
								onclick="extraSettings(\''.MoConstants::HOSTNAME.'\',\'/moas/showsmstemplate\');" 
								class="button button-primary button-large" style="margin-right: 3%;">
						</div>
					</div>
					<b>Custom SMS Gateway:</b>
					<div style="padding:2%;background-color: rgba(111, 111, 111, 0.09);">
						<img src=" '. MOV_URL .$sms_gateway_guide_url. '" />
						<div '. $hidden. ' style="text-align:center">
							<input '. $disabled. ' type="button" 
								title="'.__("Need to be registered for this option to be available",MoConstants::TEXT_DOMAIN).'"  
								value="'.__("Change SMS Gateway",MoConstants::TEXT_DOMAIN).'" 
								onclick="extraSettings(\''.MoConstants::HOSTNAME.'\',\'/moas/smsconfig\');" 
								class="button button-primary button-large" style="margin-right: 3%;">
						</div>	
					</div>
				</td>
			</tr>
			<tr id="email">
				<td>
					<h2>'.__("Email Configuration",MoConstants::TEXT_DOMAIN).'</h2><hr/>
				</td>
			</tr>
			<tr>
				<td>
					<b>Custom Email Template:</b>
					<div style="padding:2%;background-color: rgba(111, 111, 111, 0.09);">
						<img src=" '. MOV_URL .$email_template_guide_url . '" />
						<div '. $hidden. ' style="text-align:center">
							<input '. $disabled. ' type="button" 
								title="'.__("Need to be registered for this option to be available",MoConstants::TEXT_DOMAIN).'"  
								value="'.__("Change Email Template",MoConstants::TEXT_DOMAIN).'" 
								onclick="extraSettings(\''.MoConstants::HOSTNAME.'\',\'/moas/showemailtemplate\');" 
								class="button button-primary button-large" style="margin-right: 3%;">
						</div>
					</div>
					<b>Custom Email Gateway:</b>
					<div style="padding:2%;background-color: rgba(111, 111, 111, 0.09);">
						<img src=" '. MOV_URL .$email_gateway_guide_url . '" />
						<div '. $hidden. ' style="text-align:center">
							<input type="button" '. $disabled. ' 
								title="'.__("Need to be registered for this option to be available",MoConstants::TEXT_DOMAIN).'" 
								value="'.__("Change Email Gateway",MoConstants::TEXT_DOMAIN).'" 
								onclick="extraSettings(\''.MoConstants::HOSTNAME.'\',\'/moas/configureSMTP\');" 
								class="button button-primary button-large" style="margin-right: 3%;">
						</div>
					</div>
				</td>
			</tr>
		</table>
		<form id="showExtraSettings" action="'. MoConstants::HOSTNAME.'/moas/login" target="_blank" method="post">
	       <input type="hidden" id="extraSettingsUsername" name="username" value=" '. $email.'"/>
	       <input type="hidden" id="extraSettingsRedirectURL" name="redirectUrl" value="" />
		</form>
	</div>
	</div>';
	?>