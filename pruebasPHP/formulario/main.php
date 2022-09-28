<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <?php 
    if(empty($_POST) || empty($_POST["name"]) || empty($_POST["modulo"])) { ?>
        <form method="post">
        <label for="name">Nombre alumno:</label><br>
        <?php
        if(empty($_POST["name"])) { ?>
            <input type="text" id="name" name="name"><br>
        <?php
        } else {
        ?>
            <input type="text" id="name" name="name" value="<?php echo $_POST["name"]; ?>"><br>
        <?php
        }
        ?>
            
            <label for="modulo[]">Módulo que cursa:</label><br>
            <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Servidor"> Desarrollo Web en Entorno Servidor</label><br>
            <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Cliente"> Desarrollo Web en Entorno Cliente</label><br>
            <input type="submit" value="Enviar" />
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