<?php 
    include "check.php";
    unset($_SESSION["user_id"]);
    unset($_SESSION["role"]);
    return header("Location:../index.php?message=Вы вышли");
?>