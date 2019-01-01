<?php

/**
 * @package Aipo-Booking
 */
class AipoBookingActivate {
	public static function activate() {
		flush_rewrite_rules();
	}
}