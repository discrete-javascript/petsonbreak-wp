
<!--<script src="<?php //echo $Plugin_URL; ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo $Plugin_URL; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("area[rel^='prettyPhoto']").prettyPhoto();
	
$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_square',slideshow:7000, autoplay_slideshow: false});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

	
});
</script>
<div class="gallerydiv gallery clearfix">
  <ul class="gallerydiv">
    <?php 
	global $wpdb;
	$sql = "select img_path from twc_library where published='Yes' and status_deleted='0'";
	$Results_sql = $wpdb->get_results($sql);
	foreach ( $Results_sql as $Results_sql ){
		$img_path = $Results_sql->img_path;
	
	?>
    <li><a href="<?php echo $Plugin_URL; ?>/images/Image_Library_large/<?php echo $img_path; ?>" rel="prettyPhoto[gallery1]" style="background:url(<?php echo $Plugin_URL; ?>/images/Image_Library_small/<?php echo $img_path; ?>) center"  href="#">&nbsp;</a></li>
    
    <?php 
		}
		?>
  </ul>
</div>
