<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php

        require_once 'functions.php';

        if (!isset($_POST['submit']) && empty($_POST['submit']) &&
        !isset($_POST['submitColor']) && empty($_POST['submitColor'])) {

            echo createInitialForm();

        } elseif (isset($_POST['submit']) && !empty($_POST['submit'])) {

            $rows = $_POST['row'];
            $columns = $_POST['column'];

            $table = createArrayTable($rows, $columns);
            
            printTable($table);

            printFormColor($table);

        } elseif (isset($_POST['submitColor']) && !empty($_POST['submitColor'])) {

            $table = unserialize(base64_decode($_POST['table']));

            printTable($table);

            printFormColor($table);

            $num = countColor($table, $_POST['color']);
    
            echo '<span>Number of ' . $_POST['color'] . ' square(s): ' . $num . '</span>';

        }

    ?>
</body>
</html>