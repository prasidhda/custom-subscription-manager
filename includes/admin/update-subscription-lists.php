<?php
/**
 * Handle the updating of the Subscription lists from the backend.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( isset( $_POST['update_subscription_lists_nonce'] ) && wp_verify_nonce( $_POST['update_subscription_lists_nonce'], 'update_subscription_lists' ) ) {
	$subscription_lists = $_POST['csm_email_subscribers'];

	update_option( 'csm_email_subscribers', implode( ',', array_keys( array_flip( explode( ',', $subscription_lists ) ) ) ) );
}
