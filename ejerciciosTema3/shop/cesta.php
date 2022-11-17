<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    //
    if(!isset($_SESSION['login'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/login.php');
        exit();
    } elseif(!isset($_SESSION['cart'])) {
        echo '<div class="msg-error"><span>Cesta vacía<span></div>';
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra</title>
    <link rel="stylesheet" href="css/products.css">
</head>
<body>
    <?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

        $error = $conexion->connect_errno;
        $error_message = ""; 

        if ($error != 0) {

            echo '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';
            exit();

        } else {

            $values = '(\'' . implode("','", array_values($_SESSION['cart'])) . '\')';
            $res = $conexion -> query("SELECT * FROM producto WHERE cod IN $values");
            
            $table = '<h2>Cesta de la compra</h2>';
            $table .= '<div class="container">';
            $table .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
            $table .= '<table id="products">';
            $table .= '<tr>';
            $table .= '<th>Nombre</th>';
            $table .= '<th>PVP</th>';
            $table .= '</tr>';
            while($p = $res -> fetch_array()) {
                $table .= '<tr>';
                $table .= '<td>'.$p['nombre_corto'].'</td>';
                $table .= '<td>'.$p['PVP'].'</td>';
                $table .= '</tr>';
            }
            $table .= '</table>';
            $table .= '<div class="buttonContainer">';
            $table .= '<input type="submit" name="pay" class="pay" value="Pagar">';
            $table .= '</div>';
            $table .= '</form>';
            $table .= '</div>';

            echo $table;

        }

    ?>
</body>
</html>