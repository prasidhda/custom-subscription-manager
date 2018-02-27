<?php
/**
 * File to render the short-codes in the front end
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}
if ( ! function_exists( 'csm_render_subscription_form' ) ) {
	function csm_render_subscription_form( $attributes ) {
		include_once apply_filters( 'csm_subscription_form_dir', CSM_DIR . '/includes/views/html-subscription-form.php' ); ;
	}
}
add_shortcode( 'subscription-form', 'csm_render_subscription_form' );