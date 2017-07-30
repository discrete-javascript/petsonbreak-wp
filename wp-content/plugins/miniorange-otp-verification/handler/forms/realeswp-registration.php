<?php

	//| NOTE: THIS IS NOT INTEGRATED PROPERLY BUT HAS BEEN ADDED HERE FOR A CUSTOMER 	|
	//|		 NEED TO MAKE THIS AVAILABLE FOR ALL USERS AFTER PROPER INTEGRATION IS DONE.|

	class RealesWPTheme extends FormInterface
	{
		private $formSessionVar = FormSessionVars::REALESWP_REGISTER;
		private $formPhoneVer = FormSessionVars::REALESWP_PHONE_VER;
		private $formEmailVer = FormSessionVars::REALESWP_EMAIL_VER;
		private $otpType;

		function handleForm()
		{
			$this->otpType = get_option('mo_customer_validation_reales_enable_type');
			add_action('wp_enqueue_scripts', array($this,'enqueue_script_on_page'));
			$this->routeData();
		}

		function routeData()
		{
			if(!array_key_exists('option', $_GET)) return;
			switch (trim($_GET['option'])) 
			{
				case "miniorange-realeswp-verify":
					$this->_send_otp_realeswp_verify($_POST);		break;
				case "miniorange-validate-realeswp-otp":
					$this->_reales_validate_otp($_POST);			break;
			}
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_reales_enable') ? true : false;
		}

		function enqueue_script_on_page()
		{
			wp_register_script( 'script', MOV_URL . 'includes/js/realeswp.js?version='.MOV_VERSION , array('jquery') );
			wp_localize_script('script', 'movars', array(
				'imgURL'		=> MOV_URL. "includes/images/loader.gif",
				'fieldname' 	=> $this->otpType=='mo_reales_phone_enable' ? 'phone number' : 'email',
				'field'     	=> $this->otpType=='mo_reales_phone_enable' ? 'phoneSignup' : 'emailSignup',
				'siteURL' 		=> site_url(),
				'insertAfter'	=> $this->otpType=='mo_reales_phone_enable' ? '#phoneSignup' : '#emailSignup',
				'placeHolder' 	=> __('OTP Code',MoConstants::TEXT_DOMAIN),
				'buttonText'	=> __('Validate and Sign Up',MoConstants::TEXT_DOMAIN),
				'ajaxurl'       => admin_url('admin-ajax.php'),
			));
			wp_enqueue_script('script');
		}

		function _send_otp_realeswp_verify($data)
		{
			MoUtility::checkSession();
			MoUtility::initialize_transaction($this->formSessionVar);
			if(strcasecmp($this->otpType,"mo_reales_phone_enable")==0)
				$this->_send_otp_to_phone($data);
			else
				$this->_send_otp_to_email($data);
		}

		function _send_otp_to_phone($data)
		{
			if(array_key_exists('user_phone', $data) && !MoUtility::isBlank($data['user_phone']))
			{
				$_SESSION[$this->formPhoneVer] = trim($data['user_phone']);
				miniorange_site_challenge_otp('test','',null, trim($data['user_phone']),"phone");
			}
			else
				wp_send_json( MoUtility::_create_json_response( MoMessages::showMessage('ENTER_PHONE'),MoConstants::ERROR_JSON_TYPE) );
		}

		function _send_otp_to_email($data)
		{
			if(array_key_exists('user_email', $data) && !MoUtility::isBlank($data['user_email']))
			{
				$_SESSION[$this->formEmailVer] = $data['user_email'];
				miniorange_site_challenge_otp('test',$data['user_email'],null,$data['user_email'],"email");
			}
			else
				wp_send_json( MoUtility::_create_json_response( MoMessages::showMessage('ENTER_EMAIL'),MoConstants::ERROR_JSON_TYPE) );
		}

		function _reales_validate_otp($data)
		{
			MoUtility::checkSession();
			$moOTP = !isset($data['otp']) ? sanitize_text_field( $data['otp'] ) : '';

			$this->checkIfOTPVerificationHasStarted();

			if(!array_key_exists($this->txSessionId, $_SESSION) && !validate_submitted($fields)) return;

			$this->validateOTPRequest($moOTP);
		}

		function checkIfOTPVerificationHasStarted()
		{
			if(!array_key_exists($this->txSessionId, $_SESSION))
				wp_send_json( MoUtility::_create_json_response( MoMessages::showMessage('PLEASE_VALIDATE'),MoConstants::ERROR_JSON_TYPE) );
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			wp_send_json( MoUtility::_create_json_response(MoUtility::_get_invalid_otp_method(),MoConstants::ERROR_JSON_TYPE) );
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			wp_send_json( MoUtility::_create_json_response(MoUtility::_get_invalid_otp_method(),MoConstants::ERROR_JSON_TYPE) );
		}

		function validateOTPRequest($moOTP)
		{
			do_action('mo_validate_otp',NULL,$moOTP);
		}

		public function unsetOTPSessionVariables()
		{
			unset($_SESSION[$this->txSessionId]);
			unset($_SESSION[$this->formSessionVar]);
		}

		public function is_ajax_form_in_play($isAjax)
		{
			MoUtility::checkSession();
			return isset($_SESSION[$this->formSessionVar]) ? TRUE : $isAjax;
		}

		function handleFormOptions()
		{
			if(!MoUtility::areFormOptionsBeingSaved()) return;

			update_option('mo_customer_validation_reales_enable',
				isset( $_POST['mo_customer_validation_reales_enable']) ? $_POST['mo_customer_validation_reales_enable'] : 0);
			update_option('mo_customer_validation_reales_enable_type',
				isset( $_POST['mo_customer_validation_reales_enable_type']) ? $_POST['mo_customer_validation_reales_enable_type'] : 0);
		}
	}
	new RealesWPTheme;