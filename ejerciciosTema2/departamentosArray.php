<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACME</title>
    <style>
        table, tr {
            border:1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>DEPARTAMENTOS</h1>

    <table>
        <tr>
            <th>Nombre</th>
        </tr>
        <?php
            @ $conexion = new mysqli('localhost', 'root', '', 'employees');

            $error = $conexion->connect_errno;
            
            if ($error == null) {
            
                $resultado = $conexion->query('SELECT dept_name FROM departments');

                $departamentos = $resultado->fetch_array();
                while ($departamentos != null) {
                    echo '<tr><td>' . $departamentos['dept_name'] . '</td></tr>';
                    $departamentos = $resultado->fetch_array();
                }
            
                $dwes->close();
            
            }
        ?>
    </table>
</body>
</html>