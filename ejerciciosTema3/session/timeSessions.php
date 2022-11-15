<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    // Comprobamos si la variable ya existe.
    if(isset($_SESSION['views'])) {
        array_push($_SESSION['views'], date("Y-m-d H:i:s"));
    } else {
        echo '<p>Bienvenido</p>';
        $_SESSION['views'] = array();
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
    <?php
        foreach($_SESSION['views'] as $key=>$value) {
            echo '<p>' . $key . ' => ' . $value . '</p>';
        }   
    ?>
</body>
</html>