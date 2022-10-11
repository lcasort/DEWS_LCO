<?php

// Función para enseñar por pantalla un mensaje de error y detener el programa.
function customError($errstr) {
    echo "<b>Error:</b> $errstr<br>";
    echo "Ending Script";
    die();
}