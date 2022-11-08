<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php

        require_once 'functions.php';

        /*
        Si no hemos mandado el tamaño de la tabla ni el color que queremos
        contar, mostramos el formulario inicial para que el usuario nos diga
        el tamaño de la tabla.
        */
        if (!isset($_POST['submit']) && empty($_POST['submit']) &&
        !isset($_POST['submitColor']) && empty($_POST['submitColor'])) {

            // Llamamos a la función 'createInitialForm' de 'functions.php'.
            echo createInitialForm();

        /*
        Si hemos introducido el número de filas y columnas de la tabla...
        */
        } elseif (isset($_POST['submit']) && !empty($_POST['submit'])) {

            // Recogemos los datos de introducidos: número de filas y columnas.
            $rows = $_POST['row'];
            $columns = $_POST['column'];

            // Llamamos a la función 'createArrayTable' de 'functions.php' y
            // guardamos lo que devuelve en la variable $table.
            $table = createArrayTable($rows, $columns);
            
            // Llamamos a la función 'printTable' de 'functions.php'.
            printTable($table);

            // LLamammos a la función 'printFormColor' de 'functions.php'.
            printFormColor($table);

        /*
        Si hemos introducido el color que queremos contar...
        */
        } elseif (isset($_POST['submitColor']) && !empty($_POST['submitColor'])) {

            // Deserializamos el array (tabla) que nos llega en el $_POST y la
            // guardamos en la variable $table.
            $table = unserialize(base64_decode($_POST['table']));

            // Llamamos a la función 'printTable' de 'functions.php'.
            printTable($table);

            // LLamammos a la función 'printFormColor' de 'functions.php'.
            printFormColor($table);

            // Llamamos a la función 'countColor' de 'functions.php' y guardamos
            // el valor que retorna en la variable $num.
            $num = countColor($table, $_POST['color']);
    
            // Escribimos por pantalla la frase:
            //  'Number of <color> square(s): <num>'
            // donde <color> es el color que se está contando y <num> el 
            // número de veces que aparece el color.
            echo '<span>Number of ' . $_POST['color'] . ' square(s): ' . $num . '</span>';

        }

    ?>
</body>
</html>