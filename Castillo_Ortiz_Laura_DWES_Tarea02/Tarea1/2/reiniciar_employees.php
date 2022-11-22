<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DB</title>
    <style>
        .msg {
            color: red;
            font-size: small;
        }
    </style>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Abrimos la conexión con la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'employees');

    // Mensajes a mostrar por pantalla.
    $msg = '';

    // Control de errores.
    $error = $conexion->connect_errno;
    $error_message = "";
    // Si existen errores...
    if ($error != 0) {
        ?>
            <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>;
        <?php 
            exit();

    // En cualquier otro caso...
    } else {

        // Si hemos enviado el formulario y...
        if (isset($_POST)&&!empty($_POST)) {

            // Si hemos clicado en el botón reboot...
            if (isset($_POST['reboot'])) {

                // Para Ubuntu
                // exec('cd ./test_db-master && /opt/lampp/bin/mysql -u root < employees.sql');

                // Para Windows
                exec('cd ./test_db-master && C:\xampp\mysql\bin\.\mysql -u root < employees.sql');
                
                // Guardamos un mensaje para avisar al usuario de que se ha
                // completando el reinicio de la base de datos. 
                $msg = 'Reboot completed.';

            }

        }
        ?>

    <!-- Imprimimos el formulario por pantalla. -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" name="reboot" value="Reboot">
    </form>
    <span class="msg"><?php echo $msg; ?></span>

    <?php 
        // Cerramos la conexión con la base de datos.
        $conexion->close();
    }
    ?>
</body>
</html>