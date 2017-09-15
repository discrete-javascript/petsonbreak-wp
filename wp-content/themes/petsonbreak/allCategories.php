<?php 
/**
 Template Name: All Categories
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

/* $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
echo"<pre>";
print_r($results); die; */


$extQuery ='';
if($_REQUEST['sid']!=''){
 $extQuery.=" and service_category='".$_REQUEST['sid']."'";	
}
if($_REQUEST['destName']!=''){
 //$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
  $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'"; 
}

$serviceTitle ='';
if($_REQUEST['sid']!='' && $_REQUEST['destName']!=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']). ' in ' .$_REQUEST['destName'];	
}
elseif($_REQUEST['sid']!='' || $_REQUEST['destName']=''){
 $serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']);
}
elseif($_REQUEST['destName']!='' || $_REQUEST['sid']=''){
  $serviceTitle.=$_REQUEST['destName']; 
}
else{
	$serviceTitle.='Pet Services';
}

?>

<div id="allCat">
    <div class="parallax-all-categories-frame">
    <div class="parallax-all-categories-title">
                <p>Explore our Pet Friendly World - Pet Related services</p>
    </div>
</div>
<div class="container" style="display: flex;" >

<?php if($_REQUEST['sid']!=''){ ?>

	<div class="all-categories-container con_left"> 
				<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#"><?php echo $serviceTitle;?></a></li>
				</ul>
			</div>
	   <div class="news-header">
        <h2><?php echo $serviceTitle ; ?></h2>
      </div>
	   <div id="all_categories">
	   	  <div class="row">
		  
		  <?php 
            $weekresults =$wpdb->get_results("select * from twc_petfriendly_destination where 1 ".$extQuery." ".$extrCond."");
			foreach($weekresults as $weekrow){
            // $link =site_url().'/search-vendor/?sid='.$weekrow->service_category;
			 $link =site_url().'/search-vendor/?sid='.$weekrow->service_category.'&destName='.$weekrow->destination;
			 ?>
			 
		  
	   	     <div class="col-md-3 col-sm-3 col-xs-6">
	   	       <div class="cat_colm">
	   	          <div class="" rel="<?php echo $weekrow->service_category;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $weekrow->img_path;?>);background-size:cover;">
				   
                   <div class="home-slider-offer desc">
                      <a href="<?php echo $link;?>" class="text-center">
                        <h4><?php echo $weekrow->title;?></h4>
                        <h6><?php echo $weekrow->destination;?></h6>
                      </a>
                   </div>
                  
	   	          </div>
	   	       </div>
	   	     </div>
                <?php } ?>
	   	  </div>
	   </div>
  
	</div>
	
	<?php }  else { ?>
	
	<div class="all-categories-container con_left"> 
	   				<div id="petBrd-page-wrap">
	  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">Pet Related Services</a></li>
				</ul>
			</div>
	
	   <div class="news-header">
        
      </div>
	   <div id="all_categories">
	   	  <div class="row">
		  
		  <?php 
            $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 ORDER BY sorting ASC");
			foreach($results as $objrow){
             $link =site_url().'/search-vendor/?sid='.$objrow->id;?>
		  
	   	     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	   	       <div class="cat_colm">
	   	          <div class="ser_services" rel="<?php echo $objrow->id;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objrow->category_image;?>);background-size:cover;">
				   
                   <div class="home-slider-offer desc">
                       <a href="javascript:void();" class="text-center">
                           <h4><?php echo $objrow->title;?></h4>
                           <h6><?php echo $objrow->description;?></h6>
                       </a>
                   </div>
                 
	   	          </div>
	   	       </div>
	   	     </div>
                <?php } ?>
	   	  </div>
	   </div>
  
	</div>
	
	<?php } ?>
	

</div>
</div>



</div>

<style>

</style>






<?php get_footer(); ?>

<script>
 $('#vendor_login').click(function(){
	  var frmdata =$('#loginform').serialize();
		 $.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=VendorLogin&"+frmdata,
			 success: function(Data){
				if(Data=='0'){ 
				   alert('Information wrong');
				 }
				 else if(Data=='Inactive'){ 
					alert('Account not active');
				 }
				else if(Data=='Administrator'){ 
				 window.location.href="<?php echo site_url();?>/wp-admin/index.php";		
				 }
				else if(Data=='Vendor'){ 
				   window.location.href="<?php echo site_url();?>/booking/?type=profile";
				 }
				 else{
					 window.location.href="<?php echo site_url();?>/member-profile/?type=profile"; 
				 }
			  }
		 })
 });		 
</script>

