<?php 
namespace ArenaApp;

spl_autoload_register( 'ArenaApp\\load_class' );

function load_class($cls)
{     
    $cls = ltrim($cls, '\\');
    if(strpos($cls, __NAMESPACE__) !== 0)
	return;

    $cls = str_replace(__NAMESPACE__, '', $cls);

    $path =   'inc' . 
	str_replace('\\', DIRECTORY_SEPARATOR, $cls) . '.php';
    require_once($path);   
}



