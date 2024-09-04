<?php 
    session_start();
    include "connect.php";

    $role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;

    $STH = $connect->query("SELECT * FROM `products` WHERE `count` > 0 AND `product_id`=". $id);
    $STH->setFetchMode(PDO::FETCH_ASSOC);

    $product = '';
    while($row = $STH->fetch()){
        $product .= '<div class="head_product">'.$row["name"].'</div>
        <div class="product_wrap">
        <div class="test_product">
                <img src="'.$row["path"].'" alt="">
                <div class="text_product">
                    <h3>Характеристики: </h3>
                    <p>Страна: '.$row["country"].'</p>
                    <p>Год выпуска: '.$row["year"].'</p>
                    <p>Модель: '.$row["model"].'</p>
                    <hr>
                    <p>Цена: '.$row["price"].'</p>
                </div>';
        if($role == "admin")
        $product .= '
                    <div class="row">
                        <p><a href="update.php?id='.$row["product_id"].'"
                        class="text-small">Редактировать</a></p>
                        <p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')"
                        href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
                    </div>';
        if($role !="guest")
        $product .= '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"].'"
        class="text-small"><button>В корзину</button></a></p>';
        $product .= '</div></div>';
    }
    include "header.php";

    /*
    session_start();
    include "connect.php";
    include "header.php";
    $role = (isset($_SESSION["role"]))? $_SESSION["role"] : "guest";
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    $sql = "SELECT * FROM `products` WHERE `count` >0 AND `product_id`=". $id;
    if(!$result = $connect->query($sql))
    return die ("Ошибка получения данных: ". $connect->error);
    if (!$product = $result->fetch_assoc())
    return header("Location:index.php?message=Товар отсуствует")*/
?>

<main>
    <div class="content">
        <div class="content_product">
            <?= $product?>
        </div>
    </div>
</main>
<?php include "footer.php"?>