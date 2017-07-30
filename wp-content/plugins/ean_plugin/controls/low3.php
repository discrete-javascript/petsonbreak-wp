<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box3' );

function ep_admin_init_add_low_box3(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc3', __( 'Destination - Quick Facts', EP_TD ), 'ep_admin_init_add_low_box_twc3', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc3');
	
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager3');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager3');
}

function ep_admin_init_add_low_box_twc3(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select population, capital, currency, timezone, language from ".$wpdb->prefix."posts where ID='".$post_ID."'");
		foreach ( $Results as $Result ){
			$population = $Result->population;
			$capital = $Result->capital;
			$currency = $Result->currency;
			$timezone = $Result->timezone;
			$language = $Result->language;
		}
        echo  "Population<br /><input class='twc_type' type='text' name='population' id='population' value='".$population."' ><br />";
		echo  "Capital<br /><input class='twc_type' type='text' name='capital' id='capital' value='".$capital."' ><br />";
		echo  "Currency<br /><input class='twc_type' type='text' name='currency' id='currency' value='".$currency."' ><br />";
		echo  "Time Zone<br /><input class='twc_type' type='text' name='timezone' id='timezone' value='".$timezone."' ><br />";
		echo  "Language<br /><input class='twc_type' type='text' name='language' id='language' value='".$language."' ><br />";
		
	    
	
}

function update_add_low_box_twc3(){
		global $post_ID;
		global $wpdb;
		$wpdb->query("UPDATE ".$wpdb->prefix."posts SET population='".$_POST['population']."', capital='".$_POST['capital']."', currency='".$_POST['currency']."', timezone='".$_POST['timezone']."', language='".$_POST['language']."'  where ID='".$post_ID."'");
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
function ep_admin_js_cat_sub_cat_mangager3() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager3() {
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