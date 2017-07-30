<?php
global $wpdb;
global $Plugin_Path;
global $Plugin_URL;
global $wp_query; 
$postid = $wp_query->post->ID;
//echo $postid;

$Get_Path = "SELECT option_value as siteurl FROM wp_options where option_name='siteurl'";			
$Results = $wpdb->get_results($Get_Path);
foreach ( $Results as $Result ){
	$siteurl = $Result->siteurl;
}
global $wp_query;
$hotel_file_name = get_query_var("hotel_file_name");

if($hotel_file_name!=""){
	include("hotel-details.php");
	die();
}
$Get_Related_Hotels = "SELECT related_hotels  FROM related_hotels where post_id='".$postid."'";			
	$Results = $wpdb->get_results($Get_Related_Hotels);
	foreach ( $Results as $Result ){
		$related_hotels = $Result->related_hotels;
?>
<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/css_plugin/main.css" type="text/css" media="screen" />

<div class="hotel-wrap">
<?php $Get_Related_Hotelss = "SELECT *  FROM twc_hotel_info where status_deleted=0 and published='Yes' and find_in_set(id, '".$related_hotels."')";
	$Resultss = $wpdb->get_results($Get_Related_Hotelss);
	foreach ( $Resultss as $Result ){
	?>
   
    <?php $Get_Hotel_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes' and id='".$Result->hotel_rating."'";
	$Results_Hotel_Rating = $wpdb->get_results($Get_Hotel_Rating);
	foreach ( $Results_Hotel_Rating as $Results_Hotel_Rating ){
		$title = $Results_Hotel_Rating->title;
	}
	?>
    <?php $Get_Trip_Advisor_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes' and id='".$Result->trip_advisor_rating."'";
	$Results_Trip_Advisor_Rating = $wpdb->get_results($Get_Trip_Advisor_Rating);
	foreach ( $Results_Trip_Advisor_Rating as $Results_Trip_Advisor_Rating ){
		$Trip_advisor_title = $Results_Trip_Advisor_Rating->title;
	}
	?>
	<div class="hotel-content">
    	<h1><a href="<?php echo $Result->file_name	;?>/"><?php echo $Result->title;?></a> <span class="rating-static rating-<?php echo str_replace(".", "", $title); ?>"></span></h1>
        <div class="h-left">
        	<div><a href="<?php echo $Result->file_name	;?>/"><img class="h-img" src="<?php echo $Plugin_URL; ?>/images/Hotel_Image/<?php echo $Result->img_opath;?>" /></a></div>
        </div>
        <div class="h-right">
        	<div class="rankdiv">
            	<div class="rank"><?php echo $Result->promotional_line_above_trip_advisor;?></div>
                <div class="taicon">
            <img src="http://c1.tacdn.com/img2/ratings/traveler/s<?php echo $Trip_advisor_title; ?>.gif" align="absmiddle" /> <a target="_blank" href="<?php echo $Result->trip_advisor_link_on_reviews;?>"><?php echo $Result->trip_advisor_total_reviews;?> Reviews</a></div>
            <div class="checkindiv"><img src="<?php echo $Plugin_URL; ?>/images_plugin/chekinimg.gif" width="28" height="28" /> 
            <span>Check In <?php echo $Result->check_in;?></span> <span>Check Out  <?php echo $Result->checkout;?></span></div>
            </div>
            <div class="pricediv">
            	<div class="m-p">$<?php echo $Result->low_price;?>.00</div>
                <?php if(($Result->high_price!="") && ($Result->high_price!=0)){?>
                <div class="o-p">$<?php echo $Result->high_price;?>.00</div>
                <?php } ?>
            	<div class="booknowdiv"><a class="bn-button" target="_blank" href="<?php echo $Result->url_website;?>">Book Now</a></div>
            </div>
            <div class="detaildiv">
            	<h2>Hotel Details</h2>
                <p><?php echo $Result->descriptions;?></p>
            	

            </div>
            
        </div>
        <div class="clear"></div>
    </div>
    
  <?php }?>  
</div>
<?php }?>  