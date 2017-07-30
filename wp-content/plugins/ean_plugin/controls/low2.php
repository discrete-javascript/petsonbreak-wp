<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box2' );

function ep_admin_init_add_low_box2(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc2', __( 'City/Destination Landing Page Information', EP_TD ), 'ep_admin_init_add_low_box_twc2', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc2');
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager2');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager2');
}
function ep_admin_init_add_low_box_twc2(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select * from landing_pages where page_id='".$post_ID."'");				$Result =$Results[0];
				echo '<div><b>	Select the destination and select "Manage Destination" as a template to convert this page into city landing page.</b><div style="margin-top:20px;"> Select Destination <br><b>(Note: You can change the text to any meaning full destination/landmark after selecting the destination from drop down.)</b><br />  						<input type="text" name="destination_id" id="destination_id" value="'.$Result->destination_name.'" class="load_city ui-autocomplete-input" autocomplete="off"><input type="hidden" name="destination_id_child" id="destination_id_child" value="'.$Result->destination_id.'"> 				 				          </div>						<div style="margin-top:20px;"> Add Description (This text will appear below city name in the banner section) <br />                            <input type="text" name="shortDescription" id="shortDescription" value="'.$Result->shortDescription.'" style="width:800px;">												</div>				</div>';	  
}

function update_add_low_box_twc2(){	 

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
function ep_admin_js_cat_sub_cat_mangager2() {
	echo <<<END
<script type='text/javascript'>
//<![CDATA[
	//jQuery( '#ep_explain_more' ).hide();
	
//]]>
</script>
END;
}
function ep_admin_css_cat_sub_cat_mangager2() {
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