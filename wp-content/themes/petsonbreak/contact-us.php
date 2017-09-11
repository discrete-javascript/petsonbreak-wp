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
.errSpan {
    color: red;
}
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
   
    padding: 10px 20px;
color: #fff;

}
.box_style_1 h3.inner.reach-us-contact, #contactFrm #policy > a {border-radius: 4px;}
.box_style_1 h3.inner {color: #fff;text-align: center;padding: 12px;margin: 0px;}

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


        
        
        
        

<div class="container-fluid parallax-contact-us">
    <p>CONTACT US</p>
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
                            <label>First Name<span style="color: red;">*</span></label>
                            <input name="firstname" id="firstname" class="form-control" type="text" onkeyup="blankField('firstname','')">
							<span class="errSpan" id="err_firstname"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Last Name<span style="color: red;">*</span></label>
                            <input name="lastname" id="lastname" class="form-control" type="text" onkeyup="blankField('lastname','')">
							<span class="errSpan" id="err_lastname"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Email<span style="color: red;">*</span></label>
                            <input class="form-control" name="email" id="email" type="email" onkeyup="blankField('email','')">
							<span class="errSpan" id="err_email"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Phone<span style="color: red;">*</span></label>
                            <input class="form-control" name="phone" id="phone" type="text" onkeyup="blankField('phone','')">
							<span class="errSpan" id="err_phone"></span>
                        </div>
                    </div>
                </div> 

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Subject<span style="color: red;">*</span></label>
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
                            <label>Add Country<span style="color: red;">*</span></label>
                            <?php 
				$sresults =$wpdb->get_Results("select * from twc_country");
                            ?>
                            <select name="country" id="country" class="form-control" onchange="blankField('country','')">
                                <option value="">Select..</option>
                                <?php foreach($sresults as $sresult){ ?>
                                    <option value="<?php echo $sresult->title; ?>"><?php echo $sresult->title; ?></option>
                                <?php } ?>
                                </select>
                            <span class="errSpan" id="err_country"></span>
                        </div>
                    </div>
                </div>    

				
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="comment">Comment<span style="color: red;">*</span></label>
                            <textarea class="form-control" rows="5" name="comment" id="comment" style="resize: vertical;"></textarea>
                        </div>
                        <span class="errSpan" id="err_comment"></span>
                    </div>
                </div>
                
                
            </div>
            
            <div id="policy">
            
                <a class="btn_1 green medium" href="javascript:void(0)" onclick="contactUsFun();">Submit Now</a>
            </div>
        </div>
        
        <aside class="col-md-4  ">
                <div class="box_style_1 margin_top22">
            <h3 class="inner reach-us-contact">- Reach Us -</h3>
			<div class="reachUs-add">
            <ul class="footer_links indAdd">
			   <h6 style="color:#302a3d">INDIA</h6>
			     
                                <li><span><i class="fa fa-home"></i></span><a href="">PetsonBreak Travel Advisors LLP, Vidhya Nagar, Dhanori, Pune 411 015 India</a></li>
				<li><span><i class="fa fa-phone"></i></span><a href="">+91 8999 306 724 (Travel Related)</a></li>
                <li><span><i class="fa fa-phone"></i></span><a href="">+91 7566 485 676 (Pet Related)</a></li>
			                   <li><span><i class="fa fa-envelope"></i></span><a href="mailto:info@petsonbreak.com">info[at]petsonbreak[dot]com</a></li>
			   			   <li><span><i class="fa fa-skype"></i></span><a href="">info[at]petsonbreak[dot]com</a></li>
              </ul>
<!--			  <ul class="footer_links ausAd">
			   <h6 style="color:#302a3d">AUSTRALIA</h6>
                
                <li><span><i class="fa fa-home"></i></span><a href="">43 Whites Lane,Glen Waverley 3150,Victoria  Australia</a></li>
                <li><span><i class="fa fa-phone"></i></span><a href="">0421 3766 36 (Travel Related)</a></li>
                <li><span><i class="fa fa-envelope"></i></span><a href="">australiaincoming[at]petsonbreak[dot]com</a></li>
			 
			
              </ul>-->
			</div>
        </div>
        <div class="box_style_4">
            <i class="icon_set_1_icon-57"></i>
            <h4>Need <span>Help?</span></h4>
            <a class="phone" href="tel://+91-8999306724"><?php echo $mk_options['f_contact_number'];?></a>
            
        </div>
        </aside>
		
    </div>
   </form>  
</div>



<br/>

<?php get_footer(); ?>

<script>
(function selectIndia() {
  document.querySelector('#country option[value="India"]').selected = true;
})()



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
     else if($('#comment').val()==''){
		$('#err_comment').html('Please comment');
        $('#comment').focus();
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
