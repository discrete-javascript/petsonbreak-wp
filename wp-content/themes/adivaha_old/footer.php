<?php
global $mk_options;
global $site_language;

?>
<div class="main-overlay"></div>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3">
            <div class="footer_colm"> <a href="#"><img ng-src="<?php echo $mk_options['footer_logo'];?>" alt="logo" class="footer-logo"></a> </div>
          </div>
          <div class="col-md-3">
            <div class="footer_colm">
              <h1 class="foot-colHead"><?php echo $mk_options['f_other_destination'];?></h1>
			  <?php
			   $fdefaults = array(
						'theme_location'  => 'footer-menu',
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
						'items_wrap'      => '<ul class="footer_links" id="prime-nav">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);
				 wp_nav_menu($fdefaults);
			  ?>
			  <!--
              <ul class="footer_links">
                <li><a href="<?php echo site_url();?>/italy/">Rome, Italy</a></li>
                <li><a href="<?php echo site_url();?>/france/ ">Bordeaux, France</a></li>
                <li><a href="<?php echo site_url();?>/miami/ ">Miami, Florida</a></li>
              </ul>
			  -->
            </div>
          </div>
          <div class="col-md-3">
            <div class="footer_colm">
              <h1 class="foot-colHead"><?php echo $mk_options['f_contact_title'];?></h1>
              <ul class="footer_links">
			   <?php if($mk_options['f_company_name']!=''){ ?>
                <li><span><i class="fa fa-building-o"></i></span><a href=""><?php echo $mk_options['f_company_name'];?></a></li>
			   <?php } if($mk_options['f_address']!=''){?>
                <li><span><i class="fa fa-home"></i></span><a href=""><?php echo $mk_options['f_address'];?></a></li>
			   <?php } if($mk_options['f_contact_number']!=''){ ?>
                <li><span><i class="fa fa-phone"></i></span><a href=""><?php echo $mk_options['f_contact_number'];?></a></li>
			   <?php } if($mk_options['f_email']!=''){?>
                <li><span><i class="fa fa-envelope"></i></span><a href=""><?php echo $mk_options['f_email'];?></a></li>
			   <?php } if($mk_options['f_website']!=''){?>
                <li><span><i class="fa fa-globe"></i></span><a href=""><?php echo $mk_options['f_website'];?></a></li>
			   <?php } if($mk_options['f_skype']!=''){?>
                <li><span><i class="fa fa-skype"></i></span><a href=""><?php echo $mk_options['f_skype'];?></a></li>
			   <?php }?>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="footer_colm">
              <h1 class="foot-colHead"><?php echo $mk_options['f_stay_sonnected'];?></h1>
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
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer_terms">
            <p class="copyright1">Copyright All Rights Reserved © 2012</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer_terms">
            <ul>
              
            </ul>
          </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</footer>

<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>


<script src="<?php echo get_template_directory_uri(); ?>/js/rzslider.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBwzkKvM75QzamE7BzVZTfEBwRO6FHEz4U"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/angular-ui-router.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/autocomplete.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/checklist-model.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/ng-map.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ui-bootstrap-tpls-2.2.0.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-aria.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/loading-bar.js?var=<?php echo uniqid(); ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/elif.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts-libraries/dirPagination.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ng-map.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/core.js?var=<?php echo rand();?>"></script>


<?php if($site_language=='ar'){?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style-rtl.css?var=<?php echo date('His');?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-rtl.css?var=<?php echo date('His');?>">
<?php } else{?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css?var=<?php echo date('His');?>">
<?php }?>


<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/search-results-responsive.css?var=<?php echo date('His');?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?var=<?php echo date('His');?>">
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
	$('.search_Form').css('z-index','1');
  })

    $('#findbestrate').click(function(){
    $('.main-overlay').fadeOut();
	$('.search_Form').css('z-index','1');
  })
  
   $('.btn-hack').click(function(){
    $('.main-overlay').fadeOut();
	$('.search_Form').css('z-index','1');
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
</body>
</html>