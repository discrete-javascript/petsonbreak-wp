jQuery(document).ready(function () {	
    $mo = jQuery;
    var html = "<div style='display:table;text-align:center;'><img src='"+moninjavars.imgURL+"'></div>";
    $mo(document).on("click","#miniorange_otp_token_submit",function(o){
		var e=$mo("input[name='"+moninjavars.key+"']").val();
		$mo("#mo_message").empty(),
		$mo("#mo_message").append(html),
		$mo("#mo_message").show(),
		$mo.ajax({
			url: moninjavars.siteURL+"/?option=miniorange-nj-ajax-verify",
			type:"POST",
			data:{user_email:e,user_phone:e},
			crossDomain:!0,dataType:"json",
			success:function(o){ 
				if(o.result=="success"){$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").css("border-top","3px solid green"),$mo('#moSubmit').removeClass('disabled'),$mo("input[name=mo_verify]").focus()
    			}else{$mo("#mo_message").empty(),$mo("#mo_message").append(o.message),$mo("#mo_message").css("border-top","3px solid red"),$mo("input[name=mo_verify]").focus()};
    		},
    		error:function(o,e,n){}
    	});
    });
});