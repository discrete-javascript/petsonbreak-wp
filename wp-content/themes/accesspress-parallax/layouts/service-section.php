<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>


<style>

#section-99 .service-listing{

width:100%;
}

#section-99 .mid-content{

margin-top:-60px;


}

#section-99{
margin-bottom:-60px;

}

</style>

	<div class="service-listing clearfix col-xs-offset-1">
	<?php 
		


$args = array(
			'cat' => $category,
			'posts_per_page' => -1
			);
		$count_service = 0;
		$query = new WP_Query($args);




		if($query->have_posts()):
			$i = 0;
            while ($query->have_posts()): $query->the_post();

$postsxx = $query->posts[$count_service];

$post_id = $postsxx->ID;
$dataxx =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0 AND post_id='$post_id'");

$sid = $dataxx[0]->id;

            $i = $i + 0.25;
			$count_service++;
			$service_class = ($count_service % 2 == 0) ? "odd wow fadeInRight" : "odd wow fadeInRight";
		?>

		<div class="clearfix service-list <?php echo esc_attr($service_class); ?>" data-wow-delay="<?php echo $i; ?>s">
			<div class="service-image" style="float:left;">
				<?php if(has_post_thumbnail()) : 
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail'); ?>
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="<?php the_title(); ?>">
				<?php endif; ?>
			</div>

			<div class="service-detail" style="float:left;text-align:center;margin-top:20px;margin-left:2px;">
				<h3><a style="text-decoration:none;color:white;" href="search-vendor/?sid=<?php echo $sid; ?>&destName="><?php the_title(); ?></a></h3>
				<div class="service-content"><?php the_content(); ?></div>
			</div>
		</div>

		<?php 
		if($count_service % 4 == 0): ?>
			<div class="clearfix"></div>
		<?php endif;
		?>

		<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>
	</div>