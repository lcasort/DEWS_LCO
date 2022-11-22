<!DOCTYPE html>
<html>
    <body>
        Alumno: <?php echo $_POST["name"]; ?><br>
        Módulo: <?php echo $_POST["modulo"]; ?>
        <p><pre><?php print_r($_POST); ?></pre></p>
        <p><pre><?php print_r($_GET); ?></pre></p>
    </body>
</html>