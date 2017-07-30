<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="wc_default" data-toggle="wc_default_options" class="app_enable" name="mo_customer_validation_wc_default_enable" value="1"
		'.$woocommerce_registration.' /><strong>Woocommerce '. __( "Registration Form",MoConstants::TEXT_DOMAIN).'</strong>';

			get_plugin_form_link(MoConstants::WC_FORM_LINK);

echo'		<div class="mo_registration_help_desc" '.$wc_hidden.' id="wc_default_options">
				<b>'. __( "Choose between Phone or Email Verification",MoConstants::TEXT_DOMAIN).'</b>
				<p>
					<input type="radio" '.$disabled.' id="wc_phone" class="app_enable" name="mo_customer_validation_wc_enable_type" value="mo_wc_phone_enable"
						'.($wc_enable_type == "mo_wc_phone_enable" ? "checked" : "" ).'/>
						<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="wc_email" class="app_enable" name="mo_customer_validation_wc_enable_type" value="mo_wc_email_enable"
						'.($wc_enable_type == "mo_wc_email_enable"? "checked" : "" ).'/>
						<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
				</p>
				<p>
					<input type="radio" '.$disabled.' id="wc_both" class="app_enable" name="mo_customer_validation_wc_enable_type" value="mo_wc_both_enable"
						'.($wc_enable_type == "mo_wc_both_enable"? "checked" : "" ).'/>
						<strong>'. __( "Let the user choose",MoConstants::TEXT_DOMAIN).'</strong>';
							mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));
echo '			</p>
				<b>'. __( "Select page to redirect to after registration",MoConstants::TEXT_DOMAIN).': </b>';
				if(get_option('mo_customer_validation_wc_redirect') && !MoUtility::isBlank(get_page_by_title(get_option("mo_customer_validation_wc_redirect"))))
					wp_dropdown_pages(array("selected" => get_page_by_title( get_option("mo_customer_validation_wc_redirect") )->ID));
				else
					wp_dropdown_pages();

echo'		</div>
		</div>';