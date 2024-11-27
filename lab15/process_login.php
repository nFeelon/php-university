<?php
require_once 'includes/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    
    try {
        // Получаем данные пользователя
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Успешная авторизация
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['fullname'];
            
            logMessage("Успешный вход пользователя: $login");
            header('Location: index.php');
            exit;
        } else {
            // Неверные учетные данные
            $_SESSION['login_error'] = 'Неверный логин или пароль';
            logMessage("Неудачная попытка входа для пользователя: $login");
            header('Location: login.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['login_error'] = 'Произошла ошибка при входе. Попробуйте позже.';
        logMessage("Ошибка при попытке входа пользователя $login: " . $e->getMessage());
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
