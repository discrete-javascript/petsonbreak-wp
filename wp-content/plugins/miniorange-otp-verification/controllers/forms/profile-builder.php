<?php

//profile builder
$pb_enabled = get_option('mo_customer_validation_pb_default_enable')  ? "checked" : "";

include MOV_DIR . 'views/forms/profile-builder.php';