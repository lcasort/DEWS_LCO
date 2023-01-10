<?php

    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    $error_message = ""; 
    
    // 
    if(isset($_SESSION['login'])) {

        header('Location: ./productos.php');
        exit();

    } elseif(isset($_POST['submit']) && !empty($_POST['submit'])) {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

        $error = $conexion->connect_errno;

        if ($error != 0) {

            $error_message = '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';

        } else {

            $user = $_POST['uname'];
            $psswd = $_POST['psw'];

            $res = $conexion -> query("SELECT * FROM usuarios WHERE usuario = '$user' AND contrasena = '$psswd'");
            $res = $res->fetch_array();

            if(!$res) {
                $error_message = 'El usuario y/o contraseñas son erróneos.';
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

                <br><span class="error-msg"><?php echo $error_message; ?></span>
            </div>
        </form>
    </div>
</body>
</html>