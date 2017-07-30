<?php

echo'	<div class="mo_otp_form">
							<input type="checkbox" '.$disabled.' id="upme_default" class="app_enable" data-toggle="upme_default_options" name="mo_customer_validation_upme_default_enable" value="1"
								 '.$upme_enabled.' /><strong>UserProfile Made Easy '. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

									get_plugin_form_link(MoConstants::UPME_FORM_LINK);						 

echo '								<div class="mo_registration_help_desc" '.$upme_hidden.' id="upme_default_options">
									<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
									<p><input type="radio" '.$disabled.' data-toggle="upme_phone_instructions" id="upme_phone" class="form_options app_enable" name="mo_customer_validation_upme_enable_type" value="mo_upme_phone_enable"
										'.( $upme_enable_type == "mo_upme_phone_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>';

echo'									</p>
										<div '.($upme_enable_type != "mo_upme_phone_enable" ? "hidden" : "").' id="upme_phone_instructions" class="mo_registration_help_desc">
											'. __( "Follow the following steps to enable Phone Verification",MoConstants::TEXT_DOMAIN).':
											<ol>
												<li><a href="'.$upme_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on <b>Click here to add new field</b> button to add a new phone field.",MoConstants::TEXT_DOMAIN).' </li>
												<li>'. __( "Fill up the details of your new field and click on <b>Submit New Field</b>.",MoConstants::TEXT_DOMAIN).' </li>
												<li>'. __( "Keep the <b>Meta Key</b> handy as you will need it later on.",MoConstants::TEXT_DOMAIN).' </li>
												<li>'. __( "Enter the Meta Key of the phone field",MoConstants::TEXT_DOMAIN).': <input class="mo_registration_table_textbox" id="upme_phone_field_key" name="upme_phone_field_key" type="text" value="'.$upme_field_key.'"></li>
											</ol>
										</div>

									<p><input type="radio" '.$disabled.' id="upme_email" class="form_options app_enable" name="mo_customer_validation_upme_enable_type" value="mo_upme_email_enable"
										'.( $upme_enable_type == "mo_upme_email_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<p><input type="radio" '.$disabled.' data-toggle="upme_both_instructions" id="upme_both" class="form_options app_enable" name="mo_customer_validation_upme_enable_type" value="mo_upme_both_enable"
										'.( $upme_enable_type == "mo_upme_both_enable" ? "checked" : "").' />
											<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

										mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'									<div '.($upme_enable_type != "mo_upme_both_enable" ? "hidden" :"").' id="upme_both_instructions" class="mo_registration_help_desc">
											'. __( "Follow the following steps to enable both Email and Phone Verification",MoConstants::TEXT_DOMAIN).':
											<ol>
												<li><a href="'.$upme_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on <b>Click here to add new field</b> button to add a new phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Fill up the details of your new field and click on <b>Submit New Field</b>.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Keep the <b>Meta Key</b> handy as you will need it later on.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter the Meta Key of the phone field",MoConstants::TEXT_DOMAIN).': <input class="mo_registration_table_textbox" id="upme_phone_field_key1" name="upme_phone_field_key" type="text" value="'.$upme_field_key.'"></li>
											</ol>
										</div>
									</p>
								</div>
							</div>';