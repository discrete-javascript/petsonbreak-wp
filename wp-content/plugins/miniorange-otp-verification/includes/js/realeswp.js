jQuery(document).ready(function () {	
    $mo = jQuery;
    var html = "<div style='display:table;text-align:center;'><img src='"+movars.imgURL+"'></div>";
    var html2 = "<div class='form-group' style='margin-top:2%'><div class='btn-group-justified'><a class='btn btn-lg btn-green' id='miniorange_otp_token_submit' title='Please Enter a "+movars.fieldname+" to enable this.'>Verify your "+movars.fieldname+"</a></div></div><div style='margin-top:2%'><div id='mo_message' hidden='' style='background-color: #f7f6f7;padding: 1em 2em 1em 3.5em;''></div></div>";
    var html3 = '<div class="form-group"><input name="mo_verify" id="mo_verify" placeholder="'+movars.placeHolder+'" class="form-control" type="text"></div>';
    var html4 = '<a class="btn btn-lg btn-green" id="moSubmit">'+movars.buttonText+'</a>';
    $mo('#submitSignup').replaceWith(html4);
    $mo('#moSubmit').addClass('disabled');
    $mo(html2).insertAfter(movars.insertAfter);
	$mo("#miniorange_otp_token_submit").click(function(o){ 
		var e=$mo("input[name='"+movars.field+"']").val(); 
		$mo("#mo_message").empty(),
		$mo("#mo_message").append(html),
		$mo("#mo_message").show(),
		$mo.ajax({
			url: movars.siteURL+"/?option=miniorange-realeswp-verify",
			type:"POST",
			data:{user_email:e,user_phone:e},
			crossDomain:!0,dataType:"json",
			success:function(o){ 
				if(o.result=="success"){
					$mo("#mo_message").empty(),
					$mo("#mo_message").append(o.message),
					$mo("#mo_message").css("border-top","3px solid green"),
					$mo(html3).insertAfter("#mo_message");
					$mo('#moSubmit').removeClass('disabled');
					$mo("input[name=mo_verify]").focus()
    			}else{
    				$mo("#mo_message").empty(),
    				$mo("#mo_message").append(o.message),
    				$mo("#mo_message").css("border-top","3px solid red"),
    				$mo("input[name=mo_verify]").focus()
    			};
    		},
    		error:function(o,e,n){}
    	});
    });
	$mo('#moSubmit').click(function() {
        validateOTP();
    });

    $mo('#usernameSignup, #firstnameSignup, #lastnameSignup, #emailSignup, #phoneSignup, #pass1Signup, #pass2Signup').keydown(function(e) {
        if(e.keyCode === 13) {
            e.preventDefault();
            validateOTP();
        }
    });
});

function validateOTP()
{
	var otp =$mo("input[name=mo_verify]").val();
	$mo('#moSubmit').html(services_vars.signin_loading).addClass('disabled');
	$mo.ajax({
		url: movars.siteURL+"/?option=miniorange-validate-realeswp-otp",
		type:"POST",
		data:{otp:otp},
		crossDomain:!0,dataType:"json",
		success:function(o){ 
			if(o.result=="success"){
				userSignup();
			}else{
				 var message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">' +
	                              '<div class="icon"><span class="fa fa-ban"></span></div>' + o.message +
	                          '</div>';
	            $mo('#signupMessage').empty().append(message);
	            $mo('#moSubmit').removeClass('disabled');
			};
		},
		error:function(o,e,n){}
	});
}

function userSignup() {
    var username          = $mo('#usernameSignup').val();
    var firstname         = $mo('#firstnameSignup').val();
    var lastname          = $mo('#lastnameSignup').val();
    var email             = $mo('#emailSignup').val();
    var phone             = $mo('#phoneSignup').val();
    var pass_1            = $mo('#pass1Signup').val();
    var pass_2            = $mo('#pass2Signup').val();
    var register_as_agent = $mo('#register_as_agent').is(':checked');
    var terms             = $mo('#terms').is(':checked');
    var security          = $mo('#securitySignup').val();
    var ajaxURL           = movars.ajaxurl;

    $mo('#moSubmit').addClass('disabled');

    $mo.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxURL,
        data: {
            'action'            : 'reales_user_signup_form',
            'signup_user'       : username,
            'signup_firstname'  : firstname,
            'signup_lastname'   : lastname,
            'signup_email'      : email,
            'signup_phone'      : phone,
            'signup_pass_1'     : pass_1,
            'signup_pass_2'     : pass_2,
            'register_as_agent' : register_as_agent,
            'terms'             : terms,
            'security'          : security
        },
        success: function(data) {
            $mo('#moSubmit').removeClass('disabled');
            if(data.signedup === true) {
                var message = '<div class="alert alert-success alert-dismissible fade in" role="alert">' +
                                  '<div class="icon"><span class="fa fa-check-circle"></span></div>' + data.message +
                              '</div>';
	            $mo('#signup').modal('hide');
	            $mo('#signin').modal('show').on('shown.bs.modal', function(e) {
                    $mo('#signinMessage').empty().append(message);
                });
            } else {
                var message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">' +
                                  '<div class="icon"><span class="fa fa-ban"></span></div>' + data.message +
                              '</div>';
                $mo('#signupMessage').empty().append(message);
            }
        },
        error: function(errorThrown) {

        }
    });
}