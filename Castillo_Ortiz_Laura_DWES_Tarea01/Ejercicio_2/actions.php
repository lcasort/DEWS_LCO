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
                $result .= '<th style="color: blue;">' . $number . '</th>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</td>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</th>';
            } else {
                $result .= '<th style="color: red;">' . $sudoku[$i][$j] . '</th>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';
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
                $result .= '<th style="color: blue;">.</th>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</th>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</th>';
            } else {
                $result .= '<th style="color: red;">' . $sudoku[$i][$j] . '</th>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';
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

function showOptions($label, $sudoku, $row, $column) {
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
        
        for ($j=0; $j<sizeof($tableData[$i]); $j++) {
            if ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</th>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th style="color: blue;">.</th>';
            } else {
                $result .= '<th style="color: red;">' . $sudoku[$i][$j] . '</th>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';
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

    $candidates = '';
    if($sudoku[$row-1][$column-1]===0) {
        $numeros = array(1,2,3,4,5,6,7,8,9);
        foreach ($numeros as $n) {
            $columna = selectColumn($sudoku, $column-1);
            $square = selectSquare($sudoku, $row-1, $column-1);
            $linea = comprobarLinea($n, $sudoku[$row-1]);
            $columna = comprobarColumna($n, $columna);
            $cuadrado = comprobarCuadrado($n, $square);
            if ($linea && $columna && $cuadrado) {
                $candidates .= $n . ' ';
            }
        }
    } else {
        $candidates .= 'Casilla ya escrita.';
    }

    $result .= '<div class="candidates">' . $candidates . '</div>';
    $result .= '</div>';
    $result .= '</form>';
    $result .= '</div>';
    $result .= '</div>';

    echo $result;
}

function comprobarLinea($n, $row) {
    $res = true;
    for($i=0; $i<=sizeof($row)-1; $i++) {
        if($n == $row[$i]) {
            $res = false;
            break;
        }
    }

    return $res;
}

function selectColumn($sudoku, $column) {
    $res = array();
    for($i=0; $i<=sizeof($sudoku[0])-1; $i++) {
        array_push($res, $sudoku[$i][$column]);
    }

    return $res;
}

function comprobarColumna($n, $columna) {
    $res = true;
    for($i=0; $i<=sizeof($columna)-1; $i++) {
        if($n == $columna[$i]) {
            $res = false;
            break;
        }
    }

    return $res;
}

function selectSquare($sudoku, $row, $column) {
    $minRow = 0;
    $maxRow = 0;
    $minColumn = 0;
    $maxColumn = 0;
    if($row>=0 && $row<=2) {
        $minRow = 0;
        $maxRow = 2;
    } elseif($row>=3 && $row<=5) {
        $minRow = 3;
        $maxRow = 5;
    } else {
        $minRow = 6;
        $maxRow = 8;
    }
    if($column>=0 && $column<=2) {
        $minColumn = 0;
        $maxColumn = 2;
    } elseif($column>=3 && $column<=5) {
        $minColumn = 3;
        $maxColumn = 5;
    } else {
        $minColumn = 6;
        $maxColumn = 8;
    }

    $res = array();
    for($i=$minRow; $i<=$maxRow; $i++) {
        for($j=$minColumn; $j<=$maxColumn; $j++) {
            array_push($res, $sudoku[$i][$j]);
        }
    }

    return $res;
}

function comprobarCuadrado($n, $square) {
    $res = true;
    for($i=0; $i<sizeof($square)-1; $i++) {
        if($n == $square[$i]) {
            $res = false;
            break;
        }
    }

    return $res;
}