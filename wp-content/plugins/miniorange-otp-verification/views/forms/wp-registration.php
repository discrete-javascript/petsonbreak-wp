<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="wp_default" class="app_enable" data-toggle="wp_default_options" name="mo_customer_validation_wp_default_enable" value="1"
			'.$default_registration.' /><strong>WordPress '. __( "Default Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

echo'		<div class="mo_registration_help_desc" '.$wp_default_hidden.' id="wp_default_options">
				<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
				<p>
					<input type="radio" '.$disabled.' id="wp_default_phone" class="app_enable" name="mo_customer_validation_wp_default_enable_type" value="mo_wp_default_phone_enable"
						'.($wp_default_type == "mo_wp_default_phone_enable" ? "checked" : "" ).'/>
						<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="wp_default_email" class="app_enable" name="mo_customer_validation_wp_default_enable_type" value="mo_wp_default_email_enable"
						'.($wp_default_type == "mo_wp_default_email_enable"? "checked" : "" ).'/>
						<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="wp_default_both" class="app_enable" name="mo_customer_validation_wp_default_enable_type" value="mo_wp_default_both_enable"
						'.($wp_default_type == "mo_wp_default_both_enable"? "checked" : "" ).'/>
						<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';
							mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));
echo '			</p>
			</div>
		</div>';