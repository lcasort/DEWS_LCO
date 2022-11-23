<?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
        exit;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejercicio: Función header para autentificación HTTP</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br />";
        echo "Contraseña: ".$_SERVER['PHP_AUTH_PW']."<br />";
    ?>
</body>

</html>