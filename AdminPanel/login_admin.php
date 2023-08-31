<?php
session_start();
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admins WHERE login = '".$login."' AND password = '".$password."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $login;
        header('Location: panel_admin.php'); 
        exit;
    } else {
        $error = "Неправильные логин или пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h1>Авторизация администратора</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    
    <form action="" method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" name="register" value="Войти">
    </form>
</body>
</html>