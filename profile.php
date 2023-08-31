<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php include 'menu.php'; ?>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/profile.css" />
    <?php
    require_once('db.php');
    $id = $_GET['id'];
    $sql = "SELECT name, login, email, registration_date FROM users WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $login = $row['login'];
        $email = $row['email'];
        $registration_date = $row['registration_date'];
        ?>
        <meta charset="UTF-8">
        <title>Пользователь (<?= $name ?>)</title>
    </head>
    <body>
    <div class="profile-card">
        <h1>Данные пользователя</h1>
        <p><strong>ID:</strong> <?= $id ?></p>
        <p><strong>Имя:</strong> <?= $name ?></p>
        <p><strong>Логин:</strong> <?= $login ?></p>
        <p><strong>Почта:</strong> <?= $email ?></p>
        <p><strong>На сайте с:</strong> <?= $registration_date ?></p><br>
        <p>Если Вы хотите заменить свой логин, имя, почту или же пароль, напишите нам на почту. приложив ссылку на аккаунт и описав данные которые надо изменить.(чтобы подтвердить что именно ВЫ меняете данные напишите нам свой пароль, который используется на данный момент)</p>
        <h4>Почта: <em>feedback_envi@mail.ru</em></h4>
    </div>

    <?php
    } else {
        echo "К сожалению, такого пользователя нет на Envi(";
    }
    ?>
</body>
</html>