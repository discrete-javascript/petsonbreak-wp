<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="reales_reg" class="app_enable" data-toggle="reales_options" name="mo_customer_validation_reales_enable" value="1"
			'.$reales_enabled.' /><strong>Reales WP Theme '. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

			get_plugin_form_link(MoConstants::REALES_THEME);

echo'		<div class="mo_registration_help_desc" '.$reales_hidden.' id="reales_options">
				<b>Choose between Phone or Email Verification</b>
				<p>
					<input type="radio" '.$disabled.' id="reales_phone" class="app_enable" name="mo_customer_validation_reales_enable_type" value="mo_reales_phone_enable"
						'.($reales_enable_type == "mo_reales_phone_enable" ? "checked" : "" ).'/>
						<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="reales_email" class="app_enable" name="mo_customer_validation_reales_enable_type" value="mo_treales_email_enable"
						'.($reales_enable_type == "mo_reales_email_enable"? "checked" : "" ).'/>
						<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
			</div>
		</div>';

