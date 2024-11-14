<html>

<head>
    <meta charset="utf-8">
    <title>Данные формы 1</title>
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
            ДАННЫЕ ФОРМЫ 1
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h1>Результаты анкеты</h1>
            <div class="result">
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
                <p><strong>Дата рождения:</strong> <?php echo htmlspecialchars($_POST['birthdate']); ?></p>
                <p><strong>Опыт использования банковских услуг:</strong>
                    <?php echo htmlspecialchars($_POST['experience']); ?></p>

                <p><strong>Банковские услуги, которыми вы пользовались:</strong></p>
                <ul>
                    <?php
                    if (!empty($_POST['services'])) {
                        foreach ($_POST['services'] as $service) {
                            echo '<li>' . htmlspecialchars($service) . '</li>';
                        }
                    } else {
                        echo '<li>Нет</li>';
                    }
                    ?>
                </ul>

                <p><strong>Основной банк:</strong> <?php echo htmlspecialchars($_POST['main_bank']); ?></p>

                <p><strong>Фамилия:</strong> <?php echo htmlspecialchars($_POST['last_name']); ?></p>
                <p><strong>Телефон для связи:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></p>
                <p><strong>Количество кредитных карт:</strong> <?php echo htmlspecialchars($_POST['credit_cards']); ?>
                </p>
            </div>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>