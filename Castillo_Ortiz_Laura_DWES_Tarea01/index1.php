<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>SUDOKU</title>
</head>
<body>
    <?php
    include 'index0.php';

    createTable($facil, 'FÁCIL');
    createTable($medio, 'MEDIO');
    createTable($dificil, 'DIFÍCIL');

    echo '</div>';
    ?>
</body>
</html>