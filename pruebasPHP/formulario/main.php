<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <?php 
    if(empty($_POST) || empty($_POST["name"])) { ?>
        <form method="post">
            <label for="name">Nombre alumno:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="modulo">Módulo que cursa:</label>
            <select name="modulo" id="modulo">
                <option value="Desarrollo Web en Entorno Servidor" selected>Desarrollo Web en Entorno Servidor</option>
                <option value="Desarrollo Web en Entorno Cliente">Desarrollo Web en Entorno Cliente</option>
            </select><br>
            <input type="submit" value="Enviar" />
        </form>
        <?php 
    } else {
        echo "<p><pre>";
        print_r($_POST);
        echo "</pre></p>";
    }
    ?>
</body>
</html>