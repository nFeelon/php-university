<html>

<head>
    <meta charset="utf-8">
    <title>Данные формы 2</title>
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
            ДАННЫЕ ФОРМЫ 2
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <?php
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['passw']);

            function maskPassword($password)
            {
                $firstChar = mb_substr($password, 0, 1);
                $lastChar = mb_substr($password, -1);

                $middle = mb_substr($password, 1, -1);
                $maskChars = ['#', '*', '$'];

                $maskedMiddle = '';
                for ($i = 0; $i < mb_strlen($middle); $i++) {
                    $maskedMiddle .= $maskChars[array_rand($maskChars)];
                }

                return $firstChar . $maskedMiddle . $lastChar;
            }

            $maskedPassword = maskPassword($password);

            echo "<p><strong>Ваш логин:</strong> $login</p>";
            echo "<p><strong>Ваш пароль:</strong> $maskedPassword</p>";
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>