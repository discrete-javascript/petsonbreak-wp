<?php

class MoConstants
{
	const DEFAULT_CUSTOMER_KEY 	= "16555";
	const DEFAULT_API_KEY 		= "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
	const PCODE 				= "UHJlbWl1bSBQbGFuIC0gV1AgT1RQIFZFUklGSUNBVElPTg==";
	const BCODE 				= "RG8gaXQgWW91cnNlbGYgUGxhbiAtIFdQIE9UUCBWRVJJRklDQVRJT04=";
	const CCODE					= "bWluaU9yYW5nZSBTTVMvU01UUCBHYXRld2F5IC0gV1AgT1RQIFZFUklGSUNBVElPTg==";
	const HOSTNAME				= "https://auth.miniorange.com";
	const FROM_EMAIL			= "no-reply@miniorange.com";
	const SUPPORT_EMAIL 		= "info@miniorange.com";
	const HEADER_CONTENT_TYPE	= "Content-Type: text/html";
	const SUCCESS				= "SUCCESS";
	const FAILURE				= "FAILURE";
	const AREA_OF_INTEREST		= "WP OTP Verification Plugin";
	const APPLICATION_NAME		= "wp_otp_verification";
	const TEXT_DOMAIN 			= "wp-otp-verification";
	const PATTERN_PHONE			= '/^[\+]\d{1,4}\d{7,12}$|^[\+]\d{1,4}[\s]\d{7,12}$/';
	const PATTERN_COUNTRY_CODE  = '/^[\+]\d{1,4}.*/';
	const ERROR_JSON_TYPE 		= 'error';
	const SUCCESS_JSON_TYPE 	= 'success';
	const EMAIL_TRANS_REMAINING = 10;
	const PHONE_TRANS_REMAINING = 10;
	const USERPRO_VER_FIELD_META= "verification_form";

	//form links
	const PB_FORM_LINK			= 'https://wordpress.org/plugins/profile-builder/';
	const WC_FORM_LINK          = 'https://wordpress.org/plugins/woocommerce/';
	const SIMPLR_FORM_LINK  	= 'https://wordpress.org/plugins/simplr-registration-form/';
	const UM_ENABLED 			= 'https://wordpress.org/plugins/ultimate-member/';
	const EVENT_FORM			= 'https://wordpress.org/plugins/event-registration/';
	const BBP_FORM_LINK 		= 'https://wordpress.org/plugins/buddypress/';
	const CRF_FORM_ENABLE		= 'https://wordpress.org/plugins/custom-registration-form-builder-with-submission-manager/';
	const UULTRA_FORM_LINK 		= 'https://wordpress.org/plugins/users-ultra/';
	const UPME_FORM_LINK	    = 'http://codecanyon.net/item/user-profiles-made-easy-wordpress-plugin/4109874';
	const PIE_FORM_LINK 		= 'http://pieregister.com/';
	const CF7_FORM_LINK 		= 'https://wordpress.org/plugins/contact-form-7/';
	const WC_SOCIAL_LOGIN		= 'https://woocommerce.com/products/woocommerce-social-login/';
	const NINJA_FORMS_LINK		= 'https://ninjaforms.com/';
	const TML_FORM_LINK			= 'https://wordpress.org/plugins/theme-my-login/';
	const USERPRO_FORM_LINK 	= 'https://codecanyon.net/item/userpro-user-profiles-with-social-login/5958681';
	const GF_FORM_LINK			= 'http://www.gravityforms.com/';
	const WP_MEMBER_LINK		= 'https://wordpress.org/plugins/wp-members/';
	const UM_PRO_LINK 			= 'https://codecanyon.net/item/ultimate-membership-pro-wordpress-plugin/12159253';
	const CLASSIFY_LINK			= 'https://themeforest.net/item/classify-classified-ads-html-template/11013666';
	const REALES_THEME 			= 'https://themeforest.net/item/reales-wp-real-estate-wordpress-theme/10330568';

	function __construct()
	{
		$this->define_global();
	}

	function define_global()
	{
		global $phoneLogic,$emailLogic;
		$phoneLogic = new PhoneLogic();
		$emailLogic = new EmailLogic();
		define('MOV_VERSION', '3.2.0');
		define('MOV_DIR', plugin_dir_path(dirname(__FILE__)));
		define('MOV_URL', plugin_dir_url(dirname(__FILE__)));
		define('MOV_CSS_URL', MOV_URL . 'includes/css/mo_customer_validation_style.css?version='.MOV_VERSION);
		define('MOV_JS_URL', MOV_URL . 'includes/js/settings.js?version='.MOV_VERSION);
		define('VALIDATION_JS_URL', MOV_URL . 'includes/js/formValidation.js?version='.MOV_VERSION);
		define('MOV_LOADER_URL', MOV_URL . 'includes/images/loader.gif');
		define('MOV_LOGO_URL', MOV_URL . 'includes/images/logo.png');
	}
}
new MoConstants;