<?php

/**
 * @package Aipo-Booking
 */

namespace Inc\Controllers;

class Activate {
	public static function activate() {
		flush_rewrite_rules();
	}
}