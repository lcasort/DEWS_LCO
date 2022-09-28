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
            <input type="text" id="name" name="name"><br>
            <label for="modulo[]">Módulo que cursa:</label><br>
            <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Servidor"> Desarrollo Web en Entorno Servidor</label><br>
            <label><input type="checkbox" id="modulo" name="modulo[]" value="Desarrollo Web en Entorno Cliente"> Desarrollo Web en Entorno Cliente</label><br>
            <input type="submit" value="Enviar" />
        </form>
        <?php 
    } else {
        echo "Alumno: " . $_POST["name"];
        echo "<br>";
        if(count($_POST["modulo"])>1) {
            echo "Módulos:<br>";
        } else {
            echo "Módulo: ";
        }
        
        foreach($_POST["modulo"] as $modulo) {
            echo $modulo . "<br>";
        }
    }
    ?>
</body>
</html>