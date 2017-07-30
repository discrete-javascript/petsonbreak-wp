<?php session_start();?>
<div class="loader_hotel_content showthis" >
	<img src="wp-content/themes/adivaha/images/svg/ripple.svg" alt="ripple" width="120" height="120" class="loading_fig" />
    <h6><?php echo $_SESSION['TXTDATA']['Searching_Flights'];?></h6>
    <p><?php echo $_SESSION['TXTDATA']['flights_check'];?></p>
</div>



<section id="hotel-list-section" class="wleft ng-scope">
  <div class="container hotel-list-container">
    <div class="row">
      <div class="col-md-12">
        <!-- Filter Section ==============================-->
        <div class="border-right-g width-set_results-left" id="navbar-main" ng-controller="flights-filter">
		<span class="close-filter"><i class="fa fa-times" aria-hidden="true"></i></span>
          <div class="filter_sidebar wleft">
            <div style="display:none">
              <input type="fhidden" ng-model="Session_Id" />
              <input type="fhidden" ng-model="location_Id" />
              <input type="fhidden" ng-model="Flights_City_to" />
              <input type="fhidden" ng-model="Flights_City_to_IATACODE" />
              <input type="fhidden" ng-model="Flights_Start_Date" />
              <input type="fhidden" ng-model="Flights_End_Date" />
              <input type="fhidden" ng-model="Flights_Adults" />
              <input type="fhidden" ng-model="Flights_Children" />
              <input type="fhidden" ng-model="Flights_Infants" />
              <input type="fhidden" ng-model="Flights_Category_Economy" />
              <input type="fhidden" ng-model="Cri_currency" />
              <input type="fhidden" ng-model="Cri_language" />
              <br />
              <br />
              <input type="fhidden" ng-model="numberOfStops" />
              <input type="fhidden" ng-model="price_filter.minValue" />
              <input type="fhidden" ng-model="price_filter.maxValue" />
              <input type="fhidden" ng-model="departFrom.minValue" />
              <input type="fhidden" ng-model="departFrom.maxValue" />
              <input type="fhidden" ng-model="arriveTo.minValue" />
              <input type="fhidden" ng-model="arriveTo.maxValue" />
              <input type="fhidden" ng-model="airlines_Control" />
              <input type="fhidden" ng-model="originAirports_Control" />
              <input type="fhidden" ng-model="destinationAirports_Control" />
              <input type="fhidden" ng-model="onlineTravelAgencies_Control" />
			  <input type="fhidden" ng-model="sorting_Field_Control_Flight" />
              <input type="fhidden" ng-model="sorting_order_Control_Flight" />
            </div>

            <div>
            <form id="filter_frm" name="filter_frm" class="ng-pristine ng-valid">
			
              <div class="filter_controls_div">
			    
				
				
                <h6> <?php echo $_SESSION['TXTDATA']['filter_your_search'];?><a href="javascript:void(0);" ng-click="reloadRoute();"> <?php echo $_SESSION['TXTDATA']['reset'];?></a> </h6>
                <div class="sep1"></div>
                <div class="sep2"></div>
                <div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['number_of_stops'];?></h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					  <!--<li >
                        <input type="checkbox" name="stopage[]" class="stopageCls" value="-1" ng-click="checkboxFiltration();" /> <span>ALL </span>
					
                      </li>-->
					  <li ng-repeat="stopage in stopages">
                        <input type ="checkbox" name="stopage[]" class="stopageCls" ng-model="stopageFilter" value="{{stopage.max_stops}}" ng-click="checkboxFiltration();" />
						 <span ng-if="stopage.max_stops==0">		
						 <span ng-bind="divText"></span><span class="starRatHotel pull-right">({{stopage.maxstopcount}})</span> 
						</span> <span ng-if="stopage.max_stops==1">		
						 <span ng-bind="divText1"></span><span class="starRatHotel pull-right">({{stopage.maxstopcount}})</span> 
						</span> <span ng-if="stopage.max_stops==2">		
						 <span ng-bind="divText2"></span><span class="starRatHotel pull-right">({{stopage.maxstopcount}})</span> 
						</span>
						<span ng-if="stopage.max_stops==3">		
						 <span ng-bind="divText3"></span><span class="starRatHotel pull-right">({{stopage.maxstopcount}})</span> 
						</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="sep1"></div>
                <div class="sep2"></div>
                <div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['price'];?></h5>
                  <div class="flt-price">
				   
                    <rzslider rz-slider-model="price_filter.minValue" rz-slider-high="price_filter.maxValue" rz-slider-options="price_filter.options"></rzslider>
					
                  </div>
                </div>
	             
				<div class="filter_criteria wleft" >
				<li ng-repeat="origon_airport in origon_airports">
                  <h5><?php echo $_SESSION['TXTDATA']['Depart_from'];?> {{origon_airport.code}} </h5>
                  <div class="flt-price">
		
                   <!-- <rzslider rz-slider-model="departFrom.minValue" rz-slider-high="departFrom.maxValue" rz-slider-options="departFrom.options"></rzslider>-->
	<div id="time-range">
    <p><?php echo $_SESSION['TXTDATA']['from'];?> <span class="slider-time">{{mintime}}</span> <?php echo $_SESSION['TXTDATA']['to'];?> <span class="slider-time2">{{maxtime}}</span>

    </p>
        <div class="sliders_step1">
        <div id="slider-range"></div>
    </div>
	</div>
	
	<input type="hidden" name="time_slider" id="time_slider" class="ChangeTimer_Cls" value="">
                  </div>
				  </li>
                </div>
				
				<div class="filter_criteria wleft">
				<li ng-repeat="destination_airport in destination_airports">
                  <h5><?php echo $_SESSION['TXTDATA']['Arrive_to'];?> {{destination_airport.code}} </h5>
                  <div class="flt-price">
	<div id="arrive-time-range">
    <p><?php echo $_SESSION['TXTDATA']['from'];?> <span class="arrive-slider-time">{{minarrivetime}}</span> <?php echo $_SESSION['TXTDATA']['to'];?> <span class="arrive-slider-time2">{{maxarrivetime}}</span>

    </p>
			<div class="arrive-sliders_step1">
			<div id="arrive-slider-range"></div>
			</div>
	</div>
			<input type="hidden" name="arrive_time_slider" id="arrive_time_slider" class="Arrive_ChangeTimer_Cls" value="">
 <!--   <rzslider rz-slider-model="arriveTo.minValue" rz-slider-high="arriveTo.maxValue" rz-slider-options="arriveTo.options"></rzslider>-->
                  </div>
				  </li>
                </div>
				
		   <div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['airlines'];?></h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					 <!-- <li >
                        <input type="checkbox" name="airDatas[]" class="airlinesCls" value="-1" ng-click="airlineFiltration();" /> <span>All</span>
                      </li>-->
					  <li ng-repeat="airDatas in airData">
					 
                        <input type ="checkbox" name="airDatas[]" class="airlinesCls" ng-model="airlineFilter" value="{{airDatas.iata}}" ng-click="airlineFiltration();" />{{airDatas.name}}<span class="starRatHotel pull-right">({{airDatas.carriercount}})</span> 
                      </li>
                    </ul>
                  </div>
                </div>
				
				
				
				  <div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['Origin_Airports'];?></h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					 <!-- <li >
                        <input type="checkbox" name="origon_airport[]" class="oriairportsCls" value="-1" ng-click="oriAirportFiltration();" /> <span>All</span>
                      </li>-->
					  <li ng-repeat="origon_airport in origon_airports">
                        <input type ="checkbox" name="origon_airport[]" class="oriairportsCls" ng-model="oriAirportFilter" value="{{origon_airport.code}}" ng-click="oriAirportFiltration();" />{{origon_airport.name}}
                      </li>
                    </ul>
                  </div>
                </div>
				
				 <div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['Destination_Airports'];?></h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					 <!-- <li >
                        <input type="checkbox" name="origon_airport[]" class="oriairportsCls" value="-1" ng-click="oriAirportFiltration();" /> <span>All</span>
                      </li>-->
					  <li ng-repeat="destination_airport in destination_airports">
                        <input type ="checkbox" name="destination_airport[]" class="destiairportsCls" ng-model="destiAirportFilter" value="{{destination_airport.code}}" ng-click="destiAirportFiltration();" />{{destination_airport.name}}
                      </li>
                    </ul>
                  </div>
                </div>
				
				<div class="filter_criteria wleft">
                  <h5><?php echo $_SESSION['TXTDATA']['Online_Travel_Agencies'];?></h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					<!-- <li >
                        <input type="checkbox" name="origon_airport[]" class="agencyCls" value="-1" ng-click="oriAirportFiltration();" /> <span>All</span>
                      </li>-->
					  <li ng-repeat="agencys in agency">
					  
                        <input type ="checkbox" name="agencys[]" class="agencyCls" ng-model="agencyFilter" value="{{agencys.id}}" ng-click="agencyFiltration();" />{{agencys.name}} <span class="starRatHotel pull-right">({{agencys.gatescount}})</span> 
                      </li>
                    </ul>
                  </div>
                </div>
				<!--<div class="filter_criteria wleft">
                  <h5>Payment Methods</h5>
				
                  <div class="">
                    <ul class="criteria_listing">
					 <li >
                        <input type="checkbox" name="payment_method[]" class="paymentCls" value="-1" ng-click="paymentmethodFiltration();" /> <span>All</span>
                      </li>
					  <li ng-repeat="payment_method in payment_methods">
					  
                        <input type ="checkbox" name="payment_method[]" class="paymentCls" ng-model="paymentFilter" value="{{payment_method.paymethod}}" ng-click="agencyFiltration();" />{{payment_method.paymethod}} <span class="starRatHotel pull-right">({{payment_method.payment_methods_count}})</span> 
                      </li>
                    </ul>
                  </div>
                </div>-->
				
              </div>
              <div class="sep1"></div>
              <div class="sep2"></div>
			  
              </div>
            </form>
          </div>
        </div>
		
        <!--End Filter Section -------->
        <!--Hotel Search Result-->
        <div class="border-left-f width-set_results-right" >
          <div class="row-not-use">
          <div class="col-md-12">
            <div class=" intro wleft">
              <div class="intr-left" style="width:100%;">
                <h1>{{ Loading_msg }} </h1>
				
             <p>{{flightTotal}} <?php echo $_SESSION['TXTDATA']['Flights_found_for'];?> <strong>{{ flight_desti }}</strong> <?php echo $_SESSION['TXTDATA']['to'];?> <strong>{{ flight_to_desti }}</strong>, <?php echo $_SESSION['TXTDATA']['Arival_Date'];?> {{ Flights_Start_Date }}, <?php echo $_SESSION['TXTDATA']['Departure_Date'];?> {{ Flights_End_Date }} </p>
              </div>
            </div>
			
			<div class="filter-btn-div">
			     <a href="javascript:void();" class="filter-btn"><?php echo $_SESSION['TXTDATA']['Filter'];?></a>
			     <a href="javascript:void();" class="modify-btn"><?php echo $_SESSION['TXTDATA']['Modify_Search'];?> </a>
			  </div>
			
			
			
			
            <div class="hotel_sort wleft">
              <ul class="hotel_sort_options wleft">
                <li class="active{{price_tab}}"><a href="javascript:void(0);" ng-toggle="price_tab"  ng-click="function_sorting_Field_Control_Flight('price');"><?php echo $_SESSION['TXTDATA']['price'];?>&nbsp;<span class="recom"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><img class="show{{price_tab}}" src="images/{{sorting_order_Control}}.png" alt="" /></a></li>
               
			   <li class="active{{airline_tab}}"><a href="javascript:void(0);" ng-toggle="airline_tab"  ng-click="function_sorting_Field_Control_Flight('airline');"><?php echo $_SESSION['TXTDATA']['AIRLINE'];?>&nbsp;<span class="recom"><i class="fa fa-tag" aria-hidden="true"></i></span><img class="show{{airline_tab}}" src="images/{{sorting_order_Control}}.png" alt="" /></a></li>
              
			  <li class="active{{duration_tab}}"><a href="javascript:void(0);" ng-toggle="duration_tab"  ng-click="function_sorting_Field_Control_Flight('duration');"><?php echo $_SESSION['TXTDATA']['DURATION'];?>&nbsp;<span class="recom"><i class="fa fa-star-o" aria-hidden="true"></i></span><img class="show{{duration_tab}}" src="images/{{sorting_order_Control}}.png" alt="" /></a></li>
               
			   <li class="active{{depart_tab}}"><a href="javascript:void(0);" ng-toggle="depart_tab" ng-click="function_sorting_Field_Control_Flight('depart');"><?php echo $_SESSION['TXTDATA']['DEPART'];?> &nbsp; <span class="recom"><i class="fa fa-tags" aria-hidden="true"></i></span><img class="show{{depart_tab}}" src="images/{{sorting_order_Control}}.png" alt="" /></a></li>
              </ul>
            </div>
          </div>
	
          <div class="flight-search-result" >
          <ul class="flight-price1">
            <li ng-repeat="flightLists in flightList">
              <div class="flight-item1"> <span class="flight-imges1"> <img class="main-airline-logo js-ticket-logo" alt="" width="112" height="50" src="http://pics.avs.io/112/50/{{flightLists.validating_carrier}}.png"> </span>
                <p><span ng-bind-html="symbole"></span> {{flightLists.price}}</p>
<!--  <a class="book-now-btn" href="javascript:void(0);"  ng-click="BookNow(flightLists.search_id,flightLists.termurl);" > Book Now </a>-->

<a class="book-now-btn" href="http://adivaha.com/demo/ean-team/wp-content/themes/adivaha/flight_redirect.php/?searchid={{flightLists.search_id}}&termurl={{flightLists.termurl}}" target="_blank"> <?php echo $_SESSION['TXTDATA']['book_now'];?> </a>
               
              </div>
			 
              <div class="flight-item2">
                <div class="flight-items">
                  <div class="ticket-segments">
                    <!-- One Way -->
					
					       <div class="flight-one787">

											<div class="flight-depart-info">
										<div class="flight-place-title">
										<span class="semibold">{{ flightLists.origon_airport }}</span> 
										<span>{{ flightLists.validating_carrier }}</span>
										</div>
										
										<div class="flight-date-time">
										<div class="flight-time">{{ flightLists.oneway_departure_time}}</div>
										<div class="flight-date-wrapper">
										<p class="meridiem semibold"></p>
										<p class="flight-date">{{ flightLists.departfilter * 1000  | date:'yyyy-MM-dd'}}</p>
										</div>
										</div>
									</div>
								<div class="flight-duration-info">
								<div class="stops-info flight-direct">
								<span ng-if="flightLists.max_stops==0"><span ng-bind="is_direct0"></span></span>
								<span ng-if="flightLists.max_stops==1"><span ng-bind="is_direct1"></span></span>
								<span ng-if="flightLists.max_stops==2"><span ng-bind="is_direct2"></span></span>

								</div>
						
									<div class="icon icon-departing-plane"></div>
									<div class="flight-duration">{{flightLists.total_duration}}</div>
								</div>

								<div class="flight-arrive-info">
									<div class="flight-place-title">
										<span class="semibold">{{ flightLists.destination_airport }}</span> 
										<span>{{ flightLists.validating_carrier }}</span>
										</div>
										<div class="flight-date-time">
										<div class="flight-time">{{ flightLists.oneway_arrival_time}}</div>
										<div class="flight-date-wrapper">
										<p class="meridiem semibold"></p>
										<p class="flight-date">{{ flightLists.arrivefilter * 1000 | date:'yyyy-MM-dd'}}</p>
										</div>
										</div>
								
								</div>
								
								</div>
						
                   <div ng-if="flightLists.returnFlights">						
						<div class="flight-one788">
									<div class="flight-depart-info">
										<div class="flight-place-title">
										<span class="semibold">{{ flightLists.destination_airport }}</span> 
										<span>{{ flightLists.validating_carrier }}</span>
										</div>
										<div>{{ flightLists.return_departure_time}}</div>
										<div class="flight-date-time">
										
										<div class="flight-date-wrapper">
										<p class="meridiem semibold"></p>
										<p class="flight-date">{{ flightLists.depart_return_filter * 1000 | date:'yyyy-MM-dd'}}</p>
										</div>
										</div>
									</div>
								
								<div class="flight-duration-info">
									<div class="stops-info flight-direct">
								<span ng-if="flightLists.max_stops==0"><span ng-bind="is_direct0"></span></span>
								<span ng-if="flightLists.max_stops==1"><span ng-bind="is_direct1"></span></span>
								<span ng-if="flightLists.max_stops==2"><span ng-bind="is_direct2"></span></span>
									
									</div>
									<div class="icon icon-departing-plane"></div>
									<div class="flight-duration">{{flightLists.	total_duration}}</div>
								</div>
							
								<div class="flight-arrive-info">
									<div class="flight-place-title">
									<span class="semibold">{{ flightLists.origon_airport }}</span>
									<span>{{ flightLists.validating_carrier }}</span>
									</div>
										<div>{{ flightLists.return_arrival_time }}</div>
									<div class="flight-date-time">
									<div class="flight-date-wrapper">
									<div class="meridiem semibold"></div>
									<div class="flight-date">{{ flightLists.arrive_return_filter * 1000 | date:'yyyy-MM-dd'}}</div>
									</div>
									
									</div>
								</div>
								
						</div>	
					</div>						
			
			<!-- new add div code -->
			
<div class="ticket-details opened" ng-show ="IsVisibleinfo" >
 <div class="ticket-details opened">
  	<div ng-if="flightLists.returnFlights">
    <div class="direction-title"><?php echo $_SESSION['TXTDATA']['DEPART'];?></div>
 <div class="segment-block" ng-repeat="onewayFlight in flightLists.onewayFlights">
  <div class="segment-container">
 
    <div class="segment-flights depart flight-direct">
      <!--if-->
      <div class="flight-segment">
        <div class="airline-info clearfix">
          <div class="airline-logo-container left"><img class="airline-logo-image js-ticket-logo" width="32" height="32" alt="" src="http://pics.jetradar.com/al_square/32/32/{{onewayFlight.operating_carrier}}@2x.png"></div>
          <div class="airline-details left"><span class="semibold">{{onewayFlight.operating_carrier}}</span><span class="middot">·</span><span>{{onewayFlight.operating_carrier}}-{{onewayFlight.number}}</span>
           
            <!--if-->
          </div>
          <div class="airline-features right">
            <!--if-->
            <!--if-->
          </div>
        </div>
		
		
        <div class="segment-info">
          <div class="segment-depart">
            <div class="segment-info-title semibold">{{onewayFlight.departure }}</div>
            <div class="segment-info-name g-text-overflow"></div>
            <div class="segment-info-date"><span class="time semibold">{{ onewayFlight.local_departure_timestamp * 1000 | date:'hh:mm:ss': 'UTC'}} {{ onewayFlight.local_departure_timestamp * 1000 | date:'a': 'UTC'}}</span> <span class="date">{{ onewayFlight.local_departure_timestamp * 1000 | date:'yyyy-MM-dd':'UTC'}}</span></div>
            <div class="icon icon-plane"></div>
          </div>
          <div class="segment-arrive">
            <div class="segment-info-title semibold">{{ onewayFlight.departure }}</div>
            <div class="segment-info-name g-text-overflow"></div>
            <div class="segment-info-date"><span class="time semibold">{{ onewayFlight.local_arrival_timestamp * 1000 | date:'hh:mm:ss': 'UTC'}} {{ onewayFlight.local_arrival_timestamp * 1000 | date:'a': 'UTC'}}</span> <span class="date">{{ onewayFlight.local_arrival_timestamp * 1000 | date:'yyyy-MM-dd': 'UTC'}}</span></div>
          </div>
          <div class="segment-duration">
            <div class="segment-info-title"> </div>
            <div class="segment-info-name g-text-overflow"><?php echo $_SESSION['TXTDATA']['DURATION'];?></div>
			
            <div class="segment-info-date semibold">{{onewayFlight.duration}}<?php echo $_SESSION['TXTDATA']['minutes'];?> </div>
          </div>
        </div>
      </div>
	     <div class="flight-stop clearfix">
        <div class="flight-stop-icon flight-wait-icon"></div>
        <!--if-->
        <div class="flight-layover-airport semibold left"><?php echo $_SESSION['TXTDATA']['Stop_at'];?> {{ onewayFlight.arrival }}</div>
        <!--if-->
        <div class="flight-duration semibold right">{{onewayFlight.duration}} <?php echo $_SESSION['TXTDATA']['minutes'];?></div>
      </div>
    </div>
  </div>
  </div>
  
  <div class="segment-container">
   <div class="direction-title"><?php echo $_SESSION['TXTDATA']['Return'];?></div>
  	<div class="segment-block"  ng-repeat="returnFlight in flightLists.returnFlights">
   
    <div class="segment-flights return flight-direct">
      <!--if-->
      <div class="flight-segment">
        <div class="airline-info clearfix">
          <div class="airline-logo-container left"><img class="airline-logo-image js-ticket-logo" width="32" height="32" alt="" src="http://pics.jetradar.com/al_square/32/32/{{returnFlight.operating_carrier}}@2x.png"></div>
          <div class="airline-details left"><span class="semibold">{{returnFlight.operating_carrier}}</span><span class="middot">·</span><span>{{returnFlight.operating_carrier}}-{{returnFlight.number}}</span>
            
            <!--if-->
          </div>
          <div class="airline-features right">
            <!--if-->
            <!--if-->
          </div>
        </div>
        <div class="segment-info">
          <div class="segment-depart">
            <div class="segment-info-title semibold">{{ returnFlight.departure }}</div>
            <div class="segment-info-name g-text-overflow"></div>
            <div class="segment-info-date"><span class="time semibold">{{ returnFlight.local_departure_timestamp * 1000 | date:'hh:mm:ss': 'UTC'}} {{ returnFlight.local_departure_timestamp * 1000 | date:'a': 'UTC'}}</span> <span class="date">{{ returnFlight.local_arrival_timestamp * 1000 | date:'yyyy-MM-dd': 'UTC'}}</span></div>
            <div class="icon icon-plane"></div>
          </div>
          <div class="segment-arrive">
            <div class="segment-info-title semibold">{{ returnFlight.arrival }}</div>
            <div class="segment-info-name g-text-overflow">Indira Gandhi International</div>
            <div class="segment-info-date"><span class="time semibold">{{ returnFlight.local_arrival_timestamp * 1000 | date:'hh:mm:ss' : 'UTC'}} {{ returnFlight.local_arrival_timestamp * 1000 | date:'a': 'UTC'}}</span> <span class="date">{{ returnFlight.local_arrival_timestamp * 1000 | date:'yyyy-MM-dd': 'UTC'}}</span></div>
          </div>
          <div class="segment-duration">
            <div class="segment-info-title"> </div>
            <div class="segment-info-name g-text-overflow"><?php echo $_SESSION['TXTDATA']['DURATION'];?></div>
            <div class="segment-info-date semibold">{{returnFlight.duration}} <?php echo $_SESSION['TXTDATA']['minutes'];?></div>
          </div>
        </div>
      </div>
	     <div class="flight-stop clearfix">
        <div class="flight-stop-icon flight-wait-icon"></div>
        <!--if-->
        <div class="flight-layover-airport semibold left"><?php echo $_SESSION['TXTDATA']['Stop_at'];?> {{ returnFlight.arrival }}</div>
        <!--if-->
        <div class="flight-duration semibold right">{{returnFlight.duration}}</div>
      </div>
    </div>
  </div>
</div>

</div>


</div>
</div>
			

			<!-- end new add div code -->

                  </div>
                </div>
				

<div ng-if="!flightLists.returnFlights">		
<div class="ticket-details flightDetailCls opened" id="flightDetail_{{ $index }}" rel="0" style="display:none;">
<div class="segment-block" ng-repeat="onewayFlight in flightLists.onewayFlights">
  <div class="segment-container">
  
    <div class="segment-flights depart flight-with-stops" id="infovisisble">
      <!--if-->
      <div class="flight-segment">
        <div class="airline-info clearfix">
          <div class="airline-logo-container left"><img class="airline-logo-image js-ticket-logo" src="http://pics.jetradar.com/al_square/32/32/{{onewayFlight.operating_carrier}}@2x.png" width="32" height="32" alt=""></div>
          <div class="airline-details left"><span class="semibold">{{ onewayFlight.operating_carrier }}</span><span class="middot">·</span><span>{{ onewayFlight.operating_carrier }}-{{ onewayFlight.number }}</span>
            <!--if-->
          </div>
          <div class="airline-features right">
            <!--if-->
            <!--if-->
			</div>
        </div>
        <div class="segment-info">
          <div class="segment-depart">
            <div class="segment-info-title semibold">{{ onewayFlight.departure }}</div>
            <div class="segment-info-name g-text-overflow">{{origon_airports.name}}</div>
            <div class="segment-info-date"><span class="time semibold">{{ onewayFlight.local_departure_timestamp * 1000 | date:'hh:mm:ss': 'UTC'}} {{ onewayFlight.local_departure_timestamp * 1000 | date:'a': 'UTC'}} </span> <span class="date date_dp">{{ onewayFlight.local_departure_timestamp * 1000 | date:'yyyy-MM-dd': 'UTC'}}</span></div>
            <div class="icon icon-plane"></div>
          </div>
          <div class="segment-arrive">
            <div class="segment-info-title semibold">{{ onewayFlight.arrival }}</div>
            <div class="segment-info-name g-text-overflow"></div>
            <div class="segment-info-date"><span class="time semibold">{{ onewayFlight.local_arrival_timestamp * 1000 | date:'hh:mm:ss': 'UTC'}} {{ onewayFlight.local_arrival_timestamp * 1000 | date:'a': 'UTC'}}</span> <span class="date">{{ onewayFlight.local_arrival_timestamp * 1000 | date:'yyyy-MM-dd': 'UTC'}}</span></div>
          </div>
          <div class="segment-duration">
            <div class="segment-info-title"> </div>
            <div class="segment-info-name g-text-overflow"><?php echo $_SESSION['TXTDATA']['DURATION'];?></div>
            <div class="segment-info-date semibold">{{onewayFlight.duration}}</div>
          </div>
        </div>
      </div>
      <div class="flight-stop clearfix">
        <div class="flight-stop-icon flight-wait-icon"></div>
        <!--if-->
        <div class="flight-layover-airport semibold left"><?php echo $_SESSION['TXTDATA']['Stop_at'];?>{{ onewayFlight.arrival }}</div>
        <!--if-->
        <div class="flight-duration semibold right">{{onewayFlight.duration}}</div>
      </div>
      <!--if-->
    
    </div>
  </div>
  
</div>
</div>	
</div>	

 			
              </div>
			  
			  <div class="flight-item23" ng-click="showInfo($index);"> <i class="fa fa-angle-down" aria-hidden="true"></i> 
			  </div>

			  <div class="showdiv_baggages" ng-show="showbaggageinfo">
				 <div class="baggages_1"  ng-repeat="(key, value) in flightLists.bagData">
		          <div class="add_key_value1"><h5>{{key}} :</h5> <span>{{value}}</span></div>
				</div>
				</div> 

            </div>
	
			
            </div>
            </li>
          </ul>
		 
		
	    <div class="srchList-pagingCntnr">
              <div class="srchList-pagingOuter"> <a id='first' ng-click="getDataforFlight(1)">«</a> <a id='prev'>‹</a>
                <ul id="myList" class="pagination">
                  <li ng-repeat="n in [] | range:( flightTotalfilter )" id="{{n}}" ng-click="getDataforFlight(n+1)">{{n+1}}</li>
                </ul>
                <a id='nDots'>...</a> 
				<a id='next'>›</a> 
				<a id='last' ng-click="getDataforFlight(flightTotalfilter)">»</a>
			 </div>
         </div>

		<input type="hidden" id="paggination" ng-model="paggination" value="{{paggination}}">
        </div>
      </div>
    </div>
  </div>
  <!--End Hotel Search Result-------->
 

  
</section>

<link rel="stylesheet" type="text/css" href="{{TemplateUrl}}/css/flight_results.css?var=<?php echo date('His');?>">


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="filter-opac"></div>
<script>

$('.close-filter,.filter-opac').click(function(){
	$('.width-set_results-left').removeClass('width-set_results-left-slider');
	$('.filter-opac').fadeOut();
	})
$('.filter-btn').click(function(){
	$('.width-set_results-left').addClass('width-set_results-left-slider');
	$('.filter-opac').fadeIn();
	})


$('.modify-btn').click(function(){
$('.horizontal-box').slideToggle();
})
	
	
</script>

<style>
.filter-opac{position:fixed;background:rgba(0,0,0,0.8);top:0;left:0;right:0;bottom:0;display:none;z-index: 21;}
</style>

<script>
/*
var affixElement = '#navbar-main';
$(affixElement).affix({
  offset: {
    // Distance of between element and top page
    top: function () {
      return (this.top = $(affixElement).offset().top)
    },
    // when start #footer 
    bottom: function () { 
      return (this.bottom = $('#footer').outerHeight(true)+100)
    }
  }
});
*/

</script>
