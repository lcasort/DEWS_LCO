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
    require_once 'initializeSudoku.php';

    createTable('FÁCIL');
    createTable('MEDIO');
    createTable('DIFÍCIL');
    ?>
    
        <div class='form'>
            <form action="showSelectedSudoku.php" method="POST">
                <div>
                    <input type="radio" id="facil" name="dificultad" value="FÁCIL" checked>
                    <label for="facil">Fácil</label>

                    <input type="radio" id="medio" name="dificultad" value="MEDIO">
                    <label for="medio">Medio</label>

                    <input type="radio" id="dificil" name="dificultad" value="DIFÍCIL">
                    <label for="dificil">Difícil</label>

                    <button type="submit">Elegir</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>