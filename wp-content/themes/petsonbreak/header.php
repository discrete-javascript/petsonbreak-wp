<?php session_start();
global $current_user;
global $userID;
global $mk_options;
global $siteUrl;
global $site_language;
global $wpdb;

if($_SESSION['IP_Country']==''){
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/".$ip));
	$_SESSION['IP_Country']=$details->country;
	if($details->country=='DE'){
	echo '<script>window.location.href="'.site_url().'/de/"</script>';
	}
}

if($_REQUEST['sid']!=''){
$serviceCategory=getFieldByID('title','twc_service_category',$_REQUEST['sid']);
}
else{
 $serviceCategory='Veterinary Doctors';
}

$_SESSION['TXTDATA']=$mk_options;
//echo "<pre>";
//print_r($_SESSION['TXTDATA']);
$current_user = wp_get_current_user();

$userID =$current_user->ID;
$user_login =$current_user->user_login;
$user_email =$current_user->user_email;
$display_name =$current_user->display_name;
$_SESSION['userID'] =$userID;

$user_meta=get_userdata($_SESSION['userID']);
$user_roles=$user_meta->roles[0];


$_SESSION['template_directory_uri'] =get_template_directory_uri();
//Language
$lang_arr =array();
$activeLanguage ='';
if ( function_exists('icl_object_id') ) {
 $lang_arr = icl_get_languages('skip_missing=0&orderby=name&order=asc&link_empty_to=str');
 foreach($lang_arr as $key=>$val){
	 if($val['active']==1){
	 $activeLanguage =array('code'=>$val['code'],
	                        'ean_code'=>ean_wpml_languages($val['code']), 
	                        'native_name'=>$val['native_name'],
							'translated_name'=>$val['translated_name'],
							'flag_url'=>$val['country_flag_url'],
							'page_url'=>$val['url']
							); 
  }	
 }
}
else{
 $activeLanguage =array('code'=>$mk_options['default_language'],
						'ean_code'=>ean_wpml_languages($mk_options['default_language']), 
						'native_name'=>'',
						'translated_name'=>'',
						'flag_url'=>'',
						'page_url'=>''
						); 	
}


if($_REQUEST["themecolors"]!=""){
$_SESSION['main_color'] = "#".$_REQUEST["themecolors"];
$_SESSION['main_button_color'] = "#444444";
$main_color_hex2rgb = hex2rgb($_REQUEST["themecolors"]);
$_SESSION['main_color_hex2rgb'] = $main_color_hex2rgb['red'].", ".$main_color_hex2rgb['green'].", ".$main_color_hex2rgb['blue'];
}else{
	if($_SESSION['main_color']==""){
	$_SESSION['main_color'] = $mk_options['m_theme_color'];
	$_SESSION['main_button_color'] = "#444444";
	$_SESSION['main_color_hex2rgb'] = "89, 196, 90";
	}
}
$template_slug =get_page_template_slug();

if($template_slug=='home-page-v1.php'){
  $pageName='home-page';	
}elseif($template_slug=='manage-destination.php'){
 $pageName='manage-destination';	
}
elseif($template_slug=='tp-flights.php'){
 $pageName='manage-flight';		
}
else{
 $pageName='';		
}


if($activeLanguage['code']!=$mk_options['default_language']){
$siteUrl =site_url().'/'.$activeLanguage['code'];	
$site_language=$activeLanguage['code'];
}else{
$siteUrl =site_url();		
$site_language='';	 
}

$results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
?>

<!DOCTYPE html>
<html lang="en" ng-app="Adivaha">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width">


<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="icon" href="<?php echo $mk_options['custom_favicon'];?>" type="image/png" sizes="16x16">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-libraries/ripple.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css?var=<?php echo rand();?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?var=<?php echo date('His');?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animations.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/color.css?var=<?php echo rand();?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/angular-material.min.css">
<link href='<?php echo get_template_directory_uri(); ?>/css-libraries/loading-bar.css' rel='stylesheet' />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Oxygen:300,400,700" rel="stylesheet">
<link href='<?php echo get_template_directory_uri(); ?>/css-libraries/app.css' rel='stylesheet' />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/angular-material.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-libraries/rzslider.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/jquery.bxslider.css?var=<?php echo rand();?>">-->
<!-- <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58f9d6dacaaba30012e7e3cb&product=sticky-share-buttons"></script> -->
<?php 
	wp_enqueue_style( 'petsonbreak-googlefont', 'https://fonts.googleapis.com/css?family=Lato|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Oxygen:300,400,700', array(), null );
	wp_enqueue_style( 'petsonbreak-ripple', get_theme_file_uri( '/css-libraries/ripple.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-animate', get_theme_file_uri( '/css/animate.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-animations', get_theme_file_uri( '/css/animations.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-color', get_theme_file_uri( '/css/color.css' ), array(), null );

	wp_enqueue_style( 'petsonbreak-loading-bar', get_theme_file_uri( '/css-libraries/loading-bar.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-app', get_theme_file_uri( '/css-libraries/app.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-angular-material', get_theme_file_uri( '/css-libraries/angular-material.min.css' ), array(), null );

	wp_enqueue_style( 'petsonbreak-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'petsonbreak-rzslider', get_theme_file_uri( '/css-libraries/rzslider.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-bootstrap', get_theme_file_uri( '/css-libraries/bootstrap.min.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-bxslider', get_theme_file_uri( '/css-libraries/jquery.bxslider.css' ), array(), null );
	wp_enqueue_style( 'mk-style', get_stylesheet_uri(), false, false, 'all' );
	wp_enqueue_style( 'petsonbreak-mainstyle', get_theme_file_uri( '/css/style.css' ), array(), time() );
	wp_enqueue_style( 'petsonbreak-mainstyle', get_theme_file_uri( '/css/search-results-responsive.css' ), array(), null );
	wp_enqueue_style( 'petsonbreak-responsive', get_theme_file_uri( '/css/responsive.css' ), array(), null );
?>

<?php wp_head(); ?>
</head>
<body id="top" class="body-rtl">

 <?php if (is_page('home') || ($pageName=='manage-destination') || ($pageName=='manage-flight')){?>
 <!--
<div id="conloader" style="position:fixed; width:300px;top:50%; left:50%; z-index:999; text-align:center;transform:translate(-50%,-50%);">  <div class='main-loader'><img src="<?php echo get_template_directory_uri();?>/images/calloader.gif"/ alt="Loading"></div>
</div>
<div id="bodyldr" style="position:fixed; width:100%; height:100%; top:0px; right:0px; bottom:0px; left:0px; background:rgb(0, 0, 0); z-index:998;opacity:0.8"></div>
-->
 <?php } ?>

<div style="display:none">
  <input name="siteurl" id="siteurl" type="text" value="<?php echo $siteUrl; ?>" />
  <input name="template_url" id="template_url" type="text" value="<?php echo get_template_directory_uri(); ?>" />
  <input name="login_userID" id="login_userID" type="text" value="<?php echo $userID; ?>" />
  <input name="pageName" id="pageName" type="text" value="<?php echo $pageName; ?>" />
  <input name="tpMarker" id="tpMarker" type="text" value="<?php echo $mk_options['tp_marker']; ?>" />

  <input name="default_currency" id="default_currency" type="text" value="<?php echo $mk_options['default_currency']; ?>" />
  <input name="active_language" id="active_language" type="text" value="<?php echo $activeLanguage['ean_code']; ?>" />
  <input name="site_language" id="site_language" type="text" value="<?php echo $site_language; ?>" />
 
  <input name="default_destination" id="default_destination" type="text" value="<?php echo $mk_options['default_destination']; ?>" />
<input name="default_destination_child" id="default_destination_child" type="text" value="<?php echo $mk_options['default_destination_child']; ?>" />
  
  <!-- banner images -->
  <input name="hotel_title" id="hotel_title" type="text" value="<?php echo $mk_options['hotel_banner_title'];?>" />
  <input name="hotel_description" id="hotel_description" type="text" value="<?php echo $mk_options['hotel_banner_description'];?>" />
  <input name="hotel_img_path" id="hotel_img_path" type="text" value="<?php echo $mk_options['hotel_banner'];?>" /> 
  
  <input name="flight_title" id="flight_title" type="text" value="<?php echo $mk_options['flight_banner_title'];?>" />
  <input name="flight_description" id="flight_description" type="text" value="<?php echo $mk_options['flight_banner_description'];?>" />
  <input name="flight_img_path" id="flight_img_path" type="text" value="<?php echo $mk_options['flight_banner'];?>" />

  <input name="holiday_title" id="holiday_title" type="text" value="<?php echo $mk_options['holiday_banner_title'];?>" />
  <input name="holiday_description" id="holiday_description" type="text" value="<?php echo $mk_options['holiday_banner_description'];?>" />
  <input name="holiday_img_path" id="holiday_img_path" type="text" value="<?php echo $mk_options['holiday_banner'];?>" /> 
  
  <input name="resort_title" id="resort_title" type="text" value="<?php echo $mk_options['resort_banner_title'];?>" />
  <input name="resort_description" id="resort_description" type="text" value="<?php echo $mk_options['resort_banner_description'];?>" />
  <input name="resort_img_path" id="resort_img_path" type="text" value="<?php echo $mk_options['resort_banner'];?>" />
 
 <input name="bedbreakfast_title" id="bedbreakfast_title" type="text" value="<?php echo $mk_options['bedbreakfast_banner_title'];?>" />
  <input name="bedbreakfast_description" id="bedbreakfast_description" type="text" value="<?php echo $mk_options['resort_banner_description'];?>" />
  <input name="bedbreakfast_img_path" id="bedbreakfast_img_path" type="text" value="<?php echo $mk_options['bedbreakfast_banner'];?>" /> 
  
  <!-- some string for core.js page -->
  <input name="select_your_accommodation" id="select_your_accommodation" type="text" value="<?php echo $mk_options['select_your_accommodation'];?>" /> 
  
</div>


<div class="main_Container" ng-controller="Hotel_Controller">


<!-- Header Article Code -->


<article class="borders-color header-article">
  <header>
  
<div class="pet-header header-container">
  <div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
            <div class="social-links-header-container">
                    
                    <ul>
                                 <?php if($mk_options['f_facebook']!=''){?>
                        <li><a href="<?php echo $mk_options['f_facebook'];?>" target="_blank"><i class="header-social-links fa fa-facebook"></i> </a></li>
                                   <?php } if($mk_options['f_google']!=''){?>
                        <li><a href="<?php echo $mk_options['f_google'];?>" target="_blank"><i class="header-social-links fa fa-google-plus"></i> </a></li>
                                   <?php } if($mk_options['f_linkedin']!=''){?>
                        <li><a href="<?php echo $mk_options['f_linkedin'];?>" target="_blank"><i class="header-social-links fa fa fa-linkedin"></i> </a></li>
                                        <?php } if($mk_options['f_twitter']!=''){?>
                        <li><a href="<?php echo $mk_options['f_twitter'];?>" target="_blank"><i class="header-social-links fa fa fa-twitter"></i> </a></li>
                                      <?php }?>
                    </ul>
                </div>
        </div>  
      <div class="col-md-6 col-sm-6 col-xs-12 logo-container">
      
	  
      <span class="bar_mnu">

       <span id="nav-icon4" class="slide_Bar slide_Bar_hidden">
        <span></span>
        <span></span>
        <span></span>
      </span>

     <a class="logo-desk" href="<?php echo $siteUrl;?>"><img ng-src="<?php echo $mk_options['header_logo'];?>" alt="Logo"></a></span>

			<!--<div class="pet-groomsv-sercahbox">
			    <div class="pet-groomsv-criteria">
				   <select id="categories" class="form-control">
				   <option value="">-Select Category-</option>
				   <?php // foreach($results as $val) { ?>
                       <option value="<?php // echo $val->id;?>"><?php // echo $val->title;?></option>           
                   <?php // } ?>
				   </select>
				</div>
				<div class="input-group">
				
				  <?php //   if($_REQUEST['destName']!=''){ ?>
				  
				  <input type="text" name="searchName" id="searchName" class="form-control" value="<?php // echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
				  <?php// }  else { //?>
				  <input type="text" name="searchName" id="searchName" class="form-control" value="" placeholder="Discover and Unleash Happiness you cherish">
				  <?php // } ?>
				  
				  <span class="input-group-addon city_search" id="basic-addon2" style="cursor: pointer;"><i class="fa fa-search"></i></span>
				   				   
				</div>
			
			</div>-->
			<input type="hidden" value="" id="sel_category">
<!--			<div class="pet-groomsv-sercahbox">
			    <div class="pet-groomsv-criteria">
				
			 <span><span class="pet_g_crt"><?php echo $serviceCategory;?></span><span><i class="fa fa-angle-down" aria-hidden="true"></i></span></span>
				   
				   
				   <ul id="categories" class="form-control">
				  
				   <?php foreach($results as $val) { ?>
                       <li class="selected_category" value="<?php echo $val->id;?>"><span class="dogIcon"><img src="<?php echo get_template_directory_uri();?>/images/icons_pets.png"/></span><span class="opt"><?php echo $val->title;?></span></li>           
                   <?php } ?>
				   </ul>
				</div>
				
				
				<div class="input-group">
				
				  <?php if($_REQUEST['destName']!=''){ ?>
				  <span class="input-group-addon" id="magnifying"><i class="fa fa-search"></i></span>
				  <input type="text" name="searchName" id="searchName" class="form-control" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
				  <?php }  else {?>
				  <span class="input-group-addon" id="magnifying"><i class="fa fa-search"></i></span>
				  <input type="text" name="searchName" id="searchName" class="form-control" value="" placeholder="Discover and Unleash Happiness you cherish">
				  <?php } ?>
				  
				  <span class="input-group-addon city_search" id="basic-addon2" style="cursor: pointer;">Sniff</span>
				   				   
				</div>
				<span class="err_searchName"></span>
			
			</div>-->
			
      </div>
      
       <div class="col-md-3 col-sm-6 col-xs-12 pull-right new-user-container">
	   
	   
	   
	   <ul class="navbar-right pet_right " id="riteSidedata">
	   <?php if($userID==''){ ?>
               <li><button class="sign-up-button"><a href="<?php echo $siteUrl; ?>/register/"><span class="profileText"><?php echo $mk_options['sign_up'];?></span></a></button></li>
               <li><button class="login-button"><a href="<?php echo $siteUrl; ?>/login/"><span class="signoutText"><?php echo $mk_options['log_in'];?></span></a></button></li>
              <?php } else{ ?>
			  
			  <?php if($user_roles=='Vendor'){ ?>
                <li><a href="<?php echo $siteUrl; ?>/booking/?type=services" title="Profile"> <i class="fa fa-user" aria-hidden="true"></i><span class="profileText"><?php echo $mk_options['profile'];?></span></a></li>
				<?php } else{ ?>
				<li><a href="<?php echo $siteUrl; ?>/member-profile/?type=profile" title="Profile"> <i class="fa fa-user" aria-hidden="true"></i><span class="profileText"><?php echo $mk_options['profile'];?></span></a></li>
				<?php }?>
				
                <li><a href="<?php echo wp_logout_url(home_url() ); ?>" title="Sign Out"> <i class="fa fa-sign-out" aria-hidden="true"></i><span class="signoutText"><?php echo $mk_options['sign_out'];?></span></a></li>
				
		<?php }?>
        </ul> 

      </div>
    </div>
  </div>
</div>
  
  
  <ul class="nav  navbar-right" ng-controller="currencies">
                <input name="currency" id="currency" type="hidden" value="{{currency}}" />
                <input name="currency_symbol" id="currency_symbol" type="hidden" value="{{symbol}}" />
               
              </ul>

  </header>
</article>

<div id="article-anchor"></div>
<div ng-controller="bodyloader"></div>
<?php if(!is_front_page()): ?>
<div class="">
            <input type="hidden" value="" id="sel_category">
			<div class="pet-groomsv-sercahbox menu-bar">
			    <div class="pet-groomsv-criteria-open menu-bar">
<!--                                <span>
                                    <span class="pet_g_crt"><?php echo $serviceCategory;?></span>
                                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                </span>-->
                                <ul id="categories" class="nav nav-tabs menu-bar">
                                   <?php foreach ($results as $val) { ?>
                                   <li class="selected_category" id="<?php echo $val->id;?>" value="<?php echo $val->id;?>">
                                       <a class="opt" data-toggle="tab" href="#searchbox">
                                           <?php echo $val->title;?>
                                       </a>
                                   </li>           
                                   <?php } ?>
                                </ul>
                                <div class="tab-content menu-bar">
                                    <div id="searchbox" class="tab-pane hidden menu-bar">
                                        <?php if($_REQUEST['destName']!=''){ ?>
                                        <input type="text" 
                                             name="searchName" 
                                             id="searchName" 
                                             class="form-control menu-bar-textbox" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
                                        <?php }  else {?>
                                        <input type="text" name="searchName" id="searchName" class="form-control menu-bar-textbox" value="" placeholder="Discover and Unleash Happiness you cherish">
                                        <?php } ?>
                                        <span class="input-group-addon city_search" 
                                            id="basic-addon2" style="cursor: pointer;">
                                          SNIFF
                                        </span>
                                    </div>
                              </div>
                                  <span class="err_searchName"></span>
                            </div>
<!--                             <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                                <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                                <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                              </ul>

                              <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                  <h3>HOME</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                  <h3>Menu 1</h3>
                                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                  <h3>Menu 2</h3>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                  <h3>Menu 3</h3>
                                  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                              </div>-->
<!--			<div class="input-group">
			  <?php if($_REQUEST['destName']!=''){ ?>
                            <input type="text" 
                                   name="searchName" 
                                   id="searchName" 
                                   class="form-control" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
                            <?php }  else {?>
                            <input type="text" name="searchName" id="searchName" class="form-control" value="" placeholder="Discover and Unleash Happiness you cherish">
                            <?php } ?>
                            <span class="input-group-addon city_search" 
                                  id="basic-addon2" style="cursor: pointer;">
                                Search
                            </span>
			</div>
			<span class="err_searchName"></span>-->
                    </div>
                    
            
		<!-- <div class="facebookBack">
			<a href="javascript:void(0);" alt="fblogin" class="fblogin">
			<i class="fa fa-facebook"></i>  &nbsp;&nbsp;<?php echo $mk_options['log_in_with_facebook'];?></a>
		</div>
	
		<div class="New_contactFrom">
		
		    <?php
			if (is_page( 'login' ) ):
			?>
			<p class="logWith"><?php echo $mk_options['log_in'];?></p>
				
			<p class="CeratOr">  <small><?php echo $mk_options['or'];?></small> <a href="<?php echo site_url();?>/register/"><?php echo $mk_options['create_an_account'];?></a></p>
			<?php
			endif;
			?>
			
			
			<?php
			if (is_page( 'register' ) ):
			?>
			<p class="logWith registerWith"><?php echo $mk_options['register'];?></p>
			<?php
			endif;
			?>
			
			
			
			
				
		

		  <?php
			while ( have_posts() ) : the_post();
			?>
		  <p class="txt-o">
			<?php the_content(); ?>
		  </p>
		  <?php
			// End the loop.
			endwhile;
			
			?>
	<p style="clear: both;"></p>
	  </div> -->
    </div>
<script>

    
        var listCategories = document.querySelector('#categories');
        listCategories.childNodes.forEach(function(item, index) {
            if (index > 10 && index %2) {
                item.classList.add('hidden');
            }
        });
    
</script>
<!--<script
  src="https://code.jquery.com/jquery-2.0.3.min.js"
  integrity="sha256-sTy1mJ4I/LAjFCCdEB4RAvPSmRCb3CU7YqodohyeOLo="
  crossorigin="anonymous"></script>
<script>

$('.city_search').click(function(){
	if($('#searchName').val()==''){
		$('.err_searchName').html('<span class="error_search">Please select category and your city name.</span>');
		//alert('Please enter city name for search');
		$('.err_searchName').show(1).delay(2000).hide(1);
		$('#searchName').focus();
		return false;
	}
	else{
		var city=$('#searchName').val();
		var sid = $('#sel_category').val();
		//alert(sid);
                var store = window.localStorage;
                store.setItem('idOfSelected', sid);
		window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sid+"&destName="+city;
		}	
	});
//document.DOMContentLoaded = function() {
    
//}
</script>-->
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    var preSelectdCategory = window.localStorage.idOfSelected;
    var toSelect = document.getElementById(preSelectdCategory);
    toSelect.querySelector('.opt').click();
  });
</script>


<script>
 jQuery('.pet-groomsv-criteria').click(function(){
	  jQuery(this).toggleClass('pet-groomsv-criteria-open');
	 })	
	 
jQuery('.pet-groomsv-criteria-open #categories li').click(function(){
	 var catLi = (jQuery(this).find('.opt').text());
	  var id = jQuery(this).attr('id');
	   jQuery('#sel_category').val(id);
//	  alert(id);
	 jQuery('.pet_g_crt').text(catLi);
})
</script>
<script>
    var optionsForSearch = document.querySelectorAll('a.opt');
    optionsForSearch.forEach(function(item) {
	item.addEventListener('click', function(e){
		document.querySelector('div#searchbox.tab-pane').classList.remove('hidden')
	});
})
</script>
<style>
    .pet-groomsv-criteria-open #categories li {
        cursor: pointer;
    }
</style>
<?php endif; ?>
<!--<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" 
           data-toggle="collapse" data-target="#navbar-to-collapse">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-to-collapse">
      <ul class="nav navbar-nav">
          <li>
             <a href="<?php echo site_url();?>" title="home">
                 <span>Home</span>
             </a>
          </li>
          <li class="dropdown">
              <a title="Pet Friendly" class="dropdown-toggle" data-toggle="dropdown">
                  <span>Pet Friendly</span>
                  <b class="caret"></b>
              </a>
              <ul class="pet-friend-subm dropdown-menu">
                  <li>
                      <a href="<?php echo site_url();?>/all-categories/?sid=N148948330558c7b6295b388" title="Weekend Destinations">
                          <span>Weekend Destinations</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url();?>/all-categories/?sid=V148948235058c7b26e54885" title="Pet Friendly Restaurants">
                          <span>Restaurants</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo site_url();?>/all-categories/?sid=G148948225958c7b21322ce8" title="Pet Friendly Cab Services">
                          <span>Cab Services</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li>
              <a href="<?php echo site_url();?>/all-categories/" title="Pet Services">
                  <span>Pet Services</span>
              </a>
          </li>
          <li>
              <a href="<?php echo site_url();?>/what-we-do/" title="What We Do">
                  <span>What we Do</span>
              </a>
          </li>

          <li>
              <a href="<?php echo site_url();?>/calendar/events/" title="Events">
                  <span>Events</span>
              </a>
          </li>

          <li>
              <a href="<?php echo site_url();?>/news-and-updates/" title="News & Updates">
                  <span>News & Updates</span>
              </a>
          </li>

          <?php if($userID==''){ ?>  
              <li>
                  <a href="<?php echo site_url();?>/login/" title="Offers and Discounts">
                      <span>Offers and Discouts</span>
                  </a>
              </li>
          <?php } else{ ?>
              <li>
                  <a href="<?php echo site_url();?>/offers-and-discounts/" title="Offers and Discounts">
                      <span>Offers and Discouts</span>
                  </a>
              </li>
          <?php   }?>
      </ul>
    </div>
</nav>-->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBwzkKvM75QzamE7BzVZTfEBwRO6FHEz4U"></script> -->

<script type="text/javascript">

/*
	var headerHeight = $('.header-article').height();
       $('#article-anchor').height(headerHeight);
*/
</script>



<script>
$('.city_pop_search').click(function(){
	if($('#destName').val()==''){
		$('#err_destName').html('<span class="state-indicator">Please enter your city name.</span>');
		$('#destName').focus();
		return false;
	}
	else{
		var sid=$('#hiddenSID').val();
		window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sid+"&destName="+$("#destName").val();		
		}	
	});

</script>


<script>



$('.city_search').click(function(){
	if($('#searchName').val()==''){
		$('.err_searchName').html('<span class="error_search">Please select category and your city name.</span>');
		//alert('Please enter city name for search');
		$('.err_searchName').show(1).delay(2000).hide(1);
		$('#searchName').focus();
		return false;
	}
	else{
		var city=$('#searchName').val();
		var sid = $('#sel_category').val();
		//alert(sid);
		window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sid+"&destName="+city;
		}	
	});

</script>


<script>
 $('.pet-groomsv-criteria').click(function(){
	  $(this).toggleClass('pet-groomsv-criteria-open');
	 })	
	 
$('.pet-groomsv-criteria #categories li').click(function(){
	 var catLi = ($(this).find('.opt').text());
	  var id = $(this).attr('id');
	   $('#sel_category').val(id);
	  //alert(id);
	 $('.pet_g_crt').text(catLi);
})
</script>


<style>

	
	.sidenav .pet-friend-subm{
	transition: 0.8s ease-in-out;
    padding-left: 0px;
	}
	
	.sidenav.mySidenav_collapsed_out .pet-friend-subm{
	transition: 0.8s ease-in-out;
    padding-left: 28px
	}
	
	
</style>
