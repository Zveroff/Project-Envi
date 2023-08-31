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
    <title>Добавление новостей</title>
    <?php
    include 'admin_menu.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/AdminPanel/css/news.css">
</head>
<body>
    <h1>Добавление новости</h1>
    <?php
    if(isset($_POST["submit"])) {
        $targetDir = "news_image/";
        $imageName = uniqid() . '_' . $_FILES['image']['name'];
        $targetFilePath = $targetDir . $imageName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        if(!in_array($fileType, $allowedTypes)) {
            echo "<p class='error'>Неподдерживаемый тип файла! Разрешены только JPG, JPEG и PNG</p>";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
            $title = $_POST["title"];
            $text = $_POST["text"];
            $sql = "INSERT INTO news (image, title, text) VALUES ('$imageName', '$title', '$text')";
            
            if ($conn->query($sql) === true) {
                echo "<p class='success'>Новость успешно добавлена!</p>";
            } else {
                echo "<p class='error'>Ошибка при добавлении новости: " . $conn->error . "</p>";
            }
        }
    }

    $conn->close();
    ?>
    
    <form action="adding_news.php" method="POST" enctype="multipart/form-data">
        <label for="image">Главная фото:</label>
        <input type="file" name="image" id="image" required>

        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" required>

        <label for="text">Текст:</label>
        <textarea name="text" id="text" required></textarea>

        <input type="submit" name="submit" value="Добавить новость">
    </form>
</body>
</html>