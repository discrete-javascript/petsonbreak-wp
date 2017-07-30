<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car Site</title>
<script src="<?php echo $Plugin_URL; ?>/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $Plugin_URL; ?>/js/main.js" type="text/javascript" language="javascript"></script>
<link href="<?php echo $Plugin_URL; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $Plugin_URL; ?>/css/home-page.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $Plugin_URL; ?>/css/popup.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $Plugin_URL; ?>/css/global.css" rel="stylesheet" type="text/css" />

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$(".link_block li:last-child").css("float" , "right");
$("#twc_home_page_block").children(".twc_home_page_block_cont:last-child").css("margin-right","0px");	
<?php if($_REQUEST["msg"]=="success"){ ?>
	Update_Confirmation_Thankx_Page();
<?php } ?>
// Tooltip only Text
$('.tooltip_edit_twc').hover(function(){
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip_twc_edit"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip_twc_edit').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip_twc_edit')
        .css({ top: mousey, left: mousex })
});

});

</script>

<!---------------------Fancy Box Js------------------->
<script type="text/javascript" src="<?php echo $Plugin_URL; ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $Plugin_URL; ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $Plugin_URL; ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<!---------------End Fancy Box JS--------------------->


<?php 

if($_SESSION['UserIds']==""){ $pop_class ="class='check_login'";}

?>
<?php 
global $wpdb;
$Results= $wpdb->get_results("select * from twc_registered_users where published='Yes' and status_deleted='0' and id='".$_SESSION['UserIds']."'");
foreach ( $Results as $Result ){
$title = $Result->title;
}
?>
</head>
<body>
<div id="twc_header">
  <div id="twc_header_wrapper">
    <div class="company_logo">
          <a href="javascript:void(0);">Mettic</a>
          </div>
          <ul class="link_block">
           	  <li><a href="javascript:void(0);"><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_3.png" width="19" height="18" alt=" " /><span>Home</span></a></li>
              <li><a href="javascript:void(0);" <?php echo $pop_class;?>><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_4.png" width="19" height="18" alt=" " /><span>Favourite</span></a></li>
              <li><a href="javascript:void(0);" <?php echo $pop_class;?>><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_5.png" width="19" height="18" alt=" " /><span>Post</span><em>1</em></a></li>
              <li><a href="javascript:void(0);" <?php echo $pop_class;?>><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_1.png" width="19" height="18" alt=" " /><span>Profile</span></span><em>1</em></a></li>
              <li><a href="javascript:void(0);" <?php echo $pop_class;?>><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_2.png" width="19" height="18" alt=" " /><span>Messages</span></span><em>1</em></a></li>
              <li style="display:none;"><input name="" type="text" class="input" /></li>
              <li><a href="javascript:void(0);" <?php echo $pop_class;?>><img src="<?php echo $Plugin_URL; ?>/images/header/icon_head_6.png" width="19" height="18" alt=" " /><span><?php if($_SESSION['UserIds']==""){ ?>Sign Up <?php } else {?>Welcome &nbsp;<?php echo $title;?>&nbsp;(<b class="settings">Settings</b>)- <b class="logout">Logout</b><?php }?></span></a></li>
          </ul>
          </div>
    </div>
</div>



<!--Register Now Section-->
<div id="twc_popup_wrapper" class="register_now">
<div id="twc_popup_wrapper_block">
	<div class="heading_popup">
    	<h2 class="tooltip_edit_twc"  title="Want to change this text">Register</h2>
        <div><img src="<?php echo $Plugin_URL; ?>/images/popup/close.png" width="19" height="19" alt=" " /></div>
    </div>
    
    <div class="popup_info_blk">
    	<div class="popup_info_blk_h">
        	<h2>New to <a href="../../ean_plugin/includes/wp-content/plugins/ean_plugin/test.php" id="example2">Online</a> Car Site?</h2>
            <p>Find members in your area with the qualities that are important to you with our free search</p>
        </div>
        <div class="popup_border_blk">
        	<div class="login_div_block_pop_l"> <div class="seprt_or"></div>
            	<div class="form_head_blk">
                	<h2>New to Online Dating?</h2>
                    <p>Find members in your area with the qualities that are important to you search</p>
                </div>
               
                <form name="RegistrationForm" action="">
                <div class="popup_field_block">
                	<p><label>Gender <b class="redb">*</b> </label> <em><input name="gender" type="radio" id="RadioGroup1_0" value="Male" checked="checked"> Male</em>
                  <em><input type="radio" name="gender" value="Female" id="RadioGroup1_1"> Female</em></p>
                   
              <p class="input_fld"><label>Full Name <b class="redb">*</b> </label><input name="full_name" type="text" class="fullname" id="full_name" value="Prashant Thakur" /></p>
              <p class="input_fld"><label>Your Email Address <b class="redb">*</b> </label><input name="email_address" type="text" class="emailaddress" id="email_address" value="support@thewebconz.com" /></p>
   <p class="input_fld"><label>Choose Password <b class="redb">*</b> </label><input name="textpassword" type="password" class="textpasswords" id="textpassword" value="noton" /></p>
                     <p class="terms_and_cond">
                     	<input name="terms_and_cond" type="checkbox" class="termscondition" id="terms_and_cond" value="Yes" checked="checked">
                        <label for="terms_and_cond">Click here to accept Policy and Terms &amp; conditions</label> 
                     </p>
         <div class="frm_btn"><input type="button" name="button" id="button" value="Register Me" class="brgd_btn Register"></div>
              </div>
            </form>
           
            
            </div>
            <div class="login_div_block_pop_r">
            	<div class="form_head_blk">
                	<h2>Already Regtistered</h2>
                    <p>Login and find the matching friends with a single click</p>
                </div>
               
                <form name="SignInForm" action="">
                <div class="popup_field_block">
                	 
                   
               
              <p class="input_fld"><label>Your Email Address <b class="redb">*</b> </label><input name="emailaddress" type="text" class="emailaddress_signIn" id="emailaddress" value="support@thewebconz.com" /> <em>Empty Field</em></p>
   <p class="input_fld"><label>Password <b class="redb">*</b> </label><input name="textspassword" type="password" class="textpasswords_signIn" id="textspassword" value="noton" /> <em>Empty Field</em></p>
   <p class="LoginError"></p>
                     <div class="terms_and_cond">
                     	<input name="save_password" type="checkbox" class="termscondition" id="save_password" value="Yes" checked="checked" />
                        <label for="save_password">Save Password</label>
                     </div>
         <div class="frm_btn"><input type="button" name="button" id="button" value="login" class="brgd_btn fl signIn" /> 
          
         <a href="#" class="brgd_btn_flogin fl">login With</a>
         </div>
         <p class="frm_btn"><br /><a href="#">Forgot your password ?</a></p>
              </div>
            </form>
            
            </div>
            <br class="clr" />
        </div>
    
    </div>


</div>

</div>
<!--End of Register Now Section-->


</body>
</html>