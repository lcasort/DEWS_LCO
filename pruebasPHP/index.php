<!DOCTYPE html>
<html>
    <?php
        function contador() {
            // La sentencia static solo  ejecuta la 1º vez
            // (no se vuelve a asignar 0).
            static $a=0;
            $a++;
            return $a;
        }
    ?>
    <p><?php echo "HOLA MUNDO"; ?></p>
    <p><?php echo "SERVER_NAME: "; echo $_SERVER['SERVER_NAME']; ?></p>
    <p>
        <?php 
            for ($i = 1; $i <= 10; $i++) {
                echo contador() . nl2br("\n");
            }
        ?>
    </p>
</html>