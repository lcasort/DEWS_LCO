<?php

/**
 * Función que actualiza las footos en la base de datos
 * y las guarda en la carpeta images.
 */
function updatePhoto($file, $path, $id, $conexion)
{

    // Con move_uploaded_file la guardamos en la carpeta images.
    if (move_uploaded_file($file, $path)) {

        // Actualizamos el path de la foto en la base de datos.
        $conexion->query("UPDATE employees SET picture = '$path' WHERE id_employee = '$id'");
        return "File is valid, and was successfully uploaded.";

    } else {

        return "Possible file upload attack!";
        
    }
}

/**
 * Función para borrar una foto de la carpeta images en caso
 * de que esta no sea la imágen por defecto.
 */
function deletePhoto($conexion, $id)
{
    require 'config.php';

    // Comprobamos el path de la foto del usuario.
    $p = $conexion->query("SELECT picture FROM employees WHERE id_employee = '$id'");
    $p = $p->fetch_array();

    // Si el path no es el mismo que el de la foto por defecto, la borramos.
    if ($p['picture'] !== $config_params['img']['path']) {
        unlink($p['picture']);
    }
}

/**
 * Función para borrar la foto de la base de datos
 * y volver a la foto por defecto.
 */
function resetPhoto($conexion, $id)
{
    require 'config.php';

    // Guardamos el path de la foto por defecto.
    $defaultIconPath = $config_params['img']['path'];
    // Actualizamos el path de la foto del usuario a la foto por defecto.
    $conexion->query("UPDATE employees SET picture = '$defaultIconPath' WHERE id_employee = '$id'");

    return "File was successfully deleted.";
}

/**
 * Función para crear el HTML en el que se nos muestra la foto de perfil del usuario
 * y el formulario para poder actualizarla o borrarla. Junto con un botón para
 * volver a la página anterior.
 */
function createPageUser($conexion, $id)
{
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

    return $inputForm;
}

/**
 * Función para crear el HTML en el que se nos muestra una tabla con la información de cada
 * usuario en la base de datos en nuestra tabla de empleados.
 */
function printTable($resultado)
{
    $res = '<div class="container">';
    $res .= '<table>';
    $res .= '<tr>';
    $res .= '<th>ID</th>';
    $res .= '<th>First name</th>';
    $res .= '<th>Last name</th>';
    $res .= '<th>Picture</th>';
    $res .= '</tr>';
            
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

    return $res;
}