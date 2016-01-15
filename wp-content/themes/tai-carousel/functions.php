<?php

require_once(get_stylesheet_directory().'/app/config.php');

/*create autoload function */

spl_autoload_register( 'load_class' );

function load_class($class)
{   
    if(file_exists(INC.'/'.$class.'.php'))
    {
	require_once(INC.'/'.$class.'.php' ); 
    }
}

/*crete menu*/
add_theme_support('menus');

add_filter('wp_nav_menu_objects', 'css_for_nav_menu');

function css_for_nav_menu($items)
{
    foreach($items as $item)
    {
	#if($item->menu_item_parent) continue;
		
	if($item->current)
	{
	    $item->classes[] = 'active';
	}   
    }

    return $items;
}

/*hook for processing sub-menu*/

add_filter('wp_nav_menu_objects', 'css_for_nav_parrent');

function css_for_nav_parrent( $items )
{
    function hasSub( $menu_item_id, $items )
    {

	foreach ($items as $item) 
	{
	    if ($item->menu_item_parent && $item->menu_item_parent == $menu_item_id) 
	    {
		return true;
	    }
	}

	return false;
    }

    foreach( $items as $item )
    {
	if(hasSub($item->ID, $items))
	{
	    $item->test ="dropdown-toggle ";
	    $item->class ="dropdown-toggle";
	    $item->data_toggle="dropdown";
	    $item->role="button";
	    $item->aria_haspopup="true";
	    $item->aria_expanded = 'false';
	    /* all elements  "classes" in menu, will unions on class HTML teg <li>*/
	    $item->classes[] = 'dropdown';  
	    $item->dropdown = '<span class="caret"></span>';
	}
    }

    return $items;   
}

function getMaimMenu()
{
    $menu = wp_nav_menu(array(
	'menu' => 'top-menu' 
	,'container'       => false
	,'items_wrap'        => '<li>%3$s</li>'	
	,'echo' => false
	,'depth'           => 10 
	,'walker' => new MyMenu	
    ));

    return $menu;
}


/*end create menu*/

$carousel = new Carousel();


################EDIT LOGIN PAGE#############################

function wptutsplus_login_logo() { ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url( <?php echo get_template_directory_uri() . '/media/logo.gif' ; ?> );
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wptutsplus_login_logo' );


add_filter( 'login_headerurl', 'custom_login_header_url' );
function custom_login_header_url($url) 
{

    return home_url( '/' );
}


######################################################################

