<?php

echo '<div class="conjunto">';
function createTable($label) {
    require 'declareSudokus.php';
    $tableData = 0;
    switch($label) {
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

    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';
    for($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for($j=0; $j< sizeof($tableData[$i]); $j++) {
            if($tableData[$i][$j]===0) {
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

function playSudokuInitialize($label) {
    require 'declareSudokus.php';
    $tableData = 0;
    switch($label) {
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

    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';
    for($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for($j=0; $j< sizeof($tableData[$i]); $j++) {
            if($tableData[$i][$j]===0) {
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
    $result .= '<div class="formPlay">';
    $result .= '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    $result .= '<div class="inputs">';
    $result .= '<input type="hidden" name="dificultad" value="' . $label . '" />';
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($tableData)) . '" />';
    $result .= '<label for="number">Número </label>';
    $result .= '<input type="number" min=1 max=9 name="number" /><br>';
    $result .= '<label for="row">Fila </label>';
    $result .= '<input type="number" min=1 max=9 name="row" /><br>';
    $result .= '<label for="column">Columna </label>';
    $result .= '<input type="number" min=1 max=9 name="column" /><br>';
    $result .= '</div>';
    $result .= '<div class="buttons">';
    $result .= '<input type="submit" name="insertar" value="Insertar" /><br>';
    $result .= '<input type="submit" name="delete" value="Eliminar" /><br>';
    $result .= '<input type="submit" name="options" value="Candidatos" />';
    $result .= '</div>';
    $result .= '</form>';
    $result .= '</div>';
    $result .= '</div>';

    echo $result;
}