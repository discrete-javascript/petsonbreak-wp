<?php

echo'		<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="um_default" data-toggle="um_default_options" class="app_enable" name="mo_customer_validation_um_default_enable" value="1"
					'.$um_enabled.' /><strong>Ultimate Member '. __( "Registration Form",MoConstants::TEXT_DOMAIN) . '</strong>';

							get_plugin_form_link(MoConstants::UM_ENABLED);

echo'		<div class="mo_registration_help_desc" '.$um_hidden.' id="um_default_options">
				<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
				<p>
					<input type="radio" '.$disabled.' id="um_phone" data-toggle="um_phone_instructions" class="app_enable" name="mo_customer_validation_um_enable_type" value="mo_um_phone_enable"
					'.( $um_enabled_type == "mo_um_phone_enable" ? "checked" : "").'/>
						<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>

					<div '.($um_enabled_type != "mo_um_phone_enable" ? "hidden" : "").' id="um_phone_instructions" hidden class="mo_registration_help_desc">
						'. __( "Follow the following steps to enable Phone Verification",MoConstants::TEXT_DOMAIN).':
						<ol>
							<li><a href="'.$um_forms.'"  target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on the <b>Edit link</b> of your form.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Add a new <b>Mobile Number</b> Field from the list of predefined fields.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on <b>update</b> to save your form.",MoConstants::TEXT_DOMAIN).'</li>
						</ol>
					</div>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="um_email" class="app_enable" name="mo_customer_validation_um_enable_type" value="mo_um_email_enable"
					'.( $um_enabled_type == "mo_um_email_enable" ? "checked" : "").' />
						<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="um_both" data-toggle="um_both_instructions" class="app_enable" name="mo_customer_validation_um_enable_type" value="mo_um_both_enable"
						'.( $um_enabled_type == "mo_um_both_enable" ? "checked" : "").' />
						<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

						mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'				<div '.($um_enabled_type != "mo_um_both_enable" ? "hidden" : "").' id="um_both_instructions" hidden class="mo_registration_help_desc">
						'. __( "Follow the following steps to enable Email and Phone Verification",MoConstants::TEXT_DOMAIN).':
						<ol>
							<li><a href="'.$um_forms.'">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on the <b>Edit link</b> of your form.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Add a new <b>Mobile Number</b> Field from the list of predefined fields.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on <b>update</b> to save your form.",MoConstants::TEXT_DOMAIN).'</li>
						</ol>
					</div>
				</p>
			</div>
		</div>';