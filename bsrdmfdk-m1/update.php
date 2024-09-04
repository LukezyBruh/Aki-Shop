<?php  
    include "controllers/check_admin.php";
    include "connect.php";

    $STH = $connect->prepare("SELECT * FROM `products` WHERE `product_id`=".$_GET["id"]."");
    $STH->execute();
    $product= $STH->fetch();

    $STH =$connect->query("SELECT * FROM `categories`"); 
    $categories= "";
    while($row = $STH->fetch()){
        $selected = ($product["category"] == $row["category"]) ? "selected" : "";
        $categories .= 'option value="'.$row["category"].'" '.$selected.'>'.$row["category"].'</option>';
    } 
    include "header.php"
?>

<div class="content_admin_update">
    <h1>Редактировать</h1>
    <div class="block_color">
        <form class="form" action="controllers/update_product.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?= $product["product_id"]?>">
                <input type="hidden" name="path" value="<?= $product["path"]?>">
                <input type="text" placeholder="Название" name="name" value="<?= $product["name"]?>" required>
                <input type="number" placeholder="Цена" name="price" value="<?= $product["price"]?>" required>
                <input type="text" placeholder="Страна производитель" name="country" value="<?= $product["country"]?>" required>
                <input type="number" placeholder="Год выпуска" name="year" value="<?= $product["year"]?>" required>
                <input type="text" placeholder="Модель" name="model" value="<?= $product["model"]?>" required>
                <input type="text" placeholder="Категория" name="category" value="<?= $product["category"]?>" required>
                <input type="number" placeholder="Количество на складе" name="count" value="<?= $product["count"]?>" required>
                <label class="input-file">
                    <p>Фотография товара</p>
                    <input type="file" name="image">
                    <span class="input-file-btn">Выберите файл</span>
                    <span class="input-file-text">Максимум 10мб</span>
                </label>
                <div class="block_button">
                    <button>Изменить</button>
                </div>
        </form>
    </div>
</div>


<?php include "footer.php" ?>