<?php
session_start();

// Функция для проверки авторизации
function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторные работы</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="user-info">
                        <span>Здравствуйте, <?php echo htmlspecialchars($_SESSION['full_name']); ?></span>
                        <a href="logout.php" class="logout-btn">Выйти</a>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container">
