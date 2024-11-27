<?php
require_once 'includes/config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $login = $_SESSION['full_name'];
    logMessage("Пользователь $login вышел из системы");
}

// Уничтожаем все данные сессии
session_destroy();

// Перенаправляем на страницу входа
header('Location: login.php');
exit;
