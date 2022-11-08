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


    // Para Ubuntu:
    exec($config_params['db']['load']['ubuntu']);

    // Para Windows:
    // exec($config_params['db']['load']['windows']);


    // Abrimos la conexión con la base de datos.
    @ $conexion = new mysqli($config_params['db']['host'],
    $config_params['db']['user'], $config_params['db']['passwd'],
    $config_params['db']['db_name']);
    

    // Mensajes a mostrar por pantalla.
    $msg = '';
    $msgUploadFile = '';
    $msgDeleteFile = '';
    

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
        
        }

    }

    // Impresión del formulario.
    $form = '<div class="formContainer">';
    $form .= '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">';

    $resultado = $conexion->query('SELECT * FROM country');
    $i = 0;
    while(($c = $resultado->fetch_object()) && ($i<25)) {
        $form .= '<input type="submit" value="&#128260;" class="reload" name="reload[' . $c->Code . ']" />';
        $form .= '<input type="submit" value="&#128465;" class="delete" name="delete[' . $c->Code . ']" />';
        $form .= '<input type="text" value="' . $c->Name . '" name="name[' . $c->Code . ']"></input><br>';
        $i++;
    }
    
    $form .= '<input type="submit" value="&#x2795;" class="reload" name="reload[' . $c->Code . ']" />';
    $form .= '<input type="text" name="newName" class="newName" placeholder="Name of the new country"></input><br>';
    $form .= '</form>';
    $form .= '</div>';

    echo $form;

    ?>

</body>
</html>