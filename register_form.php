<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/cbase.css">
    <link rel="stylesheet" type="text/css" href="/css/register_login.css">
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<?php include 'menu.php'; ?>
<div class="form_center">
<div class="form-container_reg">
        <h2 class="form-title_reg">Регистрация</h2>
        <form action="register.php" method="post">
            <input type="text" placeholder="Логин" name="login">
            <input type="text" placeholder="Имя" name="name">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Пароль" name="pass">
            <input type="password" placeholder="Повторите пароль" name="repeatpass">
            <button class="custom-button" type="submit">Зарегистрироваться</button>
            <p class="center_otpr">Уже есть аккаунт? <a href="login_form.php">Вход</a></p><br><br>
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
