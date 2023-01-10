<?php

/**
 * Función que almacena en una variable de tipo string el texto html necesario
 * para crear el cuerpo de la tabla de productos.
 *
 * @param  object $result
 * @return string - Texto para formar el html del cuerpo de la tabla de
 * productos.
 */
function createHTML($result)
{
    $htmlText = '';
    while($row = $result -> fetch_array()){
        $htmlText .= '<tr>';
        $htmlText .= '<td>'.$row['nombre_corto'].'</td>';
        $htmlText .= '<td>'.$row['descripcion'].'</td>';
        $htmlText .= '<td>'.$row['PVP'].'€</td>';
        if(isset($_SESSION['cart']) && in_array($row['cod'], array_keys($_SESSION['cart']))) {
            $htmlText .= '<td><input type="number" name="cart['.$row['cod'].']" min="0" value="'.$_SESSION['cart'][$row['cod']].'" /></td>';
        } else {
            $htmlText .= '<td><input type="number" name="cart['.$row['cod'].']" min="0" value="0" /></td>';
        }
        $htmlText .= '</tr>';
    }
    
    return $htmlText;
}


/**
 * Función que almacena en una variable de tipo string el texto html necesario
 * para crear los botones de navegación y la retorna.
 *
 * @param  int $page_no
 * @param  int $total_no_of_pages
 * @param  int $next_page
 * @param  int $previous_page
 * @return string - Texto para formar el html de los botones de navegación.
 */
function createNavButtons($page_no,$total_no_of_pages,$next_page,$previous_page)
{
    $res = '<div class="pagination">';
    if($page_no > 1){
        $res .= '<button type="submit" name="page_no" class="page_no" value="1">&lsaquo;&lsaquo; First Page</button>';
        $res .= '<button type="submit" name="page_no" value="'.$previous_page.'" class="page_no">Previous</button>';
    }
    if($page_no < $total_no_of_pages) {
        $res .= '<button type="submit" name="page_no" value="'.$next_page.'" class="page_no">Next</button>';
        $res .= '<button type="submit" name="page_no" value="'.$total_no_of_pages.'" class="page_no">Last &rsaquo;&rsaquo;</button>';
    }
    $res .= '</div>';

    $res .= '<div class="pages">';
    $res .= '<p>Page ' . $page_no . ' of ' . $total_no_of_pages . '</p>';
    $res .= '</div>';

    if($page_no == $total_no_of_pages) {
        $res .= '<div class="buttonContainer">';
        $res .= '<input type="submit" name="buy" class="buy" value="Añadir a la cesta de la compra">';
        $res .= '</div>';
    }

    return $res;
}

/**
 * Función que devuelve true si estamos enviando el formulario, es decir, si
 * clicamos un botón de navegación para movernos entre las páginas o el botón de
 * 'añadir a la cesta de la compra', y false en caso contrario.
 * 
 * @return bool
 */
function sendForm()
{
    return (isset($_POST['cart']) && !empty($_POST['cart'])) || isset($_POST['buy']);
}


/**
 * Función que actualiza el carro con los productos seleccionados.
 */
function updateCart()
{
    if(sendForm()) {        
        foreach($_POST['cart'] as $key => $value) {
            if($value > 0) {
                if(in_array($key, array_keys($_SESSION['cart']))) {
                    $_SESSION['cart'][$key] = $value;
                } else {
                    $_SESSION['cart'] += [$key => $value];
                }
            }
        }
        if(isset($_POST['buy'])) {
            header('Location: ./cesta.php');
            exit();
        }
    }
}