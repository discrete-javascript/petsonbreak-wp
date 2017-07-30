<?php

	class EventRegistrationForm extends FormInterface
	{

		private $formSesssionVar = FormSessionVars::EVENT_REG;
		private $otpType;

		function handleForm()
		{
			$this->otpType = get_option('mo_customer_validation_event_enable_type');

			add_action('evr_process_confirmation',array($this,'miniorange_evr_user_registration'),1,1);
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_event_default_enable') ? true : false;
		}

		function miniorange_evr_user_registration($reg_form)
		{
			$errors = new WP_Error();
			$event_form_data = Array();
			$phone_number = null;
			MoUtility::checkSession();
			if($_POST['option']=="miniorange-validate-otp-form") return;

			MoUtility::initialize_transaction($this->formSessionVar);
			if(strcasecmp($this->otpType,"mo_event_phone_enable")==0)
				miniorange_site_challenge_otp($reg_form['fname'],$reg_form['email'],$errors,$reg_form['phone'],'phone');
			else if(strcasecmp($this->otpType,"mo_event_both_enable")==0)
				miniorange_site_challenge_otp($reg_form['fname'],$reg_form['email'],$errors,$reg_form['phone'],'both');
			else
				miniorange_site_challenge_otp($reg_form['fname'],$reg_form['email'],$errors,$reg_form['phone'],'email');
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			miniorange_site_otp_validation_form($user_login,$user_email,$phone_number,MoUtility::_get_invalid_otp_method(),$otp_type,$from_both);
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$this->unsetOTPSessionVariables();
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

			update_option('mo_customer_validation_event_default_enable',
				isset( $_POST['mo_customer_validation_event_default_enable']) ? $_POST['mo_customer_validation_event_default_enable'] : '');
			update_option('mo_customer_validation_event_enable_type',
				isset( $_POST['mo_customer_validation_event_enable_type']) ? $_POST['mo_customer_validation_event_enable_type'] : '');

		}
	}
	new EventRegistrationForm;