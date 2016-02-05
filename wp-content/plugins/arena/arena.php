<?php
/*
 * Plugin Name: Arena
 * Plugin URI: http://#
 * Description: Arena plagin
 * Version: 1.0
 * Author: A.Tkachuk
 * Author URI: http://#author
 * */


/*
 * userd login form wp-comerce
 * with woocomerce edit user page*/

/* регистрируем шорткод */

require_once('config.php' );
require_once('app/functions.php' );

/* need for activate */
register_activation_hook(__FILE__,'arenaInstal');

global $arena_db_version;
$arena_db_version = "1.0";

function arenaInstal()
{

    $sql = "CREATE TABLE  %tabname% (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        countUsers TINYINT  NOT NULL,
        price float  DEFAULT '1' NOT NULL,
        idUser bigint(20) NOT NULL,
        timeCreate DATETIME NOT NULL,
        won ENUM('A', 'B', 'W','?') NOT NULL, 
        url VARCHAR(128) NOT NULL,
        UNIQUE KEY id (id)
    );"; /* W - wait check, ? - begining */

    createTable($sql, ARENA_TABLE_ORDERS);

    $sql = "CREATE TABLE  %tabname% (
        idUser bigint(20) NOT NULL,
        idOrder mediumint(9) NOT NULL,
        team ENUM('A', 'B') NOT NULL
    );";

    createTable($sql, ARENA_TABLE_USER2ORDER);

    $sql = "CREATE TABLE  %tabname% (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        idUser bigint(20) NOT NULL,
        timeCreate DATETIME NOT NULL,
        info text NOT NULL,
        UNIQUE KEY id (id)
         
    );";

    createTable($sql, ARENA_TABLE_COMMENTS);
    
    $sql = "CREATE TABLE  %tabname% (
        idComment mediumint(9) NOT NULL,
        idOrder mediumint(9) NOT NULL 
    );";

    createTable($sql, ARENA_TABLE_COMMENT2ORDER);
}

function createTable($sql, $tabname)
{
    global $wpdb;
    global $arena_db_version;

    $table_name = $wpdb->prefix . $tabname;


    if($wpdb->get_var("show tables like '$table_name'") != $table_name ) 
    {

        $sql = str_replace("%tabname%", $table_name, $sql);        
        

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $rows_affected = $wpdb->insert( $table_name, 
            array( 'time' => current_time('mysql'), 
            'name' => $welcome_name, 
            'text' => $welcome_text ) 
        );

        add_option("arena_db_version", $arena_db_version);
    }

}

#wp_login('test', 'test');

$control = new \ArenaApp\Controller();

$control->begin();


function test($test)
{
    $my = 'Hello';
    return "!!!!!!!!!!!!!!!!???????????";
}

add_shortcode( 'my-test', 'test' );





function userPage()
{
   $user = new \ArenaApp\User(); 
    $user->myPage();

}	 

add_shortcode( 'user-page', 'userPage' );

add_filter('user_contactmethods', 'my_user_contactmethods');

function my_user_contactmethods($user_contactmethods)
{
    $user_contactmethods['twitter'] = 'Twitter Username';
    $user_contactmethods['facebook'] = 'Facebook Username';
    $user_contactmethods['perfectmoney'] = 'Perfect Money';
    $user_contactmethods['money'] = 'Money';

    /*
	    add_user_meta( $user_id, $meta_key, $meta_value, $unique );
		get_user_meta(1, 'twitter', true);
     */

    return $user_contactmethods;
}






######################

function addRole()
{
    #remove_role( 'client' );

    add_role( 'client', __(

	'Client' ),

    array(

	'read' => false, // true allows this capability
	'edit_posts' => false, // Allows user to edit their own posts
	'edit_pages' => false, // Allows user to edit pages
	'edit_others_posts' => false, // Allows user to edit others posts not just their own
	'create_posts' => false, // Allows user to create new posts
	'manage_categories' => false, // Allows user to manage post categories
	'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
	'edit_themes' => false, // false denies this capability. User can’t edit your theme
	'install_plugins' => false, // User cant add new plugins
	'update_plugin' => false, // User can’t update any plugins
	'update_core' => false // user cant perform core updates
    ));
}

$role = get_role( 'client' );

if(!$role)
{
    addRole(); 
}
############################################################################

