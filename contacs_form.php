<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/cbase.css">
    <link rel="stylesheet" type="text/css" href="/css/contacs.css">
    <meta charset="UTF-8">
    <title>Контакты</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include 'menu.php'; ?>
<h2 class="form-heading">Наши контакты</h2>
<p class="contact-info">Email: feedback_envi@mail.ru<BR><BR>Номер телефона: +79592234022</p>
<h3 class="form-heading">Форма обратной связи:</h3>

<form action="contacs.php" method="post" class="contact-form">
  <input type="text" name="name" placeholder="Имя" required class="contact-form__input">
  <input type="email" name="email" placeholder="Почта" required class="contact-form__input">
  <textarea name="message" placeholder="Текст сообщения" required class="contact-form__textarea"></textarea>
  <input type="submit" value="Отправить">
</form>
</body>
</html>