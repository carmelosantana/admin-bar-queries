<?php 
/*
Plugin Name: Admin Bar Queries
Plugin URI: http://carmelosantana.com/
Description: Admin bar MySQL query and script execution timer output.
Version: 0.5.2
Author: Carmelo Santana
Author URI: http://carmelosantana.com
*/

// add to admin bar
add_action( 'wp_before_admin_bar_render', 'do_admin_bar_queries', 999 );

// admin bar queries
function do_admin_bar_queries(){
	if ( !is_super_admin() )
		return;
	
	global $wp_admin_bar;			

	$wp_admin_bar->add_menu( array(
		'id' => 'admin_bar_queries',
		'title' => get_num_queries().'q '.timer_stop(0, 2).'s',
		'href' => '#'
	));

	foreach ( $load = sys_getloadavg() as $c => $l )
		$load[$c] = round($l, 2);

	$wp_admin_bar->add_menu( array(
		'parent' => 'admin_bar_queries',
		'id' => 'admin_bar_memory',
		'title' => 'Load: <strong>' . $load[0] . /*', ' . $load[1] . ', ' . $load[2] .*/ '</strong>',
		'href' => '#'
	));
}