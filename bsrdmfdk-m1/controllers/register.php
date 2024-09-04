<?php
    include "../connect.php";

    $form['name'] = $_POST['name'];
    $form['surname'] = $_POST['surname'];
    $form['patronymic'] = $_POST['patronymic'];
    $form['login'] = $_POST['login'];
    $form['email'] = $_POST['email'];

    $form['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $form['role'] = 'client';

    $STH = $connect->prepare("INSERT INTO `users` SET `name`=:name, `surname`=:surname, `patronymic`=:patronymic,
                            `login`=:login, `email`=:email, `password`=:password, `role`=:role");
    $STH->execute($form);
    return header("Location:../index.php?message=Вы зарегистрировались");

    /*
    $sql = sprintf("INSERT INTO `users` VALUES(NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    $_POST["name"], $_POST["surname"], $_POST["patronymic"], $_POST["login"], 
    $_POST["email"], $_POST["password"], "client");
    if(!$connect->query($sql))
    return die("Ошибка добавления данных: ". $connect->error);
    return header("Location:../index.php?message=Вы зарегистрировались");
    */
?>