<?php
/**
 * AJAX handler for email subscription
 */
/*
 * Function to save the subscription email address to the database
 */
if ( ! function_exists( 'csm_email_subscription' ) ) {
	function csm_email_subscription() {
		if ( ! isset( $_POST['email_subscription_nonce'] ) || ! wp_verify_nonce( $_POST['email_subscription_nonce'], 'email_subscription' ) ) {
			wp_send_json( array(
				'status'  => 'failed',
				'message' => 'Nonce could not be verified.'
			) );
			die();
		}
		if ( empty( $_POST['email_id'] ) || $_POST['email_id'] == '' ) {
			wp_send_json( array(
				'status'  => 'failed',
				'message' => 'Email ID field is empty.'
			) );
			die();
		}
		$email_id = sanitize_email( $_POST['email_id'] );
		/*
		//Get the current list of email subscribers and update the subscriber lists
		$current_subscribers = unserialize( get_option( 'csm_email_subscribers' ) );
		if ( FALSE === $current_subscribers ) {
			$current_subscribers = array(
				$email_id
			);
		} else {
			$current_subscribers[] = $email_id;
		}
		update_option( 'csm_email_subscribers', serialize( $current_subscribers ) );
		*/
		//		delete_option( 'csm_email_subscribers' );
		$current_subscribers = get_option( 'csm_email_subscribers' );
		if ( FALSE === $current_subscribers || '' == $current_subscribers ) {
			$current_subscribers = $email_id;
		} else {
			//check if th $email_id is already on the list
			if ( strpos( $current_subscribers, $email_id ) !== FALSE ) {
				$response = array(
					'status'  => 'failed',
					'message' => 'You are already being subscribed.'
				);
				wp_send_json( $response );
				die();
			}
			$current_subscribers .= ', ' . trim( $email_id );
		}
		update_option( 'csm_email_subscribers', $current_subscribers );
		$response = array(
			'status'  => 'success',
			'message' => 'Thank you for the subscription'
		);
		wp_send_json( $response );
		die();
	}
}
add_action( 'wp_ajax_email_subscription', 'csm_email_subscription' );
add_action( 'wp_ajax_nopriv_email_subscription', 'csm_email_subscription' );