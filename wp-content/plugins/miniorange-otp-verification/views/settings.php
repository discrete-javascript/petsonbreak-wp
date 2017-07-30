<?php

echo'		<div class="mo_registration_divided_layout">
			<div class="mo_registration_table_layout">';

			is_customer_registered();

echo'			<form name="f" method="post" action="" id="mo_otp_verification_settings">
					<input type="hidden" id="error_message" name="error_message" value="">
					<input type="hidden" name="option" value="mo_customer_validation_settings" />
					<table style="width:100%">
						<tr>
							<td>
								<h2>'.__("CONFIGURE YOUR FORM",MoConstants::TEXT_DOMAIN).'</h2>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="mo_otp_note">
								<b>'.__("By following these easy steps you can verify your users email or phone number instantly",
										MoConstants::TEXT_DOMAIN).':
								<ol>
									<li>'.__("Select the form from the list below.",MoConstants::TEXT_DOMAIN);  
										mo_draw_tooltip(MoMessages::showMessage('FORM_NOT_AVAIL_HEAD'),
														MoMessages::showMessage('FORM_NOT_AVAIL_BODY'));
echo'								</li>
									<li>'.__("Save your settings.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'.__("Log out and go to your registration or landing page for testing.",MoConstants::TEXT_DOMAIN).'</li>
									<li>'.__("To customize your SMS/Email messages/gateway check under",MoConstants::TEXT_DOMAIN).' 
											<a href="'.$config.'"> '.__("SMS/Email Templates Tab",MoConstants::TEXT_DOMAIN).'</a></li>
									<li>'.__("For any query related to custom SMS/Email messages/gateway check",MoConstants::TEXT_DOMAIN).' 
										<a href="'.$help_url.'"> '.__("Help & Troubleshooting Tab",MoConstants::TEXT_DOMAIN).'</a></li>
									<li>
									<div>
										<i><b>'.__("Cannot see your registration form in the list above? Have your own custom registration form?"
													,MoConstants::TEXT_DOMAIN).'</b></i>';
										mo_draw_tooltip(MoMessages::showMessage('FORM_NOT_AVAIL_HEAD'),
														MoMessages::showMessage('FORM_NOT_AVAIL_BODY'));
echo'								</div>
									</li>
									</b>
								</ol>
								</div>
								<br>
								<div class="mo_otp_note" style="color:#942828;">
									'.__( " <b>Need a developer documentation? Wish to integrate your form with the plugin? </b> <br/> <i>If you wish to integrate the plugin with your form then you can follow our documentation. Contact us at info@miniorange.com or use the support section on the right to avail the documentaion.</i>", MoConstants::TEXT_DOMAIN).'
								<div>
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr></td>
						</tr>
						<tr>
							<td>
								<h2>'.__("Select your form from the list",MoConstants::TEXT_DOMAIN).': </h2>
								<!--<div style="margin-top:1em;margin-left:1%;float:left;"><input type="text" id="mo_search" 
									placeholder="Search for your form"></input></div>-->
								</td><td>';

								get_otp_verification_form_dropdown();
								mo_draw_tooltip(MoMessages::showMessage('FORM_NOT_AVAIL_HEAD'),MoMessages::showMessage('FORM_NOT_AVAIL_BODY'));
echo'							
							</td>
						</tr>
					</table>
					<table id="mo_forms" style="width: 100%;">
						<tr>
							<td><strong><i>'.__("REGISTRATION FORMS",MoConstants::TEXT_DOMAIN).'</i></strong><hr></td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/wp-registration.php';							
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/woocommerce-registration.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/woocommerce-checkout.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/woocommerce-social-login.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/profile-builder.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/simplr-registration.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/ultimate-member.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/event-registration.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/buddypress-registration.php';
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/registrationmagic.php'; 
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/userultra-registration.php';
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/userprofile-registration.php';
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/pie-registration.php';						
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/cf7.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/ninja-forms.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/ninja-forms-v3.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/tml-forms.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/userpro-registration.php';							
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/gravity-forms.php';							
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/wp-member.php';							
echo'						</td>
						</tr>
						<tr>
							<td>';
								include $controller . 'forms/ultimatepro.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/classify-register.php';							
echo'						</td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/reales-theme.php';							
echo'						</td>
						</tr>
					</table>
					<br>
					<table id="mo_forms" style="width: 100%;">
						<tr>
							<td><strong><i>'.__("LOGIN FORMS",MoConstants::TEXT_DOMAIN).'</i></strong><hr></td>
						</tr>
						<tr>
	 						<td>';
								include $controller . 'forms/wp-login.php';											
echo'						</td>
						</tr>
					</table>
					<input type="button" id="ov_settings_button"  
						title="'.__("Please select atleast one form from the list above to enable this button",MoConstants::TEXT_DOMAIN).'" 
						value="'.__("Save",MoConstants::TEXT_DOMAIN).'" style="float:left;margin-bottom:2%;" '.$disabled.'
						class="button button-primary button-large" />
			</form>
		</div>
	</div>';