<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
    <style>body{max-width:210mm;margin:0 auto;padding:0 1em;font-family:'Segoe UI','Open Sans',sans-serif}a{text-decoration:none;color:blue}h1{text-align:center;margin-top:0}nav,footer{text-align:center}</style>
    <title>Películas</title>
  </head>

  <body>
    <h1>Películas</h1>

    <nav><a href='index.php'>Inicio</a> | Editar</nav>

    <h2>Editar</h2>

    <?php

    require_once('connect_db.php');

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $fecha_estreno = $_POST['fecha_estreno'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $director = $_POST['director'];
    $sql = "UPDATE peliculas SET titulo='$titulo', fecha_estreno='$fecha_estreno', duracion='$duracion', genero='$genero', director='$director' WHERE id='$id' ";

    $sth = $dbh->prepare($sql);

    if($sth->execute()) {
      echo 'Película actualizada correctamente.';
    } else {
      echo 'ERROR al hacer el update.';
    }

    ?>

    <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p></footer>

  </body>
</html>
