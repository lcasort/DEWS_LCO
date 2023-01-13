<?php

try {
    $ini = new Core();
} catch(Exception $excpt) {
    // Controlamos los errores en caso de que el controlador no exista.
    header('HTTP/1.0 404 Not Found', true, 404);
    die($excpt->getMessage());
}