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
                                <ul id="categories" class="form-control">
                                   <?php foreach($results as $val) { ?>
                                   <li class="selected_category" value="<?php echo $val->id;?>">
                                       <span class="opt">
                                           <?php echo $val->title;?>
                                       </span>
                                   </li>           
                                   <?php } ?>
                                </ul>
                            </div>
			<div class="input-group">
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
			<span class="err_searchName"></span>
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
<div> 
<?php strong_testimonials_view( 1 ); ?>.
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
	 
$('.pet-groomsv-criteria-open #categories li').click(function(){
	 var catLi = ($(this).find('.opt').text());
	  var id = $(this).attr('value');
	   $('#sel_category').val(id);
	  //alert(id);
	 $('.pet_g_crt').text(catLi);
})
</script>
<style>
    .pet-groomsv-criteria-open #categories li {
        cursor: pointer;
    }
</style>
<?php get_footer(); ?>

