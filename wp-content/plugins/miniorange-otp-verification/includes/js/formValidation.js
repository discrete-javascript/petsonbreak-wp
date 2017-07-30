jQuery(document).ready(function () {    
    $mo = jQuery;

    //form validation
    $mo("#ov_settings_button").click(function() {

        //wp default form
        if(!$mo("#wp_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_wp_default_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_wp_default_enable_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_wp_default_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'WP_CHOOSE_METHOD ');
                $mo("#wp_default").prop("checked",false);
            }
        }

        //woocommerce default form
        if(!$mo("#wc_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_wc_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_wc_enable_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_wc_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'WC_CHOOSE_METHOD ');
                $mo("#wc_default").prop("checked",false);
            }
        }

        //woocommerce checkout form
         if(!$mo("#wc_checkout").is(':checked')){
            if($mo('input[name=mo_customer_validation_wc_checkout_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_wc_checkout_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_wc_checkout_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'WC_SOCIAL_CHOOSE ');
                $mo("#wc_checkout").prop("checked",false);
            }
        }

        //buddypress form
        if(!$mo("#bbp_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_bbp_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_bbp_enable_type]').prop("checked", false);
        }else{
            if($mo('input[name=mo_customer_validation_bbp_enable_type]').is(':checked')){
                if($mo('#bbp_phone').is(':checked')){
                    if ($mo('#bbp_phone_field_key').val() === ''){
                        $mo("#bbp_default").prop("checked", false);
                        $mo('#bbp_phone').prop("checked", false);
                        $mo('input[name=bbp_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'BP_PROVIDE_FIELD_KEY ');
                    }else{
                        $mo('input[name=bbp_phone_field_key]').val($mo('#bbp_phone_field_key').val());
                    }
                }else if($mo('#bbp_both').is(':checked')){
                    if ($mo('#bbp_phone_field_key1').val() === ''){
                        $mo("#bbp_default").prop("checked", false);
                        $mo('#bbp_both').prop("checked", false);
                        $mo('input[name=bbp_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'BP_PROVIDE_FIELD_KEY ');
                    }else{
                        $mo('input[name=bbp_phone_field_key]').val($mo('#bbp_phone_field_key1').val());
                    }
                }else if($mo('#bbp_rcon').is(':checked')){
                    if ($mo('#bbp_rcon_server_addr').val() === '' || $mo('#bbp_rcon_server_port').val() === ''){
                        $mo("#bbp_default").prop("checked", false);
                        $mo('#bbp_rcon').prop("checked", false);
                        $mo('input[name=bbp_rcon_server_addr]').val('');
                        $mo('input[name=bbp_rcon_server_port]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'GIVE_SEVER_DETAILS ');
                    }
                }else{
                     $mo('input[name=bbp_phone_field_key]').val('');
                }
            }else{
                    $mo("#bbp_default").prop("checked", false);
                    $mo('#error_message').val($mo('#error_message').val()+'BP_CHOOSE ');
            }
        }

        //simplr form
        if(!$mo("#simplr_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_simplr_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_simplr_enable_type]').prop("checked", false);
            $mo('input[name=simplr_phone_field_key]').val('');
        }else{
            if($mo('input[name=mo_customer_validation_simplr_enable_type]').is(':checked')){
                if($mo('#simplr_phone').is(':checked')){
                    if ($mo('#simplr_phone_field_key1').val() === ''){
                        $mo("#simplr_default").prop("checked", false);
                        $mo('#simplr_phone').prop("checked", false);
                        $mo('input[name=simplr_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'SMPLR_PROVIDE_FIELD ');
                    }else{
                        $mo('input[name=simplr_phone_field_key]').val($mo('#simplr_phone_field_key1').val());
                    }
                }else if($mo('#simplr_both').is(':checked')){
                    if ($mo('#simplr_phone_field_key2').val() === ''){
                        $mo("#simplr_default").prop("checked", false);
                        $mo('#simplr_both').prop("checked", false);
                        $mo('input[name=simplr_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'SMPLR_PROVIDE_FIELD ');
                    }else{
                        $mo('input[name=simplr_phone_field_key]').val($mo('#simplr_phone_field_key2').val());
                    }
                }else{
                     $mo('input[name=simplr_phone_field_key]').val('');
                }
            }else{
                    $mo("#simplr_default").prop("checked", false);
                    $mo('#error_message').val($mo('#error_message').val()+'SIMPLR_CHOOSE ');
            }
        }

        //ultimate memeber form
        if(!$mo("#um_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_um_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_um_enable_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_um_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'UM_CHOOSE ');
                $mo("#um_default").prop("checked",false);
            }
        }

        //event registration form
        if(!$mo("#event_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_event_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_event_enable_type]').prop("checked", false);
        }else{
             if( !$mo('input[name=mo_customer_validation_event_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'EVENT_CHOOSE ');
                $mo("#event_default").prop("checked",false);
            }
        }

        //user ultra form
       if(!$mo("#uultra_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_uultra_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_uultra_enable_type]').prop("checked", false);
            $mo('input[name=uultra_phone_field_key]').val('');
        }else{
            if($mo('input[name=mo_customer_validation_uultra_enable_type]').is(':checked')){

                if($mo('#uultra_phone').is(':checked')){
                    if ($mo('#uultra_phone_field_key').val() === ''){
                        $mo("#uultra_default").prop("checked", false);
                        $mo('#uultra_phone').prop("checked", false);
                        $mo('input[name=uultra_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'UULTRA_PROVIDE_FIELD ');
                    }else{
                        $mo('input[name=uultra_phone_field_key]').val($mo('#uultra_phone_field_key').val());
                    }
                }else if($mo('#uultra_both').is(':checked')){
                    if ($mo('#uultra_phone_field_key1').val() === ''){
                        $mo("#uultra_default").prop("checked", false);
                        $mo('#uultra_both').prop("checked", false);
                        $mo('input[name=uultra_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'UULTRA_PROVIDE_FIELD ');
                    }else{
                        $mo('input[name=uultra_phone_field_key]').val($mo('#uultra_phone_field_key1').val());
                    }
                }else{
                     $mo('input[name=uultra_phone_field_key]').val('');
                }
            }else{ 
                   $mo("#uultra_default").prop("checked", false);
                   $mo('#error_message').val($mo('#error_message').val()+'UULTRA_CHOOSE ');

            }
        }

        //crf form
        if(!$mo("#crf_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_crf_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_crf_enable_type]').prop("checked", false);
            $mo('input[name=crf_phone_field_key]').val('');
            $mo('input[name=crf_email_field_key]').val('');
        }else{
            if($mo('input[name=mo_customer_validation_crf_enable_type]').is(':checked')){
                if($mo('#crf_phone').is(':checked')){
                    if ($mo('#crf_phone_field_key').val() === ''){
                        $mo("#crf_default").prop("checked", false);
                        $mo('#crf_phone').prop("checked", false);
                        $mo('input[name=crf_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'CRF_PROVIDE_PHONE_KEY ');
                    }else{
                        $mo('input[name=crf_phone_field_key]').val($mo('#crf_phone_field_key').val());
                    }
                }else if($mo('#crf_email').is(':checked')){
                    if ($mo('#crf_email_field_key').val() === ''){
                        $mo("#crf_default").prop("checked", false);
                        $mo('#crf_email').prop("checked", false);
                        $mo('input[name=crf_email_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'CRF_PROVIDE_EMAIL_KEY ');
                    }else{
                        $mo('input[name=crf_email_field_key]').val($mo('#crf_email_field_key').val());
                    }
                }else if($mo('#crf_both').is(':checked')){
                    if ($mo('#crf_phone_field_key1').val() === '' || $mo('#crf_email_field_key1').val() === ''){
                        $mo("#crf_default").prop("checked", false);
                        $mo('#crf_both').prop("checked", false);
                        $mo('input[name=crf_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'CRF_PROVIDE_EMAIL_KEY CRF_PROVIDE_PHONE_KEY ');
                    }else{
                        $mo('input[name=crf_phone_field_key]').val($mo('#crf_phone_field_key1').val());
                        $mo('input[name=crf_email_field_key]').val($mo('#crf_email_field_key1').val());
                    }
                }else{
                     $mo('input[name=crf_phone_field_key]').val('');
                     $mo('input[name=crf_email_field_key]').val('');
                }
            }else{
                    $mo("#crf_default").prop("checked", false);
                    $mo('#error_message').val($mo('#error_message').val()+'CRF_CHOOSE ');
            }
        }

        //userProfile made easy
        if(!$mo("#upme_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_upme_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_upme_enable_type]').prop("checked", false);
            $mo('input[name=upme_phone_field_key]').val('');
        }else{
            if($mo('input[name=mo_customer_validation_upme_enable_type]').is(':checked')){

                if($mo('#upme_phone').is(':checked')){
                    if ($mo('#upme_phone_field_key').val() === ''){
                        $mo("#upme_default").prop("checked", false);
                        $mo('#upme_phone').prop("checked", false);
                        $mo('input[name=upme_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'UPME_PROVIDE_PHONE_KEY ');
                    }else{
                        $mo('input[name=upme_phone_field_key]').val($mo('#upme_phone_field_key').val());
                    }
                }else if($mo('#upme_both').is(':checked')){
                    if ($mo('#upme_phone_field_key1').val() === ''){
                        $mo("#upme_default").prop("checked", false);
                        $mo('#upme_both').prop("checked", false);
                        $mo('input[name=upme_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'UPME_PROVIDE_PHONE_KEY ');
                    }else{
                        $mo('input[name=upme_phone_field_key]').val($mo('#upme_phone_field_key1').val());
                    }
                }else{
                     $mo('input[name=upme_phone_field_key]').val('');
                }
            }else{ 
                   $mo("#upme_default").prop("checked", false);
                   $mo('#error_message').val($mo('#error_message').val()+'UPME_CHOOSE ');

            }
        }

        //pie registration
        if(!$mo("#pie_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_pie_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_pie_enable_type]').prop("checked", false);
            $mo('input[name=pie_phone_field_key]').val('');
       }else{
            if($mo('input[name=mo_customer_validation_pie_enable_type]').is(':checked')){
                if($mo('#pie_phone').is(':checked')){
                    if ($mo('#pie_phone_field_key').val() === ''){
                        $mo("#pie_default").prop("checked", false);
                        $mo('#pie_phone').prop("checked", false);
                       $mo('input[name=pie_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'PIE_PROVIDE_PHONE_KEY ');
                    }
                    else{
                        $mo('input[name=pie_phone_field_key]').val($mo('#pie_phone_field_key').val());
                    }
                }else if($mo('#pie_both').is(':checked')){
                    if ($mo('#pie_phone_field_key1').val() === ''){
                        $mo("#pie_default").prop("checked", false);
                        $mo('#pie_both').prop("checked", false);
                        $mo('input[name=pie_phone_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'PIE_PROVIDE_PHONE_KEY ');
                    }
                    else{
                        $mo('input[name=pie_phone_field_key]').val($mo('#pie_phone_field_key1').val());
                    }
                }else{
                     $mo('input[name=pie_phone_field_key]').val();
                }
            }else{ 
                   $mo("#pie_default").prop("checked", false);
                   $mo('#error_message').val($mo('#error_message').val()+'PIE_CHOOSE ');
            }
        }

        //cf7 contact form
        if(!$mo("#cf7_contact").is(':checked')){
            if($mo('input[name=mo_customer_validation_cf7_contact_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_cf7_contact_type]').prop("checked", false);
            $mo('input[name=cf7_email_field_key]').val('');
        }else{
            if($mo('input[name=mo_customer_validation_cf7_contact_type]').is(':checked')){

                if($mo('#cf7_contact_email').is(':checked')){
                    if ($mo('#cf7_email_field_key').val() === ''){
                        $mo("#cf7_contact").prop("checked", false);
                        $mo('#cf7_contact_email').prop("checked", false);
                        $mo('input[name=cf7_email_field_key]').val('');
                        $mo('#error_message').val($mo('#error_message').val()+'CF7_PROVIDE_EMAIL_KEY ');
                    }
                }else{
                     $mo('input[name=cf7_email_field_key]').val('');
                }
            }else{ 
                   $mo("#cf7_contact").prop("checked", false);
                   $mo('#error_message').val($mo('#error_message').val()+'CF7_CHOOSE ');
            }
        }

        //ninja form
        if(!$mo("#ninja_form").is(':checked')){
            if($mo('input[name=mo_customer_validation_ninja_form_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_ninja_form_enable_type]').prop("checked", false);
            $mo('input[name^=ninja_form]').each(function() {
                $mo(this).val('');
            });
        }else{
            if(!$mo('input[name=mo_customer_validation_ninja_form_enable_type]').is(':checked')){
                $mo("#ninja_form").prop("checked", false);
                $mo('#error_message').val($mo('#error_message').val()+'NINJA_CHOOSE');
            }
            else{
                var empty = 0;
                if($mo("#ninja_form_email").is(':checked')){
                    $mo("#nfe_instructions [id^=ninja_form_email_]").each(function() {
                        if($mo(this).val()==''){ empty = 1; }   
                        if($mo(this).prev('input[name^=ninja_form]').first().val()==''){ empty = 1; }
                    });
                }
                if($mo("#ninja_form_phone").is(':checked')){
                    $mo('#nfp_instructions [id^=ninja_form_phone_]').each(function() {
                        if($mo(this).val()==''){ empty = 1; }
                        if($mo(this).prev('input[name^=ninja_form]').first().val()==''){ empty = 1; }
                    });
                }
                if($mo("#ninja_form_both").is(':checked')){
                    $mo('#nfb_instructions [id^=ninja_form_both_email_]').each(function() {
                        if($mo(this).val()==''){ empty = 1; }
                        if($mo(this).prev('input[name^=ninja_form]').first().val()==''){ empty = 1; }
                    });
                    $mo('#nfb_instructions [id^=ninja_form_both_phone_]').each(function() {
                        if($mo(this).val()==''){ empty = 1; }
                    });
                } 
                if(empty){
                    $mo("#ninja_form").prop("checked", false);
                    $mo('#error_message').val($mo('#error_message').val()+'NINJA_FORM_FIELD_ERROR');
                    $mo('input[name=mo_customer_validation_ninja_form_enable_type]').prop("checked", false);
                }
            }
        }

        //tml form
        if(!$mo("#tml_default").is(':checked')){
            if($mo('input[name=mo_customer_validation_tml_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_tml_enable_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_tml_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'TMLM_CHOOSE ');
                $mo("#tml_default").prop("checked",false);
            }
        }

        //userpro form
        if(!$mo("#userpro_registration").is(':checked')){
            if($mo('input[name=mo_customer_validation_userpro_registration_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_userpro_registration_type]').prop("checked", false);
        }else{
            if( !$mo('input[name=mo_customer_validation_userpro_registration_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'USERPRO_CHOOSE ');
                $mo("#userpro_registration").prop("checked",false);
            }
        }

        //gravity form
        if(!$mo("#gf_contact").is(':checked')){
            if($mo('input[name=mo_customer_validation_gf_contact_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_gf_contact_type]').prop("checked", false);
            $mo('input[name^="gravity_form"]').each(function() {
                $mo(this).val('');
            });
        }else{
            if(!$mo('input[name=mo_customer_validation_gf_contact_type]').is(':checked')){
                $mo("#gravity_form").prop("checked", false);
                $mo('#error_message').val($mo('#error_message').val()+'GRAVITY_CHOOSE');
            }
        }

        //ultimate pro form
        if(!$mo("#wp_member_reg").is(':checked')){
            if($mo('input[name=mo_customer_validation_wp_member_reg_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_wp_member_reg_enable_type]').prop("checked", false);
        }else{
             if( !$mo('input[name=mo_customer_validation_wp_member_reg_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'WP_MEMBER_CHOOSE');
                $mo("#wp_member_reg").prop("checked",false);
            }
        }

        //wp member
        if(!$mo("#ultimatepro").is(':checked')){
            if($mo('input[name=mo_customer_validation_ultipro_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_ultipro_type]').prop("checked", false);
        }else{
             if( !$mo('input[name=mo_customer_validation_ultipro_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'UMPRO_CHOOSE');
                $mo("#ultimatepro").prop("checked",false);
            }
        }

        //classify theme
        if(!$mo("#classify_theme").is(':checked')){
            if($mo('input[name=mo_customer_validation_classify_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_classify_type]').prop("checked", false);
        }else{
             if( !$mo('input[name=mo_customer_validation_classify_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'CLASSIFY_THEME');
                $mo("#classify_theme").prop("checked",false);
            }
        }

        //reales theme
        if(!$mo("#reales_reg").is(':checked')){
            if($mo('input[name=mo_customer_validation_reales_enable_type]').is(':checked'))
                $mo('input[name=mo_customer_validation_reales_enable_type]').prop("checked", false);
        }else{
             if( !$mo('input[name=mo_customer_validation_reales_enable_type]').is(':checked')){
                $mo('#error_message').val($mo('#error_message').val()+'REALES_THEME');
                $mo("#reales_reg").prop("checked",false);
            }
        }

        //Default Login Form
        if(!$mo("#wp_login").is(':checked')){
            $mo('input[name=mo_customer_validation_wp_login_register_phone]').prop("checked", false);
            $mo('input[name=mo_customer_validation_wp_login_bypass_admin]').prop("checked", false);
            $mo('input[name=wp_login_phone_field_key]').val("");
        }else{
             if($mo('input[name=wp_login_phone_field_key]').val()==""){
                $mo('#error_message').val($mo('#error_message').val()+'WP_LOGIN_MISSING_KEY');
                $mo('input[name=mo_customer_validation_wp_login_register_phone]').prop("checked", false);
                $mo('input[name=mo_customer_validation_wp_login_bypass_admin]').prop("checked", false);
                $mo("#wp_login").prop("checked",false);
            }
        }

        $mo("#mo_otp_verification_settings").submit();
    });
});

    