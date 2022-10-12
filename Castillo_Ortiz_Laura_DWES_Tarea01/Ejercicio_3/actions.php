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
            y en esa posición encontramos un 0, tanto en el sudoku
            original como en el que estamos jugando:
                añadimos el número al sudoku que estamos jugando en la
                posición indicada.
            */
            if ($row-1==$i && $column-1==$j &&
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] == 0) {
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
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] != 0) {
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
            elseif ($row-1==$i && $column-1==$j && $tableData[$i][$j] != 0) {
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
                $msg = '<b>Error: </b>No puede modificar los números en rojo.';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th class="azul">.</td>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th class="azul">' . $sudoku[$i][$j] . '</th>';
            } else {
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
            $tableData[$i][$j] == 0 && $sudoku[$i][$j] != 0) {
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
            && $tableData[$i][$j] != 0) {
                $msg = '<b>Error: </b>No puede eliminar los números en rojo.';
                $result .= '<th class="rojo">' . $sudoku[$i][$j] . '</th>';
            } elseif ($sudoku[$i][$j]===0) {
                $result .= '<th class="azul">.</th>';
            } elseif ($sudoku[$i][$j]!=0 && $tableData[$i][$j]==0) {
                $result .= '<th class="azul">' . $sudoku[$i][$j] . '</th>';
            } else {
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
Función para mostrar los valores posibles para una casilla.
*/
function showOptions($label, $sudoku, $row, $column)
{
    require_once 'declareSudokus.php';

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

    // Recorremos con un bucle for los sudokus por filas.
    for ($i=0; $i<count($tableData); $i++) {
        $result .= '<tr>';
        
        // Y por columnas.
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
    Creamos una variable $candidates en la que iremos guardando los
    números posibles.
    */
    $candidates = '';
    // Si no hay ningún número en la casilla que estamos comprobando...
    if ($sudoku[$row-1][$column-1]===0) {
        $numeros = array(1,2,3,4,5,6,7,8,9);
        /*
        Iteramos sobre un array con los números del 1 al 9
        y vamos comprobando cúal es posible y cuál no.
        */
        foreach ($numeros as $n) {
            $linea = comprobarLinea($n, $sudoku[$row-1]);
            $columna = comprobarColumna($sudoku, $column-1, $n);
            $cuadrado = comprobarCuadrado($sudoku, $row-1, $column-1, $n);

            /*
            Si es posible tanto en la línea, como en la columna y
            en su cuadrado, lo añadimos a nuestra variable $candidates.
            */
            if ($linea && $columna && $cuadrado) {
                $candidates .= $n . ' ';
            }
        }
    }
    /*
    Si ya hay un número en la casilla,
    se lo dejamos saber al usuario.
    */
    else {
        $candidates .= 'Casilla ya escrita.';
    }

    /*
    Imprimimos por pantalla la variable $result, que contiene
    la tabla con el sudoku, así como parte del formulario.
    */
    echo $result;

    // Retornamos los números posibles.
    return $candidates;
}


/*
Función para comprobar si un número es una posible opción en la fila.
Es decir, dicho número no existe en dicha fila.
*/
function comprobarLinea($n, $row)
{
    /*
    Damos por hecho que el número que estamos comprobando es una opción
    válida, por lo que declaramos una variable $res con el valor true.
    */
    $res = true;
    // Recorremos la fila.
    for ($i=0; $i<=sizeof($row)-1; $i++) {
        /*
        Si el número se encuentra el la fila ponemos la variable
        $res a false y dejamos de recorrer dicha fila.
        */
        if ($n == $row[$i]) {
            $res = false;
            break;
        }
    }

    // Retornamos $res.
    return $res;
}


/*
Función para seleccionar la columna que tenemos que comprobar.
*/
function comprobarColumna($sudoku, $column, $n)
{
    /*
    Damos por hecho que el número que estamos comprobando es una opción
    válida, por lo que declaramos una variable $res con el valor true.
    */
    $res = true;
    // Recorremos la columna.
    for ($i=0; $i<=sizeof($sudoku[0])-1; $i++) {
        /*
        Si el número se encuentra el la columna ponemos la variable
        $res a false y dejamos de recorrer dicha columna.
        */
        if ($n == $sudoku[$i][$column]) {
            $res = false;
            break;
        }
    }

    // Retornamos $res.
    return $res;
}


/*
Función para seleccionar el cuadro que tenemos que comprobar.
*/
function comprobarCuadrado($sudoku, $row, $column, $n)
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

    /*
    Si algunas de las variables calculadas anteriormente no existen,
    mostraremos una pantalla de error indicándole al usuario que los
    datos introducidos no son válidos y finalizará el programa.
    */
    if ($minRow==-1 || $maxRow==-1 || $minColumn==-1 || $maxColumn==-1) {
        require_once 'errors.php';
        customError('Datos introducidos no válidos.');
    }

    /*
    Damos por hecho que el número que estamos comprobando es una opción
    válida, por lo que declaramos una variable $res con el valor true.
    */
    $res = true;
    // Recorremos el cuadro por filas.
    for ($i=$minRow; $i<=$maxRow; $i++) {
        // Y por columnas.
        for ($j=$minColumn; $j<=$maxColumn; $j++) {
            /*
            Si el número se encuentra el el cuadro ponemos la variable
            $res a false y dejamos de recorrer dicha cuadro.
            */
            if ($n == $sudoku[$i][$j]) {
                $res = false;
                break;
            }
        }
    }

    // Retornamos $res.
    return $res;
}


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