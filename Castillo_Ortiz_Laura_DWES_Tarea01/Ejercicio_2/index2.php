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

    createTable('F�CIL');
    createTable('MEDIO');
    createTable('DIF�CIL');
    ?>
    
        <div class='form'>
            <form action="solveSudoku.php" method="POST">
                <div>
                    <input type="radio" id="facil" name="dificultad" value="F�CIL">
                    <label for="facil">F�cil</label>

                    <input type="radio" id="medio" name="dificultad" value="MEDIO">
                    <label for="medio">Medio</label>

                    <input type="radio" id="dificil" name="dificultad" value="DIF�CIL">
                    <label for="dificil">Dif�cil</label>

                    <button type="submit">Elegir</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>