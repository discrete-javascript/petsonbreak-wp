<?php 

global $wpdb;



/**
 Template Name: NEWS AND UPDATES Page
 
 */
get_header();



?>
<style>

ul li {
	
	
	list-style-type:none;
}

<style>

ul li {
	
	
	list-style-type:none;
}


	#home-review-section  .detail-section2{margin:0px;}
.news-title img{width: 12px;height:12px;}
.news-section h2{font-size: 20px;padding: 10px;color: #fff;background: #E66432;font-weight: 500;border:1px solid #736E7El;margin-top:-5px;}
.news-section-div{padding: 0x;border:1px solid #ccc;border-top:0px;background:#fff;margin-top:-10px;}
.news-section-body{height: 250px;overflow:auto;
	-webkit-animation-name: move;
	-webkit-animation-duration: 8s;
	-webkit-animation-iteration-count: infinite;
	-webkit-animation-direction: top;
	-webkit-animation-timing-function: linear;
	-webkit-animation-fill-mode:forwards;

	-moz-animation-name: move;
	-moz-animation-duration: 8s;
	-moz-animation-iteration-count: infinite;
	-moz-animation-direction: top;
	-moz-animation-timing-function: linear;
	-moz-animation-fill-mode:forwards;
	
	-o-animation-name: move;
	-o-animation-duration: 8s;
	-o-animation-iteration-count: infinite;
	-o-animation-direction: top;
	-o-animation-timing-function: linear;
	-o-animation-fill-mode:forwards;
	
	-ms-animation-name: move;
	-ms-animation-duration: 8s;
	-ms-animation-iteration-count: infinite;
	-ms-animation-direction: top;
	-ms-animation-timing-function: linear;
	-ms-animation-fill-mode:forwards;

}

.news-section-body::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.news-section-body::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

.news-section-body::-webkit-scrollbar-thumb
{
	background-color: #000;
	border: 2px solid #555555;
}


.news-section-body{padding:0px 0px;}
.news-section-body h3{font-size: 20px;color: #555;padding-bottom: 5px;}
.news-section-body h3 a{font-size: 16px;color: #333;}
.news{background: #fff;padding: 5px;border-bottom:1px solid #ccc;color:#000;}
.news p{ padding-left:18px;line-height: 25px;}
.pet_house2 {}

.news-listing .pet-search-left{
	padding-top: 0px;
}



.news-list-col{
    width: 100%;
    float: left;
    padding:10px 10px 10px 20px;
    height: 100%;
}

.news-list-col h3 a{
	color:#555;
	margin-bottom: 15px;
	display: inline-block;
}


.news-list-col h2{
	color: #555;
    font-size: 26px;
    font-weight: 600;
}

.news-list-col p{
    font-size: 14px;
    line-height: 26px;
}

.news-list-col p a{
	color:#fff;
}

.news-list-col .last6brdiv a{
	color:#fff;
}

.news-list-col .last6brdiv {
	font-size: 14px;
    line-height: 26px;
 }

.news-list{
	width: 100%;
	float: left;
	margin-bottom: 20px;
	min-height: 200px;
	background: #7be6c8;
}

.news-header{
    padding-bottom: 20px;
}

.news-header h2{
	font-size: 30px;
    font-weight: 600;
    color: #302a3d;
    position: relative;
    margin-bottom:22px;
}



.morelink{
    text-align: right;
    font-size: 15px;
    background: #636;
    color: #fff;
    padding: 5px 10px;
    display: inline-block;
    margin-top: 5px;
    border-radius: 4px;
}

.morecontent span {
    display: none;
}

.blockquote1{position:relative;text-align: right;}


.blockquote1:before{color: #ccc;
	content: "";
	background:url('http://petsonbreak.com/wp-content/themes/adivaha/images/Blockquoteclose.png');
    height: 42px;
    position: absolute;
    width: 13%;
    top: -4px;
    left: -21px; 
    background-repeat:no-repeat;
    background-size:24px 23px;
}
.blockquote1:after{color: #ccc;
	content: "";
	
	background:url('http://petsonbreak.com/wp-content/themes/adivaha/images/Blockquoteopen.png');
	background-repeat:no-repeat;
    height: 42px;
	position: absolute;
    width: 13%;
    right: -38px;
    top: 82px;
    background-size: 24px 23px;
}



.pet_houseku{    clear: both;padding-bottom:60px;overflow: hidden;}
.pet_house1{float: left;width: 48%;margin-left:1%;overflow: hidden;background:#fff;}
.pet_house2{float: right;width: 48%;position:relative;}
	
	
// REVIEWS

.detail-section2 .carousel-reviews.broun-block .col-md-4{width: 250px;float:left;}
.reveiews{    color: #302a3d;
    font-weight: 500;
    padding-bottom: 0px;
    font-size: 28px;
    margin-bottom: 5px;}
.parlorem{padding-bottom: 25px;
    color: #302a3d;
    font-weight: 500;
    font-size: 16px;}


#home-review-section .parlorem{
	color: #302a3d;
    font-weight: 500;
	font-size:14px;
}

#home-review-section .reveiews {
    color: #302a3d;
    font-weight: normal;
    padding-bottom: 0px;
    font-size: 21px;
    margin-bottom: 5px;
}

#home-review-section .detail-section2 {
    background-color: #fff;
	overflow:scroll;
}



#home-review-section .parlorem{padding-bottom:15px;}
	#home-review-section .detail-section2-cols > .col-md-3{width:200px;}
	#home-review-section .feedbacks-block.broun-block{width:800px;}
	#home-review-section .feedbacks-block.broun-block .col-md-4{width:220px;}
	#home-review-section .det-sec2-col{height:265px;padding:10px 15px;}
	#home-review-section .cont{max-height: 130px;overflow: auto;}
	#home-review-section .sec2-rating .str{line-height:25px;}
	#home-review-section .sec2-rating .rat{line-height:25px;}
	#home-review-section .sec2-rating .ratBar{height:25px;}
	#home-review-section .sec2-rating .sec2-rating-top h3{font-size:20px;}
	#home-review-section .sec2-rating{padding:10px 15px;}
	#home-review-section .sec2-rating  .sec2-rating-bot li{margin-bottom:0px;}
	#home-review-section .sec2-rating .sec2-rating-top{padding-bottom:8px;}
	
	#home-review-section .dynamic_div_scroll::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	#home-review-section .dynamic_div_scroll::-webkit-scrollbar
	{
		width: 6px;
		height:10px;
		background-color: #F5F5F5;
	}

	#home-review-section .dynamic_div_scroll::-webkit-scrollbar-thumb
	{
		background-color: #000;
		border: 2px solid #555555;
	}
	
	
		#home-review-section .cont::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	#home-review-section .cont::-webkit-scrollbar
	{
		width: 6px;
		height:10px;
		background-color: #F5F5F5;
	}

	#home-review-section .cont::-webkit-scrollbar-thumb
	{
		background-color: #000;
		border: 2px solid #555555;
	}

	
	.sec2-rating{padding: 25px;}
.sec2-rating .sec2-rating-top{    text-align: center;
    width: 100%;
float: : left;padding-bottom: 20px;}
.sec2-rating .sec2-rating-top h3{    font-size: 38px;
color: #fff;padding-bottom: 5px;}
.sec2-rating .sec2-rating-top  .star-ioncs14{float: none;}
.sec2-rating .sec2-rating-bot{width: 100%;float: left;}
.sec2-rating .sec2-rating-bot ul,.sec2-rating  .sec2-rating-bot li{width: 100%;float: left;}
.sec2-rating  .sec2-rating-bot li{margin-bottom: 10px;}
.sec2-rating-bot li{height: 40px;}
.sec2-rating .rat{    display: inline-block;
    width: 15%;
    text-align: left;
    line-height: 40px;
    padding-bottom: 0px;
	border-bottom: 0px;
}
.sec2-rating .str{
	float: left;
	display: inline-block;
    width: 15%;
    text-align: left;
    line-height: 40px;
    padding-bottom: 0px;
    border-bottom: 0px;
}

.sec2-rating .ratBar{
 	display: inline-block;
    width: 50%;
    height: 40px;
    background: #d4d3d9;
}

.sec2-rating  .str-5 .ratBar{
	background: #fff;
}


.sec2-rating  .str-3 .ratBar,.sec2-rating  .str-2 .ratBar,.sec2-rating  .str-1 .ratBar{
    width: 15%;
}

	
.star-ioncs14:before {
    content: "\f005\f005\f005\f005\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}

.star-ioncs5:before {
    content: "\f005\f005\f005\f005\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}
.star-ioncs4:before {
    content: "\f005\f005\f005\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}
.star-ioncs3:before {
    content: "\f005\f005\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}
.star-ioncs2:before {
    content: "\f005\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}
.star-ioncs1:before {
    content: "\f005";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;    color: #636;font-size:17px;
	
}

.detailStars:before{
	color:#fff !important;
}

	
	#home_news_section .news-section-body{height:360px;}
	#home_news_section .news{border-bottom:0px;}
	
	.reviewBtn{
	background: #643466;
	color:#fff;
	display: block;
}

.detail-section4{
	background-color: #77b7e7;margin: 0px;padding: 20px 28px;
	    width: 100%;
    float: left;
}

#reviewMsg{
	margin-bottom:5px;
}

.write-review h3{    color: #fff;
    font-weight: 100;
padding-bottom: 20px;}


.write-review  textarea{padding:10px;}

.write-review  select option{padding:5px;}

.write-review  input{padding:5px;}

.ratings_comments{
	background: #E66432;padding:20px;
	width: 100%;
	float: left;
}
.ratings_comments ul li{
	width: 100%;
	float: left;
	padding:10px 0px;
	border-bottom: 1px solid #ccc;
}

.ratings_comments ul li:last-child{
	border-bottom: 0px;
}

.profileP{
    width: 10%;
    float: left;
    margin-right: 20px;
}

.profileP img{
	width: 50px;
	height: 50px;
}
.commnt_rting{
	color:#fff;
	width: 50%;
	float: left;
}

.commnt_rting .star-ioncs14{
	float: none;
}

.commnt_rting .star-ioncs14:before{
	color:#fff;
}

.commnt_rting .star-ioncs5:before{
	color:#fff;
}
.commnt_rting .star-ioncs4:before{
	color:#fff;
}
.commnt_rting .star-ioncs3:before{
	color:#fff;
}
.commnt_rting .star-ioncs2:before{
	color:#fff;
}
.commnt_rting .star-ioncs1:before{
	color:#fff;
}


.ratng_date{
	width: 20%;
    float: right;
    color: #fff;
	
}

.detail-section2{background-color: #7be6c8;margin:0px;padding: 20px 28px;    width: 100%;
    float: left;}
	
.detail-section2 .cont{
	max-height: 335px;
	height:auto;
	overflow:auto;
}
.detail-section2 .cont::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.detail-section2 .cont::-webkit-scrollbar
{
	width: 6px;
	height:10px;
	background-color: #F5F5F5;
}

.detail-section2 .cont::-webkit-scrollbar-thumb
{
	background-color: #000;
	border: 2px solid #555555;
}
    
	
	
.detail-section2 .col-md-3{width:300px;}
.detail-section2 > h3{color: #fff;font-weight: 100;padding-bottom: 10px;}
.detail-section2 > p{padding-bottom: 10px;color:#fff;}



.detail-section2 .carousel-reviews.broun-block .col-md-4{width: 250px;float:left;}
.reveiews{    color: #302a3d;
    font-weight: 500;
    padding-bottom: 0px;
    font-size: 28px;
    margin-bottom: 5px;}
.parlorem{padding-bottom: 25px;
    color: #302a3d;
    font-weight: 500;
    font-size: 16px;}
	
	.det-sec2-col{background: #E66432;padding: 15px;height: 460px;color:#fff;}
.det-sec2-col h5{color: #fff;padding-bottom: 5px;}
.det-sec2-col span{display: block;padding-bottom: 5px;width: 100%;}
.det-sec2-col .star-ioncs14:before{color:#fff;}
.det-sec2-col .star-ioncs5:before{color:#fff;}
.det-sec2-col .star-ioncs4:before{color:#fff;}
.det-sec2-col .star-ioncs3:before{color:#fff;}
.det-sec2-col .star-ioncs2:before{color:#fff;}
.det-sec2-col .star-ioncs1:before{color:#fff;}

</style>

<br><br>

<div class="bg_white">
<div class="pet-bodypart2 container">


<div class="pet_houseku" id="home_news_section">

<div class="pet_house1 news-section mob-fliping">
    <h2>News Updates</h2>
  <div class="news-section-div">
   
     <div id="newsDiv" class="news-section-body">
	   <ul>
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
       foreach($results as $obj){
		   ?>
       <li>
	     <div class="news">
			 <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
			 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripcslashes($obj->title);?></a></h3>
			 <p><?php echo stripcslashes(substr($obj->description,0,148));?></p>
		   </div>
	   </li>
       <?php } ?>
      </ul>
     </div>
  </div>
</div>

<div class="pet_house2 mob-fliping" id="home-review-section">
<div class="detail-section2" >
    <div style="width: 100%;overflow-x: scroll;" class="dynamic_div_scroll">
	<h3 class="reveiews">REVIEWS</h3>
   		<p class="parlorem">Hey!!! All our furry friends want to thank you for your time. See what your friends has to say about us and please do not forget to leave your footmarks here.</p>
   <div class="dynamic_width_div">
   		<?php
	$feedbackResults =$wpdb->get_results("SELECT count(*) as totalfeedback, SUM(rating) as total_rating FROM twc_feedback ");
	$feedbackResult =$feedbackResults[0];
	$rating5 =($feedbackResult->total_rating/2);
	$averageFeedback =ceil($rating5/$feedbackResult->totalfeedback);
		   
		  ?>

   		<div class="detail-section2-cols row">
			<div class="col-md-3 col-sm-3 col-xs-3 det-rat-smry" style="float:left;">
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
					
	
			
		<div class="carousel-reviews broun-block feedbacks-block" style="float:left;">
		
		
		<div class="services_slider" >
	 
      
	         <?php 
                $feedResults =$wpdb->get_results("select * from twc_feedback where 1 ORDER BY date_time DESC LIMIT 4 ");				
				foreach($feedResults as $feedrow){
					$name=explode("@",$feedrow->email);
					?> 
	    <div class="slide_item">         
	       			<div class=" col-md-4 col-sm-4 col-xs-4">
				<div class="det-sec2-col">
				<h5><?php echo $name[0]; ?></h5>
				<span class="star-ioncs<?php echo ceil($feedrow->rating/2); ?>"></span>
				<span class="bkd_from"><?php echo $feedrow->email; ?></span>
				<span class="travld_Date"><?php echo date('l M d, Y',strtotime($feedrow->date_time));?></span>
				<p class="cont"><?php echo $feedrow->message; ?> </p>
                
				</div>
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

<style>

.bx-prev{
display:none;
}


.bx-next{
display:none;
}
</style>
<script>
  $(document).ready(function(){
       
	   if ($(window).width() > 480) {
		     
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
		}
		else {
		    
	  $('.services_slider').bxSlider({
		controls: true,
		pager:false,
		auto:true,
		moveSlides: 1,
		speed:'500',
		pause:'5000',
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
		slideMargin: 10,
	    slideWidth: 350,
	  });
		}
	  

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

<script type="text/javascript">

function serServices(){
   $('.ser_services').click(function(){
    var sid =$(this).attr('rel');
    $('#hiddenSID').val(sid);
    $('.city_pop_overlay').addClass('city_pop_show');
   })
	$('.city_pop_close').click(function(){
		$(this).parents('.city_pop_overlay').removeClass('city_pop_show');
	})
}
serServices();

$('#prime-nav li').addClass('ser_services');


</script>


<script>
	var width = 0;
	$('.slide_item > *').each(function() { width += $(this).outerWidth(); });
	$('#home-review-section .feedbacks-block.broun-block').width(width);
	var dynamiWidth = $('.det-rat-smry').outerWidth() + width;
	$('.dynamic_width_div').width(dynamiWidth);
</script>

<?php get_footer(); ?>