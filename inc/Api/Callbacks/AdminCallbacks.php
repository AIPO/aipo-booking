<?php
/**
 * @package
 */


namespace Inc\Api\Callbacks;


use Inc\Controllers\BaseController;

class AdminCallbacks extends BaseController {
	public function register() {

	}

	public function adminDashboard() {
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCPT() {
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function adminTaxonomies() {
		return require_once( "$this->plugin_path/templates/taxonomies.php" );
	}

	public function adminWidgets() {
		return require_once( "$this->plugin_path/templates/widgets.php" );
	}

	public function aipoOptionsGroup( $input ) {
		return $input;
	}

	public function aipoAdminSection() {
		echo "";
	}

	public function aipoAdminField() {
		//$value = ;
		echo '<input type="text" class="regular-text" name="text_example" value="' . get_option( 'text_example' ) . '" placeholder="Write something here"> ';
	}

	public function aipoAdminFirstName() {
		echo '<input type="text" class="regular-text" name="first_name" value="' . get_option( 'first_name' ) . '" placeholder="Write something here"> ';

	}
}