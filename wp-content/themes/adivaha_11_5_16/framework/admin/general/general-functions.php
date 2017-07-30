<?php
/**
 * Whether the current request is in theme options pages
 * 
 * @param mixed $post_types
 * @return bool True if inside theme options pages.
 */
function mk_theme_is_options()
{
     if ('admin.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}
function mk_theme_is_menus()
{
     if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}

function mk_theme_is_widgets()
{
     if ('widgets.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}
function mk_theme_is_masterkey()
{
     if (isset($_GET['page']) && $_GET['page'] == 'masterkey') {
          return true;
     }
     return false;
}
function mk_theme_is_icon_library()
{
     if (isset($_GET['page']) && $_GET['page'] == 'icon-library') {
          return true;
     }
     return false;
}
/**
 * Whether the current request is in post type pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type pages
 */
function mk_theme_is_post_type($post_types = '')
{
     if (mk_theme_is_post_type_list($post_types) || mk_theme_is_post_type_new($post_types) || mk_theme_is_post_type_edit($post_types) || mk_theme_is_post_type_post($post_types) || mk_theme_is_post_type_taxonomy($post_types)) {
          return true;
     } else {
          return false;
     }
}
/**
 * Whether the current request is in post type list page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type list page
 */
function mk_theme_is_post_type_list($post_types = '')
{
     if ('edit.php' != basename($_SERVER['PHP_SELF'])) {
          return false;
     }
     if ($post_types == '') {
          return true;
     } else {
          $check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
          if (is_string($post_types) && $check == $post_types) {
               return true;
          } elseif (is_array($post_types) && in_array($check, $post_types)) {
               return true;
          }
          return false;
     }
}
/**
 * Whether the current request is in post type new page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type new page
 */
function mk_theme_is_post_type_new($post_types = '')
{
     if ('post-new.php' != basename($_SERVER['PHP_SELF'])) {
          return false;
     }
     if ($post_types == '') {
          return true;
     } else {
          $check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
          if (is_string($post_types) && $check == $post_types) {
               return true;
          } elseif (is_array($post_types) && in_array($check, $post_types)) {
               return true;
          }
          return false;
     }
}
/**
 * Whether the current request is in post type post page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type post page
 */
function mk_theme_is_post_type_post($post_types = '')
{
     if ('post.php' != basename($_SERVER['PHP_SELF'])) {
          return false;
     }
     if ($post_types == '') {
          return true;
     } else {
          $post  = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
          $check = get_post_type($post);
          if (is_string($post_types) && $check == $post_types) {
               return true;
          } elseif (is_array($post_types) && in_array($check, $post_types)) {
               return true;
          }
          return false;
     }
}
/**
 * Whether the current request is in post type edit page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type edit page
 */
function mk_theme_is_post_type_edit($post_types = '')
{
     if ('post.php' != basename($_SERVER['PHP_SELF'])) {
          return false;
     }
     $action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
     if ('edit' != $action) {
          return false;
     }
     if ($post_types == '') {
          return true;
     } else {
          $post  = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
          $check = get_post_type($post);
          if (is_string($post_types) && $check == $post_types) {
               return true;
          } elseif (is_array($post_types) && in_array($check, $post_types)) {
               return true;
          }
          return false;
     }
}
/**
 * Whether the current request is in post type taxonomy pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type taxonomy pages
 */
function mk_theme_is_post_type_taxonomy($post_types = '')
{
     if ('edit-tags.php' != basename($_SERVER['PHP_SELF'])) {
          return false;
     }
     if ($post_types == '') {
          return true;
     } else {
          $check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
          if (is_string($post_types) && $check == $post_types) {
               return true;
          } elseif (is_array($post_types) && in_array($check, $post_types)) {
               return true;
          }
          return false;
     }
}




class mk_shortcodes_add_buttons {

  function __construct() {
    add_action( 'init', array( &$this, 'init' ) );
  }
  
  function init() {
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
      return;
    }

    if ( get_user_option( 'rich_editing' ) == 'true' ) {
      add_filter( 'mce_external_plugins', array( &$this, 'mk_shortcodes_plugin' ) );
      add_filter( 'mce_buttons', array( &$this,'mk_shortcodes_register' ) );
    }  
  }

  function mk_shortcodes_plugin( $plugin_array ) {
   if ( floatval( get_bloginfo( 'version' ) ) >= 3.9 ) {
      $tinymce_js = THEME_ADMIN_ASSETS_URI .'/js/tinymce-button.js';
    } else {
      $tinymce_js = THEME_ADMIN_ASSETS_URI .'/js/tinymce-button-old.js';
    }
    $plugin_array['mk_shortcodes'] = $tinymce_js;
    return $plugin_array;
  }

  function mk_shortcodes_register( $buttons ) {
    array_push( $buttons, 'mk_shortcodes_button' );
    return $buttons;
  }

}

$mk_shortcodes = new mk_shortcodes_add_buttons;


