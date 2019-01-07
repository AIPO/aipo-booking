<?php


namespace Inc;


final class init {
	/**
	 * Initialize class class from services array
	 * @param $class
	 *
	 * @return class instance new instance of the class
	 */
	private static function instantiate( $class ) {
		return new $class;
	}

	/**
	 * Store all classes in array
	 * @return array Full list of classes
	 */
	public static function get_services() {
		return [
			Pages\Admin::class,
			Controllers\Enqueue::class,
			Controllers\SettingsLinks::class
		];
	}

	/**
	 * Loop through classes, initialize them and call register method if it exists
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}
}