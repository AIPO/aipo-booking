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
// Require once Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

function activate_aipo_booking_plugin() {
	\Inc\Controllers\Activate::activate();
}

register_activation_hook( __FILE__, 'activate_aipo_booking_plugin' );

function deactivate_aipo_booking_plugin() {
	Inc\Controllers\Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_aipo_booking_plugin' );
if ( class_exists( 'Inc\\init' ) ) {
	Inc\init::register_services();
}