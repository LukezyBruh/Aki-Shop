<?php 
    include "check.php";
    include "../connect.php";

    $id = $_GET["id"];

    $STH = $connect->prepare("SELECT `order_id`, `product_id`, `number`, `orders`.`count` as `ocount`, `name`, `products`.`count`
                             as `pcount` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`=".$_SESSION["user_id"]."
                             AND `product_id`=".$id."");
    $STH->execute();
    $order = $STH->fetch();

    if($order["ocount"] > 1)
        $STH = $connect->exec("UPDATE `orders` SET `count`=".--$order['ocount']." WHERE `order_id`=".$order['order_id']."");
    
    else
        $STH = $connect->exec("DELETE FROM `orders` WHERE `user_id`=".$_SESSION['user_id']." AND `product_id`=".$order['product_id']."");
        $STH = $connect->exec("UPDATE `products` SET `count`=".++$order['pcount']." WHERE `product_id`=".$order['product_id']."");
    
    return header("Location:../cart.php?message?id=".$row['product_id'] ."");

    
?>