<?php

function updatePhoto($file, $path, $id, $conexion)
{
    if (move_uploaded_file($file, $path)) {

        $conexion->query("UPDATE employees SET picture = '$path' WHERE id_employee = '$id'");
        return "File is valid, and was successfully uploaded.";

    } else {

        return "Possible file upload attack!";
        
    }
}

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