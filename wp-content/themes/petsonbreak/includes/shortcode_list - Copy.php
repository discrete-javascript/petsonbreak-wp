<?php
/*
function toggle_inside( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => 'Toggle This',
      ), $atts ) );
      return do_shortcode('[toggle title="'.$title.'"]'.$content.'[/toggle]');
}
add_shortcode('toggle_inside','toggle_inside');

[toggle title="Guide Book on Topic X"]
  [toggle_inside title="Preface"]Initially hidden, expandable Preface text[/toggle_inside]
  [toggle_inside title="Introduction"]Initially hidden, expandable Intro text[/toggle_inside]
[/toggle]
*/

/*===== Boddy Section 2 === */

function boddySection2($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="main-block style-2 bg-grey clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="block-header">
		  <p class="home-icon1"><i class="fa fa-home" aria-hidden="true"></i></p>
          <h4 class="block-category">Check it Out</h4>
          <h2 class="block-title">'.$title.'</h2>
          <div class="block-text">'.$description.'</div>
        </div>
      </div>
    </div>
  </div>
</div>';
$html.='<div class="cont_text-width">
         <div class="container">
         <div class="row">
		  <div class="col-xs-12 make1 vacation-rental">
           <ul>';
  $html.=do_shortcode($content);
$html.='<div style="clear:both"></div></ul></div>
      </div>
      </div
    </div>';		 

 return $html;	  
	  
}
add_shortcode('boddySection2','boddySection2');

function subscetion2( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => 'title',
		  'description' => 'description',
		  'classname'=>'',
		  'star'=>'', 
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));

	  
  return '<div class="animated fadeInUp wow service-block col-xs-12 col-sm-6 col-md-3" data-animation-type="fadeInUp" style="animation-duration: 1s; visibility: visible;">
				<div class="service-entry">
					<p class="service-icon"><i class="fa '.$icon.'"></i></p>
					<p class="service-alt"><i class="fa '.$icon.'"></i></p>
					
					<h4 class="service-title">'.$title.'</h4>
					<div class="service-text">'.$description.'</div>
				</div>
			</div>';
			
/*			
return '<li class="'.$classname.'">
			<img src="'.$imagepath.'" alt="">
			<div class="vac-D">
				<div class="vac-D-round">
				<img src="'.get_template_directory_uri().'/images/img_profile.jpg"alt="">
				</div>
				<h2 class="vac-name">'.$title.'</h2>
				<h3 class="vac-name"> <img src="'.get_template_directory_uri().'/images/star-'.$star.'.png"> </h3>
				<div class="bnt-uppu"><a href="'.$linkurl.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read More</a></div>
			</div>
		</li>';	
*/		
			
}
add_shortcode( 'subscetion2', 'subscetion2' );



/*===== Boddy Section 3 === */

function boddySection3($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="container-fluid">
		 <div class="container popular-dest-head">
		  <div class="row">
			<div class="col-xs-12 make1">
			  <p style="margin-top: 30px; font-size: 40px ! important;">'.$title.'</p>
			</div>
			
			<div class="col-xs-12 make3">
			  <p>'.$description.'</p>
			</div>
		  </div>
		  </div>';
		$html.='<div class="container hom-323">
                  <div class = "row">';
				$html.=do_shortcode($content);
		 $html.='</div>
				</div>';
  $html.='</div>';	  
 return $html;	  
	  
}
add_shortcode('boddySection3','boddySection3');

function subscetion3( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
		  'price'=>'',
	      'star'=>'', 
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
  
  return '<div class = "col-md-4 animated wow fadeInUp  " data-animation-type="fadeInUp" style="animation-duration: 1s; visibility: visible;">
			<div class ="thumbnail-backg-3"> 
			  <div class ="thumbnail">
					 <a href="'.$linkurl.'">
					<img class="media-object"  src="'.$imagepath.'" data-lazy-src="false"> 
					</a></div>
					<div class="H3-days">
					 <a href="#">'.$description.'</a>
					</div>
					
					<div class = "caption">	
						 <div class="min_flt3"><h3>'.$title.'</h3>
						 <p class="min_3lf"><img src="'. get_template_directory_uri().'/images/star-'.$star.'.png" alt="..."></p>
						<p class="min_3lr">'.$price.'</p></div>
						</div>
			<div class="thumbnail-backg-3-overlay">
			     <a href="'.$linkurl.'"><i class="fa fa-search" aria-hidden="true"></i></a>
			</div>
			</div>
   </div>';
}
add_shortcode( 'subscetion3', 'subscetion3' );


/*===== Boddy Section 4 === */


function boddySection4($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="container-fluid tours-dest">
	<div class="container popular-dest-head">
	  <div class="row">
		<div class="col-xs-12 make1">
		  <p style="margin-top: 30px;  font-size: 40px ! important;">'.$title.'</p>
		</div>
		
		<div class="col-xs-12 make3">
		  <p>'.$description.'</p>
		</div>
	  </div>
	</div>
	</div>';
	
 $html.='<div class="container-fluid full-width-container ">';
   	$html.=do_shortcode($content);
 $html.='</div>';
   
	
 return $html;	  
	  
}
add_shortcode('boddySection4','boddySection4');

function subscetion4( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'title2' => '',
		  'description' => '',
		  'price'=>'',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
  
  return '<div class="col-md-4 destinations">
	     <div class="gal-col">
		    <a href="'.$linkurl.'"><img src="'.$imagepath.'" class="img-responsive" style="height:460px;"></a>
		 </div>
		 <div class="thumb_content fullwidth ">
		     <div class="thumb_title"><div class="tour_country">
	            		'.$title.'
	            	</div><h3>'.$title2.'</h3>
	          </div>
	          <div class="thumb_meta">
			      <div class="tour_days">
	            		'.$description.'
	              </div>
				  <div class="tour_price">
	            		'.$price.'
	              </div>
			 </div>
		 </div>
	  </div>';
}
add_shortcode( 'subscetion4', 'subscetion4' );


/*===== Boddy Section 5=== */


function boddySection5($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="container hp3CSS2 ">
		  <div class="row">
			<div class="col-xs-12 make1">
			  <h1 class="popular-p">'.$title.'</h1>
			</div>
			<div class="col-xs-12 make3">
			  <p>'.$description.'</p>
			</div>
			</div>';
	
  $html.='<div class="row">';
   	$html.=do_shortcode($content);
 $html.='</div>';
   
 $html.='</div>';
 
 return $html;	  
	  
}
add_shortcode('boddySection5','boddySection5');

function subscetion5( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
		  'position'=>'',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
		  
	$html='';	  
	if($position=='left'){	  
     $html.='<div class="div-flot-4">
	     <div class="animated fadeInUp wow destination-gal nee-destination-gal" style="width:100%;height: 580px; animation-duration: 1s; visibility: visible;" data-animation-type="fadeInUp">
		  <img class="img-resonsive media-object" src="'.$imagepath.'" alt="..."> 
		
		<div class="light-overlay">
		   <a href="'.$linkurl.'">  <div class="img-text-back">
		  <div class="img-text-3">
			<p>'.$title.' </p>
			<p>'.$description.'</p>
		  </div>
		  </div></a>
		</div>
		</div>
	   </div>';
	}
	
	if($position=='right_top'){	
	$html.='<div class="float-ril1" >'; // add float-ril1
	$html.='<div class="col-xs-12">
	  <div class="animated fadeInUp wow destination-gal" style="animation-duration: 1s; visibility: visible;" data-animation-type="fadeInUp"  ><img class="img-resonsive media-object" src="'.$imagepath.'" alt="..."> 
	
		<div class="light-overlay">
		  <a href="'.$linkurl.'"><div class="img-text-back">
		  <div class="img-text-3">
			<p>'.$title.'</p>
			<p>'.$description.'</p>
		  </div>
		  </div></a>
		</div>
		</div>
	</div>';
	}
  if($position=='right_bottom1'){	
	$html.='<div class="col-md-6 col-xs-12 " style="padding-right: 0px;">
     <div class="animated fadeInUp wow destination-gal"	style="animation-duration: 1s; visibility: visible; margin-top: 15px; height: 300px;" data-animation-type="fadeInUp">
	<img class="img-resonsive media-object" src="'.$imagepath.'" alt="..."> 
	 
		<div class="light-overlay">
		  <a href="'.$linkurl.'">  <div class="img-text-back">
		  <div class="img-text-3">
			<p>'.$title.' </p>
			<p>'.$description.'</p>
		  </div>
		  </div></a>
		</div>
	  </div>
	</div>';
	}
	if($position=='right_bottom2'){	
	$html.=' <div class="col-md-6 col-xs-12  " >
       <div class="animated fadeInUp wow destination-gal" data-animation-type="fadeInUp" style="animation-duration: 1s; visibility: visible; margin-top: 15px; height: 300px;">
	  <img class=" img-resonsive media-object" src="'.$imagepath.'" alt="..."> 
	
		<div class="light-overlay">
		   <a href="'.$linkurl.'">  <div class="img-text-back">
		  <div class="img-text-3">
			<p>'.$title.' </p>
			<p>'.$description.'</p>
		  </div>
		  </div></a>
		</div>
	  </div>
	  </div>';
	  
	  $html.='</div>';  // end float-ril1
	}
	
	
	
	return $html;

}
add_shortcode( 'subscetion5', 'subscetion5' );


/*===== Boddy Section 6 === */

function boddySection6($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="global-map-area section parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 81.9271px; margin-top: 70px;">
		  <div class="container">
			<div class="text-center description">
				<h1>'.$title.'</h1>
				<p>'.$description.'</p>
			</div>
			<br>';
	
 $html.='<div class="row image-box style8">';
   	$html.=do_shortcode($content);
 $html.='</div>';
 
$html.='</div>'; 
$html.='</div>'; 
	
 return $html;	  
	  
}
add_shortcode('boddySection6','boddySection6');

function subscetion6( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
  
  return '<div class="col-md-4">
			<article class="box animated fadeInUp wow" data-animation-type="fadeInUp" style="animation-duration: 1s; visibility: visible;">
				<figure>
					<span class="image-wrapper middle-block middle-block-auto-height" style="position: relative; height: 154px;">
						<img src="'.$imagepath.'" alt="" class="middle-item" width="100" height="172" >
						<span class="opacity-wrapper"></span>
					</span>
				</figure>
				<div class="details">
					<h2 class="box-title">'.$title.'</h2>
					<p>'.$description.'</p>
				</div>
				
			</article>
		</div>';
}
add_shortcode( 'subscetion6', 'subscetion6' );


/*===== Boddy Section 7 === */

function boddySection7($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="container-fluid">
		  <div class="container popular-dest-head">
			<div class="row">
			  <div class="col-xs-12 make1">
				<h1 class="popular-p">'.$title.'</h1>
			  </div>
			  <div class="col-xs-12 make3">
				<p>'.$description.'</p>
			  </div>
			</div>
		  </div>
		</div>'; 
	 $html.='<div class="container-fluid">
			  <div class="container popular-slides">
				<div class="row">
				  <div class="span12">
					<div class="well">
					  <div id="myCarousel2" class="carousel slide">
						<div class="carousel-inner">';
			   	$html.=do_shortcode($content);			
	 $html.='</div><a class="left carousel-control" href="#myCarousel2" data-slide="prev"><i class="fa fa-chevron-left" style="font-size: 50px;"></i> </a> <a class="right carousel-control" href="#myCarousel2" data-slide="next"><i class="fa fa-chevron-right" style="font-size: 50px;"></i> </a> 
	      </div>
		  </div>
		  </div>
		  </div>
		  </div>
		  </div>';					
	
 return $html;	  
	  
}
add_shortcode('boddySection7','boddySection7');

function carouselItem($atts, $content = null){
	extract( shortcode_atts( array(
      'action' => 'active'
      ), $atts ) );
	  
	  
	$html ='<div class="item '.$action.'">
                <div class="row-fluid">
                  <div class="row_dk ul_li">
                    <ul id="slides">';
			$html.=do_shortcode($content);			
	$html.='</ul></div></div></div>';
   return $html;	
}
add_shortcode( 'carouselItem', 'carouselItem' );

function subscetion7( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
		  'star'=>'1',
		  'caldate'=>'',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
  
  return ' <li>
			<div class="room-grid-view " data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			  <div class="img_width-homepage2"><img class="media-object img-responsive" src="'.$imagepath.'" alt="cruise"></div>
			  <div class="room-info">
				<div class="post-title">
				  <h5>'.$title.'</h5>
				  <p><i class="fa fa-calendar"></i> '.$caldate.'</p>
				</div>
				<div class="post-desc">
				  <p>'.$description.'</p>
				</div>
				<div class="room-book">
				  <div class="col-md-6 col-sm-6 col-xs-6 clear-padding post-alt">
					<p class="min_3lf"><img class="media-object" src="'.get_template_directory_uri().'/images/star-'.$star.'.png"></p>
				  </div>
				  <div class="col-md-6 col-sm-6 col-xs-6 clear-padding"> <a href="'.$linkurl.'" class="text-center">MORE</a> </div>
				</div>
				<div class="clearfix"></div>
			  </div>
			</div>
		  </li>';
}
add_shortcode( 'subscetion7', 'subscetion7' );


/*===== Boddy Section 8 === */

function boddySection8($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="hp3CSS2-full">
		<div class="container hp3CSS2 ">
		  <div class="row">
			<div class="col-xs-12 make1">
			  <h1 class="popular-p">'.$title.'</h1>
			</div>
			<div class="col-xs-12 make3">
			  <p>'.$description.'</p>
			</div>
		  </div>';
  $html.='<div class="row">';
   	$html.=do_shortcode($content);
 $html.='</div>';
   
 $html.='</div>';
 $html.='</div>';
 
 return $html;	  
	  
}
add_shortcode('boddySection8','boddySection8');

function scetion8_left( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'title' => '',
	  'description' => '',
      ), $atts ) );
	 
  $html='<div class="div-flot-4">
         <ul>';
	  	$html.=do_shortcode($content);	 
  $html.='</ul>
         </div>';
  
  return $html;
}
add_shortcode('scetion8_left','scetion8_left');

function scetion8_right( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'title' => '',
	  'description' => '',
      ), $atts ) );
	 
  $html='<div class="float-ril1" >';
	  	$html.=do_shortcode($content);	 
  $html.='</div>';
return  $html; 
}
add_shortcode('scetion8_right','scetion8_right');

function subscetion8_left( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
	
	$html='<li>
			<a href="'.$linkurl.'">
				<img src="'.$imagepath.'">
				 <div class="media__caption"><p>'.$title.'</p></div>
			</a>
		</li>';	  
	return $html;
}
add_shortcode( 'subscetion8_left', 'subscetion8_left' );

function subscetion8_right( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => '',
		  'description' => '',
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));
		  
	$html='<a href="'.$linkurl.'">  
	       <img src="'.$imagepath.'" alt="" style="height: 426px;"></a>
	       <div class="media__caption"style="margin: 10px 0px 0px 0px;">
		  <p>'.$title.'</p>
      </div>';	  
	return $html;
}
add_shortcode( 'subscetion8_right', 'subscetion8_right' );



/*===== Boddy Section 9 === */
function boddySection9($atts, $content = null) {
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="main-block style-2 bg-grey clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="block-header">
		  <p class="home-icon1"><i class="fa fa-home" aria-hidden="true"></i></p>
          <h4 class="block-category">Check it Out</h4>
          <h2 class="block-title">'.$title.'</h2>
          <div class="block-text">'.$description.'</div>
        </div>
      </div>
    </div>
  </div>
</div>';
$html.='<div class="cont_text-width">
         <div class="container">
         <div class="row">
		  <div class="col-xs-12 make1 vacation-rental">
           <ul>';
  $html.=do_shortcode($content);
$html.='<div style="clear:both"></div></ul></div>
      </div>
      </div
    </div>';		 

 return $html;	  
	  
}
add_shortcode('boddySection9','boddySection9');

function subscetion9( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
          'title' => 'title',
		  'description' => 'description',
		  'classname'=>'',
		  'star'=>'', 
	      'linkurl'=>'', 
	      'imagepath'=>''
          ), $atts));


return '<li class="'.$classname.'">
			<img src="'.$imagepath.'" alt="">
			<div class="vac-D">
				<div class="vac-D-round">
				<img src="'.get_template_directory_uri().'/images/img_profile.jpg"alt="">
				</div>
				<h2 class="vac-name">'.$title.'</h2>
				<!--<h3 class="vac-name"> <img src="'.get_template_directory_uri().'/images/star-'.$star.'.png"> </h3>-->
				<h3 class="vac-name">'.$description.'</h3>
				<div class="bnt-uppu"><a href="'.$linkurl.'" class="btn-u btn-u-lg btn-u-red btn-u-upper">Read More</a></div>
			</div>
		</li>';			
			
}
add_shortcode( 'subscetion9', 'subscetion9' );
?>