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
    $opciones = '';
    $missingData = '';
    $msg = '';
    require 'initializeSudoku.php';
    require 'actions.php';

    if (!isset($_POST['insertar']) && !isset($_POST['delete']) && !isset($_POST['options'])) {
        $label = $_POST['dificultad'];

        playSudokuInitialize($label);
    } else {
        $unsSudoku = unserialize(base64_decode($_POST['sudoku']));
        if (isset($_POST['insertar']) && !empty($_POST['number']) && !empty($_POST['row']) && !empty($_POST['column'])) {
            $msg = insertar($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column'], $_POST['number']);
        } elseif (isset($_POST['delete']) && !empty($_POST['row']) && !empty($_POST['column'])) {
            delete($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        } elseif (isset($_POST['options']) && !empty($_POST['row']) && !empty($_POST['column'])) {
            $opciones = showOptions($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        } elseif (empty($_POST['number']) || empty($_POST['row']) || empty($_POST['column'])) {
            $msg = insertar($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column'], 0);
            $missingData = '<b>Error: </b>Debe rellenar los datos.';
        } else {
            require_once 'errors.php';
            customError('La acción seleccionada no existe.');
        }
    }

    ?>

                    <label for="number">Número </label>
                    <input type="number" min=1 max=9 name="number" /><br>
                    <label for="row">Fila </label>
                    <input type="number" min=1 max=9 name="row" required/><br>
                    <label for="column">Columna </label>
                    <input type="number" min=1 max=9 name="column" required/><br>
                </div>
                <div class="buttons">
                    <input type="submit" name="insertar" value="Insertar" /><br>
                    <input type="submit" name="delete" value="Eliminar" /><br>
                    <input type="submit" name="options" value="Candidatos" />
                    <div class="candidates"><?php echo $opciones; ?></div>
                </div>
            </form>
            <span class="errorMsg"><?php echo $missingData; ?></span>
            <span class="errorMsg"><?php echo $msg; ?></span>
        </div>
    </div>

</body>
</html>