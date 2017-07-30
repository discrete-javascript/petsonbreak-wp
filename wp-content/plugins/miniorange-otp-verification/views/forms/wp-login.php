<?php

echo'				<div class="mo_otp_form">
						<input type="checkbox" '.$disabled.' id="wp_login" class="app_enable" data-toggle="wp_login_options" name="mo_customer_validation_wp_login_enable" value="1"
								'.$wp_login_enabled.' /><strong>WordPress '. __( "Default Login Form <i>( SMS Verification )</i>",MoConstants::TEXT_DOMAIN).'</strong>';

echo'					<div class="mo_registration_help_desc" '.$wp_login_hidden.' id="wp_login_options">
							'. __( "Follow the following steps to add a users phone number in the database",MoConstants::TEXT_DOMAIN).': 
							<ol>									
								<li>'. __( "Enter the phone User Meta Key",MoConstants::TEXT_DOMAIN);

								mo_draw_tooltip(MoMessages::showMessage('META_KEY_HEADER'),MoMessages::showMessage('META_KEY_BODY'));

echo'							: <input class="mo_registration_table_textbox" id="wp_login_phone_field_key" name="wp_login_phone_field_key" type="text" value="'.$wp_login_field_key.'">
								<div class="mo_otp_note" style="margin-top:1%">
									'.__( "If you don't know the metaKey against which the phone number is stored for all your users then put the default value as phone." ).'
								</div>
								<li>'. __( "Click on the Save Button below to save your settings.",MoConstants::TEXT_DOMAIN).'</li>						
							</ol>
							<input type="checkbox" '.$disabled.' id="wp_login_reg" name="mo_customer_validation_wp_login_register_phone" value="1"
								'.$wp_login_enabled_type .' /><strong>'. __( "Allow the user to add a phone number if it does not exist.",MoConstants::TEXT_DOMAIN).'</strong><br/><br/>
							<input type="checkbox" '.$disabled.' id="wp_login_admin" name="mo_customer_validation_wp_login_bypass_admin" 	value="1"
								'.$wp_login_admin.' /><strong>'. __( "Allow the administrator to bypass OTP verification during login.",MoConstants::TEXT_DOMAIN).'</strong><br/><br/>
							<input type="checkbox" '.$disabled.' id="wp_login_admin" name="mo_customer_validation_wp_login_allow_phone_login" 	value="1"
								'.$wp_login_with_phone.' /><strong>'. __( "Allow users to login with their phone number.",MoConstants::TEXT_DOMAIN).'</strong><br/><br/>
							<input type="checkbox" '.$disabled.' id="wp_login_admin" name="mo_customer_validation_wp_login_restrict_duplicates"	value="1"
								'.$wp_handle_duplicates.' /><strong>'. __( "Do not allow users to use the same phone number for multiple accounts.",MoConstants::TEXT_DOMAIN).'</strong>
						</div>
					</div>';

