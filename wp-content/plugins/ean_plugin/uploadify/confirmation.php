<?php
/**
 Template Name: Confirmation Page
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
 
?>
<?php

get_header();
global $lang;
?>

<div class="inner_title">
  <div class="container">
    <div class="col-sm-12">
      <h4>
        <?php _e('Payment Success','translation');?>
      </h4>
    </div>
  </div>
</div>
<div class="container inner_mst">
  <div class="clearfix"></div>
  <br />
  <div class="col-sm-12">
    <?php



if($_REQUEST['action']=='paymentNotification'){

	$record_id = $_REQUEST['li_0_product_id'];
	$order_number = $_REQUEST['order_number'];
	$invoice_id = $_REQUEST['invoice_id'];
	$pay_method = $_REQUEST['pay_method'];
	$order_sql = "UPDATE twc_orders SET published='Yes', order_number = '".$order_number."', invoice_id = '".$invoice_id."', pay_method = '".$pay_method."' WHERE id='".$record_id."'";
	$wpdb->query($order_sql);
?>
    <?php 
    $sql = "SELECT * FROM twc_orders WHERE id='".$record_id."'";
    $results =$wpdb->get_results($sql);
    if(count($results)>0){    
		foreach($results as $result){
			$company_name = companyName($result->company_id);
			$source_lang = getLanguage($result->source_lang);
			$target_lang = getLanguage($result->target_lang);
			$paidAmount = $result->paid_amount;
			$currency = $result->paid_currency;

			$Get_order_counter = "SELECT order_counter FROM twc_companies where id='".$result->company_id."' limit 1";
			$Results_order_counters = $wpdb->get_results($Get_order_counter);
			foreach ( $Results_order_counters as $Results_order_counter ){
			$order_counter = $Results_order_counter->order_counter;
			}
			$order_counter++;

			$update_company_sql = "UPDATE twc_companies SET order_counter = '".$order_counter."' WHERE id='".$result->company_id."'";
			$wpdb->query($update_company_sql);
			

			$Email_SQLs ="select * from twc_messages where published='Yes' and status_deleted='0' and id='TWCI1452344228TWC569103a44309d' limit 1";
			$Email_Results = $wpdb->get_results($Email_SQLs);
			foreach ( $Email_Results as $Email_Result )	{
				$messages_content = $Email_Result->messages_content;
				$messages_title = $Email_Result->title;
				$messages_subject = $Email_Result->subject;
				$user_mail = $messages_content; 
			}

				$arr1 = array("{USERNAME}","{INVOICE_ID}","{ORDER_NUMBER}","{COMPANY}","{SOURCELANGUAGE}","{TARGETLANGUAGE}","{AMOUNT}");
				$arr2 = array($result->user_name,$invoice_id,$order_number,$company_name,$source_lang,$target_lang,$currency.' '.$paidAmount); 
				$str2 = str_replace($arr1, $arr2, $user_mail);
				$user_mail_content = "<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px;'>".$str2."</div>";
				$headers2 = "From: Cymosa Support Team <asfak@translation.com>\r\nReply-To:asfak@translation.comk\r\nContent-type: text/html; charset=us scii";
				@mail( $result->user_email, $messages_subject , $user_mail_content, $headers2);
				@mail( 'asfak@translation.com', $messages_subject , $user_mail_content, $headers2);			

		?>
    <h2>
      <?php _e('Thank you, We have received your booking payment and are currently reviewing it. We will contact you as soon as possible.','translation');?>
    </h2>
    <br />
    <table class="pay">
      <thead>
        <tr>
          <th><?php _e('Invoice ID','translation');?></th>
          <th><?php echo $invoice_id;?></th>
        </tr>
        <tr>
          <th><?php _e('Order Number','translation');?></th>
          <th><?php echo $order_number;?></th>
        </tr>
        <tr>
          <th><?php _e('Company','translation');?></th>
          <th><?php echo $company_name ;?></th>
        </tr>
        <tr>
          <th><?php _e('Total Words','translation');?></th>
          <th><?php echo $result->total_word;?></th>
        </tr>
        <tr>
          <th><?php _e('Source Language','translation');?></th>
          <th><?php echo getLanguage($source_lang,$lang);?> (<?php echo $result->source_lang;?>) </th>
        </tr>
        <tr>
          <th><?php _e('Target Language','translation');?></th>
          <th><?php echo getLanguage($target_lang,$lang);?> (<?php echo $result->target_lang;?>)</th>
        </tr>
        <tr>
          <th><?php _e('Total Paid Amount','translation');?></th>
          <th><?php echo $currency;?> <?php echo $paidAmount;?></th>
        </tr>
      </thead>
    </table>
    <?php 



		}



	} 



	?>
    <?php }



?>
  </div>
  <div class="clearfix"></div>
  <!-- End container -->
</div>
<div class="margin-top"> </div>
<?php



get_footer(); 



?>
