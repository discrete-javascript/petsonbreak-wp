<?php
/*===== boddySection2 === */

function boddySection2 ($atts, $content = null) {
	
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="container-fluid text-align-center ad-class-1 home-section1">
	     <div class="container">
		  <div class="main_title">
		   <h2 class="block-title">'.$title.'</h2>
			<div class="block-text">'.$description.'</div>
		 </div>';
		 
		  $content = wpex_fix_shortcodes(trim($content));
          $html.=do_shortcode($content); 
		 
$html.='</div>
      </div>';		 

 return $html;	  
}
add_shortcode('boddySection2','boddySection2');

function subscetion2( $atts, $content = null ) {
  extract(
      shortcode_atts(array(
	      'rowdata'=>'rowdata',
          'title_1' => 'title_1',
		  'description_1' => 'description_1',
	      'linkurl_1'=>'linkurl_1', 
	      'imagepath_1'=>'imagepath_1',
		  'title_2' => 'title_2',
		  'description_2' => 'description_2',
	      'linkurl_2'=>'linkurl_2', 
	      'imagepath_2'=>'imagepath_2',
		  'title_3'=>'title_3',
		  'description_3' => 'description_3',
	      'linkurl_3'=>'linkurl_3', 
	      'imagepath_3'=>'imagepath_3',
		  
          ), $atts));
		
	if($rowdata==1){
		$html ='<div class="row mar-b">
					<div class="col-md-8">
					  <div class="hom1-div">
						<img alt="" src="'.$imagepath_1.'"/>
						<div class="hom1-div-name">
						 <p>'.$title_1.'</p>
						<h3>'.$description_1.'</a></h3>
						</div>
						<div class="hom1-div-overlay">
							<div class="hom1-ovrlCnt">
							<h3>'.$title_1.'</h3>  
							<a href="'.$linkurl_1.'">Find Best Deals</a>
							</div>
						</div>
					  </div>
					</div>
						  
					  <div class="col-md-4">
						 <div class="hom1-div1">
						   <div class="top">
							<img alt="" src="'.$imagepath_2.'"/>
							<div class="hom1-div-name">
							 <p>'.$title_2.'</p>
							 <h3>'.$description_2.'</h3>
							</div>
							<div class="hom1-div-overlay">
							  <div class="hom1-ovrlCnt">
								<h3>'.$title_2.'</h3>
								<a href="'.$linkurl_2.'">Find Best Deals</a>
							  </div>
							</div>
						   </div>
						   <div class="bot">
							<img alt="" src="'.$imagepath_3.'"/>
							<div class="hom1-div-name" style="bottom:15px;">
							 <p>'.$title_3.'</p>
							 <h3>'.$description_3.'</h3>
							</div>
							<div class="hom1-div-overlay">
								<div class="hom1-ovrlCnt">
								<h3>'.$title_3.'</h3>
								<a href="'.$linkurl_3.'">Find Best Deals</a>
								</div>
							</div>
						   </div>
						  </div>
					  </div>
				   </div>';		
		}
      else if($rowdata==3){
	  $html='<div class="row mar-b">
			<div class="col-md-4">
				 <div class="hom1-div1">
				   <div class="top">
					<img alt="" src="'.$imagepath_1.'"/>
					<div class="hom1-div-name">
					 <p>'.$title_1.'</p>
					 <h3>'.$description_1.'</h3>
					</div>
					<div class="hom1-div-overlay">
					  <div class="hom1-ovrlCnt">
						<h3>'.$title_1.'</h3>
						<a href="'.$linkurl_1.'">Find Best Deals</a>
					  </div>
					</div>
				   </div>
				   <div class="bot">
					<img alt="" src="'.$imagepath_2.'"/>
					<div class="hom1-div-name"  style="bottom:15px;">
					 <p>'.$title_2.'</p>
					 <h3>'.$description_2.'</h3>
					</div>
					<div class="hom1-div-overlay">
						<div class="hom1-ovrlCnt">
						<h3>'.$title_2.'</h3>
						<a href="'.$linkurl_2.'">Find Best Deals</a>
						</div>
					</div>
				   </div>
				  </div>
			  </div>
			  <div class="col-md-8">
			  <div class="hom1-div">
				<img alt="" src="'.$imagepath_3.'"/>
				<div class="hom1-div-name">
				 <p>'.$title_3.'</p>
				<h3>'.$description_3.'</a></h3>
				</div>
				<div class="hom1-div-overlay">
					<div class="hom1-ovrlCnt">
					<h3>'.$title_3.'</h3>  
					<a href="'.$linkurl_3.'">Find Best Deals</a>
					</div>
				</div>
			  </div>
		    </div>
		</div> ';
	  }	
   else{
	  $html='<div class="row mar-b">
			     <div class="col-md-4">
				    <div class="hom1_bot">
					     <img alt="" src="'.$imagepath_1.'"/>
						 <div class="hom1-div-name">
						 <p>'.$title_1.'</p>
						 <h3>'.$description_1.'</h3>
						</div>
						<div class="hom1-div-overlay">
							<div class="hom1-ovrlCnt">
							<h3>'.$title_1.'</h3>
							<a href="'.$linkurl_1.'">Find Best Deals</a>
							</div>
						</div>
					</div>
				 </div>
				 <div class="col-md-4">
				     <div class="hom1_bot">
					     <img alt="" src="'.$imagepath_2.'"/>
						 <div class="hom1-div-name">
						 <p>'.$title_2.'</p>
						 <h3>'.$description_2.'</h3>
						</div>
						<div class="hom1-div-overlay">
							<div class="hom1-ovrlCnt">
							<h3>'.$title_2.'</h3>
						   <a href="'.$linkurl_2.'">Find Best Deals</a>
							</div>
						</div>
					</div>
				 </div>
				 <div class="col-md-4">
				     <div class="hom1_bot">
					     <img alt="" src="'.$imagepath_3.'"/>
						 <div class="hom1-div-name">
						 <p>'.$title_3.'</p>
						 <h3>'.$description_3.'</h3>
						</div>
						
						<div class="hom1-div-overlay">
							<div class="hom1-ovrlCnt">
							<h3>'.$title_3.'</h3>
							<a href="'.$linkurl_3.'">Find Best Deals</a>
							</div>
						</div>
					</div>
				 </div>
			   </div>';  
   }	  
  return $html;
		
}
add_shortcode( 'subscetion2', 'subscetion2' );