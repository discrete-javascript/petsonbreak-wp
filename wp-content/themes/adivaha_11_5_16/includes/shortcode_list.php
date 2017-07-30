<?php
/*===== boddySection2 === */
function boddySection2 ($atts, $content = null) {
	
	extract( shortcode_atts( array(
      'title' => 'title',
	  'description' => 'description',
      ), $atts ) );
	  
 $html='<div class="pet-bodypart bg_white">
			<div class="main_title">
			   <h2 class="block-title">'.$title.'</h2>
				<div class="fa-beforandafter"><i class="fa fa-star-o" aria-hidden="true"></i></div>
				<div class="block-text">'.$description.'</div>
			</div>
			<div class="pet-pop-desti">';
		 
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
		  'sid_1'=>'sid_1',
		  'sid_2'=>'sid_2',
          'title_1' => 'title_1',
		  'description_1' => 'description_1',
	      'linkurl_1'=>'linkurl_1', 
	      'imagepath_1'=>'imagepath_1',
		  'title_2' => 'title_2',
		  'description_2' => 'description_2',
	      'linkurl_2'=>'linkurl_2', 
	      'imagepath_2'=>'imagepath_2',
          ), $atts));
		
	if($rowdata==1){
	    $rel1='1';
		$ajaxItem1='ajaxItem1';
		$html ='<div class="ajaxItemDiv">
		<div class="ajaxItem " id="d1" rel="ajaxItem1">
        <div class="default_content">
                 <a href="javascript:void(0);"><span style="background:url('.$imagepath_1.');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;display:inline-block;background-position: center center;"></span>
                    <div class="paris-14">
                        <h2>'.$title_1.'</h2>
                        <p></p>
                    </div>
                </a>
        </div>';
		$content1='<h3 class="showAj_title">Popular Weekend Desinations</h3>
		<p class="showAj_desc">For some people leaving a dog behind in kennels when they go on holiday is like leaving a member of the family behind and so what better than being able to take a family holiday with your dog and being safe in the knowledge that your pet will be welcome when you arrive. Whether it is a last minute dog friendly holiday or a short break that you are looking for, we are sure to have something for you.</p>';
	 $data =hiddenitem($sid_1,$ajaxItem1,$content1,$rel1);
	$html.=$data; 
    $html.='</div>
	</div>';		
		}
      else if($rowdata==2){
	  $rel2='2';
	  $html='<div class="ajaxItemDiv">
        <div class="colHalf ajaxItem" id="d2" rel="ajaxItem2">
                <div class="default_content">
                  <a href="javascript:void(0);"><span style="background:url('.$imagepath_1.');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;display:inline-block;background-position: center center;"></span>
                <div class="paris-14">
                  <h2>'.$title_1.'</h2>
                  <p></p>
                </div>
                </a>
               </div>';
			    $ajaxItem2='ajaxItem2';
				
				$content2='<h3 class="showAj_title">Popular Pet Friendly Restaurents</h3>
		<p class="showAj_desc">For some people leaving a dog behind in kennels when they go on holiday is like leaving a member of the family behind and so what better than being able to take a family holiday with your dog and being safe in the knowledge that your pet will be welcome when you arrive. Whether it is a last minute dog friendly holiday or a short break that you are looking for, we are sure to have something for you.</p>';
			    $data =hiddenitem($sid_1,$ajaxItem2,$content2,$rel2);
	            $html.=$data; 
            
         $html.='</div>
        <div class="colHalf ajaxItem" id="d3" rel="ajaxItem3">
          <div class="default_content">
             <a href="javascript:void(0);"><span style="background:url('.$imagepath_2.');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;display:inline-block;background-position: center center;"></span>
          <div class="paris-14">
            <h2>'.$title_2.'</h2>
            <p></p>
          </div>
          </a>
               </div>';
			   $rel3='3';
			   $ajaxItem3='ajaxItem3';
			   $content3='<h3 class="showAj_title">Popular Pet Friendly Cabs</h3>
		<p class="showAj_desc">For some people leaving a dog behind in kennels when they go on holiday is like leaving a member of the family behind and so what better than being able to take a family holiday with your dog and being safe in the knowledge that your pet will be welcome when you arrive. Whether it is a last minute dog friendly holiday or a short break that you are looking for, we are sure to have something for you.</p>';
			   $data =hiddenitem($sid_2,$ajaxItem3,$content3,$rel3);
	           $html.=$data; 
            
        $html.='</div>
    </div>';
	 
	  }	
	  else{
		  $html='<div class="ajaxItemDiv">
        <div class="colHalf ajaxItem" id="d4" rel="ajaxItem4">
                <div class="default_content">
                  <a href="javascript:void(0);"><span style="background:url('.$imagepath_1.');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;display:inline-block;background-position: center center;"></span>
                <div class="paris-14">
                  <h2>'.$title_1.'</h2>
                  <p></p>
                </div>
                </a>
               </div>';
			     $rel4='4';
                 $ajaxItem4='ajaxItem4';
				 $content4='<h3 class="showAj_title">Popular Pet Friendly Event Desinations</h3>
		<p class="showAj_desc">This is a non-stop, action packed, canine thrill show that showcases incredible dogs and their handlers performing amazing stunts to upbeat music that will thrill audiences of all ages.  Most of the performing pet stars have been adopted from various animal shelters throughout the US, as we stress the importance of pet adoption with plenty of crowd participation and amazing novel pet tricks.</p>';
			   $data =hiddenitem($sid_1,$ajaxItem4,$content4,$rel4);
	           $html.=$data;
        $html.='</div>
        <div class="colHalf ajaxItem" id="d5" rel="ajaxItem5">
          <div class="default_content">
             <a href="javascript:void(0);"><span style="background:url('.$imagepath_2.');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;display:inline-block;background-position: center center;"></span>
          <div class="paris-14">
            <h2>'.$title_2.'</h2>
            <p></p>
          </div>
          </a>
               </div>';
			    $rel5='5';
			    $ajaxItem5='ajaxItem5';
			    $content5='<h3 class="showAj_title">International Pet Friendly Event Desinations</h3>
		<p class="showAj_desc">For some people leaving a dog behind in kennels when they go on holiday is like leaving a member of the family behind and so what better than being able to take a family holiday with your dog and being safe in the knowledge that your pet will be welcome when you arrive. Whether it is a last minute dog friendly holiday or a short break that you are looking for, we are sure to have something for you.</p>';
			   $data =hiddenitem($sid_2,$ajaxItem5,$content5,$rel5);
	           $html.=$data;  
            
         $html.='</div>
    </div>';
	  }
  
  return $html;
		
}
add_shortcode( 'subscetion2', 'subscetion2' );

 function hiddenitem($sid,$ajaxItem1,$content,$rel) {
global $wpdb;	
    $html="";
 $html.='<div class="hiddenAjax" id="'.$ajaxItem1.'">
		<div class="showAjax_cont"><span class="closeAjDiv" rel="'.$rel.'">X</span>';
	$html.=$content;	
	   $html.='<div class="showAjax_Item">';
	 $Resultscabs =$wpdb->get_results("select * from twc_petfriendly_destination where service_category='".$sid."' and published='Yes' and status_deleted=0 LIMIT 4");
	 foreach($Resultscabs as $cabsobj){
	 $html.='<div class="showAjax_box">
			<a href="'.site_url().'/search-vendor/?sid='.$sid.'&destName='.$cabsobj->destination.'"><img src="'.site_url().'/wp-content/plugins/ean_plugin/images/Category/'.$cabsobj->img_path.'" alt="">
			<div class="paris-14">
				<h2>'.$cabsobj->title.' '.$cabsobj->destination.'</h2>
				<p></p>
			</div>
		   </a>
		</div>';
		 } 
	 $html.='</div></div>
	</div>';
	return $html;

}  


