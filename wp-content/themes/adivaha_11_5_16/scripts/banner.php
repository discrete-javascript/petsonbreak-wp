 <?php 
include('../../../../wp-load.php');
global $wpdb;
global $mk_options;

$bannerResults=$wpdb->get_results("select * from twc_banner");

?>
<div class="AdBanner" id="myCarousel">
	<!--
	<div class="banner-carousel-container">
	 <img alt="" ng-src="{{bannerImg}}"/>
		<div class="carousel-caption">
			<h3>{{ bannerheading}} </h3>
			<p>{{ bannercontent}} </p>
		</div>
	</div>
	-->
	
	<div class="banner-carousel-container">
	 <img id="bannerImg" alt="" ng-src="{{bannerImg}}"/>
		<div class="carousel-caption">
			<h3>{{ bannerheading}} </h3>
			<p>{{ bannercontent}} </p>
		</div>
	</div>
	
	<div class="home-slider-container" style="position: absolute;top: 0;
    right: 0;
    bottom: 0px;
    left: 0px;
    z-index: 2;">
	  			<ul class="home-bxslider">
				<li>
					<div class="colms">
					  <img src="http://twc5.com/clients/petsonbreak/wp-content/uploads/2017/03/hld_banner.jpg" class="img-responsive">
			 		</div>
					<div class="banner-caption">
					  <h3>Every Which Way... But Loose.</h3>
					  <p> Go... #FOOTLOOSE with your pet! </p>
					</div>
				</li>
				<li>
					<div class="colms">
					   <img src="http://twc5.com/clients/petsonbreak/wp-content/uploads/2017/03/flt-banner.jpeg" class="img-responsive">
					</div>
						<div class="banner-caption">
						  <h3>Every Which Way... But Loose.</h3>
						  <p> Go... #FOOTLOOSE with your pet! </p>
						</div>
				</li>
				<li>
					<div class="colms">
						<img src="http://twc5.com/clients/petsonbreak/wp-content/uploads/2017/03/rst_banner.jpeg" class="img-responsive">
					  
					</div>
					<div class="banner-caption">
					  <h3>Every Which Way... But Loose.</h3>
					  <p> Go... #FOOTLOOSE with your pet! </p>
					</div>
				</li>
				<li>
					<div class="colms">
					 <img src="http://twc5.com/clients/petsonbreak/wp-content/uploads/2017/03/brk_banner.jpeg" class="img-responsive">
					</div>
						<div class="banner-caption">
						  <h3>Every Which Way... But Loose.</h3>
						  <p> Go... #FOOTLOOSE with your pet! </p>
						</div>
				</li>
		
			
			
		 </ul>
	
	</div>
	
	
</div>

<style>
.banner-carousel-container>img{width:100%;}
.Zind{z-index:-1 !important;}
</style>


<!--
<div class="slider" id="myCarousel">
    <div id="slider-container">
     <ul class="home-bxslider">
	 <?php foreach($bannerResults as $robj){
		 ?>
	 
      <li><div class="carousel-caption">
		<h3><?php echo $robj->title ; ?></h3>
		<p>  <?php echo $robj->description ; ?></p>
	  </div><img src="<?php echo plugins_url();?>/ean_plugin/images/Category/<?php echo $robj->img_path; ?>" />
	  
	  </li>
	 <?php } ?>
	  <!--
      <li><div class="carousel-caption">
		<h3>Every Which Way But Loose2.</h3>
		<p>  The energy, the sounds, the smells the vibes &amp; smiles will overtake all your senses and soon u Find what brings you joy...Memories Are Made Of This.</p>
	  </div><img src="http://twc5.com/clients/petsonbreak/wp-content/themes/adivaha/images/home-banner-1.jpeg" /></li>
      <li><img src="http://twc5.com/clients/petsonbreak/wp-content/themes/adivaha/images/home-banner-3.jpeg" /></li>
	  -->
	  <!--
    </ul>
   </div>
</div>-->
<script type="text/javascript">
$(document).ready(function () {
  $('.home-bxslider').bxSlider({
    mode: 'fade',
    controls: false,
    pager: false,
    auto: true,
    speed: 1000,
    infiniteLoop:true,
    adaptiveHeight:true,
        responsive:true,    
    onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) { console.log(currentSlideHtmlObject); $('.active-slide').removeClass('active-slide'); $('.home-bxslider>li').eq(currentSlideHtmlObject + 0).addClass('active-slide') }, onSliderLoad: function () { $('.home-bxslider>li').eq(0).addClass('active-slide') },
    // http://bxslider.com/options 

  });
});
</script>

<script>
	$('.search_Form li').click(function(){
		$('.home-slider-container').addClass('Zind');
		
		})
	
</script>


