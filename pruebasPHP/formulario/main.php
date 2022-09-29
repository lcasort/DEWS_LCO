<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <?php 
    if(empty($_POST) || empty($_POST["name"]) || empty($_POST["modulo"])) { ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Nombre alumno:</label><br>
        <input type="text" id="name" name="name" value="<?php if(!empty($_POST["name"]) && isset($_POST['name'])) echo $_POST["name"]; ?>"><br>
        <?php
        if (empty($_POST["name"]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        ?>
            <small>Debe rellenar este campo.</small><br>
        <?php
        }
        ?>
            
        <label for="modulo[]">Módulo que cursa:</label><br>
        <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Servidor" <?php if(!empty($_POST["modulo"]) && in_array("Desarrollo Web en Entorno Servidor", $_POST["modulo"])) echo 'checked';?>> Desarrollo Web en Entorno Servidor</label><br>
        <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Cliente" <?php if(!empty($_POST["modulo"]) && in_array("Desarrollo Web en Entorno Cliente", $_POST["modulo"])) echo 'checked';?>> Desarrollo Web en Entorno Cliente</label><br>
            
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST["modulo"])) {
        ?>
            <small>Debe seleccionar al menos un campo.</small><br>
        <?php
        }
        ?>   
        <input type="submit" id="btnSubmit" name="btnSubmit" value="Enviar" />
        </form>
    <?php 
    } else {
        echo "<p>Alumno: " . $_POST["name"] . "</p>";
        if(count($_POST["modulo"])>1) {
            echo "<p>Módulos:<br>";
        } else {
            echo "<p>Módulo:<br>";
        }
        
        foreach($_POST["modulo"] as $modulo) {
            echo "· " . $modulo . "<br>";
        }
        echo "</p>";
    }
    ?>
</body>
</html>