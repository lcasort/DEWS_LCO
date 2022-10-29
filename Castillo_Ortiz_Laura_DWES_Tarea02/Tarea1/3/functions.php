<?php

function calculate_dept_no($conexion)
{
    $resultado = $conexion->query('SELECT * FROM departments ORDER BY dept_no DESC');
    $campo = $resultado->fetch_array();
    $id = reset($campo);
    $res = intval(substr($id, -3)) + 1;
    $res = str_pad(strval($res), 3, "0", STR_PAD_LEFT);
    return 'd'.$res;
}