<?php

echo'			<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="ultimatepro" class="app_enable" data-toggle="ultipro_options" name="mo_customer_validation_ultipro_enable" value="1"
										'.$ultipro_enabled.' /><strong>Ultimate Membership Pro Form</strong>';

								get_plugin_form_link(MoConstants::UM_PRO_LINK);															 

echo'							<div class="mo_registration_help_desc" '.$ultipro_hidden.' id="ultipro_options">
									<p><input type="radio" '.$disabled.' id="ultipro_email" class="app_enable" data-toggle="ultipro_email_instructions" name="mo_customer_validation_ultipro_type" value="mo_ultipro_email_enable"
										'.( $ultipro_enabled_type == "mo_ultipro_email_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>

										<div '.($ultipro_enabled_type != "mo_ultipro_email_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="ultipro_email_instructions" >
											'. __( "Follow the following steps to enable Email Verification for Ultimate membership Pro Form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of the page which has your Ultimate membership Pro registration form",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add the following short code just below the given registration shortcode",MoConstants::TEXT_DOMAIN).': <code>[mo_email]</code> </li>
												<li><a href="'.$umpro_custom_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( "to see the list of your custom fields.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add a custom text field with slug \"validate\" and label \"Enter Validation Code\" in your registration page.Use this text field to enter the OTP received. Make sure it's a required field.",MoConstants::TEXT_DOMAIN).'</li>								
												<li>'. __( "Click on the Save Button below to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>
									<p><input type="radio" '.$disabled.' id="ultipro_phone" class="app_enable" data-toggle="ultipro_phone_instructions" name="mo_customer_validation_ultipro_type" value="mo_ultipro_phone_enable"
										'.( $ultipro_enabled_type == "mo_ultipro_phone_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>

										<div '.($ultipro_enabled_type != "mo_ultipro_phone_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="ultipro_phone_instructions" >
											'. __( "Follow the following steps to enable Phone Verification for Ultimate membership Pro Form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of the page which has your Ultimate membership Pro registration form",MoConstants::TEXT_DOMAIN).'.</li>
												<li>'. __( "Add the following short code just below the given registration shortcode",MoConstants::TEXT_DOMAIN).': <code>[mo_phone]</code> </li>
												<li><a href="'.$umpro_custom_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( "to see the list of your custom fields.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the edit option for the phone field and change the field type to text. Click on save to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enable the phone field for your registration form and make sure it is a required field.",MoConstants::TEXT_DOMAIN).'</li>  
												<li>'. __( "Add a custom text field with slug \"validate\" and label \"Enter Validation Code\" in your registration page. Use this text field to enter the OTP received. Make sure it's a required field.",MoConstants::TEXT_DOMAIN).'</li>								
												<li>'. __( "Click on the Save Button below to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>

								</div>
							</div>';