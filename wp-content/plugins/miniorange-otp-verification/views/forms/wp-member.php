<?php

	echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="wp_member_reg" class="app_enable" data-toggle="wp_member_reg_options" name="mo_customer_validation_wp_member_reg_enable" value="1"
	'.$wp_member_reg_enabled.' /><strong>WP Members</strong>';

		get_plugin_form_link(MoConstants::WP_MEMBER_LINK);	

	echo'	<div class="mo_registration_help_desc" '.$wp_member_reg_hidden.' id="wp_member_reg_options">
				<p><input type="radio" '.$disabled.' id="wpmembers_reg_phone" class="app_enable" data-toggle="wpmembers_reg_phone_instructions" name="mo_customer_validation_wp_member_reg_enable_type" value="mo_wpmember_reg_phone_enable"
					'.( $wpmember_enabled_type == "mo_wpmember_reg_phone_enable" ? "checked" : "").' />
						<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>

				<div '.($wpmember_enabled_type != "mo_wpmember_reg_phone_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="wpmembers_reg_phone_instructions">			
					'. __( "Follow the following steps to enable Phone Verification for WP Member",MoConstants::TEXT_DOMAIN).':
					<ol>
						<li><a href="'.$wpm_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( "to see your list of the fields.",MoConstants::TEXT_DOMAIN).'</li>
						<li>'. __( "Enable Day Phone field for your form and keep it required.",MoConstants::TEXT_DOMAIN).'</li>
						<li>'. __( "Create a new text field with meta key <i>validate_otp</i> where users can enter the validation code.",MoConstants::TEXT_DOMAIN).'</li>
						<li>'. __( "Click on the save button below to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
					</ol>
				</div>

				<p><input type="radio" '.$disabled.' id="wpmembers_reg_email" class="app_enable" data-toggle="wpmembers_reg_email_instructions" name="mo_customer_validation_wp_member_reg_enable_type" value="mo_wpmember_reg_email_enable"
					'.( $wpmember_enabled_type == "mo_wpmember_reg_email_enable" ? "checked" : "").' />
					<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>

			<div '.($wpmember_enabled_type != "mo_wpmember_reg_email_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="wpmembers_reg_email_instructions">			
					'. __( "Follow the following steps to enable Email Verification for WP Member",MoConstants::TEXT_DOMAIN).':
					<ol>
						<li><a href="'.$wpm_field_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '.__( "to see your list of fields.",MoConstants::TEXT_DOMAIN).'</li>
						<li>'. __( "Create a new text field with meta key <i>validate_otp</i> where users can enter the validation code.",MoConstants::TEXT_DOMAIN).'</li>
						<li>'. __( "Click on the save button below to save your settings.",MoConstants::TEXT_DOMAIN).'</li>
					</ol>
			</div>					
		</div>';
			