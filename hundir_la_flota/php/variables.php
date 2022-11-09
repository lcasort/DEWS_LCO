<?php

// Array para el tablero.

$tablero = array(
    array("", "1", "2", "3", "4", "5", "6", "7", "8", "9"), //1
    array("A", "", "", "", "", "", "", "", "", ""), //2
    array("B", "", "", "", "", "", "", "", "", ""), //3
    array("C", "", "", "", "", "", "", "", "", ""), //4
    array("D", "", "", "", "", "", "", "", "", ""), //5
    array("F", "", "", "", "", "", "", "", "", ""), //6
    array("G", "", "", "", "", "", "", "", "", ""), //7
    array("H", "", "", "", "", "", "", "", "", ""), //8
    array("I", "", "", "", "", "", "", "", "", ""), //9
    array("J", "", "", "", "", "", "", "", "", "")//10
);

// tablero con algun barco pintado.

$tableroConBarcos = array(
    array("", "1", "2", "3", "4", "5", "6", "7", "8", "9"), //1
    array("A", "", "", "", "b", "b", "", "", "", ""), //2
    array("B", "", "", "", "", "", "", "", "", ""), //3
    array("C", "", "", "", "", "", "", "", "", ""), //4
    array("D", "", "", "", "b", "", "", "", "", ""), //5
    array("F", "", "", "", "b", "", "", "", "", ""), //6
    array("G", "", "", "", "b", "", "", "", "", ""), //7
    array("H", "", "", "", "", "", "", "", "", ""), //8
    array("I", "", "", "", "", "", "", "", "", ""), //9
    array("J", "", "", "", "", "", "", "", "", "")//10
);

$tableroConBarcos2 = array(
    array("", "1", "2", "3", "4", "5", "6", "7", "8", "9"), //1
    array("A", "", "", "", "b", "b", "", "", "", ""), //2
    array("B", "", "", "", "", "", "", "", "", ""), //3
    array("C", "", "", "", "", "", "", "", "", ""), //4
    array("D", "", "", "", "b", "", "", "", "", ""), //5
    array("F", "", "", "", "b", "", "", "", "", ""), //6
    array("G", "", "", "", "b", "", "", "", "", ""), //7
    array("H", "", "", "", "", "", "", "", "", ""), //8
    array("I", "", "", "", "", "", "", "", "", ""), //9
    array("J", "", "", "", "", "", "", "", "", "")//10
);



// barcos

$barcos = array(
    "portaviones" => 4,
    "submarinoA" => 3,
    "submarinoB" => 3,
    "acorazado" => 3,
    "destructorA" => 2,
    "destructorB" => 2,
    "destructorC" => 2,
    "fragataA" => 1,
    "fragataB" => 1
);

// tocado y agua.
$agua = "~";
$tocado = "X";

/*
se inicializa en 1, ya que viene de la pagina de inicio.php y ahi ya se ha pulsado una vez
 * si le pongo 0 no funciona. */

$contador = 1;

// funcion para pintar el tablero.

function pintarTablero() {
    /*
     * Con dos bucles foreach anidado, el primero recorre usando la clave
     * El segundo recorre por la clave el valor.
     * Intercalando echo para ir pintando la tabla.
     */
    global $tablero;

    echo "<table class='tablero'>";

    foreach ($tablero as $key) {
        echo "<tr>";
        foreach ($key as $var) {
            echo "<td>" . $var . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// pintar tableron con algun barco.

function pintarTablero2() {
    /*
     * Con dos bucles foreach anidado, el primero recorre usando la clave
     * El segundo recorre por la clave el valor.
     * Intercalando echo para ir pintando la tabla.
     */
    global $tableroConBarcos;

    echo "<table class='tablero'>";

    foreach ($tableroConBarcos as $key) {
        echo "<tr>";
        foreach ($key as $var) {
            echo "<td>" . $var . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function pintarTablero22() {
    /*
     * Con dos bucles foreach anidado, el primero recorre usando la clave
     * El segundo recorre por la clave el valor.
     * Intercalando echo para ir pintando la tabla.
     */
    global $tableroConBarcos2;

    echo "<table class='tablero'>";

    foreach ($tableroConBarcos2 as $key) {
        echo "<tr>";
        foreach ($key as $var) {
            echo "<td>" . $var . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


// funcion para contar los tiros.

function contarTiros() {
    global $contador;
    $contador++;
    return $contador;
}

/**
 * CORR: Necesita esta función para modificar el tablero.
 */
function pintarTablero2Play($tableroPost) {
    /*
     * Con dos bucles foreach anidado, el primero recorre usando la clave
     * El segundo recorre por la clave el valor.
     * Intercalando echo para ir pintando la tabla.
     */
    global $tableroConBarcos2;
    global $agua;
    global $tocado;

    // CORR: Recogemos los datos de fila y columna.
    $f = $_POST['fila'];
    $c = $_POST['col'];

    echo "<table class='tablero'>";

    for ($i=0; $i<count($tableroPost); $i++) {
        echo "<tr>";
        for ($j=0; $j<count($tableroPost[$i]); $j++) {
            if ($tableroPost[$i][$j] == '' && $f == $i && $c == $j) {
                echo "<td>" . $agua . "</td>";
                $tableroPost[$i][$j] = $agua;
            } elseif ($tableroPost[$i][$j] == 'b' && $f == $i && $c == $j) {
                echo "<td>" . $tocado . "</td>";
                $tableroPost[$i][$j] = $tocado;
            } else {
                echo "<td>" . $tableroPost[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    return $tableroPost;
}