<?php
/*
Plugin Name: Hide custom fields
Plugin URI:  
Description: This plugin hides the custom fields in posts and pages
Version: 1.0
Author: Sven Wagener
Author URI: http://www.rheinschmiede.de
*/

// Removing metaboxes in posts & pages
function remove_custom_fields() {
	remove_meta_box( 'postcustom' , 'post' , 'normal' ); 
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_custom_fields' );

?>