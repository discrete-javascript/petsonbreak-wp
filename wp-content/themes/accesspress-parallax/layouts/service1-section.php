<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

<style>
.slider{padding: 0px 0px 30px 0px;}
.slider ul{}
.slider ul li{float: left;width: 25%;padding: 0px 0px 0px 5px;position: relative;}




.slider ul li:first-child{padding: 0px 0px 0px 0px;}
.slider ul li a{width: 100%;height: 100%;display: block;background: #000;}
.slider ul li a img{width:100%;}


.ser_services{
 background-position:center center;
 background-repeat:no-repeat;
}

.bx-wrapper .col-item{height: 210px;
    overflow: hidden;
width: 100%;}
.bx-wrapper .col-item img { width: 100%;height:100%;}	

.bx-wrapper .bx-prev {
  left: 10px;
  background: url('<?php echo get_template_directory_uri(); ?>/css/controls.png') no-repeat 0 -32px !important;
display:block !important;
}

.bx-wrapper .bx-next {
  right: 10px;
  background: url('<?php echo get_template_directory_uri(); ?>/css/controls.png') no-repeat -43px -32px !important;
  display:block !important;
}

.paris-14{position: absolute;bottom: 32px;left: 20px;max-width: 100%;width: auto;background: rgba(0,0,0,0.6);padding: 5px;text-align: left;}
.paris-14 h2{margin-bottom: 0px;font-size: 14px;color: #fff;font-weight: 500;}
.paris-14 p{font-size: 15px;color: #fff;}

</style>

	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" type="text/css" />
	  
	<div class="slider">
	<ul class="bxslider" style="background:#F47555;color:white;">
	  <?php $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 and is_popular='Yes'");
	  
	  
	     $results =array_chunk($results,4);
		 foreach($results as $resultArr){
		
		 foreach($resultArr as $objs)
		 {
			  $link =site_url().'/search-vendor/?sid='.$objs->id; 
			
			?>
		  <li>
			<div class="row">
		
			  <div class="col-md-12 col-sm-12">
			    <div class="col-item ser_services" rel="<?php echo $objs->id;?>">
				  	<a href="<?php echo $link;?>" ><img src="<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objs->category_image;?>" alt="" style="width:320px;">
						<div class="paris-14" style="width:90% !important;margin-left:auto !important;margin-right:auto !important;margin-bottom:-42px !important;">
							<h2 style="font-size:16px;"><?php echo $objs->title;?></h2>
							<p><?php echo $mk_options['find_best_deals'];?></p>
						</div>
						</a>
				</div>
			  </div>
			
			</div>
		</li>
		<?php }?>
		<?php }?>
	</ul>
</div>	
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.js"></script>
<script>
  $(document).ready(function(){

		     
	  $('.bxslider').bxSlider({
		controls: true,
		pager:false,
		auto:true,
		moveSlides: 1,
		speed:'500',
		pause:'5000',
		minSlides: 4,
		maxSlides: 4,
		moveSlides: 1,
		slideMargin: 2,
	    slideWidth: 350
	  });
		
	  

	});
 

 
</script>
