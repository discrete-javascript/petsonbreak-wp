<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box6' );

function ep_admin_init_add_low_box6(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc6', __( 'Display Status', EP_TD ), 'ep_admin_init_add_low_box_twc6', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc6');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager6');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager6');
}

function ep_admin_init_add_low_box_twc6(){
	    global $post_ID;
		global $wpdb;
		$Results = $wpdb->get_results("select display_in_home_page from ".$wpdb->prefix."posts where ID='".$post_ID."'");
		foreach ( $Results as $Result ){
			$display_in_home_page = $Result->display_in_home_page;
		}
		if($display_in_home_page=="Yes") { $checked = "checked='checked'"; } else { $checked = ""; } 
echo  "<input type='checkbox' value='Yes' name='display_in_home_page' id='display_in_home_page' ".$checked."  />&nbsp;&nbsp;Please check it on if its display on Menu.";
	
}

function update_add_low_box_twc6(){
		global $post_ID;
		global $wpdb;
		//echo "UPDATE ".$wpdb->prefix."posts SET meta_title_twc='".$_POST['meta_title_twc']."', meta_keyword_twc='".$_POST['meta_keyword_twc']."', meta_description_twc='".$_POST['meta_description_twc']."'  where ID='".$post_ID."'";
		//die();
		$wpdb->query("UPDATE ".$wpdb->prefix."posts SET display_in_home_page='".$_POST['display_in_home_page']."' where ID='".$post_ID."'");
}
/*add_action('admin_print_scripts', 'do_jslibs' );
add_action('admin_print_styles', 'do_css' );

function do_css()
{
	wp_enqueue_style('thickbox');
	}
	
function do_jslibs()
	{
	wp_enqueue_script('editor');
	wp_enqueue_script('thickbox');
	add_action( 'admin_head', 'wp_tiny_mce' );
}
*/

// HOOK IT UP TO WORDPRESS
function ep_admin_js_cat_sub_cat_mangager6() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager6() {
	echo <<<END
<style type="text/css" media="screen">
.sub_navigations{width:100%}
.twc_type{ width:100%; padding:5px;}
</style>
END;
}

?>