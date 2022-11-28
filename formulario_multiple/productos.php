<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// REQUIRES /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    require_once('functions.php');

    ////////////////////////////////////////////////////////////////////////////



    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////// COMPROBACIONES INICIALES /////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
    // Si no hemos iniciado sesión se nos redirige a la página de login.
    if(!isset($_SESSION['login'])) {
        header('Location: ./login.php');
        exit();
    }

    // Si ya hemos pasado por el carro, reseteamos el valor de la variable de
    // sesión 'total' (dinero total a pagar por los productos seleccionados).
    if(isset($_SESSION['total'])) {
        unset($_SESSION['total']);
    }

    // Si ya hemos pasado por la pantalla de pago, reseteamos todas las
    // variables de sesión menos la de login.
    if(isset($_SESSION['pay'])) {
        unset($_SESSION['pay']);
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        unset($_SESSION['page_no']);
    }

    // Si no existe la variable de sesión del carrito de la compra, la
    // inicializamos como un array vacío.
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    ////////////////////////////////////////////////////////////////////////////



    // Actualizamos el carro de la compra (variable de sesión $_SESSION['cart']).
    updateCart();

    // Iniciamos una variable en la que iremos guardando el texto html que
    // tenemos que mostrar en la página.
    $htmlText = '';

    // Establecemos que se nos muestren los errores.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Abrimos la conexión con la base de datos.
    $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

    // Comprobamos si hay errores.
    $error = $conexion->connect_errno;
    // Creamos una variable para guardar los mensajes de error e imprimirlos por
    // pantalla.
    $error_message = "";

    // Si existen errores en la conexión, guardamos el mensaje de error en la
    // vvariable '$error_message'.
    if ($error != 0) {

        $error_message = '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';

    } else {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////// PAGINACIÓN //////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        // Obtenemos el número de la página en la que estamos.
        if (isset($_SESSION['page_no']) && !empty($_SESSION['page_no']) &&
        isset($_POST['page_no']) && !empty($_POST['page_no'])) {
            $_SESSION['page_no'] = $_POST['page_no'];
            $page_no = $_SESSION['page_no'];
        } elseif(isset($_SESSION['page_no']) && !empty($_SESSION['page_no'])) {
            $page_no = $_SESSION['page_no'];
        } else {
            $page_no = 1;
            $_SESSION['page_no'] = $page_no;
        }

        // Guardamos el número de productos que queremos enseñar.
        $total_records_per_page = 5;

        // Calculamos el offset
        $offset = ($page_no-1) * $total_records_per_page;

        // Calculámos los números de las páginas anterior y posterior.
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";

        // Obtenemos el total de entradas en la tabla.
        $result_count = $conexion -> query("SELECT COUNT(*) AS total_records FROM producto");
        $total_records = $result_count -> fetch_array();
        $total_records = $total_records['total_records'];
        // Calculamos el número total de páginas que vamos a tner.
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        // Número total de páginas menos 1.
        $second_last = $total_no_of_pages - 1;

        ////////////////////////////////////////////////////////////////////////



        // Seleccionamos las entradas que queremos enseñar y guardamos el html
        // en una variable.
        $result = $conexion -> query("SELECT * FROM producto LIMIT $offset, $total_records_per_page");
        $htmlText .= createHTML($result);



        // Cerramos la conexión con la base de datos.
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

    <!--
        Mostramos él botón de logoff.
    -->
    <div id="header">
        <a href="./logoff.php"><img src="img/log-out.png" class="log-out" name="log-out" alt="log out" /></a>
    </div>


    <h2>Productos</h2>
    <div class="container">
        <!--
            Creamos un formulario con una tabla con la información de los
            productos.
        -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table id="products">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>PVP</th>
                </tr>
                <?php echo $htmlText; ?>
            </table>

            <!--
                Mostramos los botones de navegación de la página.
            -->
            <div class="navButtons">
                <?php
                    echo createNavButtons($page_no,$total_no_of_pages,$next_page,$previous_page);
                ?>
            </div>
        </form>
    </div>

    <!--
        Mostramos el mensaje de error.
    -->
    <span><?php echo $error_message; ?></span>
</body>
</html>