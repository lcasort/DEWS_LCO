<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUDOKU</title>
</head>
<body>
    <?php
    $facil = array(array(0,0,1,9,4,8,5,0,0),
                    array(0,0,3,7,0,6,1,0,0),
                    array(0,5,0,0,0,0,0,7,0),
                    array(1,0,6,0,3,0,8,0,5),
                    array(0,0,0,0,0,0,0,0,0),
                    array(3,0,2,0,9,0,6,0,7),
                    array(0,6,0,0,0,0,0,1,0),
                    array(0,0,7,1,0,9,4,0,0),
                    array(0,0,5,8,6,3,7,0,0));
    $medio = array(array(0,0,0,0,8,4,0,0,2),
                    array(2,0,0,0,0,0,5,0,0),
                    array(0,3,0,1,0,0,0,4,0),
                    array(0,8,5,0,0,9,0,0,0),
                    array(1,7,0,0,0,0,0,2,9),
                    array(0,0,0,3,0,0,8,5,0),
                    array(0,6,0,0,0,5,0,7,0),
                    array(0,0,8,0,0,0,0,0,6),
                    array(9,0,0,4,1,0,0,0,0));
    $dificil = array(array(6,2,0,0,0,4,7,0),
                    array(5,0,3,0,9,0,0,0,0),
                    array(8,0,0,0,6,0,0,3,0),
                    array(7,0,0,0,1,0,0,0,0),
                    array(0,0,0,6,0,9,0,0,0),
                    array(0,0,0,0,8,0,0,0,6),
                    array(0,5,0,3,0,0,0,0,2),
                    array(0,0,0,7,0,0,6,0,3),
                    array(0,7,0,2,0,0,0,1,8));

    echo '<div class="conjunto">';
    function createTable($tableData, $title) {
        $result = '<div class="bloque">';
        $result .= '<h2>' . $title . '</h2>';
        $result .= '<table width="300px" height="300px">';
        for($i=0; $i<count($tableData); $i++) {
            $result .= '<tr>';

            for($j=0; $j< sizeof($tableData[$i]); $j++) {
                if($tableData[$i][$j]===0) {
                    $result .= '<th style="color: blue;">.</td>';
                } else {
                    $result .= '<th style="color: red;">' . $tableData[$i][$j] . '</td>';
                }
            }

            $result .= '</tr>';
        }

        $result .= '</table>';
        $result .= '</div>';

        echo $result;
    }
    ?>
</body>
</html>