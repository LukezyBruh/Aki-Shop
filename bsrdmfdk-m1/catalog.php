<?php
    session_start();
    include "connect.php";
    
    $role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

    $STH = $connect->query("SELECT * FROM `categories`");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $categories = '';
    while($row = $STH->fetch())
        $categories .= '<option value="'.$row['category'].'">'.$row['category'].'</option>';

    $STH = $connect->query("SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $data = '';
    while($row = $STH->fetch()){
        $data .= '
            <div class="col_catalog">
                <div class="test">
                    <img src="'.$row["path"].'" alt="">
                <div class="row_catalog">
                    <h3><a href="product.php?id='.$row["product_id"].'">'.$row["name"].'</a></h3>
                    <hr>
                    <p>'.$row["price"].' Руб</p> 
                    <input type="hidden" value"'.$row["product_id"].'" name="product_id">
                    <input type="hidden" value"'.$row["year"].'" name="year">
                    <input type="hidden" value"'.$row["category"].'" name="category"></div></div>';
        if ($role == "admin")
        $data .='
                <div class="row_catalog_admin">
                    <p><a href="update.php?id='.$row["product_id"].'"
                    class="text-small">Редактировать</a></p>
                    <p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')"
                    href="controllers/delete_product.php?id='.$row["product_id"].'"
                    class="text-small">Удалить</a></p>
                </div>';
        if ($role != "guest")
        $data .='<p class="text-right"><a href="controllers/add_cart.php?id='.$row["product_id"] .'"
                       class="text-small"><button>В корзину</button></a></p> ';
        $data .='</div>';
    }
    if ($data == "")
            $data = '<h3 class="text-center">Товары отсутствуют</h3>';
    include "header.php";
?>

<main>
    <div class="content">
        <div class="head_catalog">Наши товары</div>
            <div class="products">
                <?= $data ?>
            </div>
    </div>
</main>
<?php include "footer.php" ?>

<?php 
/*
    session_start();
    include "connect.php";
    $sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC";
    if (!$result = $connect->query($sql))
        return die ("Ошибка получаения данных: ". $connect->error);

    $data = "";
    while($row = $result->fetch_assoc())
        $data .= sprintf('
            <div class="col_tovars">
                <img src="%s" alt="noy">
                <div class="row1">
                <h3><a href="product.php?id=%s">%s</a></h3>
                <p>%s Руб</p>
                    <input type="hidden" value="%s" name="product_id">
                    <input type="hidden" value="%s" name="year">
                    <input type="hidden" value="%s" name="category">
                </div>
                %s
                %s
            </div>
        ', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["year"], $row["category"],
        ($role == "admin") ? '
            <div class="row">
                <p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
                <p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')"
                href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
            </div>
        ' : '',
        ($role != "guest") ? '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"] . '" class="text-small">В Корзину</a></p>' : '');

        if ($data == "")
            $data = '<h3 class="text-center">Товары отсутсвуют</h3>';
        include "header.php";*/?>