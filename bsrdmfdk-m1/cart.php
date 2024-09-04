<?php
    include "controllers/check.php";
    include "connect.php";

    $STH = $connect->prepare("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path`
                              FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`= :id");
    $STH->execute(array('id' => $_SESSION['user_id']));
    $products = "";
    while($row = $STH->fetch())
        $products .= '
            <div class="col_cart">
                <img src="'.$row["path"].'" alt="">
                <div class="row_product">
                    <h3><a href="product.php?id='.$row["product_id"].'">'.$row["name"].'</a></h3>
                    <p>'.$row["price"].'</p>
                </div>
                <div class="row_product">
                    <p><a href="controllers/delete_cart.php?id='.$row["product_id"].'">Убрать</a></p>
                    <p id="c1">'.$row["count"].'</p>
                    <p><a href="controllers/add_cart.php?id='.$row["product_id"].'">Добавить</a></p>
                </div>
            </div>
        ';
    if($products == "")
        $products = '<h3 class="text_center">Корзина пуста</h3>';
    $STH = $connect->prepare("SELECT * FROM `orders` WHERE `user_id`= :id AND `number`
                            IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC");
    $STH->execute(array('id' => $_SESSION['user_id']));
    $orders = "";
    while($row = $STH->fetch()){
        $del = ($row["status"] == "новый") ? '<p class="text-right">
                <a onclick="return confirm(\'Вы действительно хотите удалить этот заказ?\')"
                href="controllers/delete_order.php?id='.$row["order_id"].'" class="text-small">Удалить заказ</a></p>' : '';
        $orders .= ' 
            <div class="col">
                <div class="row_cart">
                    <div class="row"><h2>Заказ '.$row["number"].'</h2>'.$del.'</div>
                    <div class="row"><p>Статус:'.$row["status"].'</p><p>Количество товаров: '.$row["count"].'</p></div>
                </div>
            </div>
        ';
    }
    if($orders == "")
        $orders = '<h3 class="text-center">Список заказов пуст</h3>';
    include "header.php";
    
?>

<main>
    <div class="content_cart">
        <div class="head_cart">Ваша корзина</div>
        <div class="row_cart">
            <?= $products ?>
        </div>
        <div class="wrap1">
            <form action="controllers/checkout.php" class="w100" method="POST">
                <button>Сформировать заказ</button>
            </form>
        </div>
        <div class="head_cart">Ваши заказы</div>
        <div class="row_cart">
            <?= $orders ?>
        </div>
    </div>
</main>
<?php include "footer.php" 

/*
    $sql = sprintf("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path` FROM `orders`
    INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s'", $_SESSION["user_id"]);
    
    $result = $connect->query($sql);
    $products = "";
    while($row = $result->fetch_assoc())
    $products .= sprintf('
        <div class="col">
        <img src="%s" alt="">
        <div class="row_product">
            <h3><a href="product.php?id=%s">%s</a></h3>
            <p>%s Руб</p>
        </div>
        <div class="row_zakaz">
        <p><a href="controllers/delete_cart.php?id=%s">Убрать</a></p>
        <p id="c1">%s</p>
        <p><a href="controllers/add_cart.php?id=%s">Добавить</a></p>
        </div>
        </div>
    ', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["count"], $row["product_id"]);

    if($products == "")
    $products = '<h3 class="text-center">Корзина пуста</h3>';

    $sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC", $_SESSION["user_id"]);
    $result = $connect->query($sql);
    $orders = "";
    while ($row = $result->fetch_assoc())
    {
        $del = ($row["status"] == "Новый") ? '<p class="text-right"><a onclick="return confirm(\'Вы действительно хотите удалить этот заказ?\'"
        href="controllers/delete_order.php?id='.$row["order_id"].'" class="text-small">Удалить заказ</a></p>' : '';
        $orders .= sprintf('
        <div class="col">
        <div class="row">
        <h2>Заказ %s</h2> %s </div>
        <div class="row_kolvozakazov">
        <p>Статус: %s</p>
        <p>Количество товаров: %s</p>
        </div>
        </div>', $row["number"], $del, $row["status"], $row["count"]);
    }
    if($orders == "")
    $orders = '<h3 class="text-center">Список заказов</h3>';
    include "header.php";*/
?>