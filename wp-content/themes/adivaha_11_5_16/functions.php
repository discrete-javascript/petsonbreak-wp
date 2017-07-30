<?php 
if(session_id() == '')
 session_start(); 
global $mk_options;

show_admin_bar(false);
include('includes/shortcode_list.php');
include('includes/custom_createUsers.php');


add_theme_support( 'post-thumbnails' );
add_image_size( 'single-post-thumbnail', 590, 180 );
add_theme_support( 'title-tag' );

function wpex_fix_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_fix_shortcodes');

//=== Woocommerce
function getProductAverageRating(){
	global $wpdb;
    global $post;
    $count = $wpdb->get_var("
    SELECT COUNT(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = 'rating'
    AND comment_post_ID = $post->ID
    AND comment_approved = '1'
    AND meta_value > 0");
	
   $rating = $wpdb->get_var("
    SELECT SUM(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = 'rating'
    AND comment_post_ID = $post->ID
    AND comment_approved = '1'");

	if ( $count > 0 ) {
		 $average = number_format($rating / $count, 0);
	}
	return  $average ;
}


//=== Manage Framework
$theme = new Theme();
$theme->init(array(
    "theme_name" => "adivaha",
    "theme_slug" => "JP"
));


class Theme
{
    function init($options)
    {
        $this->constants($options);
        add_action('init', array(
            &$this,
            'language'
        ));
        $this->functions();
        $this->plugins();
        $this->post_types();
        add_action('admin_menu', array(
            &$this,
            'admin_menus'
        ));
        add_action('init', array(
            &$this,
            'add_metaboxes'
        ));
        $this->theme_activated();
        
        add_action('after_setup_theme', array(
            &$this,
            'supports'
        ));
        add_action('widgets_init', array(
            &$this,
            'widgets'
        ));
    }
    
    function constants($options)
    {
        define("THEME_DIR", get_template_directory());
        define("THEME_DIR_URI", get_template_directory_uri());
        define("THEME_NAME", $options["theme_name"]);
        if (defined("ICL_LANGUAGE_CODE")) {
            $lang = "_" . ICL_LANGUAGE_CODE;
        } else {
            $lang = "";
        }
        define("THEME_OPTIONS", $options["theme_name"] . '_options' . $lang);
        define("THEME_SLUG", $options["theme_slug"]);
		define("THEME_INCLUDES", THEME_DIR_URI . "/includes");
        define("THEME_STYLES", THEME_DIR_URI . "/stylesheet/css");
        define("THEME_IMAGES", THEME_DIR_URI . "/images");
        define("THEME_JS", THEME_DIR_URI . "/js");
        define('FONTFACE_DIR', THEME_DIR . '/fontface');
        define('FONTFACE_URI', THEME_DIR_URI . '/fontface');
        define("THEME_FRAMEWORK", THEME_DIR . "/framework");
        define("THEME_PLUGINS", THEME_FRAMEWORK . "/plugins");
        define("THEME_ACTIONS", THEME_FRAMEWORK . "/actions");
        define("THEME_PLUGINS_URI", THEME_DIR_URI . "/framework/plugins");
        define("THEME_SHORTCODES", THEME_FRAMEWORK . "/shortcodes");
        define("THEME_WIDGETS", THEME_FRAMEWORK . "/widgets");
        define("THEME_SLIDERS", THEME_FRAMEWORK . "/sliders");
        define("THEME_HELPERS", THEME_FRAMEWORK . "/helpers");
        define("THEME_FUNCTIONS", THEME_FRAMEWORK . "/functions");
        define("THEME_CLASSES", THEME_FRAMEWORK . "/classes");
        define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
        define('THEME_METABOXES', THEME_ADMIN . '/metaboxes');
        define('THEME_ADMIN_POST_TYPES', THEME_ADMIN . '/post-types');
        define('THEME_GENERATORS', THEME_ADMIN . '/generators');
        define('THEME_ADMIN_URI', THEME_DIR_URI . '/framework/admin');
        define('THEME_ADMIN_ASSETS_URI', THEME_DIR_URI . '/framework/admin/assets');
    }
    function widgets()
    {
        
    }
    function plugins()
    {
        //require_once locate_template("wpml-fix/mk-wpml.php");
    }
    function supports()
    {
        add_theme_support('menus');
        add_theme_support('automatic-feed-links');
        add_theme_support('editor-style');
        register_nav_menus(array(
            'primary-menu' => 'Primary',
            'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu',
			'petsonbreak_details' => 'Petsonbreak Details',
			'footer_bottom' => 'Footer Bottom',
			'services_offered' => 'Footer Services Offered',
           
        ));
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'twc-full-width', 1140, 580, true );
    }
    function post_types()
    {
        
    }
    function functions()
    {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        require_once(THEME_FUNCTIONS . "/general-functions.php");
		require_once(THEME_FUNCTIONS . "/breadcrumb.php");
		
		
		
        if(!is_admin()) {
            require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
        }
        require_once(THEME_FUNCTIONS . "/vc-integration.php");
        require_once(THEME_FUNCTIONS . "/ajax-search.php");
        require_once(THEME_CLASSES . "/wp-nav-custom-walker.php");
        require_once(THEME_FUNCTIONS . "/enqueue-front-scripts.php");
        require_once(THEME_CLASSES . "/love-this.php");
        require_once(THEME_GENERATORS . '/sidebar-generator.php');
         require_once locate_template('framework/actions/header.php');
        require_once locate_template('framework/actions/general.php');
        require_once locate_template('framework/actions/post.php');
        require_once locate_template('framework/actions/slideshow.php');
        
        require_once(THEME_FUNCTIONS . "/dynamic-styles.php");
        require_once(THEME_FUNCTIONS . "/mk-woocommerce.php");
        
        
        if (is_admin()) {
            include_once(THEME_ADMIN . '/general/general-functions.php');
            include_once(THEME_ADMIN . '/general/mega-menu.php');
            include_once(THEME_ADMIN . '/general/icon-library.php');
            include_once(THEME_ADMIN . '/generators/option-generator.php');
            include_once(THEME_ADMIN . '/general/backend-enqueue-scripts.php');
            include_once(THEME_ADMIN . '/admin-panel/masterkey-ajax-calls.php');
            

        }
        
    }
    
    function language()
    {
        $locale = get_locale();
        load_theme_textdomain('mk_framework', get_stylesheet_directory() . '/languages');
        $locale_file = get_stylesheet_directory() . "/languages/$locale.php";
        if (is_readable($locale_file)) {
            require_once($locale_file);
        }
    }
    
    function admin_menus()
    {
        add_menu_page(__('Theme Options', 'mk_framework'), __('Theme Options', 'mk_framework'), 'edit_theme_options', 'masterkey', array(
            &$this,
            '_load_option_page'
        ), 'dashicons-admin-network');

        add_submenu_page( 'themes.php', 'Install Templates', 'Install Templates', 'manage_options', 'demo-importer', array( &$this,'_load_demo_content_page') );
    }
    
    
    
    function add_metaboxes()
    {
        
    }
    
    function theme_activated()
    {
        if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated'] == 'true') {
            update_option('woocommerce_enable_lightbox', "no");
            wp_redirect(admin_url('admin.php?page=masterkey'));
        }
    }
    
    function _load_demo_content_page()
    {
        include_once(THEME_DIR . '/demo-importer/engine/index.php');
        
                
    }
    
    function _load_option_page()
    {
        
        $page = include(THEME_ADMIN . '/admin-panel/masterkey.php');
        new mkOptionGenerator($page['name'], $page['options']);
    }
    
}

//===== Add Landing Page

add_action( 'admin_init', 'ep_admin_init_add_landing_page' );
function ep_admin_init_add_landing_page(){
	global $wp_version;
	add_meta_box('admin_meta_box_title', __( 'City/Destination Landing Page Information', EP_TD ), 'admin_init_add_landingpagebox', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_landingpagebox');
	add_action('admin_footer', 'ep_admin_js_data'); // hook to add JS into admin footer
}
function admin_init_add_landingpagebox(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select * from landing_pages where page_id='".$post_ID."'");				$Result =$Results[0];
		echo '<input type="hidden" name="site_template_directory" id="site_template_directory" value="'.get_template_directory_uri().'">';
	echo '<div><div style="margin-top:20px;"> Select Destination<br /><input type="text" name="destination_name" id="destination_name" value="'.$Result->destination_name.'" class="load_city ui-autocomplete-input" autocomplete="off" style="width:100%"><input type="hidden" name="destination_id" id="destination_id" value="'.$Result->destination_id.'">
		
		<input type="hidden" name="latitude" id="latitude" value="'.$Result->latitude.'">
		<input type="hidden" name="longitude" id="longitude" value="'.$Result->longitude.'">
		
		</div>
        <div style="margin-top:20px;"> Add title<br />	
		 <input type="text" name="ptitle" id="ptitle" value="'.$Result->title.'" style="width:100%">
		</div>
		
		<div style="margin-top:20px;">Flight from Destination<br />	
		 <input type="text" name="flight_from_destination" id="flight_from_destination" value="'.$Result->flight_from_destination.'" style="width:100%">
		</div>
		
		<div style="margin-top:20px;">Flight from IATA<br />	
		 <input type="text" name="flight_from_iata" id="flight_from_iata" value="'.$Result->flight_from_iata.'" style="width:100%">
		</div>
		
        <div style="margin-top:20px;">Description<br />
		<textarea name="description" id="description" style="width:100%; height:200px">'.$Result->description.'</textarea></div>		
		<div style="margin-top:20px;"> Short Description<br />
		<textarea name="shortDescription" id="shortDescription" style="width:100%; height:200px">'.$Result->shortDescription.'</textarea></div></div>';
}

function update_add_low_landingpagebox($post_id){
 global $wpdb;
 $destination_name =$_POST['destination_name'];	
 $destination_id =$_POST['destination_id'];
 $ptitle =$_POST['ptitle'];
 
 $flight_from_destination =$_POST['flight_from_destination'];
 $flight_from_iata =$_POST['flight_from_iata'];
 
 $description =$_POST['description'];
 $shortDescription =$_POST['shortDescription'];
 $latitude =$_POST['latitude'];
 $longitude =$_POST['longitude'];
 
 $results =$wpdb->get_results("select * from landing_pages where page_id='".$post_id."'");
 if(count($results)>0){
	$wpdb->query("update landing_pages SET destination_name='".$_POST['destination_name']."',destination_id='".$_POST['destination_id']."',flight_from_destination='".$flight_from_destination."',flight_from_iata='".$flight_from_iata."',latitude='".$_POST['latitude']."',longitude='".$_POST['longitude']."', title='".$ptitle."',description='".$description."',shortDescription='".$shortDescription."' where page_id='".$post_id."'");
 }else{
	$wpdb->query("insert into landing_pages SET page_id='".$post_id."',destination_name='".$_POST['destination_name']."',destination_id='".$_POST['destination_id']."',flight_from_destination='".$flight_from_destination."',flight_from_iata='".$flight_from_iata."',latitude='".$_POST['latitude']."',longitude='".$_POST['longitude']."',title='".$ptitle."',description='".$description."',shortDescription='".$shortDescription."'"); 
 }

}


// HOOK IT UP TO WORDPRESS
function ep_admin_js_data() {
	echo <<<END
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type='text/javascript'>
//<![CDATA[

jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
	_renderMenu: function( ul, items ) {
		var that = this,
		currentCategory = "";
		var my_Category_ID = 1;
		jQuery.each( items, function( index, item ) {
		if ( item.category != currentCategory ) {
			//ul.append( "<li class='ui-autocomplete-category jquery_UI_"+item.class_Name+"'>" + item.category + "</li>" );
			my_Category_ID++;
			currentCategory = item.category;
		}
			that._renderItemData( ul, item );
		});
	}
});

jQuery(function() {
	jQuery("#destination_name" ).catcomplete({
		source:function(request, response) {
			var Search_Cri = jQuery("#destination_name").val();
			jQuery.ajax({
				url: jQuery('#site_template_directory').val()+"/custom-ajax.php",
				dataType: "json",
				data: {
					term: Search_Cri,
					action: "Location_Fetch",
					eanvsexpedia_destination_lookup: jQuery("#eanvsexpedia_destination_lookup").val()
				},
				success: function(data) { 
					response(data);
				}
			});
		},
		minLength:2,
		select: function(event, ui) { 
			document.getElementById("destination_name").value = ui.item.label;
			jQuery("#latitude").val(ui.item.lat);
			jQuery("#longitude").val(ui.item.long);
			jQuery("#destination_id").val( ui.item.regionid);
		}
	});
});
	
//]]>
</script>
END;
}


/* this code by mk 23-12-2016 Theme Colors*/
function hex2rgb( $colour ) {
       if ( $colour[0] == '#' ) {
               $colour = substr( $colour, 1 );
       }
       if ( strlen( $colour ) == 6 ) {
               list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
       } elseif ( strlen( $colour ) == 3 ) {
               list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
       } else {
               return false;
       }
       $r = hexdec( $r );
       $g = hexdec( $g );
       $b = hexdec( $b );
       return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

//Activate Deactivate

wp_register_theme_activation_hook('adivaha', 'wpse_25885_theme_activate');
wp_register_theme_deactivation_hook('adivaha', 'wpse_25885_theme_deactivate');
function wp_register_theme_activation_hook($code, $function) {  
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)) { 
        call_user_func($function);
        update_option($optionKey , 1);
    }
}
function wp_register_theme_deactivation_hook($code, $function)
{
    // store function in code specific global
    $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;
    // create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
    $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

    // add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
    // Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
    // Your theme can perceive this hook as a deactivation hook.)
    add_action("switch_theme", $fn);
}

function wpse_25885_theme_activate()
{
   global $wpdb; 
   include('includes/create_db_table.php'); // create db table
  
    $URL = "http://www.wordpress-travel-affiliate-themes.com/custom_ajax.php";
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"action=Adivaha_new_theme_activated&url=".site_url());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
	$result = curl_exec($ch);
	curl_close($ch);

	$str = "<div style='color:#666; font-family:Arial, Helvetica, sans-serif; font-size:13px;'>".site_url()."</div>";
	$headers = "From: Theme Activated <support@thewebconz.com>\r\nReply-To:support@thewebconz.com\r\nContent-type: text/html; charset=us scii";
	@mail("support@thewebconz.com","Theme Activated", $str, $headers);
}

function wpse_25885_theme_deactivate(){
   
	
}

// Expedia language list
function ean_wpml_languages($lang,$name=false){
$ean_langArr =array('en'=>array(0=>'en_US',1=>'English'),
                    'ar'=>array(0=>'ar_SA',1=>'Arabic'),
					'cs'=>array(0=>'cs_CZ',1=>'Czech'),
					'da'=>array(0=>'da_DK',1=>'Danish'),
					'de'=>array(0=>'de_DE',1=>'German'),
					'el'=>array(0=>'el_GR',1=>'Greek'),
					'es'=>array(0=>'es_ES',1=>'Spanish (Spain)'),
					'es'=>array(0=>'es_MX',1=>'Spanish (Mexico)'),
					'et'=>array(0=>'et_EE',1=>'Estonian'),
					'fr'=>array(0=>'fi_FI',1=>'Finnish'),
					'fr'=>array(0=>'fr_FR',1=>'French'),
					'fr'=>array(0=>'fr_CA',1=>'French (Canada)'),
					'hu'=>array(0=>'hu_HU',1=>'Hungarian'),
					'hr'=>array(0=>'hr_HR',1=>'Croatian'),
					'in'=>array(0=>'in_ID',1=>'Indonesian'),
					'is'=>array(0=>'is_IS',1=>'Icelandic'),
					'it'=>array(0=>'it_IT',1=>'Italian'),
					'ja'=>array(0=>'ja_JP',1=>'Japanese'),
					'ko'=>array(0=>'ko_KR',1=>'Korean'),
					'ms'=>array(0=>'ms_MY',1=>'Malay'),
					'lv'=>array(0=>'lv_LV',1=>'Latvian'),
					'lt'=>array(0=>'lt_LT',1=>'Lithuanian'),
					'nl'=>array(0=>'nl_NL',1=>'Dutch'),
					'no'=>array(0=>'no_NO',1=>'Norwegian'),
					'pl'=>array(0=>'pl_PL',1=>'Polish'),
					'pt-br'=>array(0=>'pt_BR',1=>'Portuguese (Brazil)'),
					'pt-pt'=>array(0=>'pt_PT',1=>'Portuguese (Portugal)'),
					'ru'=>array(0=>'ru_RU',1=>'Russian'),
					'sv'=>array(0=>'sv_SE',1=>'Swedish'),
					'sk'=>array(0=>'sk_SK',1=>'Slovak'),
					'th'=>array(0=>'th_TH',1=>'Thai'),
					'tr'=>array(0=>'tr_TR',1=>'Turkish'),
					'uk'=>array(0=>'uk_UA',1=>'Ukranian'),
					'vi'=>array(0=>'vi_VN',1=>'Vietnamese'),
					'zh-hant'=>array(0=>'zh_TW',1=>'Traditional Chinese'),
					'zh-hans'=>array(0=>'zh_CN',1=>'Simplified Chinese')
					);	
					
    if($name=='name'){					
     $lang_name =$ean_langArr[$lang][1];	
     return $lang_name; 
    }else{
	 $ean_lang =$ean_langArr[$lang][0];	
     return $ean_lang; 	
	}	
}

// Add New role for user
add_role('Vendor', __('Vendor' ),array('read' => true,
									  'edit_posts' => true,
									  'edit_pages' => true, 
										'edit_others_posts' => true,
										'create_posts' => true, 
										'manage_categories' => true,
										'publish_posts' => true,
										)

);

function getFieldByID($field,$tbl,$id){
	global $wpdb;
	$results =$wpdb->get_results("select $field from $tbl where id='".$id."'");
	$result =$results[0];
	return $result->$field;
}

function getPopularCategories(){
  global $wpdb;
  $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 and is_popular='Yes' ORDER BY rand() limit 0,4");
  $html='<h1 class="text-what">Popular Categories</h1>
		<div class="boxs-41">
			<ul>';
		foreach($results as $objs){	
		 $link =site_url().'/search-vendor/?sid='.$objs->id.'&destName='.$_REQUEST['destName'];
		 $html.='<li class="ser_services">
					<div class="boxImg1" rel="'.$objs->id.'"><a href="javascript:void(0)">
						<img src="'.plugins_url().'/ean_plugin/images/Category/'.$objs->category_image.'" alt="" >
					</div>
					<div class="boxImg1-text">
						<!--<h1>'.stripslashes($objs->title).'</h1>-->
						<p>'.stripslashes($objs->description).'</a></p>
					</a></div>
				</li>';
		  } 
		 $html.='</ul>
		</div>';
   return $html;		
}

function getQuickLinks(){
  global $wpdb;
  $weekendresults =$wpdb->get_results("select * from twc_petfriendly_destination where service_cagegory='N148948330558c7b6295b388' and published='Yes' and status_deleted=0"); 
  
  $restaurantresults =$wpdb->get_results("select * from twc_petfriendly_destination where service_cagegory='V148948235058c7b26e54885' and published='Yes' and status_deleted=0"); 
  
  $cabresults =$wpdb->get_results("select * from twc_petfriendly_destination where service_cagegory='G148948225958c7b21322ce8' and published='Yes' and status_deleted=0"); 
  
   $html='<div class="pet_house1 quick-links-section">
				<h2>Quick Links</h2>
			  <div class="quick-links-section-div">
			   
				 <div class="quick-links-section-body">
					<ul>
					  <li><span><i class="fa-left fa fa-cutlery" aria-hidden="true"></i>Weekend Destinations <i class="fa-right fa fa-angle-right fa-right" aria-hidden="true"></i></span>
						  <ul class="quick-sub-menu">';
						  foreach($weekendresults as $weekendresult){
	                         $link =site_url().'/search-vendor/?sid='.$weekendresult->service_cagegory.'&destName='.$weekendresult->destination;
						     $html.='<a href="'.$link.'"><li>'.stripslashes($weekendresult->destination).'</li></a>';
							} 
				    $html.='</ul>
					   </li>
					  <li><span><i class="fa-left fa fa-plane" aria-hidden="true"></i>Pet Friendly Restaurants <i class="fa fa-angle-right fa-right" aria-hidden="true"></i></span>
						     <ul class="quick-sub-menu">';
							 
							 foreach($restaurantresults as $restaurantresult){
						     $link =site_url().'/search-vendor/?sid='.$restaurantresult->service_cagegory.'&destName='.$restaurantresult->destination;
							 
						    $html.='<a href="'.$link.'"> <li>'.stripslashes($restaurantresult->destination).'</li></a>';
							}
						  $html.='</ul>
						    
					  </li>
					  <li><span><i class="fa-left fa fa-taxi" aria-hidden="true"></i>Cab/Taxi Service <i class="fa fa-angle-right fa-right" aria-hidden="true" ></i></span>
						   <ul class="quick-sub-menu">';
						   foreach($cabresults as $cabresult){
							$link =site_url().'/search-vendor/?sid='.$cabresult->service_cagegory.'&destName='.$cabresult->destination;	 
						     $html.='<a href="'.$link.'"><li>'.stripslashes($cabresult->destination).'</li></a>';
							 }
					$html.='</ul>  
					  </li>
					   <li><span><i class="fa-left fa fa-paw" aria-hidden="true"></i><a href="'.site_url().'/all-categories">Pet Services <a></span>						 
					  </li>
					  <li><span><i class="fa-left fa fa-calendar" aria-hidden="true"></i>Events</span></li>
					  <li><span><i class="fa-left fa fa-tags" aria-hidden="true"></i>Offers and Discounts</span></li>
					</ul>
				 </div>
			  </div>
			</div>';
return $html;			
}
?>