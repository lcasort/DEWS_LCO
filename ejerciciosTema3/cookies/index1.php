<!DOCTYPE html>

<?php
$value = date("Y-m-d H:i:s");

setcookie("time", $value);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title>
</head>
<body>
    <?php

    if (isset($_COOKIE) && !empty($_COOKIE)) {
        echo $_COOKIE['time'];
    } else {
        echo 'Bienvenido.';
    }

    ?>
</body>
</html>