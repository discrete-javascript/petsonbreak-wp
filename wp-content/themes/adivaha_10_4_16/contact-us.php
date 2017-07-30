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
    background-color: <?php echo $_SESSION['main_color']; ?> !important;
}
.step {
  border-left: 0px solid <?php echo $_SESSION['main_color']; ?> !important;
}
a.btn_1.green, .btn_1.green {
    background: <?php echo $_SESSION['main_color']; ?> !important;
    padding: 10px 20px;
color: #fff;
}
.box_style_1 h3.inner {background-color:  <?php echo $_SESSION['main_color']; ?> !important; color: #fff;text-align: center;padding: 12px;margin: 0px;}

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
</style>







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
                <h3><strong>1</strong>Drop us a Message</h3>
                <!--<p>
                    <?php echo $mk_options['drop_us_message_txt'];?>
                </p>-->
            </div>
            <div class="step">
                <div id="response_msg"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="firstname" id="firstname" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastname" id="lastname" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" id="email" type="email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" id="phone" type="text">
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
            <table class="table table_summary">
            <tbody>
            <tr>
                <td style="width:5px;"><i class="fa fa-map-marker fa-fw"></i> </td>
                <td>262, Groundfloor, Lane No-4</td>
            </tr>
            
            <tr>
                <td><i class="fa fa-phone fa-fw"></i></td>
                <td></td>
            </tr>
            <tr>
                <td><i class="fa fa-envelope fa-fw"></i></td>
                <td>support@thewebconz.com</td>
            </tr>
            <tr>
                <td><i class="fa fa-clock-o fa-fw"></i> </td>
                <td>Monday - Friday 10:30 AM - 6:00 PM (IST)</td>
            </tr>
            
            </tbody>
            </table>

        </div>
        <div class="box_style_4">
            <i class="icon_set_1_icon-57"></i>
            <h4>Need <span>Help?</span></h4>
            <a class="phone" href="tel://+91-9999854201"><?php echo $mk_options['site_Contact_Number'];?></a>
            <small>Monday - Friday 10:30 AM - 6:00 PM (IST)</small>
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
        alert('Please enter the First Name ');
        $('#firstname').focus();
        return false;
    }
    else if($('#lastname').val()==''){
        alert('Please enter the Last Name ');
        $('#lastname').focus();
        return false;
    }
    else if($('#email').val()==''){
        alert('Please enter  email ');
        $('#email').focus();
        return false;
    }
    
   else if (!emailfilter.test($('#email').val())) {
    alert('Please provide a valid email address');
    $('#email').focus();
    return false;
   }

    else if($('#phone').val()==''){
        alert('Please enter phone number ');
        $('#phone').focus();
        return false;
    }
    else if($('#comment').val()==''){
        alert('Please enter your message ');
        $('#comment').focus();
        return false;
    }
    else{
        var contactFrm =$('#contactFrm').serialize();
        $.ajax({
            type: "GET",
            url: '<?php echo get_template_directory_uri(); ?>/custom-ajax.php',
            data: 'action=ContactUs&'+contactFrm,
            success: function(Data){
                 if(Data==1){
                     $('#response_msg').html('Your request has been submitted');
                 }
              }
        });    
    }
}
</script>
