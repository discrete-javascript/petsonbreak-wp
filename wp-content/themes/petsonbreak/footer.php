<?php
global $mk_options;
global $current_user;
global $site_language;
global $product_id;

$results =$wpdb->get_results("select vendor_id from twc_vendor_services where id='".$product_id."'");
$result =$results[0];
$vendor_id =$result->vendor_id;
?>

<div class="main-overlay"></div>


<footer id="footer">
    <?php if(!is_front_page()): ?>
    <?php 
            $random =$wpdb->get_results("select id, title from twc_service_category where published='Yes' and status_deleted=0 and not id ='".$_REQUEST['sid']."' ORDER BY RAND() LIMIT 2");
    ?>
    <div class="container-fluid">
         <div class="explore-more-container">
            <div class="newly-opened-restaurants">
                <span><?php echo $random[0]->title ?></span>
                <!-- <div>RESTAURANTS</div> -->
                <a href="<?php echo site_url();?>/search-vendor/?sid=<?php echo $random[0]->id ?>" class="yellow">EXPLORE</a>
            </div>
            <div class="top-trending-restaurants">
                <span><?php echo $random[1]->title ?></span>
                <!-- <div>DESTINATIONS</div> -->
                <a href="<?php echo site_url();?>/search-vendor/?sid=<?php echo $random[0]->id ?>" class="yellow">EXPLORE</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container events-news-container" ng-hide="('search' | isState) || ('hotel-information' | isState) || ('online-booking' | isState) || ('confirmation' | isState) || ('flight_search' | isState)">
    <div class="row">
        <!-- <div class="event-column col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="events-container">
                <p class="events-section-heading">Events</p>
            </div>
            <div style="display: flex;justify-content: center;align-items: center;margin-top: 2rem;">
                <h4>No Events</h4>
            </div>
        </div> -->
        <div class="news-column col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2">
            <div class="news-container">
                <p class="news-section-heading">News & Updates</p>
                <div id="whole-news" class="whole-news"><ul>
                    <?php $newsResults =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
                    foreach($newsResults as $obj){?>
                    <li><div class="each-news" id="hash_<?php echo $obj->id;?>">
                        <span class="glyphicon glyphicon-play"></span>
                        <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><span><i><?php echo stripcslashes($obj->title);?></i></span></a>
                    </div></li>
                    <?php } ?>
                </ul></div>
            </div>
        </div>
    </div>
</div>
  <div class="offers-section" ng-hide="('search' | isState) || ('hotel-information' | isState) || ('online-booking' | isState) || ('confirmation' | isState) || ('flight_search' | isState)">
    <div class="item container-fluid offers-footer-container" style="background-image: url(http://dev.petsonbreak.com/wp-content/uploads/2017/08/restaurant-offer-bg-blu.png);" >
        <div class="offers-footer-heading">
            <span>SPECIAL OFFERS</span>
        </div>
        <div class="offers-footer-details">
            <span style="font-size: 16px;">ON PETS CLINIC <span style="color: yellow;">15TH SEPTEMBER 17 </span>USE CODE <span style="color: red; font-style: italic;">"INDIA" </span>WHILE BOOKING </span>
        </div>
        <div class="offers-footer-button">
            <button>SEE DETAILS</button>
        </div>
    </div>

    <div class="item container-fluid offers-footer-container" style="background-image: url(http://dev.petsonbreak.com/wp-content/uploads/2017/08/restaurant-offer-bg-blu.png);" >
        <div class="offers-footer-heading">
            <span>SPECIAL OFFERS</span>
        </div>
        <div class="offers-footer-details">
            <span style="font-size: 16px;">ON PETS CLINIC <span style="color: yellow;">15TH SEPTEMBER 17 </span>USE CODE <span style="color: red; font-style: italic;">"INDIA" </span>WHILE BOOKING </span>
        </div>
        <div class="offers-footer-button">
            <button>SEE DETAILS</button>
        </div>
    </div>

    <div class="item container-fluid offers-footer-container" style="background-image: url(http://dev.petsonbreak.com/wp-content/uploads/2017/08/restaurant-offer-bg-blu.png);" >
        <div class="offers-footer-heading">
            <span>SPECIAL OFFERS</span>
        </div>
        <div class="offers-footer-details">
            <span style="font-size: 16px;">ON PETS CLINIC <span style="color: yellow;">15TH SEPTEMBER 17 </span>USE CODE <span style="color: red; font-style: italic;">"INDIA" </span>WHILE BOOKING </span>
        </div>
        <div class="offers-footer-button">
            <button>SEE DETAILS</button>
        </div>
    </div>
  </div>
  <div class="footer-top">
      <div class="container">
          <div class="row subscription-container">
            <?php echo do_shortcode('[newsletter_form type="minimal"]'); ?>
              <!-- <input type="text" name="subscribe-now" class="subscribe-now-textbox"/>
              <button class="subscribe-now-button">SUBSCRIBE NOW</button> -->
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <p class="footer-quick-links">QUICK LINKS</p>
		<?php $fdefaults = array(
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
                                        'items_wrap'      => '<ul class="quick-links-list">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
					);
				wp_nav_menu($fdefaults);
			 ?>
                <hr/>
                <?php $fdefaults = array(
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
                                        'items_wrap'      => '<ul class="quick-links-list">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => ''
					);
				wp_nav_menu($fdefaults);
			?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <p class="footer-locations">LOCATION </p>
                <p class="footer-india-office">INDIA OFFICE</p>
                <ul>
                    <li><?php echo $mk_options['f_company_name'];?></li>
                    <li>Vidhya Nagar,</li>
                    <li>Dhanori,</li>
                    <li>Pune 411 015 </li>
                    <li>India</li>
                </ul>
                
            </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 2em;">
                <p class="footer-india-phone">PHONE</p>
                <ul>
                    <li>+91 8999 306 724 (Travel Related)</li>
                    <?php  if($mk_options['f_contact_number']!=''){ ?>
                    <li>+91 7566 485 676 (Pet Related)</li>
                    <?php } ?>
                </ul>
                <p class="footer-india-email">EMAIL</p>
                <ul>
                    <li>
                      <a href="mailto:info@petsonbreak.com">info@petsonbreak.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- <div class="visa-sign-cards">
                        <p class="veri"><img src="<?php echo get_template_directory_uri();?>/images/veri-sign.png"/></p>
                        <ul>
                          <li><img src="<?php echo get_template_directory_uri();?>/images/visaCard.png"/></li>
                          <li><img src="<?php echo get_template_directory_uri();?>/images/masterCard.png"/></li>
                          <li><img src="<?php echo get_template_directory_uri();?>/images/americanEx.png"/></li>
                          <li><img src="<?php echo get_template_directory_uri();?>/images/discover.png"/></li>
                        </ul>
                </div> -->
                <div class="social-links-container">
                    <p>FOLLOW US ON</p>
                    <ul class="footer_links social_links">
                                 <?php if($mk_options['f_facebook']!=''){?>
                        <li><a href="<?php echo $mk_options['f_facebook'];?>" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                   <?php } if($mk_options['f_google']!=''){?>
                        <li><a href="<?php echo $mk_options['f_google'];?>" target="_blank"><i class="fa fa fa-google-plus"></i> </a></li>
                                   <?php } if($mk_options['f_linkedin']!=''){?>
                        <li><a href="<?php echo $mk_options['f_linkedin'];?>" target="_blank"><i class="fa fa fa-linkedin"></i> </a></li>
                                        <?php } if($mk_options['f_twitter']!=''){?>
                        <li><a href="<?php echo $mk_options['f_twitter'];?>" target="_blank"><i class="fa fa fa-twitter"></i> </a></li>
                                      <?php }?>
                    </ul>
                </div>
            </div>
          </div>
      </div>

  </div>
    <style>
        #menu-item-135 > a {
            text-transform: uppercase;
        }
    </style>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer_terms">
            <p class="copyright1">Copyright All Rights Reserved © 2017</p>
          </div>
        </div>
        <div class="col-md-6 text-right">
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

<div class="city_pop_overlay">
  <div class="city_pop_box">
      <p style="
    position: absolute;
    margin-left: 10px;
    color: white;
    font-size: 16px;
    margin-top: 8px;
    text-align: center;
    width: 100%;
">Enter your city name</p>
      <img src="http://dev.petsonbreak.com/wp-content/uploads/2017/08/location-popup.png" style="
    width: 100%;
">
  <span class="city_pop_close">x</span>
  <input type="hidden" name="hiddenSID" id="hiddenSID" value=""/>
<div class="city_pop_top">
    <div class="city_pop">
	<span id="err_destName"></span>
          <input type="text" name="destName" id="destName" placeholder="ENTER YOUR CITY" class="form-control">
      </div>
</div>
<div class="city_pop_bot">
    <a href="javascript:void();" class="city_pop_search" style="
    background: red;
    border: none;" >Search</a>
</div>
</div>
</div>
<!-- <div class="social-links-container-overlay">

                    <ul>
                                  <?php if($mk_options['f_facebook']!=''){?>
                         <li><a href="<?php echo $mk_options['f_facebook'];?>" target="_blank"><i class="side-social-links fa fa-facebook"></i> </a></li>
                                    <?php } if($mk_options['f_google']!=''){?>
                         <li><a href="<?php echo $mk_options['f_google'];?>" target="_blank"><i class="side-social-links fa fa-google-plus"></i> </a></li>
                                    <?php } if($mk_options['f_linkedin']!=''){?>
                         <li><a href="<?php echo $mk_options['f_linkedin'];?>" target="_blank"><i class="side-social-links fa fa fa-linkedin"></i> </a></li>
                                         <?php } if($mk_options['f_twitter']!=''){?>
                         <li><a href="<?php echo $mk_options['f_twitter'];?>" target="_blank"><i class="side-social-links fa fa fa-twitter"></i> </a></li>
                                      <?php }?>
                     </ul>
                 </div> -->

<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>


<script src="<?php echo get_template_directory_uri(); ?>/js/rzslider.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBwzkKvM75QzamE7BzVZTfEBwRO6FHEz4U"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/angular-ui-router.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/autocomplete.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/checklist-model.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/ng-map.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/jquery.bxslider.js"></script>



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ui-bootstrap-tpls-2.2.0.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-aria.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/loading-bar.js?var=<?php echo uniqid(); ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/elif.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/dirPagination.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ng-map.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/core.js?var=<?php echo rand();?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollbox.js"></script>

<?php if($site_language=='ar'){?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style-rtl.css?var=<?php echo date('His');?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-rtl.css?var=<?php echo date('His');?>">
<?php } /*  else{?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css?var=<?php echo date('His');?>">
<?php } */ ?>


<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/search-results-responsive.css?var=<?php echo date('His');?>"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?var=<?php echo date('His');?>"> -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/application-ltr.css?var=<?php echo date('His');?>">


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


</script>


<script type="text/javascript">

  $('.searchbox ul li input').click(function(){
	$('.search_Form').css('z-index','21');
    $('.main-overlay').fadeIn();
  })

   $('.main-overlay').click(function(){
    $(this).fadeOut();
	$('.search_Form').css('z-index','2');
  })

    $('#findbestrate').click(function(){
    $('.main-overlay').fadeOut();
	$('.search_Form').css('z-index','2');
  })

   $('.btn-hack').click(function(){
    $('.main-overlay').fadeOut();
	$('.search_Form').css('z-index','2');
  })


  $(window).scroll(function() {
    if ($(this).scrollTop() > 1) { // this refers to window
       $('#sthoverbuttons').addClass('show-sthoverbuttons');
    }
    else{
       $('#sthoverbuttons').removeClass('show-sthoverbuttons');
    }
  });

</script>






<?php include 'includes/colors.php';?>
<?php //echo do_shortcode("[color_picker_adivaha]"); ?>

<div class="overlay-div">

</div>

<div class="popupbox-container">
  <div class="container_width">
    <div class="close-popupbox"><i class="fa fa-times" aria-hidden="true"></i></div>
    <?php
	// check if the user already login
	if( is_user_logged_in() ) { ?>
    <p>It seems that you're already loggedin, <a href="<?php echo wp_logout_url( get_permalink() ); ?>">logout</a> to login with different account or register new account</p>
    <?php } else { ?>
    <div class="facebookBack"> <a href="javascript:void(0);" alt="fblogin" class="fblogin"> <i class="fa fa-facebook"></i> &nbsp;&nbsp;Log in With Facebook</a> </div>
    <div class="New_contactFrom">
      <p class="logWith">Log In</p>
      <p class="CeratOr"> <small>Or</small> <a href="http://krishna-PC/WP/register/">Create an Account</a></p>
      <p class="txt-o"></p>
      <p id="boxMessage"></p>
      <!-- Login Form -->
      <div class="tml tml-login commonformBox" id="loginFrmBox">
        <form name="login" id="UserLoginFrm">
          <p class="tml-user-login-wrap">
            <label for="user_login">Username or E-mail</label>
            <input type="text" name="log" id="user_login" class="input" value="" size="20">
          </p>
          <p class="tml-user-pass-wrap">
            <label for="user_pass">Password</label>
            <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" autocomplete="off">
          </p>
          <div class="tml-rememberme-submit-wrap">
            <p class="tml-rememberme-wrap">
              <input name="rememberme" type="checkbox" id="rememberme" value="forever">
              <label for="rememberme">Remember Me</label>
            </p>
            <p class="tml-submit-wrap">
              <input type="button" name="wp-submit" id="userLogin" value="Log In">
              <input type="hidden" name="redirect_to" id="redirect_to" value="">
              <input type="hidden" name="fav_hotel_id" id="fav_hotel_id" value="">
              <input type="hidden" name="instance" value="">
              <input type="hidden" name="action" value="login">
            </p>
          </div>
          <ul class="tml-action-links">
            <li><a href="<?php echo site_url();?>/register/" rel="nofollow" target="_blank">Register</a></li>
            <li><a href="<?php echo site_url();?>/lostpassword/" rel="nofollow" target="_blank">Lost Password</a></li>
          </ul>
        </form>
      </div>

    </div>
    <?php } ?>
  </div>
</div>

<form method="post" name="feedback_form" id="feedback_form">
<div id="feedback-container">
   <div class="feedback-div">
   <div class="feedback-div-container">
        <div class="panel panel-default">
            <div class="panel-heading feed-head"><img style="width :10em" src="<?php echo $mk_options['header_logo'];?>"></div>
          <div class="panel-body">

              <div class="feed-stg1">
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
                      <span><label for="scale10">10</label><input type="radio" name="scale_rate" id="scale10" value="10"/></span>


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


				    <div class="panel-footer feed-boot">
            <div class="snd_feed">
              <!--  <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>-->


				<span><input type="submit" id="FeedbackBtn1" value="Send Feedback" class="snd_feed_btn"></span>
                <span class="cancel_feed">or cancel</span>
            </div>

          </div>
              </div>

              <div class="feed-stg2">
                  <h3>Many thanks, your feedback has been submitted.</h3>
                 <p>If you'd like us to follow up on your feedback, please enter your email address below. We will never use your email address for any other purpose.</p>
                 <div class="feed_contact-det">
                   <label>Email: </label>
				   <input type="email" value="" id="email_id" name="email_id" placeholder="Email" onkeyup="blankField('email_id','Email')">
				   <span id="err_email_id"></span>
                 </div>

				 <div class="panel-footer feed-boot">
            <div class="snd_feed">
              <!--  <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>-->


				<span><input type="submit" id="FeedbackBtn2" value="Send Feedback" class="snd_feed_btn"></span>
                <span class="cancel_feed">or cancel</span>
            </div>

          </div>
              </div>



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

</div>




<div id="feedback-container" class="thanks_feedback-container">
   <div class="feedback-div">
    <div class="feedback-div-container">
        <div class="panel panel-default">
          <div class="panel-heading feed-head"><img src="<?php echo get_template_directory_uri();?>/images/logo_pet.png"></div>
          <div class="panel-body">


			  <div class="feed-stg3">
                  <h3>Thanks again,</h3>
                 <p>Your feedback is very important to us, so we appreciate you giving us your time.</p>
              </div>

          </div>
          <div class="panel-footer feed-boot">
            <div class="snd_feed">
                <span><a href="#" id="FeedbackBtn3" class="closeFeed">Close</a></span>

            </div>

          </div>
        </div>
		</div>
   </div>

</div>




</form>




<div id="query-container">
   <div class="query-div">
	<div class="feedback-div-container">
        <div class="panel panel-default">
          <div class="panel-heading feed-head"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_pet.png"></div>
          <div class="panel-body">
            <form name="sendqueryFrm" id="sendqueryFrm">
			   <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
			   <input type="hidden" name="member_id" value="<?php echo $_SESSION['userID'];?>">
			   <input type="hidden" name="vendor_id" value="<?php echo $vendor_id;?>">
              <div class="feed-stg1">
                 <h3>Hello, we would love to have your queries...</h3>
                 <p>At PetsonBreak, we would love to get your thoughts on what works well, and what you   think we can improve on. All feedback is much appreciated!</p>

                  <div class="feed_comment">
					<div class="feed_cmnt_div">

					<input type="hidden" id="feedtype" name="feedtype" value="Reviews">
                     <div class="feed_cmnt_bot">

					    <div class="quer_fName">
						  <h4>First Name</h4>
						  <input type="text" name="first_name" id="first_name" placeholder="First Name">
						</div>

					    <div class="quer_fLast">
						  <h4>Last Name</h4>
						  <input type="text" name="last_name" id="last_name" placeholder="Last Name">
						</div>

						<div class="quer_Email">
						  <h4>Email</h4>
						  <input type="text" name="email"  placeholder="Email">
						</div>

						<div class="quer_Contact">
						  <h4>Contact Number</h4>
						  <input type="text" name="contact_number" placeholder="Contact Number">
						</div>

					     <div class="quer_Message">
                         <h4>Message</h4>
                         <textarea  name="message"></textarea>
						</div>
                    </div>
                   </div>

                  </div>


				    <div class="panel-footer feed-boot">
            <div class="snd_feed">
              <!--  <span><a href="#" id="FeedbackBtn" class="snd_feed_btn">Send Feedback</a></span>-->


				<span><input type="submit" id="queryBtn1" value="Send Query" class="queryBtns"></span>
                <span class="cancel_query">or cancel</span>
            </div>

          </div>
         </div>
        </form>
              <div class="feed-stg2">
                <h3>Thanks</h3>
                 <p>Your feedback is very important to us, so we appreciate you giving us your time.</p>

		         <div class="panel-footer feed-boot">
            <div class="snd_feed">
                <span><a href="#" id="queryBtn2" class="query_close queryBtns">Close</a></span>

            </div>

          </div>


              </div>



          </div>

        </div>
   <div class="feed-error">
	  <span class="excl"><img src="<?php echo get_template_directory_uri();?>/images/exclamation.png"></span><span class="feed-text">Please select a score!</span>

     </div>


</div>
   </div>

</div>



<div class="feed-btn">
  <a href="javascript:void();" class="feedBtn">FEEDBACK</a>
</div>

<?php wp_footer(); ?>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#servicesCarousel .catslider').bxSlider({
      slideWidth: 310,
      auto: false,
      pager: false,
      controls: true,
      responsive: true,
      minSlides: 1,
      maxSlides: 4,
      slideMargin: 10
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.offers-section').bxSlider({
      auto: true,
      pager: false,
      controls: false,
      responsive: true,
    });
  });
</script>

<script>
$(document).ready(function(){
  $('#whole-news').scrollbox({
    linear: true,
    step: 1,
    delay: 0,
    speed: 100
  });
});
</script>

<script>
$('#FeedbackBtn1').click(function() {
    var flag = 0;
    if ($("input[name='scale_rate']:checked").size() == 0) {
        $(".feed-text").html("Please select a score!");
        // $(".feed-error").css("display", "block");
        $('.feed-error').show(1).delay(2000).hide(1);
        return false;
    } else if ($('#feedtypes').val() == "") {
        $(".feed-text").html("Pleass select a category!");
        $('.feed-error').show(1).delay(2000).hide(1);
        return false;
    } else if ($('#feedback_area').val() == "") {
        $(".feed-text").html("Please enter some feedback text!");
        $('.feed-error').show(1).delay(2000).hide(1);
        return false;
    } else {
        $('.feed-stg2').show();
        $('.feed-stg1').hide();
    }
});

$('#FeedbackBtn2').click(function() {
    var flag = 0;
    var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
    if ($("#email_id").val() == "") {
        $(".feed-text").html("Please enter Your Email!");
        $('.feed-error').show(1).delay(2000).hide(1);
        return false;
    } else if (!re.test($("#email_id").val())) {
        $(".feed-text").html("Please enter Valid Email!");
        $('.feed-error').show(1).delay(2000).hide(1);
        return false;
    } else {
        var frmdata = $('#feedback_form').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
            data: "action=UserFeedback&" + frmdata,
            success: function(Data) {
                if (Data == 1) {
                    $('#feedback-container').hide();
                    $('#feedback-container.thanks_feedback-container').show();
                    $('#feedback_form')[0].reset();
                } else {
                    alert('Please try again');
                }
            }
        })
    }
});

setTimeout(function() {
    $('.feed-error').fadeOut('fast');
}, 2000);
</script>

<script type = "text/javascript">
function serServices() {
    $('.ser_services').click(function() {
        var sid = $(this).attr('rel');
        $('#hiddenSID').val(sid);
        $('.city_pop_overlay').addClass('city_pop_show');
    })
    $('.city_pop_close').click(function() {
        $(this).parents('.city_pop_overlay').removeClass('city_pop_show');
    })
}
serServices();
$('#prime-nav li').addClass('ser_services');
</script>

<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->

<script type = "text/javascript">
google.maps.event.addDomListener(window, "load", function() {
    /*
       var places = new google.maps.places.Autocomplete((document.getElementById('search-TB')),{
     types: ['geocode'],
       componentRestrictions: {country: 'DE'}//UK only
       });*/
    var places = new google.maps.places.Autocomplete((document.getElementById("destName")));
    google.maps.event.addListener(places, "place_changed", function() {
        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;
    });
});
</script>

<script type="text/javascript">
google.maps.event.addDomListener(window, "load", function() {
    /*
    var places = new google.maps.places.Autocomplete((document.getElementById('search-TB')),{
    types: ['geocode'],
    componentRestrictions: {country: 'DE'}//UK only
    });*/
    var places = new google.maps.places.Autocomplete((document.getElementById("searchName")));
    google.maps.event.addListener(places, "place_changed", function() {
        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;
    });
});
</script>

<script>
$('.city_pop_search').click(function() {
    if ($('#destName').val() == '') {
        $('#err_destName').html('<span class="state-indicator">Please enter your city name.</span>');
        $('#destName').focus();
        return false;
    } else {
        var sid = $('#hiddenSID').val();
        window.location.href = "<?php echo site_url();?>/search-vendor/?sid=" + sid + "&destName=" + $("#destName").val();
    }
});
</script>

<script type = "text/javascript">
$(document).ready(function() {
    if ($(window).width() > 1024) {
        var main_Container_width = $('.main_Container').width();
        var newWidth = main_Container_width - 185;
        $('.slide_Bar').click(function() {
            slideFunction();
        });

        function slideFunction() {
            var styles = {
                'width': 81 + '%'
            }
            var styles2 = {
                'width': 97 + '%'
            }
            if ($('.main_Container').hasClass('main_Container_sliding')) {
                $('.main_Container').removeClass("main_Container_sliding").css(styles);
                $('.main_Container').addClass("main_Container_sliding_out").css(styles2);
                $('#mySidenav').removeClass('mySidenav_collapsed_out');
            } else {
                $('.main_Container').removeClass("main_Container_sliding_out").css(styles2);
                $('.main_Container').addClass("main_Container_sliding").css(styles);
                $('#mySidenav').addClass('mySidenav_collapsed_out');
            }
        }
    } else {
        var main_Container_width = $('.main_Container').width();
        var sideNav = $('.sidenav').width();
        var newWidth = main_Container_width - sideNav;
        $('.slide_Bar').click(function() {
            slideFunction();
        });

        function slideFunction() {
            var styles = {
                'width': newWidth
            }
            var styles2 = {
                'width': 100 + '%'
            }
            if ($('.main_Container').hasClass('main_Container_sliding')) {
                $('.main_Container').removeClass("main_Container_sliding").css(styles);
                $('.main_Container').addClass("main_Container_sliding_out").css(styles2);
                $('#mySidenav').removeClass('mySidenav_collapsed_out');
            } else {
                $('.main_Container').removeClass("main_Container_sliding_out").css(styles2);
                $('.main_Container').addClass("main_Container_sliding").css(styles);
                $('#mySidenav').addClass('mySidenav_collapsed_out');
            }
        }
    }
});
</script>

<script type = "text/javascript">
$(document).ready(function() {
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function() {
        $(this).toggleClass('open');
    });
});
</script>

<script type = "text/javascript">
$('.closeFeed').click(function() {
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
$('.cancel_feed').click(function() {
    $('#feedback-container').hide();
    $('.feed-stg1').show();
    $('.feed-stg2').hide();
})
$('.feedBtn').click(function() {
    $('#feedback-container').show();
})
$('.feed_cmnt_type').click(function() {
    $(this).addClass('isActive').siblings().removeClass('isActive');
    var feedType = $(this).html();
    $('.feed_cmnt_bot h4').html(feedType);
    $('#feedtype').val(feedType);
})
$('.feed-scale span').click(function() {
    $(this).addClass('isActive').siblings().removeClass('isActive');
})
</script>

<script>
$('#quick_links .quick-links-section-body ul li > span').click(function() {
    $(this).parent().toggleClass('isActive');
    $(this).parent().find('.quick-sub-menu').slideToggle();
})
</script>

<script>
$('.snd_query_btn').click(function() {
    $('#query-container').show();
    var btntext = $(this).text();
    $('<input type="hidden">').attr({ name: 'booking', value: btntext }).appendTo('#sendqueryFrm');
})
$('#queryBtn1').click(function() {
    var frmdata = $('#sendqueryFrm').serialize();
    $.ajax({
        type: "POST",
        url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
        data: "action=sendQuery&" + frmdata,
        success: function(Data) {
            $('#query-container .feed-stg1').hide();
            $('#query-container .feed-stg2').show();
        }
    })
})
$('.cancel_query').click(function() {
    $('#query-container').hide();
    $('#query-container .feed-stg1').show();
    $('#query-container .feed-stg2').hide();
})
$('#queryBtn2').click(function() {
    $('#query-container').hide();
    $('#query-container .feed-stg1').show();
    $('#query-container .feed-stg2').hide()
})
</script>

<style>
	.footer_links .sub-menu{margin-left: 30px;}
.footer_links .sub-menu .sub-menu{margin-left: 30px;}
.state-indicator {
background-color: #fff;
border-radius: 2px;
border-color: #d32f2f;
color: #A41200;
padding: 5px 5px 5px 14px;
display: inline-block;
position: relative;
margin: 0 0 5px;
box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.3);
text-align: left;
}
.footer_links .sub-menu {
    margin-left: 30px;
}

</style>