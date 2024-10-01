<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №7</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №7
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            $a = 10;
            $b = 5;
            $c = 7;

            if ($a > $b && $a > $c) {
                echo "Число A ($a) больше чисел B ($b) и C ($c)";
            } elseif ($b > $a && $b > $c) {
                echo "Число B ($b) больше чисел A ($a) и C ($c)";
            } else {
                echo "Число C ($c) больше чисел A ($a) и B ($b)";
            }
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            $a = rand(1, 10);
            $b = rand(1, 10);
            $c = rand(1, 10);

            $min = min($a, $b, $c);

            if ($min >= 9):
                echo "Вы отличник! Поздравляю!";
            elseif ($min > 4):
                echo "Вы сдали";
            else:
                echo "Вас отчислят";
            endif
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            $sum = 0;
            for ($i = 1; $i <= 100; $i++) {
                if ($i % 2 == 0 || $i % 9 == 0) {
                    $sum += $i;
                }
            }
            echo "Сумма чисел кратных 2 или 9: $sum<br>";

            $multiply = 1;
            for ($i = 1; $i <= 50; $i++) {
                if ($i % 3 == 0 && $i % 5 == 0) {
                    $multiply *= $i;
                }
            }
            echo "Произведение чисел кратных 3 и 5: $multiply";
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            $height = 10;
            for ($i = 1; $i <= $height; $i++) {
                for ($k = 1; $k <= $height - $i; $k++) {
                    echo " ";
                }
                for ($z = 1; $z <= $i; $z++) {
                    echo "*";
                }
                echo "<br>";
            }
            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?php

            $students = [
                ["name" => "Никита", "grade" => 5],
                ["name" => "Женя", "grade" => 4],
                ["name" => "Ксюша", "grade" => 3],
                ["name" => "Даниил", "grade" => 5],
                ["name" => "Арина", "grade" => 2],
                ["name" => "Матвей", "grade" => 4],
                ["name" => "Паша", "grade" => 3],
                ["name" => "Андрей", "grade" => 1]
            ];

            $excellent = [];
            $good = [];
            $average = [];
            $low = [];
            $poor = [];

            foreach ($students as $student) {
                switch ($student["grade"]) {
                    case 5:
                        $excellent[] = $student["name"];
                        break;
                    case 4:
                        $good[] = $student["name"];
                        break;
                    case 3:
                        $average[] = $student["name"];
                        break;
                    case 2:
                        $low[] = $student["name"];
                        break;
                    case 1:
                        $poor[] = $student["name"];
                        break;
                }
            }

            function printGroup($groupName, $students)
            {
                echo "<h3>$groupName</h3>";
                echo "<ul>";
                foreach ($students as $student) {
                    echo "<li>$student</li>";
                }
                echo "</ul>";
            }

            printGroup("Отличники", $excellent);
            printGroup("Хорошисты", $good);
            printGroup("Троечники", $average);
            printGroup("Ниже среднего: ", $low);
            printGroup("Неудовлетворительно", $poor);
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            $numbers = [];
            $sum = 0;
            $count = 0;

            do {
                $randomNumber = rand(-20, 20);
                $numbers[] = $randomNumber;
                $sum += $randomNumber;
                $count++;
            } while ($randomNumber != 0);
            array_pop($numbers);
            $count--;

            $max = max($numbers);
            $min = min($numbers);

            $average = $count > 0 ? $sum / $count : 0;

            print_r($numbers);
            echo "<br>Количество введенных чисел: $count<br>";
            echo "Среднее значение: $average<br>";
            echo "Наибольшее значение: $max<br>";
            echo "Наименьшее значение: $min<br>";
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?php
            $day = 16;
            $month = 5;
            $n = $day * $month;

            $numbers = [];
            for ($i = 0; $i < 24; $i++) {
                $numbers[] = rand(1, $n);
            }

            $sumSquares = 0;
            foreach ($numbers as $number) {
                if ($number % 2 == 0) {
                    $sumSquares += $number * $number;
                }
            }

            $result = ceil(sqrt($sumSquares));

            echo "Массив случайных чисел: " . implode(", ", $numbers) . "<br>";
            echo "Корень из суммы квадратов четных элементов: $result";
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?php
            $helpme = [];
            for ($i = 0; $i < 10; $i++) {
                $helpme[] = "помогите!";
            }
            print_r($helpme);
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <?php

            $currentDate = date("Y-m-d");
            $currentDay = date("l");

            $currentDayNumber = date("N");


            switch ($currentDayNumber) {
                case 1:
                    $dayInRussian = "Понедельник";
                    break;
                case 2:
                    $dayInRussian = "Вторник";
                    break;
                case 3:
                    $dayInRussian = "Среда";
                    break;
                case 4:
                    $dayInRussian = "Четверг";
                    break;
                case 5:
                    $dayInRussian = "Пятница";
                    break;
                case 6:
                    $dayInRussian = "Суббота";
                    break;
                case 7:
                    $dayInRussian = "Воскресенье";
                    break;
                default:
                    $dayInRussian = "Неизвестный день";
            }

            echo "Текущая дата: $currentDate<br>";
            echo "День недели на английском: $currentDay<br>";
            echo "День недели на русском: $dayInRussian<br>";
            ?>
        </div>
        <div class="zad10">
            <h3>Задание 10</h3>
            <?php

            $s = [
                0 => ['text' => 'ПРИВЕТ, Андрей!', 'tag' => 'h1', 'color' => 'red'],
                1 => ['text' => 'Как дела?', 'tag' => 'p', 'color' => 'blue'],
                2 => ['text' => 'Добро пожаловать!', 'tag' => 'h2', 'color' => 'green'],
                3 => ['text' => 'Сегодня прекрасный день.', 'tag' => 'p', 'color' => 'orange'],
                4 => ['text' => 'PHP - это интересно!', 'tag' => 'h3', 'color' => 'purple'],
                5 => ['text' => 'Учите программирование.', 'tag' => 'p', 'color' => 'brown'],
                6 => ['text' => 'Удачи!', 'tag' => 'p', 'color' => 'pink'],
                7 => ['text' => 'Помогите', 'tag' => 'p', 'color' => 'green'],
                8 => ['text' => 'ААААААААА!', 'tag' => 'span', 'color' => 'black']
            ];

            foreach ($s as $element) {
                echo "<{$element['tag']} style='color: {$element['color']}'>{$element['text']}</{$element['tag']}>";
            }
            ?>
        </div>
        <div class="zad11">
            <h3>Задание 11</h3>
            <?php
            $s = [
                '12' => ['tovar' => 'Рог Осьминога', 'price' => '12', 'count' => '100'],
                '45' => ['tovar' => 'Крыло Дракона', 'price' => '20', 'count' => '50'],
                '78' => ['tovar' => 'Зуб Тролля', 'price' => '15', 'count' => '30'],
                '101' => ['tovar' => 'Шкура Медведя', 'price' => '25', 'count' => '40'],
                '134' => ['tovar' => 'Коготь Грифона', 'price' => '18', 'count' => '60'],
                '167' => ['tovar' => 'Перья Феникса', 'price' => '22', 'count' => '70'],
                '190' => ['tovar' => 'Камень Мудрости', 'price' => '30', 'count' => '10'],
                '223' => ['tovar' => 'Голова Скунса', 'price' => '8', 'count' => '13'],
                '256' => ['tovar' => 'Клык Волка', 'price' => '14', 'count' => '90'],
                '289' => ['tovar' => 'Рог Единорога', 'price' => '35', 'count' => '5'],
                '322' => ['tovar' => 'Крыло Летучей Мыши', 'price' => '10', 'count' => '80'],
                '355' => ['tovar' => 'Глаз Василиска', 'price' => '28', 'count' => '20']
            ];

            echo "<table border='1'>";
            echo "<tr><th>Товар</th><th>Цена (в слезинках студентов)</th><th>Количество</th></tr>";

            foreach ($s as $item) {
                echo "<tr>";
                echo "<td>{$item['tovar']}</td>";
                echo "<td>{$item['price']} слезинок студентов</td>";
                echo "<td>{$item['count']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            ?>

        </div>
        <div class="zad12">
            <h3>Задание 12</h3>
            <?php
            $prim = [
                ['id' => 1, 'name' => 'Глава 1', 'parent_id' => 0],
                ['id' => 2, 'name' => 'Глава 2', 'parent_id' => 0],
                ['id' => 3, 'name' => 'Глава 3', 'parent_id' => 0],
                ['id' => 4, 'name' => 'Глава 4', 'parent_id' => 0],
                ['id' => 5, 'name' => 'Основы языка PHP. Сценарии', 'parent_id' => 1],
                ['id' => 6, 'name' => 'Использование web-сервера для выполнения PHP-сценариев', 'parent_id' => 1],
                ['id' => 7, 'name' => 'Первый PHP-скрипт', 'parent_id' => 1],
                ['id' => 8, 'name' => 'Общие понятия о переменных в PHP', 'parent_id' => 2],
                ['id' => 9, 'name' => 'Типы данных (переменных) в PHP', 'parent_id' => 2],
                ['id' => 10, 'name' => 'Арифметические операции', 'parent_id' => 3],
                ['id' => 11, 'name' => 'Операции инкремента и декремента', 'parent_id' => 3],
                ['id' => 12, 'name' => 'Операции присвоения', 'parent_id' => 3],
                ['id' => 13, 'name' => 'Простые математические функции', 'parent_id' => 4],
                ['id' => 14, 'name' => 'Выработка случайных чисел', 'parent_id' => 4],
                ['id' => 15, 'name' => 'Математические константы', 'parent_id' => 4]
            ];

            $chapters = [];

            foreach ($prim as $item) {
                if ($item['parent_id'] == 0) {
                    $chapters[$item['id']] = [
                        'name' => $item['name'],
                        'sections' => []
                    ];
                } else {
                    $chapters[$item['parent_id']]['sections'][] = $item['name'];
                }
            }
            
            echo "<ul>";
            foreach ($chapters as $chapter) {
                echo "<li>{$chapter['name']}";
                if (!empty($chapter['sections'])) {
                    echo "<ul>";
                    foreach ($chapter['sections'] as $section) {
                        echo "<li>$section</li>";
                    }
                    echo "</ul>";
                }
                echo "</li>";
            }
            echo "</ul>";
            ?>


        </div>
        <div class="zad">
            <h3>Задание тест</h3>
            <?php
            $array = [
                'Награда' => 'Никита',
                'Поздравить' => 'Женя',
                'Отчислить' => 'Ефим'
            ];
            echo "<table>";
            foreach ($array as $item => $value) {
                echo "<tr><td>{$item}</td><td>{$value}</td></tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>