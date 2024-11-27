<?php
function my_dump($massiv)
{
    echo '<pre>';
    print_r($massiv);
    echo '</pre>';
}

function randomList($length) {
    return array_map(fn() => rand(-20, 38), range(1, $length));
}

function summList($massiv) {
    $sum = 0;
    foreach($massiv as $elem) {
        if($elem % 2 == 0) {
            $sum += $elem;
        }
    }
    return $sum;
}

function genPass($length, $letters = false, $special = false) {
    $lettersA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/~`';
    $password = [];
    $select = [];

    for($i = 0; $i<$length; $i++) {
        $select[] = rand(0,9);
        if($letters) {
            $select[] = $lettersA[rand(0, strlen($lettersA) - 1)];
        }
        if($special) {
            $select[] = $specialChars[rand(0, strlen($specialChars) - 1)];
        }
        $password[] = $select[array_rand($select)];
        $select = [];
    }

    return implode("", $password);
}

function callTwice($func, ...$args) {
    return function() use ($func, $args) {
        $result1 = $func(...$args);
        $result2 = $func(...$args);
        return [$result1, $result2];
    };
}

function simpN($number) {
    $simpA = [];
    for ($i = 1; $i < $number; $i++) {
        $flag = false;
        for ($k = 2; $k <= 9; $k++) {
            if ($i % $k == 0 && $i != $k) {
                $flag = true;
                break;
            }
        }
        if (!$flag) {
            $simpA[] = $i;
        }
    }
    return $simpA;
}

function convertDate($date) {
    $parts = explode('-', $date);
    if(count($parts) !== 3) {
        return "Uncorrect date format!: three parts";
    }

    list($year, $month, $day) = $parts;
    if(!ctype_digit($year) || !ctype_digit($month) || !ctype_digit($day)) {
        return "Uncorrect date format!: require numbers";
    }
    
    if(!checkdate($month, $day, $year)) {
        return "Uncorrect date format!: not date";
    }

    return sprintf('%02d.%02d.%04d', $day, $month, $year);
}

function countRepeatsArray($string) {
    $arrayS = str_split($string);
    $arrayC = [];
    foreach ($arrayS as $elem) {
        if (!isset($arrayC[$elem])) {
            $arrayC[$elem] = 1;
        } else {
            $arrayC[$elem]++;
        }
    }
    return $arrayC;
}

function createMenuFiles() {
    $menu1 = ["Суп", "Борщ", "Щи", "Уха", "Солянка"];
    $menu2 = ["Котлета", "Стейк", "Плов", "Паста", "Рыба"];
    $menu3 = ["Торт", "Мороженое", "Пирог", "Пудинг", "Фрукты"];

    file_put_contents("menu1.txt", implode("\n", $menu1));
    file_put_contents("menu2.txt", implode("\n", $menu2));
    file_put_contents("menu3.txt", implode("\n", $menu3));
}

function readMenuFile($filename) {
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo "Содержимое файла $filename:\n$content\n";
    } else {
        echo "Файл $filename не найден.\n";
    }
}

function menu() {
    $menu1 = file("menu1.txt", FILE_IGNORE_NEW_LINES);
    $menu2 = file("menu2.txt", FILE_IGNORE_NEW_LINES);
    $menu3 = file("menu3.txt", FILE_IGNORE_NEW_LINES);

    $todayMenu = [
        "<br>Первое блюдо: " . $menu1[array_rand($menu1)],
        "<br>Второе блюдо: " . $menu2[array_rand($menu2)],
        "<br>Десерт: " . $menu3[array_rand($menu3)]
    ];

    $todayMenuContent = implode("\n", $todayMenu);
    file_put_contents("today.txt", $todayMenuContent);

    echo "Меню на сегодняшний день:\n$todayMenuContent\n";
}

function my_click() {
    if (isset($_POST['my_click'])) {
        $date = date('Y-m-d H:i:s');
        file_put_contents('time.txt', $date . PHP_EOL, FILE_APPEND);
        echo "Время нажатия записано: $date";
    }
}