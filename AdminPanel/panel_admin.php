<?php
session_start();
require_once('../db.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel Envi</title>
    <?php
    include 'admin_menu.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/AdminPanel/css/news.css">
</head>
<body>
    <p>Привет админ!</p>
    <p>Теперь ты можешь добавлять товары и новости на сайт! Для этого кликайте на нужную кнопку, и заполняйте необходимые поля!</p>
    <p>Надеемся Вам понравится!</p>
</body>
</html>