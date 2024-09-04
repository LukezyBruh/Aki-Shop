<?php 
    include "controllers/check_admin.php";
    include "connect.php"; 
    
    $STH= $connect->query ("SELECT * FROM `categories`"); 
    $categories= "";
    while($row = $STH->fetch()) 
    
    $categories .='<option value ="'.$row["category"].'">'.$row["category"].'</option>';
    $STH= $connect->query ("SELECT * FROM `orders` INNER JOIN `users` USING(`user_id`) ORDER BY `created_at` DESC");
    $orders = "";
    while($row = $STH->fetch()){
        $adv = ($row["status"] == "новый") ? '
            <form action="controllers/confirm_order.php" class="w100" method="POST">
                <input type="hidden" value="'.$row["order_id"].'" name="id"/>
                <button>Подтвердить заказ</button>
            </form>
            <br>
            <div class="otmena_cart">
                <h3>Отменить заказ</h3>
                <form action="controllers/cancel_order.php" class="w100" method="POST">
                    <input type="hidden" value="'.$row["order_id"].'" name="id"/>
                    <textarea placeholder="Причины отмены заказа" name="reason" required></textarea>
                    <button>Отменить заказ</button>
                </form>
            </div>
            ' : '';
        $adv = ($row["status"] == "отмененный") ? '
                <h3>Причины отмены</h3>
                <p class="reason">'.$row["reason"].'</p>
        ' : $adv;
        $orders .= '
            <div class="col_text_left">
                <h2>Заказ '.$row["number"].'</h2>
                <p>Заказчик '.$row["name"]. $row["surname"]. $row["patronymic"].'</p>
                <p>Статус заказа '.$row["status"].'</p>
                <p>Количество товаров '.$row["count"].'</p>
                <input type="hidden" value="'.$row["order_id"].'" name="order_id" />
            '.$adv .'
                <p class="text-small text-right">'.$row["created_at"].'</p>
            </div>
        ';
    } 
    if (!$orders)
        $orders = '<h3 class="text-center">Заказы отсутствуют</h3>';
    include "header.php";
    
?>

<div class="content_admin">
    <h1>Добавление товара</h1>
    <div class="block_color">
    <form enctype="multipart/form-data" class="form" action="controllers/add_product.php" method="POST">
        <input type="text" placeholder="Название" name="name" required>
        <input type="number" placeholder="Цена" name="price" required>
        <input type="text" placeholder="Страна производитель" name="country" required>
        <input type="number" placeholder="Год выпуска" name="year" required>
        <input type="text" placeholder="Модель" name="model" required>
        <input type="text" placeholder="Категория" name="category" required>
        <input type="number" placeholder="Количество на складе" name="count" required>
        <label class="input-file">
            <p class="text-left11">Фотография товара</p>
            <input type="file" name="image">
            <span class="input-file-btn">Выберите файл</span>
            <span class="input-file-text">Максимум 10мб</span>
 	    </label>
        <div class="block_button">
        <button>Добавить</button>
        </div>
    </div>
    </form>
    <h1>Заказы</h1>
    <div class="row_at">
        <?= $orders ?>
    </div>
</div>

<?php include "footer.php" 
/*
    include "controllers/check_admin.php";
    include "connect.php"; 
    include "header.php";
    

    $sql = "SELECT* FROM `orders` INNER JOIN `users` USING(`user_id`) ORDER BY `created_at` DESC";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()){
        $adv = ($row["status"] == "Новый") ?'
        <form action="controllers/confirm_order.php" class="w100" method="POST">
            <input type="hidden" value="'.$row["order_id"].'" name="id"/>
            <button>Подтвердить заказ</button>
        </form>
        <h3 class="text_center">Отменить заказ</h3>
        <form action="controllers/cancel_order.php" class="w100" method="POST">
            <input type="hidden" value="'.$row["order_id"].'" name="id"/>
            <textarea placeholder="Причина отмены" name="reason" required></textarea>
            <button>Отменить заказ</button>
        </form>' : '';
        $adv = ($row["status"] == "Отменённый") ? '
        <h3 class="text_center">Причина отмены</h3>
        <p class="reason">'.$row["reason"].'</p>' : $adv;
        $orders='';
        $orders .=sprintf('
        <div class="col_text_left">
            <h2>Заказ %s</h2>
            <p>Заказчик: <b>%s %s %s</b></p>
            <p>Статус заказа: <b>%s</b></p>
            <p>Количество товаров: <b>%s</b></p>
            <input type="hidden" value="%s" name="order_id"/>%s
            <p class="text-small-right">%s</p>
        </div> ', $row["number"],
        $row["name"], $row["surname"], $row["patronymic"], $row["status"],
        $row["count"], $row["order_id"], $adv, $row["created_at"]);
    }
    if(!$orders) $orders = '<h3 class="text-center">Заказы отсутствуют</h3>';*/?>