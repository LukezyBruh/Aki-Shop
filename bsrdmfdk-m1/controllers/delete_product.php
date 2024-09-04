<?php
	include "check_admin.php";
	include "../connect.php";
	$STH = $connect->exec("DELETE `products` FROM `products` WHERE `product_id`=".$_GET["id"]);
	return header("Location:../catalog.php?message=Товар удалён");
?>