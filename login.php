<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
                $_SESSION['username'] = $login;
        
        echo "Вход в аккаунт прошел успешно! Перенаправление...";
        header("Refresh: 3; URL=profile.php?id=" . $row['id']);
        exit();
    } else {
        echo "Такого пользователя не существует!";
    }
}
?>