<?php 
include('../../../../wp-load.php');
global $wpdb;
global $mk_options;


?>

<div class="bg_white">
<div class="pet-bodypart2 container">
	<div class="main_title">
		   <h2 class="block-title1"><?php echo $mk_options['container_for_content1'];?></h2>
		   <div class="fa-beforandafter"><i class="fa fa-star-o" aria-hidden="true"></i></div>
			<div class="block-text1"><?php echo $mk_options['container_for_content1_description'];?></div>
		 </div>
<div class="where_does_it">
  <?php $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 and display_on_homepage='Yes' ORDER BY rand() limit 4 ");
       $results =array_chunk($results,2);
	   $serviceListFirst =$results[0];
	   $serviceListSecond =$results[1];?>
	<div class="pet_wh1">
	  <?php  
	    $i=1; 
		foreach($serviceListFirst as $objs){ 
		  $link =site_url().'/search-vendor/?sid='.$objs->id;
		?>
		<div class="pet_paragraph<?php echo $i;?>">
			<div class="full_grooming">
				<!--<h3 class="sc_services_item_title"><a href="<?php echo $link;?>"><?php echo $objs->title;?></a></h3>-->
				<h3 class="sc_services_item_title ser_services" rel="<?php echo $objs->id;?>"><a href="javascript:void();"><?php echo $objs->title;?></a></h3>
		
				<span class="fa-groom-icon"><span class="fa fa-paw"></span></span>
			</div>
			<p><?php echo $objs->description;?></p>
		</div>
	  <?php $i++;}?>
	</div>
	
	<div class="pet_wh2">
			<img src="http://petsonbreak.com/wp-content/themes/adivaha/images/image-31.jpg" alt="">
	</div>
	<div class="pet_wh3">
		  <?php  
	    $j=1;
		foreach($serviceListSecond as $objs){ 
		$link =site_url().'/search-vendor/?sid='.$objs->id;
		?>
		<div class="pet_paragraph<?php echo $j;?>">
			<div class="full_grooming">
				<!--<h3 class="sc_services_item_title"><a href="<?php echo $link;?>" ><?php echo $objs->title;?></a></h3>-->

				<h3 class="sc_services_item_title ser_services" rel="<?php echo $objs->id;?>"><a href="javascript:void();" ><?php echo $objs->title;?></a></h3>

				<span class="fa-groom-icon"><span class="fa fa-paw"></span></span>
			</div>
			<p><?php echo $objs->description;?></p>
		</div>
	  <?php $j++;}?>
	</div>
</div>
<div class="other_services">
	<div class="main_title">
		   <h2 class="block-title1"><?php echo $mk_options['container_for_content2'];?></h2>
		   <div class="fa-beforandafter"><i class="fa fa-star-o" aria-hidden="true"></i></div>
			<div class="block-text1"><?php echo $mk_options['container_for_content2_description'];?></div>
		 </div>
		 
		 
<div class="pet_other_services" style="display:none;">
	<ul class="services_slider">
	  <?php $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 and is_popular='Yes'");
	  
	  
	     $results =array_chunk($results,4);
		 foreach($results as $resultArr){
		  $link =site_url().'/search-vendor/?sid='.$objs->id; ?>
		  <li>
			<div class="row">
			<?php foreach($resultArr as $objs){?>
			  <div class="col-md-3 col-sm-3">
			    <div class="col-item ser_services" rel="<?php echo $objs->id;?>">
				  	<a href="javascript:void();" ><img src="<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objs->category_image;?>" alt="">
						<div class="paris-14">
							<h2><?php echo $objs->title;?></h2>
							<p><?php echo $mk_options['find_best_deals'];?></p>
						</div>
						</a>
				</div>
			  </div>
			<?php }?>
			</div>
		</li>
		<?php }?>
	</ul>
</div>	

<div class="pet_other_services">
	<ul class="services_slider ">
	  <?php $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 and is_popular='Yes'");
	  
	  
	    
	 ?><?php foreach($results as $objs){
				$link =site_url().'/search-vendor/?sid='.$objs->id;?>
		  <li class="">
			
			
			  
			  <div class="">
			    <div class="col-item ser_services" rel="<?php echo $objs->id;?>">
				  	<a href="javascript:void();" ><img src="<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objs->category_image;?>" alt="">
						<div class="paris-14">
							<h2><?php echo $objs->title;?></h2>
							<p><?php echo $mk_options['find_best_deals'];?></p>
						</div>
						</a>
				</div>
			  </div>
			<?php }?>
			
		</li>
	
	</ul>
</div>	



<div class="main_title" style="display:none;">
		   <h2 class="block-title1"><?php echo $mk_options['container_for_content3'];?></h2>
		   <div class="fa-beforandafter"><i class="fa fa-star-o" aria-hidden="true"></i></div>
			<div class="block-text1"><?php echo $mk_options['container_for_content3_description'];?></div>
		 </div>
</div>		



<div class="pet_houseku" id="home_news_section">

<div class="pet_house1 news-section">
    <h2><?php echo $mk_options['latest_news'];?></h2>
  <div class="news-section-div">
   
     <div id="newsDiv" class="news-section-body">
	   <ul>
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
       foreach($results as $obj){?>
       <li>
	     <div class="news">
			 <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
			 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripcslashes($obj->title);?></a></h3>
			 <p><?php echo substr($obj->description,0,150);?>...</p>
		   </div>
	   </li>
       <?php } ?>
      </ul>
     </div>
  </div>
</div>

<div class="pet_house2" id="home-review-section">
<div class="detail-section2" >
    <div style="width: 100%;overflow-x: scroll;" class="dynamic_div_scroll">
	<h3 class="reveiews">REVIEWS</h3>
   		<p class="parlorem">Hey!!! All our funny friends want to thank you for your time. See what your friends has to say about us and please do not forget to leave your footmarks here.</p>
   <div style="width: 10000px;" class="dynamic_width_div">
   		<?php
	$feedbackResults =$wpdb->get_results("SELECT count(*) as totalfeedback, SUM(rating) as total_rating FROM twc_feedback ");
	$feedbackResult =$feedbackResults[0];
	$rating5 =($feedbackResult->total_rating/2);
	$averageFeedback =ceil($rating5/$feedbackResult->totalfeedback);
		   
		  ?>

   		<div class="detail-section2-cols row">
			<div class="col-md-3 col-sm-3 col-xs-3">
					<div class="det-sec2-col sec2-rating">
   			        	<div class="sec2-rating-top">
   			        	    <h3><?php echo  $averageFeedback ;?></h3>
   			        	    <p class="star-ioncs<?php echo $averageFeedback ?>"></p>
   			        	</div>

   			        	<div class="sec2-rating-bot">
   						   <ul>
   						   	 <li class="str-5">
   						   	   <span class="str"><i class="fa fa-star" aria-hidden="true"></i></span>
   						   	   <span class="rat">5</span>
   						   	   <span class="ratBar ratBar5 "></span>
   						   	 </li>

   						   	  <li class="str-4">
   						   	   <span class="str"><i class="fa fa-star" aria-hidden="true"></i></span>
   						   	   <span class="rat">4</span>
   						   	   <span class="ratBar ratBar4"></span>
   						   	 </li>

   						   	  <li class="str-3">
   						   	   <span class="str"><i class="fa fa-star" aria-hidden="true"></i></span>
   						   	   <span class="rat">3</span>
   						   	   <span class="ratBar ratBar3"></span>
   						   	 </li>

   						   	  <li class="str-2">
   						   	   <span class="str"><i class="fa fa-star" aria-hidden="true"></i></span>
   						   	   <span class="rat">2</span>
   						   	   <span class="ratBar ratBar2"></span>
   						   	 </li>

   						   	  <li class="str-1">
   						   	   <span class="str"><i class="fa fa-star" aria-hidden="true"></i></span>
   						   	   <span class="rat">1</span>
   						   	   <span class="ratBar ratBar1"></span>
   						   	 </li>

   						   </ul>
   			        	</div>
			   </div>
   			</div>
					
	
			
		<div class="carousel-reviews broun-block feedbacks-block">
		
		
		<div class="services_slider_notuse">
	 
      <div class="slide_item">
	         <?php 
                $feedResults =$wpdb->get_results("select * from twc_feedback where 1 ORDER BY date_time DESC LIMIT 4 ");				
				foreach($feedResults as $feedrow){
					$name=explode("@",$feedrow->email);
					?> 
	             
	       			<div class=" col-md-4 col-sm-4 col-xs-4">
				<div class="det-sec2-col">
				<h5><?php echo $name[0]; ?></h5>
				<span class="star-ioncs<?php echo ceil($feedrow->rating/2); ?>"></span>
				<span class="bkd_from"><?php echo $feedrow->email; ?></span>
				<span class="travld_Date"><?php echo date('l M d, Y',strtotime($feedrow->date_time));?></span>
				<p class="cont"><?php echo $feedrow->message; ?> </p>
                
				</div>
				</div>
				<?php } ?>
           </div>
		

        </div>
		
			</div>
		
	
   </div>
   		</div>
		
		</div>

   </div>

</div>

</div> 
		 
		 
</div>

</div>


<script>
  $(document).ready(function(){
	  $('.services_slider').bxSlider({
		controls: true,
		pager:false,
		auto:true,
		moveSlides: 1,
		speed:'500',
		pause:'5000',
		minSlides: 4,
		maxSlides: 4,
		moveSlides: 1,
		slideMargin: 10,
	    slideWidth: 350,
	  });
	});
 
 var width = $(window).width();

var myslider = $('services_slider').bxSlider({
    maxSlides: (width < 430) ? 1 : 4,
});
 
 
</script>

<script>
 $('.rdMore').click(function(){
	 $(this).parents('li').find('.commnt_rting_detail').addClass('isVisible');
	})	
	
 $('.close-det').click(function(){
	 $(this).parents('.commnt_rting_detail').removeClass('isVisible');;
	})
 
</script>

<style>
	#home-review-section .parlorem{padding-bottom:15px;}
	#home-review-section .detail-section2-cols > .col-md-3{width:2.2%;}
	#home-review-section .feedbacks-block.broun-block .col-md-4{width:2.2%;}
	#home-review-section .det-sec2-col{height:265px;padding:10px 15px;}
	#home-review-section .cont{height:130px;}
	#home-review-section .sec2-rating .str{line-height:25px;}
	#home-review-section .sec2-rating .rat{line-height:25px;}
	#home-review-section .sec2-rating .ratBar{height:25px;}
	#home-review-section .sec2-rating .sec2-rating-top h3{font-size:20px;}
	#home-review-section .sec2-rating{padding:10px 15px;}
	#home-review-section .sec2-rating  .sec2-rating-bot li{margin-bottom:0px;}
	#home-review-section .sec2-rating .sec2-rating-top{padding-bottom:8px;}
	
	.dynamic_div_scroll::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	.dynamic_div_scroll::-webkit-scrollbar
	{
		width: 6px;
		height:10px;
		background-color: #F5F5F5;
	}

	.dynamic_div_scroll::-webkit-scrollbar-thumb
	{
		background-color: #000;
		border: 2px solid #555555;
	}
    
	
	#home_news_section .news-section-body{height:360px;}
	#home_news_section .news{border-bottom:0px;}
	
	
	
</style>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollbox.js"></script>
<script>

$(function () {
  $('#newsDiv').scrollbox({
    linear: true,
    step: 1,
    delay: 0,
    speed: 100
  });
});
</script>

