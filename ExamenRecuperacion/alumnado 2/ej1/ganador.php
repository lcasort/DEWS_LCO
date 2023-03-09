<?php
  require_once('./vars.php');
  //Debes modificar este script para que se muestre el ganador, seleccionado (que es recibido por $_POST). Si no hay datos en $_POST debes mandar al usuario de vuelta a index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Candidatos finalistas</title>
    <style>
        
    </style>
</head>
<body>
    <?php
    // Comprobamos si hemos recibido la petición POST desde index.html y que esta
    // no está vacía. De ser así...
    if(isset($_POST['seleccionar']) && !empty($_POST['seleccionar'])) {
      // Almacenamos en $seleccionado el candidato elegido.
      $seleccionado = $GLOBALS['participantes'][array_keys($_POST['seleccionar'])[0]];
      // Mostramos por pantalla el mensaje de enhorabuena con los datos de dicho candidato.
    ?>
      <h1>¡Enhorabuena a <?php echo $seleccionado['nombre']; ?>!</h1>        
      <p><img src="<?php echo $seleccionado['imagen_url']; ?>"></p>
    <?php
    // En caso contrario redireccionamos a index.php.
    } else {
      header('Location: ./index.php');
    }
    ?>
</body>
</html>