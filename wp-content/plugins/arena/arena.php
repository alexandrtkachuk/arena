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

require_once('app/functions.php' );

function test($test)
{
    $my = 'Hello';
    return "!!!!!!!!!!!!!!!!???????????";
}

add_shortcode( 'my-test', 'test' );

function registration()
{
    $email = "";
    $nick = "";    
    $pass1 = "";
    $pass2 = "";
    
    $error = 0 ;
    /*	
	1 - pass != pass2
	2 - wrong email
     
     */
    if(isset($_POST[registration]))
    {

	$nick = ( isset($_POST['nick'])) ? htmlspecialchars($_POST['nick']) : "";
	$email = ( isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";
	$pass1 = ( isset($_POST['pass1'])) ? htmlspecialchars($_POST['pass1']) : "";
	$pass2 = ( isset($_POST['pass2'])) ? htmlspecialchars($_POST['pass2']) : "";

	if(!isset($pass1) || $pass1 != $pass2 )
	{
	    $error = 1;
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
	    $error = 2;
	}
	else
	{
	    /*good*/
	}
		
    }
    

    require_once('templates/registration.php' );

}

add_shortcode( 'arena-registration', 'registration' );


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

