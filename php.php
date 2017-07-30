<!DOCTYPE html>
<html>
<head>
<style>
.pac-logo::after{display:none !important; }
.pac-container{z-index:999 !important;position:absolute;}
.pac-container .pac-item{border-top: 1px solid #d9d9d9 !important;padding: 5px 10px !important;}
.pac-container .pac-icon-marker {display:none!important;}
.pac-matched {font-weight: 400; color: #777;}
.pac-container .pac-item {border-top: 1px solid #d9d9d9 !important;padding: 5px 10px !important;font-size: 14px;font-weight: 400;}
.pac-item-query {font-size: 13px;padding-right: 3px;}
</style>
</head>
<body>

 <input type="text" name="searchName" id="searchName" class="form-control" style="width:500px;" value="" placeholder="Discover and Unleash Happiness you cherish">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBwzkKvM75QzamE7BzVZTfEBwRO6FHEz4U"></script>
<script type="text/javascript">
       google.maps.event.addDomListener(window, "load", function () {
		   /*                                                                                                                 
		   var places = new google.maps.places.Autocomplete((document.getElementById('search-TB')),{
	   types: ['geocode'],
			 componentRestrictions: {country: 'DE'}//UK only   
			 });*/
		   var places = new google.maps.places.Autocomplete((document.getElementById("searchName")));
           google.maps.event.addListener(places, "place_changed", function () {
               var place = places.getPlace();
               var address = place.formatted_address;
                       
               var latitude = place.geometry.location.lat();
               var longitude = place.geometry.location.lng();
			   document.getElementById("latitude").value = latitude;
			   document.getElementById("longitude").value = longitude;
			   
           });                 
      });
</script>

</body>
</html>
