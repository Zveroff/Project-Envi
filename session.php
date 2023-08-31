<?php
session_start();

// Проверяем, авторизован ли пользователь
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $profile_link = 'profile.php';
    $profile_text = 'Мой профиль';
} else {
    $profile_link = '';
    $profile_text = '';
}
?>