<?php

	class RegistrationMagicForm extends FormInterface
	{
		private $formSessionVar = FormSessionVars::CRF_DEFAULT_REG;
		private $otpType;
		private $emailKey;
		private $phoneKey;

		function handleForm()
		{
			$this->otpType = get_option('mo_customer_validation_crf_enable_type');
			$this->emailKey = get_option('mo_customer_validation_crf_email_key');
			$this->phoneKey = get_option('mo_customer_validation_crf_phone_key');

			if(array_key_exists('option',$_POST)) return;

			if(array_key_exists('rm_form_sub_id',$_REQUEST) && isset($_REQUEST['rm_form_sub_id']) 
				&& $_REQUEST['rm_form_sub_id']!="rm_login_form" )
				$this->_handle_crf_form_submit($_REQUEST);

			MoUtility::checkSession();
			if(array_key_exists($this->formSessionVar,$_SESSION) && $_SESSION[$this->formSessionVar]=='validated')
				$this->unsetOTPSessionVariables();
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_crf_default_enable') ? TRUE : FALSE;
		}

		function _handle_crf_form_submit($requestdata)
		{
			$email = $phone = '';
			if( $this->otpType == 'mo_crf_email_enable' || $this->otpType == 'mo_crf_both_enable')
				$email = $this->getCRFEmailFromRequest($requestdata);
			if($this->otpType == 'mo_crf_phone_enable' || $this->otpType == 'mo_crf_both_enable')
				$phone = $this->getCRFPhoneFromRequest($requestdata);
			$this->miniorange_crf_user($email, isset($requestdata['user_name']) ? $requestdata['user_name'] : NULL ,$phone);
		}

		function getCRFEmailFromRequest($requestdata)
		{
			global $wpdb;
			$crf_fields =$wpdb->prefix."rm_fields";
			$reg1 = $wpdb->get_results("SELECT * FROM $crf_fields where field_label ='".$this->emailKey."'");
			return $this->getFormPostSubmittedValue($reg1,$requestdata);
		}

		function getCRFPhoneFromRequest($requestdata)
		{
			global $wpdb;
			$crf_fields =$wpdb->prefix."rm_fields";
			$reg1 = $wpdb->get_results("SELECT * FROM $crf_fields where field_label ='".$this->phoneKey."'");
			return $this->getFormPostSubmittedValue($reg1,$requestdata);
		}

		function getFormPostSubmittedValue($reg1,$requestdata)
		{
			foreach($reg1 as $row1){
				$id = $row1->field_type.'_'.$row1->field_id;
				if(isset($requestdata[$id])) return $requestdata[$id];
			}
		}

		function miniorange_crf_user($user_email,$user_name,$phone_number)
		{
			MoUtility::checkSession();
			MoUtility::initialize_transaction($this->formSessionVar);
			$errors = new WP_Error();
			if(strcasecmp($this->otpType,"mo_crf_phone_enable")==0)
				miniorange_site_challenge_otp($user_name,$user_email,$errors,$phone_number,"phone");
			else if(strcasecmp($this->otpType,"mo_crf_both_enable")==0)
				miniorange_site_challenge_otp($user_name,$user_email,$errors,$phone_number,"both");
			else
				miniorange_site_challenge_otp($user_name,$user_email,$errors,$phone_number,"email");
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$otpVerType = strcasecmp($this->otpType,"mo_crf_phone_enable")==0 ? "phone" 
							: (strcasecmp($this->otpType,"mo_crf_both_enable")==0 ? "both" : "email" );	
			$fromBoth = strcasecmp($otpVerType,"both")==0 ? TRUE : FALSE;
			miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,MoUtility::_get_invalid_otp_method(),$otpVerType,$fromBoth);
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$_SESSION[$this->formSessionVar] = 'validated';	
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

			update_option('mo_customer_validation_crf_default_enable', 
				isset( $_POST['mo_customer_validation_crf_default_enable']) ? $_POST['mo_customer_validation_crf_default_enable'] : 0);
			update_option('mo_customer_validation_crf_enable_type',
				isset( $_POST['mo_customer_validation_crf_enable_type']) ? $_POST['mo_customer_validation_crf_enable_type'] : 0);
			update_option('mo_customer_validation_crf_phone_key',
				isset( $_POST['crf_phone_field_key']) ? $_POST['crf_phone_field_key'] : '');
			update_option('mo_customer_validation_crf_email_key',
				isset( $_POST['crf_email_field_key']) ? $_POST['crf_email_field_key'] : '');
		}
	}
	new RegistrationMagicForm;