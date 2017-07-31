<?php include('../../../../wp-load.php');
	  global $wpdb;
?>
<div class="container-fluid bg_white border-top-solid">
	<div class="container">
		<div class="col-md-12">
		  <div class="dibba1">
			 EAN Theme gives	    <span>your customer: </span> </div>
		  <div class="dibba2">
		  The Best Selection	   <span>
		   More than 300, 000 options world wide.	  </span></div>
		  <div class="dibba3">
		  Lowest Price	   <span>  We guarantee it!</span></div>
		  <div class="dibba4">
		  Fast &amp; Easy Booking	   <span>Book online to lock in your tickets.</span></div>
		  <div class="clear"></div>
		</div>
	</div>

</div>
<?php  if (have_posts()) : echo "kkkkkkkkkkkkkk";
		while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
<?php endwhile; endif; ?>
