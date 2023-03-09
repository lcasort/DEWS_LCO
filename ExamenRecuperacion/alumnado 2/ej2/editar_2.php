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
    $sql = "SELECT * FROM peliculas WHERE id='$id'";

    $sth = $dbh->prepare($sql);

    $sth->execute();
    $resultados = $sth->fetchAll();
    $resultados = reset($resultados);
    ?>

    <form action="./editar_3.php" method="post">
      <input type="hidden" name="id" class="id" id="id" value="<?php echo $resultados['id']; ?>">
      <label for="titulo">Título: </label>
      <input type="text" name="titulo" id="titulo" class="titulo" value="<?php echo $resultados['titulo']; ?>"><br>
      <label for="fecha_estreno">Fecha estreno: </label>
      <input type="text" name="fecha_estreno" id="fecha_estreno" class="fecha_estreno" value="<?php echo $resultados['fecha_estreno']; ?>"><br>
      <label for="duracion">Duracion: </label>
      <input type="text" name="duracion" id="duracion" class="duracion" value="<?php echo $resultados['duracion']; ?>"><br>
      <label for="genero">Género: </label>
      <input type="text" name="genero" id="genero" class="genero" value="<?php echo $resultados['genero']; ?>"><br>
      <label for="director">Director: </label>
      <input type="text" name="director" id="director" class="director" value="<?php echo $resultados['director']; ?>"><br>

      <input type="submit" value="Enviar">
    </form>

    <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p></footer>

  </body>
</html>
