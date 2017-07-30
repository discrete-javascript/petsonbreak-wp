<?php 
/**
 Template Name: HOTEL LIST
 
 */
get_header();

global $wpdb;


$id = $_GET['id'];


$cate = $wpdb->get_results("SELECT * FROM `wp_category` WHERE `post_id` = '$id'");

$category = $cate[0]->id;

$data = $wpdb->get_results("SELECT * FROM `wp_hotels_list` WHERE `category`  = '$category'");

$cate_name = $cate[0]->category;

?>



<style>

div.hover {
      border-bottom: 5px solid rgba(0,0,0,0);

      transition: border-color 1s linear;
      -moz-transition: border-color 1s linear;    /* FF3.7+ */
      -o-transition: border-color 1s linear;      /* Opera 10.5 */
      -webkit-transition: border-color 1s linear; /* Saf3.2+, Chrome */
    }

    div.hover:hover {
      border-color: rgba(1,1,1,1);
    }

</style>

<div class="row" style="padding:30px;">
<div class="col-sm-3" >  

  <div class="panel panel-default">
    <div class="panel-heading">Search Hotels</div>
    <div class="panel-body" style="height:350px;">

<input type="text" value="<?php echo $cate_name;?>" placeholder="Search Accommodation/Location" class="input-text full-width" name="accomname" id="accomname"><br><br>

<button class="btn btn-primary" style="background:#F47555;border: 1px solid #F47555;">search again</button>
</div>
  </div>
</div>
<div class="col-sm-9" >  

  
 
    <div style="min-height:390px;height:auto;font-family:soap-icons;background:white;">
	<br><br>
	<?php
	
	foreach($data as $key)
	{
	
	
	$category = $key->category;
	
	
$cate = $wpdb->get_results("SELECT * FROM `wp_category` WHERE `id` = '$category'");

$cate_name = $cate[0]->category;

	?>
<div class="row" id="row" style="border:2px solid #F47555;margin-left:20px;margin-right:20px;padding-top:20px;padding-bottom:20px;">

<div class="col-sm-4">
 <a title="View Photo Gallery" class="" data-post_id="8121" href="<?php echo site_url();?>/hotel-details/?id=<?php echo $key->id;?>"><img width="270" height="220" src="<?php echo site_url();?>/<?php echo $key->image;?>" class="attachment-gallery-thumb size-gallery-thumb wp-post-image" alt="420010236camp-della-big-3" /></a>
 </div>
 <div class="col-sm-8"><div>
 <div><h4 class="box-title">
 <a href="<?php echo site_url();?>/hotel-details/?id=<?php echo $key->id;?>"><?php echo $key->name;?></a><br><small><i class="soap-icon-departure yellow-color"></i> <?php echo $cate_name;?>,India</small></h4><div class="amenities"> <i class="soap-icon-aircon circle" title="AC"></i><i class="soap-icon-breakfast circle" title="Free Breakfast"></i><i class="soap-icon-fitnessfacility circle" title="Gym"></i><i class="soap-icon-conference circle" title="Meeting Hall"></i><i class="soap-icon-swimming circle" title="SWIMMING POOL"></i></div></div><div></div></div>
 <div><p><?php echo $key->description;?></p><div> <span class="price"><?php echo $key->price;?></span><br><br> <a title="View Detail" style="background:#F47555;border: 1px solid #F47555;" class="btn btn-primary" href="<?php echo site_url();?>/hotel-details/?id=<?php echo $key->id;?>">Select</a></div></div></div></div>
<?php
	
	
	}
	
	?>
 <br>
 
 </div>



</div>






























<?php get_footer();?>