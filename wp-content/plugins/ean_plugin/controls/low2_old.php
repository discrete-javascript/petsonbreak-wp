<?php
add_action( 'admin_init', 'ep_admin_init_add_low_box2' );

function ep_admin_init_add_low_box2(){
	global $wp_version;
	add_meta_box('ep_admin_meta_box_twc2', __( 'Enter the destination page data', EP_TD ), 'ep_admin_init_add_low_box_twc2', 'page', 'advanced', 'low');
	add_action('save_post', 'update_add_low_box_twc2');
	// Add the JS & CSS to the admin header
	add_action('admin_head', 'ep_admin_css_cat_sub_cat_mangager2');
	add_action('admin_footer', 'ep_admin_js_cat_sub_cat_mangager2');
}
function ep_admin_init_add_low_box_twc2(){
	    global $post_ID;
		global $wpdb;
		global $Plugin_URL;
		$Results = $wpdb->get_results("select * from landing_pages where page_id='".$post_ID."'");		$Result =$Results[0];
						echo '<input type="checkbox" name="set_destination" id="set_destination">&nbsp;Set destination page <br /><br />';		echo '<div>				  <div style="margin-top:20px;">		             Select Destination <br />   		             <input type="text" name="destination_id" id="destination_id" value="'.$Result->destination_name.'" class="load_city ui-autocomplete-input" autocomplete="off"> 					  <input type="text" name="destination_id_child" id="destination_id_child" value="'.$Result->destination_id.'" > 				  </div>		     </div>';	  
}

function update_add_low_box_twc2(){	    $twc_options = theme_option(THEME_OPTIONS);
	    global $post_ID;		global $wpdb;		$destination_name =$_POST['destination_id'];		$destination_id =$_POST['destination_id_child'];		$what_to_search_id =$destination_id;		$shortDescription =$_POST['shortDescription'];				$results =$wpdb->get_results("select * from landing_pages where page_id='".$post_ID."'");		if(count($results)==0){ 		  $wpdb->query("insert into landing_pages SET destination_id='".$destination_id."',destination_name='".$destination_name."',shortDescription='".$shortDescription."',page_id='".$post_ID."',published='yes'");		}else{		 $wpdb->query("UPDATE landing_pages SET destination_id='".$destination_id."',destination_name='".$destination_name."',shortDescription='".$shortDescription."' where page_id='".$post_ID."'");		}	  	   $Cri_currency =$twc_options['default_currency'];	   $Cri_language ='en_US';	          $fromDate =  date("m/d/Y",strtotime(date('Y-m-d'). '+20 days'));	   $toDate =date("m/d/Y",strtotime($fromDate. '+1 days'));	  	   	  $results =$wpdb->get_results("select * from  search_results SET destination_id='".$destination_id." and currency='".$Cri_currency."',language='". $Cri_language."' ");	 if(count( $results)==0)     {		 	   $URL =$twc_options['ean_url'];	   $vars = "action=Upldate_Rates&what_to_search_id=".$what_to_search_id."&Cri_DateFrom=".$fromDate."&Cri_DateTo=".$toDate.'&Cri_currency=USD&Cri_language=en_US&noDate=';	   $URLs_Fetch = $URL."?".$vars; 	   $ch = curl_init();	   curl_setopt($ch, CURLOPT_URL, $URLs_Fetch);	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	   $Info = curl_exec($ch);	   curl_close($ch);	   $Info = json_decode($Info, true);	 	   $sort_order =1;	   	  $search_session =$destination_id.'-desti';  	   	for($icounter=0; $icounter<count($Info); $icounter++){	  // add amenity		  $ValueAdds_arr =json_decode($Info[$icounter]['ValueAdds'],true);	  $vaid_arr ='';      foreach($ValueAdds_arr as $valuadd){		$va_id = $valuadd['@id'];		$vaid_arr[] =$valuadd['@id'];		$va_desc = $valuadd['description'];		$wpdb->query("insert into search_hotels_amenity SET destination_id='".$what_to_search_id."',hotels_id='".$Info[$icounter]['EANHotelID']."',currency='".$Cri_currency."',language='".$Cri_language."', ValueAdds_id='".$va_id."',ValueAdds_desc='".$va_desc."',search_session='".$search_session."',date_time='".date("Y-m-d")."' ");	  } 	      $vaid_str =@implode(",",$vaid_arr);	  	  // End amenity		 $SQL = "insert into search_results set EANHotelID='".$Info[$icounter]['EANHotelID']."', Name='".$Info[$icounter]['Name']."', Address1='".$Info[$icounter]['Address1']."', Address2='".$Info[$icounter]['Address2']."', City='".$Info[$icounter]['City']."', Country='".$Info[$icounter]['Country']."', StarRating='".$Info[$icounter]['StarRating']."', LowRate='".str_replace(',','',$Info[$icounter]['LowRate'])."', highRate='".str_replace(',','',$Info[$icounter]['highRate'])."',latitude='".$Info[$icounter]['latitude']."',longitude='".$Info[$icounter]['longitude']."', tripAdvisorRating='".$Info[$icounter]['tripAdvisorRating']."', promoDescription='".$Info[$icounter]['promoDescription']."', currentAllotment='".$Info[$icounter]['currentAllotment']."', nonRefundable='".$Info[$icounter]['nonRefundable']."', fn='".$Info[$icounter]['fn']."', thumbNailUrl='".$Info[$icounter]['thumbNailUrl']."', tripAdvisorReviewCount='".$Info[$icounter]['tripAdvisorReviewCount']."',proximityDistance='".$Info[$icounter]['proximityDistance']."',proximityUnit='".$Info[$icounter]['proximityUnit']."',amenityMask='".$Info[$icounter]['amenityMask']."',propertyCategory='".$Info[$icounter]['propertyCategory']."',valueAdds='".$vaid_str."', date_time='".date("Y-m-d")."', destination_id='".$what_to_search_id."',checkin='".date('Y-m-d',strtotime($fromDate))."',checkout='".date('Y-m-d',strtotime($toDate))."',currency='".$Cri_currency."',langauge='".$Cri_language."',confidenceRating='".$Info[$icounter]['confidenceRating']."',shortDescription='".addslashes($Info[$icounter]['shortDescription'])."',search_session='".$search_session."',sort_order='".$sort_order."'"; 			$wpdb->query($SQL);		$sort_order++;	}  }  	   	            /*	       <script >	 var linkURL = "cityCode=AREA-<?php echo $destination_id;?>|cities|<?php echo $destination_name;?> +&action=Upldate_Rates&s=<?php echo $destination_name;?>&startDate=<?php echo $fromDate;?>&endDate=<?php echo $toDate;?>&Cri_currency=USD&lang=en_US&Cri_noofRooms=1&adults-r1=2&noDate=";	 alert(linkURL);	  	 </script>      */		
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