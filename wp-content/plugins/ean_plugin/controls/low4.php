<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box4' );

function ep_admin_init_add_low_box4(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc4', __( 'Why Choose us - Reasons', EP_TD ), 'ep_admin_init_add_low_box_twc4', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc4');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager4');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager4');
}

function ep_admin_init_add_low_box_twc4(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select reason1, reason2, reason3, reason4, reason5, reason6, reason7, reason8, reason9, reason10 from ".$wpdb->prefix."posts where ID='".$post_ID."'");
		foreach ( $Results as $Result ){
			$reason1 = $Result->reason1;
			$reason2 = $Result->reason2;
			$reason3 = $Result->reason3;
			$reason4 = $Result->reason4;
			$reason5 = $Result->reason5;
			$reason6 = $Result->reason6;
			$reason7 = $Result->reason7;
			$reason8 = $Result->reason8;
			$reason9 = $Result->reason9;
			$reason10 = $Result->reason10;
		}
        echo  "Reason 1<br /><input class='twc_type' type='text' name='reason1' id='reason1' value='".$reason1."' ><br />";
		echo  "Reason 2<br /><input class='twc_type' type='text' name='reason2' id='reason2' value='".$reason2."' ><br />";
		echo  "Reason 3<br /><input class='twc_type' type='text' name='reason3' id='reason3' value='".$reason3."' ><br />";
		echo  "Reason 4<br /><input class='twc_type' type='text' name='reason4' id='reason4' value='".$reason4."' ><br />";
		echo  "Reason 5<br /><input class='twc_type' type='text' name='reason5' id='reason5' value='".$reason5."' ><br />";
		echo  "Reason 6<br /><input class='twc_type' type='text' name='reason6' id='reason6' value='".$reason6."' ><br />";
		echo  "Reason 7<br /><input class='twc_type' type='text' name='reason7' id='reason7' value='".$reason7."' ><br />";
		echo  "Reason 8<br /><input class='twc_type' type='text' name='reason8' id='reason8' value='".$reason8."' ><br />";
		echo  "Reason 9<br /><input class='twc_type' type='text' name='reason9' id='reason9' value='".$reason9."' ><br />";
		echo  "Reason 10<br /><input class='twc_type' type='text' name='reason10' id='reason10' value='".$reason10."' ><br />";
		
	    
	
}

function update_add_low_box_twc4(){
		global $post_ID;
		global $wpdb;
		$wpdb->query("UPDATE ".$wpdb->prefix."posts SET reason1='".$_POST['reason1']."', reason2='".$_POST['reason2']."', reason3='".$_POST['reason3']."', reason4='".$_POST['reason4']."', reason5='".$_POST['reason5']."', reason6='".$_POST['reason6']."', reason7='".$_POST['reason7']."', reason8='".$_POST['reason8']."', reason9='".$_POST['reason9']."', reason10='".$_POST['reason10']."'  where ID='".$post_ID."'");
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
function ep_admin_js_cat_sub_cat_mangager4() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager4() {
	echo <<<END
<style type="text/css" media="screen">
.sub_navigations{width:100%}
.twc_type{ width:100%; padding:5px;}
.imgtable tr td{padding:0px; margin:0px;}
.chk{ display:block; background:#edecec; border:1px #d5d5d5 solid; padding:5px; }
</style>
END;
}

?>