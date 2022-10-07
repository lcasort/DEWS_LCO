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
                $result .= '<th style="color: blue;">.</td>';
            } else {
                $result .= '<th style="color: red;">' . $tableData[$i][$j] . '</td>';
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
                $result .= '<th style="color: blue;">.</td>';
            } else {
                $result .= '<th style="color: red;">' . $tableData[$i][$j] . '</td>';
            }
        }
        
        $result .= '</tr>';
    }
    
    $result .= '</table>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '<div class="form">';
    $result .= '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    $result .= '<div class="inputs">';
    $result .= '<input type="hidden" name="dificultad" value="' . $label . '" />';
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($tableData)) . '" />';

    echo $result;
}