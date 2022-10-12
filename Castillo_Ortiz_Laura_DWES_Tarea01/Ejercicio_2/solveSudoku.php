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
    /*
    Variable en la que vamos a guardar las opciones posibles
    de números cuando seleccionemos el botón de candidatos.
    */
    $opciones = '';
    /*
    Variable en la que vamos a guardar un mensaje para avisar
    al usuario de que faltan datos por introducir.
    */
    $missingData = '';
    /*
    Variable en la que vamos a guardar un mensaje de error
    que devuelve la función insertar en caso de que se produzca.
    */
    $msgInsert = '';
    /*
    Variable en la que vamos a guardar un mensaje de error
    que devuelve la función borrar en caso de que se produzca.
    */
    $msgDelete = '';

    require 'initializeSudoku.php';
    require 'actions.php';

    echo '<div class="conjunto">';

    /*
    Si es la primera vez que se carga la página (no hemos puelsado ningún botón),
    mostramos el sudoku y el formulario para interactuar con él mediante la función
    playSudokuInitialize en el archivo intializeSudoku.php.
    */
    if (!isset($_POST['insertar']) && !isset($_POST['delete']) && !isset($_POST['options'])) {
        $label = $_POST['dificultad'];

        playSudokuInitialize($label);
    }
    /*
    En caso contrario...
    */
    else {
        // Decodificamos el sudoku y lo guardamos en la variable $unsSudoku.
        $unsSudoku = unserialize(base64_decode($_POST['sudoku']));

        /*
        Si clicamos el botón insertar y hemos rellenado todos los campos,
        llamamos a la función insertar para almacenar el nuevo número en
        el sudoku y mostrar el sudoku modificado.
        */
        if (isset($_POST['insertar']) && !empty($_POST['number'])
        && !empty($_POST['row']) && !empty($_POST['column'])) {
            $msgInsert = insertar($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column'], $_POST['number']);
        }
        /*
        Si clicamos el botón borrar y hemos rellenado los campos 'fila' y
        'columna', llamamos a la función delete para borrar el número en
        esa posición en el sudoku y mostrar el sudoku modificado.
        */
        elseif (isset($_POST['delete']) && !empty($_POST['row']) && !empty($_POST['column'])) {
            $msgDelete = delete($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        }
        /*
        Si clicamos el botón candidatos y hemos rellenado los campos 'fila' y
        'columna', llamamos a la función showOptions para mostrar los números
        que podrían ir en esa posición.
        */
        elseif (isset($_POST['options']) && !empty($_POST['row']) && !empty($_POST['column'])) {
            $opciones = showOptions($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column']);
        }
        /*
        Si clicamos el botón insertar y no hemos rellenado el campo número,
        mostraremos un mensaje por pantalla para avisar al usuario de que
        debe rellenar todos los datos.
        */
        elseif (empty($_POST['number']) && isset($_POST['insertar'])) {
            $msg = insertar($_POST['dificultad'], $unsSudoku, $_POST['row'], $_POST['column'], 0);
            $missingData = '<b>Error: </b>Debe rellenar los datos.';
        }
        /*
        En caso de que no seleccionemos una acción válida, mostraremos
        una página de error avisando al usuario del error acontecido.
        */
        else {
            require_once 'errors.php';
            customError('La acción seleccionada no existe.');
        }
    }

    ?>

    <!--
        Creamos un formulario que nos permita seleccionar el número, fila y columna,
        y si queremos insertar, borrar o mostrar los candidatos. Y, en caso de existir,
        los posibles errores.
    -->
                    <label for="number">Número </label>
                    <input type="number" min=1 max=9 name="number"  value="
                    <?php
                        if (!empty($_POST["number"] && isset($_POST["number"]))) {
                            echo $_POST["number"];
                        }
                        ?>" /><br>
                    <label for="row">Fila </label>
                    <input type="number" min=1 max=9 name="row" value="
                        <?php
                        if (!empty($_POST["row"] && isset($_POST["row"]))) {
                            echo $_POST["row"];
                        }
                        ?>" required/><br>
                    <label for="column">Columna </label>
                    <input type="number" min=1 max=9 name="column" value="
                        <?php
                        if (!empty($_POST["column"] && isset($_POST["column"]))) {
                            echo $_POST["column"];
                        }
                        ?>" required/><br>
                </div>
                <div class="buttons">
                    <input type="submit" name="insertar" value="Insertar" /><br>
                    <input type="submit" name="delete" value="Eliminar" /><br>
                    <input type="submit" name="options" value="Candidatos" />
                    <div class="candidates"><?php echo $opciones; ?></div>
                </div>
            </form>
            <span class="errorMsg"><?php echo $missingData; ?></span>
            <span class="errorMsg"><?php echo $msgInsert; ?></span>
            <span class="errorMsg"><?php echo $msgDelete; ?></span>
        </div>
    </div>

</body>
</html>