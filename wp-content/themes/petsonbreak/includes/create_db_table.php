<?php
global $wpdb;

$Drop_Search_Table = "drop table search_results_ean";
  $wpdb->query($Drop_Search_Table);
  $Create_Search_Table = "CREATE TABLE IF NOT EXISTS `search_results_ean` (
  `id` int(11) NOT NULL,
  `EANHotelID` varchar(500) NOT NULL,
  `Name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address1` text NOT NULL,
  `city` text NOT NULL,
  `postalCode` text NOT NULL,
  `countryCode` text NOT NULL,
  `propertyCategory` text NOT NULL,
  `hotelRating` text NOT NULL,
  `hotelRatingDisplay` text NOT NULL,
  `confidenceRating` text NOT NULL,
  `amenityMask` text NOT NULL,
  `tripAdvisorRating` text NOT NULL,
  `tripAdvisorReviewCount` text NOT NULL,
  `tripAdvisorRatingUrl` text NOT NULL,
  `promoDescription` text NOT NULL,
  `locationDescription` text NOT NULL,
  `shortDescription` text NOT NULL,
  `highRate` decimal(8,2) NOT NULL,
  `lowRate` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) NOT NULL,
  `rateCurrencyCode` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `proximityDistance` text NOT NULL,
  `proximityUnit` text NOT NULL,
  `hotelInDestination` text NOT NULL,
  `thumbNailUrl` text NOT NULL,
  `desti_lat_lon` text NOT NULL,
  `valueAdds` text NOT NULL,
  `date_time` date NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `currency` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `language` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `search_session` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Cri_Adults` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$wpdb->query($Create_Search_Table);


$Create_favourite ="CREATE TABLE IF NOT EXISTS `favourite` (
  `EANHotelID` varchar(500) NOT NULL,
  `Name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Address1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Address2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `City` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Country` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `StarRating` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LowRate` decimal(20,2) NOT NULL,
  `highRate` decimal(20,2) NOT NULL,
  `discount` decimal(8,1) NOT NULL COMMENT '%',
  `latitude` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `longitude` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `guestRating` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `promoDescription` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `currentAllotment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nonRefundable` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fn` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `thumbNailUrl` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tripAdvisorReviewCount` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `confidenceRating` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Ring',
  `proximityDistance` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `proximityUnit` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `propertyCategory` int(11) NOT NULL,
  `valueAdds` text NOT NULL,
  `rooms` text NOT NULL,
  `photoCount` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `destination_id` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `currency` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `language` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `shortDescription` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `search_session` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Cri_Adults` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$wpdb->query($Create_favourite);


$Create_landing_pages="CREATE TABLE IF NOT EXISTS `landing_pages` (
  `id` int(11) NOT NULL,
  `destination_id` varchar(1000) NOT NULL,
  `destination_name` varchar(1000) NOT NULL,
  `latitude` varchar(500) NOT NULL,
  `longitude` varchar(500) NOT NULL,
  `flight_from_destination` varchar(1000) NOT NULL,
  `flight_from_iata` varchar(500) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `shortDescription` text NOT NULL,
  `published` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
$wpdb->query($Create_landing_pages);


$Create_twc_booking="CREATE TABLE `twc_booking` (
  `id` int(11) NOT NULL,
  `itineraryId` varchar(500) NOT NULL,
  `confirmationNumbers` varchar(500) NOT NULL,
  `booking_status` varchar(500) NOT NULL,
  `hotel_img` varchar(500) NOT NULL,
  `hotel_id` varchar(500) NOT NULL,
  `hotelName` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelRating` varchar(500) NOT NULL,
  `hotelAddress` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelCity` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hotelCountryCode` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_contactno` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login_id` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fb_email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `left_html` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `request_xml` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `response_xml` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checkInInstructions` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `chargable_rate` varchar(1000) NOT NULL,
  `currency_code` varchar(1000) NOT NULL,
  `published` varchar(500) NOT NULL DEFAULT 'Yes',
  `date_time` datetime NOT NULL,
  `status_deleted` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$wpdb->query($Create_twc_booking);

$Drop_flight_results = "drop table flight_results";
$wpdb->query($Drop_flight_results);
$Create_flight_results="CREATE TABLE IF NOT EXISTS `flight_results` (
  `id` int(11) NOT NULL,
  `onewayFlights` text NOT NULL,
  `returnFlights` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency` varchar(500) NOT NULL,
  `is_direct` int(11) NOT NULL,
  `sign` varchar(500) NOT NULL,
  `min_stop_duration` varchar(1000) NOT NULL,
  `max_stop_duration` time NOT NULL,
  `validating_carrier` varchar(500) NOT NULL,
  `max_stops` int(11) NOT NULL,
  `meta_id` varchar(500) NOT NULL,
  `meta_count` int(11) NOT NULL,
  `signature` varchar(1000) NOT NULL,
  `city_distance` varchar(1000) NOT NULL,
  `total_duration` varchar(200) NOT NULL,
  `origon_airport` varchar(500) NOT NULL,
  `destination_airport` varchar(500) NOT NULL,
  `search_id` varchar(1000) NOT NULL,
  `uuid` varchar(1000) NOT NULL,
  `oneway_departure_time` varchar(200) NOT NULL,
  `oneway_arrival_time` varchar(200) NOT NULL,
  `return_departure_time` varchar(200) NOT NULL,
  `return_arrival_time` varchar(200) NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time_return` time NOT NULL,
  `arrival_time_return` time NOT NULL,
  `departfilter` varchar(200) NOT NULL,
  `arrivefilter` varchar(200) NOT NULL,
  `depart_return_filter` varchar(200) NOT NULL,
  `arrive_return_filter` varchar(200) NOT NULL,
  `airlines` text NOT NULL,
  `gates_info_id` varchar(200) NOT NULL,
  `agency_name` varchar(200) NOT NULL,
  `payment_methods` varchar(200) NOT NULL,
  `agency_currency_code` varchar(200) NOT NULL,
  `agency_rates` varchar(200) NOT NULL,
  `agency_airline_iatas` varchar(200) NOT NULL,
  `termurl` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
$wpdb->query($Create_flight_results);

$Drop_airline_description = "drop table airline_description";
$wpdb->query($Drop_airline_description);
$Create_airline_description="CREATE TABLE IF NOT EXISTS `airline_description` (
  `id` int(11) NOT NULL,
  `search_id` varchar(500) NOT NULL,
  `airline` varchar(200) NOT NULL,
  `pet` text NOT NULL,
  `meals` text NOT NULL,
  `baggage` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
$wpdb->query($Create_airline_description);


$Create_airlines="CREATE TABLE IF NOT EXISTS `airlines` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `iata` varchar(200) NOT NULL,
  `callsign` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `icao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$wpdb->query($Create_airlines);


$Create_airports="CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(11) NOT NULL,
  `code` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$wpdb->query($Create_airports);
?>