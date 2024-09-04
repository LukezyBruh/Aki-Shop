<?php
    include "../connect.php"; 
    include "header.php";

    $connect->query(sprintf(
        "UPDATE `orders` SET `status`='Отменённый', `reason`='%s' WHERE `order_id`='%s'", $_POST["reason"], $_POST["id"]));
    return header("Location:../admin.php?message=Заказ отменён");
?>