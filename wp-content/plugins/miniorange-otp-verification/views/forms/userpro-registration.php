<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="userpro_registration" class="app_enable" data-toggle="userpro_registration_options" name="mo_customer_validation_userpro_registration_enable" value="1"
										'.$userpro_enabled.' /><strong>UserPro Form</strong>';

									get_plugin_form_link(MoConstants::USERPRO_FORM_LINK);								 

echo'							<div class="mo_registration_help_desc" '.$userpro_hidden.' id="userpro_registration_options">
									<p><input type="checkbox" '.$disabled.' class="form_options" '.$automatic_verification.' id="mo_customer_validation_userpro_verify" name="mo_customer_validation_userpro_verify" value="1"/> &nbsp;<strong>'. __("Verify users after registration",MoConstants::TEXT_DOMAIN).'</strong><br/></p>
									<p><input type="radio" '.$disabled.' id="userpro_registration_email" class="app_enable" data-toggle="userpro_registration_email_instructions" name="mo_customer_validation_userpro_registration_type" value="mo_userpro_registration_email_enable"
										'.( $userpro_enabled_type == "mo_userpro_registration_email_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<div '.($userpro_enabled_type != "mo_userpro_registration_email_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="userpro_registration_email_instructions" >
											'. __( "Follow the following steps to enable Email Verification for UserPro Form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of the page which has your UserPro form",MoConstants::TEXT_DOMAIN).'.</li>
												<li>'. __( "Add the following short code just below your",MoConstants::TEXT_DOMAIN).__( "UserPro Form shortcode on the profile and registration pages",MoConstants::TEXT_DOMAIN).': <code>[mo_verify_email_userpro]</code> </li>
												<li>
													'. __( "Add a New Custom Field to your Form. Give the following parameters to the new field",MoConstants::TEXT_DOMAIN).': 
													<ol>
														<li>'. __( "Give the <i>Field Title</i> as ",MoConstants::TEXT_DOMAIN).'<code>Verify Email</code></li>
														<li>'. __( "Give the <i>Field Type</i> as ",MoConstants::TEXT_DOMAIN).'<code>Text Input</code></li>
														<li>'. __( "Give the <i>Unique Field Key</i> as ",MoConstants::TEXT_DOMAIN).'<code>'.MoConstants::USERPRO_VER_FIELD_META.'</code></li>
														<li>'. __( "Make the Field as a required field.",MoConstants::TEXT_DOMAIN).'</li>
													</ol>
												</li>
												<li>'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>
									<p><input type="radio" '.$disabled.' id="userpro_registration_phone" class="app_enable" data-toggle="userpro_registration_phone_instructions" name="mo_customer_validation_userpro_registration_type" value="mo_userpro_registration_phone_enable"
										'.( $userpro_enabled_type == "mo_userpro_registration_phone_enable" ? "checked" : "").' />
											<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<div '.($userpro_enabled_type != "mo_userpro_registration_phone_enable" ? "hidden" : "").' class="mo_registration_help_desc" id="userpro_registration_phone_instructions" >
											'. __( "Follow the following steps to enable Phone Verification for UserPro Form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of the page which has your UserPro form.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add the following short code just below your UserPro Form shortcode on the profile and registration pages",MoConstants::TEXT_DOMAIN).': <code>[mo_verify_phone_userpro]</code> </li>
												<li><a href="'.$userpro_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( "to see your list of UserPro fields.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add a Phone Number Field to your Form from the available fields list",MoConstants::TEXT_DOMAIN).'.</li>
												<li>'. __( "Add Ajax Call Check for your Phone Number field",MoConstants::TEXT_DOMAIN).': <code>mo_phone_validation</code></li>
												<li>
													'. __( "Add a New Custom Field to your Form. Give the following parameters to the new field",MoConstants::TEXT_DOMAIN).': 
													<ol>
														<li>'. __( "Give the <i>Field Title</i> as ",MoConstants::TEXT_DOMAIN).'<code>Verify Phone</code></li>
														<li>'. __( "Give the <i>Field Type</i> as ",MoConstants::TEXT_DOMAIN).'<code>Text Input</code></li>
														<li>'. __( "Give the <i>Unique Field Key</i> as ",MoConstants::TEXT_DOMAIN).'<code>'.MoConstants::USERPRO_VER_FIELD_META.'</code></li>
														<li>'. __( "Make the Field as a required field.",MoConstants::TEXT_DOMAIN).'</li>
													</ol>
												</li>
												<li>'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>
								</div>
							</div>';