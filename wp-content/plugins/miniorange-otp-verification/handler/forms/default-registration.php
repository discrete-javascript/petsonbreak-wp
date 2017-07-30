<?php

	class DefaultWordPressRegistrationForm extends FormInterface
	{
		private $formSessionVar = FormSessionVars::WP_DEFAULT_REG;
		private $otpType;

		function handleForm()
		{	
			$this->otpType = get_option('mo_customer_validation_wp_default_enable_type');

			add_action('register_form', array($this,'miniorange_site_register_form'));
			add_filter('registration_errors', array($this,'miniorange_site_registration_errors'), 1, 3 );
			add_action('admin_post_nopriv_validation_goBack', array($this,'_handle_validation_goBack_action'));
			add_action('user_register', array($this,'miniorange_registration_save'), 10, 1 );
		}

		public static function isFormEnabled()
		{	
			return get_option('mo_customer_validation_wp_default_enable') ? TRUE : FALSE;
		}

		function miniorange_site_register_form()
		{	
	 		echo '<input type="hidden" name="register_nonce" value="register_nonce"/>';
			if( $this->otpType == 'mo_wp_default_phone_enable' || $this->otpType == 'mo_wp_default_both_enable')
				echo '<label for="phone_number_mo">'.__("Phone Number",MoConstants::TEXT_DOMAIN).'<br />
					<input type="text" name="phone_number_mo" id="phone_number_mo" class="input" value="" style=""/></label>';
		}

		function miniorange_registration_save($user_id)
		{
			if ( isset( $_SESSION['phone_number_mo'] ) ) add_user_meta($user_id, 'telephone', $_SESSION['phone_number_mo']);
		}

		function miniorange_site_registration_errors($errors, $sanitized_user_login, $user_email )
		{
			MoUtility::checkSession();

			$phone_number = isset($_POST['phone_number_mo'])? $_POST['phone_number_mo'] : null;
			if(($this->otpType == 'mo_wp_default_phone_enable' || $this->otpType == 'mo_wp_default_both_enable')
				&& MoUtility::validatePhoneNumber($phone_number))
				$this->startOTPTransaction($sanitized_user_login,$user_email,$errors,$phone_number);
			elseif($this->otpType == 'mo_wp_default_email_enable')
				$this->startOTPTransaction($sanitized_user_login,$user_email,$errors,$phone_number);
			else
				$errors->add( 'invalid_phone', MoMessages::showMessage('ENTER_PHONE_DEFAULT') );

			return $errors;
		}

		function startOTPTransaction($sanitized_user_login,$user_email,$errors,$phone_number)
		{
			if(!MoUtility::isBlank(array_filter($errors->errors)) || !isset($_POST['register_nonce'])) return;

			if(array_key_exists($this->formSessionVar, $_SESSION) && $_SESSION[$this->formSessionVar]=='validated') return;

			MoUtility::initialize_transaction($this->formSessionVar);
			if(strcasecmp($this->otpType,"mo_wp_default_phone_enable")==0)
				miniorange_site_challenge_otp($sanitized_user_login,$user_email,$errors,$phone_number,"phone");
			else if(strcasecmp($this->otpType,"mo_wp_default_both_enable")==0)
				miniorange_site_challenge_otp($sanitized_user_login,$user_email,$errors,$phone_number,"both");
			else
				miniorange_site_challenge_otp($sanitized_user_login,$user_email,$errors,$phone_number,"email");
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$otpVerType = strcasecmp($this->otpType,"mo_wp_default_phone_enable")==0 ? "phone" 
							: (strcasecmp($this->otpType,"mo_wp_default_both_enable")==0 ? "both" : "email" );
			$fromBoth = strcasecmp($otpVerType,"both")==0 ? TRUE : FALSE;
			miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,MoUtility::_get_invalid_otp_method(),$otpVerType,$fromBoth);
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$_SESSION[$this->formSessionVar] = 'validated';
			$errors = register_new_user($user_login, $user_email);
			$this->unsetOTPSessionVariables();
			if ( !is_wp_error($errors) ) {
				$redirect_to = !MoUtility::isBlank($redirect_to) ? $redirect_to :  wp_login_url()."?checkemail=registered";
				wp_redirect( $redirect_to );
				exit();
			}
		}

		public function unsetOTPSessionVariables()
		{
			unset($_SESSION[$this->txSessionId]);
			unset($_SESSION[$this->formSessionVar]);
		}

		public function is_ajax_form_in_play($isAjax)
		{
			MoUtility::checkSession();
			return isset($_SESSION[$this->formSessionVar]) ? FALSE : $isAjax;
		}

		function handleFormOptions()
		{
			if(!MoUtility::areFormOptionsBeingSaved()) return;

			update_option('mo_customer_validation_wp_default_enable', 
				isset( $_POST['mo_customer_validation_wp_default_enable']) ? $_POST['mo_customer_validation_wp_default_enable'] : 0);
			update_option('mo_customer_validation_wp_default_enable_type',
				isset( $_POST['mo_customer_validation_wp_default_enable_type']) ? $_POST['mo_customer_validation_wp_default_enable_type'] : 0);
		}
	}
	new DefaultWordPressRegistrationForm;
