<?php

$sms_template_guide_url 	= MoUtility::micv() ? 'includes/images/smsTemplate.jpg' 	: 'includes/images/smsTemplateOb.jpg';
$sms_gateway_guide_url 		= MoUtility::micv() ? 'includes/images/smsGateway.jpg' 		: 'includes/images/smsGatewayOb.jpg';
$email_template_guide_url 	= MoUtility::micv() ? 'includes/images/emailTemplate.jpg' 	: 'includes/images/emailTemplateOb.jpg';
$email_gateway_guide_url 	= MoUtility::micv() ? 'includes/images/emailGateway.jpg' 	: 'includes/images/emailGatewayOb.jpg';
$hidden			   			= MoUtility::micv() ? '' 									: "hidden"; 

include MOV_DIR . 'views/configuration.php';