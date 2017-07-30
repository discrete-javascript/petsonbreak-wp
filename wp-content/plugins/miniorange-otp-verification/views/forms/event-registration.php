<?php

echo' 		<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="event_default" class="app_enable" data-toggle="event_default_options" name="mo_customer_validation_event_default_enable" value="1"
					'.$event_enabled.'/><strong>Event'. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

						get_plugin_form_link(MoConstants::EVENT_FORM);

echo'			<div class="mo_registration_help_desc" '.$event_hidden.' id="event_default_options">
					<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
					<p><input type="radio" '.$disabled.' id="event_phone" class="app_enable" name="mo_customer_validation_event_enable_type" value="mo_event_phone_enable"
							'.( $event_enabled_type == "mo_event_phone_enable" ? "checked" : "").' />
								<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
							</p>
							<p>
								<input type="radio" '.$disabled.' id="event_email" class="app_enable" name="mo_customer_validation_event_enable_type" value="mo_event_email_enable"
								'.( $event_enabled_type == "mo_event_email_enable" ? "checked" : "").' />
								<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
							</p>
									<p>
										<input type="radio" '.$disabled.' id="event_both" class="app_enable" name="mo_customer_validation_event_enable_type" value="mo_event_both_enable"
											'.( $event_enabled_type == "mo_event_both_enable" ? "checked" : "").' />
											<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

											mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'								</p>
				</div>
			</div>';