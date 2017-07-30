<?php
$theme_options_expedia = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_expedia'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "twc_options_EN_global_settings" => __( "Global Settings", "mk_framework" )
        )
    ),
    
	array(

    "type" => "start_sub_pane",

    "id" => 'twc_options_EN_global_settings'

  ),

  array(

    "name" => __("General / Global Settings", "mk_framework" ),

    "desc" => __( "", "mk_framework" ),

    "type" => "heading"

  ),

  
  

   array(

    "type" => "text_city_script"

  ),

   

   array(

    "name" => __( "EAN Credential ", "mk_framework" ),

    "desc" => __( "Enter the CID (Customer ID) you received from EAN Expedia.&nbsp;&nbsp;<a href='http://www.expediaaffiliate.com/index.php' target='_blank'>Register Here</a>" , "mk_framework" ),

    "id" => "ean_cid",

    "default" => "",

    "option_structure" => 'sub',

    "divider" => false,

    "type" => "text"

  ),

   

 array(

    "name" => __( "", "mk_framework" ),

    "desc" => __( "Enter the API Key you received from EAN Expedia.&nbsp;&nbsp;<a href='http://www.expediaaffiliate.com/index.php' target='_blank'>Register Here</a>" , "mk_framework" ),

    "id" => "ean_api",

    "default" => "",

    "option_structure" => 'sub',

    "divider" => false,

    "type" => "text"

  ),

	

array(
    "name" => __( "", "mk_framework" ),
    "desc" => __( "Enter the Secret Key you received from EAN Expedia.&nbsp;&nbsp;<a href='http://www.expediaaffiliate.com/index.php' target='_blank'>Register Here</a>" , "mk_framework" ),
    "id" => "secret_key",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  
  array(
    "name" => __( "", "mk_framework" ),
    "desc" => __( "Enter the MinorRev you received from EAN Expedia" , "mk_framework" ),
    "id" => "minorRev",
    "default" => "30",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

	

array(

    "name" => __( "EAN Details", "mk_framework" ),

    "desc" => __( "" , "mk_framework" ),

    "id" => "ean_url",

    "default" => "http://www.adivaha.com/eanConsole/functions.php",

    "option_structure" => 'sub',

    "divider" => true,

    "type" => "hidden_input"

  ),


  array(

    "name" => __( "Activate/Deactivate SSL", "mk_framework" ),

    "desc" => __( "Set it to 'Yes' after SSL installation. Make sure SSL is enabled before sending it for approval. You can try and check SSL installation by adding https instead of http in the address bar.", "mk_framework" ),

    "id" => "ssl",

    "default" => 'no',

    "option_structure" => 'sub',

    "divider" => true,

    "options" => array(

      "yes" => 'Active',

      "no" => 'Inactive',

    ),

    "type" => "radio"

  ), 

 

 array(
    "name" => __( "Default Destination", "mk_framework" ),

    "desc" => __( "Select the Default Destination for search box." , "mk_framework" ),

    "id" => "default_destination",

    "default" => "Delhi, New Delhi, India",

    "option_structure" => 'sub',

    "divider" => false,

    "type" => "text_city",

	"class" => "mela"

  ),

  array(

    "name" => __( "Default DestinationID", "mk_framework" ),

    "desc" => __( " " , "mk_framework" ),

    "id" => "default_destination_child",

    "default" => "28.6139391^^^77.20902120000005",

    "option_structure" => 'sub',

    "divider" => true,

    "type" => "text_city_child"

  ), 

    array(

    "name" => __( "Activate/Deactivate custom booking email", "mk_framework" ),

    "desc" => __( "select the type booking mail you want send to user", "mk_framework" ),

    "id" => "booking_mail_type",

    "default" => 'custom_mail',

    "option_structure" => 'sub',

    "divider" => true,

    "options" => array(

      "custom_mail" => 'Custom mail',

      "ean_mail" => 'EAN mail',

    ),

    "type" => "radio"

  ), 

   array(

    "name" => __( "Email for get booking details", "mk_framework" ),

    "desc" => __( "Put the email here to get the booking details (against all booking)", "mk_framework" ),

    "id" => "bookin_email",

    "default" => 'support@thewebconz.com',

    "option_structure" => 'sub',

    "divider" => true,

    "type" => "text"

  ), 
  
   array(
    "name" => __( "Flight (Travelpayout key)", "mk_framework" ),
    "desc" => __( "Token", "mk_framework" ),
    "id" => "tp_token",
    "default" => '1e07426891ec332cc5e3e1369d44e2b6',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ), 
  array(
    "name" => __( "", "mk_framework" ),
    "desc" => __( "Marker", "mk_framework" ),
    "id" => "tp_marker",
    "default" => '40247',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(

    "type"=>"end_sub_pane"

  ),



  /***************End Home Page Settings**************/


    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);
