<?php
echo'			<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="classify_theme" class="app_enable" data-toggle="classify_options" name="mo_customer_validation_classify_enable" value="1"
										'.$classify_enabled.' /><strong>Classify Theme '. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

						get_plugin_form_link(MoConstants::CLASSIFY_LINK);

echo'							<div class="mo_registration_help_desc" '.$classify_hidden.' id="classify_options">

									<p><input type="radio" '.$disabled.' id="classify_email" class="app_enable" data-toggle="classify_email_instructions" name="mo_customer_validation_classify_type" value="classify_email_enable"
										'.( $classify_enabled_type == "classify_email_enable" ? "checked" : "").' />
										<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>

										<div '.($classify_enabled_type != "classify_email_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="classify_email_instructions" >
											'. __( "Follow the following to configure your Registration form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see the list of pages.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Edit option of the \"Register\" page",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "From the page Attributes section ,set \"Register Page\" from your template dropdown menu.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Update button to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
											'. __( "Follow the following to configure your Profile form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see the list of pages.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'.( $classify_enabled_type == "classify_email_enable" ? "checked" : ""). __( "Click on the Edit option of the \"Profile\" page",MoConstants::TEXT_DOMAIN).'</li>
												<li>'.( $classify_enabled_type == "classify_email_enable" ? "checked" : ""). __( "From the page Attributes section ,set \"Profile Page\" from your template dropdown menu.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'.( $classify_enabled_type == "classify_email_enable" ? "checked" : ""). __( "Click on the Update button to save your settings.",MoConstants::TEXT_DOMAIN).'</li><br><br>
											</ol>

											'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'
											</div>

									<p><input type="radio" '.$disabled.' id="classify_phone" class="app_enable" data-toggle="classify_phone_instructions" 	name="mo_customer_validation_classify_type" value="classify_phone_enable"
										'.( $classify_enabled_type == "classify_phone_enable" ? "checked" : "").' />
										<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>

									<div '.($classify_enabled_type != "classify_phone_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="classify_phone_instructions" >
										'. __( "Follow the following to configure your Registration form ",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see the list of pages.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Edit option of the \"Register\" page",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "From the page Attributes section ,set \"Register Page\" from your template dropdown menu.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Update button to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
										'. __( "Follow the following to configure your Profile form ",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$page_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see the list of pages.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Edit option of the \"Profile\" page",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "From the page Attributes section ,set \"Profile\" Page from your template dropdown menu.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the Update button to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
											</ol>

											'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'
											</div>

								</div>';
