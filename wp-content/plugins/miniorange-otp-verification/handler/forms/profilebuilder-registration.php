<?php

	class ProfileBuilderRegistrationForm extends FormInterface
	{

		private $formSessionVar = FormSessionVars::PB_DEFAULT_REG;
		private $otpType;

		function handleForm()
		{
			add_filter( 'wppb_build_userdata', array($this,'formbuilder_site_registration_errors'),99,2);
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_pb_default_enable') ? true : false;
		}

		function formbuilder_site_registration_errors($userdata,$global_request)
		{
			if($global_request['action']=='register' 
					&& (!isset($_SESSION[$this->formSessionVar]) || strcasecmp($_SESSION[$this->formSessionVar],'validated')!=0))
				$this->startOTPVerificationProcess($userdata);
			else
				$this->unsetOTPSessionVariables();
			return $userdata;
		}

		function startOTPVerificationProcess($userdata)
		{
			$errors = new WP_Error();
			MoUtility::initialize_transaction($this->formSessionVar);
			foreach ($userdata as $key => $value)
			{
				if($key=="user_login")
					$username = $value;
				elseif ($key=="user_email")
					$email = $value;
				elseif ($key=="user_pass") 
					$password = $value;
				else
					$extra_data[$key]=$value;
			}
			miniorange_site_challenge_otp($username,$email,$errors,null,"email",$password,$extra_data);
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$otpVerType = strcasecmp($this->otpType,"mo_phone_enable")==0 ? "phone" 
							: (strcasecmp($this->otpType,"mo_both_enable")==0 ? "both" : "email" );
			$fromBoth = strcasecmp($otpVerType,"both")==0 ? TRUE : FALSE;
			miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,MoUtility::_get_invalid_otp_method(),$otpVerType,$fromBoth);
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$_SESSION[$this->formSessionVar]='validated';
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

			update_option('mo_customer_validation_pb_default_enable',
				isset( $_POST['mo_customer_validation_pb_default_enable']) ? $_POST['mo_customer_validation_pb_default_enable'] : 0);
		}
	}
	new ProfileBuilderRegistrationForm;
