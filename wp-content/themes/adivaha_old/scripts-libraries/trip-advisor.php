<?php
$URLs_Fetch = "http://www.tripadvisor.com/WidgetEmbed-cdspropertydetail?display=true&partnerId=0DC658C8DC2A463A887F1B6A10C37757&lang=en_US&locationId=".$_REQUEST["hotel_id"];
$Trip_Advisor_Feedback_Long = file_get_contents($URLs_Fetch);	
$Trip_Advisor_Feedback_Long = str_replace("#589442", "#d9e4c4", $Trip_Advisor_Feedback_Long);
echo $Trip_Advisor_Feedback_Long;
?>