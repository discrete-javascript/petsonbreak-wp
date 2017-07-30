<?php

	class PieRegistrationForm extends FormInterface
	{

		private $formSessionVar = FormSessionVars::PIE_REG;
		private $otpType;
		private $phoneFieldKey;

		function handleForm()
		{
			$this->otpType = get_option('mo_customer_validation_pie_enable_type');
			$this->phoneFieldKey = get_option('mo_customer_validation_pie_phone_key');
			add_action( 'pie_register_after_register_validate', array($this,'miniorange_pie_user_registration'),99,0);
			add_action( 'pie_register_after_register_validate', array($this,'check_if_user_reg_complete'),99,1);
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_pie_default_enable') ? TRUE : FALSE;
		}

		function miniorange_pie_user_registration()
		{
			MoUtility::checkSession();
			if(!array_key_exists($this->formSessionVar,$_SESSION) || strcasecmp($_SESSION[$this->formSessionVar],'validated')!=0)
			{
				$fields = unserialize(get_option('pie_fields'));
				$keys = array_keys($fields);
				$phone_field = $this->getPhoneFieldKey($keys,$fields);
				$phone = !MoUtility::isBlank($phone_field) ? $_POST[$phone_field] : NULL;
				$this->startTheOTPVerificationProcess($_POST['username'],$_POST['e_mail'],$phone);
			}
		}

		function check_if_user_reg_complete($user)
		{
			//if(!is_wp_error($user)) 
			//	$this->unsetOTPSessionVariables();					
		}

		function startTheOTPVerificationProcess($username,$useremail,$phone)
		{
			MoUtility::initialize_transaction($this->formSessionVar);
			$errors = new WP_Error();
			if(strcasecmp($this->otpType,"mo_pie_phone_enable")==0)
				miniorange_site_challenge_otp( $username,$useremail,$errors,$phone,"phone");
			else if(strcasecmp($this->otpType,"mo_pie_both_enable")==0)
				miniorange_site_challenge_otp( $username,$useremail,$errors,$phone,"both");
			else
				miniorange_site_challenge_otp( $username,$useremail,$errors,$phone,"email");
		}

		function getPhoneFieldKey($keys,$fields)
		{
			foreach($keys as $key)
			{
				if(strcasecmp(trim($fields[$key]['label']),$this->phoneFieldKey)==0)
					return str_replace("-","_",sanitize_title($fields[$key]['type']."_"
						.(isset($fields[$key]['id']) ? $fields[$key]['id'] : "")));
			}
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$otpVerType = strcasecmp($this->otpType,"mo_pie_phone_enable")==0 ? "phone" 
							: (strcasecmp($this->otpType,"mo_pie_both_enable")==0 ? "both" : "email" );
			$fromBoth = strcasecmp($otpVerType,"both")==0 ? TRUE : FALSE;
			miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,MoUtility::_get_invalid_otp_method(),$otpVerType,$fromBoth);
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$_SESSION[$this->formSessionVar]="validated";
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

			update_option('mo_customer_validation_pie_default_enable',
				isset( $_POST['mo_customer_validation_pie_default_enable']) ? $_POST['mo_customer_validation_pie_default_enable'] : 0);
			update_option('mo_customer_validation_pie_enable_type',
				isset( $_POST['mo_customer_validation_pie_enable_type']) ? $_POST['mo_customer_validation_pie_enable_type'] : '');
			update_option('mo_customer_validation_pie_phone_key',
				isset( $_POST['pie_phone_field_key']) ? $_POST['pie_phone_field_key'] : '');
		}	
	}
	new PieRegistrationForm;