<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box' );

function ep_admin_init_add_low_box(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc1', __( 'Enter The Meta Informations', EP_TD ), 'ep_admin_init_add_low_box_twc1', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc1');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager');
}

function ep_admin_init_add_low_box_twc1(){
	    global $post_ID;
		global $wpdb;
		$Results = $wpdb->get_results("select meta_title, meta_key, meta_description from twc_meta where page_id='".$post_ID."'");
		foreach ( $Results as $Result ){
			$meta_title_twc = $Result->meta_title_twc;
			$meta_keyword_twc = $Result->meta_keyword_twc;
			$meta_description_twc = $Result->meta_description_twc;
		}
        echo  "Meta Title&nbsp;&nbsp;&nbsp;<br /><input class='twc_type' type='text' name='meta_title_twc' id='meta_title_twc' value='".$meta_title_twc."' ><br />";
		echo  "Meta Keywords&nbsp;&nbsp;&nbsp;<br /><input class='twc_type' type='text' name='meta_keyword_twc' id='meta_keyword_twc' value='".$meta_title_twc."' ><br />";
		echo  "Meta Description&nbsp;&nbsp;&nbsp;<br /><textarea class='twc_type' name='meta_description_twc' id='meta_description_twc' rows='5' cols='30'>".$meta_description_twc."</textarea>";
	    //the_editor($meta_description_twc,"meta_description_twc");
	
}

function update_add_low_box_twc1(){
		global $post_ID;
		global $wpdb;
		$page_title = get_the_title( $post_ID );
		$results =$wpdb->get_results("select * from twc_meta where page_id='".$post_ID."'");
		
		echo "insert into twc_meta SET id='".uniqid()."',title='".$page_title."',page_id='".$post_ID."',meta_title='".$_POST['meta_title_twc']."', meta_key='".$_POST['meta_keyword_twc']."', meta_description='".$_POST['meta_description_twc']."'"; die;
		
		if(count($results)==0){ 
		$wpdb->query("insert into twc_meta SET id='".uniqid()."',title='".$page_title."',page_id='".$post_ID."',meta_title='".$_POST['meta_title_twc']."', meta_key='".$_POST['meta_keyword_twc']."', meta_description='".$_POST['meta_description_twc']."'");
		}else{
		$wpdb->query("UPDATE twc_meta SET title='".$page_title."', meta_title='".$_POST['meta_title_twc']."', meta_key='".$_POST['meta_keyword_twc']."', meta_description='".$_POST['meta_description_twc']."'  where page_id='".$post_ID."'");
		}
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
function ep_admin_js_cat_sub_cat_mangager() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager() {
	echo <<<END
<style type="text/css" media="screen">
.sub_navigations{width:100%}
.twc_type{ width:100%; padding:5px;}
</style>
END;
}

?>