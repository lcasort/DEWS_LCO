<?php

// Iniciamos la sesión o recuperamos la anterior sesión existente.
session_start();

//
if(isset($_SESSION['login'])) {
    session_destroy();
    header('Location: ./login.php');
    exit();
}

?>