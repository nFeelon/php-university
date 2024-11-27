<?php
session_start();

function generateCaptcha()
{
    $width = 200;
    $height = 70;

    $image = imagecreatetruecolor($width, $height);

    $backgroundColor = imagecolorallocate($image, 220, 220, 220);
    imagefill($image, 0, 0, $backgroundColor);
    imagesetthickness($image, rand(2, 5));

    $randI = rand(5, 8);
    for ($i = 0; $i < $randI; $i++) {
        $lineColor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
        imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
    }

    if (empty($_SESSION['captcha']) || isset($_GET['refresh'])) {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $captchaText = '';
        for ($i = 0; $i < random_int(5, 6); $i++) {
            $captchaText .= $characters[rand(0, strlen($characters) - 1)];
        }
        $_SESSION['captcha'] = $captchaText;
    } else {
        $captchaText = $_SESSION['captcha'];
    }

    for ($i = 0; $i < strlen($captchaText); $i++) {
        $textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
        $x = 10 + $i * 30;
        $y = rand(10, 50);
        imagestring($image, 5, $x, $y, $captchaText[$i], $textColor);
    }

    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

if (isset($_GET['generate'])) {
    generateCaptcha();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['refresh'])) {
        unset($_SESSION['captcha']);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $userInput = $_POST['captcha'] ?? '';
    if ($userInput === $_SESSION['captcha']) {
        $message = "Капча введена верно!";
        unset($_SESSION['captcha']);
    } else {
        $message = "Ошибка! Капча неверна.";
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №13</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №13
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <form method="POST">
                <img src="?generate=1" alt="Капча">
                <br><br>

                <input type="text" name="captcha" placeholder="Введите текст с капчи">
                <br><br>

                <button type="submit" name="check">Проверить</button>
                <br><br>

                <button type="submit" name="refresh">Обновить капчу</button>
            </form>
 
            <?php if (!empty($message)): ?>
                <p><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>