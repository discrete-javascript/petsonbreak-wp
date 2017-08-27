<?php
session_start();
include('../../../wp-load.php');
global $wpdb;
$action =$_REQUEST['action'];
$admin_email = get_bloginfo( 'admin_email' );
$admin_title = get_bloginfo( 'name' );

if($action=='Location_Fetch'){
	
	$URLs_Fetch='http://yasen.hotellook.com/autocomplete?lang=en-US&limit=5&term='.$_REQUEST['term'];
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$URLs_Fetch);
	curl_setopt($ch,CURLOPT_ENCODING,'gzip');  // Needed by API
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$contents = curl_exec($ch);
	curl_close ($ch);
	$jsondata =json_decode($contents, true );
	$items =$jsondata['cities'];
	$data =array();
	foreach($items as $item){
	 $data[] =array('label'=>$item['fullname'],'category'=>'cities','class_Name'=>'', 'search_type'=>'regionid', 'regionid'=>$item['id'], 'lat'=>$item['location']['lat'], 'long'=>$item['location']['lon']);
	}
	echo json_encode($data);
	
}
if($_REQUEST['action']=='hotelFilter'){
    $q =trim(strtolower($_REQUEST['q'])); 
    $Sqls = "select EANHotelID,Name from search_results_ean where search_session='".trim($_REQUEST['search_id'])."' and LCASE(Name) Like '%".$q."%' and currency='".$_REQUEST['currency']."' limit 0, 10" ; 
    $resutls = $wpdb->get_results($Sqls);
	if(count($resutls)>0){
		foreach($resutls as $Objs){
		   $data[]=array('EANHotelID'=>$Objs->EANHotelID,'Name'=>$Objs->Name);
		}
    $Data=json_encode($data);
	}else{
	 $Data='';	
	}	
   echo $Data;
}

if($_REQUEST['action']=='makeFavourate'){
	$relType =$_REQUEST['relType'];
	$c_results =$wpdb->get_results("select * from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	if((count($c_results)==0) && ($relType=='favourate')){
		$results =$wpdb->get_results("select * from search_results_ean where EANHotelID='".$_REQUEST['hotelID']."' limit 1");
		$Objss=$results[0];
		$wpdb->query("insert into favourite set EANHotelID='".$Objss->EANHotelID."', Name='".addslashes($Objss->Name)."', Address1='".$Objss->address1."', Address2='', City='".$Objss->city."', Country='".$Objss->countryCode."', StarRating='".$Objss->hotelRating."', LowRate='".$Objss->lowRate."', highRate='".$Objss->highRate."',discount='".$Objss->discount_price."',latitude='".$Objss->latitude."',longitude='".$Objss->longitude."',guestRating='".$Objss->confidenceRating."', promoDescription='".$Objss->promoDescription."',thumbNailUrl='".$Objss->thumbNailUrl."',user_id='".$_REQUEST['userID']."'");
       $flag=1;		
	}
	else if((count($c_results)>0) && ($relType=='unfavourate')){
	  $wpdb->query("delete from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	   $flag=1;		
	}
	else{
		$flag=0;
	}
	echo $flag;
}

if($_REQUEST['action']=='checkFavourate'){
	$c_results =$wpdb->get_results("select * from favourite where EANHotelID='".$_REQUEST['hotelID']."' and user_id='".$_REQUEST['userID']."'");
	if(count($c_results)>0){$flag=1;}
	else{$flag=0;}
	echo $flag;
}

if($_REQUEST['action']=='changeCountry'){
	$countryCode =trim($_REQUEST['countryCode']);
	$stateLists =array('US'=>array('AL'=>'Alabama',
	                              'AK'=>'Alaska',
								  'AS'=>'American Samoa',
								  'AZ'=>'Arizona',
								  'AR'=>'Arkansas',
								  'AA'=>'Armed Forces Americas excluding Canada',
								  'AE'=>'Armed Forces EMEA and Canada',
								  'AP'=>'Armed Forces Pacific',
								  'CA'=>'California',
								  'CO'=>'Colorado',
								  'CT'=>'Connecticut',
								  'DE'=>'Delaware',
								  'DC'=>'District of Columbia',
								  'FM'=>'Federated States of Micronesia',
								  'FL'=>'Florida',
								  'GA'=>'Georgia',
								  'GU'=>'Guam',
								  'HI'=>'Hawaii',
								  'ID'=>'Idaho',
								  'IL'=>'Illinois',
								  'IN'=>'Indiana',
								  'IA'=>'Iowa',
								  'KS'=>'Kansas',
								  'KY'=>'Kentucky',
								  'LA'=>'Louisiana',
								  'ME'=>'Maine',
								  'MH'=>'Marshall Islands',
								  'MD'=>'Maryland',
								  'MA'=>'Massachusetts',
								  'MI'=>'Michigan',
								  'MN'=>'Minnesota',
								  'MS'=>'Mississippi',
								  'MO'=>'Missouri',
								  'MT'=>'Montana',
								  'NE'=>'Nebraska',
								  'NV'=>'Nevada',
								  'NH'=>'New Hampshire',
								  'NJ'=>'New Jersey',
								  'NM'=>'New Mexico',
								  'NY'=>'New York',
								  'NC'=>'North Carolina',
								  'ND'=>'North Dakota',
								  'MP'=>'Northern Mariana Islands',
								  'OH'=>'Ohio',
								  'OK'=>'Oklahoma',
								  'OR'=>'Oregon',
								  'PA'=>'Pennsylvania',
								  'PR'=>'Puerto Rico',
								  'RI'=>'Rhode Island',
								  'SC'=>'South Carolina',
								  'SD'=>'South Dakota',
								  'TN'=>'Tennessee',
								  'TX'=>'Texas',
								  'UT'=>'Utah',
								  'VT'=>'Vermont',
								  'VI'=>'Virgin Islands',
								  'VA'=>'Virginia',
								  'WA'=>'Washington',
								  'WV'=>'West Virginia',
								  'WI'=>'Wisconsin',
								  'WY'=>'Wyoming'),
	      'AU'=>array('AC'=>'Australian Capital',
					   'NW'=>'New South Wales',
					   'NO'=>'Northern Territory',
					   'QL'=>'Queensland',
					   'SA'=>'South Australia',
					   'TS'=>'Tasmania',
					   'VC'=>'Victoria',
					   'WT'=>'Western Australia'
					   )
	 
	       
	);
	
	 $selectedState =$stateLists[$countryCode];
	 $html='';
	 if($countryCode=='US' || $countryCode=='AU'){
		 foreach($selectedState as $k=>$val){
			$html.='<option value="'.$k.'">'.$val.'</option>';
		  }	
	 }
	 echo $html;
}

//Vendor Registration

if($_REQUEST['action']=='VendorRegistration'){
   global $wpdb;
		    $flag=0;
			$id               =rand();
 		    $user_login        =$_REQUEST["email"];
			$user_passowrd     =$_REQUEST["password"];
			$email             =$_REQUEST["email"];
			$first_name        =$_REQUEST["firstname"];
			$last_name         =$_REQUEST["last_name"];
			$address           =$_REQUEST["address"];
			$phone             =$_REQUEST["phone"];		
            $city              =$_REQUEST["city"];			
            $country           =$_REQUEST["country"];
            $state             =$_REQUEST["state"];			
            $service           =$_REQUEST["service"];			
           // $skype_id          =$_REQUEST["skype_id"];			
            $establishment     =$_REQUEST["establishment"];			
            $establishment_since =$_REQUEST["establishment_since"];			

			$display_name =$first_name.' '.$last_name;
			$user_nicename =$first_name.' '.$last_name;
			
			$Results = $wpdb->get_results("select * from wp_users where user_email='".$email."'");
			
			if(count($Results)>0){
			 $flag=0; 	
				
			}
			
			else{
			
			$SQL_user = "insert into ".$wpdb->prefix."users set user_login='".$user_login."', user_nicename='".$user_nicename."', user_email='".$email."', user_registered='".date("Y-m-d H:i:s")."', user_activation_key='', user_status='1', display_name='".$display_name."'"; 
		    //console($SQL_user);
			$wpdb->query($SQL_user);
		    $SQL_ID = "select ID from ".$wpdb->prefix."users where user_email='".$email."'";
			
			$Results = $wpdb->get_results($SQL_ID);
			$Result =$Results[0];
			$ID = $Result->ID;
			wp_set_password($user_passowrd, $ID );

			$user_meta_array =array('first_name'=>$first_name,
								'lastname'=>$last_name,
								'nickname'=>$user_nicename,
								'phone'=>$phone,
								'address'=>$address,
								'city'=>$city,
							    'country'=>$country,
								'state'=>$state,
							    'service_category'=>$service,
							    'email'=>$email,
							    'establishment_since'=>$establishment_since,
							    'establishment'=>$establishment,
								'rich_editing'=>'true',
								'comment_shortcuts'=>'false',
								'admin_color'=>'fresh',
								'use_ssl'=>0,
								'show_admin_bar_front'=>'true',
								'locale'=>'',
								'wp_capabilities'=>'a:1:{s:6:"Vendor";b:1;}',
								'wp_user_level'=>0,
								'dismissed_wp_pointers'=>''
							   ); 
					   
			foreach($user_meta_array as $key=>$value)
			{
				$sql="insert into ".$wpdb->prefix."usermeta SET user_id='".$ID."',meta_key='".$key."',meta_value='".$value."'";
				$wpdb->query($sql);
			} 
			
	if($ID!=''){
		$flag=0;   
			$to = $_REQUEST["email"];
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers  .= "From: support@petsonbreak.com" . "\r\n";

			$pmail_subject ='Confirmation';
			$pmailBody ='<table cellpadding="2" cellspacing="2">
			<p>Welcome and thank you for registering at Petsonbreak.com!</p>
			<tr>
			<td>
			Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL:
            </td>
			<td>
           <a href="'.site_url().'/thank-you/?action=activation&id='.$ID.'">'.site_url().'/thank-you/?action=activation&id='.$ID.'</a>
            </td>
			</tr> 
		
			<tr><td>Thanks,</td></tr>
			<tr><td>Team PetsonBreak</td></tr>
			</table>';
		      mail($to,$pmail_subject,$pmailBody,$headers);

	 }
	$flag=1;
	
}
	echo $flag;		
}



if($_REQUEST['action']=='ChangePassword')
{
	global $wpdb;
	global $current_user;
	get_currentuserinfo();
	$ID =$current_user->ID;
	$user_pass =$current_user->user_pass;
	$currentpass = $_REQUEST["currentPw"];
	$newpass     = $_REQUEST["newPw"];
	$ID          = $current_user->ID;
	
	
	if ((wp_check_password($currentpass, $user_pass)) == 1) {
		//echo "YES, Matched";
		wp_set_password($newpass, $ID );
		$SQL_user = "UPDATE wp_users set user_pass=MD5('".$newpass."') WHERE ID='".$ID."'";
		$wpdb->query($SQL_user);
		echo 1;
	} else {
		echo 0;
	}
}

if($_REQUEST['action']=='forgotPassword'){
    global $wpdb;
$flag=0;
	$email =$_REQUEST['email'];

	$sSql = "SELECT * FROM wp_users where user_email= '".$email."' ";	
	$Results = $wpdb->get_results($sSql);
	$Result = $Results[0];
	$ID = $Result->ID;
    $user_password =rand();
	wp_set_password($user_password, $ID );
	
	$user_email = $Result->user_email;
    $user_password = $Result->user_pass;
    $title = $Result->user_login;	
    $find_arr =array('{Email Address}','{Password}');
	$replace_arr = array($title, $user_password);
    $subject="Reset Password";
    $mail_body = str_replace($find_arr, $replace_arr,$subject);

	if(count($Results) > 0){

	$headers = 'From: support@petsonbreak.com'."\r\nContent-type: text/html; charset=us scii";
   $html=$user_password;
	 mail($email,$subject,$html,$headers);
	$flag=1;

	}	
echo $flag;
die;
}

if($_REQUEST['action']=='accountUpdate'){
$user_ID=$_SESSION['userID'];
	global $wpdb;
		$flag=0;
		$first_name        =$_REQUEST["firstname"];
		$last_name         =$_REQUEST["last_name"];
		$address           =$_REQUEST["address"];
		$phone             =$_REQUEST["phone"];		
		$email             =$_REQUEST["email"];		
		$city              =$_REQUEST["city"];	
        $state             =$_REQUEST["state"];			
		$country           =$_REQUEST["country"];	
		$establishment     =$_REQUEST["establishment"];			
		$establishment_since =$_REQUEST["establishment_since"];	
		//$skype_id           =$_REQUEST["skype_id"];				
		$facebook_url      =$_REQUEST["facebook_url"];			
		$twitter_url       =$_REQUEST["twitter_url"];			
		$youtube_url       =$_REQUEST["twitter_url"];			
		$skype_url       =$_REQUEST["skype_url"];			

		$display_name =$first_name.' '.$last_name;
		$user_nicename =$first_name.' '.$last_name;
		
		$SQL_user = "Update ".$wpdb->prefix."users set user_nicename='".$user_nicename."',display_name='".$display_name."' where ID='".$user_ID."'"; 
		$wpdb->query($SQL_user);
		$user_meta_array =array('first_name'=>$first_name,
							'lastname'=>$last_name,
							'nickname'=>$user_nicename,
							'phone'=>$phone,
							'city'=>$city,
							'state'=>$state,
							'address'=>$address,
							'country'=>$country,
							'establishment_since'=>$establishment_since,
							'establishment'=>$establishment,
							'skype_url'=>$skype_url,
							'facebook_url'=>$facebook_url,
							'twitter_url'=>$twitter_url,
							'youtube_url'=>$youtube_url
						   ); 
				   
	foreach($user_meta_array as $key=>$value){
	update_user_meta( $user_ID, $key, $value); 
	} 
	$flag=1;
	echo $flag;	
	
	
}
if($_REQUEST['action']=='MemberRegistration'){
    global $wpdb;
    $flag=0;
	$user_login        =$_REQUEST["member_email"];
	$user_passowrd     =$_REQUEST["member_password"];
	$email             =$_REQUEST["member_email"];
	$first_name        =$_REQUEST["member_firstname"];
	$last_name         =$_REQUEST["member_last_name"];
	$address           =$_REQUEST["member_address"];
	$phone             =$_REQUEST["member_phone"];		
	$city              =$_REQUEST["member_city"];			
	$dob               =$_REQUEST["member_dob"];	
	$own_pets          =$_REQUEST["own_pets"];	
	$gender            =$_REQUEST["gender"];	
	$state             =$_REQUEST["member_state"];
	$country           =$_REQUEST["member_country"];	
	$member_citizenship=$_REQUEST["member_citizenship"];	
	$intrested_area    =$_REQUEST["intrested_area"];
	$additional_info    =$_REQUEST["additional_info"];
	

	/*
	$Pets              =$_REQUEST["pets"];	
	$spayed            =$_REQUEST["spayed"];			
	$pedigreed         =$_REQUEST["pedigreed"];	
	$gender            =$_REQUEST["gender"];	
	$country           =$_REQUEST["citizenship"];	

	$pet_name_arr =$_REQUEST["pet_name"];
	$pet_age_arr =$_REQUEST["pet_age"];
	$pet_bread_arr =$_REQUEST["pet_bread"];
	$pet_gender_arr =$_REQUEST["pet_gender"];
	$pet_pedigreed_arr =$_REQUEST["pedigreed"];
	$pet_spayed_arr =$_REQUEST["spayed"];
	*/
	/*
	if(($Pets=='Dogs') || ($Pets=='Cats') || ($Pets=='Horse') ){
		$countPet =count($pet_name_arr);
		for($i=0; $i< $countPet; $i++ ){
			$petDetail[] =array('name'=>$pet_name_arr[$i],'age'=>$pet_age_arr[$i],'bread'=>$pet_bread_arr[$i],'gender'=>$pet_gender_arr[$i],'pedigreed'=>$pet_pedigreed_arr[$i],'spayed'=>$pet_spayed_arr[$i]);
		 }
	 $petDetail_json=json_encode($petDetail);	
		
	}
	else{
		$petDetail_json =$_REQUEST["info"];	
	}*/
	
	$petDetail_json =json_encode($_REQUEST['petData']);

	
	$display_name =$first_name.' '.$last_name;
	$user_nicename =$first_name.' '.$last_name;
		
	
	$Results = $wpdb->get_results("select * from wp_users where user_email='".$email."'");

	if(count($Results)>0){
	 $flag=0; 	
	}
	else{
	$SQL_user = "insert into ".$wpdb->prefix."users set user_login='".$user_login."', user_nicename='".$user_nicename."', user_email='".$email."', user_registered='".date("Y-m-d H:i:s")."', user_activation_key='', user_status='1', display_name='".$display_name."'"; 
	//console($SQL_user);
	$wpdb->query($SQL_user);
	$SQL_ID = "select ID from ".$wpdb->prefix."users where user_email='".$email."'";
	
	$Results = $wpdb->get_results($SQL_ID);
	$Result =$Results[0];
	$ID = $Result->ID;
	
	//echo $ID;die();
	wp_set_password($user_passowrd, $ID );
	
	//$SQL_pet_detail = "insert into twc_pet_detail set user_id='".$ID."',title='".$Pets."',pet_detail='".$petDetail_json."'"; 
	//$wpdb->query($SQL_pet_detail);  

	$user_meta_array =array('first_name'=>$first_name,
						'lastname'=>$last_name,
						'nickname'=>$user_nicename,
						'phone'=>$phone,
						'gender'=>$gender,
						'address'=>$address,
						'city'=>$city,
						'state'=>$state,
						'country'=>$country,
						'member_citizenship'=>$member_citizenship,
						'dob'=>$dob,
						'own_pets'=>$own_pets,
						//'spayed'=>$spayed,
						//'pedigreed'=>$pedigreed,
						'pet_details'=>$petDetail_json,
						
						'intrested_area' =>$intrested_area,
						'additional_info' =>$additional_info,
						'rich_editing'=>'true',
						'comment_shortcuts'=>'false',
						'admin_color'=>'fresh',
						'use_ssl'=>0,
						'show_admin_bar_front'=>'true',
						'wp_capabilities'=>'a:1:{s:10:"subscriber";b:1;}',
						'wp_user_level'=>0,
						'dismissed_wp_pointers'=>'wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_the me_link,wp350_media'
					   );

	foreach($user_meta_array as $key=>$value)
	{
		$sql="insert into ".$wpdb->prefix."usermeta SET user_id='".$ID."',meta_key='".$key."',meta_value='".$value."'";
		$wpdb->query($sql);
	} 
	 if($ID!=''){
		$flag=0;   
			$to = $_REQUEST["member_email"];
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers  .= "From: support@petsonbreak.com" . "\r\n";

			$pmail_subject ='Confirmation';
			$pmailBody ='<table cellpadding="2" cellspacing="2">
			<p>Welcome and thank you for registering at Petsonbreak.com!</p>
			<tr>
			<td>
			You can activate your account by clicking on the following link or copy paste the same in URL locator : <a href="http://twc5.com/clients/petsonbreak/thank-you/?action=activation&id='.$ID.'">http://twc5.com/clients/petsonbreak/thank-you/?action=activation&id='.$ID.'</a>
            </td>
			</tr> 
			  <tr>
			  <td>Upon logging in, you will be able to access other services including reviewing past orders, printing invoices and editing your account information.</td>
			</tr>
			<tr><td>Thanks,</td></tr>
			<tr><td>Team PetsonBreak</td></tr>
			</table>';
			mail($to,$pmail_subject,$pmailBody,$headers);

	 } 
	$flag=1;
  } 
	echo $flag;		
}



if($_REQUEST['action']=='AddReview'){
	$flag=0;
	$sql ="Insert into twc_review SET id='".uniqid()."', title='".$_REQUEST['user_name']."', email='".$_REQUEST['user_email']."',user_id='".$_REQUEST['user_id']."',rating='".$_REQUEST['rating']."',product_id='".$_REQUEST['product_id']."',message='".$_REQUEST['message']."',published='Yes', date_time='".date('Y-m-d H:i:s')."'";
	$wpdb->query($sql);
	
	$reviewResults =$wpdb->get_results("SELECT count(*) as totalreview, SUM(rating) as total_rating FROM twc_review where product_id='".$_REQUEST['product_id']."' and published='Yes'");
	$reviewResult =$reviewResults[0];
	$totalreview =$reviewResult->totalreview;
	$total_rating =$reviewResult->total_rating;
	
	$averageReview =ceil($total_rating/$totalreview);
	
	$wpdb->query("update twc_vendor_services SET avg_rating='".$averageReview."' where  id='".$_REQUEST['product_id']."'");
	
    $flag=1;
	echo $flag;
}

if($_REQUEST['action']=='searchVendorServices'){
	$extQuery ='';
	if($_REQUEST['sid']!=''){
		$extQuery.=" and service_category='".$_REQUEST['sid']."'";
	}
	if($_REQUEST['destName']!=''){
		//$extQuery.=" and city='".$_REQUEST['destName']."'";
		$extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'";
	}

	$limit=4;
	if(@$_REQUEST['p']<=1){
		$start=0;
	} else {
		$start=($_REQUEST['p']-1)*$limit;
	}

	$extrCond ='';
	if($_REQUEST['rating']!=''){
		$extrCond.=" and avg_rating='".$_REQUEST['rating']."'";
	}
	if($_REQUEST['Cri_Price']!=''){
		$Cri_Price =explode("-",$_REQUEST['Cri_Price']);
		$extrCond.=" and price BETWEEN ".$Cri_Price[0]." AND ".$Cri_Price[1];
	}
	$rowcount = $wpdb->get_var("select count(*) from twc_vendor_services where 1 ".$extQuery." ".$extrCond);
	$sql ="select * from twc_vendor_services where 1 ".$extQuery." ".$extrCond." LIMIT $start,$limit";
	$resuts = $wpdb->get_results($sql);

	$data =array();
	foreach($resuts as $obj){

		$userData =get_userdata($obj->vendor_id);
		$userMetaData =get_user_meta($obj->vendor_id);
		$establishment_since =$userMetaData['establishment_since'][0];
		$owner_name =$userMetaData['nickname'][0];
		$establishment =$userMetaData['establishment'][0];

		$offerd='';
		$service_offered =explode(",",$obj->service_offered);
		$service_offered_count=count($service_offered);
		for($i=0; $i < $service_offered_count; $i++){
			$offerdName = getFieldByID('title','twc_manage_offered',$service_offered[$i]);
			$offerd.=$offerdName.',';
		}
		$offerd =substr($offerd,0,-1);

		$data[] =array('total_records' => $rowcount,'id'=>$obj->id,'vendor_id'=>$obj->vendor_id,'title'=>$establishment,'description'=>$obj->description,'contact'=>$obj->contact,'address'=>$obj->address,'zipcode'=>$obj->zipcode,'city'=>$obj->city,'country'=>$obj->country,'time_from'=>$obj->time_from,'time_to'=>$obj->time_to,'card_accepted'=>$obj->card_accepted,'on_call'=>$obj->on_call,'service_category'=>$obj->service_category,'service_offered'=>$offerd,'price'=>$obj->price,'image_path'=>$obj->image_path,'latitude'=>$obj->latitude,'longitude'=>$obj->longitude,'establishment_since'=>$establishment_since,'event_name'=>$obj->event_name,'avg_rating'=>round($obj->avg_rating));
	}
	/* echo"<pre>";
	print_r($resuts);die; */

	echo json_encode($data);
}
if($_REQUEST['action']=='pagingList'){
	$extQuery ='';
	if($_REQUEST['sid']!=''){
	 $extQuery.=" and service_category='".$_REQUEST['sid']."'";
	}
	if($_REQUEST['destName']!=''){
	 //$extQuery.=" and city='".$_REQUEST['destName']."'";
     //$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
     $extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'";
	}

	if($_REQUEST['p']<=1){
		$p=1;
	} else {
		$p = $_REQUEST['p'];
	}

	$extrCond ='';
	if($_REQUEST['rating']!=''){
		$extrCond.=" and avg_rating='".$_REQUEST['rating']."'";
	}
	if($_REQUEST['Cri_Price']!=''){
		$Cri_Price =explode("-",$_REQUEST['Cri_Price']);
		$extrCond.=" and price BETWEEN ".$Cri_Price[0]." AND ".$Cri_Price[1];
	}
	$sql ="select * from twc_vendor_services where 1 ".$extQuery." ".$extrCond." ";
	$resuts = $wpdb->get_results($sql);
	/* echo"<pre>";
	print_r($resuts); */

	$limit=4;
	$num_of_products =count($resuts);
    $num_of_pages=ceil($num_of_products/$limit);
	$html='';
	if($num_of_pages > 1){
		$html='<ul class="pagination">
			   <li><a href="#">&laquo;</a></li>';
		     for($i=1;$i<=$num_of_pages;$i++){
				if($i==$p){
					$active ='active';
				} else{
					$active='';
				}
		        $html.='<li class="nextPage '.$active.'" id="nextPage_'.$i.'" rel="'.$i.'"><a href="javascript:void(0);">'.$i.'</a></li>';
			  }
	   $html.='<li><a href="#">&raquo;</a></li>
		</ul>';
	}
	echo $html;
}
if($_REQUEST['action']=='deleteImage'){
global $wpdb;
$flag=0;
$img_delete=$_REQUEST['img_delete'];
$attr=$_REQUEST['attr'];
if($img_delete!=''){
	$sql ="Delete from  twc_member_gallery where user_id='".$_SESSION['userID']."' and id='".$img_delete."'";
	$resuts = $wpdb->get_results($sql);
	
	  unlink('http://twc5.com/clients/petsonbreak/wp-content/themes/adivaha/images/pets/thumbs/"'.$attr.'"');

	$flag=1;
}
	echo $flag;
	
}

if($_REQUEST['action']=='UserFeedback'){
	global $wpdb;
	
	$Results = $wpdb->get_results("select * from twc_feedback where email='".$_REQUEST['email_id']."'");
			
			if(count($Results)>0){
			 $flag=0; 					
			}
			else{
 if($_REQUEST["email_id"]!=''){

	  $sql ="Insert into twc_feedback SET id='".uniqid()."', title='feedback', email='".$_REQUEST['email_id']."',rating='".$_REQUEST['scale_rate']."',feedback_type='".$_REQUEST['feedtype']."',message='".$_REQUEST['feedback_area']."',published='Yes', date_time='".date('Y-m-d H:i:s')."'";
	  $wpdb->query($sql);
	 
	 
            $to = $_REQUEST["email_id"];
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers  .= 'From: support@petsonbreak.com' . "\r\n";

			$pmail_subject ='User Feedback';
			$pmailBody ='<table cellpadding="2" cellspacing="2">
			<p>Feedback from '.$_REQUEST['email_id'].' </p>
			<tr>
			<td>
			scale_rate:'.$_REQUEST['scale_rate'].'
            </td>
			</tr>
			
			<tr>
			<td>
			Type:'.$_REQUEST['feedtype'].'
            </td>
			</tr>
			
			<tr>
			<td>
			Feedback:'.$_REQUEST['feedback_area'].'
            </td>
			</tr>
			
			<tr>
			<td>
			User Email:'.$_REQUEST['email_id'].'
            </td>
			</tr>
			 
			  
			</table>';
			mail($to,$pmail_subject,$pmailBody,$headers);
			$flag=1;
 }
			}
echo $flag;
}


//Vendor Login
if($_REQUEST['action']=='VendorLogin'){
  global $wpdb;
    $creds = array();
	$creds['user_login'] = trim($_REQUEST['user_login']);
	$creds['user_password'] = trim($_REQUEST['user_password']);
	$creds['remember'] = false;
	
	$redirectUrl =$_REQUEST['redirect'];
	$sql = "select user_status from ".$wpdb->prefix."users where user_email='".$creds['user_login']."'";
	$Results = $wpdb->get_results($sql);
	$Result =$Results[0];
	$user_status = $Result->user_status;
	$user = get_user_by( 'login', $creds['user_login']);
	$flag=0;
	
	
	
 if($user_status==0){
	
	if ( $user && wp_check_password( $creds['user_password'], $user->data->user_pass, $user->ID))
    {
	  $user = wp_signon( $creds, false );
	  if ( is_wp_error($user) ){ $flag=0;}
	  else{ 
	  $user_role=$user->roles[0];
	  $flag=$user_role;
	  }
	}else{
		$flag=0;
	}
 }
 else{
	$flag='Inactive'; 
 } 
	echo $flag;	 
	die;
}

//select breed type
if($_REQUEST['action']=='petbreedType'){
	$pet_type =$wpdb->get_results("select * from twc_pet_breedtype where pet_type='".$_REQUEST['pet_type']."'");
	
	
	if(count($pet_type)>0){
	foreach($pet_type as $Objs){
	   $data[]=array('id'=>$Objs->id,'title'=>$Objs->title);
	}
    $Data=json_encode($data);
	}else{
	 $Data='';	
	}	
   echo $Data;
}

if($_REQUEST['action']=='sendQuery'){
	$sql ="insert into twc_queries SET id='".uniqid()."', first_name='".$_REQUEST['first_name']."',last_name='".$_REQUEST['last_name']."',email='".$_REQUEST['email']."',contact_number='".$_REQUEST['contact_number']."',message='".$_REQUEST['message']."',product_id='".$_REQUEST['product_id']."',member_id='".$_REQUEST['member_id']."',vendor_id='".$_REQUEST['vendor_id']."',published='Yes', date_time='".date('Y-m-d H:i:s')."'";
	$wpdb->query($sql);
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers  .= 'From: <'.$admin_email.'>' . "\r\n";

	$pmail_subject ='Find the new query';
	$pmailBody ='<table cellpadding="2" cellspacing="2">
	<p>Find the new query</p>
	<tr><td>Client name: '.$_REQUEST['first_name'].' '.$_REQUEST['last_name'].'</td></tr>
	<tr><td>Email: '.$_REQUEST['email'].'</td></tr>
	<tr><td>Contact No.: '.$_REQUEST['contact_number'].'</td></tr>
	<tr><td>Message: '.$_REQUEST['message'].'</td></tr>
	</table>';
	//@mail($admin_email,$pmail_subject,$pmailBody,$headers);
	
}


if($_REQUEST['action']=='ContactUs'){
	$sql ="insert into twc_contactus SET id='".uniqid()."', first_name='".$_REQUEST['firstname']."',last_name='".$_REQUEST['lastname']."',email='".$_REQUEST['email']."',contact_number='".$_REQUEST['phone']."',subject='".$_REQUEST['subject']."',country='".$_REQUEST['country']."',comment='".$_REQUEST['comment']."',published='Yes', date_time='".date('Y-m-d H:i:s')."'";
	
	$wpdb->query($sql);
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers  .= 'From: <'.$admin_email.'>' . "\r\n";

	$pmail_subject ='Find the new query';
	$pmailBody ='<table cellpadding="2" cellspacing="2">
	<p>Find the new query</p>
	<tr><td>Client name: '.$_REQUEST['firstname'].' '.$_REQUEST['lastname'].'</td></tr>
	<tr><td>Email: '.$_REQUEST['email'].'</td></tr>
	<tr><td>Contact No: '.$_REQUEST['phone'].'</td></tr>
	<tr><td>Subject: '.$_REQUEST['subject'].'</td></tr>
	<tr><td>Country: '.$_REQUEST['country'].'</td></tr>
	<tr><td>Comment: '.$_REQUEST['comment'].'</td></tr>
	</table>';
	@mail($admin_email,$pmail_subject,$pmailBody,$headers);
	//@mail('praveen@thewebconz.com',$pmail_subject,$pmailBody,$headers);
	
}
?>