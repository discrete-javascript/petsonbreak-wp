<?php

echo' 	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="crf_default" class="app_enable" data-toggle="crf_default_options" name="mo_customer_validation_crf_default_enable" value="1"
				'.$crf_enabled.' /><strong>Custom User Registration Form Builder <i>( RegistrationMagic )</i></strong>';

						get_plugin_form_link(MoConstants::CRF_FORM_ENABLE);

echo'			<div class="mo_registration_help_desc" '.$crf_hidden.' id="crf_default_options">
					<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
					<p><input type="radio" '.$disabled.' id="crf_phone" data-toggle="crf_phone_instructions" class="form_options app_enable" name="mo_customer_validation_crf_enable_type" value="mo_crf_phone_enable"
						'.( $crf_enable_type == "mo_crf_phone_enable" ? "checked" : "" ).' />
							<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>';

echo'					<div '.($crf_enable_type != "mo_crf_phone_enable" ? "hidden" :"").' id="crf_phone_instructions" class="mo_registration_help_desc">
							'. __( "Follow the following steps to enable Phone Verification",MoConstants::TEXT_DOMAIN).':
							<ol>
								<li><a href="'.$crf_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Click on <b>fields</b> link of your form to see <i>special field</i> list of fields.",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Choose <b>phone number / mobile number </b> field from the list.",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Enter the <b>Label</b> of your new field. Keep this handy as you will need it later.",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Under RULES section check the box which says <b>Is Required</b>.",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Click on <b>Save</b> button to save your new field.",MoConstants::TEXT_DOMAIN).'</li>
								<li>'. __( "Enter the Label of the phone field",MoConstants::TEXT_DOMAIN).':<input class="mo_registration_table_textbox" id="crf_phone_field_key" name="crf_phone_field_key" type="text" value="'.$crf_phone_field_key.'"></li>
							</ol>
						</div>
					</p>
					<p><input type="radio" '.$disabled.' id="crf_email" data-toggle="crf_email_instructions" class="form_options app_enable" name="mo_customer_validation_crf_enable_type" value="mo_crf_email_enable"
						'.( $crf_enable_type == "mo_crf_email_enable" ? "checked" : "").' />
						<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
					</p>
					<div '.($crf_enable_type != "mo_crf_email_enable" ? "hidden" :"").' id="crf_email_instructions" class="crf_form mo_registration_help_desc">
						'. __( "Enter the Label of the email field",MoConstants::TEXT_DOMAIN).':<input class="mo_registration_table_textbox" id="crf_email_field_key" name="crf_email_field_key" type="text" value="'.$crf_email_field_key.'">
					</div>
					<p><input type="radio" '.$disabled.' id="crf_both" data-toggle="crf_both_instructions"  class="form_options app_enable" name="mo_customer_validation_crf_enable_type" value="mo_crf_both_enable"
						'.( $crf_enable_type == "mo_crf_both_enable"? "checked" : "" ).' />
						<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';

						mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo'				<div '.($crf_enable_type != "mo_crf_both_enable" ? "hidden" :"").' id="crf_both_instructions" class="mo_registration_help_desc">
						'. __( "Follow the following steps to enable both Email and Phone Verification",MoConstants::TEXT_DOMAIN).':
						<ol>
							<li><a href="'.$crf_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on <b>fields</b> link of your form to see <i>special field</i> list of fields.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Choose <b>phone number / mobile number </b> field from the list.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Enter the <b>Label</b> of your new field. Keep this handy as you will need it later.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Under RULES section check the box which says <b>Is Required</b>.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Click on <b>Save</b> button to save your new field.",MoConstants::TEXT_DOMAIN).'</li>
							<li>'. __( "Enter the Label of the phone field",MoConstants::TEXT_DOMAIN).':<input class="mo_registration_table_textbox" id="crf_phone_field_key1" name="crf_phone_field_key" type="text" value="'.$crf_phone_field_key.'"><br/>
							'. __( "Enter the Label of the email field",MoConstants::TEXT_DOMAIN).':&nbsp;&nbsp;<input class="mo_registration_table_textbox" id="crf_email_field_key1" name="crf_email_field_key" type="text" value="'.$crf_email_field_key.'"></li>
						</ol>
					</div>
				</p>
			</div>
		</div>';