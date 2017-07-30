<?php
$theme_options_general = array(
    array(
        "type" => "start"
    ),
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_general'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_global_settings" => __("Global Settings", "mk_framework"),
            "mk_options_logos_section" => __("Favicon & Logos", "mk_framework"),
			"mk_options_banner_section" => __("Manage Banner", "mk_framework"),
            //"mk_options_header_toolbar_section" => __("Header Toolbar", "mk_framework"),
            //"mk_options_header_section" => __("Header", "mk_framework"),
            //"mk_options_social_networks_section" => __("Social Networks", "mk_framework"),
            //"mk_options_preloader_section" => __("Site Preloader", "mk_framework"),
            //"mk_options_sidebar" => __("Custom Sidebars", "mk_framework"),
            "mk_options_footer" => __("Footer", "mk_framework")
           // "mk_options_quick_contact" => __("Quick Contact Form", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_global_settings'
    ),
    array(
        "name" => __("General / Global Settings Settings", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
   

    array(
        "heading" => __("Site Width & Responsive Settings", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
	
	array(
        "name" => __("Adivaha key", "mk_framework"),
        "desc" => __("Enter your adivaha key.", "mk_framework"),
        "id" => "adivaha_key",
        "default" => "",
        "type" => "text"
    ),
	
	array(
        "name" => __("Site Email", "mk_framework"),
        "desc" => __("Enter your Email Address", "mk_framework"),
        "id" => "site_email",
        "default" => "support@thewebconz.com",
        "type" => "text"
    ),
	array(
        "name" => __("Site Contact Number", "mk_framework"),
        "desc" => __("Enter your Contact Number", "mk_framework"),
        "id" => "site_Contact_Number",
        "default" => "+91 9999854201",
        "type" => "text"
    ),
	
	
	array(
        "name" => __("Contact Address", "mk_framework"),
        "desc" => __("Enter your contact address", "mk_framework"),
        "id" => "Contact_address",
        "default" => '262, Groundfloor, Lane No-4',
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Booking Mode", "mk_framework"),
        "desc" => __("Select booking mode.", "mk_framework"),
        "id" => "booking_mode",
        "default" => "Test",
		"options" => array(
			  "Live" => 'Live',
			  "Test" => 'Test',
			),
        "type" => "radio"
    ),
	array(
    "name" => __( "Default Language / Currency", "mk_framework" ),
    "desc" => __( "Enter the default language eg(en)" , "mk_framework" ),
    "id" => "default_language",
    "default" => "en",
    "option_structure" => 'sub',
    "divider" => false,
    "type" => "text"

  ),

  array(
    "name" => __( "", "mk_framework" ),
    "desc" => __( "Enter the default currency eg(USD)" , "mk_framework" ),
    "id" => "default_currency",
    "default" => "USD",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
	
	array(
        "name" => __("Calender started date", "mk_framework"),
        "desc" => __("Enter the number of days that display in calender from the current date", "mk_framework"),
        "id" => "calender_started_date",
        "default" => "10",
        "type" => "text"
    ),
	
  array(
    "name" => __( "FB appId", "mk_framework" ),
    "desc" => __( "Create FB appId and enter here for FB login ", "mk_framework" ),
    "id" => "fb_appId",
    "default" => '638087052951972',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
   ), 
	
   
    array(
        "type" => "groupset_end"
    ),
	
	 array(
        "heading" => __("Site colors", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
	
	 array(
        "name" => __('Theme color', "mk_framework"),
        "id" => "m_theme_color",
        "default" => "#777777",
        "type" => "color"
    ),
    array(
        "name" => __('Rgb color', "mk_framework"),
        "id" => "m_rgb_color",
		"default" => "89,196,90",
        "type" => "text"
    ),
	
  
    array(
        "type" => "groupset_end"
    ),
	

    array(
        "type" => "end_sub_pane"
    ),
/* new array m_ color theme */

/* end enw array m_ color theme*/


    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_logos_section'
    ),
    array(
        "name" => __("General / Logos Settings", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom Favicon", "mk_framework"),
        "desc" => __("Using this option, You can upload your own custom favicon. <a target=\"_blank\" href=\"http://favicon.cc\">Generate Favicon</a>", "mk_framework"),
        "id" => "custom_favicon",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Header Logo", "mk_framework"),
        "desc" => __("This logo will be used as your default logo and if transparent header is enabled and your header skin is dark.", "mk_framework"),
        "id" => "header_logo",
        "default" => "",
        "type" => "upload"
    ),
   
	array(
        "name" => __("Footer Logo", "mk_framework"),
        "desc" => __("This will appear in the sub-footer section. Your image should not exceed 150 * 60 pixels.", "mk_framework"),
        "id" => "footer_logo",
        "default" => "",
        "type" => "upload"
    ),
	

    array(
        "type" => "end_sub_pane"
    ),
	
	
	
	array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_banner_section'
    ),
	array(
        "name" => __("Banner", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
	array(
        "name" => __("Hotel Banner", "mk_framework"),
        "desc" => __("Upload hotel banner", "mk_framework"),
        "id" => "hotel_banner",
        "default" => "",
        "type" => "upload"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotel Banner Title", "mk_framework"),
        "id" => "hotel_banner_title",
        "default" => "",
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotel Banner Description", "mk_framework"),
        "id" => "hotel_banner_description",
        "default" => "",
        "type" => "textarea"
    ),
	array(
        "name" => __("Flight Banner", "mk_framework"),
        "desc" => __("Upload flight banner", "mk_framework"),
        "id" => "flight_banner",
        "default" => "",
        "type" => "upload"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Flight Banner Title", "mk_framework"),
        "id" => "flight_banner_title",
        "default" => "",
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Flight Banner Description", "mk_framework"),
        "id" => "flight_banner_description",
        "default" => "",
        "type" => "textarea"
    ),
	array(
        "name" => __("Vacation/Holiday Banner", "mk_framework"),
        "desc" => __("Upload holiday banner", "mk_framework"),
        "id" => "holiday_banner",
        "default" => "",
        "type" => "upload"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Holiday Banner Title", "mk_framework"),
        "id" => "holiday_banner_title",
        "default" => "",
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Holiday Banner Description", "mk_framework"),
        "id" => "holiday_banner_description",
        "default" => "",
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Resort Banner", "mk_framework"),
        "desc" => __("Upload resort banner", "mk_framework"),
        "id" => "resort_banner",
        "default" => "",
        "type" => "upload"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Resort Banner Title", "mk_framework"),
        "id" => "resort_banner_title",
        "default" => "",
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Resort Banner Description", "mk_framework"),
        "id" => "resort_banner_description",
        "default" => "",
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Bed & Breakfast Banner", "mk_framework"),
        "desc" => __("Upload bedbreakfast banner", "mk_framework"),
        "id" => "bedbreakfast_banner",
        "default" => "",
        "type" => "upload"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Bedbreakfast Banner Title", "mk_framework"),
        "id" => "bedbreakfast_banner_title",
        "default" => "",
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Bedbreakfast Banner Description", "mk_framework"),
        "id" => "bedbreakfast_banner_description",
        "default" => "",
        "type" => "textarea"
    ),
	
	array(
        "type" => "end_sub_pane"
    ),
	
   /*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_toolbar_section'
    ),
    array(
        "name" => __("General / Header Toolbar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),

    array(
        "name" => __("Toolbar Date", "mk_framework"),
        "desc" => __("If you enable this option today's date will be displayed on header toolbar. make sure your hosting server date configurations works as expected otherwise you might need to fix in hosting settings.", "mk_framework"),
        "id" => "enable_header_date",
        "default" => 'false',
        "type" => "toggle"
    ),

    array(
        "name" => __("Toolbar Tagline", "mk_framework"),
        "desc" => __("Fill this area which represents your site slogan or an important message.", "mk_framework"),
        "id" => "header_toolbar_tagline",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Phone Number", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_phone",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Email Address", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_email",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Show Login Form?", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_login",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Show Mailchimp Subscribe Form?", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_subscribe",
        "default" => "false",
        "type" => "toggle"
    ),
    array(
        "name" => __("Mailchimp List Subscribe Form URL", "mk_framework"),
        "desc" => __('Please read <a href="http://artbees.freshdesk.com/support/solutions/articles/1000093892-how-to-get-your-mailchimp-form" target="_blank">this article for more infomation</a>', "mk_framework"),
        "id" => "mailchimp_action_url",
        "default" => "",
        "rows" => 2,
        "type" => "text"
    ),
    array(
        "type" => "end_sub_pane"
    ),
   */
   /*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_section'
    ),
    array(
        "name" => __("General / Header", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),

    array(
        "name" => __("Header Styles", "mk_framework"),
        "desc" => __("using this option you can choose your header style, elements align and toggle off/on header toolbar.", "mk_framework"),
        "id" => "theme_header_style",
        "default" => '1',
        "type" => 'header_styles'
    ),
    array(
        "id" => "theme_header_align",
        "default" => "left",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "theme_toolbar_toggle",
        "default" => "true",
        "type" => 'hidden_input'
    ),
    array(
        "name" => __("Boxed Header?", "mk_framework"),
        "desc" => __("This option will fit the header and header toolbar into main grid container which you define in global settings.", "mk_framework"),
        "id" => "header_grid",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Sticky header behavior", "mk_framework"),
        "desc" => __("Using this option you can define how you would like the header transform from normal to sticky state. If 'Slide Down' is selected, then you can choose the offset location where the sticky header will be revealed while scrolling down (Check option below).", "mk_framework"),
        "id" => "header_sticky_style",
        "default" => 'fixed',
        'placeholder' => 'false',
        "options" => array(
            "" => __('Disable Sticky Header', "mk_framework"),
            "fixed" => __('Fixed Sticky', "mk_framework"),
            "slide" => __('Slide Down', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "name" => __("Sticky Header Offset", "mk_framework"),
        "desc" => __("Set this option to decide when the sticky state of header will trigger. This option does not apply to header style No2.", "mk_framework"),
        "id" => "sticky_header_offset",
        "default" => 'header',
        "options" => array(
            "header" => __('Header height', "mk_framework"),
            "25%" => __('25% Of Viewport', "mk_framework"),
            "30%" => __('30% Of Viewport', "mk_framework"),
            "40%" => __('40% Of Viewport', "mk_framework"),
            "50%" => __('50% Of Viewport', "mk_framework"),
            "60%" => __('60% Of Viewport', "mk_framework"),
            "70%" => __('70% Of Viewport', "mk_framework"),
            "80%" => __('80% Of Viewport', "mk_framework"),
            "90%" => __('90% Of Viewport', "mk_framework"),
            "100%" => __('100% Of Viewport', "mk_framework")
        ),
        "type" => "dropdown"
    ),



    array(
        "name" => __("Header Height", "mk_framework"),
        "desc" => __("You can change header header height using this option. (default:100px).", "mk_framework"),
        "id" => "header_height",
        "default" => "90",
        "min" => "50",
        "max" => "800",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),

    array(
        "name" => __("Sticky Header Height", "mk_framework"),
        "desc" => __("Using this option you can decide how long header should be on sticky state. (default:50px).", "mk_framework"),
        "id" => "header_scroll_height",
        "default" => "55",
        "min" => "20",
        "max" => "400",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Header Search Form?", "mk_framework"),
        "desc" => __("Please choose the header search form location/style.", "mk_framework"),
        "id" => "header_search_location",
        "default" => 'fullscreen_search',
        "options" => array(
            "disable" => __('Disable', "mk_framework"),
            "toolbar" => __('Header Toolbar', "mk_framework"),
            "header" => __('Header Main Area', "mk_framework"),
            "beside_nav" => __('Inside Main Navigation with Tooltip (With Ajax Search)', "mk_framework"),
            "beside_nav_no_ajax" => __('Inside Main Navigation with Tooltip (Without Ajax Search)', "mk_framework"),
            "fullscreen_search" => __('Fullscreen Search', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "name" => __("Burger Icon Size", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_burger_size",
        "default" => 'small',
        "options" => array(
            "small" => __('Small', "mk_framework"),
            "big" => __('Big', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "heading" => __("Header Style 4 Settings", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
    array(
        "name" => __("Navigation Animation", "mk_framework"),
        "desc" => __("Animation to show sub menu items.", "mk_framework"),
        "id" => "vertical_menu_anim",
        "default" => '1',
        "options" => array(
            "1" => __('Style 1', "mk_framework"),
            "2" => __('Style 2', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "name" => __("Logo Align", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "vertical_header_logo_align",
        "default" => 'center',
        "options" => array(
            "left" => __('Left', "mk_framework"),
            "center" => __('Center', "mk_framework"),
            "right" => __('Right', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "name" => __("Logo Top & Bottom padding", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "vertical_header_logo_padding",
        "default" => "10",
        "min" => "0",
        "max" => "400",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),

    array(
        "name" => __("Text Align", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "vertical_header_align",
        "default" => 'left',
        "options" => array(
            "left" => __('Left', "mk_framework"),
            "center" => __('Center', "mk_framework"),
            "right" => __('Right', "mk_framework")
        ),
        "type" => "dropdown"
    ),

    array(
        "name" => __("Copyright Text", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "rows" => 2,
        "id" => "vertical_menu_copyright",
        "default" => 'Copyright All Rights Reserved &copy; 2014',
        "type" => "textarea"
    ),
    array(
        "type" => "groupset_end"
    ),


    array(
        "heading" => __("Header Start Tour Page", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
    array(
        "name" => __("Show Start Tour Page?", "mk_framework"),
        "desc" => __("Using this option you can set where the Start Tour option will be linked to.", "mk_framework"),
        "id" => "header_start_tour_page",
        "target" => 'page',
        "option_structure" => 'sub',
        "type" => "superlink"
    ),
    array(
        "name" => __("Start Tour Text", "mk_framework"),
        "desc" => __("If you dont want to show sart a tour link leave this field blank.", "mk_framework"),
        "id" => "header_start_tour_text",
        "default" => __("", "mk_framework"),
        "type" => "text"
    ),
    array(
        "type" => "groupset_end"
    ),



    array(
        "type" => "end_sub_pane"
    ),

    */
	/*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_social_networks_section'
    ),
    array(
        "name" => __("General / Social Networks Settings", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),

      array(
        "name" => __("Header Social Networks Location", "mk_framework"),
        "desc" => __("Using this option you can set the social network icons location in header or simply disable them.", "mk_framework"),
        "id" => "header_social_location",
        "default" => 'toolbar',
        "options" => array(
            "toolbar" => __('Header Toolbar', "mk_framework"),
            "header" => __('Header Section', "mk_framework"),
            "disable" => __('Disable', "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Header Social Networks Style", "mk_framework"),
        "desc" => __("Don't use Simple Rounded, Square Pointed & Square Rounded styles within Header Toolbar", "mk_framework"),
        "id" => "header_social_networks_style",
        "default" => 'circle',
        "options" => array(
            "circle" => __('Circled', "mk_framework"),
            "rounded" => __('Rounded', "mk_framework"),
            "simple" => __('Simple', "mk_framework"),
            "simple-rounded" => __('Simple Rounded', "mk_framework"),
            "square-pointed" => __('Square Pointed', "mk_framework"),
            "square-rounded" => __('Square Rounded', "mk_framework")
        ),
        "type" => "dropdown",
    ),
    array(
        "name" => __("Icons Size", "mk_framework"),
        "desc" => __("Icon size will be used for outline styles: Simple Rounded, Square Pointed & Square Rounde.", "mk_framework"),
        "type" => "dropdown",
        "id" => "header_icon_size",
        "default" => "small",
        "options" => array(
            "small" => "Small",
            "medium" => "Medium",
            "large" => "Large"
        )
    ),
    array(
        "name" => __("Add New Network", "mk_framework"),
        "desc" => __("Select your social website and enter the full URL to your profile on the site, then click on add new button. then hit save settings.", "mk_framework"),
        "id" => "header_social_networks_site",
        "default" => '',
        "type" => 'header_social_networks'
    ),
    array(
        "id" => "header_social_networks_url",
        "default" => "",
        "type" => 'hidden_input'
    ),
     array(
        "type" => "end_sub_pane"
    ),
     */
	 /*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_preloader_section'
    ),
    array(
        "name" => __("General / Site Preloader Settings", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Preloader", "mk_framework"),
        "desc" => __("You can enable preloader globally for all pages of the site, or enable it from page/post metaboxes for a specific page.", "mk_framework"),
        "id" => "preloader",
        "default" => 'false',
        "type" => "toggle"
    ),

    array(
        "name" => __("Preloader Logo", "mk_framework"),
        "desc" => __("Using this option, You can upload logo to be shown in preloader.", "mk_framework"),
        "id" => "preloader_logo",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __('Preloader Bar Color', "mk_framework"),
        "desc" => __("If left blank theme accent color will be used instead.", "mk_framework"),
        "id" => "preloader_bar_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Preloader Text Color', "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "preloader_txt_color",
        "default" => "#444",
        "type" => "color"
    ),
    array(
        "name" => __('Preloader Background Color', "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "preloader_bg_color",
        "default" => "#fff",
        "type" => "color"
    ),


    array(
        "type" => "end_sub_pane"
    ),
    */
   /*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar'
    ),
    array(
        "name" => __("General / Custom Sidebar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Create a new sidebar", "mk_framework"),
        "desc" => __("Enter a name for new sidebar. It must be a valid name which starts with a letter, followed by letters, numbers, spaces, or underscores", "mk_framework"),
        "id" => "sidebars",
        "default" => '',
        "type" => 'custom_sidebar'
    ),
    array(
        "type" => "end_sub_pane"
    ),
	*/
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer'
    ),
	
    /*	
    array(
        "name" => __("General / Footer", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Footer", "mk_framework"),
        "desc" => __("You can enable or disable footer section using this option.", "mk_framework"),
        "id" => "disable_footer",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Boxed Footer?", "mk_framework"),
        "desc" => __("If this option is enabled, the footer content will be in main grid (the width is defined in theme general settings), else it will be fullwdith screen wide.", "mk_framework"),
        "id" => "boxed_footer",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Footer Column Gutter Space", "mk_framework"),
        "desc" => __("Padding Between column in percent.", "mk_framework"),
        "id" => "footer_gutter",
        "default" => "2",
        "min" => "0",
        "max" => "15",
        "step" => "1",
        "unit" => '%',
        "type" => "range"
    ),
    array(
        "name" => __("Footer Padding Bottom/Top", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "footer_wrapper_padding",
        "default" => "30",
        "min" => "0",
        "max" => "250",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Footer Widget Margin Bottom", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "footer_widget_margin_bottom",
        "default" => "40",
        "min" => "0",
        "max" => "200",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(

        "name" => __("Footer Type", "mk_framework"),
        "desc" => __("You can choose footer type. Fixed footer should not be used in boxed layout.", "mk_framework"),
        "id" => "footer_type",
        "default" => '1',
        "options" => array(
            "1" => __('Regular', "mk_framework"),
            "2" => __('Fixed', "mk_framework")
        ),
        "type" => "radio"
    ),
    array(
        "name" => __("Footer Column layout", "mk_framework"),
        "id" => "footer_columns",
        "default" => "4",
        "item_padding" => "30px 30px 0 0",
        "options" => array(
            "1" => 'column_1.png',
            "2" => 'column_2.png',
            "3" => 'column_3.png',
            "4" => 'column_4.png',
            "5" => 'column_5.png',
            "6" => 'column_6.png',
            "half_sub_half" => 'column_half_sub_half.png',
            "half_sub_third" => 'column_half_sub_third.png',
            "third_sub_third" => 'column_third_sub_third.png',
            "third_sub_fourth" => 'column_third_sub_fourth.png',
            "sub_half_half" => 'column_sub_half_half.png',
            "sub_third_half" => 'column_sub_third_half.png',
            "sub_third_third" => 'column_sub_third_third.png',
            "sub_fourth_third" => 'column_sub_fourth_third.png'
        ),
        "type" => "visual_selector"
    ),
    array(
        "name" => __("Sub Footer", "mk_framework"),
        "desc" => __("Use this option to enable or disable the sub-footer.", "mk_framework"),
        "id" => "disable_sub_footer",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => "Sub Footer Navigation",
        "desc" => __("This option allows you to enable a custom navigation on the left section of custom footer.", "mk_framework"),
        "id" => "enable_footer_nav",
        "default" => 'true',
        "type" => "toggle"
    ),
	*/
	 array(
        "name" => __("Other Destination Text", "mk_framework"),
        "desc" => "",
        "id" => "f_other_destination",
        "default" => 'Other Destination',
        "type" => "text"
    ),
	
	 array(
        "name" => __("Contact Info", "mk_framework"),
        "desc" => "",
        "id" => "f_contact_title",
        "default" => 'Contact Info',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Company name",
        "id" => "f_company_name",
        "default" => 'The WebConz Technologies Pvt. Ltd.',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Address",
        "id" => "f_address",
        "default" => 'Mohammadpur, New Delhi',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Contact Number",
        "id" => "f_contact_number",
        "default" => '+91-9999854201',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Email",
        "id" => "f_email",
        "default" => 'support@thewebconz.com',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Website",
        "id" => "f_website",
        "default" => 'http://www.adivaha.com',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Skype",
        "id" => "f_skype",
        "default" => 'thewebconz',
        "type" => "text"
    ),
	
	array(
        "name" => __("Stay Connected", "mk_framework"),
        "desc" => "",
        "id" => "f_stay_sonnected",
        "default" => 'Stay Connected',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Facebook Link",
        "id" => "f_facebook",
        "default" => 'https://www.facebook.com/adivaha',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Google",
        "id" => "f_google",
        "default" => 'https://www.google.com/adivaha',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Linkedin",
        "id" => "f_linkedin",
        "default" => 'http://www.linkedin.com/adivaha',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => "Twitter",
        "id" => "f_twitter",
        "default" => 'http://www.twitter.com/adivaha',
        "type" => "text"
    ),

    array(
        "name" => __("Sub Footer Copyright Text", "mk_framework"),
        "desc" => "",
        "id" => "copyright",
        "default" => 'Copyright All Rights Reserved &copy; 2014',
        "type" => "textarea"
    ),
	
	
    array(
        "type" => "end_pane"
    ),
    array(
        "type" => "end_sub_pane"
    ),
	/*
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_quick_contact'
    ),
    array(
        "name" => __("General / Quick Contact", "mk_framework"),
        "desc" => __("Quick Contact is a floating contact form accessible by a button that will be always stick to the website's bottom right section.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Quick Contact", "mk_framework"),
        "desc" => __("You can enable or disable Quick Contact Form using this option.", "mk_framework"),
        "id" => "disable_quick_contact",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Quick Contact Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "quick_contact_title",
        "default" => __("Contact Us", "mk_framework"),
        "type" => "text"
    ),
    array(
        "name" => __("Quick Contact Email", "mk_framework"),
        "desc" => __("This email will be used for sending this form's inqueries. Admin's email will be used as default email.", "mk_framework"),
        "id" => "quick_contact_email",
        "default" => get_bloginfo('admin_email'),
        "type" => "text"
    ),
    array(
        "name" => __("Quick Contact Description", "mk_framework"),
        "desc" => "",
        "id" => "quick_contact_desc",
        "default" => __("We're not around right now. But you can send us an email and we'll get back to you, asap.", "mk_framework"),
        "type" => "textarea"
    ),
    array(
        "name" => __("Enable Captcha?", "mk_framework"),
        "desc" => __("Keep away spam bots.", "mk_framework"),
        "id" => "captcha_quick_contact",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),
	*/
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);
