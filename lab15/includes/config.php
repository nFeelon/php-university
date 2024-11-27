<?php
// Конфигурация базы данных
define('DB_HOST', 'MySQL-8.2');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lab15');

// Путь к файлу логов
define('LOG_FILE', __DIR__ . '/../logs/registration.log');

// Создание директории для логов, если она не существует
if (!file_exists(dirname(LOG_FILE))) {
    mkdir(dirname(LOG_FILE), 0777, true);
}

// Подключение к базе данных
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Функция для логирования
function logMessage($message) {
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message\n";
    file_put_contents(LOG_FILE, $logMessage, FILE_APPEND);
}
