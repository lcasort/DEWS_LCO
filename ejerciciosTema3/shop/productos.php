<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    // Si no hemos iniciado sesión redireccionamos a 'login.php'.
    if(!isset($_SESSION['login'])) {
        header('Location: ./login.php');
        exit();
    }
    // Si está establecida la variable de sesión 'total', la borramos.
    if(isset($_SESSION['total'])) {
        unset($_SESSION['total']);
    }
    // Si está establecida la variable de sesión 'paid', borramos las variables
    // de sesión 'paid' y 'cart'.
    if(isset($_SESSION['paid'])) {
        unset($_SESSION['paid']);
        unset($_SESSION['cart']);
    }
    // Si no hemos iniciado variable de sesión 'cart', lo hacemos.
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Activamos los errores por pantalla.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Variable que usaremos para guardar el código html a mostrar.
    $table = '';

    // Abrimos la conexión con la base de datos.
    $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

    // Guardamos en la variable $error el código de error de la última
    // llamada a la base de datos.
    $error = $conexion->connect_errno;
    // Guardamos en $error_message el mensaje de error que queremos mostrar
    // por pantalla en caso de que exista.
    $error_message = ""; 

    // Si hay errores, guardamos en $error_message el mensaje de error.
    if ($error != 0) {

        $error_message = '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';

    } else {

        // Si hemos enviado el formulario de compra...
        if(isset($_POST['cart']) && !empty($_POST['cart']) &&
            isset($_POST['buy']) && !empty($_POST['buy'])) {

            // Seleccionamos el código de los productos enviados en el post.
            print_r(array_diff(array_values($_SESSION['cart']), array_keys($_POST['cart'])));
            $values = '(\'' . implode("','", array_keys($_POST['cart'])) . '\')';
            $res = $conexion -> query("SELECT cod FROM producto WHERE cod IN $values");

            echo '$_SESSION (inicial): '; print_r($_SESSION['cart']); echo '<br><br><br>';
            // Iteramos sobre los productos obtenidos de la consulta...
            $arrayRes = array();
            while($cod = $res -> fetch_array()) {
                // Si no hemos establecido la variable de sesión 'cart', la
                // inicializamos como un array vacío y le añadimos el código
                // del producto.
                array_push($arrayRes, $cod['cod']);
            }
            $_SESSION['cart'] = $arrayRes;
            
            // Redireccionamos a la página de la cesta.
            header('Location: ./cesta.php');
            exit();

        } else {
            $res = $conexion -> query("SELECT * FROM producto");
            
            $table .= '<h2>Productos</h2>';
            $table .= '<div class="container">';
            $table .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
            $table .= '<table id="products">';
            $table .= '<tr>';
            $table .= '<th>Nombre</th>';
            $table .= '<th>Descripción</th>';
            $table .= '<th>PVP</th>';
            $table .= '</tr>';
            while($p = $res->fetch_array()) {
                $table .= '<tr>';
                $table .= '<td>'.$p['nombre_corto'].'</td>';
                $table .= '<td>'.$p['descripcion'].'</td>';
                $table .= '<td>'.$p['PVP'].'€</td>';
                if(isset($_SESSION['cart']) && in_array($p['cod'], $_SESSION['cart'])) {
                    $table .= '<td><input type="checkbox" name="cart['.$p['cod'].']" checked />&nbsp;</td>';
                } else {
                    $table .= '<td><input type="checkbox" name="cart['.$p['cod'].']" />&nbsp;</td>';
                }
                $table .= '</tr>';
            }
            $table .= '</table>';
            $table .= '<div class="buttonContainer">';
            $table .= '<input type="submit" name="buy" class="buy" value="Añadir a la cesta de la compra">';
            $table .= '</div>';
            $table .= '</form>';
            $table .= '</div>';

            }

            $conexion -> close();

        }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/products.css">
</head>
<body>

    <div id="header">
        <a href="./logoff.php"><img src="img/log-out.png" class="log-out" name="log-out" alt="log out" /></a>
    </div>

    <?php echo $table; ?>

    <span><?php echo $error_message; ?></span>
</body>
</html>