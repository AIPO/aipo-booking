<?php

namespace Inc\Pages;

use Inc\Controllers\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

	public $settings;
	public $pages = array();
	public $subPages = array();
	public $callbacks;

	public function __construct() {
		parent::__construct();
		$this->settings  = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
		$this->setSubPages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->settings->addPages( $this->pages )->withSubPage( 'DashBoard' )->addSubPages( $this->subPages )->register();
	}

	public function setPages() {
		$this->pages = [
			[
				'page_title' => __( 'Aipo-Booking Plugin', 'aipo-booking' ),
				'menu_title' => __( 'Booking', 'aipo-booking' ),
				'capability' => 'manage_options',
				'menu_slug'  => 'aipo_booking',
				'callback'   => array( $this->callbacks, 'adminDashboard' ),
				'icon_url'   => 'dashicons-book',
				'position'   => 110
			],
		];

	}

	public function setSubPages() {
		$this->subPages = [
			[
				'parent_slug' => 'aipo_booking',
				'page_title'  => __( 'Custom Post Types', 'aipo-booking' ),
				'menu_title'  => 'CPT',
				'capability'  => 'manage_options',
				'menu_slug'   => 'aipo_booking_cpt',
				'callback'    => function () {
					echo ' CPT Manager';
				},
			],
			[
				'parent_slug' => 'aipo_booking',
				'page_title'  => __( 'Custom Taxonomies', 'aipo-booking' ),
				'menu_title'  => 'Taxonomies',
				'capability'  => 'manage_options',
				'menu_slug'   => 'aipo_booking_taxonomies',
				'callback'    => function () {
					echo ' Taxonomies Manager';
				},
			],
			[
				'parent_slug' => 'aipo_booking',
				'page_title'  => __( 'Custom Widget', 'aipo-booking' ),
				'menu_title'  => 'Widget',
				'capability'  => 'manage_options',
				'menu_slug'   => 'aipo_booking_widgets',
				'callback'    => function () {
					echo ' Widgets Manager';
				},
			],
			[
				'parent_slug' => 'aipo_booking',
				'page_title'  => __( 'General Settings', 'aipo-booking' ),
				'menu_title'  => 'Settings',
				'capability'  => 'manage_options',
				'menu_slug'   => 'aipo_booking_settings',
				'callback'    => function () {
					echo ' Settings Page';
				},
			],
		];
	}

	public function setSettings() {
		$args = [
			[
				'option_group' => 'aipo_options_group',
				'option_name'  => 'text_example',
				'callback'     => array( $this->callbacks, 'aipoOptionsGroup' ),
			]
			,
			[
				'option_group' => 'aipo_options_group',
				'option_name'  => 'first_name',
			]
		];
		$this->settings->setSettings( $args );
	}

	public function setSections() {
		$args = [
			[
				'id'       => 'aipo_booking_index',
				'title'    => __( 'Settings', 'aipo-booking' ),
				'callback' => array( $this->callbacks, 'aipoAdminSection' ),
				'page'     => "aipo_booking"

			],

		];
		$this->settings->setSections( $args );
	}

	public function setFields() {
		$args = [
			[
				'id'       => 'text_example',
				'title'    => __( 'Text Example', 'aipo-booking' ),
				'callback' => array( $this->callbacks, 'aipoAdminField' ),
				'page'     => "aipo_booking",
				'section'  => 'aipo_booking_index',
				'args'     => [
					'label_for' => 'text_example',
					'class'     => 'example-class'
				]
			],
			[
				'id'       => 'first_name',
				'title'    => __( 'First Name', 'aipo-booking' ),
				'callback' => array( $this->callbacks, 'aipoAdminFirstName' ),
				'page'     => "aipo_booking",
				'section'  => 'aipo_booking_index',
				'args'     => [
					'label_for' => 'first_name',
					'class'     => 'example-class'
				]
			]
		];
		$this->settings->setFields( $args );
	}

}