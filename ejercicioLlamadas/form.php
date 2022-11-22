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
    
    if(empty($_POST) || empty($_POST["duration"]) || !is_numeric($_POST["duration"])) { ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="duration">Duración de la llamada (min):</label><br>
        <input type="text" id="duration" name="duration">
        <?php
        if (isset($_POST['btnSubmit']) && empty($_POST["duration"])) {
        ?>
            <small>Debe rellenar este campo.</small><br>
        <?php
        }
        else if(isset($_POST['btnSubmit']) && !is_numeric($_POST["duration"])) {
        ?>
            <small>Introduzca un dato válido.</small>
        <?php
        }
        ?>
        <br><br>
        <input type="submit" id="btnSubmit" name="btnSubmit" value="Enviar" />
        </form>
    <?php 
    } else {
        echo "<p>Precio de una llamada de " . $_POST["duration"] . " minuto(s): ";
        $totalMinutos = (float)$_POST["duration"];
        if($totalMinutos<=TIEMPO_MINIMO) {
            echo COBRO_MINIMO . " céntimos.";
        } else {
            $dif = ceil($totalMinutos) - TIEMPO_MINIMO;
            $tot = (COBRO_ADICIONAL * $dif) + COBRO_MINIMO;
            if($tot>=100) {
                $euros = floor($tot / 100);
                $centimos = $tot - ($euros*100);
                echo $euros . " euros y " . $centimos . " céntimos.";
            } else {
                echo $tot . " céntimos.";
            }
        }
        echo "</p>"; 
    }
    ?>
</body>
</html>