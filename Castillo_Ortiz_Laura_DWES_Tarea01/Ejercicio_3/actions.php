<?php

/*
Función para seleccionar el índice del cuadro que tenemos que comprobar.
*/
function calculateIndexSquare($row, $column)
{
    $index = null;
    if ($row>=0 && $row<=2 && $column>=0 && $column<=2) {
        $index = 0;
    } elseif ($row>=0 && $row<=2 && $column>=3 && $column<=5) {
        $index = 1;
    } elseif ($row>=0 && $row<=2 && $column>=6 && $column<=8) {
        $index = 2;
    } elseif ($row>=3 && $row<=5 && $column>=0 && $column<=2) {
        $index = 3;
    } elseif ($row>=3 && $row<=5 && $column>=3 && $column<=5) {
        $index = 4;
    } elseif ($row>=3 && $row<=5 && $column>=6 && $column<=8) {
        $index = 5;
    } elseif ($row>=6 && $row<=8 && $column>=0 && $column<=2) {
        $index = 6;
    } elseif ($row>=6 && $row<=8 && $column>=3 && $column<=5) {
        $index = 7;
    } else {
        $index = 8;
    }

    return $index;
}


/*
Función para seleccionar la fila inicial del cuadro según el índice.
*/
function initialRow($index)
{
    $minRow = -1;
    switch ($index) {
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


/*
Función para seleccionar la fila final del cuadro según el índice.
*/
function finalRow($index)
{
    $maxRow = -1;
    switch ($index) {
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


/*
Función para seleccionar la columna inicial del cuadro según el índice.
*/
function initialColumn($index)
{
    $minColumn = -1;
    switch ($index) {
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


/*
Función para seleccionar la columna final del cuadro según el índice.
*/
function finalColumn($index)
{
    $maxColumn = -1;
    switch ($index) {
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


/*
Función para depurar errores.
*/
function debug($row, $column)
{
    // Calculamos el índice del cuadro que tenemos que comprobar.
    $index = calculateIndexSquare($row, $column);

    /*
    Mediante el índice, calculamos las columnas y filas inicial
    y final del cuadro.
    */
    $minRow = initialRow($index);
    $maxRow = finalRow($index);
    $minColumn = initialColumn($index);
    $maxColumn = finalColumn($index);

    echo $row . ',' . $column . ' - ' . $index
    . ' (' . $minRow . ', ' . $minColumn . ') - (' . $maxRow . ', ' . $maxColumn . ')';
}