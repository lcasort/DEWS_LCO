<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    $error_msg = '';
    //
    if(!isset($_SESSION['login'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/login.php');
        exit();
    } elseif(!isset($_SESSION['cart'])) {
        $error_msg = '<h2>Cesta vacía</h2><br><a href="./productos.php"><div class="buttonContainer"><button>Volver a productos</button></div></a>';
    } elseif(isset($_POST['log-out_x']) && !empty($_POST['log-out_y'])) {
        session_destroy();
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/login.php');
        exit();
    } elseif(isset($_POST['back_x']) || isset($_POST['back_y'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/productos.php');
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
    <div id="header">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="image" src="img/log-out.png" class="log-out" name="log-out" alt="log out" />
            <input type="image" src="img/go-back.png" class="back" name="back" alt="go back" value="go back" />
        </form>
    </div>

    <?php

        if($error_msg != '') {
            echo $error_msg;
            exit();
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

        $error = $conexion->connect_errno;

        if ($error != 0) {

            echo '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';
            exit();

        } else {

            $values = '(\'' . implode("','", array_values($_SESSION['cart'])) . '\')';
            $res = $conexion -> query("SELECT * FROM producto WHERE cod IN $values");

            $total = 0;
            
            $table = '<h2>Cesta de la compra</h2>';
            $table .= '<div class="container">';
            $table .= '<form action="./pagar.php" method="post">';
            $table .= '<table id="products">';
            $table .= '<tr>';
            $table .= '<th>Nombre</th>';
            $table .= '<th>PVP</th>';
            $table .= '</tr>';
            while($p = $res -> fetch_array()) {
                $table .= '<tr>';
                $table .= '<td>'.$p['nombre_corto'].'</td>';
                $table .= '<td>'.$p['PVP'].'€</td>';
                $table .= '</tr>';
                
                $total += floatval($p['PVP']);
            }
            
            $_SESSION['total'] = $total;

            $table .= '</table>';
            $table .= '<p>Tu total a pagar es: ' . $_SESSION['total'] . '€</p>';
            $table .= '<div class="buttonContainer">';
            $table .= '<input type="submit" name="pay" class="pay" value="Pagar">';
            $table .= '</div>';
            $table .= '</form>';
            $table .= '</div>';

            echo $table;

        }

        $conexion -> close();

    ?>
</body>
</html>