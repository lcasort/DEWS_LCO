<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    //
    if(!isset($_SESSION['login'])) {
        header('Location: ./login.php');
        exit();
    } elseif(isset($_SESSION['total'])) {
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
    }

    $htmlText = '';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $conexion = new mysqli('localhost', 'root', '', 'ejtienda');

    $error = $conexion->connect_errno;
    $error_message = "";

    if ($error != 0) {

        $error_message = '<p>Error de conexión a la base de datos. Texto del error:' . $conexion->connect_error . '</p>';
        exit();

    } else {

        // Obtenemos el número de la página en la que estamos.
        if (isset($_GET['page_no']) && !empty($_GET['page_no'])) {
            $page_no = $_GET['page_no'];
            $_SESSION['page'] = $_GET['page_no'];
        } else {
            $page_no = 1;
            $_SESSION['page'] = $page_no;
        }

        // Guardamos el número de productos que queremos enseñar.
        $total_records_per_page = 3;

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

        // Seleccionamos las entradas que queremos enseñar y guardamos el html en
        // una variable.
        $result = $conexion -> query("SELECT * FROM producto LIMIT $offset, $total_records_per_page");
        while($row = $result -> fetch_array()){
            $htmlText .= '<tr>';
            $htmlText .= '<td>'.$row['nombre_corto'].'</td>';
            $htmlText .= '<td>'.$row['descripcion'].'</td>';
            $htmlText .= '<td>'.$row['PVP'].'€</td>';
            $htmlText .= '</tr>';
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

    <h2>Productos</h2>
    <div class="container">
        <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
            <table id="products">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>PVP</th>
                </tr>
                <?php echo $htmlText; ?>
            </table>

            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>
            <div class="pagination">
                <?php
                    if($page_no > 1){
                        echo "<li><a href='?page_no=1'>First Page</a></li>";
                        echo "<li><a href='?page_no=$previous_page'>Previous</a></li>";
                    }
                    if($page_no < $total_no_of_pages) {
                        echo "<li><a href='?page_no=$next_page'>Next</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    }
                ?>
</ul>       </div>

            <div class="buttonContainer">
                <input type="submit" name="buy" class="buy" value="Añadir a la cesta de la compra">
            </div>
        </form>
    </div>

    <span><?php echo $error_message; ?></span>
</body>
</html>