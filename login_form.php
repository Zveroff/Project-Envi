<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" type="text/css" href="/css/register_login.css">
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>
<?php include 'menu.php'; ?>
<div class="form_center">
<div class="form-container_log">
        <h2 class="form-title_log">Вход</h2>
        <form action="login.php" method="post">
            <input type="text" placeholder="Логин" name="login">
            <input type="password" placeholder="Пароль" name="pass">
            <button class="custom-button" type="submit">Войти</button>
            <p class="center_otpr">Еще не зарегистированы? <a href="register_form.php">Регистрация</a></p><br><br>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        </form>
    </div>
</div>
</body>
</html>
