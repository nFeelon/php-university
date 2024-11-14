<?php
session_start();

if (isset($_GET['secret_word'])) {
    $_SESSION['secret_word'] = $_GET['secret_word'];
}

$secretWord = isset($_SESSION['secret_word']) ? $_SESSION['secret_word'] : null;
?>


<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №9</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №9
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <form action="process_form.php" method="POST">
                <label for="email">Ваш email:</label>
                <input type="email" id="email" name="email" required>
                <br><br>

                <label for="birthdate">Дата рождения:</label>
                <input type="date" id="birthdate" name="birthdate" required>
                <br><br>

                <p>Есть ли у вас опыт использования банковских услуг?</p>
                <input type="radio" id="experience_yes" name="experience" value="yes" required>
                <label for="experience_yes">Да</label><br>
                <input type="radio" id="experience_no" name="experience" value="no" required>
                <label for="experience_no">Нет</label>
                <br><br>

                <p>Какими банковскими услугами вы пользовались?</p>
                <input type="checkbox" id="services_saving" name="services[]" value="saving" required>
                <label for="services_saving">Сбережения</label><br>
                <input type="checkbox" id="services_credit" name="services[]" value="credit">
                <label for="services_credit">Кредит</label><br>
                <input type="checkbox" id="services_mortgage" name="services[]" value="mortgage">
                <label for="services_mortgage">Ипотека</label><br>
                <input type="checkbox" id="services_investment" name="services[]" value="investment">
                <label for="services_investment">Инвестиции</label>
                <br><br>

                <input type="hidden" name="survey_id" value="123456">

                <label for="main_bank">Ваш основной банк:</label>
                <select id="main_bank" name="main_bank" required>
                    <option value="bank1">Банк 1</option>
                    <option value="bank2">Банк 2</option>
                    <option value="bank3">Банк 3</option>
                    <option value="other">Другой</option>
                </select>
                <br><br>

                <label for="last_name">Ваша фамилия:</label>
                <input type="text" id="last_name" name="last_name">
                <br><br>

                <label for="phone">Телефон для связи:</label>
                <input type="tel" id="phone" name="phone">
                <br><br>

                <label for="credit_cards">Количество кредитных карт:</label>
                <input type="number" id="credit_cards" name="credit_cards" min="0">
                <br><br>
                <button type="submit">Отправить</button>
            </form>
            <a href="/lab9/process_form.php" class="c">Результаты</a>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <form action="loginpassword.php" method="POST">
                <label for="login">Введите логин: </label>
                <input type="text" id="login" name="login">
                <br><br>

                <label for="passw">Введите пароль: </label>
                <input type="password" id="passw" name="passw">
                <br><br>

                <button type="submit">Войти</button>
            </form>
            <a href="/lab9/loginpassword.php" class="c">Результаты</a>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <form method="GET" action="lab9.php">
                <label for="secret_word">Введите секретное слово:</label>
                <input type="text" id="secret_word" name="secret_word"
                    value="<?php echo htmlspecialchars($secretWord); ?>">
                <button type="submit">Сохранить</button>
            </form>

            <?php if ($secretWord): ?>
                <h3>Секретное слово</h3>
                <p>Нажмите ниже, чтобы увидеть секретное слово:</p>
                <a href="lab9.php?show_secret=true">Показать секретное слово</a>

                <?php if (isset($_GET['show_secret']) && $_GET['show_secret'] == 'true'): ?>
                    <p><strong>Секретное слово: <?php echo htmlspecialchars($secretWord); ?></strong></p>
                <?php endif; ?>
            <?php endif; ?>

            <h3>Изменить секретное слово</h3>
            <p>Нажмите ниже, чтобы открыть форму для изменения:</p>
            <a href="lab9.php">Изменить секретное слово</a>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <form method="GET" action="process.php">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required><br>
                <br><Br>

                <label for="age">Возраст:</label>
                <input type="number" id="age" name="age" required><br>
                <br><Br>

                <label for="gender">Пол:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Мужской</option>
                    <option value="female">Женский</option>
                </select>
                <br><Br>

                <button type="submit">Отправить</button>
            </form>
            <a href="/lab9/process.php" class="c">Результаты</a>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <form method="POST" action="sms.php">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required><br>
                <br><Br>

                <label for="message">Сообщение:</label>
                <textarea id="message" name="message" required></textarea><br>
                <br><Br>

                <button type="submit">Отправить</button>
            </form>

            <a href="/lab9/messages.php">Посмотреть все сообщения</a>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>