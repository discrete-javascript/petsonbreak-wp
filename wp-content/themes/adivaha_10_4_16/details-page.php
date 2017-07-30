<?php 
session_start();
/**
 Template Name: Details Page
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
global $mk_options;
global $wpdb;

$product_id =$_REQUEST['id'];

$objs =$wpdb->get_row("select * from twc_vendor_services where id='".$_REQUEST['id']."'");
$sid =$objs->service_category;
$userid =$objs->vendor_id;

$extQuery ='';
if($_REQUEST['destName']!=''){
  $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'"; 
}

$rResults =$wpdb->get_results("select * from twc_review where product_id='".$product_id."' and  published='Yes' and status_deleted=0 order by date_time DESC");
$rResult=$rResults[0];
$messageReview=$rResult->message;


$service_ofrdresults =$wpdb->get_results("select * from twc_vendor_services where id='".$_REQUEST['id']."'");
foreach($service_ofrdresults  as $service_ofrdresult){
		$offerd='';
		$service_offered =explode(",",$service_ofrdresult->service_offered);
		$service_offered_count=count($service_offered);
		for($i=0; $i < $service_offered_count; $i++){
		  $offerdName = getFieldByID('title','twc_manage_offered',$service_offered[$i]);
		  $offerd.=$offerdName.',';
		}
		$offerd =substr($offerd,0,-1);
	}
	
	
$ratingArr =array('5'=>'Perfect','4'=>'Good','3'=>'Average','2'=>'Not that bad','1'=>'Very Poor');	

?>

<div class="container detail-container">
   <div class="detail-section1">
   	<div class="pet-search-left details-page35">
      <div class="pet-search-left_Top">
         	<div class="pet-child-left">
			<div class="dt-img1">
				<img src="<?php echo get_template_directory_uri()?>/uploads/<?php echo $objs->image_path; ?>" alt="">

				<div class="pet-child-left-content">
  				  <h3><?php echo $objs->title;?></h3>
  				  <p class="star-ioncs14"></p>
  				  <p><?php echo $objs->address;?></p>
				  <?php if($objs->on_call=='Yes'){
					    echo '<p>'.$objs->contact.'</p>';
				      }?>
				</div>
			</div>
		</div>
		
		<div class="pet-child-right">
		    <h3>Why do we use it?</h3>
			<p><?php echo $objs->description;?></p>
		</div>
    </div>

      <div class="pet-search-left_Bot">
      	<div  class="pet-search-left_Bot_row">

         
   <?php 
     $galleryResults =$wpdb->get_results("select * from twc_vendor_gallery where vendor_service_id='".$product_id."'");
     $imageResults=$galleryResults[0];
     $imageResult=$imageResults->image;
  if($imageResult!=""){ ?>
		
		<div class="col-md-4 pet-search-lft">
          		<div id="pet-search-lft-carousel" class="carousel slide" data-ride="carousel">
				<!--
                <ol class="carousel-indicators">
                    <li data-target="#pet-search-lft-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#pet-search-lft-carousel" data-slide-to="1"></li>
                    <li data-target="#pet-search-lft-carousel" data-slide-to="2"></li>
                </ol>-->
			 <div class="carousel-inner">
			       <?php 		   
				   $i=0;
				   foreach($galleryResults as $galleryResult){
					 if($i==0){$active ='active';} else{$active='';} 
					   ?>
                    <div class="item <?php echo $active;?>">
                        <img src="<?php echo get_template_directory_uri()?>/images/vendor_pets/vendor_thumbs/<?php echo $galleryResult->image; ?>" width='300px' height='250px' alt="First slide">
                    </div>
				   <?php $i++;}?>
					
			 </div>
                <a class="left carousel-control" href="#pet-search-lft-carousel" data-slide="prev">
                    <span class="fa fa-chevron-circle-left"></span></a>
				<a class="right carousel-control" href="#pet-search-lft-carousel" data-slide="next">
				</span><span class="fa fa-chevron-circle-right" style="position: relative;top: 7em;right: -13px;"></span></a>
            </div>
          </div>
 <?php } ?>
		

          <div class="col-md-4 pet-search-mid">
      		    <h5>More Information</h5>
           		<ul>
 					   <li>Hours of Operation -<span><?php echo $objs->time_from ; ?> - <?php echo $objs->time_to ; ?></span></li>
					    <li>Contact No        - <span><?php echo $objs->contact;?></span></li>
					    <li>Card Accepted     - <span>[<?php echo $objs->payments;?>]</span></li>
					    <li>Available On Call - <span>[<?php echo $objs->on_call;?>]</span></li>
			            <li>Service Offered   - <span></span><?php echo $offerd;?></li>
					    
           		</ul>

          </div>

           <div class="col-md-4 pet-search-rht">
                <h5>Also Listed in</h5>
           		<ul>
				<?php
				$listed_results =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$userid."' and id!='".$_REQUEST['id']."' ".$extQuery."");
				foreach($listed_results as $objrow){ 
				$link =site_url().'/details-page/?id='.$objrow->id; ?>
				
	            <li> <a href="<?php echo $link;?>"><?php echo $objrow->title;?></a></li>	
				
				<?php } ?>
           		</ul>
          </div>


        </div>

      </div>

	
	</div>
	
	
	<div class="pet-search-right">
		<?php  echo getPopularCategories();?>
	</div>
   </div>

   <?php if($messageReview!=""){ ?>
   <div class="detail-section2">
    <div style="width: 100%;overflow-x: scroll;">
   <div style="width: 10000px;">
   		<h3 class="reveiews">REVIEWS</h3>
   		<p class="parlorem">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

   		<div class="detail-section2-cols row">
			<div class="col-md-3">
					<div class="det-sec2-col sec2-rating">
   			        	<div class="sec2-rating-top">
   			        	    <h3><?php echo $objs->avg_rating ; ?></h3>
   			        	    <p class="star-ioncs<?php echo $objs->avg_rating ;?>"></p>
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
					
	
			
		<div class="carousel-reviews broun-block">
		
		
		<div class="services_slider_notuse">
	 
      <div class="slide_item">
	       <?php foreach($rResults as $robj) {?>
			<div class=" col-md-4">
				<div class="det-sec2-col">
				<h5><?php echo $robj->title;?></h5>
				<span class="star-ioncs<?php echo $robj->rating ;?>"></span>
				<span class="bkd_from"><?php echo $robj->email;?></span>
				<span class="travld_Date"><?php echo date('l M d, Y',strtotime($robj->date_time));?></span>
				<p class="cont"><?php echo $robj->message;?></p>
				</div>
				</div>
           <?php }?>
        </div>
		

        </div>
		
			</div>
		
	
   </div>
   		</div>
		
		</div>

   </div>
   <?php } ?>


      <div class="detail-section4">
     <div class="row">
        <div class="col-md-6">
     <form name="frmReview" id="frmReview">
       <input type="hidden" name="user_id" value="<?php echo $userID;?>">
       <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
          <div class="write-review">
            <h3>Add a Review</h3>
            <div id="reviewMsg"></div>
            <div class="write-review-form">
              <div class="form-group">
                <label>Your Rating</label>
               <select name="rating" id="rating">
          <option value="">Rate…</option>
          <option value="5">Perfect</option>
          <option value="4">Good</option>
          <option value="3">Average</option>
          <option value="2">Not that bad</option>
          <option value="1">Very Poor</option>
        </select>
              </div>  

              <div class="form-group">
                <label>Your Review</label>
                <textarea class="form-control" name="message" id="message" rows="8"></textarea>
                </select>
              </div>


              <div class="form-group">
                <div class="row">
                   <div class="col-md-4">
                     <div class="dv">
                   <label>Name</label>
                   <input type="text" name="user_name" id="user_name"  value="<?php echo $display_name;?>" class="form-control">
                   </div>
                   </div>

                    <div class="col-md-4">
                     <div class="dv">
                   <label>Email</label>
                   <input type="email" name="user_email" id="user_email" value="<?php echo $user_email;?>" class="form-control">
                   </div>
                   </div>

                    <div class="col-md-4">
                     <div class="dv">
                   <label>&nbsp;</label>
                   <input type="button" class="reviewBtn btn btn-primary" id="reviewBtn" value="SUBMIT">
                   </div>
                   </div>

                </div>
               
               
               
              </div>

            </div>

          </div>
           </form> 
        </div>
    
	<?php if($messageReview!=""){ ?>
       <div class="col-md-6">
          <div class="ratings_comments">
            <ul>
             <?php  foreach($rResults as $robj){ ?>
       	      <li>
				<div class="profileP">
				<img src="<?php echo get_template_directory_uri();?>/images/profile-round.png"/>
				</div>
				<div class="commnt_rting">
				<p><?php echo $robj->title;?> <span class="star-ioncs<?php echo $robj->rating ;?>"></span></p>
				<p><?php echo $robj->email;?></p>
				<p><?php echo $ratingArr[$robj->rating] ; ?><p>
				</div>
				<div class="ratng_date">
				<?php echo date('d M Y',strtotime($robj->date_time));?>
				</div>
		     </li>
              <?php }?>
            </ul>
          </div>

        </div>
		
	<?php } ?>
		
     </div>
   </div>

   
   <div class="detail-section3">
   		<h3>SIMILAR PET SERVICES</h3>
   		<div class="detail-section3-cols row">
		  <div class="services_slider">
	   <?php
        $similarResult = $wpdb->get_results("select * from twc_vendor_services where service_category='".$sid."' and id!='".$_REQUEST['id']."' ".$extQuery."");
		$similarData =array_chunk($similarResult,4);
		//echo "<pre>";
		//print_r($similarData);
		foreach($similarData as $dataArr){?>
		  <div class="slide_item">
			   <?php foreach($dataArr as $objs) {?>
				<div class="col-md-3">
					<div class="det-sec3-col">
					   <div  class="sec3-top">
						 <img src="<?php echo get_template_directory_uri()?>/uploads/<?php echo $objs->image_path; ?>" width='200' height='200' alt="">
					   </div>
					   <div class="sec3-bot">
						  <h3><?php echo $objs->title;?></h3>
						  <p class="serv-add"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> <?php echo $objs->address ;?></p>
						  <span class="star-ioncs<?php echo $objs->avg_rating; ?>"></span>   			  	      
						  <p class="ser3-btn"><a href="<?php echo site_url();?>/details-page/?id=<?php echo $objs->id;?>" class="bstDeal-btn">More Info</a></p>
					   </div>
				   </div>

				</div>
			   <?php }?>
			</div>
		<?php }?>	

        </div>
			
   		</div>

   </div>
   
   
   
   

   <!--<div class="detail-section3">
   		<h3>SIMILAR PET SERVICES</h3>
   		<div class="detail-section3-cols row">
		 
          <?php
        $similarResult = $wpdb->get_results("select * from twc_vendor_services where service_category='".$sid."' and id!='".$_REQUEST['id']."' ".$extQuery."");
		  foreach($similarResult as $petsimResult){ ?>
		  
			<div class=" col-md-3 col-sm-4 col-xs-12">
   			    <div class="det-sec3-col">
   			  	   <div  class="sec3-top">
   			  	   		<img src="<?php echo get_template_directory_uri()?>/uploads/<?php echo $petsimResult->image_path; ?>" width='200' height='200' alt="">
   			  	   </div>
   			  	   <div class="sec3-bot">
   			  	      <h3><?php echo $petsimResult->title ;?></h3>
   			  	      <p class="serv-add"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> <?php echo $petsimResult->address ;?></p>
					  <span class="star-ioncs<?php echo $petsimResult->avg_rating; ?>"></span>
   			  	      <p><a href="<?php echo site_url();?>/details-page/?id=<?php echo $petsimResult->id;?>" class="bstDeal-btn">More Info</a></p>
   			  	   </div>
			   </div>

   			</div>
		  <?php } ?>
		  
   		</div>

   </div>-->


</div>

<script>
  $(document).ready(function(){
    $('.services_slider').bxSlider({
    controls: true,
	autoControls: true,
    pager:false,
	 infiniteLoop: false,
	 touchEnabled:false
    });
  });
 
</script>


<style>

 
</style>

<?php get_footer(); ?>
<script>
$('#reviewBtn').click(function(){
	if($('#rating').val()==''){
		alert('Please select rating');
		$('#rating').focus();
		return false;
	}
	else if($('#message').val()==''){
		alert('Please enter your message');
		$('#message').focus();
		return false;
	}
	else if($('#user_name').val()==''){
		alert('Please enter your name');
		$('#user_name').focus();
		return false;
	}
	else if($('#user_email').val()==''){
		alert('Please enter your email id');
		$('#user_email').focus();
		return false;
	}
	else{
		var frm_Data =$("#frmReview").serialize();
		$.ajax({
		type: "POST",
		url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
		data: 'action=AddReview&'+frm_Data,
		success: function(Data){
			if(Data==1){
				$('#reviewMsg').html('<span class="success">Review has added,Admin will approve it</span>');
			}else{
			  $('#reviewMsg').html('<span class="error">Action failed try again</span>');	
			}
		}
	   });	
	}
})
</script>

<style>
#carousel-reviews{    float: right;
    width: 73%;
    margin-right: 15px;}
#carousel-reviews .col-md-3{ width: 33%; float: left;}
#carousel-reviews .fa-chevron-circle-right{position: relative;top: 10em;left: 48px;}
#carousel-reviews .fa-chevron-circle-left{position: relative;top: 10em;right: 48px;}
#pet-search-lft-carousel .fa fa-chevron-circle-right{position: relative;top: 7em;right: 13px;}
#pet-search-lft-carousel .carousel-inner,#pet-search-lft-carousel .item,#pet-search-lft-carousel .item img{height:100%;}
#pet-search-lft-carousel .fa-chevron-circle-left{position: relative;top: 7em;right: 13px;}
#pet-search-lft-carousel{    position: relative;  height: 298px;    overflow: hidden;}




.detail-section2>div{padding-bottom:25px;}


.detail-section2>div::-webkit-scrollbar {
    width: 1em;height:5px;
	
}
 
.detail-section2>div::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background:#fff;

	
}
 
.detail-section2>div::-webkit-scrollbar-thumb {
  background: #302A3D;
border-radius: 0;
filter: alpha(opacity=100);
opacity: 1;
cursor: pointer;
width: auto;
top: 0;

}


</style>


