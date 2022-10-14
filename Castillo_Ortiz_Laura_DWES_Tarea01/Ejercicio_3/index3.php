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
    require_once 'declareSudokus.php';
    require_once 'actions.php';

    // Recorremos todas las filas.
    for ($i=0; $i<9; $i++) {
        // Y todas las columnas.
        for ($j=0; $j<9; $j++) {
            // Imprimimos por pantalla por cada fila y columna.
            debug($i, $j);
            echo ' | ';
        }
        // Cuando terminemos cada fila hacemos un salto de línea.
        echo '<br>';
    }
    ?>
</body>
</html>