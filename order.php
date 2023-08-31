<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    require_once('db.php');
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['name'];
        $product_description = $row['description'];
        $to_email = "feedback_envi@mail.ru"; 
        $subject = "Новая заявка на заказ";
        $message = "Идентификатор товара: $product_id\n";
        $message .= "Товар: $product_name\n";
        $message .= "Описание товара: $product_description\n";

        if (mail($to_email, $subject, $message)) {
            echo "Заявка на заказ успешно отправлена.";
        } else {
            echo "Ошибка при отправке заявки на заказ.";
        }
    } else {
        echo "Ошибка выполнения запроса или товар не найден.";
    }
}
?>