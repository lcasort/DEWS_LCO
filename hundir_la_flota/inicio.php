<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Actividad 3</title>
        <link rel="stylesheet" href="css/estilo-act3.css" />
    </head>
    <body>
        <header>
            <h1>Actividad 3</h1>
        </header>
        <main>
            <h2>Hundir la flota</h2>

            <div class="caja_tablero">
                <?php
               
                include_once 'php/variables.php';
                pintarTablero2();
                
                // echo base64_encode(serialize($tableroConBarcos));
                ?>          

            </div>
            <div class="acciones">
                <form method="post" action="php/jugando.php" target="_self">
                    <fieldset>
                        <legend>Al ataque...!!!</legend>
                        <!-- Con la expresión regular indicamos que solo son admitidos números del 1 al 9 
                        y se hace el primer tiro-->
                        <label for="fila" id="fila">Fila</label>
                        <input type="text" id="fila" pattern="^([1-9])$" name="fila" required placeholder="del 1 al 9" maxlength="1"/>
                        <label for="col" id="col">Columna</label>
                        <input type="text" id="col" pattern="^([1-9])$" name="col" required placeholder="del 1 al 9" maxlength="1"/>
                        <br/>
                        
                        <input id="accion" type="submit" name="jugar" value="jugar"/>
                        <!-- FORMULARIO OCULTO  
                        Donde se enviar el tablero y el contador a jugando.php-->
                       
                        <input type="hidden" name="contador" value="<?php echo "$contador"; ?>"/>
                        <input type="hidden" name="tableroConBarcos" 
                               value="<?php echo base64_encode(serialize($tableroConBarcos)); ?>" />
                    </fieldset>
                </form>
            </div>

        </main>
    </body>
</html>
