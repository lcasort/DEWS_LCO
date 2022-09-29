<!DOCTYPE html>
<html lang="es-es">
<head>
    <meta charset="UTF-8">
    <title>Actividad formulario con validación</title>
</head>
    <body>

    <?php
        #Si los datos están bien, imprime:
        if((!empty($_POST['name']) && isset($_POST['name']))&&(!empty($_POST['checkbox']) && isset($_POST['checkbox']))){
            print "Nombre: ". $_POST['name']. "</br>";
            foreach($_POST['checkbox'] as $modulo){
            print "Modulo: ".$modulo."<br/>";
            }
        }else{ 
            #Ahora realizamos el formulario:
    ?>
            <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; #Acción sobre el propio formulario, se envía a esta página ?>">
                <p>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" value="<?php if(!empty($_POST["name"] && isset($_POST['name']))){echo $_POST["name"];} ?>"/>

                    <?php if(isset($_POST['enviar']) && empty($_POST['name'])){ 
                        #Si una vez que enviamos el formulario existen datos vacíos
                        echo "Debes introducir los datos.";
                    }?>
                </p>
                <p>
                    <label for="modulos">Módulos </label>

                    <input name="checkbox[]" type="checkbox" id="DWS" value="Desarrollo Web en Entorno Servidor" 
                    <?php if(!empty($_POST["checkbox"]) && in_array("Desarrollo Web en Entorno Servidor",$_POST["checkbox"])){echo 'checked';} ?>
                    >Desarrollo Web en Entorno Servidor</input>
    
                    <input name="checkbox[]" type="checkbox" id="DWC" value="Desarrollo Web en Entorno Cliente" 
                    <?php if(!empty($_POST["checkbox"]) && in_array("Desarrollo Web en Entorno Cliente",$_POST["checkbox"])){echo 'checked';} ?>
                    >Desarrollo Web en Entorno Cliente</input>
        
                    <?php
                        if(isset($_POST['enviar']) && empty($_POST['checkbox'])){ 
                        #Si una vez que enviamos el formulario existen datos vacíos
                        echo "Debes introducir los datos.";
                        }
                    ?>
                </p>
                <input type="submit" value="Enviar" name="enviar" />
            </form>
    <?php
        }
    ?>

    </body>
</html>