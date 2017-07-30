<?php  session_start();
//session_destroy();

include("header.php"); ?> 
<?php 
global $wp_rewrite;  
//print_r($wp_rewrite->rules); 

$profile_id = get_query_var("profile_id");
//echo $profile_id;
$pagename = get_query_var("pagename");
//echo $pagename;
if ($pagename==""){ include("home-page.php"); }
?>
<?php include($pagename.".php"); ?> 