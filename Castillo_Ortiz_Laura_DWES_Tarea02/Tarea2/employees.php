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


    // Para Ubuntu
    // exec('cd ./my_db && /opt/lampp/bin/mysql -u root < create.sql');

    // Para Windows
    exec('cd ./my_db && C:\xampp\mysql\bin\.\mysql -u root < create.sql');


    // Abrimos la conexión con la base de datos
    @ $conexion = new mysqli('localhost', 'root', '', 'my_employees');
    

    $msg = '';
    $msgUploadFile = '';
    

    $error = $conexion->connect_errno;
    $error_message = "";
    if ($error != 0) {

        echo '<p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>';
        exit();

    } else {

        if (isset($_GET['id_employee'])&&!empty($_GET['id_employee'])) {

            $id = $_GET['id_employee'];

            if (isset($_POST['submit'])&&!empty($_POST['submit'])&&isset($_FILES['myImage'])&&!empty($_FILES['myImage'])) {

                require_once 'functions.php';

                $file = $_FILES['myImage']['tmp_name'];
                $path = './images/'.basename($_FILES['myImage']['name']);

                $msgUploadFile = updatePhoto($file, $path, $id, $conexion);

            } else if (isset($_POST['delete'])&&!empty($_POST['delete'])) {
                echo 'lalala';
            }

            $resultado = $conexion->query("SELECT * FROM employees WHERE id_employee = '$id'");
            $selectedEmp = $resultado->fetch_array();

            $inputForm = '<a href="http://localhost/DEWS_LCO/Castillo_Ortiz_Laura_DWES_Tarea02/Tarea2/employees.php" class="button"><img src="./img/back.png" alt="icon" class="back" /></a>';
            $inputForm .= '<div class="dataContainer">';
            $inputForm .= '<img src="' . $selectedEmp['picture'] . '" alt="icon" class="icon" />';
            $inputForm .= '</div>';
            $inputForm .= '<div class="formContainer">';
            $inputForm .= '<form enctype="multipart/form-data" action="' . $_SERVER['PHP_SELF'] . '?id_employee=' . $id . '" method="POST">';
            $inputForm .= '<div class="input">';
            $inputForm .= '<label class="labelFile" for="myImage">Selecciona la imagen:</label>';
            $inputForm .= '<input class="inputFile" type="file" name="myImage" accept="image/png, image/gif, image/jpeg" />';
            $inputForm .= '</div>';
            $inputForm .= '<div class="submitButton">';
            $inputForm .= '<input class="submit" type="submit" value="Enviar" name="submit" />';
            $inputForm .= '</div>';
            $inputForm .= '<div class="deleteButton">';
            $inputForm .= '<input class="delete" type="submit" value="Borrar" name="delete" />';
            $inputForm .= '</div>';
            $inputForm .= '</form>';
            $inputForm .= '</div>';

            $inputForm .= '<span>' . $msgUploadFile . '</span>';

            echo $inputForm;

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
            $res .= '<th>Picture</th>';
            $res .= '</tr>';

            // Reseteamos el puntero del fetch_array
            mysqli_data_seek($resultado, 0);
            
            while ($emp = $resultado->fetch_array()) {
                $res .= '<tr>';
                $res .= '<td>' . $emp['id_employee'] . '</td>';
                $res .= '<td>' . $emp['first_name'] . '</td>';
                $res .= '<td>' . $emp['last_name'] . '</td>';
                $res .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?id_employee=' . $emp['id_employee']
                . '" title="Clica para cambiar la imagen"><img  class="img-icon" src="' . $emp['picture']
                . '" alt="icon" /></a></td>';
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