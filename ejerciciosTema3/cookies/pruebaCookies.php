<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    // Comprobamos si la variable ya existe.
    if(isset($_SESSION['visitas'])) {
        $_SESSION['visitas']++;
    } else {
        $_SESSION['visitas'] = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Número de visitas: <?php echo $_SESSION['visitas']; ?></p>
</body>
</html>