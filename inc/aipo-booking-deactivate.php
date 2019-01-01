<?php

/**
 * @package Aipo-Booking
 */
class AipoBookingDeactivate {
	public static function deactivate() {
		flush_rewrite_rules();
	}
}