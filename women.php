<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/cbase.css">
    <link rel="stylesheet" href="/AdminPanel/css/admin_products.css">
    <meta charset="UTF-8">
    <title>Женская одежда</title>
</head>
<body>
<?php
session_start();

include 'menu.php';
require_once('db.php');

$sql = "SELECT * FROM products WHERE category='women'";
$result = $conn->query($sql);

if ($result) {
    echo "<div class='product-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<img class='product-image' src='AdminPanel/images/" . $row["image"] . "' alt=':('>";
        echo "<div class='product-text'>";
        echo "<h3 class='product-name'>" . substr($row["name"], 0, 70) .   (strlen($row["name"]) > 70 ? '...' : '') . "</h3>";
        echo "<p class='product-description'>" . substr($row["description"], 0, 100) . (strlen($row["description"]) > 100 ? '...' : '') . "</p>";
        echo "<p><strong>Размеры:</strong> " . $row['sizes'] . "</p><br>";
        echo "<p><strong>Цена: </strong><span class='product-price'>" . $row['price'] . "</span></p>";
        echo "<form action='order.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Ошибка выполнения запроса: " . $conn->error;
}

$conn->close();
?>
</body>
</html>