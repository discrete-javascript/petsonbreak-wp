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
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                                   <li class="selected_category" value="<?php echo $val->id;?>">
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
                                             class="form-control" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="WHERE WOULD YOU LIKE TO GO ?">
                                        <?php }  else {?>
                                        <input type="text" name="searchName" id="searchName" class="form-control" value="" placeholder="WHERE WOULD YOU LIKE TO GO ?">
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
    <div class="row">
    <?php 
    $weekresults =$wpdb->get_results("select * from twc_petfriendly_destination where 1 ".$extQuery." ".$extrCond."");
    foreach($weekresults as $weekrow){
            // $link =site_url().'/search-vendor/?sid='.$weekrow->service_category;
        $link =site_url().'/search-vendor/?sid='.$weekrow->service_category.'&destName='.$weekrow->destination;
    ?>
        <div class="col-md-6 col-sm-6">
            <div class="cat_colm">
                <div class="" rel="<?php echo $weekrow->service_category;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $weekrow->img_path;?>);background-size:cover;">
                    <div class="desc">
                        <h2><?php echo $weekrow->title;?></h2>
                        <p><?php echo $weekrow->destination;?></p>
                    </div>
                    <div class="cat_overlay">
                        <a href="<?php echo $link;?>" class="cat_det">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php strong_testimonials_view( 1 ); ?>.
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

