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

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">        
        <?php
            @ $conexion = new mysqli('localhost', 'root', '', 'employees');

            $error = $conexion->connect_errno;
            
            if ($error == null) {
            
                $resultado = $conexion->query('SELECT * FROM departments');
                $departamentos = $resultado->fetch_array();

                while ($departamentos != null) {
                    if(isset($_POST['submit'])) {
                        $resultado = $conexion->query('UPDATE departments SET dept_name = ' . $_POST[$departamentos['dept_no']] . 'WHERE ' . $departamentos['dept_name'] . '==' .$_POST[$departamentos['dept_no']]);
                    }
                    echo '<p>';
                    echo '<input type="text" name="' . $departamentos['dept_no'] . '" id="nameDpt" value="' . $departamentos['dept_name'] . '" />';
                    echo '</p>';
                    $departamentos = $resultado->fetch_array();
                }            
            }
        ?>
        <input type="submit" value="Enviar" name="submit" />
    </form>
</body>
</html>