<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    //
    if(!isset($_SESSION['login'])) {
        header('Location: ./login.php');
        exit();
    } elseif(!isset($_SESSION['total'])) {
        header('Location: ./cesta.php');
        exit();
    } elseif(!isset($_SESSION['cart'])) {
        header('Location: ./productos.php');
        exit();
    } elseif(isset($_POST['new']) && !empty($_POST['new'])) {
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        header('Location: ./productos.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
    <link rel="stylesheet" href="css/pagar.css">
</head>
<body>
    <div id="header">
        <a href="./logoff.php"><img src="img/log-out.png" class="log-out" name="log-out" alt="log out" /></a>
        <a href="./productos.php"><img src="img/go-back.png" class="back" name="back" alt="go back" value="go back" /></a>
    </div>

    <h2>Gracias por su compra</h2>
    <p>Total de la compra: <?php echo $_SESSION['total']; ?>€</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="buttonContainer">
            <input type="submit" name="new" class="new" value="Nueva compra">
        </div>
    </form>
</body>
</html>