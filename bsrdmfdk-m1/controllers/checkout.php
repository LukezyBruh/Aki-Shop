<?php
    include "check.php";
    include "../connect.php";

    $STH = $connect->prepare("SELECT * FROM `users` WHERE `user_id`=".$_SESSION["user_id"]."");
    $STH->execute();
    $data = $STH->fetch();

    $STH = $connect->prepare ("SELECT SUM(`count`) FROM `orders` WHERE `user_id`=".$_SESSION["user_id"]." AND `number` IS NULL");
    $STH->execute();
    $count = $STH->fetch()[0];
    $STH = $connect->exec("INSERT INTO `orders`(`product_id`, `user_id`, `number`, `count`, `status`)
            VALUES('0', ".$_SESSION["user_id"].", ".rand(1000000000, 2000000000).", ".$count.", 'новый')");
    
    $STH = $connect->exec("DELETE FROM `orders` WHERE `user_id`=".$_SESSION["user_id"]." AND `number` IS NULL");
    return header("Location:../cart.php?message=Заказ оформлен");
    /*include "check.php";
    include "../connect.php";
    $sql = sprintf("SELECT * FROM `users` WHERE `user_id`='%s'", $_SESSION["user_id"]);

        if($connect->query($sql)->fetch_assoc()["password"] != $_POST["password"])
            return header("Location:../cart.php?message=Ошибка пароля");

    $sql = sprintf("SELECT SUM(`count`) FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]);

    $count = $connect->query($sql)->fetch_array()[0];
    $connect->query(sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `number`, `count`, `status`)
    VALUES('0', '%s', '%s', '%s', 'Новый')", $_SESSION["user_id"], rand(100000000, 200000000), $count));

    $connect->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]));

        return header("Location:../cart.php?message=Заказ оформлен");*/
?>