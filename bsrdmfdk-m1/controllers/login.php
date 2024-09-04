<?php
    session_start();
    include "../connect.php";
    $login = $_POST['login'];
    $password = $_POST['password'];

    $STH = $connect->prepare("SELECT * FROM `users` WHERE `login`= ? ");
    $STH->execute([$login]);
    $STH->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $STH->fetch()){
        if(password_verify($password, $row['password']))
        {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["name"] = $row["name"];
            return header("Location:../cart.php");
        }
    }
    return header("Location:../index.php?message=Ошибка логина или пароля");
    /*$sql = sprintf("SELECT * FROM `users` WHERE `login`= '%s'", $_POST["login"]);
    if (!$result = $connect->query($sql))
    
    return die("Ошибка получения данных: ".$connect->query);
    if($user = $result->fetch_assoc())
    {
        $hash = $user['password'];
        if(password_verify($_POST['password'], $hash))
        {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["name"] = $user["name"];
            return header("Location:../cart.php");
        }
    }
    return header("Location:../index.php?message=Ошибка логина или пароля");*/
?>