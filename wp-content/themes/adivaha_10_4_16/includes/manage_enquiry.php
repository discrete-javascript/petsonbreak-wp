<?php session_start();
global $mk_options;
global $wpdb;
?>

<h5 class="recent_bookings">Your Services <span><a href="<?php echo site_url();?>/booking/?type=services&action=add">Add New</a></span></h5>
<p class="this_section_pro">
  This section provides information on your itinerary, trip details and booked tickets. ... used to make the booking and the system will show your recent bookings.	  
  </p>
<div class="table_background  booking-table-container" style="width:100%;">
<table class="booking_table" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr class="book-table-headings">
<td>&nbsp;</td>
<td>Title</td>
<td>Contact</td>			
<td>Address</td>
<td>Service Category</td>
<td>Service Offered </td>
<td>Timings (AM-PM)</td>
<td>Card Accepted</td>
<td>Available on call</td>
<td>Price</td>
<td>&nbsp;</td>
</tr>

<?php 
$resultss =$wpdb->get_results("select * from twc_vendor_services where vendor_id='".$_SESSION['userID']."'");
foreach($resultss as $results){ 
$full_address=$results->address.', '.$results->city.', '.$results->country.', '.$results->zipcode;

$timefromto=$results->time_from.' TO '.$results->time_to;
?>
	<tr>
	<td><img src="<?php echo get_template_directory_uri(); ?>/uploads/<?php echo $results->image_path; ?>" style="width:50px;height:50px;"></td>
	<td><?php echo $results->title; ?></td>
	<td><?php echo $results->contact; ?></td>
	<td><?php echo $full_address; ?></td>
	<td><?php echo getFieldByID('title','twc_service_category',$results->service_category); ?></td>
	<td><?php echo getFieldByID('title','twc_manage_offered',$results->service_offered); ?></td>
	<td><?php echo $timefromto; ?></td>
	<td><?php echo $results->payments; ?></td>
	<td><?php echo $results->on_call; ?></td>
	<td><?php echo $results->price; ?></a></td>
	
	<td><a href="<?php echo site_url(); ?>/booking/?type=services&action=edit&id=<?php echo $results->id; ?>">Edit</a> | <a href="<?php echo site_url(); ?>/booking/?type=services&action=delete&id=<?php echo $results->id; ?>">Delete</a></td>

  </tr>
<?php } ?>
</tbody></table>
</div>

 

<style>
#mng-services #postform .modalFields li label {
    float: left;
    width: 100%;
}

.payment-options{
	width: 100%;
	float: left;
	margin-bottom: 25px;
}



.modalFields li label {
    display: block;
    font-size: 16px;
    color: #777;
    font-weight: 300;
    font-style: italic;
    margin-bottom: 7px;
}
.modalFields li {
    float: left;
    width: 100%;
}
.modalFields li input, select,textarea {
    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 5px 5px 5px 9px;
    border-radius: 4px;
    border: 1px solid #777;
}
#mng-services .modalFields li input,select, textarea {
    float: right;
    width: 100%;
}



 #postform{}
 #postform .modalLogin-loginFields li label{float: left;width: 20%;}
 #postform .modalLogin-loginFields li input{float: right;width: 78%;}
 .Description-inputoo{width: 100%;float: left;}
 .Description-inputoo textarea{position: relative;
    width:100%;
    height: auto;
}

#mng-services #postform .payment-options > label{
	display: inline;
    width: 67px !important;
    margin-right: 10px;
    padding-left: 0px;
    }

#mng-services #postform .payment-options > label>span{
    display: inline-block;
    float: left;
    width: 50%;
}

#mng-services #postform .payment-options > label>input{
	display: inline-block;
    width: auto;
    height: auto;
    width: 50%;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px ;
}

#mng-services #postform #image_path{
 	border: 0px;
    padding-left: 0px;
	height: auto;	
}
.add-serv-row{
	margin-top: 20px;
    display: table;
}

.add-serv-row .col-md-6{
    display: table-cell;
}

.add-serv-row .col-md-6:first-child{
	border-right: 1px solid #ccc;
}



.recent_bookings{
	font-size: 31px !important;
    color: #333 !important;
    font-weight: 500 !important;
}

.recent_bookings span{
    font-weight: 600;
    color: #636 !important;
    position: relative;
    bottom: 3px;
}

.recent_bookings span a{
    font-size: 20px;
    color: #636;
    text-decoration: underline;
}

.upload_div{
	width: 40%;
    float: left;
}

.upld_img_div{
	width: 50%;
    float: left;
    max-height: 200px;
    background: #f3f3f3;
    text-align: center;
}

.upld_img_div img{
	width: 100%;
    height: 100%;
}

 </style>

