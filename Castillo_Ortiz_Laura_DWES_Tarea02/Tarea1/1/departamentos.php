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
    
    // Conectamos con la base de datos.
    $conexion = new mysqli('localhost', 'root', '', 'employees');

    // Controlamos los errores.
    $error = $conexion->connect_errno;
    $error_message = ""; 
    // Si se han poroducido errores en la conexión...
    if ($error != 0) {
    ?>
        <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>;
    <?php 
        exit();
    
    // En cualquier otro caso...
    } else {
        // 1.- Recogida y gestión de datos presentes en _POST
        if (isset($_POST)&&!empty($_POST)) {

            // Si borramos un departamento...
            if (isset($_POST['delete'])) {

                // Guardamos el id del departamento que queremos borrar en la
                // variable $clave.
                $clave = array_keys($_POST['delete']);
                $clave = $clave[0];

                // Borramos el departamento de la base de datos.
                if (!$conexion->query("DELETE FROM departments WHERE dept_no = '$clave'")
                || ($conexion->affected_rows == 0)) {
                    $error_message = "No existe el campo con el id que está intentando borrar.";
                }
            
            // Si añadimos un departamento...
            } else if (isset($_POST['add_button'])) {

                require_once 'functions.php';

                // Guardamos en la variable $nombre el nombre del nuevo departamento.
                $name = $_POST['new_department_name'];
                // Guardamos en la variable $no el id del nuevo departamento
                // que calculamos con la función 'calculate_dept_no' en 'functions.php'.
                $no = calculate_dept_no($conexion);

                // Guardamos el nuevo departamento en la base de datos.
                if (!$conexion->query("INSERT INTO departments VALUES ('$no', '$name')")) {
                    $error_message = "No se puede insertar el campo.";
                }
            
            // Si queremos actualizar los departamentos...
            } else if(isset($_POST['update_button'])) {

                // Iteramos sobre las claves y los valores de los departamentos...
                foreach ($_POST['name'] as $key => $val) {
                    // Si el nombre del departamento no es una cadena vacía y el nombre
                    // es distinto al que ya tiene, lo actualizamos en la base de datos.
                    if (!$conexion->query("UPDATE departments SET dept_name = '$val' WHERE dept_no = '$key' AND '$val' != ''")) {
                        $error_message = "No se pudo modificar el campo.";
                    }
                }

            }

        }
    
        // 2.- Generación e impresión del formulario

        // Guaardamos en la variable $resultado todos los datos que tenemos
        // en la tabla de departamentos.
        $resultado = $conexion->query('SELECT * FROM departments');
    ?>
    <div class="mainCointainer">
        <h1>Departamentos</h1>

        <!--
            Creamos un formulario de método post.
        -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <!--
                Creamos un botón de añadir y un campo para introducir
                texto para poder añadir un nuevo departamento.
            -->
            <div class="addContainer">
                <input type="submit" value="+" name="add_button">
                <input type="text" value=""
                    placeholder="Nombre nuevo departamento" name="new_department_name">
            </div>

            <!--
                Listamos todos los nombres de los departamentos en un campo input
                de tipo texto para poder editarlos, acompañados de un botón para poder
                eliminar cada uno de ellos.
            -->
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

            <!--
                Creamos un botón para actualizar los nombres de los departamentos.
            -->
            <div class="updateContainer">
                <input type="submit" value="Actualizar registros" name="update_button">
            </div>
        </form>
    </div>

    <!--
        Mostramos el mensaje de error.
    -->
    <div class="error_message">
            <?php echo $error_message; ?>
    </div>

    <?php 
        // Cerramos la conexión con la base de datos.
        $conexion->close();
    }
    ?>

</body>
</html>