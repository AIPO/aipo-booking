<?php


namespace Inc\Controllers;



class Enqueue extends BaseController {
	public function register() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	public function enqueue() {
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url.'assets/css/booking-style.css' );
		wp_enqueue_script( 'mypluginstyle', $this->plugin_url. 'assets/js/booking-style.js' );
	}
}