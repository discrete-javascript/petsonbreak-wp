<?php 
/**
 Template Name: Favourite Page
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
global $wpdb;
$page_id =get_the_ID(); 
$content = get_post_field('post_content', $page_id);
$feature_image_arr =wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/shortcode.css?var=<?php echo rand();?>">

<div class="main_Container" ng-controller="Hotel_Controller">
  <div class="Hotel_Div" >
    <div class="manage-dest-banner" id="myCarousel" style="background:url(<?php echo $feature_image_arr[0];?>);  height: 300px;background-repeat: no-repeat;background-size: cover;">
		<!--
		<div class="carousel-caption">
				<h3 class="ng-binding"><?php echo $lResult->title;?></h3>
				<p class="ng-binding"><?php echo $lResult->description;?></p>
		</div>-->

		<div class="carousel-caption">
				<h3 class="ng-binding">Favourite Hotels</h3>
				<p class="ng-binding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
		</div>
	</div>
    <!-- new code add hotellook-->
    <!--  ues this class popup  .popuptrue  -->
    <div class="search_Form horizontal-box">
	<div id="exTab1" >	
	  <div class="div_clol">	
			<ul  class="nav nav-pills">
			 <li class="tabbss tab_1 active" ng-click="selectType(1);"><a  href="#home/?tab=hotel" data-toggle="tab"><i class="fa fa-bed" ></i><?php _e('Hotel','adivaha');?> </a></li>
			<li class="tabbss tab_0"><a ng-click="selectType(0);" href="#home/?tab=flight" data-toggle="tab"><i class="fa fa-plane"></i><?php _e('Flight','adivaha');?></a></li>
			<li class="tabbss tab_4" ng-click="selectType(4);"><a href="#home/?tab=holiday" data-toggle="tab"><i class="fa fa-umbrella"></i><?php _e('Holiday','adivaha');?> </a></li>
			<li class="tabbss tab_3" ng-click="selectType(3)"><a href="#home/?tab=resort" data-toggle="tab"><i class="fa fa-home"></i><?php _e('Resort','adivaha');?></a></li>
			<li class="tabbss tab_5" ng-click="selectType(5)"><a href="#home/?tab=bedbreakfast" data-toggle="tab"><i class="fa fa-coffee"></i><?php _e('Bed & breakfast','adivaha');?></a></li>		
		 </ul>
			 
		<div class="tab-content clearfix">
			<div class="tab-pane active" id="tab-hotel">
				<div class="searchbox" style="position: relative;">
					<form method="get" name="search_form" class="favourite-searchbox">
					  <ul>
						<li>
						  <input type="text" id="desti" ng-model="desti" placeholder="City, Hotel or place name"  ng-change="getLocation_Hint($viewValue)"   />
						  <input type="hidden" ng-model="lat" id="latitude" />
						  <input type="hidden" ng-model="lon" id="longitude" />
						  <input type="hidden" ng-model="datatype"/>
						  <input type="hidden" id="hotelType" name="hotelType" value="1"/>
						  
						  <i class="fa fa-map-marker popup" aria-hidden="true"></i>
						  <div class="popup showhidepopup{{showpopup}}">
							<div class="show-autocomplete-popup">
							  <h6><?php _e('Cities','adivaha');?></h6>
							  <a class="autocomplete-dropdown" ng-repeat="city_destinations in city_destinations track by $index" ng-click="Update_Search_Field(city_destinations.location.lat, city_destinations.location.lon, city_destinations.latinFullName, 'location')">{{ city_destinations.latinFullName }} </a>
							
							</div>
						  </div>
						</li>
						<li  class="input-daterange" data-date-format="M d, D">
						  <div class="datepicker-background-div">
							<input type="text" placeholder="Check In" name="start" id="checkIn" />
							<i class="fa fa-calendar" aria-hidden="true"></i> </div>
						  <div class="datepicker-background-div">
							<input type="text"placeholder="Check Out"  name="end" id="checkOut" />
							<i class="fa fa-calendar" aria-hidden="true"></i> </div>
						</li>
						<li>
						  <div class="adults-12">
						   
							<input type="text" name="Cri_Rooms" id="Cri_Rooms" rel="0" value="{{ Totaladults }} Adults in {{ rooms }} Room">
							<i class="fa fa-male" aria-hidden="true"></i> </div>
						</li>
						<li>
						  <input class="btn-hack button" id="findbestrate" type="button" value="Search" ng-click="Search_Destinations();" >
						</li>
					  </ul>
					  <div class="children-age roomgroupdata hidnumberofrooms">
						<div class="room_text1" style="color:#000">
						  <div class="nomar"><?php _e('Rooms','adivaha');?></div>
						  <div class="nomar"><?php _e('Adults','adivaha');?></div>
						  <div class=" nomar"><?php _e('Children','adivaha');?></div>
						  
						</div>
						<div class="how_noofRooms" >
						  <div class="nomar">
						  <a ng-click="changeRooms('minus');"><i class="fa fa-minus" aria-hidden="true"></i> </a> 
						   <a>{{count}}</a> <a ng-click="changeRooms('plus');"><i class="fa fa-plus" aria-hidden="true"></i> </a>
						   
						   <input type="hidden" class="form-control" name="Cri_noofRooms" id="Cri_noofRooms" value="{{count}}">
						  
						   </div>
						   <div id="packListdiv" >&nbsp;</div>
						</div> 
						 <div class="be-ddn-footer">
							<a href="javascript:void(0)" class="done" ng-click="hideRoomGroup();">Done</a> 
						 </div>
						 
					</div>
				</form>
			</div>
		</div>
		<div class="tab-pane" id="tab-flight">
		 <div class="searchbox flight-search-box">
					<form method="get" name="search_form">
					  <ul>
						<li>
						  <input type="text" ng-model="desti" placeholder="City, Hotel or place name"  ng-change="getLocation_Hint($viewValue)"/>
						  <input type="hidden" ng-model="lat"/>
						  <input type="hidden" ng-model="lon"/>
						  <input type="hidden" ng-model="datatype"/>
						  <i class="fa fa-map-marker popup" aria-hidden="true"></i>
						  <div class="popup showhidepopup{{showpopup}}">
							<div class="show-autocomplete-popup">
							  <h6><?php _e('Cities','adivaha');?></h6>
							  <a class="autocomplete-dropdown" ng-repeat="city_destinations in city_destinations track by $index" ng-click="Update_Search_Field(city_destinations.location.lat, city_destinations.location.lon, city_destinations.latinFullName, 'location')">{{ city_destinations.latinFullName }} </a>
							
							</div>
						  </div>
						</li>
						
						<li>
							  <input ng-model="flight_to_desti" placeholder="Mumbai" ng-change="getLocation_Hint($viewValue)" class="ng-pristine ng-untouched ng-valid ng-empty" aria-invalid="false" type="text">
							  <input ng-model="flight_to_locationId" class="ng-pristine ng-untouched ng-valid ng-empty" aria-invalid="false" type="hidden">
							  <input ng-model="flight_to_datatype" class="ng-pristine ng-untouched ng-valid ng-empty" aria-invalid="false" type="hidden">
							  <i class="fa fa-map-marker popup" aria-hidden="true"></i>
							  <div class="popup showhidepopupfalse">
								<div class="show-autocomplete-popup">
								  <h6><?php _e('Cities','adivaha');?></h6>
								  <!-- ngRepeat: city_destinations in city_destinations track by $index -->
								  <h6 class="hotels-2"><?php _e('Hotels','adivaha');?></h6>
								  <!-- ngRepeat: hotel_destinations in hotel_destinations track by $index --> </div>
							  </div>
							</li>
						
						
						
						
						
						
						<li class="input-daterange" data-date-format="M d, D">
							  <div class="datepicker-background-div"> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(true)"><i class="fa fa-long-arrow-right rxchange-room-3"></i></a> <a href="javascript:void(0);" ng-click="Show_OneWay_Round(false)"><i class="fa fa-exchange rxchange-room-3"></i></a> </div>
							  <div class="datepicker-background-div">
								<input placeholder="Check In" name="flight_to_start" id="flight_to_checkIn" type="text">
								<i class="fa fa-calendar" aria-hidden="true"></i> </div>
							  <div class="datepicker-background-div">
								<input placeholder="Check Out" name="flight_to_end" id="flight_to_checkOut" ng-disabled="showhidecheckout" type="text">
								<i class="fa fa-calendar" aria-hidden="true"></i> </div>
							</li>
							
						<li>
						  <div class="adults-12">
							<select name="adults" id="adults">
							  <option value="1"><?php _e('1 Adult in 1 Room','adivaha');?></option>
							  <option value="2" selected="selected"><?php _e('2 Adults in 1 Room','adivaha');?></option>
							  <option value="3"><?php _e('More Options...','adivaha');?></option>
							</select>
							<i class="fa fa-male" aria-hidden="true"></i> </div>
						</li>
						<li>
						  <input class="btn-hack button" type="button" value="Search" ng-click="Search_Destinations();" >
						</li>
					  </ul>
					  <div class="children-age noofrooms hidnumberofrooms">
							<div ng-repeat="datum in data" class="width-set-room">
							  <div class="room-add-age">
									<p><?php _e('Room 1','adivaha');?></p>
								 <ul>
							   <li>
									<label class="pax-title"><p><?php _e('Adults','adivaha');?></p><span><?php _e('Above 12 years','adivaha');?></span></label>
									<div class="pules-min"> 
									<a ng-click="count = count - 1" ng-init="count=1"> <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> 
									<a ng-click="count = count+1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
								  </li>
								  <li>
									<label class="pax-title"><?php _e('Children','adivaha');?><span><?php _e('Below 12 years','adivaha');?></span></label>
									<div class="pules-min"> 
									<a ng-click="removeColumn($index)"> <i class="fa fa-minus" aria-hidden="true"></i> </a> 
									<a>{{count}}</a> 
									<a ng-click="addColumn()"> <i class="fa fa-plus" aria-hidden="true"></i> </a> 
									</div>
								  </li>
								</ul>
							  </div>
							  <div class="age-children-3" >
								<ul>
								<span class="pax-title" style="width: 100%;margin: 10px 7px;float: left;"><?php _e('Age(s) of Children','adivaha');?></span>
								  <li ng-repeat="field in datum">
									<div class="pules-min"> <a ng-click="count = count - 1"> <i class="fa fa-minus" aria-hidden="true"></i> </a> <a>{{count}}</a> <a  ng-click="count = count+1" ng-init="count=1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
								  </li>
								</ul>
							  </div>
							</div>
						 
						 <div class="claer_div">
						<div class="add-btn-room"> <a value="+Row" ng-click="addRow()"/><?php _e('Add Room','adivaha');?></a> </div>
						 <div class="remove-btn-room"> <a data-ng-click="removeRow($index)"><?php _e('Remove this room','adivaha');?> </a> </div>
						 </div>
							<div class="be-ddn-footer">
								<a href="#" class="done"><?php _e('Done','adivaha');?></a> 
							</div>
					</div>
				</form>
			</div>
	</div>

	</div>
	</div>
</div>
	
</div>

<div class="container-fluid   text-align-center ad-class-1 home-section1">
	<?php
	 $currDate =date('Y-m-d');
	 $checkIn =date('m-d-Y',strtotime($currDate.'+10 days'));
	 $checkOut =date('m-d-Y',strtotime($currDate.'+11 days'));
	 $desti_lat_lon =$lResult->latitude.'-'.$lResult->longitude;
	?>
	
	<div class="container cat_tabcls catg_active" id="dealsOffers">
		 <div class="main_title">
			<h2 class="block-title">Favourite Hotels</h2>
			<div class="block-text"><?php echo $content;?></div>
		 </div>
		 <div  class="row">
			<?php 
			$results =$wpdb->get_results("select * from favourite where user_id='".$userID."'");
			foreach($results as $obj){
				$link =site_url().'/#/hotel-information/'.$obj->EANHotelID.'/?fn=hotelInfo&checkIn='.$checkIn.'&checkOut='.$checkOut.'&language=en-US&currency=USD&hotelType=1&rooms=1&adults=2&childs=0&childAge=';
				$discount =(($obj->highRate-$obj->LowRate)*100)/($obj->highRate);
				$discount =number_format($discount,1);
				?>
		     <div class="col-md-4">
			 <div class="man-col">
			    <div class="man-top-Img">
				<?php if($discount>0){?>
				  <div class="deal-strip">
				     Save <?php echo  $discount;?>%
				  </div>
				<?php }?>
				  <a href="<?php echo $link;?>" target="_blank"><img alt="" src="http://images.trvl-media.com/<?php echo str_replace("_t","_b",$obj->thumbNailUrl);?>"/></a>
				  	<div class="man-hot-price">
				  <?php if($obj->highRate>$obj->LowRate) {?>	
				  <span class="stkThru-deal">$<?php echo $obj->highRate;?></span><span class="actual-price">$<?php echo $obj->LowRate;?></span>
				  <?php } else{?>
				   <span class="stkThru-deal"><span class="actual-price">$<?php echo $obj->LowRate;?></span>
				  <?php }?>
				</div>
				</div>
				<div class="man-bot">
				<div class="man-hot-name"> <a href="<?php echo $link;?>" target="_blank"><?php echo $obj->Name;?></a></div>
			
				<div class="rat-botm">
				<div class="man-rating-container">
				  <span class="man-rating man-rating-<?php echo $obj->hotelRating;?>"></span>
				</div>
				<div class="man-book-container">
					 <span class="man-bookBtn"><a href="<?php echo $link;?>">Book Now</a></span>
				</div>
				</div>
				</div>
			</div>
			</div>
		 <?php } ?>
		 </div>
	</div>
	
	
</div>



  </div>
</div>
<?php get_footer(); ?>

<script>
 function bindDestData(){
	$('#desti').val('<?php echo $lResult->destination_name;?>');
	$('#latitude').val('<?php echo $lResult->latitude;?>');
	$('#longitude').val('<?php echo $lResult->longitude;?>');
 }
 setTimeout(function(){ bindDestData() }, 1000);

</script>
 
<!-- Share This Script -->
 
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "32cba1f3-4784-46f7-ad7e-544238e66485", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<!-- Destination Category Tabs -->

<script type="text/javascript">
	$(document).ready(function() {
	$('.cat_tabcls').css("display","none");
	$('.catg_active').css("display","block");
    $(".tab").click(function(){
		var rel = $(this).attr('rel');
		$('.cat_tabcls').fadeOut();
		$('#' + rel).fadeIn();
	$('.tab').removeClass('categorieActive');
        $(this).addClass('categorieActive');
    });  
  });
</script>
