<?php
/**
 * @package Aipo-Booking
 */
/*
 * Plugin Name: Aipo Booking
 * Plugin URI: http://
 * Description: This is plugin for booking rooms, houses, SPA and etc.
 * Version: 1.0.0
 * Author: Aipo
 * License: GPLv2 or later
 * Text Domain: aipo-booking
*/

defined( 'ABSPATH' ) or die( 'You can\'t access this file!!' );

class AipoBooking {

	private $string = '';

	function __construct() {
		add_action( 'init', [ $this, 'custom_post_type' ] );

	}
//admin_enqueue_scripts loads admin panel scripts
//wp_enqueue_scripts loads frontend scripts
	function register_admin_scripts() {

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	function activate() {
//generate a CPT
		$this->custom_post_type();
		//flush rewrite rules
		flush_rewrite_rules();
	}

	function deactivate() {
//flush rewrite rules
		flush_rewrite_rules();
	}

	function custom_post_type() {
		register_post_type( 'book', [ 'public' => true, 'label' => 'Bookings' ] );
	}

//add styles to plugin
	function enqueue() {
		wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/css/booking-style.css', __FILE__ ) );
		wp_enqueue_script('mypluginstyle', plugins_url( '/assets/js/booking-style.js', __FILE__ ) );
	}

}

if ( class_exists( 'AipoBooking' ) ) {
	$aipoBooking = new AipoBooking();
	$aipoBooking->register_admin_scripts();
}
//activation
register_activation_hook( __FILE__, [ $aipoBooking, 'activate' ] );
//deactivation
register_deactivation_hook( __FILE__, [ $aipoBooking, 'deactivate' ] );