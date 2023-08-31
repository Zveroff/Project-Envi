<?php
require_once('db.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$sql = "INSERT INTO contacs (name, email, message) VALUES ('$name', '$email', '$message')";
 
if ($conn->query($sql) === TRUE) {
    echo "Сообщение отправлено! Ответ придет на указанный email!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>