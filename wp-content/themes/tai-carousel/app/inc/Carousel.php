<?php 
class Carousel
{
    public function __construct()
    {
	add_action('admin_menu', array($this,'init'));
    }

    public function global_custom_options()
    { 
	if( $path = locate_template( 'app/templates/Carousel.php' ))
	{
	    load_template($path);
	}
	else
	{
	    echo 'erorr load'; 
	}
	
    }


    public function init()
    {

	add_theme_page('Carousel settings', 
	    'Carousel settings', 
	    'manage_options', 
	    'functions',array($this,'global_custom_options'));

    }

}
