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