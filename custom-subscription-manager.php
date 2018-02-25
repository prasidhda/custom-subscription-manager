<?php
/*
Plugin Name:  Custom Subscription Manager
Description:  Basic WordPress Plugin Header Comment
Version:     1.0.0
Author:       Prasidhda Malla
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  custom-subscription-manager
Domain Path:  /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CSM_DIR' ) ) {
	define( 'CSM_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'CSM_URL' ) ) {
	define( 'CSM_URL', plugins_url( 'custom-subscriptions-manager' ) );
}

include_once CSM_DIR . '/includes/shortcodes.php';
include_once CSM_DIR . '/includes/assets-handler.php';
include_once CSM_DIR . '/includes/ajax-handler.php';

//includes in the admin
if ( is_admin() ) {
	include_once CSM_DIR . '/includes/admin/setting-handler.php';
}
