<?php

$otp_blocked_email_domains = get_option('mo_customer_validation_blocked_domains');
$otp_blocked_phones = get_option('mo_customer_validation_blocked_phone_numbers');

include MOV_DIR . 'views/otpsettings.php';