<?php
$theme_options_pagecontent = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_pagecontent'
    ),
	
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_homepage" => __("Home Page", "mk_framework"),
            "mk_options_otherpage" => __("Other Page", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_homepage'
    ),
    array(
        "name" => __("Home Page Content", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
	
	
    array(
        "name" => __("Home Page Banner", "mk_framework"),
        "desc" => __("Upload top full width banner", "mk_framework"),
        "id" => "home_top_banner",
        "default" => 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/E3.jpg',
        "type" => 'upload'
    ),
	
    array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Upload Middle full width banner", "mk_framework"),
        "id" => "home_middel_banner",
        "default" => 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/bg121.jpg',
        "type" => 'upload'
    ),

   array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Upload Footer full width banner", "mk_framework"),
        "id" => "home_footer_banner",
        "default" => 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/bg121.jpg',
        "type" => 'upload'
    ),

   
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Punch tag head", "mk_framework"),
        "id" => "punch_tag_head",
        "default" => 'Find and Book the best deals',
        "type" => "text"
    ),	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Punch tag text", "mk_framework"),
        "id" => "punch_tag_text",
        "default" => '551,000+ hotels, apartments, villas and more',
        "type" => "text"
    ),
	
	array(
        "name" => __("Hotel Search Engine", "mk_framework"),
        "desc" => __("Title", "mk_framework"),
        "id" => "hotel_search_title",
        "default" => 'Hotels',
        "type" => "text"
    ),	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("City Text", "mk_framework"),
        "id" => "search_city",
        "default" => 'City',
        "type" => "text"
    ),	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Check-in", "mk_framework"),
        "id" => "check_in",
        "default" => 'Check-in',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Check-out", "mk_framework"),
        "id" => "check_out",
        "default" => 'Check-out',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Guests", "mk_framework"),
        "id" => "guests",
        "default" => 'Guests',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Rooms", "mk_framework"),
        "id" => "rooms",
        "default" => 'Rooms',
        "type" => "text"
    ),
	
	array(
        "name" => __("Flight Search Engine", "mk_framework"),
        "desc" => __("Title", "mk_framework"),
        "id" => "flight_search_title",
        "default" => 'Flights',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("From", "mk_framework"),
        "id" => "from",
        "default" => 'From',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("To", "mk_framework"),
        "id" => "to",
        "default" => 'To',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("One Way", "mk_framework"),
        "id" => "one_way",
        "default" => 'One Way',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Passengers", "mk_framework"),
        "id" => "passengers",
        "default" => 'Passengers',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Cabin Class", "mk_framework"),
        "id" => "cabin_class",
        "default" => 'Cabin Class',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Economy", "mk_framework"),
        "id" => "economy",
        "default" => 'Economy',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Business", "mk_framework"),
        "id" => "business",
        "default" => 'Business',
        "type" => "text"
    ),
	
	array(
        "name" => __("Menu mobile", "mk_framework"),
        "desc" => __("Menu mobile", "mk_framework"),
        "id" => "menu_mobile_text",
        "default" => 'Menu mobile',
        "type" => "text"
    ),
	
	array(
        "name" => __(" Search button text", "mk_framework"),
        "desc" => __("Find Best Rates", "mk_framework"),
        "id" => "search_button_text",
        "default" => 'Find Best Rates',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("First", "mk_framework"),
        "id" => "first",
        "default" => 'First',
        "type" => "text"
    ),
	
   array(
        "name" => __("Banner Bottom", "mk_framework"),
        "desc" => __("Heading first", "mk_framework"),
        "id" => "banner_bhead_1",
        "default" => 'Travel MarketPlace gives',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "banner_bdesc_1",
        "default" => 'your customer',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Heading Second", "mk_framework"),
        "id" => "banner_bhead_2",
        "default" => 'The Best Selection',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "banner_bdesc_2",
        "default" => 'More than 300, 000 options world wide.',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Heading Third", "mk_framework"),
        "id" => "banner_bhead_3",
        "default" => 'Lowest Price',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "banner_bdesc_3",
        "default" => 'We guarantee it!',
        "type" => "text"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Heading Forth", "mk_framework"),
        "id" => "banner_bhead_4",
        "default" => 'Fast & Easy Booking',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "banner_bdesc_4",
        "default" => 'Book online to lock in your tickets.',
		"divider" => true,
        "type" => "text"
    ),
	
	array(
        "name" => __("Company MarketPlace", "mk_framework"),
        "desc" => __("MarketPlace Heading", "mk_framework"),
        "id" => "marketPlace_heading",
        "default" => 'About Adivaha Travel MarketPlace?',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("MarketPlace Description", "mk_framework"),
        "id" => "marketPlace_description",
        "default" => 'With Adivaha Travel MarketPlace, One can have their own Travel Community Poral where any of your visitor can register and start selling their package. Every single customer will have their own account with few features like, Internal Messaging system, Make friends, View their activities, place reviews and promote their package. All the payments are routed into the owners paypal/checkout account. An email will be triggered to Admin, Vendor and the customer after every purchase.',
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Place to rent", "mk_framework"),
        "desc" => __("Place to rent heading", "mk_framework"),
        "id" => "placetorent_heading",
        "default" => 'Have a place to rent? Join Now!',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Place to rent Description", "mk_framework"),
        "id" => "placetorent_description",
        "default" => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        "type" => "textarea"
    ),
	
	
	array(
        "name" => __(" Middle Banner Three Part", "mk_framework"),
        "desc" => __("Receive Messages Description", "mk_framework"),
        "id" => "ReceiveMessages_description",
        "default" => '<p class="way_p">Send and Receive Messages</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
        "type" => "textarea"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Reviews & Ratings", "mk_framework"),
        "id" => "ReviewRating_description",
        "default" => '<p class="way_p">Travellers Reviews & Ratings</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
        "type" => "textarea"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("View Friend's Activities", "mk_framework"),
        "id" => "Activities_description",
        "default" => '<p class="way_p">View Friend\'s Activities</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Most popular holiday deals slider", "mk_framework"),
        "desc" => __("Heading", "mk_framework"),
        "id" => "popular_holiday_deals_heading",
        "default" => 'The most popular holiday deals slider.',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "popular_holiday_deals_description",
        "default" => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        "type" => "textarea"
    ),
	
	array(
        "name" => __("Find your option among", "mk_framework"),
        "desc" => __("Heading", "mk_framework"),
        "id" => "option_among_heading",
        "default" => 'Find your option among',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "option_among_description",
        "default" => 'We are glad to help you design,<br> plan and experience India in its many dimensions while',
        "type" => "textarea"
    ),
	array(
        "name" => __("Theme Options ", "mk_framework"),
        "desc" => __("Theme Options 1", "mk_framework"),
        "id" => "theme_options_1",
        "default" => '61 000<br>Honeymoon Places',
        "type" => "textarea"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Theme Options 2", "mk_framework"),
        "id" => "theme_options_2",
        "default" => '49 000<br>Adventure Places',
        "type" => "textarea"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Theme Options 3", "mk_framework"),
        "id" => "theme_options_3",
        "default" => '34 000<br> Nightlife Places',
        "type" => "textarea"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Theme Options 4", "mk_framework"),
        "id" => "theme_options_4",
        "default" => '56 000<br> Cruise Tour Places',
        "type" => "textarea"
    ),
	
	array(
        "name" => __("The most popular destinations slider", "mk_framework"),
        "desc" => __("Heading", "mk_framework"),
        "id" => "popular_destinations_heading",
        "default" => 'The most popular holiday deals slider.',
        "type" => "text"
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Description", "mk_framework"),
        "id" => "popular_destinations_description",
        "default" => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        "type" => "textarea"
    ),
  
    array(
        "type" => "end_sub_pane"
    ),
	
	
	
	array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_otherpage'
    ),
    array(
        "name" => __("Common Content", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Login", "mk_framework"),
        "id" => "login_txt",
        "default" => 'Login',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Logout", "mk_framework"),
        "id" => "logout_txt",
        "default" => 'Logout',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Register", "mk_framework"),
        "id" => "register_txt",
        "default" => 'Register',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Message", "mk_framework"),
        "id" => "message_txt",
        "default" => 'Message',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Welcome", "mk_framework"),
        "id" => "welcome_txt",
        "default" => 'Welcome',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("feel free to call us", "mk_framework"),
        "id" => "cal_us_txt",
        "default" => 'feel free to call us',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("More Info", "mk_framework"),
        "id" => "more_info_txt",
        "default" => 'More Info',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Reviews", "mk_framework"),
        "id" => "reviews_txt",
        "default" => 'Reviews',
        "type" => 'text'
    ),
	
	
	array(
        "name" => __("Contact Us Page", "mk_framework"),
        "desc" => __("Pick address pointer from Google with iframe code", "mk_framework"),
        "id" => "map_pointer",
        "default" => '',
        "type" => "textarea"
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Enter Drop us a Message", "mk_framework"),
        "id" => "drop_us_message",
        "default" => 'Drop us a Message',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Enter Drop us a Message", "mk_framework"),
        "id" => "drop_us_message_txt",
        "default" => 'Mussum ipsum cacilds, vidis litro abertis.',
        "type" => 'text'
    ),
	
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Reach Us", "mk_framework"),
        "id" => "reach_us",
        "default" => '- Reach Us -',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Need Help?", "mk_framework"),
        "id" => "need_help",
        "default" => 'Need Help?',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("First Name", "mk_framework"),
        "id" => "first_name_txt",
        "default" => 'First Name',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Last Name", "mk_framework"),
        "id" => "last_name_txt",
        "default" => 'Last Name',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Email", "mk_framework"),
        "id" => "email_txt",
        "default" => 'Email',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Phone", "mk_framework"),
        "id" => "phone_txt",
        "default" => 'Phone',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Comment", "mk_framework"),
        "id" => "comment_txt",
        "default" => 'Comment',
        "type" => 'text'
    ),
	array(
        "name" => __(" ", "mk_framework"),
        "desc" => __("Submit Now", "mk_framework"),
        "id" => "submit_now_txt",
        "default" => 'Submit Now',
        "type" => 'text'
    ),
	
	
	array(
        "name" => __("User Profile Header Text", "mk_framework"),
        "desc" => __("Activities", "mk_framework"),
        "id" => "bp_activities",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Profile", "mk_framework"),
        "id" => "bp_profile",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Notifications", "mk_framework"),
        "id" => "bp_notifications",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Messages", "mk_framework"),
        "id" => "bp_messages",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Friends", "mk_framework"),
        "id" => "bp_friends",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Settings", "mk_framework"),
        "id" => "bp_settings",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Default", "mk_framework"),
        "id" => "bp_default",
        "default" => __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book"),
        "type" => "textarea"
    ),
	
	
	
	
	
	array(
        "type" => "end_sub_pane"
    ),


    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);