<style>

  .pet-groomsv-sercahbox{float: left;width: 45%;position:relative;margin-top:14px;}
.pet-groomsv-criteria{width: 30%;float:left;cursor:pointer;}
.pet-groomsv-criteria>span{height: 45px;display: inline-block;line-height: 45px;width: 100%;text-align: center;border:1px solid #ccc;border-right:0px;color:#333;font-size:15px;}
.pet-groomsv-criteria #categories {border-radius:0px;margin-left:0px;height:auto;max-height:500px;overflow:auto;position: absolute;top: 45px;left: 0px;border:0px;display:none;border:1px solid #ccc;border-top:0px;min-width: 40%;width: auto;z-index:999}


.pet-groomsv-criteria #categories::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.pet-groomsv-criteria #categories::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

.pet-groomsv-criteria #categories::-webkit-scrollbar-thumb
{
	background-color: #000000;
}



.pet-groomsv-criteria-open.pet-groomsv-criteria #categories{display:block;}
.pet-groomsv-criteria #categories li{background: #fff;padding: 12px;font-size:15px;list-style-type:none;float:left;clear:both;}
.pet_g_crt{    display: inline-block;
    width: 80%;
    float: left;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    padding-left: 10px;}
 
.pet-groomsv-criteria #categories li:hover{background:#eee;}
.pet-groomsv-criteria #categories li .dogIcon{padding-right: 9px;}
.pet-groomsv-criteria #categories li .opt{    position: relative;top: 4px;}
.pet-groomsv-criteria select{height: 41px;
    font-size: 15px;
    padding: 0px 0px 0px 8px;
    border-radius: 0px;
    color: #727272;
background: #E5E4E6;border:1px solid #ccc;border-right:0px;margin-bottom:0px;cursor:pointer;}
.pet-groomsv-sercahbox .input-group{width: 70%;float: left;}
.pet-groomsv-sercahbox .form-control{height: 41px;font-size: 13px;padding: 0px 0px 0px 8px;    border-radius: 0px;color: #727272;background: #fff;border-right:0px;}
.pet-groomsv-sercahbox .form-control#searchName{border: 1px solid #ccc;border-left: 0px;border-right: 0px;box-shadow: none;height:45px;line-height:45px;font-size:15px;padding-left:0px;}
.pet-groomsv-sercahbox .input-group-addon{background-color: #F47555;color: #fff;font-size: 14px;    border-radius: 0px;border:1px solid #aaa;border-radius:0px;}
.pet-groomsv-sercahbox #magnifying{cursor: pointer;background: none;border-left: 0px;border-right: 0px;color: #ccc;font-size: 20px;}
.star-ioncs14{position:relative;}


 .pac-logo::after{display:none !important; }
.pac-container .pac-item{z-index:999 !important;}
 .pac-container .pac-item{border-top: 1px solid #d9d9d9 !important;padding: 5px 10px !important;}
.pac-container .pac-icon-marker {display:none!important;}
.pac-matched {font-weight: 400; color: #777;}
 .pac-container .pac-item {border-top: 1px solid #d9d9d9 !important;padding: 5px 10px !important;font-size: 14px;font-weight: 400;}
.pac-item-query {font-size: 13px;padding-right: 3px;}

.err_searchName{
	position: absolute;
    top: 60px;
    left: 29%;
    height: 20px;
}

</style>


			<div class="pet-groomsv-sercahbox">
			    <div class="pet-groomsv-criteria">
			    
			    <?php
			    $cnt = 0;
$id = '';
			       foreach($results as $val) { 
			       if($cnt==0)
			       {
				       $serviceCategory = '<span class="opt">'. $val->title.'</span>';
                                       $id = $val->id; 
			       }
			       
			       $cnt++;
			       
			       }
			    ?>
		<input type="hidden" value="<?php echo $id;?>" id="sel_category">		
			 <span><span class="pet_g_crt"><?php echo $serviceCategory;?></span><span><i class="fa fa-angle-down" aria-hidden="true"></i></span></span>
				   
				   
				   <ul id="categories" class="form-control">
				  
				   <?php foreach($results as $val) { ?>
                       <li class="selected_category" value="<?php echo $val->id;?>"><span class="dogIcon"><img src="<?php echo get_template_directory_uri();?>/images/icons_pets.png"/></span><span class="opt"><?php echo $val->title;?></span></li>           
                   <?php } ?>
				   </ul>
				</div>
				
				
				<div class="input-group">
				
				  <?php if($_REQUEST['destName']!=''){ ?>
				  <span class="input-group-addon" id="magnifying"><i class="fa fa-search"></i></span>
				  <input type="text" name="searchName" id="searchName" class="form-control" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
				  <?php }  else {?>
				  <span class="input-group-addon" id="magnifying"><i class="fa fa-search"></i></span>
				  <input type="text" name="searchName" id="searchName" class="form-control" value="" placeholder="Discover and Unleash Happiness you cherish">
				  <?php } ?>
				  
				  <span class="input-group-addon city_search" id="basic-addon2" style="cursor: pointer;">Sniff</span>
				   				   
				</div>
				<span class="err_searchName"></span>
			
			</div>
			
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