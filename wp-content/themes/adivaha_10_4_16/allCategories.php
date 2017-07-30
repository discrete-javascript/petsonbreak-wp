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
?>

<div id="allCat">
<div class="container" style="display: flex;" >
	<div class="con_left"> 
	   <div class="news-header">
        <h2>All Categories</h2>
      </div>
	   <div id="all_categories">
	   	  <div class="row">
		  
		  <?php 
            $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
			foreach($results as $objrow){
             $link =site_url().'/search-vendor/?sid='.$objrow->id;?>
		  
	   	     <div class="col-md-6 col-sm-6">
	   	       <div class="cat_colm">
	   	          <div class="ser_services" rel="<?php echo $objrow->id;?>" style="background:url(<?php echo plugins_url(); ?>/ean_plugin/images/Category/<?php echo $objrow->category_image;?>);background-size:cover;">
				   
                   <div class="desc">
                      <h2><?php echo $objrow->title;?></h2>
                      <p><?php echo $objrow->description;?></p>
                   </div>
                   <div class="cat_overlay">
                     <a href="javascript:void();" class="cat_det"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                   </div>
	   	          </div>
	   	       </div>
	   	     </div>
                <?php } ?>
	   	  </div>
	   </div>
  
  
  
	</div>

	<div class="con_right">
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
		<div id="quick_links">
			<?php  echo getQuickLinks();?>
		</div>
		
				<div id="news_n_updates">
			<div class="pet_house1 news-section">
    <h2><?php echo $mk_options['latest_news'];?></h2>
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
          foreach($results as $obj){?>
       <div class="news">
         <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo $obj->title;?></a></h3>
         <p><?php echo substr($obj->description,0,150);?>...</p>
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

