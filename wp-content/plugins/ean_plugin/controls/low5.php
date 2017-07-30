<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box5' );

function ep_admin_init_add_low_box5(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc5', __( 'Is Level of Aura', EP_TD ), 'ep_admin_init_add_low_box_twc5', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc5');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager5');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager5');
}

function ep_admin_init_add_low_box_twc5(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select is_level_of_aura, level_of_aura_logo  from ".$wpdb->prefix."posts where ID='".$post_ID."'");
		foreach ( $Results as $Result ){
			$is_level_of_aura = $Result->is_level_of_aura;
			$level_of_aura_logo = $Result->level_of_aura_logo;
		}
		if($is_level_of_aura=="Yes") { $checked = "checked='checked'"; } else { $checked = ""; } 
        echo  "<input type='checkbox' value='Yes' name='is_level_of_aura' id='is_level_of_aura' ".$checked."  />&nbsp;&nbsp;Please check it on if its a level of aura and upload the relevant logo.<span class='browse_logo_of_aura'><br><br>Browse Logo : <input type='file' name='level_of_aura_logo' id='level_of_aura_logo'></span>";
}

function update_add_low_box_twc5(){
		global $post_ID;
		global $wpdb;
		//if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . '../../../../wp-admin/includes/file.php' );
		//$uploadedfile = $_FILES['level_of_aura_logo'];
        //$upload_overrides = array( 'test_form' => false );
		//$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		//$cat_path = $_FILES["cat_image"]["name"];
	    //move_uploaded_file($_FILES["cat_image"]["tmp_name"], "../../../uploads/thewebconz/" . $cat_path);
		
		$level_of_aura_logo_path = $_POST["level_of_aura_logo"];
		move_uploaded_file($_FILES["level_of_aura_logo"]["tmp_name"], "" . $level_of_aura_logo_path);
		
		$wpdb->query("UPDATE ".$wpdb->prefix."posts SET is_level_of_aura='".$_POST['is_level_of_aura']."', level_of_aura_logo='".$level_of_aura_logo_path."'  where ID='".$post_ID."'");
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
function ep_admin_js_cat_sub_cat_mangager5() {
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
function ep_admin_css_cat_sub_cat_mangager5() {
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