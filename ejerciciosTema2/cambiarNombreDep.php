<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACME</title>
    <style>
        .mainContainer {
            margin: 0 auto;
        }

        .regContainer {
            border-right: solid 1px black;
            display: inline-block;
        }

        .addContainer {
            margin: 20px 0;
        }
        
        .updContainer {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="mainContainer">
        <h1>DEPARTAMENTOS</h1>
    </div>

            <?php
                mysqli_report(MYSQLI_REPORT_OFF);

                @ $conexion = new mysqli('localhost', 'root', '', 'employees');
                
                if ($conexion->connect_error) {
                    echo '<p>Error de conexión a la base de datos.</p>';
                    echo $conexion->connect_error;
                    exit();
                } else {
                    echo '<div class="form">';
                    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
                    echo '<div class="addContainer">';
                    echo '<input type="submit" value="+" name="add" />';
                    echo '<input type="text" id="newDptName" placeholder="Nuevo departamento" />';
                    echo '</div>';

                    $resultado = $conexion->query('SELECT * FROM departments');
                    $departamentos = $resultado->fetch_array();

                    echo '<div class="regContainer">';
                    while ($departamentos != null) {
                        echo '<input type="submit" id="delete" value="X" name="delete_'
                        . $departamentos['dept_no'] . ' />';
                        echo '<input type="text" name="' . $departamentos['dept_no']
                        . '" id="nameDpt" value="' . $departamentos['dept_name'] . '" />';
                        echo '<br>';
                        $departamentos = $resultado->fetch_array();
                    }
                    echo '</div>';

                    echo '<div class="updContainer">';
                    echo '<input type="submit" value="Refrerscar" name="update" />';
                    echo '</div>';
                    echo '</form>';
                    $conexion->close();
                }
                
            ?>
    </div>

</body>
</html>