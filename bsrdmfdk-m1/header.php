<?php 
    $menu = '
        <div class="menu_items">
            <div class="menu_reg">
                <li><a href="index.php">О нас</a></li>
                <li><a href="catalog.php">Каталог</a></li>
                <li><a href="where.php">Где нас найти?</a></li>
                %s
    ';

    $m = '';
    if(isset($_SESSION["role"])){
                $m = '<li><a href="cart.php">Корзина</a></li>';
                $m .=($_SESSION["role"] == "admin") ? '<li><a href="admin.php">Заказы</a></li>' : '';
                $m .= '<li><a href="../controllers/logout.php"><button>Выход</button></a></li></div>';
    }
    else 
        $m = '
            <div class="menu_login">
                <li><a href="index.php#login"><button>Вход</button></a></li>
                <li><a href="index.php#register"><button>Регистрация</button></a></li>
            </div>
        </div>
        ';
    $menu = sprintf($menu, $m);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo/icon.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Аниме-Магазин AkiShop Аниме-магазин №1!</title>
</head>
<body>
    <header>
        <div class="top">
            <div class="logo"><a href="index.php"><img src="logo/logo1.png"></a></div>
            <div class="row">
                <a href="index.php">
                    <h1 href="index.php">Аниме-Магазин AkiShop</h1>
                </a>
            </div>
        </div>
        <div class="content1">
            <ul>
                <?= $menu ?>
            </ul>
        </div>
    </header>
    <div class="message"><?= (isset($_GET["message"])) ? $_GET["message"] : ""; ?></div>
</body>
</html>