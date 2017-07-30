<?php

class MoUtility
{

	public static function get_hidden_phone($phone)
	{
		return 'xxxxxxx' . substr($phone,strlen($phone) - 3);
	}

	public static function isBlank( $value )
	{
		if( ! isset( $value ) || empty( $value ) ) return TRUE;
		return FALSE;
	}

	public static function _create_json_response($message,$type)
	{
		return array( 'message' => $message, 'result' => $type);
	}

	public static function mo_is_curl_installed()
	{
		if  (in_array  ('curl', get_loaded_extensions()))
			return 1;
		else 
			return 0;
	}

	public static function currentPageUrl()
	{
		$pageURL = 'http';

		if ((isset($_SERVER["HTTPS"])) && ($_SERVER["HTTPS"] == "on"))
			$pageURL .= "s";

		$pageURL .= "://";

		if ($_SERVER["SERVER_PORT"] != "80")
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

		else
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

		if ( function_exists('apply_filters') ) apply_filters('wppb_curpageurl', $pageURL);

        return $pageURL;
	}

	public static function getDomain($email)
	{
		return $domain_name = substr(strrchr($email, "@"), 1);
	}

	public static function check_if_request_is_from_mobile_device($useragent)
	{
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			return TRUE;
		else
			return FALSE;
	}

	public static function validatePhoneNumber($phone)
	{
		if(!preg_match(MoConstants::PATTERN_PHONE,MoUtility::processPhoneNumber($phone),$matches))
			return FALSE;
		else
			return TRUE;
	}

	public static function isCountryCodeAppended($phone)
	{
		return preg_match(MoConstants::PATTERN_COUNTRY_CODE,$phone,$matches) ? true : false;
	}

	public static function processPhoneNumber($phone)
	{
		$defaultCountryCode = CountryList::getDefaultCountryCode();
		$phone = !isset($defaultCountryCode) || MoUtility::isCountryCodeAppended($phone) ? $phone : $defaultCountryCode.$phone;
		return $phone;
	}

	public static function areFormOptionsBeingSaved()
	{
		return current_user_can('manage_options') 
				&& MoUtility::micr() 
				&& isset($_POST['option']) 
				&& 'mo_customer_validation_settings'==$_POST['option'];
	}

	public static function micr()
	{
		$email 			= get_option('mo_customer_validation_admin_email');
		$customerKey 	= get_option('mo_customer_validation_admin_customer_key');
		if( ! $email || ! $customerKey || ! is_numeric( trim( $customerKey ) ) )
			return 0;
		else
			return 1;
	}

	public static function micv()
	{
		$email 			= get_option('mo_customer_validation_admin_email');
		$customerKey 	= get_option('mo_customer_validation_admin_customer_key');
		if( ! $email || ! $customerKey || ! is_numeric( trim( $customerKey ) ) )
			return 0;
		else
			return get_option('mo_customer_check_ln') ? get_option('mo_customer_check_ln') :  0;
	}

	public static function mclv()
	{
		$key 		= get_option('mo_customer_validation_customer_token');
		$isVerified = isset($key) && !empty($key) ? AESEncryption_OTP::decrypt_data(get_option('site_email_ckl'),$key) : "false";
		$licenseKey = get_option('email_verification_lk');
		$email 		= get_option('mo_customer_validation_admin_email');
		$customerKey= get_option('mo_customer_validation_admin_customer_key');
		if( $isVerified!="true" || !$licenseKey || ! $email || ! $customerKey || ! is_numeric( trim( $customerKey ) ) ){
			return 0;
		}else {
			return 1;
		}
	}

	public static function checkSession()
	{
		if (session_id() == '' || !isset($_SESSION)) session_start();
	}

	public static function _handle_mo_check_ln($showMessage,$customerKey,$apiKey)
	{
		$msg = 'FREE_PLAN_MSG';
		$plan = array();
		$content = json_decode(MocURLOTP::check_customer_ln($customerKey,$apiKey), true);
		if(strcasecmp($content['status'], 'SUCCESS') == 0)
		{
			array_key_exists('licensePlan', $content) && isset($content['licensePlan']) 
				? update_option('mo_customer_check_ln',base64_encode($content['licensePlan'])) : update_option('mo_customer_check_ln','');
			if(array_key_exists('licensePlan', $content) && isset($content['licensePlan']))
			{
				$msg = 'UPGRADE_MSG';
				$plan = array('plan'=>$content['licensePlan']);
			}
			$emailRemaining = isset($content['emailRemaining']) ? $content['emailRemaining'] : 0;
			$smsRemaining = isset($content['smsRemaining']) ? $content['smsRemaining'] : 0;
			update_option('mo_customer_email_transactions_remaining',$emailRemaining);
			update_option('mo_customer_phone_transactions_remaining',$smsRemaining);
		} 
		if($showMessage)
			do_action('mo_registration_show_message', MoMessages::showMessage($msg,$plan),'SUCCESS');
	}

	public static function initialize_transaction($form,$sessionValue = "true")
	{
		MoUtility::checkSession();
		$reflect = new ReflectionClass('FormSessionVars');
		foreach ($reflect->getConstants()  as $key => $value)
			unset($_SESSION[$value]);
		$_SESSION[$form] = $sessionValue;
	}

	public static function _get_invalid_otp_method()
	{
		return get_option("mo_otp_invalid_message") ? get_option("mo_otp_invalid_message") :  MoMessages::showMessage('INVALID_OTP');
	}

}
