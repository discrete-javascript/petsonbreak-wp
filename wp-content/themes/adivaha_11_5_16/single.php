<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$post_id = global_get_post_id();
$feat_img =wp_get_attachment_url( get_post_thumbnail_id($post_id) );
 
get_header(); ?>


<link href="<?php echo get_template_directory_uri();?>/css/blog.css" rel="stylesheet"/>

<div id="blog-detail-page">

<div class="contPoplser">
<div class="container">
		<div class="row"><div class="col-md-12"><h1><?php the_title(); ?></h1></div></div>
<div class="row">
  <div class="col-md-6">
   <ul class="brtarc">
	<li><?php custom_breadcrumbs(); ?></li>
   </ul>
  </div>
</div>
</div>
</div>
	<div class="container blog-det-container">
	<div class="row">
	<div class="col-md-9">
	       <?php
			// Start the loop.
			while ( have_posts() ) : the_post();?>
		
	 		<div class="blog-det-article-media"><img src="<?php echo $feat_img;?>"></div>
			<p class="txt-o"><?php the_content();?></p>
			
			<div class="share-1">Share this</div>
			<div class="social-icons">
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58de03dd5e774692"></script> 
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
			</div>
			<div class="blog-det-commnts">
		   <div class="row">
		      <div class="col-md-12">
	          <?php comments_template( '/includes/mycomments.php' ); ?> 
			  
			  </div>
			  <div class="col-md-12">
			  <?php 			// Previous/next post navigation.
			 the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );?>
			  </div>
	       </div>
		   </div>
		<?php 
		// End the loop.
		endwhile;
		?>
   </div>
     <div class="col-md-3 boder_right1">
	 <?php echo get_sidebar(); ?>
   </div>
   </div>
   </div>
</div>
	
<?php get_footer(); ?>

