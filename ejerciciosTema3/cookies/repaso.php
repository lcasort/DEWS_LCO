<?php
    $text = '';

    if(!isset($_COOKIE['view']) && !isset($_COOKIE['counter'])) {
        setcookie('view', date("Y-m-d H:i:s"));
        setcookie('counter', 1);
    } else {
        $date = date("Y-m-d H:i:s");

        if($_COOKIE['counter']+1 <= 2) {
            setcookie('view', $date);
            $text .= $date;
        } else {
            $text .= $_COOKIE['view'];
        }
        
        $val = $_COOKIE['counter'] + 1;
        setcookie('counter', $val);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $text; ?></p>
</body>
</html>