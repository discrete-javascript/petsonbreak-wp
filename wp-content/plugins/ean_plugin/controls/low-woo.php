<?php
add_action('post_edit_form_tag', 'add_post_enctype');
function add_post_enctype() {
    echo ' enctype="multipart/form-data"';
}
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );
function woo_add_custom_general_fields() {
  global $woocommerce, $post;
  $start_date = get_post_meta( $post->ID, 'start_date', true );
  if($start_date!=''){
    $start_date =date('m/d/Y',strtotime($start_date));
  }
  $end_date = get_post_meta( $post->ID, 'end_date', true );
  if($end_date!=''){
    $end_date =date('m/d/Y',strtotime($end_date));
  }
  
 $partner_logo = wp_get_attachment_url(get_post_meta($post->ID,'partner_logo',true));
 ?>
  
<div class="options_group input-daterange" data-date-format="M d, D">
  <p class="form-field custom_field_type">
	<label for="custom_field_type"><?php echo __( 'Start date', 'woocommerce' ); ?></label>
	<input type="text" name="start_date" id="start_date" value="<?php echo $start_date;?>"  />
  </p>
  <p class="form-field custom_field_type">
	<label for="custom_field_type"><?php echo __( 'End date', 'woocommerce' ); ?></label>
	<input type="text" name="end_date" id="end_date" value="<?php echo $end_date;?>"  />
  </p>
</div>
<div class="options_group">
 <p class="form-field custom_field_type">
	<label for="official_partner_logo"><?php echo __( 'Official Partner logo', 'woocommerce' ); ?></label>
	<input type="file" name="partner_logo" id="partner_logo" value=""  />
  </p>
  <p><img src="<?php echo $partner_logo;?>" style="width:100px" /></p>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script>
jQuery('document').ready(function (e) {
	jQuery('#start_date').datepicker();
	jQuery('#end_date').datepicker();
});
</script>
<?php 
}
function woo_add_custom_general_fields_save( $post_id ){
  $start_dateArr = explode("/",$_POST['start_date']);
  $start_date =$start_dateArr[2].'-'.$start_dateArr[0].'-'.$start_dateArr[1];
  
  $end_dateArr = explode("/",$_POST['end_date']);
  $end_date =$end_dateArr[2].'-'.$end_dateArr[0].'-'.$end_dateArr[1];

 
 if( !empty( $start_date ) )
	update_post_meta( $post_id, 'start_date', esc_attr( $start_date ) );

 if( !empty( $end_date ) )
	update_post_meta( $post_id, 'end_date', esc_attr( $end_date ) );

  $file_type = $_FILES['partner_logo']['type'];
  $filename = $_FILES["partner_logo"]['name'];
  if($filename!=''){
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
    $overrides = array( 'test_form' => false);
	
	$file = wp_handle_upload($_FILES["partner_logo"],$overrides);
    $attachment = array(
			'post_mime_type' => $file_type,
			'post_title' => addslashes($filename),
			'post_content' => '',
			'post_status' => 'inherit',
			'post_parent' => $post_id
		);
    $attach_id = wp_insert_attachment( $attachment, $file['file'] );
    $existing_pdfa = (int) get_post_meta($post_id,'partner_logo', true);
	if(is_numeric($existing_pdfa)) {
		wp_delete_attachment($existing_pdfa);
	}
	update_post_meta($post_id, "partner_logo", $attach_id);	
	
  }
}
?>