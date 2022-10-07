<?php

function insertar($label, $sudoku, $row, $column, $number) {
    require_once 'declareSudokus.php';
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
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            if ($row-1==$i && $column-1==$j && $tableData[$i][$j] == 0 && $sudoku[$i][$j] == 0) {
                $sudoku[$row-1][$column-1] = $number;
                $result .= '<th style="color: blue;">' . $number . '</td>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</td>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</td>';
            } else {
                $result .= '<th style="color: red;">' . $sudoku[$i][$j] . '</td>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';

    echo $result;
}

function delete($label, $sudoku, $row, $column) {
    require_once 'declareSudokus.php';
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
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            if ($row-1==$i && $column-1==$j && $tableData[$i][$j] == 0 && $sudoku[$i][$j] != 0) {
                $sudoku[$row-1][$column-1] = 0;
                $result .= '<th style="color: blue;">.</td>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</td>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</td>';
            } else {
                $result .= '<th style="color: red;">' . $sudoku[$i][$j] . '</td>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';

    echo $result;
}