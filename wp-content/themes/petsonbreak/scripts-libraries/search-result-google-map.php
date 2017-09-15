<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
<style type="text/css">
<?php 
$gwidth ='100%';
$gheight ='450px';
?>  #gmap_canvas {
 height: <?php echo $gheight;
?>;
 position: relative;
 width: <?php echo $gwidth;
?>;
}

.actions {
	background-color: #FFFFFF;
	bottom: 35%;
	padding: 10px;
	position: absolute;
	right: 5px;
	z-index: 2;
	border-top: 1px solid #abbbcc;
	border-left: 1px solid #a7b6c7;
	border-bottom: 1px solid #a1afbf;
	border-right: 1px solid #a7b6c7;
}
.actions label {
	display: block;
	margin: 2px 0 5px 10px;
	text-align: left;
}
.actions input, .actions select {
	width: 85%;
}
.button {
	background-color: #d7e5f5;
	border-top: 1px solid #abbbcc;
	border-left: 1px solid #a7b6c7;
	border-bottom: 1px solid #a1afbf;
	border-right: 1px solid #a7b6c7;
	-webkit-box-shadow: inset 0 1px 0 0 white;
	-moz-box-shadow: inset 0 1px 0 0 white;
	box-shadow: inset 0 1px 0 0 white;
	color: #1a3e66;
	font: normal 11px "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
	line-height: 1;
	margin-bottom: 5px;
	padding: 6px 0 7px 0;
	text-align: center;
	text-shadow: 0 1px 1px #fff;
	width: 150px;
}
.button:hover {
	background-color: #ccd9e8;
	border-top: 1px solid #a1afbf;
	border-left: 1px solid #9caaba;
	border-bottom: 1px solid #96a3b3;
	border-right: 1px solid #9caaba;
	-webkit-box-shadow: inset 0 1px 0 0 #f2f2f2;
	-moz-box-shadow: inset 0 1px 0 0 #f2f2f2;
	box-shadow: inset 0 1px 0 0 #f2f2f2;
	color: #163659;
	cursor: pointer;
}
.button:active {
	border: 1px solid #8c98a7;
	-webkit-box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
	-moz-box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
	box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
}
</style>
<body style="margin:0px; padding:0px;">
<div id="gmap_canvas"></div>
<div class="actions">
  <div class="button"  style="display:none;">
    <label for="gmap_where">Where:</label>
    <input id="gmap_where" type="text" name="gmap_where" />
  </div>
  <div id="button2" class="button" onClick="findAddress(); return false;" style="display:none;">Search for address</div>
  <div class="button">
    <label for="gmap_keyword">Keyword (optional):</label>
    <input id="gmap_keyword" type="text" name="gmap_keyword" />
  </div>
  <div class="button">
    <label for="gmap_type">Type:</label>
    <select id="gmap_type">
	<option value="pet_store" selected="selected">Pet Store</option>
	<option value="veterinary_care">Veterinary Care</option>
	
<!--	
<option value="airport">Airport</option>	
<option value="amusement_park">Amusement Park</option>
<option value="art_gallery">Art Gallery</option>
<option value="atm">ATM</option>
<option value="bakery">Bakery</option>
<option value="bank">Bank</option>
<option value="bar" selected="selected">Bar</option>
<option value="beauty_salon">Beauty Salon</option>
<option value="bicycle_store">Bicycle Store</option>
<option value="book_store">Book Store</option>
<option value="bowling_alley">Bowling Alley</option>
<option value="bus_station">Bus Station</option>
<option value="cafe">Cafe</option>
<option value="campground">Campground</option>
<option value="car_dealer">Car Dealer</option>
<option value="car_rental">Car Rental</option>
<option value="car_repair">Car Repair</option>
<option value="car_wash">Car Wash</option>
<option value="casino">Casino</option>
<option value="cemetery">Cemetery</option>
<option value="church">Church</option>
<option value="city_hall">City Hall</option>
<option value="clothing_store">Clothing Store</option>
<option value="convenience_store">Convenience Store</option>
<option value="courthouse">Courthouse</option>
<option value="dentist">Dentist</option>
<option value="department_store">Department Store</option>
<option value="doctor">Doctor</option>
<option value="electrician">Electrician</option>
<option value="electronics_store">Electronics Store</option>
<option value="embassy">Embassy</option>
<option value="fire_station">Fire Station</option>
<option value="florist">Florist</option>
<option value="food">Food</option>
<option value="funeral_home">Funeral Home</option>
<option value="gas_station">Gas Station</option>
<option value="general_contractor">General Contractors</option>
<option value="grocery_or_supermarket">Grocery or Supermarket</option>
<option value="gym">Gym</option>
<option value="health">Health</option>
<option value="hindu_temple">Hindu Temple</option>
<option value="hospital">Hospital</option>
<option value="insurance_agency">Insurance Agency</option>
<option value="jewelry_store">Jewelry Store</option>
<option value="laundry">Laundry</option>
<option value="lawyer">Lawyer</option>
<option value="library">Library</option>
<option value="liquor_store">Liquor Store</option>
<option value="lodging">Lodging</option>
<option value="meal_delivery">Meal Delivery</option>
<option value="meal_takeaway">Meal Takeaway</option>
<option value="mosque">Mosque</option>
<option value="movie_rental">Movie Rental</option>
<option value="movie_theater">Movie Theater</option>
<option value="museum">Museum</option>
<option value="night_club">Night Club</option>
<option value="park">Park</option>
<option value="parking">Parking</option>

<option value="pharmacy">Pharmacy</option>
<option value="police">Police</option>
<option value="post_office">Post Office</option>
<option value="restaurant">Restaurant</option>
<option value="school">School</option>
<option value="shoe_store">Shoe Store</option>
<option value="shopping_mall">Shopping Mall</option>
<option value="spa">Spa</option>
<option value="stadium">Stadium</option>
<option value="subway_station">Subway Station</option>
<option value="taxi_stand">Taxi Stand</option>
<option value="train_station">Train Station</option>
<option value="travel_agency">Travel Agency</option>
<option value="university">University</option>

<option value="zoo">Zoo</option>
-->
</select>
  </div>
  <div class="button">
    <label for="gmap_radius">Radius:</label>
    <select id="gmap_radius">
      <option value="500">500</option>
      <option value="1000">1000</option>
      <option value="1500">1500</option>
      <option value="5000">5000</option>
      <option value="10000" selected="selected">10000</option>
      <option value="15000">15000</option>
      <option value="20000">20000</option>
    </select>
  </div>
  <input type="hidden" id="lat" name="lat" value="40.7143528" />
  <input type="hidden" id="lng" name="lng" value="-74.0059731" />
  <div id="button1" class="button" onClick="findPlaces(); return false;">Search for objects</div>
</div>
</body>
<script language="javascript">
var geocoder;
var map;
var markers = Array();
var infos = Array();

function initialize() {
    // prepare Geocoder
    geocoder = new google.maps.Geocoder();

    // set initial position (New York)
    var myLatlng = new google.maps.LatLng(<?php echo $_REQUEST["lat"]; ?>, <?php echo $_REQUEST["long"]; ?>);
	
    var myOptions = { // default map options
        zoom: 13,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	map.setOptions({draggable: false, scrollwheel: false});
	var iconBase = '<?php echo $_REQUEST["paths"]; ?>/images/';
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(<?php echo $_REQUEST["lat"]; ?>, <?php echo $_REQUEST["long"]; ?>),
		map: map,
		icon: iconBase + 'Map-Marker-Flag--Right-Pink.png'
	});
}

// clear overlays function
function clearOverlays() {
    if (markers) {
        for (i in markers) {
            markers[i].setMap(null);
        }
        markers = [];
        infos = [];
    }
}

// clear infos function
function clearInfos() {
    if (infos) {
        for (i in infos) {
            if (infos[i].getMap()) {
                infos[i].close();
            }
        }
    }
}

// find address function
function findAddress() {
    var address = document.getElementById("gmap_where").value;

    // script uses our 'geocoder' in order to find location by address name
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) { // and, if everything is ok

            // we will center map
            var addrLocation =  new google.maps.LatLng(<?php echo $_REQUEST["lat"]; ?>, <?php echo $_REQUEST["long"]; ?>);
            map.setCenter(addrLocation);

            // store current coordinates into hidden variables
            document.getElementById('lat').value = results[0].geometry.location.lat();
            document.getElementById('lng').value = results[0].geometry.location.lng();

            // and then - add new custom marker
            var addrMarker = new google.maps.Marker({
                position: addrLocation,
                map: map,
                title: results[0].formatted_address,
                icon: 'bar.png'
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// find custom places function
function findPlaces() {

    // prepare variables (filter)
    var type = document.getElementById('gmap_type').value;
    var radius = document.getElementById('gmap_radius').value;
    var keyword = document.getElementById('gmap_keyword').value;

    var lat = document.getElementById('lat').value;
    var lng = document.getElementById('lng').value;
    var cur_location = new google.maps.LatLng(<?php echo $_REQUEST["lat"]; ?>, <?php echo $_REQUEST["long"]; ?>);

    // prepare request to Places
    var request = {
        location: cur_location,
        radius: radius,
        types: [type]
    };
    if (keyword) {
        request.keyword = [keyword];
    }

    // send request
    service = new google.maps.places.PlacesService(map);
    service.search(request, createMarkers);
}

// create markers (from 'findPlaces' function)
function createMarkers(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {

        // if we have found something - clear map (overlays)
        clearOverlays();

        // and create new markers by search result
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    } else if (status == google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {
        alert('Sorry, nothing is found');
    }
}

// creare single marker function
function createMarker(obj) {

    // prepare new Marker object
	var iconBase = '<?php echo $_REQUEST["paths"]; ?>/images/';
    var mark = new google.maps.Marker({
        position: obj.geometry.location,
        map: map,
        title: obj.name,
		icon: iconBase + document.getElementById("gmap_type").value + '.png'
    });
    markers.push(mark);

    // prepare info window
    var infowindow = new google.maps.InfoWindow({
        content: '<img src="' + obj.icon + '" style="float:left; margin-right: 15px;"/><font style="color:#000; font-weight:bold;">' + obj.name +'</font><br />Rating: ' + obj.rating + '<br /><font style="color:#000; font-weight:normal; font-size:11px;">Vicinity: ' + obj.vicinity + '</font>'
    });

    // add event handler to current marker
    google.maps.event.addListener(mark, 'click', function() {
        clearInfos();
        infowindow.open(map,mark);
    });
    infos.push(infowindow);
}

// initialization
google.maps.event.addDomListener(window, 'load', initialize);
setTimeout(function(){ findPlaces(); }, 3000);
</script>
