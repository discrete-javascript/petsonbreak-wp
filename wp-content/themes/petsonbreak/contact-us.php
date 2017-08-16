<?php
/**
 Template Name: Contact Us
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *

 */
 get_header();

?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<style>
    
.map_contus{width:100%;overflow:hidden;height:500px;max-width:100%;}
.policy{margin-bottom: 20px;}
.form_title h3 strong {
    background-color:#636 !important;
}

.form_title h3 strong{
   padding:0px !important;
}

.step {
  border-left: 0px solid <?php echo $_SESSION['main_color']; ?> !important;
}
a.btn_1.green, .btn_1.green {
    background: #636 !important;
    padding: 10px 20px;
color: #fff;
}
.box_style_1 h3.inner {background-color: #663366 !important; color: #fff;text-align: center;padding: 12px;margin: 0px;}

.iframe {width:100%;}
.form_title h3 strong { margin: 0px 30px 0px -7px !important;}
.margin_top22 p{margin-top: 12px;}
#policy{margin-top: 13px;margin-left: -4px;}
.form_title h3 {
    height: 40px;
    font-size: 21px !important;
    color: #000;
    font-weight: 300;
}

.form_title h3 strong {
    color: #fff;
    width: 41px;
    padding: 6px 14px;
    border-radius: 50%;
    margin: 0px 0px 0px 22px;
}
#contactFrm{padding: 30px 0px;}
tbody {
    background: #fff;
}

#policy{
	padding: 20px 0 20px 31px;
    margin: 0px 0px 10px 20px !important;
    margin-left:20px !important;
}
</style>




<?php get_header(); ?>


<div class="container-map">


<div class="map_contus" style="">
        <div id="gmap_canvas" style="height:100%; width:100%;max-width:100%;border-bottom: 10px solid <?php// echo $_SESSION['main_color']; ?>;">
         <?php// echo $mk_options['map_pointer'];?>
         
         
         
         
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.3844875208224!2d77.24338331508093!3d28.5582149824471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3b5e5f372e3%3A0x17d317afabe06e81!2sHoliday+Winger+Pvt.Ltd.!5e0!3m2!1sen!2sin!4v1465459154269" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
         
         
         
         
         
         
        </div>
        <a class="google-map-enabler" href="https://www.dog-checks.com/german-shepherd-checks" id="enable-maps-data">german shepherd checks</a><style>#gmap_canvas img{max-width:none!important;background:none!important;}</style>
        </div>

</div>
        
        
        
        
        



<div class="container marging-and-bottom_not_use_border-text-your-d">
  <form name="contactFrm" id="contactFrm">
 
    <div class="row">
        <div class="col-md-8 ">
            <div class="form_title margin_top22">
                <h3>Drop us a Message</h3>
                <!--<p>
                    <?php echo $mk_options['drop_us_message_txt'];?>
                </p>-->
            </div>
            <div class="step">
                <div id="response_msg" style="color:#663366;"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="firstname" id="firstname" class="form-control" type="text" onkeyup="blankField('firstname','')">
							<span class="errSpan" id="err_firstname"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastname" id="lastname" class="form-control" type="text" onkeyup="blankField('lastname','')">
							<span class="errSpan" id="err_lastname"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" id="email" type="email" onkeyup="blankField('email','')">
							<span class="errSpan" id="err_email"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" id="phone" type="text" onkeyup="blankField('phone','')">
							<span class="errSpan" id="err_phone"></span>
                        </div>
                    </div>
                </div> 

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Subject</label>
							<select name="subject" id="subject" class="form-control" onchange="blankField('subject','')">
							<option value="">Select…</option>
							<option value="Travel Relatede">Travel Related</option>
							<option value="Pet related">Pet Related</option>
							<option value="Marketing and business development">Marketing And Business Development</option>
							<option value="Human resorce">Human Resources</option>
							<option value="Jobs and oppertunaty">Jobs and Opportunity</option>
							<option value="general">General</option>
							</select>
							<span class="errSpan" id="err_subject"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Add Country</label>
                            <select name="country" id="country" class="form-control" onchange="blankField('country','')">
							<option value="">Select..</option>
							<option value="India">India</option>
							<option value="Australia">Australia</option>
							</select>
							<span class="errSpan" id="err_country"></span>
                        </div>
                    </div>
                </div>    

				
                <div class="row">
                    <div class="col-lx-12 " style="margin: 0px 12px;">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
            <div id="policy">
            
                <a class="btn_1 green medium" href="javascript:void(0)" onclick="contactUsFun();">Submit Now</a>
            </div>
        </div>
        
        <aside class="col-md-4  ">
                <div class="box_style_1 margin_top22">
            <h3 class="inner">- Reach Us -</h3>
			<div class="reachUs-add">
            <ul class="footer_links indAdd">
			   <h6 style="color:#302a3d">INDIA</h6>
			     
			
				<li><span><i class="fa fa-phone"></i></span><a href="">+91 7566485676 (Pet Related)</a></li>
			                   <li><span><i class="fa fa-envelope"></i></span><a href="">woof[at]petsonbreak[dot]com</a></li>
			   			   <li><span><i class="fa fa-skype"></i></span><a href="">info[at]petsonbreak[dot]com</a></li>
              </ul>
			  <ul class="footer_links ausAd">
			   <h6 style="color:#302a3d">AUSTRALIA</h6>
                
                <li><span><i class="fa fa-home"></i></span><a href="">43 Whites Lane,Glen Waverley 3150,Victoria  Australia</a></li>
                <li><span><i class="fa fa-phone"></i></span><a href="">0421 3766 36 (Travel Related)</a></li>
                <li><span><i class="fa fa-envelope"></i></span><a href="">australiaincoming[at]petsonbreak[dot]com</a></li>
			 
			
              </ul>
			</div>
        </div>
        <div class="box_style_4">
            <i class="icon_set_1_icon-57"></i>
            <h4>Need <span>Help?</span></h4>
            <a class="phone" href="tel://+91-9999854201"><?php echo $mk_options['f_contact_number'];?></a>
            
        </div>
        </aside>
		
    </div>
   </form>  
</div>



<br/>

<?php get_footer(); ?>

<script>
function contactUsFun(){
    var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($('#firstname').val()==''){
		$('#err_firstname').html('Please enter your First Name.');
        $('#firstname').focus();
        return false;
    }
    else if($('#lastname').val()==''){
		$('#err_lastname').html('Please enter the Last Name');
        $('#lastname').focus();
        return false;
    }
    else if($('#email').val()==''){
		$('#err_email').html('Please enter your email.');
        $('#email').focus();
        return false;
    }
    
   else if (!emailfilter.test($('#email').val())) {
	   $('#err_email').html('Please provide a valid email address');
       $('#email').focus();
    return false;
   }

    else if($('#phone').val()==''){
		$('#err_phone').html('Please enter phone number');
        $('#phone').focus();
        return false;
    }
	else if($('#subject').val()==''){
		$('#err_subject').html('Please select your subject');
        $('#subject').focus();
        return false;
    }
    else if($('#country').val()==''){
		$('#err_country').html('Please selct your country');
        $('#country').focus();
        return false;
    }
    else{
		
        var contactFrm =$('#contactFrm').serialize(); 
        $.ajax({
            type: "POST",
            url: '<?php echo get_template_directory_uri(); ?>/custom-ajax.php',
            data: 'action=ContactUs&'+contactFrm,
			
			success: function(Data){
				 if(Data==0){					 
				 $('#response_msg').html('Your request has been submitted');				
				 }
			  },
        })   
    }
};

function blankField(filedID, val){ 
		if($('#'+filedID).val()!=''){
			$('#err_'+filedID).html('');
		}
		
	}
</script>
