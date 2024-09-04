<?php 
    include "check.php";

    if($_SESSION["role"] != "admin")
        return header("Location:../cart.php?message=Отказано в доступе");
?>