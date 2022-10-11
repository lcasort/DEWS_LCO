<?php

/*
Función para insertar un número en el sudoku.
*/
function insertar($label, $sudoku, $row, $column, $number)
{
    require_once 'declareSudokus.php';

    /*
    Comprobamos cuál es el sudoku que estamos jugando y
    lo guardamos en la variable $tableData.
    */
    $tableData = 0;
    switch($label)
    {
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

    /*
    Creamos una variable $msg en la que guardaremos un mensaje de error
    en caso de que algunos de estos se produzca.
    */
    $msg = '';
    
    // Recorremos con un bucle for los sudokus por filas.
    for ($i=0; $i<count($tableData); $i++)
    {
        $result .= '<tr>';
        
        // Y por columnas.
        for ($j=0; $j< sizeof($tableData[$i]); $j++)
        {
            /*
            Si nos encontramos en la fila y columnas seleccionadas
            y en esa posición encontramos un 0, tanto en el sudoku
            original como en el que estamos jugando:
                añadimos el número al sudoku que estamos jugando en la
                posición indicada.
            */
            if ($row-1==$i && $column-1==$j &&
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] == 0)
            {
                $sudoku[$row-1][$column-1] = $number;
                $result .= '<th class="azul">' . $number . '</th>';
            } 
            /*
            Si nos encontramos en la fila y columnas seleccionadas
            y en esa posición encontramos un 0 en el sudoku
            original pero no en el que estamos jugando:
                guardamos en $msg un mensaje de error para indicar al
                usuario que esa casilla ya se encuentra escrita.
            */
            elseif ($row-1==$i && $column-1==$j &&
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] != 0)
            {
                $result .= '<th class="azul">' . $sudoku[$i][$j] . '</th>';
                $msg = '<b>Error: </b>Elimine el número de la casilla seleccionada antes de sobreescribirlo.';
            }
            /*
            Si nos encontramos en la fila y columnas seleccionadas
            y en esa posición no encontramos un 0 en el sudoku
            original:
                guardamos en $msg un mensaje de error para indicar al
                usuario que no modificar los números en rojo.
            */
            elseif ($row-1==$i && $column-1==$j && $tableData[$i][$j] != 0)
            {
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
                $msg = '<b>Error: </b>No puede modificar los números en rojo.';
            }
            elseif ($sudoku[$i][$j]===0)
            {
                $result .= '<th class="azul">.</td>';
            }
            elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0)
            {
                $result .= '<th class="azul">' . $sudoku[$i][$j] . '</th>';
            }
            else
            {
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
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
    $result .= '<input type="hidden" name="sudoku" value="' . base64_encode(serialize($sudoku)) . '" />';

    /*
    Imprimimos por pantalla la variable $result, que contiene
    la tabla con el sudoku, así como parte del formulario.
    */
    echo $result;

    // Retornamos el mensaje de error.
    return $msg;
}

/*
Función para eliminar un número en el sudoku.
*/
function delete($label, $sudoku, $row, $column)
{
    require_once 'declareSudokus.php';

    /*
    Comprobamos cuál es el sudoku que estamos jugando y
    lo guardamos en la variable $tableData.
    */
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

    /*
    Vamos guardando en una variable llamada $result el código html
    con el que iremos formando la tabla en la que mostraremos el
    sudoku.
    */
    $result = '<div class="bloque">';
    $result .= '<h2>' . $label . '</h2>';
    $result .= '<table>';

    /*
    Creamos una variable $msg en la que guardaremos un mensaje de error
    en caso de que algunos de estos se produzca.
    */
    $msg = '';

    // Recorremos con un bucle for los sudokus por filas.
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        // Y por columnas.
        for ($j=0; $j< sizeof($tableData[$i]); $j++) {
            /*
            Si nos encontramos en la fila y columnas seleccionadas
            y en esa posición no encontramos un 0 en el sudoku
            original pero no en el que estamos jugando:
                eliminamos el número que había en esa posición en el
                sudoku que estamos jugando cambiándolo por un 0.
            */
            if ($row-1==$i && $column-1==$j &&
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] != 0)
            {
                $sudoku[$row-1][$column-1] = 0;
                $result .= '<th class="azul">.</th>';
            }
            /*
            Si nos encontramos en la fila y columnas seleccionadas
            y en esa posición no encontramos un 0 en el sudoku
            original:
                guardamos en $msg un mensaje de error para indicar al
                usuario que no eliminar los números en rojo.
            */
            elseif ($row-1==$i && $column-1==$j
            && $tableData[$i][$j] != 0)
            {
                $msg = '<b>Error: </b>No puede eliminar los números en rojo.';
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
            }
            elseif ($sudoku[$i][$j]===0)
            {
                $result .= '<th class="azul">.</th>';
            }
            elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0)
            {
                $result .= '<th class="azul">' . $sudoku[$i][$j] . '</th>';
            }
            else
            {
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
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

    echo $result;

    return $msg;
}

function showOptions($label, $sudoku, $row, $column)
{
    require_once 'declareSudokus.php';
    $tableData = 0;
    switch($label)
    {
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
    for ($i=0; $i<count($tableData); $i++)
    {
        $result .= '<tr>';
        
        for ($j=0; $j<sizeof($tableData[$i]); $j++)
        {
            if ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0)
            {
                $result .= '<th style="color: blue;">' . $sudoku[$i][$j] . '</th>';
            }
            elseif ($sudoku[$i][$j]===0)
            {
                $result .= '<th style="color: blue;">.</th>';
            }
            else
            {
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

    $candidates = '';
    if($sudoku[$row-1][$column-1]===0)
    {
        $numeros = array(1,2,3,4,5,6,7,8,9);
        foreach ($numeros as $n)
        {
            $columna = selectColumn($sudoku, $column-1);
            $square = selectSquare($sudoku, $row-1, $column-1);
            $linea = comprobarLinea($n, $sudoku[$row-1]);
            $columna = comprobarColumna($n, $columna);
            $cuadrado = comprobarCuadrado($n, $square);

            if ($linea && $columna && $cuadrado)
            {
                $candidates .= $n . ' ';
            }
        }
    }
    else
    {
        $candidates .= 'Casilla ya escrita.';
    }

    echo $result;

    return $candidates;
}

function comprobarLinea($n, $row)
{
    $res = true;
    for($i=0; $i<=sizeof($row)-1; $i++)
    {
        if($n == $row[$i])
        {
            $res = false;
            break;
        }
    }

    return $res;
}

function selectColumn($sudoku, $column)
{
    $res = array();
    for($i=0; $i<=sizeof($sudoku[0])-1; $i++)
    {
        array_push($res, $sudoku[$i][$column]);
    }

    return $res;
}

function comprobarColumna($n, $columna)
{
    $res = true;
    for($i=0; $i<=sizeof($columna)-1; $i++)
    {
        if($n == $columna[$i])
        {
            $res = false;
            break;
        }
    }

    return $res;
}

function selectSquare($sudoku, $row, $column)
{
    $index = null;
    if ($row>=0 && $row<=2 && $column>=0 && $column<=2)
    {
        $index = 0;
    }
    elseif ($row>=0 && $row<=2 && $column>=3 && $column<=5)
    {
        $index = 1;
    }
    elseif ($row>=0 && $row<=2 && $column>=6 && $column<=8)
    {
        $index = 2;
    }
    elseif ($row>=3 && $row<=5 && $column>=0 && $column<=2)
    {
        $index = 3;
    }
    elseif ($row>=3 && $row<=5 && $column>=3 && $column<=5)
    {
        $index = 4;
    }
    elseif ($row>=3 && $row<=5 && $column>=6 && $column<=8)
    {
        $index = 5;
    }
    elseif ($row>=6 && $row<=8 && $column>=0 && $column<=2)
    {
        $index = 6;
    }
    elseif ($row>=6 && $row<=8 && $column>=3 && $column<=5)
    {
        $index = 7;
    }
    else
    {
        $index = 8;
    }

    $minRow = initialRow($index);
    $maxRow = finalRow($index);
    $minColumn = initialColumn($index);
    $maxColumn = finalColumn($index);

    if ($minRow==-1 || $maxRow==-1 || $minColumn==-1 || $maxColumn==-1)
    {
        require_once 'errors.php';
        customError('Datos introducidos no válidos.');
    }

    $res = array();
    for ($i=$minRow; $i<=$maxRow; $i++)
    {
        for ($j=$minColumn; $j<=$maxColumn; $j++)
        {
            array_push($res, $sudoku[$i][$j]);
        }
    }

    return $res;
}

function comprobarCuadrado($n, $square)
{
    $res = true;
    for ($i=0; $i<sizeof($square)-1; $i++)
    {
        if ($n == $square[$i])
        {
            $res = false;
            break;
        }
    }

    return $res;
}

function initialRow($index)
{
    $minRow = -1;
    switch($index)
    {
        case 0: case 1: case 2:
            $minRow = 0;
            break;
        case 3: case 4: case 5:
            $minRow = 3;
            break;
        case 6: case 7: case 8:
            $minRow = 6;
            break;
    }

    return $minRow;
}

function finalRow($index)
{
    $maxRow = -1;
    switch($index)
    {
        case 0: case 1: case 2:
            $maxRow = 2;
            break;
        case 3: case 4: case 5:
            $maxRow = 5;
            break;
        case 6: case 7: case 8:
            $maxRow = 8;
            break;
    }

    return $maxRow;
}

function initialColumn($index)
{
    $minColumn = -1;
    switch($index)
    {
        case 0: case 3: case 6:
            $minColumn = 0;
            break;
        case 1: case 4: case 7:
            $minColumn = 3;
            break;
        case 2: case 5: case 8:
            $minColumn = 6;
            break;
    }

    return $minColumn;
}

function finalColumn($index)
{
    $maxColumn = -1;
    switch($index)
    {
        case 0: case 3: case 6:
            $maxColumn = 2;
            break;
        case 1: case 4: case 7:
            $maxColumn = 5;
            break;
        case 2: case 5: case 8:
            $maxColumn = 8;
            break;
    }

    return $maxColumn;
}