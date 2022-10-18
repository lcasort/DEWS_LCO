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

    <div class="form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="addContainer">
                <input type="submit" value="+" name="add" />
                <input type="text" id="newDptName" placeholder="Nuevo departamento" />
            </div>

            <?php
                @ $conexion = new mysqli('localhost', 'root', '', 'employees');

                $error = $conexion->connect_errno;
                
                if ($error == null) {
                
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
                }
            ?>

            <div class="updContainer">
                <input type="submit" value="Refrerscar" name="update" />
            </div>

        </form>
    </div>

</body>
</html>