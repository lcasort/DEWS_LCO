<?php

    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    // Si hemos iniciado sesión se nos redirige a 'productos.php'.
    if(isset($_SESSION['login'])) {

        header('Location: ./productos.php');
        exit();

    // Si hemos enviado el formulario de inicio de sesión...
    } elseif(isset($_POST['submit']) && !empty($_POST['submit'])) {

        // Activamos los errores por pantalla.
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Abrimos la conexión con la base de datos.
        $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

        // Guardamos en la variable $error el código de error de la última
        // llamada a la base de datos.
        $error = $conexion->connect_errno;
        // Guardamos en $error_message el mensaje de error que queremos mostrar
        // por pantalla en caso de que exista.
        $error_message = ""; 

        // Si hay errores, guardamos en $error_message el mensaje de error.
        if ($error != 0) {

            $error_message = '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';

        } else {

            // Guardamos el usuario y contraseñas introducidos.
            $user = $_POST['uname'];
            $psswd = $_POST['psw'];

            // Realizamos una consulta a la base de datos para buscar el usuario
            // y contraseña introducidos.
            $res = $conexion -> query("SELECT * FROM usuarios WHERE usuario = '$user' AND contrasena = '$psswd'");
            $res = $res->fetch_array();

            // Si no recibimos un array como resultado de la consulta, es decir,
            // recibimos null, guardamos en $erro_message el mensaje a mostrar
            // por pantalla.
            if(!$res) {

                $error_message = 'El usuario y/o contraseñas son erróneos.';

            // Establecemos la variable de sesión 'login' con el nombre del
            // usuario y redirigimos a 'productos.php'.
            } else {

                $_SESSION['login'] = $res['usuario'];
                header('Location: ./productos.php');
                exit();

            }

        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/login-style.css" />
</head>
<body>
    <h2>Login Form</h2>

    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                    
                <input type="submit" name="submit" id="submit" class="submit" value="Log In" >

                <!--
                    Mostramos el mensaje de error.
                -->
                <br><span class="error-msg"><?php echo $error_message; ?></span>
            </div>
        </form>
    </div>
</body>
</html>