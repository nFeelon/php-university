<?php
$dateInput = $_GET['date'] ?? '';
$fileInput = $_GET['file'] ?? '';

$fio = $_GET['fio'] ?? '';
$bday = $_GET['bday'] ?? '';
$email = $_GET['email'] ?? '';
$tel = $_GET['tel'] ?? '';

$email2 = $_GET['email2'] ?? '';

$email3 = $_GET['email3'] ?? '';
function formatDate($date)
{
    if (preg_match('/^(\d{2})\.(0[1-9]|1[0-2])\.(\d{2})$/', $date, $matches)) {
        $day = $matches[1];
        $month = $matches[2];
        $year = "20" . $matches[3];

        $months = [
            "01" => "января",
            "02" => "февраля",
            "03" => "марта",
            "04" => "апреля",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "августа",
            "09" => "сентября",
            "10" => "октября",
            "11" => "ноября",
            "12" => "декабря"
        ];

        if (isset($months[$month])) {
            return "$day {$months[$month]} $year год";
        }
    }
    return false;
}

function checkFileType($fileName)
{
    if (preg_match('/\.(\w+)$/', $fileName, $matches)) {
        $fileExtension = strtolower($matches[1]);

        $rasterFormats = ["jpg", "jpeg", "png", "bmp", "gif", "tiff"];
        $vectorFormats = ["svg", "ai", "eps", "pdf"];

        if (in_array($fileExtension, $rasterFormats)) {
            return "Растровый формат";
        } elseif (in_array($fileExtension, $vectorFormats)) {
            return "Векторный формат";
        }
    }
    return false;
}

function CheckFIO($fio)
{
    if (preg_match('/^[А-ЯЁ][а-яё]{3,}(\s[А-ЯЁ][а-яё]{3,}){2}$/u', $fio)) {
        return true;
    }
    return false;
}

function formatDate2($bday)
{
    if (preg_match('/^(\d{2})\.(0[1-9]|1[0-2])\.(\d{4})$/', $bday)) {
        return true;
    }
    return false;
}

function CheckEmail($email)
{
    if (preg_match('/(^[A-Za-z][A-Za-z0-9]{10,20})((@bstu.ru)|(@bstu.com)|(@shiman.ru)|(@shiman.com))$/', $email)) {
        return true;
    }
    return false;
}

function CheckTel($tel)
{
    if (preg_match('/^\(\d{3}\)\s\d{3}\-\d{2}\-\d{2}$/', $tel)) {
        return true;
    }
    return false;
}

function ReplaceEmail($email2)
{
    return preg_replace('/[A-Za-z][A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/', '[email]', $email2);
}

function CheckEmail2($email3)
{
    if (preg_match('/^[A-Za-z][A-Za-z]*_?[A-Za-z]*@[A-Za-z]{3,}\.(ru|com|net|by)$/', $email3) && strlen($email3) <= 17) {
        return true;
    }
    return false;
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №11</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №11
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <form action="lab11.php" method="GET">
                <label for="date">Введите дату (например 20.11.16)</label>
                <input type="text" name="date">
                <br><br>

                <label for="file">Введите имя файла:</label>
                <input type="text" name="file">
                <br><br>
                <button type="submit">Передать информацию</button>
            </form>

            <?php
            if ($dateInput) {
                $formattedDate = formatDate($dateInput);
                if ($formattedDate) {
                    echo "<p>Форматированная дата: $formattedDate</p>";
                } else {
                    echo "<p style='color:red;'>А ты шалун. Это же не дата.</p>";
                }
            }
            if ($fileInput) {
                $fileType = checkFileType($fileInput);
                if ($fileType) {
                    echo "<p>Тип файла: $fileType</p>";
                } else {
                    echo "<p><img src='error.png' alt='Неправильный формат файла' style='width:100px;height:auto;'></p>";
                }
            }
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 3</h3>
            <form action="lab11.php" method="GET">
                <label for="fio">Введите ФИО (через пробел)</label>
                <br>
                <input type="text" name="fio">
                <br><br>

                <label for="bday">Введите дату рождения (dd.mm.yyyy)</label>
                <br>
                <input type="text" name="bday">
                <br><br>

                <label for="emal">Введите email</label>
                <br>
                <input type="text" name="email">
                <br><br>

                <label for="tel">Введите номер телефона (029) 123-45-67</label>
                <br>
                <input type="text" name="tel">
                <br><br>

                <button type="submit">Передать информацию</button>
            </form>

            <?php
            if ($fio) {
                if (CheckFIO($fio)) {
                    echo "<p>ФИО валидное: $fio</p>";
                } else {
                    echo "<p style='color:red;'>А ты шалун. Это же не ФИО.</p>";
                }
            }

            if ($bday) {
                if (formatDate2($bday)) {
                    echo "<p>Дата рождения валидная: $bday</p>";
                } else {
                    echo "<p style='color:red;'>А ты шалун. Это не дата рождения.</p>";
                }
            }

            if ($email) {
                if (CheckEmail($email)) {
                    echo "<p>Email валидный: $email</p>";
                } else {
                    echo "<p style='color:red;'>А ты шалун. Это не email.</p>";
                }
            }

            if ($tel) {
                if (CheckTel($tel)) {
                    echo "<p>Телефон валидный: $tel</p>";
                } else {
                    echo "<p style='color:red;'>А ты шалун. Это не телефон.</p>";
                }
            }
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <form action="lab11.php" method="GET">
                <label for="email2">Введите текст</label>
                <br>
                <textarea rows="4" cols="50" name="email2"></textarea>
                <br><br>
                <button type="submit">Передать информацию</button>
            </form>
            <?php

            $replacedEmail = ReplaceEmail($email2);
            if ($email2) {
                echo "<p>Оригинальный текст $email2</p>";
                echo "<p>Замененный текст $replacedEmail</p>";
            }
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <form action="lab11.php" method="GET">
                <label for="email3">Введите почту</label>
                <br>
                <input type="text" name="email3">
                <br><br>
                <button type="submit">Передать информацию</button>
            </form>
            <?php

            if ($email3) {
                if (CheckEmail2($email3)) {
                    echo "Email валидный! " . strlen($email3);
                } else {
                    echo "Email невалидный! " . strlen($email3);
                }
            }
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>