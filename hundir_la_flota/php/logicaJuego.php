<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
// se incluye 
include './variables.php';
include 'jugando.php';

// Variables dadas por el usuario.
$fila = $_POST['fila'];
$columna = $_POST['col'];
$disparo = $_POST['dispara'];

// Si hay datos y es igual a b, para a tocado sino a agua.

if (isset($fila) && isset($columna) && $tableroConBarcos[$fila][$columna] == 'b') {    
        $tableroConBarcos[$fila][$columna] = $tocado;
    } else {
        $tableroConBarcos[$fila][$columna] = $agua;
    }



            


