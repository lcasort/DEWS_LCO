<?php

// Hacemos todos los require iniciales requeridos.
function customAutoloader($class) {
    require_once('./app/config/config.php');
    require_once('./app/core.php');
    
    $file = $class . '.php';

    $directory = new \RecursiveDirectoryIterator(RUTE_APP);
    $iterator = new \RecursiveIteratorIterator($directory);
    foreach ($iterator as $info) {
        if ($info->getFileName() == $file) {
            require_once($info->getPathName());
            return;
        }
    }
}
spl_autoload_register("customAutoloader");

require_once('./app/ini.php');

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// AUX METHODS ///////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////
function search_file($dir,$file_to_search){

    $files = scandir($dir);

    foreach($files as $key => $value){

        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
    
        if(!is_dir($path)) {
            if($file_to_search == $value){
                include $dir . '/' . $file_to_search;
                break;
            }
        } else if($value != "." && $value != "..") {
            search_file($path, $file_to_search);
        }  
    } 
}

?>