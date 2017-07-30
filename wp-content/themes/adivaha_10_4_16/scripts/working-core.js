var Adivaha = angular.module('Adivaha', ['chieffancypants.loadingBar', 'ui.bootstrap', 'ngAnimate', 'ngMaterial', 'ui.router', 'ngAutocomplete', 'checklist-model', 'ngMap', 'elif', 'angularUtils.directives.dirPagination'])

/* ISSUE CODE COMMENT */	
/*
'rzModule',

no use this code = 'angular-sticky-box',
 
*/	
	
	Adivaha.config(function(cfpLoadingBarProvider) {
		cfpLoadingBarProvider.includeSpinner = true;
	});
	
	Adivaha.config(function($mdIconProvider) {
	$mdIconProvider
	.iconSet('device', 'img/icons/sets/device-icons.svg', 24);
	});
	
	
	Adivaha.controller('currencies', function($scope, $location) {

		$scope.currency =  [{ title: "US Dollar", id: "USD", sign: "USD"},
		{ title: "Russian ruble", id: "RUB", sign: "RUB"},
		{ title: "Australian Dollar", id: "AUD", sign: "AUD"},
		{ title: "Euro", id: "EUR", sign: "EUR"},
		{ title: "Brazilian Real", id: "BRL", sign: "BRL"},
		{ title: "Canadian Dollar", id: "CAD", sign: "CAD"},
		{ title: "Swiss Franc", id: "CHF", sign: "CHF"},
		{ title: "Hong Kong Dollar", id: "HKD", sign: "HKD"},
		{ title: "Indonesian Rupiah", id: "IDR", sign: "IDR"},
		{ title: "Indian Rupee", id: "INR", sign: "INR"},
		{ title: "New Zealand Dollar", id: "NZD", sign: "NZD"},
		{ title: "Filipino Peso", id: "PHP", sign: "PHP"},
		{ title: "Polish Zloty", id: "PLN", sign: "PLN"},
		{ title: "Singapore Dollar", id: "SGD", sign: "SGD"},
		{ title: "Thai Baht", id: "THB", sign: "THB"},
		{ title: "British Pound", id: "GBP", sign: "GBP"},
		{ title: "South African Rand", id: "ZAR", sign: "ZAR"},
		{ title: "Ukrainian Hryvnia", id: "UAH", sign: "UAH"},]
		
		document.getElementById("selected_byuser_currency").value = "USD";
		document.getElementById("currency_sign").value = "USD";
		$scope.$root.User_selected_currency = "USD";
		$scope.$root.currency_sign = "USD";
		
		$scope.selected_currency = function(id, sign){
			document.getElementById("selected_byuser_currency").value = id;
			document.getElementById("currency_sign").value = sign;
			$scope.$root.User_selected_currency = id;
			$scope.$root.currency_sign = sign;
			
			
			var search = $location.search();
			if(typeof(search.locationId)!="undefined"){
				var params_new = "?desti="+search.desti+"&locationId="+search.locationId+"&checkIn="+search.checkIn+"&checkOut="+search.checkOut+"&adults="+search.adults+"&language="+search.language+"&null&currency="+$scope.$root.User_selected_currency;
				$location.url(params_new);
					window.location.reload();
				}
			}
		
		
	});
		
	
	
	Adivaha.directive('ngToggle', [
	  '$parse',
	  function($parse){
		return {
		  restrict: 'A',
		  link: function(scope, element, attrs){
			var modelFn = $parse(attrs.ngToggle);
			element.on('click', function(){
			  scope.$apply(function(){
				modelFn.assign(scope, !modelFn(scope));
			  });
			});
			scope.$watch(modelFn, function(value){
			  element.toggleClass('toggled', !!value);
			});
		  }
		}
	  }
	]);
	
	
	
	
	//Basic Path Configuration, Page includes and Their respective Controllers.
	Adivaha.config(function($stateProvider){
        $stateProvider
            .state("home", {
                url: "/home",
                views: {
                    "searchbox":{
                        templateUrl: "templates/searchbox.html",
                        controller: "Hotel_Controller",
                        controllerAs: "Hotel_Ctrl"
                    },"banner":{
                        templateUrl: "templates/banner.html",
                        controller: "banner_Controller",
                        controllerAs: "banner_Ctrl"
                    }
					/* this code by mk */
					,"body-part":{
                        templateUrl: "templates/body.html",
                        controller: "body_Controller",
                        controllerAs: "body_Ctrl"
                    }
					/* this code by mk */
					
                }

            })
			
		        .state("search", {
                url: "/search/",
                views: {
						"search_results":{
                        templateUrl: "templates/search-results.html",
                        controller: "search_Results_Controller",
                        controllerAs: "search_Results_Ctrl"
                    }
                },
                resolve: {
                    
                }
            })

			
			.state("hotel-information", {
                url: "/hotel-information/:hotelID",
                templateUrl: "templates/hotel-information.html",
                controller: "Hotel_Information_Controller",
                controllerAs: "Hotel_Information_Ctrl",
            })

            .state("online-booking", {
                url: "/online-booking/:rateCode/:hotelId",
                templateUrl: "templates/online-booking.html",
                controller: "OnlineBooking_Controller",
                controllerAs: "OnlineBooking_Ctrl",
                resolve: {
                    getRoomInformation: function($http, $stateParams){
                        return $http.post('http://localhost/ean/api/update_rates.php?action=Show_Room_Info&hotel_id='+$stateParams.hotelId+'&Cri_DateFrom=12/12/2016&Cri_DateTo=12/14/2016&Cri_noofRooms=1&Cri_Adults=2&Cri_Childs=0&Cri_Pacs=[{"adults":"2","childs":"0","childAge":null}]&Cri_currency=USD&Cri_language=en_US&cid=478696&apiKey=1i1a6ec208guanrn8fl3dbie5r&secret=1h555i482nvqk&ModeType=Test')
                            .then(function(response){
                                return response.data;
                            })
                    }
                }
            })
			
			
			.state("confirmation", {
                url: "/confirmation/:rateCode/:hotelId",
				templateUrl: "templates/confirmation.html",
                controller: "confirmation_Controller",
                controllerAs: "confirmation_Ctrl"
            })
			


    })
	
	
	
	
	
	Adivaha.controller("confirmation_Controller", function(getRoomInformation, $scope, $stateParams){
        $scope.rateCode = $stateParams.rateCode;
        $scope.hotelId = $stateParams.hotelId;
        $scope.Room_Details = getRoomInformation.HotelRoomAvailabilityResponse.HotelRoomResponse;
        $scope.Book_Now = function(){
		}
    })
	
	
	
  	Adivaha.controller('bodyloader', function ($scope, $http, cfpLoadingBar) {
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
    }
  });
  
  

	
	Adivaha.controller("Hotel_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $modal, $location, $state) {
		$scope.showpopup = false;	
		
		var search = $location.search();
		$scope.desti = search.desti;
		$scope.locationId = search.locationId;
		$scope.datatype = search.datatype;
		document.getElementById("checkIn").value = search.checkIn;
		document.getElementById("checkOut").value = search.checkOut;
		if(typeof(search.adults)=="undefined"){
			$scope.adults = 2;
		}else{
			$scope.adults = search.adults;
		}
		
		//alert(JSON.stringify(search));
		
		//https://suggest.expedia.com/api/v4/typeahead/delh?callback=jQuery182030660266467597386_1476116944496&regiontype=2047&locale=en_IN&lob=HOTELS&format=jsonp&features=ta_hierarchy%7Ccontextual_ta%7Cpostal_code&maxresults=10&client=Homepage&siteid=27&guid=c3e92023da26467d8236d66b7f0463d6&device=desktop&browser=Chrome&_=1476117042744
		$scope.getLocation_Hint = function(val) {
			return $http.get('http://yasen.hotellook.com/autocomplete', {
				params: {
				lang: "en-US",
				limit: "5",
				term: $scope.desti
				}
			}).then(function(response){
				//alert(JSON.stringify(response.data.hotels));
				if(JSON.stringify(response.data.hotels) != "[]" && JSON.stringify(response.data.hotels) != "[]"){
					$scope.hotel_destinations = response.data.hotels;
					$scope.city_destinations = response.data.cities;
					$scope.showpopup = true;	
				}else{
					$scope.showpopup = false;
				}
				
			});
		};
  
  		$scope.Update_Search_Field = function(lat, lon, latinFullName, hotel_or_destination){
			$scope.lat = lat;
			$scope.lon = lon;
			$scope.desti = latinFullName;
			$scope.datatype = hotel_or_destination;
			$scope.showpopup = false;
		}
		$scope.Search_Destinations = function(){
			if($scope.datatype == "hotel"){
				var urls = "http://twc5.com/demo/tp/hotel-information/#/hotels/?adults="+$scope.adults+"&checkIn="+document.getElementById("checkIn").value+"&checkOut="+document.getElementById("checkOut").value+"&searchType=hotel&searchId="+$scope.locationId+"&children=&language=en-US&currency=USD&marker=56459";
			}else{
				var urls = "search/?desti="+$scope.desti+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+document.getElementById("checkIn").value+"&checkOut="+document.getElementById("checkOut").value+"&adults="+$scope.adults+"&language=en-US&currency="+document.getElementById("currency_sign").value;
			}
			$location.url(urls);
			
		}
		
    })
    Adivaha.controller("search_Results_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $modal, $location, NgMap, Hotel_Fetched, $state){
        //alert(JSON.stringify(hotelList));
 		
		
		this.reloadData = function(){
			$state.reload();
		}
		
		//alert("Loading Search Results");
		//Get the Parameteres of URL in search page
		//----------------------------------------------------------
			var search = $location.search();
			//alert(JSON.stringify(search));
			$scope.lat = search.lat;
			$scope.lon = search.lon;
			/*$scope.hotelId = search.hotelId;*/
			$scope.checkIn = search.checkIn;
			$scope.checkOut = search.checkOut;
			document.getElementById("checkIn").value = search.checkIn;
			document.getElementById("checkOut").value = search.checkOut;
			$scope.Cri_Adults = search.adults;
			$scope.Cri_currency = search.currency;
			$scope.$root.User_selected_currency = search.currency;
			$scope.Cri_language = search.language;
			$scope.destination_name = search.desti;
			$scope.search_Session_Id = "";
			
			
			
		//End of Get the Parameteres of URL in search page
		//----------------------------------------------------------
		
		
		//Start of Checkboxes
		$scope.roles = [
		{id: 1, title: 'Loading...'}
		];
		$scope.user = {
		roles: []
		};
		//End of Checkboxes
		
		
		//Set Default Values
		//----------------------------------------------------------
		$scope.hotels_found = 0;
		var search_id = 0
		$scope.currency_sign = document.getElementById("currency_sign").value;
		$scope.distance_Control = "";
		$scope.star_Rating_Control = "";
		$scope.min_Price_Control = 0;
		$scope.max_Price_Control = 0;
		$scope.list_Or_Map_Control = "list";
		$scope.sorting_Field_Control = "recommended";
		$scope.sorting_order_Control = "true";
		$scope.Loading_msg = "Looking for Availibility";
		$scope.recommended_tab = true;
		$scope.price_tab = false;
		$scope.starrating_tab = false;
		$scope.discounts_tab = false;
		//End of Set Default Values
		//----------------------------------------------------------
		
		
		//Code for the Slider
		//----------------------------------------------------------
		//$scope.minRangeSlider = { minValue: 10,	maxValue: 90, options: { floor: 0, ceil: 100,step: 1}};
		//End of Code for the Slider
		//----------------------------------------------------------
		FindKey()
		function FindKey(){
		//Get the SearchID 
		//Trigger for the temp search results once we receive the Search ID
		//Store the hotels into the database.
			//var url = "http://localhost/ean/api/update_rates.php?action=findSearchKey&searchId=6563186&countryCode=undefined&Cri_currency=USD"
			var param = "action=findSearchKey&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+document.getElementById("checkIn").value+"&checkOut="+document.getElementById("checkOut").value+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language;
			
			var url = "http://localhost/ean/api/update_rates.php?"+param;
			//alert(url);
			document.getElementById("checkIn").value = search.checkIn;
			document.getElementById("checkOut").value = search.checkOut;
			//alert("Find Key URL : " + url);
			$http.get(url).success( function(response) {
					//Search Session ID will be stored in search_id variable
					//We then call the Update_Rates Function to update the view with the temp results
					//Check if Results are arleady in the database 
					//If records are there in database, call Update View else call Update Rates
					//alert("Find Key");
					//alert(JSON.stringify(response.results));
					$scope.search_Session_Id = response.search_session;
					$scope.hotelList = response.results;
					//alert(JSON.stringify(response.HotelListResponse.HotelList.HotelSummary));
					$scope.currentPage = 1;
					$scope.pageSize = 12;
					$scope.pageChangeHandler = function(num) {
						console.log('meals page changed to ' + num);
					};
					//alert("Three Records Updated")
					if(response.search_session == null){
						//FindKey();
						return false;
					}
					
					if(response.exist=='Yes'){
						//alert(JSON.stringify(response));
						$scope.hotels_found = parseInt(response.totalrecords);
						$scope.stars5 = parseInt(response.stars5);
						$scope.stars4 = parseInt(response.stars4);
						$scope.stars3 = parseInt(response.stars3);
						$scope.stars2 = parseInt(response.stars2);
						$scope.stars1 = parseInt(response.stars1);
						$scope.stars0 = parseInt(response.stars0);
						
						$scope.distance50 = parseInt(response.distance50);
						$scope.distance20 = parseInt(response.distance20);
						$scope.distance10 = parseInt(response.distance10);
						$scope.distance5 = parseInt(response.distance5);
						$scope.distance2 = parseInt(response.distance2);
						
						
						$scope.minRangeSlider = { minValue: parseInt(response.minrate), maxValue: parseInt(response.maxrate), options: { floor: parseInt(response.minrate), ceil: parseInt(response.maxrate),step: 1, onEnd: $scope.myChangeListener}};
						
						$scope.guestminRangeSlider = { minValue: parseInt(response.minguest), maxValue: parseInt(response.maxguest), options: { floor: parseInt(response.minguest), ceil: parseInt(response.maxguest),step: 1, onEnd: $scope.myChangeListener}};
						
						//Get the Ameneties once the data is stored into the database.
						var param = 'action=getAmenities&search_Session_Id='+$scope.search_Session_Id+"&location_Id="+$scope.location_Id+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language;
						
						var url = "http://localhost/ean/api/update_rates.php?"+param;
						//alert("Amneties URL : " + url);
						$http.get(url).success( function(response) {
							//alert("Amneties");
							//alert(JSON.stringify(response));
							$scope.Ameneties_List = response;
							$scope.roles = response;
							$scope.Hotel = {
								
							};
							Upldate_Searched_Hotels();
						});
						
					}else{
						Upldate_Rates();
					}
				});
															 }
				
				function Upldate_Rates(){
					//Generate the parameteres
					var param = 'action=Upldate_Rates&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language;
					//alert(param);
					var url = "http://localhost/ean/api/update_rates.php?"+param;
					//alert("Update Rates URL : " + url);
					$http.get(url).success( function(response) {
						//alert(JSON.stringify(response));
						$scope.Loading_msg = "Please wait while we are finding you the softest pillows ...";
						
							//If we find the results
							//we Bind the temp results into the view
							//alert(JSON.stringify(response))
							//alert("Hotel Limited Results");
							//alert(JSON.stringify(response));
							$scope.hotelList = response.HotelListResponse.HotelList.HotelSummary;
							$scope.setResults = Hotel_Fetched.setResults(response.HotelListResponse.HotelList.HotelSummary);	
							//alert(JSON.stringify(response.HotelListResponse.HotelList.HotelSummary));
							$scope.currentPage = 1;
							$scope.pageSize = 12;
							$scope.pageChangeHandler = function(num) {
								console.log('meals page changed to ' + num);
							};
							//Now after showing temp results, Fetch all the records
							Upldate_Rates_All();
					});
				}
				function Upldate_Rates_All(){ 
					//Generate the parameteres
					var param = 'action=Upldate_Rates_All&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language;
					
					var url = "http://localhost/ean/api/update_rates.php?"+param;
					//alert("Update Rates All URL : " + url);
					//Fetch all the results against search session id
					//and update it into the database
					//update the controls like, max min values and number of hotels in respective star labels in search controls
					$http.get(url).success( function(response) {
						//alert(JSON.stringify(response));
						//Update Search Controls
						
						//alert("Hotel All Results");
						//alert(JSON.stringify(response));
							
							
						$scope.Loading_msg = "Select your accommodation2";
						$scope.hotels_found = response.totalrecords;
						$scope.stars5 = response.stars5;
						$scope.stars4 = response.stars4;
						$scope.stars3 = response.stars3;
						$scope.stars2 = response.stars2;
						$scope.stars1 = response.stars1;
						$scope.stars0 = response.stars0;
						
						
						$scope.distance50 = response.distance50;
						$scope.distance20 = response.distance20;
						$scope.distance10 = response.distance10;
						$scope.distance5 = response.distance5;
						$scope.distance2 = response.distance2;
						
						$scope.minRangeSlider = { minValue: parseInt(response.minrate), maxValue: parseInt(response.maxrate), options: { floor: parseInt(response.minrate), ceil: parseInt(response.maxrate),step: 1, onEnd: $scope.myChangeListener}};
						
						$scope.guestminRangeSlider = { minValue: parseInt(response.minguest), maxValue: parseInt(response.maxguest), options: { floor: parseInt(response.minguest), ceil: parseInt(response.maxguest),step: 1, onEnd: $scope.myChangeListener}};
						
						//Get the Ameneties once the data is stored into the database.
						var param = 'action=getAmenities&search_Session_Id='+$scope.search_Session_Id+"&location_Id="+$scope.location_Id+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language;
						
						var url = "http://localhost/ean/api/update_rates.php?"+param;
						//alert("Ameneties Saved URL : " + url);
						$http.get(url).success( function(response) {
							//alert(JSON.stringify(response));
							
							//alert("Ameneties Saved Results");
							//alert(JSON.stringify(response));
							
							$scope.Ameneties_List = response;
							$scope.roles = response;
							$scope.Hotel = {
								Ameneties_List: ["131", "50"]
							};
							Upldate_Searched_Hotels();
						});
						
					});
				}
				
				
				$scope.Update_Results = function(){
					Upldate_Searched_Hotels();
				}
				
				$scope.myChangeListener = function(){
					Upldate_Searched_Hotels();
				}
				
				$scope.filter_Distance = function(param_control){
					$scope.distance_Control = param_control;
					Upldate_Searched_Hotels();
				}
				
				$scope.filter_Rating = function(param_control){
					$scope.star_Rating_Control = param_control;
					Upldate_Searched_Hotels();
				}
				$scope.function_list_Or_Map_Control = function(param_control){
					$scope.list_Or_Map_Control = param_control;
					if(param_control=="map"){
						//alert("Cicked on Map, put your codes here");
						/* add class */
					
					}
					//Upldate_Searched_Hotels();
				}
				
				
				
				$scope.function_sorting_Field_Control = function(param_control){
					
					if($scope.previous_sorting==param_control){
						$scope.sorting_order_Control = !$scope.sorting_order_Control;
					}
					if(param_control=="recommended"){
						$scope.recommended_tab = true;
						$scope.price_tab = false;
						$scope.starrating_tab = false;
						$scope.discounts_tab = false;
						$scope.recommended_counter = $scope.recommended_counter + 1;
					}
					if(param_control=="price"){
						$scope.recommended_tab = false;
						$scope.price_tab = true;
						$scope.starrating_tab = false;
						$scope.discounts_tab = false;
					}
					if(param_control=="starrating"){
						$scope.recommended_tab = false;
						$scope.price_tab = false;
						$scope.starrating_tab = true;
						$scope.discounts_tab = false;
					}
					if(param_control=="discounts"){
						$scope.recommended_tab = false;
						$scope.price_tab = false;
						$scope.starrating_tab = false;
						$scope.discounts_tab = true;
					}
					$scope.previous_sorting =  param_control;
					$scope.sorting_Field_Control = param_control;
					Upldate_Searched_Hotels();
				}
				
				
				
				
				
				
				function Upldate_Searched_Hotels(){ 
					//Generate the parameteres
					//This filters the results
					//This works now from the local database
					var param = 'action=Searched_Hotels&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.Cri_currency+"&Cri_language="+$scope.Cri_language+"&Cri_Rating="+$scope.star_Rating_Control+"&Cri_Distance="+$scope.distance_Control+"&Cri_Price="+$scope.minRangeSlider.minValue+"-"+$scope.minRangeSlider.maxValue+"&Cri_amenity="+$scope.user.roles+"&list_Or_Map_Control="+$scope.list_Or_Map_Control+"&orderby_fild="+$scope.sorting_Field_Control+"&orderby_val="+$scope.sorting_order_Control;
					
					var url = "http://localhost/ean/api/update_rates.php?"+param;
					
					
					//alert(url);
					$http.get(url).success( function(response) {
													 
						//alert("Ameneties Saved Results");
						//alert(JSON.stringify(response));
						$scope.Loading_msg = "Select your accommodation";
						$scope.hotels_found = parseInt(response.result.length);
						$scope.currentPage = 1;
						$scope.pageSize = 12;
						$scope.hotelList = response.result;
						
						//vm.shops = response.result;
						
						$scope.setResults = Hotel_Fetched.setResults(response.result);	
						$scope.pageChangeHandler = function(num) {
							console.log('meals page changed to ' + num);
						};
					});
				}
				
				
				
				
		})
		
		
		Adivaha.controller("OtherController", function($scope, $location, $anchorScroll){
			$scope.pageChangeHandler = function(num) {
				console.log('going to page ' + num);
				// the element you wish to scroll to.
				$location.hash('top');
				// call $anchorScroll()
				$anchorScroll();
			};
		});
	
    	Adivaha.controller("Hotel_Information_Controller", function($scope, $stateParams, $http){
		
       //This works now from the local database
		var param = "action=Hotel_Description&hotel_id="+$stateParams.hotelID+"&Cri_currency=USD";
		
		var url = "http://localhost/ean/api/update_rates.php?"+param;
		
		
		//alert(url);
		$http.get(url).success( function(response) {
			$scope.HotelSummary = response.HotelInformationResponse.HotelSummary;
			$scope.HotelImages = response.HotelInformationResponse.HotelImages;	
			$scope.HotelDetails = response.HotelInformationResponse.HotelDetails;	
			$scope.PropertyAmenities = response.HotelInformationResponse.PropertyAmenities.PropertyAmenity;	
			//alert(JSON.stringify(response.HotelInformationResponse.PropertyAmenities.PropertyAmenity));
			
			$scope.slides = [];
			$scope.myInterval = 3000;
			
			var countter_images = 0;
			var Obj_Images = [];
			if($scope.HotelImages.HotelImage.length >=10){
				countter_images = 10;
			}
			for(countter=1; countter<=countter_images; countter++){
				//alert($scope.HotelImages.HotelImage[countter].url);
				Obj_Images = {
						title: "Hello Text",
						image: $scope.HotelImages.HotelImage[countter].url.replace("_b.jpg", "_z.jpg")
				}
				//alert(JSON.stringify(Obj_Images));
				$scope.slides.push(Obj_Images);
			}
			
			/*alert(JSON.stringify($scope.slides));
			
			
			

			$scope.slides = [
			{
			image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
			title: 'Pic 1'
			},
			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 2'
			},
			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 3'
			},
			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 4'
			},

			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 5'
			},

			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 6'
			},

			{
			image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
			title: 'Pic 7'
			},
			{
			image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
			title: 'Pic 8'
			},
			{
			image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			title: 'Pic 9'
			}
			];
			
			
			///image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
			///title: 'Pic 9'
			
			*/
		});
					
					
					
    })
	
	

	
		Adivaha.controller("CarouselDemoCtrl", function CarouselDemoCtrl($scope){
	  $scope.myInterval = 3000;
	  $scope.slides = [
    {
      image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
	   title: 'Pic 1'
    },
    {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 2'
    },
	 {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 3'
    },
	 {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 4'
    },
	
	 {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 5'
    },
	
	 {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 6'
    },
	
	{
      image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
	   title: 'Pic 7'
    },
    {
      image: 'http://www.adivaha.com/demo/vacation-rental-wordpress-theme/wp-content/themes/adivaha/images/home-3-1.jpg',
	   title: 'Pic 8'
    },
    {
      image: 'http://www.adivaha.com/demo/wego/wp-content/themes/adivaha/images/gal1.jpg',
	   title: 'Pic 9'
    }
  ];
})
	
	
    
	/* code by mk */
	Adivaha.controller("banner_Controller", function($scope){
        $scope.bannerheading = "WordPress Expedia Theme";
		$scope.bannercontent = "Planning to develop Hotel Directory Site? Get your own site quickly in few easy steps. Install, Enter API Key Credentials, 100% Customizable, Easy and Fast Approval and 24/7 Customer Support. We help you with all.";
    })
	

	Adivaha.controller("body_Controller", function($scope){
        $scope.bannerheading = "WordPress Expedia Theme";
		$scope.bannercontent = "Planning to develop Hotel Directory Site? Get your own site quickly in few easy steps. Install, Enter API Key Credentials, 100% Customizable, Easy and Fast Approval and 24/7 Customer Support. We help you with all.";
    })
	
	

	
	Adivaha.controller("blank_Controller", function($scope){
        
    })

Adivaha.factory("Hotel_Fetched", function () {
    var results_fe = "";
     function getResults() {
        return results_fe;
    }
    function setResults(newValue) {
        results_fe = newValue;
    }
    return {
        getResults: getResults,
        setResults: setResults,
    }
});


Adivaha.controller('MyCtrl', function($scope, NgMap, Hotel_Fetched) {
													  
	
	
  var vm = this;
  var bounds = new google.maps.LatLngBounds();
  
  NgMap.getMap().then(function(map) {
    vm.map = map;
  });
	
  vm.shops = [
		
  ];

	vm.showDetail = function(e, shop) {
    vm.shop = shop;
    vm.map.showInfoWindow('foo-iw', this);
  };

  vm.hideDetail = function() {
    vm.map.hideInfoWindow('foo-iw');
  };
  
  
  
  $scope.$watch(function () { 
			return Hotel_Fetched.getResults(); 
		}, function (newValue) {
			$scope.results_fe = newValue;
			vm.shops = newValue;
    });
});












/* add scripts sticky*/