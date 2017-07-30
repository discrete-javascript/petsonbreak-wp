<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); 
global $mk_options;

$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
$featured_image = $img[0];
?>

<link href="<?php echo get_template_directory_uri();?>/css/blog.css" rel="stylesheet"/>

<!-- Add Banner -->
<div id="blog-page">
<div class="blog-banner" style="background-image: url(<?php echo $featured_image;?>);">


   
		<div class="blog-banner-caption">
				<h3 class="ng-binding"><?php echo the_archive_title();?></h3>
				<p class="ng-binding"><?php echo the_archive_description();?></p>
		</div>



</div>
<!--
<div class="container-fluid bg_white border-top-solid">
	<div class="container">
		<div class="col-md-12">
		  <div class="dibba1" style="padding-left:0px !important; background-image:none !important;">
			 <?php echo $mk_options['banner_bhead_1'];?> <span><?php echo $mk_options['banner_bdesc_1'];?></span> 
		</div>
		<div class="dibba2" style="background: url(<?php echo $mk_options['banner_bicon_2'];?>) 17px 15px no-repeat;"><?php echo $mk_options['banner_bhead_2'];?><span><?php echo $mk_options['banner_bdesc_2'];?>	  </span></div>
		<div class="dibba3" style="background: url(<?php echo $mk_options['banner_bicon_3'];?>) 17px px no-repeat;">
		  <?php echo $mk_options['banner_bhead_3'];?><span><?php echo $mk_options['banner_bdesc_3'];?></span>
		</div>
		<div class="dibba4" style="background: url(<?php echo $mk_options['banner_bicon_4'];?>) 17px px no-repeat;">
		  <?php echo $mk_options['banner_bhead_4'];?><span><?php echo $mk_options['banner_bdesc_4'];?></span>
		</div>
		  <div class="clear"></div>
		</div>
	</div>
   </div>
   -->

<div class="container blog-main-container">
<div class="row">
<div id="primary" class="content-area col-md-9">

	  <ul id="blog-posts">
	   <?php
	       while ( have_posts() ) : the_post();?>
			 <li class="blog-posts-listing">
			 <div class="thumbnail_div">
				<div class="post_thumbnail"> <a href="<?php echo get_permalink();?>"><?php the_post_thumbnail('medium'); ?></a> </div>
				
	
				
				<div class="caption"> 
				 <h4><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h4>
				  <p class="bnt-ser"><a href="<?php echo get_permalink();?>" class="btn btn-primary" role="button">More Details</a></p>
				</div>
			  </div>
			  
			  
			  
			  
			</li>	   
			 
			<?php  
			 endwhile;
			 ?>
			<div class="clear"></div> 
	   </ul>

		<div class="paginationNextPrev">	   
	   <?php
	   the_posts_pagination( array(
				'prev_text'          => __( 'Prev', 'Adivaha' ),
				'next_text'          => __( 'Next', 'Adivaha' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text page-link">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );
	   ?>
	   
	   </div>
</div><!-- .content-area -->
	<div class="col-md-3 boder_right1">
	 <?php echo get_sidebar(); ?>
	</div>
	</div>
	</div>
</div>
<?php 

get_footer(); ?>
