<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Llamadas</title>
</head>
<body>
    <?php 
    define('COBRO_MINIMO',20);
    define('TIEMPO_MINIMO',5);
    define('COBRO_ADICIONAL', 5);
    
    if(empty($_POST) || empty($_POST["now"]) || empty($_POST["departure"]) || $_POST["departure"]<$_POST["now"]) { ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="now">Día y hora actual:</label><br>
        <input type="datetime-local" id="now" name="now">
        <?php
        if (isset($_POST['btnSubmit']) && empty($_POST["now"])) {
        ?>
            <small>Debe rellenar este campo.</small><br>
        <?php
        }
        ?>
        <br>
        <label for="departure">Día y hora de salida:</label><br>
        <input type="datetime-local" id="departure" name="departure">
        <?php
        if (isset($_POST['btnSubmit']) && empty($_POST["departure"])) {
        ?>
            <small>Debe rellenar este campo.</small><br>
        <?php
        }

        if (isset($_POST['btnSubmit']) && $_POST["departure"]<$_POST["now"]) {
        ?>
            <br>
            <small>El día y hora de salida debe ser posterior al actual.</small><br>
        <?php
        }
        ?>
        <br><br>
        <input type="submit" id="btnSubmit" name="btnSubmit" value="Enviar" />
        </form>
    <?php 
    } else {
        //2022-09-30T20:25
        if($_POST["departure"] === $_POST["now"]) {
            echo "<p>La salida del vuelo es ahora.</p>";
        } else {
            echo "<p>La salida del vuelo se realizará en: ";
            $fecha_y_hora_now = explode("T", $_POST["now"]);
            $fecha_now = explode("-", $fecha_y_hora_now[0]);
            $hora_now = explode(":", $fecha_y_hora_now[1]);
            $fecha_y_hora_vuelo = explode("T", $_POST["departure"]);
            $fecha_vuelo = explode("-", $fecha_y_hora_vuelo[0]);
            $hora_vuelo = explode(":", $fecha_y_hora_vuelo[1]);
            $now = new DateTime($fecha_y_hora_now[0]);
            $dep = new DateTime($fecha_y_hora_vuelo[0]);
            echo $now->format('Y-m-d') . "\n";
            echo $dep->format('Y-m-d') . "\n";

            echo "</p>";
        }
    }
    ?>
</body>
</html>