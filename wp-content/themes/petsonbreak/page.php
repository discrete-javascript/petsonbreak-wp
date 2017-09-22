<?php session_start();
/**
 Template Name: Default Page
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 get_header();
 global $mk_options;
?>
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

$results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 ORDER BY sorting ASC");

$extQuery ='';
if($_REQUEST['sid']!=''){
 $extQuery.=" and service_category='".$_REQUEST['sid']."'"; 
}
if($_REQUEST['destName']!=''){
 //$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
  $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'"; 
}

$serviceTitle ='';
if($_REQUEST['sid']!='' && $_REQUEST['destName']!=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']). ' in ' .$_REQUEST['destName']; 
}
elseif($_REQUEST['sid']!='' || $_REQUEST['destName']=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']);
}
elseif($_REQUEST['destName']!='' || $_REQUEST['sid']=''){
  $serviceTitle.=$_REQUEST['destName']; 
}
else{
  $serviceTitle.='Pet Services';
}

?>
<div class="background-slider" ng-hide="('search' | isState) || ('hotel-information' | isState) || ('online-booking' | isState) || ('confirmation' | isState) || ('flight_search' | isState)">
  <?php echo do_shortcode('[crellyslider alias="homeslider"] '); ?>
<div class=" col-sm-12 slider-search"> <!-- log_backGrond -->
    <div class=" col-sm-10 col-sm-offset-1"><!-- container_width -->
      <input type="hidden" value="" id="sel_category">
      <div class="pet-groomsv-sercahbox">
          <div class="pet-groomsv-criteria-open">
            <!--<span>
            <span class="pet_g_crt"><?php echo $serviceCategory;?></span>
            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </span>-->
            <ul id="categories" class="nav nav-tabs">
              <?php $firstElement = true; ?>
              <?php foreach ($results as $val) { ?>
              <li class="selected_category <?php if($firstElement) { echo 'active'; $firstElement = false; } ?>" data-value="<?php echo $val->id;?>">
                 <a class="opt" data-toggle="tab" href="#searchbox">
                     <?php echo $val->title;?>
                 </a>
              </li>
              <?php } ?>
              <li></li>
            </ul>
            <div class="show-hide-button">
                <a id="dig-more">SHOW<?php echo is_page('login');?> <i class="fa fa-sort-asc" aria-hidden="true"></i></a>  
            </div>
            <div class="tab-content">
            <div id="searchbox" class="tab-pane">
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
            SNIFF
            </span>
            </div>
            </div>
            <span class="err_searchName"></span>
          </div>
          <!-- <ul class="nav nav-tabs">
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
          <!-- <div class="input-group">
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
</div>
</div>
 <div id="all_categories" ng-hide="('search' | isState) || ('hotel-information' | isState) || ('online-booking' | isState) || ('confirmation' | isState) || ('flight_search' | isState)">
     <div class="offer-description">
         <h1 class="offer-heading">WHAT WE OFFER</h1>
         <p class="offer-content">Over <span class="pets-number">10,000+</span> Pet friendly places to stay, eat & play with your Pets</p>
     </div>
     <div class="container">
         <div id="servicesCarousel" class="servicesCarousel">
            <div class="catslider">
            <?php 
              $weekresults =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 order by sorting asc");
              //echo '<pre>';print_r($weekresults);echo "</pre>";
              foreach($weekresults as $key=>$weekrow) {
                // $link =site_url().'/search-vendor/?sid='.$weekrow->service_category;
            ?>
              <div class="item">
                <?php /*foreach($array as $weekrow) {  */
                  $link =site_url().'/search-vendor/?sid='.$weekrow->service_category.'&destName='.$weekrow->destination; ?>
                    <div class="">
                        <div class="cat_colm category-slides">
                            <div class="ser_services" rel="<?php echo $weekrow->id;?>" 
                            <?php if(!empty($weekrow->category_image)) { ?>
                              style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $weekrow->category_image;?>);background-size:cover;" <?php } ?>>
                                <div class="home-slider-offer desc">
                                    <a href="javascript:void(0);">
                                        <p class="home-slider-offer-title"><?php echo $weekrow->title;?></p>
                                        <?php if(isset($weekrow->destination)) { ?>
                                          <p><?php echo $weekrow->destination;?></p>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php /* } */ ?>
              </div>
            <?php } ?>
            </div>
             <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#servicesCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#servicesCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a> -->
         </div>
     </div>
   
</div>
<div class="about-us-section">
    <div class="about-description-container">
        <!-- <div class="about-us-description">
            <h1 class="about-us-heading">ABOUT US</h1>
            <p class="about-us-para-1">At PetsonBreak we mean what we say and are committed to providing superlative experiences that can rarely be found elsewhere. For us, PetsonBreak is more than just a travel company; it is the embodiment of everything that we are truly passionate about. PetsonBreak is owned and staffed by pet people for whom work related with pets and travel is not simply an interesting job, but an all-consuming passion. </p>
            <p class="about-us-para-2">We believe that travel should not simply be a business, but a way of exploring and understanding the diverse cultures, people and traditions that inhabit in this world and what more you can ask if your furry friend can tag along in these adventurous trips.</p>
        </div> -->
        <div class="about-us-description">
          <div class="search_Form horizontal-box">
         <div id="exTab1" >
          <div class="div_clol-notuse pet-divclol">
               <ul  class="nav nav-pills">
              <li class="tabbss tab_1 active" ng-click="selectType(1);"><a  href="javascript:void(0)" data-toggle="tab" title="Hotel" ALT="Hotel"  return false;><i class="fa fa-bed" ></i><span><?php echo $mk_options['tab_hotel'];?></span></a></li>
              <li class="tabbss tab_0"><a ng-click="selectType(0);" href="javascript:void(0)" data-toggle="tab" title="Flight" ALT="Flight"><i class="fa fa-plane"></i><span><?php echo $mk_options['tab_flight'];?></span></a></li>
              <li class="tabbss tab_4" ng-click="selectType(4);"><a href="javascript:void(0)" data-toggle="tab" title="Vacation" ALT="Vacation"><i class="fa fa-umbrella"></i><span><?php echo $mk_options['tab_holiday'];?></span></a></li>
              <li class="tabbss tab_3" ng-click="selectType(3)"><a href="javascript:void(0)" data-toggle="tab" title="Resort" ALT="Resort"><i class="fa fa-home"></i><span><span><?php echo $mk_options['tab_resort'];?></span></a></li>
              <li class="tabbss tab_5" ng-click="selectType(5)"><a href="javascript:void(0)" data-toggle="tab" title="Bed & Breakfast" ALT="Bed & Breakfast"><i class="fa fa-coffee"></i><span><?php echo $mk_options['tab_bedbreakfast'];?></span></a></li>
              </ul>
              
               <div class="tab-content clearfix">
                   <div class="tab-pane active" id="tab-hotel">
                  <div class="searchbox" style="position: relative;">
                    <form method="get" name="search_form" class="hotel-search-box-form">
                      <ul>
                      <li>
                        <input type="text" ng-model="desti" placeholder="City, Hotel or place name"  ng-change="getLocation_Hint($viewValue)"/>
                        <input type="hidden" ng-model="lat"/>
                        <input type="hidden" ng-model="lon"/>
                        <input type="hidden" ng-model="regionid"/>
                        <input type="hidden" ng-model="datatype"/>
                        <input type="hidden" id="hotelType" name="hotelType" value="1"/>
                        <i class="fa fa-map-marker popup" aria-hidden="true"></i>
                        <div class="popup showhidepopup{{showpopup}}">
                        <div class="show-autocomplete-popup"> 
                          <div class="cities_15">
                             <h6 >Cities</h6>
                            <a class="autocomplete-dropdown" ng-repeat="city_destinations in city_destinations track by $index" ng-click="Update_Search_Field(city_destinations.lat, city_destinations.lon,city_destinations.id, city_destinations.latinFullName, 'location')">{{ city_destinations.latinFullName }} </a> 
                          </div>
                        
                        <div class="hotels_15">
                          <h6 class="hotels-2">Hotels</h6>
                          <a class="autocomplete-dropdown" ng-repeat="hotel_destinations in hotel_destinations track by $index"  ng-click="Update_Search_Field(hotel_destinations.lat, hotel_destinations.lon,hotel_destinations.id, hotel_destinations.latinFullName, 'hotel')">{{ hotel_destinations.latinFullName }}</a>
                        </div>
                        <div class="landmarks_15">
                           <h6 class="hotels-2">Landmarks</h6>
                          <a class="autocomplete-dropdown" ng-repeat="landmarks_destinations in landmarks_destinations track by $index" ng-click="Update_Search_Field(landmarks_destinations.lat, city_destinations.lon, landmarks_destinations.id,landmarks_destinations.latinFullName, 'location')">{{ landmarks_destinations.latinFullName }}</a> 
                        </div>
                        </div>
                        </div>
                      </li>
                      <li  class="input-daterange" data-date-format="M d, D">
                        <div class="datepicker-background-div">
                        <input type="text" placeholder="Check In" name="start" id="checkIn" readonly="true" />
                        <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                        <div class="datepicker-background-div">
                        <input type="text"placeholder="Check Out"  name="end" id="checkOut" readonly="true" />
                        <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                      </li>
                      <li>
                        <div class="adults-12">
                        <input type="text" name="Cri_Rooms" id="Cri_Rooms" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room" readonly="readonly" style="cursor:pointer">
                        <i class="fa fa-male" aria-hidden="true"></i> </div>
                      </li>
                      <li>
                        <input class="btn-hack button" id="findbestrate" type="button" value="Sniff" ng-click="Search_Destinations();" >
                      </li>
                      </ul>
                      <div class="children-age roomgroupdata hidnumberofrooms">
                      <div class="room_text1" style="color:#000">
                        <div class="nomar">
                        <?php _e('Rooms','adivaha');?>
                        </div>
                        <div class="nomar">
                        <?php _e('Adults','adivaha');?>
                        </div>
                        <div class=" nomar">
                        <?php _e('Children','adivaha');?>
                        </div>
                      </div>
                      <div class="how_noofRooms" >
                        <div class="nomar add-rooms"> <a ng-click="changeRooms('minus');"><i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> <a ng-click="changeRooms('plus');"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                        <input type="hidden" class="form-control" name="Cri_noofRooms" id="Cri_noofRooms" value="{{count}}">
                        </div>
                        <div id="packListdiv" >&nbsp;</div>
                      </div>
                      <div class="be-ddn-footer"> <a href="javascript:void(0)" class="done" ng-click="hideRoomGroup();">Done</a> </div>
                      </div>
                    </form>
                  </div>
                 </div>
                 
                 <div class="tab-pane" id="tab-flight">
                   <div class="searchbox flight-search-box" ng-controller="Flight_Controller">
                  <form method="get" name="search_form" action="http://twc5.com/demo/tp/#/search/">
                    <ul>
                      <li>
                      <input class="location_first1" type="text" ng-model="flight_desti" placeholder="{{Flights_City_From}}"  ng-change="getLocation_Hint_Flights_From($viewValue)"  />
                      <input type="hidden" ng-model="flight_locationId" value="{{Flights_City_From_IATACODE}}" />
                      <!--<i class="fa fa-map-marker popup" aria-hidden="true"></i>-->
                      <div class="popup showhidepopup_flightsfrom{{showpopup_flightsfrom}} hidethisinitially locationpopup_flightsfrom">
                        <div class="show-autocomplete-popup"> <a class="autocomplete-dropdown" ng-repeat="Flight_from_destis in Flight_from_destinations track by $index"> <span ng-if="Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.name)">{{ Flight_from_destis.name }}<span class="city_name_pup">{{ Flight_from_destis.city_name }}</span></span> <span ng-if="!Flight_from_destis.name" ng-click="Update_Search_Field_Flights_From(Flight_from_destis.city_code, Flight_from_destis.city_name)">{{ Flight_from_destis.city_name }}</span> </a> </div>
                      </div>
                      </li>
                      <li>
                      <input class="location_first2" type="text" ng-model="flight_to_desti" placeholder="{{Flights_City_To}}" value="{{Flights_City_To}}"  ng-change="getLocation_Hint_Flights_To($viewValue)"/>
                      <input type="hidden" ng-model="flight_to_locationId" value="{{Flights_City_To_IATACODE}}" />
                      <!--<i class="fa fa-map-marker popup" style="left: 15em;" aria-hidden="true"></i>-->
                      <div class="popup showhidepopup_flightsto{{showpopup_flightsto}} hidethisinitially locationpopup_flightsto">
                        <div class="show-autocomplete-popup flights_topop"> <a class="autocomplete-dropdown" ng-repeat="Flight_To_destis in Flight_To_destinations track by $index"> <span ng-if="Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.name )">{{ Flight_To_destis.name }} <span class="city_name_pup"> {{ Flight_To_destis.city_name }} </span></span> <span ng-if="!Flight_To_destis.name"  ng-click="Update_Search_Field_Flights_To(Flight_To_destis.city_code ,Flight_To_destis.city_name )">{{ Flight_To_destis.city_name }}</span> </a> </div>
                      </div>
                      </li>
                      <li class="input-daterange" data-date-format="M d, D">
                      <div class="datepicker-background-div"> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(true)" class="direct{{directcri}}"> <i class="fa fa-long-arrow-right rxchange-room-3"></i> </a> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(false)" class="return{{returncri}}"> <i class="fa fa-exchange rxchange-room-3"> </i> </a> </div>
                      <div class="datepicker-background-div">
                        <input type="text" placeholder="Arival" name="flight_to_start" id="flight_to_checkIn" date-format="mm/dd/yyyy" value="{{flight_to_checkIn}}" readOnly="true"/>
                        <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                      <div class="datepicker-background-div">
                        <input type="text"placeholder="Departure"  name="flight_to_end" id="flight_to_checkOut" ng-disabled="showhidecheckout" value="{{flight_to_checkOut}}" readOnly="true"/>
                        <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                      </li>
                      <li>
                      <div ng-repeat="datum in data" class="width-set-room">
                      <input class="passenger_buiness-1" type="text" id="showPassenger" ng-click="showPassenger();" rel="0" value="{{count+count1+count2}} passenger,{{result}}" readonly="readonly" style="cursor:pointer">
                      <input type="hidden" ng-model="Flights_Adults" id="Flights_Adults" value="{{count}}" />
                      <input type="hidden" ng-model="Flights_Children" value="{{count1}}" />
                      <input type="hidden" ng-model="Flights_Infants" value="{{count2}}" />
                      <input type="hidden" ng-model="Flights_Category_Economy" value="{{result}}" />
                      <i class="fa fa-male" aria-hidden="true"></i> </li>
                      <li>
                      <input class="btn-hack button" type="button" value="Sniff" ng-click="Search_Flights();" >
                      </li>
                    </ul>
                    <div class="children-age roomgroupdata hidnumberofrooms" >
                      <div class="room-add-age" class="dropdown">
                      <ul>
                      <li>
                        <label class="pax-title">Adults <span>Above 12 years</span></label>
                        <div class="pules-min"> <a ng-click="count = count -1" > <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> <a ng-click="count = count +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
                      </li>
                      <li>
                        <label class="pax-title">Children <span>Below 12 years</span></label>
                        <div class="pules-min"> <a ng-click="count1=count1 - 1" > <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count1}}</a> <a ng-click="count1=count1 +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
                      </li>
                      <li>
                        <label class="pax-title">Infants <span>Below 2 years</span></label>
                        <div class="pules-min"> <a ng-click="count2=count2 - 1"> <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count2}}</a> <a ng-click="count2= count2 +1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
                      </li>
                      </ul>
                      <div class="ddChild ddchild_ border shadow" id="flight_class_select_child">
                      <ul>
                        <li>
                        <label>
                          <input type="radio" ng-model="result" name="rdoResult" value="Economy" ng-checked="true">
                          Economy</label>
                        </li>
                        <li>
                        <label>
                          <input type="radio" ng-model="result" name="rdoResult" value="Business">
                          Business</label>
                        </li>
                      </ul>
                      <div class="be-ddn-footer" modal="showModal"> <a href="javascript:void(0)" class="done" ng-click="done();">Done</a> </div>
                      </div>
                    </div>
                    </div>
                    </form>
                   </div>
                </div>
                 
               </div>
          </div>
         </div>
      </div>
        </div>
    </div>
  <div ui-view="search_results"></div>
  <div ui-view="flight_search_View"></div>
  <div ui-view></div>
        
    
</div>
<?php // strong_testimonials_view( 1 ); ?>
<?php $feedResults =$wpdb->get_results("select * from twc_feedback where 1 ORDER BY date_time DESC LIMIT 5 "); ?>
<div class="testimonial-container" ng-hide="('search' | isState) || ('hotel-information' | isState) || ('online-booking' | isState) || ('confirmation' | isState) || ('flight_search' | isState)">
  <p>Customer Reviews & Ratings</p>
  <div id="testimonial-slider" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
      $first = true;
      foreach($feedResults as $feedrow){
        $name = explode("@",$feedrow->email);
        $star = 1;
        if($feedrow->rating >= 0 && $feedrow->rating <= 2) {
          $star = 1;
        } else if($feedrow->rating >= 3 && $feedrow->rating <= 5) {
          $star = 2;
        } else if($feedrow->rating >= 6 && $feedrow->rating <= 7) {
          $star = 4;
        } else {
          $star = 5;
        }
    ?>
      <div class="item <?php if ( $first ) { echo 'active'; $first = false; } ?> testimonial-section">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2">
                    <div class="testimony-content">
                      <p class="testimony-person-name"><?php echo $name[0]; ?></p>
                      <p class="testimony-stars">
                        <?php for($starcount = 0; $starcount < $star; $starcount++){ ?>
                          <span class="glyphicon glyphicon-star"></span>
                        <?php } ?>
                      </p>
                      <p class="testimony-description"><?php echo $feedrow->message; ?></p>
                      <small class="testimony-date"><i><?php echo date('l M d, Y',strtotime($feedrow->date_time));?></i> </small>
                  </div>
                </div>
            </div>
      </div>
    <?php } ?>
    </div>
<!--     <div class="testimonial-buttons">
      <a class="testi-btn" href="#">Add Review</a>
      <a class="testi-btn" href="#">See All</a>
    </div> -->
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#testimonial-slider" data-slide="prev">
      <span class="testimonial-slider glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#testimonial-slider" data-slide="next">
      <span class="testimonial-slider glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- <div>
    <img style="width: 100%" src="http://dev.petsonbreak.com/wp-content/uploads/2017/08/Index-Banner-Partners.png" />
</div> -->

<script>
   var listCategories = document.querySelector('#categories');
    // window.onload = function() { 
    //     listCategories.childNodes[1].childNodes[1].click(); 
    // };
    function hideVendorList() {
        var listCategories = document.querySelector('#categories');
        listCategories.childNodes.forEach(function(item, index) {
            if (index > 12 && index %2) {
                item.classList.add('hidden');
            }
            if (index === listCategories.childNodes.length - 2) {
                item.classList.remove('hidden');
            }
        });
    }
    
    hideVendorList();
    var digMoreButton = document.querySelector('#dig-more');
    var listCounter = 0;
    digMoreButton.onclick = function() {
        if(listCounter === 0) {
        document.querySelectorAll('.selected_category').forEach(function(item) {
            item.classList.remove('hidden');
        })
        digMoreButton.innerHTML = 'HIDE <i class="fa fa-sort-desc" aria-hidden="true"></i>';
        listCounter = 1;
        } else if(listCounter === 1) {
            hideVendorList();
            digMoreButton.innerHTML = 'SHOW <i class="fa fa-sort-asc" aria-hidden="true"></i>';
            listCounter = 0;
        }
        
    }
    
    
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
                var store = window.localStorage;
    //alert(sid);
                store.setItem('idOfSelected', sid);
    window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sid+"&destName="+city;
                
    } 
  });

</script>


<script>
  $(document).ready(function() {
  var catLi = ($('.pet-groomsv-criteria-open #categories li.active').find('.opt').text());
  var id = $('.pet-groomsv-criteria-open #categories li.active').attr('data-value');
  $('#sel_category').val(id);
  $('.pet_g_crt').text(catLi);
});
 $('.pet-groomsv-criteria').click(function(){
    $(this).toggleClass('pet-groomsv-criteria-open');
   }) 
   
$('.pet-groomsv-criteria-open #categories li').click(function(){
   var catLi = ($(this).find('.opt').text());
    var id = $(this).attr('data-value');
     $('#sel_category').val(id);
//    alert(id);
   $('.pet_g_crt').text(catLi);
})
</script>
<style>
    .pet-groomsv-criteria-open #categories li {
        cursor: pointer;
    }
</style>

<?php get_footer(); ?>