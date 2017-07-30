<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="simplr_default" data-toggle="simplr_default_options" class="app_enable" name="mo_customer_validation_simplr_default_enable" value="1"
				'.$simplr_enabled.' /><strong>Simplr User Registration Form Plus</strong>';

					get_plugin_form_link(MoConstants::SIMPLR_FORM_LINK);

echo'			<div class="mo_registration_help_desc" '.$simplr_hidden.' id="simplr_default_options">
					<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
						<p><input type="radio" '.$disabled.' data-toggle="simplr_phone_instruction" id="simplr_phone" class="form_options app_enable" name="mo_customer_validation_simplr_enable_type" value="mo_phone_enable"
							'.( $simplr_enabled_type == "mo_phone_enable" ? "checked" : "" ).' />
								<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>';

echo'						<div '.($simplr_enabled_type!= "mo_phone_enable" ? "hidden" : "").' id="simplr_phone_instruction" class="mo_registration_help_desc">
								'. __( "Follow the following steps to enable Phone Verification",MoConstants::TEXT_DOMAIN).':
								<ol>
									<li><a href="'.$simplr_fields_page.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Add a new Phone Field by clicking the <b>Add Field</b> button.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Give the <b>Field Name</b> and <b>Field Key</b> for the new field. Remember the Field Key as you will need it later.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Click on <b>Add Field</b> button at the bottom of the page to save your new field.",MoConstants::TEXT_DOMAIN).'</li>
									<li><a href="'.$page_list.'" target="_blank	">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Click on the <b>Edit</b> link of your page to modify it.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "In the ShortCode add the following attribute",MoConstants::TEXT_DOMAIN).': <b>fields="{Field Key you provided in Step 2}"</b>. '. __( "If you already have the fields attribute defined then just add the new field key to the list.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Click on <b>update</b> to save your page.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'. __( "Enter the Field Key of the phone field",MoConstants::TEXT_DOMAIN).':<input class="mo_registration_table_textbox" id="simplr_phone_field_key1" name="simplr_phone_field_key" type="text" value="'.$simplr_field_key.'"></li>
								</ol>
							</div>
							</p>
							<p><input type="radio" '.$disabled.' id="simplr_email" class="form_options app_enable" name="mo_customer_validation_simplr_enable_type" value="mo_email_enable"
									'.( $simplr_enabled_type == "mo_email_enable" ? "checked" : "").' />
									<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
							</p>
							<p><input type="radio" '.$disabled.' data-toggle="simplr_both_instruction" id="simplr_both" class="form_options app_enable" name="mo_customer_validation_simplr_enable_type" value="mo_both_enable"
									'.( $simplr_enabled_type == "mo_both_enable" ? "checked" : "").' />
									<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

									mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'							<div '.($simplr_enabled_type != "mo_both_enable" ? "hidden" : "").' id="simplr_both_instruction" class="mo_registration_help_desc">
									'. __( "Follow the following steps to enable Email and Phone Verification",MoConstants::TEXT_DOMAIN).':
									<ol>
										<li><a href="'.$simplr_fields_page.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of fields",MoConstants::TEXT_DOMAIN).'
										<li>'. __( "Add a new Phone Field by clicking the <b>Add Field</b> button.",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "Give the <b>Field Name</b> and <b>Field Key</b> for the new field. Remember the Field Key as you will need it later.",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "Click on <b>Add Field</b> button at the bottom of the page to save your new field.",MoConstants::TEXT_DOMAIN).'</li>
										<li><a href="'.$page_list.'" target="_blank	">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of pages",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "Click on the <b>Edit</b> link of your page to modify it.",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "In the ShortCode add the following attribute",MoConstants::TEXT_DOMAIN).': <b>fields="{Field Key you provided in Step 2}"</b>. '. __( "If you already have the fields attribute defined then just add the new field key to the list.",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "Click on <b>update</b> to save your page.",MoConstants::TEXT_DOMAIN).'</li>
										<li>'. __( "Enter the Field Key of the phone field",MoConstants::TEXT_DOMAIN).': <input class="mo_registration_table_textbox" id="simplr_phone_field_key2" name="simplr_phone_field_key" type="text" value="'.$simplr_field_key.'"></li>
									</ol>
								</div>
							</p>
						</div>
					</div>';