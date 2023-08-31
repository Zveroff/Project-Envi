<?php
session_start();
require_once('../db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $query = "SELECT * FROM admins WHERE login = '".$login."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $error = "Администратор с таким логином уже существует";
    } else {
        $registration_date = date('Y-m-d H:i:s');
        $query = "INSERT INTO admins (login, password, name, registration_date) VALUES ('".$login."', '".$password."', '".$name."', '".$registration_date."')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: login_admin.php");
            exit();
        } else {
            $error = "Ошибка при регистрации администратора";
        }
    }
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Register Admin</title>
</head>
<body>
    <h1>Регистрация администратора</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    
    <form action="register_admin.php" method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" required>

        <label for="name">Введите свое настоящее имя:</label>
        <input type="text" name="name" id="name" required>

        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" name="register" value="Зарегистрироваться">
        <p>Правила регистрации пользователя:</p>
        <p>- вводим логин на английском</p>
        <p>- вводим имя с большой Буквы на английском</p>
        <p>- пароль на английском</p>
    </form>
</body>
</html>