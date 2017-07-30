<?php

/**
 * @link              https://jeanbaptisteaudras.com/portfolio/extension-wordpress-plan-de-site/
 * @since             1.0
 * @package           Simple Site Map Page
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Site Map Page
 * Plugin URI:        https://jeanbaptisteaudras.com/portfolio/extension-wordpress-plan-de-site/
 * Description:       Build your HTML site map page easily with WordPress native menus.
 * Version:           1.1
 * Author:            Jean-Baptiste Audras, project manager @ Whodunit
 * Author URI:        http://jeanbaptisteaudras.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-site-map-page
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * i18n
 */
load_plugin_textdomain( 'simple-site-map-page', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

/**
 * Admin
 */
if (is_admin()) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/ssmp-admin.php';
}
/**
 * Public
 */
require_once plugin_dir_path( __FILE__ ) . 'public/ssmp-public.php';
