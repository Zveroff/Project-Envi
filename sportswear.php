<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/cbase.css">
    <link rel="stylesheet" href="/AdminPanel/css/admin_products.css">
    <meta charset="UTF-8">
    <title>Спортивная одежда</title>
</head>
<body>
<?php
include 'menu.php';
session_start();
$sql = "SELECT * FROM products WHERE category='sports'";
$result = $conn->query($sql);

if ($result) {
    echo "<div class='product-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<img class='product-image' src='AdminPanel/images/" . $row["image"] . "' alt=':('>";
        echo "<div class='product-text'>";
        echo "<p class='product-name'>" . "<em>" . substr($row["name"], 0, 70) . "</em>" . (strlen($row["name"]) > 70 ? '...' : '') . "</p>";
        echo "<p class='product-description'>" . substr($row["description"], 0, 100) . (strlen($row["description"]) > 100 ? '...' : '') . "</p>";
        echo "<p><strong>Размеры:</strong> " . $row['sizes'] . "</p><br>";
        echo "<p><strong>Цена: </strong><span class='product-price'>" . $row['price'] . "</span></p>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Ошибка выполнения запроса: " . $conn->error;
}

$conn->close();
?>
</body>
</html>