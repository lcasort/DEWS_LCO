<?php

session_start();

require_once('./app/config/config.php');
require_once('./app/core.php');

// Hacemos todos los require iniciales requeridos.
function customAutoloader($class) {    
    // Recorremos recursivamente las carpetas para hacer los require_once de las
    // clases necesarias.
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

try {
    $ini = new Core();
} catch(Exception $excpt) {
    // Controlamos los errores en caso de que el controlador no exista.
    header('HTTP/1.0 404 Not Found', true, 404);
    die($excpt->getMessage());
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// AUX METHODS ///////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////
/**
 * Método recursivo para recorrer las carpetas y hacer los require_once
 * necesarios.
 */
function search_file($dir,$file_to_search){

    $files = scandir($dir);

    foreach($files as $key => $value){

        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
    
        if(!is_dir($path)) {
            if($file_to_search == $value){
                require_once $dir . '/' . $file_to_search;
                break;
            }
        } else if($value != "." && $value != "..") {
            search_file($path, $file_to_search);
        }  
    } 
}