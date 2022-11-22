<?php

/*
Función para mostrar por pantalla los tres posibles sudokus
entre los que el usuario debe elegir.
*/
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
    }

    // Mostramos por pantalla el sudoku en formato de tabla.
    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            if ($tableData[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</th>';
            } else {
                $result .= '<th style="color: red;">' . $tableData[$i][$j] . '</th>';
            }
        }
        
        $result .= '</tr>';
    }
    
    $result .= '</table>';
    $result .= '</div>';

    echo $result;
}


/*
Función para mostrar por pantalla el sudoku seleccionado
por el usuario.
*/
function playSudokuInitialize($label)
{
    require 'declareSudokus.php';

    /*
    Comprobamos cuál es el sudoku que estamos jugando y
    lo guardamos en la variable $tableData.
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
    }

    /*
    Vamos guardando en una variable llamada $result el código html
    con el que iremos formando la tabla en la que mostraremos el
    sudoku.
    */
    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            if ($tableData[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</th>';
            } else {
                $result .= '<th style="color: red;">' . $tableData[$i][$j] . '</th>';
            }
        }
        
        $result .= '</tr>';
    }
    
    $result .= '</table>';
    $result .= '</div>';
    $result .= '</div>';
    // Creamos un formulario con método post.
    $result .= '<div class="formPlay">';
    $result .= '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    $result .= '<div class="inputs">';
    /*
    Enviamos mediate dos input hidden ta dificultad del sudoku que
    estamos jugando y el sudoku codificado en base 64.
    */
    $result .= '<input type="hidden" name="dificultad" value="' . $label . '" />';
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($tableData)) . '" />';

    /*
    Imprimimos por pantalla la variable $result, que contiene
    la tabla con el sudoku, así como parte del formulario.
    */
    echo $result;
}