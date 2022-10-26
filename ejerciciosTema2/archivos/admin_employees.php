<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DB</title>
    <style>
        .msg {
            color: red;
            font-size: small;
        }
    </style>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Abrimos la conexión con la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'employees');

    $msg = '';

    $error = $conexion->connect_errno;
    $error_message = "";
    if ($error != 0) {
        ?>
            <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>;
        <?php 
            exit();
        } else {
            if (isset($_POST)&&!empty($_POST)) {
                if (isset($_POST['reboot'])) {
                    /*
                    sudo chgrp -R www-data /var/www/html
                    sudo gpasswd -a username www-data
                    sudo chmod -R 777 /var/www/html


                    sudo chown -R www-data:${USER} html
                    */
                    // echo exec('whoami');
                    // echo exec('chgrp -R www-data /opt/lampp/bin/mysql');
                    // echo exec('ls -laF /opt/lampp/bin/mysql');
                    // $command = '/opt/lampp/bin/mysql';
                    // echo exec('/opt/lampp/bin/mysql -u root -p employees < employees.sql', $out);
                    // var_dump($out);
                    $dir = fopen('/home/laucasort/Downloads', 'rx');
                    exec("ls /home/laucasort", $out);
                    var_dump($out);
                    echo shell_exec("ls ~/Downloads");
                    var_dump($outp);
                    // echo exec('cd /home/laucasort/Downloads/test_db-master && sudo /opt/lampp/bin/mysql -u root -p < employees.sql');
                    // $sql = readfile('/home/laucasort/Downloads/test_db-master/employees.sql');
                    // mysqli_multi_query($conexion,$sql);
                    // /home/laucasort/Downloads/test_db-master
                    // sudo /opt/lampp/bin/mysql < employees.sql
                    $msg = 'Reboot completed.';
                }
            }
        ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" name="reboot" value="Reboot">
    </form>
    <span class="msg"><?php echo $msg; ?></span>
    <?php 
        $conexion->close();
    }
    ?>
</body>
</html>