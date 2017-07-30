<?php

echo'	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="ninja_form" class="app_enable" data-toggle="ninja_form_options" name="mo_customer_validation_ninja_form_enable" value="1"
										'.$ninja_form_enabled.' /><strong>Ninja Forms <i>'. __( "( Below Version 3.0 )",MoConstants::TEXT_DOMAIN).'</i></strong>';

									get_plugin_form_link(MoConstants::NINJA_FORMS_LINK);								 

echo'							<div class="mo_registration_help_desc" '.$ninja_form_hidden.' id="ninja_form_options">
									<p><input type="radio" '.$disabled.' id="ninja_form_email" class="app_enable" data-toggle="nfe_instructions" name="mo_customer_validation_ninja_form_enable_type" value="mo_ninja_form_email_enable"
										'.( $ninja_form_enabled_type == "mo_ninja_form_email_enable" ? "checked" : "").' />
										<strong>'. __( "Enable Email Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<div '.($ninja_form_enabled_type != "mo_ninja_form_email_enable" ? "hidden" :"").' class="mo_registration_help_desc" id="nfe_instructions" >
											'. __( "Follow the following steps to enable Email Verification for",MoConstants::TEXT_DOMAIN).' Ninja Form: 
											<ol>
												<li><a href="'.$ninja_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of your ninja form.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add an Email Field to your form. Note the Field Key of the email field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter your Form ID and the Email Field ID below",MoConstants::TEXT_DOMAIN).':<br>
													<br/>'. __( "Add Form ",MoConstants::TEXT_DOMAIN).': <input type="button"  value="+" '. $disabled .' onclick="add_form(\'email\',1);" class="button button-primary" />&nbsp;
													<input type="button" value="-" '. $disabled .' onclick="remove_form(1);" class="button button-primary" /><br/><br/>';

													$form_results = get_nf_form_list($ninja_form_otp_enabled,$disabled,1); 
													$counter1 	  =  MoUtility::isBlank($form_results['counter']) ? max($form_results['counter']-1,0) : 0 ;

echo'											</li>
												<li>'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>
									<p><input type="radio" '.$disabled.' id="ninja_form_phone" class="app_enable" data-toggle="nfp_instructions" name="mo_customer_validation_ninja_form_enable_type" value="mo_ninja_form_phone_enable"
										'.( $ninja_form_enabled_type == "mo_ninja_form_phone_enable" ? "checked" : "").' />
										<strong>'. __( "Enable Phone Verification",MoConstants::TEXT_DOMAIN).'</strong>
									</p>
									<div '.($ninja_form_enabled_type != "mo_ninja_form_phone_enable" ? "hidden" : "").' class="mo_registration_help_desc" id="nfp_instructions" >
											'. __( "Follow the following steps to enable Phone Verification for Ninja Form",MoConstants::TEXT_DOMAIN).': 
											<ol>
												<li><a href="'.$ninja_form_list.'" target="_blank">'. __( "Click Here",MoConstants::TEXT_DOMAIN).'</a> '. __( " to see your list of forms",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Click on the <b>Edit</b> option of your ninja form.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add an Phone Field to your form. Note the Field ID of the phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Make sure you have set the Input Mask type to None for the phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter your Form ID and the Email Field ID below",MoConstants::TEXT_DOMAIN).':<br>
													<br/>'. __( "Add Form ",MoConstants::TEXT_DOMAIN).': <input type="button"  value="+" '. $disabled .' onclick="add_form(\'phone\',2);" class="button button-primary" />&nbsp;
													<input type="button" value="-" '. $disabled .' onclick="remove_form(2);" class="button button-primary" /><br/><br/>';

													$form_results = get_nf_form_list($ninja_form_otp_enabled,$disabled,2); 
													$counter2 	  =  MoUtility::isBlank($form_results['counter']) ? max($form_results['counter']-1,0) : 0 ;
echo'											</li>
												<li>Click on the Save Button below to save your settings</li>
											</ol>
									</div>
									<p><input type="radio" '.$disabled.' id="ninja_form_both" class="app_enable" data-toggle="nfb_instructions" name="mo_customer_validation_ninja_form_enable_type" value="mo_ninja_form_both_enable"
										'.( $ninja_form_enabled_type == "mo_ninja_form_both_enable" ? "checked" : "").' />
											<strong>'. __( "Let the user Choose",MoConstants::TEXT_DOMAIN).'</strong>';

										mo_draw_tooltip(MoMessages::showMessage('INFO_HEADER'),MoMessages::showMessage('ENABLE_BOTH_BODY'));

echo								'</p>
									<div '.($ninja_form_enabled_type != "mo_ninja_form_both_enable" ? "hidden" : "").' class="mo_registration_help_desc" id="nfb_instructions" >
											'. __( "Follow the following steps to enable Phone Verification for Ninja Form",MoConstants::TEXT_DOMAIN).':
											<ol>
												<li><a href="'.$ninja_form_list.'" target="_blank">Click Here</a> to see your list of forms.</li>
												<li>'. __( "Click on the <b>Edit</b> option of your ninja form.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Add an Email and Phone Field to your form. Note the Field ID of the fields.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Make sure you have set the Input Mask type to None for the phone field.",MoConstants::TEXT_DOMAIN).'</li>
												<li>'. __( "Enter your Form ID, Email Field ID and Phone Field ID below:",MoConstants::TEXT_DOMAIN).'<br>
													<br/>'. __( "Add Form",MoConstants::TEXT_DOMAIN).': <input type="button"  value="+" '. $disabled .' onclick="add_form(\'both\',3);" class="button button-primary" />&nbsp;
													<input type="button" value="-" '. $disabled .' onclick="remove_form(3);" class="button button-primary" /><br/><br/>';

													$form_results = get_nf_form_list($ninja_form_otp_enabled,$disabled,3); 
													$counter3	  =  MoUtility::isBlank($form_results['counter']) ? max($form_results['counter']-1,0) : 0 ;
echo'											</li>
												<li>'. __( "Click on the Save Button below to save your settings",MoConstants::TEXT_DOMAIN).'</li>
											</ol>
									</div>
								</div>
							</div>';

echo 						'<script>
								var count1, count2, count3;
								function add_form(t,n){
									var countIdpAttr = this["count"+n];
									var hidden1="",hidden2="",space="",both="";
									if(n==1)
										hidden2 = "hidden";
									if(n==2)
										hidden1 = "hidden";
									if(n!=3)
										space = "&nbsp;";
									if(n==3)
										both = "both_";
									countIdpAttr += 1;
									var sel = "<div id=\'row"+n+"_"+countIdpAttr+"\'> '.__( "Form ID", MoConstants::TEXT_DOMAIN).': <input id=\'ninja_form"+countIdpAttr+"\' class=\'field_data\' name=\'ninja_form[form][]\' type=\'text\' value=\'\'/> <span "+hidden1+" >&nbsp;'.__( "Email Field ID", MoConstants::TEXT_DOMAIN).': <input id=\'ninja_form_"+both+"email_"+countIdpAttr+"\'  class=\'field_data\' name=\'ninja_form[emailkey][]\' type=\'text\' value=\'\'></span> <span "+hidden2+">"+space+"'.__( "Phone Field ID", MoConstants::TEXT_DOMAIN).': <input id=\'ninja_form_"+both+"phone_"+countIdpAttr+"\' class=\'field_data\' name=\'ninja_form[phonekey][]\' type=\'text\' value=\'\'></span></div>"
									if(countIdpAttr!=0)
										$mo(sel).insertAfter($mo(\'#row\'+n+\'_\'+(countIdpAttr-1)+\'\'));
									this["count"+n]=countIdpAttr;
								}
								function remove_form(){
									var countIdpAttr =   Math.max(this["count1"],this["count2"],this["count3"]);
									if(countIdpAttr != 0){
										$mo("#row1_" + countIdpAttr).remove();
										$mo("#row2_" + countIdpAttr).remove();
										$mo("#row3_" + countIdpAttr).remove();
										countIdpAttr -= 1;
										this["count3"]=this["count1"]=this["count2"]=countIdpAttr;
									}
								}
								jQuery(document).ready(function(){  count1 = '. $counter1 .'; count2 = ' .$counter2. '; count3 = ' .$counter3. ' });
							</script>';

