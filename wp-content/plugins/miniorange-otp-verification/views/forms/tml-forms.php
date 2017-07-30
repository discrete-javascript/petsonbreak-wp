<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="tml_default" class="app_enable" data-toggle="tml_options" name="mo_customer_validation_tml_enable" value="1"
			'.$tml_enabled.' /><strong>Theme My Login Form</strong>';

			get_plugin_form_link(MoConstants::TML_FORM_LINK);

echo'		<div class="mo_registration_help_desc" '.$tml_hidden.' id="tml_options">
				<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
				<p>
					<input type="radio" '.$disabled.' id="tml_phone" class="app_enable" name="mo_customer_validation_tml_enable_type" value="mo_tml_phone_enable"
						'.($tml_enable_type == "mo_tml_phone_enable" ? "checked" : "" ).'/>
							<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="tml_email" class="app_enable" name="mo_customer_validation_tml_enable_type" value="mo_tml_email_enable"
						'.($tml_enable_type == "mo_tml_email_enable"? "checked" : "" ).'/>
							<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="tml_both" class="app_enable" name="mo_customer_validation_tml_enable_type" value="mo_tml_both_enable"
						'.($tml_enable_type == "mo_tml_both_enable"? "checked" : "" ).'/>
							<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';
							mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));
echo '			</p>
			</div>
		</div>';