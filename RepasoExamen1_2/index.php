<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World</title>
</head>
<body>
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'config.php';
    require_once 'functions.php';


    /*
    ------------------------------------------------------------------------
    Esto tenemos que activarlo para cargar la base de datos por primera vez.
    ------------------------------------------------------------------------
    */
    // Para Ubuntu:
    // exec($config_params['db']['load']['ubuntu']);

    // Para Windows:
    // exec($config_params['db']['load']['windows']);
    


    // Abrimos la conexión con la base de datos.
    @ $conexion = new mysqli($config_params['db']['host'],
    $config_params['db']['user'], $config_params['db']['passwd'],
    $config_params['db']['db_name']);
    

    // Mensajes a mostrar por pantalla.
    $msg = '';
    

    // Control de errores.
    $error = $conexion->connect_errno;
    $error_message = "";
    // Si existen errores...
    if ($error != 0) {

        echo '<p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>';
        exit();

    // En caso contrario...
    } else {

        // Recogida y gestión de datos presentes en $_POST.
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['delete']) && !empty($_POST['delete'])) {

                $id = array_keys($_POST['delete']);
                $id = reset($id);
                
                if (!$conexion->query("DELETE FROM city WHERE ID = '$id'") ||
                $conexion->affected_rows == 0) {

                    $msg = 'Error al eliminar.';

                }

            } elseif (isset($_POST['reload']) && !empty($_POST['reload'])) {

                $id = array_keys($_POST['reload']);
                $id = reset($id);

                foreach ($_POST[$id] as $key => $val) {

                    if(!$conexion->query("UPDATE city SET Name = '$val' WHERE ID = '$id' AND '$val' != ''")) {

                        $msg = 'Error al actualizar.';

                    }
                    
                }

            } elseif (isset($_POST['add']) && !empty($_POST['add'])) {

                $name = $_POST['newName'];
                $country = $_POST['country'];
                $district = $_POST['district'];
                $population = $_POST['population'];

                $countryCode = null;
                if($country != null) {
                    $countryCode = $conexion->query("SELECT Code FROM country WHERE Code = '$country'");
                    $countryCode = $countryCode->fetch_array();
                    
                    if ($countryCode != null) {
                        $countryCode = reset($countryCode);
                    } else {
                        $msg = 'Country code entered does not exist.';
                    }
                }
                
                if($name != null && $countryCode != null && $district != null && $population != null) {
                    if(!$conexion->query("INSERT INTO city(Name,CountryCode,District,Population) VALUES ('$name','$countryCode','$district','$population')")) {
                        $msg = 'Error al hacer el insert.';
                    }
                } elseif($msg == '') {
                    $msg = 'Introduce todos los valores.';
                }

            }
        }

    }

    // Impresión del formulario.
    $form = '<div class="formContainer">';
    $form .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">';

    $resultado = $conexion->query('SELECT * FROM city');
    $i = 0;
    while(($c = $resultado->fetch_object()) && ($i<25)) {
        $form .= '<input type="submit" value="&#128260;" class="reload" name="reload[' . $c->ID . ']" />';
        $form .= '<input type="submit" value="&#128465;" class="delete" name="delete[' . $c->ID . ']" />';
        $form .= '<input type="text" value="' . $c->Name . '" name="' . $c->ID . '[' . $c->Name . ']"></input><br>';
        $i++;
    }
    
    $form .= '<input type="submit" value="&#x2795;" class="add" name="add" />';
    $form .= '<input type="text" name="newName" class="newName" placeholder="Name of the new city"></input><br>';
    $form .= '<input type="text" name="country" class="country" placeholder="Code of the country"></input><br>';
    $form .= '<input type="text" name="district" class="district" placeholder="Name of the district"></input><br>';
    $form .= '<input type="number" name="population" class="population" placeholder="Population" value="0"></input><br>';
    $form .= '</form>';
    $form .= '</div>';
    $form .= '<span>' . $msg . '</span>';

    echo $form;

    ?>

</body>
</html>