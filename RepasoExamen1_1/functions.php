<?php

/**
 * Función que nos crea el formulario inicial en el que se pide introducir el
 * número de filas y columnas de la tabla a crear junto con un botón para
 * enviar los datos.
 */
function createInitialForm()
{
    $initialForm = '<form action="'. $_SERVER['PHP_SELF'] . '" method="POST">';
    $initialForm .= '<label for="row">Row: </label>';
    $initialForm .= '<input type="number" value="1" name="row" id="row" min="1" />';
    $initialForm .= '<label for="column">Column: </label>';
    $initialForm .= '<input type="number" value="1" name="column" id="column" min="1" />';
    $initialForm .= '<input type="submit" name="submit" id="submit" value="submit" />';
    $initialForm .= '</form>';

    return $initialForm;
}

/**
 * Función para crear una matriz de las filas y columnas introducidas por
 * el usuario con color azul, verde o rojo escogido de manera aleatoria para
 * cada celda de la matriz.
 */
function createArrayTable($rows, $columns)
{
    $colors = array(
        '0' => 'red',
        '1' => 'blue',
        '2' => 'green'
    );

    $table = array();

    for ($i=0; $i<$rows; $i++) {

        $r = array();

        for ($j=0; $j<$columns; $j++) {

            $number = rand(0, 2);
            array_push($r, $colors[$number]);

        }

        array_push($table, $r);

    }

    return $table;
}

/**
 * Función para imprimir la tabla con los colores correspondientes a cada celda
 * por pantalla.
 */
function printTable($table)
{
    $res = '<table>';

    foreach ($table as $row) {

        $res .= '<tr>';

        foreach($row as $value) {

            $res .= '<td class="color' . ucwords($value) . '"></td>';

        }

        $res .= '</tr>';

    }

    $res .= '</res>';
    $res .= '</table>';

    echo $res;
}

/**
 * Función para imprimir por pantalla un formulario con en el que se escoja un
 * color, se envie la matriz que conforma la tabla serializada y un botón para
 * enviar los datos.
 */
function printFormColor($table)
{
    $formColor = '<form action="'. $_SERVER['PHP_SELF'] . '" method="POST">';
    $formColor .= '<select name="color">';
    $formColor .= '<option value="red">Red</option>';
    $formColor .= '<option value="blue" selected>Blue</option>';
    $formColor .= '<option value="green">Green</option>';
    $formColor .= '</select>';
    $array = base64_encode(serialize($table));
    $formColor .= '<input type="hidden" name="table" value="' . $array . '" />';
    $formColor .= '<input type="submit" name="submitColor" id="submitColor" value="submit" />';
    $formColor .= '</form>';

    echo $formColor;
}

/**
 * Función para contar cuántas veces aparece el color seleccionado en la tabla.
 */
function countColor($table, $color)
{
    $num = 0;

    foreach ($table as $row) {

        foreach($row as $value) {

            if($color == $value) {
                $num++;
            }

        }

    }

    return $num;
}