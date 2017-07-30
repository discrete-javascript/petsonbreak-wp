var Adivaha = angular.module('Adivaha', ['chieffancypants.loadingBar', 'ui.bootstrap', 'ngAnimate', 'ngMaterial', 'ui.router', 'ngAutocomplete', 'checklist-model', 'ngMap', 'elif', 'angularUtils.directives.dirPagination', 'rzModule','ngSanitize'])

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
	
	
	Adivaha.controller('currencies', function($scope, $location, $state,$http) {
		$scope.SiteUrl = document.getElementById("siteurl").value;
        $scope.TemplateUrl = document.getElementById("template_url").value;
		$scope.currencyList = {'AUD': {title:'Australian Dollar',symbol:'&#8371;'},
							   'BRL': {title:'Brazilian Real',symbol:'&#x20a8;'},
							   'CAD': {title:'Canadian Dollar',symbol:'&#36;'},
							   'CHF': {title:'Swiss Franc',symbol:'&#8355;'},
							   'CNY': {title:'China Yuan',symbol:'&#165;'},
							   'DKK': {title:'Danish Kroner',symbol:'DKK'},
							   'EUR': {title:'Euro',symbol:'&#128;'},
							   'GBP': {title:'British Pound',symbol:'&#163;'},
							   'HKD': {title:'Hong Kong Dollar',symbol:'HK&#36;'},
							   'ILS': {title:'Israel New Shekel',symbol:'&#8362;'},
							   'IDR': {title:'Indonesian Rupiah',symbol:'Rp'},
							   'INR': {title:'Indian Rupee',symbol:'&#x20B9;'},
							   'JPY': {title:'Japanese Yen',symbol:'&#165;'},
							   'KRW': {title:'Korean Won',symbol:'&#8361;'},
							   'MXN': {title:'Mexican Peso',symbol:'&#36;'},
							   'MYR': {title:'Malaysian Ringgit',symbol:'RM;'},
							   'NOK': {title:'Norwegian Kroner',symbol:'kr;'},
							   'NZD': {title:'New Zealand Dollar',symbol:'NZ&#36;'},
							   'RUB': {title:'Russian Ruble',symbol:'&#8359;'},
							   'SEK': {title:'Swedish Krona',symbol:'SEK'},
							   'SGD': {title:'Singapore Dollar',symbol:'S&#36;'},
							   'THB': {title:'Thai Bhatt',symbol:'&#0E3F;'},
							   'TWD': {title:'New Taiwan Dollar',symbol:'NT&#36;'},
							   'USD': {title:'US Dollar',symbol:'&#36;'}
							  };
		
		var search = $location.search();
		$scope.currency =search.currency;
		$scope.language =search.language;
		
		
		if(typeof $scope.currency=='undefined'){
			$scope.currency =$('#default_currency').val();
		}
		if(typeof $scope.language=='undefined'){
			$scope.language =$('#active_language').val();
		}
		
		var pageName=$('#pageName').val();
		if(pageName=='manage-flight'){ // for white lableling
		$scope.currency =$('#wh_currency').val();
		}
		$scope.symbol =$scope.currencyList[$scope.currency].symbol;
		$scope.currTitle =$scope.currencyList[$scope.currency].title;
		$scope.currKey =$scope.currency;
		
		
		$scope.selected_currency = function(id){ 
		    $scope.fn =search.fn;
		    
			document.getElementById("currency").value = id;
			$scope.symbol =$scope.currencyList[id].symbol;
			$scope.currTitle =$scope.currencyList[id].title;
			$scope.currKey =id;
			
			if($scope.fn=='search'){ 
			  $state.go("search", {"fn":search.fn,"desti": search.desti, "lat": search.lat, "lon": search.lon, "checkIn": search.checkIn, "checkOut": search.checkOut,"language": $scope.language, "currency": id,"hotelType": search.hotelType,"rooms": search.rooms, "adults": search.adults, "childs": search.childs,"childAge": search.childAge }); 
		    }
			else if($scope.fn=='hotelInfo'){
			  $state.go("hotel-information", {"fn":search.fn,"checkIn": search.checkIn, "checkOut": search.checkOut,"language": $scope.language, "currency": id,"hotelType": search.hotelType,"rooms": search.rooms, "adults": search.adults, "childs": search.childs,"childAge": search.childAge }); 
	       }
		   else if($scope.fn=='onlinebooking'){
			  $state.go("online-booking", {"fn":search.fn,"checkIn": search.checkIn, "checkOut": search.checkOut,"language": $scope.language, "currency": id,"rooms": search.rooms, "adults": search.adults, "childs": search.childs,"childAge": search.childAge }); 
	       }
		   else{ 
			  var currPath = $location.path();
			
			  var statePath = currPath.replace(/\//g, "");
			  var pageName=$('#pageName').val();
			  if(pageName=='manage-flight'){ // for white lableling
			    var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?action=setFlightCurrency&currency="+id;
				$http.get(url).success( function(response) {
					var hashUrl =window.location.hash;
					window.location.href=hashUrl+'/?currency='+id;
					window.location.reload(true); 
				}); 
				 /*
			     var hashUrl =window.location.hash;
				 window.location.href=hashUrl+'/?currency='+id;
				 window.location.reload(true); */
				 
			  }
			  else if(statePath!=''){
			     $state.go(statePath, {"language": search.language, "currency": id}); 
			  }
			  else{
				  var pageName=$('#pageName').val();
				  if(pageName=='home-page'){
				    $location.url('home/' + '?currency='+id+'&language='+$scope.language);
				  }
				  else if(pageName=='manage-destination'){
				    $location.url('/' + '?currency='+id+'&language='+$scope.language);
					window.location.reload(true); 
				  }
				  else{
					 $location.url('/' + '?currency='+id+'&language='+$scope.language); 
				  }
			  }
		    }
			
	    }
		
		// language changer
		$scope.selected_language = function(ean_lang,page_url){
		   var hashUrl =window.location.hash;
		   var current_ean_lang =$('#active_language').val();
		   var newhashUrl =hashUrl.replace('language='+current_ean_lang,'language='+ean_lang);
		   var pageName=$('#pageName').val();
		   if(pageName=='manage-flight'){ // for white lableling
		     var ean_lang_Arr =ean_lang.split('_');
			  window.location.href= page_url+''+hashUrl+'/?currency='+$('#currency').val()+'&locale='+ean_lang_Arr[0];
			  
			  //window.location.reload(true); 
		   }
		   else{
			  window.location.href=page_url+''+newhashUrl;	 
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
	
	
	Adivaha.controller('header_Controller', function($scope, $location, $state,$window) {
		 $scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		$scope.selectType = function(type){ 
           $(".nav-pills").removeClass("hidethis");		
		   $('.tabbss').removeClass('active');
		   $('.tab_'+type).addClass('active');
		   if( (type==1) || (type==3) || (type==4) || (type==5)){
				$('#hotelType').val(type);
				$('.tab-pane').removeClass('active');
				$('#tab-hotel').addClass('active');
			}
			else{
				$('.tab-pane').removeClass('active');
				$('#tab-flight').addClass('active');
			}
			//$window.location.reload();
		}
	  $scope.logoGoBack=function(){ 
			$(".nav-pills").removeClass("hidethis");
			$scope.selectType('1');
			$window.location.href = document.getElementById("siteurl").value;
			//$window.location.reload();
		}
			
	});
	
	
	//Basic Path Configuration, Page includes and Their respective Controllers.
	Adivaha.config(function($stateProvider, $urlRouterProvider){
        $stateProvider
		    
			.state('default', {
				url: '',
				 views: {
                    "searchbox":{
                        templateUrl: document.getElementById("template_url").value+"/templates/searchbox.html",
                        controller: "Hotel_Controller",
                        controllerAs: "Hotel_Ctrl"
                    },"banner":{
                        templateUrl: document.getElementById("template_url").value+"/templates/banner.html",
                        controller: "banner_Controller",
                        controllerAs: "banner_Ctrl"
                    }
					
                },
				resolve: {
                    
                }
			})
			
			
			.state("home", {
                url: "/home/?tab,language,currency",
                views: {
                    "searchbox":{
                        templateUrl: document.getElementById("template_url").value+"/templates/searchbox.html",
                        controller: "Hotel_Controller",
                        controllerAs: "Hotel_Ctrl"
                    },"banner":{
                        templateUrl: document.getElementById("template_url").value+"/templates/banner.html",
                        controller: "banner_Controller",
                        controllerAs: "banner_Ctrl"
                    }
                }
            })
			
			
			.state("search", {
				url: "/search/?fn,desti,lat,lon,checkIn,checkOut,language,currency,hotelType,rooms,adults,childs,childAge",
                views: {
						"search_results":{
                        templateUrl: document.getElementById("template_url").value+"/templates/search-results.php",
                        controller: "search_Results_Controller",
                        controllerAs: "search_Results_Ctrl"
                    }
                },
                resolve: {
                    
                }
            })

			
			.state("hotel-information", {
                url: "/hotel-information/:hotelID/?fn,checkIn,checkOut,language,currency,hotelType,rooms,adults,childs,childAge",
                templateUrl: document.getElementById("template_url").value+"/templates/hotel-information.php",
                controller: "Hotel_Information_Controller",
                controllerAs: "Hotel_Information_Ctrl",
            })

            .state("online-booking", {
                url: "/online-booking/:rateCode/:hotelId/?fn,checkIn,checkOut,language,currency,rooms,adults,childs",
                templateUrl: document.getElementById("template_url").value+"/templates/online-booking.php",
                controller: "OnlineBooking_Controller",
                controllerAs: "OnlineBooking_Ctrl"
                }
			)
			
			
			.state("confirmation", {
                url: "/confirmation/:itineraryId",
				templateUrl: document.getElementById("template_url").value+"/templates/confirmation.php",
                controller: "confirmation_Controller",
                controllerAs: "confirmation_Ctrl"
            })
			
			.state("flight_search", {
                url: "/flight_search/?Flights_City_From,Flights_City_to,Flights_City_From_IATACODE,Flights_City_to_IATACODE,Flights_Return_direct ,Flights_Start_Date ,Flights_End_Date,Flights_Adults,Flights_Children,Flights_Infants,Flights_Category_Economy,currency",
				views: {"flight_search_View":{
                      templateUrl: document.getElementById("template_url").value+"/templates/flight_search-results.php",
			          controller: "flight_search_Results_Controller",
			          controllerAs: "flight_search_Results_Ctrl"
                    }
                },
                resolve: {
                    
                }

            })
			
    })
	
	
	
	
	
	Adivaha.controller("confirmation_Controller", function($scope, $stateParams, $http,$state){
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
        var url = document.getElementById("template_url").value+'/api/update_rates.php?action=Confirmation&itineraryId='+$stateParams.itineraryId;
		$http.get(url).success( function(response) {
			$scope.BookingDetails = response;
				//alert(JSON.stringify($scope.BookingDetails));
		});
    })
	


	
  	Adivaha.controller('bodyloader', function ($scope, $http, cfpLoadingBar) {
  		$scope.SiteUrl = document.getElementById("siteurl").value;
  		$scope.TemplateUrl = document.getElementById("template_url").value;
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
    }
  });
  
  
	Adivaha.controller("OnlineBooking_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $location, $state) {
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		
		
		$('html, body').animate({ scrollTop: 0 }, 0);
		var search = $location.search();
		$scope.adultsArr =[];
		$scope.childsArr =[];
		$scope.checkIn = search.checkIn;
		$scope.checkOut = search.checkOut;
		$scope.rooms = search.rooms;
		$scope.adults = search.adults;
		$scope.adultsArr = $scope.adults.split(",");
		$scope.childs = search.childs;
		$scope.childsArr = $scope.childs.split(",");
		$scope.Cri_currency = search.currency;
		
		$scope.language =search.language;
		$scope.Cri_language = search.language;
		
		 
		$scope.UserID =$('#login_userID').val();
		
		
		var url = document.getElementById("template_url").value+'/api/update_rates.php?action=Hotel_Description&hotel_id='+$stateParams.hotelId+'&Cri_currency='+$scope.Cri_currency+'&Cri_language='+$scope.Cri_language;
		$http.get(url).success( function(response) {
			$scope.HotelImages = response.HotelInformationResponse.HotelImages.HotelImage[0].url;
			$scope.HotelRating = response.HotelInformationResponse.HotelSummary.hotelRating;
			
			$scope.symbol =document.getElementById('currency_symbol').value;
		});
		
		var url = document.getElementById("template_url").value+'/api/update_rates.php?action=Show_Room_Info&hotel_id='+$stateParams.hotelId+'&Cri_currency='+$scope.Cri_currency+'&Cri_language='+$scope.Cri_language;
		
		var oneDay = 24*60*60*1000;
		$checkIn_Arr =$scope.checkIn.split('/');
		$checkOut_Arr =$scope.checkOut.split('/');
		var startDate =$checkIn_Arr[2]+','+$checkIn_Arr[1]+','+$checkIn_Arr[0];
		var endDate =$checkIn_Arr[2]+','+$checkIn_Arr[1]+','+$checkIn_Arr[0];
		var firstDate = new Date($scope.checkIn);
		var secondDate = new Date($scope.checkOut);
		
		$scope.nights = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
		
		
		
		$http.get(url).success( function(response) {
				$scope.Hotel_info_booking = response.HotelRoomAvailabilityResponse
				$(".checkininstruc").html($scope.Hotel_info_booking.checkInInstructions);
				//alert(JSON.stringify($scope.Hotel_info_booking));
				$scope.childAges=response.HotelRoomAvailabilityResponse.childAges;
				var size =$scope.Hotel_info_booking.size;
				$HotelRoomResponse = response.HotelRoomAvailabilityResponse.HotelRoomResponse;
				if(size==1){
					$scope.matchedRoom =$HotelRoomResponse;
					HotelPaymentRequest($stateParams.hotelId,$HotelRoomResponse.supplierType,$HotelRoomResponse.roomTypeCode,$scope.Cri_currency,$scope.Cri_language);
				}else{
				  for(a=0; a<$HotelRoomResponse.length; a++){
					if($HotelRoomResponse[a].rateCode==$stateParams.rateCode){
					  $scope.matchedRoom =$HotelRoomResponse[a];
					
					 HotelPaymentRequest($stateParams.hotelId,$HotelRoomResponse[a].supplierType,$HotelRoomResponse[a].roomTypeCode,$scope.Cri_currency,$scope.Cri_language);
					}
				   }
				}
				
			});
		
        // Payment Options 
         
          function HotelPaymentRequest(hotel_id,supplierType,rateType,Cri_currency,Cri_language){
			 var url = document.getElementById("template_url").value+'/api/update_rates.php?action=HotelPaymentRequest&hotel_id='+hotel_id+'&supplierType='+supplierType+'&rateType='+rateType+'&Cri_currency='+Cri_currency+'&Cri_language='+Cri_language;
			 $http.get(url).success( function(response) {
				//alert(JSON.stringify(response.HotelPaymentResponse.PaymentType));
				$scope.PaymentTypes =response.HotelPaymentResponse.PaymentType;
				//alert(JSON.stringify($scope.PaymentTypes));
			});		
		 }	
	})
	
	Adivaha.filter('range', function() {
		return function(input, total) {
			total = parseInt(total);
			for (var i=0; i<total; i++)
				input.push(i);
				return input;
		};
	});
	
	Adivaha.controller("Hotel_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $location, $state,$window) {
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		$scope.count =1;
		$scope.changeRooms =function(typ){
			if(typ=='minus'){
				var count =$('#Cri_noofRooms').val();
				$scope.count =(count-1);
			}
			if(typ=='plus'){
			  var count =$('#Cri_noofRooms').val();
			  $scope.count =parseInt(count)+1;
			}
			
			if($scope.count >0){
				Cri_noofRooms($scope.count);
			}
		}
		
		$scope.showpopup = false;	
		
		$scope.selectType = function(type){  
		   $('.tabbss').removeClass('active');
		   $('.tab_'+type).addClass('active');
		   if( (type==1) || (type==3) || (type==4) || (type==5)){
				$('#hotelType').val(type);
				$('.tab-pane').removeClass('active');
				$('#tab-hotel').addClass('active');
			}
			else{
				$('.tab-pane').removeClass('active');
				$('#tab-flight').addClass('active');
			}
		}
		$scope.hideRoomGroup =function(type){
			$('#Cri_Rooms').trigger('click');
		}			
		
		$("#Cri_Rooms").click(function(){ 
			if($(this).attr('rel')==0){
			   $(".roomgroupdata").removeClass("hidnumberofrooms");	
			   $(this).attr('rel',1);
			}else{
			  $(".roomgroupdata").addClass("hidnumberofrooms");	
			  $(this).attr('rel',0);	
			}
		});
		
		
		$('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
			//format: 'DD d MM yyyy',
			format: 'mm/dd/yyyy',
			startDate: "today",
			autoclose: true,
			
		});
		
		var search = $location.search();
		var hotelType =search.hotelType;
		var pageName =$('#pageName').val();
		
		if(pageName=='manage-flight'){ //white label flight
		 	hotelType=0;
		}
		
		if(hotelType=='0'){
		  $scope.selectType('0');
		}
		else if(hotelType=='4'){
		  $scope.selectType('4');
		}
		else if(hotelType=='3'){
		  $scope.selectType('3');
		}
		else if(hotelType=='5'){
		  $scope.selectType('5');
		}
		else{
		$scope.selectType('1');	
		}
		/*
		var tab =search.tab;
		if(tab=='flight'){
		  $scope.selectType('0');
		}
		else if(tab=='holiday'){
		  $scope.selectType('4');
		}
		else if(tab=='resort'){
		  $scope.selectType('3');
		}
		else if(tab=='bedbreakfast'){
		  $scope.selectType('5');
		}
		else{
		$scope.selectType('1');	
		}*/
		
		
		
		if(typeof(search.desti) == "undefined"){
			//var toDayDate = new Date('11/24/2016');
			
			var toDayDate = new Date();
			toDayDate.setDate(toDayDate.getDate()+10); 
			$('.input-daterange input[name="start"]').datepicker('setDate', toDayDate);
			
			var nextDayDate = new Date();
			 nextDayDate.setDate(nextDayDate.getDate()+11);
			$('.input-daterange input[name="end"]').datepicker('setDate', nextDayDate);
			
			$scope.checkdefault =0;
			
			
			// default destination
			$scope.desti = $('#default_destination').val(); 
			var default_destination_child = $('#default_destination_child').val().split('^^^');
			$scope.lat = default_destination_child[0];
			$scope.lon = default_destination_child[1];
			/*
			$scope.desti = "Delhi City, India";
			$scope.lat = "28.632558";
			$scope.lon = "77.220036";*/
			
			
			$scope.rooms = 1;
			$scope.adults = 2;
			$scope.childs = 0;
			$scope.Totaladults = 2;
			
			$scope.adultsArr=[2];
			$scope.childsArr =[0];
			$scope.childAgeData ='';
			roomTemplate($scope.rooms,$scope.adultsArr,$scope.childsArr,$scope.childAgeData);
			
		}else{
			$scope.checkdefault =1;
			$scope.desti = search.desti;
			$scope.lat = search.lat;
			$scope.lon = search.lon;
			
			$scope.checkIn = search.checkIn.replace("-", "/");
			$scope.checkIn = $scope.checkIn.replace("-", "/");
			$scope.checkIn = $scope.checkIn.replace("-", "/");
			$scope.checkOut = search.checkOut.replace("-", "/");
			$scope.checkOut = $scope.checkOut.replace("-", "/");
			$scope.checkOut = $scope.checkOut.replace("-", "/");
			
			var toDayDate = new Date($scope.checkIn);
			toDayDate.setDate(toDayDate.getDate());
			$('.input-daterange input[name="start"]').datepicker('setDate', toDayDate);
			
			var nextDayDate = new Date($scope.checkOut);
			$('.input-daterange input[name="end"]').datepicker('setDate', nextDayDate);
			
			$scope.rooms = search.rooms;
			$scope.adults = search.adults;
			$scope.childs = search.childs;
			$scope.adultsArr = $scope.adults.split(",");
			$scope.childsArr = $scope.childs.split(",");
			var Totaladults=0;
			for(var a=0;a<$scope.adultsArr.length;a++){
				Totaladults = Totaladults+parseInt($scope.adultsArr[a]);
			}
			$scope.Totaladults = Totaladults;
			//alert($scope.Totaladults);
			
			$scope.childStr = search.childAge;
			var childJosn =[];
			if(typeof $scope.childStr!='undefined'){
				var childAgeArr = $scope.childStr.split("-");
				var item =[];
				for (i = 0; i < childAgeArr.length; ++i) {
					 var chdArr = childAgeArr[i].split("_");
					  var key =chdArr[0];
					  var val =chdArr[1];
					 childJosn[key] = val;
				}
			}
			
			$scope.childAgeData = childJosn;
			//alert(JSON.stringify($scope.childAgeData));
			roomTemplate($scope.rooms, $scope.adultsArr,$scope.childsArr,$scope.childAgeData);
		}
		
		
		  $('[name=start]').on('changeDate', function () {
				var date2 = $('input[name="start"]').datepicker("getDate");
				var dateString = date2.toDateString();
				var nextDayDate = new Date(dateString);
				nextDayDate.setDate(date2.getDate() + 1);
	
				$('.input-daterange input[name="end"]').datepicker('setDate', nextDayDate);
				$(this).datepicker('hide');
				$('input[name=end]').focus();
	
			});
			$('[name=end]').on('changeDate', function () {
			  $(this).datepicker('hide');
			})
		
		
		
		
		
		
		$scope.datatype = search.datatype;
		//document.getElementById("checkIn").value = search.checkIn;
		//document.getElementById("checkOut").value = search.checkOut;
		if(typeof(search.adults)=="undefined"){
			$scope.adults = 2;
		}else{
			$scope.adults = search.adults;
		}
		
		//alert(JSON.stringify(search));
		
		//https://suggest.expedia.com/api/v4/typeahead/delh?callback=jQuery182030660266467597386_1476116944496&regiontype=2047&locale=en_IN&lob=HOTELS&format=jsonp&features=ta_hierarchy%7Ccontextual_ta%7Cpostal_code&maxresults=10&client=Homepage&siteid=27&guid=c3e92023da26467d8236d66b7f0463d6&device=desktop&browser=Chrome&_=1476117042744
		
		$scope.getLocation_Hint = function(val) {
			return $http.get( $('#template_url').val()+'/api/custom-ajax.php', {
				params: {
				action: 'autoSuggetionLookup',	
				locale: "en_US",
				term: $scope.desti
				}
			}).then(function(response){
				if(JSON.stringify(response.data.hotels) != "[]" && JSON.stringify(response.data.hotels) != "[]"){
					$scope.hotel_destinations = response.data.hotels;
					$scope.city_destinations = response.data.cities;
					$scope.landmarks_destinations = response.data.landmarks;
					$scope.airports_destinations = response.data.airports;
					$scope.showpopup = true;
				}else{
					$scope.showpopup = false;
				}
				
			});
		};
  
  		$scope.Update_Search_Field = function(lat, lon,regionid,latinFullName, hotel_or_destination){
			$scope.lat = lat;
			$scope.lon = lon;
			$scope.desti = latinFullName;
			$scope.regionid = regionid;
			$scope.datatype = hotel_or_destination;
			$scope.showpopup = false;
		}
		
		
		
		
		$scope.Search_Destinations = function(){ 
		    $('.roomgroupdata').addClass('hidnumberofrooms'); // hide rooms
			
			$scope.checkIn = document.getElementById("checkIn").value;
			$scope.checkOut = document.getElementById("checkOut").value;
			
			$scope.currency = document.getElementById("currency").value;
			$scope.Cri_language = document.getElementById("active_language").value;
			
			$scope.checkIn = $scope.checkIn.replace("\/", "-");
			$scope.checkIn = $scope.checkIn.replace("\/", "-");
			$scope.checkIn = $scope.checkIn.replace("\/", "-");
			$scope.checkOut = $scope.checkOut.replace("\/", "-");
			$scope.checkOut = $scope.checkOut.replace("\/", "-");
			$scope.checkOut = $scope.checkOut.replace("\/", "-");
			
			$scope.hotelType = document.getElementById("hotelType").value;
			$scope.rooms =document.getElementById("Cri_noofRooms").value;
			//$scope.pacsData = [];
			var adults ='';
			var childs ='';
			var childAge ='';
			for (i = 0; i < $scope.rooms; i++) {
				var adts =document.getElementById("adults_"+i).value;
				var chls =document.getElementById("childs_"+i).value;
				adults+=adts+',';
				childs+=chls+',';
				if(chls>0){
					var agess='';
					var agesss='';
					for(var c=0; c < chls; c++){
					  var age =document.getElementById("childAge"+i+'_'+c).value;
					  agess+=age+',';
					}
				 agesss= agess.slice(0,-1);
				 childAge+=i+'_'+agesss+'-';
				}
			  
			}
			$scope.adults = adults.slice(0,-1);
			$scope.childs = childs.slice(0,-1);
			$scope.childAge = childAge.slice(0,-1);
			
			 var currPath = $location.path();
			 var statePath = currPath.replace(/\//g, "");
			 
			 var pageName =$('#pageName').val();
			 
			if($scope.datatype=='hotel'){
			   $window.location.href = document.getElementById("siteurl").value+'/#/hotel-information/'+$scope.regionid+'/?fn=hotelInfo&checkIn='+$scope.checkIn+'&checkOut='+$scope.checkOut+'&language='+$scope.Cri_language+'&currency='+$scope.currency+'&hotelType='+$scope.hotelType+'&rooms='+$scope.rooms+'&adults='+$scope.adults+'&childs='+$scope.childs+'&childAge='+$scope.childAge;	 
			 }
			else{
			 if(pageName=='manage-destination'){ // manage for landing page
			    $window.location.href = document.getElementById("siteurl").value+'/#/search/?fn=search&desti='+$scope.desti+'&lat='+$scope.lat+'&lon='+$scope.lon+'&checkIn='+$scope.checkIn+'&checkOut='+$scope.checkOut+'&language='+$scope.Cri_language+'&currency='+$scope.currency+'&hotelType='+$scope.hotelType+'&rooms='+$scope.rooms+'&adults='+$scope.adults+'&childs='+$scope.childs+'&childAge='+$scope.childAge;
			  }
			  else{
			 $state.go("search", {"fn":'search',"desti": $scope.desti, "lat": $scope.lat, "lon": $scope.lon, "checkIn": $scope.checkIn, "checkOut": $scope.checkOut, "language": $scope.Cri_language, "currency": $scope.currency, "hotelType": $scope.hotelType,"rooms":$scope.rooms,"adults":$scope.adults,"childs":$scope.childs,"childAge":$scope.childAge});
			  }	
			} 
			  
			  
		}
		
		
		
		   /* Rooms More Detail Toggle*/
            $scope.ShowHide = function (id) {
			 $('.roomMoreInfoDiv').hide();
			 $('#roomMoreInfoDiv_'+id).show();
             //$scope.IsVisible = $scope.IsVisible+'_'+id ? false : true;
            }
		
		
		/* More Features Toggle*/
		
		    $scope.Visible = false;
            $scope.moreFeat = function () {
            $scope.Visible = $scope.Visible ? false : true;
            }
			
			
			
			/* add room code in home page */
			 // initialize the array
				  $scope.data=[[{"en":"test"}]];

					// add a column
				  $scope.addColumn = function(){

					  
					//you must cycle all the rows and add a column 
					//to each one
					$scope.data.forEach(function($row){
						
					  $row.push({"en":""})
					});
				  };

				  // remove the selected column
				  $scope.removeColumn = function (index) {
					// remove the column specified in index
					// you must cycle all the rows and remove the item
					// row by row
					$scope.data.forEach(function (row) {
						
					  row.splice(index, 1);
						
					  //if no columns left in the row push a blank array
					  if (row.length === 0) {
			
						  
						row.data = [];
					  }
					});
				  };

				  // remove the selected row
				  $scope.removeRow = function(index){
					// remove the row specified in index
					$scope.data.splice( index, 1);
					// if no rows left in the array create a blank array
					if ($scope.data.length() === 0){
					  $scope.data = [];
					}
				  };

				  //add a row in the array
				  $scope.addRow = function(){
					// create a blank array
					var newrow = [0];
					  // if array is blank add a standard item
					  if ($scope.data.length === 0) {
						newrow = [{'en':''}];
					  } else {
						// else cycle thru the first row's columns
						// and add the same number of items
						$scope.data[0].forEach(function (row) {
						  newrow.push({'en':''});
						});
					  }
					// add the new row at the end of the array 
					$scope.data.push(newrow);
				  };
						
		/* end add room code in home page */
		   
          
    })
	
	
	  .directive("datepicker2", function () {
			return {
					restrict: "A",
					link: function (scope, el, attr) {
						el.datepicker({
						dateFormat: 'dd/mm/yy'
					});
					}
				};
			})
			

		.directive("datepicker3", function () {
		return {
				restrict: "A",
				link: function (scope, el, attr) {
					el.datepicker({
					dateFormat: 'dd/mm/yy'
				});
				}
			};
		})
   
	
	
    Adivaha.controller("search_Results_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $location, NgMap, Hotel_Fetched, $state){
        //alert(JSON.stringify(hotelList));
		// make favourate
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		
		
		$scope.makeFavourate =function(e,hotelID){
		 // var rel = $(e.target).data('rel');
		 var rel =angular.element(e.currentTarget).attr('data-rel');
		  var userID =$('#login_userID').val();
		  if( (userID==0) || (userID=='') ){ 
			$('.popupbox-container').fadeIn();
			$('#loginFrmBox').fadeIn();
			$('#fav_hotel_id').val(hotelID);
		   } else{
			   $.ajax({
					type: "POST",
					url: document.getElementById("template_url").value+"/custom-ajax.php",
					data: 'action=makeFavourate&hotelID='+hotelID+'&userID='+userID+'&relType='+rel,
					success: function(Data){
					 if(Data==1){ 
						  if(rel=='favourate'){
						   $('#favourate_'+hotelID).addClass('favourated');
						   $(e.currentTarget).attr('data-rel','unfavourate');
						   $('#favourate_'+hotelID).find('.tooltiptext').html('Remove Favourites');
						  }else{
						    $('#favourate_'+hotelID).removeClass('favourated');
						    $(e.currentTarget).attr('data-rel','favourate');
							$('#favourate_'+hotelID).find('.tooltiptext').html('Add to Favourites');
						  }
						}
						else{
							alert('already favourated');
						}
					}
	         });
		  }
		} 
		
		$scope.UserId =$('#login_userID').val();
 		
		//Hide Show Loading Bar
		$(".nav-pills").addClass("hidethis");
		$(".hotel-list-container").addClass("hidethis");
		$(".loader_hotel_content").addClass("showthis");
		//alert("Loading Search Results");
		//Get the Parameteres of URL in search page
		//----------------------------------------------------------
	    var search = $location.search();
		
		$scope.currency = search.currency;
		$scope.symbol =document.getElementById('currency_symbol').value;
		$scope.Cri_language = search.language;
		if(typeof $scope.currency=='undefined'){
			$scope.currency =$('#default_currency').val();
		}
		if(typeof $scope.language=='undefined'){
			$scope.Cri_language =$('#active_language').val();
		}
		$scope.language =$scope.Cri_language;
		
		var pageName =$('#pageName').val();
		if(pageName=='manage-destination'){ 
		  $(".nav-pills").removeClass("hidethis");
		  $scope.lat= document.getElementById('dest_latitude').value;
		  $scope.lon = document.getElementById('dest_longitude').value;
		  $scope.hotelType ='';
		  $scope.rooms = 1;
		  $scope.adults = 2;
		  $scope.childs = 0;
		  $scope.childAge = '';
		  $scope.destination_name = document.getElementById('destinationName').value;
		  $scope.checkIn =document.getElementById('dest_checkin').value;
		  $scope.checkOut = document.getElementById("dest_checkout").value;
		  $scope.hotelType=1;
	   }else{ 
		$scope.lat = search.lat;
		$scope.lon = search.lon;
		$scope.hotelType =search.hotelType;
		if($scope.hotelType==1){ $scope.tab ='Hotels';}
		if($scope.hotelType==3){ $scope.tab ='Resorts';}
		if($scope.hotelType==4){ $scope.tab ='Vacation Rental/Condo';}
		if($scope.hotelType==5){ $scope.tab ='Bed & Breakfast';}
		
		$scope.rooms = search.rooms;
		$scope.adults = search.adults;
		$scope.childs = search.childs;
		$scope.childAge = search.childAge;
		$scope.destination_name = search.desti;
		$scope.search_Session_Id = "";
	   }
		
		
			
			
			
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
		//$scope.currency = document.getElementById("currency").value;
		//$scope.symbol =document.getElementById('currency_symbol').value;
		$scope.checkIn = document.getElementById("checkIn").value;
		$scope.checkInUrl =$scope.checkIn.replace(/\//g, "-");
		$scope.checkOut = document.getElementById("checkOut").value;
		$scope.checkOutUrl =$scope.checkOut.replace(/\//g, "-");
		
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

		    var param = "action=findSearchKey&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+document.getElementById("checkIn").value+"&checkOut="+document.getElementById("checkOut").value+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&hotelType="+$scope.hotelType+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs;
			
			var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
			
			
			//alert("Find Key URL : " + url);
			$http.get(url).success( function(response) {
					//Search Session ID will be stored in search_id variable
					//We then call the Update_Rates Function to update the view with the temp results
					//Check if Results are arleady in the database 
					//If records are there in database, call Update View else call Update Rates
					//alert("Find Key");
					//alert(JSON.stringify(response));
					$scope.search_Session_Id = response.search_session;
					//alert("Three Records Updated")
					if(response.search_session == null){
						//FindKey();
						return false;
					}
					
					if(response.exist=='Yes'){
						
					$scope.currentPage = 1;
					$scope.pageSize = 12;
					$scope.hotelList = response.results;
					$(".hotel-list-container").addClass("showthis");
					$(".hotel-list-container").removeClass("hidethis");
					$(".loader_hotel_content").addClass("hidethis");
					//vm.shops = response.result;
					
					$scope.setResults = Hotel_Fetched.setResults(response.result);
					//alert(JSON.stringify($scope.setResults));
					$scope.pageChangeHandler = function(num) {
					console.log('meals page changed to ' + num);
					};
					
						//alert(JSON.stringify(response));
						
						$scope.hotels_found = parseInt(response.totalrecords);
						$scope.hotels_founds = Math.round(response.totalrecords/15);
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
						var param = 'action=getAmenities&search_Session_Id='+$scope.search_Session_Id+"&location_Id="+$scope.location_Id+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&hotelType="+$scope.hotelType;
						
						var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
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
					var param = 'action=Upldate_Rates&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&hotelType="+$scope.hotelType+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs;
					//alert(param);
					//return false;
					var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
					//alert("Update Rates URL : " + url);
					$http.get(url).success( function(response) {
						if(response.ErrorCode=='100'){ 
						 $(".hotel-list-container").html("ErrorCode-100: Authentication failed, Please contact support team...");
						$(".hotel-list-container").removeClass("hidethis");
						$(".loader_hotel_content").addClass("hidethis");
						 return false;
						}
						
						$scope.Loading_msg = "Please wait while we are finding you the softest pillows ...";
						$scope.currentPage = 1;
						$scope.pageSize = 15;
						$scope.hotelList = response.HotelListResponse.HotelList.HotelSummary;
						$(".hotel-list-container").addClass("showthis");
						$(".hotel-list-container").removeClass("hidethis");
						$(".loader_hotel_content").addClass("hidethis");
						
						$scope.setResults = Hotel_Fetched.setResults(response.HotelListResponse.HotelList.HotelSummary);
						$scope.pageChangeHandler = function(num) {
						console.log('meals page changed to ' + num);
						};
						Upldate_Rates_All();
						
						
						
					});
				}
				function Upldate_Rates_All(){ 
					//Generate the parameteres
					var param = 'action=Upldate_Rates_All&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&hotelType="+$scope.hotelType+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs;
					
					var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
					//alert("Update Rates All URL : " + url);
					//Fetch all the results against search session id
					//and update it into the database
					//update the controls like, max min values and number of hotels in respective star labels in search controls
					$http.get(url).success( function(response) {
						//alert(JSON.stringify(response));
						//Update Search Controls
						
						//alert("Hotel All Results");
						//alert(JSON.stringify(response));
						$scope.symbol =document.getElementById('currency_symbol').value;	
							
						$scope.Loading_msg = $('#select_your_accommodation').val(); // get text from header
						$scope.hotels_found = response.totalrecords;
						$scope.hotels_founds = Math.round(response.totalrecords/12);
						
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
						var param = 'action=getAmenities&search_Session_Id='+$scope.search_Session_Id+"&location_Id="+$scope.location_Id+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_Adults="+$scope.Cri_Adults+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&hotelType="+$scope.hotelType;
						
						var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
						//alert("Ameneties Saved URL : " + url);
						$http.get(url).success( function(response) {
							//alert(JSON.stringify(response));
							
							//alert("Ameneties Saved Results");
							//alert(JSON.stringify(response));
							$scope.hotels_found = response.length;
							$scope.Ameneties_List = response;
							$scope.roles = response;
							$scope.Hotel = {
								Ameneties_List: ["131", "50"]
							};
							Upldate_Searched_Hotels();
						});
						
					});
				}
				
				
				$scope.changeAmenty = function(){
					Upldate_Searched_Hotels();
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
					/*
					if(param_control=="map"){
						
					}*/
					Upldate_Searched_Hotels();
				}
				
				
		     $scope.Hotel_Filter_Name='';
			 $scope.HotelFilter = function() { 
				 var txt =$('#findbynamefilter').val();
				 if(txt==''){
					 $scope.Hotel_Filter_Name ='';
					 Upldate_Searched_Hotels();
				 }
				 else{
					 return $http.get(document.getElementById("template_url").value+"/custom-ajax.php", {
						params: {
							action: "hotelFilter",
							search_id: $scope.search_Session_Id,
							currency: $scope.currency,
							q:  txt
						
						}
					}).then(function(response) {
						if (JSON.stringify(response) != "[]") {
							$(".locationpopup_flightsto").removeClass("hidethisinitially");
							$scope.Hotel_Filter = response.data;
						} else {
							$(".locationpopup_flightsto").addClass("hidethisinitially");
						}
					});
				 }
			}
			
		$scope.Update_Hotel_Filter = function(EANHotelID,Name) {
			//$('#findbynamefilter').val(Name);
			$(".locationpopup_flightsto").removeClass("hidethisinitially");
			var detailpage_Url =document.getElementById("siteurl").value+'/#/hotel-information/'+EANHotelID+'/?fn=hotelInfo&checkIn='+$scope.checkInUrl+'&checkOut='+$scope.checkOutUrl+'&language='+$scope.language+'&currency='+$scope.currency+'&hotelType='+$scope.hotelType+'&rooms='+$scope.rooms+'&adults='+$scope.adults+'&childs='+$scope.childs+'&childAge='+$scope.childAge;
			window.open(detailpage_Url,'_blank');
			
		  }
				
				
				
		  $scope.resetAll =function(){
			$scope.starrating = '';
			$scope.star_Rating_Control='';
			
			$scope.distances = false;
			$scope.distance_Control='';
			
			$('#findbyhotelname').val('');
			$('.amenityCls').removeAttr('checked');
			
			Upldate_Searched_Hotels();
		 }
		 
		 $scope.clearStar =function(){
			$scope.starrating = '';
			$scope.star_Rating_Control='';
			$('#findbyhotelname').val('');
			Upldate_Searched_Hotels();
		 }
		  
		 $scope.clearAmenity =function(){
			$('#findbyhotelname').val('');
			$('.amenityCls').removeAttr('checked');
			Upldate_Searched_Hotels();
		 }
				
				// Scrolling to points
				
				
				
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
					var amenityArr = [];
					 $('.amenityCls:checked').each(function(i){
					  amenityArr[i] = $(this).val();
					 });
					 if(typeof $scope.paggination=='undefined'){
						  $scope.paggination=1;
					} 
					var param = 'action=Searched_Hotels&search_Session_Id='+$scope.search_Session_Id+"&lat="+$scope.lat+"&lon="+$scope.lon+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_currency="+$scope.currency+"&Cri_language="+$scope.Cri_language+"&Cri_Rating="+$scope.star_Rating_Control+"&Cri_Distance="+$scope.distance_Control+"&Cri_Price="+$scope.minRangeSlider.minValue+"-"+$scope.minRangeSlider.maxValue+"&Cri_amenity="+amenityArr+"&Cri_guestrating="+$scope.guestminRangeSlider.minValue+"-"+$scope.guestminRangeSlider.maxValue+"&list_Or_Map_Control="+$scope.list_Or_Map_Control+"&orderby_fild="+$scope.sorting_Field_Control+"&orderby_val="+$scope.sorting_order_Control+"&hotelType="+$scope.hotelType+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs+"&page=" + $scope.paggination;
					//alert(param);
					var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
					
					$http.get(url).success( function(response) {
						
					  if($scope.list_Or_Map_Control!='map'){
							$scope.Loading_msg = $('#select_your_accommodation').val(); // get text from header
							$scope.currentPage = 1;
							$scope.pageSize = 15;
							$scope.hotelList = response.result;
							//alert(JSON.stringify(response));
							$scope.hotels_found = parseInt(response.result[0].total);
							$scope.hotels_founds = Math.round(response.result[0].total/15);
							$(".hotel-list-container").addClass("showthis");
							$(".hotel-list-container").removeClass("hidethis");
							$(".loader_hotel_content").addClass("hidethis");
							
							$scope.symbol =document.getElementById('currency_symbol').value;
							$scope.setResults = Hotel_Fetched.setResults(response.result);
							
							setTimeout(function() { 
								Do_Pagination();
							}, 1000);
						 }else{
							$scope.hotels_found = parseInt(response.result[0].total);
							$scope.setResults = Hotel_Fetched.setResults(response.result); 
						 }
						
					});
				}
				
				$scope.getData = function(pageNum){
				$scope.paggination = pageNum;
				Upldate_Searched_Hotels();
				}
				

				function Do_Pagination() {
				 var lis = $("#myList li").hide();
					lis.slice(0, 7).show();
					var size_li = lis.length;
					var x = 7,
						start = 0;
				$('#next').click(function() {
					if (start + x < size_li) {
						lis.slice(start, start + x).hide();
						start += x;
						lis.slice(start, start + x).show();
					}
				});
				$('#prev').click(function() {
					if (start - x >= 0) {
						lis.slice(start, start + x).hide();
						start -= x;
						lis.slice(start, start + x).show();
					}
				});
				
				 if($scope.paggination==1){
				  $('#myList').find("li:first").addClass("active");
				 }
				 
				   $('#myList li').click(function() {
					$('#myList').find("li").removeClass("active");   
					$(this).addClass('active');
					$('html, body').animate({ scrollTop: 0 }, 0);
				   })
				
				
               }
			   
			   
			   
		})
		
		
		Adivaha.controller("OtherController", function($scope, $location, $anchorScroll){
			$scope.SiteUrl = document.getElementById("siteurl").value;
			$scope.TemplateUrl = document.getElementById("template_url").value;
			$scope.pageChangeHandler = function(num) {
				console.log('going to page ' + num);
				// the element you wish to scroll to.
				$location.hash('top');
				// call $anchorScroll()
				$anchorScroll();
			};
		});
		
	
    Adivaha.controller("Hotel_Information_Controller", function($scope, $stateParams,$location, $http, Utils){
		
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		$('html, body').animate({ scrollTop: 0 }, 0);
		
		var search = $location.search();
		
		 $('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
			//format: 'DD d MM yyyy',
			format: 'mm/dd/yyyy',
			startDate: "today",
			autoclose: true,
			
		});
		$('[name=start2]').on('changeDate', function () {
				var date2 = $('input[name="start2"]').datepicker("getDate");
				var dateString = date2.toDateString();
				var nextDayDate = new Date(dateString);
				nextDayDate.setDate(date2.getDate() + 1);
	
				$('.input-daterange input[name="end2"]').datepicker('setDate', nextDayDate);
				$(this).datepicker('hide');
				$('input[name=end2]').focus();
		});
		$('[name=end2]').on('changeDate', function () {
		  $(this).datepicker('hide');
		})
		
		$("#Cri_Rooms2").click(function(){ 
			if($(this).attr('rel')==0){
			   $(".roomgroupdata2").removeClass("hidnumberofrooms2");	
			   $(this).attr('rel',1);
			}else{
			  $(".roomgroupdata2").addClass("hidnumberofrooms2");	
			  $(this).attr('rel',0);	
			}
		});
		
		$scope.count2 =search.rooms;
		$scope.changeRooms2 =function(typ){
			if(typ=='minus'){
				var count2 =$('#Cri_noofRooms2').val();
				$scope.count2 =(count2-1);
			}
			if(typ=='plus'){
			  var count2 =$('#Cri_noofRooms2').val();
			  $scope.count2 =parseInt(count2)+1;
			}
			
			if($scope.count2 >0){
				Cri_noofRooms2($scope.count2);
			}
		}
		
		$scope.hideRoomGroup2 =function(){
			$("#Cri_Rooms2").trigger('click');
		}
		   
		   // scroll at position
		  
		 $scope.gotoAnchor = function(divID) {
		   $('html, body').animate({
				scrollTop: $('#'+divID).offset().top-70
			}, 'slow');
		 }
         		 
				
		
		  $scope.adultsArr =[];
		  $scope.childsArr =[];
		
		   
			$scope.checkIn =search.checkIn;
			$scope.checkIn = $scope.checkIn.replace(/-/g, "/");
			$scope.checkInUrl=search.checkIn;
			
			$scope.checkOut=search.checkOut;
			$scope.checkOut = $scope.checkOut.replace(/-/g, "/");
			$scope.checkOutUrl=search.checkOut;
			
			$scope.hotelType =search.hotelType;
			$scope.Cri_currency = search.currency;
			$scope.currency = search.currency;
			
			$scope.Cri_language = search.language;
			$scope.destination_name = search.desti;
			$scope.search_Session_Id = "";	
			
			
			$scope.rooms = search.rooms;
			$scope.adults = search.adults;
			$scope.childs = search.childs;
			$scope.childAge = search.childAge;
			
			$scope.adultsArr = $scope.adults.split(",");
			$scope.childsArr = $scope.childs.split(",");
			var Totaladults=0;
			for(var a=0;a<$scope.adultsArr.length;a++){
				Totaladults = Totaladults+parseInt($scope.adultsArr[a]);
			}
			$scope.Totaladults = Totaladults;
			//alert($scope.Totaladults);
			$scope.childStr = search.childAge;
			var childJosn =[];
			if(typeof $scope.childStr!='undefined'){
				var childAgeArr = $scope.childStr.split("-");
				var item =[];
				for (i = 0; i < childAgeArr.length; ++i) {
					 var chdArr = childAgeArr[i].split("_");
					  var key =chdArr[0];
					  var val =chdArr[1];
					 childJosn[key] = val;
				}
			}
			
			$scope.childAgeData = childJosn;
			roomTemplate2($scope.rooms, $scope.adultsArr,$scope.childsArr,$scope.childAgeData);
			
			
			
			
			
          var param = "action=Hotel_Description&hotel_id="+$stateParams.hotelID+"&Cri_language="+$scope.Cri_language+"&Cri_currency="+$scope.Cri_currency+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs;
		  
		  var url = document.getElementById("template_url").value+"/api/update_rates.php?"+param;
		
		 $http.get(url).success( function(response) {
			 
			if(response.ErrorCode=='100'){ 
			  $(".hotel-information_title").html("ErrorCode-100: Authentication failed, Please contact support team...");
			  return false;
			} 
			 
			$scope.symbol =document.getElementById('currency_symbol').value;
			$scope.HotelSummary = response.HotelInformationResponse.HotelSummary;
			$scope.HotelImages = response.HotelInformationResponse.HotelImages;	
			$scope.HotelDetails = response.HotelInformationResponse.HotelDetails;
            /*			
			var areaInfo = response.HotelInformationResponse.HotelDetails.areaInformation.replace(/&lt;br \/&gt;/g, '\n\t');
			areaInfo= areaInfo.replace(/&apos;/g, '');
			areaInfo= areaInfo.replace(/&lt;p&gt;/g, '\n');
			$scope.areaInfo = areaInfo.replace(/&lt;\/p&gt;/g, '');
			*/
		var areaInfo=  response.HotelInformationResponse.HotelDetails.areaInformation.replace(/&lt;br \/&gt;/g, '<br />');
		areaInfo= areaInfo.replace(/&lt;p&gt;/g, '<p>');
		$scope.areaInfo = areaInfo.replace(/&lt;\/p&gt;/g, '</p>');
			
			$scope.PropertyAmenities = response.HotelInformationResponse.PropertyAmenities.PropertyAmenity;	
			//alert(JSON.stringify(response.HotelInformationResponse.HotelSummary));
			
			document.getElementById("hote_map_container").innerHTML = '<iframe frameborder="0" width="100%" height="480" src='+document.getElementById("template_url").value+'/scripts-libraries/search-result-google-map.php?lat='+$scope.HotelSummary.latitude+'&long='+$scope.HotelSummary.longitude+'&paths='+document.getElementById("template_url").value+'></iframe>';
			
			$scope.myInterval = 1000;
			$scope.noWrapSlides = true;
			$scope.active = 0;
			var slides = $scope.slides = [];
			var currIndex = 0;
			var caption = "";
			var url = "";
			  
			$scope.addSlide = function(url) {
			var newWidth = 600 + slides.length + 1;
			slides.push({
			  image: url,
			  id: currIndex++
			});
			};

		   for (var i = 0; i < 10; i++) {
			urls = $scope.HotelImages.HotelImage[i].url.replace("_b.jpg", "_y.jpg");
			$scope.addSlide(urls);
		    }  
		});
		
	  
			 
		 
	$scope.w = window.innerWidth;
    $scope.h = window.innerHeight;
    $scope.uri = "http://lorempixel.com";
    $scope.folders = ['abstract', 'animals',  'business', 'cats', 'city', 'food', 'night','life', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];
    $scope.images = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $scope.currentFolder = $scope.folders[0];
    $scope.selectFolder = function (folder) {
      $scope.currentFolder = folder;
    };
    $scope.activeFolder = function (folder) {
      return (folder === $scope.currentFolder);
    }; 
		
		var param = "hotel_id="+$stateParams.hotelID;
		var url = document.getElementById("template_url").value+"/scripts-libraries/trip-advisor.php?"+param;
		//alert(url);
		$http.get(url).success( function(response) {
			document.getElementById("tripdiv").innerHTML = response;
		});
		
		
		/*
		var param = "checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_language="+$scope.Cri_language+"&Cri_currency="+$scope.Cri_currency+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs;
		
		var url = document.getElementById("template_url").value+"/api/update_rates.php?action=RoomAvailability&hotel_id="+$stateParams.hotelID+"&"+param;
		$http.get(url).success( function(response) {
			$scope.checkInInstructions = response.HotelRoomAvailabilityResponse.checkInInstructions;
			$scope.specialCheckInInstructions = response.HotelRoomAvailabilityResponse.specialCheckInInstructions;
			$scope.numberOfRoomsRequested = response.HotelRoomAvailabilityResponse.numberOfRoomsRequested;
			$scope.Room_Details = response.HotelRoomAvailabilityResponse.HotelRoomResponse;
		});
		*/
					
		var param = "hotel_id="+$stateParams.hotelID;
		var url = document.getElementById("siteurl").value+"scripts-libraries/trip-advisor.php?"+param;
		$http.get(url).success( function(response) {
			document.getElementById("tripdiv").innerHTML = response;
		});
		
		var url = document.getElementById("template_url").value+"/api/update_rates.php?action=Show_Hotel_Suggestions&hotel_id="+$stateParams.hotelID;
		
		$http.get(url).success( function(response) {
			$scope.Hotel_Suggestions = response.result;
		});
		
		// RoomAvailability fucntion
		
		var param = "hotel_id="+$stateParams.hotelID+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_language="+$scope.Cri_language+"&Cri_currency="+$scope.Cri_currency+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs+"&childAge="+$scope.childAge;
		
		checkRoomAvailability(param);
		
		function checkRoomAvailability(param){ 
		  
			var url = document.getElementById("template_url").value+"/api/update_rates.php?action=RoomAvailability&"+param;
			$http.get(url).success( function(response) {
				$scope.checkInInstructions = response.HotelRoomAvailabilityResponse.checkInInstructions;
				$scope.specialCheckInInstructions = response.HotelRoomAvailabilityResponse.specialCheckInInstructions;
				$scope.numberOfRoomsRequested = response.HotelRoomAvailabilityResponse.numberOfRoomsRequested;
				
				$HotelRoomResponse =response.HotelRoomAvailabilityResponse.HotelRoomResponse;
				
				if(typeof $HotelRoomResponse.length === 'undefined'){
					$scope.Room_Details =[$HotelRoomResponse];

				}else{
					$scope.Room_Details = response.HotelRoomAvailabilityResponse.HotelRoomResponse;
				}
				$('.roomloader').hide();
			});
			$scope.symbol =document.getElementById('currency_symbol').value;
			
		}
		
		
		$scope.roomAvailabilityTwc = function(){
			$('.roomloader').show();
			$scope.checkIn = document.getElementById("checkIn2").value;
			$scope.checkOut = document.getElementById("checkOut2").value;
			
			$scope.rooms =document.getElementById("Cri_noofRooms2").value;
			var adults ='';
			var childs ='';
			var childAge ='';
			for (i = 0; i < $scope.rooms; i++) {
				var adts =document.getElementById("tadults_"+i).value;
				var chls =document.getElementById("tchilds_"+i).value;
				adults+=adts+',';
				childs+=chls+',';
				if(chls>0){
					var agess='';
					var agesss='';
					for(var c=0; c < chls; c++){
					  var age =document.getElementById("tchildAge"+i+'_'+c).value;
					  agess+=age+',';
					}
				 agesss= agess.slice(0,-1);
				 childAge+=i+'_'+agesss+'-';
				}
			  
			}
			$scope.adults = adults.slice(0,-1);
			$scope.childs = childs.slice(0,-1);
			$scope.childAge = childAge.slice(0,-1);
			
			var param = "hotel_id="+$stateParams.hotelID+"&checkIn="+$scope.checkIn+"&checkOut="+$scope.checkOut+"&Cri_language="+$scope.Cri_language+"&Cri_currency="+$scope.Cri_currency+"&rooms="+$scope.rooms+"&adults="+$scope.adults+"&childs="+$scope.childs+"&childAge="+$scope.childAge;
			checkRoomAvailability(param);
		}
		
	
				   	
    })
	
	

	Adivaha.factory('Utils', function($q) {
    return {
        isImage: function(src) {
        
            var deferred = $q.defer();
        
            var image = new Image();
            image.onerror = function() {
                deferred.resolve(false);
            };
            image.onload = function() {
                deferred.resolve(true);
            };
            image.src = src;
        
            return deferred.promise;
        }
    };
});
		
    
	/* code by mk */
	Adivaha.controller("banner_Controller", function($scope, $location){
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
		var search = $location.search();
		
		if(search.tab=="flight"){
			$scope.bannerheading = $('#flight_title').val();
			$scope.bannercontent = $('#flight_description').val();
			$scope.bannerImg = $('#flight_img_path').val();
		}
		
		else if(search.tab=="holiday"){
			$scope.bannerheading = $('#holiday_title').val();
			$scope.bannercontent = $('#holiday_description').val();
			$scope.bannerImg = $('#holiday_img_path').val();
		}
		
		else if(search.tab=="resort"){
			$scope.bannerheading = $('#resort_title').val();
			$scope.bannercontent = $('#resort_description').val();;
			$scope.bannerImg = $('#resort_img_path').val();
		}
		else if(search.tab=="bedbreakfast"){
			$scope.bannerheading = $('#bedbreakfast_title').val();
			$scope.bannercontent = $('#bedbreakfast_description').val();;
			$scope.bannerImg = $('#bedbreakfast_img_path').val();
		}
		else{
			$scope.bannerheading = $('#hotel_title').val();
			$scope.bannercontent = $('#hotel_description').val();;
			$scope.bannerImg = $('#hotel_img_path').val();
		}
        
	
	
	
    })


	Adivaha.controller("body_Controller", function($scope){
		$scope.SiteUrl = document.getElementById("siteurl").value;
		$scope.TemplateUrl = document.getElementById("template_url").value;
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


/*=== Map controller ====*/

Adivaha.controller('MyCtrl', function($scope, NgMap, Hotel_Fetched) {
		$scope.SiteUrl = document.getElementById("siteurl").value;
	$scope.TemplateUrl = document.getElementById("template_url").value;
  var vm = this;
  var bounds = new google.maps.LatLngBounds();
  
   NgMap.getMap().then(function(map) {
    vm.map = map;
   });
    vm.shops = [];
	vm.showDetail = function(e, shop) {
    vm.shop = shop;
    //vm.map.showInfoWindow('foo-iw', this);
  };

  vm.hideDetail = function() {
    vm.map.hideInfoWindow('foo-iw');
  };
  
  
	$scope.$watch(function () { 
		return Hotel_Fetched.getResults(); 
	}, function (newValue) {
		$scope.results_fe = newValue;
		vm.shops = newValue;
		
		vm.zoom =true;
		google.maps.event.trigger($scope.map,'resize'); 
		vm.map.fitBounds();
	});
	
	
});

/*=== End Map controller ====*/


	
	
/*	Adivaha.controller("hotel_information_controller", function($scope){


})*/

/* add scripts sticky*/

function roomTemplate(rooms, adultsArr,childArr,childAgeData){
	html='';
	for(var i=0;i<rooms;i++){
	 var adults =adultsArr[i];	
	 var childs =childArr[i];
	 if(i>0){
		html+='<div class="nomar">&nbsp;</div>'; 
	 }
	 
	 html+='<div class="margintop"><div class="packadultscls new-div-add1 nomar"><select name="adults"  id="adults_'+i+'" class="form-control">';
	  for(var a=1;a<=4;a++){
		  if(a==adults){
		   html+='<option selected="selected" value="'+a+'">'+a+'</option>'; 
          }else{
			html+='<option value="'+a+'">'+a+'</option>';   
		  }		   
	  }
	 html+='</select></div><div class="packchildsscls nomar"><select name="childs" id="childs_'+i+'" class="form-control changeChildNo" relRoom="'+i+'">';
	 
	 for(var c=0;c<4;c++){
	   if(c==childs){
	     html+='<option selected="selected" value="'+c+'">'+c+'</option>';  
	   }else{
		 html+='<option value="'+c+'">'+c+'</option>';    
	   }
	 }
	 html+='</select></div><div id="childAgeID_'+i+'" class="packchildagecls age-childAge">';
	 if(childs >0){
		var childAge =childAgeData[i].split(",");
		html+='<span style="color:#CCC; font-size:12px; float:left;  width: 27.5%;padding: 0px 27px;">Age(s):</span>'; 
		for(var ag=0;ag<childs;ag++){
		 var age =childAge[ag];
		 html+='<select name="childAge['+i+'][]" id="childAge'+i+'_'+ag+'" class="form-control">';
		  for(var g=0;g<12;g++){
			if(g==age){
			 html+='<option value="'+g+'" selected="selected">'+g+'</option>';
		    }
			else{
			html+='<option value="'+g+'">'+g+'</option>';	
			}
		  }
		  html+='</select>';
		}   
	  }
	 html+='</div></div>';
	 
	}
   $('#packListdiv').html(html);
   changeChildNo();
}



/*
$('#Cri_noofRooms').change(function(){ 
   var rooms =$(this).val();
   var html='';
   for(var i=0;i<rooms;i++){
	   if(i!=0){ html+='<div class="nomar">&nbsp;</div>'; }
	   else{html+='';}
	 html+='<div class="row margintop"><div class="packadultscls new-div-add1 nomar"><select name="adults"  id="adults_'+i+'" class="form-control"><option selected="selected" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div><div class="packchildsscls  nomar"><select name="childs" id="childs_'+i+'" class="form-control changeChildNo" relRoom="'+i+'"><option selected="selected" value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div id="childAgeID_'+i+'" class="packchildagecls age-childAge"></div></div>';
   }
   $('#packListdiv').html(html);
   changeChildNo();
})
*/
function Cri_noofRooms(rooms){
   var html='';
   for(var i=0;i<rooms;i++){
	   if(i!=0){ html+='<div class="nomar">&nbsp;</div>'; }
	   else{html+='';}
	 html+='<div class="margintop"><div class="packadultscls new-div-add1 nomar"><select name="adults"  id="adults_'+i+'" class="form-control"><option selected="selected" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div><div class="packchildsscls  nomar"><select name="childs" id="childs_'+i+'" class="form-control changeChildNo" relRoom="'+i+'"><option selected="selected" value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div id="childAgeID_'+i+'" class="packchildagecls age-childAge"></div></div>';
   }
   $('#packListdiv').html(html);
   changeChildNo();
}

function changeChildNo(){
  $('.changeChildNo').change(function(){
	  var r  =$(this).attr('relRoom');
	  var n  =$(this).val();
	  var html ='';
	  if(n>0){ 
		  html+='<span style="font-size:0px;"></span>'; 
		  for(var i=0;i<n;i++){
			html+='<div class="age_childdiv"><label class="age_label">Age <span>Above 12 years</span></label><select name="childAge['+r+'][]" id="childAge'+r+'_'+i+'" class="form-control"><option selected="selected" value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select></div>'
		  }
	  }
	$('#childAgeID_'+r).html(html);
  })
}



function roomTemplate2(rooms, adultsArr,childArr,childAgeData){
	html='';
	for(var i=0;i<rooms;i++){
	 var adults =adultsArr[i];	
	 var childs =childArr[i];
	 if(i>0){
		html+=''; 
	 }
	 
	 html+='<div class="margintop"><div class="packadultscls new-div-add1 nomar"><select name="adults"  id="tadults_'+i+'" class="form-control">';
	  for(var a=1;a<=4;a++){
		  if(a==adults){
		   html+='<option selected="selected" value="'+a+'">'+a+'</option>'; 
          }else{
			html+='<option value="'+a+'">'+a+'</option>';   
		  }		   
	  }
	 html+='</select></div><div class="packchildsscls nomar"><select name="childs" id="tchilds_'+i+'" class="form-control changeChildNo2" relRoom="'+i+'">';
	 
	 for(var c=0;c<4;c++){
	   if(c==childs){
	     html+='<option selected="selected" value="'+c+'">'+c+'</option>';  
	   }else{
		 html+='<option value="'+c+'">'+c+'</option>';    
	   }
	 }
	 html+='</select></div><div id="tchildAgeID_'+i+'" class="packchildagecls age-childAge">';
	 if(childs >0){
		var childAge =childAgeData[i].split(",");
		html+='<span style="color:#CCC; font-size:12px; float:left;  width: 27.5%;padding: 0px 27px;">Age(s):</span>'; 
		for(var ag=0;ag<childs;ag++){
		 var age =childAge[ag];
		 html+='<select name="childAge['+i+'][]" id="tchildAge'+i+'_'+ag+'" class="form-control">';
		  for(var g=0;g<12;g++){
			if(g==age){
			 html+='<option value="'+g+'" selected="selected">'+g+'</option>';
		    }
			else{
			html+='<option value="'+g+'">'+g+'</option>';	
			}
		  }
		  html+='</select>';
		}   
	  }
	 html+='</div></div>';
	 
	}
   $('#packListdiv2').html(html);
   Cri_noofRooms2(rooms);
   changeChildNo2();
}



function Cri_noofRooms2(rooms){
		var html='';
		for(var i=0;i<rooms;i++){
		 if(i!=0){ html+='<div class="nomar">&nbsp;</div>'; }
	     else{html+='';}	
			
			
		 html+='<div class="margintop"><div class="packadultscls new-div-add1 nomar"><select name="adults"  id="tadults_'+i+'" class="form-control"><option selected="selected" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div><div class="packchildsscls nomar"><select name="childs" id="tchilds_'+i+'" class="form-control changeChildNo2" relRoom="'+i+'"><option selected="selected" value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div id="tchildAgeID_'+i+'" class="packchildagecls age-childAge"></div></div>';
		}
		$('#packListdiv2').html(html);
		changeChildNo2();
}
			
function changeChildNo2(){ 
  $('.changeChildNo2').change(function(){
	  var r  =$(this).attr('relRoom');
	  var n  =$(this).val();
	  var html ='';
	  if(n>0){
		  for(var i=0;i<n;i++){
			html+='<div class="age_childdiv"><label class="age_label">Age <span>Above 12 years</span></label><select name="childAge['+r+'][]" id="tchildAge'+r+'_'+i+'" class="form-control" ><option selected="selected" value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div>'
		  }
	  }
	$('#tchildAgeID_'+r).html(html);
  })
}


Adivaha.controller("flights-filter", function($scope) {
	$scope.SiteUrl = document.getElementById("siteurl").value;
	$scope.TemplateUrl = document.getElementById("template_url").value;
    $scope.IsVisible = false;
    $scope.ShowHide = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide1 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide2 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide3 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide4 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide5 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide6 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide7 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }

    $scope.ShowHide8 = function() {
        $scope.IsVisible = $scope.IsVisible ? false : true;
    }


    $scope.data = [
        [{
            "en": "test"
        }]
    ];

    // add a column
    $scope.addColumn = function() {


        //you must cycle all the rows and add a column 
        //to each one
        $scope.data.forEach(function($row) {

            $row.push({
                "en": ""
            })
        });
    };

    // remove the selected column
    $scope.removeColumn = function(index) {
        // remove the column specified in index
        // you must cycle all the rows and remove the item
        // row by row
        $scope.data.forEach(function(row) {

            row.splice(index, 1);

            //if no columns left in the row push a blank array
            if (row.length === 0) {


                row.data = [];
            }
        });
    };

    // remove the selected row
    $scope.removeRow = function(index) {
        // remove the row specified in index
        $scope.data.splice(index, 1);
        // if no rows left in the array create a blank array
        if ($scope.data.length() === 0) {
            $scope.data = [];
        }
    };

    //add a row in the array
    $scope.addRow = function() {
   var newrow = [0];

        if ($scope.data.length === 0) {


            newrow = [{
                'en': ''
            }];
        } else {
            $scope.data[0].forEach(function(row) {

                newrow.push({
                    'en': ''
                });
            });
        }
        $scope.data.push(newrow);
    };

});

/*== Flight controller start from there ==*/
Adivaha.controller("Flight_Controller", function($scope, $stateParams, $http, $rootScope, $timeout, $location, $state,$window) {
   $scope.SiteUrl = document.getElementById("siteurl").value;
   $scope.TemplateUrl = document.getElementById("template_url").value;
   var search = $location.search();
  
    if (typeof(search.Flights_City_From) == "undefined") {
		   var toDayDate = new Date();
			toDayDate.setDate(toDayDate.getDate()+10); 
			$('.input-daterange input[name="flight_to_start"]').datepicker('setDate', toDayDate);
			$('.input-daterange input[name="flight_to_start"]').on('changeDate', function(e){
				var nextDayDate =e.target.value;
				$('.input-daterange input[name="flight_to_end"]').datepicker('setDate', nextDayDate);
				$(this).datepicker('hide');
			});
			
		var nextDayDate = new Date();
		 nextDayDate.setDate(nextDayDate.getDate()+11);
		$('.input-daterange input[name="flight_to_end"]').datepicker('setDate', nextDayDate);
		$('.input-daterange input[name="flight_to_end"]').on('changeDate', function(e){
			$(this).datepicker('hide');
		})
		
		
       $scope.flight_to_checkIn =document.getElementById("flight_to_checkIn").value;
	   $scope.flight_to_checkOut =document.getElementById("flight_to_checkOut").value;		
       
	   var currPath = $location.path();
	   var statePath = currPath.replace(/\//g, "");
	   var pageName =$('#pageName').val();
	 
	   if(pageName=='manage-flight'){ // manage for landing page
	    $scope.flight_desti = $('#wh_origin_name').val();
        $scope.flight_to_desti = $('#wh_destination_name').val();;
        $scope.flight_locationId = $('#wh_origin_iata').val();
        $scope.flight_to_locationId =$('#wh_destination_iata').val();
		$scope.Flights_Adults = $('#wh_adults').val();
        $scope.Flights_Children = $('#wh_children').val();
        $scope.Flights_Infants = $('#wh_infants').val();
        $scope.Flights_Category_Economy = $('#wh_trip_class').val();
        $scope.result = $('#wh_trip_class').val();
		
        $scope.Flights_Adults = $('#wh_adults').val();
        $scope.Flights_Children = $('#wh_children').val();
        $scope.Flights_Infants= $('#wh_infants').val();
		
		$scope.count = parseInt($scope.Flights_Adults, 10);
        $scope.count1 = parseInt($scope.Flights_Children, 10);
        $scope.count2 = parseInt($scope.Flights_Infants, 10);
		
		$scope.Flights_Return_direct =$('#wh_Flights_Return_direct').val();
		
		document.getElementById("flight_to_checkIn").value=$('#wh_depart_date').val();
		document.getElementById("flight_to_checkOut").value=$('#wh_return_date').val();
	    $scope.flight_to_checkIn =document.getElementById("flight_to_checkIn").value;
	    $scope.flight_to_checkOut =document.getElementById("flight_to_checkOut").value;	
		
	   }
	   else{ 
	    $scope.flight_desti = "New Delhi, India";
        $scope.flight_to_desti = "Mumbai, India";
        $scope.flight_locationId = "DEL";
        $scope.flight_to_locationId = "BOM";
		$scope.Flights_Adults = 1;
        $scope.Flights_Children = 0;
        $scope.Flights_Infants = 0;
        $scope.Flights_Category_Economy = "Economy";
        $scope.result = "Economy";
        $scope.count = parseInt($scope.Flights_Adults, 10);
        $scope.count1 = parseInt($scope.Flights_Children, 10);
        $scope.count2 = parseInt($scope.Flights_Infants, 10);
	   }
    } else {
        $scope.flight_desti = search.Flights_City_From;
        $scope.flight_to_desti = search.Flights_City_to;
        $scope.flight_locationId = search.Flights_City_From_IATACODE;
        $scope.flight_to_locationId = search.Flights_City_to_IATACODE;
		$scope.flight_to_checkIn =search.Flights_Start_Date.replace(/-/g,'/');;
		$scope.flight_to_checkOut =search.Flights_End_Date.replace(/-/g,'/');
        //document.getElementById("flight_to_checkIn").value = search.Flights_Start_Date.replace(/-/g,'/');
        //document.getElementById("flight_to_checkOut").value = search.Flights_End_Date.replace(/-/g,'/');
        $scope.count = parseInt(search.Flights_Adults, 10);
        $scope.count1 = parseInt(search.Flights_Children, 10);
        $scope.count2 = parseInt(search.Flights_Infants, 10);
        $scope.result = search.Flights_Category_Economy;
    }
	 
	/*
	$scope.Search_Flights = function() { 
	    var flight_to_checkIn =document.getElementById("flight_to_checkIn").value;
		var flight_to_checkOut =document.getElementById("flight_to_checkOut").value;
		flight_to_checkIn =flight_to_checkIn.replace(/\//g,'-');
		flight_to_checkOut =flight_to_checkOut.replace(/\//g,'-');
		
		var currPath = $location.path();
		var statePath = currPath.replace(/\//g, "");
		
		if(statePath==''){ // manage for landing page
		
			$scope.flight_desti =$scope.flight_desti;
			$scope.flight_to_desti=$scope.flight_to_desti;
			$scope.flight_locationId =$scope.flight_locationId;
			$scope.flight_to_locationId =$scope.flight_to_locationId;
			$scope.Flights_Adult =$scope.count;
			$scope.Flights_Children =$scope.count1;
			$scope.Flights_Infants =$scope.count2;
			$scope.Flights_Category_Economy =$scope.result;
			
			
			$window.location.href = document.getElementById("siteurl").value+'/#/flight_search/?Flights_City_From='+$scope.flight_desti+'&Flights_City_to='+$scope.flight_to_desti+'&Flights_City_From_IATACODE='+$scope.flight_locationId+'&Flights_City_to_IATACODE='+$scope.flight_to_locationId+'&Flights_Return_direct='+$scope.directcri+'&Flights_Start_Date='+flight_to_checkIn+'&Flights_End_Date='+flight_to_checkOut+'&Flights_Adults='+$scope.Flights_Adult+'&Flights_Children='+$scope.Flights_Children+'&Flights_Infants='+$scope.count2+'&Flights_Category_Economy='+$scope.result+'&currency=USD';
		  }
		else{
        $state.go("flight_search", { 
				"Flights_City_From": $scope.flight_desti,
				"Flights_City_to": $scope.flight_to_desti,
				"Flights_City_From_IATACODE": $scope.flight_locationId,
				"Flights_City_to_IATACODE": $scope.flight_to_locationId,
				"Flights_Return_direct": $scope.directcri,
				"Flights_Start_Date": flight_to_checkIn,
				"Flights_End_Date": flight_to_checkOut,
				"Flights_Adults": $scope.count,
				"Flights_Children": $scope.count1,
				"Flights_Infants": $scope.count2,
				"Flights_Category_Economy": $scope.result,
				"currency": 'USD'
			});
		
		}
		
		
    }*/
	
	
	$scope.Search_Flights = function() { 
	    var flight_to_checkIn =document.getElementById("flight_to_checkIn").value;
		var departDate_Arr =flight_to_checkIn.split('/');
		var departDate =departDate_Arr[2]+'-'+departDate_Arr[0]+'-'+departDate_Arr[1];
		
		var flight_to_checkOut =document.getElementById("flight_to_checkOut").value;
		
		var returnDate_Arr =flight_to_checkOut.split('/');
		var returnDate =returnDate_Arr[2]+'-'+returnDate_Arr[0]+'-'+returnDate_Arr[1];
		
		flight_to_checkIn =flight_to_checkIn.replace(/\//g,'-');
		flight_to_checkOut =flight_to_checkOut.replace(/\//g,'-');
		
		var currPath = $location.path();
		var statePath = currPath.replace(/\//g, "");
		
		if(statePath==''){ // manage for landing page
			$scope.flight_desti =$scope.flight_desti;
			$scope.flight_to_desti=$scope.flight_to_desti;
			$scope.flight_locationId =$scope.flight_locationId;
			$scope.flight_to_locationId =$scope.flight_to_locationId;
			$scope.Flights_Adult =$scope.count;
			$scope.Flights_Children =$scope.count1;
			$scope.Flights_Infants =$scope.count2;
			$scope.Flights_Category_Economy =$scope.result;
		  }
		
		
		if($('#site_language').val()==''){
			var locale ='en';
		}
		else{
			var locale =$('#site_language').val();
		}
		
		
		var param ='marker='+$('#tpMarker').val()+'&origin_name='+$scope.flight_desti+'&origin_iata='+$scope.flight_locationId+'&destination_name='+$scope.flight_to_desti+'&destination_iata='+$scope.flight_to_locationId+'&depart_date='+departDate+'&return_date='+returnDate+'&Flights_Return_direct='+$scope.directcri+'&with_request=true&adults='+$scope.count+'&children='+$scope.Flights_Children+'&infants='+$scope.count2+'&trip_class='+$scope.result+'&currency='+$('#currency').val()+'&locale='+locale+'&one_way=true&ct_guests='+$scope.ct_guests+'passenger&ct_rooms=1';
		
		var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?action=storeFlightData&"+param;
	    $http.get(url).success( function(response) {
			var pageName =$('#pageName').val();
			if(pageName=='manage-flight'){
			  $window.location.href = document.getElementById("siteurl").value+'/flights/#/?'+param;
			   window.location.reload(true); 
			}else{
				$window.location.href = document.getElementById("siteurl").value+'/flights/#/?'+param;
			}
			
		}); 
		
    }
	
	
	$scope.getLocation_Hint_Flights_From = function(val) {
        return $http.get('http://www.jetradar.com/autocomplete/places', {
            params: {
                locale: "en",
                with_countries: "false",
                q: $scope.flight_desti
            }
        }).then(function(response) {
       // alert(JSON.stringify(response));
            if (JSON.stringify(response) != "[]") {
                $(".locationpopup_flightsfrom").removeClass("hidethisinitially");
                $scope.Flight_from_destinations = response.data;
                $scope.showpopup_flightsfrom = true;
            } else {
                $scope.showpopup_flightsfrom = false;
            }

        });
    };

    $scope.getLocation_Hint_Flights_To = function(val) {
        return $http.get('http://www.jetradar.com/autocomplete/places', {
            params: {
                locale: "en",
                with_countries: "false",
                q: $scope.flight_to_desti
            }
        }).then(function(response) {
            if (JSON.stringify(response) != "[]") {
                $(".locationpopup_flightsto").removeClass("hidethisinitially");
                $scope.Flight_To_destinations = response.data;
                $scope.showpopup_flightsto = true;
            } else {
                $scope.showpopup_flightsto = false;
            }

        });
    };
	
    $scope.Update_Search_Field_Flights_From = function(city_code, city_fullname) {
		//alert('popup');
        $scope.flight_locationId = city_code;
        $scope.flight_desti = city_fullname;
        $scope.showpopup_flightsfrom = false;
    }
    $scope.Update_Search_Field_Flights_To = function(id, latinFullName) {
        $scope.flight_to_locationId = id;
        $scope.flight_to_desti = latinFullName;
        $scope.showpopup_flightsto = false;
    }
	$scope.showhidecheckout = true;

    
	// manage for landing page
    var pageName =$('#pageName').val();
	if(pageName=='manage-flight'){ 
	  $scope.Flights_Return_direct =$('#wh_Flights_Return_direct').val();
	  if($scope.Flights_Return_direct=='disable'){
		$scope.showhidecheckout = false;  
		$scope.directcri = "disable";
        $scope.returncri = "enable";
	  }else{
		$scope.showhidecheckout = true;  
		$scope.directcri = "enable";
        $scope.returncri = "disable";
	    }
	}
	else{
	 $scope.directcri = "enable";
     $scope.returncri = "disable";	
	}
	

    $scope.Show_OneWay_Round = function(val) {
        $scope.showhidecheckout = val;
        if (val == true) {
            $scope.directcri = "enable";
            $scope.returncri = "disable";
        } else {
            $scope.directcri = "disable";
            $scope.returncri = "enable";
        }
    }
	$scope.done =function(){
		$(".roomgroupdata").addClass("hidnumberofrooms");	
		$('#showPassenger').attr('rel',0);
	}			
		
	$scope.showPassenger =function(){
		 $(".roomgroupdata").removeClass("hidnumberofrooms");	
		 $(this).attr('rel',1);
	}

})



Adivaha.controller("flight_search_Results_Controller", function($scope, $location, $anchorScroll, $http){
  $scope.SiteUrl = document.getElementById("siteurl").value;
 $scope.TemplateUrl = document.getElementById("template_url").value;
  var currPath = $location.path();
  var statePath = currPath.replace(/\//g, "");
	$('.tab-pane').removeClass('active');
	$('#tab-flight').addClass('active');
   // alert(statePath); return false;

	$("#1a").removeClass("active");
	$("#2a").addClass("active"); 
	
	
	$scope.IsVisibleinfo = false;
	$scope.showInfo = function(id) {
	
	$('.flightDetailCls').hide();
	var rel = $('#flightDetail_'+id).attr('rel');
	if(rel==0){
	   $('#flightDetail_'+id).show();
	   $('#flightDetail_'+id).attr('rel',1);
	}else{
	   $('#flightDetail_'+id).hide();
	   $('#flightDetail_'+id).attr('rel',0);	
	}
    //$scope.IsVisibleinfo = $scope.IsVisibleinfo ? false : true;
   }

	$scope.showbaggageinfo = false;
        $scope.showbaggage = function() {
        $scope.showbaggageinfo = $scope.showbaggageinfo ? false : true;
    }
	
	
        $scope.symbolArr = {
        'USD': '&#36;',
        'EUR': '&#128;',
        'RUB': '&#8359;',
        'AUD': '&#8371;',
        'EUR': '&#128;',
        'BRL': '&#x20a8;',
        'CAD': '&#36;',
        'CHF': '&#8355;',
        'HKD': 'HK&#36;',
        'IRD': 'Rp',
        'INR': '&#x20B9;',
        'NZD': 'NZ&#36;',
        'PHP': '&#8359;',
        'PLN': '&#8359;',
        'SGD': 'S&#36;',
        'THB': '&#0E3F;',
        'GBP': '&#163;',
        'ZAR': '&#8359;',
        'UAH': '&#8359;'
    };
	
	
	$scope.price_tab = true;
	$scope.airline_tab = false;
	$scope.duration_tab = false;
	$scope.depart_tab = false;
	

    var search = $location.search();
	$scope.flight_desti = search.Flights_City_From;
	$scope.flight_to_desti = search.Flights_City_to;
	$scope.Flights_Start_Date = search.Flights_Start_Date;
	$scope.Flights_End_Date = search.Flights_End_Date;

	document.getElementById("flight_to_checkIn").value = search.Flights_Start_Date.replace(/-/g,'/');
	document.getElementById("flight_to_checkOut").value = search.Flights_End_Date.replace(/-/g,'/');
	$scope.$root.User_selected_currency = search.currency;
    $scope.symbole = 'USD';

	
	//Start of Checkboxes
	$scope.roles = [
	{id: 1, title: 'Loading...'}
	];
	$scope.user = {
	roles: ['1']
	};
	$scope.numberOfStops=0;
	
	$scope.airlines_Control="AI";
	$scope.originAirports_Control="Indira Gandhi International";
	$scope.destinationAirports_Control="Goa International";
	$scope.onlineTravelAgencies_Control="Airtickets";
	$scope.Session_Id="";
	
	   //$scope.durationOfStops = { minValue: 10, maxValue: 100, options: { floor: 10, ceil: 100,step: 1 }};
	   
	   // slide filter

	$scope.reloadRoute = function() {
	     location.reload();
	}
	
	var myChangeListener = function(){
	//alert("Updating");
	Upldate_Searched_flight();
	//Show_Flights(Search_Key);
	}
	
	$scope.checkboxFiltration = function(){
	//alert("checkbox");
	Upldate_Searched_flight();
	}
	
	$scope.airlineFiltration = function(){
	//alert("airline");
	Upldate_Searched_flight();
	}
	
	
	$scope.oriAirportFiltration = function(){
	//alert("airline");
	Upldate_Searched_flight();
	}
	
	$scope.destiAirportFiltration = function(){
	//alert("airline");
	Upldate_Searched_flight();
	}
	
	$scope.agencyFiltration = function(){
	//alert("airline");
	Upldate_Searched_flight();
	}
	
	$scope.paymentmethodFiltration = function(){
	//alert("airline");
	Upldate_Searched_flight();
	}
	
	
	  //End of Checkboxes
	  
	//Set Default Values
	//----------------------------------------------------------
	$scope.hotels_found = 0;
	var search_id = 0
	$scope.currency_sign = 'USD';
	$scope.price_filter = { minValue: 0, maxValue: 100, options: { floor: 100, ceil: 0,step: 1,
	 onEnd: function() { myChangeListener() } }};

	//End of Set Default Values
	//------------------------------
	
	
	Find_Flights_Key();
	
	function Find_Flights_Key(){

	var param="action=findSearchKey&Flights_City_From="+search.Flights_City_From+"&Flights_City_to="+search.Flights_City_to+"&Flights_City_From_IATACODE="+search.Flights_City_From_IATACODE+"&Flights_City_to_IATACODE="+search.Flights_City_to_IATACODE+"&Flights_Return_direct="+search.Flights_Return_direct+"&Flights_Start_Date="+$scope.Flights_Start_Date+"&Flights_End_Date="+$scope.Flights_End_Date+"&Flights_Adults="+search.Flights_Adults+"&Flights_Children="+search.Flights_Children+"&Flights_Infants="+search.Flights_Infants+"&Flights_Category_Economy="+search.Flights_Category_Economy;
	
	var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?"+param;
	
	
	//alert(url);
	$http.get(url).success( function(response) {
	$scope.Session_Id=response;
	if(response==""){
	
	Find_Flights_Key();
	}
	else{
	Save_Flights(response);	
	}
	
	});
	
	}

	function Save_Flights(response){

	var Search_Key = response;
	var param = "action=Save_Flights&search_id="+Search_Key;
	var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?"+param;


	//alert("Update Rates URL : " + url);
	$http.get(url).success( function(response) {
	
	    // alert(JSON.stringify(response.total));
	var newsearchid = response.contentsz[((response.contentsz.length)-1)].search_id;
	var newcitydist = response.contentsz[((response.contentsz.length)-1)].city_distance;
	
	//alert(newsearchid);
	//alert(newcitydist);
	
	if((typeof(newsearchid)!="undefined") && (typeof(newcitydist)!="undefined")){
	//alert("More Results Found");
	Save_Flights(Search_Key);
	//return false;
	}
	        $scope.flightTotal =response.total;
            $scope.flightTotalfilter =parseInt(response.total/12);
			if(response.results != null){
				if(parseInt(response.results.length) > 1){
					$(".hotel-list-container").addClass("showthis");
					$(".hotel-list-container").removeClass("hidethis");
					$(".loader_hotel_content").addClass("hidethis");
				}
			}
            setTimeout(function() {
                Do_Pagination();
            }, 1000);
	
	
	
	$scope.price_filter = { minValue: parseFloat(response.minprice), maxValue: parseFloat(response.maxprice), options: { floor: parseFloat(response.minprice), ceil: parseFloat(response.maxprice),step: 1, onEnd: function() { myChangeListener() } }};
	
	$scope.divText = 'Direct';
	$scope.divText1 = '1 Stop';
	$scope.divText2 = '1+ Stop';
	$scope.divText3 = '2+ Stop';
	$scope.is_direct0 =  'Direct';
	$scope.is_direct1 = '1 Stop';
	$scope.is_direct2 = '2 Stop';
	$scope.stopages =response.stopages;
	$scope.airData =response.airData;
	$scope.payment_methods =response.payment_methods;
	$scope.origon_airports =response.origon_airports;
	$scope.destination_airports =response.destination_airports;
	$scope.agency =response.agency;
	$scope.baggages =response.airbaggages;

	
	
			//alert("Time Slider");
			 setTimeout(function() {
                TimeSlider();
            }, 1000);
			
			 setTimeout(function() {
                ArriveTimeSlider();
            }, 1000);
            Show_Flights(Search_Key);
				
function TimeSlider() {
	$scope.mintime=response.minrate;
	$scope.maxtime=response.maxrate;

 var mintime=response.minrate;
 var maxtime=response.maxrate;

var hm = mintime; 	  // your input string
var a = hm.split(':'); // split it at the colons

var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60; 
var minute=parseInt(seconds/60);

var hmss = maxtime; 	  // your input string
var aa = hmss.split(':'); // split it at the colons

var secondss = (+aa[0]) * 60 * 60 + (+aa[1]) * 60; 
var minutes=parseInt(secondss/60);

  var scrollbar=$("#slider-range").slider({	
    range: true,
    min: minute,
    max: minutes,
    step: 1,
    values: [minute, minutes],
		slide: function (e, ui) {
			var hours1 = Math.floor(ui.values[0] / 60);
			var minutes1 = ui.values[0] - (hours1 * 60);

			if (hours1.length == 1) hours1 = '0' + hours1;
			if (minutes1.length == 1) minutes1 = '0' + minutes1;
			if (minutes1 == 0) minutes1 = '00';
			if (hours1 >= 12) {
				if (hours1 == 12) {
					hours1 = hours1;
					minutes1 = minutes1 + " PM";
				} else {
					hours1 = hours1 - 12;
					minutes1 = minutes1 + " PM";
				}
			} else {
				hours1 = hours1;
				minutes1 = minutes1 + " AM";
			}
			if (hours1 == 0) {
				hours1 = 12;
				minutes1 = minutes1;
			}

			$('.slider-time').html(hours1 + ':' + minutes1);

			var hours2 = Math.floor(ui.values[1] / 60);
			var minutes2 = ui.values[1] - (hours2 * 60);

			if (hours2.length == 1) hours2 = '0' + hours2;
			if (minutes2.length == 1) minutes2 = '0' + minutes2;
			if (minutes2 == 0) minutes2 = '00';
			if (hours2 >= 12) {
				if (hours2 == 12) {
					hours2 = hours2;
					minutes2 = minutes2 + " PM";
				} else if (hours2 == 24) {
					hours2 = 11;
					minutes2 = "59 PM";
				} else {
					hours2 = hours2 - 12;
					minutes2 = minutes2 + " PM";
				}
			} else {
				hours2 = hours2;
				minutes2 = minutes2 + " AM";
			}

			$('.slider-time2').html(hours2 + ':' + minutes2);
			
			var minVal =hours1+':'+minutes1;
			var maxVal =hours2+':'+minutes2;
			
	
			
			$("#time_slider").val(minVal+"-"+maxVal);
		}
    });
    var handleHelper = scrollbar.find(".ui-slider-handle").mouseup(function() {
	   //alert(Search_Key);
	  // Show_Flights(Search_Key);
	   Upldate_Searched_flight();
	})

    }
	
function ArriveTimeSlider() {
	$scope.minarrivetime=response.minarriverate;
	$scope.maxarrivetime=response.maxarriverate;

 var mintime=response.minarriverate;
 var maxtime=response.maxarriverate;
var hm = mintime; 	  // your input string
var a = hm.split(':'); // split it at the colons

var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60; 
var minute=parseInt(seconds/60);

var hmss = maxtime; 	  // your input string
var aa = hmss.split(':'); // split it at the colons

var secondss = (+aa[0]) * 60 * 60 + (+aa[1]) * 60; 
var minutes=parseInt(secondss/60);
 
  var scrollbar=$("#arrive-slider-range").slider({	
    range: true,
    min: minute,
    max: minutes,
    step: 1,
    values: [minute, minutes],
		slide: function (e, ui) {
			var hours1 = Math.floor(ui.values[0] / 60);
			var minutes1 = ui.values[0] - (hours1 * 60);

			if (hours1.length == 1) hours1 = '0' + hours1;
			if (minutes1.length == 1) minutes1 = '0' + minutes1;
			if (minutes1 == 0) minutes1 = '00';
			if (hours1 >= 12) {
				if (hours1 == 12) {
					hours1 = hours1;
					minutes1 = minutes1 + " PM";
				} else {
					hours1 = hours1 - 12;
					minutes1 = minutes1 + " PM";
				}
			} else {
				hours1 = hours1;
				minutes1 = minutes1 + " AM";
			}
			if (hours1 == 0) {
				hours1 = 12;
				minutes1 = minutes1;
			}
			$('.arrive-slider-time').html(hours1 + ':' + minutes1);

			var hours2 = Math.floor(ui.values[1] / 60);
			var minutes2 = ui.values[1] - (hours2 * 60);

			if (hours2.length == 1) hours2 = '0' + hours2;
			if (minutes2.length == 1) minutes2 = '0' + minutes2;
			if (minutes2 == 0) minutes2 = '00';
			if (hours2 >= 12) {
				if (hours2 == 12) {
					hours2 = hours2;
					minutes2 = minutes2 + " PM";
				} else if (hours2 == 24) {
					hours2 = 11;
					minutes2 = "59 PM";
				} else {
					hours2 = hours2 - 12;
					minutes2 = minutes2 + " PM";
				}
			} else {
				hours2 = hours2;
				minutes2 = minutes2 + " AM";
			}

			$('.arrive-slider-time2').html(hours2 + ':' + minutes2);
			
			var minVal =hours1+':'+minutes1;
			var maxVal =hours2+':'+minutes2;

			$("#arrive_time_slider").val(minVal+"-"+maxVal);
		}
    });
    var handleHelper = scrollbar.find(".ui-slider-handle").mouseup(function() {
	  // alert(Search_Key);
	// Show_Flights(Search_Key);
	  Upldate_Searched_flight();
	})

    }
   });
    }

	
	$scope.function_sorting_Field_Control_Flight = function(param_control){
	
	if($scope.previous_sorting==param_control){
	$scope.sorting_order_Control_Flight = !$scope.sorting_order_Control_Flight;
	}
	if(param_control=="price"){
	$scope.price_tab = true;
	$scope.airline_tab = false;
	$scope.duration_tab = false;
	$scope.depart_tab = false;
	$scope.price = $scope.price + 1;
	}
	if(param_control=="airline"){
	$scope.price_tab = false;
	$scope.airline_tab = true;
	$scope.duration_tab = false;
	$scope.depart_tab = false;
	}
	if(param_control=="duration"){
	$scope.price_tab = false;
	$scope.airline_tab = false;
	$scope.duration_tab = true;
	$scope.depart_tab = false;
	}
	if(param_control=="depart"){
	$scope.price_tab = false;
	$scope.airline_tab = false;
	$scope.duration_tab = false;
	$scope.depart_tab = true;
	}
	$scope.previous_sorting =  param_control;
	$scope.sorting_Field_Control_Flight = param_control;
	Upldate_Searched_flight();
	}
	
	
	
 function Show_Flights(Search_Key){
	//alert("Show Results" + Search_Key);
	var param = "action=Show_Flights&search_id="+Search_Key+"&page="+$scope.paggination;
	var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?"+param;
	//alert("Update Rates URL : " + url);
	$http.get(url).success( function(response) {
	
	if(response==""){
	      Save_Flights(Search_Key);
	}
	$scope.flightList = response.result;
	
	
	$scope.Loading_msg = "Select your Flight";
	$scope.currentPage = 1;
	$scope.pageSize = 12;
    if(response.result != null){
        if(parseInt(response.result.length) > 1){
      
			$(".hotel-list-container").addClass("showthis");
			$(".hotel-list-container").removeClass("hidethis");
			$(".loader_hotel_content").addClass("hidethis");
		}
	}	
	
	$scope.pageChangeHandler = function(num) {
	console.log('meals page changed to ' + num);
	}; 
	});
	
	
	$scope.getDataforFlight = function(pageNum){
	$scope.paggination = pageNum;
	Upldate_Searched_flight();
	}

	
	     }

	function Upldate_Searched_flight(){ 

	    var stopageArray = [];
	$('.stopageCls:checked').each(function(i){
	  stopageArray[i] = $(this).val();
	});
	    
	
	var airlineArray = [];
	$('.airlinesCls:checked').each(function(i){
	  airlineArray[i] = $(this).val();
	});


	var oriairportsArray = [];
	$('.oriairportsCls:checked').each(function(i){
	  oriairportsArray[i] = $(this).val();
	}); 
	
	var destiairportsArray = [];
	$('.destiairportsCls:checked').each(function(i){
	  destiairportsArray[i] = $(this).val();
	}); 
	
	var agencyArray = [];
	$('.agencyCls:checked').each(function(i){
	  agencyArray[i] = $(this).val();
	}); 
	
	var paymentArray = [];
	$('.paymentCls:checked').each(function(i){
	  paymentArray[i] = $(this).val();
	}); 

        $scope.time_slider=document.getElementById("time_slider").value;
        $scope.arrive_time_slider=document.getElementById("arrive_time_slider").value;
      
		if( typeof $scope.paggination=='undefined'){
			$scope.paggination=1;
		}

 
   var param = 'action=Show_Flights&search_Session_Id=' + $scope.Session_Id +
		"&price_filter=" + $scope.price_filter.minValue + "-" + $scope.price_filter.maxValue +  
		"&stopage=" + stopageArray + "&airline=" + airlineArray + "&oriairports=" + oriairportsArray + 
		"&destiairports=" + destiairportsArray + 
		"&agency=" + agencyArray +
		"&payment=" + paymentArray +
		"&time_slider=" +  $scope.time_slider + 
		"&arrive_time_slider=" + $scope.arrive_time_slider + 
		"&orderby_fild=" + $scope.sorting_Field_Control_Flight + 
		"&orderby_val=" + $scope.sorting_order_Control_Flight+
		"&page="+$scope.paggination; 

	//alert(param);	

	var url = document.getElementById("template_url").value+"/api/flight_update_rates.php?"+param;
	 
	$http.get(url).success( function(response) {
	$scope.flightList = response.result;
	  $scope.flightTotal =response.result[0].totalcountfilter;
      $scope.flightTotalfilter =parseInt(response.result[0].totalcountfilter/12);
	 setTimeout(function() { 
                Do_Pagination();
            }, 1000);

	}); 
	
	} 
	


	 $scope.IsVisible = false;
            $scope.ShowHide = function () {
                //If DIV is visible it will be hidden and vice versa.
                $scope.IsVisible = $scope.IsVisible ? false : true;
            }
			
{
  $scope.showKoala = false;
}
	
	 
  function Do_Pagination(){ 

	var lis = $("#myList li").hide();
	lis.slice(0, 7).show();
	var size_li = lis.length;
	var x = 7,
	start = 0;
	$('#next').click(function () { 
	if (start + x < size_li) {
	lis.slice(start, start + x).hide();
	start += x;
	lis.slice(start, start + x).show();
	}
	});
	$('#prev').click(function () {
	if (start - x >= 0) {
	lis.slice(start, start + x).hide();
	start -= x;
	lis.slice(start, start + x).show();
	}
	});
	
	 if($scope.paggination==1){
	  $('#myList').find("li:first").addClass("active");
	 }
	 
	   $('#myList li').click(function() {
		$('#myList').find("li").removeClass("active");   
		$(this).addClass('active');
		$('html, body').animate({ scrollTop: 0 }, 0);
	   })
	 }
	});
//Meenakshi flight controller end
