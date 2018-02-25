<?php
/*
 * Function to handle the setting of th plugin
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'csm_add_setting_menu_submenu_pages' ) ) {
	function csm_add_setting_menu_submenu_pages() {
		add_menu_page( 'Email Subscribers', 'Email Subscribers', 'manage_options', 'email-subscribers' );
		add_submenu_page( 'email-subscribers', 'Subscribers', 'Email Subscribers', 'manage_options', 'email-subscribers', 'csm_render_setting_fields' );
		add_submenu_page( 'email-subscribers', 'Send Bulk Emails', 'Send Bulk Emails', 'manage_options', 'send-bulk-emails', 'csm_send_bulk_emails' );
	}
}

add_action( 'admin_menu', 'csm_add_setting_menu_submenu_pages' );

if ( ! function_exists( 'csm_render_setting_fields' ) ) {
	function csm_render_setting_fields() {
		require CSM_DIR . '/includes/views/admin/html-subscribers-lists.php';
	}
}

/*
 * Function to send bulk emails
 */
if ( ! function_exists( 'csm_send_bulk_emails' ) ) {
	function csm_send_bulk_emails() {
		require CSM_DIR . '/includes/views/admin/html-send-bulk-emails.php';
	}
}