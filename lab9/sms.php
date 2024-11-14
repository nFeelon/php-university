<?php
session_start();

$name = isset($_POST['name']) ? $_POST['name'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$currentTime = date('H:i');

if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [];
}

$_SESSION['messages'][] = [
    'name' => $name,
    'time' => $currentTime,
    'mess' => $message
];

header("Location: /lab9/lab9.php");
exit();
