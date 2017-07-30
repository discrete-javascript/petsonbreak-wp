<?php 
// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
function ajax_auth_init(){
	wp_register_script('ajax-auth-script', get_template_directory_uri() . '/scripts/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');
	
    wp_localize_script( 'ajax-auth-script', 'myCustomAjax', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login_twc' );
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
	
}
function ajax_login_twc(){ 
    global $wpdb;
    $info = array();
    $info['user_login'] = $_REQUEST['username'];
    $info['user_password'] = $_REQUEST['password'];
    $info['remember'] = true;
	$user = get_user_by( 'login', $_REQUEST['username'] );
    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon)){
       echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('successful, redirecting...'),'userID'=>$user->ID,'userName'=>$user->display_name,'redirect_to'=>$redirect ));
    }
    die();
}

function ajax_register(){
	print_r($_REQUEST);
}

?>