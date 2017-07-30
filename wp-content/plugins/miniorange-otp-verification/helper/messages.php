<?php

class MoMessages
{
	function __construct()
	{
		//created an array instead of messages instead of constant variables for Translation reasons.
		define("MO_MESSAGES", serialize( array(			
			//General Messages
			"OTP_SENT_PHONE" 		 => __( "A OTP (One Time Passcode) has been sent to ", MoConstants::TEXT_DOMAIN) . '##phone##' . __( ". Please enter the OTP in the field below to verify your phone.", MoConstants::TEXT_DOMAIN), 
			"OTP_SENT_EMAIL" 		 => __( "A One Time Passcode has been sent to ", MoConstants::TEXT_DOMAIN) . '##email##'. __( ". Please enter the OTP below to verify your Email Address. If you cannot see the email in your inbox, make sure to check your SPAM folder.", MoConstants::TEXT_DOMAIN),
			"ERROR_OTP_EMAIL" 		 => __( "There was an error in sending the OTP. Please enter a valid email id or contact site Admin.", MoConstants::TEXT_DOMAIN),
			"ERROR_OTP_PHONE" 		 => __( "There was an error in sending the OTP to the given Phone Number. Please Try Again or contact site Admin.", MoConstants::TEXT_DOMAIN),
			"ERROR_PHONE_FORMAT" 	 => "##phone##" . __(" is not a valid phone number. Please enter a valid Phone Number. E.g:+1XXXXXXXXXX", MoConstants::TEXT_DOMAIN),
			"CHOOSE_METHOD" 		 => __( "Please select one of the methods below to verify your account. A One time passcode will be sent to the selected method.", MoConstants::TEXT_DOMAIN),
			"PLEASE_VALIDATE" 		 => __( "You need to verify yourself in order to submit this form", MoConstants::TEXT_DOMAIN),
			"ERROR_PHONE_BLOCKED"	 => "##phone##" . __( " has been blocked by the user. Please Try a different number or Contact site Admin.",MoConstants::TEXT_DOMAIN),
			"ERROR_EMAIL_BLOCKED"	 => "##email##" . __( " has been blocked by the user. Please Try a different email or Contact site Admin.",MoConstants::TEXT_DOMAIN),

			//ToolTip Messages
			"FORM_NOT_AVAIL_HEAD" 	 => __( "MY FORM IS NOT IN THE LIST", MoConstants::TEXT_DOMAIN),
			"FORM_NOT_AVAIL_BODY" 	 => __( "We are actively adding support for more forms. Please contact us using the support form on your right or email us at info@miniorange.com. While contacting us please include enough information about your registration form and how you intend to use this plugin. We will respond promptly.", MoConstants::TEXT_DOMAIN),
			"CHANGE_SENDER_ID_BODY"  => __( "SenderID/Number is gateway specific. You will need to use your own SMS gateway for this.", MoConstants::TEXT_DOMAIN),
			"CHANGE_SENDER_ID_HEAD"  => __( "CHANGE SENDER ID / NUMBER", MoConstants::TEXT_DOMAIN),
			"CHANGE_EMAIL_ID_BODY"   => __( "Sender Email is gateway specific. You will need to use your own Email gateway for this.",MoConstants::TEXT_DOMAIN),
			"CHANGE_EMAIL_ID_HEAD"   => __( "CHANGE SENDER EMAIL ADDRESS", MoConstants::TEXT_DOMAIN),
			"INFO_HEADER" 			 => __( "WHAT DOES THIS MEAN?", MoConstants::TEXT_DOMAIN),
			"META_KEY_HEADER"		 => __( "WHAT IS A META KEY?", MoConstants::TEXT_DOMAIN),
			"META_KEY_BODY"		 	 => __( "WordPress stores addtional user data like phone number, age etc in the usermeta table in a key value pair. MetaKey is the key against which the additional value is stored in the usermeta table.", MoConstants::TEXT_DOMAIN),
			"ENABLE_BOTH_BODY"		 => __( "New users can validate their Email or Phone Number using either Email or Phone Verification.s They will be prompted during registration to choose one of the two verification methods.",MoConstants::TEXT_DOMAIN),
			"COUNTRY_CODE_HEAD" 	 => __( "DON'T WANT USERS TO ENTER THEIR COUNTRY CODE?",MoConstants::TEXT_DOMAIN),
			"COUNTRY_CODE_BODY" 	 => __( "Choose the default country code that will be appended to the phone number entered by the users. This will allow your users to enter their phone numbers in the phone field without a country code.",MoConstants::TEXT_DOMAIN),

			//Support Query Messages			
			"SUPPORT_FORM_VALUES" 	 => __( "Please submit your query along with email.",MoConstants::TEXT_DOMAIN),
			"SUPPORT_FORM_SENT" 	 => __( "Thanks for getting in touch! We shall get back to you shortly.",MoConstants::TEXT_DOMAIN),
			"SUPPORT_FORM_ERROR" 	 => __( "Your query could not be submitted. Please try again.",MoConstants::TEXT_DOMAIN),

			//Setting Messages
			"SETTINGS_SAVED" 		 => __( "Settings saved successfully. You can go to your registration form page to test the plugin.",MoConstants::TEXT_DOMAIN),
			"REG_ERROR" 			 => __( "Please register an account before trying to enable OTP verification for any form.",MoConstants::TEXT_DOMAIN),
			"MSG_TEMPLATE_SAVED" 	 => __( "Settings saved successfully.",MoConstants::TEXT_DOMAIN),
			"SMS_TEMPLATE_SAVED" 	 => __( "Your SMS configurations are saved successfully.",MoConstants::TEXT_DOMAIN),
			"EMAIL_TEMPLATE_SAVED" 	 => __( "Your email configurations are saved successfully.",MoConstants::TEXT_DOMAIN),
			"CUSTOM_MSG_SENT" 		 => __( "Message sent successfully",MoConstants::TEXT_DOMAIN),
			"CUSTOM_MSG_SENT_FAIL" 	 => __( "Error sending message. ERROR :" ,MoConstants::TEXT_DOMAIN) . '##error##',
			"EXTRA_SETTINGS_SAVED"   => __( "Settings saved successfully.",MoConstants::TEXT_DOMAIN),

			//Ninja Form Messages
			"NINJA_FORM_EMAIL_ERROR" => __( "Please fill in the form id and email field id of your Ninja Form",MoConstants::TEXT_DOMAIN),
			"NINJA_FORM_PHONE_ERROR" => __( "Please fill in the form id and phone field id of your Ninja Form",MoConstants::TEXT_DOMAIN),
			"NINJA_FORM_FIELD_ERROR" => __( "Please fill in the form id and field id of your Ninja Form",MoConstants::TEXT_DOMAIN),
			"NINJA_FORM_FORM_ERROR"  => __( "Please fill in the form id of your Ninja Form", MoConstants::TEXT_DOMAIN),
			"NINJA_CHOOSE" 			 => __( "Please choose a Verification Method for Ninja Form.",MoConstants::TEXT_DOMAIN),

			//Contact Form 7 messages
			"EMAIL_MISMATCH" 		 => __( "The email OTP was sent to and the email in contact submission do not match.",MoConstants::TEXT_DOMAIN),
			"PHONE_MISMATCH" 	 	 => __( "The phone number OTP was sent to and the phone number in contact submission do not match.",MoConstants::TEXT_DOMAIN),
			"ENTER_PHONE" 			 => __( "You will have to provide a Phone Number before you can verify it.",MoConstants::TEXT_DOMAIN),
			"ENTER_EMAIL" 			 => __( "You will have to provide an Email Address before you can verify it.",MoConstants::TEXT_DOMAIN),
			"CF7_PROVIDE_EMAIL_KEY"  => __( "Please Enter the name of the email address field you created in User Contact Form 7.",MoConstants::TEXT_DOMAIN),
			"CF7_CHOOSE" 			 => __( "Please choose a Verification Method for Contact Form 7.",MoConstants::TEXT_DOMAIN),

			//BuddyPress Form Messages
			"BP_PROVIDE_FIELD_KEY"   => __( "Please Enter the Name of the phone number field you created in BuddyPress.",MoConstants::TEXT_DOMAIN),
			"BP_CHOOSE" 			 => __( "Please choose a Verification Method for BuddyPress Registration Form.",MoConstants::TEXT_DOMAIN),

			//Ultimate Member Registration Messages
			"UM_CHOOSE" 			 => __( "Please choose a Verification Method for Ultimate Member Registration Form.",MoConstants::TEXT_DOMAIN),

			//Event Registration Messages
			"EVENT_CHOOSE" 			 => __( "Please choose a Verification Method for Event Registration Form.",MoConstants::TEXT_DOMAIN),

			//UserUltra Messages
			"UULTRA_PROVIDE_FIELD" 	 => __( "Please Enter the Field Key of the phone number field you created in Users Ultra Registration form.",MoConstants::TEXT_DOMAIN),
			"UULTRA_CHOOSE" 		 => __( "Please choose a Verification Method for Users Ultra Registration Form.",MoConstants::TEXT_DOMAIN),

			//CRF Messages
			"CRF_PROVIDE_PHONE_KEY"  => __( "Please Enter the label name of the phone number field you created in Custom User Registration form.",MoConstants::TEXT_DOMAIN),
			"CRF_PROVIDE_EMAIL_KEY"  => __( "Please Enter the label name of the email number field you created in Custom User Registration form.",MoConstants::TEXT_DOMAIN),
			"CRF_CHOOSE" 			 => __( "Please choose a Verification Method for Custom User Registration Form.", MoConstants::TEXT_DOMAIN),

			//Simplr Form Messages
			"SMPLR_PROVIDE_FIELD" 	 => __( "Please Enter the Field Key of the phone number field you created in Simplr User Registration form.",MoConstants::TEXT_DOMAIN),
			"SIMPLR_CHOOSE" 		 => __( "Please choose a Verification Method for Simplr User Registration Form.",MoConstants::TEXT_DOMAIN),

			//UserProfile Made Easy Messages
			"UPME_PROVIDE_PHONE_KEY" => __( "Please Enter the Field Key of the phone number field you created in User Profile Made Easy Registration form.",MoConstants::TEXT_DOMAIN),
			"UPME_CHOOSE" 			 => __( "Please choose a Verification Method for User Profile Made Easy Registration Form.",MoConstants::TEXT_DOMAIN),

			//Pie Registration Form Messages
			"PIE_PROVIDE_PHONE_KEY"  => __( "Please Enter the Meta Key of the phone field.",MoConstants::TEXT_DOMAIN),
			"PIE_CHOOSE" 			 => __( "Please choose a Verification Method for Pie Registration Form.",MoConstants::TEXT_DOMAIN),

			//WooCommerce Messages
			"ENTER_PHONE_CODE" 		 => __( "Please enter the verification code sent to your phone",MoConstants::TEXT_DOMAIN),
			"ENTER_EMAIL_CODE"       => __( "Please enter the verification code sent to your email address",MoConstants::TEXT_DOMAIN),
			"ENTER_VERIFY_CODE" 	 => __( "Please verify yourself before submitting the form.",MoConstants::TEXT_DOMAIN),
			"PHONE_VALIDATION_MSG" 	 => __( "Enter your mobile number below for verification :",MoConstants::TEXT_DOMAIN),
			"WC_CHOOSE_METHOD" 		 => __( "Please choose a Verification Method for Woocommerce Default Registration Form.",MoConstants::TEXT_DOMAIN),
			"WC_SOCIAL_CHOOSE" 		 => __( "Please choose a Verification Method for Woocommerce Checkout Registration Form.",MoConstants::TEXT_DOMAIN),

			//Theme My Login Messages
			"TMLM_CHOOSE" 			 => __( "Please choose a Verification Method for Theme My Login Registration Form.",MoConstants::TEXT_DOMAIN),

			//Default Registration Form
			"ENTER_PHONE_DEFAULT" 	 => __( "ERROR: Please enter a valid phone number.",MoConstants::TEXT_DOMAIN),
			"WP_CHOOSE_METHOD" 		 => __( "Please choose a Verification Method for WordPress Default Registration Form.",MoConstants::TEXT_DOMAIN),

			//UserPro Registration Form
			"USERPRO_CHOOSE" 		 => __( "Please choose a Verification Method for UserPro Registration Form.",MoConstants::TEXT_DOMAIN),
			"USERPRO_VERIFY" 		 => __( "Please verify yourself before submitting the form.",MoConstants::TEXT_DOMAIN),

			//Registration Messages
			"PASS_LENGTH" 			 => __( "Choose a password with minimum length 6.",MoConstants::TEXT_DOMAIN),
			"PASS_MISMATCH" 		 => __( "Password and Confirm Password do not match.",MoConstants::TEXT_DOMAIN),
			"OTP_SENT" 				 => __( "A passcode has been sent to ",MoConstants::TEXT_DOMAIN) . "{{method}}" .  __( " Please enter the otp below to verify your account.",MoConstants::TEXT_DOMAIN),
			"ERR_OTP" 				 => __( "There was an error in sending OTP. Please click on Resend OTP link to resend the OTP.",MoConstants::TEXT_DOMAIN),
			"REG_SUCCESS" 			 => __( "Your account has been retrieved successfully.",MoConstants::TEXT_DOMAIN),
			"ACCOUNT_EXISTS" 		 => __( "You already have an account with miniOrange. Please enter a valid password.",MoConstants::TEXT_DOMAIN),
			"REG_COMPLETE" 			 => __( "Registration complete!",MoConstants::TEXT_DOMAIN),
			"INVALID_OTP" 			 => __( "Invalid one time passcode. Please enter a valid passcode.",MoConstants::TEXT_DOMAIN),
			"RESET_PASS" 			 => __( "You password has been reset successfully and sent to your registered email. Please check your mailbox.",MoConstants::TEXT_DOMAIN),
			"REQUIRED_FIELDS" 		 => __( "Please enter all the required fields",MoConstants::TEXT_DOMAIN),
			"REQUIRED_OTP" 			 => __( "Please enter a value in OTP field.",MoConstants::TEXT_DOMAIN),
			"INVALID_SMS_OTP" 		 => __( "There was an error in sending sms. Please Check your phone number.",MoConstants::TEXT_DOMAIN),
			"NEED_UPGRADE_MSG" 		 => __( "You have not upgraded yet. Check licensing tab to upgrade to premium version.",MoConstants::TEXT_DOMAIN),
			"VERIFIED_LK" 			 => __( "Your license is verified. You can now setup the plugin.",MoConstants::TEXT_DOMAIN),
			"LK_IN_USE"				 => __( "License key you have entered has already been used. Please enter a key which has not been used before on any other instance or if you have exhausted all your keys then check licensing tab to buy more.",MoConstants::TEXT_DOMAIN),
			"INVALID_LK" 			 => __( "You have entered an invalid license key. Please enter a valid license key.",MoConstants::TEXT_DOMAIN),
			"REG_REQUIRED" 			 => __( "Please complete your registration to save configuration.",MoConstants::TEXT_DOMAIN),

			//common messages
			"UNKNOWN_ERROR" 		 => __( "Error processing your request. Please try again.",MoConstants::TEXT_DOMAIN),
			"MO_REG_ENTER_PHONE" 	 => __( "Phone with country code eg. +1xxxxxxxxxx",MoConstants::TEXT_DOMAIN),

			//License Messages
			"UPGRADE_MSG" 			 => __( "Thank you. You have upgraded to ",MoConstants::TEXT_DOMAIN). "{{plan}}.",
			"FREE_PLAN_MSG" 		 => __( "You are on our FREE plan. Check Licensing Tab to learn how to upgrade.",MoConstants::TEXT_DOMAIN),
			"TRANS_LEFT_MSG" 		 => __( "You have ",MoConstants::TEXT_DOMAIN) . "<b><i>{{email}} Email Transactions</i></b>" . __( " and ",MoConstants::TEXT_DOMAIN) . "<b><i>{{phone}} Phone Transactions</i></b>" . __( " remaining.",MoConstants::TEXT_DOMAIN), 
												//'<a href="{{syncurl}}" class="button button-primary">SYNC</a>';,
			"YOUR_GATEWAY_HEADER"    => __( "WHAT DO YOU MEAN BY YOUR GATEWAY? WHEN DO I OPT FOR THIS PLAN?",MoConstants::TEXT_DOMAIN),
			"YOUR_GATEWAY_BODY"    	 => __( "Your Gateway means that you have your own SMS or Email Gateway for delivering OTP to the user's email or phone. The plugin will handle OTP generation and verification but your existing gateway would be used to deliver the message to the user. <br/><br/>Hence, the One Time Cost of the plugin. <b><i>NOTE:</i></b> You will still need to pay SMS and Email delivery charges to your gateway separately.",MoConstants::TEXT_DOMAIN),
			"MO_GATEWAY_HEADER"    	 => __( "WHAT DO YOU MEAN BY miniOrange GATEWAY? WHEN DO I OPT FOR THIS PLAN?",MoConstants::TEXT_DOMAIN),
			"MO_GATEWAY_BODY"    	 => __( "miniOrange Gateway means that you want the complete package of OTP generation, delivery ( to user's phone or email ) and verification. Opt for this plan when you don't have your own SMS or Email gateway for message delivery. <br/><br/> <b><i>NOTE:</i></b> SMS Delivery charges depend on the country you want to send the OTP to. Click on the Upgrade Now button below and select your country to see the full pricing.",MoConstants::TEXT_DOMAIN),

			//Gravity Forms Messages
			"GRAVITY_CHOOSE" 		 => __( "Please choose a Verification Method for Gravity Form.",MoConstants::TEXT_DOMAIN),

			//WP Login Form Messages
			"PHONE_NOT_FOUND" 		 => __( "Sorry, but you don't have a registered phone number.",MoConstants::TEXT_DOMAIN),
			"REGISTER_PHONE_LOGIN" 	 => __( "A new security system has been enabled for you. Please register your phone to continue.",MoConstants::TEXT_DOMAIN),

			//WP Member messages
			"WP_MEMBER_CHOOSE" 		 => __( "Please choose a Verification Method for WP Member Form.",MoConstants::TEXT_DOMAIN),

			//Ultimate Membership Pro
			"UMPRO_VERIFY" 			 => __( "Please verify yourself before submitting the form.",MoConstants::TEXT_DOMAIN),
			"UMPRO_CHOOSE" 			 => __( "Please choose a verification method for Ultimate Membership Pro form.",MoConstants::TEXT_DOMAIN),

			//Classify Theme
			"CLASSIFY_THEME" 		 => __( "Please choose a Verification Method for Classify Theme.",MoConstants::TEXT_DOMAIN),

			//Reales Theme
			"REALES_THEME" 			 => __( "Please choose a Verification Method for Reales WP Theme.",MoConstants::TEXT_DOMAIN),

			//WP Default Login
			"WP_LOGIN_MISSING_KEY" 	 => __( "Please provide a meta key value for users phone numbers.",MoConstants::TEXT_DOMAIN),
			"PHONE_EXISTS"			 => __( "Phone Number is already in use. Please use another number.",MoConstants::TEXT_DOMAIN),

			//For on Prem Plugin
			"DEFAULT_SMS_TEMPLATE"   => __( "Dear Customer, Your OTP is ##otp##. Use this Passcode to complete your transaction. Thank you.",MoConstants::TEXT_DOMAIN), 
			"EMAIL_SUBJECT" 		 => __( "Your Requested One Time Passcode",MoConstants::TEXT_DOMAIN),
			"DEFAULT_EMAIL_TEMPLATE" => __( "Dear Customer, \n\nYour One Time Passcode for completing your transaction is: ##otp##\nPlease use this Passcode to complete your transaction. Do not share this Passcode with anyone.\n\nThank You,\nminiOrange Team.",MoConstants::TEXT_DOMAIN),
		)));
	}

	public static function showMessage($messageKeys , $data=array())
	{
		$displayMessage = "";
		$messageKeys = explode(" ",$messageKeys);
		$messages = unserialize(MO_MESSAGES);
		foreach ($messageKeys as $messageKey) 
		{
			if(MoUtility::isBlank($messageKey)) return $displayMessage;
			$formatMessage = $messages[$messageKey];
		    foreach($data as $key => $value)
		    {
		        $formatMessage = str_replace("{{" . $key . "}}", $value ,$formatMessage);
		    }
		    $displayMessage.=$formatMessage;
		}
	    return $displayMessage;
	}
}	
new MoMessages;

class MoDisplayMessages
{
	private $message;
	private $type;

	function __construct( $message,$type ) 
	{
        $this->_message = $message;
        $this->_type = $type;
        add_action( 'admin_notices', array( $this, 'render' ) );
    }

    function render() 
    {
    	switch ($this->_type) 
    	{
    		case 'CUSTOM_MESSAGE':
    			echo  __($this->_message,MoConstants::TEXT_DOMAIN);																				break;
    		case 'NOTICE':
    			echo '	<div style="margin-top:1%;" class="is-dismissible notice notice-warning"> <p>'.__($this->_message,MoConstants::TEXT_DOMAIN).'</p> </div>';		break;
    		case 'ERROR':
    			echo '	<div style="margin-top:1%;" class="notice notice-error is-dismissible"> <p>'.__($this->_message,MoConstants::TEXT_DOMAIN).'</p> </div>';		break;
    		case 'SUCCESS':
    			echo '	<div style="margin-top:1%;" class="notice notice-success is-dismissible"> <p>'.__($this->_message,MoConstants::TEXT_DOMAIN).'</p> </div>';		break;
    	}
    }
}