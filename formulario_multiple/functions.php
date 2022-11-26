<?php
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