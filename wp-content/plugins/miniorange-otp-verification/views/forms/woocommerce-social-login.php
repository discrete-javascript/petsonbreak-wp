<?php

echo' 	<div class="mo_otp_form"><input type="checkbox" '.$disabled.' id="wc_checkout" class="app_enable" name="mo_customer_validation_wc_social_login_enable" value="1"
			'.$wc_social_login.' /><strong>Woocommerce Social Login <i>'. __( "( SMS Verification Only )",MoConstants::TEXT_DOMAIN).'</i></strong>';

		get_plugin_form_link(MoConstants::WC_SOCIAL_LOGIN);

echo' </div>';

