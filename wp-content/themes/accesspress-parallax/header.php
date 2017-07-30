<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package accesspress_parallax
 */
 global $wpdb;
 $results =$wpdb->get_results("select * from twc_service_category where published='Yes' and status_deleted=0");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.js"></script>
  
 <style>
 
 #masthead{
	 
	position:fixed !important;
	 z-index:998 !important;
         height:114px !important;   
 }
 
 </style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="<?php echo of_get_option('header_layout'); ?>">
		<div class="mid-content clearfix" style="margin-top:-14px;">
		<div id="site-logo" style="width:25%;float:left;">
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php else:?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
		
		</div>
	
		
		<?php include 'searchbox.php';?>


<div id="signup_login" style="width:20%;float:left;margin-top:25px;">
		
		<i class="fa fa-user-plus" aria-hidden="true" style="font-size:16px;margin-right:5px;color:
#F47555;text-decoration:none;"></i><a href="<?php echo esc_url( home_url( '/' ) ); ?>register/" style="margin-right:20px;color:
#F47555;text-decoration:none;">SIGNUP</a>
	
		
		<?php
		if(isset($_SESSION['is_logged_in']))
		{
			
	
		?>

<!--<a href="<?php //echo esc_url( home_url( '/' ) ); ?>logout/">LOGOUT</a>-->

<i class="fa fa-sign-in" aria-hidden="true" style="font-size:16px;margin-right:5px;color:
#F47555;text-decoration:none;"></i><a style="color:
#F47555;text-decoration:none;" href="<?php echo wp_logout_url( home_url('/logout/') ); ?>">LOGOUT</a>
<?php		
		}
		else
		{
?>			
			
		<i class="fa fa-sign-in" aria-hidden="true" style="font-size:16px;margin-right:5px;color:
#F47555;text-decoration:none;"></i><a style="color:
#F47555;text-decoration:none;" href="<?php echo esc_url( home_url( '/' ) ); ?>login/">LOGIN</a>		
<?php

		}
		
		
		?>
		</div>
				
      </div>	
		<nav id="site-navigation" class="main-navigation">
		<div class="menu-toggle"><?php _e( 'Menu', 'accesspress-parallax' ); ?></div>
					
			<?php 
			$sections = of_get_option('parallax_section');
			if((of_get_option('enable_parallax') == 1 && of_get_option('enable_parallax_nav') == 1) || (is_page_template('home-page.php') && of_get_option('enable_parallax_nav') == 1)):
			?>
			<ul class="nav single-page-nav">
				<?php
				$home_text = of_get_option('home_text');
				if(of_get_option('show_slider')== "yes" && !empty($home_text)) : 
					if(function_exists('pll__')){
						$home_text = pll__($home_text);
					}
					?>
					<li class="current"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#main-slider"><?php echo esc_html($home_text); ?></a></li>
				<?php endif;
				
				if(!empty($sections)):
				foreach ($sections as $single_sections): 
					if($single_sections['layout'] != "action_template" && $single_sections['layout'] != "blank_template" && $single_sections['layout'] != "googlemap_template" && !empty($single_sections['page'])) :
						if(function_exists('pll_get_post')){
							$title_id = pll_get_post($single_sections['page']);
							$title = empty($title_id) ? get_the_title($single_sections['page']) : get_the_title($title_id);
						}else{
							$title = get_the_title($single_sections['page']); 
						}	
						?>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#section-<?php echo $single_sections['page']; ?>"><?php echo esc_html($title); ?></a></li>
					<?php 
					endif;
				endforeach; 
				endif; ?>
			</ul>
			<?php	
			else: 
				wp_nav_menu( array( 
				'theme_location' => 'primary' , 
				'container'      => false
				) );
			endif; ?>
		
		</nav><!-- #site-navigation -->
		</div>


		<?php 
		if(of_get_option('show_social') == 1):
			do_action('accesspress_social');
		endif; ?>
	</header><!-- #masthead -->

	<?php 
	$accesspress_show_slider = of_get_option('show_slider') ;
	$content_class = "";
	if(empty($accesspress_show_slider) || $accesspress_show_slider == "no"):
		$content_class = "no-slider";
	endif;
	?>
	<div id="content" class="site-content <?php echo esc_attr($content_class); ?>">
	<?php 
	if(is_home() || is_front_page()) :
		do_action('accesspress_bxslider'); 
	endif;
	?>

	
<script>



$('#basic-addon2').click(function(){
	if($('#searchName').val()==''){
		//alert('Please select category and your city name.');
		alert('Please enter city name for search');
		$('.err_searchName').show(1).delay(2000).hide(1);
		$('#searchName').focus();
		return false;
	}
	else{
		var city=$('#searchName').val();
		var sid = $('#sel_category').val();
		//alert(sid);
		window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sid+"&destName="+city;
		}	
	});
	
	 $('.pet-groomsv-criteria').click(function(){
	  $(this).toggleClass('pet-groomsv-criteria-open');
	 })	
	 
$('.pet-groomsv-criteria #categories li').click(function(){
	 var catLi = ($(this).find('.opt').text());
	  var id = $(this).attr('value');
	   $('#sel_category').val(id);
	 
	 $('.pet_g_crt').text(catLi);
});


</script>