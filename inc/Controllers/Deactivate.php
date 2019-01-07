<?php

/**
 * @package Aipo-Booking
 */

namespace Inc\Controllers;

class Deactivate {
	public static function deactivate() {
		flush_rewrite_rules();
	}
}