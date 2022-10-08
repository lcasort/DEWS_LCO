<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/form.css">
    <title>SUDOKU</title>
</head>
<body>
    <?php
    require 'initializeSudoku.php';
    require 'actions.php';

    if (!isset($_POST['insertar']) && !isset($_POST['delete']) && !isset($_POST['options'])) {
        $label = $_POST['dificultad'];

        playSudokuInitialize($label);
    } else {
        $unsSudoku = unserialize(base64_decode($_POST['sudoku']));
        if (isset($_POST['insertar'])) {
            insertar($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column'], $_POST['number']);
        } elseif (isset($_POST['delete'])) {
            delete($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        } elseif (isset($_POST['options'])) {
            showOptions($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        } else {
            require_once 'errors.php';
            customError('La acción seleccionada no existe.');
        }
    }    
    ?>
</body>
</html>