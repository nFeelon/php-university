<?php
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    
    // Получение и очистка данных
    $fullname = trim(filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING));
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $captcha = trim($_POST['captcha']);
    $captcha_answer = trim($_POST['captcha-answer']);

    // Валидация на сервере
    if (strlen($login) < 12 || !preg_match('/^[a-zA-Z0-9_]+$/', $login) || preg_match('/(.)\1\1/', $login)) {
        $errors['login'] = 'Некорректный формат логина';
    }

    if (substr(strtolower($email), -4) === '.apo') {
        $errors['email'] = 'Использование домена .apo запрещено';
    }

    if (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password) || 
        !preg_match('/[а-яА-Я]/u', $password) || preg_match('/[#$%+-]/', $password)) {
        $errors['password'] = 'Некорректный формат пароля';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Пароли не совпадают';
    }

    if ($captcha !== $captcha_answer) {
        $errors['captcha'] = 'Неверный ответ на капчу';
    }

    // Проверка существования пользователя
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = ? OR email = ?");
    $stmt->execute([$login, $email]);
    if ($stmt->fetchColumn() > 0) {
        $errors['exists'] = 'Пользователь с таким логином или email уже существует';
    }

    if (empty($errors)) {
        try {
            // Хеширование пароля
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Добавление пользователя в базу данных
            $stmt = $pdo->prepare("INSERT INTO users (fullname, login, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$fullname, $login, $email, $hashed_password]);

            // Логирование успешной регистрации
            logMessage("Регистрация прошла успешно для пользователя: $login");

            // Перенаправление на страницу входа
            header('Location: login.php?success=1');
            exit;
        } catch (PDOException $e) {
            logMessage("Ошибка при регистрации пользователя $login: " . $e->getMessage());
            $errors['db'] = 'Ошибка при регистрации. Попробуйте позже.';
        }
    } else {
        // Логирование ошибок валидации
        logMessage("Регистрация завершена ошибкой для пользователя $login: " . implode(', ', $errors));
    }

    // Если есть ошибки, возвращаем их на страницу регистрации
    if (!empty($errors)) {
        session_start();
        $_SESSION['registration_errors'] = $errors;
        $_SESSION['registration_data'] = [
            'fullname' => $fullname,
            'login' => $login,
            'email' => $email
        ];
        header('Location: register.php');
        exit;
    }
}
