<?php 
/**
 Template Name: HOTELxx DETAILS
 
 */
get_header();

global $wpdb;


$id = $_GET['id'];

$data = $wpdb->get_results("SELECT * FROM `wp_hotels_list` WHERE `id` = '$id'");

if(isset($_POST["MAILDETAILS"])) {
	
	echo '<pre>';
print_r($_POST);
echo '</pre>';
die();

}

?>







  <div class="row" style="background:#fff;min-height:800px;height:auto;">
    <div class="col-sm-9" style="border:2px solid #F47555;margin-left:30px;margin-top:20px;">
        <img src="<?php echo site_url()."/".$data[0]->image;?>" style="height:320px;width:900px;margin-top:30px;margin-bottom:10px;">
		<br>
		<h1 style="color:#F47555;"><?php echo $data[0]->name;?></h1>
		<br>
		<p style="font-size:13px;"><?php echo $data[0]->address;?></p><br><br>
		
	<?php echo $data[0]->description;?>	<br><br>

Check-in Time : <?php echo $data[0]->check_in_time;?>	<br><br>

Check-out Time : <?php echo $data[0]->check_out_time;?>	<br><br>

<p style="text-align:center;font-weight:bold;"><?php echo $data[0]->price;?></p>

<div class="row">
<div class="col-sm-4">
<h3>Facilities Available </h3>
<?php echo $data[0]->rooms;?>

</div>

<div class="col-sm-4">
<h3>Distance from Major Cities</h3>
<?php echo $data[0]->distance_from_major_cities;?>

</div>

<div class="col-sm-4">
<h3>Things To Do </h3>
<?php echo $data[0]->things_to_do;?>

</div>
</div>

<div class="row">
<div class="col-sm-4">
<h3>Amenities </h3>
<?php echo $data[0]->amenities;?>

</div>

<div class="col-sm-4">
<h3>Pet Policy </h3>
<?php 
$str1 = 'pet_fee_charge';
$str = 'pet_fee_charge'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pet_fee_charge;
echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'pets_allowed';
$str = 'pets_allowed'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pets_allowed;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>
<?php 
$str1 = 'extra_bed';
$str = 'extra_bed'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->extra_bed;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'pets_unattended';
$str = 'pets_unattended'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pets_unattended;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'clean_pet';
$str = 'clean_pet'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->clean_pet;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'pet_menu';
$str = 'pet_menu'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pet_menu;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'vet_call';
$str = 'vet_call'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->vet_call;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>
<?php 
$str1 = 'pet_open_spaces';
$str = 'pet_open_spaces'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pet_open_spaces;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'pet_sitter';
$str = 'pet_sitter'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pet_sitter;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'pet_pool';
$str = 'pet_pool'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->pet_pool;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>
<?php 
$str1 = 'property_has_pets';
$str = 'property_has_pets'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->property_has_pets;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br>';
?>

<?php 
$str1 = 'damage_to_property';
$str = 'damage_to_property'; 
$str = str_replace("_"," ",$str);
$str = ucfirst($str);

$value = $data[0]->damage_to_property;

echo '<span style="font-weight:bold;">'.$str.'</span> : '.$value.'<br><br><br>';
?>



</div>

<div class="col-sm-4">
<?php echo "<span style='font-weight:bold;'>Cancellation :</span> ".$data[0]->cancellation."<br><br>";?>

<?php echo "<span style='font-weight:bold;'>Children :</span> ".$data[0]->children."<br><br>";?>

<?php echo "<span style='font-weight:bold;'>Other Policies : </span>".$data[0]->other_policies."<br><br>";?>

</div>


</div>
	
 <?php

$id = $_GET['id'];

$data = $wpdb->get_results("SELECT * FROM `wp_hotels_image` WHERE `hotel_id` = '$id'");





?>

<style>
.carousel-inner
{
	
	height:450px;
}
</style>

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:96%;margin-left:20px;margin-top:50px;margin-bottom:50px;">
<ol class="carousel-indicators">
	
	<?php
	
	$cnt=0;
	foreach($data as $key)
	{
		
		if($cnt==0)
		{
	?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $cnt;?>" class="active"></li>
	 <?php

		}
		else
		{
	?>

     <li data-target="#myCarousel" data-slide-to="<?php echo $cnt;?>"></li>
  



<?php	
			
			
		}
		$cnt++;
	}
?>	 
	  
 
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<?php
	
	$cnt=1;
	foreach($data as $key)
	{
		
		if($cnt==1)
		{
	?>
	
	
      <div class="item active">
        <img src="<?php echo site_url().'/'.$key->image;?>" alt="Los Angeles" style="width:100%;height:450px;">
      </div>
  <?php 
		}
		else
		{
	?>		
	<div class="item ">
        <img src="<?php echo site_url().'/'.$key->image;?>" alt="Los Angeles" style="width:100%;height:450px;">
      </div>	

    <?php		
		}
		$cnt++;
	}
  ?>
     
    </div>

 <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>  
  </div>

  
  <div class="row" style="padding:12px;background:#F47555;height:1120px;margin:10px;">
  <h1 style="margin-left:10px;"> Im Interested </h1>
  
<form action="" id="mail_form" method="POST">
  <div class="row" style="padding:10px;background:lightgrey;margin:10px;">
  <div class="form-group">
      <label for="name">Your Name *:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="conact_no">Contact No *:</label>
      <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact Number" name="contact_no">
    </div>
	
	<div class="form-group">
      <label for="email">Email *:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
	
	
		
	<div class="form-group">
      <label for="subject">Subject *:</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject">
    </div>
		
	<div class="form-group">
      <label for="subject">No of Adults*:</label>
      <input type="text" class="form-control" id="no_of_adults" placeholder="Enter No of Adults" name="no_of_adults">
    </div>
	
		
	<div class="form-group">
      <label for="subject"> No of Child ( 2 - 11 Yrs )*:</label>
      <input type="text" class="form-control" id="no_of_child" placeholder="Enter No of Child" name="no_of_child">
    </div>
	
		
	<div class="form-group">
      <label for="subject">Pet Type | Breed | No of Pet *:</label>
      <input type="text" class="form-control" id="pet_type" placeholder="Enter Pet Type" name="pet_type">
    </div>

 	<div class="form-group">
      <label for="subject"> Check In Date *:</label>
      <input type="text" class="form-control" id="check_in_date" placeholder="Enter Check In Date" name="check_in_date">
    </div>
  <div class="form-group">
      <label for="subject">  Check out Date *:</label>
      <input type="text" class="form-control" id="check_out_date" placeholder="Enter Check out Date" name="check_out_date">
    </div>
 
  <div class="form-group">
      <label for="subject">  Message*:</label>
      <textarea class="form-control" id="message" rows="6" name="message"></textarea>
    </div>
  
  
    <button type="button" name="MAILDETAILS" id="MAILDETAILS" style="background:#F47555;border:1px solid #F47555;" class="btn btn-default">Mail Details</button>
	
	</form>
  </div>
</div>
</div>
   
     <div class="col-sm-2" style="border:2px solid #F47555;margin-left:22px;margin-top:20px;">
      <h3>MAP</h3>        

    </div>
  </div>















<?php get_footer();?>

<script>
 $('#MAILDETAILS').click(function(){
	  var frmdata =$('#mail_form').serialize();
	  
		 $.ajax({
			 type: "POST",
			 url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
			 data: "action=mail_details&"+frmdata,
			 success: function(Data){
			    
				  
			  }
		 })
 });	

 
</script>