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
    include 'initializeSudoku.php';

    $label = $_POST['dificultad'];

    createTable($label);
    ?>

    <!-- Aqu� van los campos de entrada para interactuar con el sudoku. -->
        <div class="form">
            <form action="" method="POST">
                
            </form>
        </div>
    </div>
</body>
</html>