<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente.
    session_start();

    //
    if(!isset($_SESSION['login'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/login.php');
        exit();
    } elseif(!isset($_SESSION['total'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/cesta.php');
        exit();
    } elseif(!isset($_SESSION['cart'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/productos.php');
        exit();
    } elseif(isset($_POST['new']) && !empty($_POST['new'])) {
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/productos.php');
        exit();
    } elseif(isset($_POST['log-out_x']) && !empty($_POST['log-out_y'])) {
        session_destroy();
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/login.php');
        exit();
    } elseif(isset($_POST['back_x']) || isset($_POST['back_y'])) {
        header('Location: http://localhost/DEWS_LCO/ejerciciosTema3/shop/cesta.php');
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="image" src="img/log-out.png" class="log-out" name="log-out" alt="log out" />
            <input type="image" src="img/go-back.png" class="back" name="back" alt="go back" value="go back" />
        </form>
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