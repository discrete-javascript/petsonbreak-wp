<?php
/**
 Template Name: Vendor Forgot Password
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
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="container" id="forg_pass">
<div class="con_left">
<div id="new_from">	
<form class="ui form new_from1">

 
  <div class="field">
    <h2 class="register-page1">Forgot your password?</h2>
   
  </div>

  <div class="field">
    <label>Enter your email address</label>
    <input name="email" placeholder="Email Address" id="email" type="text">
	<div id="txt" class="Err" style="color:red;">   </div>
  </div>

  <input type="button" value="Sniff" id="fotpass" class="btn btn-default btn-lg btn-block">

</form>

</div>
</div>

	<div class="con_right">

		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
	    <div id="quick_links">
			<?php echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates">
		<h2><?php echo $mk_options['latest_news'];?></h2>
			<div class="pet_house1 news-section">
    
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
<?php include(TEMPLATEPATH."/includes/footer.php");?>
<script>
 $('#fotpass').click(function(){
	// alert("dfasgdfgdf");
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	if($('#email').val()=="")
      {
      $("#txt").html('Please type your email-id.');
	  $('#email').focus();
	  return false;
      }
	  else if (!re.test($("#email").val()))
     {
      $("#txt").html('Please enter a valid email address.');
      $('#email').focus();
      return false;
     }
	 else{
          $.ajax({
			     type: "POST",
			     url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			     data: "action=forgotPassword&email="+$('#email').val(),
			     success: function(Data){
                 
				 window.location.reload();
				// window.location.href="<?php echo site_url();?>/vacationer-login/";
 
			  },
    	  })
	    }  
	});

</script>
<?php get_footer(); ?>

