<?php
session_start();
require_once('../db.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $admin_name = $_POST['admin_name'];
    $category = $_POST['category'];
    $sizes = $_POST['sizes'];

    $image = $_FILES['image']['name'];
    $temp_path = $_FILES['image']['tmp_name'];
    $image_path = 'images/' . $image;
    move_uploaded_file($temp_path, $image_path);

    $query = "INSERT INTO products (name, description, price, admin_name, image, category, sizes) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdssss", $name,  $description, $price, $admin_name, $image, $category, $sizes);
    $result = $stmt->execute();
    if ($result) {
        $success = "Товар успешно добавлен!";
    } else {
        $error = "Ошибка при добавлении товара!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" type="text/css" href="/AdminPanel/css/admin_forms_product.css">
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <?php
    include 'admin_menu.php';
    ?>
</head>
<body>
<h1>Добавить товар</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <p><?php echo $success; ?></p>
    <?php } ?>

    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <label for="name">Название товара:</label>
        <input type="text" name="name" id="name" required>

        <label for="sizes">Размеры (введите размеры по прайсу):</label>
        <input type="text" name="sizes" id="sizes" required>

        <label for="description">Описание товара:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="price">Цена товара:</label>
        <input type="number" name="price" id="price" required>

        <label for="admin_name">Имя администратора: (ваше настоящее)</label>
        <input type="text" name="admin_name" id="admin_name" required>

        <label for="category">Категория товара:</label>
        <select name="category" id="category" required>
            <option value="man">Мужская одежда</option>
            <option value="women">Женская одежда</option>
            <option value="scool">Школьная одежда</option>
            <option value="teenagers">Подростковая одежда</option>
            <option value="sports">Спортивная одежда</option>
        </select>

        <label for="image">Фотография товара:</label>
        <input type="file" name="image" id="image" required>

        <input type="submit" name="add_product" value="Добавить товар">
    </form>
</body>
</html>