<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://codeamp.io
 * @since      1.0.0
 *
 * @package    Forget_About_Shortcode_Buttons
 * @subpackage Forget_About_Shortcode_Buttons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Forget_About_Shortcode_Buttons
 * @subpackage Forget_About_Shortcode_Buttons/admin
 * @author     Ross <r@r.com>
 */
class Forget_About_Shortcode_Buttons_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		/* Add the TinyMCE VisualBlocks Plugin */
		add_filter('mce_external_plugins', array($this, 'load_mce_fasc_plugin'));
		add_filter('mce_buttons', array($this, 'load_mce_fasc_button'));
		
		
		//add_action('init',array($this, 'init_thickbox'));
		
		//Admin Ajax
		add_action( 'wp_ajax_fasc_buttons', array($this, 'fasc_buttons') ); //if logged in
			
	}
	public function fasc_buttons()
	{
		if($_GET['load']=="save_button")
		{
			//$buttons = get_user_meta(get_current_user_id(), 'fasc-buttons', true); //get existing buttons
			$buttons = get_option('fasc-buttons'); //get existing buttons
			
			if(!is_array($buttons))
			{
				$buttons = array();
			}
			
			$button_html = $_POST['button'];
			if($button_html!="")
			{
				
				$button_html = stripslashes(wp_filter_post_kses($button_html));
				
				$button_number = count($buttons)+1;
				
				$button_data = array();
				$button_data['name'] = "Button ".$button_number;
				$button_data['html'] = $button_html;
				
				array_push($buttons, $button_data);
				
			}
			
			//update_user_meta(get_current_user_id(), 'fasc-buttons', $buttons);
			update_option('fasc-buttons', $buttons);
			
			$buttons = array_reverse($buttons);
			
			echo json_encode($buttons);
		}
		else if($_GET['load']=="get_buttons")
		{
			//$buttons = get_user_meta(get_current_user_id(), 'fasc-buttons', true); //get existing buttons
			$buttons = get_option('fasc-buttons'); //get existing buttons
			
			if(!is_array($buttons))
			{
				$buttons = array();
			}
			
			$buttons = array_reverse($buttons);
			
			echo json_encode($buttons);
		}
		else if($_GET['load']=="remove_button")
		{
			//$buttons = get_user_meta(get_current_user_id(), 'fasc-buttons', true); //get existing buttons
			$buttons = get_option('fasc-buttons'); //get existing buttons
			
			if(!is_array($buttons))
			{
				$buttons = array();
			}
			
			$buttons = array_reverse($buttons);
			
			$removeIndex = (int)$_GET['index'];
			
			unset($buttons[$removeIndex]);
			
			$newButtons = array_reverse($buttons);
			//update_user_meta(get_current_user_id(), 'fasc-buttons', $newButtons);
			update_option('fasc-buttons', $newButtons);
			
			echo json_encode($buttons);
		}
		else if($_GET['load']=="update_button")
		{
			//$buttons = get_user_meta(get_current_user_id(), 'fasc-buttons', true); //get existing buttons
			$buttons = get_option('fasc-buttons'); //get existing buttons
			
			if(!is_array($buttons))
			{
				$buttons = array();
			}
			
			$buttons = array_reverse($buttons);
			
			$renameIndex = (int)$_GET['index'];
			
			$name = esc_attr($_GET['name']);
			$buttons[$renameIndex]['name'] = $name;
			
			$newButtons = array_reverse($buttons);
			//update_user_meta(get_current_user_id(), 'fasc-buttons', $newButtons);
			update_option('fasc-buttons', $newButtons);
			
			echo json_encode($buttons);
		}
		else
		{
			$msg = array();
			$msg['error'] = "1";
			
			echo json_encode($msg);
		}
		
		exit;
	}
	public function init_thickbox() {
		add_thickbox();
	}
	public function load_mce_fasc_button ($buttons ) {
		
		//array_push( $buttons, "button_fasc_insert_button", "button_green" );
		array_push( $buttons, "button_fasc_insert_button" );
		return $buttons;
	}
	
	public function load_mce_fasc_plugin ($plugin_array) {
		
		
		$plugin_array['fascview'] = plugin_dir_url( __FILE__ ) . 'js/mce/fasc-plugin.js';
		$plugin_array['fascbutton'] = plugin_dir_url( __FILE__ ) . 'js/mce/fasc-button.js';
		
		
		return $plugin_array;
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
		
		//wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/forget-about-shortcode-buttons-admin.css', array(), $this->version, 'all' );
		//wp_enqueue_style( $this->plugin_name."-fa", plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
		//wp_enqueue_style( $this->plugin_name."-fa", '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), $this->version, 'all' );
		

	}

	public function is_edit_page($new_edit = null){
		global $pagenow;
		//make sure we are on the backend
		if (!is_admin()) return false;


		if($new_edit == "edit")
			return in_array( $pagenow, array( 'post.php',  ) );
		elseif($new_edit == "new") //check for new post page
			return in_array( $pagenow, array( 'post-new.php' ) );
			else //check for either new or edit
		return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
	}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	 
	public function enqueue_scripts() {

		global $current_screen;
		$type = $current_screen->post_type;
		$base = $current_screen->base;
		
		//only add the script to post edit screens and all public post types
		
		$args = array(
			'public'   => true
		);
		
		$post_types = get_post_types( $args, 'names' );
		
		if (is_admin() && ( ( in_array($type, $post_types) && ( $this->is_edit_page() ) ) || ( $base == "widgets" )  )) {
		
			//wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_name.'-fasc-views', plugin_dir_url( __FILE__ ) . 'js/forget-about-shortcode-buttons-fasc-views.js', array( 'jquery', 'editor', 'mce-view', 'wp-color-picker'), $this->version, false );
			
			//wp_enqueue_script( $this->plugin_name.'-fasc-plugin', plugin_dir_url( __FILE__ ) . 'js/forget-about-shortcode-buttons-fasc-plugin.js', array( 'jquery', 'editor', $this->plugin_name.'-fasc-views' ), $this->version, false );
			
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/forget-about-shortcode-buttons-admin.js', array( 'jquery', $this->plugin_name.'-fasc-views', 'wp-color-picker' ), $this->version, false );
			wp_localize_script($this->plugin_name, 'Fasc', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'plugin_url' => plugin_dir_url( __FILE__ ), 'home_url' => (home_url('/')) ));
			
			wp_enqueue_script( $this->plugin_name.'-minicolors', plugin_dir_url( __FILE__ ) . 'js/jquery.minicolors.min.js', array( 'jquery', $this->plugin_name.'-fasc-views', 'wp-color-picker' ), $this->version, false );
		}
		
		
		/* also insert relevant templates */
		

	}
	
	public function mce_add_editor_style() {
		
		add_editor_style( plugin_dir_url( __FILE__ ) . 'css/forget-about-shortcode-buttons-mce.css' );
		
	}
	
	public function admin_footer() {

		global $current_screen;
		$type = $current_screen->post_type;
		$base = $current_screen->base;
		
		//only add the script to post edit screens and all public post types
		$args = array(
			'public'   => true
		);
		
		$post_types = get_post_types( $args, 'names' );
		
		if (is_admin() && ( in_array($type, $post_types) || ( $base == "widgets" ) ) ) {
			
			// insert relevant templates 
			require_once plugin_dir_path( __FILE__ ) . 'partials/forget-about-shortcode-buttons-admin-backbone-templates.php';
		}
		
	}

}
