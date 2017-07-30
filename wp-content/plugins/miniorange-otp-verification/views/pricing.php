<?php

echo' <div class="mo_registration_pricing_layout" style="width:'.$width.'">';

is_customer_registered();

echo'<table class="mo_registration_pricing_table">
		<h2>'.__("LICENSING PLANS",MoConstants::TEXT_DOMAIN).'
			<span style="float:right">
				<input type="button" '.$disabled.' name="check_btn" id="check_btn" 
						class="button button-primary button-large" value="'.__("Check License",MoConstants::TEXT_DOMAIN).'"/>
				<input type="button" name="ok_btn" id="ok_btn" class="button button-primary button-large" 
						value="'.__("OK, Got It",MoConstants::TEXT_DOMAIN).'" onclick="window.location.href=\''.$settings.'\'" />
			</span>
		<h2>
		<hr>
		<tr style="vertical-align:top;">';

			if(!$plan)
			{
echo'			<td>
					<div class="mo_registration_thumbnail mo_registration_pricing_free_tab" >
						<h3 class="mo_registration_pricing_header">'.$free_plan_name.'</h3>
						<h4 class="mo_registration_pricing_sub_header">
							'.__("( You are automatically on this plan )",MoConstants::TEXT_DOMAIN).'<br/><br/>
						</h4>
						<hr>
						<!--<p class="mo_registration_pricing_text">For 1 site - Forever</p><hr>-->
						<p  style="margin-bottom: 30.5%;" class="mo_registration_pricing_text">
							$0 - '.__("One Time Payment",MoConstants::TEXT_DOMAIN).'<br/><br/>
							'.__("10 SMS and 10 Email Verifications through miniOrange gateway",MoConstants::TEXT_DOMAIN).'<br/><br/><br/>
						</p>
						<hr>
						<p class="mo_registration_pricing_text">'.__("Features:",MoConstants::TEXT_DOMAIN).'</p>
						<p class="mo_registration_pricing_text" >';

							foreach($free_plan_features as $feature)
								echo $feature . '<br/>';
echo'
						</p>
						<hr>
						<p class="mo_registration_pricing_text">Basic Support by Email</p>
					</div>
				</td>';
			}

echo'		<td>
				<div class="mo_registration_thumbnail mo_registration_pricing_paid_tab">
					<h3 class="mo_registration_pricing_header">';

					mo_draw_tooltip(MoMessages::showMessage('YOUR_GATEWAY_HEADER'),
									MoMessages::showMessage('YOUR_GATEWAY_BODY'));

echo 				$basic_plan_name.'
					</h3>
						<h4 class="mo_registration_pricing_sub_header">';
						if($vl)
echo'							<input type="button" style="margin-bottom:3.8%;" '.$disabled.' 
										class="button button-primary button-large" 
										onclick="mo2f_upgradeform(\'email_verification_upgrade_instances_plan\')" 
										value="'.__("Buy More Instances",MoConstants::TEXT_DOMAIN).'"></input>
						</h4>';
						else
							echo'<input type="button" style="margin-bottom:3.8%;" '.$disabled.' 
										class="button button-primary button-large" 
										onclick="mo2f_upgradeform(\'wp_email_verification_intranet_basic_plan\')" 
										value="'.__("Upgrade Now",MoConstants::TEXT_DOMAIN).'"></input></h4>';

echo'				<hr>
					<p style="margin-bottom: 17.7%;" class="mo_registration_pricing_text"><b>'.$basic_plan_price.'</b><br/><br/>
						'.__("Unlimited OTP Generation and Verification through the plugin.",MoConstants::TEXT_DOMAIN).'<br/><br/><br/>
						  	<span style="color:#791d1d"><i>
						  		'.__("SMS and Email delivery will be through your gateway",MoConstants::TEXT_DOMAIN).'
						  	</i></span>
					</p>
					<hr>
					<p class="mo_registration_pricing_text">Features:</p>
					<p class="mo_registration_pricing_text" >';

							foreach($basic_plan_features as $feature)
								echo $feature . '<br/>';
echo'
						</p>
					<hr>
					<p class="mo_registration_pricing_text">'.__("Premium Support Plans",MoConstants::TEXT_DOMAIN).'</p>
				</div>
			</td>
		</td>
		<td><div class="mo_registration_thumbnail mo_registration_pricing_free_tab">
				<h3 class="mo_registration_pricing_header">';

					mo_draw_tooltip(MoMessages::showMessage('MO_GATEWAY_HEADER'),
									MoMessages::showMessage('MO_GATEWAY_BODY'));

echo 				$premium_plan_name.'
					</h3>
				<h4 class="mo_registration_pricing_sub_header">';
						if(strcmp($plan,MoConstants::PCODE)!=0 && strcmp($plan,MoConstants::BCODE)!=0 && strcmp($plan,MoConstants::CCODE)!=0)
echo'							<input type="button" style="margin-bottom:3.8%;"  '.$disabled.' class="button button-primary button-large" 
										onclick="mo2f_upgradeform(\'wp_otp_verification_basic_plan\')" 
										value="'.__("Upgrade Now",MoConstants::TEXT_DOMAIN).'"></input>';
						else
echo'							<input type="button" style="margin-bottom:3.8%;"  '.$disabled.' class="button button-primary button-large" 
										onclick="mo2f_upgradeform(\'otp_recharge_plan\')" 
										value="'.__("Recharge",MoConstants::TEXT_DOMAIN).'"></input>';

echo' 			</h4>
				<hr>
				<div style="margin-top:4.5%;" class="mo_registration_pricing_text"><b>'.$premium_plan_price.'</b><br/>+</div>
					<table>
					<tr>
						<td class="mo_registration_pricing_text" style="width:25%">For Email:</td>
					  	<td><select class="mo-form-control">
					    	<option>$5 &nbsp; per 100 Email</option>
							<option>$15 &nbsp; per 500 Email</option>
							<option>$22 &nbsp; per 1k &nbsp; Email</option>
							<option>$30 per 5k &nbsp; Email</option>
							<option>$40 per 10k Email</option>
						 	<option>$90 per 50k Email</option>
					  		</select>
					  	</td>
					</tr>
					<tr>
						<td class="mo_registration_pricing_text" style="width:25%">For SMS:</td>
					  	<td><select class="mo-form-control">
					    	<option>$5 &nbsp; per 100 OTP* + SMS delivery charges</option>
							<option>$15 &nbsp; per 500 OTP* + SMS delivery charges</option>
							<option>$22 &nbsp; per 1k &nbsp;  OTP* + SMS delivery charges</option>
							<option>$30 per 5k &nbsp; OTP* + SMS delivery charges</option>
							<option>$40 per 10k OTP* + SMS delivery charges</option>
							<option>$90 per 50k OTP* + SMS delivery charges</option>
					  		</select>
					  	</td>		
					</tr>
					</table>
					    <p class="mo_registration_pricing_text">
					   	 <i><span style="color:#b01a1a">'.__("SMS delivery charges depend on country",MoConstants::TEXT_DOMAIN).'**</span><br/>
					   	 	'.__("You can refill at anytime <br/> Lifetime validity",MoConstants::TEXT_DOMAIN).'</i>
					    </p>
				<br/>
				<hr>
				<p class="mo_registration_pricing_text">Features:</p>
				<p class="mo_registration_pricing_text" >';

						foreach($premium_plan_features as $feature)
							echo $feature . '<br/>';
echo'
						</p><hr>
				<p class="mo_registration_pricing_text">Premium Support Plans</p>
			</div></td>
		</td>
		</tr>

		</table>
		<br>
		<div id="disclaimer" style="margin-bottom:15px;">
			<span style="font-size:15px;">
				<b>'.__("SMS gateway",MoConstants::TEXT_DOMAIN).'</b>
					'.__(" is a service provider for sending SMS on your behalf to your users.",MoConstants::TEXT_DOMAIN).'<br>
				<b>'.__("SMTP gateway",MoConstants::TEXT_DOMAIN).'</b>
					'.__(" is a service provider for sending Emails on your behalf to your users.",MoConstants::TEXT_DOMAIN).'<br><br>
				*'.__("Transaction prices may very depending on country. If you want to use more than 50k transactions, mail us at",
						MoConstants::TEXT_DOMAIN).' 
					<a href="mailto:'.MoConstants::SUPPORT_EMAIL.'"><b>'.MoConstants::SUPPORT_EMAIL.'</b></a> 
					'.__("or submit a support request using the support form under User",MoConstants::TEXT_DOMAIN).' 
					<a href="'.$profile_url.'">'.__("Profile tab",MoConstants::TEXT_DOMAIN).'</a>.<br/><br/>
				**'.__("If you want to <b>use miniorange SMS/SMTP gateway</b>, and your country is not in list, mail us at",
						MoConstants::TEXT_DOMAIN).' <a href="mailto:'.MoConstants::SUPPORT_EMAIL.'"><b>'.MoConstants::SUPPORT_EMAIL.'</b></a>
						'.__("or submit a support request using the support form under User",MoConstants::TEXT_DOMAIN).' 
						<a href="'.$profile_url.'">'.__("Profile tab",MoConstants::TEXT_DOMAIN).'</a>. 
						'.__("We will get back to you promptly.",MoConstants::TEXT_DOMAIN).'<br><br>
				***'.__("<b>Custom integration charges</b> will be applied for supporting a registration form which is not already supported 
						by our plugin. Each request will be handled on a per case basis.",MoConstants::TEXT_DOMAIN).'<br>
			</span>
		</div>

		<h3>'.__("10 Days Return Policy",MoConstants::TEXT_DOMAIN).' -</h3>
		<p>'.__("At miniOrange, we want to ensure you are 100% happy with your purchase.  If the premium plugin you purchased is not working as 
				advertised and you have attempted to resolve any feature issues with our support team, which couldn't get resolved. We will 
				refund the whole amount within 10 days of the purchase. Please email us at",MoConstants::TEXT_DOMAIN).' 
				<a href="mailto:'.MoConstants::SUPPORT_EMAIL.'">'.MoConstants::SUPPORT_EMAIL.'</a> 
				'.__("for any queries regarding the return policy.<br> If you have any doubts regarding the licensing plans, you can mail us at"
					,MoConstants::TEXT_DOMAIN).' <a href="mailto:'.MoConstants::SUPPORT_EMAIL.'">'.MoConstants::SUPPORT_EMAIL.'</a> 
				'.__("or submit a query using the support form.",MoConstants::TEXT_DOMAIN).'</p>
		<br>

		</div>

	 <form style="display:none;" id="mocf_loginform" action="'.$form_action.'" target="_blank" method="post">
		<input type="email" name="username" value="'.$email.'" />
		<input type="text" name="redirectUrl" value="'.$redirect_url.'" />
		<input type="text" name="requestOrigin" id="requestOrigin"  />
	</form>
	<form id="mo_ln_form" style="display:none;" action="" method="post">
		<input type="hidden" name="option" value="check_mo_ln" />
	</form>
	<script>
		function mo2f_upgradeform(planType){
			jQuery("#requestOrigin").val(planType);
			jQuery("#mocf_loginform").submit();
		}
	</script>';