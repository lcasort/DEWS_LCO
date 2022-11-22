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
            <!-- Div donde se pinta el tablero. -->
            <div class="caja_tablero">
                <?php
                include 'variables.php';
               
                //echo $_POST['tableroConBarcos'];
                // echo '<pre>'.print_r($_POST['tableroConBarcos']).'</pre>';

                // $tableroConBarcos_porPOST = base64_decode(unserialize($_POST['tableroConBarcos']));
                // CORR: 
                $tableroConBarcos_porPOST = unserialize(base64_decode($_POST['tableroConBarcos']));

                // echo ($_POST['tableroConBarcos']) ;
                // se pinta el tablero con los datos de la copia.
                // CORR: Hemos tenido que crear una función nueva que devuelve el array
                // del tablero ya modificado.
                $tableroMOD = pintarTablero2Play($tableroConBarcos_porPOST);

                /*
                  echo "<table class='tablero'>";

                  foreach ($tableroConBarcos_porPOST as $key) {
                  echo "<tr>";
                  foreach ($key as $var) {
                  echo "<td>" . $var . "</td>";
                  }
                  echo "</tr>";
                  }
                  echo "</table>";
                */
        //        pintarTablero22();


                ?> 
            </div>

            <!-- DIV - para monstrar mensaje de cuantos tiros 
                estamos haciendo.-->
            <div class="disparos">
                <?php
// contabilizar los disparos
                /* Si existe $_POST['contador'] y no esta vacio
                  la variable contador toma el valor de $_POST
                 * y se incrementa. */
                if (isset($_POST['contador']) && !empty($_POST['contador'])) {
                    $contador = $_POST['contador'];
                    $contador++;
                }

                /* Si no esta vacio $_POST imprime el párrafo. 
                  al segundo disparo empieza a contar. (teniendo el contador a 1.
                 *                  */

                if (!empty($_POST['contador'])) {
                    echo ' <p>Has disparado ' . $_POST['contador'] . '</p>';
                }

                ?>                         
            </div>
            <!-- Div - formulario para lanzar tiros. -->
            <div class="acciones">

                <!-- action nos cargara la misma página. -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                    <fieldset>
                        <legend>Al ataque...!!!</legend>
                        <!-- Con la expresión regular indicamos que solo son admitidos números del 1 al 9 
                        formulario para hacer todos los tiros.-->
                        <label for="fila" id="fila">Fila</label>
                        <input type="text" id="fila" pattern="^([1-9])$" name="fila" required placeholder="del 1 al 9" maxlength="1"/>
                        <label for="col" id="col">Columna</label>
                        <input type="text" id="col" pattern="^([1-9])$" name="col" required placeholder="del 1 al 9" maxlength="1"/>
                        <br/>
                        <!-- Se crea un input para contar los tiros -->
                        <input type="hidden" name="contador" value="<?php echo "$contador"; ?>"/>
                        <!-- CORR: Habia que volver a pasar con un input hidden el tablero modificado. -->
                        <input type="hidden" name="tableroConBarcos" 
                               value="<?php echo base64_encode(serialize($tableroMOD)); ?>" />
                        <input id="accion" type="submit" name="dispara" value="dispara"/>
                    </fieldset>
                </form>

            </div>
        </main>
    </body>
</html>