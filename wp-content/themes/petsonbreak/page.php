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

$results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");

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
<div class="log_backGrond">
    
    <div class="container_width">
            <input type="hidden" value="" id="sel_category">
			<div class="pet-groomsv-sercahbox">
			    <div class="pet-groomsv-criteria-open">
<!--                                <span>
                                    <span class="pet_g_crt"><?php echo $serviceCategory;?></span>
                                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                </span>-->
                                <ul id="categories" class="nav nav-tabs">
                                   <?php foreach ($results as $val) { ?>
                                   <li class="selected_category" data-value="<?php echo $val->id;?>">
                                       <a class="opt" data-toggle="tab" href="#searchbox">
                                           <?php echo $val->title;?>
                                       </a>
                                   </li>           
                                   <?php } ?>
                                </ul>
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
                                          Search
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
</div>
 <div id="all_categories">
     <div class="offer-description">
         <h1 class="offer-heading">WHAT WE OFFER</h1>
         <p class="offer-content">Over <span class="pets-number">10,000+</span> Pets friendly places to stay, eat & play with your Pets</p>
     </div>
     <div class="container">
         <div id="servicesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

             <?php 
            $weekresults =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
            foreach(array_chunk($weekresults, 4, true) as $key=>$array){
                    // $link =site_url().'/search-vendor/?sid='.$weekrow->service_category;
               
            ?>
            <div class="item <?php if($key == 0) { echo 'active'; } else { echo '';  }?>">
            <?php foreach($array as $weekrow) {  $link =site_url().'/search-vendor/?sid='.$weekrow->service_category.'&destName='.$weekrow->destination; ?>
            
                <div class="col-md-3 col-xs-3">
                    <div class="cat_colm category-slides">
                        <div class="ser_services" rel="<?php echo $weekrow->id;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $weekrow->category_image;?>);background-size:cover;">
                            <div class="desc">
                                <h2><?php echo $weekrow->title;?></h2>
                                <p><?php echo $weekrow->destination;?></p>
                            </div>
                            <div class="cat_overlay">
                                <a href="javascript:void(0);" class="cat_det">
                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
         
            <?php } ?>
            </div>
             <!-- Left and right controls -->
            <a class="left carousel-control" href="#servicesCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#servicesCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
         </div>
     </div>
   
</div>
<div class="about-us-section">
    <h1 class="about-us-heading">ABOUT US</h1>
    <div class="about-us-description">
        <p>At PetsonBreak we mean what we say and are committed to providing superlative experiences that can rarely be found elsewhere. For us, PetsonBreak is more than just a travel company; it is the embodiment of everything that we are truly passionate about. PetsonBreak is owned and staffed by pet people for whom work related with pets and travel is not simply an interesting job, but an all-consuming passion. </p>
        <p>We believe that travel should not simply be a business, but a way of exploring and understanding the diverse cultures, people and traditions that inhabit in this world and what more you can ask if your furry friend can tag along in these adventurous trips.</p>
    </div>
</div>
<?php // strong_testimonials_view( 1 ); ?>.
<div class="testimonial-container">
  <p>Customer Reviews & Testimonials</p>  
  <div id="testimonial-slider" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active testimonial-section">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="http://dev.petsonbreak.com/wp-content/uploads/2017/07/desk-about-portrait-diego@2x-6e11e0946c.jpg">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="testimony-content">
                      <p class="testimony-person-name"> Peter Novac</p>
                      <p class="testimony-stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                      </p>
                      <p class="testimony-description"> Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. </p>
                      <small class="testimony-date"><i>Sunday 26th July, 2017</i> </small>
                  </div>
                </div>
            </div>
      </div>
      <div class="item testimonial-section">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="http://dev.petsonbreak.com/wp-content/uploads/2017/07/desk-about-portrait-diego@2x-6e11e0946c.jpg">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="testimony-content">
                      <p class="testimony-person-name"> Peter Novac</p>
                      <p class="testimony-stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                      </p>
                      <p class="testimony-description"> Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. </p>
                      <small class="testimony-date"><i>Sunday 26th July, 2017</i> </small>
                  </div>
                </div>
            </div>
      </div>
      <div class="item testimonial-section">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="http://dev.petsonbreak.com/wp-content/uploads/2017/07/desk-about-portrait-diego@2x-6e11e0946c.jpg">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="testimony-content">
                      <p class="testimony-person-name"> Peter Novac</p>
                      <p class="testimony-stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                      </p>
                      <p class="testimony-description"> Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. </p>
                      <small class="testimony-date"><i>Sunday 26th July, 2017</i> </small>
                  </div>
                </div>
            </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#testimonial-slider" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#testimonial-slider" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container events-news-container">
    <div class="row">
        <div class="event-column col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="events-container">
                <p class="events-section-heading">Events</p>
            </div>
            <div style="display: flex;justify-content: center;align-items: center;margin-top: 2rem;">
                <h2>No Events</h2>
            </div>
        </div>
        <div class="news-column col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="news-container">
                <p class="news-section-heading">News & Updates</p>
                
                <div class="whole-news">
                    <?php $newsResults =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
                    foreach($newsResults as $obj){?>
                    <div class="each-news" id="hash_<?php echo $obj->id;?>">
                        <span class="glyphicon glyphicon-play"></span>
                        <span><i><?php echo stripcslashes($obj->title);?></i></span>
                    </div>    
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <img style="width: 100%" src="http://dev.petsonbreak.com/wp-content/uploads/2017/08/Index-Banner-Partners.png" />
</div>

<script>
    window.onload = function() { 
        listCategories.childNodes[1].childNodes[1].click(); 
    }; 
    
        var listCategories = document.querySelector('#categories');
        listCategories.childNodes.forEach(function(item, index) {
            if (index > 10 && index %2) {
                item.classList.add('hidden');
            }
        });
    
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
 $('.pet-groomsv-criteria').click(function(){
	  $(this).toggleClass('pet-groomsv-criteria-open');
	 })	
	 
$('.pet-groomsv-criteria-open #categories li').click(function(){
	 var catLi = ($(this).find('.opt').text());
	  var id = $(this).attr('data-value');
	   $('#sel_category').val(id);
//	  alert(id);
	 $('.pet_g_crt').text(catLi);
})
</script>
<style>
    .pet-groomsv-criteria-open #categories li {
        cursor: pointer;
    }
</style>

<?php get_footer(); ?>

