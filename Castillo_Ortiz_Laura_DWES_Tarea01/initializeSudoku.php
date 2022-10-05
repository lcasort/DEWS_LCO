<?php

echo '<div class="conjunto">';
function createTable($label) {
    require 'index0.php';
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
    }

    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table width="300px" height="300px">';
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