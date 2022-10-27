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

        .container {
            margin-top: 25px;
        }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 75%;
        margin: 0 auto;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    exec('cd ./my_db && /opt/lampp/bin/mysql -u root < create.sql');

    // Abrimos la conexión con la base de datos
    @ $conexion = new mysqli('localhost', 'root', '', 'my_employees');
    
    $msg = '';
    
    $error = $conexion->connect_errno;
    $error_message = "";
    if ($error != 0) {
        echo '<p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>';
        exit();
    } else {
        if (isset($_POST)&&!empty($_POST)) {
            // TODO - Aquí lo que hace al clicar en un usuario.
        } else {
            $resultado = $conexion->query('SELECT * FROM employees');

            if(empty($resultado->fetch_array())) {
                $sql = file_get_contents('./my_db/inserts.sql', FILE_USE_INCLUDE_PATH);
                $conexion->query($sql);
                $resultado = $conexion->query('SELECT * FROM employees');
            }

            $res = '<div class="container">';
            $res .= '<table>';
            $res .= '<tr>';
            $res .= '<th>ID</th>';
            $res .= '<th>First name</th>';
            $res .= '<th>Last name</th>';
            $res .= '</tr>';
            
            while ($emp = $resultado->fetch_array()) {
                $res .= '<tr>';
                $res .= '<td>' . $emp['id_employee'] . '</td>';
                $res .= '<td>' . $emp['first_name'] . '</td>';
                $res .= '<td>' . $emp['last_name'] . '</td>';
                $res .= '</tr>';
            }

            $res .= '</table>';
            $res .= '</div>';

            echo $res;
        }
    }

    $conexion->close();
    ?>
</body>
</html>