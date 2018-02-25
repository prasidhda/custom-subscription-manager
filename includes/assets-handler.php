<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'csm_enqueue_scripts' ) ) {
	function csm_enqueue_scripts() {
		wp_enqueue_script( 'csm-main-script', CSM_URL . '/assets/js/main.js', array( 'jquery' ), time(), TRUE );

		wp_localize_script( 'csm-main-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'csm_enqueue_scripts' );
