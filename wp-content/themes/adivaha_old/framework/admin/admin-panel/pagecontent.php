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
        "name" => __("Search Tabs Name", "mk_framework"),
        "desc" => __("Hotel tab name", "mk_framework"),
        "id" => "tab_hotel",
        "default" => 'Hotel',
        "type" => "text"
    ),
	
   array(
        "name" => __("", "mk_framework"),
        "desc" => __("Fligth tab name", "mk_framework"),
        "id" => "tab_flight",
        "default" => 'Flight',
        "type" => "text"
    ),

 array(
        "name" => __("", "mk_framework"),
        "desc" => __("Vacation Rental tab name", "mk_framework"),
        "id" => "tab_holiday",
        "default" => 'Vacation Rental/Condo',
        "type" => "text"
    ),
  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Resort tab name", "mk_framework"),
        "id" => "tab_resort",
        "default" => 'Resort',
        "type" => "text"
    ),
   array(
        "name" => __("", "mk_framework"),
        "desc" => __(" Bed & breakfast tab name", "mk_framework"),
        "id" => "tab_bedbreakfast",
        "default" => 'Bed & breakfast',
        "type" => "text"
    ),
  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Search button name", "mk_framework"),
        "id" => "search_btn",
        "default" => 'Search',
        "type" => "text"
    ),	
  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Done button name", "mk_framework"),
        "id" => "done_btn",
        "default" => 'Done',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Checkin", "mk_framework"),
        "id" => "checkin",
        "default" => 'Checkin',
        "type" => "text"
    ),
    array(
        "name" => __("", "mk_framework"),
        "desc" => __("Checkout", "mk_framework"),
        "id" => "checkout",
        "default" => 'Checkout',
        "type" => "text"
    ),	
   	
    array(
        "name" => __("", "mk_framework"),
        "desc" => __("Rooms", "mk_framework"),
        "id" => "rooms",
        "default" => 'Rooms',
        "type" => "text"
    ),	
   array(
        "name" => __("", "mk_framework"),
        "desc" => __("Room", "mk_framework"),
        "id" => "room",
        "default" => 'Room',
        "type" => "text"
    ),
	 array(
        "name" => __("", "mk_framework"),
        "desc" => __("per room per night", "mk_framework"),
        "id" => "per_room_per_night",
        "default" => 'per room per night',
        "type" => "text"
    ),
	
 array(
        "name" => __("", "mk_framework"),
        "desc" => __("Adults", "mk_framework"),
        "id" => "adults",
        "default" => 'Adults',
        "type" => "text"
    ),		
  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Children", "mk_framework"),
        "id" => "children",
        "default" => 'Children',
        "type" => "text"
    ),

  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Infants", "mk_framework"),
        "id" => "infants",
        "default" => 'Infants',
        "type" => "text"
    ),

  array(
        "name" => __("", "mk_framework"),
        "desc" => __("Economy", "mk_framework"),
        "id" => "economy",
        "default" => 'Economy',
        "type" => "text"
    ),
   array(
        "name" => __("", "mk_framework"),
        "desc" => __("Business", "mk_framework"),
        "id" => "business",
        "default" => 'Business',
        "type" => "text"
    ),	
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Above", "mk_framework"),
        "id" => "above",
        "default" => 'Above',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Below", "mk_framework"),
        "id" => "below",
        "default" => 'Below',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("years", "mk_framework"),
        "id" => "years",
        "default" => 'years',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("My Bookings", "mk_framework"),
        "id" => "mybooking",
        "default" => 'My Bookings',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("My Favorite", "mk_framework"),
        "id" => "myfavorite",
        "default" => 'My Favorite',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Logout", "mk_framework"),
        "id" => "logout",
        "default" => 'Logout',
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
        "desc" => __("Banner-1 icon image", "mk_framework"),
        "id" => "banner_bicon_1",
        "default" => 'http://www.adivaha.com/demo/ean-team/wp-content/themes/adivaha/images/king.jpg',
        "type" => 'upload'
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
        "desc" => __("Banner-2 icon image", "mk_framework"),
        "id" => "banner_bicon_2",
        "default" => 'http://www.adivaha.com/demo/ean-team/wp-content/themes/adivaha/images/king.jpg',
        "type" => 'upload'
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
        "desc" => __("Banner-3 icon image", "mk_framework"),
        "id" => "banner_bicon_3",
        "default" => 'http://www.adivaha.com/demo/ean-team/wp-content/themes/adivaha/images/dollar.jpg',
        "type" => 'upload'
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
        "name" => __(" ", "mk_framework"),
        "desc" => __("Banner-4 icon image", "mk_framework"),
        "id" => "banner_bicon_4",
        "default" => 'http://www.adivaha.com/demo/ean-team/wp-content/themes/adivaha/images/shopping.jpg',
        "type" => 'upload'
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
        "name" => __("Search Page", "mk_framework"),
        "desc" => __("Filter your Search", "mk_framework"),
        "id" => "filter_your_search",
        "default" => 'Filter your Search',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Distance from Destination", "mk_framework"),
        "id" => "distance_from_destination",
        "default" => 'Distance from Destination',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Miles", "mk_framework"),
        "id" => "miles",
        "default" => 'Miles',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Search with Hotel Name", "mk_framework"),
        "id" => "search_with_hotel_name",
        "default" => 'Search with Hotel Name',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Search by name", "mk_framework"),
        "id" => "search_by_name",
        "default" => 'Search by name',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Price", "mk_framework"),
        "id" => "price",
        "default" => 'Price',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Star Rating", "mk_framework"),
        "id" => "star_rating",
        "default" => 'Star Rating',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Budget Hotels", "mk_framework"),
        "id" => "budget_hotels",
        "default" => 'Budget Hotels',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Guest Rating", "mk_framework"),
        "id" => "guest_rating",
        "default" => 'Guest Rating',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Property Ameneties", "mk_framework"),
        "id" => "property_ameneties",
        "default" => 'Property Ameneties',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Clear", "mk_framework"),
        "id" => "clear",
        "default" => 'Clear',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Reset All", "mk_framework"),
        "id" => "reset_all",
        "default" => 'Reset All',
        "type" => 'text'
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("List", "mk_framework"),
        "id" => "list",
        "default" => 'List',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Map", "mk_framework"),
        "id" => "map",
        "default" => 'Map',
        "type" => 'text'
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Select your accommodation", "mk_framework"),
        "id" => "select_your_accommodation",
        "default" => 'Select your accommodation',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotels available in", "mk_framework"),
        "id" => "hotels_available_in",
        "default" => 'Hotels available in',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Sort by recommended", "mk_framework"),
        "id" => "sort_recommended",
        "default" => 'RECOMMENDED',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Sort by price", "mk_framework"),
        "id" => "sort_price",
        "default" => 'Price',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Sort by star rating", "mk_framework"),
        "id" => "sort_star_rating",
        "default" => 'STAR RATING ',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Sort by discount", "mk_framework"),
        "id" => "sort_discount",
        "default" => 'DISCOUNTS',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Save", "mk_framework"),
        "id" => "save",
        "default" => 'Save',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("List page button name text", "mk_framework"),
        "id" => "hotel_button_name_text",
        "default" => 'Select Room',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Deals", "mk_framework"),
        "id" => "deals",
        "default" => 'Deals',
        "type" => 'text'
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Add to Favourites", "mk_framework"),
        "id" => "add_to_favourites",
        "default" => 'Add to Favourites',
        "type" => 'text'
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Remove Favourites", "mk_framework"),
        "id" => "remove_favourites",
        "default" => 'Remove Favourites',
        "type" => 'text'
    ),
	
	array(
        "name" => __("Hotel Inforamtion Page", "mk_framework"),
        "desc" => __("Note", "mk_framework"),
        "id" => "note",
        "default" => 'Note : It is the responsibility of the hotel chain and/or the individual property to ensure the accuracy of the photos displayed. http://www.adivaha.com/demo/travel-theme is not responsible for any inaccuracies in the photos. ',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Room Detail Description", "mk_framework"),
        "id" => "room_detail_description",
        "default" => 'Room Detail Description',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Your selected room rate", "mk_framework"),
        "id" => "your_selected_room_rate",
        "default" => 'Your selected room rate',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Lock this price now", "mk_framework"),
        "id" => "lock_this_price_now",
        "default" => 'Lock this price now',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Best price for your travel dates", "mk_framework"),
        "id" => "Best_price_for_your_travel_dates",
        "default" => 'Best price for your travel dates',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("BASED ON THE TRIPADVISOR POPULARITY", "mk_framework"),
        "id" => "Best_on_the_tripadvisor_popularity",
        "default" => 'BASED ON THE TRIPADVISOR POPULARITY',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Read All Reviews", "mk_framework"),
        "id" => "read_all_reviews",
        "default" => 'Read All Reviews',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Photos", "mk_framework"),
        "id" => "photos",
        "default" => 'Photos',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Reviews", "mk_framework"),
        "id" => "reviews",
        "default" => 'Reviews',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Amenities", "mk_framework"),
        "id" => "amenities",
        "default" => 'Amenities',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Book Now", "mk_framework"),
        "id" => "book_now",
        "default" => 'Book Now',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Room info & Conditions", "mk_framework"),
        "id" => "room_info_conditions",
        "default" => 'Room info & Conditions',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("More information", "mk_framework"),
        "id" => "more_information",
        "default" => 'More information',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("CheckInInstructions", "mk_framework"),
        "id" => "checkininstructions",
        "default" => 'CheckInInstructions',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("SpecialCheckInInstructions", "mk_framework"),
        "id" => "specialcheckin_instructions",
        "default" => 'SpecialCheckInInstructions',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Cancellation Policy", "mk_framework"),
        "id" => "cancellation_policy",
        "default" => 'Cancellation Policy',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Room Fees Description", "mk_framework"),
        "id" => "room_fees_description",
        "default" => 'Room Fees Description',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Dining", "mk_framework"),
        "id" => "dining",
        "default" => 'Dining',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotel Policy", "mk_framework"),
        "id" => "hotel_policy",
        "default" => 'Hotel Policy',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Location Description", "mk_framework"),
        "id" => "location_description",
        "default" => 'Location Description',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Business, Other Amenities", "mk_framework"),
        "id" => "business_other_amenities",
        "default" => 'Business, Other Amenities',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Amenities Description", "mk_framework"),
        "id" => "amenities_description",
        "default" => 'Amenities Description',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Point of Interest", "mk_framework"),
        "id" => "point_of_interest",
        "default" => 'Point of Interest',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("TripAdvisor Reviews", "mk_framework"),
        "id" => "tripadvisor_reviews",
        "default" => 'TripAdvisor Reviews',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotels you might also like", "mk_framework"),
        "id" => "Hotels_you_might_also_like",
        "default" => 'Hotels you might also like',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Travellers who viewed this hotel also viewed these hotels", "mk_framework"),
        "id" => "Travellers_who_viewed_this_hotel_also_viewed_these_hotels",
        "default" => 'Travellers who viewed this hotel also viewed these hotels',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Searching for Availibility", "mk_framework"),
        "id" => "searching_for_availibility",
        "default" => 'Searching for Availibility',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Sorry! No Rooms found", "mk_framework"),
        "id" => "sorry_no_Rooms_found",
        "default" => 'Sorry! No Rooms found',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Please select some other dates", "mk_framework"),
        "id" => "Please_select_some_other_dates",
        "default" => 'Please select some other dates',
        "type" => "text"
    ),
	array(
        "name" => __("Online Booking Page", "mk_framework"),
        "desc" => __("Title", "mk_framework"),
        "id" => "title",
        "default" => 'Title',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("First Name", "mk_framework"),
        "id" => "first_name",
        "default" => 'First Name',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Last Name", "mk_framework"),
        "id" => "last_name",
        "default" => 'Last Name',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Email Address", "mk_framework"),
        "id" => "email_address",
        "default" => 'Email Address',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Confirm Email Address", "mk_framework"),
        "id" => "confirm_email_address",
        "default" => 'Confirm Email Address',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Telephone Number", "mk_framework"),
        "id" => "telephone_number",
        "default" => 'Telephone Number',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Country", "mk_framework"),
        "id" => "country",
        "default" => 'Country',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Address", "mk_framework"),
        "id" => "address",
        "default" => 'Address',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("City", "mk_framework"),
        "id" => "city",
        "default" => 'City',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("State", "mk_framework"),
        "id" => "state",
        "default" => 'State',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Postal / Zip Code", "mk_framework"),
        "id" => "postal_zip_code",
        "default" => 'Postal / Zip Code',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("BedTypes", "mk_framework"),
        "id" => "bedtypes",
        "default" => 'BedTypes',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Smoking Preferences", "mk_framework"),
        "id" => "smoking_preferences",
        "default" => 'Smoking Preferences',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Payment Information Safe Shopping Guaranted", "mk_framework"),
        "id" => "payment_information_safe_shopping_guaranted",
        "default" => 'Payment Information Safe Shopping Guaranted',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Cardholder FirstName", "mk_framework"),
        "id" => "cardholder_firstName",
        "default" => 'Cardholder FirstName',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Cardholder LastName", "mk_framework"),
        "id" => "cardholder_lastName",
        "default" => 'Cardholder LastName',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Card Type", "mk_framework"),
        "id" => "card_type",
        "default" => 'Card Type',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Card Number", "mk_framework"),
        "id" => "card_number",
        "default" => 'Card Number',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Expiration Month", "mk_framework"),
        "id" => "expiration_month",
        "default" => 'Expiration Month',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Expiration Year", "mk_framework"),
        "id" => "expiration_year",
        "default" => 'Expiration Year',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Security Code (CCV)", "mk_framework"),
        "id" => "security_code",
        "default" => 'Security Code (CCV)',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Review and book your trip", "mk_framework"),
        "id" => "review_and_book_your_trip",
        "default" => 'Review and book your trip',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Important information about your booking", "mk_framework"),
        "id" => "important_information_about_your_booking",
        "default" => 'Important information about your booking',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("I agree with the", "mk_framework"),
        "id" => "i_agree_with_the",
        "default" => 'I agree with the',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Terms &amp; Conditions", "mk_framework"),
        "id" => "terms_conditions",
        "default" => 'Terms &amp; Conditions',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("and I understand and accept the cancellation policy", "mk_framework"),
        "id" => "and_i_understand_and_accept_the_cancellation_policy",
        "default" => 'and I understand and accept the cancellation policy',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Confirm Booking", "mk_framework"),
        "id" => "confirm_booking",
        "default" => 'Confirm Booking',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Childs", "mk_framework"),
        "id" => "childs",
        "default" => 'Childs',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Pricing", "mk_framework"),
        "id" => "pricing",
        "default" => 'Pricing',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Total Nightly Rate", "mk_framework"),
        "id" => "total_nightly_rate",
        "default" => 'Total Nightly Rate',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Tax Recovery Charges and Service Fees", "mk_framework"),
        "id" => "Tax_Recovery_Charges_and_Service_Fees",
        "default" => 'Tax Recovery Charges and Service Fees',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("You will be charged a total of", "mk_framework"),
        "id" => "You_will_be_charged_a_total_of",
        "default" => 'You will be charged a total of',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("including taxes and fees", "mk_framework"),
        "id" => "including_taxes_and_fees",
        "default" => 'including taxes and fees',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Payment Description"),
        "id" => "payment_description",
        "default" => 'Full payment will be charged to your credit card when you book this hotel. Please be aware that your bank may convert the payment to your local currency and charge you an additional conversion fee. This means that the amount you see on your credit or bank card statement may be in your local currency and therefore a different figure than the Total Price shown above. If you have any questions about this fee or the exchange rate applied to your booking, please contact your bank',
        "type" => "textarea"
    ),
	
	
	array(
        "name" => __("Confirmation Page", "mk_framework"),
        "desc" => __("Thanks for booking with us", "mk_framework"),
        "id" => "Thanks_for_booking_with_us",
        "default" => 'Thanks for booking with us',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Confirmation Description", "mk_framework"),
        "id" => "confirmation_description",
        "default" => 'As soon as your booking is confirmed, a confirmation e-mail containing your booking details would be sent across to your contact details entered while booking. In case your confirmation details are lost, click on the Resend Confirmation link on the website to resend the confirmation e-mail and SMS. Alternately, please call our helpdesk on for assistance',
        "type" => "textarea"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Booking Details", "mk_framework"),
        "id" => "booking_details",
        "default" => 'Booking Details',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Itinerary No", "mk_framework"),
        "id" => "itinerary_no",
        "default" => 'Itinerary No',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Reference Number", "mk_framework"),
        "id" => "Reference_Number",
        "default" => 'Reference Number',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Reservation Status Code", "mk_framework"),
        "id" => "Reservation_Status_Code",
        "default" => 'Reservation Status Code',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Number Of Rooms Booked", "mk_framework"),
        "id" => "Number_Of_Rooms_Booked",
        "default" => 'Number Of Rooms Booked',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Customer Details", "mk_framework"),
        "id" => "Customer_Details",
        "default" => 'Customer Details',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Name", "mk_framework"),
        "id" => "name",
        "default" => 'Name',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Booking Failed", "mk_framework"),
        "id" => "booking_failed",
        "default" => 'Your Booking Failed!',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Booking Failed Description", "mk_framework"),
        "id" => "booking_failed_desc",
        "default" => 'Lorem ipsum dolor sit amet, sit ei decore scaevola evertitur.',
        "type" => "text"
    ),
	
	
	array(
        "name" => __("My Booking Page", "mk_framework"),
        "desc" => __("Your Recent Bookings", "mk_framework"),
        "id" => "Your_Recent_Bookings",
        "default" => 'Your Recent Bookings',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Bookings information", "mk_framework"),
        "id" => "bookings_information",
        "default" => 'This section provides information on your itinerary, trip details and booked tickets. ... used to make the booking and the system will show your recent bookings.',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Booking Id", "mk_framework"),
        "id" => "booking_id",
        "default" => 'Booking Id',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Hotel Name", "mk_framework"),
        "id" => "hotel_name",
        "default" => 'Hotel Name',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Checkin Date", "mk_framework"),
        "id" => "checkin_date",
        "default" => 'Checkin Date',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Status", "mk_framework"),
        "id" => "status",
        "default" => 'Status',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("No Booking Found", "mk_framework"),
        "id" => "No_Booking_Found",
        "default" => 'No Booking Found',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Start Booking Now", "mk_framework"),
        "id" => "start_booking_now",
        "default" => 'Start Booking Now',
        "type" => "text"
    ),
	
	
	array(
        "name" => __("Login Page", "mk_framework"),
        "desc" => __("Log in With Facebook", "mk_framework"),
        "id" => "log_in_with_facebook",
        "default" => 'Log in With Facebook',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Log In", "mk_framework"),
        "id" => "log_in",
        "default" => 'Log In',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Or", "mk_framework"),
        "id" => "or",
        "default" => 'Or',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Create an Account", "mk_framework"),
        "id" => "create_an_account",
        "default" => 'Create an Account',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Register", "mk_framework"),
        "id" => "register",
        "default" => 'Register',
        "type" => "text"
    ),
	array(
        "name" => __("Flight Section", "mk_framework"),
        "desc" => __("Searching Flights!", "mk_framework"),
        "id" => "Searching_Flights!",
        "default" => 'Searching Flights!',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Please wait while we check for the best deal", "mk_framework"),
        "id" => "flights_check",
        "default" => 'Please wait while we check for the best deal...',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Reset", "mk_framework"),
        "id" => "reset",
        "default" => 'Reset',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Number of stops", "mk_framework"),
        "id" => "number_of_stops",
        "default" => 'Number of stops',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Depart from", "mk_framework"),
        "id" => "Depart_from",
        "default" => 'Depart from',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("from", "mk_framework"),
        "id" => "from",
        "default" => 'from',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("to", "mk_framework"),
        "id" => "to",
        "default" => 'to',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Arrive to", "mk_framework"),
        "id" => "Arrive_to",
        "default" => 'Arrive to',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Airlines", "mk_framework"),
        "id" => "airlines",
        "default" => 'Airlines',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Origin Airports", "mk_framework"),
        "id" => "Origin_Airports",
        "default" => 'Origin Airports',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Destination Airports", "mk_framework"),
        "id" => "Destination_Airports",
        "default" => 'Destination Airports',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Online Travel Agencies", "mk_framework"),
        "id" => "Online_Travel_Agencies",
        "default" => 'Online Travel Agencies',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Flights found for", "mk_framework"),
        "id" => "Flights_found_for",
        "default" => 'Flights found for',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Arival Date :", "mk_framework"),
        "id" => "Arival_Date",
        "default" => 'Arival Date :',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Departure Date  :", "mk_framework"),
        "id" => "Departure_Date",
        "default" => 'Departure Date  :',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Filter", "mk_framework"),
        "id" => "Filter",
        "default" => 'Filter',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Modify Search", "mk_framework"),
        "id" => "Modify_Search",
        "default" => 'Modify Search',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("AIRLINE", "mk_framework"),
        "id" => "AIRLINE",
        "default" => 'AIRLINE',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("DURATION", "mk_framework"),
        "id" => "DURATION",
        "default" => 'DURATION',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("DEPART", "mk_framework"),
        "id" => "DEPART",
        "default" => 'DEPART',
        "type" => "text"
    ),
	
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("minutes", "mk_framework"),
        "id" => "minutes",
        "default" => 'minutes',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Stop at", "mk_framework"),
        "id" => "Stop_at",
        "default" => 'Stop at',
        "type" => "text"
    ),
	array(
        "name" => __("", "mk_framework"),
        "desc" => __("Return", "mk_framework"),
        "id" => "Return",
        "default" => 'Return',
        "type" => "text"
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