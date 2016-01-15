<?php

namespace ArenaApp;


class User
{

    public function myPage()
    {
	$current_user = wp_get_current_user();

	global $wpdb;
	
	#$wpdb->prefix;
	$newtable = $wpdb->get_results( "SHOW TABLES" );

	print_r($wpdb->prefix);	
    }

}
