<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
<link href='css-libraries/loading-bar.css' rel='stylesheet' />
<script type="text/javascript" src="scripts-libraries/loading-bar.js"></script>
<script type="text/javascript" src="scripts/core.js?var=12321"></script>
<script> 	
<?php 
ini_set('max_execution_time', 600);
ini_set('display_errors', false);
error_reporting(0);
session_start();
header("Access-Control-Allow-Origin: *");

include('includes/connection.php');


header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/xml; charset=utf-8");
$cid = '500101';
$apiKey = '44ohluga9g3ailh3qft8ag0ak4';
$secret = '36f2v6k7v737i';
$ModeType = 'Test';
$minorRev = "30";
$timestamp = gmdate('U');
$sig = md5($apiKey . $secret . $timestamp);

$limit =18;
$offset=0;

$customerIP =$_SERVER['REMOTE_ADDR'];

$token = '64ad892f711e262730d46c8e13b499d0';
$marker = '56459';
 $Sqls = "select validating_carrier,agency_name from flight_results where search_id='".$_REQUEST['searchid']."' and termurl='".$_REQUEST['termurl']."'";  
$query = mysql_query($Sqls);
$Objs = mysql_fetch_object($query);
$validating_carrier=$Objs->validating_carrier;
$agency_name=$Objs->agency_name;  

?>
		
$(document).ready(function() {
    $.ajax({    
		 type: "GET",
		 url:  "http://adivaha.com/demo/ean-team/wp-content/themes/adivaha/api/custom-ajax.php",
		 data: "action=agencyLink&search_id=<?php echo $_REQUEST['searchid'];?>&termurl=<?php echo $_REQUEST['termurl']; ?>",
		 success: function(Data){ 
			//var termurl=Data;
		    window.location.href=Data;
			//window.open(termurl, '_blank');
		  }
	})
});


</script>
<div class="redirect-loading-container">
	<div  class="redirect-loading-div">
	<p><img src="../images/tiw_log_p.png" class="redirect-page-logo" alt="redirect-page-logo"></p>
	<p  class="round_image"><img src="../images/svg/ripple.svg" width="50" height="50" class="loading_fig" alt="ripple"></p>
    <p class="please_wait">Please wait while we transfer you to...</p>
	<p><img src="http://pics.avs.io/112/50/<?php echo $validating_carrier;?>.png"></p>

	<p class="please_wait">Complete your boooking process with <span class="agency_name"><?php echo $agency_name; ?></span></p>
	</div>
</div>

<style>
	
 body{margin:0px;padding:0px;}
.redirect-loading-container{display: flex;
    flex-direction: column;
    align-items: Center;
    justify-content: Center;
    height: 100%;font-family:'Open Sans';font-size:20px; background: #fff;}
.redirect-loading-div{text-align:center;margin-top: -120px;}
.round_image{position: absolute;
    right: 28px;
    top: 10px;}
	

.please_wait{    color: #333;
    font-weight: 100;
    line-height: 200%;
    font-size: 20px;}
.agency_name{   
    font-weight: 100;
    line-height: 200%;
    font-size: 20px; color: #ff0000;}
</style>