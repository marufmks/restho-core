<?php
/*
Plugin Name: Restho Core
Plugin URI: https://themeforest.net/user/egenstheme/portfolio
Description: Restho Core Plugin is a main plugin for Restho-WP theme.  
Author: Egens Lab
Author URI: https://themeforest.net/user/egenstheme/
Version: 1.0.0
Text Domain: restho-core
*/

//If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


//Check restho active or not
$theme_name_array   = array( 'restho', 'restho Child' );
$current_theme      = wp_get_theme();
$current_theme_name = $current_theme->get( 'Name' );
define( 'EGNS_THEME_ACTIVE', in_array( $current_theme_name, $theme_name_array ) ? true : false );


//plugin dir path
define( 'EGNS_CORE_ENV', true );
define( 'EGNS_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'EGNS_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'EGNS_CORE_VERSION', '1.0.0' );
define( 'EGNS_CORE_INC', EGNS_CORE_ROOT_PATH .'/inc');
define( 'EGNS_CORE_LIB', EGNS_CORE_ROOT_PATH .'/library');
define( 'EGNS_CORE_ELEMENTOR', EGNS_CORE_ROOT_PATH .'/elementor');
define( 'EGNS_CORE_DEMO_IMPORT', EGNS_CORE_ROOT_PATH .'/demo-data-import');
define( 'EGNS_CORE_ADMIN', EGNS_CORE_ROOT_PATH .'/admin');
define( 'EGNS_CORE_ADMIN_ASSETS', EGNS_CORE_ROOT_URL .'admin/assets');
define( 'EGNS_CORE_WP_WIDGETS', EGNS_CORE_ROOT_PATH .'/wp-widgets');
define( 'EGNS_CORE_ASSETS', EGNS_CORE_ROOT_URL .'assets/');
define( 'EGNS_CORE_CSS', EGNS_CORE_ASSETS .'css');
define( 'EGNS_CORE_JS', EGNS_CORE_ASSETS .'js');
define( 'EGNS_CORE_FONT', EGNS_CORE_ASSETS .'font');
define( 'EGNS_CORE_FONTS', EGNS_CORE_ASSETS .'fonts');
define( 'EGNS_CORE_IMG', EGNS_CORE_ASSETS .'images');


//Helper Functions
if (file_exists( EGNS_CORE_INC .'/class-egens-core-helper-functions.php')){
    require_once EGNS_CORE_INC . '/class-egens-core-helper-functions.php';
    if (!function_exists('')){
        function egens_core(){
            return class_exists('Egens_Core_Helper_Functions') ? new Egens_Core_Helper_Functions() : false;
        }
    }
}


//plugin init
if ( file_exists( EGNS_CORE_ROOT_PATH . '/inc/class-egens-core-init.php' ) ) {
	require_once EGNS_CORE_ROOT_PATH . '/inc/class-egens-core-init.php';
}


//Demo Importer
if ( file_exists( EGNS_CORE_DEMO_IMPORT . '/demo-importer.php' ) ) {
	require_once EGNS_CORE_DEMO_IMPORT . '/demo-importer.php';
}

// Widget Register
if ( file_exists( EGNS_CORE_ROOT_PATH . '/inc/widgets.php' ) ) {
	require_once EGNS_CORE_ROOT_PATH . '/inc/widgets.php';
}
