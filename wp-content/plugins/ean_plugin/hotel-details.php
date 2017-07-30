<?php 
$Get_Hotelss_Info = "SELECT *  FROM twc_hotel_info where status_deleted=0 and published='Yes' and file_name='".$hotel_file_name."'";
	$Resultss = $wpdb->get_results($Get_Hotelss_Info);
	foreach ( $Resultss as $Result ){
		$ids = $Result->id;
	}
	
?>
<?php $Get_Hotel_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes' and id='".$Result->hotel_rating."'";
	$Results_Hotel_Rating = $wpdb->get_results($Get_Hotel_Rating);
	foreach ( $Results_Hotel_Rating as $Results_Hotel_Rating ){
		$title = $Results_Hotel_Rating->title;
	}
	?>
    <?php $Get_Trip_Advisor_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes' and id='".$Result->trip_advisor_rating."'";
	$Results_Trip_Advisor_Rating = $wpdb->get_results($Get_Trip_Advisor_Rating);
	foreach ( $Results_Trip_Advisor_Rating as $Results_Trip_Advisor_Rating ){
		$Trip_advisor_title = $Results_Trip_Advisor_Rating->title;
	}
	?>
<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/css_plugin/main.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript" src="<?php echo $Plugin_URL; ?>/js/jquery.js"></script>
</head>

<body>
<div class="hotel-wrap">
	<div class="hotel-content">
    	<h1><?php echo $Result->title;?> <span class="rating-static rating-<?php echo str_replace(".", "", $title); ?>"></span></h1>
        <div class="h-left">
        	<div><img class="h-img" src="<?php echo $Plugin_URL; ?>/images/Hotel_Image/<?php echo $Result->img_opath;?>" /></div>
        </div>
        <div class="h-right">
        	<div class="rankdiv">
            	<div class="rank"><?php echo $Result->promotional_line_above_trip_advisor;?></div>
                <div class="taicon">
            <img src="http://c1.tacdn.com/img2/ratings/traveler/s<?php echo $Trip_advisor_title; ?>.gif" align="absmiddle" /> <a target="_blank" href="<?php echo $Result->trip_advisor_link_on_reviews;?>"><?php echo $Result->trip_advisor_total_reviews;?> Reviews</a></div>
            <div class="checkindiv"><img src="<?php echo $Plugin_URL; ?>/images_plugin/chekinimg.gif" width="28" height="28" /> 
            <span>Check In <?php echo $Result->check_in;?></span> <span>Check Out  <?php echo $Result->checkout;?></span></div>
            </div>
            <div class="pricediv">
            	<div class="m-p">$<?php echo $Result->low_price;?>.00</div>
                <?php if(($Result->high_price!="") && ($Result->high_price!=0)){?>
                <div class="o-p">$<?php echo $Result->high_price;?>.00</div>
                <?php } ?>
            	<div class="booknowdiv"><a class="bn-button" target="_blank" href="<?php echo $Result->url_website;?>">Book Now</a></div>
            </div>
            <div class="detaildiv">
            	<h2>Hotel Details</h2>
                <p><?php echo $Result->descriptions;?></p>
            	<h2>Ameneties</h2>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="h-d-table">
  <tr>
  <?php $Get_Aminities = "SELECT id, title  FROM twc_ameneties where status_deleted=0 and published='Yes' and find_in_set(id, '".$Result->ameneties."')";
	$Resultss = $wpdb->get_results($Get_Aminities);
	foreach ( $Resultss as $Result ){
	?>
    <td>
    	<ul>
        	<li><?php echo $Result->title;?></li>
        </ul>
    </td>
    <?php } ?>
  </tr>
</table>

            </div>
             <?php 
	$Get_User_Comments = "SELECT * FROM twc_comments where status_deleted=0 and published='Yes' and hotel_id='".$ids."'";
	$Results_User_Comments = $wpdb->get_results($Get_User_Comments);
	foreach ( $Results_User_Comments as $Results_User_Comments ){
	?>
        <?php $Get_User_Comment_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes' and id='".$Results_User_Comments->user_rating."'";
	$Results_User_Comment_Rating = $wpdb->get_results($Get_User_Comment_Rating);
	foreach ( $Results_User_Comment_Rating as $Results_User_Comment_Rating ){
		$User_Comment_title = $Results_User_Comment_Rating->title;
	}
	?>
            <div class="reviewdiv">
            	<div class="rev-img"><img src="<?php echo $Plugin_URL; ?>/images_plugin/user.gif" width="48" height="48" /></div>
                <div class="rev-right">
                	<div class="rev-title"><?php echo $Results_User_Comments->title;?></div>
                	<div class="rev-time"><?php echo date('d M Y', strtotime($Results_User_Comments->date_time));?></div>
                    <div class="rev-star"><img src="http://c1.tacdn.com/img2/ratings/traveler/s<?php echo $User_Comment_title; ?>.gif" align="absmiddle" /></div>
                <p><?php echo $Results_User_Comments->descriptions;?></p>
                
                </div>
            </div>
       <?php } ?>     
            
            
            <div class="feedbackdiv">
            <h2>Feedback / Suggestions</h2>
            	<div class="feedform">
                <form id="user_Comments" name="user_Comments">
                 <input type="hidden" class="feedfields" name="hotelid" id="hotelid" value="<?php echo $ids;?>"/>
                	<label>Name:</label>
                  <input class="feedfields" name="full_name" id="full_name" type="text" />
                    <label>Email:</label>
                  <input class="feedfields" name="email_address" id="email_address" type="text" />
                    <label>Rating:</label>
                     <select  name="user_rating" id="user_rating" class="feedfields">
            <option selected="selected" value="">Select Rating</option>
			<?php 
			$Get_Rating = "SELECT id, title  FROM twc_rating where status_deleted=0 and published='Yes'";
            $Results_Rating = $wpdb->get_results($Get_Rating);
            foreach ( $Results_Rating as $Results_Rating ){
            $title = $Results_Rating->title;
			$id = $Results_Rating->id;
            ?>
             <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
             <?php } ?>
               </select>
                    <label>Feedback / Suggestions:</label>
                  <textarea class="feedfields" name="suggestions" id="suggestions" cols="" rows="8"></textarea>
                    <input class="feedsubmit" name="" type="button" value="Submit Comments" />
                </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php 
    $sql = "select * from twc_messages where published='Yes' and status_deleted='0' and id='TWCT1373379522TWC51dc1bc26913d'";
	$Results_sql = $wpdb->get_results($sql);
	foreach ( $Results_sql as $Results_sql ){
		$messages_content = $Results_sql->messages_content;
	}
	?>
<script language="javascript">
function User_Comments(){

		if(document.getElementById("full_name").value==''){
		alert("Field Full Name cannot be left blank.");
		document.getElementById("full_name").focus();
		return false;
		}
		
		if(document.getElementById("email_address").value==''){
		alert("Field Email Address cannot be left blank.");
		document.getElementById("email_address").focus();
		return false;
		}
		
		var email = document.getElementById("email_address").value;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(email) == false){
		alert("Please enter a valid Email Address.");
		document.getElementById("email_address").focus();
		return false;
		}
		if(document.getElementById("user_rating").value==''){
		alert("Field Rating cannot be left blank.");
		document.getElementById("user_rating").focus();
		return false;
		}
		
		if(document.getElementById("suggestions").value==''){
		alert("Field Feedback / Suggestions cannot be left blank.");
		document.getElementById("suggestions").focus();
		return false;
		}
		return true;
}
$(document).ready(function(){
	$(".feedsubmit").click(function(){
		if(User_Comments()!=false){
			Get_Results_Ajax();
		}
			
	});		
	
	
function Get_Results_Ajax(){
	var datas = $('#user_Comments').serialize();
	var $ajaxRequest = $.ajax({
	type: "POST",
	url: "<?php echo $Plugin_URL; ?>/ajax-functions.php",
	data: datas,
	success: function(msg){
		//alert(msg);
		$(".feedform").html("<?php echo $messages_content; ?>");
	},
	error: function(){
	alert("Unable to Fetch Record");
	}
	});	
}
						   
});	
</script>
</body>
</html>
