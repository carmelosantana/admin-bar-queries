<?php 
/*
Plugin Name: Admin Bar Queries
Plugin URI: http://carmelosantana.com/
Description: Admin bar MySQL query and script execution timer output.
Version: 0.5
Author: Carmelo Santana
Author URI: http://carmelosantana.com
*/

// Admin bar
add_action( 'wp_before_admin_bar_render', function(){
	if ( !is_super_admin() )
		return;
	
	global $wp_admin_bar;			
	$wp_admin_bar->add_menu( array(
		'parent' => false,
		'id' => 'do_query_bar',
		'title' => get_num_queries().'Q - '.timer_stop().'s', // link title
		'href' => '#',
		'meta' => false
	));
});