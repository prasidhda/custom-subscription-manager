<?php
/**
 * Handle the sending of bulk emails
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( isset( $_POST['send_bulk_emails_nonce'] ) && wp_verify_nonce( $_POST['send_bulk_emails_nonce'], 'send_bulk_emails' ) ) {
	// Send the Bulk Emails 
	$csm_email_subscribers = get_option( 'csm_email_subscribers', true );
	if( NULL !== $csm_email_subscribers && '' !== $csm_email_subscribers ):
		foreach (explode(',', $csm_email_subscribers) as $subsciber ) {
		//Set the email headers 
		$from = 'Prasidhda Malla <info@prasidhda.com.np>'; 
		$to = $subsciber; 
		$subject = $_POST['csm_email_header_subject']; 
		$message = $_POST['csm_email_content']; 
		$headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	    $headers .= 'From: ' . $from . "\r\n";
	    $headers .= 'Reply-To: ' .$from . "\r\n";
	    $headers .= 'X-Mailer: PHP/' . phpversion();
	    
	    @mail($to, $subject, $message, $headers); 

		}
	endif;
	//Save the Setting fields for future purpose as well
	update_option('csm_email_header_from', $_POST['csm_email_header_from']); 
	update_option('csm_email_header_subject', $_POST['csm_email_header_subject']); 
	update_option('csm_email_content', $_POST['csm_email_content']); 
}
