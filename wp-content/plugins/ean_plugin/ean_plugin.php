<?php
/*
Plugin Name: Expedia Support Plugin
Plugin URI: http://www.wordpress-travel-affiliate-themes.com
Description: This is the plugin support built for Expedia Theme developed by The WebConz Technologies Pvt. Ltd. We are here to help you represent yourself as a BRAND like Expedia.com, Booking.com etc...
Author: Prashant Thakur
Version: 6.6
Author URI: http://www.wordpress-travel-affiliate-themes.com
*/


global $wpdb;
global $Plugin_Path;
global $Plugin_URL;
$Plugin_Path = dirname(__FILE__);
$Plugin_URL = WP_PLUGIN_URL."/ean_plugin";
//URL Rewritting ----------------------------------------------------------------------------------
add_action('init','generate_author_rewrite_rules_ean_plugin');
function generate_author_rewrite_rules_ean_plugin(){  
global $wp_rewrite;
add_rewrite_rule('^news-events/(.*)/?','index.php?pagename=news-events&news_id=$matches[1]','top');
//add_rewrite_rule('^archive/(.*)/?','index.php?pagename=$matches[1]&archive=$matches[2]','top'); 
//print_r($wp_rewrite); 
$wp_rewrite->flush_rules(); 
}  
function prefix_register_query_var_event_ean_plugin( $vars ) {
$vars[] = 'news_id';
return $vars;
}
add_filter( 'query_vars', 'prefix_register_query_var_event_ean_plugin' );
//---Short Code------------------------------------------------------------------------------------
add_shortcode("ean_plugin","ean_plugin");
function ean_plugin($atts){ 
$schoolname = $atts["schoolname"];
global $Plugin_URL;
global $wpdb;
include($Plugin_Path."search_results_twc.php");
}
//---------------------------------------------------------------------------------------
//Add Menus on left
add_action('admin_menu','pro_add_menu_twc_ean_plugin');
function pro_add_menu_twc_ean_plugin() { 
global $Plugin_Path;
global $Plugin_URL;
include($Plugin_Path."/includes/left-admin-menu.php");
}
add_shortcode("ean_plugin","ean_plugin_root");
function ean_plugin_root($atts){ 
global $Plugin_Path;
global $Plugin_URL;
include($Plugin_Path."/includes/index.php");
}
register_activation_hook(__FILE__,'pro_install_ean_plugin');
register_deactivation_hook(__FILE__ , 'pro_uninstall_ean_plugin' );
function pro_uninstall_ean_plugin(){
global $wpdb;
global $Plugin_Path;
//include($Plugin_Path."/includes/uninstall.php");
}
function pro_install_ean_plugin(){	
global $Plugin_Path;
global $wpdb;
include($Plugin_Path."/includes/install.php");
}
add_shortcode("gallery_plugin","gallery_plugin");
function gallery_plugin($atts){ 
	 $resultsvenue = $atts["category"];
	 echo $resultsvenue;
	global $Plugin_Path;
	global $Plugin_URL;
	include($Plugin_Path."/gallery_plugin.php");
}

//include($Plugin_Path."/controls/low-woo.php");
/*include($Plugin_Path."/controls/low6.php");
include($Plugin_Path."/controls/low1.php");

include($Plugin_Path."/controls/low5.php");
include($Plugin_Path."/controls/low7.php");*/

?>