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

    for ($i=0; $i<9; $i++) {
        for ($j=0; $j<9; $j++) {
            debug($i, $j);
            echo ' | ';
        }
        echo '<br>';
    }
    ?>
</body>
</html>