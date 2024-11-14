<?php
session_start();

$messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : [];

if (isset($_GET['delete'])) {
    $indexToDelete = (int) $_GET['delete'];
    if (isset($messages[$indexToDelete])) {
        $logEntry = date('Y-m-d H:i:s') . " - Удалено сообщение: " . json_encode($messages[$indexToDelete]) . PHP_EOL;
        file_put_contents('log.txt', $logEntry, FILE_APPEND);

        unset($_SESSION['messages'][$indexToDelete]);
        $_SESSION['messages'] = array_values($_SESSION['messages']);
        header("Location: /lab9/messages.php");
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Данные формы 4</title>
    <style>
        .title {
            text-align: center;
            border-bottom: solid;
            padding-bottom: 20px;
            margin-top: 50px;
        }

        body {
            background-color: #ECECFF;
        }

        h4 {
            font-weight: normal;
            margin-top: 600px;
            text-align: center;
        }

        .code {
            margin-top: 50px;
            font-size: 1.5em;
        }

        table,
        tr,
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="title">
        <h1>
            ДАННЫЕ ФОРМЫ 4
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Все сообщения</h3>

            <?php if (empty($messages)): ?>
                <p>Нет сообщений для отображения.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($messages as $index => $msg): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($msg['name']); ?></strong>
                            (<?php echo htmlspecialchars($msg['time']); ?>): <?php echo htmlspecialchars($msg['mess']); ?>
                            <a href="?delete=<?php echo $index; ?>"
                                onclick="return confirm('Вы уверены, что хотите удалить это сообщение?');">Удалить</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>