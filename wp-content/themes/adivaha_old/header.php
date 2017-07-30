<?php session_start();
global $current_user;
global $userID;
global $mk_options;
global $siteUrl;
global $site_language;


if($_SESSION['IP_Country']==''){
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/".$ip));
	$_SESSION['IP_Country']=$details->country;
	if($details->country=='DE'){
	echo '<script>window.location.href="'.site_url().'/de/"</script>';
	}
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
?>

<!DOCTYPE html>
<html lang="en" ng-app="Adivaha">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width">


<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="icon" href="<?php echo $mk_options['custom_favicon'];?>" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-libraries/ripple.css">
<!--
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css?var=<?php echo rand();?>">-->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animations.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/color.css?var=<?php echo rand();?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/angular-material.min.css">
<link href='<?php echo get_template_directory_uri(); ?>/css-libraries/loading-bar.css' rel='stylesheet' />
<link href='//fonts.googleapis.com/css?family=Oxygen:300,400,700' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/css-libraries/app.css' rel='stylesheet' />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/angular-material.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-libraries/rzslider.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-libraries/bootstrap.min.css">







<?php wp_head(); ?>
</head>
<body id="top" class="body-rtl">

 <?php if (is_page('home') || ($pageName=='manage-destination') || ($pageName=='manage-flight')){?>
<div id="conloader" style="position:fixed; width:300px; height:300px; top:50%; left:50%; z-index:999; text-align:center;transform:translate(-50%,-50%);">  <div class='main-loader'><img src="<?php echo get_template_directory_uri();?>/images/svg/ripple.svg"/ alt="Loading"><h6>Loading</h6></div>
</div>
<div id="bodyldr" style="position:fixed; width:100%; height:100%; top:0px; right:0px; bottom:0px; left:0px; background:rgba(255, 255, 255, 0.9); z-index:998;"></div>
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
<article class="borders-color">
  <header>
  
<div class="pet-header">
  <div class="container">
        <div class="row">
          <div class="col-md-6">
			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="#">About</a>
			  <a href="#">Services</a>
			  <a href="#">Clients</a>
			  <a href="#">Contact</a>
			</div>
			<span class="bar_mnu"><i class="fa fa-bars"  onclick="openNav()" aria-hidden="true"></i>
  <a class="" href="<?php echo $siteUrl;?>"><img ng-src="<?php echo $mk_options['header_logo'];?>" alt="Logo"></a></span>
		  </div>
		  
		   <div class="col-md-6">
				<ul class="navbar-right pet_right " id="riteSidedata">
					<li><a href="#"><i class="fa fa-phone"></i>+91 9999854201</a></li>
                    <li><!--<a href="#"><i class="fa fa-user"></i>  </a>-->
						<div class="dropdown">
									
						
						
							<i class="fa fa-user dropdown-toggle btn-trop" data-toggle="dropdown"> <span class="fa fa-chevron-down downckky"></span></i>
							
							<ul class="dropdown-menu dropdown-menu-op1">
							  <li><a href="http://petsonbreak.com/register/"> <i class="fa fa-sign-in"></i>SING UP </a></li>
							  <li><a href="http://petsonbreak.com/login/"> <i class="fa fa-sign-in"></i>LOG IN</a></li>
							  <li><a href="#"> <i class="fa fa-sign-in"></i>JavaScript</a></li>
							</ul>
						  </div>
					</li>
				</ul>
		  </div>
		</div>
	</div>
</div>
  
  
  

  
 <!-- 
    <div class="header-top hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div >
              <ul class="nav navbar-nav">
                <li class="paddingtop6"><?php echo $mk_options['site_Contact_Number'];?>, <?php echo $mk_options['site_email'];?></li>
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div>
              <ul class="nav navbar-nav navbar-right" ng-controller="currencies">
                <input name="currency" id="currency" type="hidden" value="{{currency}}" />
                <input name="currency_symbol" id="currency_symbol" type="hidden" value="{{symbol}}" />
                <?php if ($current_user->ID != '') { ?>
                <li class="account_open my-fav" id="myFavourite"> <a href="<?php echo $siteUrl;?>/favourite/" target="_blank" class="dropdown-toggle"><i class="fa fa-heart" aria-hidden="true"></i><?php echo $mk_options['myfavorite'];?></a></li>
                <?php } else{?>
                <li class="account_open my-fav" id="myFavourite"> <a href="<?php echo $siteUrl;?>/login/" class="dropdown-toggle"><i class="fa fa-heart" aria-hidden="true"></i><?php echo $mk_options['myfavorite'];?></a></li>
                <?php }?>
                <li class="dropdown currency-inr currency-inr-boder"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-angle-down color-fauseall" aria-hidden="true"></i> <span class="us_dollar_text">
                  <div class="dollar_text_left" id="currTitle"> <span ng-bind-html="symbol"></span>&nbsp;{{currTitle}}</div>
                  <div class="dollar_text_right" ng-bind-html="currKey"></div>
                  <span>
               
                  </a>
                  <ul class="dropdown-menu">
                    <li ng-repeat="(key, currencyL) in currencyList"> <a href="javascript:void(0);" ng-click="selected_currency(key)"> <span class="us_dollar_text text-style1">
                      <div class="dollar_text_left">{{ currencyL.title }}</div>
                      <div class="dollar_text_right">{{ key }}</div>
                      <span></a></li>
                  </ul>
                </li>
               
				 <li class="dropdown currency-inr"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down color-fauseall" aria-hidden="true"></i>
				 <img src="<?php echo $activeLanguage['flag_url'];?>"><?php echo ucfirst($activeLanguage['code']);?></a>
                  <ul class="dropdown-menu">
				  <?php foreach($lang_arr as $key=>$val){ 
				         $ean_lang =ean_wpml_languages($val['code']); 
						 if(($val['code']=='de') || ($val['code']=='ar') || ($val['code']=='en')){ ?>
					<li ng-click="selected_language('<?php echo $ean_lang;?>','<?php echo $val['url'];?>')"><a href=""><span class="symb"><img src="<?php echo $val['country_flag_url'];?>"></span><span class="seldescription"><?php echo $val['translated_name'];?></span>
					</a>
					</li>
						 <?php } } ?>
                  </ul>
                </li>
				
                <li>
                  <ul id="userAreaData" style="display:inline-block; width:100%;margin-top: 5px;">
                    <?php if ($current_user->ID != '') { ?>
                    <li  class="dropdown currency-inr currency-inr-Lboder" style="float: left;padding-left:10px; padding-right:10px;"><a href="javascript:void(0);" style="color:#FFF;"><i class="fa fa-user" aria-hidden="true"></i><?php echo $current_user->display_name; ?></a></li>
                    <li class="dropdown currency-inr currency-inr-Lboder" style="float:left;"><a href="<?php echo wp_logout_url( $siteUrl.'/login/' ); ?>" style="color:#FFF;"><i class="fa fa-sign-in color-fauseall"></i><?php echo $mk_options['logout'];?></a></li>
                    <?php }?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid" ng-controller="header_Controller">
            <div class="navbar-header" >
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="<?php echo $siteUrl;?>"><img ng-src="<?php echo $mk_options['header_logo'];?>" alt="Logo"></a> </div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

              <ul class="nav navbar-nav">
			  
                <li class="" ng-click="selectType(1);"><a href="<?php echo $siteUrl;?>/#home/?tab=hotel"> <i class="fa fa-bed color-fauseall" aria-hidden="true"></i><?php echo $mk_options['tab_hotel'];?></a></li>
                <li ng-click="selectType(0);" ><a href="<?php echo $siteUrl;?>/#home/?tab=flight"><i class="fa fa-plane color-fauseall" aria-hidden="true"></i><?php echo $mk_options['tab_flight'];?></a></li>
                <li ng-click="selectType(4);"><a href="<?php echo $siteUrl;?>/#home/?tab=holiday"><i class="fa fa-umbrella color-fauseall" aria-hidden="true"></i><?php echo $mk_options['tab_holiday'];?></a></li>
                <li ng-click="selectType(3)"><a href="<?php echo $siteUrl;?>/#home/?tab=resort"><i class="fa fa-home color-fauseall" aria-hidden="true"></i><?php echo $mk_options['tab_resort'];?></a></li>
                <li ng-click="selectType(5)"><a href="<?php echo $siteUrl;?>/#home/?tab=bedbreakfast"><i class="fa fa-coffee color-fauseall" aria-hidden="true"></i><?php echo $mk_options['tab_bedbreakfast'];?></a></li>
              </ul>
			  
              <ul class="nav navbar-nav navbar-right" id="riteSidedata">
                <?php if ($current_user->ID != '') { ?>
                <li class=" account_open"> <a href="<?php echo $siteUrl;?>/booking/" target="_blank" class="dropdown-toggle"><i class="fa fa-user color-fauseall" aria-hidden="true"></i><?php echo $mk_options['mybooking'];?></a></li>
                <?php } else{?>
                <li class=" account_open"> <a href="<?php echo $siteUrl;?>/login/?redirect_to=<?php echo $siteUrl;?>/booking/" class="dropdown-toggle"><i class="fa fa-user color-fauseall" aria-hidden="true"></i><?php echo $mk_options['mybooking'];?></a></li>
                <?php }?>
              </ul>
            </div>
            
          </div>
          
        </nav>
      </div>
    </div>-->
  </header>
</article>
<div ng-controller="bodyloader"></div>