<?php
/**
 * @package Hotel 
 * @version 1.6
 */
/*
Plugin Name: Hotel in Wordpress
Plugin URI: http://www.xcubesolutions.com
Description: Hotels
Author: xcubesolutions
Version: 1.6
Author URI: http://www.xcubesolutions.com
*/


add_action( 'admin_menu', 'hotel_menu' );
add_action( 'admin_menu', 'hotel_submenu' );


if ( isset( $_POST["SAVECAT"] ) && $_POST["category"] != "") {
        $table = $wpdb->prefix."category";
        $category = strip_tags($_POST["category"], "");
  $post_id = strip_tags($_POST["post_id"], "");

        $wpdb->insert( 
            $table, 
            array( 
                'category' => $category,
				'post_id'=>$post_id
				
            )
        );
	$url = "?page=create_category";	
	
?>

<script>document.location.href = '?page=create_category';</script>
<?php	
    
    }
	
	if ( isset( $_POST["EDITCAT"] ) && $_POST["category"] != "") {
        $table = $wpdb->prefix."category";
        $category = strip_tags($_POST["category"], "");
        $post_id = strip_tags($_POST["post_id"], "");
		
		$hid = $_POST['hid'];

    global $wpdb;
$sql ="UPDATE `wp_category` SET `category` = '".$category."',`post_id` = '".$post_id."' WHERE  `id` = '".$hid."'";



$rez = $wpdb->query($sql);
	
?>

<script>document.location.href = '?page=view_category';</script>
<?php	
    
    }
	
	
if(isset($_POST['DELIMAGE']))	
{
	$id = $_POST['hidden_img'];
	
	$data = $wpdb->get_results("SELECT * FROM `wp_hotels_image` WHERE `id` = '$id'");
	
	$path = $data[0]->image;
	
	unlink(ABSPATH.'/'.$path);
	
	$exe  = $wpdb->get_results("DELETE  FROM `wp_hotels_image` WHERE `id` = '$id'");
    $hid = $_POST['hid'];	
	?>

<script>document.location.href = '?page=edit_hotel&id=<?php echo $hid;?>';</script>
<?php	
    
    
	
	
}
	
if ( isset( $_POST["SAVEHOTEL"] ) && $_POST["name"] != "") {



$image = $_FILES['image']['name']; 

$path = ABSPATH.'wp-content/uploads/hotel_uploads/'.$image;

$path1 = 'wp-content/uploads/hotel_uploads/'.$image;

move_uploaded_file($_FILES['image']['tmp_name'],$path);

$arr = array();

$arr['name'] = $_POST['name'];
$arr['category'] = $_POST['category'];
$arr['address'] = $_POST['address'];
$arr['check_in_time'] = $_POST['check_in_time'];
$arr['check_out_time'] = $_POST['check_out_time'];
$arr['price'] = $_POST['price'];
$arr['description'] = $_POST['description'];
$arr['pet_fee_charge'] = $_POST['pet_fee_charge'];
$arr['pets_allowed'] = $_POST['pets_allowed'];
$arr['extra_bed'] = $_POST['extra_bed'];
$arr['pets_unattended'] = $_POST['pets_unattended'];
$arr['clean_pet'] = $_POST['clean_pet'];
$arr['pet_menu'] = $_POST['pet_menu'];
$arr['vet_call'] = $_POST['vet_call'];
$arr['pet_open_spaces'] = $_POST['pet_open_spaces'];
$arr['pet_sitter'] = $_POST['pet_sitter'];
$arr['pet_pool'] = $_POST['pet_pool'];
$arr['property_has_pets'] = $_POST['property_has_pets'];
$arr['damage_to_property'] = $_POST['damage_to_property'];
$arr['check_in'] = $_POST['check_in'];
$arr['check_out'] = $_POST['check_out'];
$arr['cancellation'] = $_POST['cancellation'];
$arr['children'] = $_POST['children'];
$arr['other_policies'] = $_POST['other_policies'];
$arr['rooms'] = $_POST['rooms'];
$arr['distance_from_major_cities'] = $_POST['distance_from_major_cities'];
$arr['amenities'] = $_POST['amenities'];
$arr['things_to_do'] = $_POST['things_to_do'];
$arr['image'] = $path1;


$arr1 = array_keys($arr);

$arr2 = array_values($arr);

$cols = '';

foreach($arr1 as $key)
{
	
	$cols.="`".$key."`,";
}

$cols = chop($cols,",");


$vals = '';

foreach($arr2 as $key)
{
	
	$vals.="'".$key."',";
}

$vals = chop($vals,",");




$sql = "INSERT INTO `wp_hotels_list`(".$cols.")VALUES(".$vals.")";



$wpdb->query($sql);

$last_id = $wpdb->insert_id;


	
	
	
$slider = $_FILES['slider'];

$num = count($slider['name']);

for($i=0;$i<$num;$i++)
{
	

 
 $image = $slider['name'][$i];
$path = ABSPATH.'wp-content/uploads/hotel_uploads/'.$image;
$path1 = 'wp-content/uploads/hotel_uploads/'.$image;


move_uploaded_file($slider['tmp_name'][$i],$path);

   $wpdb->insert( 
            'wp_hotels_image', 
            array( 
                'image' => $path1,
				'hotel_id' => $last_id 
            )
        );

}
	
?>

<script>document.location.href = '?page=view_hotels';</script>
<?php	
}	


if ( isset( $_POST["UPDATEHOTEL"] ) && $_POST["name"] != "") {
$arr = array();
if($_FILES['image']['error']==0)
	{
	
$image = $_FILES['image']['name']; 

$path = ABSPATH.'wp-content/uploads/hotel_uploads/'.$image;

$path1 = 'wp-content/uploads/hotel_uploads/'.$image;

move_uploaded_file($_FILES['image']['tmp_name'],$path);
$arr['image'] = $path1;
}



$arr['name'] = $_POST['name'];
$arr['category'] = $_POST['category'];
$arr['address'] = $_POST['address'];
$arr['check_in_time'] = $_POST['check_in_time'];
$arr['check_out_time'] = $_POST['check_out_time'];
$arr['price'] = $_POST['price'];
$arr['description'] = $_POST['description'];
$arr['pet_fee_charge'] = $_POST['pet_fee_charge'];
$arr['pets_allowed'] = $_POST['pets_allowed'];
$arr['extra_bed'] = $_POST['extra_bed'];
$arr['pets_unattended'] = $_POST['pets_unattended'];
$arr['clean_pet'] = $_POST['clean_pet'];
$arr['pet_menu'] = $_POST['pet_menu'];
$arr['vet_call'] = $_POST['vet_call'];
$arr['pet_open_spaces'] = $_POST['pet_open_spaces'];
$arr['pet_sitter'] = $_POST['pet_sitter'];
$arr['pet_pool'] = $_POST['pet_pool'];
$arr['property_has_pets'] = $_POST['property_has_pets'];
$arr['damage_to_property'] = $_POST['damage_to_property'];
$arr['check_in'] = $_POST['check_in'];
$arr['check_out'] = $_POST['check_out'];
$arr['cancellation'] = $_POST['cancellation'];
$arr['children'] = $_POST['children'];
$arr['other_policies'] = $_POST['other_policies'];
$arr['rooms'] = $_POST['rooms'];
$arr['distance_from_major_cities'] = $_POST['distance_from_major_cities'];
$arr['amenities'] = $_POST['amenities'];
$arr['things_to_do'] = $_POST['things_to_do'];



$arr1 = array_keys($arr);

$arr2 = array_values($arr);

$cols = '';


$cnt = 0;

foreach($arr1 as $key)
{
	
	$vals = $arr2[$cnt]; 
	
	$cols.="`".$key."` = '".$vals."',";
	
	$cnt++;
}

$cols = chop($cols,",");




$id = $_POST['hid'];

$sql = "UPDATE `wp_hotels_list` SET ".$cols." WHERE `id` = '$id'";



$wpdb->query($sql);

$last_id = $id;


	
	
if($_FILES['slider']['error'][0]==0)
{	
$slider = $_FILES['slider'];

$num = count($slider['name']);

for($i=0;$i<$num;$i++)
{
	

 
 $image = $slider['name'][$i];
$path = ABSPATH.'wp-content/uploads/hotel_uploads/'.$image;
$path1 = 'wp-content/uploads/hotel_uploads/'.$image;


move_uploaded_file($slider['tmp_name'][$i],$path);

   $wpdb->insert( 
            'wp_hotels_image', 
            array( 
                'image' => $path1,
				'hotel_id' => $last_id 
            )
        );

}
}	
?>

<script>document.location.href = '?page=edit_hotel&id=<?php echo $_GET['id'];?>';</script>
<?php	
}	



	

function hotel_menu(){

    add_menu_page( 'hotel', 'createhotel', 4, 'customteam', 'create_hotels');


 

}

function hotel_submenu(){

   

add_submenu_page( 'customteam', 'Add Category', 'Add Category', 'manage_options', 'create_category', 'create_category' );
 add_submenu_page( 'customteam', 'View Category', 'View Category', 'manage_options', 'view_category', 'view_category' );
  add_submenu_page( 'customteam', 'Edit Category', 'Edit Category', 'manage_options', 'edit_category', 'edit_category' );
  add_submenu_page( 'customteam', 'Delete Category', 'Delete Category', 'manage_options', 'delete_category', 'delete_category' );
  
	add_submenu_page( 'customteam', 'Add Hotels', 'Add Hotels', 'manage_options', 'create_hotels', 'create_hotels' );
	 add_submenu_page( 'customteam', 'View Hotels', 'View Hotels', 'manage_options', 'view_hotels', 'view_hotels' );
	 add_submenu_page( 'customteam', 'Edit Hotels', 'Edit Hotels', 'manage_options', 'edit_hotel', 'edit_hotel' );
	 add_submenu_page( 'customteam', 'Delete Hotels', 'Delete Hotels', 'manage_options', 'delete_hotel', 'delete_hotel' ); 
}


function delete_hotel()
{
	
	$id = $_GET['id'];
	
 global $wpdb;
	
	$del = $wpdb->query("DELETE FROM `wp_hotels_list` WHERE `id` = '$id'");
	
	
	
	$images = $wpdb->get_results("SELECT * FROM `wp_hotels_image` WHERE `hotel_id` = '$id'");
	
	foreach($images as $key)
	{
		$path = $key->image;
		
	
		 unlink(ABSPATH."/".$path);

		$idx = $key->id;
		
		$wpdb->query("DELETE FROM `wp_hotels_image` WHERE `id` = '$idx'");
		
	}
	
		
?>

<script>document.location.href = '?page=view_hotels';</script>
<?php	

}

function delete_category()
{
	 global $wpdb;
	
	$id = $_GET['id'];
	
	$del = $wpdb->query("DELETE FROM `wp_category` WHERE `id` = '$id'");
	
	
		
?>

<script>document.location.href = '?page=view_category';</script>
<?php	


}



function view_hotels()
{
	
	global $wpdb;
	$hotel = $wpdb->get_results("select * from `wp_hotels_list`");
	

	
?>	
	
	
<table class="form-table" style="width:40%;margin-left:5%;">
    <tbody>
	<tr>
		<th>Sno</th>
		<th>category</th>
	    <th>Hotel Name</th>
	    <th>Edit</th>	
		 <th>Delete</th>	
		
		</tr>
		
	
	    <?php
		$cnt = 1;
		foreach($hotel as $key)
		{
			$id = $key->category;
	$category = $wpdb->get_results("select * from `wp_category` WHERE `id` = '$id'");
	
	

		?>
        <tr>
		<td><?php echo $cnt;?></td>
		<td><?php echo $category[0]->category;?></td>
		<td><?php echo $key->name;?></td>
		<td><a href="?page=edit_hotel&id=<?php echo $key->id;?>">Edit</a></td>
	   <td><a href="?page=delete_hotel&id=<?php echo $key->id;?>">Delete</a></td>
		</tr>
		
		<?php
		$cnt++;
		}
		
		?>
       
    </tbody>
</table>

	
<?php	
}

function view_category()
{
	
	global $wpdb;
	$category = $wpdb->get_results("select * from `wp_category`");
	
	
?>	
	
	
<table class="form-table" style="width:40%;margin-left:5%;">
    <tbody>
	<tr>
		<th>Sno</th>
		<th>category</th>
		<th>Post Name</th>
		 <th>Edit</th>	
		 <th>Delete</th>	
		</tr>
		
	
	    <?php
		$cnt = 1;
		foreach($category as $key)
		{
		 $post_id = $key->post_id;
		$query = new WP_Query( 'category_name=portfolio' );
$posts = $query->posts;

$post_name = '';

foreach($posts as $keyxx)
{
	
	
	if($keyxx->ID==$post_id)
	{
		
		$post_name = $keyxx->post_name;
	}
	
}

	?>
        <tr>
		<td><?php echo $cnt;?></td>
		<td><?php echo $key->category;?></td>
		<td><?php echo $post_name;?></td>
		<td><a href="?page=edit_category&id=<?php echo $key->id;?>">Edit</a></td>
	   <td><a href="?page=delete_category&id=<?php echo $key->id;?>">Delete</a></td>
		</tr>
		
		<?php
		$cnt++;
		}
		
		?>
       
    </tbody>
</table>

	
<?php	
}

function edit_category()
{
	
	
$id = $_GET['id'];
	
$query = new WP_Query( 'category_name=portfolio'  );



$posts = $query->posts;

	
global $wpdb;
$category = $wpdb->get_results("select * from `wp_category` WHERE `id` = '$id'");
	
$post_id  = $category[0]->post_id;

?>	
	
	<h3 style="margin-left:10px;">EDIT Category</h3>

<form action="" method="post" enctype="multipart/form-data">


<table class="form-table">
    <tbody>
	    <input type="hidden" name="hid" id="hid" value="<?php echo $category[0]->id;?>">
        <tr>
		<td><label style="font-weight:bold;">category:</label></td>
		<td><input type="text" name="category" id="category" value="<?php echo $category[0]->category;?>"></td>
		</tr>
        <tr>
		<td><label style="font-weight:bold;">POST NAME:</label></td>
		<td>
		<select name="post_id" id="post_id">
		<option value="">Please Select</option>
		<?php
		
		foreach($posts as $key)
		{
			if($key->ID==$post_id)
			{
		?>	
			<option value="<?php echo $key->ID;?>" selected="selected"><?php echo $key->post_name;?></option>	
			
	<?php	
            }
            else
			{
     ?>				
				
		<option value="<?php echo $key->ID;?>"><?php echo $key->post_name;?></option>
      <?php		
			}				
		}
		
		?>
		
		</select>
		</td>
		</tr>
       
    </tbody>
</table>

 <p class="submit"><input type="submit" value="Save Category" class="button-primary" name="EDITCAT"></p>
</form>
	
	
	
	
<?php	
}



function create_category()
{
	
$query = new WP_Query( 'category_name=portfolio'  );



$posts = $query->posts;


?>	
	
	<h3 style="margin-left:10px;">CREATE Category</h3>

<form action="" method="post" enctype="multipart/form-data">


<table class="form-table">
    <tbody>
	    
        <tr>
		<td><label style="font-weight:bold;">category:</label></td>
		<td><input type="text" name="category" id="category" value=""></td>
		</tr>
        <tr>
		<td><label style="font-weight:bold;">POST NAME:</label></td>
		<td>
		<select name="post_id" id="post_id">
		<option value="">Please Select</option>
		<?php
		
		foreach($posts as $key)
		{
		?>	
			<option value="<?php echo $key->ID;?>"><?php echo $key->post_name;?></option>	
			
	<?php		
		}
		
		?>
		
		</select>
		</td>
		</tr>
       
    </tbody>
</table>

 <p class="submit"><input type="submit" value="Save Category" class="button-primary" name="SAVECAT"></p>
</form>
	
	
	
	
<?php	
}


function my_custom_menu_page()
{
?>

<p class="submit"><a href="?page=create_hotels" class="button-primary" >Add Hotels</a>

<?php	
	
}


function edit_hotel()
{
	
	global $wpdb;
	$id = $_GET['id'];
	$data = $wpdb->get_results("select * from `wp_hotels_list` WHERE `id` = '$id'");
	
	
	$images = $wpdb->get_results("select * from `wp_hotels_image` WHERE `hotel_id` = '$id'");
?>

<h3 style="margin-left:10px;">EDIT HOTEL</h3>

<form action="" method="post" enctype="multipart/form-data">

<?php
	
	$category = $wpdb->get_results("select * from `wp_category`");
	
	?>

<table class="form-table">
    <tbody>
	    <tr>
		<td><label style="font-weight:bold;">Category:</label></td>
		<td>
		<select  name="category" style="width:360px;" required>
		<option value="">Please select</option>
	<?php
		
		foreach($category as $key)
		{
		  if($data[0]->category==$key->id)
		  {
	?>
		<option value="<?php echo $key->id;?>" selected="selected"><?php echo $key->category;?></option>

    <?php	
		  }
		  else
		  {
		?>
		
		<option value="<?php echo $key->id;?>"><?php echo $key->category;?></option>
		
		<?php
		
		  }
		}
		
		?>
		
		
		</select>
		</td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Name:</label></td>
		<td><input type="text" name="name" id="name" size="60" required value="<?php echo $data[0]->name;?>"></td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Address:</label></td>
		<td><textarea name="address" id="address" required rows="15" cols="50"><?php echo $data[0]->address;?></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Check-in Time:</label></td>
		<td><input type="text" name="check_in_time" id="check_in_time" value="<?php echo $data[0]->check_in_time;?>" size="60" required></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Check-out Time:</label></td>
		<td><input type="text" name="check_out_time" id="check_out_time" value="<?php echo $data[0]->check_out_time;?>" size="60"  required></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Price:</label></td>
		<td><textarea name="price" id="price" required rows="3" cols="50"><?php echo $data[0]->price;?></textarea></td>
		</tr>
		
		
        <tr>
		<td><label style="font-weight:bold;">Description:</label></td>
		<td><textarea name="description" id="description" required rows="15" cols="50"><?php echo $data[0]->description;?></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet fee Charge:</label></td>
		<td><input type="radio" name="pet_fee_charge" id="pet_fee_charge" value="yes" <?php if($data[0]->pet_fee_charge=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pet_fee_charge" id="pet_fee_charge" value="no" <?php if($data[0]->pet_fee_charge=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
        <tr>
		<td><label style="font-weight:bold;">Pets allowed in room:</label></td>
		<td><input type="radio" name="pets_allowed" id="pets_allowed" value="yes" <?php if($data[0]->pets_allowed=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pets_allowed" id="pets_allowed" value="no" <?php if($data[0]->pets_allowed=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Extra Bed on request:</label></td>
		<td><input type="radio" name="extra_bed" id="extra_bed" value="yes" <?php if($data[0]->extra_bed=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="extra_bed" id="extra_bed" value="no" <?php if($data[0]->extra_bed=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Pets should not be left unattended:</label></td>
		<td><input type="radio" name="pets_unattended" id="pets_unattended" value="yes" <?php if($data[0]->pets_unattended=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pets_unattended" id="pets_unattended" value="no" <?php if($data[0]->pets_unattended=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Clean behind your pet:</label></td>
		<td><input type="radio" name="clean_pet" id="clean_pet" value="yes" <?php if($data[0]->clean_pet=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="clean_pet" id="clean_pet" value="no" <?php if($data[0]->clean_pet=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet Menu / Food available:</label></td>
		<td><input type="radio" name="pet_menu" id="pet_menu" value="yes" <?php if($data[0]->pet_menu=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pet_menu" id="pet_menu" value="no" <?php if($data[0]->pet_menu=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Vet on Call:</label></td>
		<td><input type="radio" name="vet_call" id="vet_call" value="yes" <?php if($data[0]->vet_call=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="vet_call" id="vet_call" value="no" <?php if($data[0]->vet_call=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet friendly open spaces:</label></td>
		<td><input type="radio" name="pet_open_spaces" id="pet_open_spaces" value="yes" <?php if($data[0]->pet_open_spaces=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pet_open_spaces" id="pet_open_spaces" value="no" <?php if($data[0]->pet_open_spaces=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet Sitter on request:</label></td>
		<td><input type="radio" name="pet_sitter" id="pet_sitter" value="yes" <?php if($data[0]->pet_sitter=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pet_sitter" id="pet_sitter" value="no" <?php if($data[0]->pet_sitter=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		
			
		
			<tr>
		<td><label style="font-weight:bold;">Pet friendly pool:</label></td>
		<td><input type="radio" name="pet_pool" id="pet_pool" value="yes" <?php if($data[0]->pet_pool=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="pet_pool" id="pet_pool" value="no" <?php if($data[0]->pet_pool=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		
		
			<tr>
		<td><label style="font-weight:bold;">Property has pets of its own:</label></td>
		<td><input type="radio" name="property_has_pets" id="property_has_pets" value="yes" <?php if($data[0]->property_has_pets=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="property_has_pets" id="property_has_pets" value="no" <?php if($data[0]->property_has_pets=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		
		
			<tr>
		<td><label style="font-weight:bold;">Charge for damage to property:</label></td>
		<td><input type="radio" name="damage_to_property" id="damage_to_property" value="yes" <?php if($data[0]->damage_to_property=="yes"){echo 'checked="checked"';}?>>Yes<input style="margin-left:10px;" type="radio" name="damage_to_property" id="damage_to_property" value="no" <?php if($data[0]->damage_to_property=="no"){echo 'checked="checked"';}?>>No </td>
		</tr>
		
		 <tr>
		<td><label style="font-weight:bold;">Check-in:</label></td>
		<td><input type="text" name="check_in" id="check_in" size="60" value="<?php echo $data[0]->check_in;?>"></td>
		</tr>
		
	 <tr>
		<td><label style="font-weight:bold;">Check-out:</label></td>
		<td><input type="text" name="check_out" id="check_out" size="60" value="<?php echo $data[0]->check_out;?>"></td>
		</tr>
		
	  <tr>
		<td><label style="font-weight:bold;">Cancellation / prepayment:</label></td>
		<td><textarea name="cancellation" id="cancellation" required rows="15" cols="50"><?php echo $data[0]->cancellation;?></textarea></td>
		</tr>	
		
  <tr>
		<td><label style="font-weight:bold;">Children and Extra Beds:</label></td>
		<td><textarea name="children" id="children" required rows="15" cols="50"><?php echo $data[0]->children;?></textarea></td>
		</tr>	
		
		  <tr>
		<td><label style="font-weight:bold;">Other Policies:</label></td>
		<td><textarea name="other_policies" id="other_policies" required rows="15" cols="50"><?php echo $data[0]->other_policies;?></textarea></td>
		</tr>	
		
	
	
	
		
		
		
		 <tr>
		<td><label style="font-weight:bold;">Facilities Available :</label></td>
		<td><textarea name="rooms" id="rooms" required rows="15" cols="50"><?php echo $data[0]->rooms;?></textarea></td>
		</tr>
			<tr>
		<td><label style="font-weight:bold;">Distance from Major Cities:</label></td>
		<td><textarea name="distance_from_major_cities" id="distance_from_major_cities" required rows="15" cols="50"><?php echo $data[0]->distance_from_major_cities;?></textarea></td>
		</tr>
		
		<tr>
		<td><label style="font-weight:bold;">Amenities:</label></td>
		<td><textarea name="amenities" id="amenities" required rows="15" cols="50"><?php echo $data[0]->amenities;?></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Things to Do:</label></td>
		<td><textarea name="things_to_do" id="things_to_do" required rows="15" cols="50"><?php echo $data[0]->things_to_do;?></textarea></td>
		</tr>
		
		 <tr>
		<td><label style="font-weight:bold;">Background Image:</label></td>
		<td><img src="<?php echo site_url();?>/<?php echo $data[0]->image;?>" height="150" width="320"><input name="image" type="file" id="image" /></td>
		</tr>
		 <tr>
		<td><label style="font-weight:bold;">Slider Image:(width:800px : height:450px)</label></td>
		<td><input name="slider[]" type="file" id="slider" multiple /></td>
		</tr>
		
	
		
    </tbody>
</table>

 <p class="submit"><input type="hidden" name="hid" id="hid"  value="<?php echo $_GET['id'];?>"><input type="submit" value="Update Hotel" class="button-primary" name="UPDATEHOTEL"></p>
</form>


	<?php
		$cnt = 1;
		foreach($images as $key)
		{
		?>
	
		 <tr>
	<td>	<form action="" method="POST"><img src="<?php echo site_url();?>/<?php echo $key->image;?>" style="height:450px;width:800px;"><input type="hidden" name="hidden_img" id="hidden_img" size="60" value="<?php echo $key->id;?>"><input type="hidden" name="hid" id="hid"  value="<?php echo $_GET['id'];?>">
	
	
	</td>
		<td><input type="submit" name="DELIMAGE" id="DELIMAGE" value="DELIMAGE">	</form></td>
		</tr>

		<?php
		$cnt++;
		}
		
		?>


<?php	
	
}

function create_hotels()
{
?>
<h3 style="margin-left:10px;">CREATE HOTELS</h3>

<form action="" method="post" enctype="multipart/form-data">

<?php
	global $wpdb;
	$category = $wpdb->get_results("select * from `wp_category`");
	
	?>

<table class="form-table">
    <tbody>
	    <tr>
		<td><label style="font-weight:bold;">Category:</label></td>
		<td>
		<select  name="category" style="width:360px;" required>
		<option value="">Please select</option>
	<?php
		
		foreach($category as $key)
		{
		
		?>
		
		<option value="<?php echo $key->id;?>"><?php echo $key->category;?></option>
		
		<?php
		}
		
		?>
		
		
		</select>
		</td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Name:</label></td>
		<td><input type="text" name="name" id="name" size="60" required></td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Address:</label></td>
		<td><textarea name="address" id="address" required rows="15" cols="50"></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Check-in Time:</label></td>
		<td><input type="text" name="check_in_time" id="check_in_time" size="60" required></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Check-out Time:</label></td>
		<td><input type="text" name="check_out_time" id="check_out_time" size="60"  required></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Price:</label></td>
		<td><textarea name="price" id="price" required rows="3" cols="50"></textarea></td>
		</tr>
		
		
        <tr>
		<td><label style="font-weight:bold;">Description:</label></td>
		<td><textarea name="description" id="description" required rows="15" cols="50"></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet fee Charge:</label></td>
		<td><input type="radio" name="pet_fee_charge" id="pet_fee_charge" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pet_fee_charge" id="pet_fee_charge" value="no">No </td>
		</tr>
        <tr>
		<td><label style="font-weight:bold;">Pets allowed in room:</label></td>
		<td><input type="radio" name="pets_allowed" id="pets_allowed" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pets_allowed" id="pets_allowed" value="no">No </td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Extra Bed on request:</label></td>
		<td><input type="radio" name="extra_bed" id="extra_bed" value="yes">Yes<input style="margin-left:10px;" type="radio" name="extra_bed" id="extra_bed" value="no">No </td>
		</tr>
		  <tr>
		<td><label style="font-weight:bold;">Pets should not be left unattended:</label></td>
		<td><input type="radio" name="pets_unattended" id="pets_unattended" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pets_unattended" id="pets_unattended" value="no">No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Clean behind your pet:</label></td>
		<td><input type="radio" name="clean_pet" id="clean_pet" value="yes">Yes<input style="margin-left:10px;" type="radio" name="clean_pet" id="clean_pet" value="no">No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet Menu / Food available:</label></td>
		<td><input type="radio" name="pet_menu" id="pet_menu" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pet_menu" id="pet_menu" value="no">No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Vet on Call:</label></td>
		<td><input type="radio" name="vet_call" id="vet_call" value="yes">Yes<input style="margin-left:10px;" type="radio" name="vet_call" id="vet_call" value="no">No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet friendly open spaces:</label></td>
		<td><input type="radio" name="pet_open_spaces" id="pet_open_spaces" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pet_open_spaces" id="pet_open_spaces" value="no">No </td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Pet Sitter on request:</label></td>
		<td><input type="radio" name="pet_sitter" id="pet_sitter" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pet_sitter" id="pet_sitter" value="no">No </td>
		</tr>
		
			
		
			<tr>
		<td><label style="font-weight:bold;">Pet friendly pool:</label></td>
		<td><input type="radio" name="pet_pool" id="pet_pool" value="yes">Yes<input style="margin-left:10px;" type="radio" name="pet_pool" id="pet_pool" value="no">No </td>
		</tr>
		
		
			<tr>
		<td><label style="font-weight:bold;">Property has pets of its own:</label></td>
		<td><input type="radio" name="property_has_pets" id="property_has_pets" value="yes">Yes<input style="margin-left:10px;" type="radio" name="property_has_pets" id="property_has_pets" value="no">No </td>
		</tr>
		
		
			<tr>
		<td><label style="font-weight:bold;">Charge for damage to property:</label></td>
		<td><input type="radio" name="damage_to_property" id="damage_to_property" value="yes">Yes<input style="margin-left:10px;" type="radio" name="damage_to_property" id="damage_to_property" value="no">No </td>
		</tr>
		
		 <tr>
		<td><label style="font-weight:bold;">Check-in:</label></td>
		<td><input type="text" name="check_in" id="check_in" size="60"></td>
		</tr>
		
	 <tr>
		<td><label style="font-weight:bold;">Check-out:</label></td>
		<td><input type="text" name="check_out" id="check_out" size="60"></td>
		</tr>
		
	  <tr>
		<td><label style="font-weight:bold;">Cancellation / prepayment:</label></td>
		<td><textarea name="cancellation" id="cancellation" required rows="15" cols="50"></textarea></td>
		</tr>	
		
  <tr>
		<td><label style="font-weight:bold;">Children and Extra Beds:</label></td>
		<td><textarea name="children" id="children" required rows="15" cols="50"></textarea></td>
		</tr>	
		
		  <tr>
		<td><label style="font-weight:bold;">Other Policies:</label></td>
		<td><textarea name="other_policies" id="other_policies" required rows="15" cols="50"></textarea></td>
		</tr>	
		
	
	
	
		
		
		
		 <tr>
		<td><label style="font-weight:bold;">Facilities Available :</label></td>
		<td><textarea name="rooms" id="rooms" required rows="15" cols="50"></textarea></td>
		</tr>
			<tr>
		<td><label style="font-weight:bold;">Distance from Major Cities:</label></td>
		<td><textarea name="distance_from_major_cities" id="distance_from_major_cities" required rows="15" cols="50"></textarea></td>
		</tr>
		
		<tr>
		<td><label style="font-weight:bold;">Amenities:</label></td>
		<td><textarea name="amenities" id="amenities" required rows="15" cols="50"></textarea></td>
		</tr>
		<tr>
		<td><label style="font-weight:bold;">Things to Do:</label></td>
		<td><textarea name="things_to_do" id="things_to_do" required rows="15" cols="50"></textarea></td>
		</tr>
		
		 <tr>
		<td><label style="font-weight:bold;">Background Image:</label></td>
		<td><input name="image" type="file" id="image" /></td>
		</tr>
		 <tr>
		<td><label style="font-weight:bold;">Slider Image:</label></td>
		<td><input name="slider[]" type="file" id="slider" multiple /></td>
		</tr>
		
		
    </tbody>
</table>

 <p class="submit"><input type="submit" value="Save Hotel" class="button-primary" name="SAVEHOTEL"></p>
</form>
<?php	
	
}



?>
