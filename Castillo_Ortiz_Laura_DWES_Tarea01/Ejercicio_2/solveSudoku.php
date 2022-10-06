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
    require 'initializeSudoku.php';
    require 'declareSodukus.php';

    if(!isset($_POST['submit'])) {
        $label = $_POST['dificultad'];
        global $sudoku;
        if($_POST['dificultad']==='FÁCIL') {
            $sudoku = $facil;
        } elseif($_POST['dificultad']==='MEDIO') {
            $sudoku = $medio;
        } elseif($_POST['dificultad']==='DIFÍCIL') {
            $sudoku = $dificil;
        } else {
            require_once 'errors.php';
            customError("Dificultad no disponible.");
        }
    } else {
        if(isset($_POST['submit'])) {
            
        }
    }
    
    ?>

    <!-- Aquí debemos incluir el form para poder interactuar con el sudoku -->
    <?php 
    createTable($sudoku);
    ?>
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="number" min=1 max=9 name="row" />
                <input type="number" min=1 max=9 name="column" />
                <input type="number" min=1 max=9 name="number" />
                <input type="hidden" name="sudoku" value="<?php $sudoku; ?>" />
                <input type="submit" name="submit">Insertar</input>
            </form>
        </div>
    </div>
</body>
</html>