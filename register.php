<?php
session_start();
require_once('db.php');
$login = $_POST['login'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];

if (empty($login) || empty($name) || empty($email) || empty($pass) || empty($repeatpass)) {
    echo "Заполните все необходимые поля";
} else {
    if ($pass != $repeatpass) {
        echo "Пароли не совпадают";
    } else {
        $date = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO users (login, name, email, pass, registration_date) VALUES ('$login', '$name', '$email', '$pass', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo "Регистрация прошла успешно! Перенаправление...";
            header("Refresh: 3; URL=login_form.php");
            exit;
        } else {
            echo "Ошибка: " . $conn->error;
        }
    }
}