<?php

/**
 * Función que, a partir de la lista de participantes, ubicada en la variable de ámbito global 
 * $participantes, genera un array de $n candidatos finalistas de manera aleatoria
 * 
 * @param $n: Número de candidatos que serán seleccionados
 * 
 * @return: Array con los $n candidatos seleccionados
 */
function getCandidatos($n)
{
  // Creamos un array vacío donde guardaremos los candidatos seleccionados.
  $res = [];
  // Almacenamos en la variable $max el número de participantes.
  $max = count($GLOBALS['participantes']);
  // Creamos un bucle para iterar el $n veces y obtener $n candidatos.
  for ($i=0; $i < $n; $i++) {
    // Guardamos en $index el índice del participante seleccionado aleatoriamente.
    // En caso de que ese candidato ya haya sido seleccionado previamente,
    // seguimos generando nuevos índices hasta que no lo haya sido.
    do {
      $index = rand(1, $max);
    } while(in_array($GLOBALS['participantes'][$index], $res));

    // Guardamos en el array de candidatos el participante seleccionado.
    $res[$index] = $GLOBALS['participantes'][$index];
  }

  // Retornamos el array de candidatos seleccionados aleatoriamente.
  return $res;
}

 //IMPORTANTE: Crear aquí una función llamada getCandidatos que cumpla con la descripción anterior.

 /**
 * Función que, a partir de la lista de candidatos seleccionados, ubicada en la variable pasada como parámetro $candidatos, genera una cadena HTML con el formulario para poder elegir el ganador final
 * 
 * @param $candidatos: Un array con los seleccionados a ganador.
 * 
 * @return: Cadena con el formulario que se imprimirá en el html con los candidatos seleccionados.
 */
function getFormularioCandidatosMarkup($candidatos){
  //Debes modificar esta función para que el formulario se construya dinámicament con los datos de $candidatos
  $output = '';
  $output ='<form action="ganador.php" method="post">';
  // Iteramos el array de candidatos y vamos creado el html correspondiente a cada uno.
  foreach ($candidatos as $key => $value) {
    $output .= '<div class="candidatoContainer">';
    $output .= '<h2>'. $value['nombre'] .'</h2>';
    $output .= '<img src="'. $value['imagen_url'] .'"><br><input type="submit" value="Seleccionar" name="seleccionar['. $key .']">';
    $output .= '</div>';
  }
  $output .= '</form>';
  return $output;
} 