<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DB</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'config.php';
    require_once 'functions.php';


    // Para Ubuntu:
    // exec($config_params['db']['load']['ubuntu']);

    // Para Windows:
    exec($config_params['db']['load']['windows']);


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

        // Si hemos accedido a un usuario concreto...
        if (isset($_GET['id_employee'])&&!empty($_GET['id_employee'])) {

            // Guardamos en una variable el id del empleado seleccionado.
            $id = $_GET['id_employee'];

            // Si hemos subido una imagen y hemos clicado en enviar...
            if (isset($_POST['submit'])&&!empty($_POST['submit'])&&isset($_FILES['myImage'])&&!empty($_FILES['myImage'])) {

                // Llamamos a la función 'deletePhoto' de 'functions.php'.
                deletePhoto($conexion, $id);

                // Guardamos la fecha y hora de la subida de la foto en la variable $today.
                $today = date("Y-m-d_H-i-s");
                // Guardamos la foto subida en la variable $file.
                $file = $_FILES['myImage']['tmp_name'];
                // Guardamos la extensión de la imagen subida en la variable $ext.
                $ext = pathinfo($_FILES['myImage']['name'])['extension'];
                // Guardamos en la variable $path la ubicación y el nombre con el que queremos
                // que se guarde la foto en nuestro sistema de archivos.
                $path = './images/' . $id . '_' . $today . '.' . $ext;

                // Llamamos a la función 'updatePhoto' de 'functions.php' y
                // guardamos su retorno en la variable $msgUploadFile.
                $msgUploadFile = updatePhoto($file, $path, $id, $conexion);

            // Si hemos clicado en borrar...
            } else if (isset($_POST['delete'])&&!empty($_POST['delete'])) {

                // Llamamos a la función 'deletePhoto' de 'functions.php'.
                deletePhoto($conexion, $id);

                // Llamamos a la función 'resetPhoto' de 'functions.php' y
                // guardamos su retorno en la variable $msgDeleteFile.
                $msgDeleteFile = resetPhoto($conexion, $id);

            }

            // Llamamos a la función 'createPageUser' de 'functions.php' y
            // guardamos su retorno en la variable $inputForm.
            $inputForm = createPageUser($conexion, $id);

            $inputForm .= '<span>' . $msgUploadFile . '</span>';
            $inputForm .= '<span>' . $msgDeleteFile . '</span>';

            // Imprimimos por pantalla la variable $inputForm, con todo
            // el HTML necesario para montar la página.
            echo $inputForm;

        // En caso contrario...
        } else {

            // Recogemos todos los datos que hay en la tabla 'employees' y
            // los guardamos en la variable $resultado.
            $resultado = $conexion->query('SELECT * FROM employees');

            // Si no hay datos dentro de la tabla...
            if(empty($resultado->fetch_array())) {
                // Hacemos los inserts iniciales.
                $sql = file_get_contents($config_params['sql']['insert'], FILE_USE_INCLUDE_PATH);
                $conexion->query($sql);

                // Volvemos a recoger todos los datos que hay en la tabla 'employees' y
                // guardarlos en la variable $resultado.
                $resultado = $conexion->query('SELECT * FROM employees');
            }

            // Reseteamos el puntero del fetch_array.
            mysqli_data_seek($resultado, 0);

            // Llamamos a la función 'printTable' de 'functions.php' y
            // guardamos su retorno en la variable $res.
            $res = printTable($resultado);

            // Imprimimos por pantalla la variable $res, con todo
            // el HTML necesario para montar la página.
            echo $res;

        }
    }

    // Cerramos la conexión con la base de datos.
    $conexion->close();
    ?>
</body>
</html>