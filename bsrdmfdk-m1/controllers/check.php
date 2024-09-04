<?php
    session_start();

    if(!isset($_SESSION["user_id"]))
        return header("Location:../index.php?message=Вы не авторизованы");
?>