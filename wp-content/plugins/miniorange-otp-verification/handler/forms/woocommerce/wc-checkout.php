<?php

	class WooCommerceCheckOutForm extends FormInterface
	{
		private $guestCheckOutOnly;
		private $showButton;
		private $otpType;
		private $formSessionVar = FormSessionVars::WC_CHECKOUT;
		private $popupEnabled;

		function handleForm()
		{
			add_action( 'woocommerce_checkout_process', array($this,'my_custom_checkout_field_process'));

			$this->popupEnabled		= !MoUtility::isBlank(get_option('mo_customer_validation_wc_checkout_popup')) ? TRUE : FALSE;
			$this->guestCheckOutOnly= !MoUtility::isBlank(get_option('mo_customer_validation_wc_checkout_guest')) ? TRUE : FALSE;
			$this->showButton 		= !MoUtility::isBlank(get_option('mo_customer_validation_wc_checkout_button'))? TRUE : FALSE;
			$this->otpType 			= get_option('mo_customer_validation_wc_checkout_type');

			if($this->popupEnabled)  add_action( 'woocommerce_after_checkout_billing_form' , array($this,'add_custom_popup') 		,99		);
			if($this->popupEnabled)  add_action( 'woocommerce_review_order_after_submit'   , array($this,'add_custom_button')		, 1, 1	);
			if(!$this->popupEnabled) add_action( 'woocommerce_after_checkout_billing_form' , array($this,'my_custom_checkout_field'),99		);

			$this->routeData();
		}

		public static function isFormEnabled()
		{
			return get_option('mo_customer_validation_wc_checkout_enable') ? true : false;
		}

		function routeData()
		{
			if(!array_key_exists('option', $_GET)) return;
			if(strcasecmp(trim($_GET['option']),'miniorange-woocommerce-checkout') == 0) $this->handle_woocommere_checkout_form($_POST);
		}

		function handle_woocommere_checkout_form($getdata)
		{
			MoUtility::checkSession();
			MoUtility::initialize_transaction($this->formSessionVar);
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				miniorange_site_challenge_otp('test',$getdata['user_email'],null, trim($getdata['user_phone']),"phone");
			else
				miniorange_site_challenge_otp('test',$getdata['user_email'],null,null,"email");
		}

		function checkIfVerificationNotStarted()
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])){
				wc_add_notice(  MoMessages::showMessage('ENTER_VERIFY_CODE'), 'error' );
				return TRUE;
			}
			return FALSE;
		}

		function checkIfVerificationCodeNotEntered()
		{
			if(array_key_exists('order_verify', $_POST) && isset($_POST['order_verify'])) return FALSE;

			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				wc_add_notice(  MoMessages::showMessage('ENTER_PHONE_CODE'), 'error' );
			else
				wc_add_notice(  MoMessages::showMessage('ENTER_EMAIL_CODE'), 'error' );
			return TRUE;
		}

		function add_custom_button($order_id)
		{
			if($this->guestCheckOutOnly && is_user_logged_in())  return;
			$this->show_validation_button_or_text(TRUE);
			$this->common_button_or_link_enable_disable_script();
			echo ',$mo(".woocommerce-error").length>0&&$mo("html, body").animate({scrollTop:$mo("div.woocommerce").offset().top-50},1e3),$mo("#miniorange_otp_token_submit").click(function(o){var e=$mo("input[name=billing_email]").val(),m=$mo("input[name=billing_phone]").val(),a=$mo("div.woocommerce");a.addClass("processing").block({message:null,overlayCSS:{background:"#fff",opacity:.6}}),$mo.ajax({url:"'.site_url().'/?option=miniorange-woocommerce-checkout",type:"POST",data:{user_email:e,user_phone:m},crossDomain:!0,dataType:"json",success:function(o){"success"==o.result?($mo(".blockUI").hide(),$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").addClass("woocommerce-message"),$mo("#myModal").show(),$mo("#mo_customer_validation_otp_token").focus()):($mo(".blockUI").hide(),$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").addClass("woocommerce-error"),$mo("#mo_validate_field").hide(),$mo("#myModal").show())},error:function(o,e,m){}}),o.preventDefault()}),$mo("#miniorange_otp_validate_submit").click(function(o){$mo("#myModal").hide(),$mo(".woocommerce-checkout").submit()});});';
			echo '</script>';
		}

		function add_custom_popup()
		{
			if($this->guestCheckOutOnly && is_user_logged_in())  return;
			echo '<style>.modal{display:none;position:fixed;z-index:1;padding-top:100px;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0,0,0);background-color:rgba(0,0,0,0.4);}.modal-content{position:relative;background-color:#fefefe;margin:auto;padding:0;border:1px solid #888;width:40%;box-shadow:04px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);-webkit-animation-name:animatetop;-webkit-animation-duration:0.4s;animation-name:animatetop;animation-duration:0.4s}@-webkit-keyframes animatetop{from{top:-300px;opacity:0}to{top:0;opacity:1}}@keyframes animatetop{from{top:-300px;opacity:0}to{top:0;opacity:1}}.close{color:white;float:right;font-size:28px;font-weight:bold;}.close:hover,.close:focus{color:#000;text-decoration:none;cursor:pointer;}.modal-header{background-color:#5cb85c;color:white;}.modal-footer{background-color:#5cb85c;color:white;}</style>';
			echo ' <div id="myModal" class="modal"><div class="modal-content"><div class="modal-body"><div id="mo_message">EMPTY</div><div id="mo_validate_field" style="margin:1em"><input type="number" name="order_verify" autofocus="true" placeholder="" id="mo_customer_validation_otp_token" required="true" class="mo_customer_validation-textbox" autofocus="true" pattern="[0-9]{4,8}" title="'.__("Only digits within range 4-8 are allowed.").'"/><input type="button" name="miniorange_otp_validate_submit"  style="margin-top:1%;width:100%" id="miniorange_otp_validate_submit" class="miniorange_otp_token_submit"  value="'.__("Validate OTP",MoConstants::TEXT_DOMAIN).'" /></div></div></div></div>';
		}

		function my_custom_checkout_field( $checkout )
		{
			if($this->guestCheckOutOnly && is_user_logged_in())  return;

			$this->show_validation_button_or_text();

			echo '<div id="mo_message" hidden></div>';

			woocommerce_form_field( 'order_verify', array(
	        'type'          => 'text',
	        'class'         => array('form-row-wide'),
	        'label'         => __('Verify Code',MoConstants::TEXT_DOMAIN),
	        'required'  	=> true,
	        'placeholder'   => __('Enter Verification Code',MoConstants::TEXT_DOMAIN),
	        ), $checkout->get_value( 'order_verify' ));

	        $this->common_button_or_link_enable_disable_script();

			echo ',$mo(".woocommerce-error").length>0&&$mo("html, body").animate({scrollTop:$mo("div.woocommerce").offset().top-50},1e3),$mo("#miniorange_otp_token_submit").click(function(o){var e=$mo("input[name=billing_email]").val(),n=$mo("input[name=billing_phone]").val(),a=$mo("div.woocommerce");a.addClass("processing").block({message:null,overlayCSS:{background:"#fff",opacity:.6}}),$mo.ajax({url:"'.site_url().'/?option=miniorange-woocommerce-checkout",type:"POST",data:{user_email:e, user_phone:n},crossDomain:!0,dataType:"json",success:function(o){ if(o.result=="success"){$mo(".blockUI").hide(),$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").addClass("woocommerce-message"),$mo("#mo_message").show(),$mo("#order_verify").focus()}else{$mo(".blockUI").hide(),$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").addClass("woocommerce-error"),$mo("#mo_message").show();} ;},error:function(o,e,n){}}),o.preventDefault()});});</script>';
		}

		function show_validation_button_or_text($popup=FALSE)
		{
			if(!$this->showButton) $this->showTextLinkOnPage();
			if($this->showButton) $this->showButtonOnPage();
		}

		function showTextLinkOnPage()
		{
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				echo '<div title="'.__("Please Enter a Phone Number to enable this link").'"><a href="#" style="text-align:center;color:grey;pointer-events:none;" id="miniorange_otp_token_submit" class="" >'.__("[ Click here to verify your Phone ]",MoConstants::TEXT_DOMAIN).'</a></div>';
			else
				echo '<div title="'.__("Please Enter an Email Address to enable this link").'"><a href="#" style="text-align:center;color:grey;pointer-events:none;" id="miniorange_otp_token_submit" class="" >'.__("[ Click here to verify your Email ]",MoConstants::TEXT_DOMAIN).'</a></div>';
		}

		function showButtonOnPage()
		{
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				echo '<input type="button" class="button alt" style="'
					. ( $this->popupEnabled ? 'width: 40%;float: right;line-height: 1;margin-right: 2em;padding: 1em 2em;' : 'width:100%' )
					.'" id="miniorange_otp_token_submit" disabled title="'
					.__("Please Enter a Phone Number to enable this.",MoConstants::TEXT_DOMAIN).'" value="'
					.__("Click here to verify your Phone",MoConstants::TEXT_DOMAIN).'"></input>';
			else
				echo '<input type="button" class="button alt" style="'
					. ( $this->popupEnabled ? 'width: 40%;float: right;line-height: 1;margin-right: 2em;padding: 1em 2em;' : 'width:100%' )
					.'" id="miniorange_otp_token_submit" disabled title="'
					.__("Please Enter an Email Address to enable this.",MoConstants::TEXT_DOMAIN).'" value="'
					.__("Click here to verify your Email",MoConstants::TEXT_DOMAIN).'"></input>';
		}

		function common_button_or_link_enable_disable_script()
		{
			echo '<script> jQuery(document).ready(function() { $mo = jQuery,';
	        echo '$mo(".woocommerce-message").length>0&&($mo("#order_verify").focus(),$mo("#mo_message").addClass("woocommerce-message"),$mo("#mo_message").show());';
			if(!$this->showButton) $this->enabledDisableScriptForTextOnPage();
			if($this->showButton) $this->enableDisableScriptForButtonOnPage();
		}

		function enabledDisableScriptForTextOnPage()
		{
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				echo '""!=$mo("input[name=billing_phone]").val()&&$mo("#miniorange_otp_token_submit").removeAttr("style"); $mo("input[name=billing_phone]").change(function(){if($mo("input[name=billing_phone]").val()!=""){$mo("#miniorange_otp_token_submit").removeAttr("style");}else{$mo("#miniorange_otp_token_submit").css({"color":"grey","pointer-events":"none"}); }})';
			else
				echo '""!=$mo("input[name=billing_email]").val()&&$mo("#miniorange_otp_token_submit").removeAttr("style"); $mo("input[name=billing_email]").change(function(){if($mo("input[name=billing_email]").val()!=""){$mo("#miniorange_otp_token_submit").removeAttr("style");}else{$mo("#miniorange_otp_token_submit").css({"color":"grey","pointer-events":"none"}); }})';
		}

		function enableDisableScriptForButtonOnPage()
		{
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				echo '""!=$mo("input[name=billing_phone]").val()&&$mo("#miniorange_otp_token_submit").prop( "disabled", false ); $mo("input[name=billing_phone]").change(function() {if ($mo("input[name=billing_phone]").val() != "") {$mo("#miniorange_otp_token_submit").prop( "disabled", false );} else { $mo("#miniorange_otp_token_submit").prop( "disabled", true ); }})';
			else
				echo '""!=$mo("input[name=billing_email]").val()&&$mo("#miniorange_otp_token_submit").prop( "disabled", false ); $mo("input[name=billing_email]").change(function() {if ($mo("input[name=billing_email]").val() != "") {$mo("#miniorange_otp_token_submit").prop( "disabled", false );} else { $mo("#miniorange_otp_token_submit").prop( "disabled", true ); }})';
		}

		function my_custom_checkout_field_process()
		{
			if($this->guestCheckOutOnly && is_user_logged_in()) return; 
			if($this->checkIfVerificationNotStarted()) return;
			if($this->checkIfVerificationCodeNotEntered()) return;
			$this->handle_otp_token_submitted(FALSE);		
		}

		function handle_otp_token_submitted($error)
		{
			if(strcasecmp($this->otpType,"mo_wc_phone_enable")==0)
				$error = $this->processPhoneNumber();
			else
				$error = $this->processEmail();
			if(!$error) $this->processOTPEntered();
		}

		function processPhoneNumber()
		{
			MoUtility::checkSession();
			if(array_key_exists('phone_number_mo', $_SESSION) 
					&& strcasecmp($_SESSION['phone_number_mo'], MoUtility::processPhoneNumber($_POST['billing_phone']))!=0)
			{
				wc_add_notice(  MoMessages::showMessage('PHONE_MISMATCH'), 'error' );
				return TRUE;
			}
		}

		function processEmail()
		{
			if(array_key_exists('user_email', $_SESSION) 
					&& strcasecmp($_SESSION['user_email'], $_POST['billing_email'])!=0)
			{
				wc_add_notice(  MoMessages::showMessage('EMAIL_MISMATCH'), 'error' );
				return TRUE;
			}
		}

		function handle_failed_verification($user_login,$user_email,$phone_number)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			wc_add_notice( MoUtility::_get_invalid_otp_method(), 'error' );
		}

		function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data)
		{
			MoUtility::checkSession();
			if(!isset($_SESSION[$this->formSessionVar])) return;
			$this->unsetOTPSessionVariables();
		}

		function processOTPEntered()
		{
			$this->validateOTPRequest();	
		}

		function validateOTPRequest()
		{
			do_action('mo_validate_otp','order_verify',NULL);
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

			update_option('mo_customer_validation_wc_checkout_enable',
				isset( $_POST['mo_customer_validation_wc_checkout_enable']) ? $_POST['mo_customer_validation_wc_checkout_enable'] : 0);
			update_option('mo_customer_validation_wc_checkout_type',
				isset(  $_POST['mo_customer_validation_wc_checkout_type']) ? $_POST['mo_customer_validation_wc_checkout_type'] : '');
			update_option('mo_customer_validation_wc_checkout_guest',
				isset(  $_POST['mo_customer_validation_wc_checkout_guest']) ? $_POST['mo_customer_validation_wc_checkout_guest'] : '');
			update_option('mo_customer_validation_wc_checkout_button',
				isset(  $_POST['mo_customer_validation_wc_checkout_button']) ? $_POST['mo_customer_validation_wc_checkout_button'] : '');
			update_option('mo_customer_validation_wc_checkout_popup',
				isset(  $_POST['mo_customer_validation_wc_checkout_popup']) ? $_POST['mo_customer_validation_wc_checkout_popup'] : '');
		}
	}
	new WooCommerceCheckOutForm;