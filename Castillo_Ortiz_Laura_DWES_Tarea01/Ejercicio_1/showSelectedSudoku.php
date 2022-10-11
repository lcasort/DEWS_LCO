<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>SUDOKU</title>
</head>
<body>
    <?php
    require_once 'initializeSudoku.php';

    /*
    Recogemos el nivel de dificultad seleccionado y lo
    guardamos en una variable.
    */ 
    $label = $_POST['dificultad'];

    echo '<div class="conjunto">';
    /*
    Llamamos a la función createTable del documento initializeSudoku.php
    para inprimir por pantalla el sudoku seleccionado.
    */
    createTable($label);
    ?>
    </div>
</body>
</html>