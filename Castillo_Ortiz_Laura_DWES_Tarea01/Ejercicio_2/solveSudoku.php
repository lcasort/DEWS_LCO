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

    if (!isset($_POST['insertar'])) {
        $label = $_POST['dificultad'];

        playSudokuInitialize($label);
    } else {
        $unsSudoku = unserialize(base64_decode($_POST['sudoku']));
        print_r($unsSudoku);
        // playSudoku($unsSudoku);
        // insertar($_POST['row'], $_POST['column'], $_POST['number'], $unsSudoku);
    }

    
    ?>

    <!-- Aquí debemos incluir el form para poder interactuar con el sudoku -->
        
                    <label for="row">Fila</label>
                    <input type="number" min=1 max=9 name="row" />
                    <label for="column">Columna</label>
                    <input type="number" min=1 max=9 name="column" />
                    <label for="number">Número</label>
                    <input type="number" min=1 max=9 name="number" />
                    
                </div>
                <div class="buttons">
                    <input type="submit" name="insertar" value="Insertar" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>