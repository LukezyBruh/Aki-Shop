<?php
    include "../connect.php"; 
    include "../admin.php"; 
    $connect->query("UPDATE `orders` SET `status`='Подтверждённый' WHERE `order_id`=".$_POST["id"]);
    return header("Location:../admin.php?message=Заказ подтверждён");
?>
