<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Departamentos - operaciones CRUD</title>

    <style>
        .mainContainer {
            margin: auto;
        }

        .registrosContainer {
            border-right: solid 1px black;
            display: inline-block;
            margin: 1rem;
            padding: 0.5rem;
        }

        .updateContainer {
            margin: 1rem;
            display: inline-block;
        }

        .error_message {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conexion = new mysqli('localhost', 'root', '', 'employees');

    $error = $conexion->connect_errno;
    $error_message = ""; 

    if ($error != 0) {
    ?>
        <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>;
    <?php 
        exit();
    } else {
        // 1.- Recogida y gestión de datos presentes en _POST
        if (isset($_POST)&&!empty($_POST)) {

            if(isset($_POST['delete'])){
                $clave = array_keys($_POST['delete']);
                $clave = $clave[0];

                if (!$conexion->query("DELETE FROM departments WHERE dept_no = '$clave'")
                || ($conexion->affected_rows == 0)) {
                    $error_message = "No existe el campo con el id que está intentando borrar.";
                }
            } else if (isset($_POST['add_button'])) {
                require_once 'functions.php';
                $name = $_POST['new_department_name'];
                $no = calculate_dept_no($conexion);

                if (!$conexion->query("INSERT INTO departments VALUES ('$no', '$name')")) {
                    $error_message = "No se puede insertar el campo.";
                }
            } else if( isset($_POST['update_button'])) {
            //Aquí gestionamos el actualizar
            }

        }
    
        // 2.- Generación e impresión del formuilario
        $resultado = $conexion->query('SELECT * FROM departments');
    ?>
    <div class="mainCointainer">
        <h1>Departamentos</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="addContainer">
                <input type="submit" value="+" name="add_button">
                <input type="text" value=""
                    placeholder="Nombre nuevo departamento" name="new_department_name">
            </div>

            <div class="registrosContainer">
        <?php
            while ($departamento = $resultado->fetch_array()) {
        ?>
                <input type="submit" value="x" name="delete[<?php echo $departamento['dept_no']; ?>]">
                <input type="text" value="<?php echo $departamento['dept_name']; ?>"
                    name="name[<?php echo $departamento['dept_no']; ?>]"> <br>
        <?php
            }
        ?>
            </div>

            <div class="updateContainer">
                <input type="submit" value="Actualizar registros" name="update_button">
            </div>
        </form>
    </div>

    <div class="error_message">
            <?php echo $error_message; ?>
    </div>

    <?php 
        $conexion->close();
    }
    ?>

</body>
</html>