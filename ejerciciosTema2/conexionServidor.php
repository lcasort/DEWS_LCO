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
    // utilizando constructores y métodos de la programación orientada a objetos
    $conexion = new mysqli('localhost', 'root', '', 'employees');
    print $conexion->server_info;

    // utilizando llamadas a funciones
    /*
    $conexion = mysqli_connect('localhost', 'usuario', 'contraseña', 'base_de_datos');
    print mysqli_get_server_info($conexion);
    */
    ?>
</body>
</html>