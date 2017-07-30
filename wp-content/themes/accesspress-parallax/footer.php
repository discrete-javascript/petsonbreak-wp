<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package accesspress_parallax
 */
?>


<style>

.feed-btn{
    display: inline;
    position: fixed;
    right: 0px;
    top: 50%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
z-index:999;
}

.feed_contact-det{
	padding-bottom:20px;
}

.feedBtn{
    background: #F47555;
    display: block;

}

#feedback-container{
    position: fixed;
    left: 0px;
    right: 0px;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.75);
    z-index: 999;
    display: none;
	overflow:auto;
}
.feedback-div{
    width: 50%;
    position: relative;
    top: 8%;
    margin: 0 auto;
    border-radius: 16px;
}
.feedback-div-container{
	width:100%;
	float:left;
	position:relative;
}

.feed-error{
	position: absolute;
    top: 50%;
    left: 50%;
    width: 60%;
    transform: translate(-50%,-50%);
    background: #f3f3f3;
    border: 1px solid #ccc;
    box-shadow: 0px 0px 2px 1px #000;
    border-radius: 7px;
    padding: 10px 5px;
	display:none;
}


.excl{
	margin-right:10px;
}

.feed-head.panel-heading{
    border: 0px;
    border-radius: 0px;
    background-color: #fff;
    padding-left: 0px;
}
.feedback-div .panel-default{
	padding: 10px;
	width: 100%;
	float: left;
}
.feedback-div .panel-body{
    border-radius: 0px;
 
    padding: 10px!important;
    background: #F8F8F8!important;
}

.feed-stg1 >h3{
	font-size: 17px!important;
    font-weight: bold!important;
    color: #333!important;
    margin-bottom: 6px!important ;
    
}

.feed-stg1 >p{
	color: #302a3d!important;
    margin-bottom: 6px!important;
    line-height: 1.4!important;
    font-size: 13px;

}


	



.feed-scale{
    height: 35px;
    width: 100%;
    float: left;
    border: 1px solid #999;
    margin:5px 0px 10px;
}

.feed-scale span{
	display: inline-block;
    height: 100%;
    width: 9.09%;
    background: #fff;
    float: left;
	border-right: 1px solid #999;
    text-align: center;
    position: relative;
}

.feed-scale span.isActive{
    border: 2px solid #F47555;
    position: relative;
}

.feed-scale span:last-child{
	border-right: 0px;
}

.feed-scale label{
    display: block;
    height: 100%;
    margin-bottom: 0px;
    line-height: 35px;
    color: #F47555;
    cursor: pointer;
}
.feed-scale input{
    opacity: 0;
    position: absolute;
    top: 0;
}

.feed_cmnt_div{
    border: 1px solid #aaa;
    background: #fff;
    width: 100%;
    float: left;
}

.feed_cmnt_type{
	text-align: center;
	width: 25%;
 
    text-align: center;
    border-right: 1px solid #aaa;
    padding: 7px 0px;
    cursor: pointer;
    font-weight: bold;
    color: #F47555;
	display: table-cell;
    vertical-align: middle;
    font-size: 12px;
}

.feed_cmnt_type:last-child{
	border-right: 0px;
}

.feed_cmnt_top{
    border-bottom: 1px solid #AAA;
    width: 100%;
    float: left;
	display:table;
}



.feed_cmnt_bot{
	width: 100%;
	float: left;
	padding: 10px;
}

.feed_cmnt_bot>h4{
	padding: 0px;
    font-size: 16px;
    color: #F47555;
}
.feed_cmnt_bot>p{
	font-size: 12px;
    padding: 5px 0px 10px 0px;
}

.feed_cmnt_bot textarea{
    border: 1px solid #aaa;
    border-radius: 0px;
    height: 100px;
}

.panel-footer.feed-boot{
	width: 100%;
	float: left;
	background: #fff;
}

.snd_feed{
	float: right;
}

.snd_feed span:first-child{
	padding-right: 10px;
}

.snd_feed span:last-child{
	cursor: pointer;
}


.snd_feed_btn{
    padding: 5px 17px;
    background: linear-gradient(#fff,#ccc);
    border: 1px solid#aaa;
    border-radius: 50px;
    color: #333 !important;
    display: inline-block;
}

.feed-stg2 >h3 {
    font-size: 17px!important;
    font-weight: bold!important;
    color: #333!important;
    margin-bottom: 6px!important;
}

.feed-stg2 >p {
    color: #444!important;
    margin-bottom: 6px!important;
    line-height: 1.4!important;
    font-size: 12px;
}

.feed_contact-det label{
    font-weight: normal;
    padding-right: 10px;
    font-size: 14px;
}

.feed_contact-det input{
	width: 60%;
    border: 1px solid #aaa;
    height: 30px;
    padding: 5px;
}

.feed-stg2{
	display: none;
}

.feed_cmnt_type.isActive{
	border: 2px solid #F47555;
    position: relative;
}

.feed_cmnt_type.isActive:before{
	content: '';
	position: absolute;
	border-top:10px solid #F47555;
	border-left:10px solid transparent;
	border-right:10px solid transparent;
    bottom: -10px;
}



.feed-stg3 >h3 {
    font-size: 17px!important;
    font-weight: bold!important;
    color: #333!important;
    margin-bottom: 6px!important;
}

.feed-stg3 >p {
    color: #444!important;
    margin-bottom: 6px!important;
    line-height: 1.4!important;
    font-size: 12px;
}

.closeFeed{
	padding: 5px 17px;
    background: linear-gradient(#fff,#ccc);
    border: 1px solid #aaa;
    border-radius: 50px;
    color: #333 !important;
    display: inline-block;
}


#myModal{
	
 height: 100%;	
}

</style>

<script>
  $('.closeFeed').click(function(){
      $('#feedback-container.thanks_feedback-container').hide();
      $('.feed-stg1').show();
      $('.feed-stg2').hide();
      $('.feed-scale span').removeClass('isActive');
      $('.feed_cmnt_type').removeClass('isActive');

  })
  
/* $('.snd_feed_btn').click(function(){
      $('.feed-stg2').show();
      $('.feed-stg1').hide();

  }) */


  $('.cancel_feed').click(function(){
      $('#feedback-container').hide();
       $('.feed-stg1').show();
      $('.feed-stg2').hide();
	 
	  
     

  })
  



function feed_click()
{
   $('#feedback-container').show();


}

$(document).ready(function(){

  $('.feed_cmnt_type').click(function(){
    $(this).addClass('isActive').siblings().removeClass('isActive');
    var feedType = $(this).html();
    $('.feed_cmnt_bot h4').html(feedType);
	$('#feedtype').val(feedType);
  });


  $('.feed-scale span').click(function(){
	 
    $(this).addClass('isActive').siblings().removeClass('isActive');
  });
  
  
 $('#FeedbackBtn1').click(function(){
		var flag=0;
		
	
	
	var scale_rate = $("input[name='scale_rate']:checked").val();
	
	  if(scale_rate==0) {
		   $(".feed-text").html("Please select a score!");
		  // $(".feed-error").css("display", "block");
		   $('.feed-error').show(1).delay(2000).hide(1);
		   flag = 1;
		   return false;
		   
		}
	
	  if($('#feedtypes').val()==""){
		 $(".feed-text").html("Pleass select a category!");
		  $('.feed-error').show(1).delay(2000).hide(1);
		  flag = 1;
		 return false;    
		}
	
	  if($('#feedback_area').val()==""){
	     $(".feed-text").html("Please enter some feedback text!");
	      $('.feed-error').show(1).delay(2000).hide(1);
	         flag = 1;
		 return false;     
		}
	
	  if(flag==0){
		
	     $('.feed-stg2').show();
             $('.feed-stg1').hide(); 	
	     }
	});	
	
	$('#FeedbackBtn2').click(function(){
        var flag=0;
		var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
		
		var email = $("#email_id").val();
		
		if(email=="")
		{
			
		 $(".feed-text").html("Please enter Your Email!");
	         $('.feed-error').show(1).delay(2000).hide(1);
                 
 		 return false;
 		 
		}

		if(!re.test(email))
		{
			
			$(".feed-text").html("Please enter Valid Email!");
	                $('.feed-error').show(1).delay(2000).hide(1);
		        return false;   
		}
		
	  else{
			var frmdata =$('#feedback_form').serialize();
			$.ajax({
				type: "POST",
				url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
				data: "action=UserFeedback&"+frmdata,
				success: function(Data){
					
					$('#review_item').prepend(Data);
						 $('.feed-stg2').hide();
					 $('.feed-stg3').show();
						 
						 $('#feedback_form')[0].reset();
						
					$('#review_item').show();	
var mySlider = $('.bxslider').bxSlider();
var currentSlide = mySlider.getCurrentSlide();

mySlider.reloadSlider({
    startSlide: currentSlide,
	endSlide:Data
});					
				}
			});
	}
	});	

	
 setTimeout(function() {
    $('.feed-error').fadeOut('fast');
}, 2000);
	
});	
	

</script>



	</div><!-- #content -->
<style>

#footer{width: 100%;float: left;background:#F47555;}
.footer-top{padding: 30px 0px;}
.foot-colHead{font-size: 14px;text-transform: uppercase;margin-top: 0px;    margin-bottom: 17px;}
.footer_links  li{list-style: none;border-bottom: 1px solid rgba(255, 255, 255, 0.1);padding: 5px 0px;}
.footer_links  li:last-child{border-bottom:none;}
.footer_links {}
.footer_links a{text-decoration: none;font-size: 13px;}
.footer_links span{color: #fff;padding-right: 10px;}
.social_links{}
.social_links li{display: inline-block;margin-right: 20px;border-bottom: none;}
.social_links .fa{display: inline-block;height: 30px;line-height: 30px;margin: auto 3px;width: 30px;border-radius: 30px;font-size: 13px;text-align: center;}
.footer_terms ul li{display: inline;padding-right: 45px;font-size: 13px;}
.copyright1{font-size:13px;}
.footer-bottom{padding:4px 0px;}
.footer_terms ul , .footer_terms p{margin-bottom:0px;}
.footer-logo{margin-bottom:15px;}

.ausAd,.indAdd{width:100%;float:left;}

.ausAd>h6{color: #FFF;font-size: 14px;padding: 9px 0px;}
.ausAd li {width:100%;float:left;}
.ausAd li span{width: 7%;float: left;}
.ausAd li  a{display: inline-block;width:90%;float: left;word-wrap:break-word;}
	
.indAdd>h5{color: #FFF;font-size: 14px;padding: 9px 0px;}
	
.indAdd>h6{color: #FFF;font-size: 14px;padding: 9px 0px;}
.indAdd li {width:100%;float:left;}
.indAdd li span{width: 7%;float: left;}
.indAdd li  a{display: inline-block;width:90%;float: left;word-wrap:break-word;}
	
.main-overlay{z-index: 20;position: fixed;top: 0px;bottom: 0px;left: 0;right: 0;background: rgba(0, 0, 0, 0.8);display:none;
}
.footer_colm_logo{margin-bottom: -10px;}
.visa-sign-cards{padding-top: -5px;}
.veri img{width:150px;}
.visa-sign-cards ul li{float: left;padding-right: 8px;}


.reachUs-add{width: 100%;float: left;background: #fff;padding:15px;}
.reachUs-add .footer_links a {
    color: #302a3d;
}
.reachUs-add .footer_links span {
    color: #302a3d;
}

.reachUs-add .footer_links  li{
	border-bottom:1px solid #ddd;
}

.reachUs-add .footer_links  li:last-child{
	border-bottom:0px;
}

.box_style_1{
	margin-bottom:15px;
		width:100%;
	float:left;
}

.box_style_4{
	width:100%;
	float:left;
}

.box_style_4 .phone{
	color:#636;
}

.box_style_4 .phone:hover{
	color:#636;
}

#footer li a{
	text-decoration:none;
	color:white;
	font-size:16px;
}


</style>


<div class="main-overlay"></div>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-4">
			<div class="footer_colm">
              <h1 class="foot-colHead" style="color:white;font-size:22px;">POPULAR SERVICES</h1>
	
			    <?php 
			   $fdefaults = array(
						'theme_location'  => 'services_offered',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul class="footer_links" id="prime-navnp">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);
				 wp_nav_menu($fdefaults);
			 ?>
			  
	  
			  
            </div>	
          </div>

          <div class="col-md-4">
            <div class="footer_colm">
              <h1 class="foot-colHead" style="color:white;font-size:22px;">Petsonbreak Details</h1>
			  
			    <?php 
			   $fdefaults = array(
						'theme_location'  => 'petsonbreak_details',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul class="footer_links" id="prime-navnp">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);
				 wp_nav_menu($fdefaults);
			 ?>

            </div>
          </div>
		  
		  
			
		  
		  
          <div class="col-md-4">
		    <div class="footer_colm footer_colm_logo"> <a href="#"><img src="http://petsonbreak.com/wp-content/uploads/2017/06/cropped-POB-logo-June-2017.png" alt="logo" class="footer-logo" style="height:44px;width:350px;"></a> </div>
		  
            <div class="footer_colm" style="margin-top:10px;">
			   
              <h1 class="foot-colHead" style="color:white;text-transform:uppercase;font-size:22px;">Stay Connected</h1>
              <ul class="footer_links social_links">
			 
                <li><a href="https://www.facebook.com/petsonbreak/" target="_blank"><i class="fa fa-facebook" style="background:white;border-radius:30px;width:30px;height:30px;color:black;"></i> </a></li>
			
                <li><a href="https://www.google.com/adivaha" target="_blank"><i class="fa fa fa-google-plus" style="background:white;border-radius:30px;width:30px;height:30px;color:black;"></i> </a></li>
			 
                <li><a href="http://www.linkedin.com/adivaha" target="_blank"><i class="fa fa fa-linkedin" style="background:white;border-radius:30px;width:30px;height:30px;color:black;"> </i> </a></li>
		
                <li><a href="http://www.twitter.com/adivaha" target="_blank"><i class="fa fa fa-twitter" style="background:white;border-radius:30px;width:30px;height:30px;color:black;"></i> </a></li>
			
              </ul>
            </div>
			
			<div class="visa-sign-cards">
				<p class="veri"><img src="<?php echo get_template_directory_uri();?>/images/veri-sign.png"/></p>
				<ul>
				  <li><img src="<?php echo get_template_directory_uri();?>/images/visaCard.png"/></li>
				  <li><img src="<?php echo get_template_directory_uri();?>/images/masterCard.png"/></li>
				  <li><img src="<?php echo get_template_directory_uri();?>/images/americanEx.png"/></li>
				  <li><img src="<?php echo get_template_directory_uri();?>/images/discover.png"/></li>
				</ul>
				
			</div>
			
          </div>
        </div>
      </div>
	  

	  
	 
	  
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer_terms">
            <p class="copyright1">Copyright All Rights Reserved © <?php echo date("Y");?></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer_terms">
           	    <?php 
			   $fdefaults = array(
						'theme_location'  => 'footer_bottom',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul>%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);
				 wp_nav_menu($fdefaults);
			 ?>
			  
          </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->

<div id="go-top"><a href="#page"><i class="fa fa-angle-up"></i></a></div>


<div class="feed-btn" style="display:block;">
<span  class="feedBtn"><img id="feedBtn" style="cursor:pointer;" data-toggle="modal" data-target="#myModal" class="feedBtn" src="<?php echo get_template_directory_uri();?>/images/feedBtn.png"></span >



</div>



<?php wp_footer(); ?>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   
     

        <form method="post" name="feedback_form" id="feedback_form">

      <div class="modal-content">
          <div class="modal-header"><img style="padding:8px;" src="<?php echo get_template_directory_uri();?>/images/cropped-logo_pet-1.png"></div>
         <div class="modal-body">
            
              <div class="feed-stg1" style="margin-top:-5px !important;">
                 <h3>Hello, we would love to hear your feedback...</h3>
                 <p>At PetsonBreak, we would love to get your thoughts on what works well, and what you   think we can improve on. All feedback is much appreciated!</p>
                 <div class="scale_rating">
                   <p>Firstly, how likely would you be to recommend our new website on a scale of 0 - 10?</p>
                   <div class="feed-scale">
                      <span><label for="scale0">0</label><input type="radio" name="scale_rate" id="scale0" value="0"/></span>

                      <span><label for="scale1">1</label><input type="radio" name="scale_rate" id="scale1" value="1"/></span>

                      <span><label for="scale2">2</label><input type="radio" name="scale_rate" id="scale2" value="2"/></span>

                      <span><label for="scale3">3</label><input type="radio" name="scale_rate" id="scale3" value="3"/></span>
                      <span><label for="scale4">4</label><input type="radio" name="scale_rate" id="scale4" value="4"/></span>
                      <span><label for="scale5">5</label><input type="radio" name="scale_rate" id="scale5" value="5"/></span>
                      <span><label for="scale6">6</label><input type="radio" name="scale_rate" id="scale6" value="6"/></span>
                      <span><label for="scale7">7</label><input type="radio" name="scale_rate" id="scale7" value="7"/></span>
                      <span><label for="scale8">8</label><input type="radio" name="scale_rate" id="scale8" value="8"/></span>
                      <span><label for="scale9">9</label><input type="radio" name="scale_rate" id="scale9" value="9"/></span>
                      <span ><label for="scale10">10</label><input type="radio" name="scale_rate" id="scale10" value="10"/></span>
					 

                   </div>
                 </div>

                  <div class="feed_comment">
                    <p>Now, please select a category below for your specific feedback...</p>

                   <div class="feed_cmnt_div">
                     <div class="feed_cmnt_top">
                        <div class="feed_cmnt_type">Reviews</div>
                         <div class="feed_cmnt_type">Suggestions</div>
                         <div class="feed_cmnt_type">Technical errors/Missing Links</div>
                         <div class="feed_cmnt_type">Other...</div>
                    </div>
					
					<input type="hidden" id="feedtypes" name="feedtypes" value="Reviews">
                     <div class="feed_cmnt_bot">
                         <h4>Reviews</h4>
                          <p>Please enter your feedback in the box below and then press 'Send Feedback'.</p>
                        <textarea id="feedback_area" name="feedback_area" ></textarea>
                    </div>
                   </div>

                  </div>

				  
				    <div class="modal-footer feed-boot">
            <div class="snd_feed" style="margin-top:15px;">
              <!--  <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>-->
				
				
				<span><input type="button" id="FeedbackBtn1" value="Send Feedback" class="snd_feed_btn"></span>
                <span class="cancel_feed" data-dismiss="modal">or cancel</span>
            </div>

          </div>
              </div>

              <div class="feed-stg2">
                  <h3>Many thanks, your feedback has been submitted.</h3>
                 <p>If you'd like us to follow up on your feedback, please enter your email address below. We will never use your email address for any other purpose.</p>
                 <div class="feed_contact-det">
                   <label>Email: </label>
				   <input type="email" value="" id="email_id" name="email_id" placeholder="Email">
				   <span id="err_email_id"></span>
                 </div>
				 
				 <div class="model-footer feed-boot" style="padding-bottom:60px;">
            <div class="snd_feed">
              <!--  <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>-->
				
				
				<span><input type="button" id="FeedbackBtn2" value="Send Feedback" class="snd_feed_btn"></span>
                <span class="cancel_feed" data-dismiss="modal">or cancel</span>
		
            </div>

          </div>
              </div>
				


          </div>
		   <div class="feed-stg3" style="display:none;">
                  <h3>Thanks again,</h3>
                 <p>Your feedback is very important to us, so we appreciate you giving us your time.</p>

<span class="cancel_feed" data-dismiss="modal">or cancel</span>
              </div>
         <!-- <div class="panel-footer feed-boot">
            <div class="snd_feed">
           <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>
				
				
				<span><input type="submit" id="FeedbackBtn" value="Send Feedback" class="snd_feed_btn"></span>
                <span class="cancel_feed">or cancel</span>
            </div>

          </div>-->
        </div>
   <div class="feed-error">
	  <span class="excl"><img src="<?php echo get_template_directory_uri();?>/images/exclamation.png"/></span><span class="feed-text">Please select a score!</span>
	
     </div>
	


  

    


      </div>
     
  </div>

</form>




 





</body>
</html>