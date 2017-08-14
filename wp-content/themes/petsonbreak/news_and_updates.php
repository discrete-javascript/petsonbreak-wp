<?php 
/**
 Template Name: News Listing
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



<div class="terms_conditions news-listing"   style="background: #fff;">
	<div class="container search-vendor-container">
		<div class="con_left">
						<div id="petBrd-page-wrap">
		  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">News and Updates</a></li>
				</ul>
			</div>
		<div class="pet-search-left">


      <div class="news-header">
        <h2>News and Updates</h2>
      </div>

  <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
       foreach($results as $obj){ ?>
       <div class="news-list" id="hash_<?php echo $obj->id;?>">
	     <div class="news-list-col">
          <h3><span class="news-title"></span>
		 <?php echo stripcslashes($obj->title);?></a></h3>
          <p><?php echo stripcslashes($obj->description);?></p>
          </div>
       </div>
       <?php } ?>
	 </div>
	 </div>
	 <div class="con_right">
	     <div class="pet-search-right">
			<?php  echo getPopularCategories();?>
	   </div>
		
	   <div id="quick_links">
		 <?php  echo getQuickLinks();?>
	   </div>
	   
	   <div class="cat-image">
	      <img src="<?php echo get_template_directory_uri();?>/images/kittens.jpg"/>
	   
	   </div>
				
		</div>
	</div>

</div>

<?php get_footer(); ?>





<script type="text/javascript">

 /*
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 250;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.news-list-col p').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
*/
</script>


<script type="text/javascript">
  
 $(document).ready(function() {

  $('html, body').animate({
        scrollTop: $("#hash_<?php echo $_REQUEST['id'];?>").offset().top-20
    }, 2000);
  
  
 });
  
</script>