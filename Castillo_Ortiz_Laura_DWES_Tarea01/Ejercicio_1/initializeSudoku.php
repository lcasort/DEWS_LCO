<?php

function createTable($label)
{
    require 'declareSudokus.php';

    /*
    Hacemos un switch para que, dependiendo del nivel de dificultad
    seleccionado, tomemos el array correspondiente.
    En caso de que el nivel de dificultad seccionado no evista mostraremos
    una pantalla en blanco con un mensaje de error.
    */
    $tableData = 0;
    switch ($label) {
        case 'FÁCIL':
            $tableData = $facil;
            break;
        case 'MEDIO':
            $tableData = $medio;
            break;
        case 'DIFÍCIL':
            $tableData = $dificil;
            break;
        default:
            require_once 'errors.php';
            customError("Dificultad no disponible.");
            break;
    }

    // Mostramos por pantalla el sudoku en formato de tabla.
    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            if ($tableData[$i][$j]===0) {
                $result .= '<th class="azul">.</td>';
            } else {
                $result .= '<th class="rojo">' . $tableData[$i][$j] . '</td>';
            }
        }
        
        $result .= '</tr>';
    }
    
    $result .= '</table>';
    $result .= '</div>';
    
    echo $result;
}