<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="uultra_default" class="app_enable" data-toggle="uultra_default_options" name="mo_customer_validation_uultra_default_enable" value="1"
										'.$uultra_enabled.' /><strong>User Ultra '. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

										get_plugin_form_link(MoConstants::UULTRA_FORM_LINK);

echo'							<div class="mo_registration_help_desc" '.$uultra_hidden.' id="uultra_default_options">
									<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
									<p><input type="radio" '.$disabled.' data-toggle="uultra_phone_instructions" id="uultra_phone" class="form_options app_enable" name="mo_customer_validation_uultra_enable_type" value="mo_uultra_phone_enable"
										'.( $uultra_enable_type == "mo_uultra_phone_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>';									

echo'									<div '.($uultra_enable_type  != "mo_uultra_phone_enable" ? "hidden" : "").' id="uultra_phone_instructions" class="mo_registration_help_desc">
											'. __( "Follow the following steps to enable Phone Verification",MoConstants::TEXT_DOMAIN).':
											<ol>
												<li><a href="'.$uultra_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on <b>Click here to add new field</b> button to add a new phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Fill up the details of your new field and click on <b>Submit New Field.</b>",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Keep the <b>Meta Key</b> handy as you will need it later on.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter the Meta Key of the phone field",MoConstants::TEXT_DOMAIN).': <input class="mo_registration_table_textbox" id="uultra_phone_field_key" name="uultra_phone_field_key" type="text" value="'.$uultra_field_key.'"></li>
											</ol>
										</div>
									</p>
									<p><input type="radio" '.$disabled.' id="uultra_email" class="form_options app_enable" name="mo_customer_validation_uultra_enable_type" value="mo_uultra_email_enable"
										 '.( $uultra_enable_type == "mo_uultra_email_enable" ? "checked" : "" ).' />
										 <strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<p><input type="radio" '.$disabled.' data-toggle="uultra_both_instructions" id="uultra_both" class="form_options app_enable" name="mo_customer_validation_uultra_enable_type" value="mo_uultra_both_enable"
										'.( $uultra_enable_type == "mo_uultra_both_enable" ? "checked" : "" ).' />
											<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

										mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'									<div '.($uultra_enable_type  != "mo_uultra_both_enable" ? "hidden" :"").' id="uultra_both_instructions" class="mo_registration_help_desc">
											'. __( "Follow the following steps to enable both Email and Phone Verification",MoConstants::TEXT_DOMAIN).':
											<ol>
												<li><a href="'.$uultra_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on <b>Click here to add new field</b> button to add a new phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Fill up the details of your new field and click on <b>Submit New Field.</b>",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Keep the <b>Meta Key</b> handy as you will need it later on.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter the Meta Key of the phone field",MoConstants::TEXT_DOMAIN).': <input class="mo_registration_table_textbox" id="uultra_phone_field_key1" name="uultra_phone_field_key" type="text" value="'.$uultra_field_key.'"></li>
											</ol>
										</div>
									</p>
								</div>
							</div>';