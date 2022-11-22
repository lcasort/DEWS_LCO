<?php
// Utilizando constructores y métodos de la programación orientada a objetos
@ $conexion = new mysqli('localhost', 'root', '', 'employees'); // El @ es para controlar los errores (que no se muestren por pantalla).
print $conexion->server_info;

// Utilizando llamadas a funciones
/*
$conexion = mysqli_connect('localhost', 'usuario', 'contraseña', 'base_de_datos');
print mysqli_get_server_info($conexion);
*/

$error = $conexion->connect_errno;

if ($error != null) {
     echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>";
     exit();
} else {
    // TODO: Código sin error.
}

/*
Si una vez establecida la conexión, quieres cambiar la base de datos puedes usar el método select_db
(o la función mysqli_select_db de forma equivalente) para indicar el nombre de la nueva.
*/
// $conexion->select_db('otra_bd');

// Cerramos la conexión con la base de datos.
$conexion->close();
?>