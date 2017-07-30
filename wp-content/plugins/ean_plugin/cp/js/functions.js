var myData = "";


function Update_All(Obj){


	$(".row_sel").attr("checked", Obj.checked);


}


$(document).ready(function (){


							


	    $(".sutmit_login").click(function(){


            if(($("#u_username").val()!="") || ($("#u_password").val()!="")){	


			var param = "action=login_this_id&username="+($("#u_username").val())+"&passw="+($("#u_password").val())+"&remember="+($("#remember").val());


			//document.write(param);


			var divname = "#msgs";


			myData = Get_Results_Ajax(param, divname, "Validate_Login_ID", "Verifying Credentials ... ");


         }


	})


		


	


	/*$(".publishshow_play .publishshow").click(function(){


		publish_id = $(this).attr("publish_id");


		publishtable = $(this).attr("publishtable");


		var param = "action=publish_this_id&article_id="+publish_id+"&table="+publishtable;


		alert(param);


		var divname = ".publishshow";


		alert(divname);


		myData = Get_Results_Ajax(param, divname, "Excecute");


		$(this).removeClass("publishshow");


		$(this).addClass("publishhide");


		$(this).parent().removeClass("publishshow_play");


		$(this).parent().addClass("publishhide_play");


		document.getElementById("publishshow").src = "images/tick.png";


	  })*/


	


	








function Get_Results_Ajax(param, divname, parseData, Loader){


		//alert("Doing");
		var attempte = 5;
		if(parseData==""){
			
			$(divname).html(Loader);
		}


		var $ajaxRequest = $.ajax({
		type: "GET",
		url: "../config/functions.php",
		data: param,
		success: function(msg){
		var myData="";
		//alert(msg);
			if(parseData=="parseData"){
				//alert(msg);
				myData = JSON.parse(msg);
				//populateListBox(divname, myData[a].text, myData[a].id);
			}

			if(parseData=="Excecute"){
				//alert(msg);
				//$(divname).html(msg);
			}

			if(parseData==undefined){
				//alert(msg);
				$(divname).html(msg);
			}


		if(parseData=="Validate_Login_ID"){
				if(msg==-1){
					$(divname).html("Msg : Login Successfully.");
					Redirect_SuccessLogin();
				}


				if((msg>=0)&&(msg!=100)){
					$(divname).html((attempte-msg)+" Attempt Remaining");	
				}

				if(msg==100){
					$(divname).html("No. Of Attempts Exceeded. Please try later.");	
				}

			}

		},

		error: function(){
		alert("Unable to Fetch Record");
		}

	});	
	}


function Redirect_SuccessLogin(){

	window.location="dashboard.php";
	}

});