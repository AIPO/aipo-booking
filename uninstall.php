<?php
/**
 *
 */
defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'You can\'t access this file!!' );
//Clear Database stored data
/*$bookings = get_posts(['post_type' =>'booking', 'numberposts' =>-1]);
foreach ($bookings as $book){
	wp_delete_post($book->ID, true); // delete all
}*/
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type ='booking'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");