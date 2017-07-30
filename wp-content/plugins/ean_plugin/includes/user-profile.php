<?php 
require_once('/home8/webconzc/public_html/demo/dating/wp-load.php');
global $wpdb;
$Results = $wpdb->get_results("select * from twc_registered_users where published='Yes' and status_deleted='0' and id='".$profile_id."'");
foreach ( $Results as $Result ){
$title = $Result->title;
$gender = $Result->gender;
$email_address = $Result->email_address;

}
?>
<div id="twc_dating_body_block">
  <div id="twc_dating_body_top" class="clearfix">
    <div class="heading name_blk"><?php echo $title; ?>, 30</div>
    <div class="online_status_blk"><span></span>Was Online More than a week</div>
    <div class="online_request_blk"><a class="check_buttons" href="#">Add a Friend</a> <a class="check_buttons" href="#">Follow Her</a></div>
    <ul>
      <li><a href="#">Photo</a></li>
      <li><a class="active" href="#">People</a></li>
      <li><a href="#">Setting <span><img src="<?php echo $Plugin_URL; ?>/images/setting_icon.gif" width="18" height="18" alt=" " /></span></a></li>
    </ul>
  </div>
  <!--body mid-->
  <div class="twc_dating_body_block_mid">
  	<!--body mid left-->
    <div id="twc_dating_body_left">
    	<div class="user_profile_snaps">
        	<ul class="clearfix">
            	<li><a class="" href="#">Profile Images</a></li>
                <li><a class="" href="#">Set Location on Map</a></li>
            </ul>
            <div class="round_5 dating_u_img clearfix">
            	<div class="dating_main_snaps"><img src="<?php echo $Plugin_URL; ?>/images/pr-b.jpg" width="285" height="332" alt=" " /><a href="#">Edit Profile Image</a></div>
            	<div class="small_thumb_dating1"><img src="<?php echo $Plugin_URL; ?>/images/12.jpg" width="90" height="94" alt=" " /><a href="#">Edit</a></div>
                <div class="small_thumb_dating2"> <img src="<?php echo $Plugin_URL; ?>/images/14.jpg" width="135" height="94" alt=" " /><a href="#">Edit</a></div>
                <div class="small_thumb_dating3">  <img src="<?php echo $Plugin_URL; ?>/images/16.jpg" width="95" height="67" alt=" " /><a href="#">Edit</a></div>
            </div>
        </div>
    </div>
    <!--body mid left-->
    <!--body mid Mid-->
    <div id="twc_dating_body_center">
    	<h2 class="heading">Recent Activties</h2>
        <div id="facebook_block_mid">
        	 <div class="facebook_thmb_link">
       	     <img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " />
             
             </div>
             <p class="fb_da_dat"><a href="#">121 friends</a> <a href="#">More</a></p>
              <div class="fb_btn_comt">
             <div class="fb_btuns">
             	<a class="blue_buttons_chat" href="#">Chat</a><a class="blue_buttons" href="#">Add as a Friend</a><a class="blue_buttons" href="#">View Pictures</a><a href="#" class="blue_buttons">Faburites</a>
             </div>
             
             <div class="update_status">
             <p>What is in your mind</p>
             <div>
             <textarea name="" cols="" rows=""></textarea>
             </div>             
             </div>
             </div>
        </div>
       
        	<div class="round_2 clearfix twc_dating_body_right_in">
            	<div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                
                <div class="datting_places_right clearfix">
                	<p><span>SHREE SHYAM MANDIR NIRALA DHAM , SIVASAGAR —</span> with Satish Agarwal and 47 others.</p>
                    <div><img src="<?php echo $Plugin_URL; ?>/images/r_banner.gif" width="310" height="190" alt=" " /></div>
                	<p><a href="#">Like(5)</a> <a href="#">Comment(11)</a> <a href="#">Share(9)</a></p>
                </div>
                
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_txt"> I have one suggestion...call me, fir batata hoon..baki mere pass 8GB ki pendrive hai.jo kaho vo la deta hoon</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	 <textarea name="" cols="" rows="" class="right_comments">Write a Comment</textarea>
                    </div>                
                </div>
                 
            
            
            </div>
            <div class="round_2 clearfix twc_dating_body_right_in">
            	<div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                
                <div class="datting_places_right clearfix">
                	<p><span>SHREE SHYAM MANDIR NIRALA DHAM , SIVASAGAR —</span> with Satish Agarwal and 47 others.</p>
                    <div><img src="<?php echo $Plugin_URL; ?>/images/r_banner.gif" width="310" height="190" alt=" " /></div>
                	<p><a href="#">Like(5)</a> <a href="#">Comment(11)</a> <a href="#">Share(9)</a></p>
                </div>
                
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_txt"> I have one suggestion...call me, fir batata hoon..baki mere pass 8GB ki pendrive hai.jo kaho vo la deta hoon</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	 <textarea name="" cols="" rows="" class="right_comments">Write a Comment</textarea>
                    </div>                
                </div>
                 
            
            
            </div>
    </div>
    <!--body mid Mid-->
    <!--body mid right-->
    	<div id="twc_dating_body_right">
        	<h2 class="heading">Recent Activties</h2>
        	<div class="round_2 clearfix twc_dating_body_right_in">
            	<div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                
                <div class="datting_places_right clearfix">
                	<p><span>SHREE SHYAM MANDIR NIRALA DHAM , SIVASAGAR —</span> with Satish Agarwal and 47 others.</p>
                    <div><img src="<?php echo $Plugin_URL; ?>/images/r_banner.gif" width="310" height="190" alt=" " /></div>
                	<p><a href="#">Like(5)</a> <a href="#">Comment(11)</a> <a href="#">Share(9)</a></p>
                </div>
                
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_txt"> I have one suggestion...call me, fir batata hoon..baki mere pass 8GB ki pendrive hai.jo kaho vo la deta hoon</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	 <textarea name="" cols="" rows="" class="right_comments">Write a Comment</textarea>
                    </div>                
                </div>
                 
            
            
            </div>
            <div class="round_2 clearfix twc_dating_body_right_in">
            	<div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                
                <div class="datting_places_right clearfix">
                	<p><span>SHREE SHYAM MANDIR NIRALA DHAM , SIVASAGAR —</span> with Satish Agarwal and 47 others.</p>
                    <div><img src="<?php echo $Plugin_URL; ?>/images/r_banner.gif" width="310" height="190" alt=" " /></div>
                	<p><a href="#">Like(5)</a> <a href="#">Comment(11)</a> <a href="#">Share(9)</a></p>
                </div>
                
                <div class="thumbnail_block_sing">


                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	<p class="u_name">Arun Verma</p>
                        <p class="u_txt"> I have one suggestion...call me, fir batata hoon..baki mere pass 8GB ki pendrive hai.jo kaho vo la deta hoon</p>
                        <p class="u_date">20-12-2013</p>
                    </div>                
                </div>
                <div class="thumbnail_block_sing">
                	<div class="dating_thumb_img"><img src="<?php echo $Plugin_URL; ?>/images/thmb-img.gif" width="35" height="35" alt=" " /></div>
                    <div class="dating_thumb_text">
                    	 <textarea name="" cols="" rows="" class="right_comments">Write a Comment</textarea>
                    </div>                
                </div>
                 
            
            
            </div>
         </div>
    <!--body mid right-->
  
  
  </div>
  <!--body mid-->
</div>