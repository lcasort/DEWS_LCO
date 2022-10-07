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
        } 
        // elseif (isset($_POST['options'])) {

        // } else {

        // }
    }

    
    ?>

    <!-- Aquí debemos incluir el form para poder interactuar con el sudoku -->
        
                    <label for="number">Número</label>
                    <input type="number" min=1 max=9 name="number" />
                    <label for="row">Fila</label>
                    <input type="number" min=1 max=9 name="row" />
                    <label for="column">Columna</label>
                    <input type="number" min=1 max=9 name="column" />
                    
                </div>
                <div class="buttons">
                    <input type="submit" name="insertar" value="Insertar" />
                    <input type="submit" name="delete" value="Eliminar" />
                    <input type="submit" name="options" value="Candidatos" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>