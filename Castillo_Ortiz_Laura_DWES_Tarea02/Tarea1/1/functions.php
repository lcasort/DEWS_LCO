<?php

/**
 * Función para calcular el id del departamento nuevo a guardar.
 */
function calculate_dept_no($conexion)
{
    // Guardamos en la variable $resultado los datos de los departamentos ordenados
    // por id de manera descendente.
    $resultado = $conexion->query('SELECT * FROM departments ORDER BY dept_no DESC');
    // Cogemos el primer departamento (el que tendrá el id más alto),
    // y lo guardamos en la variable $campo.
    $campo = $resultado->fetch_array();
    // Guardamos en la variable $id el id de dicho departamento.
    $id = reset($campo);
    // Tratamos la cadela de $id para quedarnos solo con el número,
    // parsearlo a int y sumarle uno. De esta manera obtenemos el número
    // para el id del nuevo departamento.
    $res = intval(substr($id, -3)) + 1;
    // El formato del id es 'd%n%n%n' siendo %n un número del 0 al 9.
    // Por tanto, añadiremos 0 a la izquierda de nuestro número previamente calculado
    // hasta que alcance las 3 cifras.
    $res = str_pad(strval($res), 3, "0", STR_PAD_LEFT);
    // Añadimos una 'd' a la izquierda de nuestro número y retornamos la cadena.
    return 'd'.$res;
}