<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            $res = $conexion -> query("SELECT * FROM producto");
            
            $table = '<div class="container">';
            $table .= '<form action="cesta.php" method="post">';
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
                $table .= '<td>'.$p['PVP'].'</td>';
                $table .= '<td><input type="checkbox" name="cart['.$p['cod'].']" />&nbsp;</td>';
                $table .= '</tr>';
            }
            $table .= '</table>';
            $table .= '<div class="buttonContainer">';
            $table .= '<input type="submit" name="buy" class="buy" value="Comprar">';
            $table .= '</div>';
            $table .= '</form>';
            $table .= '</div>';

            echo $table;

        }

    ?>
</body>
</html>