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
	public $plugin_name;

	public function __construct() {
		$this->plugin_name = plugin_basename( __FILE__ );
	}

	public function register() {
		//add menu link
		add_action( 'admin_menu', [ $this, 'add_admin_pages' ] );
		//add settings link in plugins
		add_filter( "plugin_action_links_$this->plugin_name", [ $this, 'settings_link' ] );
		//add css and javascript  to plugin
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	public function settings_link( $links ) {
		//add custom settings link
		$settings_link = '<a href="admin.php?page=aipo_booking">' . __( 'Settings', 'aipo_booking' ) . '</a>';
		array_push( $links, $settings_link );

		return $links;

	}

	public function add_admin_pages() {
		add_menu_page(
			__( 'Aipo-Booking Plugin', 'aipo-booking' ),
			__( 'Booking', 'aipo-booking' ),
			'manage_options',
			'aipo_booking', [
			$this,
			'admin_index'
		],
			'dashicons-book', 110 );
	}

//admin templates
	public function admin_index() {
		require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
	}

//register CPT
	protected function create_post_type() {
		add_action( 'init', [ $this, 'custom_post_type' ] );
	}

	function custom_post_type() {
		register_post_type( 'book', [ 'public' => true, 'label' => 'Bookings' ] );
	}

	function enqueue() {
		wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/css/booking-style.css', __FILE__ ) );
		wp_enqueue_script( 'mypluginstyle', plugins_url( '/assets/js/booking-style.js', __FILE__ ) );
	}

}//end class

if ( class_exists( 'AipoBooking' ) ) {
	$aipoBooking = new AipoBooking();
	$aipoBooking->register();
	$aipoBooking->register_admin_scripts();
}
//activation
require_once plugin_dir_path( __FILE__ ) . 'inc/aipo-booking-activate.php';
register_activation_hook( __FILE__, [ 'AipoBookingActivate', 'activate' ] );
//deactivation
require_once plugin_dir_path( __FILE__ ) . 'inc/aipo-booking-deactivate.php';
register_deactivation_hook( __FILE__, [ 'AipoBookingDeactivate', 'deactivate' ] );