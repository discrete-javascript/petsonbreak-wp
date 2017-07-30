<?php

	function is_customer_registered()
	{
		$registration_url = add_query_arg( array('page' => 'otpaccount'), $_SERVER['REQUEST_URI'] );
		if(MoUtility::micr())  return;
		echo '<div style="display:block;margin-top:10px;color:red;background-color:rgba(251, 232, 0, 0.15);
							padding:5px;border:solid 1px rgba(255, 0, 9, 0.36);">
		 <a href="'.$registration_url.'">'.__( "Register or Login with miniOrange",MoConstants::TEXT_DOMAIN) .'</a> 
		 	'. __( "to enable OTP Verification",MoConstants::TEXT_DOMAIN).'</div>';
	}

	function get_plugin_form_link($formalink)
	{
		echo '<a class="dashicons dashicons-admin-page" href="'.$formalink.'" title="'.$formalink.'" ></a>';
	}

	function mo_draw_tooltip($header,$message)
	{
		echo '<span class="tooltip">
				<span class="dashicons dashicons-editor-help"></span>
				<span class="tooltiptext"><span class="header"><b><i>'. __( $header,MoConstants::TEXT_DOMAIN).'</i></b></span><br/><br/>
				<span class="body">'.__($message,MoConstants::TEXT_DOMAIN).'</span></span>
			  </span>';
	}

	function extra_post_data($data=null)
	{
		$mo_fields 		= array('option','mo_customer_validation_otp_token','miniorange_otp_token_submit',
								'miniorange-validate-otp-choice-form','submit','mo_customer_validation_otp_choice');
		$extrafields1 	= array('user_login','user_email','register_nonce','option','register_tml_nonce'); 
		$extrafields2 	= array('register_nonce','option','form_id','timestamp'); 

		if  (	isset($_SESSION[FormSessionVars::WC_DEFAULT_REG])
				|| 	isset($_SESSION[FormSessionVars::CRF_DEFAULT_REG])
				|| 	isset($_SESSION[FormSessionVars::UULTRA_REG])
				|| 	isset($_SESSION[FormSessionVars::UPME_REG])
				|| 	isset($_SESSION[FormSessionVars::PIE_REG])
				|| 	isset($_SESSION[FormSessionVars::PB_DEFAULT_REG])
				|| 	isset($_SESSION[FormSessionVars::NINJA_FORM])
				|| 	isset($_SESSION[FormSessionVars::USERPRO_FORM])
				||	isset($_SESSION[FormSessionVars::EVENT_REG])
				||  isset($_SESSION[FormSessionVars::BUDDYPRESS_REG])
				||  isset($_SESSION[FormSessionVars::WP_DEFAULT_LOGIN])
				||  isset($_SESSION[FormSessionVars::WP_LOGIN_REG_PHONE])
				||  isset($_SESSION[FormSessionVars::CLASSIFY_REGISTER])
			)
		{
			foreach ($_POST as $key => $value)
			{
				if(!in_array($key,$mo_fields))
					show_hidden_fields($key,$value);
				if(isset($_REQUEST['g-recaptcha-response']))
					 echo '<input type="hidden" name="g-recaptcha-response" value="'.$_POST['g-recaptcha-response'].'" />';
				if(isset($_POST['attendee']))
				{
					$i = 0;
				    while($i<count($_POST['attendee'])){
				    	echo ' <input type="hidden" name="attendee['.$i.'][first_name]" value="'.$_POST["attendee"][$i]["first_name"].'">';
				    	echo ' <input type="hidden" name="attendee['.$i.'][last_name]" value="'.$_POST["attendee"][$i]["last_name"].'">';
				    	$i++;
					}
				}
			}
		}
		elseif  (	(isset($_SESSION[FormSessionVars::WC_SOCIAL_LOGIN])
					|| isset($_SESSION[FormSessionVars::UM_DEFAULT_REG]))
					&& !MoUtility::isBlank($data)
				)
		{
			foreach ($data as $key => $value)
			{
				if(!in_array($key, $extrafields2))
					show_hidden_fields($key,$value);
			}
		}elseif (	(isset($_SESSION[FormSessionVars::TML_REG])
					|| 	isset($_SESSION[FormSessionVars::WP_DEFAULT_REG]))
					&& !MoUtility::isBlank($_POST)
				)
		{
			foreach ($_POST as $key => $value)
			{
				if(!in_array($key, $extrafields1))
					show_hidden_fields($key,$value);
			}
		}
	}

	function show_hidden_fields($key,$value)
	{
		if(is_array($value))
			foreach ($value as $t => $val)
				echo '<input type="hidden" name="'.$key.'[]" value="'.$val.'" />';
		else	
			echo '<input type="hidden" name="'.$key.'" value="'.$value.'" />';
	}

	function miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,$message,$otp_type,$from_both)
	{
		if(!headers_sent()) header('Content-Type: text/html; charset=utf-8');
		$img = "<div style='display:table;text-align:center;'><img src='".MOV_LOADER_URL."'></div>";
		echo '<html>
				<head>
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" type="text/css" href="' . MOV_CSS_URL . '" />
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				</head>
				<body>
					<div class="mo-modal-backdrop">
						<div class="mo_customer_validation-modal" tabindex="-1" role="dialog" id="mo_site_otp_form">
							<div class="mo_customer_validation-modal-backdrop"></div>
							<div class="mo_customer_validation-modal-dialog mo_customer_validation-modal-md">
								<div class="login mo_customer_validation-modal-content">
									<div class="mo_customer_validation-modal-header">
										<b>'.__( "Validate OTP (One Time Passcode)", MoConstants::TEXT_DOMAIN ).'</b>
										<a class="close" href="#" onclick="mo_validation_goback();" >
											'.__( '&larr; Go Back' ,MoConstants::TEXT_DOMAIN ).'
										</a>
									</div>
									<div class="mo_customer_validation-modal-body center">
										<div>'.__($message,MoConstants::TEXT_DOMAIN).'</div><br /> ';
										if(!MoUtility::isBlank($user_email) || !MoUtility::isBlank($phone_number))
										{
		echo'								<div class="mo_customer_validation-login-container">
												<form id="mo_validate_form" name="f" method="post" action="">
													<input type="hidden" name="option" value="miniorange-validate-otp-form" />
													<input type="number" name="mo_customer_validation_otp_token"  
														autofocus="true" placeholder="" id="mo_customer_validation_otp_token" 
														required="true" class="mo_customer_validation-textbox" autofocus="true" 
														pattern="[0-9]{4,8}" 
														title="'.__("Only digits within range 4-8 are allowed.",MoConstants::TEXT_DOMAIN).'"/>
														<br />
													<input type="submit" name="miniorange_otp_token_submit" 
														id="miniorange_otp_token_submit" class="miniorange_otp_token_submit"  
														value="'.__("Validate OTP",MoConstants::TEXT_DOMAIN).'" />
													<input type="hidden" name="otp_type" value="'.$otp_type.'">';
													if(!$from_both){
		echo'											<input type="hidden" id="from_both" name="from_both" value="false">
														<a style="float:right"  onclick="mo_otp_verification_resend();">
															'.__("Resend OTP",MoConstants::TEXT_DOMAIN).'</a>';
													}else{
		echo'											<input type="hidden" id="from_both" name="from_both" value="true">
														<a style="float:right"  onclick="mo_select_goback();">
															'.__("Resend OTP",MoConstants::TEXT_DOMAIN).'</a>';
													}
													extra_post_data();
		echo'									</form>
												<div id="mo_message" hidden 
													style="background-color: #f7f6f7;padding: 1em 2em 1em 1.5em;color:black;">'.$img.'</div>
											</div>';
										}
		echo'						</div>
								</div>
							</div>
						</div>
					</div>
					<form name="f" method="post" action="" id="validation_goBack_form">
						<input id="validation_goBack" name="option" value="validation_goBack" type="hidden"></input>
					</form>

					<form name="f" method="post" action="" id="verification_resend_otp_form">
						<input id="verification_resend_otp" name="option" value="verification_resend_otp_'.$otp_type.'" type="hidden"></input>';
						if(!$from_both)
		echo'				<input type="hidden" id="from_both" name="from_both" value="false">';
						else
		echo'				<input type="hidden" id="from_both" name="from_both" value="true">';

						extra_post_data();

		echo'		</form>

					<form name="f" method="post" action="" id="goBack_choice_otp_form">
						<input id="verification_resend_otp" name="option" value="verification_resend_otp_both" type="hidden"></input>
						<input type="hidden" id="from_both" name="from_both" value="true">';

						extra_post_data();

		echo'		</form>

					<style> .mo_customer_validation-modal{ display: block !important; } </style>
					<script>
						function mo_validation_goback(){
							document.getElementById("validation_goBack_form").submit();
						}

						function mo_otp_verification_resend(){
							document.getElementById("verification_resend_otp_form").submit();
						}

						function mo_select_goback(){
							document.getElementById("goBack_choice_otp_form").submit();
						}
						jQuery(document).ready(function() {
							$mo = jQuery;
							$mo("#mo_validate_form").submit(function(){
								$mo(this).hide();
								$mo("#mo_message").show();
							});
						});
					</script>
				</body>
		    </html>';
		exit();
	}

	function miniorange_verification_user_choice($user_login, $user_email,$phone_number,$message,$otp_type)
	{
		echo'	<html>
					<head>
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" type="text/css" href="' . MOV_CSS_URL .'" />
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					</head>
					<body>
						<div class="mo-modal-backdrop">
							<div class="mo_customer_validation-modal" tabindex="-1" role="dialog" id="mo_site_otp_choice_form">
								<div class="mo_customer_validation-modal-backdrop"></div>
								<div class="mo_customer_validation-modal-dialog mo_customer_validation-modal-md">
									<div class="login mo_customer_validation-modal-content">
										<div class="mo_customer_validation-modal-header">
											<b>'.__("Select Verification Type",MoConstants::TEXT_DOMAIN).'</b>
											<a class="close" href="#" onclick="mo_validation_goback();" >
												'. __( '&larr; Go Back' ,MoConstants::TEXT_DOMAIN).'</a>
										</div>
										<div class="mo_customer_validation-modal-body center">
											<div>'.__($message,MoConstants::TEXT_DOMAIN).'</div><br /> ';
											if(!MoUtility::isBlank($user_email) || !MoUtility::isBlank($phone_number))
											{
		echo'									<div class="mo_customer_validation-login-container">
													<form id="mo_validate_form" name="f" method="post" action="">
														<input id="miniorange-validate-otp-choice-form" type="hidden" 
															name="option" value="miniorange-validate-otp-choice-form" />
														<input type="radio" checked name="mo_customer_validation_otp_choice" 
															value="user_email_verification" />
															'.__("Email Verification",MoConstants::TEXT_DOMAIN).'<br>
														<input type="radio" name="mo_customer_validation_otp_choice" 
															value="user_phone_verification" />
															'.__("Phone Verification",MoConstants::TEXT_DOMAIN).'<br>
														<br /><input type="submit" name="miniorange_otp_token_user_choice" 
															id="miniorange_otp_token_user_choice" class="miniorange_otp_token_submit"  
															value="'.__("Send OTP",MoConstants::TEXT_DOMAIN).'" />';
														extra_post_data();
		echo'										</form>
												</div>';
											}
		echo'							</div>
									</div>
								</div>
							</div>
						</div>
						<form name="f" method="post" action="" id="validation_goBack_form">
							<input id="validation_goBack" name="option" value="validation_goBack" type="hidden"></input>
						</form>
						<style> .mo_customer_validation-modal{ display: block !important; } </style>
						<script>	
							function mo_validation_goback(){
								document.getElementById("validation_goBack_form").submit();
							}
						</script>
					</body>
			    </html>';
		exit();
	}    

	function mo_external_phone_validation_form($goBackURL,$user_email,$message,$form,$usermeta)
	{
		$img = "<div style='display:table;text-align:center;'><img src='".MOV_LOADER_URL."'></div>";

		echo'	<html>
					<head>
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" type="text/css" href="' . MOV_CSS_URL . '" />
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					</head>
					<body>
						<div class="mo-modal-backdrop">
							<div class="mo_customer_validation-modal" tabindex="-1" role="dialog" id="mo_site_otp_choice_form">
								<div class="mo_customer_validation-modal-backdrop"></div>
								<div class="mo_customer_validation-modal-dialog mo_customer_validation-modal-md">
									<div class="login mo_customer_validation-modal-content">
										<div class="mo_customer_validation-modal-header">
											<b>'.__( 'Validate your Phone Number' ,MoConstants::TEXT_DOMAIN).'</b>
											<a class="close" href="#" onclick="window.location =\''.$goBackURL.'\'" >
												'.__( '&larr; Go Back' ,MoConstants::TEXT_DOMAIN).'</a>
										</div>
										<div class="mo_customer_validation-modal-body center">
											<div id="message">'.__($message,MoConstants::TEXT_DOMAIN).'</div><br /> ';
											if(!MoUtility::isBlank($user_email))
											{
		echo'									<div class="mo_customer_validation-login-container">
													<form name="f" id="validate_otp_form" method="post" action="">
														<input id="validate_phone" type="hidden" name="option" value="mo_ajax_form_validate" />
														<input type="hidden" name="form" value="'.$form.'" />
														<input type="text" name="mo_phone_number"  autofocus="true" placeholder="" 
															id="mo_phone_number" required="true" class="mo_customer_validation-textbox" 
															autofocus="true" pattern="^[\+]\d{1,4}\d{7,12}$|^[\+]\d{1,4}[\s]\d{7,12}$" 
															title="'.__( 'Enter a number in the following format : +1XXXXXXXXX ' ,
																			MoConstants::TEXT_DOMAIN).'"/>
														<div id="mo_message" hidden="" 
															style="background-color: #f7f6f7;padding: 1em 2em 1em 1.5em;color:black;"></div><br/>
														<div id="mo_validate_otp" hidden>
															'.__( 'Verify Code :' ,MoConstants::TEXT_DOMAIN).' <input type="number" 
															name="mo_customer_validation_otp_token"  autofocus="true" placeholder="" 
															id="mo_customer_validation_otp_token" required="true" 
															class="mo_customer_validation-textbox" autofocus="true" pattern="[0-9]{4,8}" 
															title="'.__( 'Only digits within range 4-8 are allowed.' ,MoConstants::TEXT_DOMAIN).'"/>
														</div>
														<input type="button" hidden id="validate_otp" name="otp_token_submit" 
															class="miniorange_otp_token_submit"  value="Validate" />
														<input type="button" id="send_otp" class="miniorange_otp_token_submit" 
															value="'.__( 'Send OTP' ,MoConstants::TEXT_DOMAIN).'" />';
														extra_post_data($usermeta);
		echo'										</form>
												</div>';
											}
		echo'							</div>
									</div>
								</div>
							</div>
						</div>
						<style> .mo_customer_validation-modal{ display: block !important; } </style>
						<script>
							jQuery(document).ready(function() {
							    $mo = jQuery;
							    $mo("#send_otp").click(function(o) {
							        var e = $mo("input[name=mo_phone_number]").val();
							        $mo("#mo_message").empty(), $mo("#mo_message").append("'.$img.'"), $mo("#mo_message").show(), $mo.ajax({
							            url: "'.site_url().'/?option=miniorange-ajax-otp-generate",
							            type: "POST",
							            data: {user_phone:e},
							            crossDomain: !0,
							            dataType: "json",
							            success: function(o) {
							                if (o.result == "success") {
							                    $mo("#mo_message").empty(), $mo("#mo_message").append(o.message), 
							                    $mo("#mo_message").css("background-color", "#8eed8e"), 
							                    $mo("#validate_otp").show(), $mo("#send_otp").val("Resend OTP"), 
							                    $mo("#mo_validate_otp").show(), $mo("input[name=mo_validate_otp]").focus()
							                } else {
							                    $mo("#mo_message").empty(), $mo("#mo_message").append(o.message), 
							                    $mo("#mo_message").css("background-color", "#eda58e"), 
							                    $mo("input[name=mo_phone_number]").focus()
							                };
							            },
							            error: function(o, e, n) {}
							        })
							    });
								$mo("#validate_otp").click(function(o) {
							        var e = $mo("input[name=mo_customer_validation_otp_token]").val();
							        var f = $mo("input[name=mo_phone_number]").val();
							        $mo("#mo_message").empty(), $mo("#mo_message").append("'.$img.'"), $mo("#mo_message").show(), $mo.ajax({
							            url: "'.site_url().'/?option=miniorange-ajax-otp-validate",
							            type: "POST",
							            data: {mo_customer_validation_otp_token: e,user_phone:f},
							            crossDomain: !0,
							            dataType: "json",
							            success: function(o) {
							                if (o.result == "success") {
							                    $mo("#mo_message").empty(), $mo("#validate_otp_form").submit()
							                } else {
							                    $mo("#mo_message").empty(), $mo("#mo_message").append(o.message), 
							                    $mo("#mo_message").css("background-color", "#eda58e"), 
							                    $mo("input[name=validate_otp]").focus()
							                };
							            },
							            error: function(o, e, n) {}
							        })
							    });
							});
						</script>
					</body>
			    </html>';
		exit();
	}

	function get_otp_verification_form_dropdown()
	{
		$enabled = 'style="color:green;font-style:italic;font-weight:bold"';
		echo '<select id="mo_search">';
		echo '<option value="" disabled selected="selected">
				----------------------- '.__( 'Select your Form' ,MoConstants::TEXT_DOMAIN).' --------------------------
			  </option>';
		foreach (FormList::getFormList() as $key => $value)
		{
			echo '<option value="'.$value.'"';
			echo FormList::isFormEnabled($value) ? $enabled : '';
			echo '>'.$value.'</option>';
		}
		echo '</select>';
	}

	function get_country_code_dropdown()
	{
		echo '<select name="default_country_code" id="mo_country_code">';
		echo '<option value="" disabled selected="selected">
				--------- '.__( 'Select your Country' ,MoConstants::TEXT_DOMAIN).' -------
			  </option>';
		foreach (CountryList::getCountryCodeList() as $key => $value)
		{
			echo '<option data-countrycode="'.$value.'" value="'.$value.'"';
			echo CountryList::isCountrySelected($value) ? 'selected' : '';
			echo '>'.str_replace("_"," ",$key).'</option>';
		}
		echo '</select>';
	}