<?php

//ninja form
$ninja_ajax_form_enabled		  = get_option('mo_customer_validation_nja_enable') ? "checked" : "";
$ninja_ajax_form_hidden		  	  = $ninja_ajax_form_enabled== "checked" ? "" : "hidden";
$ninja_ajax_form_enabled_type  	  = $ninja_ajax_form_enabled== "checked" ? get_option('mo_customer_validation_ninja_form_enable_type') : "";
$ninja_ajax_form_list 		      = admin_url().'admin.php?page=ninja-forms';
$ninja_ajax_form_otp_enabled      = $ninja_ajax_form_enabled== "checked" ? maybe_unserialize(get_option('mo_customer_validation_ninja_form_otp_enabled')) : "";

include MOV_DIR . 'views/forms/ninja-forms-v3.php';

function get_nfa_form_list($ninja_ajax_form_otp_enabled,$disabled,$key)
{
	$keyunter = 0;
	if(!MoUtility::isBlank($ninja_ajax_form_otp_enabled))
	{
		foreach ($ninja_ajax_form_otp_enabled as $form_id=>$ninja_form) 
		{
			echo '<div id="ajax_row'.$key.'_'.$keyunter.'">
					'.__( "Form ID", MoConstants::TEXT_DOMAIN).': <input class="field_data" id="ninja_ajax_form_'.$keyunter.'" name="ninja_ajax_form[form][]" type="text" value="'.$form_id.'">&nbsp;';
			echo '<span '.($key==2 ? 'hidden' : '' ).'>&nbsp;'.__( "Email Field Key", MoConstants::TEXT_DOMAIN).': <input class="field_data" id="ninja_form_email_'.$key.'_'.$keyunter.'" name="ninja_ajax_form[emailkey][]" type="text" value="'.$ninja_form['email_show_key'].'"></span>';
			echo '<span '.($key==1 ? 'hidden' : '' ).'>'.__( "Phone Field Key", MoConstants::TEXT_DOMAIN).': <input class="field_data" id="ninja_form_phone_'.$key.'_'.$keyunter.'" name="ninja_ajax_form[phonekey][]" type="text" value="'.$ninja_form['phone_show_key'].'"></span>';
			echo '<span>&nbsp; '.__( "Verification Field Key", MoConstants::TEXT_DOMAIN).': <input class="field_data" id="ninja_form_verify_'.$key.'_'.$keyunter.'" name="ninja_ajax_form[verifyKey][]" type="text" value="'.$ninja_form['verify_show_key'].'"></span>';
			echo '</div>';
			$keyunter+=1;
		}
	}
	else
	{
		echo '<div id="ajax_row'.$key.'_0"> 
			'.__( "Form ID", MoConstants::TEXT_DOMAIN).': <input id="ninja_ajax_form_'.$key.'_0" class="field_data"  name="ninja_ajax_form[form][]" type="text" value="">&nbsp;';
		echo '<span '.($key==2 ? 'hidden' : '' ).'>&nbsp;'.__( "Email Field Key", MoConstants::TEXT_DOMAIN).': <input id="ninja_form_email_'.$key.'_0" class="field_data" name="ninja_ajax_form[emailkey][]" type="text" value=""></span>';
		echo '<span '.($key==1 ? 'hidden' : '' ).'>'.__( "Phone Field Key", MoConstants::TEXT_DOMAIN).': <input id="ninja_form_phone_'.$key.'_0" class="field_data"  name="ninja_ajax_form[phonekey][]" type="text" value=""></span>';
		echo '<span>&nbsp; '.__( "Verification Field Key", MoConstants::TEXT_DOMAIN).': <input class="field_data" id="ninja_form_verify_'.$key.'_0" name="ninja_ajax_form[verifyKey][]" type="text" value=""></span>';
		echo '</div>';
	}
	$result['counter']	 = $keyunter;
	return $result;
}