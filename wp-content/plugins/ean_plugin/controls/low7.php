<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box7' );
function ep_admin_init_add_low_box7(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc7', __( 'For Healers only', EP_TD ), 'ep_admin_init_add_low_box_twc7', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc7');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager7');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager7');
}

function ep_admin_init_add_low_box_twc7(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select is_healers_only  from ".$wpdb->prefix."posts where ID='".$post_ID."'");
		foreach ( $Results as $Result ){
			$is_healers_only = $Result->is_healers_only;
		}
		if($is_healers_only=="Yes") { $checked = "checked='checked'"; } else { $checked = ""; } 
        echo  "<input type='checkbox' value='Yes' name='is_healers_only' id='is_healers_only' ".$checked."  />&nbsp;&nbsp;Please check if this page is for healers only. Which means only healers will be able to access this page..";
}

function update_add_low_box_twc7(){
		global $post_ID;
		global $wpdb;
		$wpdb->query("UPDATE ".$wpdb->prefix."posts SET is_healers_only='".$_POST['is_healers_only']."' where ID='".$post_ID."'");
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
function ep_admin_js_cat_sub_cat_mangager7() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	/*jQuery( '#is_level_of_aura' ).click(function(){
		if(jQuery("#is_level_of_aura").is(":checked")==true){
			jQuery( '.browse_logo_of_aura' ).fadeIn();
		}else{
			jQuery( '.browse_logo_of_aura' ).fadeOut();
		}
	 });
	
	
	if(jQuery("#is_level_of_aura").is(":checked")==true){
		jQuery( '.browse_logo_of_aura' ).fadeIn();
	}else{
		jQuery( '.browse_logo_of_aura' ).fadeOut();
	}*/
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager7() {
	echo <<<END
<style type="text/css" media="screen">
.sub_navigations{width:100%}
.twc_type{ width:100%; padding:5px;}
.imgtable tr td{padding:0px; margin:0px;}
.chk{ display:block; background:#edecec; border:1px #d5d5d5 solid; padding:5px; }
.browse_logo_of_aura {display:none;}
</style>
END;
}

?>